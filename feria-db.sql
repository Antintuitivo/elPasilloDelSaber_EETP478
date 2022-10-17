-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2022 a las 00:14:04
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `feria-db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `journey`
--

CREATE TABLE `journey` (
  `id-user` int(11) NOT NULL COMMENT 'Código de identificación único para cada usuario.',
  `journey-started` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Hora de iniciado el recorrido.',
  `journey-step` int(1) NOT NULL DEFAULT 0 COMMENT 'Punto del trayecto en el circuito de preguntas (0-9).',
  `journey-stage` enum('0','1','2','3') COLLATE utf8_spanish_ci NOT NULL DEFAULT '0' COMMENT 'Número de etapa del circuito en donde se encuentra el usuario.',
  `journey-ended` datetime DEFAULT NULL COMMENT 'Hora de finalizado el recorrido.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `journey`
--

INSERT INTO `journey` (`id-user`, `journey-started`, `journey-step`, `journey-stage`, `journey-ended`) VALUES
(1, '2022-09-16 15:45:55', 9, '3', '2022-09-16 15:51:34'),
(2, '2022-09-16 18:27:25', 9, '3', '2022-09-16 18:28:52'),
(3, '2022-10-03 18:51:44', 9, '3', '2022-10-03 18:58:57'),
(4, '2022-10-03 18:59:43', 9, '3', '2022-10-03 19:01:45'),
(5, '2022-10-03 19:02:30', 9, '3', '2022-10-03 19:04:03'),
(6, '2022-10-03 19:07:08', 9, '3', '2022-10-03 19:09:43'),
(7, '2022-10-05 20:15:24', 9, '3', '2022-10-05 20:19:29'),
(8, '2022-10-05 20:31:27', 9, '3', '2022-10-05 20:34:52'),
(9, '2022-10-05 20:45:00', 9, '3', '2022-10-05 20:49:42'),
(11, '2022-10-14 15:17:24', 9, '3', '2022-10-14 15:20:09'),
(12, '2022-10-14 15:22:15', 9, '3', '2022-10-14 15:28:52'),
(14, '2022-10-17 19:03:18', 9, '3', '2022-10-17 19:07:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rankingmayores`
--

CREATE TABLE `rankingmayores` (
  `id-user` int(11) NOT NULL COMMENT 'Código de identificación único para cada usuario.',
  `ranking-nick` varchar(6) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nick ingresado por el usuario.',
  `ranking-score` int(11) NOT NULL COMMENT 'Puntaje total en el juego.',
  `ranking-et` time NOT NULL COMMENT 'Tiempo transcurrido (elapsed time, et) total en el juego.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rankingmayores`
--

INSERT INTO `rankingmayores` (`id-user`, `ranking-nick`, `ranking-score`, `ranking-et`) VALUES
(9, '.-.', 810, '00:04:42'),
(7, 'alv', 810, '00:04:05'),
(13, 'alv420', 0, '00:00:00'),
(14, 'mat333', 1080, '00:04:30'),
(10, 'nms', 0, '00:00:00'),
(3, 'pto', 273, '00:07:13'),
(11, 'tr', 450, '00:02:45'),
(12, 'xyz', 810, '00:06:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rankingmenores`
--

CREATE TABLE `rankingmenores` (
  `id-user` int(11) NOT NULL COMMENT 'Código de identificación único para cada usuario.',
  `ranking-nick` varchar(6) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nick ingresado por el usuario.',
  `ranking-score` int(11) NOT NULL COMMENT 'Puntaje total en el juego.',
  `ranking-et` time NOT NULL COMMENT 'Tiempo transcurrido (elapsed time, et) total en el juego.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rankingmenores`
--

INSERT INTO `rankingmenores` (`id-user`, `ranking-nick`, `ranking-score`, `ranking-et`) VALUES
(1, 'alv', 570, '00:05:39'),
(4, 'pto', 741, '00:02:02'),
(5, 'aaa', 819, '00:01:33'),
(8, 'qsy', 810, '00:03:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `signals`
--

CREATE TABLE `signals` (
  `id-record` int(11) NOT NULL COMMENT 'Código de registro único.',
  `signal-stage` enum('1','2','3') COLLATE utf8_spanish_ci NOT NULL COMMENT 'Número de sensor o etapa del circuito en donde se registro actividad.',
  `signal-time` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de la creación del registro.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `signals`
--

INSERT INTO `signals` (`id-record`, `signal-stage`, `signal-time`) VALUES
(1, '3', '2022-09-16 15:46:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id-user` int(11) NOT NULL COMMENT 'Código de identificación único para cada usuario.',
  `user-email` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Dirección de correo electrónico del usuario.',
  `user-age` int(3) NOT NULL COMMENT 'Edad del usuario.',
  `nick` varchar(6) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id-user`, `user-email`, `user-age`, `nick`) VALUES
(1, 'ala@maula', 11, ''),
(2, 'a@k', 10, ''),
(3, 'algo@gg', 20, ''),
(4, 'alv@gg', 1, ''),
(5, 'AAAAAAAAAAAA@AAAAAAAAAAA', 11, ''),
(6, '.-.@owo', 24, ''),
(7, 'nmms@qgueva', 0, ''),
(8, 'q@paja', 0, ''),
(9, 'omg@wtf', 0, ''),
(10, 'whitelives@matter', 20, ''),
(11, 'cla@se', 99, ''),
(12, 'uno@dos', 15, ''),
(13, 'uno@mames', 77, 'alv420'),
(14, 'ea@ea', 20, 'mat333');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `journey`
--
ALTER TABLE `journey`
  ADD UNIQUE KEY `id-user` (`id-user`);

--
-- Indices de la tabla `rankingmayores`
--
ALTER TABLE `rankingmayores`
  ADD UNIQUE KEY `position-nick` (`ranking-nick`),
  ADD UNIQUE KEY `id-user` (`id-user`);

--
-- Indices de la tabla `rankingmenores`
--
ALTER TABLE `rankingmenores`
  ADD UNIQUE KEY `id-user` (`id-user`),
  ADD UNIQUE KEY `position-nick` (`ranking-nick`);

--
-- Indices de la tabla `signals`
--
ALTER TABLE `signals`
  ADD UNIQUE KEY `id-record` (`id-record`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id-user`),
  ADD UNIQUE KEY `user-email` (`user-email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `signals`
--
ALTER TABLE `signals`
  MODIFY `id-record` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de registro único.', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id-user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación único para cada usuario.', AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `journey`
--
ALTER TABLE `journey`
  ADD CONSTRAINT `journey_ibfk_1` FOREIGN KEY (`id-user`) REFERENCES `users` (`id-user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rankingmayores`
--
ALTER TABLE `rankingmayores`
  ADD CONSTRAINT `rankingmayores_ibfk_1` FOREIGN KEY (`id-user`) REFERENCES `users` (`id-user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rankingmenores`
--
ALTER TABLE `rankingmenores`
  ADD CONSTRAINT `rankingmenores_ibfk_1` FOREIGN KEY (`id-user`) REFERENCES `users` (`id-user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
