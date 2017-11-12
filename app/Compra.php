<?php

namespace staradmin;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
	protected  $table='compra';
	protected $primaryKey='idcompra';
	public $timestamps=false;
	protected $fillable =['idproveedo','tipo_doc','serie_doc','numero_doc','fecha_hora','importe','igv','total','estado'];
	protected $guarded=[];
}
