<?php

class ControladorCotizacionDetalles{

    /*=============================================
      CREAR DETALLE COTIZACIÓN
    =============================================*/
    static public function ctrCrearCotizacionDetalles() {

        if (isset($_POST["nuevoValorUnitarioCD"])) {
            
            
                $datos = array( "valorUnitario"                 => $_POST["nuevoValorUnitarioCD"],
                                "valorCotizado"                 => $_POST["nuevoValorCotizadoCD"],
                                "cantidadOriginal"              => $_POST["nuevaCantidadOriginalCD"],
                                "cantidadCotizada"              => $_POST["nuevaCantidadCotizadaCD"],
                                "idCotizacionDetalleTipoEstado" => $_POST["nuevoEstadoCD"],
                                "idCotizacion"                  => $_POST["nuevaCotizacionCD"],
                                "idProducto"                    => $_POST["nuevoProductoCD"]
                        );
                
                $respuesta = ModeloCotizacionDetalles::mdlIngresarCotizacionDetalles($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El detalle de la cotización ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "cotizacionDetalle";
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
                                                window.location = "cotizacionDetalle";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarCotizacionDetalles($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tcotizaciondetalle";
        
        $respuesta = ModeloCotizacionDetalles::mdlMostrarCotizacionDetalles($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarCotizacionDetalles(){        

            if(isset($_POST["idCotizacionDetalle"])){                            

                            $datos = array( "idCotizacionDetalle"           => $_POST["idCotizacionDetalle"],
                                            "valorUnitario"                 => $_POST["editarValorUnitarioCD"],
                                            "valorCotizado"                 => $_POST["editarValorCotizadoCD"],
                                            "cantidadOriginal"              => $_POST["editarCantidadOriginalCD"],
                                            "cantidadCotizada"              => $_POST["editarCantidadCotizadaCD"],
                                            "idCotizacionDetalleTipoEstado" => $_POST["editarEstadoCD"],
                                            "idCotizacion"                  => $_POST["editarCotizacionCD"],
                                            "idProducto"                    => $_POST["editarProductoCD"]
                                    );

                            $respuesta = ModeloCotizacionDetalles::mdlEditarCotizacionDetalles($datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El detalle de la cotización ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "cotizacionDetalle";
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
                                                        window.location = "cotizacionDetalle";
                                                }
                                        });
                                </script>';                               
                            }

            }
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarCotizacionDetalle(){

        if(isset($_GET["idCotizacionDetalle"])){
                
                $datos = $_GET["idCotizacionDetalle"];

                $respuesta = ModeloCotizacionDetalles::mdlBorrarCotizacionDetalle($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El detalle de la cotización ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "cotizacionDetalle";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            

