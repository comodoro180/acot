  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Roles
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio">Inicio</a></li>
        <li><a href="">Administración</a></li>
        <li><a href="">Usuarios</a></li>
        <li class="active">Roles</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRol">
            Agregar Rol
          </button>

        </div>

        <div class="box-body">
            
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Rol</th>
                <th>Descripción</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                
              <?php
                $roles = ModeloRoles::mdlMostrarRoles("tperfil", null, null);
                foreach ($roles as $key => $value){
                    echo '
                        <tr>
                          <td>'.$value["IDPERFIL"].'</td>
                          <td>'.$value["NOMBRE"].'</td>
                          <td>'.$value["DESCRIPCION"].'</td>
                          <td>
                            <div class="btn-group" >
                                <button class="btn btn-warning btnEditarRol btn-xs" idPerfil="'.$value["IDPERFIL"].'" data-toggle="modal" data-target="#modalEditarRol"><i class="fa fa-pencil"></i></button>                                    
                                <button class="btn btn-danger btnEliminarRol btn-xs" idPerfil="'.$value["IDPERFIL"].'"><i class="fa fa-times"></i></button>
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

  <!-- MODAL AGREGAR ROL -->  
  <div id="modalAgregarRol" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Rol</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoRol"  placeholder="Rol" required>                
                </div>
              </div> 
                
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <!--<input type="text" class="form-control textarea" name="nuevaDescripcionTipoProducto"  placeholder="Descripción" required>-->                
                  <input type="text" class="form-control" name="nuevaDescripcion"  placeholder="Descripción" required>             
                </div>
              </div>                    
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Guardar Rol</button>
          </div>
    
          <?php
            $crearRol = new ControladorRoles();
            $crearRol ->ctrCrearRol();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL INGRESAR ROL-->

  <!-- MODAL EDITAR ROL -->  
  <div id="modalEditarRol" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Rol</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">                

              <input type="hidden" id="idPerfil" name="idPerfil">
              
              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" id="editarRol" name="editarRol" placeholder="Rol" >                
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">                 
                  <span class="input-group-addon"> <i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" placeholder="Descripción" required>
                </div>
              </div>
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Modificar Rol</button>
          </div>
  
        <?php

          $editarRol= new ControladorRoles();
          $editarRol ->ctrEditarRol();

        ?> 

        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL EDITAR ROL -->  
  
<?php

  $borrarRol = new ControladorRoles();
  $borrarRol ->ctrBorrarRol();
  
?> 