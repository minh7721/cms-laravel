<?php

namespace App\Console\Commands\Crawler;

use App\Libs\CrawlerHelper;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;
use App\Models\Enums\ArticleStatus;
use App\Services\ArticleManager;

class VnexpressCrawler extends Command
{
    protected $signature = 'crawl:vnexpress';

    protected $homepage = '';

    public function handle()
    {
        $listName = [];
        $this->homepage = "https://vnexpress.net";
        $categories = $this->getCategories($this->homepage);

        foreach ($categories as $key => $category_url) {
            if ($key == 0 || $key == 1) continue;
            $articles = $this->getArticles($category_url);

            foreach ($articles as $article_url) {
                try {
                    $count_article = ArticleManager::existedBySource($article_url);
                    if(count((array)$count_article->id)){
                        $this->info('Article đã tồn tại');
                    }
                    else{
                        $this->info("Go to: $article_url");
                        $data = $this->parseArticle($article_url);
                        $category = ArticleManager::getCategory($data['category'], $data);

                        $article = ArticleManager::store($article_url, $category->id, $data);

                        $tags = $this->getTags($article_url);
                        foreach ($tags as $tag){
                            $tag_id = ArticleManager::getTag($tag);
                            DB::table('article_tag')->updateOrInsert([
                                'article_id' => $article->id,
                                'tag_id' => $tag_id->id
                            ]);
                        }
                    }

                }
                catch (\Exception $err){
                    continue;
                }
            }
        }
    }

    protected function getCategories(string $homepage) {
        $html = (new Client([
            'verify' => false,
            'timeout' => 30, // 30 seconds
        ]))->get($homepage)
        ->getBody()->getContents();

        $dom_crawler = new DomCrawler();
        $dom_crawler->addHtmlContent($html);

        $categories =  CrawlerHelper::extractAttributes($dom_crawler, '#wrap-main-nav > nav > ul > li > a', ['text', 'href']);

        return array_map(function ($item) {
                return CrawlerHelper::makeFullUrl($this->homepage, $item['href']);
            }, $categories);
    }

    protected function getArticles(string $url): array
    {
        $html = (new Client([
            'verify' => false,
            'timeout' => 30, // 30 seconds
        ]))->get($url)
            ->getBody()->getContents();

        $dom_crawler = new DomCrawler();
        $dom_crawler->addHtmlContent($html);

        $articles = CrawlerHelper::extractAttributes($dom_crawler, '.thumb-art > a', ['text', 'href']);

        return array_map(function ($item) {
            return CrawlerHelper::makeFullUrl($this->homepage, $item['href']);
        }, $articles);
    }

    protected function getTags(string $url){
        $html = (new Client([
            'verify' => false,
            'timeout' => 30, // 30 seconds
        ]))->get($url)
            ->getBody()->getContents();

        $dom_crawler = new DomCrawler();
        $dom_crawler->addHtmlContent($html);

        $tags = $dom_crawler->filterXpath("//meta[@name='its_tag']")->extract(array('content'));
        $tags = explode(', ', $tags[0]);
        return $tags;
    }

    protected function parseArticle(string $url) {
        $html = (new Client([
            'verify' => false,
            'timeout' => 30, // 30 seconds
        ]))->get($url)
            ->getBody()->getContents();

        $dom_crawler = new DomCrawler();
        $dom_crawler->addHtmlContent($html);

        $title = $dom_crawler->filter('.title-detail')->text();

        $category = $dom_crawler->filter('.breadcrumb>li>a')->text();
        $description = $dom_crawler->filter('.description')->text();

        $content = $dom_crawler->filter('.fck_detail')->each(function (DomCrawler $parentCrawler, $i){
            return $parentCrawler->filter('.fig-picture > picture > source > img')->each(function (DomCrawler $node) use ($parentCrawler) {
                $content = $parentCrawler->html();
                $src = $node->attr('src');
                $data_src = $node->attr('data-src');
                return str_replace($src, $data_src, $content);
            });
        });

        $thumb = $dom_crawler->filter('.fig-picture > picture > source > img')->attr('data-src');

        return compact('title', 'category', 'description', 'content', 'thumb');
    }
}
