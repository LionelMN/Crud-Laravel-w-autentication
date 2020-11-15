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
    return view('home');
});

/* Las rutas se pueden declarar así, de una en una pero existe un modo para 
llamar a todas las funciones de un controlador con una única sentencia
Route::get('/usuarios', 'UsuariosController@index');
Route::get('/usuarios/create','UsuariosController@create');*/

//La sentencia:
Route::resource('usuarios', 'UserController')->middleware('admin');
Route::resource('productos', 'ProductosController')->middleware('admin');

Route::get('/ver', 'ProductosController@ver')->name('ver');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('send-mail/{users}', 'MailSend@mailsend');