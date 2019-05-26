-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2019 a las 00:10:04
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `visitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `telefono`, `email`, `visitas`) VALUES
(3, 'Alfredo Cardenas', '8342325999', '1630065@upv.edu.mx', 1),
(9, 'Halfonso Castro', '8342325999', '1729943@upv.edu.mx', 6),
(10, 'Gustavo Adolfo Cardenas', '5252356432', '1245312@upv.edu.mx', 1),
(11, 'Francisco Javier MartÃ­nez', '7567865678', '6468467@upv.edu.mx', 1),
(12, 'Paula Castro Barrones', '8345678123', '2545412@upv.edu.mx', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(10) NOT NULL,
  `tipo` varchar(12) NOT NULL,
  `precio` float(7,2) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `estado` varchar(12) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `tipo`, `precio`, `numero`, `descripcion`, `estado`, `img`) VALUES
(1, 'Simple', 200.00, 'A101', 'Habitacion de una recamara, cuenta con baÃ±o completo y esta climatizada.', 'Ocupado', 'assets/images/habitaciones/simple_01.jpg'),
(3, 'Doble', 556.00, 'A105', 'Habitacion de una recamar con dos camas individuales, cuenta con baÃ±o completo y climatizaciÃ³n. ', 'Disponible', 'assets/images/habitaciones/doble_02.jpg'),
(4, 'Matrimonial', 800.00, 'A102', 'Habitacion con cama matrimonial, cuneta con un baÃ±o completo y esta climatizada.', 'Ocupado', 'assets/images/habitaciones/matrimonial_01.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `id` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `id_habitacion` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `dias` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id`, `id_cliente`, `id_habitacion`, `fecha`, `dias`) VALUES
(14, 3, 1, '2019-05-14', 3),
(15, 10, 4, '2019-05-26', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nick` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `cargo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `password`, `Nombre`, `cargo`) VALUES
(1, 'admin', 'admin', 'Halfonso Cardenas', 'Gerente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
