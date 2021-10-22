-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-10-2021 a las 12:15:03
-- Versión del servidor: 5.7.35-0ubuntu0.18.04.1
-- Versión de PHP: 7.3.24-3+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `IndependienteSocios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `idcuotas` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `precioCuota` int(11) NOT NULL,
  `fechaCuota` varchar(45) NOT NULL,
  `abonoCuota` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`idcuotas`, `idUsuario`, `precioCuota`, `fechaCuota`, `abonoCuota`) VALUES
(1, 3, 500, 'Enero', 1),
(2, 3, 500, 'Febrero', 1),
(3, 3, 500, 'Marzo', 1),
(4, 3, 550, 'Abril', 1),
(5, 3, 600, 'Mayo', 1),
(6, 3, 650, 'Junio', 0),
(7, 3, 900, 'Julio', 0),
(8, 3, 700, 'Agosto', 0),
(15, 3, 700, 'Septiembre', 0),
(16, 3, 750, 'Octubre', 0),
(17, 3, 800, 'Noviembre', 0),
(22, 3, 700, 'Diciembre', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `usuario`, `clave`, `nombre`, `apellido`) VALUES
(1, 'JuanseMarquez', 'ADMIN1234', 'Juan', 'Marquez'),
(2, 'JulianFerro', '$2y$10$lz9uZijc4uO2l0VOJ00oce00hdxp.POpltQDn0BVzD3E6PDCbXF3C', 'Julian', 'Ferronato'),
(3, 'ProfeJuan', '$2y$10$5Ulo/r8GAiBjjN1wGZsXHe/8D5dlJDtR/Jcbe1oEaVRWizpNEDm1a', 'Juan', 'Marquez'),
(4, 'ProfeJuan', '$2y$10$avTVopLuxG3h0euOawvpAu37AsR6PtmJ.Wa7vpRUYSBWSsPJJM4Vy', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`idcuotas`),
  ADD KEY `fk_cuotas_idx` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `idcuotas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD CONSTRAINT `fk_cuotas` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
