  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de usuarios        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="usuarios">Usuario</a></li>
        <li class="active">Blank page</li>
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
            
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Admin</td>
                <td>Admin</td>
                <td>admin@acot.com.co</td>
                <td>Administrador</td>
                <td>
                  <button class="btn btn-success btn-xs">Activado</button>
                </td>
                <td>
                  <div class="btn-group" >

                    <button class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i> </button>
                    <button class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> </button>

                  </div>
                </td>
              </tr>
              <tr>
                <td>1</td>
                <td>Admin</td>
                <td>Admin</td>
                <td>admin@acot.com.co</td>
                <td>Administrador</td>
                <td>
                  <button class="btn btn-success btn-xs">Activado</button>
                </td>
                <td>
                  <div class="btn-group" >

                    <button class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i> </button>
                    <button class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> </button>

                  </div>
                </td>
              </tr>
              <tr>
                <td>1</td>
                <td>Admin</td>
                <td>Admin</td>
                <td>admin@acot.com.co</td>
                <td>Administrador</td>
                <td>
                  <button class="btn btn-success btn-xs">Activado</button>
                </td>
                <td>
                  <div class="btn-group" >

                    <button class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i> </button>
                    <button class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> </button>

                  </div>
                </td>
              </tr>                                
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
                  <input type="email" class="form-control input-lg" name="nuevoEmail"  placeholder="Correo electrónico" required>                
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
                    <option value="Admin">Administrador</option> 
                    <option value="Proveedor">Proveedor</option>
                    <option value="Cotizador">Cotizador</option> 
                  </select>
                </div> 
              </div>            
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" data-dismiss="modal">Guardar usuario</button>
          </div>
          
        </form>
      </div>

    </div>
  </div>