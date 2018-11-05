<?php

require_once "../controladores/roles.controlador.php";
require_once "../modelos/roles.modelo.php";

class AjaxRoles{

    /*=============================================
    EDITAR ROL
    =============================================*/	

    public $idPerfil;

    public function ajaxEditarRol(){

            $campo = "IDPERFIL";
            $valor = $this->idPerfil;

            $respuesta = ControladorRoles::ctrMostrarRoles($campo, $valor);

            echo json_encode($respuesta);
    }
    
    /*=============================================
    VALIDAR ROL
    =============================================*/
    
    public $validarRol;

    public function ajaxValidarRol(){

            $campo= "nombreRol";
            $valor = $this->validarRol;

            $respuesta = ControladorRoles::ctrMostrarRoles($campo, $valor);

            echo json_encode($respuesta);
    }
}

/*=============================================
EDITAR ROL
=============================================*/
if(isset($_POST["idPerfil"])){

	$editar = new AjaxRoles();
	$editar -> idPerfil = $_POST["idPerfil"];
	$editar ->ajaxEditarRol();
}

/*=============================================
VALIDAR ROL
=============================================*/

if(isset( $_POST["validarRol"])){

	$valRol = new AjaxRoles();
	$valRol -> validarRol = $_POST["validarRol"];
	$valRol ->ajaxValidarRol();
}