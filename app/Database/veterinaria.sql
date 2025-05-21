-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2025 at 05:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veterinaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

CREATE TABLE `consultas` (
  `CONSULTA_ID` int(11) NOT NULL,
  `TITULO` varchar(128) NOT NULL,
  `CORREO` text NOT NULL,
  `CONTENIDO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`CONSULTA_ID`, `TITULO`, `CORREO`, `CONTENIDO`) VALUES
(1, 'precios', 'martinez@gmail.com', 'Hola queria consultar por el precio de una radiografia. Gracias.');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `CODIGO` int(11) NOT NULL,
  `NOMBRE` varchar(256) NOT NULL,
  `MARCA` varchar(256) NOT NULL,
  `PRECIO` float NOT NULL,
  `PESO` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`CODIGO`, `NOMBRE`, `MARCA`, `PRECIO`, `PESO`) VALUES
(1, 'Alimento Perro Adulto', 'Pedigree', 19000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `turnos`
--

CREATE TABLE `turnos` (
  `TURNO_ID` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `HORARIO` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `USUARIO_ID` int(11) NOT NULL,
  `CBU` int(11) DEFAULT NULL,
  `NOMBRE` varchar(256) NOT NULL,
  `APELLIDO` varchar(256) NOT NULL,
  `CORREO` varchar(256) NOT NULL,
  `CONTRASEÑA` varchar(512) NOT NULL,
  `DIRECCION` text DEFAULT NULL,
  `ES_MAYORISTA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`USUARIO_ID`, `CBU`, `NOMBRE`, `APELLIDO`, `CORREO`, `CONTRASEÑA`, `DIRECCION`, `ES_MAYORISTA`) VALUES
(2, NULL, 'Matias', 'Montiel', 'matiasmontiel@gmail.com', '1234', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`CONSULTA_ID`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`TURNO_ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USUARIO_ID`),
  ADD UNIQUE KEY `CORREO` (`CORREO`),
  ADD UNIQUE KEY `CBU` (`CBU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `CONSULTA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `TURNO_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USUARIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
