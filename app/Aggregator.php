<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Aggregator extends Model
{
    public function allCategories()
    {
        return \DB::table('categories')->select(['id', 'category'])->get()->toArray();
    }
    public function issetCategory(int $id)
    {
        return \DB::table('categories')
            ->select('category')->find($id);
    }

    public function getNewsFromCategory(int $id)
    {
        return \DB::table('news')
            ->select('news.id', 'news.name', 'news.briefly', 'news.category_id')
            ->where([['category_id', '=', $id], ['published', '=', 1]])
            ->get()->toArray();
    }

    public function getOneNews(int $id)
    {
        return \DB::table('news')
            ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.id', 'news.name', 'news.detail', 'news.category_id', 'categories.category')
            ->where('news.id', '=', $id)->get()->toArray();
    }

}
