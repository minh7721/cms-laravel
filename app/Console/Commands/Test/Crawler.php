<?php

namespace App\Console\Commands\Test;

use GuzzleHttp\Client;
use \Symfony\Component\DomCrawler\Crawler as DomCrawler;
use Illuminate\Console\Command;

class Crawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:crawl
    {--url= : url test}
    ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = $this->option('url');
        $client = new Client();
        $response = $client->get($url);
        $html = $response->getBody()->getContents();
        $dom_crawler = new DomCrawler();
        $dom_crawler->addHtmlContent($html);

        $sub_urls = $dom_crawler->filter('.title-news > a')
            ->each(function (DomCrawler $node) {
                return $node->attr('href');
            });

        dump($sub_urls);

        foreach ($sub_urls as $url) {

        }




//        $title = $dom_crawler->filterXPath("//title")->text();
//        $this->info("Title: ". $title);
//
//        $content = $dom_crawler->filterXPath('//*[@id="dark_theme"]/section[5]/div/div[2]/article')
//            ->html();
//        $this->info($content);
        return 0;
    }
}
