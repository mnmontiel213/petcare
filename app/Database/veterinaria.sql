-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-06-2025 a las 16:10:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CATEGORIA_ID` int(11) NOT NULL,
  `VALOR` varchar(32) NOT NULL,
  `TIPO` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
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
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `CONSULTA_ID` int(11) NOT NULL,
  `TITULO` varchar(128) NOT NULL,
  `CORREO` text NOT NULL,
  `CONTENIDO` text NOT NULL,
  `USUARIO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`CONSULTA_ID`, `TITULO`, `CORREO`, `CONTENIDO`, `USUARIO_ID`) VALUES
(1, 'precios', 'martinez@gmail.com', 'Hola queria consultar por el precio de una radiografia. Gracias.', 0),
(5, 'Estos es un titulo', 'titulo@gmail.com', 'eee titulo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `MASCOTA_ID` int(11) NOT NULL,
  `NOMBRE` varchar(128) NOT NULL,
  `TIPO_MASCOTA` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `CODIGO` int(11) NOT NULL,
  `NOMBRE` varchar(256) NOT NULL,
  `PRECIO` float NOT NULL,
  `PESO` float DEFAULT NULL,
  `IMAGEN` varchar(128) NOT NULL,
  `CATEGORIA_MARCA` int(11) NOT NULL,
  `CATEGORIA_PRODUCTO` int(11) NOT NULL,
  `CATEGORIA_MASCOTA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`CODIGO`, `NOMBRE`, `PRECIO`, `PESO`, `IMAGEN`, `CATEGORIA_MARCA`, `CATEGORIA_PRODUCTO`, `CATEGORIA_MASCOTA`) VALUES
(98123, 'Comida perro', 11000, 1, '1750168148_a9e6ac0e97040af21836.jpg', 5, 11, 4),
(912831, 'Comida gato', 12000, 1, '1750167876_62d5886151043c9fa1e7.jpg', 5, 11, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `SERVICIO_ID` int(11) NOT NULL,
  `NOMBRE` varchar(32) NOT NULL,
  `CATEGORIA_SERVICIO` int(11) NOT NULL,
  `DESCRIPCION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `TURNO_ID` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `HORARIO` time NOT NULL,
  `CATEGORIA_TURNO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
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
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`USUARIO_ID`, `CBU`, `NOMBRE`, `APELLIDO`, `CORREO`, `CONTRASEÑA`, `DIRECCION`, `ES_MAYORISTA`, `IMAGEN`) VALUES
(3, 92834, 'juanito', 'pere', 'juanitoperez@gmail.com', '$2y$10$YtGEpCedo6QF/gMtvt4xIuFvR.Hm2Ykemh.M5WkpDsdXnqLEkwZQS', 'Poralla', 0, ''),
(4, 982034, 'admin', 'petcare', 'adminpetcare@gmail.com', '$2y$10$D3aiZcMCMx8kQgVci/YukeWPwJSYA8dtJIj3CCb/4tM5DbikYQH3W', 'Micasa', 1, ''),
(5, 293742, 'Julio', 'Jules', 'julio@gmail.com', '$2y$10$Bd0QFuHBqqpa4OkrSnmjq.vvfJ0ys2OwXdokMHFdUXT9ZzSVR26di', 'AAAAAAA', 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD KEY `REGISTRO_ID` (`CATEGORIA_ID`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`CONSULTA_ID`),
  ADD KEY `USUARIO_ID` (`USUARIO_ID`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`MASCOTA_ID`),
  ADD KEY `ID_DUEÑO` (`USUARIO_ID`),
  ADD KEY `TIPO_MASCOTA` (`TIPO_MASCOTA`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`SERVICIO_ID`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`TURNO_ID`),
  ADD KEY `USUARIO_ID` (`USUARIO_ID`),
  ADD KEY `categoria_turno_id` (`CATEGORIA_TURNO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USUARIO_ID`),
  ADD UNIQUE KEY `CORREO` (`CORREO`),
  ADD UNIQUE KEY `CBU` (`CBU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `CONSULTA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `SERVICIO_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `TURNO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USUARIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascota_categoria_id` FOREIGN KEY (`TIPO_MASCOTA`) REFERENCES `categoria` (`CATEGORIA_ID`),
  ADD CONSTRAINT `mascota_dueño_id` FOREIGN KEY (`USUARIO_ID`) REFERENCES `usuarios` (`USUARIO_ID`);

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `categoria_turno_id` FOREIGN KEY (`CATEGORIA_TURNO`) REFERENCES `categoria` (`CATEGORIA_ID`),
  ADD CONSTRAINT `usuario_turno_id` FOREIGN KEY (`USUARIO_ID`) REFERENCES `usuarios` (`USUARIO_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
