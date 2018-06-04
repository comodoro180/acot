<?php

require_once "../controladores/empresas.controlador.php";
require_once "../modelos/empresas.modelo.php";

class AjaxEmpresas{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idEmpresa;

	public function ajaxEditarEmpresa(){

		$campo = "IDEMPRESA";
		$valor = $this->idEmpresa;

		$respuesta = ControladorEmpresas::ctrMostrarEmpresas($campo, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	ACTIVAR
	=============================================*/	

	public $activarEmpresa;
	public $activarIdEmpresa;

	public function ajaxActivarEmpresa(){

		$tabla = "tempresa";

		$item1 = "estado";
		$valor1 = $this->activarEmpresa;

		$item2 = "idEmpresa";
		$valor2 = $this->activarIdEmpresa;

		$respuesta = ModeloEmpresas::mdlActualizarEmpresa($tabla, $item1, $valor1, $item2, $valor2);

	}

}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idEmpresa"])){

	$editar = new AjaxEmpresas();
	$editar -> idEmpresa = $_POST["idEmpresa"];
	$editar -> ajaxEditarEmpresa();
}

/*=============================================
ACTIVAR
=============================================*/	
if(isset($_POST["activarEmpresa"])){

	$activarEmpresa = new AjaxEmpresas();
	$activarEmpresa -> activarEmpresa = $_POST["activarEmpresa"];
	$activarEmpresa -> activarIdEmpresa = $_POST["activarIdEmpresa"];
	$activarEmpresa -> ajaxActivarEmpresa();
}

