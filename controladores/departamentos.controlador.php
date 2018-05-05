<?php

class ControladorDepartamentos {

    /*=============================================
      CREAR 
    =============================================*/
    static public function ctrCrearDepartamento() {

        if (isset($_POST["nuevoNombreDepartamento"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreDepartamento"])) {

                $tabla = "tdepartamento";
                
                $datos = array(
                    "nombre"   => $_POST["nuevoNombreDepartamento"],
                    "idpais" => $_POST["nuevoDepartamentoIdpais"]
                );
                
                $respuesta = ModeloDepartamentos::mdlIngresarDepartamento($tabla,$datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El departamento ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "departamentos";
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
                                                window.location = "departamentos";
                                        }
                                });
                        </script>';                    
                }                
            } else {
                echo '<script>
                        swal({
                                type: "error",
                                title: "¡El nombre del departamento no puede ir vacío o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "departamentos";
                                }
                        });
                </script>';
            }
        }
    }

    /*=============================================
      MOSTRAR 
    =============================================*/
    static public function ctrMostrarDepartamentos($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tdepartamento";
        
        $respuesta = ModeloDepartamentos::MdlMostrarDepartamentos($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR 
    =============================================*/
    static public function ctrEditarDepartamento(){        

            if(isset($_POST["iddepartamento"])){

                    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDepartamento"])){

                            $tabla = "tdepartamento";

                            $datos = array( "iddepartamento" => $_POST["iddepartamento"],
                                            "nombre" => $_POST["editarDepartamento"],
                                            "idpais" => $_POST["editarDepartamentoIdpais"]);
                            //var_dump($datos);                            

                            $respuesta = ModeloDepartamentos::mdlEditarDepartamento($tabla, $datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El departamento ha sido editado correctamente!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "departamentos";
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
                                                        window.location = "departamentos";
                                                }
                                        });
                                </script>';                               
                            }
                    }else{
                            echo'<script>
                                    swal({
                                            type: "error",
                                            title: "¡El departamento no puede ir vacío o llevar caracteres especiales!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                  if (result.value) {
                                                    window.location = "departamentos";
                                                  }
                                            })
                            </script>';
                    }
            }
    }
    
    /*=============================================
      BORRAR USUARIO
    =============================================*/
    static public function ctrBorrarDepartamento(){

        if(isset($_GET["iddepartamento"])){

                $tabla ="tdepartamento";
                $datos = $_GET["iddepartamento"];

                $respuesta = ModeloDepartamentos::mdlBorrarDepartamento($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El departamento ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "departamentos";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            
