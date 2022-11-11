-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2022 a las 02:31:29
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
('asociado', 'confirma'),
('asociado', 'error'),
('asociado', 'index'),
('asociado', 'store'),
('asociado', 'upload'),
('beneficiario', 'index'),
('concepto', 'create'),
('concepto', 'delete'),
('concepto', 'edit'),
('concepto', 'index'),
('concepto', 'store'),
('concepto', 'update'),
('detallePago', 'create'),
('detallePago', 'edit'),
('detallePago', 'index'),
('detallePago', 'store'),
('errors', 'show401'),
('errors', 'show404'),
('index', 'auth'),
('index', 'confirm'),
('index', 'confirmAuth'),
('index', 'index'),
('index', 'logout'),
('index', 'mensaje'),
('index', 'recuperar'),
('index', 'signin'),
('index', 'signup'),
('index', 'updatePassword'),
('pago', 'create'),
('pago', 'index'),
('pago', 'store'),
('revision', 'create'),
('revision', 'edit'),
('revision', 'index'),
('revision', 'store'),
('revision', 'update'),
('revision', 'update2'),
('roles', 'create'),
('roles', 'delete'),
('roles', 'edit'),
('roles', 'index'),
('roles', 'store'),
('roles', 'update'),
('tipoDocumento', 'create'),
('tipoDocumento', 'delete'),
('tipoDocumento', 'edit'),
('tipoDocumento', 'index'),
('tipoDocumento', 'store'),
('tipoDocumento', 'update'),
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
('Administrador', 'confirma', 'asociado'),
('Administrador', 'confirmAuth', 'index'),
('Administrador', 'create', 'acl'),
('Administrador', 'create', 'concepto'),
('Administrador', 'create', 'detallePago'),
('Administrador', 'create', 'pago'),
('Administrador', 'create', 'revision'),
('Administrador', 'create', 'roles'),
('Administrador', 'create', 'tipoDocumento'),
('Administrador', 'create', 'usuario'),
('Administrador', 'delete', 'acl'),
('Administrador', 'delete', 'concepto'),
('Administrador', 'delete', 'roles'),
('Administrador', 'delete', 'tipoDocumento'),
('Administrador', 'delete', 'usuario'),
('Administrador', 'edit', 'acl'),
('Administrador', 'edit', 'concepto'),
('Administrador', 'edit', 'detallePago'),
('Administrador', 'edit', 'revision'),
('Administrador', 'edit', 'roles'),
('Administrador', 'edit', 'tipoDocumento'),
('Administrador', 'edit', 'usuario'),
('Administrador', 'error', 'asociado'),
('Administrador', 'index', 'acl'),
('Administrador', 'index', 'asociado'),
('Administrador', 'index', 'beneficiario'),
('Administrador', 'index', 'concepto'),
('Administrador', 'index', 'detallePago'),
('Administrador', 'index', 'index'),
('Administrador', 'index', 'pago'),
('Administrador', 'index', 'revision'),
('Administrador', 'index', 'roles'),
('Administrador', 'index', 'tipoDocumento'),
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
('Administrador', 'store', 'asociado'),
('Administrador', 'store', 'concepto'),
('Administrador', 'store', 'detallePago'),
('Administrador', 'store', 'pago'),
('Administrador', 'store', 'revision'),
('Administrador', 'store', 'roles'),
('Administrador', 'store', 'tipoDocumento'),
('Administrador', 'update', 'concepto'),
('Administrador', 'update', 'revision'),
('Administrador', 'update', 'roles'),
('Administrador', 'update', 'tipoDocumento'),
('Administrador', 'update', 'usuario'),
('Administrador', 'update2', 'revision'),
('Administrador', 'updatePassword', 'index'),
('Administrador', 'upload', 'asociado'),
('Asociado', 'index', 'asociado'),
('Asociado', 'show401', 'errors'),
('Asociado', 'show404', 'errors'),
('Asociado', 'store', 'asociado'),
('Asociado', 'store', 'detallePago'),
('Asociado', 'upload', 'asociado'),
('Cajero', 'create', 'concepto'),
('Cajero', 'create', 'detallePago'),
('Cajero', 'create', 'pago'),
('Cajero', 'delete', 'concepto'),
('Cajero', 'edit', 'concepto'),
('Cajero', 'edit', 'detallePago'),
('Cajero', 'index', 'concepto'),
('Cajero', 'index', 'detallePago'),
('Cajero', 'index', 'pago'),
('Cajero', 'show401', 'errors'),
('Cajero', 'show404', 'errors'),
('Cajero', 'store', 'concepto'),
('Cajero', 'store', 'detallePago'),
('Cajero', 'store', 'pago'),
('Cajero', 'update', 'concepto'),
('Ejecutivo', 'show401', 'errors'),
('Ejecutivo', 'show404', 'errors'),
('Jefe de operaciones', 'create', 'revision'),
('Jefe de operaciones', 'edit', 'revision'),
('Jefe de operaciones', 'index', 'revision'),
('Jefe de operaciones', 'show401', 'errors'),
('Jefe de operaciones', 'show404', 'errors'),
('Jefe de operaciones', 'store', 'revision'),
('Jefe de operaciones', 'update', 'revision'),
('Jefe de operaciones', 'update2', 'revision'),
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
  `idAsociacion` bigint(20) NOT NULL,
  `nombreAsociacion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociado`
--

CREATE TABLE `asociado` (
  `idAsociado` bigint(20) NOT NULL,
  `idGenero` bigint(20) DEFAULT NULL,
  `idRegion` bigint(20) DEFAULT NULL,
  `idSubRegion` bigint(20) DEFAULT NULL,
  `idPais` bigint(20) DEFAULT NULL,
  `idProfesion` bigint(20) DEFAULT NULL,
  `idEstCivil` bigint(20) DEFAULT NULL,
  `idUsuario` bigint(20) DEFAULT NULL,
  `nombreAsociado` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `apellidoConyugue` varchar(100) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `extranjeroAsoc` tinyint(1) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `barrioColRes` varchar(100) DEFAULT NULL,
  `callePasaj` varchar(100) DEFAULT NULL,
  `numCasDep` varchar(100) DEFAULT NULL,
  `x` varchar(15) DEFAULT NULL,
  `y` varchar(15) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `capacidadPago` decimal(10,2) DEFAULT NULL,
  `empresario` tinyint(1) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `nombreEmpresa` varchar(80) DEFAULT NULL,
  `DEPARDESEMPENA` varchar(50) DEFAULT NULL,
  `direccLaboral` varchar(120) DEFAULT NULL,
  `capAhorro` decimal(10,2) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `formaPago` varchar(25) DEFAULT NULL,
  `direccionPagos` varchar(150) DEFAULT NULL,
  `fechaRevision` date DEFAULT NULL,
  `fechaSolicitud` date DEFAULT NULL,
  `fechaAprobacion` date DEFAULT NULL,
  `carnet` varchar(10) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `numCtaAhorro` varchar(50) DEFAULT NULL,
  `numCtaAporte` varchar(50) DEFAULT NULL,
  `firmaDigital` varchar(255) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `nup` varchar(20) DEFAULT NULL,
  `isss` varchar(20) DEFAULT NULL,
  `iva` varchar(20) DEFAULT NULL,
  `nacionalidad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asociado`
--

INSERT INTO `asociado` (`idAsociado`, `idGenero`, `idRegion`, `idSubRegion`, `idPais`, `idProfesion`, `idEstCivil`, `idUsuario`, `nombreAsociado`, `apellido`, `apellidoConyugue`, `fechaNacimiento`, `extranjeroAsoc`, `telefono`, `barrioColRes`, `callePasaj`, `numCasDep`, `x`, `y`, `correo`, `capacidadPago`, `empresario`, `cargo`, `nombreEmpresa`, `DEPARDESEMPENA`, `direccLaboral`, `capAhorro`, `estado`, `formaPago`, `direccionPagos`, `fechaRevision`, `fechaSolicitud`, `fechaAprobacion`, `carnet`, `foto`, `numCtaAhorro`, `numCtaAporte`, `firmaDigital`, `nit`, `nup`, `isss`, `iva`, `nacionalidad`) VALUES
(41, 1, 4133, 4133, 66, 1, 1, 41, 'Josue', 'CruzCuellar', 'Ninguno', '2000-09-10', NULL, '5037235707', 'Residencial Altavita Tercera Etapa', 'Pasaje S', '328', '1', '1', NULL, '5999.00', 0, 'Empleado', 'Minera Valparaiso', NULL, 'El Salvador', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123456789', '123456789', '123456789', NULL, 'salvadoreño ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `idBeneficiario` bigint(20) NOT NULL,
  `idAsociado` bigint(20) DEFAULT NULL,
  `idParentesco` bigint(20) DEFAULT NULL,
  `nombreBenef` varchar(100) NOT NULL,
  `telefonoBenef` varchar(10) NOT NULL,
  `correoBenef` varchar(100) NOT NULL,
  `direccionBenef` varchar(150) NOT NULL,
  `fechaNac` date NOT NULL,
  `porcentaje` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `beneficiario`
--

INSERT INTO `beneficiario` (`idBeneficiario`, `idAsociado`, `idParentesco`, `nombreBenef`, `telefonoBenef`, `correoBenef`, `direccionBenef`, `fechaNac`, `porcentaje`) VALUES
(1, 1, 8, 'Aut nesciunt culpa ', '+1 (836) 6', 'tycewa@mailinator.com', 'Alias asperiores nis', '2003-06-23', '83.00'),
(2, 1, 3, 'Facilis consectetur', '+1 (392) 6', 'safany@mailinator.com', 'Nisi commodo et repe', '1997-09-03', '24.00'),
(3, 1, 6, 'Id reprehenderit ali', '+1 (822) 6', 'myhir@mailinator.com', 'Excepturi pariatur ', '1980-10-06', '10.00'),
(4, 1, 2, 'In aut voluptate fug', '+1 (303) 5', 'fudy@mailinator.com', 'Aperiam error commod', '2012-07-19', '90.00'),
(5, 1, 5, 'Labore mollitia a si', '+1 (731) 5', 'piwyqyne@mailinator.com', 'Nostrum harum consec', '1983-04-27', '54.00'),
(6, 1, 1, 'Commodo sit rerum au', '+1 (655) 3', 'mucabos@mailinator.com', 'Quam enim veniam qu', '2002-03-06', '74.00');

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
('beneficiario'),
('concepto'),
('detallePago'),
('errors'),
('index'),
('pago'),
('revision'),
('roles'),
('tipoDocumento'),
('usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

CREATE TABLE `concepto` (
  `idConcepto` bigint(20) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `monto` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `idPermiso` bigint(20) NOT NULL,
  `idRol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conyugue`
--

CREATE TABLE `conyugue` (
  `idConyugue` bigint(20) NOT NULL,
  `idAsociado` bigint(20) DEFAULT NULL,
  `nombreConyugue` varchar(100) DEFAULT NULL,
  `correoConyugue` varchar(100) DEFAULT NULL,
  `fechaNacConyugue` date NOT NULL,
  `situacionLaboralConyugue` tinyint(1) DEFAULT NULL,
  `profesionConyugue` varchar(80) DEFAULT NULL,
  `cargoConyugue` varchar(50) DEFAULT NULL,
  `empresaConyugue` varchar(80) DEFAULT NULL,
  `areaTrabajoConyugue` varchar(80) DEFAULT NULL,
  `direcLabConyugue` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conyugue`
--

INSERT INTO `conyugue` (`idConyugue`, `idAsociado`, `nombreConyugue`, `correoConyugue`, `fechaNacConyugue`, `situacionLaboralConyugue`, `profesionConyugue`, `cargoConyugue`, `empresaConyugue`, `areaTrabajoConyugue`, `direcLabConyugue`) VALUES
(1, 41, ' Esposa Esposa Apellidos', 'correo', '1999-02-05', 1, '21', ' Jefe', 'Villa', NULL, 'El Salvador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pago`
--

CREATE TABLE `detalle_pago` (
  `idConcepto` bigint(20) NOT NULL,
  `idPago` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_anexos`
--

CREATE TABLE `documentos_anexos` (
  `idDocAnexo` bigint(20) NOT NULL,
  `idAsociado` bigint(20) DEFAULT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos_anexos`
--

INSERT INTO `documentos_anexos` (`idDocAnexo`, `idAsociado`, `nombre`, `descripcion`, `ruta`) VALUES
(1, 1, 'esquema-parentesco.xls', 'asdasdasd', 'files/esquema-parentesco.xls'),
(2, 0, 'usuarios (2).sql', 'sxd', 'files/usuarios (2).sql'),
(3, 41, 'paises.xlsx', 'sa', 'files/paises.xlsx'),
(4, 41, 'example-capitals-es.csv', 'saww', 'files/example-capitals-es.csv'),
(5, 0, 'epsilon (3).sql', 'asdasdd', 'files/epsilon (3).sql'),
(6, 0, '4393 (1).png', 'asdasdd', 'files/4393 (1).png'),
(7, 41, 'advanced.html', '', 'files/advanced.html'),
(8, 41, 'Logo.png', 'sad', 'files/Logo.png'),
(9, 41, 'tableConvert.com_u4nru7.sql', 'sad', 'files/tableConvert.com_u4nru7.sql'),
(10, 41, 'CatalogoDeReferencia.pdf', 'sad', 'files/CatalogoDeReferencia.pdf'),
(11, 41, 'subregiones.xlsx', 'adasd', 'files/subregiones.xlsx'),
(12, 41, 'usuarios.sql', '', 'files/usuarios.sql'),
(13, 41, '4393.png', '', 'files/4393.png'),
(14, 41, 'portfolio-details.html', '', 'files/portfolio-details.html'),
(15, 41, 'changelog.txt', '', 'files/changelog.txt'),
(16, 41, 'Readme.txt', '', 'files/Readme.txt'),
(17, 41, 'contact.php', '', 'files/contact.php'),
(18, 41, 'main.js', '', 'files/main.js'),
(19, 41, 'favicon.png', '', 'files/favicon.png'),
(20, 41, 'hero-img.png', '', 'files/hero-img.png'),
(21, 41, 'team-3.jpg', '', 'files/team-3.jpg'),
(22, 41, 'team-4.jpg', '', 'files/team-4.jpg'),
(23, 41, 'team-1.jpg', '', 'files/team-1.jpg'),
(24, 41, 'portfolio-1.jpg', '', 'files/portfolio-1.jpg'),
(25, 41, 'portfolio-7.jpg', '', 'files/portfolio-7.jpg'),
(26, 41, 'portfolio-2.jpg', 'asdasd', 'files/portfolio-2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_asociado`
--

CREATE TABLE `documento_asociado` (
  `idAsociado` bigint(20) NOT NULL,
  `idTipoDocumento` bigint(20) NOT NULL,
  `numeroDoc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documento_asociado`
--

INSERT INTO `documento_asociado` (`idAsociado`, `idTipoDocumento`, `numeroDoc`) VALUES
(41, 1, '123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_civil`
--

CREATE TABLE `estado_civil` (
  `idEstCivil` bigint(20) NOT NULL,
  `nombreEstCivil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_civil`
--

INSERT INTO `estado_civil` (`idEstCivil`, `nombreEstCivil`) VALUES
(1, 'Casado'),
(2, 'Soltero'),
(3, 'Viudo'),
(4, 'Divorciado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` bigint(20) NOT NULL,
  `nombreGenero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `nombreGenero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idPago` bigint(20) NOT NULL,
  `idAsociado` bigint(20) DEFAULT NULL,
  `fechaPago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`idPago`, `idAsociado`, `fechaPago`) VALUES
(1, 41, '2022-11-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` bigint(20) NOT NULL,
  `nombrePais` varchar(50) NOT NULL,
  `alpha2` varchar(2) NOT NULL,
  `alpha3` varchar(3) NOT NULL,
  `numerico` smallint(6) NOT NULL,
  `coi` varchar(3) NOT NULL,
  `codTelefono` varchar(3) NOT NULL,
  `nac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro_doc`
--

CREATE TABLE `parametro_doc` (
  `idParametro` bigint(20) NOT NULL,
  `nomParametro` varchar(25) NOT NULL,
  `contenidoParametro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco`
--

CREATE TABLE `parentesco` (
  `idParentesco` bigint(20) NOT NULL,
  `nombreParentesco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parentesco`
--

INSERT INTO `parentesco` (`idParentesco`, `nombreParentesco`) VALUES
(1, 'Nieto/a'),
(2, 'Hermano/a'),
(3, 'Abuelo/a'),
(4, 'Biznieto/a'),
(5, 'Sobrino/a'),
(6, 'Tío/a'),
(7, 'Bisabuelo/a'),
(8, 'Primo/a Hermano/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idPermiso` bigint(20) NOT NULL,
  `descPermiso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece5`
--

CREATE TABLE `pertenece5` (
  `idAsociacion` bigint(20) NOT NULL,
  `idAsociado` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE `profesion` (
  `idProfesion` bigint(20) NOT NULL,
  `nombreProfesion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`idProfesion`, `nombreProfesion`) VALUES
(1, 'Contador'),
(2, 'Asistente de Cuentas'),
(3, 'empleado de cuentas'),
(4, 'Gerente de Cuentas'),
(5, 'Personal de cuentas'),
(6, 'Ingeniero Acústico'),
(7, 'Actor'),
(8, 'Actriz'),
(9, 'Actuario'),
(10, 'Acupunturista'),
(11, 'Ajustador'),
(12, 'Asistente de administracion'),
(13, 'Recepcionista en administracion'),
(14, 'Gerente de Administración'),
(15, 'Personal de administración'),
(16, 'Administrador'),
(17, 'Agente de publicidad'),
(18, 'asistente de publicidad'),
(19, 'empleado de publicidad'),
(20, 'Contratista de publicidad'),
(21, 'Ejecutivo de publicidad'),
(22, 'Gerente de publicidad'),
(23, 'Personal de publicidad'),
(24, 'Erector aéreo'),
(25, 'Instructor de aerobic'),
(26, 'Ingeniero aeronáutico'),
(27, 'Agente'),
(28, 'Controlador de tráfico aéreo'),
(29, 'Diseñador de aeronaves'),
(30, 'Ingeniero aeronáutico'),
(31, 'Ingeniero de Mantenimiento de Aeronaves'),
(32, 'Acabadora de superficies de aeronaves'),
(33, 'Aviador'),
(34, 'Controlador de aeropuerto'),
(35, 'Gerente de Aeropuerto'),
(36, 'Limosnero'),
(37, 'Controlador de ambulancia'),
(38, 'Tripulación de ambulancia'),
(39, 'Chofer de ambulancia'),
(40, 'Trabajador de juegos recreativos'),
(41, 'Anestesista'),
(42, 'Analista'),
(43, 'Químico Analítico'),
(44, 'criador de animales'),
(45, 'Antropólogo'),
(46, 'Comerciante de antigüedades'),
(47, 'ingeniero de Aplicaciones'),
(48, 'Programador de Aplicaciones'),
(49, 'Árbitro'),
(50, 'arborista'),
(51, 'Arqueólogo'),
(52, 'Arquitecto'),
(53, 'Archivista'),
(54, 'Gerente de área'),
(55, 'Armero'),
(56, 'Aromaterapeuta'),
(57, 'crítico de arte'),
(58, 'Comerciante de arte'),
(59, 'Historiador del arte'),
(60, 'Restaurador de arte'),
(61, 'Artexer'),
(62, 'Artista'),
(63, 'Letras'),
(64, 'Trabajador de ensamblaje'),
(65, 'Asesor'),
(66, 'Asistente'),
(67, 'asistente de conserje'),
(68, 'Cocinero asistente'),
(69, 'Subdirector'),
(70, 'auxiliar de enfermería'),
(71, 'Profesor auxiliar'),
(72, 'Astrólogo'),
(73, 'Astrónomo'),
(74, 'Asistente'),
(75, 'De au pair'),
(76, 'trabajador de subasta'),
(77, 'Subastador'),
(78, 'Audiólogo'),
(79, 'empleado de auditoría'),
(80, 'Gerente de Auditoría'),
(81, 'Auditor'),
(82, 'Auto electrico'),
(83, 'Enfermera Auxiliar'),
(84, 'Curador de tocino'),
(85, 'Mozo de equipajes'),
(86, 'Alguacil'),
(87, 'Panadero'),
(88, 'Asistente de panadería'),
(89, 'Gerente de panadería'),
(90, 'Operador de panadería'),
(91, 'Aeronauta'),
(92, 'Empleado bancario'),
(93, 'Gerente de banco'),
(94, 'Mensajero bancario'),
(95, 'Ministro bautista'),
(96, 'Gerente del bar'),
(97, 'mayordomo de barra'),
(98, 'Barbero'),
(99, 'Camarera'),
(100, 'Barman'),
(101, 'Abogado'),
(102, 'Cosmetólogo'),
(103, 'Terapeuta de belleza'),
(104, 'Tienda de apuestas'),
(105, 'cartel de la cuenta'),
(106, 'Llamador de bingo'),
(107, 'Bioquímico'),
(108, 'Biólogo'),
(109, 'Herrero'),
(110, 'ensamblador ciego'),
(111, 'Instalador de persianas'),
(112, 'Instalador de Persianas'),
(113, 'Constructor de botes'),
(114, 'ajuste del cuerpo'),
(115, 'Guardaespaldas'),
(116, 'taller de carrocería'),
(117, 'Carpeta de libros'),
(118, 'vendedor de libros'),
(119, 'Contable'),
(120, 'Agente de reservas'),
(121, 'Reserva empleado'),
(122, 'Corredor de apuestas'),
(123, 'Botánico'),
(124, 'Gerente de Sucursal'),
(125, 'Criador'),
(126, 'Cervecero'),
(127, 'Gerente de cervecería'),
(128, 'trabajador de la cervecería'),
(129, 'Albañil'),
(130, 'Locutor'),
(131, 'Constructor'),
(132, 'Obrero de constructores'),
(133, 'Asesor de construcción'),
(134, 'control de edificios'),
(135, 'Ingeniero de construccion'),
(136, 'Estimador de construcción'),
(137, 'Capataz de construcción'),
(138, 'Inspector de edificios'),
(139, 'Gerente de edificio'),
(140, 'Agrimensor de edificios'),
(141, 'Tesorero'),
(142, 'Empresa de autobuses'),
(143, 'Conductor de autobús'),
(144, 'Conductor de autobús'),
(145, 'Mecánico de Autobuses'),
(146, 'Servicio de autobús'),
(147, 'Consultor de negocios'),
(148, 'Propietario de negocio'),
(149, 'Carnicero'),
(150, 'Gerente de carnicería'),
(151, 'Mayordomo'),
(152, 'Comprador'),
(153, 'Taxista'),
(154, 'Ebanista'),
(155, 'contratista de cable'),
(156, 'Ensambladora de cables'),
(157, 'Instalador de televisión por cable'),
(158, 'dueño del café'),
(159, 'Personal de la cafetería'),
(160, 'trabajador de cafetería'),
(161, 'Gerente de calibración'),
(162, 'Reparador de cámaras'),
(163, 'Camarógrafo'),
(164, 'Vendedor de autos'),
(165, 'Conductor de entrega de automóviles'),
(166, 'Auxiliar de aparcamiento'),
(167, 'Vendedor de autos'),
(168, 'Valet de coche'),
(169, 'Asistente de lavado de autos'),
(170, 'Asistente de cuidado'),
(171, 'Gerente de cuidado'),
(172, 'Asesor de carreras'),
(173, 'Oficial de Carreras'),
(174, 'Vigilante'),
(175, 'Operador de carga'),
(176, 'Carpintero'),
(177, 'Limpiador de alfombra'),
(178, 'Instalador de alfombras'),
(179, 'Minorista de alfombras'),
(180, 'Instalador de teléfonos'),
(181, 'Cartógrafo'),
(182, 'Dibujante'),
(183, 'Cajero'),
(184, 'Trabajador casual'),
(185, 'Abastecedor'),
(186, 'Consultor de catering'),
(187, 'Gerente del Servicio de Alimentos'),
(188, 'Personal de servicio'),
(189, 'Calafateador'),
(190, 'Contratista de techo'),
(191, 'Fijador de techo'),
(192, 'Bodeguero'),
(193, 'Camarera'),
(194, 'Velero'),
(195, 'Capellán'),
(196, 'Mano de carga'),
(197, 'Trabajador de caridad'),
(198, 'Alquilado'),
(199, 'Contador Público'),
(200, 'Chofer'),
(201, 'Cocinero'),
(202, 'Químico'),
(203, 'Cazador de pollo'),
(204, 'cuidador de niños'),
(205, 'Niñera'),
(206, 'Deshollinador'),
(207, 'Restaurador de China'),
(208, 'Podólogo'),
(209, 'Quiropráctico'),
(210, 'Coreógrafo'),
(211, 'oficial de la iglesia'),
(212, 'Guardián de la iglesia'),
(213, 'director de cine'),
(214, 'propietario del circo'),
(215, 'trabajador de circo'),
(216, 'Ingeniero civil'),
(217, 'funcionario'),
(218, 'Ajustador de reclamos'),
(219, 'Asesor de Reclamaciones'),
(220, 'Gerente de Reclamos'),
(221, 'Clarividente'),
(222, 'ayudante de aula'),
(223, 'Limpiador'),
(224, 'Clérigo'),
(225, 'Clérigo'),
(226, 'Empleado'),
(227, 'Oficial'),
(228, 'Consultor'),
(229, 'Juez de instrucción'),
(230, 'Concejal'),
(231, 'Consejero'),
(232, 'Distribuidor'),
(233, 'Decorador'),
(234, 'conductor de entrega'),
(235, 'Médico'),
(236, 'Conductor'),
(237, 'Economista'),
(238, 'Editor'),
(239, 'Empleado'),
(240, 'Empleo'),
(241, 'Ingeniero'),
(242, 'Profesor Inglés'),
(243, 'Artista'),
(244, 'Enviado'),
(245, 'Ejecutivo'),
(246, 'Granjero'),
(247, 'Bombero'),
(248, 'Capa de piso'),
(249, 'Jefe de piso'),
(250, 'Florista'),
(251, 'molinero de harina'),
(252, 'Arreglista de flores'),
(253, 'instructor de vuelo'),
(254, 'Convertidor de espuma'),
(255, 'Procesador de alimentos'),
(256, 'Futbolista'),
(257, 'Capataz'),
(258, 'Científico forense'),
(259, 'Guardabosques'),
(260, 'Guardabosque'),
(261, 'Conductor de montacargas'),
(262, 'Agente de transporte'),
(263, 'Padre adoptivo'),
(264, 'trabajador de fundición'),
(265, 'Investigador de fraude'),
(266, 'Pulidora francesa'),
(267, 'Frutero'),
(268, 'comerciante de combustible'),
(269, 'recaudación de fondos'),
(270, 'Director de la funeraria'),
(271, 'Amueblador funerario'),
(272, 'hombre del horno'),
(273, 'Distribuidor de muebles'),
(274, 'Removedor de muebles'),
(275, 'Restaurador de muebles'),
(276, 'Peletero'),
(277, 'Dueño de la galería'),
(278, 'Jugador'),
(279, 'Guardabosque'),
(280, 'Inspector de tableros de juego'),
(281, 'Gerente de club de juego'),
(282, 'Propietario del club de juego'),
(283, 'Asistente de garaje'),
(284, 'capataz de garaje'),
(285, 'Gerente de garaje'),
(286, 'Garda'),
(287, 'diseñador de jardines'),
(288, 'Jardinero'),
(289, 'Instalador de gas'),
(290, 'mecanico de gasolina'),
(291, 'Técnico de Gases'),
(292, 'Guardián de la puerta'),
(293, 'genealogista'),
(294, 'medico general'),
(295, 'Geólogo'),
(296, 'geofísico'),
(297, 'Dorador'),
(298, 'trabajador del vidrio'),
(299, 'Vidriero'),
(300, 'Orfebre'),
(301, 'carrito de golf'),
(302, 'Profesional de palos de golf'),
(303, 'Golfista'),
(304, 'manipulador de mercancías'),
(305, 'Gobernador'),
(306, 'Técnico de granito'),
(307, 'Diseñador grafico'),
(308, 'Grafólogo'),
(309, 'Sepulturero'),
(310, 'Mercader de grava'),
(311, 'Guardián verde'),
(312, 'Verdulero'),
(313, 'Tendero'),
(314, 'Novio'),
(315, 'Trabajador de planta'),
(316, 'jardinero'),
(317, 'Propietario de casa de huéspedes'),
(318, 'Propietario de la casa de huéspedes'),
(319, 'armero'),
(320, 'Ginecólogo'),
(321, 'Conductor de vehículos pesados'),
(322, 'mecánico de vehículos pesados'),
(323, 'Peluquero'),
(324, 'Personal de mantenimiento'),
(325, 'Distribuidor de hardware'),
(326, 'Transportista'),
(327, 'Vendedor ambulante'),
(328, 'Consejero de Salud'),
(329, 'Salud y seguridad'),
(330, 'Asistente de salud'),
(331, 'Consultor de Salud'),
(332, 'enfermera de salud'),
(333, 'planificador de salud'),
(334, 'Servicio de salud'),
(335, 'Terapeuta de Salud'),
(336, 'Visitador médico'),
(337, 'Terapeuta auditivo'),
(338, 'Ingeniero de calefacción'),
(339, 'Herbalista'),
(340, 'inspector de carreteras'),
(341, 'Conductor de coche de alquiler'),
(342, 'Historiador'),
(343, 'Profesor de Historia'),
(344, 'Portaequipajes'),
(345, 'Economista doméstico'),
(346, 'Ayuda en casa'),
(347, 'Gerente de atención domiciliaria'),
(348, 'Homeópata'),
(349, 'trabajador a domicilio'),
(350, 'Comerciante de lúpulo'),
(351, 'criador de caballos'),
(352, 'comerciante de caballos'),
(353, 'Profesor de equitación'),
(354, 'comerciante de caballos'),
(355, 'Entrenador de caballos'),
(356, 'Consultor hortícola'),
(357, 'horticultor'),
(358, 'Mecánico de calcetería'),
(359, 'Trabajador de calcetería'),
(360, 'consultor hospitalario'),
(361, 'medico hospitalario'),
(362, 'Gerente de Hospital'),
(363, 'camillero del hospital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ref_familiares`
--

CREATE TABLE `ref_familiares` (
  `idFa` bigint(20) NOT NULL,
  `idAsociado` bigint(20) DEFAULT NULL,
  `nombreFa` varchar(120) NOT NULL,
  `telefonoFa` varchar(10) NOT NULL,
  `correoFa` varchar(100) NOT NULL,
  `direccionFa` varchar(150) NOT NULL,
  `relacionFa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ref_familiares`
--

INSERT INTO `ref_familiares` (`idFa`, `idAsociado`, `nombreFa`, `telefonoFa`, `correoFa`, `direccionFa`, `relacionFa`) VALUES
(1, 41, 'Libero aperiam sunt ', 'Dolore cum', 'kogecosam@mailinator.com', 'Odit est sequi sint ', 'Asperiores perspicia'),
(2, 41, 'Adipisci earum aliqu', 'In eaque p', 'pyzanycuf@mailinator.com', 'Enim aut explicabo ', 'Eaque reprehenderit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ref_personales`
--

CREATE TABLE `ref_personales` (
  `idRef` bigint(20) NOT NULL,
  `idAsociado` bigint(20) DEFAULT NULL,
  `nombreRef` varchar(120) NOT NULL,
  `telefonoRef` varchar(10) NOT NULL,
  `correoRef` varchar(100) NOT NULL,
  `direccionRef` varchar(150) NOT NULL,
  `relacionAsoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ref_personales`
--

INSERT INTO `ref_personales` (`idRef`, `idAsociado`, `nombreRef`, `telefonoRef`, `correoRef`, `direccionRef`, `relacionAsoc`) VALUES
(1, 41, 'Odio ut consequatur ', 'Est minima', 'tyxej@mailinator.com', 'Odio sint neque dol', 'Molestiae voluptas r'),
(2, 41, 'Qui eum in in in dui', 'Dolor irur', 'jykodedij@mailinator.com', 'Consequatur perferen', 'Quis inventore expli');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `idRegion` bigint(20) NOT NULL,
  `idPais` bigint(20) DEFAULT NULL,
  `nombreRegion` varchar(50) NOT NULL
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
  `idSubRegion` bigint(20) NOT NULL,
  `idRegion` bigint(20) DEFAULT NULL,
  `nombreSubRegion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documentos`
--

CREATE TABLE `tipo_documentos` (
  `idTipoDocumento` bigint(20) NOT NULL,
  `nombreTipoDoc` varchar(50) NOT NULL,
  `mascara` varchar(50) DEFAULT NULL,
  `extranjeroTipoDoc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_documentos`
--

INSERT INTO `tipo_documentos` (`idTipoDocumento`, `nombreTipoDoc`, `mascara`, `extranjeroTipoDoc`) VALUES
(1, 'DUI', NULL, 0);

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
(40, 'Solicitante', 'JO00001', 'Javier ', 'Ortiz', 'gonzza_@hotmail.com', '1997-07-05', '25f9e794323b453885f5181f1b624d0b', 79460607, 1, 0, 'NE5G3FZDXHZWZTYB', '05/11/22 05:42:37', '05/11/22 05:43:18'),
(41, 'Administrador', 'JC00001', 'Josue Ernesto', 'Cuellar', 'cc19114@ues.edu.sv', '2022-11-08', '45ececbb4fa848ad3a87f3ee17919755', 72357079, 1, 0, 'VYTRDUVOEH3WV5YX', '09/11/22 04:42:33', '09/11/22 04:45:11');

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
  ADD PRIMARY KEY (`idAsociacion`);

--
-- Indices de la tabla `asociado`
--
ALTER TABLE `asociado`
  ADD PRIMARY KEY (`idAsociado`),
  ADD KEY `FK_PERTENECE` (`idRegion`),
  ADD KEY `FK_PERTENECE2` (`idSubRegion`),
  ADD KEY `FK_PERTENECE3` (`idPais`),
  ADD KEY `FK_POSEE5` (`idEstCivil`),
  ADD KEY `FK_TIENE2` (`idGenero`),
  ADD KEY `FK_TIENE3` (`idProfesion`),
  ADD KEY `FK_TIENE6` (`idUsuario`);

--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`idBeneficiario`),
  ADD KEY `FK_PERTENECE4` (`idAsociado`),
  ADD KEY `FK_TIENE5` (`idParentesco`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`componente`);

--
-- Indices de la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD PRIMARY KEY (`idConcepto`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`idPermiso`,`idRol`),
  ADD KEY `FK_CONTIENE2` (`idRol`);

--
-- Indices de la tabla `conyugue`
--
ALTER TABLE `conyugue`
  ADD PRIMARY KEY (`idConyugue`),
  ADD KEY `FK_TIENE4` (`idAsociado`);

--
-- Indices de la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
  ADD PRIMARY KEY (`idConcepto`,`idPago`),
  ADD KEY `FK_DETALLEPAGO2` (`idPago`);

--
-- Indices de la tabla `documentos_anexos`
--
ALTER TABLE `documentos_anexos`
  ADD PRIMARY KEY (`idDocAnexo`),
  ADD KEY `FK_POSEE2` (`idAsociado`);

--
-- Indices de la tabla `documento_asociado`
--
ALTER TABLE `documento_asociado`
  ADD PRIMARY KEY (`idAsociado`,`idTipoDocumento`),
  ADD KEY `FK_TIENE7` (`idTipoDocumento`);

--
-- Indices de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`idEstCivil`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idPago`),
  ADD KEY `FK_REALIZA` (`idAsociado`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `parametro_doc`
--
ALTER TABLE `parametro_doc`
  ADD PRIMARY KEY (`idParametro`);

--
-- Indices de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  ADD PRIMARY KEY (`idParentesco`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idPermiso`);

--
-- Indices de la tabla `profesion`
--
ALTER TABLE `profesion`
  ADD PRIMARY KEY (`idProfesion`);

--
-- Indices de la tabla `ref_familiares`
--
ALTER TABLE `ref_familiares`
  ADD PRIMARY KEY (`idFa`);

--
-- Indices de la tabla `ref_personales`
--
ALTER TABLE `ref_personales`
  ADD PRIMARY KEY (`idRef`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUSUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asociado`
--
ALTER TABLE `asociado`
  MODIFY `idAsociado` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `idBeneficiario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `conyugue`
--
ALTER TABLE `conyugue`
  MODIFY `idConyugue` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documentos_anexos`
--
ALTER TABLE `documentos_anexos`
  MODIFY `idDocAnexo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idPago` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  MODIFY `idParentesco` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `profesion`
--
ALTER TABLE `profesion`
  MODIFY `idProfesion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT de la tabla `ref_familiares`
--
ALTER TABLE `ref_familiares`
  MODIFY `idFa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ref_personales`
--
ALTER TABLE `ref_personales`
  MODIFY `idRef` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUSUARIO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
