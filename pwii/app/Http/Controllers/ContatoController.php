<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller {

    public function index(Request $request) {
        $search = $request->input('search');
        
        if ($search) {
            $contato = Contato::where('name_contato', 'LIKE', "%{$search}%")->get();
        } else {
            $contato = Contato::all();
        }
        
        return view('listarcontato', ['contato' => $contato]);
    }

    public function store(Request $request)
    {
        // Acessando os dados da requisição
        $txtContato = $request->input('name_contato');
        $txtTelefone = $request->input('telefone');
        $txtEndereco = $request->input('endereco');

        // Inserindo os dados no banco
        Contato::create([
            'name_contato' => $txtContato,
            'telefone' => $txtTelefone,
            'endereco' => $txtEndereco
        ]);

        return response()->json(['success' => 'Contato cadastrado com sucesso!']);
    }

    public function show($id)
{
    $contato = Contato::find($id);

    if (!$contato) {
        return response()->json(['error' => 'Contato não encontrado'], 404);
    }

    return response()->json($contato);
}

}
