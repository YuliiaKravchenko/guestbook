<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';
    protected $guarded = [''];
    //public $timestamps = false; не нужно добавлять если есть поля created_at,updated_at
}
