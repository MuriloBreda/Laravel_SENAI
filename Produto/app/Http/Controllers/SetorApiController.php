<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Setores;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    public function listarApi(Request $request){
        try {
            $query = Setores::query();
            
            // Filtro por nome
            // Select * from setores where nome like %VAR%
            if ($request->filled('nome')) {
                $query->where('nome', 'like', '%'.$request->nome . '%');
            }
            // Filtros por número do setor
            if ($request->filled('num_setor')) {
                $query->where('num_setor', $request->num_setor);
            }

            $setores = $query->get();

            return response()->json([
                'succes' => true,
                'data' => $setores
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function addApi(Request $request){
        try {
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
                'success' => true,
                'message' => 'Setor Criado',
                'setor' => $setor
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação',
                'erros' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function updateApi(Request $request, $id){
        try {
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro na validação',
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
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function deletarApi($id){
        try {
            $setor = Setores::findOrFail($id); // Buscar o setor pelo ID
            $setor->delete(); // Deletar o setor do banco de dados

            return response()->json([
                'message' => "Setor Deletado com Sucesso!",
                'setor' => $setor
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Setor não encontrado'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}