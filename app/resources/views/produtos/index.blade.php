<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="icon" href="{{ asset('img/iconeproduto.png') }}" type="image/x-icon">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <h1 class="titulo-produtos">Lista de Produtos</h1>

    <form action="{{ route('produtos.index') }}" method="GET">
        <select name="tipo_pesquisa" class="selectfiltro">
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
                    <th class="tablenome">Nome</th>
                    <th class="tablecategoria">Categoria</th>
                    <th class="tabledescricao">Descrição</th>
                    <th class="tableacoes">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                <tr>
                    <td>{{ substr($produto->id, 0, 20) }}</td>
                    <td>{{ strlen($produto->nome) > 20 ? substr($produto->nome, 0, 20) . '...' : $produto->nome }}</td>
                    <td>{{ strlen($produto->categoria) > 20 ? substr($produto->categoria, 0, 20) . '...' : $produto->categoria }}</td>
                    <td>{{ strlen($produto->descricao) > 30 ? substr($produto->descricao, 0, 20) . '...' : $produto->descricao }}</td>

                    <td>
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="buttonedit">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Links de paginação -->
        <div class="pagination-container">
            <p class="pagination-summary">{{ $produtos->firstItem() }} a {{ $produtos->lastItem() }} de {{ $produtos->total() }} produtos</p>
            <div class="pagination-links">
                {{ $produtos->links('pagination::simple-bootstrap-4') }}
            </div>
        </div>


    </div>

    </div>
</body>

</html>