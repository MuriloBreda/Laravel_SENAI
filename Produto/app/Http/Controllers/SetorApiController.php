<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    public function listarApi(Request $request){
       try{
        $query = Setores::query();

        // filtro por nome
        if($request->filled('nomeSetor')){
            $query->where('nomeSetor', 'like', '%'.$request->nomeSetor .'%');
        }
        // filtro por número de setor
        if($request->filled('numCorredor')){
            $query->where('numCorredor', $request->numCorredor);
        }

        $setores = $query->get();

        return response()->json([
            'success' => true,
            'data' => $setores
        ], 200);

       } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function addApi(Request $request){
        try{
            $request->validate([
                'nomeSetor' => 'required|string|max:255',
                'numCorredor' => 'required|numeric|max:255'
            ]);

            Setores::create([
                'nomeSetor' => $request->nomeSetor,
                'numCorredor' => $request->numCorredor
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Setor Criado',
                'setor' => $setor
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'success' => false,
                'message' =>'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateApi(Request $request, $id){
        try{
            $request->validate([
                'nomeSetor' => 'required|string|max:255',
                'numCorredor' => 'required|numeric|max:255'
            ]);

            $setor = Setores::findOrFail($id); //busca setor para ser atualizado

            $setor->nomeSetor = $request->nome;
            $setor->numCorredor = $request->numCorredor;

            $setor->save(); // Salvando no banco de dados(fazendo update)

            return response()->json([
                'message' => "Setor Atualizado!",
                'setor' => $setor
            ], 200);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro na validação',
                'errors' => $e->errors()
            ], 422);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => 'Setor não encontrado'
            ], 404);
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function deletarApi($id){
        try{
            $setor = Setores::findOrFail($id); // Buscar o setor pelo ID
            $setor->delete(); // Deletar o setor do banco de dados

            return response()->json([
                'message' => "Setor Deletado com Sucesso!",
                'setor' => $setor
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => 'Setor não encontrado'
            ], 404);
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}