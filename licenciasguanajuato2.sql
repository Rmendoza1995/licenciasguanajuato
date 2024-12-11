-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2024 a las 22:50:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdnew`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licenciasguanajuato`
--

CREATE TABLE `licenciasguanajuato2` (
  `id` int(11) NOT NULL,
  `Nlicencia` varchar(50) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `frente` varchar(200) DEFAULT NULL,
  `vigencia` varchar(200) DEFAULT NULL,
  `fecha_emitida` varchar(50) DEFAULT NULL,
  `usuarioregistro` varchar(60) DEFAULT NULL,
  `tipolicencia` varchar(15) NOT NULL,
  `nombrecompleto` varchar(80) NOT NULL,
  `fechavigencia` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `licenciasguanajuato2`
--

INSERT INTO `licenciasguanajuato2` (`id`, `Nlicencia`, `tipo`, `frente`, `vigencia`, `fecha_emitida`, `usuarioregistro`, `tipolicencia`, `nombrecompleto`, `fechavigencia`) VALUES
(5, '12345', 'auto', 'uploads/terminos_res.jpg', 'vigencia', '2024-12-26', 'admin', '', '', ''),
(6, '12346', 'auto', 'uploads/1849319.png', 'vigente', '2024-12-12', 'admin', 'D', 'prueba nombre completo agregado', '2025-02-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `licenciasguanajuato2`
--
ALTER TABLE `licenciasguanajuato2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `licenciasguanajuato2`
--
ALTER TABLE `licenciasguanajuato2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
