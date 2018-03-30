<?php
    $codigo = "";
    if (isset($_GET["codigo"])){
        $codigo = $_GET["codigo"];
    }
    
    $email = "";
    if (isset($_GET["email"])){
        $email = $_GET["email"];
    }
?>

<div class="login-box">
  <div class="login-logo">

    <!-- <img src="vistas/img/plantilla/Acot.png" class="img-responsive" style="padding:30px 100px 0px 100px"> -->
    <img src="vistas/img/plantilla/Acot.png" class="img-fluid rounded mx-auto d-block">
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Recuperación de contraseña</p>
    <form method="post">
      Email:
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" value="<?php echo $email ?>" name="recuEmail" required>
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>
      Código:  
      <div class="form-group has-feedback"> 
        <input type="text" class="form-control" placeholder="Código" value="<?php echo $codigo ?>" name="recuCodigo" required>
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
        
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Nueva contraseña" name="recuClave" required>
        <span class="fa fa-lock form-control-feedback"></span>
      </div>         
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn">Cambiar contraseña</button>
        </div>
      </div>
      <br>

      <?php
        $login = new ControladorUsuarios();
        $login->ctrCambiarClave();
      ?>

    </form>
  </div>
</div>
</div>
