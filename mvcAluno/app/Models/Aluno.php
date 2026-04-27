<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model{

    protected $fillable = [
        'nome',
        'email',
        'turma_id',
        'informacoes_id'
    ];

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

     public function informacoes(){
        return $this->belongsTo(Informacoes::class, 'detalhes_id');
    }
}