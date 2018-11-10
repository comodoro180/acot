<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/paises.controlador.php";
require_once "controladores/departamentos.controlador.php";
require_once "controladores/ciudades.controlador.php";
require_once "controladores/tipoProducto.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/empresas.controlador.php";
require_once "controladores/roles.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/contactosEmpresa.controlador.php";
require_once "controladores/pedidoTipoEstado.controlador.php";

require_once "modelos/productos.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/paises.modelo.php";
require_once "modelos/departamentos.modelo.php";
require_once "modelos/ciudades.modelo.php";
require_once "modelos/tipoProducto.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/empresas.modelo.php";
require_once "modelos/roles.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/contactosEmpresa.modelo.php";
require_once "modelos/pedidoTipoEstado.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla ->ctrPlantilla();

