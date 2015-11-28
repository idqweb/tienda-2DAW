/* ESTOS SON ALGUNOS PRODUCTOS */
-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-11-2015 a las 23:36:39
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mitienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `referencia` varchar(30) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  `stock` mediumint(9) NOT NULL,
  `stockminimo` smallint(6) NOT NULL,
  `imagen` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`referencia`, `descripcion`, `precio`, `stock`, `stockminimo`, `imagen`) VALUES
('MOV-00014', 'movil Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas nulla non nunc tempus, consequat pulvinar qua', '78.00', 10, 15, '13.jpg'),
('REF-00001', 'Monitor Lorem ipsum dolor sit ', '200.00', 25, 5, '1.png'),
('REF-00002', 'Monitor Lorem ipsum dolor sit ', '150.00', 5, 10, '2.jpg'),
('REF-00003', 'Monitor Lorem ipsum dolor sit ', '195.36', 25, 10, '3.jpg'),
('REF-00004', 'Monitor Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas nulla non nunc tempus, consequat pulvinar q', '99.99', 2, 10, '4.jpg'),
('REF-00005', 'Monitor Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas nulla non nunc tempus, consequat pulvinar q', '165.36', 15, 10, '5.jpg'),
('REF-00006', 'Portatil Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas nulla non nunc tempus, consequat pulvinar ', '258.65', 5, 2, '6.jpg'),
('REF-00007', 'Portatil Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas nulla non nunc tempus, consequat pulvinar ', '325.40', 6, 2, '7.jpg'),
('REF-00008', 'Portatil Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas nulla non nunc tempus, consequat pulvinar ', '258.14', 1, 2, '8.jpg'),
('REF-00009', 'Portatil Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas nulla non nunc tempus, consequat pulvinar ', '159.35', 4, 2, '9.gif'),
('REF-00010', 'Portatil Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas nulla non nunc tempus, consequat pulvinar ', '456.25', 1, 2, '10.jpg'),
('REF-00011', 'Movil Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas nulla non nunc tempus, consequat pulvinar qua', '35.25', 25, 15, '11.jpg'),
('REF-00012', 'Movil Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas nulla non nunc tempus, consequat pulvinar qua', '84.56', 12, 15, '12.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`referencia`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
