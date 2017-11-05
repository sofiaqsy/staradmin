@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
			<div class="form-group">
				<label for="idproveedor">Cliente</label>
				<p>{{$venta->nombre}}</p>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
			<div class="form-group">
				<label for="tipo_doc">Tipo de Comprobante</label>
				<p>{{$venta->tipo_doc}}</p>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
			<div class="form-group">
				<label for="serie_doc">Serie documento</label>
				<p>{{$venta->serie_doc}}</p>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
			<div class="form-group">
				<label for="numero_doc">numero documento</label>
				<p>{{$venta->numero_doc}}</p>
			</div>
		</div>
	</div>
	<div class="row">

		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table class="table table-striped table-condensed table-hover" id="detalle">
						<thead style="background-color: #A9D0F5">
							<th>Articulo</th>
							<th>Cantidad</th>
							<th>PrecioVenta</th>
							<th>Descuento</th>
							<th>Subtotal</th>
						</thead>
						<tfoot>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th><h4 id="total">{{$venta->total}}</h4></th>
						</tfoot>
						<tbody>
							@foreach($detalle as $det)
								<tr>
									<td>{{$det->articulo}}</td>
									<td>{{$det->cantidad}}</td>
									<td>{{$det->precio}}</td>
									<td>{{$det->descuento}}</td>
									<td>{{$det->cantidad * $det->precio- $det->descuento}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>		
			</div>
		</div>		
	</div>
@endsection