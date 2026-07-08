<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hemocentro extends Model
{
    //Um hemocentro --> várias doações

    public function doacoes()
    {
        return $this-> hasMany(Doacao::class);
    }
}
