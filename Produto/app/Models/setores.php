<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setores extends Model
{
    protected $fillable = [
        'nome',
        'num_corredor',
    ];

    public function produtos(){
        return $this->hasMany(Produto::class);
    }
}