<?php

require_once "../controladores/ordenServicio.controlador.php";
require_once "../modelos/ordenServicio.modelo.php";

class AjaxOrdenServicio{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idOrdenServicio;

	public function ajaxEditarOrdenServicio(){

		$campo = "IDORDENSERVICIO";
		$valor = $this->idOrdenServicio;

		$respuesta = ControladorOrdenServicio::ctrMostrarOrdenServicio($campo, $valor);

		echo json_encode($respuesta);
	}
        
}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idOrdenServicio"])){

	$editar = new AjaxOrdenServicio();
	$editar -> idOrdenServicio = $_POST["idOrdenServicio"];
	$editar ->ajaxEditarOrdenServicio();
}