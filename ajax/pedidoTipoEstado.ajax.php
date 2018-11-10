<?php

require_once "../controladores/pedidoTipoEstado.controlador.php";
require_once "../modelos/pedidoTipoEstado.modelo.php";

class AjaxPedidoTipoEstado{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idPedidoTipoEstado;

	public function ajaxEditarPedidoTipoEstado(){

		$campo = "IDPEDIDOTIPOESTADO";
		$valor = $this->idPedidoTipoEstado;

		$respuesta = ControladorPedidoTipoEstado::ctrMostrarPedidoTipoEstado($campo, $valor);

		echo json_encode($respuesta);
	}


	public $validarPedidoTipoEstado;

	public function ajaxValidarPedidoTipoEstado(){

		$item = "nombre";
		$valor = $this->validarPedidoTipoEstado;

		$respuesta = ControladorPedidoTipoEstado::ctrMostrarPedidoTipoEstado($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idPedidoTipoEstado"])){

	$editar = new AjaxPedidoTipoEstado();
	$editar -> idPedidoTipoEstado = $_POST["idPedidoTipoEstado"];
	$editar ->ajaxEditarPedidoTipoEstado();
}



if(isset( $_POST["validarPedidoTipoEstado"])){

	$valPedidoTipoEstado = new AjaxPedidoTipoEstado();
	$valPedidoTipoEstado -> validarPedidoTipoEstado = $_POST["validarPedidoTipoEstado"];
	$valPedidoTipoEstado ->ajaxValidarPedidoTipoEstado();
}