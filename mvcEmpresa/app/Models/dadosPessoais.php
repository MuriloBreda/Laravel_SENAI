<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class dadosPessoais extends Model{

    protected $table = 'dadosPessoais';

    protected $fillable = [
        'CPF',
        'RG',
        'dataNascimento',
        'CEP',
        'funcionario_id'
    ];

    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}

?>