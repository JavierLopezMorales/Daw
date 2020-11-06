-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2020 a las 01:57:26
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
-- Base de datos: `practica_incidencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `equipo_afectado` varchar(50) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `estado` enum('abierta','en_espera','cerrada') NOT NULL DEFAULT 'en_espera',
  `observacion` varchar(100) DEFAULT NULL,
  `prioridad` enum('alta','media','baja','cerrada') NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `descripcion`, `equipo_afectado`, `fecha`, `estado`, `observacion`, `prioridad`, `id_usuario`) VALUES
(1, 'La impresora ha dejado de funcionar.', 'impresora', '2020-06-18', 'en_espera', 'Ha dejado de imprimir', 'media', 3),
(2, 'El ordenador no se enciende', 'ordenador', '2020-09-09', 'cerrada', 'Mientras estaba trabajando se apago y ya no se enciende', 'cerrada', 1),
(3, 'El wifi ha dejado de funcionar', 'router', '2020-10-14', 'en_espera', 'El router no se enciende', 'alta', 2),
(4, 'La tecla g del teclado no funciona', 'teclado', '2020-11-02', 'abierta', 'Es la unica tecla que no funciona', 'baja', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contraseña` varchar(15) NOT NULL,
  `tipo` enum('usuario','administrador') NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `contraseña`, `tipo`, `email`) VALUES
(1, 'usuario1', 'contraseña1', 'usuario', 'usuario1@gmail.com'),
(2, 'usuario2', 'contraseña2', 'usuario', 'usuario2@gmail.com'),
(3, 'usuario3', 'contraseña3', 'usuario', 'usuario3@gmail.com'),
(4, 'usuario4', 'contraseña4', 'usuario', 'usuario4@gmail.com'),
(5, 'administrador1', 'contraseñaAd1', 'administrador', 'administrador1@gmail.com'),
(6, 'administrador2', 'contraseñaAd2', 'administrador', 'administrador2@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
