<?php

require_once "../controladores/contactosProveedor.controlador.php";
require_once "../modelos/contactosProveedor.modelo.php";

class AjaxContactosProveedor{

	/*=============================================
	EDITAR
	=============================================*/	

	public $idEmpresaContactos;

	public function ajaxEditarContactoProveedor(){

		$campo = "IDEMPRESACONTACTOS";
		$valor = $this->idEmpresaContactos;

		$respuesta = ControladorContactosProveedor::ctrMostrarContactosProveedor($campo, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	ACTIVAR
	=============================================*/	

	public $activarContactoProveedor;
	public $activarIdContactoProveedor;
        
        public function ajaxActivarContactoProveedor(){

		$tabla = "tproveedorcontactos";

		$item1 = "estado";
		$valor1 = $this->activarContactoProveedor;

		$item2 = "idEmpresaContactos";
		$valor2 = $this->activarIdContactoProveedor;

		$respuesta = ModeloContactosProveedor::mdlActualizarContactoProveedor($tabla, $item1, $valor1, $item2, $valor2);
                
                

	}
        
        /*=============================================
	ACTIVAR PRINCIPAL
	=============================================*/
        
        public $principal;
	public $idPrincipalContactoProveedor;
        
        public function ajaxPrincipalContactoProveedor(){

		$tabla = "tproveedorcontactos";

		$item1 = "principal";
		$valor1 = $this->principal;

		$item2 = "idEmpresaContactos";
		$valor2 = $this->idPrincipalContactoProveedor;

		$respuesta = ModeloContactosProveedor::mdlActualizarContactoProveedor($tabla, $item1, $valor1, $item2, $valor2);
                
	}
        
        /*=============================================
	VALIDAR NO REPETIR EMAIL
	=============================================*/	
	public $validarEmail;

	public function ajaxValidarEmail(){

		$item = "email";
		$valor = $this->validarEmail;

		$respuesta = ControladorContactosProveedor::ctrMostrarContactosProveedor($item, $valor);

		echo json_encode($respuesta);
	}
        
        /*=============================================
	VALIDAR NO REPETIR EMAIL COMO EMPRESA
	=============================================*/	
	public $validarEmailCE;

	public function ajaxValidarEmailCE(){

		$item = "email";
		$valor = $this->validarEmailCE;

		$respuesta = ControladorContactosEmpresa::ctrMostrarContactosEmpresa($item, $valor);

		echo json_encode($respuesta);
	}
        

}

/*=============================================
EDITAR
=============================================*/
if(isset($_POST["idEmpresaContactos"])){

	$editar = new AjaxContactosProveedor();
	$editar -> idEmpresaContactos = $_POST["idEmpresaContactos"];
	$editar ->ajaxEditarContactoProveedor();
}

/*=============================================
ACTIVAR
=============================================*/	
if(isset($_POST["activarContactoProveedor"])){

	$activarContactoProveedor = new AjaxContactosProveedor();
	$activarContactoProveedor -> activarContactoProveedor = $_POST["activarContactoProveedor"];
	$activarContactoProveedor-> activarIdContactoProveedor = $_POST["activarIdContactoProveedor"];
	$activarContactoProveedor ->ajaxActivarContactoProveedor();
}

/*=============================================
ACTIVAR PRINCIPAL
=============================================*/	
if(isset($_POST["principal"])){

	$principal = new AjaxContactosProveedor();
	$principal -> principal = $_POST["principal"];
	$principal -> idPrincipalContactoProveedor = $_POST["idPrincipalContactoProveedor"];
	$principal ->ajaxPrincipalContactoProveedor();
}

/*=============================================
VALIDAR NO REPETIR EMAIL
=============================================*/
if(isset( $_POST["validarEmail"])){

	$valContactosProveedor = new AjaxContactosProveedor();
	$valContactosProveedor -> validarEmail = $_POST["validarEmail"];
	$valContactosProveedor ->ajaxValidarEmail();
}
/*=============================================
VALIDAR NO REPETIR EMAIL CON EMPRESA
=============================================*/
if(isset( $_POST["validarEmailCE"])){

	$valContactosProveedor = new AjaxContactosProveedor();
	$valContactosProveedor -> validarEmailCE = $_POST["validarEmailCE"];
	$valContactosProveedor ->ajaxValidarEmailCE();
}
