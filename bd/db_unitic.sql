-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 22:03:52
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_unitic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` date DEFAULT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombres`, `apellidos`, `email`, `foto`, `password`, `created_at`, `update_at`, `roles_id`) VALUES
(1, 'Brian', 'Lozano', 'blozanoguar@uniminuto.edu.co', NULL, '$2y$10$t9278LcKnRu6vCS.62iVYONoUuENHGW/x3TdFc0A33nGOFyBitac2', '2023-07-21 01:30:56', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `cvlac` varchar(100) DEFAULT NULL,
  `linkedln` varchar(100) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `roles_id` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `update_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`id`, `nombres`, `apellidos`, `email`, `foto`, `cvlac`, `linkedln`, `fecha_ingreso`, `fecha_retiro`, `roles_id`, `estado`, `update_at`, `created_at`) VALUES
(1, 'Juan Andress', 'Lopez Garciaa', 'lozanodavid10@hotmail.com', 'estudiante3.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a...', '2023-02-22', '0000-00-00', 2, 1, NULL, '2023-10-08 03:19:43'),
(2, 'Luisa', 'Cardenas Ortega', 'blozanoguar@uniminuto.edu.co', 'estudiante1.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2022-02-16', '0000-00-00', 2, 1, NULL, '2023-10-08 03:19:53'),
(3, 'Luis Andres', 'Trujillo Sandoval', 'admin@sistematiozacion.com', 'integrante-foto2.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2023-03-16', '0000-00-00', 2, 1, NULL, '2023-10-08 03:20:03'),
(4, 'bccvn', 'juana', 'blozanoguar@uniminuto.edu.co', 'estudiante1.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2023-05-03', NULL, 2, 1, NULL, '2023-10-08 03:20:13'),
(5, 'manuel', 'perez', 'jivanhernandez1994@gmail.com', 'estudiante3.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2023-05-02', NULL, 2, 1, NULL, '2023-10-08 03:20:23'),
(6, 'Gustavo ', 'Montealegre', 'gustavo.montealegre@uniminuto.edu', 'estudiante3.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2023-05-02', '0000-00-00', 2, 2, NULL, '2023-10-08 03:20:32'),
(7, 'brian David', 'rfdbdfgbc', 'lozanodavid10@hotmail.com', '20170313_200208.jpg', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2023-10-01', '0000-00-00', 2, 1, NULL, '2023-10-08 15:33:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolios`
--

CREATE TABLE `portafolios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `programa` varchar(100) NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `archivo` varchar(250) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tipo_trabajo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `portafolios`
--

INSERT INTO `portafolios` (`id`, `titulo`, `programa`, `fecha`, `descripcion`, `archivo`, `imagen`, `tipo_trabajo`) VALUES
(1, 'Diseño y desarrollo de plataformas web \"Observatorio de Graduados\" para el fortalecimiento del vinculos entre profesionales de trabajo social e ingeniería de sistemas y Uniminuto1', 'Tecnologia en informatica TINF', '2023-10-04', 'prueba archivo imagen', 'Actividad.pdf', 'thumb-1920-601846.jpg', 1),
(2, 'javascript', 'Ingeniería de Sistemas - ISUM', '2022-06-06', 'Producto de un libro dedicado a la programacion', 'Actividad_grupal_#2_consultas_lenguajes.pdf', 'thumb-1920-601846.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolios_has_integrantes`
--

CREATE TABLE `portafolios_has_integrantes` (
  `id` int(11) NOT NULL,
  `portafolio_id` int(11) NOT NULL,
  `integrantes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `portafolios_has_integrantes`
--

INSERT INTO `portafolios_has_integrantes` (`id`, `portafolio_id`, `integrantes`) VALUES
(1, 1, 'juan'),
(2, 1, 'maria'),
(3, 2, 'Edwin Reinel Perdomo Sedano'),
(4, 2, 'Diego Alexander Beltran');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `titulo`, `created_at`) VALUES
(1, 'administrador', '2023-04-30 17:53:54'),
(2, 'estudiante', '2023-04-30 17:53:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_trabajo`
--

CREATE TABLE `tipo_trabajo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_trabajo`
--

INSERT INTO `tipo_trabajo` (`id`, `titulo`) VALUES
(1, 'proyectos'),
(2, 'monografias'),
(3, 'productos'),
(4, 'integrantes'),
(5, 'desarrollo'),
(6, 'articulos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_id` (`roles_id`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `portafolios`
--
ALTER TABLE `portafolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_trabajo` (`tipo_trabajo`);

--
-- Indices de la tabla `portafolios_has_integrantes`
--
ALTER TABLE `portafolios_has_integrantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `integrantes_portafolios_ibfk_1` (`portafolio_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_trabajo`
--
ALTER TABLE `tipo_trabajo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `portafolios`
--
ALTER TABLE `portafolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `portafolios_has_integrantes`
--
ALTER TABLE `portafolios_has_integrantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_trabajo`
--
ALTER TABLE `tipo_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `integrantes_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `integrantes_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `portafolios`
--
ALTER TABLE `portafolios`
  ADD CONSTRAINT `portafolios_ibfk_3` FOREIGN KEY (`tipo_trabajo`) REFERENCES `tipo_trabajo` (`id`);

--
-- Filtros para la tabla `portafolios_has_integrantes`
--
ALTER TABLE `portafolios_has_integrantes`
  ADD CONSTRAINT `portafolios_has_integrantes_ibfk_1` FOREIGN KEY (`portafolio_id`) REFERENCES `portafolios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
