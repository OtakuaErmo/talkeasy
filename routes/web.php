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

Route::get('/usuario', 'AuthController@index')->name('usuario');
Route::get('/usuario/login', 'AuthController@showLoginForm')->name('usuario.login');
Route::post('/usuario/login/do', 'AuthController@login')->name('usuario.login.do');
Route::get('/usuario/logout', 'AuthController@logout')->name('usuario.logout');

Route::get('/usuario/cadastrar', 'Auth\RegisterController@showRegistrationForm')->name('usuario.register');
Route::post('/usuario/cadastrar', 'Auth\RegisterController@register')->name('usuario.register.do');

Auth::routes([
    'login' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
    'register' =>false,
    ]);

Route::get('/home', 'ContextoController@index')->name('home');
