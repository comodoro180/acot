<?php

require_once "../controladores/contactosEmpresa.controlador.php";
require_once "../modelos/contactosEmpresa.modelo.php";

class AjaxContactosEmpresa{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idEmpresaContactos;

	public function ajaxEditarContactoEmpresa(){

		$campo = "IDEMPRESACONTACTOS";
		$valor = $this->idEmpresaContactos;

		$respuesta = ControladorContactosEmpresa::ctrMostrarContactosEmpresa($campo, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	ACTIVAR
	=============================================*/	

	public $activarContactoEmpresa;
	public $activarIdContactoEmpresa;

	public function ajaxActivarContactoEmpresa(){

		$tabla = "tempresacontactos";

		$item1 = "estado";
		$valor1 = $this->activarContactoEmpresa;

		$item2 = "idEmpresaContactos";
		$valor2 = $this->activarIdContactoEmpresa;

		$respuesta = ModeloContactosEmpresa::mdlActualizarContactoEmpresa($tabla, $item1, $valor1, $item2, $valor2);

	}
        
        /*=============================================
	BOTÓN PRINCIPAL
	=============================================*/	

	public $principal;
	public $idPrincipalContactoEmpresa;

	public function ajaxPrincipalContactoEmpresa(){

		$tabla = "tempresacontactos";

		$item1 = "principal";
		$valor1 = $this->principal;

		$item2 = "idEmpresaContactos";
		$valor2 = $this->idPrincipalContactoEmpresa;

		$respuesta = ModeloContactosEmpresa::mdlActualizarContactoEmpresa($tabla, $item1, $valor1, $item2, $valor2);

	}
        
        /*=============================================
	VALIDAR NO REPETIR CONTACTO EMPRESA
	=============================================*/	
	public $validarContactoEmpresa;

	public function ajaxValidarCE(){

		$item = "nombre";
		$valor = $this->validarContactoEmpresa;

		$respuesta = ControladorContactosEmpresa::ctrMostrarContactosEmpresa($item, $valor);

		echo json_encode($respuesta);
	}
        
        /*=============================================
	VALIDAR NO REPETIR EMAIL
	=============================================*/	
	public $validarEmail;

	public function ajaxValidarEmail(){

		$item = "email";
		$valor = $this->validarEmail;

		$respuesta = ControladorContactosEmpresa::ctrMostrarContactosEmpresa($item, $valor);

		echo json_encode($respuesta);
	}
        
        /*=============================================
	VALIDAR NO REPETIR EMAIL COMO PROVEEDOR
	=============================================*/	
	public $validarEmailCP;

	public function ajaxValidarEmailCP(){

		$item = "email";
		$valor = $this->validarEmailCP;

		$respuesta = ControladorContactosProveedor::ctrMostrarContactosProveedor($item, $valor);

		echo json_encode($respuesta);
	}
        /*=============================================
	VALIDAR NO REPETIR EMAIL COMO PROVEEDOR AL EDITAR
	=============================================*/	
	public $validarEmailCE;

	public function ajaxValidarEmailCPEditar(){

		$item = "email";
		$valor = $this->validarEmailCE;

		$respuesta = ControladorContactosProveedor::ctrMostrarContactosProveedor($item, $valor);

		echo json_encode($respuesta);
	}
}
/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idEmpresaContactos"])){

	$editar = new AjaxContactosEmpresa();
	$editar -> idEmpresaContactos = $_POST["idEmpresaContactos"];
	$editar ->ajaxEditarContactoEmpresa();
}

/*=============================================
ACTIVAR
=============================================*/	
if(isset($_POST["activarContactoEmpresa"])){

	$activarContactoEmpresa = new AjaxContactosEmpresa();
	$activarContactoEmpresa -> activarContactoEmpresa = $_POST["activarContactoEmpresa"];
	$activarContactoEmpresa -> activarIdContactoEmpresa = $_POST["activarIdContactoEmpresa"];
	$activarContactoEmpresa ->ajaxActivarContactoEmpresa();
}

/*=============================================
ACTIVAR PRINCIPAL
=============================================*/	
if(isset($_POST["principal"])){

	$principal = new AjaxContactosEmpresa();
	$principal -> principal = $_POST["principal"];
	$principal -> idPrincipalContactoEmpresa = $_POST["idPrincipalContactoEmpresa"];
	$principal ->ajaxPrincipalContactoEmpresa();
}

/*=============================================
VALIDAR NO REPETIR EMAIL
=============================================*/
if(isset( $_POST["validarEmail"])){

	$valContactosEmpresa = new AjaxContactosEmpresa();
	$valContactosEmpresa -> validarEmail = $_POST["validarEmail"];
	$valContactosEmpresa ->ajaxValidarEmail();
}

/*=============================================
VALIDAR NO REPETIR EMAIL CON PROVEEDOR
=============================================*/
if(isset( $_POST["validarEmailCP"])){

	$valContactosEmpresa = new AjaxContactosEmpresa();
	$valContactosEmpresa -> validarEmailCP = $_POST["validarEmailCP"];
	$valContactosEmpresa ->ajaxValidarEmailCP();
}
/*=============================================
VALIDAR NO REPETIR EMAIL CON PROVEEDOR AL EDITAR
=============================================*/
if(isset( $_POST["validarEmailCE"])){

	$valContactosEmpresa = new AjaxContactosEmpresa();
	$valContactosEmpresa -> validarEmailCE = $_POST["validarEmailCE"];
	$valContactosEmpresa ->ajaxValidarEmailCPEditar();
}