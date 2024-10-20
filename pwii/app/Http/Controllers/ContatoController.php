<?php

namespace App\Http\Controllers;

use App\Models\Contato;

use Illuminate\Http\Request;

class ContatoController extends Controller {

    public function index(Request $request) {
        
            $search = $request->input('search');
            if ($search) {
                $contato = Contato::where('name_contato', 'LIKE', "%{$search}%")->get();
            }
            else {
                $contato = Contato::all();
            }
            return view('listarcontato', ['contato' => $contato]);
        }  

// CONECTANDO COM O BANCO PARA ADICIONAR INFORMAÇÕES

public function store()
{
    // Acessando os dados diretamente do $_POST
    $txtContato = $_POST['name_contato'];
    $txtTelefone = $_POST['telefone'];
    $txtEndereco = $_POST['endereco'];


    // Inserindo os dados no banco
    Contato::create([
        'name_contato' => $txtContato,
        'telefone' => $txtTelefone,
        'endereco' => $txtEndereco

    ]);


return redirect()->back()->with('success', 'Contato cadastrado com sucesso!');

}
}