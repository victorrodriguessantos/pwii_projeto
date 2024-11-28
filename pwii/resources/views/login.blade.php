<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Minha Plataforma</title>
    <link rel="stylesheet" href="{{ asset('style/login.css') }}">
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- Botão para abrir o modal de cadastro -->
    <div class="btn-adc">
        <button id="abrir">Adicionar Usuário</button>
    </div>

    <!-- Modal de cadastro -->
     <>
    <dialog id="modal-cadastro">
        <h2>Cadastrar Novo Usuário</h2>

        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <label>Email:</label>
            <input name="nome_user" type="email" placeholder="Email do Usuário" required>
            <label>Senha:</label>
            <input name="senha_user" type="password" placeholder="Senha do Usuário" required>
            <button type="submit" class="btn-cadastrar">Cadastrar</button>
        </form>

        <button id="fechar">Fechar</button>
    </dialog>

    <!-- Formulário de Login -->
    <div class="login-container">
        <div class="login-card">
            <h1>Bem-vindo</h1>
            <p>Faça login para continuar</p>
            <form action="{{ route('login.authenticate') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu email" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password" placeholder="Digite sua senha" required>
                </div>
                <button type="submit" class="btn-login">Entrar</button>
            </form>
        </div>
    </div>

    <script>
        const abrirBtn = document.getElementById('abrir');
        const fecharBtn = document.getElementById('fechar');
        const modal = document.getElementById('modal-cadastro');

        abrirBtn.addEventListener('click', () => {
            modal.showModal();
        });

        fecharBtn.addEventListener('click', () => {
            modal.close();
        });
    </script>
</body>
</html>
