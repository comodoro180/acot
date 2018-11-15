<?php

class ControladorPedidoTipoEstado{

    /*=============================================
      CREAR
    =============================================*/
    static public function ctrCrearPedidoTipoEstado() {

    if (isset($_POST["nuevoPedidoTipoEstado"])) {
            $tabla = "tpedidotipoestado";

            $datos = array(
                "nombre"   => $_POST["nuevoPedidoTipoEstado"],
                "descripcion"   => $_POST["nuevaDescripcion"]                      
            );

            $respuesta = ModeloPedidoTipoEstado::mdlIngresarPedidoTipoEstado($tabla,$datos);

            if ($respuesta == "ok"){
                echo '<script>
                        swal({
                                type: "success",
                                title: "¡El tipo de estado de pedidos ha sido guardado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "pedidoTipoEstado";
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
                                            window.location = "pedidoTipoEstado";
                                    }
                            });
                    </script>';                    
            }                
        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarPedidoTipoEstado($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tpedidotipoestado";
        
        $respuesta = ModeloPedidoTipoEstado::mdlMostrarPedidoTipoEstado($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarPedidoTipoEstado(){        

            if(isset($_POST["editarPedidoTipoEstado"])){



                $tabla = "tpedidotipoestado";

                $datos = array( "idPedidoTipoEstado" => $_POST["idPedidoTipoEstado"],
                                "nombre" => $_POST["editarPedidoTipoEstado"],
                                "descripcion" => $_POST["editarDescripcion"]
                        );

                $respuesta = ModeloPedidoTipoEstado::mdlEditarPedidoTipoEstado($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>
                        swal({
                                type: "success",
                                title: "El tipo de estado de pedidos ha sido editado correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                                }).then(function(result){
                                        if (result.value) {
                                            window.location = "pedidoTipoEstado";
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
                                            window.location = "pedidoTipoEstado";
                                    }
                            });
                    </script>';                               
                }
            }
        }
    
    
    /*=============================================
      BORRAR 
    =============================================*/
    static public function ctrBorrarPedidoTipoEstado(){

        if(isset($_GET["idPedidoTipoEstado"])){

                $tabla ="tpedidotipoestado";
                $datos = $_GET["idPedidoTipoEstado"];

                $respuesta = ModeloPedidoTipoEstado::mdlBorrarPedidoTipoEstado($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El tipo de estado de pedidos ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "pedidoTipoEstado";

                                                        }
                                                })

                        </script>';
                }
        }
    }
    
}            
