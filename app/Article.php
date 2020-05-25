<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function allArticles()
    {
        return \DB::table('articles')->select(['id', 'title', 'text'])->get()->toArray();
    }
    public function getArticleById(int $id)
    {
        return \DB::table('articles')->find($id);
            /*->select(['id', 'title', 'text', 'published'])
            ->where('id', $id)
            ->first();*/

    }
    public function getCount()
    {
        return \DB::table('articles')->count();
    }


    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }
}
