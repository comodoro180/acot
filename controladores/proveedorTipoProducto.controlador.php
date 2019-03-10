<?php

class ControladorProveedorTipoProducto{

    /*=============================================
      CREAR PRODUCTO
    =============================================*/
    static public function ctrCrearProveedorTipoProducto() {

        if (isset($_POST["nuevoProveedor"])) {
            
                $datos = array(
                    "idProveedor"       => $_POST["nuevoProveedor"],
                    "idTipoProducto"    => $_POST["nuevoTipoProducto"]
                );
                
                $respuesta = ModeloProveedorTipoProducto::mdlIngresarProveedorTipoProducto($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡La información ha sido guardada correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "proveedorTipoProducto";
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
                                                window.location = "proveedorTipoProducto";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarProveedorTipoProducto($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tproveedortipoproducto";
        
        $respuesta = ModeloProveedorTipoProducto::mdlMostrarProveedorTipoProducto($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarProveedorTipoProducto(){   
        
        if(isset($_POST["idProveedorTipoProducto"])){

            $datos = array( "idProveedorTipoProducto" => $_POST["idProveedorTipoProducto"],
                            "idTipoProducto" => $_POST["editarIdTipoProducto"],
                            "idProveedor" => $_POST["editarIdProveedor"]);

            $respuesta = ModeloProveedorTipoProducto::mdlEditarProveedorTipoProducto($datos);

            if($respuesta == "ok"){

                    echo'<script>
                    swal({
                            type: "success",
                            title: "Los datos se actualizarón correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                    if (result.value) {
                                        window.location = "proveedorTipoProducto";
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
                                        window.location = "proveedorTipoProducto";
                                }
                        });
                </script>';                               
            }
        }           
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarProveedorTipoProducto(){

        if(isset($_GET["idProveedorTipoProducto"])){
                
                $datos = $_GET["idProveedorTipoProducto"];

                $respuesta = ModeloProveedorTipoProducto::mdlBorrarProveedorTipoProducto($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El registro ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "proveedorTipoProducto";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            
