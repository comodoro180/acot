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

      <div class="text-center">
        <a href="#">Click aqui si olvidaste tu contraseña</a>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn">Ingresar</button>
        </div>
      </div>
      <br>

      <?php
      $login = new ControladorUsuarios();
      $login->ctrIngresoUsuario();
      ?>

    </form>
  </div>
</div>
</div>