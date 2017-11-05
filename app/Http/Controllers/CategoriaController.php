<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;
use staradmin\Categoria;
use Illuminate\Support\Facades\Redirect;
use staradmin\Http\Requests\CategoriaFormRequest;
use DB;
class CategoriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));	
    		$categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
    		->where('estado','=','1')
    		->orderBy('idcategoria','desc')
    		->paginate(7);
    		return view('categoria.index',["categoria"=>$categorias,"searchText"=>$query]);	
    	}
    }
    public function create(){
    	return view("categoria.create");
    }
    public function store(CategoriaFormRequest $request){
    	$categoria=new Categoria;
    	$categoria->nombre=$request->get('nombre');
    	$categoria->descripcion=$request->get('descripcion');
    	$categoria->estado='1';
    	$categoria->save();
    	return Redirect::to('categoria');

    }
    public function show($id){
    	return view("categoria.show",["categoria"=>Categoria::findOrFail($id)]);	

    }
    public function edit($id){
		return view("categoria.edit",["categoria"=>Categoria::findOrFail($id)]);    	
    }
    public function update(CategoriaFormRequest $request,$id){
    	$categoria= Categoria::findOrFail($id);
    	$categoria->nombre= $request->get('nombre');
    	$categoria->descripcion= $request->get('descripcion');
    	$categoria->update();
    	return Redirect::to('categoria');
    }
    public function destroy($id){
    	$categoria=categoria::findOrFail($id);
    	$categoria->estado='0';
    	$categoria->update();
    	return Redirect::to('categoria');
    }
}
