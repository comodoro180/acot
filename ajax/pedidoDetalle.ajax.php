<?php

require_once "../controladores/pedidoDetalle.controlador.php";
require_once "../modelos/pedidoDetalle.modelo.php";

class AjaxPedidoDetalles{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idPedidoDetalle;

	public function ajaxEditarPedidoDetalle(){

		$campo = "IDPEDIDODETALLE";
		$valor = $this->idPedidoDetalle;

		$respuesta = ControladorPedidoDetalles::ctrMostrarPedidoDetalles($campo, $valor);

		echo json_encode($respuesta);
	}
        
}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idPedidoDetalle"])){

	$editar = new AjaxPedidoDetalles();
	$editar -> idPedidoDetalle = $_POST["idPedidoDetalle"];
	$editar ->ajaxEditarPedidoDetalle();
}