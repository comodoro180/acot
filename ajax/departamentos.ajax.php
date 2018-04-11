<?php

require_once "../controladores/departamentos.controlador.php";
require_once "../modelos/departamentos.modelo.php";

class AjaxDepartamentos{

	/*=============================================
	EDITAR
	=============================================*/	

	public $iddepartamento;

	public function ajaxEditarDepartamento(){

		$campo = "IDDEPARTAMENTO";
		$valor = $this->iddepartamento;

		$respuesta = ControladorDepartamentos::ctrMostrarDepartamentos($campo, $valor);

		echo json_encode($respuesta);
	}

}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["iddepartamento"])){

	$editar = new AjaxDepartamentos();
	$editar -> iddepartamento = $_POST["iddepartamento"];
	$editar -> ajaxEditarDepartamento();
}

