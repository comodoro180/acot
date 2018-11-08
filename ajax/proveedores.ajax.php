<?php

require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

class AjaxProveedores{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idProveedor;

	public function ajaxEditarProveedor(){

		$campo = "IDPROVEEDOR";
		$valor = $this->idProveedor;

		$respuesta = ControladorProveedores::ctrMostrarProveedores($campo, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	ACTIVAR
	=============================================*/	

	public $activarProveedor;
	public $activarIdProveedor;

	public function ajaxActivarProveedor(){

		$tabla = "tproveedor";

		$item1 = "estado";
		$valor1 = $this->activarProveedor;

		$item2 = "idProveedor";
		$valor2 = $this->activarIdProveedor;

		$respuesta = ModeloProveedores::mdlActualizarProveedor($tabla, $item1, $valor1, $item2, $valor2);

	}

}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idProveedor"])){

	$editar = new AjaxProveedores();
	$editar -> idProveedor = $_POST["idProveedor"];
	$editar ->ajaxEditarProveedor();
}

/*=============================================
ACTIVAR
=============================================*/	
if(isset($_POST["activarProveedor"])){

	$activarProveedor = new AjaxProveedores();
	$activarProveedor -> activarProveedor = $_POST["activarProveedor"];
	$activarProveedor -> activarIdProveedor = $_POST["activarIdProveedor"];
	$activarProveedor ->ajaxActivarProveedor();
}


