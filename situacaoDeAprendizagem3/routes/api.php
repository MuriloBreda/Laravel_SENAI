<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProducoesApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('producoes',[ProducoesApiController::class, 'listarApi']);
Route::post('producao/add',[ProducoesApiController::class, 'addApi']);
Route::put('producao/atualizar/{id}',[ProducoesApiController::class, 'updateApi']);
Route::delete('/producao/deletar/{id}', [ProducoesApiController::class, 'deletarApi']);

?>