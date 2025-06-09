-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2025 at 02:56 AM
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
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `REGISTRO_ID` int(11) NOT NULL,
  `VALOR` varchar(32) NOT NULL,
  `TIPO` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`REGISTRO_ID`, `VALOR`, `TIPO`) VALUES
(3, 'GATO', 'MASCOTA'),
(4, 'PERRO', 'MASCOTA'),
(5, 'ROYAL', 'MARCA'),
(6, 'PURINA', 'MARCA'),
(7, 'CORTE_PELO', 'SERVICIO'),
(8, 'CORTE_UÑAS', 'SERVICIO'),
(11, 'ALIMENTO', 'PRODUCTO'),
(12, 'ACCESORIO', 'PRODUCTO');

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
  `PRECIO` float NOT NULL,
  `PESO` float DEFAULT NULL,
  `TIPO` varchar(32) NOT NULL,
  `MASCOTA` varchar(32) NOT NULL,
  `MARCA` varchar(32) NOT NULL,
  `IMAGEN` varchar(123) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`CODIGO`, `NOMBRE`, `PRECIO`, `PESO`, `TIPO`, `MASCOTA`, `MARCA`, `IMAGEN`) VALUES
(1, 'Alimento Perro Adulto', 19000, 1, 'alimento', 'perro', 'royal', NULL),
(124123, 'Alimento gatuno', 12123, 1, '', '', 'royal', '1749321898_b07605f168e34d3cfd53.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `SERVICIO_ID` int(11) NOT NULL,
  `TIPO` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `turnos`
--

CREATE TABLE `turnos` (
  `TURNO_ID` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `HORARIO` time NOT NULL,
  `TIPO_TURNO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `turnos`
--

INSERT INTO `turnos` (`TURNO_ID`, `USUARIO_ID`, `FECHA`, `HORARIO`, `TIPO_TURNO`) VALUES
(1, 7, '2025-06-11', '00:00:09', 0),
(2, 7, '2025-06-12', '00:00:10', 0),
(3, 7, '2025-06-27', '00:00:10', 1),
(4, 7, '2025-06-13', '00:00:10', 8),
(5, 7, '2025-06-19', '11:00:00', 7),
(6, 7, '2025-06-13', '10:00:00', 1),
(7, 7, '2025-06-11', '10:00:00', 7);

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
  `ES_MAYORISTA` tinyint(1) NOT NULL,
  `IMAGEN` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`USUARIO_ID`, `CBU`, `NOMBRE`, `APELLIDO`, `CORREO`, `CONTRASEÑA`, `DIRECCION`, `ES_MAYORISTA`, `IMAGEN`) VALUES
(7, NULL, 'Matias', 'Montiel', 'petcare@gmail.com', '$2y$10$z35hSQV7rOSEslbAS3br/eXKTJxNuMuHk49e4/wBU3AHz7QEZC1BK', NULL, 0, NULL),
(17, NULL, 'admin', 'petcare@gmail.com', 'admin@gmail.com', '$2y$10$on68HndOeLMF5thJWnPQS.G4D8ghEAdnjfZXln6NweGSeeb5i3tyO', NULL, 0, '1749318202_2b8941b624b0cf00ddf3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`REGISTRO_ID`);

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`CONSULTA_ID`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`CODIGO`),
  ADD KEY `TIPO-PRODUCTO` (`TIPO`),
  ADD KEY `TIPO-MASCOTA` (`MASCOTA`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`SERVICIO_ID`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`TURNO_ID`),
  ADD KEY `USUARIO_ID` (`USUARIO_ID`),
  ADD KEY `TIPO_TURNO` (`TIPO_TURNO`);

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
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `REGISTRO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `CONSULTA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `TURNO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USUARIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`SERVICIO_ID`) REFERENCES `turnos` (`TIPO_TURNO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`USUARIO_ID`) REFERENCES `usuarios` (`USUARIO_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
