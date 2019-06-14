-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2019 a las 02:44:38
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios_db`
--
CREATE DATABASE IF NOT EXISTS `usuarios_db` DEFAULT CHARACTER SET ucs2 COLLATE ucs2_spanish2_ci;
USE `usuarios_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `legajo` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL,
  `email` varchar(60) COLLATE ucs2_spanish2_ci NOT NULL,
  `clave` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL,
  `sexo` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  `dni` varchar(20) COLLATE ucs2_spanish2_ci NOT NULL,
  `foto` varchar(100) COLLATE ucs2_spanish2_ci NOT NULL,
  `sueldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`legajo`, `nombre`, `apellido`, `email`, `clave`, `sexo`, `dni`, `foto`, `sueldo`) VALUES
(10, 'Tom', 'Cruise', 'asd', '1234', 'masculino', '2335542', '13-06-2019.10.jpg', 12335);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`legajo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
