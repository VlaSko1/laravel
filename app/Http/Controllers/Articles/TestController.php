<?php


namespace App\Http\Controllers\Articles;


use App\Http\Controllers\Controller;
use App\Jobs\NewsJob;

class TestController extends Controller
{
    public function news()
    {
        $start = date('c');
        $links = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/index.rss'
        ];

        foreach ($links as $link) {
            NewsJob::dispatch($link);
        }

        return $start . "-" . date('c');
    }
}
