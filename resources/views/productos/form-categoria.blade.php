@extends ('layouts.admin')
@section ('contenido')
<div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
      <div class="col-md-12" role="" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs " role="tablist">
          <li><a href="/productos">Productos</a>
          </li>
          <li ><a href="/productos/categorias">Categorias</a>
          </li>
          <li class="active"><a href="#">Crear categoria</a>
          </li>
        </ul>
      </div>
</div>
<div class="col-md-12 col-xs-12">
  <br>
  <div class="col-md-3">
INFORMACION DE CATEGORIA
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
             <label class="control-label" for="last-name">Descripción<span class="required">*</span>
             </label>
               <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
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

        </div>
      </div>
    </div>
  </div>
</div>
@stop
