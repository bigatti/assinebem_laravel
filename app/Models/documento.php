<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_arquivo',
        'identificacao_arquivo',
        'sufixo_arquivo',
        'quadro_assinaturas',
        'id_documento_status',
        'url_documento',
        'file_path',
        'id_externo',
    ];
}
