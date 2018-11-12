  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de tipos de producto        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio">Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li><a href="">Productos</a></li>
        <li class="active">Tipos de producto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTipoProducto">
            Agregar tipo de producto
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $tiposProducto = ModeloTipoProducto::mdlMostrarTiposProducto("ttipoproducto", null, null);
                //var_dump($usuarios);
                foreach ($tiposProducto as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDTIPOPRODUCTO"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["DESCRIPCION"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarTipoProducto btn-xs" idTipoProducto="'.$value["IDTIPOPRODUCTO"].'" data-toggle="modal" data-target="#modalEditarTipoProducto"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarTipoProducto btn-xs" idTipoProducto="'.$value["IDTIPOPRODUCTO"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR TIPO PRODUCTO -->  
  <div id="modalAgregarTipoProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar tipo de producto</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombreTipoProducto"  placeholder="Tipo de producto" required>                
                </div>
              </div> 
                
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>                               
                  <textarea class="form-control" rows="3" name="nuevaDescripcionTipoProducto"  placeholder="Descripción" required></textarea>                
                </div>
              </div>                    
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar tipo producto</button>
          </div>
    
          <?php
            $crearTipoProducto = new ControladorTiposProducto();
            $crearTipoProducto -> ctrCrearTipoProducto();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR TIPO PRODUCTO -->

  <!-- MODAL EDITAR TIPO PRODUCTO -->  
  <div id="modalEditarTipoProducto" class="modal fade" role="dialog">
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

              <input type="hidden" id="idTipoProducto" name="idTipoProducto">
              
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNombreTipoProducto" name="editarNombreTipoProducto" value="" placeholder="" >                
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <textarea class="form-control" rows="3" name="editarDescripcionTipoProducto" id="editarDescripcionTipoProducto" placeholder="Descripción" required></textarea>
                </div>
              </div>

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Modificar tipo producto</button>
          </div>
  
        <?php

          $editarTipoProducto = new ControladorTiposProducto();
          $editarTipoProducto ->ctrEditarTipoProducto();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR TIPO PRODUCTO -->  
  
<?php

  $borrarTipoProducto = new ControladorTiposProducto();
  $borrarTipoProducto ->ctrBorrarTipoProducto();
  
?> 