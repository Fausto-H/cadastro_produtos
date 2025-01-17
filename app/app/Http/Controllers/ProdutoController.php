<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $query = Produto::query();

        if ($request->has('pesquisa') && $request->pesquisa != '') {
            if ($request->tipo_pesquisa == 'nome') {
                $query->where('nome', 'like', '%' . $request->pesquisa . '%');
            } elseif ($request->tipo_pesquisa == 'categoria') {
                $query->where('categoria', $request->pesquisa);
            }
        }

        $produtos = $query->get();

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
}
