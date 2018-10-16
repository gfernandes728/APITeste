<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    protected $table = 'livros';
    protected $fillable = ['titulo'];
}
