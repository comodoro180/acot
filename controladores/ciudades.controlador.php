<?php

class ControladorCiudades {

    /*=============================================
      CREAR 
    =============================================*/
    static public function ctrCrearCiudad() {

        if (isset($_POST["nuevoNombreCiudad"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreCiudad"])) {

                $tabla = "tciudad";
                
                $datos = array(
                    "nombre"   => $_POST["nuevoNombreCiudad"],
                    "iddepartamento" => $_POST["nuevoCiudadIddepartamento"]
                );
                
                $respuesta = ModeloCiudades::mdlIngresarCiudad($tabla,$datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡La ciudad ha sido guardada correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "ciudades";
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
                                                window.location = "ciudades";
                                        }
                                });
                        </script>';                    
                }                
            } else {
                echo '<script>
                        swal({
                                type: "error",
                                title: "¡El nombre de la ciudad no puede ir vacío o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "ciudades";
                                }
                        });
                </script>';
            }
        }
    }

    /*=============================================
      MOSTRAR 
    =============================================*/
    static public function ctrMostrarCiudades($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tciudad";
        
        $respuesta = ModeloCiudades::MdlMostrarCiudades($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR 
    =============================================*/
    static public function ctrEditarCiudad(){        

            if(isset($_POST["idciudad"])){

                    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCiudad"])){

                            $tabla = "tciudad";

                            $datos = array( "idciudad" => $_POST["idciudad"],
                                            "nombre" => $_POST["editarCiudad"],
                                            "iddepartamento" => $_POST["editarCiudadIddepartamento"]);
                            //var_dump($datos);                            

                            $respuesta = ModeloCiudades::mdlEditarCiudad($tabla, $datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "La ciudad ha sido editada correctamente!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "ciudades";
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
                                                        window.location = "ciudades";
                                                }
                                        });
                                </script>';                               
                            }
                    }else{
                            echo'<script>
                                    swal({
                                            type: "error",
                                            title: "¡La ciudad no puede ser vacía o llevar caracteres especiales!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                  if (result.value) {
                                                    window.location = "ciudades";
                                                  }
                                            })
                            </script>';
                    }
            }
    }
    
    /*=============================================
      BORRAR USUARIO
    =============================================*/
    static public function ctrBorrarCiudad(){

        if(isset($_GET["idciudad"])){

                $tabla ="tciudad";
                $datos = $_GET["idciudad"];

                $respuesta = ModeloCiudades::mdlBorrarCiudad($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "La ciudad ha sido borrada correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "ciudades";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            
