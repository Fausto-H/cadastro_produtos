<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <h1>Cadastrar Produto</h1>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="categoria">Categoria:</label>
        <select name="categoria" id="categoria" required>
            <option value="Categoria 1">Categoria 1</option>
            <option value="Categoria 2">Categoria 2</option>
            <option value="Categoria 3">Categoria 3</option>
            <option value="Categoria 4">Categoria 4</option>
            <option value="Categoria 5">Categoria 5</option>
            <option value="Categoria 6">Categoria 6</option>
            <option value="Categoria 7">Categoria 7</option>
            <option value="Categoria 8">Categoria 8</option>
            <option value="Categoria 9">Categoria 9</option>
            <option value="Categoria 10">Categoria 10</option>
        </select><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao"></textarea><br>

        <button type="submit">Cadastrar</button>
        <a href="{{ route('produtos.index') }}" class="buttonancora">Voltar</a>
    </form>
</body>
</html>
