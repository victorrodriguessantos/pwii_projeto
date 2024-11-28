<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoUsuarioMail;


class LoginController extends Controller
{
    // Exibe a tela de login
    public function index()
    {
        return view('login');
    }

    // Cadastra um novo usuário
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome_user' => 'required|email|unique:tbusuarios,user_email',
            'senha_user' => 'required|min:6',
        ]);

        $email = $request->input('nome_user');
        $senha = $request->input('senha_user');

        // Criação do usuário no banco de dados
        try {
            $usuario = Login::create([
                'user_email' => $email,
                'user_key' => Hash::make($senha), // Armazena a senha de forma segura
            ]);

            // Envia e-mail com os dados de acesso
            Mail::to($email)->send(new NovoUsuarioMail($email, $senha));

            return redirect()->back()->with('success', 'Usuário cadastrado com sucesso e e-mail enviado!');
        } catch (\Exception $e) {
            // Em caso de erro, retorna para a página com a mensagem
            return redirect()->back()->withErrors(['error' => 'Erro ao cadastrar usuário: ' . $e->getMessage()]);
        }
    }

    // Autentica o usuário
    public function authenticate(Request $request)
    {
        // Validação dos dados de login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Busca o usuário pelo e-mail
        $user = Login::where('user_email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->user_key)) {
            // Salva o ID do usuário na sessão
            $request->session()->put('user_id', $user->id_user);

            // Redireciona para a aba de produtos
            return redirect()->route('produtos.index');
        }

        // Retorna erro em caso de credenciais inválidas
        return redirect()->back()->withErrors(['error' => 'Credenciais inválidas']);
    }
}