<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Livro

Route::get('/livro/cadastrar', function(){
    return view('cadastrarLivros');
})->name('livro.cadastrar');

// Editora

Route::get('/editora/cadastrar', function(){
    return view('cadastrarEditora');
})->name('editora.cadastrar');