<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hemocentro extends Model
{
    protected $fillable = [
    'nome',
    'logradouro',
    'numero',
    'bairro',
    'cidade',
    'estado',
    'cep',
    'telefone',
    ];

    //Um hemocentro --> várias doações

    public function doacoes()
    {
        return $this-> hasMany(Doacao::class);
    }
}
