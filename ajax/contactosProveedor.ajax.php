<?php

require_once "../controladores/contactosProveedor.controlador.php";
require_once "../modelos/contactosProveedor.modelo.php";

class AjaxContactosProveedor{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idEmpresaContactos;

	public function ajaxEditarContactoProveedor(){

		$campo = "IDEMPRESACONTACTOS";
		$valor = $this->idEmpresaContactos;

		$respuesta = ControladorContactosProveedor::ctrMostrarContactosProveedor($campo, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	ACTIVAR
	=============================================*/	

	public $activarContactoProveedor;
	public $activarIdContactoProveedor;

	public function ajaxActivarContactoProveedor(){

		$tabla = "tproveedorcontactos";

		$item1 = "estado";
		$valor1 = $this->activarContactoProveedor;

		$item2 = "idEmpresaContactos";
		$valor2 = $this->activarIdContactoProveedor;

		$respuesta = ModeloContactosProveedor::mdlActualizarContactoProveedor($tabla, $item1, $valor1, $item2, $valor2);

	}

}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idEmpresaContactos"])){

	$editar = new AjaxContactosProveedor();
	$editar -> idEmpresaContactos = $_POST["idEmpresaContactos"];
	$editar ->ajaxEditarContactoProveedor();
}

/*=============================================
ACTIVAR
=============================================*/	
if(isset($_POST["activarContactoProveedor"])){

	$activarContactoProveedor = new AjaxContactosProveedor();
	$activarContactoProveedor -> activarContactoProveedor = $_POST["activarContactoProveedor"];
	$activarContactoProveedor-> activarIdContactoProveedor = $_POST["activarIdContactoProveedor"];
	$activarContactoProveedor ->ajaxActivarContactoProveedor();
}

