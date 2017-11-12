
@extends ('layouts.admin')
@section ('contenido')

<div class="col-md-12 col-xs-12 col-sm-12">
  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left:-10px">
        <div class="col-md-12 col-sm-12 col-xs-12" role="" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs " role="tablist">
            <li class="active"><a href="#">Ventas </a>
            </li>
            <li ><a href="/ventas/venta">Listado de ventas</a>
            </li>
            <li><a href="{{url('ventas/cliente')}}" >Clientes</a>
            </li>
          </ul>
        </div>
  </div>

      @if(count($errors)>0)
      <div class="alert alert-danger" >
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif

        <div class="clearfix"></div>
        {!! Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off')) !!}
      	{{Form::token()}}
       <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
         <br>
         <div class="col-md-12 col-xs-12 col-sm-12" style="margin-left: 9px;margin-right: 20px;">
           <div class="form-group" >
             <label class="control-label" for="first-name">Cliente<span class="required">*</span>
             </label>
             <select name="idcliente" id="" class="form-control selectpicker" data-live-search="true">
               @foreach($personas as $persona)
               <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
               @endforeach
             </select>
           </div>
         </div>
         <div class="col-md-12">
             <div class="col-md-3 col-sm-3 col-xs-12">
               <div class="form-group">
                 <label for="tipo_doc">Tipo de Comprobante</label>
                <select name="tipo_doc" id="" class="form-control">
                  <option value="03">Boleto</option>
                  <option value="01">Factura</option>
                  <option value="12">Ticke</option>
                </select>
               </div>
             </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="form-group">
                <label for="serie_doc">Serie documento</label>
                <input type="text" name="serie_doc" class="form-control" placeholder="ingrese serie..." value="{{old('serie_doc')}}">
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
              <div class="form-group">
                <label for="numero_doc">numero documento</label>
                <input type="text" name="numero_doc" class="form-control" placeholder="ingrese numero..." value="{{old('numero_doc')}}" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
              <div class="form-group">
                <label for="fecha_hora">Fecha</label>
                <input type="date" name="fecha_hora" class="form-control" placeholder="ingrese fecha..." 
                required>
              </div>
            </div>
           </div>
           <div class="x_panel">
             <div class="x_content">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="col-md-4 col-sm-4 col-xs-12">
                   <div class="form-group">
                     <label class="control-label" for="last-name">Artículo<span class="required">*</span>
                     </label>
                     <select name="pidarticulo" id="pidarticulo" class="form-control selectpicker" data-live-search="true">
                      <option value="-1">Selecionar</option>
         							@foreach($articulos as $articulo)
         								<option value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio_promedio}}">{{$articulo->articulo}}</option>
         							@endforeach
         						</select>
                   </div>
                 </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group">
                    <label class="control-label" for="last-name">Cantidad<span class="required">*</span>
                    </label>
                    <input type="number" class="form-control" name="pcantidad" id="pcantidad" placeholder="cantidad">
                  </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group">
                    <label class="control-label" for="last-name">Stock<span class="required">*</span>
                    </label>
                    <input type="number" class="form-control" name="pstock" id="pstock" placeholder="stock" disabled>
                  </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group">
                    <label class="control-label" for="last-name">Precio Venta<span class="required">*</span>
                    </label>
                    <input type="number" class="form-control" name="pprecio_venta" id="pprecio_venta" placeholder="Precio" disabled>
                  </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group">
                    <label class="control-label" for="last-name">Descuento<span class="required">*</span>
                    </label>
                    <input type="number" class="form-control" name="pdescuento" id="pdescuento" placeholder="descuento" value="0.00">
                  </div>
                </div>
                <button class="btn btn-success" type="button" id="bt_add">Agregar</button>

                <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="detalle">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Eliminar</th>
                            <th class="column-title">Articulo</th>
                            <th class="column-title">Cantidad</th>
                            <th class="column-title">Precio venta</th>
                            <th class="column-title">Descuento</th>
                            <th class="column-title">Subtotal</th>

                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tfoot>
            							<th>TOTAL</th>
            							<th></th>
            							<th></th>
            							<th></th>
            							<th></th>
            							<th><h4 id="total">S/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
            						</tfoot>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
               </div>
             </div>
           </div>

             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar" >
         			<div class="form-group">
         				<button class="btn btn-success" type="submit">Guardar</button>
         				<button class="btn btn-primary" type="reset">Cancelar</button>
         			</div>
         		</div>
         </form>
         	{!! Form::close() !!}
 </div>



 @push('scripts')
 	<script>
 		$(document).ready(function() {
 			$("#bt_add").click(function(event) {
 				agregar();
 			});
 		});
 		var cont=0;
 		total=0;
 		subtotal=[];
 		$("#guardar").hide();
    $("#pidarticulo").click(mostrarValores);
 		$("#pidarticulo").change(mostrarValores);

 		function mostrarValores(){

 			datosArticulo=document.getElementById('pidarticulo').value.split('_');
 			$("#pprecio_venta").val(datosArticulo[2]);
 			$("#pstock").val(datosArticulo[1]);

 		}
 		function agregar(){

 			stock=0;
 			cantidad=0;
 			datosArticulo=document.getElementById('pidarticulo').value.split('_');
 			idarticulo=datosArticulo[0];
 			articulo=$("#pidarticulo option:selected").text();
 			cantidad=$("#pcantidad").val();
 			descuento=$("#pdescuento").val();
 			precio_venta=$("#pprecio_venta").val();
 			stock=$("#pstock").val();

 			if (idarticulo!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="")
 			{
 				if( parseInt(stock)>=parseInt(cantidad))
 				{
 					subtotal[cont]=(cantidad*precio_venta-descuento);
 					total=total+subtotal[cont];
 					var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+idarticulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';
 					cont++;
 					limpiar();
 					$("#total").html("S/. " + total);
 					$("#total_venta").val(total);
 					evaluar();
 					$("#detalle").append(fila);

 				}else{
 					alert("stock insuficinete...!");
 				}



 			}else
 			{
 				alert("error al ingresar el detalle de la venta, revise los datos del articulos");
 			}
 		}

 		function limpiar(){
 			$("#pcantidad").val("");
 			$("#pdescuento").val("0.00");
 			$("#pprecio_venta").val("");
 		}
 		function evaluar(){
 			if (total>0){
 				$("#guardar").show();
 			}else{
 				$("#guardar").hide();
 			}
 		}
 		function eliminar(index)
 		{
 			total= total-subtotal[index];
 			$("#total").html("S/. " + total);
 			$("#total_venta").val(total);
 			$("#fila" + index).remove();
 			evaluar();
 		}

 	</script>
 @endpush
@endsection
