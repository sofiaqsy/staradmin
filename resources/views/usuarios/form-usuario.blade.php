@extends ('layouts.admin')
@section ('contenido')
<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-12" role="" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs " role="tablist">
          <li><a href="/usuarios">Usuarios</a>
          </li>
          <li class="active"><a href="#">Usuario Nuevo</a>
          </li>
          <li><a href="#tab_content3">Profile</a>
          </li>
        </ul>
      </div>
</div>
<div class="col-md-12 col-xs-12">
  <br>
  <div class="col-md-3">
DATOS GENERALES
  </div>
  <div class="col-md-9">
    <div class="x_panel">
      <div class="x_content">
        <div class="col-md-12">
            <div class="form-group">
              <label class="control-label" for="last-name">Nombre<span class="required">*</span>
              </label>
              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
            </div>
           <div class="form-group">
             <label class="control-label" for="last-name">Email<span class="required">*</span>
             </label>
               <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
           </div>
           <div class="form-group">
             <label class="control-label" for="last-name">Password<span class="required">*</span>
             </label>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
