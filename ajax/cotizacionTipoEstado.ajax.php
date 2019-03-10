<?php

require_once "../controladores/cotizacionTipoEstado.controlador.php";
require_once "../modelos/cotizacionTipoEstado.modelo.php";

class AjaxCotizacionTipoEstado{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idCotizacionTipoEstado;

	public function ajaxEditarCotizacionTipoEstado(){

		$campo = "IDCOTIZACIONTIPOESTADO";
		$valor = $this->idCotizacionTipoEstado;

		$respuesta = ControladorCotizacionTipoEstado::ctrMostrarCotizacionTipoEstado($campo, $valor);

		echo json_encode($respuesta);
	}


	public $validarCotizacionTipoEstado;

	public function ajaxValidarCotizacionTipoEstado(){

		$item = "nombre";
		$valor = $this->validarCotizacionTipoEstado;

		$respuesta = ControladorCotizacionTipoEstado::ctrMostrarCotizacionTipoEstado($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idCotizacionTipoEstado"])){

	$editar = new AjaxCotizacionTipoEstado();
	$editar -> idCotizacionTipoEstado = $_POST["idCotizacionTipoEstado"];
	$editar ->ajaxEditarCotizacionTipoEstado();
}



if(isset( $_POST["validarCotizacionTipoEstado"])){

	$valCotizacionTipoEstado = new AjaxCotizacionTipoEstado();
	$valCotizacionTipoEstado -> validarCotizacionTipoEstado = $_POST["validarCotizacionTipoEstado"];
	$valCotizacionTipoEstado ->ajaxValidarCotizacionTipoEstado();
}