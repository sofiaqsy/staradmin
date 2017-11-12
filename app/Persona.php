<?php

namespace staradmin;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected  $table='persona';
	protected $primaryKey='idpersona';
	public $timestamps=false;
	protected $fillable =['tiipo_persona','nombre','tipo_documento','num_documento','direccion','telefono','email'];
	protected $guarded=[];
}
