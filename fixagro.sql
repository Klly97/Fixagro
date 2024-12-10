-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2024 a las 18:38:11
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
-- Base de datos: `fixagro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `id` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `id_usuario_tec` int(11) NOT NULL,
  `tipo_maquina` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `descripcion_publicacion` text NOT NULL,
  `problema_solucionado` text NOT NULL,
  `descripcion_trabajo` text NOT NULL,
  `nombre_dueño` varchar(255) NOT NULL,
  `fecha_finalizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`id`, `id_publicacion`, `id_usuario_tec`, `tipo_maquina`, `modelo`, `marca`, `descripcion_publicacion`, `problema_solucionado`, `descripcion_trabajo`, `nombre_dueño`, `fecha_finalizacion`) VALUES
(1, 4, 1, 'hvjgvgj', 'gvutfu', 'yccfy', 'yctycfcfcfh', 'se arreglo el jaswer', 'por ahi le movi a la chingada', 'John', '2024-12-10 11:45:09'),
(8, 3, 1, 's', 'sds', 'fe', 's', 's', 'a', 'John', '2024-12-10 12:30:57'),
(9, 6, 1, 'celular', 'apple', 'fe', 'no carga', 'h nhhn', 'bgubgbgu', 'John', '2024-12-10 12:33:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `id_maquina` int(11) NOT NULL,
  `tipo_maquina` varchar(50) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `img` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`id_maquina`, `tipo_maquina`, `modelo`, `marca`, `img`, `id_usuario`, `fecha_creacion`, `estado`) VALUES
(7, 's', 'sds', 'fe', 'foto_1.png', 2, '2024-12-10', 'ACTIVO'),
(8, 'hvjgvgj', 'gvutfu', 'yccfy', 'foto_8.png', 2, '2024-12-10', 'ACTIVO'),
(9, 'celular', 'apple', 'fe', 'foto_9.png', 2, '2024-12-10', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(50) NOT NULL,
  `id_trabajo` int(50) NOT NULL,
  `id_tecnico` int(50) NOT NULL,
  `id_maquina` int(50) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'Pendiente',
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `id_trabajo`, `id_tecnico`, `id_maquina`, `mensaje`, `estado`, `fecha_creacion`) VALUES
(7, 10, 1, 7, 'El técnico ha solicitado trabajar en tu máquina. ¿Aceptarás su oferta?', 'aceptada', '2024-12-10 10:23:37'),
(8, 11, 1, 8, 'El técnico ha solicitado trabajar en tu máquina. ¿Aceptarás su oferta?', 'aceptada', '2024-12-10 10:40:32'),
(9, 12, 1, 7, 'El técnico ha solicitado trabajar en tu máquina. ¿Aceptarás su oferta?', 'aceptada', '2024-12-10 12:02:11'),
(10, 13, 1, 7, 'El técnico ha solicitado trabajar en tu máquina. ¿Aceptarás su oferta?', 'aceptada', '2024-12-10 12:23:04'),
(11, 14, 1, 9, 'El técnico ha solicitado trabajar en tu máquina. ¿Aceptarás su oferta?', 'aceptada', '2024-12-10 12:32:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `municipio` varchar(45) NOT NULL,
  `departamento` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `tipo_persona` enum('CLIENTE','TECNICO') NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellido`, `direccion`, `municipio`, `departamento`, `telefono`, `email`, `contrasena`, `estado`, `fecha_registro`, `tipo_persona`, `avatar`) VALUES
(1, 'noah', 'villada', 'manzana 22 casa 40', 'saldaña', 'Tolima', 2147483647, 'noah@gmail.com', '54b1504207c9de5f7b2fd9c67d540e86', 'ACTIVO', '2024-12-10', 'TECNICO', 'xaSASasasas'),
(2, 'John', 'Carrillo', 'MANZANA 40 CASA 22 BARRIO 2005 LOT', 'Saldaña', 'Tolima', 2147483647, 'cesarcarrig8@gmail.com', '6e0b7076126a29d5dfcbd54835387b7b', 'ACTIVO', '2024-12-10', 'CLIENTE', 'xaSASasasas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_publicacion` int(11) NOT NULL,
  `id_maquina` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `estado` enum('ACTIVO','EN PROCESO','FINALIZADO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id_publicacion`, `id_maquina`, `id_usuario`, `descripcion`, `fecha_creacion`, `fecha_modificacion`, `estado`) VALUES
(3, 7, 2, 's', '2024-12-10 10:23:32', '0000-00-00 00:00:00', 'ACTIVO'),
(4, 8, 2, 'yctycfcfcfh', '2024-12-10 10:40:11', '0000-00-00 00:00:00', 'ACTIVO'),
(5, 7, 2, 's', '2024-12-10 12:22:52', '0000-00-00 00:00:00', 'ACTIVO'),
(6, 9, 2, 'no carga', '2024-12-10 12:32:25', '0000-00-00 00:00:00', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `id_tecnico` int(11) NOT NULL,
  `experiencia_lab` varchar(300) NOT NULL,
  `profesion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id_trabajo` int(50) NOT NULL,
  `id_tecnico` int(50) NOT NULL,
  `id_maquina` int(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha_creacion` datetime(6) NOT NULL,
  `fecha_finalizacion` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id_trabajo`, `id_tecnico`, `id_maquina`, `estado`, `fecha_creacion`, `fecha_finalizacion`) VALUES
(10, 1, 7, 'completado', '2024-12-10 10:23:37.000000', '0000-00-00 00:00:00.000000'),
(11, 1, 8, 'completado', '2024-12-10 10:40:32.000000', '0000-00-00 00:00:00.000000'),
(12, 1, 7, 'completado', '2024-12-10 12:02:11.000000', '0000-00-00 00:00:00.000000'),
(13, 1, 7, 'completado', '2024-12-10 12:23:04.000000', '0000-00-00 00:00:00.000000'),
(14, 1, 9, 'completado', '2024-12-10 12:32:40.000000', '0000-00-00 00:00:00.000000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informes_ibfk_1` (`id_publicacion`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id_maquina`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trabajo` (`id_trabajo`,`id_tecnico`,`id_maquina`),
  ADD KEY `id_tecnico` (`id_tecnico`),
  ADD KEY `id_maquina` (`id_maquina`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_maquina` (`id_maquina`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD KEY `id_tecnico` (`id_tecnico`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id_trabajo`),
  ADD KEY `id_tecnico` (`id_tecnico`),
  ADD KEY `id_maquina` (`id_maquina`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id_maquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id_trabajo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `informes`
--
ALTER TABLE `informes`
  ADD CONSTRAINT `informes_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id_publicacion`) ON DELETE CASCADE;

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`id_trabajo`) REFERENCES `trabajos` (`id_trabajo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`id_tecnico`) REFERENCES `persona` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `notificaciones_ibfk_3` FOREIGN KEY (`id_maquina`) REFERENCES `maquinas` (`id_maquina`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`id_maquina`) REFERENCES `maquinas` (`id_maquina`);

--
-- Filtros para la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD CONSTRAINT `tecnico_ibfk_1` FOREIGN KEY (`id_tecnico`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `trabajos_ibfk_1` FOREIGN KEY (`id_tecnico`) REFERENCES `persona` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajos_ibfk_2` FOREIGN KEY (`id_maquina`) REFERENCES `maquinas` (`id_maquina`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
