<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style/tabelas.css') }}">
    </head>

<body>

<div class="navegation">
    <nav>
        <ul>
        <a href="/"><li>Home</li></a>
        <a href="/listarprodutos"><li>Produtos</li></a>
        <a href="/listarcategoria"><li>Categoria</li></a>
        <a href="/listarfornecedor"><li>Fornecedor</li></a>
        </ul>
    </nav>
</div>

<div class="titulo">
    <h1>Lista de Produtos</h1>
</div>

<div class="table-container">
    <table>
        <tr>
            <th>ID</th>
            <th>PRODUTO</th>
            <th>QUANTIDADE</th>
            <th>VALOR</th>
        </tr>

        @foreach ($produto as $tbproduto)
        <tr>
            <td> {{ $tbproduto -> id_produto }} </td>
            <td> {{ $tbproduto -> name_produto }} </td>
            <td> {{ $tbproduto -> quantidade }} </td>
            <td> {{ $tbproduto -> valor }}
        </tr>

        @endforeach

    </table>

</div>

</body>
</html>