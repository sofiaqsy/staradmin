{!! Form::open(array('url'=>'ventas/venta','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px;">
  <br>
  <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" class="form-control" placeholder="Search for..." value="{{$searchText}}" name="searchText">
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <a href="#"><button class="btn btn-default col-xs-3" type="submit">Buscar</button></a>
    <a href="reportes"><button class="btn btn-default col-xs-3" type="button">Reporte</button></a>
    <a href="venta/create" ><button class="btn btn-default col-xs-3" type="button">Nuevo</button></a>
  </div>
</div>
{{Form::close()}}
