<?php

require_once "../controladores/proveedorProducto.controlador.php";
require_once "../modelos/proveedorProducto.modelo.php";

class AjaxProveedorProductos{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idProveedorProducto;

	public function ajaxEditarProveedorProducto(){

		$campo = "IDPROVEEDORPRODUCTO";
		$valor = $this->idProveedorProducto;

		$respuesta = ControladorProveedorProductos::ctrMostrarProveedorProductos($campo, $valor);

		echo json_encode($respuesta);
	}

	

}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idProveedorProducto"])){

	$editar = new AjaxProveedorProductos();
	$editar -> idProveedorProducto = $_POST["idProveedorProducto"];
	$editar ->ajaxEditarProveedorProducto();
}



