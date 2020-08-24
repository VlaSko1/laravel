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
}
