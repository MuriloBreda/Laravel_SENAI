<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Informacoes;
use Illuminate\Http\Request;

class AlunoController extends Controller{

    public function listar(){
        $alunos = Aluno::with(['turma','informacoes'])->get();
        return view('listar', compact('alunos'));
    }

    public function create(){
        $turmas = Turma::all();
        return view('cadastro', compact('turmas'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'idade' => 'required|numeric|max:255',
            'dataNascimento' => 'required|string|max:255',
            'turma_id' => 'required|exists:turmas,id'
        ]);

        $informacao = Informacoes::create([
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'idade' => $request->idade,
            'dataNascimento' => $request->dataNascimento,
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'preco' => $request->preco,
            'turma_id' => $request->turma_id,
            'informacoes_id' => $informacao->id
        ]);

        return redirect()->back()->with('success','Aluno cadastrado com sucesso!');
    }

    public function atualizar($id){
        $aluno = Aluno::with('informacao')->findOrFail($id);
        $turmas = Turma::all();
        return view('atualizar', compact('aluno','turmas'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'idade' => 'required|numeric|max:255',
            'dataNascimento' => 'required|string|max:255'
        ]);

        $aluno = Aluno::findOrFail($id);

        // atualiza aluno
        $produto->update([
            'nome' => $request->nome,
            'email' => $request->email
        ]);

        // atualiza informações
        $aluno->informacao->update([
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'idade' => $request->idade,
            'dataNascimento' => $request->dataNascimento,
        ]);

        return redirect()->back()->with('success','Aluno atualizado com sucesso!');
    }

    public function deletar($id){
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('aluno.listar')->with('success','Aluno excluído com sucesso!');
    }
}