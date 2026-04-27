<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informacoes extends Model{

    protected $table = 'Informacoes';

    protected $fillable = [
        'endereco',
        'telefone',
        'idade',
        'dataNascimento'
    ];

    public function alunos(){
        return $this->hasMany(Aluno::class);
    }
}