<?php

class ControladorProveedores{

    /*=============================================
      CREAR PROVEEDOR
    =============================================*/
    static public function ctrCrearProveedor() {

        if (isset($_POST["nuevoProveedor"])) {
            
                $datos = array( "nit"         => $_POST["nuevoNit"],
                                "nombre"      => $_POST["nuevoProveedor"],
                                "direccion"   => $_POST["nuevaDireccion"],
                                "telefono1"   => $_POST["nuevoTelefono1"],
                                "telefono2"   => $_POST["nuevoTelefono2"],
                                "idCiudad"    => $_POST["nuevaCiudad"]
                );
                
                $respuesta = ModeloProveedores::mdlIngresarProveedor($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El proveedor ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "proveedores";
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
                                                window.location = "proveedores";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarProveedores($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tproveedor";
        
        $respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarProveedor(){        

            if(isset($_POST["editarProveedor"])){                            

                            $datos = array( "idProveedor"         => $_POST["idProveedor"],
                                            "nit"         => $_POST["editarNit"],
                                            "nombre"      => $_POST["editarProveedor"],
                                            "direccion"   => $_POST["editarDireccion"],
                                            "telefono1"   => $_POST["editarTelefono1"],
                                            "telefono2"   => $_POST["editarTelefono2"],
                                            "idCiudad"    => $_POST["editarCiudad"]);

                            $respuesta = ModeloProveedores::mdlEditarProveedor($datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "EL proveedor ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "proveedores";
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
                                                        window.location = "proveedores";
                                                }
                                        });
                                </script>';                               
                            }

            }
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarProveedor(){

        if(isset($_GET["idProveedor"])){
                
                $datos = $_GET["idProveedor"];

                $respuesta = ModeloProveedores::mdlBorrarProveedor($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El proveedor ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "proveedores";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            

