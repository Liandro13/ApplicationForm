<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
    // Adiciona os campos que devem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'mensagem',
    ];

    // Se houver timestamps na tabela (created_at e updated_at), podes habilitar isso
    public $timestamps = true;
}
