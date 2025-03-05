<<<<<<< HEAD
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 26-02-2025 a las 00:16:54
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
-- Base de datos: `diabetesdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `tipo_comida` varchar(30) NOT NULL,
  `gl_1h` int(11) NOT NULL,
  `gl_2h` int(11) NOT NULL,
  `raciones` int(11) NOT NULL,
  `insulina` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comida`
--

INSERT INTO `comida` (`tipo_comida`, `gl_1h`, `gl_2h`, `raciones`, `insulina`, `fecha`, `id_usu`) VALUES
('Almuerzo', 1, 3123123, 23, 23, '0001-01-01', 3),
('Almuerzo', 4, 44, 444, 4, '0123-03-12', 3),
('cena', 1, 121, 11212, 12, '2009-09-09', 2),
('cena', 2222, 222, 222222, 222222, '2024-02-22', 3),
('cena', 11, 11, 11, 11, '2024-10-12', 3),
('comida', 12, 1, 122, 12, '1111-11-11', 2),
('comida', 12, 12, 12, 12, '1111-11-11', 3),
('comida', 909, 0, 0, 2147483647, '2025-02-12', 2),
('desayuno', 12, 12, 12, 12, '1212-12-12', 3),
('desayuno', 12, 12, 12, 12, '2005-11-16', 3),
('desayuno', 1001, 20, 1020, 120, '2025-02-12', 2),
('desayuno', 12, 1, 122, 1, '2025-02-21', 2),
('desayuno', 5, 5, 5, 5, '2025-02-25', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_glucosa`
--

CREATE TABLE `control_glucosa` (
  `fecha` date NOT NULL,
  `deporte` int(11) NOT NULL,
  `lenta` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `control_glucosa`
--

INSERT INTO `control_glucosa` (`fecha`, `deporte`, `lenta`, `id_usu`) VALUES
('0001-01-01', 2, 12321, 3),
('0123-03-12', 4, 4, 3),
('1111-11-11', 1, 1, 2),
('1111-11-11', 4, 1, 3),
('1212-12-12', 4, 12, 3),
('2005-11-16', 1, 12, 3),
('2009-09-09', 5, 21221, 2),
('2024-02-22', 2, 22, 3),
('2024-10-12', 1, 11, 3),
('2025-02-12', 2, 12, 2),
('2025-02-21', 2, 323, 2),
('2025-02-25', 5, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hiperglucemia`
--

CREATE TABLE `hiperglucemia` (
  `glucosa` int(11) NOT NULL,
  `hora` time NOT NULL,
  `correccion` int(11) NOT NULL,
  `tipo_comida` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hiperglucemia`
--

INSERT INTO `hiperglucemia` (`glucosa`, `hora`, `correccion`, `tipo_comida`, `fecha`, `id_usu`) VALUES
(12, '12:32:00', 12, 'cena', '2009-09-09', 2),
(11, '11:11:00', 11, 'cena', '2024-10-12', 3),
(12, '12:21:00', 111, 'comida', '1111-11-11', 2),
(12, '12:12:00', 1212, 'desayuno', '1212-12-12', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hipoglucemia`
--

CREATE TABLE `hipoglucemia` (
  `glucosa` int(11) NOT NULL,
  `hora` time NOT NULL,
  `tipo_comida` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hipoglucemia`
--

INSERT INTO `hipoglucemia` (`glucosa`, `hora`, `tipo_comida`, `fecha`, `id_usu`) VALUES
(123, '12:23:00', 'Almuerzo', '0001-01-01', 3),
(4, '04:04:00', 'Almuerzo', '0123-03-12', 3),
(1910, '22:22:00', 'cena', '2024-02-22', 3),
(12, '12:12:00', 'comida', '1111-11-11', 3),
(9, '08:06:00', 'comida', '2025-02-12', 2),
(12, '12:32:00', 'desayuno', '2005-11-16', 3),
(100, '11:11:00', 'desayuno', '2025-02-12', 2),
(123, '12:03:00', 'desayuno', '2025-02-21', 2),
(5, '05:55:00', 'desayuno', '2025-02-25', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `fecha_nacimiento`, `nombre`, `apellidos`, `usuario`, `contra`) VALUES
(1, '2005-11-16', 'Gabriel', 'Hernandez', 'gabrielhc', '$2y$10$g6GFFLjrpZEiJmLiZyGEI.dgr1uuybqG37t8Ja79FlMRV/lEoDcAW'),
(2, '1987-05-24', 'Lionel Andres ', 'Messi Cuccitinni', 'leomessi', '$2y$10$ZfjZl13DzUOipo9Czc1/Ve0AOFg1.UP5SpH3tQCbI46brAL1vgci6'),
(3, '2001-12-07', 'Pedro', 'Dominguez Quevedo', 'quevedo.pd', '$2y$10$Qcuo.T.ZskwH2eX8QSDyweI2l7USXz9w6y8CKka51t8qHq2yp0HCC'),
(4, '1979-05-29', 'Cristina', 'Correa Santana', 'criscorrea', '$2y$10$cotbrpCFDEksE77yUM1kxOlo7xCvYWujwZ4JOY.1OcWgKmUyOaKku'),
(5, '1973-03-22', 'Edmundo', 'Hernandez Proenza', 'mundo_hdez', '$2y$10$OYkVlDzfNTHm7Ylmmgbmle40pVJ4jFW.6H5AJTrH14sZfQlN0.T96'),
(6, '2001-05-17', 'Cesar', 'Garrido Secades', 'cesargarrido', '$2y$10$3JaZ56HKZce/ronCBHRm.O91rkPZp5HraGv2/NdT82FATNaclkNDO'),
(7, '2005-01-21', 'Olaya', 'Heres Perez', 'olayaaheress', '$2y$10$8bYMcjiqMQv1WLtqK.CGkuxrbJSVvbSGj77HO4Xr1ohzOAsQdtP2y'),
(8, '2004-10-04', 'Daniel', 'Ramos Fernandez', 'danidrf', '$2y$10$4q3ACN3Nw92rdB6H.O/fEujXiYV6pHG.jQkGCn/4ZD8SCOC27Uy0S'),
(9, '1990-04-10', 'Maikel', 'Delacalle', 'maikeldela', '$2y$10$Mr5QOY3abPeEgwA0PJAVsuAs5KyanRkSvPfm0DSSyjPX5H3pK7/3i'),
(11, '2010-08-10', 'Andres', 'Iniesta', 'kaliseparatodos', '$2y$10$3VlckaByYq5J9t2VJl3IJOoSjEHvbMkKhAXIYC33.lxFNFpCFOJ96'),
(13, '1994-11-20', 'Lucho', 'RK', 'luchork', '$2y$10$dDUxrOEUfqdfx0xRJCdC5uIDQk3nz.XrO4jUqn6pM4BcEhvUxxDcO'),
(14, '1998-08-17', 'Alex', 'Baena', 'baenazo', '$2y$10$e0oCzaVNsa7gXWfNAyXZh.6YWqi1TV3uNjuSxVISbJVvVbiRpY5I2'),
(15, '1990-10-20', 'Giannis', 'Antetokounmpo', 'giannis', '$2y$10$Db0y563b754KFmR74Waq6uaytpWkQPdhz4ifFUPQEGl3a84ra4eVu'),
(16, '1993-06-15', 'Carlos', 'Bruñas Zamorin', 'cruzzi', '$2y$10$42WMqc3Y/1cEg6SMtsj1p.Oe0ng1GlNgbY0DudeA2yvkeiQcEXvSC'),
(18, '0000-00-00', '', '', '', '$2y$10$Kn2R/cX.1HhhRoX0ev.b6u/SU3QTV1hdNBrqNUU0hurAGrqvbk65O');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`tipo_comida`,`fecha`,`id_usu`),
  ADD KEY `fecha` (`fecha`,`id_usu`);

--
-- Indices de la tabla `control_glucosa`
--
ALTER TABLE `control_glucosa`
  ADD PRIMARY KEY (`fecha`,`id_usu`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `hiperglucemia`
--
ALTER TABLE `hiperglucemia`
  ADD PRIMARY KEY (`tipo_comida`,`fecha`,`id_usu`);

--
-- Indices de la tabla `hipoglucemia`
--
ALTER TABLE `hipoglucemia`
  ADD PRIMARY KEY (`tipo_comida`,`fecha`,`id_usu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comida`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `comida_ibfk_1` FOREIGN KEY (`fecha`,`id_usu`) REFERENCES `control_glucosa` (`fecha`, `id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `control_glucosa`
--
ALTER TABLE `control_glucosa`
  ADD CONSTRAINT `control_glucosa_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hiperglucemia`
--
ALTER TABLE `hiperglucemia`
  ADD CONSTRAINT `hiperglucemia_ibfk_1` FOREIGN KEY (`tipo_comida`,`fecha`,`id_usu`) REFERENCES `comida` (`tipo_comida`, `fecha`, `id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hipoglucemia`
--
ALTER TABLE `hipoglucemia`
  ADD CONSTRAINT `hipoglucemia_ibfk_1` FOREIGN KEY (`tipo_comida`,`fecha`,`id_usu`) REFERENCES `comida` (`tipo_comida`, `fecha`, `id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
=======
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 26-02-2025 a las 00:16:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12
USE `4595002_gabrielhc`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diabetesdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `tipo_comida` varchar(30) NOT NULL,
  `gl_1h` int(11) NOT NULL,
  `gl_2h` int(11) NOT NULL,
  `raciones` int(11) NOT NULL,
  `insulina` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comida`
--

INSERT INTO `comida` (`tipo_comida`, `gl_1h`, `gl_2h`, `raciones`, `insulina`, `fecha`, `id_usu`) VALUES
('Almuerzo', 1, 3123123, 23, 23, '0001-01-01', 3),
('Almuerzo', 4, 44, 444, 4, '0123-03-12', 3),
('cena', 1, 121, 11212, 12, '2009-09-09', 2),
('cena', 2222, 222, 222222, 222222, '2024-02-22', 3),
('cena', 11, 11, 11, 11, '2024-10-12', 3),
('comida', 12, 1, 122, 12, '1111-11-11', 2),
('comida', 12, 12, 12, 12, '1111-11-11', 3),
('comida', 909, 0, 0, 2147483647, '2025-02-12', 2),
('desayuno', 12, 12, 12, 12, '1212-12-12', 3),
('desayuno', 12, 12, 12, 12, '2005-11-16', 3),
('desayuno', 1001, 20, 1020, 120, '2025-02-12', 2),
('desayuno', 12, 1, 122, 1, '2025-02-21', 2),
('desayuno', 5, 5, 5, 5, '2025-02-25', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_glucosa`
--

CREATE TABLE `control_glucosa` (
  `fecha` date NOT NULL,
  `deporte` int(11) NOT NULL,
  `lenta` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `control_glucosa`
--

INSERT INTO `control_glucosa` (`fecha`, `deporte`, `lenta`, `id_usu`) VALUES
('0001-01-01', 2, 12321, 3),
('0123-03-12', 4, 4, 3),
('1111-11-11', 1, 1, 2),
('1111-11-11', 4, 1, 3),
('1212-12-12', 4, 12, 3),
('2005-11-16', 1, 12, 3),
('2009-09-09', 5, 21221, 2),
('2024-02-22', 2, 22, 3),
('2024-10-12', 1, 11, 3),
('2025-02-12', 2, 12, 2),
('2025-02-21', 2, 323, 2),
('2025-02-25', 5, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hiperglucemia`
--

CREATE TABLE `hiperglucemia` (
  `glucosa` int(11) NOT NULL,
  `hora` time NOT NULL,
  `correccion` int(11) NOT NULL,
  `tipo_comida` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hiperglucemia`
--

INSERT INTO `hiperglucemia` (`glucosa`, `hora`, `correccion`, `tipo_comida`, `fecha`, `id_usu`) VALUES
(12, '12:32:00', 12, 'cena', '2009-09-09', 2),
(11, '11:11:00', 11, 'cena', '2024-10-12', 3),
(12, '12:21:00', 111, 'comida', '1111-11-11', 2),
(12, '12:12:00', 1212, 'desayuno', '1212-12-12', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hipoglucemia`
--

CREATE TABLE `hipoglucemia` (
  `glucosa` int(11) NOT NULL,
  `hora` time NOT NULL,
  `tipo_comida` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hipoglucemia`
--

INSERT INTO `hipoglucemia` (`glucosa`, `hora`, `tipo_comida`, `fecha`, `id_usu`) VALUES
(123, '12:23:00', 'Almuerzo', '0001-01-01', 3),
(4, '04:04:00', 'Almuerzo', '0123-03-12', 3),
(1910, '22:22:00', 'cena', '2024-02-22', 3),
(12, '12:12:00', 'comida', '1111-11-11', 3),
(9, '08:06:00', 'comida', '2025-02-12', 2),
(12, '12:32:00', 'desayuno', '2005-11-16', 3),
(100, '11:11:00', 'desayuno', '2025-02-12', 2),
(123, '12:03:00', 'desayuno', '2025-02-21', 2),
(5, '05:55:00', 'desayuno', '2025-02-25', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `fecha_nacimiento`, `nombre`, `apellidos`, `usuario`, `contra`) VALUES
(1, '2005-11-16', 'Gabriel', 'Hernandez', 'gabrielhc', '$2y$10$g6GFFLjrpZEiJmLiZyGEI.dgr1uuybqG37t8Ja79FlMRV/lEoDcAW'),
(2, '1987-05-24', 'Lionel Andres ', 'Messi Cuccitinni', 'leomessi', '$2y$10$ZfjZl13DzUOipo9Czc1/Ve0AOFg1.UP5SpH3tQCbI46brAL1vgci6'),
(3, '2001-12-07', 'Pedro', 'Dominguez Quevedo', 'quevedo.pd', '$2y$10$Qcuo.T.ZskwH2eX8QSDyweI2l7USXz9w6y8CKka51t8qHq2yp0HCC'),
(4, '1979-05-29', 'Cristina', 'Correa Santana', 'criscorrea', '$2y$10$cotbrpCFDEksE77yUM1kxOlo7xCvYWujwZ4JOY.1OcWgKmUyOaKku'),
(5, '1973-03-22', 'Edmundo', 'Hernandez Proenza', 'mundo_hdez', '$2y$10$OYkVlDzfNTHm7Ylmmgbmle40pVJ4jFW.6H5AJTrH14sZfQlN0.T96'),
(6, '2001-05-17', 'Cesar', 'Garrido Secades', 'cesargarrido', '$2y$10$3JaZ56HKZce/ronCBHRm.O91rkPZp5HraGv2/NdT82FATNaclkNDO'),
(7, '2005-01-21', 'Olaya', 'Heres Perez', 'olayaaheress', '$2y$10$8bYMcjiqMQv1WLtqK.CGkuxrbJSVvbSGj77HO4Xr1ohzOAsQdtP2y'),
(8, '2004-10-04', 'Daniel', 'Ramos Fernandez', 'danidrf', '$2y$10$4q3ACN3Nw92rdB6H.O/fEujXiYV6pHG.jQkGCn/4ZD8SCOC27Uy0S'),
(9, '1990-04-10', 'Maikel', 'Delacalle', 'maikeldela', '$2y$10$Mr5QOY3abPeEgwA0PJAVsuAs5KyanRkSvPfm0DSSyjPX5H3pK7/3i'),
(11, '2010-08-10', 'Andres', 'Iniesta', 'kaliseparatodos', '$2y$10$3VlckaByYq5J9t2VJl3IJOoSjEHvbMkKhAXIYC33.lxFNFpCFOJ96'),
(13, '1994-11-20', 'Lucho', 'RK', 'luchork', '$2y$10$dDUxrOEUfqdfx0xRJCdC5uIDQk3nz.XrO4jUqn6pM4BcEhvUxxDcO'),
(14, '1998-08-17', 'Alex', 'Baena', 'baenazo', '$2y$10$e0oCzaVNsa7gXWfNAyXZh.6YWqi1TV3uNjuSxVISbJVvVbiRpY5I2'),
(15, '1990-10-20', 'Giannis', 'Antetokounmpo', 'giannis', '$2y$10$Db0y563b754KFmR74Waq6uaytpWkQPdhz4ifFUPQEGl3a84ra4eVu'),
(16, '1993-06-15', 'Carlos', 'Bruñas Zamorin', 'cruzzi', '$2y$10$42WMqc3Y/1cEg6SMtsj1p.Oe0ng1GlNgbY0DudeA2yvkeiQcEXvSC'),
(18, '0000-00-00', '', '', '', '$2y$10$Kn2R/cX.1HhhRoX0ev.b6u/SU3QTV1hdNBrqNUU0hurAGrqvbk65O');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`tipo_comida`,`fecha`,`id_usu`),
  ADD KEY `fecha` (`fecha`,`id_usu`);

--
-- Indices de la tabla `control_glucosa`
--
ALTER TABLE `control_glucosa`
  ADD PRIMARY KEY (`fecha`,`id_usu`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `hiperglucemia`
--
ALTER TABLE `hiperglucemia`
  ADD PRIMARY KEY (`tipo_comida`,`fecha`,`id_usu`);

--
-- Indices de la tabla `hipoglucemia`
--
ALTER TABLE `hipoglucemia`
  ADD PRIMARY KEY (`tipo_comida`,`fecha`,`id_usu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comida`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `comida_ibfk_1` FOREIGN KEY (`fecha`,`id_usu`) REFERENCES `control_glucosa` (`fecha`, `id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `control_glucosa`
--
ALTER TABLE `control_glucosa`
  ADD CONSTRAINT `control_glucosa_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hiperglucemia`
--
ALTER TABLE `hiperglucemia`
  ADD CONSTRAINT `hiperglucemia_ibfk_1` FOREIGN KEY (`tipo_comida`,`fecha`,`id_usu`) REFERENCES `comida` (`tipo_comida`, `fecha`, `id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hipoglucemia`
--
ALTER TABLE `hipoglucemia`
  ADD CONSTRAINT `hipoglucemia_ibfk_1` FOREIGN KEY (`tipo_comida`,`fecha`,`id_usu`) REFERENCES `comida` (`tipo_comida`, `fecha`, `id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
>>>>>>> 6a84c8ce9e122591589028e067b35860372c069c
