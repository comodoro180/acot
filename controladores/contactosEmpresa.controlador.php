<?php

class ControladorContactosEmpresa{

    /*=============================================
      CREAR PRODUCTO
    =============================================*/
    static public function ctrCrearContactoEmpresa() {

        if (isset($_POST["nuevoContactoEmpresa"])) {
            
                $datos = array(
                    "email"     => $_POST["nuevoEmailCE"],
                    "principal" => $_POST["nuevoPrincipal"],
                    "nombre"    => $_POST["nuevoContactoEmpresa"],
                    "idEmpresa" => $_POST["nuevoIdEmpresa"]
                );
                
                $respuesta = ModeloContactosEmpresa::mdlIngresarContactosEmpresa($datos);
                
                if ($respuesta == "ok"){
                    echo '<script>
                            swal({
                                    type: "success",
                                    title: "¡El contacto de la empresa ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"

                            }).then(function(result){
                                    if(result.value){
                                            window.location = "contactosEmpresa";
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
                                                window.location = "contactosEmpresa";
                                        }
                                });
                        </script>';                    
                }                

        }
    }
    

    /*=============================================
      MOSTRAR
    =============================================*/
    static public function ctrMostrarContactosEmpresa($campo, $valor) {
        
        include_once "../conf/config.inc.php";
        
        $tabla = "tempresacontactos";
        
        $respuesta = ModeloContactosEmpresa::mdlMostrarContactosEmpresa($tabla,$campo, $valor);

        return $respuesta;
    }

    /*=============================================
      EDITAR
    =============================================*/
    static public function ctrEditarContactoEmpresa(){        

            if(isset($_POST["editarContactoEmpresa"])){                            

                            $datos = array( "idEmpresaContactos"    => $_POST["idEmpresaContactos"],
                                            "email"                 => $_POST["editarEmailCE"],
                                            "principal"             => $_POST["editarPrincipal"],
                                            "nombre"                => $_POST["editarContactoEmpresa"],
                                            "idEmpresa"             => $_POST["editarIdEmpresaContactoEmpresa"]);

                            $respuesta = ModeloContactosEmpresa::mdlEditarContactoEmpresa($datos);

                            if($respuesta == "ok"){

                                    echo'<script>
                                    swal({
                                            type: "success",
                                            title: "El contacto de la empresa ha sido editado correctamente",
                                            showConfirmButton: true,
                                            confirmButtonText: "Cerrar"
                                            }).then(function(result){
                                                    if (result.value) {
                                                        window.location = "contactosEmpresa";
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
                                                        window.location = "contactosEmpresa";
                                                }
                                        });
                                </script>';                               
                            }

            }
    }
    
    /*=============================================
      BORRAR
    =============================================*/
    static public function ctrBorrarContactoEmpresa(){

        if(isset($_GET["idEmpresaContactos"])){
                
                $datos = $_GET["idEmpresaContactos"];

                $respuesta = ModeloContactosEmpresa::mdlBorrarContactoEmpresa($datos);

                if($respuesta == "ok"){

                        echo'<script>

                        swal({
                                  type: "success",
                                  title: "El contacto de la empresa ha sido borrado correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                                        if (result.value) {

                                                        window.location = "contactosEmpresa";

                                                        }
                                                })

                        </script>';
                }
        }
    }
}            
