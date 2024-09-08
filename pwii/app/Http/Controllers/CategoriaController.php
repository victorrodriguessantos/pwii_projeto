<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller {

    public function index() {
        $categoria = Categoria::all();

        return view('listarcategoria', ['categoria' => $categoria]);

    }

}