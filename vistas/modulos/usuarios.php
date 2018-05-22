  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de usuarios        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li class="active"><a href="usuarios">Usuarios</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            Agregar usuario
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>Fecha creación</th>
                <th>Estado</th>                
                <th style="width: 10px">Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $usuarios = ModeloUsuarios::mdlMostrarUsuarios("tusuario", null, null);
                //var_dump($usuarios);
                foreach ($usuarios as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDUSUARIO"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["APELLIDO"].'</td>                              
                          <td>'.$value["EMAIL"].'</td>
                          <td>'.$value["PERFIL"].'</td>
                          <td>'.$value["FECHA_CREACION"].'</td>
                          <td>';
                          if ($value["ESTADO"] == 1){                            
                            echo '<button class="btn btn-success btn-xs btnActivar" idusuario="'.$value["IDUSUARIO"].'" estadoUsuario="0">Activado</button>';
                          } else {                           
                            echo '<button class="btn btn-danger btn-xs btnActivar" idusuario="'.$value["IDUSUARIO"].'" estadoUsuario="1">Desactivado</button></td>';
                          }         
                    echo '</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarUsuario btn-xs" idusuario="'.$value["IDUSUARIO"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarUsuario btn-xs" idusuario="'.$value["IDUSUARIO"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR USUARIO -->  
  <div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar usuario</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombre"  placeholder="Nombre" required>                
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-user"></i></span>                
                  <input type="text" class="form-control input-lg" name="nuevoApellido"  placeholder="Apellido" required>
                </div>
              </div>            

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg" id="nuevoEmail" name="nuevoEmail"  placeholder="Correo electrónico" required>                
                </div> 
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-key"></i></span>
                  <input type="password" class="form-control input-lg" name="nuevaClave"  placeholder="Contraseña" required>                
                </div> 
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-user-circle"></i></span>
                  <select class="form-control input-lg" name="nuevoPerfil" required>
                    <option value="">Seleccionar el perfil</option> 
                    <option value="1">Administrador</option> 
                    <option value="2">Proveedor</option>
                    <option value="3">Cotizador</option> 
                  </select>
                </div> 
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar usuario</button>
          </div>
    
          <?php
            $crearUsuario = new ControladorUsuarios();
            $crearUsuario -> ctrCrearUsuario();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR USUARIO -->

  <!-- MODAL EDITAR USUARIO -->  
  <div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar usuario</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">
                
<!--              <input type="text" id="idusuario" name="idusuario" value="" placeholder="idusuario">-->
              <input type="hidden" id="idusuario" name="idusuario">
              
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" placeholder="Nombre" >                
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-user"></i></span>                
                  <input type="text" class="form-control input-lg" id="editarApellido" name="editarApellido" value="" placeholder="Apellido" >
                </div>
              </div>            

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" placeholder="Correo electrónico">                
                </div> 
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-key"></i></span>
                  <input type="password" class="form-control input-lg" name="editarClave"  placeholder="Escriba la nueva contraseña">
                  <input type="hidden" id="claveActual" name="claveActual">
<!--                  <input type="text" class="form-control input-lg" id="claveActual" value="" name="claveActual" placeholder="Clave actual" >-->
                </div> 
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-user-circle"></i></span>
                  <select class="form-control input-lg" name="editarPerfil" >
                    <option value="" id="editarPerfil"></option>
                    <option value="1">Administrador</option> 
                    <option value="2">Proveedor</option>
                    <option value="3">Cotizador</option> 
                  </select>
                </div> 
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Modificar usuario</button>
          </div>
  
        <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR USUARIO -->  
  
<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();
  
?> 