<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doador extends Model
{
    public function doacoes(){
        return $this -> hasMany(Doacao::class);
    }

    public function conquistas(){
        return $this -> hasMany(Conquista::class);
    }

    public function pontuacao(){
        return $this->hasOne(Pontuacao::class);
    }
}
/*O significado:

1 Doador
↓
muitas Doações

1 Doador
↓
muitas Conquistas

1 Doador
↓
1 Pontuação 
*/