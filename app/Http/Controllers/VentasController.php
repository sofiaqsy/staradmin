<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;

class VentasController extends Controller
{
  public function __construct()
  {

  }

  public function index()
  {
    return view('ventas.ventas');
  }

  public function listVentaAction()
  {
    return view('ventas.list-ventas');
  }
}
