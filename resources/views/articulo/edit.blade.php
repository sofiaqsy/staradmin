@extends('layouts.admin')
@section('contenido')

<div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
			<div class="col-md-12" role="" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs " role="tablist">
					<li ><a href="/articulo">Productos</a>
					</li>
					<li><a href="{{url('categoria')}}">Categorias</a>
					</li>
					<li class="active" ><a href="#">Editar Producto {{$articulo->nombre}}</a>
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
INFORMACION GENERAL DE PRODUCTO
  </div>
  <div class="col-md-9 col-sm-9 col-xs-12">
    <br>
		{!! Form::model($articulo,['method'=>'PATCH','route'=>['articulo.update',$articulo->idarticulo],'files'=>'true']) !!}
		{{Form::token()}}
    <div class="x_panel">
      <div class="x_content">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label class="control-label" for="nombre">Nombre<span class="required">*</span>
              </label>
							<input type="text" name="nombre" class="form-control" placeholder="ingrese nomnbre..." value="{{$articulo->nombre}}"  required>
						</div>
           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						 <label for="idcategoria">Categoria</label>
						 <select name="idcategoria" id="" class="form-control">
		 					@foreach($categorias as $cat)
		 						@if($cat->idcategoria==$articulo->idcategoria)
		 							<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
		 						@else
		 							<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
		 						@endif
		 					@endforeach
		 				</select>
        	 </div>
					 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						 <label for="codigo">Codigo</label>
						 <input type="text" name="codigo" class="form-control" value="{{$articulo->codigo}}" required>
					</div>
					<div class="form-group">
						<label for="stock">Stock</label>
						<input type="text" name="stock" class="form-control" value="{{$articulo->stock}}" required>
					</div>
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<input type="text" name="descripcion" class="form-control" value="{{$articulo->descripcion}}" >
					</div>
					<div class="form-group">
						<label for="imagen">Imagen</label>
						<input type="file" name="imagen" class="form-control">
						@if(($articulo->imagen)!="")
							<img src="{{asset('imagenes/articulos/'.$articulo->imagen) }}" alt="{{$articulo->imagen }}" height="100px" width="100px">
						@endif
					</div>
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
