<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class detalheProduto extends Model
{
    protected $fillable = [
        'descricao',
        'tamanho',
        'peso',
    ];

    public function detalhe(){
        return $this->belongsTo(Produto::class);
    }
}