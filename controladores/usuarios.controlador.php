<?php

class ControladorUsuarios {
    /*
     * INGRESO DE USUARIOS
     */

    static public function ctrIngresoUsuario() {

        if (isset($_POST["ingEmail"]) && isset($_POST["ingClave"])) {

            $tabla = "tusuario";
            $campo = "email";
            $valor = $_POST["ingEmail"];
            
            $clave = crypt($_POST["ingClave"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $campo, $valor);

            if ($respuesta["EMAIL"] == $_POST["ingEmail"] && $respuesta["CLAVE"] == $clave) {

                $_SESSION["iniciarSesion"] = "ok";

                echo '<script>                    
                    window.location = "inicio";                    
                 </script>';
            } else {

                echo '<div class="alert alert-danger"> Error al ingresar, vuelve a intentarlo</div>';
            }
        }
    }

    /*
     * CREAR USUARIO
     */

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

    /* =============================================
      MOSTRAR USUARIO
      ============================================= */

    static public function ctrMostrarUsuarios($campo, $valor) {

        $tabla = "tusuario";

        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $campo, $valor);

        return $respuesta;
    }

}