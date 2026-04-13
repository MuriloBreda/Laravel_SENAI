<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller{

    public function listarEditora(){
        $editoras = Editora::all(); // usando o all() pq quero apenas listar
        return view('listarEditora', compact('editoras'));
    }

    public function add(Request $request){

        $request->validate([
            'nomeEditora' => 'required|string|max:255',
            'cnpj' => 'required|numeric|max:255',
            'pais' => 'required|string|max:255',
            'cidade' => 'required|string|max:255'
        ]);

        Setor::create([
            'nomeEditora' => $request->nomeEditora,
            'cnpj' => $request->cnpj,
            'pais' => $request->pais,
            'cidade' => $request->cidade
            
        ]);

        return redirect()->back()->with('success','Editora cadastrada com sucesso!');
    }
}