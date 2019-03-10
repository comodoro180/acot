<?php

class ControladorOrdenServicioTipoEstado{

    /*=============================================
      CREAR
    =============================================*/
    static public function ctrCrearOrdenServicioTipoEstado() {

    if (isset($_POST["nuevaOrdenServicioTipoEstado"])) {
            $tabla = "tordenserviciotipoestado";

            $datos = array(
                "nombre"   => $_POST["nuevaOrdenServicioTipoEstado"],
                "descripcion"   => $_POST["nuevaDescripcionOrdenServicio"]                      
            );

            $respuesta = ModeloOrdenServicioTipoEstado::mdlIngresarOrdenServicioTipoEstado($tabla,$datos);

            if ($respuesta == "ok"){
                echo '<script>
                        swal({
                                type: "success",
                                title: "¡El tipo de estado de orden de servicio ha sido guardado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "ordenServicioTipoEstado";
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
                                            window.location = "ordenServicioTipoEstado";
                                    }
                            });
                    </script>';                    
            }                
        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarOrdenServicioTipoEstado($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tordenserviciotipoestado";
        
        $respuesta = ModeloOrdenServicioTipoEstado::mdlMostrarOrdenServicioTipoEstado($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarOrdenServicioTipoEstado(){        

            if(isset($_POST["idOrdenServicioTipoEstado"])){



                $tabla = "tordenserviciotipoestado";

                $datos = array( "idOrdenServicioTipoEstado" => $_POST["idOrdenServicioTipoEstado"],
                                "nombre" => $_POST["editarOrdenServicioTipoEstado"],
                                "descripcion" => $_POST["editarDescripcionOrdenServicio"]
                        );

                $respuesta = ModeloOrdenServicioTipoEstado::mdlEditarOrdenServicioTipoEstado($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>
                        swal({
                                type: "success",
                                title: "El tipo de estado de orden de pedido ha sido editado correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                                }).then(function(result){
                                        if (result.value) {
                                            window.location = "ordenServicioTipoEstado";
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
                                            window.location = "ordenServicioTipoEstado";
                                    }
                            });
                    </script>';                               
                }
            }
        }
    
    
    /*=============================================
      BORRAR 
    =============================================*/
    static public function ctrBorrarOrdenServicioTipoEstado(){

        if(isset($_GET["idOrdenServicioTipoEstado"])){

                $tabla ="tordenserviciotipoestado";
                $datos = $_GET["idOrdenServicioTipoEstado"];

                $respuesta = ModeloOrdenServicioTipoEstado::mdlBorrarOrdenServicioTipoEstado($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El tipo de estado de orden de servicio ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "ordenServicioTipoEstado";

                                                        }
                                                })

                        </script>';
                }
        }
    }
    
}            
