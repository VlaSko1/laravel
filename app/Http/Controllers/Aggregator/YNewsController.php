<?php

namespace App\Http\Controllers\Aggregator;

use App\Jobs\NewsParsing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YandexNews;
use App\Models\Resource;

class YNewsController extends Controller
{
    public function showCategoryYNews()
    {
        $soursesYandex = (new Resource())->getResourcesYandex();
        
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
        // Получаем нужную категорию по ее id 
        $category = (new Resource())->getCategory($id);
        
        // Получаем список новостей соответствующей полученной категории, готовых для публикации (published = 1)
        $news = (new YandexNews())->getNews($id);
        
        return view('aggregator.y_news.newsOneCategory', [
            'news' => $news,
            'category' => $category
        ]);
        //TODO сделай отображение одной категории новостей
    }
}
