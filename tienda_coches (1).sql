-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-03-2025 a las 00:28:59
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `marca_id`, `modelo`, `año`, `precio`, `disponible`, `fecha_baja`) VALUES
(1, 3, 'Corolla', 2020, 20000.00, 1, NULL),
(2, 2, 'Focus', 2019, 18000.00, 1, '2025-02-16'),
(3, 3, 'Civic', 2021, 22000.00, 1, NULL),
(97, 1, 'kiki', 2014, 2000.00, 7, NULL),
(110, 3, 'huhu', 1912, 12.00, 12, NULL),
(118, NULL, 'dani', 2000, 1444.00, 10, NULL),
(119, NULL, 'dani', 2000, 2000.00, 20, NULL),
(120, NULL, 'asxax', 2000, 121.00, 1, NULL),
(121, 2, 'huhu', 1900, 12.00, 12, NULL),
(122, 10, 'durum', 1995, 1.00, 1, NULL),
(123, 12, 'joer', 2000, 2.00, 123, NULL),
(124, 72, 'corsa', 2021, 10000.00, 1, NULL),
(125, 72, 'corsa', 2000, 2000.00, 2, NULL),
(126, 12, 'Tucson', 2019, 20000.00, 2, NULL),
(127, 23, '911', 2020, 12200.00, 10, NULL),
(128, 3, 'rrrrr', 2012, 200.00, 20, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `pk_id_evento` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `descripcion_es` text,
  `descripcion_eng` text,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_id_evento`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`pk_id_evento`, `titulo`, `fecha_inicio`, `fecha_fin`, `descripcion_es`, `descripcion_eng`, `fecha_eliminacion`) VALUES
(17, 'Oferss', '2025-02-10 14:27:00', '2025-02-12 14:27:00', 'Ofertas del catalogo', 'catalog offers', NULL),
(16, 'Conference', '2025-02-06 14:26:00', '2025-02-09 14:27:00', 'Conferencia del ceo', 'ceo conference', NULL),
(15, 'car exhibition', '2025-02-28 14:25:00', '2025-03-02 14:25:00', '\nEnseñar los mejores coches del mercado\n', 'Show the best cars on the market', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `fecha_baja`) VALUES
(1, 'Toyotaaa', '2025-03-02 23:17:44'),
(2, 'Ford', NULL),
(3, 'Honda', NULL),
(5, 'Ford', NULL),
(6, 'Chevrolet', NULL),
(7, 'Nissan', NULL),
(8, 'Volkswagen', NULL),
(9, 'BMW', NULL),
(10, 'Mercedes-Benz', NULL),
(11, 'Audi', NULL),
(12, 'Hyundai', NULL),
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
(72, 'Opel', NULL),
(73, 'globo', NULL),
(74, 'frfw', NULL),
(75, 'jose', NULL),
(76, 'saxaxqqqqqq', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol_id`, `telefono`, `direccion`, `fecha_baja`) VALUES
(2, 'Maria López', 'maria@example.com', '1', 2, '159-9635', 'Calle falsisima 741', '2025-03-02 21:16:17'),
(34, 'Monica Alvarez', 'monica.alvarez@example.com', 'hashed_password_18', 3, '2222222223', 'Calle de la Luz 555', NULL),
(35, 'Rafael Sanchez', 'rafael.sanchez@example.com', 'hashed_password_19', 2, '3333333334', 'Plaza del Encanto 666', NULL),
(36, 'Sofia Ortega', 'sofia.ortega@example.com', 'hashed_password_20', 3, '4444444445', 'Avenida de los Sueños 777', NULL),
(42, 'uigyub', 'uhgy7u@xn--tygvfty-cka', '', NULL, '0663341922', 'Avenida de espera, calle palos blancos , número 1', NULL),
(44, 'rau', 'rau@gmail.com', 'k', NULL, '0663341922', 'Avenida de espera, calle palos blancos , número 1', NULL),
(45, 'juan', 'juan@gmail.com', '', 3, '123456789', 'calle de las falsas', NULL),
(46, 'iñigo', 'j@gmail.com', '', 3, '12121212121', 'donde nose', NULL),
(47, 'kike', 'kike@gmail.com', '$2y$10$ccZhuD77eQDW2rY/fHH1EOl4.j40MHFqd/JtPoYP85IGa7/5Gy4lq', 3, '12121212122122', 'kike nose donde vives', NULL),
(48, 'lucas', 'lucas@gmail.com', '$2y$10$wFEH2LF3Ez4zPzzrlcZfoOJXDYoS50mnraLTqAaUcsSXZXEX6ZBpO', 3, '12345654', 'lucas house', NULL),
(49, 'nano', 'nano@gmail.com', '$2y$10$dLxHr6/ohKUID3QQELPoX.BaOzoW3UryUerRu/qh6wFhiXHqbaojO', 3, '123333333', 'nanohouse', NULL),
(50, 'guille', 'guille@gmail.com', '$2y$10$b1laQ5we98xTWJd3rHxNIOK9z30iy/CZckFEkiFvlGGeiYCdoDgLK', 3, '111111111111111', 'guiillllllle', NULL),
(51, 'manu', 'manu@gmail.com', '$2y$10$LlRyqR6FN/9zMg/Y5MN9wOaj/lNA5Zstu.2Jlwi/MBxgkhnFkLU3G', 3, '121212121212', 'manu', NULL),
(52, 'victor', 'victor@gmail.com', '$2y$10$PPgZ8rr3XEOi/IKCXI0hPegYLacSXG7tO71oNV/NhQ9Rh.lMP7bba', 3, '1232123', 'iwujgfh', NULL),
(53, 'adama', 'adama@gmail.com', '$2y$10$YVmplFLyA3IkThdOU9TKluWQxUWsYiy0DoJvraPEKIl.1sSb0vwj2', 3, '111111111', 'qewwecwe', NULL),
(54, 'ferny', 'fer@gmail.com', '$2y$10$SIbgjyoVRzPwrLVepNL5s.7AYIzdd9hQcEq5B6p1IilK45T8qDb0K', 3, '12121212134131', 'frerfgerfer', NULL),
(55, 'luis', 'luis@gmail.com', '$2y$10$RZdRQ7XEP/69DWCJkxAPWuLE2502PoIeKQ5bUDrS/E0dgN0CwoGs6', 3, '213112', 'fewedwedc', NULL),
(56, 'javier', 'javi@gmail.com', '$2y$10$yg3.EgmIfmwzpQC4YnfStu/pbCaN4uxaUKkI2HBVIL5UWx6rspeWW', 3, '1111111111111', 'calle falsa', NULL),
(57, 'tomas', 'tomas@gmail.com', '$2y$10$cqqV3aGMFooQmDYXry4o3OF87KtVKF7w9PdcjM9KUP/nxNh6ehRUi', 3, '122222222', 'calle falsa', NULL),
(58, 'shudfgvuy', 'vfgseycyws@gmail.com', '$2y$10$.JAR68eKE6wNJBuCagAsnuaAXV0gjdlIna713bPP6wcZVh52Ve3j2', 3, '3276542367', 'sdyhucgwyus', NULL),
(62, 'daniadmin', 'admin@gmail.com', '$2y$10$HUP7Ljt5O0sM5qtlXEPZz.0LEo3luVvR7hNARwfkHEwIIwuDdM3wC', 3, '213123', 'sadwqrfev', NULL),
(63, 'Gonzalo', 'gonzaloGallegos@gmail.com', '', 3, '1231312321', 'asdasdasdsaiujhyg8ugyu', NULL),
(64, 'ferni', 'davidSoto@gmail.com', '', 1, '0663341922', 'Avenida de espera, calle palos blancos , número 1', NULL),
(65, 'cd', 'ds@2djich', '$2y$10$Vjtgzy5yY/lC3Vjtwy5lOO3g/MUM.FN9iIW8c0lUyktH2TivAje0e', 3, '0663341922', 'Avenida de espera, calle palos blancos , número 1', NULL),
(66, 'cddscs', 'dani@gmail.com', '$2y$10$w9/OoI8YSgDSZ4uVPx5ngubQdUflZ0sS38lKZ0gwJkFDuyee3RCN.', 3, '32424223', 'Avenida de espera, calle palos blancos , número 1', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `coche_id`, `usuarios_id`, `fecha`, `precio_venta`, `fecha_baja`) VALUES
(15, 2, 2, '2025-02-20', 1.00, '2025-02-10 07:20:24'),
(29, 124, 34, '2025-02-28', 9.00, NULL),
(30, 126, 50, '2025-04-06', 1.00, '2025-03-02 22:43:56');

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
