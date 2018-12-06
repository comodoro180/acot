<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Detalle de Cotizaciones
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li class="active"><a href="pedidos">Cotizaciones</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCotizacionDetalle">
            Agregar Detalle Cotización
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Cotización</th>
                <th>Valor Unitario</th>                
                <th>Valor Cotizado</th>
                <th>Cantidad Original</th>
                <th>Cantidad Cotizada</th>
                <th>Estado</th>
                <th>Producto</th>
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $cotizacionDetalle = ModeloCotizacionDetalles::mdlMostrarCotizacionDetalles('tcotizaciondetalle',null, null);
                //var_dump($usuarios);
                foreach ($cotizacionDetalle as $key => $value){
                    echo '
                        <tr>
                            <td>'.$value["IDCOTIZACIONDETALLE"].'</td>
                            <td>'.$value["COTIZACION"].'</td>
                            <td>'.$value["VALORUNITARIO"].'</td>
                            <td>'.$value["VALORCOTIZADO"].'</td>
                            <td>'.$value["CANTIDADORIGINAL"].'</td>
                            <td>'.$value["CANTIDADCOTIZADA"].'</td>
                            <td>'.$value["DETALLE"].'</td>                          
                            <td>'.$value["PRODUCTO"].'</td>                          
                            <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarCotizacionDetalle btn-xs" idCotizacionDetalle="'.$value["IDCOTIZACIONDETALLE"].'" data-toggle="modal" data-target="#modalEditarCotizacionDetalle"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarCotizacionDetalle btn-xs" idCotizacionDetalle="'.$value["IDCOTIZACIONDETALLE"].'"><i class="fa fa-times"></i></button>
                            </div>
                          </td>
                        </tr>                        
                    ';                    
                }
              ?>
 
            </tbody>
          </table>            

        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  

  <!-- MODAL AGREGAR DETALLLE COTIZACIÓN-->  
  <div id="modalAgregarCotizacionDetalle" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Detalle Pedido</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
                
              <label>Cotización:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevaCotizacionCD" required>
                    <option value="">Seleccione la cotización</option> 
                    <?php
                      $cotizacion = ModeloCotizacion::mdlMostrarCotizacion("tcotizacion", null , null);
                      foreach ($cotizacion as $key => $value){
                        echo '<option value="'.$value["IDCOTIZACION"].'">'.$value["OBSERVACIONES"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Valor Unitario:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="number" class="form-control input-lg" id="nuevoValorUnitarioCD" name="nuevoValorUnitarioCD" placeholder="Valor unitario" required>                
                </div>
              </div>
              
              <label>Valor Cotizado:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="number" class="form-control input-lg" id="nuevoValorCotizadoCD" name="nuevoValorCotizadoCD" placeholder="Valor cotizado" required>                
                </div>
              </div>
              
              <label>Cantidad Original:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="number" class="form-control input-lg" id="nuevaCantidadOriginalCD" name="nuevaCantidadOriginalCD" placeholder="Cantidad original" required>                
                </div>
              </div>
              
              <label>Cantidad Cotizada:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="number" class="form-control input-lg" id="nuevaCantidadCotizadaCD" name="nuevaCantidadCotizadaCD" placeholder="Cantidad cotizada" required>                
                </div>
              </div>
              
              <label>Estado:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoEstadoCD" required>
                    <option value="">Seleccione el estado</option> 
                    <?php
                      $estado = ModeloCotizacionDetalleTipoEstado::mdlMostrarCotizacionDetalleTipoEstado("tcotizaciondetalletipoestado", null , null);
                      foreach ($estado as $key => $value){
                        echo '<option value="'.$value["IDCOTIZACIONDETALLETIPOESTADO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Producto:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoProductoCD" required>
                    <option value="">Seleccione el producto</option> 
                    <?php
                      $producto = ModeloProductos::mdlMostrarProductos("tproducto", null , null);
                      foreach ($producto as $key => $value){
                        echo '<option value="'.$value["IDPRODUCTO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Detalle Cotización</button>
          </div>
    
          <?php
            $crearCotizacionDetalle = new ControladorCotizacionDetalles();
            $crearCotizacionDetalle ->ctrCrearCotizacionDetalles();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR DETALLE PEDIDO-->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarCotizacionDetalle" class="modal fade" role="dialog" >
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Detalle Cotización</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
                
                <input type="hidden" id="idCotizacionDetalle" name="idCotizacionDetalle">
                
              <label>Cotización:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="editarCotizacionCD" required>
                      <option value="" id="editarCotizacionCD">Seleccione la cotización</option> 
                    <?php
                      $cotizacion = ModeloCotizacion::mdlMostrarCotizacion("tcotizacion", null , null);
                      foreach ($cotizacion as $key => $value){
                        echo '<option value="'.$value["IDCOTIZACION"].'">'.$value["OBSERVACIONES"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Valor Unitario:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="number" class="form-control input-lg" id="editarValorUnitarioCD" name="editarValorUnitarioCD" placeholder="Valor unitario" required>                
                </div>
              </div>
              
              <label>Valor Cotizado:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="number" class="form-control input-lg" id="editarValorCotizadoCD" name="editarValorCotizadoCD" placeholder="Valor cotizado" required>                
                </div>
              </div>
              
              <label>Cantidad Original:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="number" class="form-control input-lg" id="editarCantidadOriginalCD" name="editarCantidadOriginalCD" placeholder="Cantidad original" required>                
                </div>
              </div>
              
              <label>Cantidad Cotizada:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="number" class="form-control input-lg" id="editarCantidadCotizadaCD" name="editarCantidadCotizadaCD" placeholder="Cantidad original" required>                
                </div>
              </div>
              
              <label>Estado:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="editarEstadoCD" required>
                    <option value="" id="editarEstadoCD">Seleccione el estado</option> 
                    <?php
                      $estado = ModeloCotizacionDetalleTipoEstado::mdlMostrarCotizacionDetalleTipoEstado("tcotizaciondetalletipoestado", null , null);
                      foreach ($estado as $key => $value){
                        echo '<option value="'.$value["IDCOTIZACIONDETALLETIPOESTADO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Producto:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="editarProductoCD" required>
                    <option value="" id="editarProductoCD">Seleccione el producto</option> 
                    <?php
                      $producto = ModeloProductos::mdlMostrarProductos("tproducto", null , null);
                      foreach ($producto as $key => $value){
                        echo '<option value="'.$value["IDPRODUCTO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Modificar Detalle Cotización</button>
          </div>
  
        <?php

          $editarCotizacionDetalle = new ControladorCotizacionDetalles();
          $editarCotizacionDetalle ->ctrEditarCotizacionDetalles();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR DETALLE PEDIDO-->  
  
<?php

  $borrarCotizacionDetalle = new ControladorCotizacionDetalles();
  $borrarCotizacionDetalle ->ctrBorrarCotizacionDetalle();
  
?> 
