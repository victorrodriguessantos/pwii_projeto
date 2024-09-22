<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($contato as $tbcontato)

    <h1 class="c-red">{{ $tbcontato -> name_contato }}</h1>
    <h1>{{ $tbcontato -> id_contato }}</h1>

    
    @endforeach
</body>
</html>