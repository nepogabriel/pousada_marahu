<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $table = "accommodation";

    /* Tudo que for enviado pelo POST, pode ser atualizado sem restrições
    (Algum campo dentro do array o laravel não deixaria atualizar)*/
    protected $guarded = [];
}
