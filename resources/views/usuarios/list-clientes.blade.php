@extends ('layouts.admin')
@section ('contenido')
  <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12" role="" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs " role="tablist">
            <li><a href="/usuarios">Usuarios</a>
            </li>
            <li class="active"><a href="/usuarios/clientes">Clientes</a>
            </li>
          </ul>
        </div>
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px;" >
    <br>
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Search for...">
    </div>
    <div class="col-md-3">
      <a href="#"><button class="btn btn-default" type="button">Buscar</button></a>
      <a href="/usuarios/form-usuario"><button class="btn btn-default" type="button">Nuevo</button></a>
    </div>
  </div>


<div class="row" style="margin:0px" >
  <div class="col-md-12" style=" margin-top:10px;">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 text-center">

          </div>

          <div class="clearfix"></div>
          <div class="col-md-4 col-sm-4 col-xs-12 profile_details" style="max-width:300px;">
            <div class="well profile_view">
              <div class="col-xs-12 bottom text-center">
              <h4 class="brief"><i>Proveedor</i></h4>
              </div>
              <div class="col-sm-12">
                <div class="left col-xs-7">
                  <h2>Nicole Pearson</h2>
                  <p><strong>Tipo de Productos : </strong> Productos de limpieza </p>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-building"></i> Direccion: av.d</li>
                    <li><i class="fa fa-phone"></i> Telefono: 1232423 </li>
                  </ul>
                </div>
                <div class="right col-xs-5 text-center">
                  <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                </div>
              </div>
            </div>
          </div><div class="col-md-4 col-sm-4 col-xs-12 profile_details" style="max-width:300px;">
            <div class="well profile_view">
              <div class="col-xs-12 bottom text-center">
              <h4 class="brief"><i>Proveedor</i></h4>
              </div>
              <div class="col-sm-12">
                <div class="left col-xs-7">
                  <h2>Nicole Pearson</h2>
                  <p><strong>Tipo de Productos : </strong> Productos de limpieza </p>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-building"></i> Direccion: av.d</li>
                    <li><i class="fa fa-phone"></i> Telefono: 1232423 </li>
                  </ul>
                </div>
                <div class="right col-xs-5 text-center">
                  <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12 profile_details" style="max-width:300px;">
            <div class="well profile_view">
              <div class="col-xs-12 bottom text-center">
              <h4 class="brief"><i>Proveedor</i></h4>
              </div>
              <div class="col-sm-12">
                <div class="left col-xs-7">
                  <h2>Nicole Pearson</h2>
                  <p><strong>Tipo de Productos : </strong> Productos de limpieza </p>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-building"></i> Direccion: av.d</li>
                    <li><i class="fa fa-phone"></i> Telefono: 1232423 </li>
                  </ul>
                </div>
                <div class="right col-xs-5 text-center">
                  <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12 profile_details" style="max-width:300px;">
            <div class="well profile_view">
              <div class="col-xs-12 bottom text-center">
              <h4 class="brief"><i>Proveedor</i></h4>
              </div>
              <div class="col-sm-12">
                <div class="left col-xs-7">
                  <h2>Nicole Pearson</h2>
                  <p><strong>Tipo de Productos : </strong> Productos de limpieza </p>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-building"></i> Direccion: av.d</li>
                    <li><i class="fa fa-phone"></i> Telefono: 1232423 </li>
                  </ul>
                </div>
                <div class="right col-xs-5 text-center">
                  <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                </div>
              </div>
            </div>
          </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
