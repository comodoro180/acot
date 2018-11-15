  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Proveedor de Productos       
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
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedorProducto">
            Agregar Proveedor Producto
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Producto</th>                
                <th>Proveedor</th>
                <th>Valor Unitario</th>
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $proveedorProductos = ModeloProveedorProductos::mdlMostrarProveedorProductos('tproveedorproducto',null, null);
                //var_dump($usuarios);
                foreach ($proveedorProductos as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDPROVEEDORPRODUCTO"].'</td>
                          <td>'.$value["PRODUCTO"].'</td>
                          <td>'.$value["PROVEEDOR"].'</td>                              
                          <td>'.$value["VALORUNITARIO"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarProveedorProducto btn-xs" idProveedorProducto="'.$value["IDPROVEEDORPRODUCTO"].'" data-toggle="modal" data-target="#modalEditarProveedorProducto"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarProveedorProducto btn-xs" idProveedorProducto="'.$value["IDPROVEEDORPRODUCTO"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR PROVEEDOR PRODUCTOS -->  
  <div id="modalAgregarProveedorProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Proveedor Producto</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
                
              <label>Producto:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoProducto" required>
                    <option value="">Seleccionar Producto</option> 
                    <?php
                      $producto = ModeloProductos::mdlMostrarProductos("tproducto", null, null);
                      foreach ($producto as $key => $value){
                        echo '<option value="'.$value["IDPRODUCTO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>                  
              </div> 
              
              <label>Proveedor:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevoProveedor" required>
                    <option value="">Seleccionar Proveedor</option> 
                    <?php
                      $proveedor = ModeloProveedores::mdlMostrarProveedores("tproveedor", null, null);
                      foreach ($proveedor as $key => $value){
                        echo '<option value="'.$value["IDPROVEEDOR"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>                  
              </div>
              
              <label>Valor Unitario:</label>
              <div class="form-group">
                  <input type="number" class="form-control input-lg" name="nuevoValorUnitario"  placeholder="Valor Unitario" required>                
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Proveedor Producto</button>
          </div>
    
          <?php
            $crearProveedorProducto = new ControladorProveedorProductos();
            $crearProveedorProducto ->ctrCrearProveedorProducto();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR -->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarProveedorProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Proveedor Producto</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idProveedorProducto" name="idProveedorProducto">
              
              <label>Producto:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="editarIdProducto" required>
                      <option value="" id="editarIdProducto"></option> 
                    <?php
                      $producto = ModeloProductos::mdlMostrarProductos("tproducto", null, null);
                      foreach ($producto as $key => $value){
                        echo '<option value="'.$value["IDPRODUCTO"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>                  
              </div> 
              
              <label>Proveedor:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="editarIdProveedor" required>
                    <option value="" id="editarIdProveedor"></option> 
                    <?php
                      $proveedor = ModeloProveedores::mdlMostrarProveedores("tproveedor", null, null);
                      foreach ($proveedor as $key => $value){
                        echo '<option value="'.$value["IDPROVEEDOR"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>                  
              </div>
              
              <label>Valor Unitario:</label>
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>
                  <input type="text" class="form-control input-lg" id="editarValorUnitario" name="editarValorUnitario" value="" placeholder="Valor Unitario" >                
                </div>
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Modificar Proveedor Producto</button>
          </div>
  
        <?php

          $editarProveedorProducto = new ControladorProveedorProductos();
          $editarProveedorProducto ->ctrEditarProveedorProducto();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR  -->  
  
<?php

  $borrarProveedorProducto = new ControladorProveedorProductos();
  $borrarProveedorProducto ->ctrBorrarProveedorProducto();
  
?> 