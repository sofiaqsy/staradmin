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



Auth::routes();

Route::resource('/','HomeController');

Route::resource('login/','HomeController');

Route::resource('compras/','ComprasController');
Route::resource('productos/', 'ProductosController');
Route::resource('ventas/','VentasController');
Route::resource('usuarios/', 'UsuariosController');

Route::get('productos/list','ProductosController@list_productos');
