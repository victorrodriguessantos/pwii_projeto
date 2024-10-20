<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ContatoController;





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

Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos/store', [ProdutoController::class, 'store'])->name('produtos.store');
Route::get('/listarprodutos', [ProdutoController::class, 'index'])->name('produtos.index');


Route::post('/categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/listarcategoria', [CategoriaController::class, 'index'])->name('categoria.index');

Route::post('/contato/store', [ContatoController::class, 'store'])->name('contato.store');
Route::get('/listarcontato', [ContatoController::class, 'index'])->name('contato.index');

