-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2018 a las 03:01:02
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tciudad`
--

CREATE TABLE `tciudad` (
  `IDCIUDAD` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `IDDEPARTAMENTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tciudad`
--

INSERT INTO `tciudad` (`IDCIUDAD`, `NOMBRE`, `IDDEPARTAMENTO`) VALUES
(2, 'Cali', 3),
(3, 'Quito', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcotizacion`
--

CREATE TABLE `tcotizacion` (
  `IDCOTIZACION` int(11) NOT NULL,
  `FECHACREACION` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FECHAMODIFICACION` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `FECHAVENCIMIENTO` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `OBSERVACIONES` varchar(400) NOT NULL,
  `IDCOTIZACIONTIPOESTADO` int(11) NOT NULL,
  `IDPEDIDO` int(11) NOT NULL,
  `IDPROVEEDOR` int(11) NOT NULL,
  `IDUSUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcotizaciondetalle`
--

CREATE TABLE `tcotizaciondetalle` (
  `IDCOTIZACIONDETALLE` int(11) NOT NULL,
  `VALORUNITARIO` decimal(20,0) NOT NULL,
  `VALORCOTIZADO` decimal(20,0) NOT NULL,
  `CANTIDADORIGINAL` int(11) NOT NULL,
  `CANTIDADCOTIZADA` int(11) NOT NULL,
  `IDCOTIZACIONDETALLETIPOESTADO` int(11) NOT NULL,
  `IDCOTIZACION` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcotizaciondetalletipoestado`
--

CREATE TABLE `tcotizaciondetalletipoestado` (
  `IDCOTIZACIONDETALLETIPOESTADO` int(11) NOT NULL,
  `NOMBRE` varchar(10) NOT NULL,
  `DESCRIPCION` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcotizaciontipoestado`
--

CREATE TABLE `tcotizaciontipoestado` (
  `IDCOTIZACIONTIPOESTADO` int(11) NOT NULL,
  `NOMBRE` varchar(10) NOT NULL,
  `DESCRIPCION` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdepartamento`
--

CREATE TABLE `tdepartamento` (
  `IDDEPARTAMENTO` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `IDPAIS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tdepartamento`
--

INSERT INTO `tdepartamento` (`IDDEPARTAMENTO`, `NOMBRE`, `IDPAIS`) VALUES
(3, 'Valle del Cauca', 3),
(4, 'Cundinamarca', 3),
(5, 'Provincia de Pichincha', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tempresa`
--

CREATE TABLE `tempresa` (
  `IDEMPRESA` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `TELEFONOPRINCIPAL` varchar(20) NOT NULL,
  `DIRECCION` varchar(200) NOT NULL,
  `NIT` varchar(30) NOT NULL,
  `ESTADO` int(1) NOT NULL DEFAULT '1',
  `IDCIUDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tempresa`
--

INSERT INTO `tempresa` (`IDEMPRESA`, `NOMBRE`, `TELEFONOPRINCIPAL`, `DIRECCION`, `NIT`, `ESTADO`, `IDCIUDAD`) VALUES
(3, 'Acot', '1234', 'Calle 62 # 1-120', '1234', 1, 2),
(4, 'Acot2', '2345', 'Calle 62 # 1-120', '123', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tempresacontactos`
--

CREATE TABLE `tempresacontactos` (
  `IDEMPRESACONTACTOS` int(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `ESTADO` int(1) NOT NULL DEFAULT '1',
  `PRINCIPAL` int(1) NOT NULL DEFAULT '0',
  `NOMBRE` varchar(200) NOT NULL,
  `IDEMPRESA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tordenservicio`
--

CREATE TABLE `tordenservicio` (
  `IDORDENSERVICIO` int(11) NOT NULL,
  `FECHACREACION` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FECHAMODIFICACION` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `IDORDENSERVICIOTIPOESTADO` int(11) NOT NULL,
  `IDCOTIZACION` int(11) NOT NULL,
  `IDUSUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tordenserviciotipoestado`
--

CREATE TABLE `tordenserviciotipoestado` (
  `IDORDENSERVICIOTIPOESTADO` int(11) NOT NULL,
  `NOMBRE` varchar(10) NOT NULL,
  `DESCRIPCION` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpais`
--

CREATE TABLE `tpais` (
  `IDPAIS` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tpais`
--

INSERT INTO `tpais` (`IDPAIS`, `NOMBRE`) VALUES
(3, 'Colombia'),
(4, 'Ecuador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpedido`
--

CREATE TABLE `tpedido` (
  `IDPEDIDO` int(11) NOT NULL,
  `FECHACREACION` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FECHAMODIFICACION` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `FECHAENTREGA` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `OBSERVACIONES` varchar(400) NOT NULL,
  `IDPEDIDOTIPOESTADO` int(11) NOT NULL,
  `IDEMPRESA` int(11) NOT NULL,
  `IDUSUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpedidodetalle`
--

CREATE TABLE `tpedidodetalle` (
  `IDPEDIDODETALLE` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL,
  `IDPEDIDO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpedidotipoestado`
--

CREATE TABLE `tpedidotipoestado` (
  `IDPEDIDOTIPOESTADO` int(11) NOT NULL,
  `NOMBRE` varchar(10) NOT NULL,
  `DESCRIPCION` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tperfil`
--

CREATE TABLE `tperfil` (
  `IDPERFIL` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tperfil`
--

INSERT INTO `tperfil` (`IDPERFIL`, `NOMBRE`, `DESCRIPCION`) VALUES
(1, 'Administrador', 'Usuario administrador del sistema'),
(2, 'Proveedor', 'Usuario del tipo proveedor'),
(3, 'Cotizador', 'Usuario del tipo Cotizador'),
(4, 'Registro', 'Perfirl para los usuarios registrados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproducto`
--

CREATE TABLE `tproducto` (
  `IDPRODUCTO` int(11) NOT NULL,
  `NOMBRE` varchar(200) NOT NULL,
  `DESCRIPCION` varchar(400) NOT NULL,
  `ESTADO` int(1) NOT NULL DEFAULT '1',
  `IDTIPOPRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedor`
--

CREATE TABLE `tproveedor` (
  `IDPROVEEDOR` int(11) NOT NULL,
  `NIT` varchar(30) NOT NULL,
  `NOMBRE` varchar(200) NOT NULL,
  `DIRECCION` varchar(200) NOT NULL,
  `TELEFONO1` varchar(200) NOT NULL,
  `TELEFONO2` varchar(200) NOT NULL,
  `ESTADO` varchar(200) NOT NULL,
  `IDCIUDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedorcontactos`
--

CREATE TABLE `tproveedorcontactos` (
  `IDEMPRESACONTACTOS` int(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `ESTADO` int(1) NOT NULL DEFAULT '1',
  `PRINCIPAL` int(1) NOT NULL DEFAULT '0',
  `NOMBRE` varchar(200) NOT NULL,
  `IDPROVEEDOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedorproducto`
--

CREATE TABLE `tproveedorproducto` (
  `IDPROVEEDORPRODUCTO` int(11) NOT NULL,
  `IDPROVEEDOR` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL,
  `VALORUNITARIO` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedortipoproducto`
--

CREATE TABLE `tproveedortipoproducto` (
  `IDPROVEEDORTIPOPRODUCTO` int(11) NOT NULL,
  `IDPROVEEDOR` int(11) NOT NULL,
  `IDTIPOPRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipoproducto`
--

CREATE TABLE `ttipoproducto` (
  `IDTIPOPRODUCTO` int(11) NOT NULL,
  `NOMBRE` varchar(200) NOT NULL,
  `DESCRIPCION` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ttipoproducto`
--

INSERT INTO `ttipoproducto` (`IDTIPOPRODUCTO`, `NOMBRE`, `DESCRIPCION`) VALUES
(3, 'Medicina', 'Productos de medicina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `IDUSUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `APELLIDO` varchar(100) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `CLAVE` varchar(400) NOT NULL,
  `ESTADO` int(1) NOT NULL DEFAULT '1',
  `IDPERFIL` int(11) NOT NULL,
  `CODIGO` varchar(400) DEFAULT NULL COMMENT 'Codigo de verificaciòn cuando se requiere recuperar la contraseña',
  `FECHA_CREACION` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`IDUSUARIO`, `NOMBRE`, `APELLIDO`, `EMAIL`, `CLAVE`, `ESTADO`, `IDPERFIL`, `CODIGO`, `FECHA_CREACION`) VALUES
(1, 'Admin', 'Admin A', 'admin@acot.com', '$2a$07$asxx54ahjppf45sd87a5auE4pAhpsjQota15gZWwNyZjZgyb5OjdO', 1, 1, '$2a$07$asxx54ahjppf45sd87a5aulIifwlxNr2rf7GPlyJT9BbZhEfanf3S', '2018-05-20 15:59:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tciudad`
--
ALTER TABLE `tciudad`
  ADD PRIMARY KEY (`IDCIUDAD`),
  ADD UNIQUE KEY `UK_CIUDAD` (`NOMBRE`),
  ADD KEY `TCIUDAD_fk0` (`IDDEPARTAMENTO`);

--
-- Indices de la tabla `tcotizacion`
--
ALTER TABLE `tcotizacion`
  ADD PRIMARY KEY (`IDCOTIZACION`),
  ADD KEY `TCOTIZACION_fk0` (`IDCOTIZACIONTIPOESTADO`),
  ADD KEY `TCOTIZACION_fk1` (`IDPEDIDO`),
  ADD KEY `TCOTIZACION_fk2` (`IDPROVEEDOR`),
  ADD KEY `TCOTIZACION_fk3` (`IDUSUARIO`);

--
-- Indices de la tabla `tcotizaciondetalle`
--
ALTER TABLE `tcotizaciondetalle`
  ADD PRIMARY KEY (`IDCOTIZACIONDETALLE`),
  ADD KEY `TCOTIZACIONDETALLE_fk0` (`IDCOTIZACIONDETALLETIPOESTADO`),
  ADD KEY `TCOTIZACIONDETALLE_fk1` (`IDCOTIZACION`),
  ADD KEY `TCOTIZACIONDETALLE_fk2` (`IDPRODUCTO`);

--
-- Indices de la tabla `tcotizaciondetalletipoestado`
--
ALTER TABLE `tcotizaciondetalletipoestado`
  ADD PRIMARY KEY (`IDCOTIZACIONDETALLETIPOESTADO`);

--
-- Indices de la tabla `tcotizaciontipoestado`
--
ALTER TABLE `tcotizaciontipoestado`
  ADD PRIMARY KEY (`IDCOTIZACIONTIPOESTADO`);

--
-- Indices de la tabla `tdepartamento`
--
ALTER TABLE `tdepartamento`
  ADD PRIMARY KEY (`IDDEPARTAMENTO`),
  ADD KEY `TDEPARTAMENTO_fk0` (`IDPAIS`);

--
-- Indices de la tabla `tempresa`
--
ALTER TABLE `tempresa`
  ADD PRIMARY KEY (`IDEMPRESA`),
  ADD UNIQUE KEY `NIT` (`NIT`),
  ADD KEY `TEMPRESA_fk0` (`IDCIUDAD`);

--
-- Indices de la tabla `tempresacontactos`
--
ALTER TABLE `tempresacontactos`
  ADD PRIMARY KEY (`IDEMPRESACONTACTOS`),
  ADD KEY `TEMPRESACONTACTOS_fk0` (`IDEMPRESA`);

--
-- Indices de la tabla `tordenservicio`
--
ALTER TABLE `tordenservicio`
  ADD PRIMARY KEY (`IDORDENSERVICIO`),
  ADD KEY `TORDENSERVICIO_fk0` (`IDORDENSERVICIOTIPOESTADO`),
  ADD KEY `TORDENSERVICIO_fk1` (`IDCOTIZACION`),
  ADD KEY `TORDENSERVICIO_fk2` (`IDUSUARIO`);

--
-- Indices de la tabla `tordenserviciotipoestado`
--
ALTER TABLE `tordenserviciotipoestado`
  ADD PRIMARY KEY (`IDORDENSERVICIOTIPOESTADO`);

--
-- Indices de la tabla `tpais`
--
ALTER TABLE `tpais`
  ADD PRIMARY KEY (`IDPAIS`),
  ADD UNIQUE KEY `NOMBRE` (`NOMBRE`);

--
-- Indices de la tabla `tpedido`
--
ALTER TABLE `tpedido`
  ADD PRIMARY KEY (`IDPEDIDO`),
  ADD KEY `TPEDIDO_fk0` (`IDPEDIDOTIPOESTADO`),
  ADD KEY `TPEDIDO_fk1` (`IDEMPRESA`),
  ADD KEY `TPEDIDO_fk2` (`IDUSUARIO`);

--
-- Indices de la tabla `tpedidodetalle`
--
ALTER TABLE `tpedidodetalle`
  ADD PRIMARY KEY (`IDPEDIDODETALLE`),
  ADD KEY `TPEDIDODETALLE_fk0` (`IDPRODUCTO`),
  ADD KEY `TPEDIDODETALLE_fk1` (`IDPEDIDO`);

--
-- Indices de la tabla `tpedidotipoestado`
--
ALTER TABLE `tpedidotipoestado`
  ADD PRIMARY KEY (`IDPEDIDOTIPOESTADO`);

--
-- Indices de la tabla `tperfil`
--
ALTER TABLE `tperfil`
  ADD PRIMARY KEY (`IDPERFIL`);

--
-- Indices de la tabla `tproducto`
--
ALTER TABLE `tproducto`
  ADD PRIMARY KEY (`IDPRODUCTO`),
  ADD UNIQUE KEY `NOMBRE` (`NOMBRE`),
  ADD KEY `TPRODUCTO_fk0` (`IDTIPOPRODUCTO`);

--
-- Indices de la tabla `tproveedor`
--
ALTER TABLE `tproveedor`
  ADD PRIMARY KEY (`IDPROVEEDOR`),
  ADD KEY `TPROVEEDOR_fk0` (`IDCIUDAD`);

--
-- Indices de la tabla `tproveedorcontactos`
--
ALTER TABLE `tproveedorcontactos`
  ADD PRIMARY KEY (`IDEMPRESACONTACTOS`),
  ADD KEY `TPROVEEDORCONTACTOS_fk0` (`IDPROVEEDOR`);

--
-- Indices de la tabla `tproveedorproducto`
--
ALTER TABLE `tproveedorproducto`
  ADD PRIMARY KEY (`IDPROVEEDORPRODUCTO`),
  ADD KEY `TPROVEEDORPRODUCTO_fk0` (`IDPROVEEDOR`),
  ADD KEY `TPROVEEDORPRODUCTO_fk1` (`IDPRODUCTO`);

--
-- Indices de la tabla `tproveedortipoproducto`
--
ALTER TABLE `tproveedortipoproducto`
  ADD PRIMARY KEY (`IDPROVEEDORTIPOPRODUCTO`),
  ADD KEY `TPROVEEDORTIPOPRODUCTO_fk0` (`IDPROVEEDOR`),
  ADD KEY `TPROVEEDORTIPOPRODUCTO_fk1` (`IDTIPOPRODUCTO`);

--
-- Indices de la tabla `ttipoproducto`
--
ALTER TABLE `ttipoproducto`
  ADD PRIMARY KEY (`IDTIPOPRODUCTO`),
  ADD UNIQUE KEY `NOMBRE` (`NOMBRE`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`IDUSUARIO`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD KEY `TUSUARIO_fk0` (`IDPERFIL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tciudad`
--
ALTER TABLE `tciudad`
  MODIFY `IDCIUDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tcotizacion`
--
ALTER TABLE `tcotizacion`
  MODIFY `IDCOTIZACION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tcotizaciondetalle`
--
ALTER TABLE `tcotizaciondetalle`
  MODIFY `IDCOTIZACIONDETALLE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tcotizaciondetalletipoestado`
--
ALTER TABLE `tcotizaciondetalletipoestado`
  MODIFY `IDCOTIZACIONDETALLETIPOESTADO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tcotizaciontipoestado`
--
ALTER TABLE `tcotizaciontipoestado`
  MODIFY `IDCOTIZACIONTIPOESTADO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tdepartamento`
--
ALTER TABLE `tdepartamento`
  MODIFY `IDDEPARTAMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tempresa`
--
ALTER TABLE `tempresa`
  MODIFY `IDEMPRESA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tempresacontactos`
--
ALTER TABLE `tempresacontactos`
  MODIFY `IDEMPRESACONTACTOS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tordenservicio`
--
ALTER TABLE `tordenservicio`
  MODIFY `IDORDENSERVICIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tordenserviciotipoestado`
--
ALTER TABLE `tordenserviciotipoestado`
  MODIFY `IDORDENSERVICIOTIPOESTADO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tpais`
--
ALTER TABLE `tpais`
  MODIFY `IDPAIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tpedido`
--
ALTER TABLE `tpedido`
  MODIFY `IDPEDIDO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tpedidodetalle`
--
ALTER TABLE `tpedidodetalle`
  MODIFY `IDPEDIDODETALLE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tpedidotipoestado`
--
ALTER TABLE `tpedidotipoestado`
  MODIFY `IDPEDIDOTIPOESTADO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tperfil`
--
ALTER TABLE `tperfil`
  MODIFY `IDPERFIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tproducto`
--
ALTER TABLE `tproducto`
  MODIFY `IDPRODUCTO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tproveedor`
--
ALTER TABLE `tproveedor`
  MODIFY `IDPROVEEDOR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tproveedorcontactos`
--
ALTER TABLE `tproveedorcontactos`
  MODIFY `IDEMPRESACONTACTOS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tproveedorproducto`
--
ALTER TABLE `tproveedorproducto`
  MODIFY `IDPROVEEDORPRODUCTO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tproveedortipoproducto`
--
ALTER TABLE `tproveedortipoproducto`
  MODIFY `IDPROVEEDORTIPOPRODUCTO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ttipoproducto`
--
ALTER TABLE `ttipoproducto`
  MODIFY `IDTIPOPRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tciudad`
--
ALTER TABLE `tciudad`
  ADD CONSTRAINT `TCIUDAD_fk0` FOREIGN KEY (`IDDEPARTAMENTO`) REFERENCES `tdepartamento` (`IDDEPARTAMENTO`);

--
-- Filtros para la tabla `tcotizacion`
--
ALTER TABLE `tcotizacion`
  ADD CONSTRAINT `TCOTIZACION_fk0` FOREIGN KEY (`IDCOTIZACIONTIPOESTADO`) REFERENCES `tcotizaciontipoestado` (`IDCOTIZACIONTIPOESTADO`),
  ADD CONSTRAINT `TCOTIZACION_fk1` FOREIGN KEY (`IDPEDIDO`) REFERENCES `tpedido` (`IDPEDIDO`),
  ADD CONSTRAINT `TCOTIZACION_fk2` FOREIGN KEY (`IDPROVEEDOR`) REFERENCES `tproveedor` (`IDPROVEEDOR`),
  ADD CONSTRAINT `TCOTIZACION_fk3` FOREIGN KEY (`IDUSUARIO`) REFERENCES `tusuario` (`IDUSUARIO`);

--
-- Filtros para la tabla `tcotizaciondetalle`
--
ALTER TABLE `tcotizaciondetalle`
  ADD CONSTRAINT `TCOTIZACIONDETALLE_fk0` FOREIGN KEY (`IDCOTIZACIONDETALLETIPOESTADO`) REFERENCES `tcotizaciondetalletipoestado` (`IDCOTIZACIONDETALLETIPOESTADO`),
  ADD CONSTRAINT `TCOTIZACIONDETALLE_fk1` FOREIGN KEY (`IDCOTIZACION`) REFERENCES `tcotizacion` (`IDCOTIZACION`),
  ADD CONSTRAINT `TCOTIZACIONDETALLE_fk2` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `tproducto` (`IDPRODUCTO`);

--
-- Filtros para la tabla `tdepartamento`
--
ALTER TABLE `tdepartamento`
  ADD CONSTRAINT `TDEPARTAMENTO_fk0` FOREIGN KEY (`IDPAIS`) REFERENCES `tpais` (`IDPAIS`);

--
-- Filtros para la tabla `tempresa`
--
ALTER TABLE `tempresa`
  ADD CONSTRAINT `TEMPRESA_fk0` FOREIGN KEY (`IDCIUDAD`) REFERENCES `tciudad` (`IDCIUDAD`);

--
-- Filtros para la tabla `tempresacontactos`
--
ALTER TABLE `tempresacontactos`
  ADD CONSTRAINT `TEMPRESACONTACTOS_fk0` FOREIGN KEY (`IDEMPRESA`) REFERENCES `tempresa` (`IDEMPRESA`);

--
-- Filtros para la tabla `tordenservicio`
--
ALTER TABLE `tordenservicio`
  ADD CONSTRAINT `TORDENSERVICIO_fk0` FOREIGN KEY (`IDORDENSERVICIOTIPOESTADO`) REFERENCES `tordenserviciotipoestado` (`IDORDENSERVICIOTIPOESTADO`),
  ADD CONSTRAINT `TORDENSERVICIO_fk1` FOREIGN KEY (`IDCOTIZACION`) REFERENCES `tcotizacion` (`IDCOTIZACION`),
  ADD CONSTRAINT `TORDENSERVICIO_fk2` FOREIGN KEY (`IDUSUARIO`) REFERENCES `tusuario` (`IDUSUARIO`);

--
-- Filtros para la tabla `tpedido`
--
ALTER TABLE `tpedido`
  ADD CONSTRAINT `TPEDIDO_fk0` FOREIGN KEY (`IDPEDIDOTIPOESTADO`) REFERENCES `tpedidotipoestado` (`IDPEDIDOTIPOESTADO`),
  ADD CONSTRAINT `TPEDIDO_fk1` FOREIGN KEY (`IDEMPRESA`) REFERENCES `tempresa` (`IDEMPRESA`),
  ADD CONSTRAINT `TPEDIDO_fk2` FOREIGN KEY (`IDUSUARIO`) REFERENCES `tusuario` (`IDUSUARIO`);

--
-- Filtros para la tabla `tpedidodetalle`
--
ALTER TABLE `tpedidodetalle`
  ADD CONSTRAINT `TPEDIDODETALLE_fk0` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `tproducto` (`IDPRODUCTO`),
  ADD CONSTRAINT `TPEDIDODETALLE_fk1` FOREIGN KEY (`IDPEDIDO`) REFERENCES `tpedido` (`IDPEDIDO`);

--
-- Filtros para la tabla `tproducto`
--
ALTER TABLE `tproducto`
  ADD CONSTRAINT `TPRODUCTO_fk0` FOREIGN KEY (`IDTIPOPRODUCTO`) REFERENCES `ttipoproducto` (`IDTIPOPRODUCTO`);

--
-- Filtros para la tabla `tproveedor`
--
ALTER TABLE `tproveedor`
  ADD CONSTRAINT `TPROVEEDOR_fk0` FOREIGN KEY (`IDCIUDAD`) REFERENCES `tciudad` (`IDCIUDAD`);

--
-- Filtros para la tabla `tproveedorcontactos`
--
ALTER TABLE `tproveedorcontactos`
  ADD CONSTRAINT `TPROVEEDORCONTACTOS_fk0` FOREIGN KEY (`IDPROVEEDOR`) REFERENCES `tproveedor` (`IDPROVEEDOR`);

--
-- Filtros para la tabla `tproveedorproducto`
--
ALTER TABLE `tproveedorproducto`
  ADD CONSTRAINT `TPROVEEDORPRODUCTO_fk0` FOREIGN KEY (`IDPROVEEDOR`) REFERENCES `tproveedor` (`IDPROVEEDOR`),
  ADD CONSTRAINT `TPROVEEDORPRODUCTO_fk1` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `tproducto` (`IDPRODUCTO`);

--
-- Filtros para la tabla `tproveedortipoproducto`
--
ALTER TABLE `tproveedortipoproducto`
  ADD CONSTRAINT `TPROVEEDORTIPOPRODUCTO_fk0` FOREIGN KEY (`IDPROVEEDOR`) REFERENCES `tproveedor` (`IDPROVEEDOR`),
  ADD CONSTRAINT `TPROVEEDORTIPOPRODUCTO_fk1` FOREIGN KEY (`IDTIPOPRODUCTO`) REFERENCES `ttipoproducto` (`IDTIPOPRODUCTO`);

--
-- Filtros para la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `TUSUARIO_fk0` FOREIGN KEY (`IDPERFIL`) REFERENCES `tperfil` (`IDPERFIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
