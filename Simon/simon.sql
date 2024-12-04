-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 04-12-2024 a las 00:17:06
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
-- Base de datos: `bdsimon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simon`
--

CREATE TABLE `simon` (
  `id` int(11) NOT NULL,
  `Usuario` text NOT NULL,
  `Contraseña` text NOT NULL,
  `Rol` text NOT NULL,
  `intentosCorrectos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `simon`
--

INSERT INTO `simon` (`id`, `Usuario`, `Contraseña`, `Rol`, `intentosCorrectos`) VALUES
(1, 'paco alcacer', 'paco alcacer', 'Jugador', 0),
(3, '50', 'cent', 'Jugador', 0),
(4, '', '', 'Jugador', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `simon`
--
ALTER TABLE `simon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `simon`
--
ALTER TABLE `simon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
