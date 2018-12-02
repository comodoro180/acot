<?php

require_once "../controladores/cotizacionDetalle.controlador.php";
require_once "../modelos/cotizacionDetalle.modelo.php";

class AjaxCotizacionDetalles{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idCotizacionDetalle;

	public function ajaxEditarCotizacionDetalle(){

		$campo = "IDCOTIZACIONDETALLE";
		$valor = $this->idCotizacionDetalle;

		$respuesta = ControladorCotizacionDetalles::ctrMostrarCotizacionDetalles($campo, $valor);

		echo json_encode($respuesta);
	}
        
}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idCotizacionDetalle"])){

	$editar = new AjaxCotizacionDetalles();
	$editar -> idCotizacionDetalle = $_POST["idCotizacionDetalle"];
	$editar ->ajaxEditarCotizacionDetalle();
}