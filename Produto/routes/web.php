<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SetorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto/listar', [ProdutoController::class, 'listar']) -> name('produto.listar');

// Route::get('/produto/cadastrar', function(){
//     return view('cadastro');
// })->name('produto.cadastro');

Route::get('/produto/cadastrar',[ProdutoController::class, 'cadastro']
)->name('produto.cadastro');

// POST - enviar os dados para cadastrar usuários
Route::post('/produto/salvar', [ProdutoController::class, 'add'])
->name('produto.salvar');

// Tela de Atualizar
Route::get('/produto/{id}/atualizar', [ProdutoController::class, 'atualizar'])
->name('produto.atualizar');

Route::put('/produto/{id}/update', [ProdutoController::class, 'update'])
->name('produto.update');

Route::delete('/produto/{id}', [ProdutoController::class, 'deletar'])
->name('produto.deletar');

Route::get('/setor/cadastrar', function(){
    return view('cadastroSetor');
})->name('setor.cadastro');

Route::post('/setor/salvar', [SetorController::class, 'add'])
->name('setor.salvar');