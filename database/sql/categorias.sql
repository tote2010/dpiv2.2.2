-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-11-2024 a las 07:59:36
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
-- Estructura de tabla para la tabla `categorias`
--

-- CREATE TABLE `categorias` (
--   `id` int NOT NULL,
--   `nombre` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
--   `comentario` varchar(1024) DEFAULT NULL,
--   `activo` int NOT NULL DEFAULT '1'
-- ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

-- INSERT INTO `categorias` VALUES
-- (24, 'Digital', NULL, 1),
-- (25, 'Offset', NULL, 0),
-- (26, 'Adicionales', NULL, 1),
-- (28, 'Otros', NULL, 1),
-- (29, 'Gigantografía', NULL, 1);
INSERT INTO `categorias` (`id`, `nombre`, `comentarios`, `activo`) VALUES
(24, 'Digital', NULL, 1),
(25, 'Offset', NULL, 0),
(26, 'Adicionales', NULL, 1),
(28, 'Otros', NULL, 1),
(29, 'Gigantografía', NULL, 1);
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
-- ALTER TABLE `categorias`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `activo` (`activo`),
--   ADD KEY `activo_2` (`activo`),
--   ADD KEY `activo_3` (`activo`),
--   ADD KEY `activo_4` (`activo`),
--   ADD KEY `activo_5` (`activo`),
--   ADD KEY `activo_6` (`activo`),
--   ADD KEY `activo_7` (`activo`),
--   ADD KEY `activo_8` (`activo`),
--   ADD KEY `activo_9` (`activo`),
--   ADD KEY `activo_10` (`activo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
-- ALTER TABLE `categorias`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
