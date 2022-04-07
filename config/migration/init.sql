-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-04-2022 a las 12:50:51
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project_ingeteam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_user`
--

DROP TABLE IF EXISTS `web_user`;
CREATE TABLE IF NOT EXISTS `web_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq1_web_user_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_user_task`
--

DROP TABLE IF EXISTS `web_user_task`;
CREATE TABLE IF NOT EXISTS `web_user_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `web_user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_web_user_id` (`web_user_id`),
  KEY `fk_task_id` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `web_user_task`
--
ALTER TABLE `web_user_task`
  ADD CONSTRAINT `fk_task_id` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_web_user_id` FOREIGN KEY (`web_user_id`) REFERENCES `web_user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
