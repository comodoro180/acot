<?php

class ControladorPaises {

    /*=============================================
      CREAR
    =============================================*/
    static public function ctrCrearPais() {

        if (isset($_POST["nuevoNombrePais"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombrePais"])) {

                $tabla = "tpais";
                
                $datos = array(
                    "nombre"   => $_POST["nuevoNombrePais"],                    
                );
                
                $respuesta = ModeloPaises::mdlIngresarPais($tabla,$datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El país ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "paises";
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
                                                window.location = "paises";
                                        }
                                });
                        </script>';                    
                }                
            } else {
                echo '<script>
                        swal({
                                type: "error",
                                title: "¡El nombre del país no puede ir vacío o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "paises";
                                }
                        });
                </script>';
            }
        }
    }

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarPaises($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tpais";
        
        $respuesta = ModeloPaises::MdlMostrarPaises($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarPais(){        

            if(isset($_POST["editarNombrePais"])){

                    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombrePais"])){

                            $tabla = "tpais";
                            
                            $datos = array( "idpais" => $_POST["idpais"],
                                            "nombre" => $_POST["editarNombrePais"]);

                            $respuesta = ModeloPaises::mdlEditarPais($tabla, $datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El país ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "paises";
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
                                                        window.location = "paises";
                                                }
                                        });
                                </script>';                               
                            }
                    }else{
                            echo'<script>
                                    swal({
                                            type: "error",
                                            title: "¡El nombre del país no puede ir vacío o llevar caracteres especiales!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                  if (result.value) {
                                                    window.location = "paises";
                                                  }
                                            })
                            </script>';
                    }
            }
    }
    
    /*=============================================
      BORRAR 
    =============================================*/
    static public function ctrBorrarPais(){

        if(isset($_GET["idpais"])){

                $tabla ="tpais";
                $datos = $_GET["idpais"];

                $respuesta = ModeloPaises::mdlBorrarPais($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El país ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "paises";

                                                        }
                                                })

                        </script>';
                }
        }
    }
    
}            
