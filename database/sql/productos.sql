-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-11-2024 a las 08:06:21
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
-- Estructura de tabla para la tabla `productos`
--

-- CREATE TABLE `productos` (
--   `id` int NOT NULL,
--   `nombre` varchar(100) NOT NULL,
--   `categorias_id` int NOT NULL,
--   `comentario` varchar(1024) DEFAULT NULL,
--   `activo` int NOT NULL DEFAULT '1'
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categorias_id`, `comentarios`, `activo`) VALUES
(1, 'Flyers', 25, NULL, 0),
(7, 'Obra 80g 4/0', 24, NULL, 1),
(8, 'Obra 80g 4/4', 24, NULL, 1),
(9, 'Ilustración 150g 4/0', 24, NULL, 1),
(10, 'Ilustración 150g 4/4', 24, NULL, 1),
(11, 'Ilustración 300g 4/0', 24, NULL, 1),
(12, 'Ilustración 300g 4/4', 24, NULL, 1),
(13, 'Autoadhesivo', 24, NULL, 1),
(14, 'Laminado Mate 1/0', 26, NULL, 1),
(15, 'Laminado Mate 1/1', 26, NULL, 1),
(16, 'Laminado Brillante 1/0', 26, NULL, 1),
(17, 'Laminado Brillante 1/1', 26, NULL, 1),
(18, 'Opalina 240 grs 4/0', 24, '240 grs', 1),
(19, 'Opalina 240 grs 4/4', 24, '240 grs', 1),
(20, 'troquelados', 25, NULL, 0),
(21, 'Doblado Díptico', 26, NULL, 0),
(22, 'Doblado Tríptico Zig Zag', 26, NULL, 0),
(23, 'Doblado Tríptico Ventana', 26, NULL, 0),
(24, 'Doblado Cuatríptico', 26, NULL, 0),
(25, 'Troquelados Postura', 25, NULL, 0),
(26, 'Laminado (m2)', 25, NULL, 0),
(27, 'Banner (Front) - Roll Up 85x200cm', 29, NULL, 0),
(28, 'Banner (Front) - Porta Banner 2 Velas 90x190cm', 29, NULL, 1),
(29, 'Lona (Front) - Impresión por metro cuadrado', 29, NULL, 1),
(30, 'Vinilo Impresión - Brillo por metro cuadrado', 29, NULL, 1),
(31, 'Vinilo Impresión - Mate por metro cuadrado', 29, NULL, 1),
(32, 'Vinilo Impresión - Clear Mate (x mtr cuadrado)', 29, NULL, 0),
(33, 'Canvas Impresión - Canvas por metro cuadrado', 29, NULL, 1),
(34, 'Vinilo Corte - Colores Varios por metro lineal 60x100cm', 29, NULL, 1),
(35, 'Vinilo Corte - Esmerilado por metro lineal 60x100cm	', 29, NULL, 0),
(36, 'OPP Blanco', 24, NULL, 1),
(37, 'OPP Transparente', 24, NULL, 0),
(38, 'Vinilo Impresión - Clear Brillo (x mtr cuadrado)', 29, NULL, 1),
(39, 'Microperforado', 29, NULL, 1),
(40, '1/2 Corte OPP Blanco', 26, NULL, 1),
(41, '1/2 Corte OPP Transparente', 26, NULL, 1),
(42, '1/2 Corte Autoadhesivo', 26, NULL, 1),
(43, '1/2 Corte Gigantografía', 26, NULL, 1),
(44, 'Ilustración 350g 4/0 - Nuevo!', 24, NULL, 0),
(45, 'Ilustración 350g 4/4 - Nuevo!', 24, NULL, 0),
(46, 'Backlight', 29, NULL, 0),
(47, 'Blackout', 29, NULL, 0),
(48, 'Papel Obra', 29, NULL, 1),
(49, 'Ecocuero', 29, NULL, 1),
(50, 'OPP Plata', 24, NULL, 0),
(51, 'Holograma Adhesivo', 24, NULL, 1),
(52, 'Craft Adhesivo', 24, NULL, 1),
(53, 'Troquelado Digital', 26, NULL, 1),
(58, 'HOLOGRAMA  ORO', 24, NULL, 0),
(59, 'Papel craft Adhesivo', 24, NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
-- ALTER TABLE `productos`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
-- ALTER TABLE `productos`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
