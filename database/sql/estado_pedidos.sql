-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-11-2024 a las 09:29:43
-- Versión del servidor: 8.0.40
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gmasweb_dpi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pedidos`
--

-- CREATE TABLE `estado_pedidos` (
--   `id` int NOT NULL,
--   `estado` varchar(60) NOT NULL,
--   `colorcampo` varchar(6) NOT NULL,
--   `comentario` varchar(1024) DEFAULT NULL,
--   `activo` int NOT NULL DEFAULT '1'
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_pedidos`
--

INSERT INTO `estado_pedidos` (`id`, `estado`, `color`, `comentarios`, `activo`) VALUES
(3, 'Pedido en Espera', 'FFE000', NULL, 1),
(4, 'Pedido  Aceptado', '009EFF', NULL, 1),
(5, 'Pedido  Rechazado', 'FF0000', NULL, 1),
(6, 'Pedido Terminado', '32BA00', NULL, 1),
(7, 'Pedido Entregado', 'D1D0CD', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado_pedidos`
--
-- ALTER TABLE `estado_pedidos`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_pedidos`
--
-- ALTER TABLE `estado_pedidos`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
