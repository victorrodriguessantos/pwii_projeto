<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('style/home.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="text-home">
        <h1>Programação Web II</h1>
        <h2>Projeto feito em aula, juntamente com o professor Alan, utilizando o <span>Lavarel</span> e <span>Banco de Dados</span></h2>
        <hr>
        <p>Objetivo do projeto é consumir os dados inseridos no Banco de Dados, utilize o botão abaixo para nevegar pelos itens
           cadastrador no banco.
        </p>
        <button onclick="window.location='{{ url('listarprodutos') }}'">Acessar itens</button>
        </div>

        <div class="home-image">
            <img src="{{ asset('images/back-home.png') }}" class="img-back">
        </div>

        <footer>
            <p>Pagina desenvolvida por Victor Rodrigues</p>
            <hr>
        </footer>

    </body>
</html>
