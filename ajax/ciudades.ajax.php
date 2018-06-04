<?php

require_once "../controladores/ciudades.controlador.php";
require_once "../modelos/ciudades.modelo.php";

class AjaxCiudades{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idciudad;

	public function ajaxEditarCiudad(){

		$campo = "IDCIUDAD";
		$valor = $this->idciudad;

		$respuesta = ControladorCiudades::ctrMostrarCiudades($campo, $valor);

		echo json_encode($respuesta);
	}

}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idciudad"])){

	$editar = new AjaxCiudades();
	$editar -> idciudad = $_POST["idciudad"];
	$editar -> ajaxEditarCiudad();
}

