/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.28-MariaDB : Database - colgimame
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`colgimame` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `colgimame`;

/*Table structure for table `acudientes` */

DROP TABLE IF EXISTS `acudientes`;

CREATE TABLE `acudientes` (
  `id_acudiente` int(11) NOT NULL AUTO_INCREMENT,
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
  `acu_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_acudiente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `acudientes` */

insert  into `acudientes`(`id_acudiente`,`id_alumno`,`id_operador`,`acu_nombre`,`acu_cladoc`,`acu_docume`,`acu_ciudad`,`acu_direcc`,`acu_estrat`,`acu_telcel`,`acu_correo`,`acu_parent`,`acu_estado`,`acu_fecope`,`acu_fecupd`) values 
(1,1,1,'ANGIE MICHELLE BOLAÑOS GRANADOZ','CEDULA','1002155187','BARRANQUILLA','CARRERA 8E # 41 - 27','3','3024589632','SAGIAN@GMAIL.COM','MADRE',1,'2023-07-12 16:39:34','2023-07-22 21:30:41'),
(2,1,1,'FABIAN ANDRES ARRIETA BLANCO','CEDULA','1045689945','SANTA MARTA','CALLE 43 # 27 - 116','3','30245879632','F.ARRIETA@OUTLOOK.ES','PADRE',1,'2023-07-12 16:39:34','2023-07-22 21:29:56');

/*Table structure for table `alumnos` */

DROP TABLE IF EXISTS `alumnos`;

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
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
  `alu_fecupd` date NOT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `alumnos` */

insert  into `alumnos`(`id_alumno`,`id_grado`,`id_operador`,`id_usuario`,`alu_nombre`,`alu_cladoc`,`alu_docume`,`alu_sexo`,`alu_gposan`,`alu_factrh`,`alu_ciudad`,`alu_direcc`,`alu_estrat`,`alu_telcel`,`alu_correo`,`alu_estado`,`alu_fecnac`,`alu_fecope`,`alu_fecupd`) values 
(1,1,1,9,'MICHELLE ANDREA ARRIETA BOLAÑOS','TARJETA IDENTIDAD','1043698754','FEMENINO','O','POSITIVO','BARRANQUILLA','CARRERA 8E # 41 - 27','3','3024589632','MARRIETA@GMAIL.COM',1,'2013-10-14','2023-07-12','2023-07-22');

/*Table structure for table `auditorias` */

DROP TABLE IF EXISTS `auditorias`;

CREATE TABLE `auditorias` (
  `id_auditoria` int(11) NOT NULL AUTO_INCREMENT,
  `id_operador` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_tipopago` int(11) NOT NULL,
  `aud_mespro` int(11) DEFAULT NULL,
  `aud_numdoc` varchar(45) NOT NULL,
  `aud_valor` varchar(45) NOT NULL,
  `aud_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_auditoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `auditorias` */

insert  into `auditorias`(`id_auditoria`,`id_operador`,`id_alumno`,`id_grado`,`id_tipopago`,`aud_mespro`,`aud_numdoc`,`aud_valor`,`aud_fecope`) values 
(1,1,1,1,1,NULL,'1','1200000','2023-07-12 16:39:34'),
(2,1,1,1,2,1,'2','580000','2023-07-17 18:54:02'),
(3,1,1,1,2,2,'3','580000','2023-07-17 18:54:26'),
(4,1,1,1,2,3,'4','580000','2023-07-17 18:54:36'),
(5,1,1,1,2,4,'5','580000','2023-07-17 18:54:56'),
(6,1,1,1,2,5,'6','580000','2023-07-17 18:56:15'),
(7,1,1,1,2,6,'7','580000','2023-07-17 18:56:22'),
(8,1,1,1,2,7,'8','580000','2023-07-22 21:56:57');

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `id_operador` int(11) NOT NULL,
  `cat_nombre` varchar(45) NOT NULL,
  `cat_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `categorias` */

insert  into `categorias`(`id_categoria`,`id_operador`,`cat_nombre`,`cat_fecope`) values 
(1,1,'ACTA','0000-00-00 00:00:00'),
(2,1,'CERTIFICADO','0000-00-00 00:00:00');

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
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
  `emp_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `empleados` */

/*Table structure for table `facturas` */

DROP TABLE IF EXISTS `facturas`;

CREATE TABLE `facturas` (
  `id_facturas` int(11) NOT NULL AUTO_INCREMENT,
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
  `fac_fecope` varchar(45) NOT NULL,
  PRIMARY KEY (`id_facturas`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `facturas` */

insert  into `facturas`(`id_facturas`,`id_operador`,`id_alumno`,`id_acudiente`,`id_producto`,`id_tippag`,`fac_forpag`,`fac_prefijo`,`fac_cantidad`,`fac_valor`,`fac_detalle`,`fac_fecope`) values 
(1,1,1,2,0,1,'CONTADO','GAV','1','1200000','PAGO MATRICULA PERIODO 2022','2022-01-01'),
(2,1,1,1,0,2,'TRANFERENCIA','GAV','1','580000','PAGO PENSION MES ENERO','2023-01-30'),
(3,1,1,2,0,2,'CONTADO','GAV','1','580000','PAGO PENSION MES FEBRERO','2023-02-18'),
(4,1,1,1,0,2,'CONTADO','GAV','1','580000','PAGO PENSION MES MARZO','2023-03-18'),
(5,1,1,2,0,2,'CONTADO','GAV','1','580000','PAGO PENSION MES ABRIL','2023-04-18'),
(6,1,1,1,0,2,'CONTADO','GAV','1','580000','PAGO PENSION MES MAYO','2023-05-18'),
(7,1,1,2,0,2,'CONTADO','GAV','1','580000','PAGO PENSION MES JUNIO','2023-06-18'),
(8,1,1,1,0,2,'DATAFONO','GAV','1','580000','PAGO PENSION MES JULIO','2023-07-23'),
(9,1,1,2,0,1,'TRANFERENCIA','GAV','1','1200000','PAGO MATRICULA PERIODO 2023','2023-01-01');

/*Table structure for table `grados` */

DROP TABLE IF EXISTS `grados`;

CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `gra_nombre` varchar(45) NOT NULL,
  `gra_matric` varchar(45) NOT NULL,
  `gra_pensio` varchar(45) NOT NULL,
  `gra_canalu` bigint(10) NOT NULL,
  `gra_estado` int(11) DEFAULT 1,
  `gra_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `gra_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `grados` */

insert  into `grados`(`id_grado`,`id_empleado`,`id_operador`,`gra_nombre`,`gra_matric`,`gra_pensio`,`gra_canalu`,`gra_estado`,`gra_fecope`,`gra_fecupd`) values 
(1,0,1,'TRANSICION','1200000','580000',30,1,'2023-07-12 14:17:50','2023-07-12 14:17:50'),
(2,0,1,'PRIMERO','1300000','590000',30,1,'2023-07-22 17:22:19','2023-07-22 17:22:19');

/*Table structure for table `matriculas` */

DROP TABLE IF EXISTS `matriculas`;

CREATE TABLE `matriculas` (
  `id_matricula` int(11) NOT NULL AUTO_INCREMENT,
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
  `mat_fecpropag` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `matriculas` */

insert  into `matriculas`(`id_matricula`,`id_alumno`,`id_grado`,`id_operador`,`id_tipopago`,`mat_numdoc`,`mat_valmat`,`mat_pensio`,`mat_fecope`,`mat_fecmat`,`mat_fecpen`,`mat_fecpropag`) values 
(1,1,1,1,0,'','1200000','580000','2023-07-12 16:39:34','2023-07-12 16:39:34','2023-07-23 00:00:00','2023-07-31 00:00:00');

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `pais_nombre` varchar(45) NOT NULL,
  `pais_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pais` */

insert  into `pais`(`id_pais`,`pais_nombre`,`pais_fecope`) values 
(1,'ALEMANIA','2023-02-01 00:00:00'),
(2,'BRASIL','2023-02-01 00:00:00'),
(3,'COLOMBIA','2023-02-01 00:00:00');

/*Table structure for table `parafiscales` */

DROP TABLE IF EXISTS `parafiscales`;

CREATE TABLE `parafiscales` (
  `id_parafiscal` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) DEFAULT NULL,
  `par_nombre` varchar(45) NOT NULL,
  `par_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `par_nit` varchar(45) NOT NULL,
  PRIMARY KEY (`id_parafiscal`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `parafiscales` */

insert  into `parafiscales`(`id_parafiscal`,`id_tipo`,`par_nombre`,`par_fecope`,`par_nit`) values 
(1,1,'800250119','0000-00-00 00:00:00','2023-06-11 21:13:02'),
(2,1,'805000427','0000-00-00 00:00:00','2023-06-11 21:14:38'),
(3,1,'800130907','0000-00-00 00:00:00','2023-06-11 21:14:50'),
(4,1,'830003564','0000-00-00 00:00:00','2023-06-11 21:15:01'),
(5,1,'800229739','0000-00-00 00:00:00','2023-06-11 21:15:12'),
(6,1,'899999284','0000-00-00 00:00:00','2023-06-11 21:15:23'),
(7,1,'900336004','0000-00-00 00:00:00','2023-06-11 21:15:34'),
(8,1,'900156264','0000-00-00 00:00:00','2023-06-11 21:15:45'),
(9,1,'800251440','0000-00-00 00:00:00','2023-06-11 21:15:55'),
(10,1,'900226715','0000-00-00 00:00:00','2023-06-11 21:16:06'),
(11,1,'806008394','0000-00-00 00:00:00','2023-06-11 21:16:19'),
(12,1,'818000140','0000-00-00 00:00:00','2023-06-11 21:16:31'),
(13,1,'830074184','0000-00-00 00:00:00','2023-06-11 21:16:55'),
(14,1,'901097473','0000-00-00 00:00:00','2023-06-11 21:17:07'),
(15,1,'800227940','0000-00-00 00:00:00','2023-06-11 21:17:32'),
(16,1,'800224808','0000-00-00 00:00:00','2023-06-11 21:17:44'),
(17,1,'800140949','0000-00-00 00:00:00','2023-06-11 21:17:55'),
(18,1,'800088702','0000-00-00 00:00:00','2023-06-11 21:18:07'),
(19,2,'860002183','0000-00-00 00:00:00','2023-06-11 21:18:36'),
(20,2,'800256161','0000-00-00 00:00:00','2023-06-11 21:18:49'),
(21,2,'890903790','0000-00-00 00:00:00','2023-06-11 21:19:04');

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `pro_nombre` varchar(45) NOT NULL,
  `pro_precio` varchar(45) NOT NULL,
  `pro_estado` int(11) NOT NULL DEFAULT 1,
  `pro_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `pro_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `productos` */

insert  into `productos`(`id_producto`,`id_categoria`,`id_operador`,`pro_nombre`,`pro_precio`,`pro_estado`,`pro_fecope`,`pro_fecupd`) values 
(1,1,1,'ACTA GRADO','65000',1,'2023-07-12 14:18:10','2023-07-12 14:18:10');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(45) NOT NULL,
  `rol_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `roles` */

insert  into `roles`(`id_rol`,`rol_nombre`,`rol_descripcion`) values 
(1,'Alumno','Es un Alumno'),
(2,'Docente','Es un Docente'),
(3,'Supervisor','Es un Surpervisor'),
(4,'Administrador','Es un Administrador');

/*Table structure for table `sedes` */

DROP TABLE IF EXISTS `sedes`;

CREATE TABLE `sedes` (
  `id_sedes` int(11) NOT NULL AUTO_INCREMENT,
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
  `sed_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_sedes`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `sedes` */

insert  into `sedes`(`id_sedes`,`id_tipo`,`id_operador`,`sed_razsoc`,`sed_nombre`,`sed_nit`,`sed_correo`,`sed_pagina`,`sed_telcel`,`sed_direcc`,`sed_tipper`,`sed_regime`,`sed_pais`,`sed_depart`,`sed_muni`,`sed_estado`,`sed_fecope`,`sed_fecupd`) values 
(1,2,1,'COLEGIO GIMNASIO LAS AMERICAS','COLEGIO GIMNASIO LAS AMERICA','347001005243','colegiogimnasiolasamericas.edu.co','secretariageneral@colegiogimnasiolasamericas','3245833253','Cra. 33b #9f-27 a 9f-1','1','2','COLOMBIA','MAGDALENA','SANTA MARTA','1','0000-00-00 00:00:00','2023-06-11 16:45:44');

/*Table structure for table `solicitudes` */

DROP TABLE IF EXISTS `solicitudes`;

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL DEFAULT 0,
  `id_venta` int(11) NOT NULL DEFAULT 0,
  `rep_tipo` varchar(45) NOT NULL,
  `rep_detalle` varchar(250) NOT NULL,
  `rep_estado` varchar(45) NOT NULL DEFAULT '0',
  `rep_solucion` varchar(250) NOT NULL DEFAULT '0',
  `rep_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `rep_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_solicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `solicitudes` */

/*Table structure for table `tmp` */

DROP TABLE IF EXISTS `tmp`;

CREATE TABLE `tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_tippag` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tmp` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL DEFAULT 1,
  `id_operador` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL DEFAULT 1,
  `user_usuario` varchar(45) NOT NULL,
  `user_nombre` varchar(100) NOT NULL,
  `user_contra` varchar(255) NOT NULL,
  `user_correo` varchar(45) NOT NULL,
  `user_estado` int(11) NOT NULL DEFAULT 0,
  `user_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_fecupd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`id_rol`,`id_operador`,`id_sede`,`user_usuario`,`user_nombre`,`user_contra`,`user_correo`,`user_estado`,`user_fecope`,`user_fecupd`) values 
(1,4,1,1,'ADMIN','ADMINISTRADOR','202cb962ac59075b964b07152d234b70','ADMIN@GMAIL.COM',1,'2023-06-11 00:00:00','2023-06-12 09:12:46'),
(2,1,1,1,'MARRIETA','MICHELLE ANDREA ARRIETA BOLAÑOS','d41d8cd98f00b204e9800998ecf8427e','MARRIETA@GMAIL.COM',0,'2023-07-11 17:00:57','2023-07-12 13:01:38');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `ven_numdoc` varchar(45) NOT NULL,
  `ven_precio` varchar(45) NOT NULL,
  `ven_fecope` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `ventas` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
