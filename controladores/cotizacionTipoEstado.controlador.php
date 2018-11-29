<?php

class ControladorCotizacionTipoEstado{

    /*=============================================
      CREAR
    =============================================*/
    static public function ctrCrearCotizacionTipoEstado() {

        if (isset($_POST["nuevoNombre"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])) {

                $tabla = "tcotizaciontipoestado";
                
                $datos = array(
                    "nombre"   => $_POST["nuevoNombre"],
                    "descripcion"   => $_POST["nuevaDescripcion"]                      
                );
                
                $respuesta = ModeloCotizacionTipoEstado::mdlIngresarCotizacionTipoEstado($tabla,$datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El tipo de estado de la cotización ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "cotizacionTipoEstado";
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
                                                window.location = "cotizacionTipoEstado";
                                        }
                                });
                        </script>';                    
                }                
            } else {
                echo '<script>
                        swal({
                                type: "error",
                                title: "¡El tipo de estado de la cotización no puede ir vacío o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "cotizacionTipoEstado";
                                }
                        });
                </script>';
            }
        }
    }

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarCotizacionTipoEstado($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tcotizaciontipoestado";
        
        $respuesta = ModeloCotizacionTipoEstado::mdlMostrarCotizacionTipoEstado($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarCotizacionTipoEstado(){        

            if(isset($_POST["editarNombre"])){

                    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

                            $tabla = "tcotizaciontipoestado";
                            
                            $datos = array( "idCotizacionTipoEstado" => $_POST["idCotizacionTipoEstado"],
                                            "nombre" => $_POST["editarNombre"],
                                            "descripcion" => $_POST["editarDescripcion"]
                                    );

                            $respuesta = ModeloCotizacionTipoEstado::mdlEditarCotizacionTipoEstado($tabla, $datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El tipo de estado de la cotización ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "cotizacionTipoEstado";
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
                                                        window.location = "cotizacionTipoEstado";
                                                }
                                        });
                                </script>';                               
                            }
                    }else{
                            echo'<script>
                                    swal({
                                            type: "error",
                                            title: "¡El tipo de estado de la cotización no puede ir vacío o llevar caracteres especiales!",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                  if (result.value) {
                                                    window.location = "tipoProducto";
                                                  }
                                            })
                            </script>';
                    }
            }
    }
    
    /*=============================================
      BORRAR 
    =============================================*/
    static public function ctrBorrarCotizacionTipoEstado(){

        if(isset($_GET["idCotizacionTipoEstado"])){

                $tabla ="tcotizaciontipoestado";
                $datos = $_GET["idCotizacionTipoEstado"];

                $respuesta = ModeloCotizacionTipoEstado::mdlBorrarCotizacionTipoEstado($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El tipo de estado de la cotización ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {
                                                                window.location = "cotizacionTipoEstado";
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
                                                window.location = "cotizacionTipoEstado";
                                        }
                                });
                        </script>';                               
                }                
        }
    }
    
}            
