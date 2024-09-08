<?php

namespace App\Http\Controllers;

use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller {

    public function index() {
        $produto = Produto::all();

        return view('listarprodutos', ['produto' => $produto]);


/*        foreach($produto as $p) {


            echo "<p>$p->id_produto";
            echo "<h1>$p->name_produto";


        }
*/
    }

}