<?php

class ControladorOrdenServicio{

    /*=============================================
      CREAR PEDIDO
    =============================================*/
    static public function ctrCrearOrdenServicio() {

        if (isset($_POST["nuevoTipoEstadoOS"])) {
            
                $datos = array( "idOrdenServicioTipoEstado" => $_POST["nuevoTipoEstadoOS"],
                                "idCotizacion"              => $_POST["nuevaCotizacionOS"],
                                "idUsuario"                 => $_POST["nuevoUsuarioOS"]
                );
                
                $respuesta = ModeloOrdenServicio::mdlIngresarOrdenServicio($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡La orden de servicio ha sido guardada correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "ordenServicio";
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
                                                window.location = "ordenServicio";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarOrdenServicio($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tordenservicio";
        
        $respuesta = ModeloOrdenServicio::mdlMostrarOrdenServicio($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarOrdenServicio(){        

            if(isset($_POST["idOrdenServicio"])){                            

                            $datos = array( "idOrdenServicio"           => $_POST["idOrdenServicio"],
                                            "idOrdenServicioTipoEstado" => $_POST["editarTipoEstadoOS"],
                                            "idCotizacion"              => $_POST["editarCotizacionOS"],
                                            "idUsuario"                 => $_POST["editarUsuarioOS"]);

                            $respuesta = ModeloOrdenServicio::mdlEditarOrdenServicio($datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "La orden de servicio ha sido editada correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "ordenServicio";
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
                                                        window.location = "ordenServicio";
                                                }
                                        });
                                </script>';                               
                            }

            }
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarOrdenServicio(){

        if(isset($_GET["idOrdenServicio"])){
                
                $datos = $_GET["idOrdenServicio"];

                $respuesta = ModeloOrdenServicio::mdlBorrarOrdenServicio($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "La orden de servicio ha sido borrada correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "ordenServicio";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            

