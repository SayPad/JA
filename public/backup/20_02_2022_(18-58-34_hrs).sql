SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS j_a;

USE j_a;

DROP TABLE IF EXISTS bitacora;

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) COLLATE utf8mb4_bin DEFAULT NULL,
  `operacion` varchar(60) COLLATE utf8mb4_bin DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `tabla` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;




DROP TABLE IF EXISTS cargo;

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(30) COLLATE utf8mb4_bin DEFAULT NULL,
  `sueldo_semanal` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `prima_por_hogar` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `bono_compensacion` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `bono_cestaticket` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO cargo VALUES("1","root","000","000","000","000","3");



DROP TABLE IF EXISTS cestaticket;

CREATE TABLE `cestaticket` (
  `id_cestaticket` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) DEFAULT NULL,
  `periodo_desde` date DEFAULT NULL,
  `periodo_hasta` date DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `tipo_pago` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `total_pagar` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `inasistencias` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cestaticket`),
  KEY `fk3_trabajador` (`id_trabajador`),
  CONSTRAINT `fk3_trabajador` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;




DROP TABLE IF EXISTS dolar;

CREATE TABLE `dolar` (
  `id_dolar` int(11) NOT NULL,
  `valor_actual` varchar(15) COLLATE utf8mb4_bin DEFAULT NULL,
  `fecha_actualizacion` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dolar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO dolar VALUES("1","4.5","2000-01-08","1");



DROP TABLE IF EXISTS falta;

CREATE TABLE `falta` (
  `id_falta` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_falta`),
  KEY `fk_falta_trabajador` (`id_trabajador`),
  CONSTRAINT `fk_falta_trabajador` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;




DROP TABLE IF EXISTS modulos;

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_modulo` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO modulos VALUES("1","usuarios","1");
INSERT INTO modulos VALUES("2","trabajadores","1");
INSERT INTO modulos VALUES("3","cargo","1");
INSERT INTO modulos VALUES("4","inasistencias","1");
INSERT INTO modulos VALUES("5","nominas","1");
INSERT INTO modulos VALUES("6","trabajosExtras","1");
INSERT INTO modulos VALUES("7","cestaticket","1");
INSERT INTO modulos VALUES("8","seguridad","1");
INSERT INTO modulos VALUES("9","reportes","1");



DROP TABLE IF EXISTS nomina;

CREATE TABLE `nomina` (
  `id_nomina` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) DEFAULT NULL,
  `id_dolar` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `periodo_desde` date DEFAULT NULL,
  `periodo_hasta` date DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `tipo_pago` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `horas_extras` int(11) DEFAULT NULL,
  `ivss` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `rpe` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `faov` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `inces` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `total_pagar_nomina` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `total_pagar_bono` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `inasistencias` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nomina`),
  KEY `fk2_trabajador` (`id_trabajador`),
  CONSTRAINT `fk2_trabajador` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;




DROP TABLE IF EXISTS operaciones;

CREATE TABLE `operaciones` (
  `id_operacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_operacion` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_operacion`),
  KEY `fk_id_modulo` (`id_modulo`),
  CONSTRAINT `fk_id_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO operaciones VALUES("1","agregar","1","1");
INSERT INTO operaciones VALUES("2","editar","1","1");
INSERT INTO operaciones VALUES("3","eliminar","1","1");
INSERT INTO operaciones VALUES("4","ver","1","1");
INSERT INTO operaciones VALUES("5","agregar","2","1");
INSERT INTO operaciones VALUES("6","editar","2","1");
INSERT INTO operaciones VALUES("7","eliminar","2","1");
INSERT INTO operaciones VALUES("8","ver","2","1");
INSERT INTO operaciones VALUES("9","agregar","3","1");
INSERT INTO operaciones VALUES("10","editar","3","1");
INSERT INTO operaciones VALUES("11","eliminar","3","1");
INSERT INTO operaciones VALUES("12","ver","3","1");
INSERT INTO operaciones VALUES("13","agregar","4","1");
INSERT INTO operaciones VALUES("14","editar","4","1");
INSERT INTO operaciones VALUES("15","eliminar","4","1");
INSERT INTO operaciones VALUES("16","ver","4","1");
INSERT INTO operaciones VALUES("17","agregar","5","1");
INSERT INTO operaciones VALUES("18","eliminar","5","1");
INSERT INTO operaciones VALUES("19","ver","5","1");
INSERT INTO operaciones VALUES("20","agregar","6","1");
INSERT INTO operaciones VALUES("21","eliminar","6","1");
INSERT INTO operaciones VALUES("22","ver","6","1");
INSERT INTO operaciones VALUES("23","agregar","7","1");
INSERT INTO operaciones VALUES("24","eliminar","7","1");
INSERT INTO operaciones VALUES("25","ver","7","1");
INSERT INTO operaciones VALUES("26","agregar","8","1");
INSERT INTO operaciones VALUES("27","editar","8","1");
INSERT INTO operaciones VALUES("28","eliminar","8","1");
INSERT INTO operaciones VALUES("29","ver","8","1");
INSERT INTO operaciones VALUES("30","ver","9","1");



DROP TABLE IF EXISTS permiso;

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) DEFAULT NULL,
  `descripcion` varchar(7) COLLATE utf8mb4_bin DEFAULT NULL,
  `desde` date DEFAULT NULL,
  `hasta` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_permiso`),
  KEY `fk_permiso_trabajador` (`id_trabajador`),
  CONSTRAINT `fk_permiso_trabajador` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;




DROP TABLE IF EXISTS rol_operacion;

CREATE TABLE `rol_operacion` (
  `id_rol_operacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) DEFAULT NULL,
  `id_operacion` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rol_operacion`),
  KEY `fk1_id_rol` (`id_rol`),
  KEY `fk2_id_operacion` (`id_operacion`),
  CONSTRAINT `fk1_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk2_id_operacion` FOREIGN KEY (`id_operacion`) REFERENCES `operaciones` (`id_operacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO rol_operacion VALUES("1","1","1","1");
INSERT INTO rol_operacion VALUES("2","1","2","1");
INSERT INTO rol_operacion VALUES("3","1","3","1");
INSERT INTO rol_operacion VALUES("4","1","4","1");
INSERT INTO rol_operacion VALUES("5","1","5","1");
INSERT INTO rol_operacion VALUES("6","1","6","1");
INSERT INTO rol_operacion VALUES("7","1","7","1");
INSERT INTO rol_operacion VALUES("8","1","8","1");
INSERT INTO rol_operacion VALUES("9","1","9","1");
INSERT INTO rol_operacion VALUES("10","1","10","1");
INSERT INTO rol_operacion VALUES("11","1","11","1");
INSERT INTO rol_operacion VALUES("12","1","12","1");
INSERT INTO rol_operacion VALUES("13","1","13","1");
INSERT INTO rol_operacion VALUES("14","1","14","1");
INSERT INTO rol_operacion VALUES("15","1","15","1");
INSERT INTO rol_operacion VALUES("16","1","16","1");
INSERT INTO rol_operacion VALUES("17","1","17","1");
INSERT INTO rol_operacion VALUES("18","1","18","1");
INSERT INTO rol_operacion VALUES("19","1","19","1");
INSERT INTO rol_operacion VALUES("20","1","20","1");
INSERT INTO rol_operacion VALUES("21","1","21","1");
INSERT INTO rol_operacion VALUES("22","1","22","1");
INSERT INTO rol_operacion VALUES("23","1","23","1");
INSERT INTO rol_operacion VALUES("24","1","24","1");
INSERT INTO rol_operacion VALUES("25","1","25","1");
INSERT INTO rol_operacion VALUES("26","1","26","1");
INSERT INTO rol_operacion VALUES("27","1","27","1");
INSERT INTO rol_operacion VALUES("28","1","28","1");
INSERT INTO rol_operacion VALUES("29","1","29","1");
INSERT INTO rol_operacion VALUES("30","1","30","1");



DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO roles VALUES("1","root","3");



DROP TABLE IF EXISTS trabajadores;

CREATE TABLE `trabajadores` (
  `id_trabajador` int(11) NOT NULL AUTO_INCREMENT,
  `id_cargo` int(11) DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_bin DEFAULT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_bin DEFAULT NULL,
  `cedula` varchar(8) COLLATE utf8mb4_bin DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_trabajador`),
  KEY `fk_cargo` (`id_cargo`),
  CONSTRAINT `fk_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO trabajadores VALUES("1","1","root","root","1234","2021-11-30","root@gmail.com","3");



DROP TABLE IF EXISTS trabajosextras;

CREATE TABLE `trabajosextras` (
  `id_trabajosExtras` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) DEFAULT NULL,
  `fecha_trabajo` date DEFAULT NULL,
  `descripcion_trabajo` varchar(210) COLLATE utf8mb4_bin DEFAULT NULL,
  `tipo_pago` varchar(15) COLLATE utf8mb4_bin DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `cantidad` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `total_unidad` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `total_pagar` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_trabajosExtras`),
  KEY `fk1_trabajador` (`id_trabajador`),
  CONSTRAINT `fk1_trabajador` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;




DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `contrasena` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_rol` (`id_rol`),
  KEY `fk_trabajador` (`id_trabajador`),
  CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_trabajador` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id_trabajador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO usuarios VALUES("1","root","63a9f0ea7bb98050796b649e85481845","1","1","1");



SET FOREIGN_KEY_CHECKS=1;