<?php

namespace App\Console\Commands\Crawler;

use App\Libs\CrawlerHelper;
use App\Models\Article;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;
use App\Models\Enums\ArticleStatus;

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
                    $this->info("Go to: $article_url");
                    $data = $this->parseArticle($article_url);
                    $article = Article::firstOrCreate([
                    'source' => $article_url,
                    ],[
                    'author_id' => 1,
                    'category_id' => $this->mappingCategories($data['category']),
                    'title' => $data['title'],
                    'thumb' => $data['thumb'],
                    'description' => $data['description'],
                    'content' => $data['content'][0][0],
                    'status' => ArticleStatus::PUBLISHED,
                     'source' => $article_url
                ]);

                    DB::table('article_tag')->insert([
                        'article_id' => $article->id,
                        'tag_id' => 1
                    ]);
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

    protected function mappingCategories(string $string) {
        return match ($string) {
            "Mới nhất" => 6,
            "Thời sự" => 7,
            "Góc nhìn" => 8,
            "Thế giới" => 9,
            "Podcats" => 10,
            "Kinh doanh" => 11,
            "Khoa học" => 12,
            "Giải trí" => 13,
            "Thể thao" => 14,
            "Pháp luật" => 15,
            "Giáo dục" => 16,
            "Sức khỏe" => 17,
            "Đời sống" => 18,
            "Du lịch" => 19,
            "Số hóa" => 20,
            "Xe" => 21,
            "Ý kiến" => 22,
            "Tâm sự" => 23,
            "Hài" => 24,
            default => 0,
        };
    }
}
