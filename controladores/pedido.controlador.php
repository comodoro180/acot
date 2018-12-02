<?php

class ControladorPedidos{

    /*=============================================
      CREAR PEDIDO
    =============================================*/
    static public function ctrCrearPedido() {

        if (isset($_POST["nuevaFechaE"])) {
            
                $datos = array( "fechaEntrega"          => $_POST["nuevaFechaE"],
                                "observaciones"         => $_POST["nuevaObservacion"],
                                "idPedidoTipoEstado"    => $_POST["nuevoPedidoTipoEstado"],
                                "idEmpresa"             => $_POST["nuevaEmpresa"],
                                "idUsuario"             => $_POST["nuevoUsuario"]
                );
                
                $respuesta = ModeloPedidos::mdlIngresarPedido($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El pedido ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "pedidos";
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
                                                window.location = "pedidos";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarPedidos($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tpedido";
        
        $respuesta = ModeloPedidos::mdlMostrarPedidos($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarPedido(){        

            if(isset($_POST["idPedido"])){                            

                            $datos = array( "idPedido"              => $_POST["idPedido"],
                                            "observaciones"         => $_POST["editarObservacionesP"],
                                            "idPedidoTipoEstado"    => $_POST["editarPedidoTipoEstadoP"],
                                            "idEmpresa"             => $_POST["editarEmpresaP"],
                                            "idUsuario"             => $_POST["editarUsuarioP"]);

                            $respuesta = ModeloPedidos::mdlEditarPedido($datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El pedido ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "pedidos";
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
                                                        window.location = "pedidos";
                                                }
                                        });
                                </script>';                               
                            }

            }
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarPedido(){

        if(isset($_GET["idPedido"])){
                
                $datos = $_GET["idPedido"];

                $respuesta = ModeloPedidos::mdlBorrarPedido($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El pedido ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "pedidos";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            

