@extends('layouts.admin')
@section('contenido')


      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
            <div class="col-md-12 col-sm-12 col-xs-12" role="" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs " role="tablist">
                <li><a href="/ventas/venta/create">Ventas </a>
                </li>
                <li ><a href="/ventas/venta">Listado de ventas</a>
                </li>
                <li class="active" ><a href="#" >Clientes</a>
                </li>
              </ul>
            </div>
      </div>
			@include('ventas.cliente.search')
              <div class="col-md-12 col-sm-12 col-xs-12" style=" margin-top:10px;">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table">
											<thead>
												<th>Id</th>
												<th>Nombre</th>
												<th>Tipo Doc.</th>
												<th>Numero Doc.</th>
						            <th>Direccion</th>
												<th>Telefono</th>
												<th>Email</th>
												<th>Opciones</th>
											</thead>
                      <tbody>
												@foreach($personas as $per)
													<tr>
														<td>{{$per->idpersona}}</td>
														<td>{{$per->nombre}}</td>
														<td>{{$per->tipo_documento}}</td>
														<td>{{$per->num_documento}}</td>
														<td>{{$per->direccion}}</td>
														<td>{{$per->telefono}}</td>
														<td>{{$per->email}}</td>
														<td>
															<a href="{{URL::action('ClienteController@edit',$per->idpersona)}}"><button class="btn btn-info">Editar</button></a>
															<a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
														</td>
													</tr>
													@include('ventas.cliente.modal')
              					@endforeach
                      </tbody>
                    </table>
										{{$personas->render()}}
                  </div>
                </div>
              </div>

@endsection
