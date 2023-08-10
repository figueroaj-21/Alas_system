-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2023 a las 00:07:11
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clasificacion`
--

CREATE TABLE `tbl_clasificacion` (
  `id_clasificacion` int(11) NOT NULL COMMENT 'Id de clasificacion',
  `clasificacion` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Clasificacion del Producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de clasificacion';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_entrada`
--

CREATE TABLE `tbl_entrada` (
  `id_entrada` int(11) NOT NULL COMMENT 'Id de Entrada',
  `fecha_entrada` date NOT NULL COMMENT 'Fecha de Entrada del Producto',
  `cantidad_entrada` int(10) NOT NULL COMMENT 'Cantidad de Entrada',
  `costo_producto` decimal(11,2) DEFAULT NULL,
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
  `stock_minimo` int(8) NOT NULL COMMENT 'Stock mínimo del producto',
  `observaciones` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Observaciones del Producto',
  `estado_producto` int(2) NOT NULL COMMENT 'Estado del producto',
  `id_clasificacion` int(11) NOT NULL COMMENT 'Id de la Clasificación',
  `id_proveedor` int(11) NOT NULL COMMENT 'Id del Proveedor',
  `id_usuario` int(11) NOT NULL COMMENT 'Id del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Productos';

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
  `estado_proveedor` int(2) NOT NULL COMMENT 'Estado del Proveedor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de los Proveedores';

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
  `clave_usuario` varchar(350) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Clave del Usuario',
  `cedula_usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cedula del Usuario',
  `nombre_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del Usuario',
  `apellido_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Apellido del Usuario',
  `correo_usuario` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Correo del Usuario',
  `direccion_usuario` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Direccion del Usuario',
  `nivel_usuario` int(2) NOT NULL COMMENT 'Nivel de Usuario',
  `estado_usuario` int(2) NOT NULL COMMENT 'Estado del Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Usuarios';

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `login_usuario`, `clave_usuario`, `cedula_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `direccion_usuario`, `nivel_usuario`, `estado_usuario`) VALUES
(39, 'chicha_e_pasta', '$2y$10$FqoUWSAFziAsG0O2ni0uzel3c7FVnjT351MysZ/zFJJA7mZSBkVgu', '448485454', 'Chica', 'E Pasta', 'garcia@gmail.com', 'Maracay Aragua', 1, 1),
(41, 'cachapa_frita', '$2y$10$YH4W5cIRyHc2LWk/9H4dLekRXj3IsMq3VbMLw6dWCOu86GdDlKxWa', '9686805', 'Cachapa', 'Frita', 'cachapafrita_lomejor@gmail.com', 'su casa', 2, 1);

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
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la Auditoria';

--
-- AUTO_INCREMENT de la tabla `tbl_clasificacion`
--
ALTER TABLE `tbl_clasificacion`
  MODIFY `id_clasificacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de clasificacion';

--
-- AUTO_INCREMENT de la tabla `tbl_entrada`
--
ALTER TABLE `tbl_entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Entrada';

--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Producto';

--
-- AUTO_INCREMENT de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Proveedor';

--
-- AUTO_INCREMENT de la tabla `tbl_salida`
--
ALTER TABLE `tbl_salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Salida';

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del usuario', AUTO_INCREMENT=42;

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
