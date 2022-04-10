<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'rg',
        'cpf',
        'email',
        'ddd',
        'telefone',
        'id_externo',
    ];
}
