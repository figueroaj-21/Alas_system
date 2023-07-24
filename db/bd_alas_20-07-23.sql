-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2023 a las 02:03:14
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_alas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_auditoria`
--

CREATE TABLE `tbl_auditoria` (
  `id_auditoria` int(11) NOT NULL COMMENT 'Id de la Auditoria',
  `usuario_aud` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del Usuario',
  `tiemporegistro_aud` datetime NOT NULL COMMENT 'Tiempo de Registro',
  `accion_aud` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Accion Efectuada',
  `query_aud` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Consultas',
  `id_usuario` int(11) NOT NULL COMMENT 'Id del Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Auditoria';

--
-- Volcado de datos para la tabla `tbl_auditoria`
--

INSERT INTO `tbl_auditoria` (`id_auditoria`, `usuario_aud`, `tiemporegistro_aud`, `accion_aud`, `query_aud`, `id_usuario`) VALUES
(30, 'luxfero', '2023-07-17 01:17:52', 'El usuario [luxfero] iniciÃ³ sesiÃ³n como usuario', '', 0),
(31, 'luxfero', '2023-07-17 01:38:34', 'El usuario [luxfero] iniciÃ³ sesiÃ³n como usuario', '', 0),
(32, 'luxfero', '2023-07-17 01:43:20', 'El usuario [luxfero] cerrÃ³ sesiÃ³n', '', 0),
(33, 'figueroaj1', '2023-07-18 03:58:09', 'El usuario [figueroaj1] iniciÃ³ sesiÃ³n como usuario', '', 0),
(34, 'figueroaj1', '2023-07-18 04:44:14', 'El usuario [figueroaj1] cerrÃ³ sesiÃ³n', '', 0),
(35, 'luxfero', '2023-07-18 04:44:23', 'El usuario [luxfero] iniciÃ³ sesiÃ³n como usuario', '', 0),
(36, 'luxfero', '2023-07-18 04:58:33', 'El usuario [luxfero] registrÃ³ al usuario [@karla]', '', 0),
(37, 'luxfero', '2023-07-18 05:00:08', 'El usuario [luxfero] cerrÃ³ sesiÃ³n', '', 0),
(38, 'figueroaj1', '2023-07-18 05:00:15', 'El usuario [figueroaj1] iniciÃ³ sesiÃ³n como usuario', '', 0),
(39, 'figueroaj1', '2023-07-18 05:08:23', 'El usuario [figueroaj1] cerrÃ³ sesiÃ³n', '', 0),
(40, 'luxfero', '2023-07-18 05:08:32', 'El usuario [luxfero] iniciÃ³ sesiÃ³n como usuario', '', 0),
(41, 'luxfero', '2023-07-18 05:10:37', 'El usuario [luxfero] cerrÃ³ sesiÃ³n', '', 0),
(42, 'figueroaj1', '2023-07-20 16:13:42', 'El usuario [figueroaj1] iniciÃ³ sesiÃ³n como usuario', '', 0),
(43, 'figueroaj1', '2023-07-20 20:11:41', 'El usuario [figueroaj1] cerrÃ³ sesiÃ³n', '', 0),
(44, 'figueroaj1', '2023-07-20 22:39:37', 'El usuario [figueroaj1] iniciÃ³ sesiÃ³n como usuario', '', 0),
(45, 'figueroaj1', '2023-07-20 22:41:55', 'El usuario [figueroaj1] cerrÃ³ sesiÃ³n', '', 0),
(46, 'figueroaj1', '2023-07-20 22:42:29', 'El usuario [figueroaj1] iniciÃ³ sesiÃ³n como usuario', '', 0),
(47, 'figueroaj1', '2023-07-20 22:51:59', 'El usuario [figueroaj1] cerrÃ³ sesiÃ³n', '', 0),
(48, 'figueroaj1', '2023-07-20 22:52:27', 'El usuario [figueroaj1] iniciÃ³ sesiÃ³n como usuario', '', 0),
(49, 'figueroaj1', '2023-07-20 23:05:49', 'El usuario [figueroaj1] iniciÃ³ sesiÃ³n como usuario', '', 0),
(50, 'figueroaj1', '2023-07-20 23:08:58', 'El usuario [figueroaj1] cerrÃ³ sesiÃ³n', '', 0),
(51, 'figueroaj1', '2023-07-20 23:09:36', 'El usuario [figueroaj1] iniciÃ³ sesiÃ³n como usuario', '', 0),
(52, '', '2023-07-20 23:21:54', 'El usuario [] registrÃ³ al usuario []', '', 0),
(53, '', '2023-07-20 23:25:28', 'El usuario [] registrÃ³ la clasificacion [galletas]', '', 0),
(54, 'figueroaj1', '2023-07-20 23:26:59', 'El usuario [figueroaj1] registrÃ³ la clasificacion [harinas]', '', 0),
(55, 'figueroaj1', '2023-07-21 00:19:49', 'El usuario [figueroaj1] iniciÃ³ sesiÃ³n como usuario', '', 0),
(56, 'figueroaj1', '2023-07-21 00:33:23', 'El usuario [figueroaj1] registrÃ³ al Proveedor [Total Panda]', '', 0),
(57, 'figueroaj1', '2023-07-21 02:01:10', 'El usuario [figueroaj1] cerrÃ³ sesiÃ³n', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clasificacion`
--

CREATE TABLE `tbl_clasificacion` (
  `id_clasificacion` int(11) NOT NULL COMMENT 'Id de clasificacion',
  `clasificacion` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Clasificacion del Producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de clasificacion';

--
-- Volcado de datos para la tabla `tbl_clasificacion`
--

INSERT INTO `tbl_clasificacion` (`id_clasificacion`, `clasificacion`) VALUES
(1, 'bebidas'),
(2, ''),
(3, 'Helado'),
(4, 'refresco'),
(5, 'galletas'),
(6, 'harinas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_entrada`
--

CREATE TABLE `tbl_entrada` (
  `id_entrada` int(11) NOT NULL COMMENT 'Id de Entrada',
  `fecha_entrada` date NOT NULL COMMENT 'Fecha de Entrada del Producto',
  `cantidad_entrada` int(10) NOT NULL COMMENT 'Cantidad de Entrada',
  `costo_producto` decimal(11,2) DEFAULT NULL,
  `id_proveedor` int(11) NOT NULL COMMENT 'Id del Proveedor',
  `id_producto` int(11) NOT NULL COMMENT 'Id del Producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla Entrada';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `id_producto` int(11) NOT NULL COMMENT 'Id del Producto',
  `codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Codigo del Producto',
  `descripcion` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Descripcion del Producto',
  `costo` int(20) NOT NULL COMMENT 'Precio del Producto',
  `existencia` int(4) NOT NULL COMMENT 'Exitencia del Producto',
  `observaciones` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Observaciones del Producto',
  `id_clasificacion` int(11) NOT NULL COMMENT 'Id de la Clasificación',
  `id_proveedor` int(11) NOT NULL COMMENT 'Id del Proveedor',
  `id_usuario` int(11) NOT NULL COMMENT 'Id del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Productos';

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`id_producto`, `codigo`, `descripcion`, `costo`, `existencia`, `observaciones`, `id_clasificacion`, `id_proveedor`, `id_usuario`) VALUES
(2, 'ref-retor0', 'glup cola 2lt', 35, 50, '', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedores`
--

CREATE TABLE `tbl_proveedores` (
  `id_proveedor` int(11) NOT NULL COMMENT 'Id del Proveedor',
  `rif_proveedor` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Rif del Proveedor',
  `nombre_proveedor` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del Proveedor',
  `numero_contacto` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Numero de Contacto del Proveedor',
  `persona_contacto` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Persona de Contacto del Proveedor',
  `correo_proveedor` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Correo del Proveedor',
  `dia_pedido` date NOT NULL COMMENT 'Fecha del Pedido',
  `dia_despacho` date NOT NULL COMMENT 'Fecha del Despacho',
  `credito` int(3) NOT NULL COMMENT 'Dias de Credito'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de los Proveedores';

--
-- Volcado de datos para la tabla `tbl_proveedores`
--

INSERT INTO `tbl_proveedores` (`id_proveedor`, `rif_proveedor`, `nombre_proveedor`, `numero_contacto`, `persona_contacto`, `correo_proveedor`, `dia_pedido`, `dia_despacho`, `credito`) VALUES
(1, 'J-310086057-6', 'Distribuidora La Lin', '04128920690', 'Carlos Gómez', 'joseangellamas8@gmail.com', '2023-06-18', '2023-06-20', 15),
(2, '', '', '', '', '', '0000-00-00', '0000-00-00', 0),
(3, '111511515115', 'juan enterprisse', '04124593006', 'Juan Figueroa', 'duhduhuhwd@gmail.com', '0000-00-00', '0000-00-00', 0),
(4, '123456789', 'nix store', '04128920690', 'maria mendoza', 'mariamendozamv08@gmail.com', '0000-00-00', '0000-00-00', 0),
(5, '987654321', 'nxnsx', '04124593006', 'Juan Figueroa', 'duhduhuhwd@gmail.com', '0000-00-00', '0000-00-00', 0),
(6, '258741369', 'juan enterprisse', '04124593006', '1111666', 'duhduhuhwd@gmail.com', '0000-00-00', '0000-00-00', 0),
(7, 'j-50060225-6', 'Inversiones Lola', '2522525', 'Lola Flores', 'gffgf@gmaol.com', '0000-00-00', '0000-00-00', 0),
(8, 'j36987141-7', 'Total Panda', '2522525', 'Pedro Perez', 'gffgf@gmaol.com', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id_rol` int(11) NOT NULL COMMENT 'Id del Rol',
  `tipo_rol` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Roles de Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Roles';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salida`
--

CREATE TABLE `tbl_salida` (
  `id_salida` int(11) NOT NULL COMMENT 'Id de Salida',
  `fecha_salida` date NOT NULL COMMENT 'Fecha de Salida del Producto',
  `cantidad_salida` int(10) NOT NULL COMMENT 'Cantidad de Salida',
  `id_producto` int(11) NOT NULL COMMENT 'Id del Producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla Salida';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL COMMENT 'Id del usuario',
  `login_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre de Usuario',
  `clave_usuario` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Clave del Usuario',
  `cedula_usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cedula del Usuario',
  `nombre_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del Usuario',
  `apellido_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Apellido del Usuario',
  `correo_usuario` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Correo del Usuario',
  `direccion_usuario` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Direccion del Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Usuarios';

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `login_usuario`, `clave_usuario`, `cedula_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `direccion_usuario`) VALUES
(2, 'luxfero', '123', '30663815', 'Maria', 'Mendoza', 'garcia@gmail.com', 'Maracay'),
(20, 'figueroaj1', '1234', '12484336', 'Juan', 'Figueroa', 'garcia@gmail.com', 'Maracay'),
(25, 'darcy1', '147', '9659544', 'Darcy', 'Gomez', 'garcia@gmail.com', 'Maracay'),
(26, 'marco', '159', '44848', 'Marcos', 'Garcia', 'garcia@gmail.com', 'Maracay'),
(27, 'pedro', '58', '2555', 'hjhjhjh', 'hhjhjh', 'garcia@gmail.com', 'jhjhjh'),
(28, 'sara', '789', '987456', 'Sara', 'Rosa', 'garcia@gmail.com', 'Maracay'),
(29, 'carlosS', '852', '7412369', 'Carlos', 'Soteldo', 'garcia@gmail.com', 'Maracay'),
(30, '@sara1', '258', '1234568', 'Sara', 'PÃ©rez', 'garcia@gmail.com', 'Maracay'),
(31, '@celia', '741', '963258', 'Celia', 'Parra', 'garcia@gmail.com', 'Maracay'),
(32, '@karla', '963', '1478569', 'Karla', 'GÃ³mez', 'garcia@gmail.com', 'Maracay');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_auditoria`
--
ALTER TABLE `tbl_auditoria`
  ADD PRIMARY KEY (`id_auditoria`);

--
-- Indices de la tabla `tbl_clasificacion`
--
ALTER TABLE `tbl_clasificacion`
  ADD PRIMARY KEY (`id_clasificacion`);

--
-- Indices de la tabla `tbl_entrada`
--
ALTER TABLE `tbl_entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_clasificacion` (`id_clasificacion`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tbl_salida`
--
ALTER TABLE `tbl_salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_auditoria`
--
ALTER TABLE `tbl_auditoria`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la Auditoria', AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `tbl_clasificacion`
--
ALTER TABLE `tbl_clasificacion`
  MODIFY `id_clasificacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de clasificacion', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_entrada`
--
ALTER TABLE `tbl_entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Entrada';

--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Producto', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Proveedor', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Rol';

--
-- AUTO_INCREMENT de la tabla `tbl_salida`
--
ALTER TABLE `tbl_salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Salida';

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del usuario', AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_entrada`
--
ALTER TABLE `tbl_entrada`
  ADD CONSTRAINT `tbl_entrada_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`);

--
-- Filtros para la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD CONSTRAINT `tbl_productos_ibfk_1` FOREIGN KEY (`id_clasificacion`) REFERENCES `tbl_clasificacion` (`id_clasificacion`),
  ADD CONSTRAINT `tbl_productos_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `tbl_proveedores` (`id_proveedor`),
  ADD CONSTRAINT `tbl_productos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tbl_salida`
--
ALTER TABLE `tbl_salida`
  ADD CONSTRAINT `tbl_salida_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
