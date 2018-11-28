  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Contactos De Proveedores
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li class="active"><a href="proveedores">Proveedores</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarContactoProveedor">
            Agregar Contacto Proveedor
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>Nombre</th>                
                <th>Email</th>
                <th>Principal</th>                
                <th>Proveedor</th>
                <th>Estado</th>                
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $contactoProveedor = ModeloContactosProveedor::mdlMostrarContactosProveedor('tproveedorcontactos',null, null);
                //var_dump($usuarios);
                foreach ($contactoProveedor as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDEMPRESACONTACTOS"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["EMAIL"].'</td>
                          <td>';
                          if ($value["PRINCIPAL"] == 1){                            
                            echo '<button class="btn btn-success btn-xs btnContactoProveedorPrincipal" idPrincipal="'.$value["IDEMPRESACONTACTOS"].'" principal="0">Contacto Principal</button>';
                          } else {                           
                            echo '<button class="btn btn-danger btn-xs btnContactoProveedorPrincipal" idPrincipal="'.$value["IDEMPRESACONTACTOS"].'" principal="1">No Contacto Principal</button></td>';
                          }         
                    echo '</td>
                          <td>'.$value["PROVEEDOR"].'</td>
                          <td>';
                          if ($value["ESTADO"] == 1){                            
                            echo '<button class="btn btn-success btn-xs btnActivarContactoProveedor" idProveedorContacto="'.$value["IDEMPRESACONTACTOS"].'" estadoContactoProveedor="0">Activo</button>';
                          } else {                           
                            echo '<button class="btn btn-danger btn-xs btnActivarContactoProveedor" idProveedorContacto="'.$value["IDEMPRESACONTACTOS"].'" estadoContactoProveedor="1">Inactivo</button></td>';
                          }         
                    echo '</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarContactoProveedor btn-xs" idEmpresaContactos="'.$value["IDEMPRESACONTACTOS"].'" data-toggle="modal" data-target="#modalEditarContactoProveedor"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarContactoProveedor btn-xs" idEmpresaContactos="'.$value["IDEMPRESACONTACTOS"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR CONTACTO PROVEEDOR -->  
  <div id="modalAgregarContactoProveedor" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Contacto de Proveedor</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
                
              <label>Nombre:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-address-card"></i></span>                                    
                  <input type="text" class="form-control input-lg" name="nuevoContactoProveedor"  placeholder="Nombre del Contacto" required>                
                </div>
              </div>
              
              <label>E-mail:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-envelope-open-o"></i></span>                
                  <input type="email" class="form-control input-lg" id="nuevoEmailCP" name="nuevoEmailCP"  placeholder="Email" required>
                </div>
              </div>
              
              <label>Principal:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-check-circle-o"></i></span>                
                  <input type="hidden" name="nuevoPrincipal"  placeholder="Principal" value="0">
                  <input type="checkbox" name="nuevoPrincipal"  placeholder="Principal" value="1"> Contacto Principal
                </div>
              </div>
              
              <label>Proveedor:</label>
              <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-group"></i></span>
                        <select class="form-control input-lg" id="nuevoIdProveedor" name="nuevoIdProveedor" required>
                          <option value="">Seleccionar Proveedor</option> 
                          <?php
                            $proveedor = ModeloProveedores::mdlMostrarProveedores('tproveedor', null, null);
                            foreach ($proveedor as $key => $value){
                              echo '<option value="'.$value["IDPROVEEDOR"].'">'.$value["NOMBRE"].'</option>';
                            }
                          ?>
                        </select>                  
                    </div> 
                </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Contacto</button>
          </div>
    
          <?php
            $crearContactoProveedor = new ControladorContactosProveedor();
            $crearContactoProveedor ->ctrCrearContactoProveedor();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR -->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarContactoProveedor" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Contacto Proveedor</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idEmpresaContactos" name="idEmpresaContactos">
              
              <label>Contacto:</label>
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-address-card"></i></span>
                  <input type="text" class="form-control input-lg" id="editarContactoProveedor" name="editarContactoProveedor" value="" placeholder="Nombre" >                
                </div>
              </div>

              <label>E-mail:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-envelope-open-o"></i></span>                
                  <input type="text" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" placeholder="Email" >
                </div>
              </div>            
              
              <label>Proveedor:</label>
              <div class="form-group">
                  <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-group"></i></span>
                    <select class="form-control input-lg" name="editarIdProveedor" required>
                      <option value="" id="editarIdProveedor"></option> 
                      <?php
                            $proveedor = ModeloProveedores::mdlMostrarProveedores('tproveedor',null, null);
                            foreach ($proveedor as $key => $value){
                              echo '<option value="'.$value["IDPROVEEDOR"].'">'.$value["NOMBRE"].'</option>';
                            }
                          ?> 
                   </select>
                  </div> 
              </div> 
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Modificar Contacto Proveedor</button>
          </div>
  
        <?php

          $editarContactoProveedor = new ControladorContactosProveedor();
          $editarContactoProveedor ->ctrEditarContactoProveedor();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR USUARIO -->  
  
<?php

  $borrarContactoProveedor = new ControladorContactosProveedor();
  $borrarContactoProveedor ->ctrBorrarContactoProveedor();
  
 