<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas de Usuário
Route::get('/login', function () {
    return view('login');
})->name('login');


// Rota para fazer login
Route::post('/autenticar', [UserController::class, 'autenticar'])
->name('login.autenticar');

Route::get('/usuario/cadastrar', function(){
    return view('cadastroUsuario');
});

Route::post('/usuario/salvar', [UserController::class, 'add'])
->name('usuario.salvar');

// Rotas de trocar senha
Route::get('/senha', function () {
    return view('trocarSenha');
})->name('senha.tela');

Route::post('/senha/trocar', [UserController::class, 'trocarSenha'])
->name('senha.trocar');

Route::post('/logout', [UserController::class, 'logout'])
->name('logout');


// Rotas de Produtos

Route::get('/produto/listar', [ProdutoController::class, 'listar'])
->name('produto.listar');

Route::middleware('auth')->group(function () {
    
        Route::get('/produto/cadastrar', [ProdutoController::class, 'cadastrar'])
    ->name('produto.cadastro');

        Route::post('/produto/salvar', [ProdutoController::class, 'add'])
    ->name('produto.salvar');

        Route::put('/produto/{id}/update', [ProdutoController::class, 'atualizar'])
    ->name('produto.update');

        Route::get('/produto/{id}/editar', [ProdutoController::class, 'editar'])
    ->name('produto.editar');

        Route::delete('/produto/{id}/deletar', [ProdutoController::class, 'deletar'])
    ->name('produto.deletar');
        

    // rotas setores
        Route::get('/setor/cadastrar', function(){
        return view('cadastrarSetor');
    })->name('setor.cadastro');

        Route::post('/setor/salvar', [SetorController::class, 'add'])
    ->name('setor.salvar');

        Route::get('/setor/listar', [SetorController::class, 'listar'])
    ->name('setor.listar');

});
