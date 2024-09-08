<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;

use Illuminate\Http\Request;

class FornecedorController extends Fornecedor {

    public function index() {
        $fornecedor = Fornecedor::all();

        return view('listarfornecedor', ['fornecedor' => $fornecedor]);

    }

}