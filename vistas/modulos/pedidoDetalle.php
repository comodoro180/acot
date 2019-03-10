<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Detalle de Pedidos
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li class="active"><a href="pedidos">Pedidos</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPedidoDetalle">
            Agregar Detalle Pedido
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Pedido</th>                
                <th>Producto</th>
                <th>Cantidad</th>               
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $pedidoDetalle = ModeloPedidoDetalles::mdlMostrarPedidoDetalles('tpedidodetalle',null, null);
                //var_dump($usuarios);
                foreach ($pedidoDetalle as $key => $value){
                    echo '
                        <tr>
                            <td>'.$value["IDPEDIDODETALLE"].'</td>
                            <td>'.$value["PEDIDO"].'</td>
                            <td>'.$value["PRODUCTO"].'</td>
                            <td>'.$value["CANTIDAD"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarPedidoDetalle btn-xs" idPedidoDetalle="'.$value["IDPEDIDODETALLE"].'" data-toggle="modal" data-target="#modalEditarPedidoDetalle"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarPedidoDetalle btn-xs" idPedidoDetalle="'.$value["IDPEDIDODETALLE"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR DETALLLE PEDIDO -->  
  <div id="modalAgregarPedidoDetalle" class="modal fade" role="dialog">
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
                
              <label>Pedido:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoPedidoPD" required>
                    <option value="">Seleccione el Pedido</option> 
                    <?php
                      $pedido = ModeloPedidos::mdlMostrarPedidos("tpedido", null , null);
                      foreach ($pedido as $key => $value){
                        echo '<option value="'.$value["IDPEDIDO"].'">'.$value["OBSERVACIONES"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Producto:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoProductoPD" required>
                    <option value="">Seleccione el Producto</option> 
                    <?php
                      $producto = ModeloProductos::mdlMostrarProductos("tproducto", null , null);
                      foreach ($producto as $key => $value){
                        echo '<option value="'.$value["IDPRODUCTO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Cantidad:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="number" class="form-control input-lg" id="nuevaCantidadPD" name="nuevaCantidadPD" required>                
                </div>
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Detalle Pedido</button>
          </div>
    
          <?php
            $crearPedidoDetalle = new ControladorPedidoDetalles();
            $crearPedidoDetalle ->ctrCrearPedidoDetalles();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR DETALLE PEDIDO-->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarPedidoDetalle" class="modal fade" role="dialog" >
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Detalle Pedido</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idPedidoDetalle" name="idPedidoDetalle">
              
              <label>Pedido:</label>
              <div class="form-group">                
                  <select class="form-control input-lg" name="editarPedidoPD" required>
                    <option value="" id="editarPedidoPD"></option> 
                    <?php
                      $pedido = ModeloPedidos::mdlMostrarPedidos("tpedido", null , null);                      
                      foreach ($pedido as $key => $value){
                        echo '<option value="'.$value["IDPEDIDO"].'">'.$value["OBSERVACIONES"].'</option>';
                      }
                    ?>
                  </select>                
              </div>
              
              <label>Productoo:</label>
              <div class="form-group">                
                  <select class="form-control input-lg" name="editarProductoPD" required>
                    <option value="" id="editarProductoPD"></option> 
                    <?php
                      $producto = ModeloProductos::mdlMostrarProductos("tproducto", null , null);                      
                      foreach ($producto as $key => $value){
                        echo '<option value="'.$value["IDPRODUCTO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>                
              </div>
              
              <label>Cantidad:</label>
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>
                  <input type="number" class="form-control input-lg" id="editarCantidadPD" name="editarCantidadPD" value="">                
                </div>
              </div>
              

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Modificar Detalle Pedido</button>
          </div>
  
        <?php

          $editarPedidoDetalle = new ControladorPedidoDetalles();
          $editarPedidoDetalle ->ctrEditarPedidoDetalles();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR DETALLE PEDIDO-->  
  
<?php

  $borrarPedidoDetalle = new ControladorPedidoDetalles();
  $borrarPedidoDetalle ->ctrBorrarPedidoDetalle();
  
?> 
