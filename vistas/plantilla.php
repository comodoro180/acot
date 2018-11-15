<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>  
    
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ACOT Cotizaciones</title>
  <link rel="icon" type="image/png" href="vistas/img/plantilla/Acot_icono.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <link rel="stylesheet" href="vistas/css/estilos_Acot.css">
  
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

<!-- 
PLUGINGS DE JAVASCRIPT
-->  
    <!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <!-- SweetAlert 2 -->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
    <script src="vistas/plugins/sweetalert2/core.js"></script>     
      
</head>

<!-- <body class="hold-transition skin-blue sidebar-collapse sidebar-mini"> -->
<body class="hold-transition skin-blue sidebar sidebar-mini login-page">
  
  <?php  
  
  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == 'ok') {

      echo '<div class="wrapper">';
      require_once "conf/config.inc.php";
      require_once "modulos/cabezote.php";
      require_once "modulos/menu.php";

      if (isset($_GET["ruta"])) {

          if ($_GET["ruta"] == "inicio" ||
                  $_GET["ruta"] == "usuarios" ||
                  $_GET["ruta"] == "paises" ||
                  $_GET["ruta"] == "departamentos" ||
                  $_GET["ruta"] == "ciudades" ||
                  $_GET["ruta"] == "tipoProducto" ||
                  $_GET["ruta"] == "productos" ||
                  $_GET["ruta"] == "empresas" ||
                  $_GET["ruta"] == "roles" ||
                  $_GET["ruta"] == "contactosEmpresa" ||
                  $_GET["ruta"] == "pedidoTipoEstado" ||
                  $_GET["ruta"] == "proveedorProductos"||
                  //$_GET["ruta"] == "recuperar_clave" ||
                  $_GET["ruta"] == "proveedores" ||
                  $_GET["ruta"] == "contactosProveedor" ||
                  //$_GET["ruta"] == "clientes" ||
                  //$_GET["ruta"] == "ventas" ||
                  //$_GET["ruta"] == "crear-venta" ||
                  $_GET["ruta"] == "salir"
          ) {
              require_once "modulos/" . $_GET["ruta"] . ".php";
          } else {
              require_once "modulos/404.php";
          }
      } else {
          require_once "modulos/inicio.php";
      }
      
      require "modulos/footer.php";
      echo '</div>';
      
  } else {
      //require_once "modulos/recuperar_clave.php";
      //require_once "modulos/recuperar_clave.php";
      if (isset($_GET["ruta"])) {
        if ($_GET["ruta"] == "recuperar_clave")  {
            require_once "modulos/" . $_GET["ruta"] . ".php";
        } else {
            require_once "modulos/login.php";            
        }
      }else {
            require_once "modulos/login.php";            
      }      
  }
  ?>
    
<!--<script src="vistas/js/menu.js"></script>-->
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/paises.js"></script>
<script src="vistas/js/departamentos.js"></script>
<script src="vistas/js/ciudades.js"></script>
<script src="vistas/js/tipoProducto.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/empresas.js"></script>
<script src="vistas/js/roles.js"></script>
<script src="vistas/js/proveedores.js"></script>
<script src="vistas/js/contactosEmpresa.js"></script>
<script src="vistas/js/pedidoTipoEstado.js"></script>
<script src="vistas/js/contactosProveedor.js"></script>
<script src="vistas/js/proveedorProducto.js"></script>

</body>
</html>

