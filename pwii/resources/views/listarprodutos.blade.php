<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style/listarprodutos.css') }}">
    </head>

<body>


<div class="btn-back">
<button onclick="window.location='{{ url('/') }}'">Voltar</button>
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






