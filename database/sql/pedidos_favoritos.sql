-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-11-2024 a las 09:42:35
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
-- Estructura de tabla para la tabla `pedidos_favoritos`
--

CREATE TABLE `pedidos_favoritos` (
  `id` int NOT NULL,
  `pedidos_id` int NOT NULL,
  `favoritos_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos_favoritos`
--

INSERT INTO `pedidos_favoritos` (`id`, `pedidos_id`, `favoritos_id`) VALUES
(32, 91687, 49),
(33, 91708, 50),
(34, 85573, 51),
(35, 92854, 52),
(36, 95206, 53),
(55, 96675, 72),
(56, 96616, 73),
(57, 95743, 74),
(58, 95478, 75),
(59, 95477, 76),
(60, 94789, 77),
(65, 89892, 82),
(74, 110913, 91),
(76, 112010, 93),
(77, 115687, 94),
(80, 113219, 97),
(81, 119194, 98),
(83, 121124, 100),
(84, 121123, 101),
(85, 121122, 102),
(86, 121121, 103),
(87, 121120, 104),
(88, 121240, 105),
(89, 123715, 106),
(92, 135829, 109),
(93, 136758, 110),
(96, 142550, 113),
(97, 142902, 114),
(98, 142901, 115),
(102, 148712, 119),
(103, 148719, 120),
(104, 149127, 121),
(105, 149128, 122),
(106, 150659, 123),
(112, 154615, 129),
(113, 154517, 130),
(114, 154518, 131),
(115, 157063, 132),
(116, 157007, 133),
(118, 161778, 135),
(119, 164498, 136),
(120, 165370, 137),
(130, 167445, 147),
(131, 167447, 148),
(132, 167451, 149),
(142, 178099, 159),
(146, 187800, 163),
(147, 187867, 164),
(164, 195914, 181),
(168, 201874, 185),
(169, 203689, 186),
(170, 204621, 187),
(171, 203564, 188),
(176, 207868, 193),
(187, 213188, 204),
(188, 213239, 205),
(189, 213834, 206),
(190, 216038, 207),
(193, 223224, 210),
(194, 223231, 211),
(198, 224775, 215),
(200, 227276, 217),
(202, 227484, 219),
(204, 227683, 221),
(205, 228330, 222),
(206, 228733, 223),
(208, 229378, 225),
(209, 229439, 226),
(210, 229464, 227),
(216, 231797, 233),
(219, 233265, 236),
(221, 235885, 238),
(222, 236769, 239),
(223, 239307, 240),
(224, 241522, 241),
(225, 241538, 242),
(226, 241264, 243),
(227, 242716, 244),
(228, 244047, 245),
(229, 246972, 246),
(230, 237712, 247),
(231, 253144, 248),
(232, 254386, 249),
(233, 256583, 250),
(234, 263388, 251),
(235, 264687, 252),
(236, 265081, 253),
(237, 268689, 254),
(238, 271035, 255),
(239, 271036, 256),
(240, 273804, 257),
(241, 276204, 258),
(242, 276353, 259),
(243, 273623, 260),
(244, 272017, 261),
(245, 277534, 262),
(246, 280270, 263),
(247, 282691, 264);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos_favoritos`
--
ALTER TABLE `pedidos_favoritos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos_favoritos`
--
ALTER TABLE `pedidos_favoritos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
