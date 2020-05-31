<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'detail',
        'briefly',
        'description',
        'published',
        'category_id',
        'source_id'
    ];

}
