-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-11-2022 a las 03:00:13
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `epsilon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion`
--

CREATE TABLE `accion` (
  `componente` varchar(40) NOT NULL,
  `accion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `accion`
--

INSERT INTO `accion` (`componente`, `accion`) VALUES
('acl', 'create'),
('acl', 'delete'),
('acl', 'edit'),
('acl', 'index'),
('acl', 'new'),
('acl', 'populateAcl'),
('acl', 'save'),
('acl', 'saveAccessControl'),
('acl', 'search'),
('acl', 'setAccessControl'),
('asociado', 'index'),
('errors', 'show401'),
('errors', 'show404'),
('index', 'auth'),
('index', 'confirm'),
('index', 'confirmAuth'),
('index', 'index'),
('index', 'logout'),
('index', 'signin'),
('index', 'signup'),
('index', 'updatePassword'),
('roles', 'create'),
('roles', 'delete'),
('roles', 'edit'),
('roles', 'index'),
('roles', 'store'),
('roles', 'update'),
('usuario', 'create'),
('usuario', 'delete'),
('usuario', 'edit'),
('usuario', 'index'),
('usuario', 'update');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acl`
--

CREATE TABLE `acl` (
  `IDROL` varchar(20) NOT NULL,
  `accion` varchar(40) NOT NULL,
  `componente` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acl`
--

INSERT INTO `acl` (`IDROL`, `accion`, `componente`) VALUES
('Administrador', 'auth', 'index'),
('Administrador', 'confirm', 'index'),
('Administrador', 'confirmAuth', 'index'),
('Administrador', 'create', 'acl'),
('Administrador', 'create', 'roles'),
('Administrador', 'create', 'usuario'),
('Administrador', 'delete', 'acl'),
('Administrador', 'delete', 'roles'),
('Administrador', 'delete', 'usuario'),
('Administrador', 'edit', 'acl'),
('Administrador', 'edit', 'roles'),
('Administrador', 'edit', 'usuario'),
('Administrador', 'index', 'acl'),
('Administrador', 'index', 'asociado'),
('Administrador', 'index', 'index'),
('Administrador', 'index', 'roles'),
('Administrador', 'index', 'usuario'),
('Administrador', 'logout', 'index'),
('Administrador', 'new', 'acl'),
('Administrador', 'populateAcl', 'acl'),
('Administrador', 'save', 'acl'),
('Administrador', 'saveAccessControl', 'acl'),
('Administrador', 'search', 'acl'),
('Administrador', 'setAccessControl', 'acl'),
('Administrador', 'show401', 'errors'),
('Administrador', 'show404', 'errors'),
('Administrador', 'signin', 'index'),
('Administrador', 'signup', 'index'),
('Administrador', 'store', 'roles'),
('Administrador', 'update', 'roles'),
('Administrador', 'update', 'usuario'),
('Administrador', 'updatePassword', 'index'),
('Asociado', 'index', 'asociado'),
('Asociado', 'show401', 'errors'),
('Asociado', 'show404', 'errors'),
('Cajero', 'show401', 'errors'),
('Cajero', 'show404', 'errors'),
('Ejecutivo', 'show401', 'errors'),
('Ejecutivo', 'show404', 'errors'),
('Jefe de operaciones', 'show401', 'errors'),
('Jefe de operaciones', 'show404', 'errors'),
('Solicitante', 'auth', 'index'),
('Solicitante', 'confirm', 'index'),
('Solicitante', 'confirmAuth', 'index'),
('Solicitante', 'index', 'index'),
('Solicitante', 'logout', 'index'),
('Solicitante', 'show401', 'errors'),
('Solicitante', 'show404', 'errors'),
('Solicitante', 'signin', 'index'),
('Solicitante', 'signup', 'index'),
('Solicitante', 'updatePassword', 'index');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociaciones`
--

CREATE TABLE `asociaciones` (
  `IDASOCIACION` bigint(20) NOT NULL,
  `NOMBREASOCIACION` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociado`
--

CREATE TABLE `asociado` (
  `IDASOCIADO` bigint(20) NOT NULL,
  `IDGENERO` bigint(20) DEFAULT NULL,
  `IDREGION` bigint(20) DEFAULT NULL,
  `IDSUBREGION` bigint(20) DEFAULT NULL,
  `IDPAIS` bigint(20) DEFAULT NULL,
  `IDPROFESION` bigint(20) DEFAULT NULL,
  `IDESTCIVIL` bigint(20) DEFAULT NULL,
  `IDUSUARIO` bigint(20) DEFAULT NULL,
  `NOMBREASOCIADO` varchar(100) NOT NULL,
  `APELLIDO` varchar(100) NOT NULL,
  `APELLIDOCONYUGUE` varchar(100) DEFAULT NULL,
  `FECHANACIMIENTO` date NOT NULL,
  `EXTRANJEROASOC` tinyint(1) NOT NULL,
  `TELEFONO` varchar(10) NOT NULL,
  `BARRIOCOLRES` varchar(100) NOT NULL,
  `CALLEPASAJ` varchar(100) NOT NULL,
  `NUMCASDEP` varchar(100) NOT NULL,
  `X` varchar(15) NOT NULL,
  `Y` varchar(15) NOT NULL,
  `CORREO` varchar(100) NOT NULL,
  `CAPACIDADPAGO` decimal(10,2) NOT NULL,
  `EMPRESARIO` tinyint(1) NOT NULL,
  `CARGO` varchar(50) DEFAULT NULL,
  `NOMBREEMPRESA` varchar(80) NOT NULL,
  `DEPARDESEMPENA` varchar(50) DEFAULT NULL,
  `DIRECCLABORAL` varchar(120) NOT NULL,
  `CAPAHORRO` decimal(10,2) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  `FORMAPAGO` varchar(25) DEFAULT NULL,
  `DIRECCIONPAGOS` varchar(150) DEFAULT NULL,
  `FECHAREVISION` date DEFAULT NULL,
  `FECHASOLICITUD` date DEFAULT NULL,
  `FECHAAPROBACION` date DEFAULT NULL,
  `CARNET` varchar(10) DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `NUMCTAAHORRO` varchar(50) DEFAULT NULL,
  `NUMCTAAPORTE` varchar(50) DEFAULT NULL,
  `FIRMADIGITAL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `IDBENEFICIARIO` bigint(20) NOT NULL,
  `IDASOCIADO` bigint(20) DEFAULT NULL,
  `IDPARENTESCO` bigint(20) DEFAULT NULL,
  `NOMBREBENEF` varchar(100) NOT NULL,
  `TELEFONOBENEF` varchar(10) NOT NULL,
  `CORREOBENEF` varchar(100) NOT NULL,
  `DIRECCIONBENEF` varchar(150) NOT NULL,
  `FECHANAC` date NOT NULL,
  `PORCENTAJE` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `componente` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`componente`) VALUES
('acl'),
('asociado'),
('errors'),
('index'),
('roles'),
('usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

CREATE TABLE `concepto` (
  `IDCONCEPTO` bigint(20) NOT NULL,
  `CONCEPTO` varchar(255) NOT NULL,
  `MONTO` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `IDPERMISO` bigint(20) NOT NULL,
  `IDROL` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conyugue`
--

CREATE TABLE `conyugue` (
  `IDCONYUGUE` bigint(20) NOT NULL,
  `IDASOCIADO` bigint(20) DEFAULT NULL,
  `NOMBRECONYUGUE` varchar(100) NOT NULL,
  `CORREOCONYUGUE` varchar(100) NOT NULL,
  `FECHANACCONYUGUE` date NOT NULL,
  `SITUACIONLABORALCONYUGUE` tinyint(1) NOT NULL,
  `PROFESIONCONYUGUE` varchar(80) DEFAULT NULL,
  `CARGOCONYUGUE` varchar(50) DEFAULT NULL,
  `EMPRESACONYUGUE` varchar(80) DEFAULT NULL,
  `AREATRABAJOCONYUGUE` varchar(80) DEFAULT NULL,
  `DIRECLABCONYUGUE` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepago`
--

CREATE TABLE `detallepago` (
  `IDCONCEPTO` bigint(20) NOT NULL,
  `IDPAGO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentoasociado`
--

CREATE TABLE `documentoasociado` (
  `IDASOCIADO` bigint(20) NOT NULL,
  `IDTIPODOCUMENTO` bigint(20) NOT NULL,
  `NUMERODOC` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentosanexos`
--

CREATE TABLE `documentosanexos` (
  `IDDOCANEXO` bigint(20) NOT NULL,
  `IDASOCIADO` bigint(20) DEFAULT NULL,
  `NOMBRE` varchar(150) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `RUTA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocivil`
--

CREATE TABLE `estadocivil` (
  `IDESTCIVIL` bigint(20) NOT NULL,
  `NOMBREESTCIVIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `IDGENERO` bigint(20) NOT NULL,
  `NOMBREGENERO` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `IDPAGO` bigint(20) NOT NULL,
  `IDASOCIADO` bigint(20) DEFAULT NULL,
  `FECHAPAGO` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `IDPAIS` bigint(20) NOT NULL,
  `NOMBREPAIS` varchar(50) NOT NULL,
  `ALPHA2` varchar(2) NOT NULL,
  `ALPHA3` varchar(3) NOT NULL,
  `NUMERICO` smallint(6) NOT NULL,
  `COI` varchar(3) NOT NULL,
  `CODTELEFONO` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrodoc`
--

CREATE TABLE `parametrodoc` (
  `IDPARAMETRO` bigint(20) NOT NULL,
  `NOMPARAMETRO` varchar(25) NOT NULL,
  `CONTENIDOPARAMETRO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco`
--

CREATE TABLE `parentesco` (
  `IDPARENTESCO` bigint(20) NOT NULL,
  `NOMBREPARENTESCO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `IDPERMISO` bigint(20) NOT NULL,
  `DESCPERMISO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece5`
--

CREATE TABLE `pertenece5` (
  `IDASOCIACION` bigint(20) NOT NULL,
  `IDASOCIADO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE `profesion` (
  `IDPROFESION` bigint(20) NOT NULL,
  `NOMBREPROFESION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refpersonales`
--

CREATE TABLE `refpersonales` (
  `IDREF` bigint(20) NOT NULL,
  `IDASOCIADO` bigint(20) DEFAULT NULL,
  `NOMBREREF` varchar(120) NOT NULL,
  `TELEFONOREF` varchar(10) NOT NULL,
  `CORREOREF` varchar(100) NOT NULL,
  `DIRECCIONREF` varchar(150) NOT NULL,
  `RELACIONASOC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `IDREGION` bigint(20) NOT NULL,
  `IDPAIS` bigint(20) DEFAULT NULL,
  `NOMBREREGION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IDROL` varchar(20) NOT NULL,
  `CREADO` varchar(20) NOT NULL,
  `ACTUALIZADO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IDROL`, `CREADO`, `ACTUALIZADO`) VALUES
('Administrador', '03/11/22 05:02:06', '03/11/22 05:02:06'),
('Asociado', '05/11/22 02:40:05', '05/11/22 02:40:05'),
('Cajero', '05/11/22 02:39:42', '05/11/22 02:39:42'),
('Ejecutivo', '05/11/22 02:39:48', '05/11/22 02:39:48'),
('Jefe de operaciones', '05/11/22 02:39:55', '05/11/22 02:39:55'),
('Solicitante', '03/11/22 05:02:06', '03/11/22 05:02:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subregion`
--

CREATE TABLE `subregion` (
  `IDSUBREGION` bigint(20) NOT NULL,
  `IDREGION` bigint(20) DEFAULT NULL,
  `NOMBRESUBREGION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `IDTIPODOCUMENTO` bigint(20) NOT NULL,
  `NOMBRETIPODOC` varchar(50) NOT NULL,
  `MASCARA` varchar(50) NOT NULL,
  `EXTRANJEROTIPODOC` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUSUARIO` bigint(20) NOT NULL,
  `IDROL` varchar(20) DEFAULT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `NOMBREUSUARIO` varchar(50) NOT NULL,
  `APELLIDOUSUARIO` varchar(50) NOT NULL,
  `CORREOUSUARIO` varchar(100) NOT NULL,
  `FECHANACIMIENTO` varchar(20) NOT NULL,
  `CONTRAUSUARIO` varchar(255) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `ACTIVO` tinyint(1) NOT NULL DEFAULT 1,
  `PRIMERSIGNIN` tinyint(1) NOT NULL,
  `SECRETO` varchar(100) DEFAULT NULL,
  `CREADO` varchar(20) NOT NULL,
  `ACTUALIZADO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUSUARIO`, `IDROL`, `USERNAME`, `NOMBREUSUARIO`, `APELLIDOUSUARIO`, `CORREOUSUARIO`, `FECHANACIMIENTO`, `CONTRAUSUARIO`, `TELEFONO`, `ACTIVO`, `PRIMERSIGNIN`, `SECRETO`, `CREADO`, `ACTUALIZADO`) VALUES
(38, 'Administrador', 'GM00001', 'Gonzalo', 'Mejai', 'newgonzza@gmail.com', '1999-03-03', '25f9e794323b453885f5181f1b624d0b', 2312312, 1, 0, 'E5AX26XMYZT2XD6V', '04/11/22 02:06:31', '04/11/22 02:08:37'),
(39, 'Solicitante', 'JO00001', 'Javier', 'Ortiz', 'newgonzza@gmail.com', '1999-11-12', '25f9e794323b453885f5181f1b624d0b', 79460607, 1, 0, 'QM5A5MJLEDERDSMD', '05/11/22 12:30:27', '05/11/22 12:31:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accion`
--
ALTER TABLE `accion`
  ADD PRIMARY KEY (`componente`,`accion`);

--
-- Indices de la tabla `acl`
--
ALTER TABLE `acl`
  ADD PRIMARY KEY (`IDROL`,`accion`,`componente`),
  ADD KEY `componente` (`componente`),
  ADD KEY `accion` (`accion`) USING BTREE;

--
-- Indices de la tabla `asociaciones`
--
ALTER TABLE `asociaciones`
  ADD PRIMARY KEY (`IDASOCIACION`);

--
-- Indices de la tabla `asociado`
--
ALTER TABLE `asociado`
  ADD PRIMARY KEY (`IDASOCIADO`),
  ADD KEY `FK_PERTENECE` (`IDREGION`),
  ADD KEY `FK_PERTENECE2` (`IDSUBREGION`),
  ADD KEY `FK_PERTENECE3` (`IDPAIS`),
  ADD KEY `FK_POSEE5` (`IDESTCIVIL`),
  ADD KEY `FK_TIENE2` (`IDGENERO`),
  ADD KEY `FK_TIENE3` (`IDPROFESION`);

--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`IDBENEFICIARIO`),
  ADD KEY `FK_PERTENECE4` (`IDASOCIADO`),
  ADD KEY `FK_TIENE5` (`IDPARENTESCO`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`componente`);

--
-- Indices de la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD PRIMARY KEY (`IDCONCEPTO`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`IDPERMISO`,`IDROL`),
  ADD KEY `FK_CONTIENE2` (`IDROL`);

--
-- Indices de la tabla `conyugue`
--
ALTER TABLE `conyugue`
  ADD PRIMARY KEY (`IDCONYUGUE`),
  ADD KEY `FK_TIENE4` (`IDASOCIADO`);

--
-- Indices de la tabla `detallepago`
--
ALTER TABLE `detallepago`
  ADD PRIMARY KEY (`IDCONCEPTO`,`IDPAGO`),
  ADD KEY `FK_DETALLEPAGO2` (`IDPAGO`);

--
-- Indices de la tabla `documentoasociado`
--
ALTER TABLE `documentoasociado`
  ADD PRIMARY KEY (`IDASOCIADO`,`IDTIPODOCUMENTO`),
  ADD KEY `FK_TIENE7` (`IDTIPODOCUMENTO`);

--
-- Indices de la tabla `documentosanexos`
--
ALTER TABLE `documentosanexos`
  ADD PRIMARY KEY (`IDDOCANEXO`),
  ADD KEY `FK_POSEE2` (`IDASOCIADO`);

--
-- Indices de la tabla `estadocivil`
--
ALTER TABLE `estadocivil`
  ADD PRIMARY KEY (`IDESTCIVIL`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`IDGENERO`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`IDPAGO`),
  ADD KEY `FK_REALIZA` (`IDASOCIADO`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`IDPAIS`);

--
-- Indices de la tabla `parametrodoc`
--
ALTER TABLE `parametrodoc`
  ADD PRIMARY KEY (`IDPARAMETRO`);

--
-- Indices de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  ADD PRIMARY KEY (`IDPARENTESCO`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`IDPERMISO`);

--
-- Indices de la tabla `pertenece5`
--
ALTER TABLE `pertenece5`
  ADD PRIMARY KEY (`IDASOCIACION`,`IDASOCIADO`),
  ADD KEY `FK_PERTENECE6` (`IDASOCIADO`);

--
-- Indices de la tabla `profesion`
--
ALTER TABLE `profesion`
  ADD PRIMARY KEY (`IDPROFESION`);

--
-- Indices de la tabla `refpersonales`
--
ALTER TABLE `refpersonales`
  ADD PRIMARY KEY (`IDREF`),
  ADD KEY `FK_POSEE6` (`IDASOCIADO`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`IDREGION`),
  ADD KEY `FK_POSEE4` (`IDPAIS`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IDROL`);

--
-- Indices de la tabla `subregion`
--
ALTER TABLE `subregion`
  ADD PRIMARY KEY (`IDSUBREGION`),
  ADD KEY `FK_POSEE3` (`IDREGION`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`IDTIPODOCUMENTO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUSUARIO`),
  ADD KEY `IDROL` (`IDROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUSUARIO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accion`
--
ALTER TABLE `accion`
  ADD CONSTRAINT `accion_ibfk_1` FOREIGN KEY (`componente`) REFERENCES `componentes` (`componente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `acl`
--
ALTER TABLE `acl`
  ADD CONSTRAINT `acl_ibfk_1` FOREIGN KEY (`IDROL`) REFERENCES `roles` (`IDROL`) ON UPDATE CASCADE,
  ADD CONSTRAINT `acl_ibfk_2` FOREIGN KEY (`componente`) REFERENCES `componentes` (`componente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asociado`
--
ALTER TABLE `asociado`
  ADD CONSTRAINT `FK_PERTENECE` FOREIGN KEY (`IDREGION`) REFERENCES `region` (`IDREGION`),
  ADD CONSTRAINT `FK_PERTENECE2` FOREIGN KEY (`IDSUBREGION`) REFERENCES `subregion` (`IDSUBREGION`),
  ADD CONSTRAINT `FK_PERTENECE3` FOREIGN KEY (`IDPAIS`) REFERENCES `pais` (`IDPAIS`),
  ADD CONSTRAINT `FK_POSEE5` FOREIGN KEY (`IDESTCIVIL`) REFERENCES `estadocivil` (`IDESTCIVIL`),
  ADD CONSTRAINT `FK_TIENE2` FOREIGN KEY (`IDGENERO`) REFERENCES `genero` (`IDGENERO`),
  ADD CONSTRAINT `FK_TIENE3` FOREIGN KEY (`IDPROFESION`) REFERENCES `profesion` (`IDPROFESION`);

--
-- Filtros para la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `FK_PERTENECE4` FOREIGN KEY (`IDASOCIADO`) REFERENCES `asociado` (`IDASOCIADO`),
  ADD CONSTRAINT `FK_TIENE5` FOREIGN KEY (`IDPARENTESCO`) REFERENCES `parentesco` (`IDPARENTESCO`);

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `FK_CONTIENE` FOREIGN KEY (`IDPERMISO`) REFERENCES `permiso` (`IDPERMISO`);

--
-- Filtros para la tabla `conyugue`
--
ALTER TABLE `conyugue`
  ADD CONSTRAINT `FK_TIENE4` FOREIGN KEY (`IDASOCIADO`) REFERENCES `asociado` (`IDASOCIADO`);

--
-- Filtros para la tabla `detallepago`
--
ALTER TABLE `detallepago`
  ADD CONSTRAINT `FK_DETALLEPAGO` FOREIGN KEY (`IDCONCEPTO`) REFERENCES `concepto` (`IDCONCEPTO`),
  ADD CONSTRAINT `FK_DETALLEPAGO2` FOREIGN KEY (`IDPAGO`) REFERENCES `pago` (`IDPAGO`);

--
-- Filtros para la tabla `documentoasociado`
--
ALTER TABLE `documentoasociado`
  ADD CONSTRAINT `FK_TIENE` FOREIGN KEY (`IDASOCIADO`) REFERENCES `asociado` (`IDASOCIADO`),
  ADD CONSTRAINT `FK_TIENE7` FOREIGN KEY (`IDTIPODOCUMENTO`) REFERENCES `tipodocumento` (`IDTIPODOCUMENTO`);

--
-- Filtros para la tabla `documentosanexos`
--
ALTER TABLE `documentosanexos`
  ADD CONSTRAINT `FK_POSEE2` FOREIGN KEY (`IDASOCIADO`) REFERENCES `asociado` (`IDASOCIADO`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `FK_REALIZA` FOREIGN KEY (`IDASOCIADO`) REFERENCES `asociado` (`IDASOCIADO`);

--
-- Filtros para la tabla `pertenece5`
--
ALTER TABLE `pertenece5`
  ADD CONSTRAINT `FK_PERTENECE5` FOREIGN KEY (`IDASOCIACION`) REFERENCES `asociaciones` (`IDASOCIACION`),
  ADD CONSTRAINT `FK_PERTENECE6` FOREIGN KEY (`IDASOCIADO`) REFERENCES `asociado` (`IDASOCIADO`);

--
-- Filtros para la tabla `refpersonales`
--
ALTER TABLE `refpersonales`
  ADD CONSTRAINT `FK_POSEE6` FOREIGN KEY (`IDASOCIADO`) REFERENCES `asociado` (`IDASOCIADO`);

--
-- Filtros para la tabla `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `FK_POSEE4` FOREIGN KEY (`IDPAIS`) REFERENCES `pais` (`IDPAIS`);

--
-- Filtros para la tabla `subregion`
--
ALTER TABLE `subregion`
  ADD CONSTRAINT `FK_POSEE3` FOREIGN KEY (`IDREGION`) REFERENCES `region` (`IDREGION`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IDROL`) REFERENCES `roles` (`IDROL`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
