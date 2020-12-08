-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2020 a las 12:54:58
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `polideportivo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facility`
--

CREATE TABLE `facility` (
  `idFacility` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `price` float NOT NULL,
  `state` enum('abierto','cerrado') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'abierto',
  `maxDuration` int(11) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facility`
--

INSERT INTO `facility` (`idFacility`, `name`, `description`, `image`, `price`, `state`, `maxDuration`) VALUES
(1, 'Piscina', 'El mejor lugar en el que estar en verano', '1', 10, 'abierto', 4),
(2, 'Gimnasio', 'Con multitud de equipos para ponerte en forma', '2', 12, 'abierto', 4),
(3, 'Futbol', 'Un campo de futbol interior bien iluminado', '3', 9, 'abierto', 4),
(5, 'Padel', '	Varias pistas de padel reglamentarias, tanto individuales como dobles', '5', 8, 'abierto', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `price` float NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `duration` int(11) NOT NULL DEFAULT 1,
  `idUser` int(11) NOT NULL,
  `idFacility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`idReservation`, `price`, `time`, `date`, `duration`, `idUser`, `idFacility`) VALUES
(4, 20, '09:00:00', '2020-11-01', 1, 6, 2),
(5, 15, '16:00:00', '2020-12-08', 1, 3, 2),
(6, 16, '15:00:00', '2020-12-09', 1, 1, 1),
(7, 12, '18:00:00', '2020-12-10', 1, 1, 1),
(8, 12, '15:00:00', '2020-12-01', 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule`
--

CREATE TABLE `schedule` (
  `idSchedule` int(11) NOT NULL,
  `weekDay` set('lunes','martes','miercoles','jueves','viernes','sabado','domingo') COLLATE utf8_spanish_ci NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `idFacility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `lastname1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `lastname2` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dni` char(9) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `type` enum('admin','user') COLLATE utf8_spanish_ci NOT NULL,
  `image` int(11) NOT NULL,
  `state` enum('alta','borrado') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'alta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `name`, `lastname1`, `lastname2`, `email`, `dni`, `password`, `type`, `image`, `state`) VALUES
(1, 'Julian', 'Fernandez', 'Ferran', 'julianFF@gmail.com', '12121212W', 'contraseña', 'user', 1, 'alta'),
(3, 'Eduardo', 'Rueda', 'Cruz', 'eduardoRC@gmail.com', '21436587R', 'contraseña', 'admin', 3, 'alta'),
(4, 'Marta', 'Jimenez', 'Rodrigez', 'MartaJR@gmail.com', '45342312F', 'contraseña', 'admin', 4, 'alta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`idFacility`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`);

--
-- Indices de la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`idSchedule`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facility`
--
ALTER TABLE `facility`
  MODIFY `idFacility` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `schedule`
--
ALTER TABLE `schedule`
  MODIFY `idSchedule` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
