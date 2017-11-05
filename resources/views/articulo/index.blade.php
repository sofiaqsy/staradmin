@extends ('layouts.admin')
@section ('contenido')

						<div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
									<div class="col-md-12" role="" data-example-id="togglable-tabs">
										<ul id="myTab" class="nav nav-tabs " role="tablist">
											<li class="active" ><a href="#">Productos</a>
											</li>
											<li><a href="{{url('categoria')}}">Categorias</a>
											</li>
										</ul>
									</div>
						</div>
						@include('articulo.search')
              <div class="col-md-12 col-sm-12 col-xs-12" style=" margin-top:10px;">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table">
                      <thead>
												<th>Id</th>
												<th>Nombre</th>
												<th>Codigo</th>
												<th>Categoria</th>
												<th>Stock</th>
												<th>Imagen</th>
												<th>Estado</th>
												<th>Opciones</th>
            					</thead>
                      <tbody>
												@foreach($articulos as $art)
													<tr>
														<td>{{$art->idarticulo}}</td>
														<td>{{$art->nombre}}</td>
														<td>{{$art->codigo}}</td>
														<td>{{$art->categoria}}</td>
														<td>{{$art->stock}}</td>
														<td>
															<img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="{{$art->imagen}}" height='50px' width='50px'>
														</td>
														<td>{{$art->estado}}</td>
														<td>
															<a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
															<a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
														</td>

													</tr>
													@include('articulo.modal')
												@endforeach
                      </tbody>
                    </table>
										{{$articulos->render()}}
                  </div>
                </div>
              </div>

@endsection
