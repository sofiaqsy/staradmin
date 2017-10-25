@extends ('layouts.admin')
@section ('contenido')

      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
            <div class="col-md-12" role="" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs " role="tablist">
                <li><a href="/productos">Productos</a>
                </li>
                <li class="active"><a href="/productos/categorias">Categorias</a>
                </li>
              </ul>
            </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px;">
        <br>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Search for...">
        </div>
        <div class="col-md-3">
          <a href="#"><button class="btn btn-default" type="button">Buscar</button></a>
          <a href="/productos/form-producto"><button class="btn btn-default" type="button">Nuevo</button></a>
        </div>
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
                          <th>Condición</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@stop
