<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class Departamento extends Model{

    protected $table = 'Departamento';

    protected $fillable = [
        'setor',
        'orcamento',
        'dataCriacao'
    ];

    public function funcionario(){
        return $this->hasMany(Funcionario::class);
    }
}

?>