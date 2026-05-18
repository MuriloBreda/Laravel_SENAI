<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function listar(){
        $query = Setores::query();
        $Setores = $query->get();
        return view('listar', compact('Setores'));
    }

    public function add(Request $request){
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