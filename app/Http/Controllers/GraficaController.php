<?php

namespace staradmin\Http\Controllers;

use Illuminate\Http\Request;
use staradmin\Venta;
use staradmin\DetalleVenta;
use staradmin\Articulo;
use staradmin\Compra;
use staradmin\DetalleCompra;
use DB;
class GraficaController extends Controller
{
    
	public function GetUltimoDiaMes($elAnio,$elMes){
		return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
	}

	public function registros_mes($anio,$mes)
	{
		$primer_dia=1;
		$ultimo_dia=$this->GetUltimoDiaMes($anio,$mes);
		$fecha_inicial = date("Y-m-d H:i:s",strtotime($anio."-".$mes."-".$primer_dia));
		$fecha_final = date("Y-m-d H:i:s",strtotime($anio."-".$mes."-".$ultimo_dia));
		$ventas = Venta::WhereBetween('fecha_hora',[$fecha_inicial,$fecha_final])
		->where('estado','=','A')->get();
		$ct=count($ventas);

		for($d=1;$d<=$ultimo_dia;$d++){
			$registros[$d]=0;
		}
		foreach ($ventas as $venta) {
			$diasel=intval(date("d",strtotime($venta->fecha_hora)));
			$registros[$diasel]++;
		}
		$data=array("totaldias"=>$ultimo_dia,"registrosdia"=>$registros);
		return json_encode($data);
	}


	public function registros_mes_c($anio,$mes)
	{
		$primer_dia=1;
		$ultimo_dia=$this->GetUltimoDiaMes($anio,$mes);
		$fecha_inicial = date("Y-m-d H:i:s",strtotime($anio."-".$mes."-".$primer_dia));
		$fecha_final = date("Y-m-d H:i:s",strtotime($anio."-".$mes."-".$ultimo_dia));
		$compras = Compra::WhereBetween('fecha_hora',[$fecha_inicial,$fecha_final])
		->where('estado','=','A')->get();
		$ct=count($compras);

		for($d=1;$d<=$ultimo_dia;$d++){
			$registros[$d]=0;
		}
		foreach ($compras as $compra) {
			$diasel=intval(date("d",strtotime($compra->fecha_hora)));
			$registros[$diasel]++;
		}
		$data=array("totaldias"=>$ultimo_dia,"registrosdia"=>$registros);
		return json_encode($data);
	}

	public function total_productos(){
		$tiposproductos=DetalleVenta::all();
		$ctp=count($tiposproductos);
		$articulo = Articulo::all();
		$ct = count($articulo);
		for($i=0;$i<=$ct-1;$i++)
		{
			$idTP=$articulo[$i]->idarticulo;
			$numerodearti[$idTP]=0;
		}
		for($i=0;$i<=$ctp-1;$i++)
		{
			$idTP=$tiposproductos[$i]->idarticulo;
			$numerodearti[$idTP]++;
		}
		$data = array("totaltipo"=>$ct,"tipo"=>$articulo,"numerodeproducto"=>$numerodearti);
		return json_encode($data);
		
	}
	public function index()
	{
		$anio=date("Y");
		$mes=date("m");
		return view('listados.listado_graficas')
			->with('anio',$anio)
			->with('mes',$mes);
	}

	public function create(){
    }
    public function store( ){

    }
    public function show(){

    }
    public function edit(){
	
    }
    public function update(){

    }
    public function destroy($id){

    }
}
