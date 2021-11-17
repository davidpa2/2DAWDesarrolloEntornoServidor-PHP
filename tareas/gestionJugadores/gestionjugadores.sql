-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2021 a las 20:46:45
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionjugadores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `dorsal` int(11) NOT NULL,
  `posición` set('Portero','Defensa','Centrocampista','Delantero') NOT NULL,
  `equipo` varchar(50) NOT NULL,
  `goles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `dni`, `nombre`, `dorsal`, `posición`, `equipo`, `goles`) VALUES
(3, '43215678S', 'Sabrina', 1, 'Delantero', 'Argentina', 25),
(11, '34567453H', 'Pedar', 8, 'Portero,Defensa,Centrocampista,Delantero', 'Zuheros', 25),
(12, '12345678Y', 'Davilillo', 9, 'Portero,Defensa,Centrocampista', 'Mancha Real', 244),
(18, '87654321W', 'Franchesco', 11, 'Portero,Defensa,Centrocampista,Delantero', 'Las Parmas', 3),
(20, '12345678D', 'David', 4, 'Defensa,Centrocampista', 'Mancha Real', 23),
(22, '87654321L', 'Juan', 1, 'Delantero', 'Andalusia', 0),
(26, '87654321K', 'Paco', 5, 'Defensa', 'Mancha Real', 25),
(27, '87654321O', 'David', 1, 'Defensa,Centrocampista', 'Mancha', 4),
(28, '87654321H', 'Fran', 8, 'Portero,Centrocampista', 'Andalusia', 0),
(29, '87654321P', 'Lolita', 1, 'Centrocampista,Delantero', 'Andalusia', 4),
(31, '89738367L', 'Thor Menta', 1, 'Portero,Defensa,Centrocampista', 'Huesca', 20),
(32, '12345678E', 'Juan Antonio', 6, 'Defensa,Centrocampista', 'Zuheros', 25),
(33, '12345678P', 'Lolita', 11, 'Defensa,Delantero', 'Mancha Real', 25),
(34, '12345678R', 'Papote', 7, 'Defensa,Centrocampista', 'Andalusia', 0),
(35, '12345678A', 'Papuelo', 3, 'Defensa,Delantero', 'Mancha Real', 25);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
