-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2022 a las 21:46:22
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `easyrock`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id_local` int(20) NOT NULL,
  `nombre_local` varchar(50) NOT NULL,
  `ciudad` char(20) NOT NULL,
  `localidad` char(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cp` int(5) NOT NULL,
  `latitud` int(11) DEFAULT NULL,
  `longitud` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id_local`, `nombre_local`, `ciudad`, `localidad`, `direccion`, `cp`, `latitud`, `longitud`) VALUES
(0, 'GGProducciones', 'madrid', 'madrid', 'calle almansa', 28777, NULL, NULL),
(1, 'SKULLWHITE', 'MADRID', 'MADRID', 'C/Luz', 28026, NULL, NULL),
(2, 'MUSICSTUDIO', 'MADRID', 'LEGANES', 'C/Rosa', 28057, NULL, NULL),
(3, 'STUDIOPOLY', 'MADRID', 'MADRID', 'C/Margarita', 28029, NULL, NULL),
(4, 'SOURCETIME', 'MADRID', 'MADRID', 'C/Llama', 28026, NULL, NULL),
(5, 'Figaro', 'Madrid', 'Madrid', 'C/Lucas 234', 28059, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_locales`
--

CREATE TABLE `reservas_locales` (
  `id_reserva` int(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `id_saldo` double DEFAULT 100,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas_locales`
--

INSERT INTO `reservas_locales` (`id_reserva`, `id_local`, `id_solicitud`, `fecha`, `hora_inicio`, `id_saldo`, `id_usuario`) VALUES
(207, 1, 250, '2022-06-02', '21:00:00', 100, 18),
(208, 2, 251, '2022-06-03', '21:00:00', 100, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_usuarios`
--

CREATE TABLE `reservas_usuarios` (
  `id_reserva` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` double NOT NULL DEFAULT 100,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `id_usuario`) VALUES
(100, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_reserva`
--

CREATE TABLE `solicitud_reserva` (
  `id_solicitud` int(11) NOT NULL,
  `id_local` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `importe` double DEFAULT 10,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(15) NOT NULL,
  `nombre_usuario` char(30) NOT NULL,
  `apellido1` char(30) NOT NULL,
  `apellido2` char(30) NOT NULL,
  `telefono` int(12) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `instrumento` varchar(30) DEFAULT NULL COMMENT 'guitarra',
  `descripcion` varchar(1000) NOT NULL COMMENT 'Puedes dar tu descripcion como solista o grupo',
  `contrasenia` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido1`, `apellido2`, `telefono`, `correo`, `instrumento`, `descripcion`, `contrasenia`, `image`) VALUES
(18, 'Victor', 'Lopez', 'Morales', 666554477, 'victorlopez.daw@ciudadescolarfp.es', 'nada', 'nada', '$2y$10$Dtf5Kt4qJKikuMVCMWjGaede64Io8i4iUqi3v/bQ0Ubvx6P710q2W', '../Resources/pictures/egip.jpg'),
(19, 'Manuel', 'Reino', 'Diez', 654787412, 'manu1993reino@gmail.com', 'nada', 'nada', '$2y$10$p3GjL9DpUPMrKyx.6cHkkuzYKiZxVJBn.plf/3sdDm9FLwiatMNE.', '../Resources/pictures/manuPerfil.jpg'),
(20, 'Mireya', 'Lopez', 'Marin', 666558899, 'mire@gmail.com', 'Acordeon', 'nada', '$2y$10$JrxZjS4MyDag471ZVpnMAuL4AYPEBtvZA3d6F/6UHGGjH5Jtq2jBy', NULL),
(21, 'Cristina', 'Lopez', 'Mora', 666554477, 'cristina@gmail.com', 'Guitarra', 'hola', '$2y$10$iYmQbm9tandNIxlt0JJBFOpuP3i6nyK3xRK5nHHlea2Ed9Yb8mQEe', ''),
(22, 'adminadmin', 'adminadmin', 'adminadmin', 666666666, 'admin@admin.com', '---', '---', '$2y$10$teFM9motKk2c///AmcYHQ.Q18LfKDKLsAOipXjBRc.sWYrFc7FK9G', NULL),
(23, 'Lex', 'Lopez', 'Morales', 666666666, 'lex_libra5@hotmail.com', 'Acordeon', 'Poco', '$2y$10$vpRS4wH5hY.ULggfx5r0wOmcUcUeqjvNaBBlfKw3NlVhSd4.WEfW.', '../Resources/pictures/harry.jpg'),
(24, 'Nutria', 'Lopez', 'Fergo', 666666666, 'nutria@gmail.com', 'Acordeon', 'Poco', '$2y$10$YZT6QO0l2S/XNs2YE86SD.Km1TN9.jIeBhULI/mCGPGdVVkdZR/6m', '../Resources/pictures/nutria.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id_local`);

--
-- Indices de la tabla `reservas_locales`
--
ALTER TABLE `reservas_locales`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_id_local2` (`id_local`),
  ADD KEY `fk_id_saldo` (`id_saldo`),
  ADD KEY `fk_id_solicitud` (`id_solicitud`),
  ADD KEY `fk_id_usuario2` (`id_usuario`);

--
-- Indices de la tabla `reservas_usuarios`
--
ALTER TABLE `reservas_usuarios`
  ADD KEY `fk_id_reserva` (`id_reserva`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Indices de la tabla `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indices de la tabla `solicitud_reserva`
--
ALTER TABLE `solicitud_reserva`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `fk_id_local` (`id_local`),
  ADD KEY `fk_id_usuario3` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas_locales`
--
ALTER TABLE `reservas_locales`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de la tabla `solicitud_reserva`
--
ALTER TABLE `solicitud_reserva`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas_locales`
--
ALTER TABLE `reservas_locales`
  ADD CONSTRAINT `fk_id_local2` FOREIGN KEY (`id_local`) REFERENCES `locales` (`id_local`),
  ADD CONSTRAINT `fk_id_saldo` FOREIGN KEY (`id_saldo`) REFERENCES `saldo` (`id_saldo`),
  ADD CONSTRAINT `fk_id_usuario2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `reservas_usuarios`
--
ALTER TABLE `reservas_usuarios`
  ADD CONSTRAINT `fk_id_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `reservas_locales` (`id_reserva`),
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `solicitud_reserva`
--
ALTER TABLE `solicitud_reserva`
  ADD CONSTRAINT `fk_id_local` FOREIGN KEY (`id_local`) REFERENCES `locales` (`id_local`),
  ADD CONSTRAINT `fk_id_usuario3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
