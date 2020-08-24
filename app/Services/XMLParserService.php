<?php


namespace App\Services;
use App\Models\YandexNews;

class XMLParserService
{
    public function saveNews(string $link)
    {
        $xml = \XmlParser::load($link);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'lastBuildDate' => ['uses' => 'channel.lastBuildDate'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate]']
        ]);
        
        
        //Получаем категорию новостей 
        $categoryNews = $data['title'];
        

        //Получаем id категории новостей
        $idCategoryNews = \DB::table('categoryes_parsing')->where('category_parsing', $categoryNews)->value('id');

        //получаем последнюю дату изменения новостей на сайте
        $loadBuildDate = $data['lastBuildDate'];
            
        //получаем время изменения новостей в Unix формате
        $timeUnix = strtotime($loadBuildDate);
        
        //получаем время последнего изменения новостей в формате DateTime
        $dateTime = date('Y-m-d H:i:s', $timeUnix);
        
        // Проверяем есть ли в таблице строки
        $countRow = YandexNews::where('category_parsing_id', '=', $idCategoryNews)->count();
        
        if(!$countRow) {
            $this->saveNewsOneCategory($data, $idCategoryNews);
            return;
        };
        
        
        // получаем время последнего изменения новости из БД
        $lastTableSave = YandexNews::where('category_parsing_id', '=', $idCategoryNews)
            ->max('created_at');
        
        if($dateTime > $lastTableSave) {
            // Обнуляем флаг публикации
            if($data['news']) {
                YandexNews::where('category_parsing_id',  $idCategoryNews)
                ->where('published', '1')->update(['published' => 0]);
            }
            
            $this->saveNewsOneCategory($data, $idCategoryNews);
        }
        
    }
    public function saveNewsOneCategory($data, $idCategoryNews)
    {
        
        foreach ($data['news'] as $news) {
            
            $modelDB = YandexNews::where('category_parsing_id', '=',  $idCategoryNews)
            ->updateOrCreate(
                [   'title' => $news['title'],
                    'link' => $news['link'],
                    'description' => $news['description'],
                    'pubDate' => $news['pubDate'],
                    'category_parsing_id' => $idCategoryNews],
                    ['published' => '1']
                );
               
            if(!YandexNews::where('category_parsing_id', '=',  $idCategoryNews)->find($modelDB)) {
                $modelDB->save();
            }
        }
    }
}
