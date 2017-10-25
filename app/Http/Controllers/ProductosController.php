<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Categoria;
use Illuminate\Support\Facades\Redirect;
use DB;

class ProductosController extends Controller
{
  public function __construct()
  {

  }

  public function index()
  {
    return view('productos.list-productos');

  }

  public function listCategoriasAction()
  {
    return view('productos.list-categorias');

  }

  public function formProductoAction()
  {
    return view('productos.form-producto');

  }

  public function formCategoriaAction()
  {
    return view('productos.form-categoria');

  }

  public function create()
  {
      return view('productos.list-productos');
  }

  public function store()
  {
      return view('productos.list-productos');
  }

  public function show()
  {
      return view('productos.list-productos');
  }

  public function edit()
  {
      return view('productos.list-productos');
  }

  public function update()
  {
      return view('productos.list-productos');
  }


}
