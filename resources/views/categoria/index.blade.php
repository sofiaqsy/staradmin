@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Categoría <a href="categoria/create"><button>Nuevo</button> </a></h3>
			@include('almacen.categoria.search')

		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-have">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>DEscripción</th>
						<th>Opciones</th>
					</thead>
					@foreach($categoria as $cat)
						<tr>{{$cat->nombre}}</tr>
						<tr>{{$cat->descripcion}}</tr>
						<tr>
							<a href="#"><button class="btn btn-info">Editar</button></a>
							<a href="#"><button class="btn btn-danger">Eliminar</button></a>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection