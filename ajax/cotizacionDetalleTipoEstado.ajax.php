<?php

require_once "../controladores/cotizacionDetalleTipoEstado.controlador.php";
require_once "../modelos/cotizacionDetalleTipoEstado.modelo.php";

class AjaxCotizacionDetalleTipoEstado{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idCotizacionDetalleTipoEstado;

	public function ajaxEditarCotizacionDetalleTipoEstado(){

		$campo = "IDCOTIZACIONDETALLETIPOESTADO";
		$valor = $this->idCotizacionDetalleTipoEstado;

		$respuesta = ControladorCotizacionDetalleTipoEstado::ctrMostrarCotizacionDetalleTipoEstado($campo, $valor);

		echo json_encode($respuesta);
	}


	public $validarCotizacionDetalleTipoEstado;

	public function ajaxValidarCotizacionDetalleTipoEstado(){

		$item = "nombre";
		$valor = $this->validarCotizacionDetalleTipoEstado;

		$respuesta = ControladorCotizacionDetalleTipoEstado::ctrMostrarCotizacionDetalleTipoEstado($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idCotizacionDetalleTipoEstado"])){

	$editar = new AjaxCotizacionDetalleTipoEstado();
	$editar -> idCotizacionDetalleTipoEstado = $_POST["idCotizacionDetalleTipoEstado"];
	$editar ->ajaxEditarCotizacionDetalleTipoEstado();
}



if(isset( $_POST["validarCotizacionDetalleTipoEstado"])){

	$valCotizacionDetalleTipoEstado = new AjaxCotizacionDetalleTipoEstado();
	$valCotizacionDetalleTipoEstado -> validarCotizacionDetalleTipoEstado = $_POST["validarCotizacionDetalleTipoEstado"];
	$valCotizacionDetalleTipoEstado ->ajaxValidarCotizacionDetalleTipoEstado();
	$valCotizacionDetalleTipoEstado ->ajaxValidarCotizacionDetalleTipoEstado();
}