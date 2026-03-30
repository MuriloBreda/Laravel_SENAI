<?php

namespace App\Http\Controllers;
use App\Models\Aluno;

use Illuminate\Http\Request;

class AlunoController extends Controller{
    public function listar(){
        $query = Aluno::query();
        $alunos = $query->get();
        return view('listar', compact('alunos'));
    }

    public function add(Request $request){

    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|string|max:255|unique:alunos,email'
    ]);

    Aluno::create([
        'nome' => $request->nome,
        'email' => $request->email
    ]);

    return redirect()->back()->with('sucess','Aluno Cadastrado com sucesso!');

    }

    public function atualizar($id){
        $aluno = Aluno::findOrFail($id); //Busca o aluno pelo ID
        // select * from alunos where id = $id
        return view('atualizar', compact('aluno'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => "required|string|max:255|unique:alunos,email,$id"
        ]);

        $aluno = Aluno::findOrFail($id); //buscar o aluno pra ser atualizado

        $aluno->nome = $request->nome; //atualizando o campo nome
        $aluno->email = $request->email; //atualizando o campo email

        $aluno->save(); //salvando no banco de dados
        return redirect()->back()->with('seccess','Aluno atualizado com sucesos');
    }

    public function deletar($id){
        $aluno = Aluno::findOrFail($id); // buscar o aluno para depois deletar
        $aluno->delete();

        return redirect()->route('aluno.listar')->with('seccess','Aluno excluido com secesso!');

    }
    
}

?>