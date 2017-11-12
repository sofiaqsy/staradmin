	@extends ('layouts.admin')
	@section ('contenido')
	<div class="row">
		<div class="col-md-12" >
			<div class="box" style="min-width: 300px; height: 800px; margin: 0 auto">
				<div class="box-header with-border">
					<h3 class="box-title">Reporte de Venta</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 40px">Tipo</th>
								<th style="width: 80px">Serie</th>
								<th style="width: 120px">Numero</th>
								<th style="width: 120px">Cliente</th>
								<th style="width: 120px">Producto</th>
								<th style="width: 120px">Cantidad</th>
								<th style="width: 120px">Precio</th>
								<th style="width: 120px">Descuento</th>
								<th style="width: 120px">Total</th>
							</tr>
						</thead>
						<tbody>
						@foreach($data as $v)
							<tr>
								<td>{{$v->tipo_doc}}</td>
								<td>{{$v->serie_doc}}</td>
								<td>{{$v->numero_doc}}</td>
								<td>{{$v->nombre}}</td>
								<td>{{$v->articulo}}</td>
								<td>{{$v->cantidad}}</td>
								<td>{{$v->precio}}</td>
								<td>{{$v->descuento}}</td>
								<td>{{$v->total}}</td>
							</tr>
						@endforeach
						</tbody>

					</table>
				</div><!-- /.box-body -->
			</div>	
			<div class="box-footer clearfix">
			</div>
		</div>
	</div>	
		@push('scripts')
		@endpush
	 @endsection