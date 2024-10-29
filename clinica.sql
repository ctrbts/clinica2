-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2015 a las 20:15:27
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estaenplanmateria`
--

CREATE TABLE IF NOT EXISTS `estaenplanmateria` (
  `idPlan` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `dni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiaclinica`
--

CREATE TABLE IF NOT EXISTS `historiaclinica` (
`idHistoriaClinica` int(10) NOT NULL,
  `idplan` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dni` int(8) NOT NULL,
  `historia` varchar(5000) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja`
--

CREATE TABLE IF NOT EXISTS `hoja` (
`idHoja` int(8) NOT NULL,
  `hoja` int(8) NOT NULL,
  `dni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE IF NOT EXISTS `localidad` (
`idLocalidad` int(11) NOT NULL,
  `localidad` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`idLocalidad`, `localidad`) VALUES
(1, '25 de Mayo'),
(2, '9 de Julio'),
(3, 'Adolfo Alsina'),
(4, 'Adolfo Gonzales Chaves'),
(5, 'Alberti'),
(6, 'Almirante Brown'),
(7, 'Arrecifes'),
(8, 'Avellaneda'),
(9, 'Ayacucho'),
(10, 'Azul'),
(11, 'Bahia Blanca'),
(12, 'Balcarce'),
(13, 'Baradero'),
(14, 'Benito Juarez'),
(15, 'Berazategui'),
(16, 'Berisso'),
(17, 'Bolivar'),
(18, 'Bragado'),
(19, 'Brandsen'),
(20, 'Cañuelas'),
(21, 'Campana'),
(22, 'Capitan Sarmiento'),
(23, 'Carlos Casares'),
(24, 'Carlos Tejedor'),
(25, 'Carmen de Areco'),
(26, 'Castelli'),
(27, 'Chacabuco'),
(28, 'Chascomus'),
(29, 'Chivilcoy'),
(30, 'Ciudad de buenos aires(CABA)'),
(31, 'Colon'),
(32, 'Coronel de Marina L. Rosales'),
(33, 'Castelli'),
(34, 'Chacabuco'),
(35, 'Chascomus'),
(36, 'Chivilcoy'),
(37, 'Ciudad de buenos aires CABA'),
(38, 'Colon'),
(39, 'Coronel de Marina L. Rosales'),
(40, 'Coronel Dorrego'),
(41, 'Coronel Pringles'),
(42, 'Coronel Suarez'),
(43, 'Daireaux'),
(44, 'Dolores'),
(45, 'Ensenada'),
(46, 'Escobar'),
(47, 'Esteban Echeverria'),
(48, 'Exaltacion de la Cruz'),
(49, 'Ezeiza'),
(50, 'Florencio Varela'),
(51, 'Florentino Ameghino'),
(52, 'General Alvarado'),
(53, 'General Alvear'),
(54, 'General Arenales'),
(55, 'General Belgrano'),
(56, 'General Guido'),
(57, 'General Juan Madariaga'),
(58, 'General La Madrid'),
(59, 'General Las Heras'),
(60, 'General Lavalle'),
(61, 'General Paz'),
(62, 'General Pinto'),
(63, 'General Pueyrredon'),
(64, 'General Rodriguez'),
(65, 'General San Martin'),
(66, 'General Viamonte'),
(67, 'General Villegas'),
(68, 'Guamini'),
(69, 'Hipolito Yrigoyen'),
(70, 'Hurlingham'),
(71, 'Ituzaingo'),
(72, 'Jose C. Paz'),
(73, 'Junin'),
(74, 'La Costa'),
(75, 'La Matanza'),
(76, 'La Plata'),
(77, 'Lanus'),
(78, 'Laprida'),
(79, 'Las Flores'),
(80, 'Leandro N. Alem'),
(81, 'Lincoln'),
(82, 'Loberia'),
(83, 'Lobos'),
(84, 'Lomas de Zamora'),
(85, 'Lujan'),
(86, 'Magdalena'),
(87, 'Maipu'),
(88, 'Malvinas Argentinas'),
(89, 'Mar Chiquita'),
(90, 'Marcos Paz'),
(91, 'Mercedes'),
(92, 'Merlo'),
(93, 'Monte'),
(94, 'Monte Hermoso'),
(95, 'Moron'),
(96, 'Moreno'),
(97, 'Navarro'),
(98, 'Necochea'),
(99, 'Olavarria'),
(100, 'Patagones'),
(101, 'Pehuajo'),
(102, 'Pellegrini'),
(103, 'Pergamino'),
(104, 'Pila'),
(105, 'Pilar'),
(106, 'Pinamar'),
(107, 'Presidente Peron'),
(108, 'Puan'),
(109, 'Punta Indio'),
(110, 'Quilmes'),
(111, 'Ramallo'),
(112, 'Rauch'),
(113, 'Rivadavia'),
(114, 'Rojas'),
(115, 'Roque Perez'),
(116, 'Saavedra'),
(117, 'Saladillo'),
(118, 'Salliquelo'),
(119, 'Salto'),
(120, 'San Andres de Giles'),
(121, 'San Antonio de Areco'),
(122, 'San Cayetano'),
(123, 'San Fernando'),
(124, 'San Isidro'),
(125, 'San Miguel'),
(126, 'San Nicolas'),
(127, 'San Pedro'),
(128, 'San Vicente'),
(129, 'Suipacha'),
(130, 'Tandil'),
(131, 'Tapalque'),
(132, 'Tigre'),
(133, 'Tordillo'),
(134, 'Tornquist'),
(135, 'Trenque Lauquen'),
(136, 'Tres Arroyos'),
(137, 'Tres de Febrero'),
(138, 'Tres Lomas'),
(139, 'Vicente Lopez'),
(140, 'Villa Gesell'),
(141, 'Villarino'),
(142, 'Zarate'),
(143, 'LEZAMA'),
(144, 'VERONICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
`idMateria` int(5) NOT NULL,
  `materia` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `materia`) VALUES
(1, 'RESIDENCIA'),
(2, 'ALTA COMPLEJIDAD'),
(3, 'SEPOI'),
(4, 'POI'),
(5, 'ORTODONCIA'),
(6, 'PROTESIS'),
(7, 'CIRUJIA'),
(8, 'ENDODONCIA'),
(9, 'RX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
`dni` int(9) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `borrado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
`idPlan` int(11) NOT NULL,
  `plan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`idPlan`, `plan`) VALUES
(1, 'PAMI'),
(2, 'SUMAR'),
(3, 'IOMA'),
(4, 'PROFE'),
(5, 'PARTICULAR'),
(6, 'OBRA'),
(7, 'OSPRERA'),
(8, 'SAMO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tieneasignado`
--

CREATE TABLE IF NOT EXISTS `tieneasignado` (
  `idMateria` int(11) NOT NULL,
  `dni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `clave` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `clave`) VALUES
(1, 'soporte', 'laseraleer'),
(2, 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estaenplanmateria`
--
ALTER TABLE `estaenplanmateria`
 ADD PRIMARY KEY (`idPlan`,`idMateria`,`dni`);

--
-- Indices de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
 ADD PRIMARY KEY (`idHistoriaClinica`);

--
-- Indices de la tabla `hoja`
--
ALTER TABLE `hoja`
 ADD PRIMARY KEY (`idHoja`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
 ADD PRIMARY KEY (`idLocalidad`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
 ADD PRIMARY KEY (`idMateria`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
 ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
 ADD PRIMARY KEY (`idPlan`);

--
-- Indices de la tabla `tieneasignado`
--
ALTER TABLE `tieneasignado`
 ADD PRIMARY KEY (`idMateria`,`dni`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
MODIFY `idHistoriaClinica` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `hoja`
--
ALTER TABLE `hoja`
MODIFY `idHoja` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
MODIFY `idLocalidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
MODIFY `idMateria` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
MODIFY `dni` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
MODIFY `idPlan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
