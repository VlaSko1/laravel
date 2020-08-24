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
}
