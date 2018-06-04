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

                                    $encriptar = crypt($_POST["editarClave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

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


            $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item1, $valor1);
            
            //var_dump($respuesta);

            if ($respuesta["EMAIL"] == $_POST["RecuperarEmail"]) { 
                
                $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $numero_caracteres = strlen($caracteres);
                $string_aleatorio = '';
                
                $usuarioNombre = $respuesta["NOMBRE"];
                $usuarioApellido = $respuesta["APELLIDO"];
                
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
                    /*
                    $mensaje = 'Ingresa el siguiente código para recuperar la clave : '.$string_aleatorio.'<br> '
                            . ' <a href="www.cotice.com.co/ingreso" >Link</a>"';
                    */
                    $mensaje = '
                        <html> 
                        <head> 
                           <title>Acot cotizaciones</title> 
                        </head> 
                        <body> 
                        <p>Reciba un cordial saludo '.$usuarioNombre.' '.$usuarioApellido.'</p> 
                        <p> 
                            Ingresa el siguiente código para recuperar la clave : '.$string_aleatorio.'
                            <br>
                            o ingresa al siguiente <a href="www.cotice.com.co/index.php?ruta=recuperar_clave&codigo='.$string_aleatorio.'&email='.$destinatario.'">link</a> para continuar. 
                        </p> 
                        <p>
                            Atentamente:
                            El equipo de Acot Cotizaciones.
                        </p>
                        </body> 
                        </html>                         
                    ';
                    
                    //index.php?ruta=recuperar_clave&codigo=+$string_aleatorio
                    
                    //para el envío en formato HTML 
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

                    //dirección del remitente 
                    $headers .= "From: Acot cotizaciones <acot.cotizaciones@gmail.com>\r\n"; 

                    //dirección de respuesta, si queremos que sea distinta que la del remitente 
                    $headers .= "Reply-To: acot.cotizaciones@gmail.com\r\n"; 

                    //ruta del mensaje desde origen a destino 
                    //$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

                    //direcciones que recibián copia 
                    //$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

                    //direcciones que recibirán copia oculta 
                    $headers .= "Bcc: acot.cotizaciones@gmail.com\r\n"; 

                    //mail($destinatario,$asunto,$cuerpo,$headers);                     
                                      
                    $exito = mail($destinatario, $asunto, $mensaje, $headers);
                    
                    if (!$exito) {
                        echo '<script>
                                swal({
                                        type: "error",
                                        title: "Error al eviar el correo. Codigo:'.$string_aleatorio.'",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"

                                }).then(function(result){
                                        if(result.value){
                                                window.location = "ingreso";
                                        }
                                });
                        </script>';
                    } else {
                        echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡Se te ha enviado un código al correo '.$destinatario.' para recuperar la clave!",
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
                
            } else {
                echo '<script>
                        swal({
                                type: "error",
                                title: "¡El email '.$valor1.' no se encuentra registrado!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "ingreso";
                                }
                        });
                </script>';
            }
        }        
    }
 
    /*=============================================
      CAMBIAR CLAVE
    =============================================*/     
    static public function ctrCambiarClave(){
        if (isset($_POST["recuClave"])) {
            
            require_once "conf/config.inc.php";
            
            $email = $_POST["recuEmail"];
            $codigo = $_POST["recuCodigo"];
            $clave = $_POST["recuClave"];
            
            $respuesta = ModeloUsuarios::MdlMostrarUsuarios("tusuario", "email", $email);            
            //var_dump($respuesta);
            
            if ($respuesta) {
                //var_dump($respuesta);                
                
                if (crypt($codigo,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$') == $respuesta["CODIGO"]) {
                    
                    $clave = crypt($clave,'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    $respuesta = ModeloUsuarios::mdlActualizarUsuario2("tusuario", "clave", $clave, "email", $email);
                    
                    if ($respuesta == "ok") {
                        echo'<script>
                        swal({
                                type: "success",
                                title: "Contraseña cambiada correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                                }).then(function(result){
                                        if (result.value) {
                                            window.location = "ingreso";
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
                                                window.location = "index.php?ruta=recuperar_clave&email='.$email.'";
                                        }
                                });
                        </script>';                          
                    }
                    
                } else {
                        echo '<script>
                                swal({
                                        type: "error",
                                        title: "Código no valido",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"
                                        
                                }).then(function(result){
                                        if(result.value){
                                                window.location = "index.php?ruta=recuperar_clave&email='.$email.'";
                                        }
                                });
                        </script>';                    
                } 
            } else {
                   echo '<script>
                                swal({
                                        type: "error",
                                        title: "¡El email '.$email.' no se encuentra registrado!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"
                                        
                                }).then(function(result){
                                        if(result.value){
                                                window.location = "index.php?ruta=recuperar_clave&email='.$email.'";
                                        }
                                });
                        </script>';  
            }
        }
    }
}            
