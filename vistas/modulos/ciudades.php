  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de ciudades        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio">Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li><a href="">Geografía</a></li>
        <li class="active">Ciudades</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCiudad">
            Agregar ciudades
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Ciudad</th>
                <th>Departamento</th>
                <th>País</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $ciudades = ModeloCiudades::mdlMostrarCiudades("tciudad", null, null);
                //var_dump($usuarios);
                foreach ($ciudades as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDCIUDAD"].'</td>
                          <td>'.$value["NOMBRE"].'</td>                                                        
                          <td>'.$value["DEPARTAMENTO"].'</td>
                          <td>'.$value["PAIS"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarCiudad btn-xs" idciudad="'.$value["IDCIUDAD"].'" data-toggle="modal" data-target="#modalEditarCiudad"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarCiudad btn-xs" idciudad="'.$value["IDCIUDAD"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR CIUDAD -->  
  <div id="modalAgregarCiudad" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar ciudad</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">

              <div class="form-group">
                  <label>Departamento:</label>
                  <select class="form-control input-lg" name="nuevoCiudadIddepartamento" required>
                    <option value="">Seleccionar el departamento</option> 
                    <?php
                      $departamentos = ModeloDepartamentos::mdlMostrarDepartamentos("tdepartamento", null , null);
                      $ultimoPais = "";
                      foreach ($departamentos as $key => $value){
                        $ultimoPais = $pais; 
                        $pais = $value["PAIS"];
                        if ($pais <> $ultimoPais){
                            echo '<optgroup label="'.$pais.'">';
                        } 
                        echo '<option value="'.$value["IDDEPARTAMENTO"].'">'.$value["NOMBRE"].'</option>';                                               
                      }
                    ?>
                  </select>
              </div>                 

              <div class="form-group">
                  <label>Ciudad:</label>
                  <input type="text" class="form-control input-lg" name="nuevoNombreCiudad"  placeholder="Ciudad" required>                
              </div>

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar ciudad</button>
          </div>
    
          <?php
            $crearCiudad = new ControladorCiudades();
            $crearCiudad -> ctrCrearCiudad();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL AGREGAR CIUDAD -->

  <!-- MODAL EDITAR CIUDAD -->  
  <div id="modalEditarCiudad" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar ciudad</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idciudad" name="idciudad">
              
              <div class="form-group">                
                  <label>Departamento:</label>
                  <select class="form-control input-lg" name="editarCiudadIddepartamento" required>
                    <option value="" id="editarCiudadIddepartamento"></option> 
                    <?php
                      $departamentos = ModeloDepartamentos::mdlMostrarDepartamentos("tdepartamento", null , null);
                      $ultimoPais = "";
                      foreach ($departamentos as $key => $value){
                        $ultimoPais = $pais; 
                        $pais = $value["PAIS"];
                        if ($pais <> $ultimoPais){
                            echo '<optgroup label="'.$pais.'">';
                        } 
                        echo '<option value="'.$value["IDDEPARTAMENTO"].'">'.$value["NOMBRE"].'</option>';                                               
                      }
                    ?>
                  </select>                
              </div>               

              <div class="form-group">                                 
                  <label>Ciudad:</label>
                  <input type="text" class="form-control input-lg" id="editarCiudad" name="editarCiudad" value="" placeholder="Ciudad" >                                
              </div>              
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Modificar ciudad</button>
          </div>
  
        <?php

          $editarCiudad = new ControladorCiudades();
          $editarCiudad -> ctrEditarCiudad();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR CIUDAD -->  
  
<?php

  $borrarCiudad = new ControladorCiudades();
  $borrarCiudad -> ctrBorrarCiudad();
  
?> 