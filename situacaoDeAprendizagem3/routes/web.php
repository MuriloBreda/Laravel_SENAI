<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/producao/listar', function () {
    return view('listar');
})->name('listar');