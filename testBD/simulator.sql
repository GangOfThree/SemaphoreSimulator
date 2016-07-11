-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2016 a las 22:11:32
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `simulator`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semaforo`
--

CREATE TABLE IF NOT EXISTS `semaforo` (
`id` int(11) NOT NULL,
  `autosPorMinuto` int(11) NOT NULL,
  `frecuencia` int(11) NOT NULL,
  `callePrimaria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `calleSecundaria` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `semaforo`
--

INSERT INTO `semaforo` (`id`, `autosPorMinuto`, `frecuencia`, `callePrimaria`, `calleSecundaria`) VALUES
(103, 17, 4, '1', '71'),
(104, 7, 3, '3', '69'),
(105, 14, 12, '5', '67'),
(106, 3, 0, '7', '65'),
(107, 19, 6, '9', '63'),
(108, 9, 5, '11', '61'),
(109, 14, 9, '13', '59'),
(110, 5, 1, '15', '57'),
(111, 16, 1, '17', '55'),
(112, 20, 6, '19', '53'),
(113, 8, 4, '21', '51'),
(114, 15, 5, '23', '49'),
(115, 4, 1, '25', '47'),
(116, 17, 8, '27', '45'),
(117, 9, 2, '29', '43'),
(118, 7, 1, '31', '41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `semaforo`
--
ALTER TABLE `semaforo`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `semaforo`
--
ALTER TABLE `semaforo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=119;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
