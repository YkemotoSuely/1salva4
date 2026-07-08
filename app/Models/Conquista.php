<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conquista extends Model
{
    public function doador()
    {
        return $this->belongsTo(Doador::class);
    }

    public function selo()
    {
        return $this->belongsTo(Selo::class);
    }
}
