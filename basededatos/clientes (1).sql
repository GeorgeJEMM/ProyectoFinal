-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2021 a las 16:57:33
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDCLIENTE` int(11) NOT NULL,
  `IDCIUDAD` int(11) DEFAULT NULL,
  `NOMBRE` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `APELLIDO` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `IDENTIFICACION` varchar(13) COLLATE utf8mb4_spanish_ci NOT NULL,
  `CELULAR` varchar(13) COLLATE utf8mb4_spanish_ci NOT NULL,
  `DIRECCION` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IDCLIENTE`, `IDCIUDAD`, `NOMBRE`, `APELLIDO`, `IDENTIFICACION`, `CELULAR`, `DIRECCION`) VALUES
(1, 1, 'Jose', 'Elizalde', '1725489978', '0984576891', 'Av. Siempre Viva'),
(2, 2, 'Jorge', 'Perez', '1748562247', '0998745811', 'Av. De Los Valcanes'),
(3, 8, 'Marco', 'Antonio', '1745236985', '0987452369', 'Calle Bolívar y Solano'),
(4, 3, 'Estuardo', 'Moreira', '0165984752', '0974512365', 'Pueblo Achuar Av. del Bombero, Cuenca 010109'),
(5, 5, 'Susana', 'Quiñones', '0874512365', '0987451236', 'Pedro Vicente Maldonado & Rocafuerte, Esmeraldas'),
(6, 2, 'Luisa', 'Cardenas', '0974586235', '0965234187', 'Gómez Rendón E/ Leonidas, Guerrero Martinez, Guayaquil 090302'),
(7, 7, 'Mauricio', 'Cabezas', '2356741058', '0985674123', 'Av.Simón Plata Torres entre calle Esmeraldas y calle 1 de Mayo, La Concordia 080701'),
(8, 1, 'Jacinto', 'Llanto', '1749856412', '0978456231', 'Portoviejo N19-A Y, Quito 170103');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDCLIENTE`),
  ADD KEY `FK_CIUDADESXCLIENTES` (`IDCIUDAD`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDCLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `FK_CIUDADESXCLIENTES` FOREIGN KEY (`IDCIUDAD`) REFERENCES `ciudades` (`IDCIUDAD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
