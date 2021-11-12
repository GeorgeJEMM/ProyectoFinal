-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2021 a las 16:58:53
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IDPRODUCTO` int(11) NOT NULL,
  `IDCATEGORIA` int(11) DEFAULT NULL,
  `DESCRIPCIONCORTA` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `FOTOG` longblob DEFAULT NULL,
  `FOTOP` longblob DEFAULT NULL,
  `PRECIO` double NOT NULL,
  `HABILITADO` tinyint(1) NOT NULL,
  `DESCRIPCIONLARGA` varchar(300) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IDPRODUCTO`, `IDCATEGORIA`, `DESCRIPCIONCORTA`, `FOTOG`, `FOTOP`, `PRECIO`, `HABILITADO`, `DESCRIPCIONLARGA`, `Stock`) VALUES
(1, 1, 'Granola Artesanal Con Nueces, Pasas, Coco 1 Kg', NULL,NULL , 12, 1, 200);
INSERT INTO `productos` (`IDPRODUCTO`, `IDCATEGORIA`, `DESCRIPCIONCORTA`, `FOTOG`, `FOTOP`, `PRECIO`, `HABILITADO`, `DESCRIPCIONLARGA`, `Stock`) VALUES
(2, 8, 'MOUSE KLIP KMW-390 VERTICAL EVER REST',NULL,NULL, 23.47, 1, 'Un mouse que eleva el concepto de ergonomía ¿Buscas un mouse verdaderamente estilizado y ergonómico? El mouse vertical de Klip Xtreme ha sido diseñado para acomodarse perfectamente a la curvatura de la mano de aquéllos que pasan gran parte del día sentados frente al computador.', 25);
INSERT INTO `productos` (`IDPRODUCTO`, `IDCATEGORIA`, `DESCRIPCIONCORTA`, `FOTOG`, `FOTOP`, `PRECIO`, `HABILITADO`, `DESCRIPCIONLARGA`, `Stock`) VALUES
(3, 7, 'BIOCALCIUM D MK SOBRES 500 MG C/30 SUELTAS', '', '', 6.9, 1, 'BIOCALCIUM MK, coadyuvante en el tratamiento de deficiencias orgánicas de calcio. BIOCALCIUM D MK, coadyuvante en el tratamiento de deficiencias orgánicas de calcio y vitamina D.', 20),
INSERT INTO `productos` (`IDPRODUCTO`, `IDCATEGORIA`, `DESCRIPCIONCORTA`, `FOTOG`, `FOTOP`, `PRECIO`, `HABILITADO`, `DESCRIPCIONLARGA`, `Stock`) VALUES
(4, 3, 'FUNDAS PARA BASURA INDUSTRIAL', '', '', 1.49, 1, NULL, 'FUNDAS PARA BASURA INDUSTRIAL, (74 X 92 CM) B/D. 10 UNIDADES.', 40),
(5, 8, 'Impresora HP 415 WIFI | Sistema de Tinta', '', '', 279, 1, '– Impresora con sistema de tanque de tinta.\r\n– Imprima, copie, escanee, de manera inalámbrica\r\n– Conexión inalámbrica (WIFI)\r\n– Conexión USB\r\n– Velocidad ISO de 8 ppm en negro y 5 ppm a color\r\n– Incluye 4 botellas de tinta\r\n– Para imprimir unas 8000 paginas a color o 6000 en negro\r\n– Garantía 1 año ', 10),
(6, 2, 'SHAMPOO AVADIA BOTÁNICA BRILLO INTENSO 400 ML BBB', '', '', 5.53, 1, 'SHAMPOO CON FÓRMULA DE PH BALANCEADO QUE RESTAURA Y SELLA LAS ESCAMAS DE LA FIBRA CAPILAR, LOGRANDO QUE LA LUZ SE REFLEJE CON MAYOR INTENSIDAD, MAXIMIZANDO EL BRILLO Y LA SUAVIDAD DEL CABELLO.', 26),
(7, 5, 'JUGUETES CANICAS CANICA BRILLANTE COLOR SURTIDO', '', '', 1.45, 1, 'CANICAS BRILLANTES COLOR SURTIDO', 14),
(8, 6, 'ALIMENTO HUMEDO CAT CHOW ADULTOS PESCADO 85GR', '', '', 1.73, 1, 'ALIMENTO HÚMEDO SABOR A PESCADO DE 85G PARA GATOS ADULTOS DE TODAS LAS EDADES CON TECNOLOGÍA DEFENSE HYDRO, LLENA DE ANTIOXIDANTES QUE PROTEGEN SU SISTEMA INMUNE Y BALANCEA EL PH DE SU ORINA.', 16),
(9, 4, 'Licuadora Continental PNY65 | VASO-VIDRIO | 1.25L-5 TAZAS | POT.550 WATTS | PERILLA GIRATORIA', '', '', 42, 1, 'Características\r\n  Vaso de Vidrio\r\n  Capacidad 1.25 Litros\r\n  Potencia 550 W\r\n  Perilla Giratoria\r\n  3 Velocidades', 6);
INSERT INTO `productos` (`IDPRODUCTO`, `IDCATEGORIA`, `DESCRIPCIONCORTA`, `FOTOG`, `FOTOP`, `PRECIO`, `HABILITADO`, `FOTOSEXTRAS`, `DESCRIPCIONLARGA`, `Stock`) VALUES
(10, 1, 'MERMELADA FRUTIMORA FACUNDO 300 G', NULL,NULL, 1.29, 1, 'Mermelada Facundo 300 g Frutimora', 19);
INSERT INTO `productos` (`IDPRODUCTO`, `IDCATEGORIA`, `DESCRIPCIONCORTA`, `FOTOG`, `FOTOP`, `PRECIO`, `HABILITADO`, `FOTOSEXTRAS`, `DESCRIPCIONLARGA`, `Stock`) VALUES
(11, 2, 'MASCARILLA EXFOLIANTE CLARIFICANTE OSMOCLEAN', '', '', 39.99, 1, 'MACARILLA CLARIFICANTE PULIDORA EXFOLIANTE, SIN GRANOS. EL PRIMER PRODUCTO QUE COMBINA EL PODER LIMPIADOR DE UNA RICA MASCARILLA EN CREMA Y UN EXFOLIANTE SIN GRANOS CON UN EFECTO SUAVE QUE ACLARA Y UNIFICA EL CUTIS. LA PIEL ESTÁ PURIFICADA, LIMPIA Y LISTA PARA RECIBIR TRATAMIENTOS', 7),
(12, 3, 'TOALLAS DESINFECTANTES LAVA LIMÓN 40 UN', '', '', 3.74, 1, 'TOALLAS DESINFECTANTES LAVA LIMÓN. ELIMINA EL 99,99% DE BACTERIAS Y HONGOS. DESINFECCIÓN EXTREMA. SANITIZA COCINAS, BAÑOS Y DEMÁS SUPERFICIES. PAQUETE X40.', 13),
(13, 4, 'Freidora De Aire Hamilton Beach 35050', '', '', 132, 1, 'Caracteristicas\r\n   Capacitad 2.5L\r\n   Digital\r\n   6 Presets\r\n   Cesta Antiadherente\r\n   Apagado Automatico\r\n   Color Negro', 8);
INSERT INTO `productos` (`IDPRODUCTO`, `IDCATEGORIA`, `DESCRIPCIONCORTA`, `FOTOG`, `FOTOP`, `PRECIO`, `HABILITADO`, `FOTOSEXTRAS`, `DESCRIPCIONLARGA`, `Stock`) VALUES
(14, 5, 'HASBRO LITTLE PET SHOP GALLETA FORTUNA', NULL,NULL, 10.65, 1, 'HASBRO LITTLE PET SHOP GALLETA DE LA FORTUNA. REVELA TU MASCOTA, REVELA TU FORTUNA. PARA NIÑOS DE 3 AÑOS EN ADELANTE', 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IDPRODUCTO`),
  ADD KEY `FK_CATEGORIASXPRODUCTOS` (`IDCATEGORIA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IDPRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_CATEGORIASXPRODUCTOS` FOREIGN KEY (`IDCATEGORIA`) REFERENCES `categorias` (`IDCATEGORIA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
