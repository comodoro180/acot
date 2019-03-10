<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Ordenes de Servicio
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li class="active"><a href="ordenServicio">Orden Servicio</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOrdenServicio">
            Agregar Orden Servicio
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Fecha Creación</th>
                <th>Fecha Modificación</th>
                <th>Tipo de Estado</th>
                <th>Cotización</th>
                <th>Usuario</th>                
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $ordenServicio = ModeloOrdenServicio::mdlMostrarOrdenServicio('tordenservicio',null, null);
                //var_dump($usuarios);
                foreach ($ordenServicio as $key => $value){
                    echo '
                        <tr>
                            <td>'.$value["IDORDENSERVICIO"].'</td>
                            <td>'.$value["FECHACREACION"].'</td>
                            <td>'.$value["FECHAMODIFICACION"].'</td>
                            <td>'.$value["ESTADO"].'</td>
                            <td>'.$value["COTIZACION"].'</td>
                            <td>'.$value["USUARIO"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarOrdenServicio btn-xs" idOrdenServicio="'.$value["IDORDENSERVICIO"].'" data-toggle="modal" data-target="#modalEditarOrdenServicio"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarOrdenServicio btn-xs" idOrdenServicio="'.$value["IDORDENSERVICIO"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR ORDEN SERVICIO -->  
  <div id="modalAgregarOrdenServicio" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Orden Servicio</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
              
              <label>Estado:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoTipoEstadoOS" id="nuevoTipoEstadoOS" required>
                    <option value="">Seleccione el estado</option> 
                    <?php
                      $estado = ModeloOrdenServicioTipoEstado::mdlMostrarOrdenServicioTipoEstado("tordenserviciotipoestado", null , null);
                      foreach ($estado as $key => $value){
                        echo '<option value="'.$value["IDORDENSERVICIOTIPOESTADO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Cotizacion:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevaCotizacionOS" id="nuevaCotizacionOS" required>
                    <option value="">Seleccione la Cotización</option> 
                    <?php
                      $cotizacion = ModeloCotizacion::mdlMostrarCotizacion("tcotizacion", null , null);
                      foreach ($cotizacion as $key => $value){
                        echo '<option value="'.$value["IDCOTIZACION"].'">'.$value["OBSERVACIONES"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Usuario:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoUsuarioOS" id="nuevoUsuarioOS" required>
                    <option value="">Seleccione el usuario</option> 
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
            <button type="submit" class="btn btn-primary" >Guardar Orden Servicio</button>
          </div>
    
          <?php
            $crearOrdenServicio = new ControladorOrdenServicio();
            $crearOrdenServicio ->ctrCrearOrdenServicio();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR ORDEN SERVICIO-->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarOrdenServicio" class="modal fade" role="dialog" >
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Orden Servicio</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idOrdenServicio" name="idOrdenServicio">

              
              <label>Estado:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="editarTipoEstadoOS" required>
                    <option value="" id="editarTipoEstadoOS" >Seleccione el estado</option> 
                    <?php
                      $estado = ModeloOrdenServicioTipoEstado::mdlMostrarOrdenServicioTipoEstado("tordenserviciotipoestado", null , null);
                      foreach ($estado as $key => $value){
                        echo '<option value="'.$value["IDORDENSERVICIOTIPOESTADO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Cotizacion:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="editarCotizacionOS" required>
                      <option value="" id="editarCotizacionOS">Seleccione la Cotización</option> 
                    <?php
                      $cotizacion = ModeloCotizacion::mdlMostrarCotizacion("tcotizacion", null , null);
                      foreach ($cotizacion as $key => $value){
                        echo '<option value="'.$value["IDCOTIZACION"].'">'.$value["OBSERVACIONES"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Usuario:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="editarUsuarioOS" required>
                      <option value="" id="editarUsuarioOS">Seleccione el usuario</option> 
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
            <button type="submit" class="btn btn-primary" >Modificar Orden de Servicio</button>
          </div>
  
        <?php

          $editarOrdenServicio = new ControladorOrdenServicio();
          $editarOrdenServicio ->ctrEditarOrdenServicio();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR ORDEN SERVICIO -->  
  
<?php

  $borrarOrdenServicio = new ControladorOrdenServicio();
  $borrarOrdenServicio ->ctrBorrarOrdenServicio();
  
?> 
