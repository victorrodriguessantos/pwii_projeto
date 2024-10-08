<?php

namespace App\Http\Controllers;

use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller {

    public function index() {
        $produto = Produto::all();

        return view('listarprodutos', ['produto' => $produto]);

    }

// CONECTANDO COM O BANCO PARA ADICIONAR INFORMAÇÕES
public function store()
{
    // Acessando os dados diretamente do $_POST
    $txtNome = $_POST['txtNome'];
    $txtQtd = $_POST['txtQtd'];
    $txtValor = $_POST['txtValor'];
    $txtCat = $_POST['txtCat'];



    // Inserindo os dados no banco
    Produto::create([
        'name_produto' => $txtNome,
        'quantidade' => $txtQtd,
        'valor' => $txtValor,
        'id_categoria' => $txtCat

    ]);

    return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
}
}