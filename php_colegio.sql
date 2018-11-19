-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2018 a las 06:24:47
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `nombre`, `estado`) VALUES
(1, 'Actividad 1', 's'),
(2, 'Actividad 2', 's'),
(3, 'Actividad 3', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `grado` varchar(255) NOT NULL,
  `salon` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `doc` varchar(255) NOT NULL,
  `rh` varchar(255) NOT NULL,
  `eps` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `padre` varchar(255) NOT NULL,
  `madre` varchar(255) NOT NULL,
  `p_ocupacion` varchar(255) NOT NULL,
  `m_ocupacion` varchar(255) NOT NULL,
  `acudiente` varchar(255) NOT NULL,
  `emergencia` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `matricula` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `grado`, `salon`, `tipo`, `fecha`, `doc`, `rh`, `eps`, `direccion`, `telefono`, `padre`, `madre`, `p_ocupacion`, `m_ocupacion`, `acudiente`, `emergencia`, `estado`, `matricula`) VALUES
(6, 'MARIO FLORES CASTRO', '1', '1', 'a', '2010-04-04', '123885780', '0+', 'SEGURO SOCIAL FAMILIAR', 'CARACOLES', '6744777', 'VARGAS', 'MARI SOL', 'ING. DE SISTEMAS', 'AMA DE CASA', 'HECTOR ', '6748787', 's', '2013-11-27'),
(7, 'MARLENE GUTIERREZ', '1', '1', 'n', '1987-07-02', '12393999', '', '', 'SANTA MARTA', '6679138', '', '', '', '', '', '', 's', '2013-11-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificar`
--

CREATE TABLE `calificar` (
  `id` int(11) NOT NULL,
  `alumno` varchar(255) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificar`
--

INSERT INTO `calificar` (`id`, `alumno`, `materia`, `periodo`) VALUES
(1, '12393999', '1', '1'),
(2, '12393999', '2', '1'),
(3, '12393999', '3', '1'),
(4, '12393999', '1', '2'),
(5, '12393999', '1', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(255) NOT NULL,
  `empresa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `web` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `moneda` varchar(22) COLLATE utf8_spanish_ci NOT NULL,
  `minima` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `maxima` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `empresa`, `nit`, `direccion`, `pais`, `ciudad`, `tel`, `fax`, `web`, `correo`, `fecha`, `moneda`, `minima`, `maxima`) VALUES
(1, 'Colegio SANTA MARIA', '12222', 'Centro Edificio Oficina 543', 'Colombia', 'Cali', '6686532', '6736478', 'www.micolegiosantanaria.net', 'demodemo@gmail.com', '2017-05-17', '$', '1', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id`, `nombre`, `estado`) VALUES
(1, 'PRIMERO', 's'),
(2, 'SEGUNDO', 's'),
(3, 'TERCERO', 's'),
(4, 'CUARTO', 's'),
(5, 'QUINTO', 's'),
(6, 'SEXTO', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `estado`) VALUES
(1, 'MATEMATICAS', 's'),
(2, 'SISTEMAS', 's'),
(3, 'RELIGION', 's'),
(4, 'GEOMETRIA', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `alumno` varchar(255) NOT NULL,
  `actividad` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `materia`, `alumno`, `actividad`, `valor`, `periodo`, `fecha`) VALUES
(1, '1', '12393999', '1', '7', '1', '2014-01-03'),
(3, '1', '12393999', '3', '7', '1', '2014-01-03'),
(6, '1', '12393999', '1', '6', '2', '2014-01-03'),
(7, '2', '12393999', '1', '5', '1', '2014-01-03'),
(8, '1', '12393999', '2', '4', '1', '2014-01-03'),
(9, '2', '12393999', '2', '8', '2', '2014-05-08'),
(10, '2', '12393999', '2', '7', '1', '2014-05-08'),
(11, '1', '12393999', '2', '7', '2', '2014-05-17'),
(12, '2', '12393999', '3', '8', '1', '2014-05-17'),
(13, '2', '12393999', '1', '9', '2', '2014-05-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`id`, `nombre`, `estado`) VALUES
(1, 'PRIMERO', 's'),
(2, 'SEGUNDO', 's'),
(3, 'TERCERO', 's'),
(4, 'CUARTO', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ape` varchar(255) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `con` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `dir` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `cel` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `nom`, `ape`, `doc`, `con`, `fecha`, `dir`, `tel`, `cel`, `correo`, `especialidad`, `estado`, `tipo`) VALUES
(3, 'MARITZA', 'ALTAMIRANO', '54321', '54321', '2013-12-08', 'CARACOLES', '755858', '8585858', 'MARTIZADEMO@GMAIL.COM', 'MATEMATICAS, GEOMETRIA', 's', 'p'),
(4, 'ANGEL', 'MOLINA CASTRO', '12345', '12345', '1988-04-05', 'Administrador', '6679159', '3156856245', 'CASTRODEMO@HOTMAIL.COM', 'SISTEMAS, COMPUTACION', 's', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `grado` varchar(255) NOT NULL,
  `profesor` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`id`, `nombre`, `grado`, `profesor`, `estado`) VALUES
(1, 'PRIMERO A', '1', '12345', 's'),
(2, 'SEGUNDO A', '2', '12345', 's'),
(3, 'PRIMERO B', '1', '12345', 's'),
(4, 'SEGUNDO B', '2', '54321', 's'),
(5, 'SEGUNDO C', '2', '54321', 's');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calificar`
--
ALTER TABLE `calificar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `calificar`
--
ALTER TABLE `calificar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `salon`
--
ALTER TABLE `salon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
