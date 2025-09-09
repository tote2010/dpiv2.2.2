-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-11-2024 a las 09:42:45
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
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int NOT NULL,
  `productos_id` int NOT NULL,
  `cantidad` int NOT NULL,
  `detalle` varchar(2048) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `archivo` varchar(100) DEFAULT NULL,
  `tamano` varchar(20) DEFAULT NULL,
  `productos_id2` int DEFAULT NULL,
  `productos_id3` int DEFAULT NULL,
  `users_id` int NOT NULL,
  `pedidos_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id`, `productos_id`, `cantidad`, `detalle`, `created_at`, `archivo`, `tamano`, `productos_id2`, `productos_id3`, `users_id`, `pedidos_id`) VALUES
(49, 11, 1, NULL, '2017-03-19 19:09:56', '2017-03-19_19-08-58_benja_1.jpg', NULL, 16, NULL, 499, 91687),
(50, 11, 4, NULL, '2017-03-21 15:09:51', '2017-03-20_10-44-47_tarjeta_jorge_2.pdf', NULL, NULL, NULL, 499, 91708),
(51, 11, 1, NULL, '2017-03-23 00:51:16', '2017-01-02_23-03-45_cartelitos_2.jpg', NULL, NULL, NULL, 400, 85573),
(52, 11, 4, NULL, '2017-04-05 16:31:58', '2017-03-30_23-53-17_dos_avejitas_personales.pdf', NULL, NULL, NULL, 499, 92854),
(53, 13, 25, NULL, '2017-04-26 13:03:25', '2017-04-26_13-03-09_autoadhesivo_ampetar.cdr', NULL, NULL, NULL, 346, 95206),
(72, 11, 12, '6 copias de cada una', '2017-05-12 15:49:16', '2017-05-10_16-49-50_kit_whatsapp_ultimo.pdf', NULL, NULL, NULL, 51, 96675),
(73, 11, 2, NULL, '2017-05-12 15:50:03', '2017-05-10_11-57-09_props_nauticosoriginales.pdf', NULL, NULL, NULL, 51, 96616),
(74, 11, 10, '5 copias de cada uno', '2017-05-12 15:51:20', '2017-05-02_16-58-20_unicornios.pdf', NULL, NULL, NULL, 51, 95743),
(75, 11, 4, '2 copias de cada pagina', '2017-05-12 15:51:44', '2017-04-28_11-09-21_pliego_nena.pdf', NULL, NULL, NULL, 51, 95478),
(76, 11, 6, '3 copias de cada pagina', '2017-05-12 15:51:52', '2017-04-28_11-08-46_pliego_nene.pdf', NULL, NULL, NULL, 51, 95477),
(77, 13, 1, NULL, '2017-05-12 15:52:50', '2017-04-21_17-06-01_autoadhesivo_01.jpg', NULL, NULL, NULL, 51, 94789),
(82, 9, 25, NULL, '2017-08-01 11:05:00', '2017-03-01_11-11-55_sobres_turquesa.pdf', NULL, NULL, NULL, 350, 89892),
(91, 13, 1, 'Hola! Lo necesito troquelado, en la segunda pag están las marcas. Beso!', '2017-10-05 13:24:54', '2017-10-01_23-20-01_agendas_stickers.pdf', NULL, NULL, NULL, 22, 110913),
(93, 7, 15, '15 Copias', '2017-10-10 04:22:00', '2017-10-10_04-15-08_obra80.pdf', NULL, NULL, NULL, 451, 112010),
(94, 9, 42, 'Hola! Necesito 3 copias de cada una. Beso', '2017-11-14 00:36:47', '2017-11-13_10-29-47_agendas_caratulas.rar', NULL, NULL, NULL, 22, 115687),
(97, 13, 10, 'archivo .ai con capa de diseño + capa de corte. Podré pasar a retirar mañana viernes 20? Muchas Gracias!', '2017-11-27 16:29:43', '2017-10-19_22-03-52_etiquetas_redondas.ai', NULL, NULL, NULL, 511, 113219),
(98, 7, 7, NULL, '2017-12-18 09:19:49', '2017-12-12_00-02-10_mapa_flor_y_seba.jpg', NULL, NULL, NULL, 400, 119194),
(100, 19, 1, NULL, '2018-01-08 00:32:33', '2018-01-06_12-58-37_belle.png', NULL, NULL, NULL, 451, 121124),
(101, 18, 2, '2Copias', '2018-01-08 00:32:43', '2018-01-08_00-31-31_opalina.pdf', NULL, NULL, NULL, 451, 121123),
(102, 11, 2, '1 copia de cada hoja', '2018-01-08 00:32:48', '2018-01-08_00-30-07_ilus300.pdf', NULL, NULL, NULL, 451, 121122),
(103, 9, 5, '5 Copias', '2018-01-08 00:32:53', '2018-01-08_00-27-40_ilus150.pdf', NULL, NULL, NULL, 451, 121121),
(104, 13, 1, NULL, '2018-01-08 00:32:57', '2018-01-06_12-57-46_belle.png', NULL, NULL, NULL, 451, 121120),
(105, 1, 5000, NULL, '2018-01-16 10:35:14', '2018-01-09_08-53-08_termas_2018.zip', '13', NULL, NULL, 353, 121240),
(106, 13, 1, NULL, '2018-02-18 22:15:34', '2018-02-18_21-26-08_beatles_tapas.pdf', NULL, 14, NULL, 22, 123715),
(109, 36, 130, 'imprimir uno para dar el ok', '2018-07-03 08:54:08', '2018-07-03_08-54-02_emergencias_clines.pdf', NULL, NULL, NULL, 242, 135829),
(110, 11, 4, NULL, '2018-07-16 11:15:07', '2018-07-14_23-33-51_remises_marcelo.cdr', NULL, NULL, NULL, 91, 136758),
(113, 13, 409, 'pagina 1 - 115 pliegos\r\npagina 2 - 202 pliegos\r\npagina 3 - 92 pliegos', '2018-09-17 16:53:03', '2018-09-17_15-09-46_tonomac_stickers_winnik.cdr', NULL, NULL, NULL, 62, 142550),
(114, 11, 230, 'Idem anterior. Van con corte y trazo para doblar. Gracias', '2018-09-26 09:40:08', '2018-09-19_23-44-46_carpeta_primaria.jpg', NULL, NULL, NULL, 55, 142902),
(115, 11, 110, 'Lo necesito lo mas grande posible ya q son carpetas para fotos escolares.Van con corte y trazo para doblar. Gracias', '2018-09-26 09:40:18', '2018-09-19_23-42-39_carpeta_jardin.jpg', NULL, NULL, NULL, 55, 142901),
(119, 13, 8, 'Hola! En la segunda pag están las marcas para el medio corte.  Beso!', '2018-11-13 01:11:11', '2018-11-13_00-41-01_stickers_2_17.cdr', NULL, NULL, NULL, 22, 148712),
(120, 13, 15, 'Hola! Necesito pag1... 13 copias / pag2... 3 copias.  Beso!', '2018-11-13 01:16:05', '2018-11-13_01-16-01_aldi_agendas_color_tapas.pdf', NULL, 16, NULL, 22, 148719),
(121, 11, 35, 'Necesito que sean lo mas grande posible, con trazo para doblar al medio y cortadas. Gracias!', '2018-11-15 13:52:16', '2018-11-15_13-51-54_carpeta_jardin.jpg', NULL, NULL, NULL, 55, 149127),
(122, 11, 180, 'Necesito que sean lo mas grande posible, con trazo para doblar al medio y cortadas. Gracias!', '2018-11-15 13:55:22', '2018-11-15_13-55-13_carpeta_primaria.jpg', NULL, NULL, NULL, 55, 149128),
(123, 13, 7, NULL, '2018-12-03 00:06:41', '2018-12-03_00-06-35_aldi_retiros_agendas_color.pdf', NULL, NULL, NULL, 22, 150659),
(129, 13, 1, NULL, '2019-01-20 22:23:31', '2019-01-20_22-23-24_faja_de_seg.cdr', NULL, NULL, NULL, 55, 154615),
(130, 11, 8, NULL, '2019-01-28 16:39:17', '2019-01-17_22-25-49_curiosos_x_8_brillo.jpg', NULL, 16, NULL, 495, 154517),
(131, 11, 8, NULL, '2019-01-28 16:39:32', '2019-01-17_22-27-48_curiosos_x_8_mate.jpg', NULL, 14, NULL, 495, 154518),
(132, 9, 4, NULL, '2019-02-19 13:15:22', '2019-02-19_13-14-53_beatles_caratulas.pdf', NULL, NULL, NULL, 22, 157063),
(133, 13, 20, 'SIN SPLIT', '2019-02-19 13:15:37', '2019-02-19_01-43-42_retiros_cuad_10x14_general.pdf', NULL, NULL, NULL, 22, 157007),
(135, 13, 3, 'grax!! (cliche)', '2019-04-11 22:00:32', '2019-04-10_19-23-31_3_impre_adh.pdf', NULL, NULL, NULL, 297, 161778),
(136, 44, 6, '3 pliegos de cada pagina', '2019-05-16 08:29:53', '2019-05-13_23-43-29_harry_potter_tapas.cdr', NULL, 17, NULL, 62, 164498),
(137, 36, 1, 'gracias!', '2019-05-22 18:54:31', '2019-05-22_18-51-52_1_opp_blanco.pdf', NULL, NULL, NULL, 297, 165370),
(147, 13, 30, NULL, '2019-06-15 14:19:35', '2019-06-15_14-19-27_mataf_chacab_etiq_datos.cdr', NULL, NULL, NULL, 55, 167445),
(148, 13, 1, NULL, '2019-06-15 14:22:13', '2019-06-15_14-22-05_mataf_chacab_abc.cdr', NULL, NULL, NULL, 55, 167447),
(149, 13, 1, NULL, '2019-06-15 14:27:41', '2019-06-15_14-27-31_mataf_chacab_abc_3_kg_mas_chico.cdr', NULL, NULL, NULL, 55, 167451),
(159, 11, 52, NULL, '2019-10-21 21:38:56', '2019-10-21_21-38-39_carpeta_agosto_2019.pdf', NULL, 16, NULL, 117, 178099),
(163, 7, 20, '5 de cada hoja', '2020-02-28 16:25:26', '2020-02-28_14-22-26_celeste_36_politico_con_mar_fisico_para_corte.cdr', '0', NULL, NULL, 168, 187800),
(164, 13, 35, 'cortar pliego al medio', '2020-03-01 16:48:58', '2020-03-01_16-03-41_etiquetas_200w_textocompleto.ai', '0', NULL, NULL, 583, 187867),
(181, 13, 1, NULL, '2020-08-13 13:57:56', '2020-08-12_21-35-05_stick.pdf', '0', NULL, NULL, 361, 195914),
(185, 13, 10, NULL, '2020-10-22 21:13:02', '2020-10-22_21-12-56_sustituto.cdr', '0', 16, NULL, 55, 201874),
(186, 13, 3, 'veo color antes', '2020-11-17 16:18:54', '2020-11-15_20-41-38_pequenos_sticker_presenciales.ai', '0', NULL, NULL, 24, 203689),
(187, 37, 1, NULL, '2020-11-25 13:22:34', '2020-11-25_13-22-23_vinilos_para_vasos.jpg', '0', NULL, NULL, 200, 204621),
(188, 12, 50, 'Hola chicos queda como carpita cualquier cosa llamneme 1150997822', '2020-11-27 13:12:23', '2020-11-12_15-51-10_carnet_de_vacunacion_2020.pdf', '0', NULL, NULL, 346, 203564),
(193, 13, 11, NULL, '2020-12-30 12:57:45', '2020-12-30_12-57-36_pliego_salva_etiqueta_2.ai', '0', 16, NULL, 17, 207868),
(204, 13, 101, 'Corte con guillotina', '2021-03-14 20:22:59', '2021-03-14_13-42-53_tiototo_2021.pdf', '0', NULL, NULL, 595, 213188),
(205, 11, 2, 'CONTROLAR QUE EL JPG COINCIDA CON EL ARCHIVO.\r\nAca paso el link para bajar pdf\r\nhttps://drive.google.com/file/d/13-29GbhHvEq-tHgAuN1a8qBPikW_zf1y/view?usp=sharing', '2021-03-15 12:57:56', '2021-03-15_12-57-50_iman.jpg', '0', 16, NULL, 148, 213239),
(206, 11, 6, NULL, '2021-03-21 13:30:36', '2021-03-21_13-30-25_iman_nelly_x_55.pdf', '0', 16, NULL, 148, 213834),
(207, 11, 7, NULL, '2021-04-20 16:43:00', '2021-04-20_16-40-40_tarj_matu_x_30.pdf', '0', NULL, NULL, 148, 216038),
(210, 11, 4, NULL, '2021-07-23 14:29:05', '2021-07-23_14-03-37_tarj_n_nuevo_x_30.ai', '0', NULL, NULL, 148, 223224),
(211, 45, 26, 'CONTROLAR QUE NO SALGAN PARCHES OSCUROS O BLANCOS EN EFECTOS SOMBRA.\r\nCONTROLAR QUE REGISTRE FRENTE Y DORSO.', '2021-07-23 14:29:18', '2021-07-23_14-28-51_tapa_perro_x_4_21.ai', '0', 14, NULL, 148, 223231),
(215, 18, 1, NULL, '2021-08-10 23:57:26', '2021-08-10_23-57-13_tags_verano.jpg', '0', NULL, NULL, 200, 224775),
(217, 13, 10, NULL, '2021-09-07 10:39:25', '2021-09-07_10-38-50_qr_wino.ai', '0', NULL, NULL, 533, 227276),
(219, 9, 12, 'IMPRIMIR DESPLAZADO A LA DERECHA DEJANDO BLANCO DEL PAPEL DEL LADO IZQUIERDO, TOMAR COMO REFERENCIA EL RECUADRO CYAN QUE DEJE EN ESCRITORIO, CON LA MEDIDA DEL PLIEGO DE MÁQUINA. (YA SE IMPRIMIÓ VARIAS VECES, PRESTAR ATENCIÓN)', '2021-09-08 14:11:31', '2021-09-08_14-10-55_porta_electro_x_10.ai', '0', NULL, NULL, 148, 227484),
(221, 7, 20, '5 de cada hoja', '2021-09-09 16:36:53', '2021-09-09_16-36-30_sepia_36_con_mar_fisico_para_corte.pdf', '0', NULL, NULL, 168, 227683),
(222, 12, 6, NULL, '2021-09-16 12:12:20', '2021-09-16_12-12-00_2021_09_14_12_59_05_late_generico.pdf', '0', 15, NULL, 517, 228330),
(223, 13, 35, 'Cortar pliego a la mitad', '2021-09-22 09:17:14', '2021-09-21_17-28-13_etiquetas_200w_textocompleto.ai', '0', NULL, NULL, 583, 228733),
(225, 12, 4, 'corregir antes de bajar todas', '2021-09-28 16:00:48', '2021-09-28_14-52-24_sh_santillan.pdf', '0', NULL, NULL, 96, 229378),
(226, 44, 7, 'CONTROLAR QUE EL ARCHIVO COINCIDA CON EL JPG.\r\nAca les paso el link para bajar archivo pdf\r\nhttps://drive.google.com/file/d/1xkrOzxHjxSOMH5rzNoc3kcss3zjf5n0s/view?usp=sharing', '2021-09-29 10:59:41', '2021-09-29_09-21-28_tarj.jpg', '0', NULL, NULL, 148, 229439),
(227, 11, 9, NULL, '2021-09-29 10:59:52', '2021-09-29_10-57-47_mont.ai', '0', NULL, NULL, 148, 229464),
(233, 9, 5, NULL, '2021-10-26 09:58:59', '2021-10-25_10-03-17_chip_bag_pequenas.pdf', '0', NULL, NULL, 517, 231797),
(236, 13, 1, NULL, '2021-12-01 20:54:00', '2021-11-07_21-42-19_orlas.cdr', '0', NULL, NULL, 361, 233265),
(238, 51, 1, NULL, '2021-12-06 10:10:24', '2021-11-30_14-11-23_harry_casas_holograma.cdr', '0', NULL, NULL, 361, 235885),
(239, 13, 8, 'CONTROLAR QUE REGISTRE BIEN EL MEDIO CORTE CON LA IMAGEN, POR FAVOR. CONTROLAR QUE EL MEDIO CORTE QUEDE BIEN TROQUELADO.', '2021-12-08 21:44:59', '2021-12-08_21-44-42_stikers_oro_x_66.ai', '0', NULL, NULL, 148, 236769),
(240, 51, 2, NULL, '2022-01-26 12:22:27', '2022-01-22_20-38-44_nadia_x_2_autoadhesivo.jpg', '0', NULL, NULL, 495, 239307),
(241, 13, 1, 'CONTROLAR QUE COINCIDA EL ARCHIVO CON EL JPG.\r\nCONTROLAR  QUE REGISTRE EL MEDIO CORTE, ACA LES PASO EL LINK PARA BAJAR ARCHIVO ILUSTRATOR\r\nhttps://drive.google.com/file/d/1mYjJ8tCZN27VINzQTxGTW4RQOOkg6G5d/view?usp=sharing', '2022-02-24 00:04:51', '2022-02-23_23-19-35_etiq.jpg', '0', NULL, NULL, 148, 241522),
(242, 18, 5, 'Por favor bajar 3 impresiones en material seleccionado con archivo adjunto, ', '2022-03-14 14:07:34', '2022-02-24_09-27-55_genedia_covid_19_croquis_est.pdf', '0', NULL, NULL, 583, 241538),
(243, 13, 15, 'Envio archivo modificado con medidas solicitadas x uds para imprimir en autoadhesivo con medio corte', '2022-03-14 14:09:03', '2022-02-21_13-52-25_abierto_cerrado_rot.pdf', '0', NULL, NULL, 583, 241264),
(244, 13, 18, 'Hola me rechazaron el anterior pedido por no estar en dos capas separadas. Lo envie como siempre, volvi a checkear y el corte esta en una capa separada. Lo vuelvo a enviar. saludos\r\n\r\nPor favor se podrian cortar los pliegos a la mitad? gracias', '2022-03-17 12:23:47', '2022-03-15_17-37-04_2021_12_27_17_22_10_etiquetas_200w_textocompleto.ai', '0', NULL, NULL, 583, 242716),
(245, 13, 6, NULL, '2022-04-25 17:37:53', '2022-04-04_16-01-10_2022_03_14_09_09_25_etiqueta_3_cm.pdf', NULL, NULL, NULL, 390, 244047),
(246, 13, 2, NULL, '2022-05-19 10:45:01', '2022-05-19_10-44-55_autoadhesivo_titi.pdf', '0', NULL, NULL, 517, 246972),
(247, 11, 200, NULL, '2022-08-07 19:19:28', '2021-12-17_11-26-50_calendario_almanaque_caputto_2022.pdf', '0', NULL, NULL, 346, 237712),
(248, 13, 1, NULL, '2022-09-09 17:23:43', '2022-09-09_17-22-31_lore_que_faltaba.cdr', '0', NULL, NULL, 562, 253144),
(249, 36, 28, 'Hola.\r\nCON MEDIO CORTE.\r\nGracias.\r\nBesos.', '2022-10-11 19:19:30', '2022-09-30_09-22-01_italcosmetica_4057_brillo_labial_pink_addict.pdf', '0', NULL, NULL, 534, 254386),
(250, 10, 200, '**Observación: Impresión idéntica a la ultima compra**', '2022-11-08 14:33:33', '2022-11-07_15-41-51_2022_09_26_08_33_47_folleto_fabherr.pdf', '0', 16, NULL, 668, 256583),
(251, 7, 14, '2 impresiones de cada hoja', '2023-06-06 22:49:10', '2023-05-01_15-58-51_28_celeste_completo.pdf', '0', NULL, NULL, 168, 263388),
(252, 7, 14, '2 impresiones de cada hoja', '2023-06-06 22:49:19', '2023-06-06_22-47-32_28_fisico_completo.pdf', '0', NULL, NULL, 168, 264687),
(253, 7, 14, '2 impresiones de cada hoja', '2023-06-16 11:07:05', '2023-06-16_11-06-43_28_sepia_completo.pdf', '0', NULL, NULL, 168, 265081),
(254, 11, 5, NULL, '2023-09-11 11:29:54', '2023-09-11_11-29-47_gnl_2x1.cdr', NULL, NULL, NULL, 184, 268689),
(255, 13, 40, NULL, '2024-01-05 13:12:40', '2023-10-28_15-47-33_ari_ioni.pdf', '0', NULL, NULL, 158, 271035),
(256, 36, 10, NULL, '2024-01-05 13:12:51', '2023-10-28_15-47-51_ioni.pdf', '0', NULL, NULL, 158, 271036),
(257, 30, 1, NULL, '2024-01-09 10:09:14', '2024-01-09_10-09-01_copia_de_seguridad_de_benitez_calcos_gomeria.cdr', '0', NULL, NULL, 250, 273804),
(258, 7, 21, '3 impresiones de cada uno', '2024-04-06 12:05:10', '2024-04-06_12-04-47_28_celeste_completo.pdf', '0', NULL, NULL, 168, 276204),
(259, 7, 20, '5 impresiones de cada hoja', '2024-04-10 12:20:46', '2024-04-10_12-20-40_36_fisico.pdf', '0', NULL, NULL, 168, 276353),
(260, 36, 3, 'Pag 1 2 impresiones, pag 2 calado de pag 1\r\nPag 3 una impresion pag 4 calado de pag 3', '2024-05-07 14:47:36', '2023-12-28_14-44-49_sticker_red_y_ova.pdf', '0', NULL, NULL, 445, 273623),
(261, 11, 7, NULL, '2024-05-07 14:48:23', '2023-11-21_13-05-46_sin_titulo_1.pdf', '0', 16, NULL, 445, 272017),
(262, 7, 42, '3 impresiones de cada uno', '2024-05-11 19:46:34', '2024-05-11_19-45-32_28_cel_fis_completo.pdf', '0', NULL, NULL, 168, 277534),
(263, 13, 20, 'Es con precorte', '2024-07-24 08:51:30', '2024-07-24_08-50-51_2023_05_23_11_08_02_2022_03_14_09_09_25_etiqueta_3_cm.pdf', '0', NULL, NULL, 390, 280270),
(264, 11, 5, 'ajustar', '2024-09-26 12:18:01', '2024-09-26_12-15-15_menu_impreso_jonte_juramento_2.pdf', NULL, NULL, NULL, 127, 282691);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
