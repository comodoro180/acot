<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Cotizaciones
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li class="active"><a href="cotizaciones">Cotizaciones</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCotizacion">
            Agregar Cotización
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Fecha Creación</th>
                <th>Fecha Modificación</th>                
                <th>Fecha Vencimiento</th>
                <th>Observaciones</th>
                <th>Tipo de Estado</th>
                <th>Pedido</th>
                <th>Proveedor</th>
                <th>Usuario</th>                
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $cotizacion = ModeloCotizacion::mdlMostrarCotizacion('tcotizacion',null, null);
                //var_dump($usuarios);
                foreach ($cotizacion as $key => $value){
                    echo '
                        <tr>
                            <td>'.$value["IDCOTIZACION"].'</td>
                            <td>'.$value["FECHACREACION"].'</td>
                            <td>'.$value["FECHAMODIFICACION"].'</td>
                            <td>'.$value["FECHAVENCIMIENTO"].'</td>
                            <td>'.$value["OBSERVACIONES"].'</td>
                            <td>'.$value["ESTADO"].'</td>
                            <td>'.$value["PEDIDO"].'</td>
                            <td>'.$value["PROVEEDOR"].'</td>
                            <td>'.$value["USUARIO"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarCotizacion btn-xs" idCotizacion="'.$value["IDCOTIZACION"].'" data-toggle="modal" data-target="#modalEditarCotizacion"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarCotizacion btn-xs" idCotizacion="'.$value["IDCOTIZACION"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR COTIZACIÓN -->  
  <div id="modalAgregarCotizacion" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Cotización</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
              
              <label>Fecha Vencimiento:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="datetime-local" class="form-control input-lg" name="nuevaFechaVC" required>                
                </div>
              </div>
                
              <label>Observaciones:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>                               
                  <textarea class="form-control" rows="3" name="nuevaObservacionC"  placeholder="Observaciones" required></textarea>                
                </div>
              </div>
              
              
              <label>Estado:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevaCotizacionTipoEstado" required>
                    <option value="">Seleccione el estado</option> 
                    <?php
                      $estado = ModeloCotizacionTipoEstado::mdlMostrarCotizacionTipoEstado("tcotizaciontipoestado", null , null);
                      foreach ($estado as $key => $value){
                        echo '<option value="'.$value["IDCOTIZACIONTIPOESTADO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Pedido:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoPedidoC" required>
                    <option value="">Seleccione el Pedido</option> 
                    <?php
                      $pedido = ModeloPedidos::mdlMostrarPedidos("tpedido", null , null);
                      foreach ($pedido as $key => $value){
                        echo '<option value="'.$value["IDPEDIDO"].'">'.$value["OBSERVACIONES"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Proveedor:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoProveedorC" required>
                    <option value="">Seleccione el proveedor</option> 
                    <?php
                      $proveedor = ModeloProveedores::mdlMostrarProveedores("tproveedor", null , null);
                      foreach ($proveedor as $key => $value){
                        echo '<option value="'.$value["IDPROVEEDOR"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div
              
              <label>Usuario:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoUsuarioC" required>
                    <option value="">Seleccione el usuario</option> 
                    <?php
                      $usuario = ModeloUsuarios::mdlMostrarUsuarios("tusuario", null , null);
                      foreach ($usuario as $key => $value){
                        echo '<option value="'.$value["IDUSUARIO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Cotización</button>
          </div>
    
          <?php
            $crearCotizacion = new ControladorCotizacion();
            $crearCotizacion ->ctrCrearCotizacion();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR COTIZACIÓN-->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarCotizacion" class="modal fade" role="dialog" >
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Cotización</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idCotizacion" name="idCotizacion">

              
              <label>Fecha Vencimiento:</label>
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>
                  <input type="datetime-local" class="form-control input-lg" id="editarFechaVC" name="editarFechaVC" value="">                
                </div>
              </div>
              
              <label>Observaciones:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>                               
                  <textarea class="form-control" rows="3" name="editarObservacionesC" id="editarObservacionesC" value="" required></textarea>                
                </div>
              </div>
              
              <label>Estado:</label>
              <div class="form-group">                
                  <select class="form-control input-lg" name="editarCotizacionTipoEstado" required>
                    <option value="" id="editarCotizacionTipoEstado"></option> 
                    <?php
                      $estado = ModeloCotizacionTipoEstado::mdlMostrarCotizacionTipoEstado("tcotizaciontipoestado", null , null);                      
                      foreach ($estado as $key => $value){
                        echo '<option value="'.$value["IDCOTIZACIONTIPOESTADO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>                
              </div>
              
              <label>Pedido:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="editarPedidoC" required>
                      <option value="" id="editarPedidoC">Seleccione el Pedido</option> 
                    <?php
                      $pedido = ModeloPedidos::mdlMostrarPedidos("tpedido", null , null);
                      foreach ($pedido as $key => $value){
                        echo '<option value="'.$value["IDPEDIDO"].'">'.$value["OBSERVACIONES"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Proveedor:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="editarProveedorC" required>
                      <option value="" id="editarProveedorC">Seleccione el proveedor</option> 
                    <?php
                      $proveedor = ModeloProveedores::mdlMostrarProveedores("tproveedor", null , null);
                      foreach ($proveedor as $key => $value){
                        echo '<option value="'.$value["IDPROVEEDOR"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div
              
              <label>Usuario:</label>
              <div class="form-group">                
                  <select class="form-control input-lg" name="editarUsuarioC" required>
                    <option value="" id="editarUsuarioC"></option> 
                    <?php
                      $usuario = ModeloUsuarios::mdlMostrarUsuarios("tusuario", null , null);                      
                      foreach ($usuario as $key => $value){
                        echo '<option value="'.$value["IDUSUARIO"].'">'.$value["NOMBRE"]." ".$value["APELLIDO"].'</option>';
                      }
                    ?>
                  </select>                
              </div> 

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Modificar Cotización</button>
          </div>
  
        <?php

          $editarCotizacion = new ControladorCotizacion();
          $editarCotizacion ->ctrEditarCotizacion();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR COTIZACION -->  
  
<?php

  $borrarCotizacion = new ControladorCotizacion();
  $borrarCotizacion ->ctrBorrarCotizacion();
  
?> 
