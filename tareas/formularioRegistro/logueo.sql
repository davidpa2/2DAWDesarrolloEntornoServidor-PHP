-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2019 a las 13:50:58
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7
CREATE DATABASE logueousuarios;

USE logueousuarios;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tema4_logueo`
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
('dwes', 'dwes', 'Pelota', 'Lucena', 'dwes@hotmail.com', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 'red', 'green', 'Times New Roman', 16),
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