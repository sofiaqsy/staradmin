@extends ('layouts.admin')
@section ('contenido')

<div class="col-md-12 col-xs-12">
        <div class="col-md-12" role="" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs " role="tablist">
            <li class="active"><a href="/compras">Compras</a>
            </li>
            <li><a href="/compras/list">Listado de ingresos</a>
            </li>
            <li><a href="#tab_content3">Profile</a>
            </li>
          </ul>
        </div>
        <div class="clearfix"></div>
       <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
         <br>
         <div class="col-md-12 col-sm-12 col-xs-12" style="margin-left: 9px;margin-right: 20px;">
           <div class="form-group" >
             <label class="control-label" for="first-name">Proveedor<span class="required">*</span>
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
           <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="col-md-4 col-sm-4 col-xs-12">
               <div class="form-group">
                 <label class="control-label" for="last-name">Tipo de comprobante<span class="required">*</span>
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
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                <label class="control-label" for="last-name">Serie comprobante<span class="required">*</span>
                </label>
                  <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                <label class="control-label" for="last-name">Nùmero de comprobante<span class="required">*</span>
                </label>
                  <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
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
                     <select class="form-control">
                                   <option>Choose option</option>
                                   <option>Option one</option>
                                   <option>Option two</option>
                                   <option>Option three</option>
                                   <option>Option four</option>
                      </select>
                   </div>
                 </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group">
                    <label class="control-label" for="last-name">Cantidad<span class="required">*</span>
                    </label>
                      <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 ">
                  <div class="form-group">
                    <label class="control-label" for="last-name">Stock<span class="required">*</span>
                    </label>
                      <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group">
                    <label class="control-label" for="last-name">Precio Venta<span class="required">*</span>
                    </label>
                      <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group">
                    <label class="control-label" for="last-name">Descuento<span class="required">*</span>
                    </label>
                      <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <button type="submit" class="btn btn-success">Agregar</button>
                <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Eliminar</th>
                            <th class="column-title">Articulo</th>
                            <th class="column-title">Cantidad</th>
                            <th class="column-title">Precio compra</th>
                            <th class="column-title">Precio venta</th>
                            <th class="column-title">Subtotal</th>

                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <a class="close-link"><i class="fa fa-close"></i></a>
                            </td>
                            <td class=" ">121000040 Shampoo</td>
                            <td class=" ">300</td>
                            <td class=" ">10.00</td>
                            <td class=" ">15.00</td>
                            <td class=" ">3000.00</td>
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              TOTAL
                            </td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" "></td>
                            <td class=" ">3000.00</td>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
               </div>
             </div>
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
         </form>
 </div>



@stop
