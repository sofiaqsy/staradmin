@extends('layouts.admin')
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
			<div class="col-md-12" role="" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs " role="tablist">
					<li><a href="/articulo">Productos</a>
					</li>
					<li  class="active" ><a href="{{url('categoria')}}">Categorias</a>
					</li>
				</ul>
			</div>
</div>
	@include('categoria.search')
	<div class="col-md-12 col-sm-12 col-xs-12" style=" margin-top:10px;">
		<div class="x_panel">
			<div class="x_content">
				<table class="table">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>DEscripción</th>
						<th>Opciones</th>
					</thead>
					<tbody>
						@foreach($categoria as $cat)
							<tr>
								<td>{{$cat->idcategoria}}</td>
								<td>{{$cat->nombre}}</td>
								<td>{{$cat->descripcion}}</td>
								<td>
									<a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}"><button class="btn btn-info">Editar</button></a>
									<a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
								</td>
							</tr>
							@include('categoria.modal')
						@endforeach

					</tbody>
				</table>
				{{$categoria->render()}}
			</div>
		</div>
	</div>

	@endsection
