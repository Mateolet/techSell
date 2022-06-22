-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2022 a las 23:52:31
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
-- Estructura de tabla para la tabla `imgpub`
--

CREATE TABLE `imgpub` (
  `idimg` int(11) NOT NULL,
  `img1` varchar(200) DEFAULT NULL,
  `img2` varchar(200) DEFAULT NULL,
  `img3` varchar(200) DEFAULT NULL,
  `img4` varchar(200) DEFAULT NULL,
  `img5` varchar(200) DEFAULT NULL,
  `idPub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imgpub`
--

INSERT INTO `imgpub` (`idimg`, `img1`, `img2`, `img3`, `img4`, `img5`, `idPub`) VALUES
(4, '1', '2', '3', '4', '5', 35),
(5, '1', '2', '3', '4', '5', 35),
(6, '2', '3', '45', '5', '5', 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pub`
--

CREATE TABLE `pub` (
  `idPub` int(11) NOT NULL,
  `namePub` varchar(50) DEFAULT NULL,
  `fechaPub` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `descPu` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pub`
--

INSERT INTO `pub` (`idPub`, `namePub`, `fechaPub`, `estado`, `idUser`, `descPu`) VALUES
(24, 'asdsdsad', '2022-05-11', 0, 25, 'Maxi\n1130891066\n\nNotebook Asus Rog Republic of Gamers 17”, intel core i7, 12 Gb Ram, 1000GB hdd y 500GB SSD\n\nDetalles\nEstado\nUsado - Como nuevo\nLínea de productos\nAsus ROG Strix\nTipo de computadora portátil\nVideojuegos\nSistema operativo\nWindows 10\nLa notebook tiene muy poco uso, ya que se utilizo como computadora auxiliar. Se encuentra impecable y todo funcionando a la perfección. De echo siempre se utilizó con teclado y mouse externos, y enchufada a la corriente, para preservar la vida util de la maquina.\n\nEspecificaciones técnicas:\nAsus Republic of Gamer G752VL-BHI7N32\n-Pantalla 17.3” IPS FHD Supported G-Sync\n-Procesador Intel Core i7-6700HQ 2.6 GHz (Turbo up to 3.5 GHz)\n-Ram 12 GB DDR4 2133 MHZ \n-Tarjeta Grafica NVIDIA GeForce GTX 965M 2gb\n-Almacenamiento 1000GB hdd y 500GB SSD 3600MB/s \n-Batería 6000 mAh, tipo Li-ion\n-Sistema Operativo Windows 10 Pro 64bit\n-Dimensiones 416.56 mm × 322.58 mm × 3.81 mm\n-Accesibilidad 1 x Thunderbolt III (a través de USB Type-C), 1 x Gen 2 puertos de '),
(28, 'GT 730', '2022-05-13', 0, 6, 'dsadasd'),
(29, 'GT 730', '2022-05-13', 0, 6, 'dsadasd'),
(33, 'GT 730', '2022-05-13', 0, 6, 'dsadasd'),
(35, 'GT 730', '2022-05-13', 0, 6, 'dsadasd'),
(36, 'GT 730', '2022-05-13', 0, 6, 'dsadasd'),
(38, 'jkjk', '2022-05-16', 1, 20, 'kjjk'),
(39, 'sadsadsad', '0000-00-00', 0, 17, 'l'),
(40, 'sad', '2022-05-02', 0, 20, 'asd');

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
(6, 'asd', 'asd', 'asd', 'asd', 0),
(17, 'asd', 'dasd', 'dasd', 'dadssa', 0),
(19, 'asd', 'dasd', 'dasd', 'dadssa', 0),
(20, 'asd', 'dasd', 'dasd', 'dadssa', 0),
(25, 'asd', 'dasd', 'dasd', 'dadssa', 0),
(26, 'xzc', 'xzc', 'zxc', 'zxc', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imgpub`
--
ALTER TABLE `imgpub`
  ADD PRIMARY KEY (`idimg`),
  ADD KEY `idPub` (`idPub`);

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
-- AUTO_INCREMENT de la tabla `imgpub`
--
ALTER TABLE `imgpub`
  MODIFY `idimg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pub`
--
ALTER TABLE `pub`
  MODIFY `idPub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imgpub`
--
ALTER TABLE `imgpub`
  ADD CONSTRAINT `idPub` FOREIGN KEY (`idPub`) REFERENCES `pub` (`idPub`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pub`
--
ALTER TABLE `pub`
  ADD CONSTRAINT `pub_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
