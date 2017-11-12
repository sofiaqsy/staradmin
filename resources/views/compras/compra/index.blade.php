@extends ('layouts.admin')
@section ('contenido')

      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
            <div class="col-md-12 col-sm-12 col-xs-12" role="" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs " role="tablist">
                <li><a href="/compras/compra/create">Compra</a>
                </li>
                <li class="active"><a href="/compras/compra">Listado de compras</a>
                </li>
                <li><a href="/compras/proveedor" >Proveedores</a>
                </li>
              </ul>
            </div>
      </div>
      @include('compras.compra.search')
              <div class="col-md-12 col-sm-12 col-xs-12" style=" margin-top:10px;">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table">
                      <thead>
                        <th>Fecha</th>
            						<th>Proveedor</th>
            						<th>tipo documento</th>
                        			<th>serie</th>
            						<th>numero</th>
            						<th>impuesto</th>
            						<th>total</th>
            						<th>Estado</th>
            						<th>Opciones</th>
            					</thead>
                      <tbody>
                        @foreach($compras as $com)
              						<tr>
              							<td>{{$com->nombre}}</td>
              							<td>{{$com->fecha_hora}}</td>
              							<td>{{$com->tipo_doc}}</td>
              							<td>{{$com->serie_doc}}</td>
              							<td>{{$com->numero_doc}}</td>
              							<td>{{$com->igv}}</td>
              							<td>{{$com->total}}</td>
              							<td>{{$com->estado}}</td>
              							<td>
              								<a href="{{URL::action('CompraController@show',$com->idcompra)}}"><button class="btn btn-info">Detalle</button></a>
              								<a href="" data-target="#modal-delete-{{$com->idcompra}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
              							</td>
              						</tr>
              						@include('compras.compra.modal')
              					@endforeach
                      </tbody>
                    </table>
                    {{$compras->render()}}
                  </div>
                </div>
              </div>

@endsection
