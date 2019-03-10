<?php

class ControladorPedidoDetalles{

    /*=============================================
      CREAR DETALLE PEDIDO
    =============================================*/
    static public function ctrCrearPedidoDetalles() {

        if (isset($_POST["nuevaCantidadPD"])) {
            
                $datos = array( "cantidad"    => $_POST["nuevaCantidadPD"],
                                "idProducto"  => $_POST["nuevoProductoPD"],
                                "idPedido"    => $_POST["nuevoPedidoPD"]
                );
                
                $respuesta = ModeloPedidoDetalles::mdlIngresarPedidoDetalles($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El detalle del pedido ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "pedidoDetalle";
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
                                                window.location = "pedidoDetalle";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarPedidoDetalles($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tpedidodetalle";
        
        $respuesta = ModeloPedidoDetalles::mdlMostrarPedidoDetalles($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarPedidoDetalles(){        

            if(isset($_POST["idPedidoDetalle"])){                            

                            $datos = array( "idPedidoDetalle"   => $_POST["idPedidoDetalle"],
                                            "cantidad"          => $_POST["editarCantidadPD"],
                                            "idPedido"          => $_POST["editarPedidoPD"],
                                            "idProducto"        => $_POST["editarProductoPD"]);

                            $respuesta = ModeloPedidoDetalles::mdlEditarPedidoDetalles($datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El detalle del pedido ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "pedidoDetalle";
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
                                                        window.location = "pedidoDetalle";
                                                }
                                        });
                                </script>';                               
                            }

            }
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarPedidoDetalle(){

        if(isset($_GET["idPedidoDetalle"])){
                
                $datos = $_GET["idPedidoDetalle"];

                $respuesta = ModeloPedidoDetalles::mdlBorrarPedidoDetalle($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El detalle del  pedido ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "pedidoDetalle";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            

