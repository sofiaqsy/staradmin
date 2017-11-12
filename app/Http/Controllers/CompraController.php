<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use staradmin\Http\Requests\CompraFormRequest;
use staradmin\Compra;
use staradmin\DetalleCompra;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class CompraController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));
    		$Compras=DB::table('compra as c')
    		->join('persona as p','c.idproveedor','=','p.idpersona')
    		->join('detalle_compra as d','c.idcompra','=','d.idcompra')
    		->select('c.idcompra','c.fecha_hora','p.nombre','c.tipo_doc','c.serie_doc','c.numero_doc','c.igv','c.estado',
            DB::raw('sum(d.cantidad*d.precio_compra) as total'))
    		->where('c.numero_doc','LIKE','%'.$query.'%')
    		->orderBy('c.idcompra','desc')
    		->groupBy('c.idcompra','c.fecha_hora','p.nombre','c.tipo_doc','c.serie_doc','c.numero_doc','c.igv','c.estado')
    		->paginate(7);
    		return view('compras.compra.index',["compras"=>$Compras,"searchText"=>$query]);	
    	}
    }
    public function create(){
    	$personas= DB::table('persona')->where('tiipo_persona','=','Proveedor')->get();
    	$articulos= DB::table('articulo as art')->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) as articulo'),'art.idarticulo')->where('art.estado','=','1')->get();
    	return view("compras.compra.create",["personas"=>$personas,"articulos"=>$articulos]);
    }
    public function store(CompraFormRequest $request){

    	try {
    		DB::beginTransaction();

    		$compra= new Compra();
    		$compra->idproveedor= $request->get('idproveedor');
    		$compra->tipo_doc= $request->get('tipo_doc');
    		$compra->serie_doc= $request->get('serie_doc');
    		$compra->numero_doc= $request->get('numero_doc');
    		$mytime=Carbon::now('America/Lima');
    		$compra->fecha_hora= $request->get('fecha_hora');
    		$compra->igv= '18';
    		$compra->estado= 'A';
            $compra->importe= 0;
            $compra->total= 0;
    		$compra->save();

    		$idarticulo=$request->get('idarticulo');
    		$cantidad=$request->get('cantidad');
    		$precio_compra=$request->get('precio_compra');
    		$precio_venta=$request->get('precio_venta');

    		$cont=0;

    		while($cont < count($idarticulo)){
    			$detalle= new DetalleCompra();
    			$detalle->idcompra=$compra->idcompra;
    			$detalle->idarticulo= $idarticulo[$cont];
    			$detalle->cantidad= $cantidad[$cont];
    			$detalle->precio_compra= $precio_compra[$cont];
    			$detalle->precio_venta= $precio_venta[$cont];
    			$detalle->save();
    			$cont=$cont+1;
    		}

    		DB::commit();

    	} catch (Exception $e) {
    		DB::rollback();
    	}

    	return Redirect::to('compras/compra');

    }
    public function show($id){
        /*$compra= Compra::findOrFail($id);*/
    	$compra=DB::table('compra as c')
    		->join('persona as p','c.idproveedor','=','p.idpersona')
    		->join('detalle_compra as d','c.idcompra','=','d.idcompra')
    		->select('c.idcompra','c.fecha_hora','p.nombre','c.tipo_doc','c.serie_doc','c.numero_doc','c.igv','c.estado',
            DB::raw('sum(d.cantidad*d.precio_compra) as total'))
    		->where('c.idcompra','=',$id)
    		->groupBy('c.idcompra','fecha_hora','p.nombre','tipo_doc','c.serie_doc','c.numero_doc','c.igv','c.estado')
    	   ->first();
        $detalle=DB::table('detalle_compra as d')
    		->join('articulo as a','d.idarticulo','=','a.idarticulo')
    		->select('a.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta')
    		->where('d.idcompra','=',$id)->get();

    	return view("compras.compra.show",["ingreso"=>$compra,"detalle"=>$detalle]);

    }
    public function destroy($id){
    	$Compra=Compra::findOrFail($id);
    	$Compra->estado='C';
    	$Compra->update();
    	return Redirect::to('compras/compra');
    }
}
