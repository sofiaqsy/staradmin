
@extends ('layouts.admin')
@section ('contenido')

      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
            <div class="col-md-12 col-sm-12 col-xs-12" role="" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs " role="tablist">
                <li><a href="/ventas/venta/create">Ventas </a>
                </li>
                <li class="active"><a href="/ventas/venta">Listado de ventas</a>
                </li>
                <li><a href="/ventas/cliente" >Clientes</a>
                </li>
              </ul>
            </div>
      </div>
      @include('ventas.venta.search')
              <div class="col-md-12 col-sm-12 col-xs-12" style=" margin-top:10px;">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table">
                      <thead>
            						<th>Fecha</th>
            						<th>Cliente</th>
            						<th>tipo documento</th>
                        <th>serie</th>
            						<th>numero</th>
            						<th>impuesto</th>
            						<th>total</th>
            						<th>Estado</th>
            						<th>Opciones</th>
            					</thead>
                      <tbody>
                        @foreach($ventas as $ven)
              						<tr>
              							<td>{{$ven->nombre}}</td>
              							<td>{{$ven->fecha_hora}}</td>
              							<td>{{$ven->tipo_doc}}</td>
              							<td>{{$ven->serie_doc}}</td>
              							<td>{{$ven->numero_doc}}</td>
              							<td>{{$ven->igv}}</td>
              							<td>{{$ven->total}}</td>
              							<td>{{$ven->estado}}</td>
              							<td>
              								<a href="{{URL::action('VentaController@show',$ven->idventa)}}"><button class="btn btn-info">Detalle</button></a>
              								<a href="" data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
              							</td>
              						</tr>
              						@include('ventas.venta.modal')
              					@endforeach
                      </tbody>
                    </table>
                    {{$ventas->render()}}
                  </div>
                </div>
              </div>

@endsection
