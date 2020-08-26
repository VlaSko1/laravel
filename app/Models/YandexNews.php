<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YandexNews extends Model
{
    protected $table = 'yandex_news';

    protected $primaryKey = "id";

    
    protected $fillable = [
        'title',
        'link',
        'description',
        'pubDate',
        'published',
        'category_parsing_id'
    ];

    // Метод возвращает новости соответствующие полученному идентификатору категории, разрешенные для публикации
    public function getNews($id)
    {
        return YandexNews::where('category_parsing_id', $id)->where('published', 1)->orderBy('pubDate', 'desc')->get();
    }
}
