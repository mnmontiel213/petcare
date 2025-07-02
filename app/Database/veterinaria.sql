-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2025 at 04:26 PM
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
(20, 'VITAL CAN', 'MARCA'),
(21, 'PATWISE', 'MARCA'),
(22, 'CANCAT', 'MARCA'),
(23, 'KIKA', 'MARCA'),
(24, 'HUELLA', 'MARCA');

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
(2, 'asfasdfs', 'matias@gmail.com', 'a', 0),
(3, '', '', '', 0),
(4, '', '', '', 0),
(5, '', '', '', 0),
(6, '', '', '', 0),
(7, '', '', '', 0),
(8, 'titulo', 'matias@gmail.com', 'contenido de la consulta', 0),
(9, 'titulo', 'matias@gmail.com', 'contenido de la consulta', 0),
(10, 'titulo', 'matias@gmail.com', 'contenido de la consulta', 0),
(11, 'titulotitular', 'correo@gmail.com', 'contenido', 0);

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
(1, 'Peludo', 3, 1, NULL),
(2, 'Fitto', 4, 2, NULL),
(3, 'Geronimo', 3, 2, NULL),
(4, 'Cleopatra', 3, 2, NULL),
(5, 'Firulais', 4, 1, NULL),
(6, 'Axel', 3, 1, NULL),
(7, 'Fifufo', 3, 1, NULL),
(8, 'DON GATO', 3, 4, NULL),
(9, 'charmander', 4, 2, NULL);

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
  `IMAGEN` varchar(128) NOT NULL,
  `STOCK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`CODIGO`, `NOMBRE`, `CATEGORIA_MARCA`, `CATEGORIA_PRODUCTO`, `CATEGORIA_MASCOTA`, `PRECIO`, `PESO`, `IMAGEN`, `STOCK`) VALUES
(1287, 'Pelota con Sonido', 21, 12, 4, 6201, 555.1, '1750364559_de8fec2d130e34ff549d.webp', 7),
(3755, 'Polera Corderito Verde', 23, 12, 4, 13000, 0, '1750364508_daaca2b72488c19c754d.webp', 45),
(12484, 'Alimento Royal Control Urinario', 5, 11, 3, 31995, 1, '1750364764_5f4d45a5872948e96186.webp', 50),
(34154, 'Rascador Con Patas', 21, 12, 3, 17900, 0, '1750365456_f313c498898d0da20420.webp', 50),
(42127, 'Alimento Purina Esterelizado Pollo', 6, 11, 3, 11200, 1, '1750364795_4a5c11e528e906181297.webp', 43),
(45267, 'Juguete Pelota Arcoiris', 21, 12, 3, 950, 0, '1750365592_7e97abb1d55a5f687789.webp', 48),
(45498, 'Rollo Bolsita', 22, 12, 4, 3200, 0, '1750364465_cb1ac0ff8f3db952de88.webp', 50),
(45521, 'Juguete Pelota Ovilla de Lana', 21, 12, 3, 6600, 0, '1750365619_81dc66a0ed7a9a0e9ef9.webp', 50),
(48742, 'Alimento Old Prince Complete ', 18, 11, 3, 2000, 3, '1750364866_3720ca41d1002a31cebe.png', 50),
(53211, 'Alimento Purina Excellent Pollo y Arroz', 6, 11, 3, 264000, 3, '1750364725_2e6828ac5884a049f497.webp', 50),
(53280, 'Alimento Old Prince Gato Adulto', 18, 11, 3, 54800, 7, '1750365067_c3edd6bf74fb8b7b3a7a.png', 50),
(53774, 'Alimento Purina ProPlan Pollor y Arroz', 6, 11, 3, 16000, 1, '1750364944_86ab45abf66c5c9d2152.png', 50),
(53775, 'Alimento Purina Excellent Gato Bebé', 6, 11, 3, 10700, 1, '1750365100_09bbc41813edc1b64a8f.webp', 0),
(62346, 'Alimento Old Prince Para Perro Adulto Mediano', 18, 11, 4, 15390, 3, '1750358590_70e2552f6b394bddd079.webp', 49),
(63497, 'Performance Alimento Perro Adulto', 19, 11, 4, 84265, 20, '1750358763_ae239c199f921affd391.webp', 50),
(64234, 'Alimento Old Prince Novel Esterelizado', 18, 11, 3, 69400, 7, '1750365139_301718b50be692d1a30f.webp', 50),
(64313, 'Juguete Torre De Pelotas', 21, 12, 3, 18900, 0, '1750365428_10a9f0e9606e829adfd7.png', 50),
(64423, 'Pelota erizo', 22, 12, 4, 5390, 0, '1750364421_0c120bc9e96af85c775f.png', 50),
(64426, 'Alimento Royal Para Perro Mini Adulto', 5, 11, 4, 31010, 3, '1750358636_7a5ad72118262e091c6c.webp', 50),
(69420, 'Alimento Performance Gato Adulto', 19, 11, 3, 55600, 7, '1750365175_3707d0bcf3c76c64fb20.webp', 50),
(73486, 'Alimento Royal Maxi Para Perro Adulto ', 5, 11, 4, 28515, 3, '1750358809_f5207eda3627670310aa.webp', 50),
(75348, 'Alimento Purina Para Perro Adulto', 6, 11, 4, 60000, 20, '1750358845_40fe48ca36cbdaed6775.png', 50),
(86334, 'Polera Corderito Blanco', 22, 12, 4, 12000, 0, '1750364536_f81e88e41a9e75ff456d.webp', 50),
(87312, 'Juguete Hueso Chifle', 22, 12, 4, 2780, 0, '1750364319_5f1223185536afa10f9b.png', 50),
(87352, 'Juguete Cañita Con Pluma', 24, 12, 3, 4830, 0, '1750365541_a52f1d0791db3fd0106a.webp', 50),
(90214, 'Juguete hueso', 21, 12, 4, 7680, 0, '1750364400_de4079bb2f24cac03f8b.webp', 0),
(91021, 'Transportador', 22, 12, 4, 490000, 0, '1750364281_0a44fb0a057b867017ae.webp', 0),
(95671, 'Rascador Cuadrado', 22, 12, 3, 189000, 0, '1750365397_151c45f398d541d48d91.webp', 0),
(98013, 'Cama ', 24, 12, 3, 90550, 0, '1750365315_ca834ba537d0aa2a6e96.webp', 0),
(98124, 'Juguete Hueso Duro ', 21, 12, 4, 7500, 0, '1750364244_9d4d5eaacd0c4bc24225.webp', 0),
(123098, 'Pelota de Plastico', 21, 12, 3, 2700, 0, '1750365569_13e3ce719c219f80a355.webp', 0),
(442435, 'Soga Antiestres', 22, 12, 4, 5820, 0, '1750364363_1f4303ded23b8a49592d.png', 0),
(452375, 'Alimento perro adulto', 20, 11, 4, 60480, 20, '1750358397_df8f67650769cbc512c2.png', 0),
(532712, 'Juguete Cañita ', 22, 12, 3, 7000, 0, '1750365368_a41d5575276bd9787463.webp', 0),
(535362, 'Alimento Royal Control de Peso', 5, 11, 3, 27980, 1, '1750364834_5bdb29b0c842001a5e84.webp', 0),
(563452, 'Prod1.png', 5, 11, 4, 5, 900, '1751135833_13532ffd8a7a5f7f2c10.png', 900),
(643123, 'Alimento Old Prince Perro Mediano', 18, 11, 4, 12600, 3, '1750358689_e96a8f80cd5cbd79c80a.webp', 0),
(856345, 'Alimento Royal Mini Para Perro Adulto', 5, 11, 4, 9293, 1, '1750358547_f7b2a5aa2681b1ee558d.webp', 0),
(938401, 'Alimento perro grande', 17, 11, 4, 42000, 7, '1750358305_bb10bdffba58db7b10ff.webp', 0),
(34597845, 'Alimento Eukanuba para Perro Senior Grande', 17, 11, 4, 68855, 15, '1750358464_0b8058e8470b6c2641ab.webp', 0);

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
(1, 1, '2025-06-26', '10:00:00', 5, 1),
(2, 2, '2025-06-30', '10:00:00', 5, 4),
(3, 2, '2025-07-17', '11:00:00', 6, 2),
(4, 2, '2025-06-23', '09:00:00', 3, 3),
(8, 2, '2025-07-23', '11:00:00', 1, 9);

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
  `TELEFONO` varchar(32) DEFAULT NULL,
  `HISTORIAL_COMPRA` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`USUARIO_ID`, `CBU`, `NOMBRE`, `APELLIDO`, `CORREO`, `CONTRASEÑA`, `DIRECCION`, `ES_MAYORISTA`, `IMAGEN`, `TELEFONO`, `HISTORIAL_COMPRA`) VALUES
(1, NULL, 'Administrador', 'Petcare', 'petcare@gmail.com', '$2y$10$knUYf63gsHyHKrqUil.zY.2DXSGmnkZ32AI4bTRTBgx8QhsvztJTm', NULL, NULL, '1750386854_f74782e9cf3ee535afa8.png', NULL, ''),
(2, 34345, 'Nahuel', 'Gonzalez', 'nahuelgz@gmail.com', '$2y$10$SQdNUx7WzotKgp9EKF37zeyGle2YjNNu3OhY4wANBvKUUJc4q42/6', 'las cuebas', NULL, '1750387287_516fb8ffb9a435eac8c0.jpg', NULL, '1287-1-30/06/2025;');

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
  MODIFY `CATEGORIA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `CONSULTA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `MASCOTA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `SERVICIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `TURNO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USUARIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
