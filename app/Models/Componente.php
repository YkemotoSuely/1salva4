<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    public function doacao()
    {
        return $this->belongsTo(Doacao::class);
    }
}
