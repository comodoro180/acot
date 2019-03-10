<?php

class ControladorCotizacion{

    /*=============================================
      CREAR PEDIDO
    =============================================*/
    static public function ctrCrearCotizacion() {

        if (isset($_POST["nuevaFechaVC"])) {
            
                $datos = array( "fechaVencimiento"          => $_POST["nuevaFechaVC"],
                                "observaciones"             => $_POST["nuevaObservacionC"],
                                "idCotizacionTipoEstado"    => $_POST["nuevaCotizacionTipoEstado"],
                                "idPedido"                  => $_POST["nuevoPedidoC"],
                                "idProveedor"               => $_POST["nuevoProveedorC"],
                                "idUsuario"                 => $_POST["nuevoUsuarioC"]
                );
                
                $respuesta = ModeloCotizacion::mdlIngresarCotizacion($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡La cotización ha sido guardada correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "cotizaciones";
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
                                                window.location = "cotizaciones";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarCotizaciones($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tcotizacion";
        
        $respuesta = ModeloCotizacion::mdlMostrarCotizacion($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarCotizacion(){        

            if(isset($_POST["idCotizacion"])){                            

                            $datos = array( "idCotizacion"              => $_POST["idCotizacion"],
                                            "fechaVencimiento"          => $_POST["editarFechaVC"],
                                            "observaciones"             => $_POST["editarObservacionesC"],
                                            "idCotizacionTipoEstado"    => $_POST["editarCotizacionTipoEstado"],
                                            "idPedido"                  => $_POST["editarPedidoC"],
                                            "idProveedor"               => $_POST["editarProveedorC"],
                                            "idUsuario"                 => $_POST["editarUsuarioC"]);

                            $respuesta = ModeloCotizacion::mdlEditarCotizacion($datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "La cotización ha sido editada correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "cotizaciones";
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
                                                        window.location = "cotizaciones";
                                                }
                                        });
                                </script>';                               
                            }

            }
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarCotizacion(){

        if(isset($_GET["idCotizacion"])){
                
                $datos = $_GET["idCotizacion"];

                $respuesta = ModeloCotizacion::mdlBorrarCotizacion($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "La cotización ha sido borrada correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "cotizaciones";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            

