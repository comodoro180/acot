  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Tipos de Estados de Pedidos
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio">Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li><a href="">Pedidos</a></li>
        <li class="active">Tipo de Estado de Pedidos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPedidoTipoEstado">
            Agregar Tipo de Estado de Pedidos
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
                $pedidoTipoEstado = ModeloPedidoTipoEstado::mdlMostrarPedidoTipoEstado("tpedidotipoestado", null, null);
                //var_dump($usuarios);
                foreach ($pedidoTipoEstado as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDPEDIDOTIPOESTADO"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["DESCRIPCION"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarPedidoTipoEstado btn-xs" idPedidoTipoEstado="'.$value["IDPEDIDOTIPOESTADO"].'" data-toggle="modal" data-target="#modalEditarPedidoTipoEstado"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarPedidoTipoEstado btn-xs" idPedidoTipoEstado="'.$value["IDPEDIDOTIPOESTADO"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR TIPO ESTADO DE PEDIDOS -->  
  <div id="modalAgregarPedidoTipoEstado" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar tipo de estado de pedidos</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoPedidoTipoEstado"  placeholder="Tipo de estado de pedidos" required>                
                </div>
              </div> 
                
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <!--<input type="text" class="form-control textarea" name="nuevaDescripcionTipoProducto"  placeholder="Descripción" required>-->                
                  <textarea class="form-control" rows="3" name="nuevaDescripcion"  placeholder="Descripción" required></textarea>                
                </div>
              </div>                    
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Tipo De Estado de Productos</button>
          </div>
    
          <?php
            $crearPedidoTipoEstado = new ControladorPedidoTipoEstado();
            $crearPedidoTipoEstado ->ctrCrearPedidoTipoEstado();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR TIPO DE ESTADO DE PEDIDOS-->

  <!-- MODAL EDITAR TIPO PRODUCTO -->  
  <div id="modalEditarPedidoTipoEstado" class="modal fade" role="dialog">
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

              <input type="hidden" id="idPedidoTipoEstado" name="idPedidoTipoEstado">
              
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" id="editarPedidoTipoEstado" name="editarPedidoTipoEstado" value="" placeholder="" >                
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
<!--                  <input type="text" class="form-control textarea" id="editarDescripcionTipoProducto" name="editarDescripcionTipoProducto" value="" placeholder="" >-->
                  <textarea class="form-control" rows="3" name="editarDescripcion" id="editarDescripcion" placeholder="Descripción" required></textarea>
                </div>
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Modificar Tipo Estado de Productos</button>
          </div>
  
        <?php

          $editarPedidoTipoEstado = new ControladorPedidoTipoEstado();
          $editarPedidoTipoEstado ->ctrEditarPedidoTipoEstado();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR TIPO ESTADO DE PRODUCTOS-->  
  
<?php

  $borrarPedidoTipoEstado = new ControladorPedidoTipoEstado();
  $borrarPedidoTipoEstado ->ctrBorrarPedidoTipoEstado();
  
?> 