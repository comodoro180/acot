  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Productos       
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li class="active"><a href="productos">Productos</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
            Agregar Producto
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Producto</th>                
                <th>Descripción</th>
                <th>Tipo De Producto</th>
                <th>Estado</th>                
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $productos = ModeloProductos::mdlMostrarProductos('tproducto',null, null);
                //var_dump($usuarios);
                foreach ($productos as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDPRODUCTO"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["DESCRIPCION"].'</td>                              
                          <td>'.$value["TIPOPRODUCTO"].'</td>
                          <td>';
                          if ($value["ESTADO"] == 1){                            
                            echo '<button class="btn btn-success btn-xs btnActivarProducto" idProducto="'.$value["IDPRODUCTO"].'" estadoProducto="0">Activo</button>';
                          } else {                           
                            echo '<button class="btn btn-danger btn-xs btnActivarProducto" idProducto="'.$value["IDPRODUCTO"].'" estadoProducto="1">Inactivo</button></td>';
                          }         
                    echo '</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarProducto btn-xs" idProducto="'.$value["IDPRODUCTO"].'" data-toggle="modal" data-target="#modalEditarProducto"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarProducto btn-xs" idProducto="'.$value["IDPRODUCTO"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR PRODUCTOS -->  
  <div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Producto</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
                
              <label>Producto:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="text" class="form-control input-lg" name="nuevoProducto"  placeholder="Producto" required>                
                </div>
              </div>
              
              <label>Descripción:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-phone"></i></span>                
                  <input type="text" class="form-control input-lg" name="nuevaDescripcion"  placeholder="Descripción" required>
                </div>
              </div>
              
              <label>Tipo Producto:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoTipoProducto" required>
                    <option value="">Seleccionar Tipo de Producto</option> 
                    <?php
                      $tipoProducto = ModeloTipoProducto::mdlMostrarTiposProducto("ttipoproducto", null, null);
                      foreach ($tipoProducto as $key => $value){
                        echo '<option value="'.$value["IDTIPOPRODUCTO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>                  
              </div> 
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Producto</button>
          </div>
    
          <?php
            $crearProducto = new ControladorProductos();
            $crearProducto ->ctrCrearProducto();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR -->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Producto</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idProducto" name="idProducto">
              
              <label>Producto:</label>
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-industry"></i></span>
                  <input type="text" class="form-control input-lg" id="editarProducto" name="editarProducto" value="" placeholder="Producto" >                
                </div>
              </div>

              <label>Descripción:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-file-text-o"></i></span>                
                  <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" value="" placeholder="Télefono" >
                </div>
              </div>            

              <label>Tipo de Producto:</label>
              <div class="form-group">
                  <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-list"></i></span>
                    <select class="form-control input-lg" name="editarTipoProducto" required>
                      <option value="" id="editarTipoProducto"></option> 
                      <?php
                        $tipoProducto = ModeloTipoProducto::mdlMostrarTiposProducto("ttipoproducto", null , null);
                        foreach ($tipoProducto as $key => $value){
                          echo '<option value="'.$value["IDTIPOPRODUCTO"].'">'.$value["NOMBRE"].'</option>';                                               
                        }
                      ?>
                    </select>
                  </div> 
              </div> 
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Modificar Producto</button>
          </div>
  
        <?php

          $editarProducto = new ControladorProductos();
          $editarProducto ->ctrEditarProducto();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR USUARIO -->  
  
<?php

  $borrarProducto = new ControladorProductos();
  $borrarProducto ->ctrBorrarProducto();
  
?> 