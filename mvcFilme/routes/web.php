<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\AutorController;

Route::get('/', function () {
    return view('welcome');
});

// FILME

Route::get('/filme/listar', [FilmeController::class, 'listar']) -> name('filme.listar');

// AUTOR

Route::get('/autor/listar', [AutorController::class, 'listar']) -> name('autor.listar');