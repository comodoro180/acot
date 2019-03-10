<?php

require_once "../controladores/cotizacion.controlador.php";
require_once "../modelos/cotizacion.modelo.php";

class AjaxCotizaciones{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idCotizacion;

	public function ajaxEditarCotizacion(){

		$campo = "IDCOTIZACION";
		$valor = $this->idCotizacion;

		$respuesta = ControladorCotizacion::ctrMostrarCotizaciones($campo, $valor);

		echo json_encode($respuesta);
	}
        
}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idCotizacion"])){

	$editar = new AjaxCotizaciones();
	$editar -> idCotizacion = $_POST["idCotizacion"];
	$editar ->ajaxEditarCotizacion();
}