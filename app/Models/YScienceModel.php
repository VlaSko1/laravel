<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YScienceModel extends Model
{
    protected $table = 'y_science_models';

    protected $primaryKey = "id";

    protected $fillable = [
        'title',
        'link',
        'description',
        'pubDate',
        'published'
    ];

    public function getShowNews()
    {
        $xml = \XmlParser::load('https://news.yandex.ru/science.rss');
        //получаем последнюю дату изменения новостей на сайте
        $loadBuildDate = $xml->parse([
            'lastBuildDate' => ['uses' => 'channel.lastBuildDate'],
        ]);

        //получаем время изменения новостей в Unix формате
        $timeUnix = strtotime($loadBuildDate['lastBuildDate']);

        //получаем время последнего изменения новостей в формате DateTime
        $dateTime = date('Y-m-d H:i:s', $timeUnix);

        // получаем время последнего изменения новости из БД
        $lastTableSave = YScienceModel::max('created_at');

        if($dateTime > $lastTableSave) {
            // если нужно подгружать новость грузим их
            $data = $xml->parse([
                'title' => ['uses' => 'channel.title'],
                'link' => ['uses' => 'channel.link'],
                'description' => ['uses' => 'channel.description'],
                'lastBuildDate' => ['uses' => 'channel.lastBuildDate'],
                'news' => ['uses' => 'channel.item[title,link,description,pubDate]']
            ]);

            // Обнуляем флаг публикации
            YScienceModel::where('published', '1')->update(['published' => 0]);

            foreach ($data['news'] as $news) {

                $modelDB = YScienceModel::updateOrCreate(
                    [   'title' => $news['title'],
                        'pubDate' => $news['pubDate'],
                        'link' => $news['link'],
                        'description' => $news['description']],
                    ['published' => '1']);

                if(!YScienceModel::all()->find($modelDB)) {
                    $modelDB->save();
                }
            }
        }
        $news = YScienceModel::all()->where('published', '1')->sortByDesc('pubDate');

        return view('aggregator.y_science.yScience', [
            'news' => $news
        ]);
    }
}
