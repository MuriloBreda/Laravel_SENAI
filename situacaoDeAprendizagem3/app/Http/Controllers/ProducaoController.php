<?php

namespace App\Http\Controllers;
use App\Models\Producoes;

use Illuminate\Http\Request;

class ProducoesController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'nomeProduto' => 'required|string|max:255',
            'materia' => 'required|string|max:255',
            'dataFabricacao' => 'required|date',
            'quantidade' => 'required|numeric|min:0',
            'preco' => 'required|numeric|min:0',
        ]);

        Producoes::create([
            'nomeProduto' => $request->nomeProduto,
            'materia' => $request->materia,
            'dataFabricacao' => $request->dataFabricacao,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco
        ]);

        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }

    public function listar(Request $request){
        try{
        $query = Producoes::query();

        // filtro por nome do produto
        if($request->filled('nomeProduto')){
            $query->where('nomeProduto', 'like', '%'.$request->nomeProduto .'%');
        }
        // filtro por data de fabricação
        if($request->filled('dataFabricacao')){
            $query->whereDate('dataFabricacao', $request->dataFabricacao);
        }

        // filtro por matéria-prima
        if($request->filled('materia')){
            $query->where('materia', 'like', '%'.$request->materia .'%');
        }

        $producoes = $query->get();

        return view('listar', compact('producoes'));

       } catch(\Exception $e){
            return response()->json([
                'producoes' => collect(),
                'erro' => 'Erro interno do servidor'
            ], 500);
        }
    }
   
}