  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de empresas        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li class="active"><a href="empresas">Empresas</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpresa">
            Agregar empresa
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Empresa</th>                
                <th>Télefono</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Nit</th>
                <th>Estado</th>                
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $empresas = ModeloEmpresas::mdlMostrarEmpresas('tempresa',null, null);
                //var_dump($usuarios);
                foreach ($empresas as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDEMPRESA"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["TELEFONOPRINCIPAL"].'</td>                              
                          <td>'.$value["DIRECCION"].'</td>
                          <td>'.$value["CIUDAD"].' ('.$value["DEPARTAMENTO"].', '.$value["PAIS"].')'.'</td>
                          <td>'.$value["NIT"].'</td>                          
                          <td>';
                          if ($value["ESTADO"] == 1){                            
                            echo '<button class="btn btn-success btn-xs btnActivarEmpresa" idEmpresa="'.$value["IDEMPRESA"].'" estadoEmpresa="0">Activa</button>';
                          } else {                           
                            echo '<button class="btn btn-danger btn-xs btnActivarEmpresa" idEmpresa="'.$value["IDEMPRESA"].'" estadoEmpresa="1">Inactiva</button></td>';
                          }         
                    echo '</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarEmpresa btn-xs" idEmpresa="'.$value["IDEMPRESA"].'" data-toggle="modal" data-target="#modalEditarEmpresa"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarEmpresa btn-xs" idEmpresa="'.$value["IDEMPRESA"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR EMPRESAS -->  
  <div id="modalAgregarEmpresa" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar empresa</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">   
                
              <label>Empresa:</label>
              <div class="form-group">
                <div class="input-group">                  
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>                                    
                  <input type="text" class="form-control input-lg" name="nuevaEmpresa"  placeholder="Empresa" required>                
                </div>
              </div>
              
              <label>Télefono:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-phone"></i></span>                
                  <input type="text" class="form-control input-lg" name="nuevoTelefono"  placeholder="Télefono" required>
                </div>
              </div>
              
              <label>Dirección:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-address-book"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaDireccion"  placeholder="Dirección" required>                
                </div> 
              </div>   
              
              <label>Nit:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-id-card"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNit"  placeholder="Nit" required>                
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
            <button type="submit" class="btn btn-primary" >Guardar empresa</button>
          </div>
    
          <?php
            $crearEmpresa = new ControladorEmpresas();
            $crearEmpresa ->ctrCrearEmpresa();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR -->

  <!-- MODAL EDITAR -->  
  <div id="modalEditarEmpresa" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar empresa</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idEmpresa" name="idEmpresa">
              
              <label>Empresa:</label>
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-building"></i></span>
                  <input type="text" class="form-control input-lg" id="editarEmpresa" name="editarEmpresa" value="" placeholder="Empresa" >                
                </div>
              </div>

              <label>Télefono:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-phone"></i></span>                
                  <input type="text" class="form-control input-lg" id="editarTelefono" name="editarTelefono" value="" placeholder="Télefono" >
                </div>
              </div>            

              <label>Dirección:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-address-book"></i></span>
                  <input type="text" class="form-control input-lg" id="editarDireccion" name="editarDireccion" value="" placeholder="Direccion">                
                </div> 
              </div>

              <label>Nit:</label>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-id-card"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNit" name="editarNit" value="" placeholder="Nit">                
                </div> 
              </div>

              <label>Ciudad:</label>
              <div class="form-group">
                  <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-globe"></i></span>
                    <select class="form-control input-lg" name="editarEmpresaCiudad" required>
                      <option value="" id="editarEmpresaCiudad"></option> 
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
            <button type="submit" class="btn btn-primary" >Modificar Empresa</button>
          </div>
  
        <?php

          $editarEmpresa = new ControladorEmpresas();
          $editarEmpresa -> ctrEditarEmpresa();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR USUARIO -->  
  
<?php

  $borrarEmpresa = new ControladorEmpresas();
  $borrarEmpresa -> ctrBorrarEmpresa();
  
?> 