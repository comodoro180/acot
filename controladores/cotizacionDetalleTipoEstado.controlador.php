<?php

class ControladorCotizacionDetalleTipoEstado{

    /*=============================================
      CREAR
    =============================================*/
    static public function ctrCrearCotizacionDetalleTipoEstado() {

        if (isset($_POST["nuevoNombre"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])) {

                $tabla = "tcotizaciondetalletipoestado";
                
                $datos = array(
                    "nombre"   => $_POST["nuevoNombre"],
                    "descripcion"   => $_POST["nuevaDescripcion"]                      
                );
                
                $respuesta = ModeloCotizacionDetalleTipoEstado::mdlIngresarCotizacionDetalleTipoEstado($tabla,$datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El tipo de estado del detalle de la cotización ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "cotizacionDetalleTipoEstado";
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
                                                window.location = "cotizacionDetalleTipoEstado";
                                        }
                                });
                        </script>';                    
                }                
            } else {
                echo '<script>
                        swal({
                                type: "error",
                                title: "¡El tipo de estado del detalle de la cotización no puede ir vacío o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "cotizacionDetalleTipoEstado";
                                }
                        });
                </script>';
            }
        }
    }

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarCotizacionDetalleTipoEstado($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tcotizaciondetalletipoestado";
        
        $respuesta = ModeloCotizacionDetalleTipoEstado::mdlMostrarCotizacionDetalleTipoEstado($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarCotizacionDetalleTipoEstado(){        

            if(isset($_POST["editarNombreDetalle"])){

                    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreDetalle"])){

                            $tabla = "tcotizaciondetalletipoestado";
                            
                            $datos = array( "idCotizacionDetalleTipoEstado" => $_POST["idCotizacionDetalleTipoEstado"],
                                            "nombre" => $_POST["editarNombreDetalle"],
                                            "descripcion" => $_POST["editarDescripcionDetalle"]
                                    );

                            $respuesta = ModeloCotizacionDetalleTipoEstado::mdlEditarCotizacionDetalleTipoEstado($tabla, $datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El tipo de estado del detalle la cotización ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "cotizacionDetalleTipoEstado";
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
                                                        window.location = "cotizacionDetalleTipoEstado";
                                                }
                                        });
                                </script>';                               
                            }
                    }else{
                            echo'<script>
                                    swal({
                                            type: "error",
                                            title: "¡El tipo de estado del detalle de la cotización no puede ir vacío o llevar caracteres especiales!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                  if (result.value) {
                                                    window.location = "cotizacionDetalleTipoEstado";
                                                  }
                                            })
                            </script>';
                    }
            }
    }
    
    /*=============================================
      BORRAR 
    =============================================*/
    static public function ctrBorrarCotizacionDetalleTipoEstado(){

        if(isset($_GET["idCotizacionDetalleTipoEstado"])){

                $tabla ="tcotizaciondetalletipoestado";
                $datos = $_GET["idCotizacionDetalleTipoEstado"];

                $respuesta = ModeloCotizacionDetalleTipoEstado::mdlBorrarCotizacionDetalleTipoEstado($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El tipo de estado del detalle de la cotización ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {
                                                                window.location = "cotizacionDetalleTipoEstado";
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
                                                window.location = "cotizacionDetalleTipoEstado";
                                        }
                                });
                        </script>';                               
                }                
        }
    }
    
}            
