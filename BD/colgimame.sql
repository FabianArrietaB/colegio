-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2023 a las 05:05:25
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colgimame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudientes`
--

CREATE TABLE `acudientes` (
  `id_acudiente` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_operador` int(11) DEFAULT NULL,
  `acu_nombre` varchar(45) NOT NULL,
  `acu_cladoc` varchar(45) NOT NULL,
  `acu_docume` varchar(45) NOT NULL,
  `acu_ciudad` varchar(45) NOT NULL,
  `acu_direcc` varchar(45) NOT NULL,
  `acu_estrat` varchar(45) DEFAULT NULL,
  `acu_telcel` varchar(45) NOT NULL,
  `acu_correo` varchar(45) NOT NULL,
  `acu_parent` varchar(45) NOT NULL,
  `acu_estado` int(11) NOT NULL DEFAULT 1,
  `acu_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `acu_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acudientes`
--

INSERT INTO `acudientes` (`id_acudiente`, `id_alumno`, `id_operador`, `acu_nombre`, `acu_cladoc`, `acu_docume`, `acu_ciudad`, `acu_direcc`, `acu_estrat`, `acu_telcel`, `acu_correo`, `acu_parent`, `acu_estado`, `acu_fecope`, `acu_fecupd`) VALUES
(1, 1, 1, 'ANGIE MICHELLE BOLAÑOS GRADADOZ', 'CEDULA', '1002155741', 'BARRANQUILLA', 'CARRERA 8E # 41 -52', '3', '3000000000', 'SAGIAN16@GMAIL.COM', 'MADRE', 1, '2023-12-05 16:13:13', '2023-12-05 16:13:13'),
(2, 1, 1, 'FABIAN ANDRES ARRIETA BLANCO', 'CEDULA', '1045689957', 'SANTA MARTA', 'CALLE 43 # 27 -161', '3', '3013996541', 'FARRIETA@OUTLOOK.COM', 'PADRE', 1, '2023-12-05 16:13:13', '2023-12-05 16:13:13'),
(3, 2, 1, 'CAROL MAITE GOMEZ ORTEGON', 'CEDULA', '1004312456', 'BARRANQUILLA', 'CALLE 41 # 33 - 150', '3', '3000000000', 'MGOMEZ@OUTLOOK.COM', 'MADRE', 1, '2023-12-06 13:51:53', '2023-12-06 13:51:53'),
(4, 2, 1, 'EDER EDUARDO SILVA BLANCO', 'CEDULA', '104587963', 'BARRANQUILLA', 'CALLE 41 # 33 -210', '3', '3000000000', 'ESILVA@GMAIL.COM', 'PADRE', 1, '2023-12-06 13:51:53', '2023-12-06 13:51:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `alu_nombre` varchar(45) NOT NULL,
  `alu_cladoc` varchar(45) NOT NULL,
  `alu_docume` varchar(45) NOT NULL,
  `alu_sexo` varchar(45) NOT NULL,
  `alu_gposan` varchar(45) NOT NULL,
  `alu_factrh` varchar(45) NOT NULL,
  `alu_ciudad` varchar(45) NOT NULL,
  `alu_direcc` varchar(45) NOT NULL,
  `alu_estrat` varchar(45) NOT NULL,
  `alu_telcel` varchar(45) NOT NULL,
  `alu_correo` varchar(45) NOT NULL,
  `alu_estado` int(11) NOT NULL DEFAULT 1,
  `alu_fecnac` date NOT NULL,
  `alu_fecope` date NOT NULL,
  `alu_fecupd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `id_grado`, `id_operador`, `id_usuario`, `alu_nombre`, `alu_cladoc`, `alu_docume`, `alu_sexo`, `alu_gposan`, `alu_factrh`, `alu_ciudad`, `alu_direcc`, `alu_estrat`, `alu_telcel`, `alu_correo`, `alu_estado`, `alu_fecnac`, `alu_fecope`, `alu_fecupd`) VALUES
(1, 1, 1, 2, 'MICHELLE ANDREA ARRIETA BOLAÑOS', 'TARJETA IDENTIDAD', '1043521789', 'FEMENINO', 'O', 'POSITIVO', 'BARRANQUILLA', 'CALLE 41 # 33 - 210', '3', '3013996541', 'MARRIETA@GMAIL.COM', 1, '2013-10-14', '0000-00-00', '0000-00-00'),
(2, 2, 1, 3, 'SAMUEL JOSE SILVA GOMEZ', 'TARJETA IDENTIDAD', '1250134524', 'MASCULINO', 'O', 'POSITIVO', 'BARRANQUILLA', 'CALLE 41 # 33 - 150', '3', '3013015246', 'SSILVA@GMAIL.COM', 1, '2012-07-29', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditorias`
--

CREATE TABLE `auditorias` (
  `id_auditoria` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_tipopago` int(11) NOT NULL,
  `aud_mespro` int(11) DEFAULT NULL,
  `aud_numdoc` varchar(45) NOT NULL,
  `aud_valor` varchar(45) NOT NULL,
  `aud_fecope` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `auditorias`
--

INSERT INTO `auditorias` (`id_auditoria`, `id_operador`, `id_alumno`, `id_grado`, `id_tipopago`, `aud_mespro`, `aud_numdoc`, `aud_valor`, `aud_fecope`) VALUES
(1, 1, 1, 0, 1, NULL, '1', '', '2023-12-05 16:13:13'),
(2, 1, 2, 1, 1, NULL, '2', '900000', '2023-12-06 13:51:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `cat_nombre` varchar(45) NOT NULL,
  `cat_fecope` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `emp_nombre` varchar(45) NOT NULL,
  `emp_cladoc` varchar(45) NOT NULL,
  `emp_docume` varchar(45) NOT NULL,
  `emp_cargo` varchar(45) NOT NULL,
  `emp_telcel` varchar(45) NOT NULL,
  `emp_ciudad` varchar(45) NOT NULL,
  `emp_direcc` varchar(45) NOT NULL,
  `emp_estrat` varchar(45) NOT NULL,
  `emp_correo` varchar(45) NOT NULL,
  `emp_tipcon` varchar(45) NOT NULL,
  `emp_salari` varchar(45) NOT NULL,
  `emp_codces` varchar(45) NOT NULL,
  `emp_codeps` varchar(45) NOT NULL,
  `emp_codpen` varchar(45) NOT NULL,
  `emp_codarl` varchar(45) NOT NULL,
  `emp_sexo` varchar(45) NOT NULL,
  `emp_estciv` varchar(45) NOT NULL,
  `emp_escola` varchar(45) NOT NULL,
  `emp_gposan` varchar(45) NOT NULL,
  `emp_factrh` varchar(45) NOT NULL,
  `emp_hijos` varchar(45) NOT NULL,
  `emp_estado` int(11) DEFAULT 1,
  `emp_fecnac` datetime NOT NULL,
  `emp_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `emp_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturadetalle`
--

CREATE TABLE `facturadetalle` (
  `id` bigint(20) DEFAULT NULL,
  `id_tipmov` bigint(20) DEFAULT NULL,
  `id_factura` bigint(20) DEFAULT NULL,
  `id_produc` bigint(20) DEFAULT NULL,
  `fac_nompro` varchar(255) DEFAULT NULL,
  `fac_cantid` varchar(20) DEFAULT NULL,
  `fac_undmed` varchar(20) DEFAULT NULL,
  `fac_preund` float DEFAULT NULL,
  `fac_estado` bigint(20) DEFAULT NULL,
  `fac_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `fac_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_facturas` int(11) NOT NULL,
  `id_operador` int(11) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_acudiente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_tippag` int(11) NOT NULL,
  `fac_forpag` varchar(255) DEFAULT NULL,
  `fac_prefijo` varchar(45) NOT NULL DEFAULT 'GAV',
  `fac_cantidad` varchar(45) NOT NULL DEFAULT '1',
  `fac_valor` varchar(45) NOT NULL,
  `fac_detalle` varchar(255) NOT NULL,
  `fac_fecope` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_facturas`, `id_operador`, `id_alumno`, `id_acudiente`, `id_producto`, `id_tippag`, `fac_forpag`, `fac_prefijo`, `fac_cantidad`, `fac_valor`, `fac_detalle`, `fac_fecope`) VALUES
(1, 1, 1, 2, 0, 1, '1', 'GAV', '1', '900000', '', '2023-12-05'),
(2, 1, 2, 4, 0, 1, '1', 'GAV', '1', '1000000', '', '2023-12-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `gra_nombre` varchar(45) NOT NULL,
  `gra_matric` varchar(45) NOT NULL,
  `gra_pensio` varchar(45) NOT NULL,
  `gra_canalu` bigint(10) NOT NULL,
  `gra_estado` int(11) DEFAULT 1,
  `gra_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `gra_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `id_empleado`, `id_operador`, `gra_nombre`, `gra_matric`, `gra_pensio`, `gra_canalu`, `gra_estado`, `gra_fecope`, `gra_fecupd`) VALUES
(1, 0, 1, 'TRANSICION', '900000', '450000', 30, 1, '2023-12-06 12:25:52', '2023-12-06 12:25:52'),
(2, 0, 1, 'PRIMERO A', '1000000', '500000', 30, 1, '2023-12-06 14:11:00', '2023-12-06 14:11:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `id_matricula` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_tipopago` int(11) NOT NULL,
  `mat_numdoc` varchar(45) NOT NULL,
  `mat_valmat` varchar(45) NOT NULL,
  `mat_pensio` varchar(45) NOT NULL,
  `mat_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `mat_fecmat` timestamp NOT NULL DEFAULT current_timestamp(),
  `mat_fecpen` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mat_fecpropag` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id_matricula`, `id_alumno`, `id_grado`, `id_operador`, `id_tipopago`, `mat_numdoc`, `mat_valmat`, `mat_pensio`, `mat_fecope`, `mat_fecmat`, `mat_fecpen`, `mat_fecpropag`) VALUES
(1, 1, 0, 1, 1, '', '', '', '2023-12-05 16:13:13', '2023-12-05 16:13:13', '2023-12-05 16:13:13', '2023-12-05 05:00:00'),
(2, 2, 1, 1, 1, '', '900000', '450000', '2023-12-06 13:51:53', '2023-12-06 13:51:53', '2023-12-06 13:51:53', '2023-12-06 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_tipmov` bigint(20) NOT NULL,
  `mov_nombre` varchar(100) DEFAULT NULL,
  `mov_detall` varchar(250) DEFAULT NULL,
  `mov_estado` bigint(20) DEFAULT 1,
  `mov_operad` bigint(20) DEFAULT NULL,
  `mov_usuari` bigint(20) DEFAULT NULL,
  `mov_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `mov_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id_tipmov`, `mov_nombre`, `mov_detall`, `mov_estado`, `mov_operad`, `mov_usuari`, `mov_fecope`, `mov_fecupd`) VALUES
(1, 'FACTURA DE VENTA', 'FACTURA DE VENTA', 1, 1, 1, '2023-12-08 00:47:03', '2023-12-08 02:04:34'),
(2, 'FACTURA DE CAJA', 'FACTURA DE CAJA', 1, 1, 1, '2023-12-08 02:41:54', '2023-12-08 02:41:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `pais_nombre` varchar(45) NOT NULL,
  `pais_fecope` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `pais_nombre`, `pais_fecope`) VALUES
(1, 'ALEMANIA', '2023-02-01 05:00:00'),
(2, 'BRASIL', '2023-02-01 05:00:00'),
(3, 'COLOMBIA', '2023-02-01 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parafiscales`
--

CREATE TABLE `parafiscales` (
  `id_parafiscal` int(11) NOT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `par_codigo` varchar(45) NOT NULL,
  `par_nit` varchar(45) NOT NULL,
  `par_nombre` varchar(45) NOT NULL,
  `par_regimen` varchar(45) NOT NULL,
  `par_fecope` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parafiscales`
--

INSERT INTO `parafiscales` (`id_parafiscal`, `id_tipo`, `par_codigo`, `par_nit`, `par_nombre`, `par_regimen`, `par_fecope`) VALUES
(1, 1, 'ESS024 - EPS042', '900226715', 'COOSALUD EPS-S', 'AMBOS', '2023-12-03 23:05:13'),
(2, 1, 'EPS037 - EPSS41 ', '900156264', 'NUEVA EPS', 'AMBOS', '2023-12-08 00:44:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prefijos`
--

CREATE TABLE `prefijos` (
  `id_prefij` bigint(20) NOT NULL,
  `pre_tipmov` bigint(20) DEFAULT NULL,
  `pre_prefij` varchar(50) DEFAULT NULL,
  `pre_nombre` varchar(100) DEFAULT NULL,
  `pre_consec` int(11) DEFAULT NULL,
  `pre_inicio` int(11) DEFAULT NULL,
  `pre_final` int(11) DEFAULT NULL,
  `pre_fecini` date DEFAULT NULL,
  `pre_fecven` date DEFAULT NULL,
  `pre_resolu` varchar(45) DEFAULT NULL,
  `pre_estado` bigint(20) DEFAULT 1,
  `pre_operad` bigint(20) DEFAULT NULL,
  `pre_usuari` bigint(20) DEFAULT NULL,
  `pre_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `pre_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `pro_nombre` varchar(45) NOT NULL,
  `pro_precio` varchar(45) NOT NULL,
  `pro_estado` int(11) NOT NULL DEFAULT 1,
  `pro_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `pro_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol_nombre` varchar(45) NOT NULL,
  `rol_descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol_nombre`, `rol_descripcion`) VALUES
(1, 'Alumno', 'Es un Alumno'),
(2, 'Docente', 'Es un Docente'),
(3, 'Supervisor', 'Es un Surpervisor'),
(4, 'Administrador', 'Es un Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id_sedes` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_operador` int(11) DEFAULT NULL,
  `sed_razsoc` varchar(45) NOT NULL,
  `sed_nombre` varchar(45) NOT NULL,
  `sed_nit` varchar(45) NOT NULL,
  `sed_correo` varchar(45) NOT NULL,
  `sed_pagina` varchar(255) NOT NULL,
  `sed_telcel` varchar(45) NOT NULL,
  `sed_direcc` varchar(45) NOT NULL,
  `sed_tipper` varchar(45) NOT NULL,
  `sed_regime` varchar(45) NOT NULL,
  `sed_pais` varchar(45) NOT NULL,
  `sed_depart` varchar(45) NOT NULL,
  `sed_muni` varchar(45) NOT NULL,
  `sed_estado` varchar(45) NOT NULL DEFAULT '1',
  `sed_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `sed_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id_sedes`, `id_tipo`, `id_operador`, `sed_razsoc`, `sed_nombre`, `sed_nit`, `sed_correo`, `sed_pagina`, `sed_telcel`, `sed_direcc`, `sed_tipper`, `sed_regime`, `sed_pais`, `sed_depart`, `sed_muni`, `sed_estado`, `sed_fecope`, `sed_fecupd`) VALUES
(1, 2, 1, 'COLEGIO GIMNASIO LAS AMERICAS', 'COLEGIO GIMNASIO LAS AMERICA', '347001005243', 'colegiogimnasiolasamericas.edu.co', 'secretariageneral@colegiogimnasiolasamericas', '3245833253', 'Cra. 33b #9f-27 a 9f-1', '1', '2', 'COLOMBIA', 'MAGDALENA', 'SANTA MARTA', '1', '0000-00-00 00:00:00', '2023-12-03 23:25:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL DEFAULT 0,
  `id_venta` int(11) NOT NULL DEFAULT 0,
  `rep_tipo` varchar(45) NOT NULL,
  `rep_detalle` varchar(250) NOT NULL,
  `rep_estado` varchar(45) NOT NULL DEFAULT '0',
  `rep_solucion` varchar(250) NOT NULL DEFAULT '0',
  `rep_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `rep_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

CREATE TABLE `tmp` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_tippag` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT 1,
  `id_operador` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL DEFAULT 1,
  `user_usuario` varchar(45) NOT NULL,
  `user_nombre` varchar(100) NOT NULL,
  `user_contra` varchar(255) NOT NULL,
  `user_correo` varchar(45) NOT NULL,
  `user_estado` int(11) NOT NULL DEFAULT 0,
  `user_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `id_operador`, `id_sede`, `user_usuario`, `user_nombre`, `user_contra`, `user_correo`, `user_estado`, `user_fecope`, `user_fecupd`) VALUES
(1, 4, 1, 1, 'admin', 'Administrador', '202cb962ac59075b964b07152d234b70', 'admin@admin.com', 1, '2023-11-28 05:00:00', '2023-11-28 05:00:00'),
(2, 0, 1, 1, '', 'MICHELLE ANDREA ARRIETA BOLAÑOS', 'd41d8cd98f00b204e9800998ecf8427e', 'MARRIETA@GMAIL.COM', 0, '2023-12-05 16:13:13', '2023-12-05 16:13:13'),
(3, 1, 1, 1, 'SSILVA', 'SAMUEL JOSE SILVA GOMEZ', '202cb962ac59075b964b07152d234b70', 'SSILVA@GMAIL.COM', 0, '2023-12-06 13:51:53', '2023-12-06 13:51:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `ven_numdoc` varchar(45) NOT NULL,
  `ven_precio` varchar(45) NOT NULL,
  `ven_fecope` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  ADD PRIMARY KEY (`id_acudiente`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `auditorias`
--
ALTER TABLE `auditorias`
  ADD PRIMARY KEY (`id_auditoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_facturas`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id_matricula`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_tipmov`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `parafiscales`
--
ALTER TABLE `parafiscales`
  ADD PRIMARY KEY (`id_parafiscal`);

--
-- Indices de la tabla `prefijos`
--
ALTER TABLE `prefijos`
  ADD PRIMARY KEY (`id_prefij`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sedes`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  MODIFY `id_acudiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `auditorias`
--
ALTER TABLE `auditorias`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_facturas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_tipmov` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `parafiscales`
--
ALTER TABLE `parafiscales`
  MODIFY `id_parafiscal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prefijos`
--
ALTER TABLE `prefijos`
  MODIFY `id_prefij` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sedes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
