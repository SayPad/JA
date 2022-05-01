CREATE TABLE cargo(
	id_cargo int AUTO_INCREMENT,
	nombre_cargo varchar(30),
	sueldo_semanal varchar (20),
  prima_por_hogar varchar (20),
  status int,
  primary key(id_cargo)
);
INSERT INTO cargo 
(id_cargo, 
nombre_cargo, 
sueldo_semanal, 
prima_por_hogar, 
status)
VALUES ( 
1, 
'root', 
'000', 
'000', 
 3);
CREATE TABLE trabajadores (
	id_cargo int,
  nombre varchar (30),
	apellido varchar (30),
	cedula varchar (8),
	fecha_ingreso date,
	correo varchar(50),
  status int,
	primary key (cedula),
	CONSTRAINT fk_cargo foreign key (id_cargo) references cargo (id_cargo) on delete cascade on update cascade
);
INSERT INTO trabajadores 
(id_cargo, 
nombre, 
apellido, 
cedula, 
fecha_ingreso,
correo,
status)
VALUES (  
1, 
'root', 
'root', 
'1234', 
'2021-11-30',
'root@gmail.com',
 3);
CREATE TABLE roles (
	id_rol int not null AUTO_INCREMENT,
	nombre_rol varchar (20),
	status int,
	primary key (id_rol)
);
INSERT INTO roles 
(id_rol, 
nombre_rol,
status)
VALUES (1,'root', 3);

CREATE TABLE usuarios (
	usuario varchar (15) not null,
	contrasena varchar (32) not null,
	cedula_trabajador varchar (8),
	id_rol int,
	status int,
	primary key (usuario),
	CONSTRAINT fk_rol foreign key (id_rol) references roles (id_rol) on delete cascade on update cascade,
	CONSTRAINT fk_trabajador foreign key (cedula_trabajador) references trabajadores (cedula) on delete cascade on update cascade
);
INSERT INTO usuarios 
(usuario, 
contrasena,
cedula_trabajador, 
id_rol,
status)
VALUES ( 
'root', MD5('root'), 1234, 1,1);


CREATE TABLE modulos (
	id_modulo int not null AUTO_INCREMENT,
	nombre_modulo varchar (20),
	status int,
	primary key (id_modulo)
);
INSERT INTO modulos 
(id_modulo, 
nombre_modulo,
status)
VALUES  (1,'usuarios', 1),
		(2,'trabajadores', 1),
		(3,'cargo', 1),
		(4,'inasistencias', 1),
		(5,'nominas', 1),
		(6,'trabajosExtras', 1),
		(7,'cestaticket', 1),
		(8,'seguridad', 1),
		(9,'reportes', 1);

CREATE TABLE operaciones (
	id_operacion int not null AUTO_INCREMENT, 
	nombre_operacion varchar (10),
	id_modulo int,
	status int,
	primary key (id_operacion),
	CONSTRAINT fk_id_modulo foreign key (id_modulo) references modulos (id_modulo) on delete cascade on update cascade
);
INSERT INTO operaciones 
(id_operacion, 
nombre_operacion,
id_modulo,
status)
VALUES  (1,'agregar', 1, 1),
		(2,'editar', 1, 1),
		(3,'eliminar', 1 ,1),
		(4,'ver', 1 ,1),

		(5,'agregar', 2, 1),
		(6,'editar', 2, 1),
		(7,'eliminar', 2 ,1),
		(8,'ver', 2 ,1),

		(9,'agregar', 3, 1),
		(10,'editar', 3, 1),
		(11,'eliminar', 3 ,1),
		(12,'ver', 3 ,1),

		(13,'agregar', 4, 1),
		(14,'editar', 4, 1),
		(15,'eliminar', 4 ,1),
		(16,'ver', 4 ,1),

		(17,'agregar', 5, 1),
		(18,'eliminar', 5 ,1),
		(19,'ver', 5 ,1),

		(20,'agregar', 6, 1),
		(21,'eliminar', 6 ,1),
		(22,'ver', 6 ,1),

		(23,'agregar', 7, 1),
		(24,'eliminar', 7 ,1),
		(25,'ver', 7 ,1),

		(26,'agregar', 8, 1),
		(27,'editar', 8, 1),
		(28,'eliminar', 8 ,1),
		(29,'ver', 8 ,1),

		(30,'ver', 9 ,1)
;



CREATE TABLE rol_operacion (
	id_rol_operacion int not null AUTO_INCREMENT,
	id_rol int,
	id_operacion int,
	status int,
	primary key (id_rol_operacion),
	CONSTRAINT fk1_id_rol foreign key (id_rol) references roles (id_rol) on delete cascade on update cascade,
	CONSTRAINT fk2_id_operacion foreign key (id_operacion) references operaciones (id_operacion) on delete cascade on update cascade
);
INSERT INTO rol_operacion 
(id_rol_operacion, 
id_rol,
id_operacion,
status)

VALUES	(1, 1, 1, 1),
		(2, 1, 2, 1),
		(3, 1, 3, 1),
		(4, 1, 4, 1),
		(5, 1, 5, 1),
		(6, 1, 6, 1),
		(7, 1, 7, 1),
		(8, 1, 8, 1),
		(9, 1, 9, 1),
		(10, 1, 10, 1),
		(11, 1, 11, 1),
		(12, 1, 12, 1),
		(13, 1, 13, 1),
		(14, 1, 14, 1),
		(15, 1, 15, 1),
		(16, 1, 16, 1),
		(17, 1, 17, 1),
		(18, 1, 18, 1),
		(19, 1, 19, 1),
		(20, 1, 20, 1),
		(21, 1, 21, 1),
		(22, 1, 22, 1),
		(23, 1, 23, 1),
		(24, 1, 24, 1),
		(25, 1, 25, 1),
		(26, 1, 26, 1),
		(27, 1, 27, 1),
		(28, 1, 28, 1),
		(29, 1, 29, 1),
		(30, 1, 30, 1);


CREATE TABLE dolar (
	id_dolar int not null,
	valor_actual varchar (15),
	fecha_actualizacion date,
	status int,
	primary key (id_dolar)
);
INSERT INTO dolar (id_dolar, valor_actual, fecha_actualizacion, status)
VALUES (1, '4.5', 0123-03-12, 1);

CREATE TABLE permiso (
  id_permiso int AUTO_INCREMENT,
  cedula_trabajador varchar (8),
  descripcion varchar(7),
  desde date,
  hasta date ,
  status int,
  PRIMARY KEY (id_permiso),
  CONSTRAINT fk_permiso_trabajador FOREIGN KEY (cedula_trabajador) REFERENCES trabajadores (cedula) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE trabajosextras (
	id_trabajosExtras int AUTO_INCREMENT,
	cedula_trabajador varchar (8),
	fecha_trabajo date,
	descripcion_trabajo varchar (210),
	tipo_pago varchar (15),
	fecha_pago date,
	descripcion varchar (50),
	cantidad varchar (20),
	total_unidad varchar (20),
	total_pagar varchar (20),
	status int,
	primary key (id_trabajosExtras),
	CONSTRAINT fk1_trabajador foreign key (cedula_trabajador) references trabajadores (cedula) on delete cascade on update cascade
);


CREATE TABLE nomina (
	id_nomina int AUTO_INCREMENT,
	cedula_trabajador varchar (8),
	periodo_desde date,
	periodo_hasta date,
	fecha_pago date,
	tipo_pago varchar (20),
	horas_extras int,
	ivss varchar(20),
	rpe varchar(20), 
	faov varchar(20),
	inces varchar(20),
	total_pagar_nomina varchar(20),
	inasistencias int,
	status int,
	primary key (id_nomina),
	CONSTRAINT fk2_trabajador foreign key (cedula_trabajador) references trabajadores (cedula) on delete cascade on update cascade
);
CREATE TABLE deducciones (
	id_deducciones int not null AUTO_INCREMENT,
	ivss varchar (10),
	rpe varchar (10),
	faov varchar (10),
	inces varchar (10),
	primary key (id_deducciones)
);
INSERT INTO `deducciones` (`id_deducciones`, `ivss`, `rpe`, `faov`, `inces`) VALUES (NULL, '4', '0.5', '1', '0');
CREATE TABLE bonos (
	id_bono int not null AUTO_INCREMENT,
	nombre_bono varchar (50),
	valor varchar (20),
	dias int,
	nombre_cargo int,
	moneda int,
  status int,
	primary key (id_bono),
	CONSTRAINT fk_cargo_bonos foreign key (nombre_cargo) references cargo (id_cargo) on delete cascade on update cascade
);

CREATE TABLE recibos_bonos (
	id_recibo_bono int AUTO_INCREMENT,
	id_bono int,
	cedula_trabajador varchar (8),
	periodo_desde date,
	periodo_hasta date,
	fecha_pago date,
	tipo_pago varchar (20),
	total_pagar varchar(20),
	inasistencias int,
	valor_actual varchar (15),
	status int,
	primary key (id_recibo_bono),
	CONSTRAINT fk3_trabajador foreign key (cedula_trabajador) references trabajadores (cedula) on delete cascade on update cascade,
	CONSTRAINT id2_bono foreign key (id_bono) references bonos (id_bono) on delete cascade on update cascade
);

CREATE TABLE bitacora (
	id_bitacora int AUTO_INCREMENT,
	usuario varchar(15),
	operacion varchar (60),
	fecha datetime,
	tabla varchar (20),
	status int,
    primary key(id_bitacora)
);