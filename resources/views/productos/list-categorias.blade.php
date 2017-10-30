@extends ('layouts.admin')
@section ('contenido')

      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
            <div class="col-md-12" role="" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs " role="tablist">
                <li><a href="/productos">Productos</a>
                </li>
                <li class="active"><a href="/categorias">Categorias</a>
                </li>
              </ul>
            </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px;">
        <br>
        {!! Form::open(array('url'=>'/categorias','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
        <div class="col-md-6 col-sm-6 col-xs-6">
            <input type="text" class="form-control" placeholder="Search for..." name="searchText">
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6" >
          <a href="#"><button class="btn btn-default" type="button">Buscar</button></a>
          <a href="/categorias/form-categoria"><button class="btn btn-default" type="button">Nuevo</button></a>
        </div>
        {{Form::close()}}
      </div>
              <div class="col-md-12 col-sm-12 col-xs-12" style=" margin-top:10px;">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($categorias as $cat)
                        <tr>
                          <th scope="row">1</th>
                          <td>{{ $cat->nombre }}</td>
                          <td>{{ $cat->descripcion }}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                {{$categorias->render()}}
              </div>
@stop
