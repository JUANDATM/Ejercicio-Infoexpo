-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2019 a las 21:12:43
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `visitcompany`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `idcompany` int(11) NOT NULL,
  `namecompany` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `visits` varchar(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`idcompany`, `namecompany`, `address`, `visits`, `description`) VALUES
(6, 'GKN Driveline', ' Carretera Panamericana Km.284 s/n esq. Av. Aeropuerto 2a Fraccion de Crespo, 38110 Celaya, Gto.', '14', 'GKN Automotive is the market leader in conventional, all-wheel and electrified drive systems and solutions.'),
(7, 'WARSON', 'Av. México Japón 156, Cd Industrial de Celaya, 38010 Celaya, Gto', '1', 'Somos una empresa con 36 años de experiencia como fabricantes y más de 70 años en la industria de las bombas. Tenemos control completo del proceso productivo, desde diseño, ingeniería y modelado, pasando por fundición, maquinados, ensamble y prueba llegando hasta el proceso de comercialización'),
(8, 'FRESCOPACK', 'Av Pte 4 2M, Cd Industrial de Celaya, 38010 Celaya, Gto.', '3', 'Empresa de moldeo por inyección de plástico en Celaya, México'),
(9, 'Powertonics S.A. de C.V.', 'Avenida México Japón 317, Ciudad Industrial de Celaya, 38010 Celaya, Gto.', '5', 'Empresa de suministros industriales en Celaya, México'),
(10, 'Beta Procesos S.A. de C.V.', 'Av. México Japón, Cd Industrial de Celaya, 38010 Celaya, Gto.', '1', 'Mayorista de artículos de higiene en Celaya, México'),
(28, 'Sygma Abastecedora industrial', 'Av Tecnológico 42, Valle Hermoso, 38010 Celaya, Gto.', '2', 'Empresa de suministros industriales en Celaya, México');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`idcompany`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `idcompany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
