<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
  public function __construct()
  {

  }

  public function index()
  {
    return view('usuarios.list-usuarios');

  }

  public function formUsuarioAction()
  {
    return view('usuarios.form-usuario');

  }
}
