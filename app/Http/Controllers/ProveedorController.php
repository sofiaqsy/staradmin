<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;

use staradmin\Persona;
use Illuminate\Support\Facades\Redirect;
use staradmin\Http\Requests\PersonaFormRequest;
use DB;

class ProveedorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));	
    		$Personas=DB::table('persona')
    		->where('nombre','LIKE','%'.$query.'%')
    		->where('tiipo_persona','=','Proveedor')
    		->orwhere('num_documento','LIKE','%'.$query.'%')
            ->where('tiipo_persona','=','Proveedor')
    		->orderBy('idpersona','desc')
    		->paginate(7);
    		return view('compras.proveedor.index',["personas"=>$Personas,"searchText"=>$query]);	
    	}
    }
    public function create(){
    	return view("compras.proveedor.create");
    }
    public function store(PersonaFormRequest $request){
    	$persona=new Persona;
    	$persona->tiipo_persona='Proveedor';
    	$persona->nombre=$request->get('nombre');
    	$persona->tipo_documento=$request->get('tipo_documento');
    	$persona->num_documento=$request->get('num_documento');
    	$persona->direccion=$request->get('direccion');
    	$persona->telefono=$request->get('telefono');
    	$persona->email=$request->get('email');
    	$persona->save();
    	return Redirect::to('compras/proveedor');

    }
    public function show($id){
    	return view("compras.proveedor.show",["persona"=>Persona::findOrFail($id)]);	

    }
    public function edit($id){
		return view("compras.proveedor.edit",["persona"=>Persona::findOrFail($id)]);	 
    }
    public function update(PersonaFormRequest $request,$id){
    	$persona= Persona::findOrFail($id);
    	$persona->nombre=$request->get('nombre');
    	$persona->tipo_documento=$request->get('tipo_documento');
    	$persona->num_documento=$request->get('num_documento');
    	$persona->direccion=$request->get('direccion');
    	$persona->telefono=$request->get('telefono');
    	$persona->email=$request->get('email');
    	$persona->update();
    	return Redirect::to('compras/proveedor');
    }
    public function destroy($id){
    	$persona=Persona::findOrFail($id);
    	$persona->tiipo_persona='Inactivo';
    	$persona->update();
    	return Redirect::to('compras/proveedor');
    }
}
