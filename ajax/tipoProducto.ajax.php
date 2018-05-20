<?php

require_once "../controladores/tipoProducto.controlador.php";
require_once "../modelos/tipoProducto.modelo.php";

class AjaxTipoProducto{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idTipoProducto;

	public function ajaxEditarTipoProducto(){

		$campo = "IDTIPOPRODUCTO";
		$valor = $this->idTipoProducto;

		$respuesta = ControladorTiposProducto::ctrMostrarTiposProducto($campo, $valor);

		echo json_encode($respuesta);
	}


	public $validarTipoProducto;

	public function ajaxValidarTipoProducto(){

		$item = "nombre";
		$valor = $this->validarTipoProducto;

		$respuesta = ControladorTiposProducto::ctrMostrarTiposProducto($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idTipoProducto"])){

	$editar = new AjaxTipoProducto();
	$editar -> idTipoProducto = $_POST["idTipoProducto"];
	$editar -> ajaxEditarTipoProducto();
}



if(isset( $_POST["validarTipoProducto"])){

	$valUsuario = new AjaxTipoProducto();
	$valUsuario -> validarPais = $_POST["validarTipoProducto"];
	$valUsuario -> ajaxValidarTipoProducto();
}