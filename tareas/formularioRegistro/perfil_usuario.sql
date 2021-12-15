-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2021 a las 09:52:08
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
-- Base de datos: `logueousuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_usuario`
--

CREATE TABLE `perfil_usuario` (
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `localidad` varchar(40) NOT NULL,
  `user` varchar(120) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `color_letra` varchar(20) NOT NULL,
  `color_fondo` varchar(20) NOT NULL,
  `tipo_letra` varchar(40) NOT NULL,
  `tam_letra` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Volcado de datos para la tabla `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`nombre`, `apellidos`, `direccion`, `localidad`, `user`, `pass`, `color_letra`, `color_fondo`, `tipo_letra`, `tam_letra`) VALUES
('Antonio Jesús', 'de la Rosa', 'Su morada', 'Castro', 'antoin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '#ff7300', '#fb00ff', 'arial', 20),
('David', 'Padilla Aguilera', 'Mi casa', 'Baena', 'david@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'rojo', 'negro', 'Times new roman', 15),
('David', 'Parejo', 'His house', 'Lusena', 'davilon@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '#ffdd00', '#ff0000', 'comic sans', 20),
('dwes', 'dwes', 'Pelota', 'Lucena', 'dwes@hotmail.com', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 'red', 'green', 'Times New Roman', 16),
('Sabrina', 'Ojea', 'Su morada', 'Lucena', 'ella@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'green', 'grey', 'constantia', 14),
('usuario', 'usuario martinez', 'fuente las piedras', 'cabra', 'usuario@hotmail.com', 'f8032d5cae3de20fcec887f395ec9a6a', 'blue', 'red', 'Verdana', 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  ADD PRIMARY KEY (`user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
