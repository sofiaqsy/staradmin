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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categoria','CategoriaController');
Route::resource('articulo','ArticuloController');
Route::resource('ventas/cliente','ClienteController');
Route::resource('compras/proveedor','ProveedorController');
Route::resource('compras/compra','CompraController');
Route::resource('ventas/venta','VentaController');
Route::resource('usuario','UsuarioController');
Route::get('listado_graficas','GraficaController@index');
Route::get('grafica_registro/{anio}/{mes}','GraficaController@registros_mes');
Route::get('grafica_registro_c/{anio}/{mes}','GraficaController@registros_mes_c');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{slug?}', 'VentaController@index');
Route::get('ventas/reportes', 'PdfController@index');
Route::get('crear_reporte_Venta/{tipo}', 'PdfController@crear_reporte_venta');