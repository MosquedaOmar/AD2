-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2024 a las 18:41:32
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
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `usuario`, `password`) VALUES
(1, 'omar', '$2y$10$j0R1TU6GRreLV9puP0t0X.WmYt9yCoa7noiyW/..Np92MuX3Xsjrq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliados`
--

CREATE TABLE `afiliados` (
  `id_afiliado` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `Estado_Afiliacion` enum('Activo','Inactivo') DEFAULT 'Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `afiliados`
--

INSERT INTO `afiliados` (`id_afiliado`, `id`, `Estado_Afiliacion`) VALUES
(1, 8, 'Inactivo'),
(2, 1, 'Activo'),
(3, 9, 'Inactivo'),
(4, 10, 'Inactivo'),
(5, 12, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`) VALUES
(1, 'kendall & kendall'),
(2, 'Ken Thompson'),
(3, 'Dennis Ritchie'),
(4, 'Brian Kernighan'),
(5, 'Bjarne Stroustrup'),
(6, 'James Gosling'),
(7, 'Linus Torvalds'),
(8, 'Donald Knuth'),
(9, 'Martin Fowler'),
(10, 'Erich Gamma'),
(11, 'Richard Helm'),
(12, 'Ralph Johnson'),
(13, 'John Vlissides'),
(14, 'Grady Booch'),
(15, 'Robert C. Martin'),
(16, 'Kent Beck'),
(17, 'Ward Cunningham'),
(18, 'Martin Fowler'),
(19, 'Uncle Bob'),
(20, 'Herbert Schildt'),
(21, 'Kathy Sierra'),
(22, 'Bert Bates'),
(23, 'Joshua Bloch'),
(24, 'Bruce Eckel'),
(25, 'Scott Meyers'),
(26, 'Steve McConnell'),
(27, 'Andrew S. Tanenbaum'),
(28, 'David Flanagan'),
(29, 'Yukihiro Matsumoto'),
(30, 'Larry Wall'),
(31, 'Brendan Eich');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id_devolucion` int(11) NOT NULL,
  `id_prestamo` int(11) NOT NULL,
  `fecha_devolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `codigo_postal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id_editorial` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre`) VALUES
(1, 'Addison-Wesley'),
(2, 'O\'Reilly Media'),
(3, 'Pearson'),
(4, 'Prentice Hall'),
(5, 'McGraw-Hill'),
(6, 'Springer'),
(7, 'Wiley'),
(8, 'Packt Publishing'),
(9, 'Apress'),
(10, 'Manning Publications'),
(11, 'MIT Press'),
(12, 'Cambridge University Press'),
(13, 'Oxford University Press'),
(14, 'CRC Press'),
(15, 'Elsevier'),
(16, 'Cengage Learning'),
(17, 'Focal Press'),
(18, 'Morgan Kaufmann'),
(19, 'Taylor & Francis'),
(20, 'IGI Global'),
(21, 'Johns Hopkins University Press'),
(22, 'Harvard University Press'),
(23, 'Stanford University Press'),
(24, 'University of Chicago Press'),
(25, 'Yale University Press'),
(26, 'University of California Press'),
(27, 'University of Texas Press'),
(28, 'MIT Technology Review'),
(29, 'IEEE Press'),
(30, 'University of Washington Press'),
(31, 'Rutgers University Press');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`) VALUES
(1, 'informatica'),
(2, 'Programación'),
(3, 'Algoritmos'),
(4, 'Bases de Datos'),
(5, 'Redes'),
(6, 'Sistemas Operativos'),
(7, 'Inteligencia Artificial'),
(8, 'Desarrollo Web'),
(9, 'Seguridad Informática'),
(10, 'Ciencia de Datos'),
(11, 'Ingeniería de Software'),
(12, 'Métodos Formales'),
(13, 'Teoría de la Computación'),
(14, 'Robótica'),
(15, 'Criptografía'),
(16, 'Análisis de Datos'),
(17, 'Big Data'),
(18, 'Machine Learning'),
(19, 'Cloud Computing'),
(20, 'Ciberseguridad'),
(21, 'Blockchain'),
(22, 'Bioinformática'),
(23, 'Computación Cuántica'),
(24, 'Realidad Aumentada'),
(25, 'Realidad Virtual'),
(26, 'IoT (Internet of Things)'),
(27, 'DevOps'),
(28, 'Computación Gráfica'),
(29, 'Lenguajes de Programación'),
(30, 'Compiladores'),
(31, 'Desarrollo Móvil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `id_libro`, `cantidad`) VALUES
(1, 1, 10),
(2, 2, 8),
(3, 3, 7),
(4, 4, 9),
(5, 5, 6),
(6, 6, 12),
(7, 7, 10),
(8, 8, 11),
(9, 9, 5),
(10, 10, 10),
(11, 11, 4),
(12, 12, 9),
(13, 13, 3),
(14, 14, 8),
(15, 15, 6),
(16, 16, 7),
(17, 17, 8),
(18, 18, 6),
(19, 19, 11),
(20, 20, 9),
(21, 21, 4),
(22, 22, 5),
(23, 23, 3),
(24, 24, 6),
(25, 25, 10),
(26, 26, 9),
(27, 27, 7),
(28, 28, 6),
(29, 29, 5),
(30, 30, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `cantidad` decimal(10,0) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `id_genero` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_editorial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `cantidad`, `id_tipo`, `isbn`, `id_genero`, `id_autor`, `id_editorial`) VALUES
(1, 'The C Programming Language', 10, 1, '978-0131103627', 2, 3, 4),
(2, 'Introduction to Algorithms', 8, 1, '978-0262033848', 3, 8, 6),
(3, 'Database System Concepts', 7, 1, '978-0073523323', 4, 10, 5),
(4, 'Computer Networks', 9, 1, '978-0132126953', 5, 27, 1),
(5, 'Operating System Concepts', 6, 1, '978-1118063330', 6, 28, 7),
(6, 'Artificial Intelligence: A Modern Approach', 12, 1, '978-0136042594', 7, 14, 1),
(7, 'HTML and CSS: Design and Build Websites', 10, 1, '978-1118008188', 8, 31, 8),
(8, 'Hacking: The Art of Exploitation', 11, 1, '978-1593271442', 9, 7, 9),
(9, 'Data Science for Business', 5, 1, '978-1449361327', 10, 19, 2),
(10, 'Clean Code: A Handbook of Agile Software Craftsmanship', 10, 1, '978-0132350884', 11, 15, 1),
(11, 'Formal Methods: An Appetizer', 4, 1, '978-1848003227', 12, 16, 11),
(12, 'Introduction to the Theory of Computation', 9, 1, '978-1133187790', 13, 17, 4),
(13, 'Introduction to Robotics: Mechanics and Control', 3, 1, '978-0201543612', 14, 18, 5),
(14, 'Applied Cryptography: Protocols, Algorithms, and Source Code in C', 8, 1, '978-1119096726', 15, 20, 7),
(15, 'Data Analysis with Open Source Tools', 6, 1, '978-1449307172', 16, 22, 2),
(16, 'Big Data: Principles and best practices of scalable real-time data systems', 7, 1, '978-1617290343', 17, 23, 10),
(17, 'Pattern Recognition and Machine Learning', 8, 1, '978-0387310732', 18, 24, 6),
(18, 'Architecting the Cloud: Design Decisions for Cloud Computing Service Models', 6, 1, '978-1118617618', 19, 25, 3),
(19, 'The Web Application Hacker\'s Handbook', 11, 1, '978-1118026472', 20, 26, 8),
(20, 'Mastering Blockchain: Unlocking the Power of Cryptocurrencies and Smart Contracts', 9, 1, '978-1788839044', 21, 29, 7),
(21, 'Bioinformatics: Sequence and Genome Analysis', 4, 1, '978-0879697129', 22, 30, 9),
(22, 'Quantum Computing: A Gentle Introduction', 5, 1, '978-0262015066', 23, 12, 6),
(23, 'Augmented Reality: Principles and Practice', 3, 1, '978-0321883575', 24, 13, 5),
(24, 'Virtual Reality Technology', 6, 1, '978-0471360896', 25, 14, 7),
(25, 'Internet of Things: A Hands-On Approach', 10, 1, '978-0996025515', 26, 15, 2),
(26, 'The DevOps Handbook', 9, 1, '978-1942788003', 27, 16, 10),
(27, 'Computer Graphics: Principles and Practice', 7, 1, '978-0321399526', 28, 18, 3),
(28, 'Programming Language Pragmatics', 6, 1, '978-0123745149', 29, 11, 4),
(29, 'Compilers: Principles, Techniques, and Tools', 5, 1, '978-0321486813', 30, 12, 6),
(30, 'Android Programming: The Big Nerd Ranch Guide', 8, 1, '978-0134171456', 31, 13, 8),
(31, 'Revista de Informática', 5, 2, '978-1234567891', 1, 1, 1),
(32, 'Programación Avanzada', 10, 2, '978-1234567892', 2, 2, 2),
(33, 'Algoritmos y Estructuras de Datos', 7, 2, '978-1234567893', 3, 3, 3),
(34, 'Bases de Datos Modernas', 8, 2, '978-1234567894', 4, 4, 4),
(35, 'Redes de Computadoras', 6, 2, '978-1234567895', 5, 5, 5),
(36, 'Sistemas Operativos en Profundidad', 9, 2, '978-1234567896', 6, 6, 6),
(37, 'Inteligencia Artificial Aplicada', 12, 2, '978-1234567897', 7, 7, 7),
(38, 'Desarrollo Web Avanzado', 10, 2, '978-1234567898', 8, 8, 8),
(39, 'Seguridad Informática', 11, 2, '978-1234567899', 9, 9, 9),
(40, 'Ciencia de Datos', 5, 2, '978-1234567800', 10, 10, 10),
(41, 'Ingeniería de Software', 10, 2, '978-1234567801', 11, 11, 11),
(42, 'Métodos Formales en Computación', 4, 2, '978-1234567802', 12, 12, 12),
(43, 'Teoría de la Computación', 9, 2, '978-1234567803', 13, 13, 13),
(44, 'Robótica Moderna', 3, 2, '978-1234567804', 14, 14, 14),
(45, 'Criptografía y Seguridad', 8, 2, '978-1234567805', 15, 15, 15),
(46, 'Análisis de Datos', 6, 2, '978-1234567806', 16, 16, 16),
(47, 'Big Data', 7, 2, '978-1234567807', 17, 17, 17),
(48, 'Machine Learning', 8, 2, '978-1234567808', 18, 18, 18),
(49, 'Cloud Computing', 6, 2, '978-1234567809', 19, 19, 19),
(50, 'Ciberseguridad', 11, 2, '978-1234567810', 20, 20, 20),
(51, 'Blockchain y Criptomonedas', 9, 2, '978-1234567811', 21, 21, 21),
(52, 'Bioinformática', 4, 2, '978-1234567812', 22, 22, 22),
(53, 'Computación Cuántica', 5, 2, '978-1234567813', 23, 23, 23),
(54, 'Realidad Aumentada', 3, 2, '978-1234567814', 24, 24, 24),
(55, 'Realidad Virtual', 6, 2, '978-1234567815', 25, 25, 25),
(56, 'IoT: Internet of Things', 10, 2, '978-1234567816', 26, 26, 26),
(57, 'DevOps', 9, 2, '978-1234567817', 27, 27, 27),
(58, 'Computación Gráfica', 7, 2, '978-1234567818', 28, 28, 28),
(59, 'Lenguajes de Programación', 6, 2, '978-1234567819', 29, 29, 29),
(60, 'Compiladores', 5, 2, '978-1234567820', 30, 30, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `id_solicitud` int(11) DEFAULT NULL,
  `fecha_solicitud` datetime DEFAULT NULL,
  `estado` enum('pendiente','devuelto','no_devuelto') DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `id_usuario`, `id_libro`, `fecha_prestamo`, `fecha_devolucion`, `id_solicitud`, `fecha_solicitud`, `estado`) VALUES
(25, 8, 1, '2024-06-11', NULL, 8, '2024-06-06 21:38:40', 'pendiente'),
(26, 8, 36, '2024-06-11', NULL, 9, '2024-06-07 00:15:54', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_prestamo`
--

CREATE TABLE `solicitud_prestamo` (
  `id_solicitud` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `fecha_solicitud` datetime NOT NULL,
  `fecha_aceptacion` datetime DEFAULT NULL,
  `estado` enum('pendiente','aceptada','rechazada') NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `solicitud_prestamo`
--

INSERT INTO `solicitud_prestamo` (`id_solicitud`, `id_usuario`, `id_libro`, `fecha_solicitud`, `fecha_aceptacion`, `estado`) VALUES
(8, 8, 1, '2024-06-06 21:38:40', '2024-06-10 05:49:12', 'aceptada'),
(9, 8, 36, '2024-06-07 00:15:54', '2024-06-11 16:37:01', 'aceptada'),
(10, 8, 4, '2024-06-10 05:22:26', NULL, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre`) VALUES
(1, 'libro'),
(2, 'revista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `password`, `nombre`, `apellido`, `dni`, `telefono`, `fecha_nacimiento`, `usuario`) VALUES
(1, 'leandro@hotmail.com', '$2y$10$hz4fz4FcTO012xuGckWr8uze.6mhWmn12rH.Qquk/LtMawX9IKe0y', 'Leandro', 'andrew', '23540430', '3704544564', '0000-00-00', 'Lean29'),
(8, 'omar@hotmail.com', '$2y$10$A/nIdwqxKyXQz7p/03AukOScgWH9fWnrPpZJ8XNot6J//RLp09PLa', 'Omar', 'Mosqueda', '39721640', '3704650413', '1996-08-13', 'Mosqueda23'),
(9, 'Andres@hotmail.com', '$2y$10$afh1TC7iVfHde78pwYe.I.zuGo0Vk/hHE4sFZ/zVGP1JBklEPMkua', 'Andres', 'Andrew', '23789675', '3704655612', '2000-05-11', 'AndreDrews'),
(10, 'Angel@hotmail.com', '$2y$10$csYMO9jqRoGlS0kpn3lXXerWbDS2QBqVjQaLpfKpdZSWo1xCgAcnC', 'Angel', 'Lopez', '23657657', '3704122324', '2001-02-08', 'AngeLz'),
(12, 'omarthemostwanted@hotmail.com', '$2y$10$glnLAyESHXXVI/ppG3pyPuTTLlf3tSvnG6bw8F3mPqfgpVDN1Ni5y', 'Hernandez', 'Paredez', '23987878', '2398777898', '1992-06-10', 'Hernan23');

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `after_usuario_insert` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
    INSERT INTO Afiliados (id) VALUES (NEW.id);
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  ADD PRIMARY KEY (`id_afiliado`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id_devolucion`),
  ADD KEY `id_prestamo` (`id_prestamo`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id_editorial`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_editorial` (`id_editorial`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `solicitud_prestamo`
--
ALTER TABLE `solicitud_prestamo`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  MODIFY `id_afiliado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `solicitud_prestamo`
--
ALTER TABLE `solicitud_prestamo`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afiliados`
--
ALTER TABLE `afiliados`
  ADD CONSTRAINT `afiliados_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD CONSTRAINT `devoluciones_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamos` (`id_prestamo`);

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`),
  ADD CONSTRAINT `libros_ibfk_4` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id_editorial`);

--
-- Filtros para la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`);

--
-- Filtros para la tabla `solicitud_prestamo`
--
ALTER TABLE `solicitud_prestamo`
  ADD CONSTRAINT `fk_libro` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
