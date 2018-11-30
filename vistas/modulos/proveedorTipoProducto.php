  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Proveedores de Tipos de Productos
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
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedorTipoProducto">
            Agregar Proveedor Tipo Producto
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Proveedor</th>                
                <th>Tipo de Producto</th>
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $proveedorTipoProducto = ModeloProveedorTipoProducto::mdlMostrarProveedorTipoProducto('tproveedortipoproducto',null, null);
                //var_dump($usuarios);
                foreach ($proveedorTipoProducto as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDPROVEEDORTIPOPRODUCTO"].'</td>
                          <td>'.$value["PROVEEDOR"].'</td>
                          <td>'.$value["TIPOPRODUCTO"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarProveedorTipoProducto btn-xs" idProveedorTipoProducto="'.$value["IDPROVEEDORTIPOPRODUCTO"].'" data-toggle="modal" data-target="#modalEditarProveedorTipoProducto"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarProveedorTipoProducto btn-xs" idProveedorTipoProducto="'.$value["IDPROVEEDORTIPOPRODUCTO"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR PROVEEDOR TIPO PRODUCTOS -->  
  <div id="modalAgregarProveedorTipoProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Proveedor Tipo Producto</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
                
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
              
              <label>Tipo de Producto:</label>
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
            <button type="submit" class="btn btn-primary" >Guardar Proveedor Tipo Producto</button>
          </div>
    
          <?php
            $crearProveedorTipoProducto = new ControladorProveedorTipoProducto();
            $crearProveedorTipoProducto ->ctrCrearProveedorTipoProducto();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR -->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarProveedorTipoProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Proveedor Tipo Producto</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idProveedorTipoProducto" name="idProveedorTipoProducto">
              
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
              
              <label>Tipo de Producto:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="editarIdTipoProducto" required>
                    <option value="" id="editarIdTipoProducto"></option> 
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
            <button type="submit" class="btn btn-primary" >Modificar Proveedor Tipo Producto</button>
          </div>
  
        <?php

          $editarProveedorTipoProducto = new ControladorProveedorTipoProducto();
          $editarProveedorTipoProducto ->ctrEditarProveedorTipoProducto();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR  -->  
  
<?php

  $borrarProveedorTipoProducto = new ControladorProveedorTipoProducto();
  $borrarProveedorTipoProducto ->ctrBorrarProveedorTipoProducto();
  
?> 