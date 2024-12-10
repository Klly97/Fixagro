-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2024 a las 13:58:42
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
-- Estructura de tabla para la tabla `informe_tec`
--

CREATE TABLE `informe_tec` (
  `id_publicacion` int(11) NOT NULL,
  `id_usuario_tec` int(11) NOT NULL,
  `problema_tecnico` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha_Aceptacion` date NOT NULL,
  `fechas_finalizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'fifi', 'ya fifi', 'abajo', 'foto_2.jpg', 2, '2024-12-10', 'ACTIVO'),
(3, 'celular', 'one touch', 'alcatel', 'foto_3.png', 2, '2024-12-10', 'ACTIVO');

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
(1, 2, 2, 'no come :(', '2024-12-10 05:39:04', '0000-00-00 00:00:00', 'ACTIVO'),
(2, 3, 2, 'c daño', '2024-12-10 05:54:28', '0000-00-00 00:00:00', 'ACTIVO');

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
(1, 1, 2, 'pendiente', '2024-12-10 06:49:48.000000', '0000-00-00 00:00:00.000000'),
(2, 1, 3, 'pendiente', '2024-12-10 07:15:59.000000', '0000-00-00 00:00:00.000000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `informe_tec`
--
ALTER TABLE `informe_tec`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `id_usuario_tec` (`id_usuario_tec`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id_maquina`),
  ADD KEY `id_usuario` (`id_usuario`);

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
-- AUTO_INCREMENT de la tabla `informe_tec`
--
ALTER TABLE `informe_tec`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id_maquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id_trabajo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `informe_tec`
--
ALTER TABLE `informe_tec`
  ADD CONSTRAINT `informe_tec_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id_publicacion`),
  ADD CONSTRAINT `informe_tec_ibfk_2` FOREIGN KEY (`id_usuario_tec`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `persona` (`id`);

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
