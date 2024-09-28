-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-05-2023 a las 03:38:15
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catedra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajero`
--

DROP TABLE IF EXISTS `cajero`;
CREATE TABLE IF NOT EXISTS `cajero` (
  `idCajero` int NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `usuario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contrasena` text NOT NULL,
  `dui` int NOT NULL,
  PRIMARY KEY (`idCajero`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cajero`
--

INSERT INTO `cajero` (`idCajero`, `nombre`, `apellido`, `usuario`, `contrasena`, `dui`) VALUES
(1, 'Miguel', 'Sanchez', 'YX4110', '1234', 123412344);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `identificador` varchar(10) NOT NULL,
  `DUI` varchar(10) NOT NULL,
  `sucursal` varchar(100) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellido`, `usuario`, `correo`, `contrasena`, `identificador`, `DUI`, `sucursal`) VALUES
(4, 'Francisco', 'Mendoza', 'franSor', 'franmen@gmail.com', '1234', 'cEhfDm', '12345678', 'Sucursal A'),
(6, 'Edmilson', 'Reynosa', 'edmilson', 'edmilson@gmail.com', '1234', 'O4QPBB', '123411231', 'Sucursal C'),
(5, 'Miguel', 'Sanchez', 'miguel', '1234@gmail.com', '$2y$10$9tfYq3Tw1ls0Lh4SoWoe5eA89pg1fD2PsZEuJdB35.o85XX0OJ3PW', 'rRdvdi', '12345678', 'Sucursal C'),
(7, 'Hector', 'Portillo', 'HectPort13', 'hector@gmail.com', '1234', 'VZM81F', '78965512', 'Sucursal B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentabanc`
--

DROP TABLE IF EXISTS `cuentabanc`;
CREATE TABLE IF NOT EXISTS `cuentabanc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numerocuenta` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `saldo` double NOT NULL,
  `idCliente` int NOT NULL,
  `fechaCrea` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cuentabanc`
--

INSERT INTO `cuentabanc` (`id`, `numerocuenta`, `nombre`, `apellido`, `correo`, `saldo`, `idCliente`, `fechaCrea`) VALUES
(4, '13705622', 'Francisco', 'Mendoza', 'franmen@gmail.com', 200, 4, '2023-05-06'),
(5, '70092632', 'Francisco', 'Mendoza', 'franmen@gmail.com', 200, 4, '2023-05-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `idEmpleado` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `dui` varchar(9) NOT NULL,
  `sucursal` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`idEmpleado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `nombre`, `apellido`, `usuario`, `correo`, `contrasena`, `dui`, `sucursal`, `rol`, `estado`) VALUES
(1, 'Francisco', 'Mendoza', 'fran', 'fran@gmail.com', '1234', '123412343', 'Sucursal A', 'Personal de limpieza', 'activo'),
(2, 'Astrid', 'Ortiz', 'astrOtz12', 'astrid@gmail.com', 'astrid', '12345678', 'Sucursal B', 'Personal de mesa', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerentesucursal`
--

DROP TABLE IF EXISTS `gerentesucursal`;
CREATE TABLE IF NOT EXISTS `gerentesucursal` (
  `idGerente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  PRIMARY KEY (`idGerente`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `gerentesucursal`
--

INSERT INTO `gerentesucursal` (`idGerente`, `nombre`, `apellido`, `correo`, `usuario`, `contraseña`) VALUES
(1, 'miguel', 'sanchez', 'migue@gmail.com', 'miguels', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE IF NOT EXISTS `movimientos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `tipoTransac` varchar(15) NOT NULL,
  `monto` double NOT NULL,
  `numerocuenta` varchar(8) NOT NULL,
  `idCliente` int NOT NULL,
  `fechaTransac` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `nombre`, `apellido`, `correo`, `tipoTransac`, `monto`, `numerocuenta`, `idCliente`, `fechaTransac`) VALUES
(7, 'Francisco', 'Mendoza', 'franmen@gmail.com', 'Deposito', 10, '70092632', 4, '2023-05-06'),
(6, 'Francisco', 'Mendoza', 'franmen@gmail.com', 'Deposito', 50, '70092632', 4, '2023-05-06'),
(5, 'Francisco', 'Mendoza', 'franmen@gmail.com', 'Transferencia', 50, '13705622', 4, '2023-05-06'),
(8, 'Francisco', 'Mendoza', 'franmen@gmail.com', 'Retiro', 10, '70092632', 4, '2023-05-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE IF NOT EXISTS `prestamos` (
  `idPrestamo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `sueldo` int NOT NULL,
  `prestamo` int NOT NULL,
  `idCliente` int NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`idPrestamo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idPrestamo`, `nombre`, `apellido`, `correo`, `sueldo`, `prestamo`, `idCliente`, `estado`) VALUES
(2, 'Francisco', 'Mendoza', 'franmen@gmail.com', 500, 1500, 4, 'Aceptado'),
(3, 'Francisco', 'Mendoza', 'franmen@gmail.com', 500, 1000, 4, 'Procesando solicitud');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
