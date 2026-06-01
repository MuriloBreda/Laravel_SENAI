<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autor;

use Illuminate\Http\Request;

class AutorController extends Controller
{
     public function listar(Request $request){
        try {
            $query = Autor::query();
            
            // Filtro por nome
            // Select * from autores where nome like %VAR%
            if ($request->filled('nome')) {
                $query->where('nome', 'like', '%'.$request->nome . '%');
            }
            elseif ($request->filled('telefone')) {
                $query->where('telefone', 'like', '%'.$request->telefone . '%');
            }

            $autores = $query->get();

            return view('listarAutor', compact('autores'));

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    // public function add(Request $request){
    //     $request->validate([
    //         'nome' => 'required|string|max:255',
    //         'dataNascimento' => 'required|date',
    //         'email' => 'required|email|unique:autores,email',
    //         'telefone' => 'required|string|max:20',
    //     ]);
        
    //     Autor::create([
    //         'nome' => $request->nome,
    //         'dataNascimento' => $request->dataNascimento,
    //         'email' => $request->email,
    //         'telefone' => $request->telefone,
    //     ]);

    //     return redirect()->back()->with('success', 'Autor Cadastrado com sucesso!');
    // }
}