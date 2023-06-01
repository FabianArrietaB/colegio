-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2023 a las 05:07:32
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
-- Base de datos: `colegio`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `matricula_alumno` (`idalumno` INT)   BEGIN
	SELECT
	au.id_auditoria as idauditoria,
    a.alu_nombre as alumno,
    a.alu_correo  as correo,
	a.alu_direcc  as direcc,
    a.alu_telcel  as telcel,
    a.alu_fecope  as fecmat,
    g.gra_nombre as grado,
    au.id_tipopago as tippag,
    au.aud_valor as matricula,
    au.aud_abono as abono,
    au.aud_fecope as fecope
	FROM auditorias AS au 
    INNER JOIN alumnos as a ON au.id_alumno = a.id_alumno
    INNER JOIN grados as g ON au.id_grado = g.id_grado
    WHERE au.id_alumno = idalumno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ventas_alumno` (`idalumno` INT)   BEGIN
	SELECT
        v.id_venta    as idventa,
        v.id_alumno   as idalumno,
        a.alu_nombre  as alumno,
        a.alu_correo  as correo,
        a.alu_direcc  as direcc,
        a.alu_telcel  as telcel,
        a.alu_fecope  as fecmat,
        v.id_producto as idproducto,
        p.pro_nombre  as producto,
        g.gra_nombre  as grado,
        v.ven_precio  as precio,
        v.ven_fecope  as fecope
        FROM ventas AS v
        LEFT JOIN alumnos AS a ON v.id_alumno = a.id_alumno
        LEFT JOIN productos AS p ON v.id_producto = p.id_producto
        LEFT JOIN grados AS g ON a.id_grado = g.id_grado
        WHERE v.id_alumno = idalumno;
END$$

DELIMITER ;

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
(1, 1, NULL, 'ANGIE MICHELLE BOLAÑOS GRANADOZ', 'CEDULA', '1002521463', 'BARRANQUILLA', 'CARRERA 8E # 51 - 52', '3', '3152458574', 'SAGIAN16@GMAIL.COM', 'MADRE', 1, '2023-05-10 02:01:19', '2023-05-20 21:39:41'),
(2, 1, NULL, 'FABIAN ANDRES ARRIETA BLANCO', 'CEDULA', '1045689957', 'SANTA MARTA', 'CALLE 41 # 33 - 210', '3', '3013996994', 'F.ARRIETA@OUTLOOK.COM', 'PADRE', 1, '2023-05-10 02:01:19', '2023-05-20 21:39:41'),
(3, 2, NULL, 'KAROL MAITE GOMEZ ORTEGON', 'CEDULA', '1002458964', 'BARRANQUILLA', 'CALLE 41 # 33 - 195', '3', '3154684165', 'CGOMEZ@GMAIL.COM', 'MADRE', 1, '2023-05-14 16:45:16', '2023-05-19 12:15:29'),
(4, 2, NULL, 'EDER EDUARDO SILVA BLANCO', 'CEDULA', '1045689547', 'BARRANQUILLA', 'CALLE 41 # 33 - 210', '3', '3102457896', 'ESILVA@GMAIL.COM', 'PADRE', 1, '2023-05-14 16:45:16', '2023-05-19 12:15:29'),
(5, 3, NULL, 'yoelys blanco beltran', 'CEDULA', '186724006', 'santa marta', 'CALLE 43 # 27 - 161', '3', '300000000', '', 'MADRE', 1, '2023-05-15 00:37:19', '2023-05-15 00:37:19'),
(6, 3, NULL, 'william andres peralta ruiz', 'CEDULA', '108234569', 'SANTA MARTA', 'CALLE 41 # 33 - 210', '3', '300000000', 'williamperalta@gmail.com', 'PADRE', 1, '2023-05-15 00:37:19', '2023-05-15 00:37:19'),
(11, 6, 1, 'KELLY MARIA SANHEZ RIOS', 'CEDULA', '1002155147', 'barranquilla', 'cARRERA 8E # 40 - 68', '3', '3152192962', 'KSANCHEZ@GMAIL.COM', 'MADRE', 1, '2023-05-20 21:48:01', '2023-05-20 21:48:01'),
(12, 6, 1, 'CARLOS ALBERTO ROCHA TOVAR', 'CEDULA', '1043589674', 'SANTA MARTA', 'calle 44 # 50 - 12', '3', '3013996994', 'CROCHA@GMAIL.COM', 'PADRE', 1, '2023-05-20 21:48:01', '2023-05-20 21:48:01'),
(15, 8, 1, 'FANNY MARIA VILLA TORRES', 'CEDULA', '15478963', 'SANTA MARTA', 'CALLE 43 # 27 - 161', '3', '3000000000', 'FVILLA@GMAIL.COM', 'MADRE', 1, '2023-05-24 22:03:38', '2023-05-24 22:03:38'),
(16, 8, 1, 'JAITHER ANTONIO BLANCO BELTRAN', 'CEDULA', '1084598632', 'SANTA MARTA', 'CALLE 43 # 27 - 161', '3', '3000000000', 'JBLANCO@GMAIL.COM', 'PADRE', 1, '2023-05-24 22:03:38', '2023-05-24 22:03:38');

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
  `alu_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `alu_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `id_grado`, `id_operador`, `id_usuario`, `alu_nombre`, `alu_cladoc`, `alu_docume`, `alu_sexo`, `alu_gposan`, `alu_factrh`, `alu_ciudad`, `alu_direcc`, `alu_estrat`, `alu_telcel`, `alu_correo`, `alu_estado`, `alu_fecnac`, `alu_fecope`, `alu_fecupd`) VALUES
(1, 4, 1, 10, 'MICHELLE ANDREA ARRIETA BOLAÑOS', 'TARJETA IDENTIDAD', '1043215785', 'FEMENINO', 'O', 'POSITIVO', 'BARRANQUILLA', 'CARRERA 8E # 51 - 52', '3', '3152458574', 'MICHELLEARRIETA46@GMAIL.COM', 1, '2013-10-14', '2023-05-10 02:01:19', '2023-05-24 23:43:34'),
(2, 5, 1, 13, 'SAMUEL JOSE SILVA BLANCO', 'TARJETA IDENTIDAD', '1043568941', 'MASCULINO', 'O', 'POSITIVO', 'BARRANQUILLA', 'CALLE 41 # 33 - 195', '3', '3105102234', 'SSILVA@GMAIL.COM', 1, '2012-10-26', '2023-05-14 16:45:16', '2023-05-24 23:45:37'),
(3, 3, 1, 14, 'SANTIAGO ANDRES PERALTA BLANCO', 'TARJETA IDENTIDAD', '1043463797', 'MASCULINO', 'O', 'POSITIVO', 'santa marta', 'CALLE 43 # 27 - 161', '3', '3225458796', 'speralta@gmail.com', 1, '2010-12-26', '2023-05-15 00:37:19', '2023-05-24 23:45:37'),
(6, 5, 1, 15, 'CARLOS ALBERTO ROCHA TOVAR', 'TARJETA IDENTIDAD', '1043589674', 'MASCULINO', 'A', 'POSITIVO', 'SANTA MARTA', 'calle 44 # 50 - 12', '3', '3013996994', 'crocha@gmail.com', 1, '2010-12-10', '2023-05-20 21:48:01', '2023-05-24 22:41:54'),
(8, 4, 1, 11, 'VALERIA INES BLANCO VILLA', 'TARJETA IDENTIDAD', '1085479632', 'FEMENINO', 'O', 'POSITIVO', 'SANTA MARTA', 'CALLE 43 # 27 - 161', '3', '3000000000', 'VBLANCO@GMAIL.COM', 1, '2015-08-02', '2023-05-24 22:03:38', '2023-05-24 22:03:38');

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
  `aud_numdoc` varchar(45) NOT NULL,
  `aud_valor` varchar(45) NOT NULL,
  `aud_abono` varchar(45) NOT NULL,
  `aud_fecope` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `auditorias`
--

INSERT INTO `auditorias` (`id_auditoria`, `id_operador`, `id_alumno`, `id_grado`, `id_tipopago`, `aud_numdoc`, `aud_valor`, `aud_abono`, `aud_fecope`) VALUES
(1, 0, 1, 1, 1, '', '1250000', '250000', '2023-05-10 02:01:19'),
(2, 0, 2, 5, 1, '', '1250000', '1000000', '2023-05-15 02:01:19'),
(3, 0, 3, 3, 1, '', '1250000', '1000000', '2023-05-15 02:01:19'),
(4, 0, 5, 7, 1, '', '1250000', '250000', '2023-05-15 04:04:05'),
(5, 0, 3, 3, 1, '', '1250000', '100000', '2023-05-17 19:24:52'),
(6, 0, 1, 4, 2, '', '1250000', '500000', '2023-05-17 19:25:30'),
(7, 0, 2, 5, 2, '', '1250000', '250000', '2023-05-17 19:25:58'),
(8, 0, 1, 4, 2, '', '1250000', '250000', '2023-05-19 12:43:29'),
(9, 0, 1, 4, 2, '', '1250000', '250000', '2023-05-19 12:53:29'),
(10, 1, 7, 4, 1, '', '1250000', '1000000', '2023-05-20 22:00:11'),
(11, 0, 7, 4, 2, '', '1250000', '250000', '2023-05-20 22:02:04'),
(12, 0, 2, 5, 2, '', '1250000', '250000', '2023-05-21 01:34:30'),
(13, 0, 3, 3, 0, '', '1250000', '250000', '2023-05-21 02:10:16'),
(14, 1, 2, 5, 0, '', '1250000', '250000', '2023-05-21 02:19:56'),
(15, 1, 1, 4, 2, '', '1250000', '250000', '2023-05-21 02:20:41'),
(16, 1, 3, 3, 2, '', '1250000', '250000', '2023-05-21 02:20:51'),
(17, 1, 7, 4, 2, '', '1250000', '250000', '2023-05-21 02:20:59'),
(18, 1, 2, 5, 2, '', '1250000', '250000', '2023-05-21 02:21:45'),
(19, 1, 2, 5, 3, '', '580000', '280000', '2023-05-21 22:03:39'),
(20, 1, 3, 3, 3, '', '580000', '300000', '2023-05-21 22:10:32'),
(21, 1, 1, 4, 3, '', '580000', '280000', '2023-05-21 22:12:31'),
(22, 1, 1, 4, 2, '', '1250000', '250000', '2023-05-22 03:30:06'),
(23, 1, 1, 4, 4, '', '580000', '300000', '2023-05-22 03:30:30'),
(24, 1, 3, 3, 4, '', '580000', '280000', '2023-05-22 03:31:03'),
(25, 1, 2, 5, 4, '', '580000', '580000', '2023-05-22 03:31:14'),
(26, 1, 2, 5, 0, '', '580000', '', '2023-05-22 03:39:11'),
(27, 1, 8, 4, 2, '', '1250000', '1250000', '2023-05-24 22:03:38'),
(28, 1, 1, 4, 2, '', '1250000', '250000', '2023-06-01 00:49:00'),
(29, 1, 8, 4, 4, '', '580000', '580000', '2023-06-01 00:52:00');

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

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `id_operador`, `cat_nombre`, `cat_fecope`) VALUES
(1, 1, 'ACTA', '0000-00-00 00:00:00'),
(2, 1, 'CERTIFICADO', '0000-00-00 00:00:00');

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

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `id_usuario`, `id_operador`, `emp_nombre`, `emp_cladoc`, `emp_docume`, `emp_cargo`, `emp_telcel`, `emp_ciudad`, `emp_direcc`, `emp_estrat`, `emp_correo`, `emp_tipcon`, `emp_salari`, `emp_codces`, `emp_codeps`, `emp_codpen`, `emp_codarl`, `emp_sexo`, `emp_estciv`, `emp_escola`, `emp_gposan`, `emp_factrh`, `emp_hijos`, `emp_estado`, `emp_fecnac`, `emp_fecope`, `emp_fecupd`) VALUES
(1, 0, 0, 'CARLOS ALBERTO ROCHA TOVAR', 'CEDULA', '574236985', 'PROFESOR MATEMATICAS', '3002548965', 'SANTA MARTA', 'CALLE 17 # 40 - 62', '3', 'crocha@gmail.com', 'FIJO', '1100000', '9', '5', '1', '2', 'MASCULINO', 'SOLTERO/A', 'PROFESIONAL', 'O', 'POSITIVO', '1', 1, '0000-00-00 00:00:00', '2023-02-01 05:00:00', '2023-05-13 02:25:03'),
(8, 0, 0, 'CONSUELO BAUTISTA SANCHEZ', 'CEDULA', '63484295', 'PROFESORA ETICA', '3013866172', 'SANTA MARTA', 'CALLE 29D3 #19A-25 BULEVAR D ELAS ROSAS', '2', 'consuelobs2010@hotmail.com', 'FIJO', '1250000', '13', '6', '12', '5', 'FEMENINO', 'SOLTERO/A', 'PROFESIONAL', 'O', 'POSITIVO', '3', 1, '1973-04-05 00:00:00', '2023-05-19 12:36:02', '2023-05-19 12:36:02'),
(9, 12, 1, 'LAURA VANESSA ADARRAGA BERDUGO', 'CEDULA', '1007900088', 'profesora ingles', '3002950772', 'SANTA MARTA', 'MZA 8 CASA 15 MINUTO DE DIOS', '3', 'lauraadarraga5@gmail.com', 'INDEFINIDO', '1250000', '10', '6', '14', '7', 'FEMENINO', 'SOLTERO/A', 'TECNICO', 'O', 'POSITIVO', '1', 1, '2001-01-08 00:00:00', '2023-05-24 22:16:40', '2023-05-24 22:16:40');

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
(1, 1, 1, 'TRANSICION', '1320000', '580000', 30, 1, '2023-02-01 05:00:00', '2023-05-23 14:17:24'),
(2, 8, 1, 'PRIMERO', '1270000', '480000', 30, 1, '2023-02-01 05:00:00', '2023-05-23 14:17:24'),
(3, 0, 1, 'SEGUNDO', '1260000', '580000', 30, 1, '2023-02-01 05:00:00', '2023-05-24 16:02:38'),
(4, 1, 1, 'TERCERO', '1250000', '580000', 30, 1, '2023-02-01 05:00:00', '2023-05-23 14:17:24'),
(5, 1, 1, 'CUARTO', '1240000', '580000', 30, 1, '2023-02-01 05:00:00', '2023-05-23 14:17:24'),
(6, 1, 1, 'QUINTO', '1240000', '580000', 30, 1, '2023-02-01 05:00:00', '2023-05-23 14:17:24'),
(7, 1, 1, 'SEXTO', '1250000', '540000', 30, 1, '2023-02-01 05:00:00', '2023-05-23 14:17:24'),
(8, 1, 1, 'SEPTIMO', '1222000', '540000', 30, 1, '2023-02-01 05:00:00', '2023-05-23 14:17:24'),
(9, 1, 1, 'OCTAVO', '1222000', '540000', 30, 1, '2023-02-01 05:00:00', '2023-05-23 14:17:24'),
(10, 1, 1, 'NOVENO', '1222000', '540000', 30, 1, '2023-02-01 05:00:00', '2023-05-23 14:17:24'),
(11, 1, 1, 'DECIMO', '1100000', '540000', 30, 1, '2023-02-01 05:00:00', '2023-05-23 14:17:24'),
(12, 1, 1, 'UNDECIMO', '1100000', '540000', 30, 1, '2023-02-01 05:00:00', '2023-05-23 14:17:24');

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
  `id_tippagpen` int(11) NOT NULL,
  `mat_numdoc` varchar(45) NOT NULL,
  `mat_valmat` varchar(45) NOT NULL,
  `mat_pensio` varchar(45) NOT NULL,
  `mat_saldo` varchar(45) NOT NULL,
  `mat_salpen` varchar(45) NOT NULL,
  `mat_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `mat_fecmat` timestamp NOT NULL DEFAULT current_timestamp(),
  `mat_fecpen` timestamp NOT NULL DEFAULT current_timestamp(),
  `mat_fecpropag` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id_matricula`, `id_alumno`, `id_grado`, `id_operador`, `id_tipopago`, `id_tippagpen`, `mat_numdoc`, `mat_valmat`, `mat_pensio`, `mat_saldo`, `mat_salpen`, `mat_fecope`, `mat_fecmat`, `mat_fecpen`, `mat_fecpropag`) VALUES
(1, 1, 4, 0, 2, 4, '', '1250000', '580000', '0', '0', '2023-05-10 02:01:19', '2023-05-31 05:00:00', '2023-05-21 05:00:00', '2023-06-30 05:00:00'),
(2, 2, 5, 0, 2, 4, '', '1250000', '580000', '0', '0', '2023-04-21 16:45:16', '2023-05-20 05:00:00', '2023-05-21 05:00:00', '2023-06-21 05:00:00'),
(3, 3, 3, 0, 2, 4, '', '1250000', '580000', '0', '0', '2023-05-15 00:37:19', '2023-05-20 05:00:00', '2023-05-21 05:00:00', '2023-06-21 05:00:00'),
(6, 7, 4, 1, 2, 4, '', '1250000', '580000', '0', '0', '2023-05-20 22:00:11', '2023-05-20 05:00:00', '2023-05-20 22:00:11', '2023-06-21 05:00:00'),
(7, 8, 4, 1, 2, 4, '', '1250000', '580000', '0', '0', '2023-05-24 22:03:38', '2023-05-24 22:03:38', '2023-05-31 05:00:00', '2023-06-30 05:00:00');

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
  `par_nombre` varchar(45) NOT NULL,
  `par_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `par_nit` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parafiscales`
--

INSERT INTO `parafiscales` (`id_parafiscal`, `id_tipo`, `par_nombre`, `par_fecope`, `par_nit`) VALUES
(1, 1, '', '2023-05-13 01:27:08', ''),
(2, NULL, 'CAPITAL SALUD', '2023-05-13 01:27:08', ''),
(3, NULL, 'COMPENSAR   E.P.S.', '2023-05-13 01:27:08', ''),
(4, NULL, 'FAMISANAR LTDA. ', '2023-05-13 01:27:08', ''),
(5, NULL, 'NUEVA EPS S.A.', '2023-05-13 01:27:08', ''),
(6, NULL, 'SANITAS S.A.', '2023-05-13 01:27:08', ''),
(7, NULL, 'SALUD TOTAL S.A.  E.P.S.', '2023-05-13 01:27:08', ''),
(8, NULL, 'SALUDVIDA S.A. E.P.S', '2023-05-13 01:27:08', ''),
(9, NULL, 'SAVIA SALUD EPS', '2023-05-13 01:27:08', ''),
(10, NULL, 'PROTECCION', '2023-05-13 01:27:08', ''),
(11, NULL, 'PORVENIR', '2023-05-13 01:27:08', ''),
(12, NULL, 'COLFONDOS', '2023-05-13 01:27:08', ''),
(13, NULL, 'OLD MUTUAL', '2023-05-13 01:27:08', ''),
(14, NULL, 'COLPENSIONES', '2023-05-13 01:27:08', ''),
(15, NULL, '', '2023-05-13 02:34:28', '');

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

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `id_operador`, `pro_nombre`, `pro_precio`, `pro_estado`, `pro_fecope`, `pro_fecupd`) VALUES
(1, 2, 0, 'CERTIFICADO ESTUDIANTIL', '50000', 1, '2023-02-01 05:00:00', '2023-05-05 00:20:41'),
(12, 2, 0, 'CERTIFICADO DE NOTA', '35000', 1, '2023-03-07 05:00:00', '2023-03-07 05:00:00'),
(13, 2, 0, 'CERTIFICADO EGRESADO', '55000', 1, '2023-03-07 05:00:00', '2023-03-07 05:00:00'),
(14, 1, 0, 'ACTA DE GRADO', '55000', 1, '2023-03-07 05:00:00', '2023-03-07 05:00:00'),
(28, 1, 0, 'CERTIFICADO GENERAL NOTAS', '75000', 1, '0000-00-00 00:00:00', '2023-05-19 12:37:22');

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

INSERT INTO `sedes` (`id_sedes`, `id_tipo`, `id_operador`, `sed_razsoc`, `sed_nombre`, `sed_nit`, `sed_correo`, `sed_telcel`, `sed_direcc`, `sed_tipper`, `sed_regime`, `sed_pais`, `sed_depart`, `sed_muni`, `sed_estado`, `sed_fecope`, `sed_fecupd`) VALUES
(1, 1, 1, 'GRUPO METROPOLIS DE LA COSTA', 'FERRETERIA METROPOLIS', '900513041', 'ferreteriametropolisdelacos@gmail.com', '4302541', 'Crr 19 # 29S - 12', '1', '1', 'COLOMBIA', 'MAGDALENA', 'SANTA MARTA', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_solicitud`, `id_usuario`, `id_grado`, `id_operador`, `id_venta`, `rep_tipo`, `rep_detalle`, `rep_estado`, `rep_solucion`, `rep_fecope`, `rep_fecupd`) VALUES
(1, 10, 5, 1, 71, '1', 'CERTIFICADO NOTAS', '1', 'se procede a generar certificado entrega proximo lunes', '2023-05-11 02:01:19', '2023-05-24 22:38:49'),
(3, 10, 5, 1, 0, '2', 'SILLA MAL ESTADO', '1', 'se procede a revisar elemento mensionado', '2023-05-11 02:01:19', '2023-05-24 22:38:49'),
(4, 10, 5, 1, 0, '2', 'TABLERO MAL ESTADO', '1', 'se procede a revisar elemento mensionado', '2023-05-11 02:01:19', '2023-05-24 22:38:49'),
(5, 10, 5, 1, 72, '1', 'CERTIFICADO ESTUDIANTIL', '1', 'se procede a realizar certificado, fecha de entrega proximo lunes', '2023-05-11 00:18:57', '2023-05-24 22:38:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT 1,
  `id_operador` int(11) NOT NULL,
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

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `id_operador`, `user_usuario`, `user_nombre`, `user_contra`, `user_correo`, `user_estado`, `user_fecope`, `user_fecupd`) VALUES
(1, 4, 1, 'Admin', 'Administrador', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 1, '2023-02-12 05:00:00', '2023-05-23 14:17:52'),
(2, 3, 1, 'Farrieta', 'Fabian Arrieta', '202cb962ac59075b964b07152d234b70', 'f.arrieta@gmail.com', 1, '2023-02-12 05:00:00', '2023-05-23 14:17:52'),
(10, 1, 1, 'marrieta', 'MICHELLE ANDREA ARRIETA BOLAÑOS', '81dc9bdb52d04dc20036dbd8313ed055', 'marrieta@gmail.com', 1, '0000-00-00 00:00:00', '2023-05-22 03:43:00'),
(11, 1, 1, 'VBLANCO', 'VALERIA INES BLANCO VILLA', '81dc9bdb52d04dc20036dbd8313ed055', 'VBLANCO@GMAIL.COM', 0, '2023-05-24 22:03:38', '2023-05-24 22:18:29'),
(12, 2, 1, 'lADARRAGA ', 'LAURA VANESSA ADARRAGA BERDUGO', '81dc9bdb52d04dc20036dbd8313ed055', 'lauraadarraga5@gmail.com', 0, '2023-05-24 22:16:40', '2023-05-24 22:18:27'),
(13, 1, 1, 'SSILVA', 'SAMUEL JOSE SILVA BLANCO', '81dc9bdb52d04dc20036dbd8313ed055', 'SSILVA@GMAIL.COM', 0, '2023-05-24 22:40:15', '2023-05-24 22:40:15'),
(14, 1, 1, 'SPERALTA', 'SANTIAGO ANDRES PERALTA BLANCO', '202cb962ac59075b964b07152d234b70', 'SPERALTA@GMAIL.COM', 0, '2023-05-24 22:41:23', '2023-05-24 22:41:23'),
(15, 1, 1, 'CROCHA', 'CARLOS ALBERTO ROCHA TOVAR', '81dc9bdb52d04dc20036dbd8313ed055', 'CROCHA@GMAIL.COM', 0, '2023-05-24 22:41:39', '2023-05-24 22:41:39');

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
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_alumno`, `id_producto`, `id_operador`, `ven_numdoc`, `ven_precio`, `ven_fecope`) VALUES
(6, 1, 1, 1, '', '50000', '2023-05-17 21:22:50'),
(7, 1, 1, 1, '', '50000', '2023-05-17 21:26:15'),
(8, 1, 1, 1, '', '50000', '2023-05-17 21:56:37'),
(9, 2, 14, 1, '', '55000', '2023-05-17 22:03:24'),
(69, 1, 12, 1, '', '35000', '2023-05-21 01:21:50'),
(70, 1, 1, 1, '', '50000', '2023-05-21 01:22:59'),
(71, 1, 12, 1, '', '35000', '2023-05-21 01:25:04'),
(72, 1, 1, 1, '', '50000', '2023-05-21 01:25:45');

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
  MODIFY `id_acudiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `auditorias`
--
ALTER TABLE `auditorias`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
