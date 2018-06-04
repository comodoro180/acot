<?php

class ControladorEmpresas {

    /*=============================================
      CREAR 
    =============================================*/
    static public function ctrCrearEmpresa() {

        if (isset($_POST["nuevaEmpresa"])) {
            
                $datos = array(
                    "nombre"    => $_POST["nuevaEmpresa"],
                    "telefono"  => $_POST["nuevoTelefono"],
                    "direccion" => $_POST["nuevaDireccion"],
                    "nit"       => $_POST["nuevoNit"],
                    "idCiudad"  => $_POST["nuevaCiudad"]
                );
                
                $respuesta = ModeloEmpresas::mdlIngresarEmpresa($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡La empresa ha sido guardada correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "empresas";
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
                                                window.location = "empresas";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarEmpresas($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $respuesta = ModeloEmpresas::MdlMostrarEmpresas($campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarEmpresa(){        

            if(isset($_POST["editarEmpresa"])){                            

                            $datos = array( "idEmpresa" => $_POST["idEmpresa"],
                                            "empresa" => $_POST["editarEmpresa"],
                                            "telefono" => $_POST["editarTelefono"],
                                            "direccion" => $_POST["editarDireccion"],
                                            "nit" => $_POST["editarNit"],
                                            "idCiudad" => $_POST["editarEmpresaCiudad"]);

                            $respuesta = ModeloEmpresas::mdlEditarEmpresa($datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "La empresa ha sido editada correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "empresas";
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
                                                        window.location = "empresas";
                                                }
                                        });
                                </script>';                               
                            }

            }
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarEmpresa(){

        if(isset($_GET["idEmpresa"])){
                
                $datos = $_GET["idEmpresa"];

                $respuesta = ModeloEmpresas::mdlBorrarEmpresa($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "La empresa ha sido borrada correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "empresas";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            
