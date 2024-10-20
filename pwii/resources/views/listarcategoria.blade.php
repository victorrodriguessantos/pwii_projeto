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
        <a href="/listarcontato"><li>Contato</li></a>
        <a href="/listarfornecedor"><li>Fornecedor</li></a>
        </ul>
    </nav>
</div>

<!-- Inicio Filtro -->
<div class="search">
<form action="{{ route('categoria.index') }}" method="GET">
    <input class="box-search"type="text" name="search" placeholder="Pesquisar Categoria">
    <input class="btn-search"type="submit" value="Pesquisar">
</form>
</div>
<!-- Fim Filtro -->

<!-- Inicio Formulario -->
<div class="btn-adc">
    <button id="abrir">Adicionar item</button>

    <dialog>
        <h2>Formulario</h2>

        <form action="{{ route('categoria.store') }}" method="POST">
            @csrf <!-- Adicione o token CSRF para segurança -->
            <label>Nome</label>
            <input name="name_categoria" type="text" placeholder="Nome da Categoria" required>

            <input type="submit" value="Cadastrar">
        </form>

        <button id="fechar">Fechar</button>
    </dialog>
</div>
<!-- Fim Formulario -->

<div class="titulo">
    <h1>Categorias</h1>
</div>

<div class="table-container">
    <table>
        <tr>
            <th>ID</th>
            <th>CATEGORIA</th>
        </tr>

        @foreach ($categoria as $tbcategoria)
        <tr>
            <td> {{ $tbcategoria -> id_categoria }} </td>
            <td> {{ $tbcategoria -> name_categoria }} </td>
        </tr>

        @endforeach

    </table>

</div>

<script src="{{ asset('script/index.js') }}"></script>

</body>
</html>