--
-- Base de datos: bd_alas
--

-- Elimina la base de datos, si existe
DROP DATABASE IF EXISTS bd_alas;

-- Crea la base de datos bd_alas
CREATE DATABASE bd_alas DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- Selecciona la base de datos a utilizar
USE bd_alas;

-- --------------------------------------------------------
-- Crea las tablas de la base de datos
-- --------------------------------------------------------

-- Tabla clasificacióon

CREATE TABLE tbl_clasificacion (
  id_clasificacion int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de clasificacion',
  clasificacion varchar(30) NOT NULL COMMENT 'Clasificacion del Producto',
  PRIMARY KEY (id_clasificacion)
) COMMENT 'Tabla de clasificacion';

-- Tabla roles

CREATE TABLE tbl_roles (
  id_rol int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Rol',
  tipo_rol varchar (30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Roles de Usuario',
  PRIMARY KEY (id_rol)
) COMMENT 'Tabla de Roles';

-- Tabla proveedores

CREATE TABLE tbl_proveedores (
  id_proveedor int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Proveedor',
  rif_proveedor varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Rif del Proveedor',
  nombre_proveedor varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del Proveedor',
  numero_contacto varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Numero de Contacto del Proveedor',
  persona_contacto varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Persona de Contacto del Proveedor',
  correo_proveedor varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Correo del Proveedor',
  dia_pedido date NOT NULL COMMENT 'Fecha del Pedido',
  dia_despacho date NOT NULL COMMENT 'Fecha del Despacho',
  credito int(3) NOT NULL COMMENT 'Dias de Credito',
  PRIMARY KEY (id_proveedor)
) COMMENT 'Tabla de los Proveedores';


-- Tabla usuarios

CREATE TABLE tbl_usuarios (
  id_usuario int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del usuario',
  usuario varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre de Usuario',
  clave_usuario varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Clave del Usuario',
  cedula_usuario varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cedula del Usuario',
  nombre_usuario varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del Usuario',
  apellido_usuario varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Apellido del Usuario',
  correo_usuario varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Correo del Usuario',
  direccion_usuario varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Direccion del Usuario',
  PRIMARY KEY (id_usuario)
) COMMENT 'Tabla de Usuarios';

-- Tabla auditoria

CREATE TABLE tbl_auditoria (
  id_auditoria int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la Auditoria',
  usuario_aud varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del Usuario',
  tiemporegistro_aud datetime NOT NULL COMMENT 'Tiempo de Registro',
  accion_aud varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Accion Efectuada',
  query_aud text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Consultas',
  id_usuario int(11) NOT NULL COMMENT 'Id del Usuario',
  PRIMARY KEY (id_auditoria)
) COMMENT 'Tabla de Auditoria';

-- Tabla productos

CREATE TABLE tbl_productos (
  id_producto int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Producto',
  codigo varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Codigo del Producto',
  clasificacion varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Clasificacion del Producto',
  descripcion varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Descripcion del Producto',
  costo int(20) NOT NULL COMMENT 'Precio del Producto',
  existencia int(4) NOT NULL COMMENT 'Exitencia del Producto',
  observaciones varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Observaciones del Producto',
  id_clasificacion int(11) NOT NULL COMMENT 'Id de la Clasificación',
  id_proveedor int(11) NOT NULL COMMENT 'Id del Proveedor',
  id_usuario int(11) NOT NULL COMMENT 'Id del usuario',
  PRIMARY KEY (id_producto),
  FOREIGN KEY (id_clasificacion) REFERENCES tbl_clasificacion (id_clasificacion),
  FOREIGN KEY (id_proveedor) REFERENCES tbl_proveedores (id_proveedor),
  FOREIGN KEY (id_usuario) REFERENCES tbl_usuarios (id_usuario)
) COMMENT 'Tabla de Productos';

-- Tabla de Entrada

CREATE TABLE tbl_entrada (
	id_entrada int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Entrada',
	fecha_entrada date NOT NULL COMMENT 'Fecha de Entrada del Producto',
	cantidad_entrada int(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cantidad de Entrada',
	costo_producto decimal (11,2),
	id_proveedor int (11) NOT NULL COMMENT 'Id del Proveedor',
	id_producto int (11) NOT NULL COMMENT 'Id del Producto',
	PRIMARY KEY (id_entrada),
	FOREIGN KEY (id_producto) REFERENCES tbl_productos (id_producto)
)	COMMENT 'Tabla Entrada';

-- Tabla de Salida

CREATE TABLE tbl_salida (
	id_salida int (11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Salida',
	fecha_salida date NOT NULL COMMENT 'Fecha de Salida del Producto',
	cantidad_salida int(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cantidad de Salida',
	id_producto int (11) NOT NULL COMMENT 'Id del Producto',
	PRIMARY KEY (id_salida),
	FOREIGN KEY (id_producto) REFERENCES tbl_productos (id_producto)
)	COMMENT 'Tabla Salida';

