<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function listar(Request $request){
        try {
            $query = Setores::query();
            
            // Filtro por nome
            // Select * from setores where nome like %VAR%
            if ($request->filled('nome')) {
                $query->where('nome', 'like', '%'.$request->nome . '%');
            }

            $setores = $query->get();

            return view('listarSetores', compact('setores'));

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function add(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'num_corredor' => 'required|integer',
        ]);

        Setores::create([
            'nome' => $request->nome,
            'num_corredor' => $request->num_corredor,
        ]);

        return redirect()->back()->with('success', 'Setor Cadastrado com sucesso!');
    }
}