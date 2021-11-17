-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-02-2018 a las 10:18:54
-- Versión del servidor: 5.1.33-community
-- Versión de PHP: 5.2.9-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `autobuses`
--
CREATE DATABASE IF NOT EXISTS `autobuses` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `autobuses`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

DROP TABLE IF EXISTS `autos`;
CREATE TABLE IF NOT EXISTS `autos` (
  `Matricula` varchar(6) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Num_plazas` int(11) NOT NULL,
  PRIMARY KEY (`Matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`Matricula`, `Marca`, `Num_plazas`) VALUES
('345CXD', 'Renault', 60),
('427BCF', 'Opel', 60),
('647CAB', 'Ford', 60),
('776SCD', 'Renault', 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

DROP TABLE IF EXISTS `viajes`;
CREATE TABLE IF NOT EXISTS `viajes` (
  `Fecha` date NOT NULL,
  `Matricula` varchar(6) NOT NULL,
  `Origen` varchar(20) NOT NULL,
  `Destino` varchar(20) NOT NULL,
  `Plazas_libres` int(11) NOT NULL,
  PRIMARY KEY (`Fecha`,`Matricula`,`Origen`,`Destino`),
  KEY `Matricula` (`Matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`Fecha`, `Matricula`, `Origen`, `Destino`, `Plazas_libres`) VALUES
('2016-01-01', '345CXD', 'Madrid', 'Malaga', 23),
('2016-01-01', '647CAB', 'Malaga', 'Sevilla', 12),
('2016-01-01', '776SCD', 'Madrid', 'Barcelona', 45),
('2016-01-02', '345CXD', 'Madrid', 'Malaga', 8),
('2016-01-03', '427BCF', 'Cordoba', 'Malaga', 21),
('2016-01-03', '776SCD', 'Madrid', 'Huelva', 18);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`Matricula`) REFERENCES `autos` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;