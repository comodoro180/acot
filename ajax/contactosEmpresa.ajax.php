<?php

require_once "../controladores/contactosEmpresa.controlador.php";
require_once "../modelos/contactosEmpresa.modelo.php";

class AjaxContactosEmpresa{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idEmpresaContactos;

	public function ajaxEditarContactoEmpresa(){

		$campo = "IDEMPRESACONTACTOS";
		$valor = $this->idEmpresaContactos;

		$respuesta = ControladorContactosEmpresa::ctrMostrarContactosEmpresa($campo, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	ACTIVAR
	=============================================*/	

	public $activarContactoEmpresa;
	public $activarIdContactoEmpresa;

	public function ajaxActivarContactoEmpresa(){

		$tabla = "tempresacontactos";

		$item1 = "estado";
		$valor1 = $this->activarContactoEmpresa;

		$item2 = "idEmpresaContactos";
		$valor2 = $this->activarIdContactoEmpresa;

		$respuesta = ModeloContactosEmpresa::mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2);

	}

}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idEmpresaContactos"])){

	$editar = new AjaxContactosEmpresa();
	$editar -> idEmpresaContactos = $_POST["idEmpresaContactos"];
	$editar ->ajaxEditarContactoEmpresa();
}

/*=============================================
ACTIVAR
=============================================*/	
if(isset($_POST["activarContactoEmpresa"])){

	$activarContactoEmpresa = new AjaxContactosEmpresa();
	$activarContactoEmpresa -> activarContactoEmpresa = $_POST["activarContactoEmpresa"];
	$activarContactoEmpresa -> activarIdContactoEmpresa = $_POST["activarIdContactoEmpresa"];
	$activarContactoEmpresa ->ajaxActivarContactoEmpresa();
}

