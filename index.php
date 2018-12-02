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
require_once "controladores/contactosProveedor.controlador.php";
require_once "controladores/proveedorProducto.controlador.php";
require_once "controladores/cotizacionTipoEstado.controlador.php";
require_once "controladores/proveedorTipoProducto.controlador.php";
require_once "controladores/cotizacionDetalleTipoEstado.controlador.php";
require_once "controladores/pedido.controlador.php";
require_once "controladores/pedidoDetalle.controlador.php";
require_once "controladores/cotizacion.controlador.php";
require_once "controladores/cotizacionDetalle.controlador.php";


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
require_once "modelos/pedidoTipoEstado.modelo.php";
require_once "modelos/contactosEmpresa.modelo.php";
require_once "modelos/contactosProveedor.modelo.php";
require_once "modelos/proveedorProducto.modelo.php";
require_once "modelos/contactosProveedor.modelo.php";
require_once "modelos/cotizacionTipoEstado.modelo.php";
require_once "modelos/proveedorTipoProducto.modelo.php";
require_once "modelos/cotizacionDetalleTipoEstado.modelo.php";
require_once "modelos/pedido.modelo.php";
require_once "modelos/pedidoDetalle.modelo.php";
require_once "modelos/cotizacion.modelo.php";
require_once "modelos/cotizacionDetalle.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla ->ctrPlantilla();

