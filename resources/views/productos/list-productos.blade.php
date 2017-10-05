@extends ('layouts.admin')
@section ('contenido')

      <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-6" role="" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs " role="tablist">
                <li><a href="/productos">Productos</a>
                </li>
                <li><a href="/productos/categorias">Categorias</a>
                </li>
                <li><a href="#tab_content3">Profile</a>
                </li>
              </ul>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
                </span>
              </div>
            </div>
      </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
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
