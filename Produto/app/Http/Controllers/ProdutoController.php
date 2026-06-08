<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Setores;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Listar
    public function listar(){
        $produtos = Produto::with(['setor', 'detalhes'])->get();
        return view('listar', compact('produtos'));
    }

    // Tela Cadastro
    public function cadastrar(){

        if(auth()->user()->tipo != 'usuario'){
            abort(403);
        }

        $setores = Setores::all();
        return view('cadastro', compact('setores'));
    }

    // Salvar Produtos + Detalhes
    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|numeric|max:1000',
            'preco' => 'required|numeric',
            'setor_id' => 'required|exists:setores,id',
            'descricao' => 'required',
            'tamanho' => 'required',
            'peso' => 'required'
        ]);

        $produto = Produto::create([
            'nome'=> $request->nome,
            'quantidade'=> $request->quantidade,
            'preco'=> $request->preco,
            'setor_id'=> $request->setor_id
        ]);

        // salva detalhes
        $produto->detalhes()->create([
            'descricao' => $request->descricao,
            'tamanho' => $request->tamanho,
            'peso' => $request->peso
        ]);

        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }

    public function editar($id){
        $produto = Produto::with('detalhes')->findOrFail($id);
        $setores = Setores::all();

        return view('atualizar', compact('produto', 'setores'));
    }

    public function atualizar(Request $request, $id){
        $request->validate([
            'nome' => 'required',
            'preco' => 'required',
            'quantidade' => 'required|numeric|max:1000',
            'setor_id' => 'required|exists:setores,id',
            'descricao' => 'required',
            'tamanho' => 'required',
            'peso' => 'required'
        ]);

        $produto = Produto::findOrFail($id);

        $produto->update([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
            'setor_id' => $request->setor_id
        ]);

        // atualiza ou cria detalhes
        $produto->detalhes()->updateOrCreate(
            ['produto_id' => $produto->id],
            [
                'descricao' => $request->descricao,
                'tamanho' => $request->tamanho,
                'peso' => $request->peso
            ]
        );

        return redirect()->route('produto.listar')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    // Deletar
    public function deletar($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produto.listar')
            ->with('success','Produto excluído com sucesso!');
    }
    
}