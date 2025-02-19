-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-02-2025 a las 13:50:13
-- Versión del servidor: 8.0.40
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_coches`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

DROP TABLE IF EXISTS `coches`;
CREATE TABLE IF NOT EXISTS `coches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marca_id` int DEFAULT NULL,
  `modelo` varchar(50) NOT NULL,
  `año` int NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `disponible` tinyint(1) DEFAULT '1',
  `fecha_baja` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `marca_id` (`marca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `marca_id`, `modelo`, `año`, `precio`, `disponible`, `fecha_baja`) VALUES
(1, 1, 'Corolla', 2020, 20000.00, 1, NULL),
(2, 2, 'Focus', 2019, 18000.00, 1, NULL),
(3, 3, 'Civic', 2021, 22000.00, 1, NULL),
(97, 1, 'kiki', 2014, 2000.00, 7, NULL),
(110, 3, 'huhu', 1912, 12.00, 12, NULL),
(118, NULL, 'dani', 2000, 1444.00, 10, NULL),
(119, NULL, 'dani', 2000, 2000.00, 20, NULL),
(120, NULL, 'asxax', 2000, 121.00, 1, NULL),
(121, 2, 'huhu', 1900, 12.00, 12, NULL),
(122, 10, 'durum', 1995, 1.00, 1, NULL),
(123, 12, 'joer', 2000, 2.00, 123, NULL),
(124, 72, 'corsa', 2021, 10000.00, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `fecha_baja`) VALUES
(1, 'Toyota', NULL),
(2, 'Ford', NULL),
(3, 'Honda', NULL),
(5, 'Ford', NULL),
(6, 'Chevrolet', NULL),
(7, 'Nissan', NULL),
(8, 'Volkswagen', NULL),
(9, 'BMW', NULL),
(10, 'Mercedes-Benz', NULL),
(11, 'Audi', NULL),
(12, 'Hyundai', '2025-02-05 07:34:38'),
(13, 'Kia', NULL),
(14, 'Peugeot', NULL),
(15, 'Renault', NULL),
(16, 'Subaru', NULL),
(17, 'Mazda', NULL),
(18, 'Fiat', NULL),
(19, 'Volvo', NULL),
(20, 'Jaguar', NULL),
(21, 'Land Rover', NULL),
(22, 'Mitsubishi', NULL),
(23, 'Porsche', NULL),
(24, 'Tesla', NULL),
(28, 'Bentley', NULL),
(29, 'Bugatti', NULL),
(30, 'Rolls Royce', NULL),
(31, 'McLaren', NULL),
(34, 'madza', NULL),
(69, 'Ferrari', NULL),
(72, 'Opel', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'admin'),
(2, 'empleado'),
(3, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol_id` int DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `rol_id` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol_id`, `telefono`, `direccion`, `fecha_baja`) VALUES
(2, 'Maria López', 'maria@example.com', '1', 2, '159-9635', 'Calle falsisima 741', NULL),
(34, 'Monica Alvarez', 'monica.alvarez@example.com', 'hashed_password_18', 3, '2222222223', 'Calle de la Luz 555', NULL),
(55, 'daniAdmin', 'admin@gmail.com', '$2y$10$mLv4Q0LJIIWGnk57FIMAXeuHHSotjupYdxh7wn9hbNHF3GQOiwmeu', 1, '0663341922', 'Avenida de espera, calle palos blancos , número 1', NULL),
(56, 'daniEmpleado', 'empleado@gmail.com', '$2y$10$6OCTfL.UffQ.FsyzO5Xx0ej3sXEyubXah7yUtKbaVV6XKPC3Zg40C', 2, '0663341922', 'Avenida de espera, calle palos blancos , número 1', NULL),
(57, 'daniCliente', 'cliente@gmail.com', '$2y$10$l0eAm5Wzeu7i2L3Rj8ZeJuePaAbVEN647BNZLizvOpkG9gPPOlfZ2', 3, '0663341922', 'Avenida de espera, calle palos blancos , número 1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `coche_id` int DEFAULT NULL,
  `usuarios_id` int DEFAULT NULL,
  `fecha` date NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coche_id` (`coche_id`),
  KEY `cliente_id` (`usuarios_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `coche_id`, `usuarios_id`, `fecha`, `precio_venta`, `fecha_baja`) VALUES
(15, 2, 2, '2025-02-20', 1.00, '2025-02-10 07:20:24'),
(29, 124, 34, '2025-02-28', 9.00, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coches`
--
ALTER TABLE `coches`
  ADD CONSTRAINT `coches_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`coche_id`) REFERENCES `coches` (`id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
