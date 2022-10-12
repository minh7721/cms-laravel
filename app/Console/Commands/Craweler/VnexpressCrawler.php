<?php

namespace App\Console\Commands\Craweler;

use App\Libs\CrawlerHelper;
use App\Models\Article;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;
use App\Models\Enums\ArticleStatus;

class VnexpressCrawler extends Command
{
    protected $signature = 'crawl:vnexpress';

    protected $homepage = '';
    /**
     * @throws GuzzleException
     */
    public function handle()
    {
        $this->homepage = "https://vnexpress.net";
        $categories = $this->getCategories($this->homepage);

        foreach ($categories as $key => $category_url) {
            if ($key == 0 || $key == 1) continue;
            $articles = $this->getArticles($category_url);
            foreach ($articles as $article_url) {
                $this->info("Goto: $article_url");
                $data = $this->parseArticle($article_url);
                dd($data['category']);
            }
        }



//        $sub_urls = $dom_crawler->filter('.thumb-art > a');
//        $sub_urls->each(function ($item) {
//            $urlPage = $item->attr('href');
//            $client = new Client();
//            $response = $client->get($urlPage);
//            $html = $response->getBody()->getContents();
//            $dom_crawler = new DomCrawler();
//            $dom_crawler->addHtmlContent($html);
//
//
//            $thumb = $dom_crawler->filter('.fig-picture > picture > source > img')->attr('data-src');
//
//            $article = Article::create([
//                'author_id' => 1,
//                'category_id' => 8,
//                'title' => $title,
//                'thumb' => $thumb,
//                'description' => $description,
//                'content' => $content[0][0],
//                'status' => ArticleStatus::PUBLISHED,
//            ]);
//
//            DB::table('article_tag')->insert([
//                'article_id' => $article->id,
//                'tag_id' => 1
//            ]);
//        });
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

    protected function getArticles(string $url) {
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

    protected function parseArticle(string $url) {
        $html = (new Client([
            'verify' => false,
            'timeout' => 30, // 30 seconds
        ]))->get($url)
            ->getBody()->getContents();

        $dom_crawler = new DomCrawler();
        $dom_crawler->addHtmlContent($html);

        $title = $dom_crawler->filter('.title-detail')->text();

        $category = $dom_crawler->filter('#dark_theme > section.section.page-detail.top-detail > div > div.sidebar-1 > div.header-content.width_common > ul > li > a')
                        ->text();

        $description = $dom_crawler->filter('.description')->text();

        $content = $dom_crawler->filter('.fck_detail')->each(function (DomCrawler $parentCrawler, $i){
            return $parentCrawler->filter('.fig-picture > picture > source > img')->each(function (DomCrawler $node) use ($parentCrawler) {
                $content = $parentCrawler->html();
                $src = $node->attr('src');
                $data_src = $node->attr('data-src');
                return str_replace($src, $data_src, $content);
            });
        });

        return compact('title', 'category', 'description', 'content');
    }

    protected function mappingCategories(string $string) {
        return match ($string) {
            "Thời sự" => 8,
            default => 0,
        };
    }
}
