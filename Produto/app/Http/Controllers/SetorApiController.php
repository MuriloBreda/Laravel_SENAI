<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    public function listarApi(){
        $setores = Setores::all();
        return response()->json($setores);
    }

    public function addApi(Request $request){
        $request->validate([
        'nome' => 'required|string|max:255',
        'num_corredor' => 'required|integer',
        // para poder ser nulo ou existir na tabela setores
    ]);
        
    $setor = Setores::create([
        'nome' => $request->nome,
        'num_corredor' => $request->num_corredor,
    ]);

        return response()->json([
            'message' => 'Setor Criado',
            'setor' => $setor
        ], 200);
    }

    public function updateApi(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'num_corredor' => 'required|int',
        ]);

        $setor = Setores::findOrFail($id); // Busca o produto para ser atualizado

        $setor->nome = $request->nome; // Atualizando o campo nome
        $setor->num_corredor = $request->num_corredor;

        $setor->save(); // Salvando no banco de dados(fazendo update)

        return response()->json([
            'message' => "Setor Atualizado!",
            'setor' => $setor
        ], 200);
    }

    public function deletarApi($id){
        $setor = Setores::findOrFail($id); // Buscar o setor pelo ID
        $setor->delete(); // Deletar o setor do banco de dados

        return response()->json([
            'message' => "Setor Deletado com Sucesso!",
            'setor' => $setor
        ], 200);
    }
}