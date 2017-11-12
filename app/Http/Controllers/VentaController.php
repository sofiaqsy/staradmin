<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use staradmin\Http\Requests\ventaFormRequest;
use staradmin\Venta;
use staradmin\DetalleVenta;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class VentaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if ($request){
    		$query=trim($request->get('searchText'));
    		$ventas=DB::table('venta as v')
    		->join('persona as p','v.idcliente','=','p.idpersona')
    		->join('detalle_venta as d','v.idventa','=','d.idventa')
    		->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_doc','v.serie_doc','v.numero_doc','v.igv','v.estado',
            'v.total')
    		->where('v.numero_doc','LIKE','%'.$query.'%')
            ->where('v.estado','=','A')
    		->orderBy('v.idventa','desc')
    		->groupBy('v.idventa','v.fecha_hora','p.nombre','v.tipo_doc','v.serie_doc','v.numero_doc','v.igv','v.estado','v.total')
    		->paginate(7);
    		return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);	
    	}
    }
    public function create(){
    	$personas= DB::table('persona')->where('tiipo_persona','=','Cliente')->get();
    	$articulos= DB::table('articulo as art')
    	->join('detalle_compra as di','art.idarticulo','=','di.idarticulo')
    	->select(DB::raw('CONCAT(art.idarticulo, " ",art.nombre) as articulo'),'art.idarticulo','art.stock',
            DB::raw('avg(di.precio_venta) as precio_promedio'))
    	->where('art.estado','=','1')
    	->where('art.stock','>','0')
    	->groupBy('articulo','art.idarticulo','art.stock')->get();
    	return view("ventas.venta.create",["personas"=>$personas,"articulos"=>$articulos]);
    }
    public function store(VentaFormRequest $request){

    	try {
    		DB::beginTransaction();

    		$venta= new Venta();
    		$venta->idcliente= $request->get('idcliente');
    		$venta->tipo_doc= $request->get('tipo_doc');
    		$venta->serie_doc= $request->get('serie_doc');
    		$venta->numero_doc= $request->get('numero_doc');
    		$venta->total= $request->get('total_venta');
            $venta->idusers='0';
    		$mytime=Carbon::now('America/Lima');
    		//$venta->fecha_hora= $mytime->toDateTimeString();
    		$venta->fecha_hora= $request->get('fecha_hora');
            $venta->igv= '18';
    		$venta->estado= 'A';
          	$venta->save();

    		$idarticulo=$request->get('idarticulo');
    		$cantidad=$request->get('cantidad');
    		$descuento=$request->get('descuento');
    		$precio_venta=$request->get('precio_venta');

    		$cont=0;

    		while($cont < count($idarticulo)){
    			$detalle= new DetalleVenta();
    			$detalle->idventa=$venta->idventa;
    			$detalle->idarticulo= $idarticulo[$cont];
    			$detalle->cantidad= $cantidad[$cont];
    			$detalle->descuento= $descuento[$cont];
    			$detalle->precio= $precio_venta[$cont];
    			$detalle->save();
    			$cont=$cont+1;
    		}

    		DB::commit();

    	} catch (Exception $e) {
    		DB::rollback();
    	}

    	return Redirect::to('ventas/venta');

    }
    public function show($id){
        /*$compra= Compra::findOrFail($id);*/
    	$venta=DB::table('venta as v')
    		->join('persona as p','v.idcliente','=','p.idpersona')
    		->join('detalle_venta as d','v.idventa','=','d.idventa')
    		->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_doc','v.serie_doc','v.numero_doc','v.igv','v.estado',
            'v.total')
    		->where('v.idventa','=',$id)
    		->first();
        $detalle=DB::table('detalle_venta as d')
    		->join('articulo as a','d.idarticulo','=','a.idarticulo')
    		->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio')
    		->where('d.idventa','=',$id)->get();

    	return view("ventas.venta.show",["venta"=>$venta,"detalle"=>$detalle]);

    }
    public function destroy($id){
    	$venta=Venta::findOrFail($id);
    	$venta->estado='C';
    	$venta->update();
    	return Redirect::to('ventas/venta');
    }
}
