-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2025 at 07:34 PM
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
  `CATEGORIA_ID` int(11) NOT NULL,
  `VALOR` varchar(32) NOT NULL,
  `TIPO` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`CATEGORIA_ID`, `VALOR`, `TIPO`) VALUES
(3, 'GATO', 'MASCOTA'),
(4, 'PERRO', 'MASCOTA'),
(5, 'ROYAL', 'MARCA'),
(6, 'PURINA', 'MARCA'),
(7, 'SALUD', 'SERVICIO'),
(8, 'ESTETICA', 'SERVICIO'),
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
  `CONTENIDO` text NOT NULL,
  `USUARIO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`CONSULTA_ID`, `TITULO`, `CORREO`, `CONTENIDO`, `USUARIO_ID`) VALUES
(6, 'necesito mas comida', 'necesitomascomida@gmail.com', 'necesito mucha, basante mas comida', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mascotas`
--

CREATE TABLE `mascotas` (
  `MASCOTA_ID` int(11) NOT NULL,
  `NOMBRE` varchar(128) NOT NULL,
  `TIPO_MASCOTA` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `mascotas`
--

INSERT INTO `mascotas` (`MASCOTA_ID`, `NOMBRE`, `TIPO_MASCOTA`, `USUARIO_ID`) VALUES
(1, 'Fitto', 4, 4),
(2, 'Dakota', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `CODIGO` int(11) NOT NULL,
  `NOMBRE` varchar(256) NOT NULL,
  `CATEGORIA_MARCA` int(11) NOT NULL,
  `CATEGORIA_PRODUCTO` int(11) NOT NULL,
  `CATEGORIA_MASCOTA` int(11) NOT NULL,
  `PRECIO` float NOT NULL,
  `PESO` float DEFAULT NULL,
  `IMAGEN` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`CODIGO`, `NOMBRE`, `CATEGORIA_MARCA`, `CATEGORIA_PRODUCTO`, `CATEGORIA_MASCOTA`, `PRECIO`, `PESO`, `IMAGEN`) VALUES
(5324, 'Alimento papu', 5, 11, 4, 1, 1, '1749831090_3917e373719167501da5.png'),
(1243435, 'Alimento gato la secuela', 5, 11, 3, 1, 1, '1749830111_9026c2f1fce819d4c38f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `SERVICIO_ID` int(11) NOT NULL,
  `NOMBRE` varchar(32) NOT NULL,
  `CATEGORIA_SERVICIO` int(11) NOT NULL,
  `DESCRIPCION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`SERVICIO_ID`, `NOMBRE`, `CATEGORIA_SERVICIO`, `DESCRIPCION`) VALUES
(1, 'CORTE_PELO', 8, 'corte de pelo'),
(2, 'CORTE_UÑA', 8, 'corte de uñas'),
(3, 'BAÑO', 8, 'baño'),
(4, 'CASTRACION', 7, 'castracion'),
(5, 'VACUNACION', 7, 'vacunacion'),
(6, 'DENTISTA', 7, 'dentista');

-- --------------------------------------------------------

--
-- Table structure for table `turnos`
--

CREATE TABLE `turnos` (
  `TURNO_ID` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `HORARIO` time NOT NULL,
  `SERVICIO_ID` int(11) NOT NULL,
  `MASCOTA_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `turnos`
--

INSERT INTO `turnos` (`TURNO_ID`, `USUARIO_ID`, `FECHA`, `HORARIO`, `SERVICIO_ID`, `MASCOTA_ID`) VALUES
(11, 4, '2025-06-25', '10:00:00', 2, 1),
(12, 4, '2025-06-26', '09:00:00', 1, 2),
(13, 4, '2025-06-27', '11:00:00', 3, 1),
(14, 4, '2025-07-09', '10:00:00', 4, 2);

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
  `ES_MAYORISTA` tinyint(1) DEFAULT NULL,
  `IMAGEN` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`USUARIO_ID`, `CBU`, `NOMBRE`, `APELLIDO`, `CORREO`, `CONTRASEÑA`, `DIRECCION`, `ES_MAYORISTA`, `IMAGEN`) VALUES
(3, NULL, 'juanito', 'pere', 'juanitoperez@gmail.com', '$2y$10$YtGEpCedo6QF/gMtvt4xIuFvR.Hm2Ykemh.M5WkpDsdXnqLEkwZQS', NULL, 0, ''),
(4, 134531, 'admin', 'petcare', 'adminpetcare@gmail.com', '$2y$10$D3aiZcMCMx8kQgVci/YukeWPwJSYA8dtJIj3CCb/4tM5DbikYQH3W', 'MIKASA', 1, ''),
(5, NULL, 'Matias', 'Montiel', 'petcare@gmail.com', '$2y$10$OIBAt4Ooqxk9TQza5jdKaelrTuwaTPSR0vmYb7h4ZJbh.R0pArByW', NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD KEY `REGISTRO_ID` (`CATEGORIA_ID`);

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`CONSULTA_ID`),
  ADD KEY `USUARIO_ID` (`USUARIO_ID`);

--
-- Indexes for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`MASCOTA_ID`),
  ADD KEY `ID_DUEÑO` (`USUARIO_ID`),
  ADD KEY `TIPO_MASCOTA` (`TIPO_MASCOTA`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`CODIGO`),
  ADD KEY `marca_categoria_id` (`CATEGORIA_MARCA`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`SERVICIO_ID`),
  ADD KEY `CATEGORIA_SERVICIO` (`CATEGORIA_SERVICIO`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`TURNO_ID`),
  ADD KEY `USUARIO_ID` (`USUARIO_ID`),
  ADD KEY `categoria_turno_id` (`SERVICIO_ID`);

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
  MODIFY `CONSULTA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `MASCOTA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `SERVICIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `TURNO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USUARIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascota_categoria_id` FOREIGN KEY (`TIPO_MASCOTA`) REFERENCES `categoria` (`CATEGORIA_ID`),
  ADD CONSTRAINT `mascota_dueño_id` FOREIGN KEY (`USUARIO_ID`) REFERENCES `usuarios` (`USUARIO_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
