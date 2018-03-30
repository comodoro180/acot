<?php

class ControladorUsuarios {
    /*=============================================
      INGRESO DE USUARIOS
    =============================================*/
    static public function ctrIngresoUsuario() {
        
        include_once "conf/config.inc.php";
        
        if (isset($_POST["ingEmail"]) && isset($_POST["ingClave"])) {

            $tabla = "tusuario";
            $campo = "email";
            $valor = $_POST["ingEmail"];
            
            $clave = crypt($_POST["ingClave"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            ////$clave = $_POST["ingClave"];

            $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $campo, $valor);

            if ($respuesta["EMAIL"] == $_POST["ingEmail"] && $respuesta["CLAVE"] == $clave) {

                $_SESSION["iniciarSesion"] = "ok";
                $_SESSION["usuario"] = $respuesta;

                echo '<script>                    
                    window.location = "inicio";                    
                 </script>';
            } else {

                echo '<div class="alert alert-danger"> Error al ingresar, vuelve a intentarlo</div>';
            }
        }
    }

    /*=============================================
      CREAR USUARIO
    =============================================*/
    static public function ctrCrearUsuario() {

        if (isset($_POST["nuevoEmail"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"])) {

                $tabla = "tusuario";
                
                $encriptar = crypt($_POST["nuevaClave"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                
                $datos = array(
                    "nombre"   => $_POST["nuevoNombre"],
                    "apellido" => $_POST["nuevoApellido"],
                    "email"    => $_POST["nuevoEmail"],
                    "clave"    => $encriptar,
                    "idperfil" => $_POST["nuevoPerfil"]
                );
                
                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla,$datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El usuario ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "usuarios";
                                    }
                            });
                        </script>';
                } else {
                        echo '<script>
                                swal({
                                        type: "error",
                                        title: "'.$respuesta.'",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"

                                }).then(function(result){
                                        if(result.value){
                                                window.location = "usuarios";
                                        }
                                });
                        </script>';                    
                }                
            } else {
                echo '<script>
                        swal({
                                type: "error",
                                title: "¡El nombre o apellido no puede ir vacío o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "usuarios";
                                }
                        });
                </script>';
            }
        }
    }

    /*=============================================
      MOSTRAR USUARIO
    =============================================*/
    static public function ctrMostrarUsuarios($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tusuario";
        
        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR USUARIO
    =============================================*/
    static public function ctrEditarUsuario(){        

            if(isset($_POST["editarNombre"])){

                    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

                            $tabla = "tusuario";

                            if(isset($_POST["editarClave"]) && $_POST["editarClave"] != ""){

                                    //if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarClave"])){

                                            $encriptar = crypt($_POST["editarClave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                                    /*}else{
                                        echo'<script>
                                                swal({
                                                          type: "error",
                                                          title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
                                                          showConfirmButton: true,
                                                          confirmButtonText: "Cerrar"
                                                          }).then(function(result){
                                                                if (result.value) {
                                                                    window.location = "usuarios";
                                                                }
                                                        })
                                            </script>';
                                    }*/
                            }else{
                                    $encriptar = $_POST["claveActual"];
                            }

                            $datos = array( "idusuario" => $_POST["idusuario"],
                                            "nombre" => $_POST["editarNombre"],
                                            "apellido" => $_POST["editarApellido"],
                                            "email" => $_POST["editarEmail"],
                                            "clave" => $encriptar,
                                            "idperfil" => $_POST["editarPerfil"]);

                            $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El usuario ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "usuarios";
                                                    }
                                            })
                                    </script>';
                            } else {
                                echo '<script>
                                        swal({
                                                type: "error",
                                                title: "'.$respuesta.'",
                                                showConfirmButton: true,
                                                confirmButtonText: "Cerrar"

                                        }).then(function(result){
                                                if(result.value){
                                                        window.location = "usuarios";
                                                }
                                        });
                                </script>';                               
                            }
                    }else{
                            echo'<script>
                                    swal({
                                            type: "error",
                                            title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                  if (result.value) {
                                                    window.location = "usuarios";
                                                  }
                                            })
                            </script>';
                    }
            }
    }
    
    /*=============================================
      BORRAR USUARIO
    =============================================*/
    static public function ctrBorrarUsuario(){

        if(isset($_GET["idusuario"])){

                $tabla ="tusuario";
                $datos = $_GET["idusuario"];

                $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El usuario ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "usuarios";

                                                        }
                                                })

                        </script>';
                }
        }
    }

    /*=============================================
      REGISTRAR USUARIO
    =============================================*/
    static public function ctrRegistrarUsuario() {

        if (isset($_POST["nuevoEmail"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"])) {

                $tabla = "tusuario";
                
                $encriptar = crypt($_POST["nuevaClave"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                
                $datos = array(
                    "nombre"   => $_POST["nuevoNombre"],
                    "apellido" => $_POST["nuevoApellido"],
                    "email"    => $_POST["nuevoEmail"],
                    "clave"    => $encriptar,
                    "idperfil" => 4 //Perfil de Registro
                );
                
                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla,$datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El usuario ha sido registrado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "usuarios";
                                    }
                            });
                        </script>';
                } else {
                        echo '<script>
                                swal({
                                        type: "error",
                                        title: "'.$respuesta.'",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"

                                }).then(function(result){
                                        if(result.value){
                                                window.location = "usuarios";
                                        }
                                });
                        </script>';                    
                }                
            } else {
                echo '<script>
                        swal({
                                type: "error",
                                title: "¡El nombre o apellido no puede ir vacío o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "usuarios";
                                }
                        });
                </script>';
            }
        }
    }

    /*=============================================
      RECUPERAR CLAVE
    =============================================*/ 
    static public function ctrRecuperarClave(){
        
        //include_once "conf/config.inc.php";
        
        if (isset($_POST["RecuperarEmail"])) {

            $tabla = "tusuario";
            $item1 = "email";
            $valor1 = $_POST["RecuperarEmail"];
            
            
            //$clave = crypt($_POST["ingClave"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            ////$clave = $_POST["ingClave"];

            $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item1, $valor1);
            
            //var_dump($respuesta);

            if ($respuesta["EMAIL"] == $_POST["RecuperarEmail"]) { 
                
                $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $numero_caracteres = strlen($caracteres);
                $string_aleatorio = '';
                
                for ($i = 0; $i < 7; $i++) {
                    $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
                }
                
                $codigo = crypt($string_aleatorio,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                
                $item2 = "codigo";
                $valor2 = $codigo;
                
                $respuesta = ModeloUsuarios::mdlActualizarUsuario2($tabla, $item2, $valor2, $item1, $valor1);
                
                if ($respuesta == "ok") {
                    $destinatario = $_POST["RecuperarEmail"];
                    $asunto = "ACOT-Recuperación de clave";
                    $mensaje = "Ingresa el siguiente código para recuperar la clave : ".$string_aleatorio;
                    $exito = mail($destinatario, $asunto, $mensaje);
                    
                    if (!$exito) {
                            echo 'envio fallido '.$string_aleatorio;
                    } 
                }
                
            } else {

                echo '<div class="alert alert-danger"> Error al ingresar, vuelve a intentarlo</div>';
            }
        }        
    }
}
