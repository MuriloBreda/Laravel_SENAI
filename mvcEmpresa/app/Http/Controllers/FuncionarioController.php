<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\dadosPessoais;
use App\Models\Departamento;

use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function listar(){
        $funcionarios = Funcionario::with(['dadosPessoais', 'departamento'])->get();
        return view('listarFuncionario', compact('funcionarios'));
    }

    public function cadastro(){
        $departamentos = Departamento::get();
        return view('cadastrarFuncionario', compact('departamentos'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'email' => 'required|email|unique:funcionarios',
            'dataAdimissao' => 'required|date',
            'departamento_id' => 'nullable|exists:Departamento,id'
        ]);

        $funcionario = Funcionario::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'cargo' => $request->cargo,
            'salario' => $request->salario,
            'email' => $request->email,
            'dataAdimissao' => $request->dataAdimissao,
            'departamento_id' => $request->departamento_id
        ]);

        DadosPessoais::create([
            'CPF' => $request->CPF,
            'RG' => $request->RG,
            'dataNascimento' => $request->dataNascimento,
            'CEP' => $request->CEP,
            'funcionario_id' => $funcionario->id
        ]);

        return redirect()->back()->with('success','Funcionário Cadastrado com sucesso!');

    }

    public function atualizar($id){
        $funcionario = Funcionario::findOrFail($id); // Busca o funcionário pelo ID
        $departamentos = Departamento::get();
        // select * from funcionarios where id = $id
        return view('atualizarFuncionario', compact('funcionario','departamentos'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'email' => 'required|email|unique:funcionarios',
            'dataAdimissao' => 'required|date',
            'departamento_id' => 'nullable|exists:departamento,id'
        ]);

        $funcionario = Funcionario::findOrFail($id); // buscar funcionário para ser atualizado
        $dadosPessoais = DadosPessoais::where('funcionario_id', $funcionario->id)->first();

        $funcionario->nome = $request->nome; // atualizando o campo nome
        $funcionario->sobrenome = $request->sobrenome; // atualizando o campo sobrenome
        $funcionario->cargo = $request->cargo; // atualizando o campo cargo
        $funcionario->salario = $request->salario; // atualizando o campo salario
        $funcionario->email = $request->email; // atualizando o campo email
        $funcionario->dataAdimissao = $request->dataAdimissao; // atualizando o campo dataAdimissao
        $funcionario->departamento_id = $request->departamento_id; // atualizando o campo departamento_id

        $funcionario->save(); // salvando no banco de dados(fazendo update)

        $dadosPessoais->CPF = $request->CPF;
        $dadosPessoais->RG = $request->RG;
        $dadosPessoais->dataNascimento = $request->dataNascimento;
        $dadosPessoais->CEP = $request->CEP;

        $dadosPessoais->save();

        return redirect()->back()->with('success','Funcionário atualizado com sucesso');
    }

}