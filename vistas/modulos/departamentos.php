  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de departamentos        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio">Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li><a href="">Geografía</a></li>
        <li class="active">Departamentos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarDepartamento">
            Agregar departamento
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Nombre</th>                
                <th>País</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $departamentos = ModeloDepartamentos::mdlMostrarDepartamentos("tdepartamento", null, null);
                //var_dump($usuarios);
                foreach ($departamentos as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDDEPARTAMENTO"].'</td>
                          <td>'.$value["NOMBRE"].'</td>                                                        
                          <td>'.$value["PAIS"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarDepartamento btn-xs" iddepartamento="'.$value["IDDEPARTAMENTO"].'" data-toggle="modal" data-target="#modalEditarDepartamento"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarDepartamento btn-xs" iddepartamento="'.$value["IDDEPARTAMENTO"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR DEPARTAMENTO -->  
  <div id="modalAgregarDepartamento" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar departamento</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">
                
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-globe"></i></span>
                  <select class="form-control input-lg" name="nuevoDepartamentoIdpais" required>
                    <option value="">Seleccionar el país</option> 
                    <?php
                      $paises = ModeloPaises::mdlMostrarPaises("tpais", null , null);
                      foreach ($paises as $key => $value){
                        echo '<option value="'.$value["IDPAIS"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
                </div> 
              </div>                

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombreDepartamento"  placeholder="Departamento" required>                
                </div>
              </div>

            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar departamento</button>
          </div>
    
          <?php
            $crearDepartamento = new ControladorDepartamentos();
            $crearDepartamento -> ctrCrearDepartamento();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL AGREGAR DEPARTAMENTO -->

  <!-- MODAL EDITAR DEPARTAMENTO -->  
  <div id="modalEditarDepartamento" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar departamento</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

<!--              <input type="hidden" id="iddepartamento" name="iddepartamento">-->
              
              <input type="text" id="iddepartamento" name="iddepartamento" value="">
              
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-globe"></i></span>
                  <select class="form-control input-lg" name="editarDepartamentoIdpais" required>
                    <option value="" id="editarDepartamentoIdpais"></option> 
                    <?php
                      $paises = ModeloPaises::mdlMostrarPaises("tpais", null , null);                      
                      foreach ($paises as $key => $value){
                        echo '<option value="'.$value["IDPAIS"].'">'.$value["NOMBRE"].'</option>';
                      }
                    ?>
                  </select>
                </div> 
              </div>                  
              
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" id="editarDepartamento" name="editarDepartamento" value="" placeholder="Departamento" >                
                </div>
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Modificar departamento</button>
          </div>
  
        <?php

          $editarUsuario = new ControladorDepartamentos();
          $editarUsuario -> ctrEditarDepartamento();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR USUARIO -->  
  
<?php

  $borrarUsuario = new ControladorDepartamentos();
  $borrarUsuario -> ctrBorrarDepartamento();
  
?> 