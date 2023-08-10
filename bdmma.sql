-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2023 a las 07:42:49
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

--
-- Volcado de datos para la tabla `atletas`
--

INSERT INTO `atletas` (`id`, `id_club`, `cedula`, `nombre`, `apellido`, `peso`, `estatura`, `fechadenacimiento`, `telefono`, `sexo`, `deportebase`, `categoria`, `fechaingresoclub`, `entrenador`) VALUES
(3, 18, '29831184', 'Diego', 'Aguilar', '60', '1.68', '2002-12-22', '04122448721', 'Masculino', 'Karate', 'Categoria 2', '2022-10-30', 'Raul Aguilar'),
(28, 19, '29604245', 'Ruander', 'Cuello', '70', '1.71', '2002-10-05', '04245143086', 'Masculino', 'Boxeo', 'Categoria 1', '2020-03-12', 'Carlos'),
(29, 87, '33554583', 'ruanyer cuello', 'cuello verde', '75', '1.67', '2010-03-04', '04126569680', 'Masculino', 'Boxeo', 'Categoria 2', '2022-03-07', 'chivo'),
(30, 88, '32722063', 'gregorio', 'verde', '65', '1.50', '2006-01-07', '04140503729', 'Masculino', 'Kapoeira', 'Categoria 3', '2019-04-12', 'Juan'),
(31, 18, '31111442', 'Ruangel', 'cuello', '69', '1.67', '2005-09-03', '04146093434', 'Masculino', 'Karate', 'Categoria 3', '2019-09-07', 'rodrigo'),
(32, 87, '28484205', 'Greiber', 'Rojas', '68', '1.67', '2001-02-12', '04138473829', 'Masculino', 'Judo', 'Categoria 2', '2020-12-12', 'Ricardo'),
(33, 88, '28474538', 'Carla', 'perez', '68', '1.60', '1999-08-12', '04245674329', 'Femenino', 'Taekwondo', 'Categoria 2', '2022-03-12', 'Jorge'),
(34, 88, '1817213', 'Genesis', 'barraez', '69', '1.50', '1990-11-12', '04123456768', 'Femenino', 'Kapoeira', 'Categoria 3', '2014-12-12', 'Sebastian'),
(35, 18, '25235364', 'Elizabeth', 'Martines', '73', '1.62', '2000-03-12', '04246753890', 'Femenino', 'Boxeo', 'Categoria 3', '2012-03-12', 'lucas'),
(36, 19, '45435345', 'joanna', 'carrasco', '64', '1.50', '1976-04-23', '04245678932', 'Femenino', 'Boxeo', 'Categoria 3', '2018-03-31', 'Ricardo perez'),
(37, 87, '28545302', 'Ender', 'torres', '73', '1.80', '2002-03-12', '04245681234', 'Femenino', 'Boxeo', 'Categoria 3', '2017-03-12', 'Carlos'),
(38, 18, '6765453', 'Alex', 'mejia', '58', '1.78', '1990-02-13', '04145670489', 'Masculino', 'Judo', 'Categoria 2', '2022-12-21', 'Gregorio'),
(39, 88, '43543453', 'Pedro', 'verde', '56', '1.70', '1998-03-21', '04145678712', 'Masculino', 'Boxeo', 'Categoria 2', '2020-03-11', 'Luis'),
(40, 88, '3253477', 'Braulio', 'morales', '57', '1.80', '1999-03-21', '04245678912', 'Masculino', 'Kapoeira', 'Categoria 2', '2014-03-04', 'ricardo'),
(41, 88, '7876854', 'Leo', 'Pineda', '55', '1.69', '1999-03-14', '04123456789', 'Masculino', 'Karate', 'Categoria 3', '2020-02-04', 'Lujian'),
(42, 88, '4542324', 'Roselianny', 'Pineda', '60', '1.55', '1999-03-21', '04124568890', 'Femenino', 'Kapoeira', 'Categoria 2', '2019-03-21', 'Ricardo'),
(55, 19, '27199177', 'jesus', 'canelon', '62', '1.73', '2001-11-12', '04245809452', 'Masculino', 'Taekwondo', 'Categoria 1', '2023-03-17', 'mario caston'),
(56, 87, '24123134', 'jose', 'perez', '70', '1.70', '1999-11-23', '04245809452', 'Masculino', 'Kapoeira', 'Categoria 1', '2023-03-17', 'luis perdomo');

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

--
-- Volcado de datos para la tabla `clubes`
--

INSERT INTO `clubes` (`id`, `codigo`, `nombre`, `telefono`, `deportebase`, `direccion`) VALUES
(18, 'rerere', 'Club Poderoso ', '04122448721', 'Karate', 'barquisimeto'),
(19, 'deded', 'juanes', '04122448721', 'Kapoeira', 'dededde'),
(87, 'Lucha32', 'The Black', '04243890543', 'Boxeo', 'Grecia'),
(88, 'Recreacion200', 'Boxeo05', '04128745125', 'Karate', 'La lucha'),
(162, 'jbjbjj', 'ihuhuhuh', '04245809452', 'Kapoeira', 'caja de agua'),
(165, 'dwdwdw', 'wdwdwdwdw', '04122448721', 'Boxeo', 'wdwdwdw');

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

--
-- Volcado de datos para la tabla `emparejamientos`
--

INSERT INTO `emparejamientos` (`id`, `id_evento`, `atleta`, `ronda`) VALUES
(161, 36, 56, '1'),
(162, 36, 55, '1'),
(163, 36, 57, '1'),
(164, 36, 53, '1'),
(165, 36, 52, '1'),
(166, 36, 54, '1'),
(167, 36, 51, '1'),
(168, 36, 56, '2'),
(169, 36, 57, '2'),
(170, 36, 52, '2'),
(171, 36, 56, '2'),
(172, 36, 57, '2'),
(173, 36, 52, '2'),
(174, 36, 56, '2'),
(175, 36, 57, '2'),
(176, 36, 52, '2'),
(179, 35, 46, '1'),
(180, 35, 50, '1'),
(181, 35, 45, '1'),
(182, 35, 46, '2'),
(183, 35, 45, '2'),
(184, 35, 45, '3'),
(185, 35, 45, '4');

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

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `id_club`, `nombre`, `fecha`, `hora`, `responsable`, `monto`, `direccion`, `juez1`, `juez2`, `juez3`) VALUES
(9, 18, 'pelea nacionales', '2022-11-05', '19:30', '', '15$', 'barquisimeto', 'ramon', 'julio', 'riwel'),
(10, 18, 'peleasss', '2022-11-04', '11:18', '', '12.12', 'barquisimeto', 'ramon', 'jose miguel', 'riwel'),
(35, 88, 'Four15', '2023-04-20', '10:33', '', '10$', 'Asociacion artes marciales mixta lara', 'Carlos', 'Jesus', 'Ricardo'),
(36, 87, 'YZ24B10', '2023-04-12', '08:50', '', '18$', 'La miel', 'Diego', 'Luiz', 'Ruander'),
(37, 88, 'COD MOBILE', '2023-04-29', '10:11', '', '12$', 'obelisco', 'Ricardo', 'Braulio', 'Diego');

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

--
-- Volcado de datos para la tabla `informacion_medica`
--

INSERT INTO `informacion_medica` (`id`, `id_atleta`, `medicamento`, `enfermedad`, `discapacidad`, `dieta`, `enfermedades_pasadas`, `nombre_parentesco`, `telefono_parentesco`, `tipo_parentesco`) VALUES
(1, 3, 'ninguno', 'ninguno', 'ninguno', 'arepa', 'ninguna', 'pastora suarez', '04122448721', 'mamá'),
(10, 28, 'Hierro', 'Ninguna', 'ninguna', 'Proteina', 'Cirujia', 'Ruangel cuello', '02514477665', 'Hermano'),
(11, 29, 'Cloritomazol', 'ninguno', 'ninguno', 'ninguno', 'niguno', 'Ruander', '04245673490', 'Hermano'),
(12, 30, 'ninguno', 'asma', 'ninguno', 'Sueros', 'ninguna', 'Carlos gomeaz', '04245678432', 'Entrenador'),
(13, 36, 'Ninguno', 'Artritis', 'Ninguna', 'Vitaminas', 'Hueso roto', 'Ricardo', '04245678954', 'Padre'),
(14, 33, 'Clorazepan', 'Culebrilla', 'ninguna', 'Ninguna', 'ninguna', 'Mia ruiz', '04123438238', 'Madre'),
(15, 42, 'Diclofena', 'asma', 'ninguno', 'ninguno', 'hueso roro', 'Maria', '04134546503', 'Madre'),
(16, 38, 'niguno', 'covid', 'ninguna', 'ninguna', 'ninguna', 'Roberto', '04145623456', 'Padre');

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

--
-- Volcado de datos para la tabla `informacion_socioeconomica`
--

INSERT INTO `informacion_socioeconomica` (`id`, `id_atleta`, `tipo_vivienda`, `zona_vivienda`, `habitantes_hogar`, `internet`, `luz`, `agua`, `telefono_residencial`, `cable`, `propiedad_vivienda`) VALUES
(1, 3, 'Casa', 'Rural', '4', 'POSEE', 'POSEE', 'POSEE', 'NO POSEE', 'POSEE', 'Propia'),
(10, 37, 'Departamento', 'Rural', '2', 'POSEE', 'POSEE', 'POSEE', 'POSEE', 'POSEE', 'Propia'),
(11, 36, 'Casa', 'Urbana', '1', 'POSEE', 'POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'Alquilada'),
(12, 32, 'Apartamento', 'Rural', '4', 'NO POSEE', 'POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'Alquilada'),
(13, 30, 'Casa', 'Rural', '1', 'NO POSEE', 'NO POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'Alquilada'),
(14, 35, 'Departamento', 'Urbana', '2', 'NO POSEE', 'NO POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'Otro'),
(15, 28, 'Departamento', 'Rural', '7', 'POSEE', 'POSEE', 'POSEE', 'POSEE', 'POSEE', 'Propia'),
(16, 42, 'Departamento', 'Urbana', '3', 'NO POSEE', 'NO POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'Propia'),
(17, 41, 'Casa', 'Rural', '1', 'POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'POSEE', 'Propia'),
(18, 40, 'Casa', 'Urbana', '6', 'POSEE', 'POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'Propia'),
(19, 39, 'Casa', 'Rural', '3', 'POSEE', 'POSEE', 'POSEE', 'POSEE', 'POSEE', 'Propia');

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

--
-- Volcado de datos para la tabla `inscripcion_evento`
--

INSERT INTO `inscripcion_evento` (`id`, `id_evento`, `cedula`, `nombre`, `sexo`, `peso`, `fechadenacimiento`, `estado`) VALUES
(2, 9, '29831184', 'Diego Aguilar', 'Masculino', '60', '2002-12-22', 'Lara'),
(3, 9, '2131231', 'luis', 'Masculino', '60', '2022-10-31', 'Lara'),
(9, 10, '29831184', 'Diego Aguilar', 'Masculino', '60', '2002-12-22', 'Lara'),
(10, 9, '29831186', 'jose ramon', 'Masculino', '60', '1999-11-12', 'Caracas'),
(11, 9, '29831187', 'miguel vasquez', 'Masculino', '60', '1989-03-12', 'Lara'),
(12, 9, '29831188', 'sebastian ramos', 'Masculino', '60', '1997-11-11', 'Lara'),
(14, 9, '28356556', 'Manuel Rodriguez', 'Masculino', '60', '2000-07-20', 'Sucre'),
(15, 9, '25656787', 'Carlos Belcast', 'Masculino', '61', '2000-12-20', 'Carabobo'),
(16, 9, '25677887', 'Miguel Tigre', 'Masculino', '60', '2000-06-20', 'Guarico'),
(18, 10, '25656787', 'Miguel Tigre', 'Masculino', '60', '2000-01-01', 'Monagas'),
(43, 35, '32722063', 'gregorio verde', 'Masculino', '65', '2006-01-07', 'Lara'),
(44, 35, '29831184', 'Diego Aguilar', 'Masculino', '60', '2002-12-22', 'Portuguesa'),
(45, 35, '45435345', 'joanna carrasco', 'Femenino', '64', '1976-04-23', 'Lara'),
(46, 35, '25235364', 'Elizabeth Martines', 'Femenino', '73', '2000-03-12', 'Aragua'),
(47, 35, '2345234', 'Henyerber', 'Masculino', '70', '2000-12-12', 'Lara'),
(48, 35, '2355235', 'Keyber daza', 'Masculino', '78', '1999-02-21', 'Lara'),
(49, 35, '5465464', 'Victor alfonso', 'Masculino', '64', '1998-02-23', 'Caracas'),
(50, 35, '4534533', 'Nicol', 'Femenino', '64', '2003-11-23', 'Merida'),
(51, 36, '25235364', 'Elizabeth Martines', 'Femenino', '73', '2000-03-12', 'Caracas'),
(52, 36, '45435345', 'joanna carrasco', 'Femenino', '64', '1976-04-23', 'Portuguesa'),
(53, 36, '4543534', 'leydi mejia', 'Femenino', '60', '1976-04-23', 'Trujillo'),
(54, 36, '4324234', 'Yoalis rosa', 'Femenino', '66', '2000-02-25', 'Lara'),
(55, 36, '2131231', 'Marugenia', 'Femenino', '59', '1997-02-12', 'Merida'),
(56, 36, '32432423', 'Yolieth', 'Femenino', '58', '2021-02-21', 'Cojedes'),
(57, 36, '3256465', 'Maricza', 'Femenino', '59', '2000-03-21', 'Lara'),
(58, 35, '24324552', 'Josmar flores', 'Masculino', '68', '1999-03-21', 'Barinas'),
(59, 36, '43543453', 'Pedro verde', 'Masculino', '56', '1998-03-21', 'Nueva Esparta'),
(60, 36, '45423242', 'Pepito', 'Masculino', '56', '1999-02-21', 'Lara');

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
(1, 1, 1, 'true', 'true', 'true', 'true'),
(2, 1, 2, 'true', 'true', 'true', 'true'),
(3, 1, 3, 'true', 'true', 'true', 'true'),
(4, 1, 4, 'true', 'true', 'true', 'true'),
(5, 1, 5, 'true', 'true', 'true', 'true'),
(6, 1, 6, 'true', 'true', 'true', 'true'),
(7, 1, 7, 'true', 'true', 'true', 'true'),
(8, 1, 8, 'true', 'true', 'true', 'true'),
(9, 1, 9, 'true', 'true', 'true', 'true'),
(10, 1, 10, 'true', 'true', 'true', 'true'),
(11, 1, 11, 'true', 'true', 'true', 'true'),
(12, 1, 12, 'true', 'true', 'true', 'true'),
(13, 1, 13, 'true', 'true', 'true', 'true'),
(15, 1, 21, 'true', 'true', 'true', 'true'),
(16, 5, 1, 'true', 'true', 'true', 'true'),
(17, 5, 2, 'true', 'true', 'true', 'true'),
(18, 5, 3, 'true', 'true', 'true', 'true'),
(19, 5, 4, 'true', 'true', 'true', 'true'),
(20, 5, 5, 'true', 'true', 'true', 'true'),
(21, 5, 6, 'true', 'true', 'true', 'true'),
(22, 5, 10, 'true', 'true', 'true', 'true'),
(24, 5, 11, 'true', 'true', 'true', 'true'),
(25, 5, 12, 'true', 'true', 'true', 'true'),
(26, 5, 13, 'true', 'true', 'true', 'true'),
(28, 5, 15, 'true', 'true', 'true', 'true'),
(49, 12, 1, 'true', 'true', 'true', 'true'),
(50, 12, 3, 'true', 'true', 'true', 'true'),
(51, 12, 4, 'true', 'true', 'true', 'true'),
(52, 12, 5, 'true', 'true', 'true', 'true');

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

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `id_club`, `cedula`, `nombre`, `apellido`, `telefono`, `cargo`, `direccion`) VALUES
(1, 18, '14525135', 'jose', 'ramon', '04122535621', 'Entrenador', 'La miel'),
(10, 88, '15432785', 'Luisa Maria', 'Perez Rangel', '04167589012', 'Secretaria', 'Jose gregorio'),
(11, 87, '7659325', 'Raul Marcos', 'Guimenez Lopez', '04260568894', 'Entrenador', 'San vicente'),
(12, 19, '7945745', 'Evanyhelis Sofia', 'Gonzales Lopez', '04145381436', 'Administrador', 'Montezuma'),
(13, 18, '28463265', 'Carlos gomez', 'Suarez', '04123468999', 'Entrenador', 'caribe'),
(14, 19, '7403322', 'Mireya', 'peña', '02514476519', 'Secretaria', 'cerritos blanco'),
(15, 87, '8543336', 'Vanesa', 'verde', '04145678934', 'Secretaria', 'Montezuma'),
(16, 88, '17034388', 'Carmen', 'rojas', '04246784566', 'Secretaria', 'El cuji'),
(17, 87, '12312311', 'Carlos', 'mujica', '04148658694', 'Administrador', 'core 4'),
(18, 18, '32432533', 'Angel', 'Delgado', '04145696032', 'Entrenador', 'Tostado'),
(19, 88, '35236243', 'Cesar', 'verde', '02514478645', 'Administrador', 'Centro'),
(20, 87, '30591237', 'luis', 'perdomo', '67844211243', 'Administrador', 'cabudare');

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
  `contrasena` varchar(250) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `id_rol`, `nombre`, `contrasena`, `correo`, `token`) VALUES
(12092166, 12, 'raul', '$2y$12$gCQc3MS3ItRAiu/djjHaSu2T2rSESMr3Tq6NSRA1eJHicmjcO9htq', '', ''),
(13504699, 12, 'pastora', '$2y$12$to55oNa4jumkO9pVaB4NUe6I3CjPjq1vuDEE/EhSebhBE2Ws63dAm', 'pastora2@correo.com', '25b82c8b0e53eab47ce330e770f0806d'),
(29604245, 1, 'Ruander Cuello', '$2y$12$bF1cG.EVFW3T7DmISUUED.6foycYTwJscssYnuMBhb5Uxcm.biAjK', '', ''),
(29831184, 1, 'Diego Aguilar', '$2y$12$.MqG..IuD1tKj8YOvT4SMOzK5jo19O7CVdLecLEuA2L2QImwWRaJK', 'diegoaguilar221202@gmail.com', 'ada1400bcb1618d28ab9bec0e274ac03'),
(29945099, 1, 'Cirez Barriga', '$2y$12$MvJlskHkIyRYtG5rInwbLe9f2Te.cP2g5V3HaD.1fwVWB8aaBboOy', '', ''),
(30591237, 1, 'Luis Perdomo', '$2y$12$RpARghZuVmSBALdC/YSz1un1bufhbq5NgSspTHAZGIWKuJa784RcS', '', ''),
(31027594, 12, 'jermain silva', '$2y$12$OcI.ZBoD88RnwAM3xuWoyu79I2aYIrunhWsy/LYN91a8wwHdUErsC', 'jermain@correo.com', 'b355ebd374e78d5b5f7cbbb8515c2e11');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `bitacora_usuario`
--
ALTER TABLE `bitacora_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clubes`
--
ALTER TABLE `clubes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de tabla clubes', AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT de la tabla `emparejamientos`
--
ALTER TABLE `emparejamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `informacion_medica`
--
ALTER TABLE `informacion_medica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `informacion_socioeconomica`
--
ALTER TABLE `informacion_socioeconomica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `inscripcion_evento`
--
ALTER TABLE `inscripcion_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `intermediaria`
--
ALTER TABLE `intermediaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de tabla personal', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
