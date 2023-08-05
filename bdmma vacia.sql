-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2023 a las 02:45:59
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdmma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atletas`
--

CREATE TABLE `atletas` (
  `id` int(11) NOT NULL,
  `id_club` int(11) NOT NULL COMMENT 'foranea referenciada de la tabla clubes',
  `cedula` varchar(15) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `peso` varchar(15) NOT NULL,
  `estatura` varchar(15) NOT NULL,
  `fechadenacimiento` date NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `deportebase` varchar(20) NOT NULL COMMENT 'deporte que practica el atleta',
  `categoria` varchar(20) NOT NULL COMMENT 'categoria al que pertenece el atleta',
  `fechaingresoclub` date NOT NULL COMMENT 'fecha que ingreso al club el atleta',
  `entrenador` varchar(40) NOT NULL COMMENT 'nombre del entrenador del atleta'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_usuario`
--

CREATE TABLE `bitacora_usuario` (
  `id` int(11) NOT NULL,
  `cedula_usuario` int(11) NOT NULL COMMENT 'foranea de tabla usuarios para tomar cedula',
  `id_modulo` int(11) NOT NULL COMMENT 'foranea de tabla modulos',
  `fecha_registro` date NOT NULL COMMENT 'fecha que realizo accion el usuario',
  `hora_registro` time NOT NULL COMMENT 'hora que realizo accion el usuario',
  `accion_realizada` varchar(300) NOT NULL COMMENT 'accion que realizo el usuario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubes`
--

CREATE TABLE `clubes` (
  `id` int(11) NOT NULL COMMENT 'id de tabla clubes',
  `codigo` varchar(30) NOT NULL COMMENT 'codigo del club',
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `deportebase` varchar(30) NOT NULL COMMENT 'deporte que practica el club',
  `direccion` varchar(100) NOT NULL COMMENT 'direccion donde se ubica el club'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emparejamientos`
--

CREATE TABLE `emparejamientos` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `atleta` int(11) NOT NULL,
  `ronda` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `id_club` int(11) NOT NULL COMMENT 'llave foranea referenciada de tabla clubes',
  `nombre` varchar(40) NOT NULL,
  `fecha` date NOT NULL COMMENT 'fecha que se realizara el torneo',
  `hora` varchar(15) NOT NULL COMMENT 'hora del torneo',
  `responsable` varchar(50) NOT NULL COMMENT 'club que se hara responsable del torneo',
  `monto` varchar(20) NOT NULL COMMENT 'precio de inscripcion al torneo',
  `direccion` varchar(100) NOT NULL COMMENT 'ubicacion que se realizara el torneo ',
  `juez1` varchar(50) NOT NULL,
  `juez2` varchar(50) NOT NULL,
  `juez3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_medica`
--

CREATE TABLE `informacion_medica` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL COMMENT 'foranea referenciada de la tabla atletas',
  `medicamento` varchar(100) NOT NULL COMMENT 'medicamento que consume',
  `enfermedad` varchar(100) NOT NULL COMMENT 'enfermedad que posea el atleta',
  `discapacidad` varchar(100) NOT NULL COMMENT 'discapacidad que posea el atleta',
  `dieta` varchar(100) NOT NULL COMMENT 'si posee dieta alimenticia estricta',
  `enfermedades_pasadas` varchar(100) NOT NULL COMMENT 'enfermedad que tuvo anteriormente el atleta',
  `nombre_parentesco` varchar(50) NOT NULL COMMENT 'nombre de persona encargada del atleta en caso de emergencia',
  `telefono_parentesco` varchar(20) NOT NULL COMMENT 'telefono en caso de emergencia',
  `tipo_parentesco` varchar(20) NOT NULL COMMENT 'relacion de la persona con el atleta'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_socioeconomica`
--

CREATE TABLE `informacion_socioeconomica` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `tipo_vivienda` varchar(20) NOT NULL,
  `zona_vivienda` varchar(20) NOT NULL,
  `habitantes_hogar` varchar(20) NOT NULL,
  `internet` varchar(10) NOT NULL,
  `luz` varchar(10) NOT NULL,
  `agua` varchar(10) NOT NULL,
  `telefono_residencial` varchar(10) NOT NULL,
  `cable` varchar(10) NOT NULL,
  `propiedad_vivienda` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_evento`
--

CREATE TABLE `inscripcion_evento` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `peso` varchar(15) NOT NULL,
  `fechadenacimiento` date NOT NULL,
  `estado` varchar(20) NOT NULL COMMENT 'estado/provincia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intermediaria`
--

CREATE TABLE `intermediaria` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_modulos` int(11) NOT NULL,
  `consultar` varchar(5) NOT NULL,
  `registrar` varchar(5) NOT NULL,
  `modificar` varchar(5) NOT NULL,
  `eliminar` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `intermediaria`
--

INSERT INTO `intermediaria` (`id`, `id_rol`, `id_modulos`, `consultar`, `registrar`, `modificar`, `eliminar`) VALUES
(1, 1, 1, 'true', 'false', 'false', 'false'),
(2, 1, 2, 'true', 'true', 'true', 'true'),
(3, 1, 3, 'true', 'false', 'false', 'false'),
(4, 1, 4, 'true', 'false', 'false', 'false'),
(5, 1, 5, 'true', 'false', 'false', 'false'),
(6, 1, 6, 'true', 'true', 'true', 'true'),
(7, 1, 7, 'true', 'true', 'true', 'true'),
(8, 1, 8, 'true', 'true', 'true', 'true'),
(9, 1, 9, 'true', 'true', 'true', 'true'),
(10, 1, 10, 'true', 'true', 'true', 'true'),
(11, 1, 11, 'true', 'true', 'true', 'true'),
(12, 1, 12, 'true', 'true', 'true', 'true'),
(13, 1, 13, 'true', 'true', 'true', 'true'),
(15, 1, 21, 'true', 'true', 'true', 'true'),
(16, 5, 1, 'true', 'false', 'false', 'false'),
(17, 5, 2, 'true', 'true', 'true', 'true'),
(18, 5, 3, 'true', 'false', 'false', 'false'),
(19, 5, 4, 'true', 'false', 'false', 'false'),
(20, 5, 5, 'true', 'false', 'false', 'false'),
(21, 5, 6, 'true', 'true', 'true', 'true'),
(22, 5, 10, 'true', 'true', 'true', 'true'),
(24, 5, 11, 'true', 'true', 'true', 'true'),
(25, 5, 12, 'true', 'true', 'true', 'true'),
(26, 5, 13, 'true', 'true', 'true', 'true'),
(28, 5, 15, 'true', 'true', 'true', 'true'),
(49, 12, 1, 'true', 'false', 'false', 'false'),
(50, 12, 3, 'true', 'false', 'false', 'false'),
(51, 12, 4, 'true', 'false', 'false', 'false'),
(52, 12, 5, 'true', 'false', 'false', 'false');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `nombre`) VALUES
(1, 'Gestionar Clubes'),
(2, 'Gestionar Personal'),
(3, 'Gestionar Atletas'),
(4, 'Gestionar Datos Medicos'),
(5, 'Gestionar Datos Socioeconomicos'),
(6, 'Gestionar Eventos'),
(7, 'Gestionar Usuarios'),
(8, 'Bitacora de Usuario'),
(9, 'Roles y Permisos'),
(10, 'Inscripcion a Evento'),
(11, 'Emparejamientos y Combates'),
(12, 'Resultados de Eventos'),
(13, 'Historial del Atleta'),
(15, 'Reporte de Atletas'),
(16, 'Reporte de Personal'),
(17, 'Reporte de Eventos'),
(18, 'Reporte de Resultados Eventos'),
(19, 'Reporte de Emparejamientos'),
(20, 'Reporte de Historial de Atletas'),
(21, 'Reportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL COMMENT 'id de tabla personal',
  `id_club` int(11) NOT NULL COMMENT 'foranea referenciada de la tabla clubes',
  `cedula` varchar(15) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL COMMENT 'ubicacion de la vivienda'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_clubes`
--

CREATE TABLE `personal_clubes` (
  `id_clubes` int(11) NOT NULL COMMENT 'clave foranea de tabla clubes',
  `id_personal` int(11) NOT NULL COMMENT 'clave foranea de tabla personal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `atleta1` int(11) NOT NULL COMMENT 'peleador 1',
  `atleta2` int(11) NOT NULL COMMENT 'peleador 2',
  `forma_ganar` varchar(20) NOT NULL,
  `ronda` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL COMMENT 'nombre de rol de usuario',
  `descripcion` varchar(250) NOT NULL COMMENT 'descripcion del rol'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Super Usuario', 'Administra absolutamente todo el sistema sin ninguna restricción'),
(5, 'Administrador', 'Puede acceder a casi todos los modulos excepto de seguridad'),
(12, 'Invitado', 'solo puede ver');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL COMMENT 'nombre del usuario',
  `contrasena` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `id_rol`, `nombre`, `contrasena`) VALUES
(29604245, 1, 'Ruander Cuello', '$2y$12$bF1cG.EVFW3T7DmISUUED.6foycYTwJscssYnuMBhb5Uxcm.biAjK'),
(29831184, 1, 'Diego Aguilar', '$2y$12$6l5T8HGy4pE/3LAjMJg0qe9pa31PzzmfJ2Hf9OTA64.4BaQ96mElS'),
(29945099, 1, 'Cirez Barriga', '$2y$12$MvJlskHkIyRYtG5rInwbLe9f2Te.cP2g5V3HaD.1fwVWB8aaBboOy'),
(30591237, 1, 'Luis Perdomo', '$2y$12$RpARghZuVmSBALdC/YSz1un1bufhbq5NgSspTHAZGIWKuJa784RcS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atletas`
--
ALTER TABLE `atletas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `FK_id_club` (`id_club`);

--
-- Indices de la tabla `bitacora_usuario`
--
ALTER TABLE `bitacora_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario` (`cedula_usuario`),
  ADD KEY `fk_id_modulo` (`id_modulo`);

--
-- Indices de la tabla `clubes`
--
ALTER TABLE `clubes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emparejamientos`
--
ALTER TABLE `emparejamientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_inscripcion` (`id_evento`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_club` (`id_club`);

--
-- Indices de la tabla `informacion_medica`
--
ALTER TABLE `informacion_medica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_atleta` (`id_atleta`);

--
-- Indices de la tabla `informacion_socioeconomica`
--
ALTER TABLE `informacion_socioeconomica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_atleta` (`id_atleta`);

--
-- Indices de la tabla `inscripcion_evento`
--
ALTER TABLE `inscripcion_evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_club` (`id_evento`);

--
-- Indices de la tabla `intermediaria`
--
ALTER TABLE `intermediaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_rol` (`id_rol`),
  ADD KEY `fk_id_modulos` (`id_modulos`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `FK_id_club` (`id_club`);

--
-- Indices de la tabla `personal_clubes`
--
ALTER TABLE `personal_clubes`
  ADD KEY `FK_id_club` (`id_clubes`),
  ADD KEY `FK_id_personal` (`id_personal`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_evento` (`id_evento`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `fk_id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atletas`
--
ALTER TABLE `atletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora_usuario`
--
ALTER TABLE `bitacora_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clubes`
--
ALTER TABLE `clubes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de tabla clubes';

--
-- AUTO_INCREMENT de la tabla `emparejamientos`
--
ALTER TABLE `emparejamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informacion_medica`
--
ALTER TABLE `informacion_medica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informacion_socioeconomica`
--
ALTER TABLE `informacion_socioeconomica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripcion_evento`
--
ALTER TABLE `inscripcion_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `intermediaria`
--
ALTER TABLE `intermediaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de tabla personal';

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atletas`
--
ALTER TABLE `atletas`
  ADD CONSTRAINT `atletas_idfk_1` FOREIGN KEY (`id_club`) REFERENCES `clubes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `bitacora_usuario`
--
ALTER TABLE `bitacora_usuario`
  ADD CONSTRAINT `cedula_usuario_fk` FOREIGN KEY (`cedula_usuario`) REFERENCES `usuarios` (`cedula`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_modulo_fk` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id`);

--
-- Filtros para la tabla `emparejamientos`
--
ALTER TABLE `emparejamientos`
  ADD CONSTRAINT `emparejamientos_idfk_1` FOREIGN KEY (`id_evento`) REFERENCES `inscripcion_evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_idfk1` FOREIGN KEY (`id_club`) REFERENCES `clubes` (`id`);

--
-- Filtros para la tabla `informacion_medica`
--
ALTER TABLE `informacion_medica`
  ADD CONSTRAINT `informacion_medica_idfk_1` FOREIGN KEY (`id_atleta`) REFERENCES `atletas` (`id`);

--
-- Filtros para la tabla `informacion_socioeconomica`
--
ALTER TABLE `informacion_socioeconomica`
  ADD CONSTRAINT `informacion_socioeconomica_idfk_1` FOREIGN KEY (`id_atleta`) REFERENCES `atletas` (`id`);

--
-- Filtros para la tabla `inscripcion_evento`
--
ALTER TABLE `inscripcion_evento`
  ADD CONSTRAINT `inscripcion_idfk1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `intermediaria`
--
ALTER TABLE `intermediaria`
  ADD CONSTRAINT `id_modulos_fk` FOREIGN KEY (`id_modulos`) REFERENCES `modulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_rol_fk` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_clubes`
--
ALTER TABLE `personal_clubes`
  ADD CONSTRAINT `personal_clubes_idfk_1` FOREIGN KEY (`id_clubes`) REFERENCES `clubes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_clubes_idfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_idfk1` FOREIGN KEY (`id_evento`) REFERENCES `emparejamientos` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol_fk` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
