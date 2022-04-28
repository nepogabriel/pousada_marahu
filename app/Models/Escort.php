<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escort extends Model
{
    use HasFactory;

    protected $table = 'escorts';

    /* Tudo que for enviado pelo POST, pode ser atualizado sem restrições
    (Algum campo dentro do array o laravel não deixaria atualizar)*/
    protected $guarded = [];
}
