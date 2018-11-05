<?php

class ControladorRoles {

    /*=============================================
      CREAR
    =============================================*/
    static public function ctrCrearRol() {

        if (isset($_POST["nuevoRol"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoRol"])) {

                $tabla = "tperfil";
                
                $datos = array(
                    "nombre"   => $_POST["nuevoRol"],
                    "descrpcion"   => $_POST["nuevaDescripcion"]                      
                );
                
                $respuesta = ModeloRoles::mdlIngresarRol($tabla,$datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El rol ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "roles";
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
                                                window.location = "roles";
                                        }
                                });
                        </script>';                    
                }                
            } else {
                echo '<script>
                        swal({
                                type: "error",
                                title: "¡El rol no puede ir vacío o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "roles";
                                }
                        });
                </script>';
            }
        }
    }

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarRoles($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tperfil";
        
        $respuesta = ModeloRoles::mdlMostrarRoles($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarRol(){        

            if(isset($_POST["editarRol"])){

                    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRol"])){

                            $tabla = "tperfil";
                            
                            $datos = array( "idPerfil" => $_POST["idPerfil"],
                                            "nombre" => $_POST["editarRol"],
                                            "descrpcion" => $_POST["editarDescripcion"]
                                    );

                            $respuesta = ModeloRoles::mdlEditarRol($tabla, $datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El rol ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "roles";
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
                                                        window.location = "roles";
                                                }
                                        });
                                </script>';                               
                            }
                    }else{
                            echo'<script>
                                    swal({
                                            type: "error",
                                            title: "¡El rol no puede ir vacío o llevar caracteres especiales!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                  if (result.value) {
                                                    window.location = "roles";
                                                  }
                                            })
                            </script>';
                    }
            }
    }
    
    /*=============================================
      BORRAR 
    =============================================*/
    static public function ctrBorrarRol(){

        if(isset($_GET["idRol"])){

                $tabla ="tperfil";
                $datos = $_GET["idRol"];

                $respuesta = ModeloRoles::mdlBorrarRol($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El rol ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "roles";

                                                        }
                                                })

                        </script>';
                }
        }
    }
    
}            
