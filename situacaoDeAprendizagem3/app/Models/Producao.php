<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producoes extends Model
{
    protected $table = 'producoes';

    protected $fillable = [
        'nomeProduto',
        'materia',
        'dataFabricacao',
        'quantidade',
        'preco',
    ];

    // public function produto()
    // {
    //     return $this->belongsTo(Producoes::class);
    // }
}

?>