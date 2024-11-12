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

    public function show($id)
    {
        try {
            $produto = Produto::with('categoria')->find($id);
    
            if (!$produto) {
                return response()->json(['error' => 'Produto não encontrado'], 404);
            }
    
            return response()->json($produto);
    
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar o produto: ' . $e->getMessage()], 500);
        }
    }
    

// CONECTANDO COM O BANCO PARA ADICIONAR INFORMAÇÕES


public function store(Request $request)
{
    $txtNome = $request->input('txtNome');
    $txtQtd = $request->input('txtQtd');
    $txtValor = $request->input('txtValor');
    $txtCat = $request->input('txtCat');

    // Inserindo os dados no banco
    Produto::create([
        'name_produto' => $txtNome,
        'quantidade' => $txtQtd,
        'valor' => $txtValor,
        'id_categoria' => $txtCat
    ]);

    return response()->json(['success' => 'Produto cadastrado com sucesso!']);
}


}