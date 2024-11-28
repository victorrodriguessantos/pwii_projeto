<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\NovoUsuarioMail;
use Illuminate\Support\Facades\Mail;

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
        $request->validate([
            'nome_user' => 'required|email|unique:tbusuarios,user_email',
            'senha_user' => 'required|min:6',
        ]);

        $email = $request->input('nome_user');
        $senha = $request->input('senha_user');

        // Cadastra o usuário no banco
        Login::create([
            'user_email' => $email,
            'user_key' => Hash::make($senha), // Salva a senha criptografada
        ]);

        // Enviar e-mail com os dados de acesso
        Mail::to($email)->send(new NovoUsuarioMail($email, $senha));

        return redirect()->back()->with('success', 'Usuário cadastrado com sucesso e e-mail enviado!');
    }

    // Autentica o usuário
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Busca o usuário pelo email
        $user = Login::where('user_email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->user_key)) {
            // Salva o login na sessão
            $request->session()->put('user_id', $user->id_user);

            // Redireciona para a aba de produtos
            return redirect()->route('produtos.index');
        }

        return redirect()->back()->withErrors(['error' => 'Credenciais inválidas']);
    }
}
