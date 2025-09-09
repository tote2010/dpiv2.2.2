-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-11-2024 a las 05:39:16
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
-- Estructura de tabla para la tabla `precios_cantidad`
--

-- CREATE TABLE `precios_cantidad` (
--   `id` int NOT NULL,
--   `minimo` int NOT NULL,
--   `maximo` int DEFAULT NULL,
--   `rango` varchar(50) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precios_cantidad`
--

INSERT INTO `precios_cantidad` (`id`, `minimo`, `maximo`, `rango`) VALUES
(3, 1, NULL, '1'),
(4, 2, 10, '2 a 10'),
(5, 11, 50, '11 a 50'),
(6, 51, 100, '51 a 100'),
(7, 101, 500, '101 a 500'),
(8, 501, 1000, '501 a 1000'),
(9, 2501, 5000, '5000'),
(10, 1, NULL, '1000'),
(11, 1, 2500, '2500');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `precios_cantidad`
--
-- ALTER TABLE `precios_cantidad`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `precios_cantidad`
--
-- ALTER TABLE `precios_cantidad`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
