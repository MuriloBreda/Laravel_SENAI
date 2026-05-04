<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class Funcionario extends Model{

    protected $table = 'Funcionarios';

    protected $fillable = [
        'nome',
        'sobrenome',
        'cargo',
        'salario',
        'email',
        'dataAdimissao',
        'departamento_id'
    ];

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function dadosPessoais(){
        return $this->hasOne(dadosPessoais::class);
    }
}

?>