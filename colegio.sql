-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2023 a las 23:08:21
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudientes`
--

CREATE TABLE `acudientes` (
  `id_acudiente` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `acu_nombre` varchar(45) NOT NULL,
  `acu_cladoc` varchar(45) NOT NULL,
  `acu_docume` varchar(45) NOT NULL,
  `acu_ciudad` varchar(45) NOT NULL,
  `acu_direcc` varchar(45) NOT NULL,
  `acu_telcel` varchar(45) NOT NULL,
  `acu_correo` varchar(45) NOT NULL,
  `acu_parent` varchar(45) NOT NULL,
  `acu_fecope` date NOT NULL,
  `acu_fecupd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acudientes`
--

INSERT INTO `acudientes` (`id_acudiente`, `id_alumno`, `acu_nombre`, `acu_cladoc`, `acu_docume`, `acu_ciudad`, `acu_direcc`, `acu_telcel`, `acu_correo`, `acu_parent`, `acu_fecope`, `acu_fecupd`) VALUES
(1, 1, 'FABIAN ANDRES ARRIETA BLANCO', 'CEDULA', '1045689957', 'SANTA MARTA', 'CLL 43 # 27 - 161', '3013996994', 'f.arrieta@outlook.com', 'PADRE', '2023-02-01', '2023-02-01'),
(2, 1, 'ANGIE MICHELLE BOLAÑO GRANADOS', 'CEDULA', '1082569852', 'BARRANQUILLA', 'CLL 41 # 9E - 15', '3154684165', 'mbolaños@gmail.com', 'MADRE', '2023-02-01', '2023-02-01'),
(3, 2, 'EDER EDARDO SILVA BLANCO', 'CEDULA CIUDADANIA', '1023569847', 'BARRANQUILLA', 'CALLE 41 # 33 - 210', '3025478965', 'ESILVA@GMAIL.COM', 'PADRE', '2023-02-28', '2023-02-28'),
(4, 2, 'MAITE GOMEZ ORTEGON', 'CEDULA CIUDADANIA', '123685947', 'BARRANQUILLA', 'CALLE 41 # 33 - 50', '3201248965', 'MGOMEZ@GMAIL.COM', 'MADRE', '2023-02-28', '2023-02-28'),
(5, 3, 'WILLIAM PERALTA RUIZ', 'Cedula Ciudadania', '1042563895', 'SANTA MARTA', 'CALLE 15 # 27 - 165', '0', 'wperalta@gmail.com', 'Padre', '2023-03-23', '2023-03-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
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
  `alu_estado` varchar(45) NOT NULL DEFAULT '1',
  `alu_fecnac` date NOT NULL,
  `alu_fecope` date NOT NULL,
  `alu_fecupd` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `id_grado`, `alu_nombre`, `alu_cladoc`, `alu_docume`, `alu_sexo`, `alu_gposan`, `alu_factrh`, `alu_ciudad`, `alu_direcc`, `alu_estrat`, `alu_telcel`, `alu_correo`, `alu_estado`, `alu_fecnac`, `alu_fecope`, `alu_fecupd`) VALUES
(1, 3, 'MICHELLE ANDREA ARRIETA BOLAÑOS', 'Tarjeta de Identidad', '1043526895', 'Femenino', 'O', 'Positivo', 'BARRANQUILLA', 'CLL 41 # 9E - 15', '3', '3183508869', 'michellearrieta@gmail.com', '1', '2013-10-14', '2023-02-01', '2023-03-17'),
(2, 4, 'SAMUEL JOSE SILVA BANCO', 'Tarjeta de Identidad', '1023654896', 'Masculino', 'O', 'Positivo', 'BARRANQUILLA', 'CALLE 41 # 33 - 50', '3', '302145689', 'SSILVA@GMAIL.COM', '1', '2012-07-29', '2023-02-28', '2023-03-17'),
(3, 1, 'SANTIAGO ANDRES PERALTA BLANCO', 'Tarjeta de Identidad', '1043578965', 'Masculino', 'O', 'Positivo', 'SANTA MARTA', 'CALLE 43 # 27 - 161 CASA 48', '3', '3017357970', 'speralta@gmail.com', '1', '2014-11-16', '2023-03-23', '2023-03-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `cat_nombre` varchar(45) NOT NULL,
  `cat_fecope` varchar(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP()'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `cat_nombre`, `cat_fecope`) VALUES
(1, 'ACTA', 'CURRENT_TIMESTAMP()'),
(2, 'CERTIFICADO', 'CURRENT_TIMESTAMP()');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `emp_nombre` varchar(45) DEFAULT NULL,
  `emp_cladoc` varchar(45) DEFAULT NULL,
  `emp_docume` varchar(45) DEFAULT NULL,
  `emp_cargo` varchar(45) DEFAULT NULL,
  `emp_telcel` varchar(45) DEFAULT NULL,
  `emp_ciudad` varchar(45) DEFAULT NULL,
  `emp_direcc` varchar(45) DEFAULT NULL,
  `emp_estrat` varchar(45) DEFAULT NULL,
  `emp_correo` varchar(45) DEFAULT NULL,
  `emp_tipcon` varchar(45) DEFAULT NULL,
  `emp_salari` varchar(45) DEFAULT NULL,
  `emp_codces` varchar(45) DEFAULT NULL,
  `emp_codeps` varchar(45) DEFAULT NULL,
  `emp_codpen` varchar(45) DEFAULT NULL,
  `emp_codarl` varchar(45) DEFAULT NULL,
  `emp_sexo` varchar(45) DEFAULT NULL,
  `emp_estciv` varchar(45) DEFAULT NULL,
  `emp_escola` varchar(45) DEFAULT NULL,
  `emp_gposan` varchar(45) DEFAULT NULL,
  `emp_factrh` varchar(45) DEFAULT NULL,
  `emp_hijos` varchar(45) DEFAULT NULL,
  `emp_estado` varchar(45) DEFAULT '1',
  `emp_fecnac` date DEFAULT NULL,
  `emp_fecope` date DEFAULT NULL,
  `emp_fecupd` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `emp_nombre`, `emp_cladoc`, `emp_docume`, `emp_cargo`, `emp_telcel`, `emp_ciudad`, `emp_direcc`, `emp_estrat`, `emp_correo`, `emp_tipcon`, `emp_salari`, `emp_codces`, `emp_codeps`, `emp_codpen`, `emp_codarl`, `emp_sexo`, `emp_estciv`, `emp_escola`, `emp_gposan`, `emp_factrh`, `emp_hijos`, `emp_estado`, `emp_fecnac`, `emp_fecope`, `emp_fecupd`) VALUES
(1, 'CARLOS ALBERTO ROCHA TOVAR', 'CEDULA', '574236985', 'PROFESOR MATEMATICAS', '3002548965', 'SANTA MARTA', 'CALLE 17 # 40 - 62', '3', 'crocha@gmail.com', 'FIJO', '1100000', 'PROTECION', 'SURA', 'COLPENSIONES', 'SURA', 'MASCULINO', 'SOLTERO', 'PROFESIONAL', 'O', 'POSITIVO', '1', '1', '1957-06-05', '2023-02-01', '2023-02-01'),
(2, 'MARIA DEL PILAR', 'Cedula Ciudadania', '125364895', 'PROFESOR DE INFORMATICA', '42563895', 'SANTA MARTA', 'CALLE 43 # 28 - 15', '3', 'MSALES@GMAIL.COM', 'Fijo', '1300000', 'FNA', 'SURA', 'COLPENSIONES', 'SURA', 'Masculino', 'Casado/a', 'Tecnico', 'O', 'Positivo', '2', '1', '2023-03-17', '2023-03-17', '2023-03-17'),
(3, 'CONSUELO BAUTISTAS SANCHEZ', 'Cedula Ciudadania', '1564965752', 'PROFESORA DE ETICA', '3024587964', 'SANTA MARTA', 'CALLE 45 # 33 - 250', '3', 'cbautista@outlook.com', 'Fijo', '1350000', 'FNA', 'SURA', 'COLFONDOS', 'SURA', 'Femenino', 'Soltero/a', 'Profesional', 'AB', 'Positivo', '3', '1', '1989-03-01', '2023-03-18', '2023-03-18'),
(4, 'JULIO JOSE REALEZ CUESTA', 'Cedula Ciudadania', '57421744', 'PROFESOR DE ESTADISTICA', '3003340469', 'SANTA MARTA', 'CALLE 35 # 05 - 14', '2', 'rreales@hotmail.com', 'Fijo', '1500000', 'FNA', 'SURA', 'COLFONDOS', 'SURA', 'Masculino', 'Soltero/a', 'Profesional', 'O', 'Positivo', '2', '1', '1980-04-20', '2023-03-24', '2023-03-24'),
(5, 'JULIO DEL CASTILLO MARTINEZ', 'Cedula Ciudadania', '57423156', 'PROFESOR DE TELECOMUNICACIONES', '3142054624', 'SABTA MARTA', 'CALLE 43 # 27 - 185', '2', 'jcastillo@misena.com', 'Fijo', '20000000', 'PROTECION', 'SANITAS', 'COLFONDOS', 'SURA', 'Masculino', 'Casado/a', 'Especializacion', 'B', 'Positivo', '3', '1', '1975-02-02', '2023-03-24', '2023-03-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `gra_nombre` varchar(45) NOT NULL,
  `gra_matric` varchar(45) NOT NULL,
  `gra_pensio` varchar(45) NOT NULL,
  `gra_canalu` bigint(10) NOT NULL,
  `gra_estado` varchar(45) DEFAULT NULL,
  `gra_fecope` date NOT NULL,
  `gra_fecupd` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `id_empleado`, `gra_nombre`, `gra_matric`, `gra_pensio`, `gra_canalu`, `gra_estado`, `gra_fecope`, `gra_fecupd`) VALUES
(1, 1, 'TRANSICION', '1320000', '580000', 25, '1', '2023-02-01', '2023-03-24'),
(2, 1, 'PRIMERO', '1270000', '480000', 30, '1', '2023-02-01', '2023-02-01'),
(3, 1, 'SEGUNDO', '1260000', '580000', 30, '1', '2023-02-01', '2023-02-01'),
(4, 1, 'TERCERO', '1250000', '580000', 30, '1', '2023-02-01', '2023-02-01'),
(5, 1, 'CUARTO', '1240000', '580000', 30, '1', '2023-02-01', '2023-02-01'),
(6, 1, 'QUINTO', '1240000', '580000', 30, '1', '2023-02-01', '2023-02-01'),
(7, 1, 'SEXTO', '1250000', '540000', 30, '1', '2023-02-01', '2023-02-01'),
(8, 1, 'SEPTIMO', '1222000', '540000', 30, '1', '2023-02-01', '2023-02-01'),
(9, 1, 'OCTAVO', '1222000', '540000', 30, '1', '2023-02-01', '2023-02-01'),
(10, 1, 'NOVENO', '1222000', '540000', 30, '1', '2023-02-01', '2023-02-01'),
(11, 1, 'DECIMO', '1100000', '540000', 30, '1', '2023-02-01', '2023-02-01'),
(12, 1, 'UNDECIMO', '1100000', '540000', 30, '1', '2023-02-01', '2023-03-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `id_matricula` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `mat_saldo` varchar(45) NOT NULL,
  `mat_detalle` varchar(255) NOT NULL,
  `mat_fecope` datetime DEFAULT current_timestamp(),
  `mat_valmat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id_matricula`, `id_alumno`, `id_grado`, `mat_saldo`, `mat_detalle`, `mat_fecope`, `mat_valmat`) VALUES
(1, 1, 3, '1222000', 'ABONO A MATRICULA', '2023-02-01 00:00:00', ''),
(2, 2, 4, '800000', 'ABONO MATRICULA', '2023-03-23 03:34:44', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentezcos`
--

CREATE TABLE `parentezcos` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_acudiente` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `par_fecope` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parentezcos`
--

INSERT INTO `parentezcos` (`id`, `id_alumno`, `id_acudiente`, `id_grado`, `par_fecope`) VALUES
(1, 1, 1, 3, '2023-02-01'),
(2, 1, 2, 3, '2023-02-01'),
(3, 2, 3, 4, '2023-02-01'),
(4, 2, 4, 4, '2023-02-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `pro_nombre` varchar(45) NOT NULL,
  `pro_precio` varchar(45) NOT NULL,
  `pro_estado` varchar(45) NOT NULL DEFAULT '1',
  `pro_fecope` date NOT NULL DEFAULT current_timestamp(),
  `pro_fecupd` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `pro_nombre`, `pro_precio`, `pro_estado`, `pro_fecope`, `pro_fecupd`) VALUES
(1, 2, 'CERTIFICADO ESTUDIANTIL', '50000', '1', '2023-02-01', '2023-02-01'),
(12, 2, 'CERTIFICADO DE NOTA', '35000', '1', '2023-03-07', '2023-03-07'),
(13, 2, 'CERTIFICADO EGRESADO', '55000', '1', '2023-03-07', '2023-03-07'),
(14, 1, 'ACTA DE GRADO', '55000', '1', '2023-03-07', '2023-03-07'),
(15, 1, '', '', '1', '2023-04-15', '2023-03-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol_nombre` varchar(45) NOT NULL,
  `rol_descripcion` varchar(45) NOT NULL,
  `rolescol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol_nombre`, `rol_descripcion`, `rolescol`) VALUES
(1, 'Usuario', 'Es un Usuario', ''),
(2, 'Supervisor', 'Es un Surpervisor', ''),
(3, 'Administrador', 'Es un Administrador', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT 1,
  `user_usuario` varchar(45) NOT NULL,
  `user_nombre` varchar(100) NOT NULL,
  `user_contra` varchar(255) NOT NULL,
  `user_correo` varchar(45) NOT NULL,
  `user_estado` int(11) NOT NULL DEFAULT 1,
  `user_fecope` datetime NOT NULL,
  `user_fecupd` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `user_usuario`, `user_nombre`, `user_contra`, `user_correo`, `user_estado`, `user_fecope`, `user_fecupd`) VALUES
(1, 3, 'Admin', 'Administrador', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 1, '2023-02-12 00:00:00', '2023-04-14 00:00:00'),
(2, 2, 'Farrieta', 'Fabian Arrieta', '202cb962ac59075b964b07152d234b70', 'f.arrieta@gmail.com', 1, '2023-02-12 00:00:00', '2023-04-15 00:00:00'),
(3, 1, 'Marrieta', 'Michelle Arrieta', '202cb962ac59075b964b07152d234b70', 'm.arrieta@gmail.com', 1, '2023-02-12 00:00:00', '2023-04-14 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `ven_fecope` date NOT NULL DEFAULT current_timestamp(),
  `ven_precio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_alumno`, `id_producto`, `ven_fecope`, `ven_precio`) VALUES
(1, 1, 1, '2023-02-01', ''),
(2, 1, 2, '2023-02-01', ''),
(3, 2, 1, '2023-03-30', ''),
(4, 2, 4, '2023-03-30', '');

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
-- Indices de la tabla `parentezcos`
--
ALTER TABLE `parentezcos`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `parentezcos`
--
ALTER TABLE `parentezcos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
