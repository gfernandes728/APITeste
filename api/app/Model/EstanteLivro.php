<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EstanteLivro extends Model
{
    protected $table = 'estante_livro';
    protected $fillable = ['prateleira','id_estante','id_livro'];
}
