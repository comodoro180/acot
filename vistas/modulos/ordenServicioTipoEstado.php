  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Tipos de Estados de Orden de Servicio
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio">Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li><a href="">Orden Pedido</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOrdenServicioTipoEstado">
            Agregar Tipo de Estado de Orden de Servicio
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $ordenServicioTipoEstado = ModeloOrdenServicioTipoEstado::mdlMostrarOrdenServicioTipoEstado("tordenserviciotipoestado", null, null);
                //var_dump($usuarios);
                foreach ($ordenServicioTipoEstado as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDORDENSERVICIOTIPOESTADO"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["DESCRIPCION"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarOrdenServicioTipoEstado btn-xs" idOrdenServicioTipoEstado="'.$value["IDORDENSERVICIOTIPOESTADO"].'" data-toggle="modal" data-target="#modalEditarOrdenServicioTipoEstado"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarOrdenServicioTipoEstado btn-xs" idOrdenServicioTipoEstado="'.$value["IDORDENSERVICIOTIPOESTADO"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR TIPO ESTADO DE ORDEN SERVICIO -->  
  <div id="modalAgregarOrdenServicioTipoEstado" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Tipo de Estado de Orden de Servicio</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-tag"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaOrdenServicioTipoEstado"  placeholder="Tipo de orden de servicio" required>                
                </div>
              </div> 
                
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <textarea class="form-control" rows="3" name="nuevaDescripcionOrdenServicio"  placeholder="Descripción" required></textarea>                
                </div>
              </div>                    
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Tipo De Estado de Orden de Servicio</button>
          </div>
    
          <?php
            $crearOrdenServicioTipoEstado = new ControladorOrdenServicioTipoEstado();
            $crearOrdenServicioTipoEstado ->ctrCrearOrdenServicioTipoEstado();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR TIPO DE ESTADO DE ORDEN SERVICIO-->

  <!-- MODAL EDITAR TIPO PRODUCTO -->  
  <div id="modalEditarOrdenServicioTipoEstado" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar tipo producto</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idOrdenServicioTipoEstado" name="idOrdenServicioTipoEstado">
              
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-tag"></i></span>
                  <input type="text" class="form-control input-lg" id="editarOrdenServicioTipoEstado" name="editarOrdenServicioTipoEstado" value="" placeholder="" >                
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
<!--                  <input type="text" class="form-control textarea" id="editarDescripcionTipoProducto" name="editarDescripcionTipoProducto" value="" placeholder="" >-->
                  <textarea class="form-control" rows="3" name="editarDescripcionOrdenServicio" id="editarDescripcionOrdenServicio" placeholder="Descripción" required></textarea>
                </div>
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Modificar Tipo Estado de Orden de Servicio</button>
          </div>
  
        <?php

          $editarOrdenServicioTipoEstado = new ControladorOrdenServicioTipoEstado();
          $editarOrdenServicioTipoEstado ->ctrEditarOrdenServicioTipoEstado();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR TIPO ESTADO DE ORDEN DE SERVICIO-->  
  
<?php

  $borrarOrdenServicioTipoEstado = new ControladorOrdenServicioTipoEstado();
  $borrarOrdenServicioTipoEstado ->ctrBorrarOrdenServicioTipoEstado();
  
?> 