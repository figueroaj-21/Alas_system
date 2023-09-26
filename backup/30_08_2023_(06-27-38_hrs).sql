SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS bd_alas;

USE bd_alas;

DROP TABLE IF EXISTS tbl_auditoria;

CREATE TABLE `tbl_auditoria` (
  `id_auditoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la Auditoria',
  `usuario_aud` varchar(20) NOT NULL COMMENT 'Nombre del Usuario',
  `tiemporegistro_aud` date NOT NULL COMMENT 'Tiempo de Registro',
  `accion_aud` varchar(250) NOT NULL COMMENT 'Accion Efectuada',
  `query_aud` text NOT NULL COMMENT 'Consultas',
  `id_usuario` int(11) NOT NULL COMMENT 'Id del Usuario',
  PRIMARY KEY (`id_auditoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Auditoria';




DROP TABLE IF EXISTS tbl_clasificacion;

CREATE TABLE `tbl_clasificacion` (
  `id_clasificacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de clasificacion',
  `clasificacion` varchar(30) NOT NULL COMMENT 'Clasificacion del Producto',
  PRIMARY KEY (`id_clasificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de clasificacion';




DROP TABLE IF EXISTS tbl_entrada;

CREATE TABLE `tbl_entrada` (
  `id_entrada` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Entrada',
  `fecha_entrada` date NOT NULL COMMENT 'Fecha de Entrada del Producto',
  `cantidad_entrada` int(10) NOT NULL COMMENT 'Cantidad de Entrada',
  `costo_producto` decimal(11,2) DEFAULT NULL COMMENT 'Costo del Producto',
  `factura_compra` varchar(15) NOT NULL COMMENT 'Numero de Factura de Compra',
  `id_producto` int(11) NOT NULL COMMENT 'Id del Producto',
  PRIMARY KEY (`id_entrada`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `tbl_entrada_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla Entrada';




DROP TABLE IF EXISTS tbl_productos;

CREATE TABLE `tbl_productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Producto',
  `codigo` varchar(10) NOT NULL COMMENT 'Codigo del Producto',
  `descripcion` varchar(30) NOT NULL COMMENT 'Descripcion del Producto',
  `costo` varchar(50) NOT NULL COMMENT 'Precio del Producto',
  `existencia` int(4) NOT NULL COMMENT 'Exitencia del Producto',
  `stock_minimo` int(8) NOT NULL COMMENT 'Stock mínimo del producto',
  `observaciones` varchar(80) NOT NULL COMMENT 'Observaciones del Producto',
  `estado_producto` int(2) NOT NULL COMMENT 'Estado del producto',
  `id_clasificacion` int(11) NOT NULL COMMENT 'Id de la Clasificación',
  `id_proveedor` int(11) NOT NULL COMMENT 'Id del Proveedor',
  `id_usuario` int(11) NOT NULL COMMENT 'Id del usuario',
  PRIMARY KEY (`id_producto`),
  KEY `id_clasificacion` (`id_clasificacion`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tbl_productos_ibfk_1` FOREIGN KEY (`id_clasificacion`) REFERENCES `tbl_clasificacion` (`id_clasificacion`),
  CONSTRAINT `tbl_productos_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `tbl_proveedores` (`id_proveedor`),
  CONSTRAINT `tbl_productos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Productos';




DROP TABLE IF EXISTS tbl_proveedores;

CREATE TABLE `tbl_proveedores` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Proveedor',
  `rif_proveedor` varchar(20) NOT NULL COMMENT 'Rif del Proveedor',
  `nombre_proveedor` varchar(20) NOT NULL COMMENT 'Nombre del Proveedor',
  `numero_contacto` varchar(15) NOT NULL COMMENT 'Numero de Contacto del Proveedor',
  `persona_contacto` varchar(20) NOT NULL COMMENT 'Persona de Contacto del Proveedor',
  `correo_proveedor` varchar(30) NOT NULL COMMENT 'Correo del Proveedor',
  `estado_proveedor` int(2) NOT NULL COMMENT 'Estado del Proveedor',
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de los Proveedores';




DROP TABLE IF EXISTS tbl_salida;

CREATE TABLE `tbl_salida` (
  `id_salida` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Salida',
  `fecha_salida` date NOT NULL COMMENT 'Fecha de Salida del Producto',
  `cantidad_salida` int(10) NOT NULL COMMENT 'Cantidad de Salida',
  `factura_venta` varchar(15) NOT NULL COMMENT 'Numero de Factura de Venta',
  `id_producto` int(11) NOT NULL COMMENT 'Id del Producto',
  PRIMARY KEY (`id_salida`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `tbl_salida_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla Salida';




DROP TABLE IF EXISTS tbl_usuarios;

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del usuario',
  `login_usuario` varchar(20) NOT NULL COMMENT 'Nombre de Usuario',
  `clave_usuario` varchar(350) NOT NULL COMMENT 'Clave del Usuario',
  `cedula_usuario` varchar(15) NOT NULL COMMENT 'Cedula del Usuario',
  `nombre_usuario` varchar(20) NOT NULL COMMENT 'Nombre del Usuario',
  `apellido_usuario` varchar(20) NOT NULL COMMENT 'Apellido del Usuario',
  `correo_usuario` varchar(30) NOT NULL COMMENT 'Correo del Usuario',
  `direccion_usuario` varchar(80) NOT NULL COMMENT 'Direccion del Usuario',
  `nivel_usuario` int(2) NOT NULL COMMENT 'Nivel de Usuario',
  `estado_usuario` int(2) NOT NULL COMMENT 'Estado del Usuario',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Usuarios';

INSERT INTO tbl_usuarios VALUES("41","cachapa_frita","$2y$10$LLVAnkz1CSK22N01.llQDeD2EJ6fKQq6MgO5t/cKPNwz/X7WnkevO","9686805","Cachapa","Frita","cachapafrita_lomejor@gmail.com","su casa","2","1");



SET FOREIGN_KEY_CHECKS=1;