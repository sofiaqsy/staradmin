<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;

use staradmin\Categoria;
use Illuminate\Support\Facades\Redirect;
use staradmin\Http\Requests\CategoriaFormRequest;
use DB;

class ProductosController extends Controller
{
  public function __construct()
  {

  }

  public function index(Request $request)
  {
    
    return view('productos.list-productos');

  }

  public function formProductoAction()
  {
    return view('productos.form-producto');

  }

}
