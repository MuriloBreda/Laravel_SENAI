<?php

namespace App\Http\Controllers;
use App\Models\Setores; // em outros casos, mudar o "Setor" para o nome ideal ao projeto

use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'nomeSetor' => 'required|string|max:255',
            'numCorredor' => 'required|numeric|max:255'
        ]);

        Setores::create([
            'nomeSetor' => $request->nomeSetor,
            'numCorredor' => $request->numCorredor
        ]);

        return redirect()->back()->with('success', 'Setor cadastrado com sucesso!');
    }

    public function listar(Request $request){
        try{
        $query = Setores::query();

        // filtro por nome
        if($request->filled('nomeSetor')){
            $query->where('nomeSetor', 'like', '%'.$request->nomeSetor .'%');
        }
        // filtro por número de setor
        $setores = $query->get();

        return view('listarSetor', compact('setores'));

       } catch(\Exception $e){
            return response()->json([
                'setores' => collect(),
                'erro' => 'Erro interno do servidor'
            ], 500);
        }
    }
   
}