<?php

require_once "../controladores/pedido.controlador.php";
require_once "../modelos/pedido.modelo.php";

class AjaxPedidos{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idPedido;

	public function ajaxEditarPedido(){

		$campo = "IDPEDIDO";
		$valor = $this->idPedido;

		$respuesta = ControladorPedidos::ctrMostrarPedidos($campo, $valor);

		echo json_encode($respuesta);
	}
        
}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idPedido"])){

	$editar = new AjaxPedidos();
	$editar -> idPedido = $_POST["idPedido"];
	$editar ->ajaxEditarPedido();
}