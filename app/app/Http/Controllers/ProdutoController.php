<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrapFive(); // Para usar o estilo do Bootstrap


class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $query = Produto::query();

        // Verifica se há pesquisa e aplica os filtros
        if ($request->has('pesquisa') && $request->pesquisa != '') {
            if ($request->tipo_pesquisa == 'nome') {
                $query->where('nome', 'ilike', '%' . $request->pesquisa . '%');
            } elseif ($request->tipo_pesquisa == 'categoria') {
                $query->where('categoria', 'ilike', '%' . $request->pesquisa . '%');
            }
        }

        // Busca os produtos com paginação, utilizando a query configurada
        $produtos = $query->paginate(6)->appends($request->all());

        return view('produtos.index', compact('produtos'));
    }


    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:produtos',
            'categoria' => 'required',
            'descricao' => 'nullable',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|unique:produtos,nome,' . $id,
            'categoria' => 'required',
            'descricao' => 'nullable',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return redirect()->route('produtos.index');
    }

    public function destroy($id)
    {
        // Encontre o produto pelo ID
        $produto = Produto::find($id);

        if ($produto) {
            // Excluir o produto
            $produto->delete();

            // Redirecionar de volta para a lista de produtos com uma mensagem de sucesso
            return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
        }

        // Caso o produto não seja encontrado
        return redirect()->route('produtos.index')->with('error', 'Produto não encontrado!');
    }
}
