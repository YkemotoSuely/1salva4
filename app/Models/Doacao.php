<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    public function doador()
    {
        return $this->belongsTo(Doador::class);
    }

    public function hemocentro()
    {
        return $this->belongsTo(Hemocentro::class);
    }

    public function componentes()
    {
        return $this->hasMany(Componente::class);
    }
}
