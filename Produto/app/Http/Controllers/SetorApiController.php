<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    public function listarApi(){
        try{
            $query = Setores::query();

            // filtro por nome
            // select * from setores where nome like %NOME%
            if($request->filled('nome')){
                $query->where('nome', 'like', '%' . $request->nome . '%');
            }

            // filtro por número do corredor
            // select * from setores where num_setor = NUM_SETOR
            if($request->filled('num_setor')){
                $query->where('num_setor', $request->num_corredor);
            }

            $setores = $query->get();

            return response()->json([
                'success' => true,
                'data' => $setores
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function addApi(Request $request){
        try{
            $request->validate([
            'nome' => 'required|string|max:255',
            'num_setor' => 'required|integer',
            // para poder ser nulo ou existir na tabela setores
        ]);
            
        $setor = Setores::create([
            'nome' => $request->nome,
            'num_setor' => $request->num_corredor,
        ]);

            return response()->json([
                'success' => true,
                'message' => 'Setor Criado',
                'setor' => $setor
            ], 201);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateApi(Request $request, $id){
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'num_setor' => 'required|int',
            ]);

            $setor = Setores::findOrFail($id); // Busca o produto para ser atualizado

            $setor->nome = $request->nome; // Atualizando o campo nome
            $setor->num_corredor = $request->num_corredor;

            $setor->save(); // Salvando no banco de dados(fazendo update)

            return response()->json([
                'message' => "Setor Atualizado!",
                'setor' => $setor
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Setor não encontrado'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deletarApi($id){
        try{
            $setor = Setores::findOrFail($id); // Buscar o setor pelo ID
            $setor->delete(); // Deletar o setor do banco de dados

             return response()->json([
                'message' => "Setor Deletado com Sucesso!",
            ], 200);
        }catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Setor não encontrado'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'error' => $e->getMessage()
            ], 500);
    }
}
}