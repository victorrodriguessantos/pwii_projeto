<?php

namespace App\Http\Controllers;

use App\Models\Contato;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index() {
        $contato = Contato::all();

        return view('listarcontato', ['contato' => $contato]);

    }}
