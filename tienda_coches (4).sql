-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-02-2025 a las 13:00:31
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol_id`, `telefono`, `direccion`, `fecha_baja`) VALUES
(2, 'Maria López', 'maria@example.com', '1', 2, '159-9635', 'Calle falsisima 741', NULL),
(3, 'Carlos García', 'carlos@example.com', '2', 3, '555-1234', 'Calle Falsa 123', NULL),
(16, 'Daniel', 'daniel.mg1705@alumnos.alborfp.com', '1234567890876543ç', 1, '0663341922', 'Avenida de espera, calle palos blancos , número 1', '2025-02-06 07:39:01'),
(17, 'Juan Perez', 'juan.perez@example.com', 'hashed_password_1', 2, '1234567890', 'Calle Falsa 123', NULL),
(18, 'Ana Lopez', 'ana.lopez@example.com', 'hashed_password_2', 3, '0987654321', 'Avenida Siempre Viva 742', NULL),
(19, 'Carlos Sanchez', 'carlos.sanchez@example.com', 'hashed_password_3', 2, '5555555555', 'Paseo de la Reforma 100', NULL),
(20, 'Maria Gonzalez', 'maria.gonzalez@example.com', 'hashed_password_4', 3, '6666666666', 'Plaza Mayor 10', NULL),
(21, 'Luis Martinez', 'luis.martinez@example.com', 'hashed_password_5', 2, '7777777777', 'Calle del Sol 101', NULL),
(22, 'Elena Ramirez', 'elena.ramirez@example.com', 'hashed_password_6', 3, '8888888888', 'Avenida de la Luna 202', NULL),
(23, 'Pedro Fernandez', 'pedro.fernandez@example.com', 'hashed_password_7', 2, '9999999999', 'Calle del Mar 303', NULL),
(24, 'Laura Rodriguez', 'laura.rodriguez@example.com', 'hashed_password_8', 3, '1111111111', 'Plaza de la Paz 404', NULL),
(25, 'Miguel Hernandez', 'miguel.hernandez@example.com', 'hashed_password_9', 2, '2222222222', 'Avenida de la Libertad 505', NULL),
(26, 'Sara Jimenez', 'sara.jimenez@example.com', 'hashed_password_10', 3, '3333333333', 'Calle de la Amistad 606', NULL),
(27, 'Antonio Moreno', 'antonio.moreno@example.com', 'hashed_password_11', 2, '4444444444', 'Avenida de las Flores 707', NULL),
(28, 'Isabel Ruiz', 'isabel.ruiz@example.com', 'hashed_password_12', 3, '5555555556', 'Calle de los Arboles 808', NULL),
(29, 'Jose Torres', 'jose.torres@example.com', 'hashed_password_13', 2, '6666666667', 'Plaza de la Victoria 909', NULL),
(30, 'Carmen Diaz', 'carmen.diaz@example.com', 'hashed_password_14', 3, '7777777778', 'Avenida del Triunfo 111', NULL),
(31, 'Francisco Gomez', 'francisco.gomez@example.com', 'hashed_password_15', 2, '8888888889', 'Calle de los Sueños 222', NULL),
(32, 'Patricia Garcia', 'patricia.garcia@example.com', 'hashed_password_16', 3, '9999999990', 'Plaza de la Esperanza 333', NULL),
(33, 'Javier Martinez', 'javier.martinez@example.com', 'hashed_password_17', 2, '1111111112', 'Avenida del Futuro 444', NULL),
(34, 'Monica Alvarez', 'monica.alvarez@example.com', 'hashed_password_18', 3, '2222222223', 'Calle de la Luz 555', NULL),
(35, 'Rafael Sanchez', 'rafael.sanchez@example.com', 'hashed_password_19', 2, '3333333334', 'Plaza del Encanto 666', NULL),
(36, 'Sofia Ortega', 'sofia.ortega@example.com', 'hashed_password_20', 3, '4444444445', 'Avenida de los Sueños 777', NULL),
(42, 'uigyub', 'uhgy7u@xn--tygvfty-cka', '', NULL, '0663341922', 'Avenida de espera, calle palos blancos , número 1', NULL),
(43, 'fufi', 'fufi@gmail.com', '', NULL, '123456789', 'calle calle caaaaaale', NULL),
(44, 'rau', 'rau@gmail.com', 'k', NULL, '0663341922', 'Avenida de espera, calle palos blancos , número 1', NULL);

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
