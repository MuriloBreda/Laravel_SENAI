<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FuncionarioController;

Route::get('/', function () {
    return view('welcome');
});

// Routes para Departamento

Route::get('/departamento/cadastrar', function(){
    return view('cadastrarDepartamento');
})->name('departamento.cadastrar');

Route::post('/departamento/salvar', [DepartamentoController::class, 'add'])->name('departamento.salvar');

Route::get('/departamento/listar', [DepartamentoController::class, 'listar'])->name('departamento.listar');


// Rotas para Funcionario

Route::get('/funcionario/cadastrar', [FuncionarioController::class, 'cadastro']
)->name('funcionario.cadastrar');

Route::post('/funcionario/salvar', [FuncionarioController::class, 'add'])->name('funcionario.salvar');

Route::get('/funcionario/listar', [FuncionarioController::class, 'listar'])->name('funcionario.listar');

Route::get('/funcionario/editar/{id}', [FuncionarioController::class, 'atualizar'])->name('funcionario.atualizar');

Route::put('/funcionario/editar/{id}', [FuncionarioController::class, 'update'])->name('funcionario.update');