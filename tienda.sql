-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2018 a las 02:50:16
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(3) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `APELLIDO` varchar(30) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CONTRASENA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `NOMBRE`, `APELLIDO`, `TELEFONO`, `DIRECCION`, `EMAIL`, `CONTRASENA`) VALUES
(1, 'Ricardo', 'Llanos', 984943630, 'El Olimpo 2541', 'ricardollanos1@gmail.com', '2111'),
(2, 'Pilar', 'Cifuentes', 984711846, 'El Clarinete 794', 'pilarcifuentes1@gmail.com', '2541'),
(3, 'Jeyson', 'Llanos', 2147483647, 'EL Clarinete 794', 'jeyson@gmail.com', '1515'),
(4, 'Ricardo Jose', 'Llanos Cifuentes', 987355443, 'El Ilimpo 2541', 'kalo@gmail.com', '1111'),
(7, 'Sergio', 'Contreras', 2147483647, 'Las Torres 2111', 'scontreras@gmail.com', '3333'),
(8, 'Kalo', 'Kino', 2147483647, 'El olimpo 5643', 'KaloKilo@gmail.com', '4444'),
(9, 'Manuel', 'Troncoso', 956734523, 'El Olivo 2543', 'mtroncoso@hotmail.com', '5555'),
(10, 'Manuel', 'Neira', 99843245, 'El Arbo Campeon', 'MNeira@hotmail.com', '3333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID` int(5) NOT NULL,
  `PRODUCTO` varchar(30) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `DIRECCION` varchar(200) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `ESTADO` int(1) NOT NULL,
  `COSTO` int(15) NOT NULL,
  `PAGO` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID`, `PRODUCTO`, `NOMBRE`, `DIRECCION`, `TELEFONO`, `ESTADO`, `COSTO`, `PAGO`) VALUES
(1, 'Tarjeta de red', 'Ricardo Llanos', 'El Olimpo 2541', 984943630, 1, 50000, 'tarjeta'),
(2, 'Disco DUro', 'Ricardo Llanos', 'El Olimpo 2541', 984943630, 1, 50000, 'tarjeta'),
(3, 'Placa Madre', 'Ricardo Llanos', 'El Olimpo 2541', 984943630, 0, 105000, 'efectivo'),
(4, 'Memoria RAM', 'Ricardo Jose Llanos Cifuentes', 'El Ilimpo 2541', 987355443, 0, 30000, 'tarjeta'),
(5, 'Placa Madre ASUS', 'Ricardo Llanos', 'El Olimpo 2541', 984943630, 0, 49990, 'efectivo'),
(6, 'Placa Madre ASUS', 'Ricardo Llanos', 'El Olimpo 2541', 984943630, 0, 49990, 'efectivo'),
(7, 'Placa Madre ASUS', 'Ricardo Llanos', 'El Olimpo 2541', 984943630, 0, 49990, 'efectivo'),
(8, 'Placa Madre ASUS', 'Ricardo Llanos', 'El Olimpo 2541', 984943630, 0, 49990, 'efectivo'),
(9, 'Placa Madre ASUS', 'Ricardo Llanos', 'El Olimpo 2541', 984943630, 1, 49990, 'tarjeta'),
(10, 'Disipador', 'Ricardo Llanos', 'El Olimpo 2541', 984943630, 0, 68000, 'efectivo'),
(11, 'Placa Madre ASUS', 'Ricardo Llanos', 'El Olimpo 2541', 984943630, 0, 58000, 'efectivo'),
(12, 'Disco Duro', 'Ricardo Llanos', 'El Olimpo 2541', 984943630, 0, 40000, 'efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(3) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CARACTERISTICAS` text NOT NULL,
  `FOTO` varchar(50) NOT NULL,
  `COSTO` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `NOMBRE`, `CARACTERISTICAS`, `FOTO`, `COSTO`) VALUES
(1, 'Memoria RAM', 'Memoria Ram DDR4 8GB (1x8GB) 2133MHz CL15 DIMM Value Select Corsair', 'memoria.jpg', 50000),
(7, 'Tarjeta de Video', 'Tarjeta de video GTX75o ASUS', 'tarjeta.jpg', 600000),
(8, 'Placa Madre ASUS', 'Placa Madre Asus Rfx650', 'placaMadre.jpg', 55000),
(9, 'Disipador', 'Cooler Master Hyper 212x', 'disipador.jpg', 65000),
(10, 'Disco Duro', 'Disco Duro 1TB Sata3 7200 rpm 64MB Barracuda', 'discoDuro.jpg', 37000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(3) NOT NULL,
  `USUARIO` varchar(20) NOT NULL,
  `CONTRASENA` varchar(20) NOT NULL,
  `ROL` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `USUARIO`, `CONTRASENA`, `ROL`) VALUES
(1, 'admin', '123456', 1),
(2, 'empleado', '123456', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD UNIQUE KEY `USERNAME` (`USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
