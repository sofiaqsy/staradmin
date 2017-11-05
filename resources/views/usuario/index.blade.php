@extends ('layouts.admin')
@section ('contenido')

			<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-12" role="" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs " role="tablist">
								<li class="active"><a href="/usuario">Usuarios</a>
								</li>
							</ul>
						</div>
			</div>

      @include('usuario.search')
              <div class="col-md-12 col-sm-12 col-xs-12" style=" margin-top:10px;">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table">
                      <thead>
												<th>Id</th>
												<th>Nombre</th>
												<th>Email</th>
												<th>Opciones</th>
            					</thead>
                      <tbody>
												@foreach($usuarios as $usu)
													<tr>
														<td>{{$usu->id}}</td>
														<td>{{$usu->name}}</td>
														<td>{{$usu->email}}</td>
														<td>
															<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class="btn btn-info">Editar</button></a>
															<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
														</td>
													</tr>
													@include('usuario.modal')
												@endforeach
                      </tbody>
                    </table>
										{{$usuarios->render()}}
                  </div>
                </div>
              </div>

@endsection
