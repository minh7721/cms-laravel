<?php

namespace App\Console\Commands\Craweler;

use App\Models\Article;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;
use App\Models\Enums\ArticleStatus;

class Crawler extends Command
{
    protected $signature = 'crawl:crawl {--url= : url crawl}';

//    protected $description = 'Command description';

    /**
     * @throws GuzzleException
     */
    public function handle()
    {
        $url = $this->option('url');
        $client = new Client();
        $response = $client->get($url);
        $html = $response->getBody()->getContents();
        $dom_crawler = new DomCrawler();
        $dom_crawler->addHtmlContent($html);


        $sub_urls = $dom_crawler->filter('.thumb-art > a');
        $sub_urls->each(function ($item) {
            $urlPage = $item->attr('href');
            $client = new Client();
            $response = $client->get($urlPage);
            $html = $response->getBody()->getContents();
            $dom_crawler = new DomCrawler();
            $dom_crawler->addHtmlContent($html);

            $title = $dom_crawler->filter('.title-detail')->text();

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

            $article = Article::create([
                'author_id' => 1,
                'category_id' => 8,
                'title' => $title,
                'thumb' => $thumb,
                'description' => $description,
                'content' => $content[0][0],
                'status' => ArticleStatus::PUBLISHED,
            ]);

            DB::table('article_tag')->insert([
                'article_id' => $article->id,
                'tag_id' => 1
            ]);
        });
    }
}
