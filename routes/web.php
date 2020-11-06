<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ContextoController@index')->name('index');

Route::get('/palavra/{id}', 'PalavraController@index')->name('index.palavras');

Route::get('/fazer/sugestoes', 'SugestaoController@index')->name('sugestao');
Route::post('/fazer/sugestao/do', 'SugestaoController@store')->name('sugestao.do');
Route::post('/fazer/sugestao/buscar/do', 'SugestaoController@search')->name('sugestao.search.do');

Route::get('/usuario', 'AuthController@index')->name('usuario');
Route::get('/usuario/login', 'AuthController@showLoginForm')->name('usuario.login');
Route::post('/usuario/login/do', 'AuthController@login')->name('usuario.login.do');
Route::get('/usuario/logout', 'AuthController@logout')->name('usuario.logout');

Route::get('/usuario/cadastrar', 'Auth\RegisterController@showRegistrationForm')->name('usuario.register');
Route::post('/usuario/cadastrar', 'Auth\RegisterController@register')->name('usuario.register.do');

Route::get('/likes', 'LikeController@index')->name('like');
Route::post('/cadastrar/like/do', 'LikeController@store')->name('like.do');
Route::get('/painel_de_controle/admin/index', 'PainelController@index')->name('cpanel.index');
Route::get('/painel_de_controle/admin/remover/sugestao/{id}', 'SugestaoController@remove')->name('sugestao.remove');
//Route::post('/painel_de_controle/admin/search', 'PainelController@search');
Route::get('/painel_de_controle/admin/palavra/create', "PalavraController@create")->name('cpanel.palavra.create');
Route::post('/painel_de_controle/admin/palavra/store/do', "PalavraController@store")->name('cpanel.palavra.create.do');
Route::get('/painel_de_controle/admin/palavras/listagem', 'PalavraController@showAll')->name('cpanel.palavra.list');
Route::get('/painel_de_controle/admin/palavra/remove/{id}', 'PalavraController@remove')->name('palavra.remove');
Route::post('/painel_de_controle/admin/palavra/buscar/do', 'PalavraController@search')->name('palavra.search.do');

Route::get('/painel_de_controle/admin/contexto/create', "ContextoController@create")->name('cpanel.contexto.create');
Route::post('/painel_de_controle/admin/contexto/store/do', "ContextoController@store")->name('cpanel.contexto.create.do');
Route::get('/painel_de_controle/admin/contextos/listagem', 'ContextoController@showAll')->name('cpanel.contexto.list');
Route::post('/painel_de_controle/admin/contexto/buscar/do', 'ContextoController@search')->name('contexto.search.do');
Route::get('/painel_de_controle/admin/palavra/remove/{id}', 'ContextoController@remove')->name('contexto.remove');



Auth::routes([
    'login' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
    'register' =>false,
    ]);

Route::get('/home', 'ContextoController@index')->name('home');
