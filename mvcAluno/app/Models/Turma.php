<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Turma extends Model{
    protected $fillable = [
        'numSala',
        'serie'
    ];

    public function aluno(){
        return $this->hasMany(Aluno::class);
    }

}

?>