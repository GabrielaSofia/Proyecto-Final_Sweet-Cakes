-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2020 a las 03:14:40
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sweet_cakes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(4) NOT NULL,
  `cedula` int(15) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_cupcake`
--

CREATE TABLE `registro_cupcake` (
  `id` int(4) NOT NULL,
  `ced_cliente` int(15) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `sabor` varchar(20) NOT NULL,
  `tamano` varchar(30) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `decoracion` varchar(30) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `diseno` mediumblob NOT NULL,
  `descripcion` text NOT NULL,
  `abono` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `saldo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_galletas`
--

CREATE TABLE `registro_galletas` (
  `id` int(4) NOT NULL,
  `ced_cliente` int(15) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `sabor` varchar(20) NOT NULL,
  `tamano` varchar(30) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `decoracion` varchar(30) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `diseno` mediumblob NOT NULL,
  `descripcion` text NOT NULL,
  `abono` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `saldo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_pastel`
--

CREATE TABLE `registro_pastel` (
  `id` int(4) NOT NULL,
  `ced_cliente` int(15) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `sabor` varchar(20) NOT NULL,
  `tamano` varchar(30) NOT NULL,
  `pisos` int(1) NOT NULL,
  `decoracion` varchar(30) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `diseno` mediumblob NOT NULL,
  `descripcion` text NOT NULL,
  `abono` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `saldo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_postre`
--

CREATE TABLE `registro_postre` (
  `id` int(4) NOT NULL,
  `ced_cliente` int(15) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `sabor` varchar(20) NOT NULL,
  `tamano` varchar(30) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `decoracion` varchar(30) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `diseno` mediumblob NOT NULL,
  `descripcion` text NOT NULL,
  `abono` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `saldo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `cedula` int(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `cargo` varchar(15) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_cupcake`
--
ALTER TABLE `registro_cupcake`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_galletas`
--
ALTER TABLE `registro_galletas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_pastel`
--
ALTER TABLE `registro_pastel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_postre`
--
ALTER TABLE `registro_postre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro_cupcake`
--
ALTER TABLE `registro_cupcake`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registro_galletas`
--
ALTER TABLE `registro_galletas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro_pastel`
--
ALTER TABLE `registro_pastel`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registro_postre`
--
ALTER TABLE `registro_postre`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
