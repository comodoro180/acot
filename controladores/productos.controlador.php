<?php

class ControladorProductos{

    /*=============================================
      CREAR PRODUCTO
    =============================================*/
    static public function ctrCrearProducto() {

        if (isset($_POST["nuevoProducto"])) {
            
                $datos = array(
                    "nombre"            => $_POST["nuevoProducto"],
                    "descripcion"       => $_POST["nuevaDescripcion"],
                    "idTipoProducto"    => $_POST["nuevoTipoProducto"]
                );
                
                $respuesta = ModeloProductos::mdlIngresarProducto($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El producto ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "productos";
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
                                                window.location = "productos";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarProductos($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tproducto";
        
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarProducto(){        

            if(isset($_POST["editarProducto"])){                            

                            $datos = array( "idProducto" => $_POST["idProducto"],
                                            "producto" => $_POST["editarProducto"],
                                            "descripcion" => $_POST["editarDescripcion"],
                                            "idTipoProducto" => $_POST["editarTipoProducto"]);

                            $respuesta = ModeloProductos::mdlEditarProducto($datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "EL producto ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "productos";
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
                                                        window.location = "Productos";
                                                }
                                        });
                                </script>';                               
                            }

            }
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarProducto(){

        if(isset($_GET["idProducto"])){
                
                $datos = $_GET["idProducto"];

                $respuesta = ModeloProductos::mdlBorrarProducto($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El producto ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "productos";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            
