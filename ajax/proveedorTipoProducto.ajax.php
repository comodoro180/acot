<?php

require_once "../controladores/proveedorTipoProducto.controlador.php";
require_once "../modelos/proveedorTipoProducto.modelo.php";

class AjaxProveedorTipoProducto{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idProveedorTipoProducto;

	public function ajaxEditarProveedorTipoProducto(){

		$campo = "IDPROVEEDORTIPOPRODUCTO";
		$valor = $this->idProveedorTipoProducto;

		$respuesta = ControladorProveedorTipoProducto::ctrMostrarProveedorTipoProducto($campo, $valor);

		echo json_encode($respuesta);
	}

	

}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idProveedorTipoProducto"])){

	$editar = new AjaxProveedorTipoProducto();
	$editar -> idProveedorTipoProducto = $_POST["idProveedorTipoProducto"];
	$editar ->ajaxEditarProveedorTipoProducto();
}



