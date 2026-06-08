<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setores extends Model
{
    protected $fillable = [
        'nomeSetor',
        'numCorredor'
    ];

    public function setores(){
        return $this->hasMany(Setores::class);
    }
}