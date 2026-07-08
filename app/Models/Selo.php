<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Selo extends Model
{
    public function conquistas()
    {
        return $this->hasMany(Conquista::class);
    }
}
