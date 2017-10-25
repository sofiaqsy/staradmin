<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;

class ComprasController extends Controller
{
  public function __construct()
  {

  }

  public function index()
  {
    return view('compras.compras');
  }

  public function listComprasAction()
  {
    return view('compras.list-compras');
  }



}
