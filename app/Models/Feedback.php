<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = "feedbacks";
    protected $primaryKey = "id";

    protected $fillable = ['name', 'feedback'];

    public $timestamps = true;
}
