<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use staradmin\Http\Requests\ArticuloFormRequest;
use staradmin\Articulo;
use DB;

class ArticuloController extends Controller
{
    public function __construct(){
            $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));	
    		$articulos=DB::table('articulo as a')
    		->join('categoria as c','a.idcategoria','=','c.idcategoria')	
    		->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            ->where('a.nombre','LIKE','%'.$query.'%')
    		->orderBy('a.idarticulo','desc')
    		->paginate(7);
    		return view('articulo.index',["articulos"=>$articulos,"searchText"=>$query]);	
    	}
    }
    public function create(){
        $categorias=DB::table('categoria')->where('estado','=','1')->get();
    	return view("articulo.create",["categorias"=>$categorias]);
    }
    public function store(ArticuloFormRequest $request){
    	$articulo=new Articulo;
    	$articulo->idcategoria=$request->get('idcategoria');
    	$articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
    	$articulo->estado='1';
        if(Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();        
        }
    	$articulo->save();
    	return Redirect::to('articulo');

    }
    public function show($id){
    	return view("articulo.show",["articulo"=>Articulo::findOrFail($id)]);	

    }
    public function edit($id){
        $articulo= Articulo::findOrFail($id);
        $categorias=DB::table('categoria')->where('estado','=','1')->get();
		return view("articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);    	
    }


    public function update(ArticuloFormRequest $request,$id){
    	$articulo= Articulo::findOrFail($id);
    	$articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        if(Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();        
        }
    	$articulo->update();
    	return Redirect::to('articulo');
    }
    public function destroy($id){
    	$articulo=Articulo::findOrFail($id);
    	$articulo->estado='0';
    	$articulo->update();
    	return Redirect::to('articulo');
    }
}
