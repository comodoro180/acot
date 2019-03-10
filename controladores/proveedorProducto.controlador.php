<?php

class ControladorProveedorProductos{

    /*=============================================
      CREAR PRODUCTO
    =============================================*/
    static public function ctrCrearProveedorProducto() {

        if (isset($_POST["nuevoProducto"])) {
            
                $datos = array(
                    "idProveedor"            => $_POST["nuevoProveedor"],
                    "idProducto"       => $_POST["nuevoProducto"],
                    "valorUnitario"    => $_POST["nuevoValorUnitario"]
                );
                
                $respuesta = ModeloProveedorProductos::mdlIngresarProveedorProducto($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡La información ha sido guardada correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "proveedorProductos";
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
                                                window.location = "proveedorProductos";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarProveedorProductos($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tproveedorproducto";
        
        $respuesta = ModeloProveedorProductos::mdlMostrarProveedorProductos($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarProveedorProducto(){   
        
        if(isset($_POST["idProveedorProducto"])){

            $datos = array( "idProveedorProducto" => $_POST["idProveedorProducto"],
                            "idProducto" => $_POST["editarIdProducto"],
                            "idProveedor" => $_POST["editarIdProveedor"],
                            "valorUnitario" => $_POST["editarValorUnitario"]);

            $respuesta = ModeloProveedorProductos::mdlEditarProveedorProducto($datos);

            if($respuesta == "ok"){

                    echo'<script>
                    swal({
                            type: "success",
                            title: "Los datos se actualizaron correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                    if (result.value) {
                                        window.location = "proveedorProductos";
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
                                        window.location = "proveedorProductos";
                                }
                        });
                </script>';                               
            }
        }           
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarProveedorProducto(){

        if(isset($_GET["idProveedorProducto"])){
                
                $datos = $_GET["idProveedorProducto"];

                $respuesta = ModeloProveedorProductos::mdlBorrarProveedorProducto($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El datos han sido borrados correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "proveedorProductos";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            
