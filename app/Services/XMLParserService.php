<?php


namespace App\Services;


class XMLParserService
{
    public function saveNews(string $url)
    {
        \Storage::prepend(public_path('/test1.txt'), $url);
    }
}
