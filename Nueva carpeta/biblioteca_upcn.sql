-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2024 a las 16:43:36
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
-- Base de datos: `biblioteca_upcn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `AutorID` int(11) NOT NULL,
  `NombreAutor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoresrevistas`
--

CREATE TABLE `autoresrevistas` (
  `AutorRevistaID` int(11) NOT NULL,
  `NombreAutorRevista` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `CategoriaID` int(11) NOT NULL,
  `NombreCategoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `devolucionID` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `DNI` decimal(10,0) NOT NULL,
  `telefono` decimal(10,0) NOT NULL,
  `Nombre_del_libro` varchar(100) NOT NULL,
  `fecha_devolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`devolucionID`, `nombre`, `apellido`, `DNI`, `telefono`, `Nombre_del_libro`, `fecha_devolucion`) VALUES
(1, 'Martin', 'Sezella', 39721640, 3704650413, 'Base de Datos', '2023-11-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `EditorialID` int(11) NOT NULL,
  `NombreEditorial` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `id_invitados` int(32) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `dni` decimal(32,0) NOT NULL,
  `correo_electronico` varchar(32) NOT NULL,
  `telefono` decimal(32,0) NOT NULL,
  `usuario` varchar(23) NOT NULL,
  `contrasena` varchar(34) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`id_invitados`, `nombre`, `apellido`, `dni`, `correo_electronico`, `telefono`, `usuario`, `contrasena`, `fecha_nacimiento`) VALUES
(0, '21312', '123213', 123123, 'asda@gas', 123, '123', '123', '2024-05-07'),
(1, 'andres', 'Sezella', 123123123, 'haas@hotmail.com', 123123, 'omar', '123', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `LibroID` int(11) NOT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `AutorID` int(11) DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL,
  `ISBN` varchar(13) DEFAULT NULL,
  `NumeroInventarioID` int(11) DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `CategoriaID` int(11) DEFAULT NULL,
  `EditorialID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numeroinventario`
--

CREATE TABLE `numeroinventario` (
  `InventarioID` int(11) NOT NULL,
  `Numero` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `prestamosID` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` decimal(10,0) DEFAULT NULL,
  `DNI` decimal(10,0) DEFAULT NULL,
  `titulo_de_libro` varchar(50) DEFAULT NULL,
  `fecha_prestamo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`prestamosID`, `nombre`, `apellido`, `telefono`, `DNI`, `titulo_de_libro`, `fecha_prestamo`) VALUES
(1, 'omar', 'mosqueda', 3704650413, 39721640, 'Martin Fierro', '2023-11-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revistas`
--

CREATE TABLE `revistas` (
  `RevistaID` int(11) NOT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL,
  `NumeroInventarioID` int(11) DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `ISBN` varchar(13) DEFAULT NULL,
  `AutorRevistaID` int(11) DEFAULT NULL,
  `CategoriaID` int(11) DEFAULT NULL,
  `EditorialID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UserID` int(11) NOT NULL,
  `nombre_de_usuario` varchar(20) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UserID`, `nombre_de_usuario`, `contrasena`) VALUES
(1, 'Omar', '123'),
(1, 'Omar', '123'),
(3, 'admin', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`AutorID`);

--
-- Indices de la tabla `autoresrevistas`
--
ALTER TABLE `autoresrevistas`
  ADD PRIMARY KEY (`AutorRevistaID`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CategoriaID`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`devolucionID`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`EditorialID`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`id_invitados`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`LibroID`),
  ADD KEY `AutorID` (`AutorID`),
  ADD KEY `NumeroInventarioID` (`NumeroInventarioID`),
  ADD KEY `CategoriaID` (`CategoriaID`),
  ADD KEY `EditorialID` (`EditorialID`);

--
-- Indices de la tabla `numeroinventario`
--
ALTER TABLE `numeroinventario`
  ADD PRIMARY KEY (`InventarioID`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`prestamosID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `prestamosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
