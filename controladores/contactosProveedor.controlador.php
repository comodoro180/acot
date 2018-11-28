<?php

class ControladorContactosProveedor{

    /*=============================================
      CREAR PRODUCTO
    =============================================*/
    static public function ctrCrearContactoProveedor() {

        if (isset($_POST["nuevoContactoProveedor"])) {
            
                $datos = array(
                    "email"     => $_POST["nuevoEmailCP"],
                    "principal" => $_POST["nuevoPrincipal"],
                    "nombre"    => $_POST["nuevoContactoProveedor"],
                    "idProveedor" => $_POST["nuevoIdProveedor"]
                );
                
                $respuesta = ModeloContactosProveedor::mdlIngresarContactosProveedor($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El contacto del proveedor ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "contactosProveedor";
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
                                                window.location = "contactosProveedor";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarContactosProveedor($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tproveedorcontactos";
        
        $respuesta = ModeloContactosProveedor::mdlMostrarContactosProveedor($tabla,$campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarContactoProveedor(){        

            if(isset($_POST["editarContactoProveedor"])){                            

                            $datos = array( "idEmpresaContactos"    => $_POST["idEmpresaContactos"],
                                            "email"                 => $_POST["editarEmail"],
                                            "nombre"                => $_POST["editarContactoProveedor"],
                                            "idProveedor"           => $_POST["editarIdProveedor"]);

                            $respuesta = ModeloContactosProveedor::mdlEditarContactoProveedor($datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El contacto del proveedor ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "contactosProveedor";
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
                                                        window.location = "contactosProveedor";
                                                }
                                        });
                                </script>';                               
                            }

            }
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarContactoProveedor(){

        if(isset($_GET["idProveedorContactos"])){
                
                $datos = $_GET["idProveedorContactos"];

                $respuesta = ModeloContactosProveedor::mdlBorrarContactoProveedor($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El contacto del proveedor ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "contactosProveedor";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            
