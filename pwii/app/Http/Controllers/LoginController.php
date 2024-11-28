<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        // Cadastra o usuário no banco
        Login::create([
            'user_email' => $request->input('nome_user'),
            'user_key' => Hash::make($request->input('senha_user')), // Salva a senha criptografada
        ]);

        return redirect()->back()->with('success', 'Usuário cadastrado com sucesso!');
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
            // Salva o login na sessão e redireciona para a aba de produtos
            session(['user_id' => $user->id_user]);
            return redirect()->route('produtos.index');
        }

        return redirect()->back()->withErrors(['error' => 'Credenciais inválidas']);
    }
}
