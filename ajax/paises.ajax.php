<?php

require_once "../controladores/paises.controlador.php";
require_once "../modelos/paises.modelo.php";

class AjaxPaises{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idpais;

	public function ajaxEditarPais(){

		$campo = "IDPAIS";
		$valor = $this->idpais;

		$respuesta = ControladorPaises::ctrMostrarPaises($campo, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	VALIDAR NO REPETIR EMAIL
	=============================================*/	
	public $validarPais;

	public function ajaxValidarPais(){

		$item = "nombre";
		$valor = $this->validarPais;

		$respuesta = ControladorPaises::ctrMostrarPaises($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idpais"])){

	$editar = new AjaxPaises();
	$editar -> idpais = $_POST["idpais"];
	$editar -> ajaxEditarPais();
}


/*=============================================
VALIDAR NO REPETIR EMAIL
=============================================*/
if(isset( $_POST["validarPais"])){

	$valUsuario = new AjaxPaises();
	$valUsuario -> validarPais = $_POST["validarPais"];
	$valUsuario -> ajaxValidarPais();
}