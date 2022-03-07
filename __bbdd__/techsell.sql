-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2022 a las 18:39:04
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `techsell`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pub`
--

CREATE TABLE `pub` (
  `idPub` int(11) NOT NULL,
  `namePub` varchar(50) DEFAULT NULL,
  `imgPub` tinytext DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `descPu` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pub`
--

INSERT INTO `pub` (`idPub`, `namePub`, `imgPub`, `date`, `estado`, `idUser`, `descPu`) VALUES
(1, 'GTX 970', NULL, '2022-03-03 18:31:31', 1, 38, 'glangal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `tel` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `name`, `surname`, `instagram`, `facebook`, `tel`) VALUES
(38, 'Mateo', 'Letteri', 'lt_mate', 'face', 12321300);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pub`
--
ALTER TABLE `pub`
  ADD PRIMARY KEY (`idPub`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pub`
--
ALTER TABLE `pub`
  MODIFY `idPub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pub`
--
ALTER TABLE `pub`
  ADD CONSTRAINT `pub_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
