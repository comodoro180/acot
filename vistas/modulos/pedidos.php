<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Pedidos
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
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPedido">
            Agregar Pedido
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Fecha Creación</th>
                <th>Fecha Modificación</th>                
                <th>Fecha Entrega</th>
                <th>Observaciones</th>
                <th>Tipo de Estado</th>
                <th>Empresa</th>
                <th>Usuario</th>                
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $pedidos = ModeloPedidos::mdlMostrarPedidos('tpedido',null, null);
                //var_dump($usuarios);
                foreach ($pedidos as $key => $value){
                    echo '
                        <tr>
                            <td>'.$value["IDPEDIDO"].'</td>
                            <td>'.$value["FECHACREACION"].'</td>
                            <td>'.$value["FECHAMODIFICACION"].'</td>
                            <td>'.$value["FECHAENTREGA"].'</td>
                            <td>'.$value["OBSERVACIONES"].'</td>
                            <td>'.$value["ESTADO"].'</td>
                            <td>'.$value["EMPRESA"].'</td>
                            <td>'.$value["USUARIO"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarPedido btn-xs" idPedido="'.$value["IDPEDIDO"].'" data-toggle="modal" data-target="#modalEditarPedido"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarPedido btn-xs" idPedido="'.$value["IDPEDIDO"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR PEDIDO -->  
  <div id="modalAgregarPedido" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Pedido</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
              
              <label>Fecha Entrega:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="datetime-local" class="form-control input-lg" name="nuevaFechaE" required>                
                </div>
              </div>
                
              <label>Observaciones:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>                               
                  <textarea class="form-control" rows="3" name="nuevaObservacion"  placeholder="Observaciones" required></textarea>                
                </div>
              </div>
              
              
              <label>Estado:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoPedidoTipoEstado" required>
                    <option value="">Seleccione el estado</option> 
                    <?php
                      $estado = ModeloPedidoTipoEstado::mdlMostrarPedidoTipoEstado("tpedidotipoestado", null , null);
                      foreach ($estado as $key => $value){
                        echo '<option value="'.$value["IDPEDIDOTIPOESTADO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Empresa:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevaEmpresa" required>
                    <option value="">Seleccione la empresa</option> 
                    <?php
                      $empresa = ModeloEmpresas::mdlMostrarEmpresas("tempresa", null , null);
                      foreach ($empresa as $key => $value){
                        echo '<option value="'.$value["IDEMPRESA"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
              </div>
              
              <label>Usuario:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoUsuario" required>
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
            <button type="submit" class="btn btn-primary" >Guardar Pedido</button>
          </div>
    
          <?php
            $crearPedido = new ControladorPedidos();
            $crearPedido ->ctrCrearPedido();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR PEDIDO-->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarPedido" class="modal fade" role="dialog" >
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Pedido</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idPedido" name="idPedido">

              
              <label>Fecha Entrega:</label>
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>
                  <input type="datetime-local" class="form-control input-lg" id="editarFechaEP" name="editarFechaEP" value="">                
                </div>
              </div>
              
              <label>Observaciones:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>                               
                  <textarea class="form-control" rows="3" name="editarObservacionesP" id="editarObservacionesP" value="" required></textarea>                
                </div>
              </div>
              
              <label>Estado:</label>
              <div class="form-group">                
                  <select class="form-control input-lg" name="editarPedidoTipoEstadoP" required>
                    <option value="" id="editarPedidoTipoEstadoP"></option> 
                    <?php
                      $estado = ModeloPedidoTipoEstado::mdlMostrarPedidoTipoEstado("tpedidotipoestado", null , null);                      
                      foreach ($estado as $key => $value){
                        echo '<option value="'.$value["IDPEDIDOTIPOESTADO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>                
              </div>
              
              <label>Empresa:</label>
              <div class="form-group">                
                  <select class="form-control input-lg" name="editarEmpresaP" required>
                    <option value="" id="editarEmpresaP"></option> 
                    <?php
                      $empresa = ModeloEmpresas::mdlMostrarEmpresas("tempresa", null , null);                      
                      foreach ($empresa as $key => $value){
                        echo '<option value="'.$value["IDEMPRESA"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>                
              </div>
              
              <label>Usuario:</label>
              <div class="form-group">                
                  <select class="form-control input-lg" name="editarUsuarioP" required>
                    <option value="" id="editarUsuarioP"></option> 
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
            <button type="submit" class="btn btn-primary" >Modificar Pedido</button>
          </div>
  
        <?php

          $editarPedido = new ControladorPedidos();
          $editarPedido ->ctrEditarPedido();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR PEDIDO -->  
  
<?php

  $borrarPedido = new ControladorPedidos();
  $borrarPedido ->ctrBorrarPedido();
  
?> 
