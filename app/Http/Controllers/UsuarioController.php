<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use staradmin\Http\Requests\UsuarioFormRequest;
use staradmin\User;
use DB;


class UsuarioController extends Controller
{
    public function __construct(){
            $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));	
    		$usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')
    		->orderBy('id','desc')
    		->paginate(7);
    		return view('usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);	
    	}
    }
     public function create(){
    	return view("usuario.create");
    }
    public function store(UsuarioFormRequest $request){
    	$usuario=new User;
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
    	$usuario->password=bcrypt($request->get('password'));
    	$usuario->save();
    	return Redirect::to('usuario');

    }
    public function edit($id){
		return view("usuario.edit",["usuario"=>User::findOrFail($id)]);	 	
    }
    public function update(UsuarioFormRequest $request,$id){
    	$usuario= User::findOrFail($id);
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
    	$usuario->password=bcrypt($request->get('password'));
    	$usuario->update();
    	return Redirect::to('usuario');
    }
    public function destroy($id){
    	$usuario=DB::table('users')->where('id','=',$id)->delete();
    	return Redirect::to('usuario');
    }
}
