<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use staradmin\Http\Requests\ventaFormRequest;
use staradmin\Venta;
use staradmin\DetalleVenta;
use staradmin\Articulo;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $venta=DB::table('venta as v')
        ->join('persona as p','v.idcliente','=','p.idpersona')
        ->join('detalle_venta as d','v.idventa','=','d.idventa')
        ->join('articulo as a','d.idarticulo','=','a.idarticulo')
        ->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_doc','v.serie_doc','v.numero_doc','v.igv','v.estado',
        'v.total','a.nombre as articulo','d.cantidad','d.descuento','d.precio')->get();

        return view("pdf.reporte_venta",["data"=>$venta]);    
        //return $this->crear_reporte_Venta(1);
    }


      public function crearPDF($datos,$vistaurl,$tipo)
    {

        $data = $datos;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }


    public function crear_reporte_Venta($tipo){

    $vistaurl="pdf.reporte_venta";
    $venta=DB::table('venta as v')
        ->join('persona as p','v.idventa','=','p.idpersona')
        ->join('detalle_venta as d','v.idventa','=','d.idventa')
        ->join('articulo as a','d.idarticulo','=','a.idarticulo')
        ->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_doc','v.serie_doc','v.numero_doc','v.igv','v.estado',
        'v.total','a.nombre as articulo','d.cantidad','d.descuento','d.precio');
        return $this->crearPDF($venta, $vistaurl,$tipo);
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
