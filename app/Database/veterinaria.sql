-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2025 at 08:49 PM
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
(12, 'ACCESORIO', 'PRODUCTO'),
(17, 'EUKANUBA', 'MARCA'),
(18, 'OLD PRINCE', 'MARCA'),
(19, 'PERFORMANCE', 'MARCA'),
(20, 'VITAL CAN', 'MARCA');

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
  `USUARIO_ID` int(11) NOT NULL,
  `IMAGEN` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `mascotas`
--

INSERT INTO `mascotas` (`MASCOTA_ID`, `NOMBRE`, `TIPO_MASCOTA`, `USUARIO_ID`, `IMAGEN`) VALUES
(2, 'Dakota', 4, 4, ''),
(13, 'Rufo', 4, 4, NULL),
(14, 'Fitto', 4, 4, NULL);

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
(62346, 'Alimento Old Prince Para Perro Adulto Mediano', 18, 11, 4, 15390, 3, '1750358590_70e2552f6b394bddd079.webp'),
(63497, 'Performance Alimento Perro Adulto', 19, 11, 4, 84265, 20, '1750358763_ae239c199f921affd391.webp'),
(64426, 'Alimento Royal Para Perro Mini Adulto', 5, 11, 4, 31010, 3, '1750358636_7a5ad72118262e091c6c.webp'),
(73486, 'Alimento Royal Maxi Para Perro Adulto ', 5, 11, 4, 28515, 3, '1750358809_f5207eda3627670310aa.webp'),
(75348, 'Alimento Purina Para Perro Adulto', 6, 11, 4, 60000, 20, '1750358845_40fe48ca36cbdaed6775.png'),
(452375, 'Alimento perro adulto', 20, 11, 4, 60480, 20, '1750358397_df8f67650769cbc512c2.png'),
(643123, 'Alimento Old Prince Perro Mediano', 18, 11, 4, 12600, 3, '1750358689_e96a8f80cd5cbd79c80a.webp'),
(856345, 'Alimento Royal Mini Para Perro Adulto', 5, 11, 4, 9293, 1, '1750358547_f7b2a5aa2681b1ee558d.webp'),
(938401, 'Alimento perro grande', 17, 11, 4, 42000, 7, '1750358305_bb10bdffba58db7b10ff.webp'),
(34597845, 'Alimento Eukanuba para Perro Senior Grande', 17, 11, 4, 68855, 15, '1750358464_0b8058e8470b6c2641ab.webp');

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
(11, 4, '2025-06-25', '10:00:00', 2, 13),
(12, 4, '2025-06-26', '09:00:00', 1, 2),
(13, 4, '2025-06-27', '11:00:00', 3, 14),
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
  `IMAGEN` varchar(128) DEFAULT NULL,
  `TELEFONO` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`USUARIO_ID`, `CBU`, `NOMBRE`, `APELLIDO`, `CORREO`, `CONTRASEÑA`, `DIRECCION`, `ES_MAYORISTA`, `IMAGEN`, `TELEFONO`) VALUES
(3, NULL, 'juanito', 'pere', 'juanitoperez@gmail.com', '$2y$10$YtGEpCedo6QF/gMtvt4xIuFvR.Hm2Ykemh.M5WkpDsdXnqLEkwZQS', NULL, 0, '', NULL),
(4, 134531, 'admin', 'petcare', 'adminpetcare@gmail.com', '$2y$10$D3aiZcMCMx8kQgVci/YukeWPwJSYA8dtJIj3CCb/4tM5DbikYQH3W', 'MIKASA', 1, '', NULL),
(5, NULL, 'Matias', 'Montiel', 'petcare@gmail.com', '$2y$10$OIBAt4Ooqxk9TQza5jdKaelrTuwaTPSR0vmYb7h4ZJbh.R0pArByW', NULL, 0, NULL, NULL),
(6, NULL, 'Matias', 'Montiel', 'mnmontiel213@gmail.com', '$2y$10$cCMV6ZPr0wKzxBYY7QKCOevDtXnEodo1.dC24YqKZumR/UzlXww.W', NULL, NULL, '1750290659_c8938caac5a66221c08f.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CATEGORIA_ID`),
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
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CATEGORIA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `CONSULTA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `MASCOTA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `USUARIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
