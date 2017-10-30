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
Route::get('compras/list','ComprasController@listComprasAction');


Route::resource('ventas/','VentasController');
Route::get('ventas/list','VentasController@listVentaAction');


Route::resource('usuarios/', 'UsuariosController');
Route::get('usuarios/form-usuario','UsuariosController@formUsuarioAction');


Route::resource('productos/', 'ProductosController');
Route::get('productos/form-producto','ProductosController@formProductoAction');


Route::resource('categorias/', 'CategoriasController');
Route::get('categorias/form-categoria','CategoriasController@formCategoriaAction');
