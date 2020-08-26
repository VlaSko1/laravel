<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resources';
    protected $primaryKey = "id";

    protected $fillable = [
        'link',
        'slug',
        'category_parsing_id',
        'source_id'
    ];

    // Получаем суммарные данные из таблиц resources, sources, categoryes_parsing в удобочитаемом виде
    public function getResourcesYandex()
    {
        $soursesYandex = \DB::table('resources')
            ->join('sources', 'resources.source_id', '=', 'sources.id')
            ->join('categoryes_parsing', 'resources.category_parsing_id', '=', 'categoryes_parsing.id')
            ->select('resources.link', 'resources.slug', 'sources.source', 'categoryes_parsing.category_parsing', 'categoryes_parsing.id')
            ->where('sources.source', 'yandex.ru')->get();

        return $soursesYandex;
    }

    // Получаем категорию по ее id из таблицы 'categoryes_parsing'
    public function getCategory($id)
    {
       return \DB::table('categoryes_parsing')->where('id', '=', $id)->value('category_parsing');
    }
}
