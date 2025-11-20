-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2025 a las 05:13:44
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
-- Base de datos: `db-vactiva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `idModule` bigint(20) NOT NULL,
  `titleModule` varchar(50) NOT NULL,
  `descriptModule` text NOT NULL,
  `statusModule` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permits`
--

CREATE TABLE `permits` (
  `idPermit` bigint(20) NOT NULL,
  `rolidPermit` bigint(20) NOT NULL,
  `moduleidPermit` bigint(20) NOT NULL,
  `r` int(1) NOT NULL DEFAULT 0,
  `w` int(1) NOT NULL DEFAULT 0,
  `u` int(1) NOT NULL DEFAULT 0,
  `d` int(1) NOT NULL DEFAULT 0,
  `statusPermit` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` bigint(20) NOT NULL,
  `nameRol` varchar(50) NOT NULL,
  `descripRol` text NOT NULL,
  `statusRol` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `namesUser` varchar(60) NOT NULL,
  `lastnameUser` varchar(60) NOT NULL,
  `adressUser` varchar(120) NOT NULL,
  `emailUser` varchar(120) NOT NULL,
  `phoneUser` int(10) NOT NULL,
  `tokenUser` varchar(80) NOT NULL,
  `rolidUser` bigint(20) NOT NULL,
  `statusUser` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`idModule`);

--
-- Indices de la tabla `permits`
--
ALTER TABLE `permits`
  ADD PRIMARY KEY (`idPermit`),
  ADD KEY `rolidPermit` (`rolidPermit`),
  ADD KEY `moduleidPermit` (`moduleidPermit`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `rolidUser` (`rolidUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `modules`
--
ALTER TABLE `modules`
  MODIFY `idModule` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permits`
--
ALTER TABLE `permits`
  MODIFY `idPermit` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permits`
--
ALTER TABLE `permits`
  ADD CONSTRAINT `permits_ibfk_1` FOREIGN KEY (`rolidPermit`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permits_ibfk_2` FOREIGN KEY (`moduleidPermit`) REFERENCES `modules` (`idModule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rolidUser`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
