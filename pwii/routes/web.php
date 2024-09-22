<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FornecedorController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto', 'App\http\Controllers\ProdutoController@index');
Route::get('/listarprodutos', 'App\http\Controllers\ProdutoController@index');
Route::get('/listarcategoria', 'App\http\Controllers\CategoriaController@index');
Route::get('/listarfornecedor', 'App\http\Controllers\FornecedorController@index');
Route::get('/listarcontato', 'App\http\Controllers\ContatoController@index');