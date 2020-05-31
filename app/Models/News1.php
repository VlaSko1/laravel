<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News1 extends Model
{
    protected $table = "news1s";
    protected $primaryKey = "id";

    protected $fillable = [
        'title',
        'slug',
        'status',
        'description'
    ];

}
