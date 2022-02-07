-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-03-2021 a las 20:59:35
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app_chat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `created_on` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `username`, `message`, `created_on`) VALUES
(1, 'Alfonso', 'hola', '05:32:59'),
(2, 'Angel1', 'va', '05:35:16'),
(3, 'Hector', 'Holaaa', '05:39:02'),
(4, 'Angel1', 'asdf', '05:39:09'),
(5, 'Angel1', 'asdf', '05:39:17'),
(6, 'Angel1', '', '05:39:24'),
(7, 'Hector', 'fdfdf', '05:39:38'),
(8, 'Hector', 'fdfdf', '05:39:40'),
(9, 'Hector', 'fdfdf', '05:39:43'),
(10, 'Hector', 'fdfdf', '05:39:45'),
(11, 'Hector', 'fdfdf', '05:39:48'),
(12, 'Hector', 'fdfdf', '05:39:50'),
(13, 'Hector', 'fdfdf', '05:39:53'),
(14, 'Hector', 'czfsd', '05:39:58'),
(15, 'Hector', 'Holaaa', '05:40:07'),
(16, 'Javier Garcia', 'hola', '06:52:41'),
(17, 'Javier Garcia', 'hay alguien?', '06:53:02'),
(18, 'Javier Garcia', '<?php echo $_GET[\"usuario\"] ?>', '06:54:59'),
(19, 'Hector2', 'hola', '06:55:10'),
(20, 'Javier Garcia', '', '06:55:23'),
(21, 'Hector2', '', '07:01:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `conectado` varchar(2) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_on`, `conectado`) VALUES
(1, 'alfonso', '1', '2021-03-29 15:32:49', 'si'),
(2, 'angel1', '123', '2021-03-29 15:39:24', 'no'),
(3, 'Hector', '11', '2021-03-29 15:38:54', 'si'),
(4, 'Javier Garcia', '123', '2021-03-29 16:55:23', 'no'),
(5, 'Hector2', '1234', '2021-03-29 17:01:09', 'no');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
