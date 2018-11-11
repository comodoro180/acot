<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Proveedores
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li class="active"><a href="proveedores">Proveedor</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">
            Agregar Proveedor
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">ID</th>
                <th>NIT</th>
                <th>Proveedor</th>                
                <th>Dirección</th>
                <th>Teléfono 1</th>
                <th>Teléfono 2</th>
                <th>Ciudad</th>
                <th>Estado</th>                
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $proveedores = ModeloProveedores::mdlMostrarProveedores(null, null);
                //var_dump($usuarios);
                foreach ($proveedores as $key => $value){
                    echo '
                        <tr>
                            <td>'.$value["IDPROVEEDOR"].'</td>
                            <td>'.$value["NIT"].'</td>
                            <td>'.$value["NOMBRE"].'</td>
                            <td>'.$value["DIRECCION"].'</td>
                            <td>'.$value["TELEFONO1"].'</td>
                            <td>'.$value["TELEFONO2"].'</td>
                            <td>'.$value["CIUDAD"].' ('.$value["DEPARTAMENTO"].', '.$value["PAIS"].')'.'</td>
                            <td>';
                          if ($value["ESTADO"] == 1){                            
                            echo '<button class="btn btn-success btn-xs btnActivarProveedor" idProveedor="'.$value["IDPROVEEDOR"].'" estadoProveedor="0">Activo</button>';
                          } else {                           
                            echo '<button class="btn btn-danger btn-xs btnActivarProveedor" idProveedor="'.$value["IDPROVEEDOR"].'" estadoProveedor="1">Inactivo</button></td>';
                          }         
                    echo '</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarProveedor btn-xs" idProveedor="'.$value["IDPROVEEDOR"].'" data-toggle="modal" data-target="#modalEditarProveedor"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarProveedor btn-xs" idProveedor="'.$value["IDPROVEEDOR"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR PROVEEDORES -->  
  <div id="modalAgregarProveedor" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Proveedor</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
              
              <label>NIT:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="number" class="form-control input-lg" name="nuevoNit"  placeholder="NIT" required>                
                </div>
              </div>
                
              <label>Proveedor:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="text" class="form-control input-lg" name="nuevoProveedor"  placeholder="Proveedor" required>                
                </div>
              </div>
              
              <label>Dirección:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                
                  <input type="text" class="form-control input-lg" name="nuevaDireccion"  placeholder="Dirección" required>
                </div>
              </div>
              
              <label>Teléfono 1:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-phone"></i></span>                                    
                  <input type="number" class="form-control input-lg" name="nuevoTelefono1"  placeholder="Telefono 1" required>                
                </div>
              </div>
              
              <label>Teléfono 2:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-phone"></i></span>                                    
                  <input type="number" class="form-control input-lg" name="nuevoTelefono2"  placeholder="Telefono 2" required>                
                </div>
              </div>
              
              <label>Ciudad:</label>
              <div class="form-group">
                  <select class="form-control input-lg" name="nuevaCiudad" required>
                    <option value="">Seleccionar ciudad</option> 
                    <?php
                      $ciudades = ModeloCiudades::mdlMostrarCiudades("tciudad", null , null);
                      $ultimoPais = "";
                      foreach ($ciudades as $key => $value){
                        $ultimoPais = $pais_departamento; 
                        $pais_departamento = $value["PAIS"]."-".$value["DEPARTAMENTO"];
                        if ($pais_departamento <> $ultimoPais){
                            echo '<optgroup label="'.$pais_departamento.'">';
                        } 
                        echo '<option value="'.$value["IDCIUDAD"].'">'.$value["NOMBRE"].'</option>';                                               
                      }
                    ?>
                  </select>                  
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Proveedor</button>
          </div>
    
          <?php
            $crearProveedor = new ControladorProveedores();
            $crearProveedor ->ctrCrearProveedor();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR PROVEEDOR -->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarProveedor" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Proveedor</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idProveedor" name="idProveedor">
              
              <label>NIT:</label>
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNit" name="editarNit" value="" placeholder="NIT" >                
                </div>
              </div>
              
              <label>Proveedor:</label>
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>
                  <input type="text" class="form-control input-lg" id="editarProveedor" name="editarProveedor" value="" placeholder="Proveedor" >                
                </div>
              </div>

              <label>Dirección:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                
                  <input type="text" class="form-control input-lg" id="editarDireccion" name="editarDireccion" value="" placeholder="Dirección" >
                </div>
              </div>
              
              <label>Teléfono 1:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-phone"></i></span>                
                  <input type="text" class="form-control input-lg" id="editarTelefono1" name="editarTelefono1" value="" placeholder="Teléfono 1" >
                </div>
              </div>
              
              <label>Teléfono 2:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-phone"></i></span>                
                  <input type="text" class="form-control input-lg" id="editarTelefono2" name="editarTelefono2" value="" placeholder="Teléfono 2" >
                </div>
              </div>

              <label>Ciudad:</label>
              <div class="form-group">
                  <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-globe"></i></span>
                    <select class="form-control input-lg" name="editarCiudad" required>
                      <option value="" id="editarCiudad"></option> 
                      <?php
                        $ciudades = ModeloCiudades::mdlMostrarCiudades("tciudad", null , null);
                        $ultimoPais = "";
                        foreach ($ciudades as $key => $value){
                          $ultimoPais = $pais_departamento; 
                          $pais_departamento = $value["PAIS"]."-".$value["DEPARTAMENTO"];
                          if ($pais_departamento <> $ultimoPais){
                              echo '<optgroup label="'.$pais_departamento.'">';
                          } 
                          echo '<option value="'.$value["IDCIUDAD"].'">'.$value["NOMBRE"].'</option>';                                               
                        }
                      ?>
                    </select>
                  </div> 
              </div> 
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Modificar Proveedor</button>
          </div>
  
        <?php

          $editarProveedor = new ControladorProveedores();
          $editarProveedor ->ctrEditarProveedor();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR USUARIO -->  
  
<?php

  $borrarProveedor = new ControladorProveedores();
  $borrarProveedor ->ctrBorrarProveedor();
  
?> 
