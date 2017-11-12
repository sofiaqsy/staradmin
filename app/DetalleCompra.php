<?php

namespace staradmin;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
   	protected  $table='detalle_compra';
	protected $primaryKey='iddetalle_compra';
	public $timestamps=false;
	protected $fillable =['idcompra','idarticulo','cantidad','precio_compra','precio_venta'];
	protected $guarded=[];
}
