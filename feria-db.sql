-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2022 a las 19:07:01
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rankingmayores`
--

CREATE TABLE `rankingmayores` (
  `id-user` int(11) NOT NULL COMMENT 'Código de identificación único para cada usuario.',
  `ranking-nick` varchar(3) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nick ingresado por el usuario.',
  `ranking-score` int(11) NOT NULL COMMENT 'Puntaje total en el juego.',
  `ranking-et` time NOT NULL COMMENT 'Tiempo transcurrido (elapsed time, et) total en el juego.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rankingmenores`
--

CREATE TABLE `rankingmenores` (
  `id-user` int(11) NOT NULL COMMENT 'Código de identificación único para cada usuario.',
  `ranking-nick` varchar(3) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nick ingresado por el usuario.',
  `ranking-score` int(11) NOT NULL COMMENT 'Puntaje total en el juego.',
  `ranking-et` time NOT NULL COMMENT 'Tiempo transcurrido (elapsed time, et) total en el juego.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `signals`
--

CREATE TABLE `signals` (
  `id-record` int(11) NOT NULL COMMENT 'Código de registro único.',
  `signal-stage` enum('1','2','3') COLLATE utf8_spanish_ci NOT NULL COMMENT 'Número de sensor o etapa del circuito en donde se registro actividad.',
  `signal-time` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de la creación del registro.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id-user` int(11) NOT NULL COMMENT 'Código de identificación único para cada usuario.',
  `user-email` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Dirección de correo electrónico del usuario.',
  `user-age` int(3) NOT NULL COMMENT 'Edad del usuario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  MODIFY `id-record` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de registro único.';

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id-user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación único para cada usuario.';

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
