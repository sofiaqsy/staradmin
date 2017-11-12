<?php

namespace staradmin;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected  $table='venta';
	protected $primaryKey='idventa';
	public $timestamps=false;
	protected $fillable =['idcliente','tipo_doc','serie_doc','numero_doc','fecha_hora','importe','igv','total','estado','idusers'];
	protected $guarded=[];
}

