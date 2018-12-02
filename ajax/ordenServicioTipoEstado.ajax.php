<?php

require_once "../controladores/ordenServicioTipoEstado.controlador.php";
require_once "../modelos/ordenServicioTipoEstado.modelo.php";

class AjaxOrdenServicioTipoEstado{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idOrdenServicioTipoEstado;

	public function ajaxEditarOrdenServicioTipoEstado(){

		$campo = "IDORDENSERVICIOTIPOESTADO";
		$valor = $this->idOrdenServicioTipoEstado;

		$respuesta = ControladorOrdenServicioTipoEstado::ctrMostrarOrdenServicioTipoEstado($campo, $valor);

		echo json_encode($respuesta);
	}

}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idOrdenServicioTipoEstado"])){

	$editar = new AjaxOrdenServicioTipoEstado();
	$editar -> idOrdenServicioTipoEstado = $_POST["idOrdenServicioTipoEstado"];
	$editar ->ajaxEditarOrdenServicioTipoEstado();
}
