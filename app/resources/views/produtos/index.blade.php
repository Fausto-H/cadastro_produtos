<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <h1 class="titulo-produtos">Lista de Produtos</h1>

    <form action="{{ route('produtos.index') }}" method="GET">
        <select name="tipo_pesquisa"  class="selectfiltro">
            <option value="nome">Nome</option>
            <option value="categoria">Categoria</option>
        </select>
        <input type="text" name="pesquisa" class="inputfiltro" placeholder="Buscar...">
        <button type="submit" class="buttonfiltro">Pesquisar</button>
        <a href="{{ route('produtos.create') }}" class="buttonancora">Cadastrar Produto</a>
    </form>

    <div class="tableindex">
    <table>
        <thead>
            <tr>
                <th class="tableid">ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th class="tableacoes">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->categoria }}</td>
                <td>{{ $produto->descricao }}</td>
                <td>
                    <a href="{{ route('produtos.edit', $produto->id) }}" class="buttonedit">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>

</html>