<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo!</title>
</head>
<body>
    <h1>Olá!</h1>
    <p>Você foi cadastrado no sistema. Aqui estão seus dados de acesso:</p>
    <ul>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Senha:</strong> {{ $senha }}</li>
    </ul>
    <p>Por favor, mantenha esses dados seguros.</p>
</body>
</html>
