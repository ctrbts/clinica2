-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 21:17:14
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bonocurso`
--

CREATE TABLE `bonocurso` (
  `idBono` int(10) NOT NULL,
  `dni` int(9) NOT NULL,
  `idCurso` int(10) NOT NULL,
  `valor` int(10) NOT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `hora` time NOT NULL,
  `cancelado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(10) NOT NULL,
  `curso` varchar(300) NOT NULL,
  `valor` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `curso`, `valor`) VALUES
(1, 'BONO CURSOS DE POSGRADO, INICIAN TRATAMIENTO', 8000),
(2, 'BONO CONTRIBUCION MENSUAL CURSO ESPECIALIZACION EN ORTODONCIA', 4000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientecurso`
--

CREATE TABLE `pacientecurso` (
  `idPaciente` int(10) NOT NULL,
  `dni` int(9) NOT NULL,
  `nyap` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bonocurso`
--
ALTER TABLE `bonocurso`
  ADD PRIMARY KEY (`idBono`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `pacientecurso`
--
ALTER TABLE `pacientecurso`
  ADD PRIMARY KEY (`idPaciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bonocurso`
--
ALTER TABLE `bonocurso`
  MODIFY `idBono` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pacientecurso`
--
ALTER TABLE `pacientecurso`
  MODIFY `idPaciente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
