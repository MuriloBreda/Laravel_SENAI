<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Produto;
use Illuminate\Http\Request;

class SetorApiController extends Controller{
    public function listarApi(){
        $setores = Setor::all();    
        return response()->json($setores);
    }

    public function addApi(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'nCorredor' => 'required|string|max:255'
        ]);

        Setor::create([
            'nome' => $request->nome,
            'nCorredor' => $request->nCorredor
        ]);

        return response()->json([
            'message' => 'Setor criado!',
            'setor' => $setor
        ], 200);
    }
}