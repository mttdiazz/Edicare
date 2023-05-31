-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2021 a las 13:25:29
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `baseedicare`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `uidAdmin` tinytext NOT NULL,
  `emailAdmin` tinytext NOT NULL,
  `pwdAdmin` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`idAdmin`, `uidAdmin`, `emailAdmin`, `pwdAdmin`) VALUES
(1, 'AdminVentura', 'adminventura@gmail.com', 'contrarda'),
(15, 'Adm CAOS', 'admin@caos.com', 'cualquiera'),
(29, 'Administracion Trump', 'adminpepe@gmail.com', 'river'),
(31, 'Administracion Mateo', 'mateo@gmail.com', 'cualquiera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificios`
--

CREATE TABLE `edificios` (
  `idEdificio` int(11) NOT NULL,
  `Direccion` tinytext NOT NULL,
  `Ciudad` tinytext NOT NULL,
  `idAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edificios`
--

INSERT INTO `edificios` (`idEdificio`, `Direccion`, `Ciudad`, `idAdmin`) VALUES
(1, 'Alvear 810', 'Rosario', 1),
(2, 'Billinghust 2069', 'CABA', 1),
(13, 'Moreno 502', 'Monserrat', 15),
(16, 'San Martin 912', 'Mendoza', 15),
(17, 'Austria 2039', 'CABA', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaxsum`
--

CREATE TABLE `reservaxsum` (
  `idReserva` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horario` tinytext NOT NULL,
  `idSum` int(11) NOT NULL,
  `idUnidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservaxsum`
--

INSERT INTO `reservaxsum` (`idReserva`, `fecha`, `horario`, `idSum`, `idUnidad`) VALUES
(116, '2021-01-31', 'Noche', 1, 3),
(119, '2021-02-03', 'Mediodia', 2, 4),
(123, '2021-03-14', 'Noche', 1, 32),
(130, '2021-02-27', 'Noche', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sumxedificio`
--

CREATE TABLE `sumxedificio` (
  `idSum` int(11) NOT NULL,
  `Descripcion` tinytext NOT NULL,
  `idEdificio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sumxedificio`
--

INSERT INTO `sumxedificio` (`idSum`, `Descripcion`, `idEdificio`) VALUES
(1, 'Parrilla y Quincho del Octavo Piso', 2),
(2, 'SUM Primer Piso', 13),
(3, 'Terraza', 1),
(4, 'Parrillero Planta Baja', 16),
(5, 'Parrilla en Terraza', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superadmin`
--

CREATE TABLE `superadmin` (
  `idSAdmin` int(11) NOT NULL,
  `uidSAdmin` text NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `superadmin`
--

INSERT INTO `superadmin` (`idSAdmin`, `uidSAdmin`, `password`) VALUES
(1, 'mateomacagnidiaz@gmail.com', 'password'),
(2, 'peportizdg', 'river');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadesfuncionales`
--

CREATE TABLE `unidadesfuncionales` (
  `idUnidad` int(11) NOT NULL,
  `Descripcion` tinytext NOT NULL,
  `idEdificio` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidadesfuncionales`
--

INSERT INTO `unidadesfuncionales` (`idUnidad`, `Descripcion`, `idEdificio`, `idUsuario`) VALUES
(2, '1er Piso, Departamento A', 1, 1),
(3, '8 \"A\"', 2, 2),
(4, 'Departamento 433', 13, 4),
(32, 'Departamento 301', 13, 2),
(37, '1er Piso, Departamento B', 1, 5),
(38, '2do Piso, Departamento A', 1, NULL),
(39, '2do Piso, Departamento B', 1, NULL),
(41, '3er piso, Departamento A', 1, 7),
(42, '9 \"B\"', 2, NULL),
(43, '1 \"A\"', 2, NULL),
(44, '1er Piso, Departamento A', 16, 6),
(45, '1er Piso, Departamento B', 16, NULL),
(46, '2do Piso, Departamento A', 16, NULL),
(47, '2do Piso, Departamento B', 16, NULL),
(48, '2do Piso, Departamento C', 16, NULL),
(49, '1er Piso, Departamento B', 17, NULL),
(50, '1er Piso, Departamento A', 17, NULL),
(51, '2do Piso, Departamento A', 17, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `dniUsuario` int(8) NOT NULL,
  `emailUsuario` tinytext NOT NULL,
  `nombreApellido` tinytext NOT NULL,
  `pwdUsuario` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `dniUsuario`, `emailUsuario`, `nombreApellido`, `pwdUsuario`) VALUES
(1, 40361508, 'peportizdg@gmail.com', 'Pedro Ortiz de Guinea', '$2y$10$V1fU5IawJnTWiMwfxtidgO3fvUY6FlSelivRC25SRdBKDmqovypE2'),
(2, 36010868, 'jortiz@gmail.com', 'Juan Ortiz de Guinea', '$2y$10$eHgSa3CarNz0tU.aPCq8G.1RarT5wFi5VQS53.jxYf4x0ImT6JI4C'),
(4, 40714578, 'mattdiaz1997@hotmail.com', 'Mateo Macagni Diaz', '$2y$10$Cf.VwcfJxSOctdBkIg8ooeeN6z9fl.VvOXC9GWqZahPaFj7QpE.uW'),
(5, 16622845, 'carlosgracia@ibm.com', 'Carlos Gracia', '$2y$10$yulRWSG3rVZi9rPcE6fyKOpwa0o/PuwYIZNhXp0EHmlrQRJ96JrvO'),
(6, 41561616, 'jorge@gmail.com', 'Jorge Carrascal', '$2y$10$63.jD/LaGwK7MHnfAbIYRuI7bdqrItjUn0OrXjxP98CRcsCpf242K'),
(7, 41123123, 'pedro@hotmail.com', 'pedro ortiz', '$2y$10$gwz6Km6BGc85GKTtmxY/yuENfB.CQp6vETX0yDX1o5qpvdfc77K6K');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `edificios`
--
ALTER TABLE `edificios`
  ADD PRIMARY KEY (`idEdificio`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Indices de la tabla `reservaxsum`
--
ALTER TABLE `reservaxsum`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `idUnidad` (`idUnidad`),
  ADD KEY `idSum` (`idSum`);

--
-- Indices de la tabla `sumxedificio`
--
ALTER TABLE `sumxedificio`
  ADD PRIMARY KEY (`idSum`),
  ADD KEY `idEdificio` (`idEdificio`);

--
-- Indices de la tabla `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`idSAdmin`),
  ADD UNIQUE KEY `email` (`uidSAdmin`) USING HASH;

--
-- Indices de la tabla `unidadesfuncionales`
--
ALTER TABLE `unidadesfuncionales`
  ADD PRIMARY KEY (`idUnidad`),
  ADD KEY `idEdificio` (`idEdificio`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `edificios`
--
ALTER TABLE `edificios`
  MODIFY `idEdificio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `reservaxsum`
--
ALTER TABLE `reservaxsum`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de la tabla `sumxedificio`
--
ALTER TABLE `sumxedificio`
  MODIFY `idSum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `idSAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `unidadesfuncionales`
--
ALTER TABLE `unidadesfuncionales`
  MODIFY `idUnidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `edificios`
--
ALTER TABLE `edificios`
  ADD CONSTRAINT `edificios_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservaxsum`
--
ALTER TABLE `reservaxsum`
  ADD CONSTRAINT `reservaxsum_ibfk_1` FOREIGN KEY (`idUnidad`) REFERENCES `unidadesfuncionales` (`idUnidad`),
  ADD CONSTRAINT `reservaxsum_ibfk_2` FOREIGN KEY (`idSum`) REFERENCES `sumxedificio` (`idSum`);

--
-- Filtros para la tabla `sumxedificio`
--
ALTER TABLE `sumxedificio`
  ADD CONSTRAINT `sumxedificio_ibfk_1` FOREIGN KEY (`idEdificio`) REFERENCES `edificios` (`idEdificio`);

--
-- Filtros para la tabla `unidadesfuncionales`
--
ALTER TABLE `unidadesfuncionales`
  ADD CONSTRAINT `unidadesfuncionales_ibfk_1` FOREIGN KEY (`idEdificio`) REFERENCES `edificios` (`idEdificio`),
  ADD CONSTRAINT `unidadesfuncionales_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
