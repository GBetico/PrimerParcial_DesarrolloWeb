-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2020 a las 21:30:01
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial_i`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrolechon`
--

CREATE TABLE `registrolechon` (
  `idlechon` int(11) NOT NULL,
  `preciocompra` float NOT NULL,
  `peso` float NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  `edadmeses` float NOT NULL,
  `estado` char(1) NOT NULL,
  `fechacompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registrolechon`
--

INSERT INTO `registrolechon` (`idlechon`, `preciocompra`, `peso`, `descripcion`, `edadmeses`, `estado`, `fechacompra`) VALUES
(6, 150, 3, 'cochis', 6, 'I', '2020-08-14'),
(7, 500, 25, 'cerditoo', 5, 'I', '2020-08-15'),
(8, 900, 25, 'Vaquita', 4, 'I', '2020-08-15'),
(9, 25, 900, 'cochinito', 6, 'A', '2020-08-15'),
(10, 8, 100, 'pequeño', 1, 'I', '2020-08-15'),
(11, 36, 25, 'puerquito', 6, 'A', '2020-08-15'),
(12, 36, 900, 'puerquito', 6, 'A', '2020-08-15'),
(13, 600, 3, 'peque', 6, 'I', '2020-08-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registropeso`
--

CREATE TABLE `registropeso` (
  `idregistro` int(11) NOT NULL,
  `codigolechon` int(11) NOT NULL,
  `peso` float NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registropeso`
--

INSERT INTO `registropeso` (`idregistro`, `codigolechon`, `peso`, `fecha`) VALUES
(4, 12, 300, '2020-08-16'),
(7, 9, 800, '2020-08-16'),
(8, 9, 900, '2020-08-16'),
(9, 12, 900, '2020-08-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombreusuario` varchar(10) DEFAULT NULL,
  `contrasena` varchar(8) DEFAULT NULL,
  `rolusuario` varchar(15) DEFAULT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombreusuario`, `contrasena`, `rolusuario`, `estado`) VALUES
(23, 'Betico', '123456', 'Administrador', 'A'),
(24, 'pepe', '123', 'Operario', 'A'),
(25, 'juan', '1234', 'Administrador', 'A'),
(26, 'juanito', '123', 'Operario', 'A'),
(27, 'fabricio', '321', 'Operario', 'I'),
(28, 'Yessica', '321', 'Administrador', 'A'),
(29, 'Lety', '123', 'Administrador', 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioss`
--

CREATE TABLE `usuarioss` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `privilegio` int(2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarioss`
--

INSERT INTO `usuarioss` (`id`, `nombre`, `usuario`, `email`, `password`, `privilegio`, `fecha_registro`) VALUES
(1, 'Betico', '', '', '123456', 1, '2020-08-16 00:27:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventa` int(11) NOT NULL,
  `codigoanimal` int(11) NOT NULL,
  `precioenlibras` float NOT NULL,
  `precioventa` float NOT NULL,
  `edadmeses` float NOT NULL,
  `fechaventa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventa`, `codigoanimal`, `precioenlibras`, `precioventa`, `edadmeses`, `fechaventa`) VALUES
(10, 6, 2, 150, 5, '2020-08-15 12:06:55'),
(11, 6, 2, 150, 22, '2020-08-15 12:08:38'),
(12, 7, 6, 500, 3, '2020-08-15 12:18:53'),
(13, 10, 600, 200, 6, '2020-08-15 12:21:51'),
(14, 13, 3, 6, 3, '2020-08-16 09:21:19'),
(16, 6, 10, 21, 3, '2020-08-16 09:23:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registrolechon`
--
ALTER TABLE `registrolechon`
  ADD PRIMARY KEY (`idlechon`);

--
-- Indices de la tabla `registropeso`
--
ALTER TABLE `registropeso`
  ADD PRIMARY KEY (`idregistro`),
  ADD KEY `codigolechon` (`codigolechon`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `usuarioss`
--
ALTER TABLE `usuarioss`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `codigoanimal` (`codigoanimal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registrolechon`
--
ALTER TABLE `registrolechon`
  MODIFY `idlechon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `registropeso`
--
ALTER TABLE `registropeso`
  MODIFY `idregistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `usuarioss`
--
ALTER TABLE `usuarioss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registropeso`
--
ALTER TABLE `registropeso`
  ADD CONSTRAINT `registropeso_ibfk_1` FOREIGN KEY (`codigolechon`) REFERENCES `registrolechon` (`idlechon`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`codigoanimal`) REFERENCES `registrolechon` (`idlechon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
