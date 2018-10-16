<?php

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

Route::group(['prefix' => 'api'], function() {
    Route::get('/livros', function () { return response()->json(['message' => 'API Livros', 'status' => 'Connected']); });
    Route::get('/estantes', function () { return response()->json(['message' => 'API Estantes', 'status' => 'Connected']); });

    Route::resource('livros', 'LivrosController');
    Route::resource('estantes', 'EstantesController');

    Route::get('estante_livro', 'EstanteLivroController@index');
    Route::get('estante_livro/{id}', 'EstanteLivroController@show');
    Route::post('estante_livro/alocar', 'EstanteLivroController@alocar');
    Route::post('estante_livro/remover', 'EstanteLivroController@remover');
});
