@extends ('layouts.admin')
@section ('contenido')
<div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
      <div class="col-md-12" role="" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs " role="tablist">
          <li><a href="/productos">Productos</a>
          </li>
          <li ><a href="/categorias">Categorias</a>
          </li>
          <li class="active"><a href="#">Crear categoria</a>
          </li>
        </ul>
      </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <br>
  @if(count($errors)>0)
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <strong>ERROR</strong>
      @foreach ($errors->all() as $error)
      {{$error}}
      @endforeach
    </div>
  @endif

  <div class="alert alert-success alert-dismissible fade in" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
   </button>
   <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
  </div>
  <div class="col-md-3 col-sm-3 col-xs-12">
INFORMACION DE CATEGORIA
  </div>
  <div class="col-md-9 col-sm-9 col-xs-12">
    <br>
    <div class="x_panel">
      <div class="x_content">
        <div class="col-md-12">
            <div class="form-group">
              <label class="control-label" for="last-name">Nombre<span class="required">*</span>
              </label>
              <input type="text" id="last-name" name="last-name" required="required" class="form-control ">
            </div>
           <div class="form-group">
             <label class="control-label" for="last-name">Descripción<span class="required">*</span>
             </label>
               <input type="text" id="last-name" name="last-name" required="required" class="form-control ">
           </div>
           <div class="form-group">
             <label class="control-label" for="last-name">Estado<span class="required">*</span>
             </label>
             <select class="form-control">
               <option>Choose option</option>
                           <option>Option one</option>
                           <option>Option two</option>
                           <option>Option three</option>
                           <option>Option four</option>
               </select>
           </div>
           <div class="form-group">
             <center>
               <div class="col-md-6 col-sm-6 col-xs-6">
                 <button class="btn btn-primary col-md-6 " type="button">Cancelar</button>
               </div>
               <div class="col-md-6 col-sm-6 col-xs-6">
                 <button type="submit" class="btn btn-success col-md-6">Guardar</button>
               </div>
             </center>
             </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
