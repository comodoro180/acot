<?php

class ControladorTiposProducto {

    /*=============================================
      CREAR
    =============================================*/
    static public function ctrCrearTipoProducto() {

        if (isset($_POST["nuevoNombreTipoProducto"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreTipoProducto"])) {

                $tabla = "ttipoproducto";
                
                $datos = array(
                    "nombre"   => $_POST["nuevoNombreTipoProducto"],
                    "descripcion"   => $_POST["nuevaDescripcionTipoProducto"]                      
                );
                
                $respuesta = ModeloTipoProducto::mdlIngresarTipoProducto($tabla,$datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El tipo de producto ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "tipoProducto";
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
                                                window.location = "tipoProducto";
                                        }
                                });
                        </script>';                    
                }                
            } else {
                echo '<script>
                        swal({
                                type: "error",
                                title: "¡El tipo de producto no puede ir vacío o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                        }).then(function(result){
                                if(result.value){
                                        window.location = "tipoProducto";
                                }
                        });
                </script>';
            }
        }
    }

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarTiposProducto($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "ttipoproducto";
        
        $respuesta = ModeloTipoProducto::mdlMostrarTiposProducto($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarTipoProducto(){        

            if(isset($_POST["editarNombreTipoProducto"])){

                    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreTipoProducto"])){

                            $tabla = "ttipoproducto";
                            
                            $datos = array( "idTipoProducto" => $_POST["idTipoProducto"],
                                            "nombre" => $_POST["editarNombreTipoProducto"],
                                            "descripcion" => $_POST["editarDescripcionTipoProducto"]
                                    );

                            $respuesta = ModeloTipoProducto::mdlEditarTipoProducto($tabla, $datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El tipo de producto ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "tipoProducto";
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
                                                        window.location = "tipoProducto";
                                                }
                                        });
                                </script>';                               
                            }
                    }else{
                            echo'<script>
                                    swal({
                                            type: "error",
                                            title: "¡El tipo de producto no puede ir vacío o llevar caracteres especiales!",
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
    static public function ctrBorrarTipoProducto(){

        if(isset($_GET["idTipoProducto"])){

                $tabla ="ttipoproducto";
                $datos = $_GET["idTipoProducto"];

                $respuesta = ModeloTipoProducto::mdlBorrarTipoProducto($tabla, $datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El tipo de producto ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {
                                                                window.location = "tipoProducto";
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
                                                window.location = "tipoProducto";
                                        }
                                });
                        </script>';                               
                }                
        }
    }
    
}            
