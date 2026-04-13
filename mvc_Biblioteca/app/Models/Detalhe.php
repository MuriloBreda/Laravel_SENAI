<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalhe extends Model{

    protected $table = 'detalhes';

    protected $fillable = [
        'custo',
        'preco',
        'imposto'
    ];

    public function livros(){
        return $this->hasMany(Livro::class);
    }
}