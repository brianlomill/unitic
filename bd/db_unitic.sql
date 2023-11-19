-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2023 a las 03:39:10
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
  `fecha_ingreso` date NOT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `roles_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`id`, `nombres`, `apellidos`, `email`, `foto`, `cvlac`, `linkedln`, `fecha_ingreso`, `fecha_retiro`, `roles_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Juan Andres', 'Lopez Garcia', 'lozanodavid10@hotmail.com', 'estudiante3.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a...', '2023-11-06', '0000-00-00', 2, 1, '2023-11-17 14:36:57', '2023-11-19 02:12:23'),
(2, 'Luisa', 'Cardenas Ortega', 'blozanoguar@uniminuto.edu.co', 'estudiante1.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2022-02-16', '0000-00-00', 2, 1, '2023-10-08 03:19:53', '2023-11-15 23:37:56'),
(3, 'Luis Andres', 'Trujillo Sandovals', 'admin@sistematiozacion.com', 'integrante-foto2.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2023-03-16', '0000-00-00', 2, 1, '2023-11-17 14:37:06', '2023-11-17 14:37:06'),
(4, 'Maria', 'juana', 'blozanoguar@uniminuto.edu.co', 'estudiante1.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2023-05-03', '0000-00-00', 2, 1, '2023-11-19 01:43:33', '2023-11-19 01:43:33'),
(5, 'manuel', 'perez', 'jivanhernandez1994@gmail.com', 'estudiante3.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2023-05-02', NULL, 2, 1, '2023-10-08 03:20:23', '2023-11-15 23:37:56'),
(6, 'Gustavo ', 'Montealegre', 'gustavo.montealegre@uniminuto.edu', 'estudiante3.webp', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2023-05-02', '0000-00-00', 2, 2, '2023-10-08 03:20:32', '2023-11-15 23:37:56'),
(7, 'brian David', 'rfdbdfgbc', 'lozanodavid10@hotmail.com', '20170313_200208.jpg', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001662775', 'https://www.linkedin.com/in/brian-lozano-a2140718a/', '2023-10-01', '0000-00-00', 2, 1, '2023-10-08 15:33:45', '2023-11-15 23:37:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolios`
--

CREATE TABLE `portafolios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `programa` varchar(150) DEFAULT NULL,
  `evento` varchar(150) DEFAULT NULL,
  `fecha` date NOT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `archivo` varchar(250) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tipo_trabajo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `portafolios`
--

INSERT INTO `portafolios` (`id`, `titulo`, `programa`, `evento`, `fecha`, `ciudad`, `descripcion`, `archivo`, `imagen`, `tipo_trabajo`, `created_at`, `updated_at`) VALUES
(1, 'Diseño y desarrollo de plataformas web', 'Tecnologia en informatica TINF', NULL, '2023-10-01', NULL, 'prueba archivo imagen 1', 'Actividad.pdf', 'thumb-1920-601846.jpg', 1, '2023-11-17 19:50:34', '2023-11-19 02:10:28'),
(2, 'Diseño y desarrollo de plataformas web \"Observatorio de Graduados\" para el fortalecimiento del vinculos entre profesionales de ', 'Ingeniería de Sistemas - ISUM', NULL, '2022-06-06', NULL, 'Producto de un libro dedicado a la programacion', 'Actividad_grupal_#2_consultas_lenguajes.pdf', 'thumb-1920-601846.jpg', 1, '2023-11-15 23:34:45', '2023-11-15 23:34:45'),
(3, 'Diseño y desarrollo de plataformas web ', 'Ingeniería de Sistemas', NULL, '2017-05-19', NULL, 'Entrega de trabajos y fuentes', 'Introducción a la Minería de Datos Segunda Parte.pdf', 'Captura de pantalla (11).png', 1, '2023-11-17 14:18:09', '2023-11-17 14:18:09'),
(4, 'Diseño y desarrollo de plataformas web', 'tinf  - 2 ', NULL, '2019-01-08', NULL, 'Andrea es una protegonista', 'Power Query.pdf', 'Captura de pantalla (33).png', 1, '2023-11-17 15:37:17', '2023-11-17 15:37:17'),
(5, 'Semillero de Investigación INNOTIC', 'Tecnología en Informática - TINF 1', NULL, '2014-10-30', NULL, 'En este documento se presentarán temáticas referentes al semillero de investigación InnoTic, las problemáticas que afronta y la solución planteada que consiste en la vinculación al proyecto llamado desarrollo y fortalecimiento empresarial a partir de las TIC', 'Monografia 2015-10.pdf', 'Monografia 2015-10.PNG', 2, '2023-11-17 19:50:50', '2023-11-19 02:10:42'),
(6, 'SEMILLERO DE INVESTIGACION UNITIC: ESPACIO PARA LA INNOVACION IMPLEMENTACION DE LAS TIC EN LOS PROCESOS PRODUCTIVOS DE LAS MIPYMES', 'Tecnología en Informática  - TINF', NULL, '2017-05-25', NULL, 'Se basa en el estudio, averiguación, problemática y solución de una actual sociedad emprendedora que necesita ser informada e instruida sobre los conceptos del cómo podrían dar un gran salto a la innovación por medio del criterio de las tic', 'Monografia 2017-10.pdf', 'Monografia 2017-10.PNG', 2, '2023-11-17 16:48:41', '2023-11-17 16:48:41'),
(7, 'SEMILLERO DE INVESTIGACION UNITIC: ESPACIO PARA LA INNOVACION IMPLEMENTACION DE LAS TIC EN LOS PROCESOS PRODUCTIVOS DE LAS MIPYMES', 'TECNOLOGIA EN INFORMATICA s', NULL, '2017-05-01', NULL, 'se basa en el estudio, averiguación, problemática y solución de una actual sociedad emprendedora que necesita ser informada e instruida sobre los conceptos del cómo podrían dar un gran salto a la innovación por medio del criterio de las tic', 'Monografia 2017-10.pdf', 'Monografia 2017-10.PNG', 1, '2023-11-17 01:57:05', '2023-11-17 01:57:05'),
(12, 'I Encuentro nacional de reflexión en investigación y contribuyendo conocimiento libre para la educación', NULL, NULL, '2014-06-18', 'Fusagasuga, Cundinamarca', NULL, 'posters2014.webp', 'posters2014.webp', 3, '2023-11-17 22:43:02', '2023-11-19 02:11:48'),
(13, 'UNITIC - Un espacio para la innovacíon', NULL, NULL, '2015-10-13', 'Girardot, Cundinamarca', NULL, 'posters2015.webp', 'posters2015.webp', 3, '2023-11-17 22:38:43', '2023-11-19 01:54:20'),
(14, 'V Jornadas nacionales de investigación  y III de semilleros de investigación UNIMINUTO', NULL, NULL, '2016-06-22', 'Girardot, Cundinamarca', NULL, 'posters2016.webp', 'posters2016.webp', 3, '2023-11-17 22:38:49', '2023-11-19 01:53:41'),
(15, 'III Congreso de investigación: Perspectivas científico - humanistas de la inclusión desde la investigación universitaria', NULL, NULL, '2017-06-07', 'Tunja, Boyacá', NULL, 'posters2017.webp', 'posters2017.webp', 3, '2023-11-17 23:06:15', '2023-11-19 01:53:31'),
(21, 'Desarrollo y fortalecimiento del sector empresarial a partir del uso de las TIC', NULL, 'UNIMINUTO Centro Regional Girardot', '2023-11-07', 'Girardot, Cundinamarca', 'En la actualidad pocos establecimientos aprovechan los beneficios las tecnologías; Por miedo al cambio o por necesidad, aún están enfocados en documentos y carpetas físicas que son metodologías antiguas, perdiendo la oportunidad de volverse competitivas y productivas', 'Ponencia UMD 2014.pdf', 'Captura.PNG', 5, '2023-11-19 01:22:45', '2023-11-19 02:10:59');

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
(3, 2, 'Edwin Reinel Perdomo Sedano'),
(4, 2, 'Diego Alexander Beltran'),
(15, 7, ' LUIS FELIPE MIRANDA VARGAS '),
(16, 7, 'JASON TRIANA GUERRA '),
(41, 3, 'Manuel Olivero'),
(42, 3, 'Sandra Cardenas'),
(43, 3, 'MARCOS ALBERTO SAAVEDRA '),
(55, 4, 'Luisa'),
(66, 6, 'LUIS FELIPE MIRANDA VARGAS'),
(67, 6, 'JASON TRIANA GUERRA '),
(119, 15, 'Elkin Otero Rodriguez'),
(120, 14, 'Marco Tulio Sánchez Espinosa'),
(122, 13, 'Marco Tulio Sánchez Espinosa'),
(123, 1, 'juan'),
(124, 1, ' mariaa'),
(125, 5, 'JUAN CAMILO ÁLVAREZ '),
(126, 5, 'ALEXANDER MOLINA CARDOZO '),
(127, 5, 'YORDI MANUEL RICO SÁNCHEZ '),
(128, 5, 'JUAN DAVID RINCÓN SÁNCHEZ '),
(129, 21, 'Marco Tulio Sánchez Espinosa'),
(130, 21, 'Elkin Otero Rodriguez'),
(134, 12, 'Manuel Olivero');

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
(3, 'posters'),
(4, 'integrantes'),
(5, 'ponencias'),
(6, 'articulos'),
(7, 'desarrollo');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `portafolios_has_integrantes`
--
ALTER TABLE `portafolios_has_integrantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_trabajo`
--
ALTER TABLE `tipo_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `portafolios_has_integrantes_ibfk_1` FOREIGN KEY (`portafolio_id`) REFERENCES `portafolios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
