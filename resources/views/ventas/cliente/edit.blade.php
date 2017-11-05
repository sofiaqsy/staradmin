@extends('layouts.admin')
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
			<div class="col-md-12 col-sm-12 col-xs-12" role="" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs " role="tablist">
					<li><a href="/ventas/venta/create">Ventas </a>
					</li>
					<li ><a href="/ventas/venta">Listado de ventas</a>
					</li>
					<li><a href="/ventas/cliente" >Clientes</a>
					</li>
					<li  class="active" ><a href="#" >Editar Cliente {{$persona->nombre}} </a>
					</li>
				</ul>
			</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <br>
  @if(count($errors)>0)
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <strong>ERROR</strong>
      @foreach ($errors->all() as $error)
      {{$error}}
      @endforeach
    </div>
  @endif

  <div class="col-md-3 col-sm-3 col-xs-12">
INFORMACION GENERAL DE CLIENTE
  </div>
  <div class="col-md-9 col-sm-9 col-xs-12">
    <br>
		{!! Form::model($persona,['method'=>'PATCH','route'=>['cliente.update',$persona->idpersona]]) !!}
		{{Form::token()}}
    <div class="x_panel">
      <div class="x_content">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
              <label class="control-label" for="nombre">Nombre<span class="required">*</span>
              </label>
							<input type="text" name="nombre" class="form-control" placeholder="ingrese nomnbre..." value="{{$persona->nombre}}" required>
            </div>
           <div class="form-group">
						 <label for="direccion">Direccion</label>
						 <input type="text" name="direccion" class="form-control" placeholder="ingrese direccion..." value="{{$persona->direccion}}" >
        	 </div>
					 <div class="form-group">
						 <label for="tipo_documento">Documento</label>
						 <select name="tipo_documento" id="" class="form-control">
							 @if($persona->tipo_documento=='DNI')
								 <option value="DNI">DNI</option>
							 @elseif($persona->tipo_documento=='RUC')
								 <option value="RUC">RUC</option>
							 @else
								 <option value="PAS">PAS</option>
							 @endif
						 </select>
					</div>
					<div class="form-group">
						<label for="num_documento">Nro Documento</label>
						<input type="text" name="num_documento" class="form-control" placeholder="ingrese nro doc..." value="{{$persona->num_documento}}" required>
					</div>
					<div class="form-group">
						<label for="telefono">Telefono</label>
						<input type="text" name="telefono" class="form-control" placeholder="ingrese telefono..." value="{{$persona->telefono}}" >
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" placeholder="ingrese telefono..." value="{{$persona->email}}" >
					</div>
      </div>
    </div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
			<div class="form-group">
				<button class="btn btn-success" type="submit">Guardar</button>
				<button class="btn btn-primary" type="reset">Cancelar</button>
			</div>
		</div>
      {!!Form::close()!!}
  </div>
	</div>
</div>
@endsection
