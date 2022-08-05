-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2022 a las 20:45:23
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
-- Estructura de tabla para la tabla `ranking`
--

CREATE TABLE `ranking` (
  `id-position` int(11) NOT NULL,
  `position-nick` varchar(3) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nick ingresado por el usuario.',
  `position-score` int(11) NOT NULL COMMENT 'Puntaje total en el juego.',
  `position-et` time NOT NULL COMMENT 'Tiempo transcurrido (elapsed time, et) total en el juego.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensors`
--

CREATE TABLE `sensors` (
  `id-record` int(11) NOT NULL COMMENT 'Código de registro único.',
  `sensors-stage` enum('1','2','3') COLLATE utf8_spanish_ci NOT NULL COMMENT 'Número de sensor o etapa del circuito en donde se registro actividad.',
  `sensors-time` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de la creación del registro.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sensors`
--

INSERT INTO `sensors` (`id-record`, `sensors-stage`, `sensors-time`) VALUES
(1, '3', '2022-08-05 14:47:38'),
(2, '3', '2022-08-05 15:11:23'),
(3, '3', '2022-08-05 15:11:32'),
(4, '3', '2022-08-05 15:11:33'),
(5, '1', '2022-08-05 15:13:15'),
(6, '2', '2022-08-05 15:13:16'),
(7, '3', '2022-08-05 15:13:17'),
(8, '2', '2022-08-05 15:13:24'),
(9, '1', '2022-08-05 15:14:03'),
(10, '2', '2022-08-05 15:14:33'),
(11, '1', '2022-08-05 15:17:36'),
(12, '2', '2022-08-05 15:19:30'),
(13, '1', '2022-08-05 15:19:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id-user` int(11) NOT NULL COMMENT 'Código de identificación único para cada usuario.',
  `user-nick` varchar(3) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nick ingresado por el usuario.',
  `user-email` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Dirección de correo electrónico del individuo.',
  `user-age` int(3) NOT NULL COMMENT 'Edad del individuo.',
  `user-created` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Hora de creación del usuario.',
  `user-journey` enum('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_spanish_ci NOT NULL DEFAULT '0' COMMENT 'Punto del trayecto en el circuito de preguntas (0-9).'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id-user`, `user-nick`, `user-email`, `user-age`, `user-created`, `user-journey`) VALUES
(1, '', 'juanignaciobianchini@gmail.com', 19, '2022-07-27 22:25:35', '0'),
(2, '', 'f@gmail.com', 20, '2022-07-27 22:33:52', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ranking`
--
ALTER TABLE `ranking`
  ADD UNIQUE KEY `position-nick` (`position-nick`);

--
-- Indices de la tabla `sensors`
--
ALTER TABLE `sensors`
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
-- AUTO_INCREMENT de la tabla `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id-record` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de registro único.', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id-user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación único para cada usuario.', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
