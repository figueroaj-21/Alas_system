SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS bd_alas;

USE bd_alas;

DROP TABLE IF EXISTS tbl_auditoria;

CREATE TABLE `tbl_auditoria` (
  `id_auditoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la Auditoria',
  `usuario_aud` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del Usuario',
  `tiemporegistro_aud` date NOT NULL COMMENT 'Tiempo de Registro',
  `accion_aud` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Accion Efectuada',
  `query_aud` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Consultas',
  `id_usuario` int(11) NOT NULL COMMENT 'Id del Usuario',
  PRIMARY KEY (`id_auditoria`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Auditoria';

INSERT INTO tbl_auditoria VALUES("1","chicha_e_pasta","2023-08-09","El usuario [chicha_e_pasta] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("2","cachapa_frita","2023-08-09","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("3","cachapa_frita","2023-08-09","El usuario [cachapa_frita] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("4","cachapa_frita","2023-08-10","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("5","cachapa_frita","2023-08-10","El usuario [cachapa_frita] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("6","cachapa_frita","2023-08-10","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("7","cachapa_frita","2023-08-10","El usuario [cachapa_frita] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("8","cachapa_frita","2023-08-10","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("9","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ la clasificacion [Bebidas]","","0");
INSERT INTO tbl_auditoria VALUES("10","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ al Proveedor [juan enterprisse]","","0");
INSERT INTO tbl_auditoria VALUES("11","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ el producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("12","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("13","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ el producto [Pepsi cola 2lts]","","0");
INSERT INTO tbl_auditoria VALUES("14","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ una entrada del producto [Pepsi cola 2lts]","","0");
INSERT INTO tbl_auditoria VALUES("15","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ una salida del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("16","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ una salida del producto [Pepsi cola 2lts]","","0");
INSERT INTO tbl_auditoria VALUES("17","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ una salida del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("18","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ una salida del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("19","cachapa_frita","2023-08-10","El usuario [cachapa_frita] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("20","cachapa_frita","2023-08-10","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("21","cachapa_frita","2023-08-10","El usuario [cachapa_frita] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("22","cachapa_frita","2023-08-10","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("23","cachapa_frita","2023-08-10","El usuario [cachapa_frita] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("24","cachapa_frita","2023-08-10","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("25","cachapa_frita","2023-08-10","El usuario [cachapa_frita] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("26","cachapa_frita","2023-08-10","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("27","cachapa_frita","2023-08-10","El usuario [cachapa_frita] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("28","chicha_e_pasta","2023-08-10","El usuario [chicha_e_pasta] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("29","chicha_e_pasta","2023-08-10","El usuario [chicha_e_pasta] actualizÃ³ su contraseÃ±a","","0");
INSERT INTO tbl_auditoria VALUES("30","chicha_e_pasta","2023-08-10","El usuario [chicha_e_pasta] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("31","cachapa_frita","2023-08-10","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("32","cachapa_frita","2023-08-10","El usuario [cachapa_frita] realizÃ³ un respaldo de la base de datos","","0");
INSERT INTO tbl_auditoria VALUES("33","cachapa_frita","2023-08-10","El usuario [cachapa_frita] realizÃ³ un respaldo de la base de datos","","0");
INSERT INTO tbl_auditoria VALUES("34","cachapa_frita","2023-08-10","El usuario [cachapa_frita] realizÃ³ un respaldo de la base de datos","","0");
INSERT INTO tbl_auditoria VALUES("35","cachapa_frita","2023-08-10","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("36","cachapa_frita","2023-08-10","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("37","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ el producto [frescolita]","","0");
INSERT INTO tbl_auditoria VALUES("38","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ el producto [chinoto]","","0");
INSERT INTO tbl_auditoria VALUES("39","cachapa_frita","2023-08-10","El usuario [cachapa_frita] registrÃ³ una salida del producto [chinoto]","","0");
INSERT INTO tbl_auditoria VALUES("40","cachapa_frita","2023-08-10","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("41","cachapa_frita","2023-08-10","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("42","cachapa_frita","2023-08-10","El usuario [cachapa_frita] actualizÃ³ su contraseÃ±a","","0");
INSERT INTO tbl_auditoria VALUES("43","cachapa_frita","2023-08-10","El usuario [cachapa_frita] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("44","cachapa_frita","2023-08-10","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("45","cachapa_frita","2023-08-10","El usuario [cachapa_frita] realizÃ³ un respaldo de la base de datos","","0");
INSERT INTO tbl_auditoria VALUES("46","cachapa_frita","2023-08-13","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("47","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("48","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Clasificaciones","","0");
INSERT INTO tbl_auditoria VALUES("49","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("50","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Clasificaciones","","0");
INSERT INTO tbl_auditoria VALUES("51","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("52","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de ProveedoresSS","","0");
INSERT INTO tbl_auditoria VALUES("53","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos en Stock Minimo","","0");
INSERT INTO tbl_auditoria VALUES("54","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos en Stock Minimo","","0");
INSERT INTO tbl_auditoria VALUES("55","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos en Stock Minimo","","0");
INSERT INTO tbl_auditoria VALUES("56","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos en Stock Minimo","","0");
INSERT INTO tbl_auditoria VALUES("57","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos en Stock Minimo","","0");
INSERT INTO tbl_auditoria VALUES("58","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos en Stock Minimo","","0");
INSERT INTO tbl_auditoria VALUES("59","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos en Stock Minimo","","0");
INSERT INTO tbl_auditoria VALUES("60","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos en Stock Minimo","","0");
INSERT INTO tbl_auditoria VALUES("61","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos en Stock Minimo","","0");
INSERT INTO tbl_auditoria VALUES("62","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Clasificaciones","","0");
INSERT INTO tbl_auditoria VALUES("63","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Clasificaciones","","0");
INSERT INTO tbl_auditoria VALUES("64","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Clasificaciones","","0");
INSERT INTO tbl_auditoria VALUES("65","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("66","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de ProveedoresSS","","0");
INSERT INTO tbl_auditoria VALUES("67","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de ProveedoresSS","","0");
INSERT INTO tbl_auditoria VALUES("68","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de ProveedoresSS","","0");
INSERT INTO tbl_auditoria VALUES("69","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de ProveedoresSS","","0");
INSERT INTO tbl_auditoria VALUES("70","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de ProveedoresSS","","0");
INSERT INTO tbl_auditoria VALUES("71","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de ProveedoresSS","","0");
INSERT INTO tbl_auditoria VALUES("72","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de ProveedoresSS","","0");
INSERT INTO tbl_auditoria VALUES("73","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de ProveedoresSS","","0");
INSERT INTO tbl_auditoria VALUES("74","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de ProveedoresSS","","0");
INSERT INTO tbl_auditoria VALUES("75","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de ProveedoresSS","","0");
INSERT INTO tbl_auditoria VALUES("76","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Usuarios","","0");
INSERT INTO tbl_auditoria VALUES("77","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Usuarios Inhabilitados","","0");
INSERT INTO tbl_auditoria VALUES("78","cachapa_frita","2023-08-13","El usuario [cachapa_frita] inhabilitÃ³ el producto [Pepsi cola 2lts]","","0");
INSERT INTO tbl_auditoria VALUES("79","cachapa_frita","2023-08-13","El usuario [cachapa_frita] inhabilitÃ³ el producto [chinoto]","","0");
INSERT INTO tbl_auditoria VALUES("80","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ al Proveedor [nxnsx]","","0");
INSERT INTO tbl_auditoria VALUES("81","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("82","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos Inhabilitados","","0");
INSERT INTO tbl_auditoria VALUES("83","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Proveedores Inhabilitados","","0");
INSERT INTO tbl_auditoria VALUES("84","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [frescolita]","","0");
INSERT INTO tbl_auditoria VALUES("85","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("86","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("87","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("88","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("89","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("90","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("91","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("92","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("93","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("94","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("95","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("96","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("97","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("98","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("99","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("100","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("101","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("102","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("103","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una entrada del producto [glup cola 2lt]","","0");
INSERT INTO tbl_auditoria VALUES("104","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una salida del producto [frescolita]","","0");
INSERT INTO tbl_auditoria VALUES("105","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una salida del producto [frescolita]","","0");
INSERT INTO tbl_auditoria VALUES("106","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una salida del producto [frescolita]","","0");
INSERT INTO tbl_auditoria VALUES("107","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una salida del producto [frescolita]","","0");
INSERT INTO tbl_auditoria VALUES("108","cachapa_frita","2023-08-13","El usuario [cachapa_frita] registrÃ³ una salida del producto [frescolita]","","0");
INSERT INTO tbl_auditoria VALUES("109","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("110","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("111","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("112","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("113","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("114","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("115","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("116","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("117","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Productos","","0");
INSERT INTO tbl_auditoria VALUES("118","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Entrada de Productos por Periodo","","0");
INSERT INTO tbl_auditoria VALUES("119","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Clasificaciones","","0");
INSERT INTO tbl_auditoria VALUES("120","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Clasificaciones","","0");
INSERT INTO tbl_auditoria VALUES("121","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Entrada de Productos por Periodo","","0");
INSERT INTO tbl_auditoria VALUES("122","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Entrada de Productos por Periodo","","0");
INSERT INTO tbl_auditoria VALUES("123","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Entrada de Productos por Periodo","","0");
INSERT INTO tbl_auditoria VALUES("124","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Entrada de Productos por Periodo","","0");
INSERT INTO tbl_auditoria VALUES("125","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Entrada de Productos por Periodo","","0");
INSERT INTO tbl_auditoria VALUES("126","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Entrada de Productos por Periodo","","0");
INSERT INTO tbl_auditoria VALUES("127","cachapa_frita","2023-08-13","El usuario [cachapa_frita] generÃ³ un reporte general de Entrada de Productos por Periodo","","0");
INSERT INTO tbl_auditoria VALUES("128","cachapa_frita","2023-08-13","El usuario [cachapa_frita] cerrÃ³ sesiÃ³n","","0");
INSERT INTO tbl_auditoria VALUES("129","cachapa_frita","2023-08-13","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");
INSERT INTO tbl_auditoria VALUES("130","cachapa_frita","2023-08-14","El usuario [cachapa_frita] iniciÃ³ sesiÃ³n como usuario","","0");



DROP TABLE IF EXISTS tbl_clasificacion;

CREATE TABLE `tbl_clasificacion` (
  `id_clasificacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de clasificacion',
  `clasificacion` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Clasificacion del Producto',
  PRIMARY KEY (`id_clasificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de clasificacion';

INSERT INTO tbl_clasificacion VALUES("1","Bebidas");



DROP TABLE IF EXISTS tbl_entrada;

CREATE TABLE `tbl_entrada` (
  `id_entrada` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Entrada',
  `fecha_entrada` date NOT NULL COMMENT 'Fecha de Entrada del Producto',
  `cantidad_entrada` int(10) NOT NULL COMMENT 'Cantidad de Entrada',
  `costo_producto` decimal(11,2) DEFAULT NULL COMMENT 'Costo del Producto',
  `factura_compra` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Numero de Factura de Compra',
  `id_producto` int(11) NOT NULL COMMENT 'Id del Producto',
  PRIMARY KEY (`id_entrada`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `tbl_entrada_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla Entrada';

INSERT INTO tbl_entrada VALUES("1","2023-08-09","500","25.00","","1");
INSERT INTO tbl_entrada VALUES("2","2023-08-02","500","35.00","","2");
INSERT INTO tbl_entrada VALUES("3","0000-00-00","0","50.00","","3");
INSERT INTO tbl_entrada VALUES("4","0000-00-00","0","25.00","","1");
INSERT INTO tbl_entrada VALUES("5","0000-00-00","0","25.00","","1");
INSERT INTO tbl_entrada VALUES("6","0000-00-00","0","25.00","","1");
INSERT INTO tbl_entrada VALUES("7","2023-08-13","200","25.00","","1");
INSERT INTO tbl_entrada VALUES("8","2023-08-13","10","25.00","0088965412","1");



DROP TABLE IF EXISTS tbl_productos;

CREATE TABLE `tbl_productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Producto',
  `codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Codigo del Producto',
  `descripcion` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Descripcion del Producto',
  `costo` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Precio del Producto',
  `existencia` int(4) NOT NULL COMMENT 'Exitencia del Producto',
  `stock_minimo` int(8) NOT NULL COMMENT 'Stock mínimo del producto',
  `observaciones` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Observaciones del Producto',
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Productos';

INSERT INTO tbl_productos VALUES("1","001","glup cola 2lt","25","300","100","","1","1","1","41");
INSERT INTO tbl_productos VALUES("2","002","Pepsi cola 2lts","35","600","100","","0","1","1","41");
INSERT INTO tbl_productos VALUES("3","003","frescolita","50","20","25","","1","1","1","41");
INSERT INTO tbl_productos VALUES("4","004","chinoto","80 bs.","50","100","","0","1","1","41");



DROP TABLE IF EXISTS tbl_proveedores;

CREATE TABLE `tbl_proveedores` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Proveedor',
  `rif_proveedor` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Rif del Proveedor',
  `nombre_proveedor` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del Proveedor',
  `numero_contacto` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Numero de Contacto del Proveedor',
  `persona_contacto` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Persona de Contacto del Proveedor',
  `correo_proveedor` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Correo del Proveedor',
  `estado_proveedor` int(2) NOT NULL COMMENT 'Estado del Proveedor',
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de los Proveedores';

INSERT INTO tbl_proveedores VALUES("1","J31002405-6","juan enterprisse","2522525","Juan Figueroa","gffgf@gmaol.com","1");
INSERT INTO tbl_proveedores VALUES("2","j-50060225-6","nxnsx","04124593006","Juan Bimba","duhduhuhwd@gmail.com","0");



DROP TABLE IF EXISTS tbl_salida;

CREATE TABLE `tbl_salida` (
  `id_salida` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Salida',
  `fecha_salida` date NOT NULL COMMENT 'Fecha de Salida del Producto',
  `cantidad_salida` int(10) NOT NULL COMMENT 'Cantidad de Salida',
  `factura_venta` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Numero de Factura de Venta',
  `id_producto` int(11) NOT NULL COMMENT 'Id del Producto',
  PRIMARY KEY (`id_salida`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `tbl_salida_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla Salida';

INSERT INTO tbl_salida VALUES("1","2023-08-04","100","","1");
INSERT INTO tbl_salida VALUES("2","2023-08-07","100","","2");
INSERT INTO tbl_salida VALUES("3","2023-08-08","600","","1");
INSERT INTO tbl_salida VALUES("4","2023-08-09","10","","1");
INSERT INTO tbl_salida VALUES("5","2023-08-10","150","","4");
INSERT INTO tbl_salida VALUES("6","2023-08-13","50","0033630055","3");
INSERT INTO tbl_salida VALUES("7","2023-08-13","30","5656588989","3");



DROP TABLE IF EXISTS tbl_usuarios;

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del usuario',
  `login_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre de Usuario',
  `clave_usuario` varchar(350) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Clave del Usuario',
  `cedula_usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cedula del Usuario',
  `nombre_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del Usuario',
  `apellido_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Apellido del Usuario',
  `correo_usuario` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Correo del Usuario',
  `direccion_usuario` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Direccion del Usuario',
  `nivel_usuario` int(2) NOT NULL COMMENT 'Nivel de Usuario',
  `estado_usuario` int(2) NOT NULL COMMENT 'Estado del Usuario',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Usuarios';

INSERT INTO tbl_usuarios VALUES("39","chicha_e_pasta","$2y$10$xPtciWPL4L5WOs0v2P//TuKJCEF.dzdf8tsJRslZg4DnN/YEdvGwu","448485454","Chica","E Pasta","garcia@gmail.com","Maracay Aragua","1","0");
INSERT INTO tbl_usuarios VALUES("41","cachapa_frita","$2y$10$LLVAnkz1CSK22N01.llQDeD2EJ6fKQq6MgO5t/cKPNwz/X7WnkevO","9686805","Cachapa","Frita","cachapafrita_lomejor@gmail.com","su casa","2","1");



SET FOREIGN_KEY_CHECKS=1;