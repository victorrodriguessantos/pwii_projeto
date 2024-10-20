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
<form action="{{ route('contato.index') }}" method="GET">
    <input class="box-search"type="text" name="search" placeholder="Pesquisar Contato">
    <input class="btn-search"type="submit" value="Pesquisar">
</form>
</div>
<!-- Fim Filtro -->

<!-- Inicio Formulario -->
<div class="btn-adc">
    <button id="abrir">Adicionar item</button>

    <dialog>
        <h2>Formulario</h2>

        <form action="{{ route('contato.store') }}" method="POST">
            @csrf <!-- Adicione o token CSRF para segurança -->
            <label>Nome</label>
            <input name="name_contato" type="text" placeholder="Nome" required>
            <input name="telefone" type="number" placeholder="Telefone" required>
            <input name="endereco" type="text" placeholder="Endereço" required>

            <input type="submit" value="Cadastrar">
        </form>

        <button id="fechar">Fechar</button>
    </dialog>
</div>
<!-- Fim Formulario -->

<div class="titulo">
    <h1>Contatos</h1>
</div>

<div class="table-container">
    <table>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>TELEFONE</th>
            <th>ENDEREÇO</th>
        </tr>

        @foreach ($contato as $tbcontato)
        <tr>
            <td> {{ $tbcontato -> id_contato }} </td>
            <td> {{ $tbcontato -> name_contato }} </td>
            <td> {{ $tbcontato -> telefone }} </td>
            <td> {{ $tbcontato -> endereco }} </td>

        </tr>

        @endforeach

    </table>

</div>

<script src="{{ asset('script/index.js') }}"></script>

</body>
</html>