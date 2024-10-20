<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;


use Illuminate\Http\Request;

class ProdutoController extends Controller {
    
    
    public function index(Request $request) {
        $search = $request->input('search');
        
        $query = Produto::query();
    
        if ($search) {
            $query->whereHas('categoria', function($q) use ($search) {
                $q->where('name_categoria', 'LIKE', "%{$search}%");
            });
            $query->orWhere('name_produto', 'LIKE', "%{$search}%");
        }
    
        $produto = $query->with('categoria')->get();
        $categoria = Categoria::all();
    
        return view('listarprodutos', ['produto' => $produto, 'categoria' => $categoria]);
    }
    
    

// CONECTANDO COM O BANCO PARA ADICIONAR INFORMAÇÕES


// TESTE

// TESTE



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