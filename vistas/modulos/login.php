<!-- 
<div style="background-color: black;
     position: absolute;
     top:0;
     left:0;
     width:100%;
     height:100vh;
     /*background: url(../../img/plantilla/back.png);*/
     background-size:cover;
     overflow:hidden     
     "> 
-->

<div class="login-box">
  <div class="login-logo">

    <!-- <img src="vistas/img/plantilla/Acot.png" class="img-responsive" style="padding:30px 100px 0px 100px"> -->
    <img src="vistas/img/plantilla/Acot.png" class="img-fluid rounded mx-auto d-block">
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Ingresar al sistema</p>
    <form method="post">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="ingEmail" required>
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="ingClave" required>
        <span class="fa fa-lock form-control-feedback"></span>
      </div>     
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn">Ingresar</button>
        </div>
      </div>
      <br>
      <div class="text-center">   
        <a href="#" data-toggle="modal" data-target="#modalRecuperarClave" >¿Olvidaste tu contraseña?</a>
      </div>
      <br>
      <div class="text-center">
        <a href="#" data-toggle="modal" data-target="#modalRegistrarUsuario" >Registrarse</a>
      </div>

      <?php
      $login = new ControladorUsuarios();
      $login->ctrIngresoUsuario();
      ?>

    </form>
  </div>
</div>
</div>

  <!-- MODAL REGISTRAR USUARIO -->  
  <div id="modalRegistrarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Registro de usuario</h4>
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
<!--
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
-->
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Registrar usuario</button>
          </div>
    
          <?php
            $crearUsuario = new ControladorUsuarios();
            $crearUsuario -> ctrRegistrarUsuario();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL REGISTRAR USUARIO -->
  
  <!-- MODAL RECUPERAR CLAVE -->  
  <div id="modalRecuperarClave" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <form role="form" method="post" >

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Recuperación de contraseña</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">        

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg" name="RecuperarEmail"  placeholder="Correo electrónico" required>                
                </div> 
              </div> 
              
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary" >Recuperar contraseña</button>
          </div>
    
          <?php
            $crearUsuario = new ControladorUsuarios();
            $crearUsuario -> ctrRecuperarClave();
          ?>
          
        </form>
      </div>
    </div>  
  </div>
  <!-- FIN MODAL RECUPERAR CLAVE -->