<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;
use staradmin\Categoria;
use Illuminate\Support\Facades\Redirect;
use staradmin\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriasController extends Controller
{
  public function __construct()
  {

  }

  public function index(Request $request)
  {
    if($request)
    {
      $query=trim($request->get('searchText'));
      $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
      ->where ('estado','=','1')
      ->orderBy('idcategoria','desc')
      ->paginate(10);

      return view('productos.list-categorias',["categorias"=>$categorias,"searchText"=>$query]);
    }

  }

  public function formCategoriaAction()
  {
    return view('productos.form-categoria');

  }

  public function store(CategoriaFormRequest $request)
  {
    $categoria=new Categoria;
    $categoria->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get('descripcion');
    $categoria->condicion='1';
    $categoria->save();
    return Redirect::to('productos.list-categorias');
  }

  public function show($id)
  {
    return view('productos.show-categoria',["categoria"=>Categoria::findOrFail($id)]);
  }

  public function edit($id)
  {
    return view('productos.edit-categoria',["categoria"=>Categoria::findOrFail($id)]);
  }

  public function update(CategoriaFormRequest $request,$id)
  {
    $categoria=Categoria::findOrFail($id);
    $categoria->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get('descripcion');
    $categoria->update();
    return Redirect::to('productos.list-categorias');
  }

  public function destroy(CategoriaFormRequest $request,$id)
  {
    $categoria=Categoria::findOrFail($id);
    $categoria->condicion='0';
    $categoria->update();
    return Redirect::to('productos.list-categorias');
  }


}
