<?php

namespace App\Console\Commands\Crawler;

use App\Libs\CrawlerHelper;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;
use App\Services\ArticleManager;

class VnexpressCrawler extends Command
{
    protected $signature = 'crawl:vnexpress';

    protected string $homepage = '';

    /**
     * @throws GuzzleException
     */
    public function handle()
    {
//        $listName = [];
        $this->homepage = "https://vnexpress.net";
        $categories = $this->getCategories($this->homepage);

        foreach ($categories as $key => $category_url) {
            if ($key == 0 || $key == 1) continue;
            $pages = $this->getPaginate($category_url);
            $articles = $this->getArticles($category_url);
            $this->createArticle($articles);
            try {
                for ($i = 0; $i < 20; $i++) {
                    foreach ($pages as $link) {
                        if ($link != NULL) {
                            $articles = $this->getArticles($link);
                            $this->createArticle($articles);
                        }
                        $pages = $this->getPaginate($link);
                    }
                }
            }
            catch (\Exception $err){
                continue;
            }
        }
    }


    /**
     * @throws GuzzleException
     */
    protected function createArticle($articles)
    {
        foreach ($articles as $article_url) {
            try {
                $data = $this->parseArticle($article_url);

                $category = ArticleManager::getCategory($data['category'], $data);

                $article = ArticleManager::store($article_url, $category->id, $data);

                $tags = $this->getTags($article_url);

                foreach ($tags as $tag) {
                    $tag_id = ArticleManager::getTag($tag);

                    DB::table('article_tag')->updateOrInsert([
                        'article_id' => $article->id,
                        'tag_id' => $tag_id->id
                    ],[
                        'article_id' => $article->id,
                        'tag_id' => $tag_id->id
                    ]);
                }

                $this->info("Crawl : $article_url");
            } catch (\Exception $err) {
                continue;
            }
        }
    }

    /**
     * @throws GuzzleException
     */
    protected function getCategories(string $homepage): array
    {
        $html = (new Client([
            'verify' => false,
            'timeout' => 30, // 30 seconds
        ]))->get($homepage)
            ->getBody()->getContents();

        $dom_crawler = new DomCrawler();
        $dom_crawler->addHtmlContent($html);

        $categories = CrawlerHelper::extractAttributes($dom_crawler, '#wrap-main-nav > nav > ul > li > a', ['text', 'href']);

        return array_map(function ($item) {
            return CrawlerHelper::makeFullUrl($this->homepage, $item['href']);
        }, $categories);
    }

    /**
     * @throws GuzzleException
     */
    protected function getPaginate(string $page): array
    {
        $html = (new Client([
            'verify' => false,
            'timeout' => 30, // 30 seconds
        ]))->get($page)
            ->getBody()->getContents();

        $dom_crawler = new DomCrawler();
        $dom_crawler->addHtmlContent($html);

        $articles = CrawlerHelper::extractAttributes($dom_crawler, '.next-page', ['text', 'href']);

        return array_map(function ($item) {
            return CrawlerHelper::makeFullUrl($this->homepage, $item['href']);
        }, $articles);
    }

    /**
     * @throws GuzzleException
     */
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

    /**
     * @throws GuzzleException
     */
    protected function getTags(string $url): array
    {
        $html = (new Client([
            'verify' => false,
            'timeout' => 30, // 30 seconds
        ]))->get($url)
            ->getBody()->getContents();

        $dom_crawler = new DomCrawler();
        $dom_crawler->addHtmlContent($html);

        $tags = $dom_crawler->filterXpath("//meta[@name='its_tag']")->extract(array('content'));
        return explode(', ', $tags[0]);
    }

    /**
     * @throws GuzzleException
     */
    protected function parseArticle(string $url): array
    {
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

        $content = $dom_crawler->filter('.fck_detail')->each(function (DomCrawler $parentCrawler) {
            return $parentCrawler->filter('.fig-picture img')->each(function (DomCrawler $node) use ($parentCrawler) {
                $content = $parentCrawler->html();
                $src = $node->attr('src');
                $data_src = $node->attr('data-src');
                return str_replace($src, $data_src, $content);
            });
        });

        $thumb = $dom_crawler->filter('.fig-picture img')->attr('data-src');

        return compact('title', 'category', 'description', 'content', 'thumb');
    }
}
