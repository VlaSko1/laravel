<?php

namespace App\Http\Controllers\Aggregator;

use App\Jobs\NewsParsing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YandexNews;

class YNewsController extends Controller
{
    public function showCategoryYNews()
    {
        $soursesYandex = \DB::table('resources')
            ->join('sources', 'resources.source_id', '=', 'sources.id')
            ->join('categoryes_parsing', 'resources.category_parsing_id', '=', 'categoryes_parsing.id')
            ->select('resources.link', 'resources.slug', 'sources.source', 'categoryes_parsing.category_parsing', 'categoryes_parsing.id')
            ->where('sources.source', 'yandex.ru')->get();
        
        // Получаем массив ссылок для загрузки новостей
        $linkes = [];
        $categories = [];
       
        foreach ($soursesYandex as $source) {
            $linkes[] = $source->link;
            $source->category_parsing2 = substr($source->category_parsing, 29);
        }
        // Закончили получение ссылок для загрузки новостей

        // Сохраняем ссылки в базу Redis откуда их будут забирать воркеры.
        foreach  ($linkes as $link) {
            NewsParsing::dispatch($link);
        }



        return view('aggregator.y_news.newsCategories', [
            'resources' => $soursesYandex
        ]);
            
    }

    public function showOneCategoryNews($id)
    {
        $category = \DB::table('categoryes_parsing')->where('id', '=', $id)->value('category_parsing');
        
        $news = YandexNews::where('category_parsing_id', $id)
            ->where('published', 1)
            ->orderBy('pubDate', 'desc')->get();
        
        return view('aggregator.y_news.newsOneCategory', [
            'news' => $news,
            'category' => $category
        ]);
        //TODO сделай отображение одной категории новостей
    }
}
