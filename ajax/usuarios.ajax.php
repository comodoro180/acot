<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarUsuario(){

		$campo = "IDUSUARIO";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($campo, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarUsuario;
	public $activarId;

	public function ajaxActivarUsuario(){

		$tabla = "tusuario";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "idusuario";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR EMAIL
	=============================================*/	
	public $validarEmail;

	public function ajaxValidarEmail(){

		$item = "email";
		$valor = $this->validarEmail;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idusuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idusuario"];
	$editar -> ajaxEditarUsuario();
}

/*=============================================
ACTIVAR USUARIO
=============================================*/	
if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();
}

/*=============================================
VALIDAR NO REPETIR EMAIL
=============================================*/
if(isset( $_POST["validarEmail"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarEmail = $_POST["validarEmail"];
	$valUsuario -> ajaxValidarEmail();
}