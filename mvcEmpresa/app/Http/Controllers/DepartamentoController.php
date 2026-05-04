<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller{

    public function listar(){
        $departamentos = Departamento::all(); 
        return view('listarDepartamento', compact('departamentos'));
    }

    public function add(Request $request){

        $request->validate([
            'setor' => 'required|string|max:255',
            'orcamento' => 'required|numeric|',
            'dataCriacao' => 'required|string|max:255',
        ]);

        Departamento::create([
            'setor' => $request->setor,
            'orcamento' => $request->orcamento,
            'dataCriacao' => $request->dataCriacao
        ]);

        return redirect()->back()->with('success','Departamento cadastrado com sucesso!');
    }
}

?>