<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category1 extends Model
{
    protected $table = "category1s";
    protected $primaryKey = "id";

    protected $fillable = ['title', 'slug'];

    public $timestamps = false;

    public function news()
    {
            return $this->belongsToMany(News1::class, 'news_has_category',
            'category1s_id', 'news1s_id');
    }


}
