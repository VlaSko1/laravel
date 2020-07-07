<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthData extends Model
{
    protected $table = 'auth_data';

    protected $guarded = ['id']; // данное свойство показывает, что в таблице auth_data
    // могут быть изменены любые свойства кроме id. Обычно использнуют свойство fillable.
    // Это сделано просто для примера.
}
