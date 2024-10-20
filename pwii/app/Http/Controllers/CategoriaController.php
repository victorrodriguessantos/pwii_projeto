<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;

use Illuminate\Http\Request;

class CategoriaController extends Controller {

    public function index(Request $request) {
        $search = $request->input('search');
        if ($search) {
            $categoria = Categoria::where('name_categoria', 'LIKE', "%{$search}%")->get();
        } else {
            $categoria = Categoria::all();
        }
        return view('listarcategoria', ['categoria' => $categoria]);
    }  

// CONECTANDO COM O BANCO PARA ADICIONAR INFORMAÇÕES

public function store()
{
    // Acessando os dados diretamente do $_POST
    $txtCategoria = $_POST['name_categoria'];

    // Inserindo os dados no banco
    Categoria::create([
        'name_categoria' => $txtCategoria
    ]);


return redirect()->back()->with('success', 'Categoria cadastrado com sucesso!');

}
}