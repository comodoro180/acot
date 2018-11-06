<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idProducto;

	public function ajaxEditarProducto(){

		$campo = "IDPRODUCTO";
		$valor = $this->idProducto;

		$respuesta = ControladorProductos::ctrMostrarProductos($campo, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	ACTIVAR
	=============================================*/	

	public $activarProducto;
	public $activarIdProducto;

	public function ajaxActivarProducto(){

		$tabla = "tproducto";

		$item1 = "estado";
		$valor1 = $this->activarProducto;

		$item2 = "idProducto";
		$valor2 = $this->activarIdProducto;

		$respuesta = ModeloProductos::mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2);

	}

}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idProducto"])){

	$editar = new AjaxProductos();
	$editar -> idProducto = $_POST["idProducto"];
	$editar ->ajaxEditarProducto();
}

/*=============================================
ACTIVAR
=============================================*/	
if(isset($_POST["activarProducto"])){

	$activarProducto = new AjaxProductos();
	$activarProducto -> activarProducto = $_POST["activarProducto"];
	$activarProducto -> activarIdProducto = $_POST["activarIdProducto"];
	$activarProducto ->ajaxActivarProducto();
}

