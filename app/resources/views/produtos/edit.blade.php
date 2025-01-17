<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <h1>Editar Produto</h1>

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ $produto->nome }}" required><br>

        <label for="categoria">Categoria:</label>
        <select name="categoria" id="categoria" required>
            <option value="Categoria 1" {{ $produto->categoria == 'Categoria 1' ? 'selected' : '' }}>Categoria 1</option>
            <option value="Categoria 2" {{ $produto->categoria == 'Categoria 2' ? 'selected' : '' }}>Categoria 2</option>
            <option value="Categoria 3" {{ $produto->categoria == 'Categoria 3' ? 'selected' : '' }}>Categoria 3</option>
            <option value="Categoria 4" {{ $produto->categoria == 'Categoria 4' ? 'selected' : '' }}>Categoria 4</option>
            <option value="Categoria 5" {{ $produto->categoria == 'Categoria 5' ? 'selected' : '' }}>Categoria 5</option>
            <option value="Categoria 6" {{ $produto->categoria == 'Categoria 6' ? 'selected' : '' }}>Categoria 6</option>
            <option value="Categoria 7" {{ $produto->categoria == 'Categoria 7' ? 'selected' : '' }}>Categoria 7</option>
            <option value="Categoria 8" {{ $produto->categoria == 'Categoria 8' ? 'selected' : '' }}>Categoria 8</option>
            <option value="Categoria 9" {{ $produto->categoria == 'Categoria 9' ? 'selected' : '' }}>Categoria 9</option>
            <option value="Categoria 10" {{ $produto->categoria == 'Categoria 10' ? 'selected' : '' }}>Categoria 10</option>
        </select><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao">{{ $produto->descricao }}</textarea><br>

        <button type="submit">Salvar</button>
        <a href="{{ route('produtos.index') }}" class="buttonancora">Voltar</a>
    </form>
</body>
</html>
