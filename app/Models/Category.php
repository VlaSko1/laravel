<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = "id";

    protected $fillable = ['category'];

    public $timestamps = false;

    /*public function news()
    {
        return $this->belongsToMany(News::class, 'news_has_category',
            'category1s_id', 'news1s_id');
    }*/
}
