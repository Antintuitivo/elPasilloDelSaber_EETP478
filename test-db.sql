-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2022 a las 04:46:38
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test-db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id-user` int(11) NOT NULL COMMENT 'Código de identificación único para cada usuario.',
  `user-email` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Dirección de correo electrónico del individuo.',
  `user-fname` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre/s del usuario.',
  `user-lname` varchar(24) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido del usuario.',
  `user-password` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Contraseña del usuario.',
  `user-admin` tinyint(1) NOT NULL COMMENT '¿Permisos de administrador?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id-user`, `user-email`, `user-fname`, `user-lname`, `user-password`, `user-admin`) VALUES
(128, 'juanignaciobianchini@gmail.com', 'Juan Ignacio', 'Bianchini', 'admin', 1),
(129, 'tomasroldan@gmail.com', 'Tomás', 'Roldán', 'user', 1),
(137, 'lionelbedetti@gmail.com', 'Lionel', 'Bedetti', 'user', 0),
(141, 'matiasheinzen@gmail.com', 'Matías', 'Heinzen', 'heinzenmen', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user-record`
--

CREATE TABLE `user-record` (
  `id-record` int(11) NOT NULL COMMENT 'Código de registro único.',
  `id-user` int(11) DEFAULT NULL COMMENT 'Código de identificación único para cada usuario.',
  `record-date` date NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de la creación del registro.',
  `record-login` time NOT NULL DEFAULT current_timestamp() COMMENT 'Hora de creación del registro.',
  `record-logout` time DEFAULT NULL COMMENT 'Hora de cierre de edición del registro.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user-record`
--

INSERT INTO `user-record` (`id-record`, `id-user`, `record-date`, `record-login`, `record-logout`) VALUES
(1, 128, '2022-06-10', '18:08:30', '18:08:36'),
(2, 128, '2022-06-10', '18:08:41', '18:08:57'),
(3, 128, '2022-06-10', '18:09:00', '18:09:04'),
(4, 129, '2022-06-10', '18:09:16', '18:09:26'),
(5, 128, '2022-06-10', '18:09:26', '19:10:00'),
(6, 128, '2022-06-19', '22:33:18', '11:47:25'),
(7, 128, '2022-06-21', '11:47:59', '12:02:37'),
(8, 128, '2022-06-21', '12:03:00', '17:43:29'),
(9, 128, '2022-06-21', '17:43:48', '17:47:09'),
(10, 128, '2022-06-21', '17:47:15', '20:57:13'),
(11, 128, '2022-06-21', '20:57:20', '21:34:08'),
(12, 128, '2022-06-22', '01:49:50', '18:33:10'),
(13, 128, '2022-06-22', '18:33:16', '19:33:55'),
(14, 128, '2022-06-22', '19:33:05', '20:05:19'),
(16, 128, '2022-06-22', '20:06:01', '19:19:38'),
(17, 128, '2022-06-22', '20:40:31', '21:46:02'),
(18, 128, '2022-06-23', '10:43:03', '11:46:11'),
(19, 141, '2022-06-23', '19:19:38', '19:20:57'),
(20, 128, '2022-06-23', '19:20:57', '20:51:49'),
(21, 141, '2022-06-23', '20:51:49', '23:18:48'),
(22, 128, '2022-06-23', '23:18:48', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id-user`) USING BTREE,
  ADD UNIQUE KEY `user-email` (`user-email`);

--
-- Indices de la tabla `user-record`
--
ALTER TABLE `user-record`
  ADD UNIQUE KEY `id-record` (`id-record`) USING BTREE,
  ADD KEY `id-user` (`id-user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id-user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación único para cada usuario.', AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de la tabla `user-record`
--
ALTER TABLE `user-record`
  MODIFY `id-record` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de registro único.', AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user-record`
--
ALTER TABLE `user-record`
  ADD CONSTRAINT `id-user_user-record` FOREIGN KEY (`id-user`) REFERENCES `login` (`id-user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
