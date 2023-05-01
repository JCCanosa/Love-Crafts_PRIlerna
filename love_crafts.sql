-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2023 a las 13:49:53
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `love_crafts`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `grupo` varchar(10) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `precio` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `descripcion`, `grupo`, `imagen`, `precio`) VALUES
(20, 'Percha', 'Laser', '1682937389_LA_cartelPuerta.jpeg', '25.00'),
(21, 'Rosa', '3D', '1682937400_3D_rosaMorada.jpeg', '15.00'),
(22, 'Lampara', '3D', '1682937426_WhatsApp Image 2022-11-06 at 13.00.14 (2).jpeg', '40.00'),
(23, 'Llavero Corazón', '3D', '1682937465_WhatsApp Image 2022-11-06 at 13.20.35 (1).jpeg', '5.00'),
(25, 'Lampara Estrella', '3D', '1682940879_WhatsApp Image 2022-11-06 at 13.02.38 (1).jpeg', '25.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pedidopor` varchar(60) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `articulopedido` varchar(60) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `preciou` decimal(5,2) NOT NULL,
  `total` decimal(5,2) NOT NULL,
  `pagado` int(1) NOT NULL,
  `entregado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_usuario`, `pedidopor`, `id_articulo`, `articulopedido`, `cantidad`, `preciou`, `total`, `pagado`, `entregado`) VALUES
(119, 2, 'Juan Carlos', 21, 'Rosa', 3, '15.00', '45.00', 0, 0),
(120, 2, 'Juan Carlos', 20, 'Percha', 1, '25.00', '25.00', 0, 0),
(121, 2, 'Juan Carlos', 21, 'Rosa', 2, '15.00', '30.00', 1, 0),
(123, 47, 'Antonio', 21, 'Rosa', 2, '15.00', '30.00', 0, 0),
(125, 47, 'Antonio', 21, 'Rosa', 2, '15.00', '30.00', 0, 0),
(126, 47, 'Antonio', 20, 'Percha', 2, '25.00', '50.00', 0, 0),
(127, 47, 'Antonio', 25, 'Lampara Estrella', 2, '25.00', '50.00', 0, 0),
(128, 48, 'Alfredo', 21, 'Rosa', 4, '15.00', '60.00', 0, 0),
(129, 48, 'Alfredo', 23, 'Llavero Corazón', 1, '5.00', '5.00', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `confirmado` int(1) NOT NULL,
  `permisos` int(1) NOT NULL,
  `validador` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `telefono`, `confirmado`, `permisos`, `validador`) VALUES
(2, 'Juan Carlos', 'Canosa Suarez', 'jcanosa1988@gmail.com', '$2y$10$jg4bsABH4tdMMtKO8vVraeySjm975rca5JcxCLA2tc9w2xNqI1l.S', '695530289', 1, 1, '643c0278e8ead'),
(47, 'Antonio', 'Lopez Perez', 'correo@correo.com', '$2y$10$ClbJ9CeC0nZENYmr/WKrjO3ad7N6hB2SXQItg.O7fyj7mE5HKuNAe', '652211545', 1, 0, '644fa47f5bd27'),
(48, 'Alfredo', 'Lara Oliver', 'correo2@correo.com', '$2y$10$615g.ycyxhOOqLuqGwIy5OaguHHVMed60dAwFc2eiM.0.LBcHxnzq', '654987321', 1, 0, '644fa451e83dc');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_articulo` (`id_articulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
