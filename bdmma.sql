-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2023 a las 19:55:25
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
  `accion_realizada` text NOT NULL COMMENT 'accion que realizo el usuario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubes`
--

CREATE TABLE `clubes` (
  `id` int(11) NOT NULL COMMENT 'id de tabla clubes',
  `codigo` varchar(30) NOT NULL COMMENT 'codigo del club',
  `nombre` varchar(50) NOT NULL,
  `telefono` text NOT NULL,
  `deportebase` text NOT NULL COMMENT 'deporte que practica el club',
  `direccion` text NOT NULL COMMENT 'direccion donde se ubica el club'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clubes`
--

INSERT INTO `clubes` (`id`, `codigo`, `nombre`, `telefono`, `deportebase`, `direccion`) VALUES
(18, 'rerere', 'Club Poderoso', 'ZjaaRmv00Dz+g6M8GpiTbh88UiuOnNc2jVxdNO6aqtWY75V5fQFUJr8tTyI2MOEh6Qu5SDNNXHc1mPgSVESWNF94btg+fLUYGqwm6gidAy+jLuamsKBEKrGo6vyATQDwiqYJe6LmscWhH8Zg2Nve/5OLz7dwa8vcsYr06r+RghRLU/MIuuKsInLAHJlsAWIPDlCsBRx/lTOErXJqwK7IBIXQZKaRT9JzC3M70zTZDl0Abo05nIIyRO06L5oOIUj/sO11GPh8ft3OIVM3MrQFVe3ojEe94XEEJ8pQmzNu2Aab2rYynUXFDIp2u6ECZG1+H7ld2SvF66MqQXJxOE4BnA==', 'J5SjI0lMQd7VFZZAjV6lmYP2Zf7fu4OVRG+4cmlNaabPmSxzwA2TF8Pr4fppu5gS8DMYatthSlT4+q6TN/695CJRz4HFqNUDoZvo+mE3zCqoOAqv2CKiLPS2xxdd9b2ijXepULfucNwWYONhslrcGoLfNgs9VEAHwuKoGB2bK66bFWBIV1zItNGpMAR2Dz4P3M24Q2uyb5PLogUKQcSq+xy5NdfFBvzaZgS7r/lwzj5YejYZgNvBhS6gyrp2cmxIjbb2LSnH8O6A9jueLdLN8cWXUWhiugy89mfVXrplTALh+H56Ptq28cLrkK7rURPBIe/w/Hs+l5ausdhdn/8Fpw==', 'c5qTFit0vwqfcx1hsAlSs7FqwGSNjED+n7HAqu7irZ0LvY9ojKjWIlcs2JcCtojMyhR/Uf1by5w5ztHQhE+e5sRXPZvFe0nVabTQQ9bgZ0XEI22IP7GY1oksJ2B3jTlgCM/HZNq0dDqpJafojPCOrN2211wczWQt83kckw11/isDxaCxkwVW0II0k/vEXfcL1uunv8goHaUVrFmu9vWsW4cQtQr1nv+kVOSxw+U/gq/HpqRdWcfsqUMmk7zRYjzQSVLcB5psTgmIjO/ZNqp7YAnUnJgFWY1uRF0ROOGFS/z1dAymoJ1VvIAAF/Jy13gkYCzKA4OKQGWLKVUmo5NQYw=='),
(19, 'deded', 'juanes', 'gCX9rcx7p6dxlmIuQbS5cHZEqGAKnCfdgxKv3He5nFlBwPit2DzDO/mN+gqIIg5EfCRfPDfErcFZu6ccB88KhamEY/tCb9TcuqdYvlcVn5SiSwQJfUX2jqzu1T+pz9vZ8jAckVqd1wF3Z2ceK0rOkXgVB5G7vEoXeLz78St9orWX1MAcUHE/A4VTl5YVrkFY4uKtkk3Z6bO5Qr8ylvUxTyw6o/5TJqTp4yW7jBhzytDDPePzsglRJsYY1Fdf3g1/egL/6Uf0eTxEf9bLiiqa84zNHb6uuOCq8b/XslE4fJ+c2b6m8Q6yb6OnqpiUlce24xW6sUE+tXGKJQHmoA4M+w==', 'gDWNRcQKFPg8JJhN24BxYbAG6Si9ZD50ev8+g/0F8zJ8lbKfI+6EJW7eEkYP/UTEUYXXkysYa3rYJNOp2JAxmbh/Dh9osIJruvtvvCfuzZtczSKm28Ips39iNkKTcIxIDmwbnZyHUgraOqCKcY8DBnfB+J5Kujm+LaNxvAb+XE+VDQRVwqwyvIRQzC2LGZ8Gy6u1duonPTN+el7VF3dvsyVFm88zyvAd0lfIei36rMhTAtYnwsSfbYKcUy7skH0YiNz7Mzoi5waww6a6OuGaFzybBLuGSZ/bG20iUScNlTHcrLJw0NJFNS1DXVSgPy/XUn6muqhi/gYN6RnW5biNSA==', 'T7VOFPwfZCttjNufu2mkVbdP8ZpbsGyFTMmu+HqpVyXuT/foRBwRFchlwsdP2wkCKRCgi9hlvpp6yCU8fSx6xHmSnBRWipOkfcxSmDuoIZEHOd1jlSsMdAw+JPFTgl+MlzRexZtMPwpRasa71AuD5pl4n9SY4lpkhmlV1vAFi2Jd4qQLJOos95BoH2N7MDmNUxxH3pEHdrz/ttPYV7hKtTLgyFir6dnQvyMuOxU5gu0ndwnYUSKbFtAy/ro3xgw68mgzQvVqeI/GOyToMT0VDbyU2RKK4GGF5fNyBVTsC6eKN0Oc6k3bxsjboJdQA+8lboWiImepePl7BAPG6ewwQA=='),
(87, 'Lucha32', 'The Black', 'EmrmopVtHL7qCITV8/B4PeQDBHvCW0ZVZ663R0+yDmYWyKJwcoDmj5BpI2IVBJ/FqMdqLSrFKtCg+jvl25H4izg5JX64L1u0xLBGVT1PHan3yc5mFgu4RWxgyk6lRt8nCPOVK+i6+V/r2KD1LDQQSoVoikxJN+SHH2XZ8mTb2chxHk2mJdNVSjCu+IJmipZuvTzGnLHd1egIwxM6W2Q+gdB9VtO/kAOwSAQBsaxD2MtTKdsnKXadKy6M5tBqmLohZnB/AQmVfkLUZs2BKvpvOi1lBAQYO+tFvwxpHUEd94zSzHubyhcREDB7yaiE7ReI039VJdzPsijzLIZuj+UIMw==', 'o5GpmDMpXVq6lsORA+UGdpURoeFALJ5qJW+3ZYPSTB3Nxhkm38VSzfRNnRrspfqqdqure+06XcgKl/Y5FpR0kmTvlsikvCIGG+ItDd7hftR8i43JfrPD5rLobVmivmnKf4lGOoW1jQzAnCXwzqVfdRaDCYwMF0GwCbt+Gsoxwh+EnevV7gAq+zUI0f6maGr69qfUCCPKnrMu9zm+ArCXAGcywTIQAlGeO4hAizR1/Qd2APc4NVUbVgBhx0IjQY0JeBOYFkBfYDzbV4fHxlJXhX2TbLSwztacqKsGUgDnV21T/UmyFPVLSUgH3p0SWw9ly+E5DKGfPdSKud62Q8N96A==', 'rGdFDoGk4nnaY9C2K1ds6Acf/WYXDPIRewSheyxI2aRX5tNz7j+wnwR2shSdjFiXI44pIDZWoDVYfHdKswhgy1Is1rCJFRODr2ZlAmktD8fv8yK6LCv6O0Pjhu9jUHKAgXiwvokK1CDd1I5r2gw9DZPG0yrQW6UJKQ3wOa8ul/K9H72DHnI6AjLrfykGNSNl7q+lXmquhJeuUBP8wUwlRl1A8G4sJTVjYysNIKGaCq1f0zgCm/Mv26nVsvd7ORZQjIWWfb5gllV1cdvMqX6bG7Hn365h/Kr7WDygYE8F3wBkrnuKE4qBSxY3GquGwyvSaQhp6G76NcLVIfEiBuXKjQ=='),
(88, 'recre11', 'Boxeo05', 'JBbmiiLz9smIBexpYxukRiBMw6Khtasta2onoE2Df5sR+5CB1dv73hP5zPTofuTCTIg7rhuOneqKOok3WOJhobP1LksNh65foIxnhkBCre+tKv/hzdsAAjBmjoRKJZSA4qW5F2JzOTga0vPut2+OuHvm3BFntMjfrf7VLgbtcjg6wrp7asJpxQCzHLFPCQw3TW+PIH+s9m55qJAraGq2VCVwvr+1DBsxMrvUxLhQ8q6cR/rOvOzbp9HMoTKuAFXbjzxbA2UBPiOrjR8T3Uo32pfPOemO++NS0M64P/wHUOwfGTwdAnW/imcBWxS2NOvEbmXi2Og2ar/wFbjDaPIBoA==', 'iYvRgeE83z6KDtmss6yA21FR96jUbFcpJSMuCD2MZnndo/SW5QQWgUueIZSQIOb8wNdNXAnRL39h0LXRzqm1XvZKL8soFSRa5BLai/DWURMW4+4zh/W2as9CFSptfqufcWN2mZv3WQVuhfNHEokzvoolHmtqNGqiPkgMQ9Xa1Zhxpo2fPejps0da8Msv/iWvJvvxsSniYJoubY2ETutmkOKxBFkk5Vx/OMIPMI5qTkPjHhB9gyk1TXHJPt5i2OOtRaztZBY3dQQ98kvmamjoeGKmFPExOiWSo/l8PgIJRZYkTZ9bq6FHKURTQueqQ1NPZLOyGYtjJzSV9ji/5FN0WQ==', 'lX8UkfcCa1gTJ8Ok1CV+WDUuDY+jpCW4nmhDhELD5lrNbpHaTaCL2a4e6T9SFqWtc5DMW78pRDA/anpGqfBGfIbioYy/Z9VvE9jqZh3YQH+0nC7TV+wKmtMFIImlaKmBBgLNFgilMKHi1mN9GQNmIyksULM7UiquXTqm+KBGClEhtzh7juLXYlEWbOye0AiE6Vp6tZ+TglVjJ68NsugQNQG24E1Ob/md5fNEgmt8FwzfME2ua7ena2loLCr3xpFUHDfGnIYcDElbFwKNh66GSy90gdt4D8plc4gOy3L37vrHoYfqF7HxGxXf+mgeoJCgoysrOxGJoxV89zA0ZAeVXA=='),
(162, 'jbjbjj', 'the bulldogs', 'Q9gu8MlHiQsa0kcUW0BvP+YpV1X9jNvvVbauG3kEHgToL2eldloLvmvKAqcluWLf6q+zr3Ici0UJw4EjVbLClJMCrX9zzdVDvmxd8y4qdLgRHm2MsTlgHbJfHqZFNx1owaeKdnD3YYzbe3JBFxdiQWhLSngl+Euz4t3vVCLA0Bnzy7EsES/jPxexTK8Nb/YmmSEBE9GVURCn5zYh/GIgAGSP9JpcDfdqEBj/MBO8KqP+FLGz2mN8+fD52z4uZ7vYBwQAZLTpQbVSd3EoLoA9/TL30gWW3j4qLvCuWMa7urzrKLckJ2mlzJ2xCuwxaNdq97DsMaYManwTM0BNuIHU7w==', 'ggsy900nckrrWr89BSftciFF0dD7nb+pxKqbskX9WPc4JoSX8QxgipC9EcxepQH1fGR3iy/vphw1gmyjhDNpxzqu8qHa2lgmMXOtj5KR1Y2J2eTsu9m8yebjOiSgiIxW2sX9UpD+OT35J687w8QaVv7ALaOFXCK+fCH0CU9VONTwZhs73zAudDjDfj5ghBJVlfqVcLi2Z6DTs1PQN9FqMgmF17yF4uoPftTDRkDcpZ7OU5GrInfTygV5tl5z1FF+1jBTnFGdWKmugid5LE3OQJqIzSDKCgkpSnt7KtCZZzJrpgKbSx0FyF8eFnEEIGYhxf/6R6pnRfjv7PkzwKPuTQ==', 'bl6iCun/Exr/dwlYposAToaQQgi2obEQJGU4rYjrG3C7acoNoKkF2AA4LYClE2tEasFdoGFwrkE1Cei6j0GCfEfgHQS1C9AQmHEdVL1rRBn9r9GT9crLhwFn39QMHVX6Ld2XI0xk+8TRBm9JbValeb8GupLkbbofmriIZwc3Q0GUP8y+48L8ZvTPoena2psiwCMfFupTbydceQVLoSLfaz0optbwr0cfkd6L76ObXIlIxWePTlrB1joJwzel/UmCOCoXF9ZWVrcZCANGbWcUqgeWwiuJFpO6d7gUiwtcjZiSIYjU//EdM5Ogx0jylmn704ppgOyxMOk1bc/A/4vAjw=='),
(165, 'dwdwdw', 'aves peligrosas', 'OIoncDrSQmm4YCkc2vYsmdwdKEnoJzHTIN5DUvqCN9rEgZq76FTdSOCgEXVIPsSLufFQiSP6YHX9pOWA9a3vsyxFJvp/6l95eFalSDHtTH/YmLmnbfOSJJlA69Qdg3KOWdyuOSmdUZRdXFx4fORQUTC3N/QDt1L6YyEkxgPpCQ/pJSlpc+DivTT5/02D4Jc+pJKYhCz8vWMyNZi/T8y0dKYB7T2ViZaJyh1MN+U5ysNft4acg00sVIndABYjGMaglBRkHXP+gmyHor32IlyvdwZMeOTVPlNZAGcAjdY/ZuxYewOvIQMGdDwyHabhBpZvihQ/gqwo+AbteyCT3oV76g==', 'ngKj1UDonF1oUMRndb85EstI80KjO4J0vfs+ZvLpRW7KJKYU+3D1uNXjNudKlMhSNa+7pP/px+dO5jrHg27GVnQRAvxqFjOeuZX3wcGFsvLvHXe5abuHUIiPcEFLUGGzgNzgUk4b9Z98sioMIfrbh22ciyXHh3D+v/7S1IC80rkcFpK2dDgZZ/UmUfFOyJp2mwfhcSoRp+WtJ2TVmXsYEr9Rt9ju5nPjM1YJwuCA7Tmbic2dv7AhIMgf3PnowqWmocnZioi/a1IhwdRKXFd0qeag9I6X9RrAatMKc5iolJkHPGOB4dNHqw4UUQ/DCBua6VP1Z1UNv6Z6vOb55vViaw==', 'GqGE0NBYpU8embuDO4FtiqrFlwqlTgB3GKvzvYYPDPaQQdbIwmaoFdHu0AjCiZyER+ZJMPjAdrCV2yX0S+IJnTNJfJhXqH3rbtPwKmHZO1gjTNg6luOuREHk0eCqdHlB+loGG9XK6O6dnpBd4julQnDUvDl5uq+6g4sk3LxzN/mHdL840uNJobX6eWnN8/RNB0kE1gtvwfji0dtAww3B5WfE1CCT585xGmfirkApQGBuYh6cORdYGBEv7h/ayw/eFphNz9faUjw8FF20UlCzOUAUlvym+DUlsiGbVv+RHgwrNnwNRiXnf7omdsPgsp1xasJt/nlKQ9tTZBCqbgSpBQ==');

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
  `monto` varchar(20) NOT NULL COMMENT 'precio de inscripcion al torneo',
  `direccion` varchar(100) NOT NULL COMMENT 'ubicacion que se realizara el torneo ',
  `juez1` varchar(50) NOT NULL,
  `juez2` varchar(50) NOT NULL,
  `juez3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `id_club`, `nombre`, `fecha`, `hora`, `monto`, `direccion`, `juez1`, `juez2`, `juez3`) VALUES
(9, 18, 'pelea nacionales', '2022-11-05', '19:30', '15$', 'barquisimeto', 'ramon', 'julio', 'riwel'),
(10, 18, 'peleasss', '2022-11-04', '11:18', '12.12', 'barquisimeto', 'ramon', 'jose miguel', 'riwel'),
(35, 88, 'Four15', '2023-04-20', '10:33', '10$', 'Asociacion artes marciales mixta lara', 'Carlos', 'Jesus', 'Ricardo'),
(36, 87, 'YZ24B10', '2023-04-12', '08:50', '18$', 'La miel', 'Diego', 'Luiz', 'Ruander'),
(37, 88, 'COD MOBILE', '2023-04-29', '10:11', '12$', 'obelisco', 'Ricardo', 'Braulio', 'Diego');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_medica`
--

CREATE TABLE `informacion_medica` (
  `id` int(11) NOT NULL,
  `id_atleta` int(11) NOT NULL COMMENT 'foranea referenciada de la tabla atletas',
  `medicamento` varchar(100) NOT NULL COMMENT 'medicamento que consume',
  `enfermedad` text NOT NULL COMMENT 'enfermedad que posea el atleta',
  `discapacidad` text NOT NULL COMMENT 'discapacidad que posea el atleta',
  `dieta` varchar(100) NOT NULL COMMENT 'si posee dieta alimenticia estricta',
  `enfermedades_pasadas` text NOT NULL COMMENT 'enfermedad que tuvo anteriormente el atleta',
  `nombre_parentesco` varchar(50) NOT NULL COMMENT 'nombre de persona encargada del atleta en caso de emergencia',
  `telefono_parentesco` varchar(20) NOT NULL COMMENT 'telefono en caso de emergencia',
  `tipo_parentesco` varchar(20) NOT NULL COMMENT 'relacion de la persona con el atleta'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informacion_medica`
--

INSERT INTO `informacion_medica` (`id`, `id_atleta`, `medicamento`, `enfermedad`, `discapacidad`, `dieta`, `enfermedades_pasadas`, `nombre_parentesco`, `telefono_parentesco`, `tipo_parentesco`) VALUES
(1, 3, 'ninguno', 'YrqxHy5TS/e5g61tyoKyJypvDM5dvOqx5SWYLgeuQIUwgLFRReH+MH7cBBA8BHUWML3k4lsjnICSDBsNn5eV7ElicWJlkL8GP5rXFInaB4+pxCXML6WxL5dsCWCFfxgMJKVrczmkShTuK8J/rdXTEfcnlfUrcapO1LBaGSpkQfAstwwlUspDO0JJAGcTkKZr397TN9wNVndpdR92XhRJ6P+WwyMFNSDFLz51FG4PK42FX1jfOdStzDg8DRhAEuasvOJAKoGjjFlZKIRo+CgCE9t4VsC52kHQeuhz4Xv+/pq9YJ2oGTh9XaQq3KUkbGG9Q+vQmr0GJoL298QLFKRbSg==', 'R2KJow7knfspUJD9YfWpL8MZ1CQM3cJmWHwCvYbZws2wEHxtjDrsuqREefgmClQLwiCke0iohAQqCduEL6eosWXPxmRZ3OMKz0xyXXQwfpQWkwH2H9w3MMrdIMsOgTMyvyP37Xh0IH/q9wBf0FfrGSoQi/HsncDwuQANg7lxdtCxNgpOBMp4LDxNZOIXVWZPREdRmazn5qwh9o7Svum62UAOlEKB44+2dvf2W8jkRWwPZBVYW7jHPMRf+OJJmYHgXqsb1OkYeVI0B6Epn98xyiN8A4lhr6n7hxZKq9Ym7O+Bh4dOW3F7Vi/ZDYUA02nsGmQHU9V/hgUnmrmdm5/TUQ==', 'arepa', 'Zuf4qTP8Z5iIp+hjUt9O2H2oR0xIzZKxDubzlEqpRGowBtSsscnme0x/mIKVQo2/nfZFwd6dG699IMwXDH/J/vvJFV6wVC3cjSnAAQazbnkV2OSjGApqWfFnLgv/nuYlvIwpN+49c2VqCIW1Uf1ecwRgATCa5764MRu+Ws9jzCpGpgMCLl6qHuaSRfNDZZ/N/GjSbjMv2UA3GYZ1tj6EFLhAHCPzGxGACHyk3uf1steaY5OCadDKm5MA58AGQxg50XGPXD5m7t8Ot5T41/kswLFaCxz/EFHaQHVcEbAWv2PJXVpm25pynUDP3rDaKuqchuZCYqfr9slLreUOPx2zpg==', 'pastora suarez', '04122448721', 'mamá'),
(10, 28, 'Hierro', 'WV5wZVqrTaP8qfj04YBdLTYAZpEVnAINuAXUHwgICdLGuK//19RE5LeE8jhBm5my3i+BUFmk98PpoErlcxcV9lSPKsOqbFJ3lfjM76WXjjp9MQhjkuCJO0vM4BQj19yMdaTN3DsPgfP5iDDp/OdIqSdDTjq+YK/Yn3otrRwrJi8uhDoGuR8Y9KYczdH7lUNIAkceIMl9zEDXjhKIMFE46HEKDGakeEAj+VBj0qyuREFD3kwUyxLX/ia+wUrY1S6O9im8BBUDksbmKMI6wNHLC+LVZZQUjZMlyu/fagmoeiW1vIIdUrURxDaEK+Hm8G1TpsQvdz2e8fc3ek7+kGJP1w==', 'l0yiVTujbF9SefkpJre7GhzpVdPpshhWzKZ7SHMjeV81N/IZJarCsJE5ZeAn74sB+Q5c9PNeDj3LfeCNYLKrNX9W2Fx+fp8dNTOPc8WByRAsxVaAhpoPcPqoHTD7wwQGRUZkRJSKRhfusGs95XX2jNPE3EvPHWzXLi29FVhug6uqkVX0eXZy65Sn0StHIO2XhaaixvjXRGxcRpz/XEZ6Wv2o6RZZjAtomjStCQwKb1t3l3UvK1YAfu3nXn2VS9touWtPV9WQxstUI8WeSX/EfR5FRTmclFP1iplY6YcRaySCyfU399QzdaASaO8WjpU5EUbOJmfl9ttHfCV6A26H3g==', 'Proteina', 'RXsnuhxUWkLeYUxJmIi3GeP03Xk7fDKUj9Wnc6maAVvINjTGIicHxbVMrlvO/TjT3BJk2ZLFSQln/ItepxsIWachP8OtaeVcN5UbY3cL0FZ9jp8C811EZOSEFKKenM54k9P0KFbcjdyyF6fyierualPZVWS7v017N8sgs+VBbw6Qe5q3WfEEvphlss2WFf2TSJsliqDCU98WjsbVedL6kDRos8RUmIGPpcRtJXDdoWEU4kcUNlx3m1fK258SO5uzn5ynQRJrll6tqsdLzvwtxCEOT1cy2aE/E4V2XeKUkpPW5kWBThvfiqm1ITP2jK0cR8jvRpiNWpdBP0NGQmaNHw==', 'Ruangel cuello', '02514477665', 'Hermano'),
(11, 29, 'Cloritomazol', 'YKau5ADyseVbj0cTdoXUb7T5Feis6B3dCgDxiyfpo+yctQrIDZerqvHNwgVwz+h1k7tAmm054UnUy3qVQlXyo00O5F0aoX9RU5P1bvSSJ2/TB97bne32H2cUcJuTlXSD0ubY9liy1qLse+oZ+5XSbnlWMevvXebZeOnNL5MREXJ2Np3orFdn3zQIvhNMfGYyR1O58OTIvO6zOBA3abnutzbpOhWhq2Te20FPzW8c8I3q9+q9WobgDWpFabyYgB2584t9K4HF1O4659g0KlZnHIRQVUfoKXPywI3aQBloNISHo0tz+Ix+HzpRhoqq5JE0wSn/v3glAb+kzB86I9G4LA==', 'hfcecg4PqC/+BiwdQW3sqS1lK1ZJLi0kmULIeSOJee0lLlPM/m1oTpmPZzc0uq4yWW0M6O9DxUv3mjr9E/RIcmxWKAvhrNnKFca9eYIpf8CWmFOonCtFbJezPvzEh9OptKCXq1/Lzk0DeBoAc0m32iouYtLxkCFX3pLbEoAc+IFW75RWZ4+j7T+JVvm7LXVjv3BJANZuwOBUTp4lDacY8xOS7TybrSCTjF4pmO7FaVBemdHhmBsWnQqQZDdTD2QKY89PrmjiMkfAyZj4Kycrjol36t9MU38gPmrq/xNkkkp/1rja91BadWRyUHO9QynG2hhn1Wk2pViOsh+NjMK3IQ==', 'ninguno', 'D19dxdTUg2/Gg1S+XyLL0sv/PusasG+eK6AxMyeiGQR0EGkgcUHcSmGPaHXPb9st7c/WkS2eL8gR537Xk5Q4wimGp7HzSLmNl6OiUuURPJkFoxE8D8YJnSfQ8tpobkYgSqq65mTBLm3/Qe023NxOtJc10xRPW3kgmVEzgefF8COWNJ59ByETQPblrhDIvzNzv+D6m1vRfw8+p+W0cEm+YFxgCMMubyP+TyBEkb3LI97yuZLaEs/WOwp/mhyZzWGD3bqYF52MO0o7GYoDb+bn6B8GLI1nDE2GMjagHYFniNN3nLTjyOC9DNVvoSaD/UTq9SwF7vYFQIFtgHg/AbYC5w==', 'Ruander', '04245673490', 'Hermano'),
(12, 30, 'ninguno', 'oSJkSJ0pmGgTT1u9dlQREKsOT4WE1T/P9Xc5kUQCN4f5gSODy87r/nKHvFVVUnqqPOwDS+zb0zSOwQJEvNHF7zaaEtYSAPH/HJoNqpjlEyZv0Eo2WsIDljrUx/55H3CbzocjlxBnLSQmpFg06gweYm3CBqw7vmTN926aGjFFP4dELdtSjYMqEc4tSedC6m478KOOWgteNiBjDl4xpegv9Z97MnH1+1/OyLPPPi1b2owdh2rhHnhKS6jVf0fFIZdCajG1OMc5WvDzenJkDfcl5nCymdPN/XpHKbiPK//D+PqvYOe1YEhLzdx2jWzvgFeJMH5lLFZArVg2lEX46Q5W3g==', 'ix048V5RqMaWjUQmI1IAbpwLY9ypax0W/f9Aa+sBmRGdQnSm6TuGKteLORdAJfEulg7GpL/vzvr7cnnVBc6BB0NMqZ1TZfx5lP/oyjP96N/O7hr57ePNXwVAQ6J1Nik1V0H9HTfNkyy8653I/3MYbasNTDphmclbcymgGHO5vr5Q/l734icGjUaXAolAZrHDiHn4ShDj9uinXy8QDjx5HIZWStqVsm7U8XY7BcLC8Aq4GTN2q8dBdMzStxvccoB2GQgwZZH1ttkSqSWAkFmTSEeDOKk+7ITpnZLyzIAuQTl+zoINT+6aPnUPIdFUw0pMouigV/Y4KDKLIqAoah56gg==', 'Sueros', 'XDdBQd+uiK+ivg7HHeXGlEPCrIJX8ocf4EBs6l1H3bKc9sGvvLeDeT82o+0iKrtKbZE0KuAUrZvYhP/UFtaoPl2z4UoemjEx8exIDmciNLbEcS8f4gCxrnOXgdQGt1OwJ+Ni4liwMSPMYn9LiHEqFWrMga5d+EMp4LC4l4QRi3hS5tkYBnSmmhFA4wafoOG8oxmLv5me9yWlSSf8SZu1/AlGgXSvs+zaihEDpW6kNXqZ06lXzH3028gnfEs0ytd+7ncJv+dN5n0NZfVYXzf7gJUB3bFuj09qLtEiwVsfTvVwGYslCQHx/1u4ZTsizZamKZ3bXldLw7qr9dJ5lmU6+A==', 'Carlos gomeaz', '04245678432', 'Entrenador'),
(13, 36, 'Ninguna', 'bHKUQAmFTGl/v7nJyqcys6UG8/lu8gpOb+7m9SJrt1BiSGMEv2+deVbe6hZlM27YhTJGeTwPaBDnIr9anFmbfhuZ0RpgUkwoKTulc6RCyMckKLJ8O3zsq95G568WeFXFZMgKsK1UaTLG9ntxsjaZgtPQeHagFvA9opMbD55ZG90ylZ6kAAYSnlXrFtwv3Vlz6JATWBOmSFjvZilGPYHqa/RUI+okFukVAbkly2WFIKOeH48m8lHc7M623gJcMQsrVESnAHeSBEWzSRQwe9JLkXci6Y1AKvzxEWxO9P9yxQAEvRqy5hk1ctqvymGkC+vnIRirtYAyeUh4IU9mSrcehw==', 'AyKU0D3POOGA+tFzCwFqKl6y6EyNqNMtpBSef07wswKv5kC+IUCuOnlnW9UqiEpJe+T+Hg4KUq3woLoWH6BmHE5LDSXnXrXB7QhjysSHPBPl7VQQwMeIbsWBij20covH+T/+psUfCfjd1I+7whLI6L/7bxboIJzKBnIWTmC69L/A5jdZ9TZj2bmZpnf+7zUFRW5ZdlaavUT/q6R3fb7eEWPHtI9iAeLMTv8TVchQV4PvtqcHqdR5iUtyE7ztMiXTzRxuURlB794CWp3d9Qb5ScswY8nbdjL24rcVPZauCgtvy8jpe4TTbheNmmDofLkBUrvEl1bqftiyBVIU33PyMQ==', 'Vitaminas', 'cmXy9L1Yk/SRQt3xPJ5mhONlcbxreFt41W2x36wL9P4reS0Boi8POyCr9P0tepRd0wiiTQ5rvmLiuCWIO8VhQUmt/AVlbaicwpwBFq/c4hFPokkyciErWeUje9AkwYSVK/MqhvQthFmf/VDTMs4SNA7GVd5No71Pcs6eEWEqx5YoCfDSLYntGtCDhPJKEIjKYmulEP1KE55C+8tt8JE8AsAvjIEL5C1w8my4t7MUI/Iy/FaFpNQi6WM2P/ezGZ51WboWBZb3Xy8XEalpPjG2gyiVWe9d/8tyeHmChhpyFIxcA+t2VB0Xb2uRQmm25rn9MIQpMDll1YlX0beZoYP42w==', 'Ricardo', '04245678954', 'Padre'),
(14, 33, 'Clorazepan', 'pcCcpM5ED204Jcqlmv5o96iOsH/cw9BuHF642bLU+AQdIY0gECgi7BuRLrXgrLCKp1eEo9tePUtT/qU/6+iV0Y3nhTnD2kviV8qUcOQ7/wnCYR99Jf+wT4paIFByJmxfL6b572DIt4Om0ZDsocbbYoWeZXc3S88Jbj5ymmUbFcAuq4loCU5Ffoy51UwFWvRxLbY1q8+bp9tL+g7IuGQrGQFvwKE5RPZdbLatXQk39Z5wZGiZdxhwWKJcpEwOfVUQ5K3B8nlkhcQLWGLkNMFaCfYaPNrs49p5sRvSCF7uXVaUOaN2610+J9z1s86x7ez7e+DUlBRAHe2cfkEeKIaYyw==', 'a6SOg6g9KH4caog5X4So//jSIxKP7fsxT5GHuT8oDJj4svlw7eoRe3SC3KaW2ORaB4GTptaA2xW2KehVNMnJskFOrT0UElF/3tKME0h8/YL42QbS6dhIgdcwhL3yjCM6nzilnZJAj2JI3C810/0g+Tpez5pp4SH+9Chw7FkbEz+CYfneIKETRSXF6TqYOxLp6YSxKOwIFxCn+Ohn7HFKSPGEmqZ52P7QTKXGhkyOChWb80rszXAq+u3sm74VbqGUn2qjMb1oneuLfidSx1aUjJ+oem67wxhko0o0qKGdofclF0AdOp3eyIpvRQdc610nQ7Sw8qnMFJJYjOsfkuJXbw==', 'alto en calorias', 'Q21F3Kc4TJg4TGnQOsvZlTIHuPgREcG7vdbJcEnu9BCMC/nVdzZeV/RZFRtqi4fmMqUh2FLElHjwzxcQnw6qfBe9UfMvn+Y42eSpUUVmTDSP0Myd7xWU57X4nadgDCzKszKqwTRaGv9LsGizaad8xTcs4KQ0ke5d2cdiCuekqrsmW0BAPP57r02GxfXUhwxgz/uabyB9uHOaxPvSrobU5TRoyk79xsdjUNAvANpYzyxdnxGgToqy3ZKUQwMC85nfAiQT/RXAR6YE7tllooaTYu3jOjdy1KQGRDyAsjPG+MDu+iMbYRsGR5AWOH5lLVS0MVcw/QwTf6yPkFWxEESlvg==', 'Mia ruiz', '04123438238', 'Madre'),
(15, 42, 'Diclofena', 'Jo0tV0/WBsOhaL/qc/zLQYjPPN+TxgN3XEyoECXznUA2L9jmYpS6FpAS0vOzR93UeYd0G19AR6IAIAMOL9EMGieLfjGJsII4/UH3kykPMuLciArAfeO0vJlu+ocL7M/7f/wm7Hbh1ILbBZB78kAduOfcy/IEmrEnknb92dHiDhd8EM/sRaGWa/JEr0maNaDtLJRfhvftuN87w/iBQ1nuQ4E5gRdsnFVCTvJ1A6K+dzsKiDSU6eOaDWwtIDeyYkyCwrXTRmSYeSUBuglPwocXyIvsgOT1aLkJWwR5U/t+HeCMnN++XPAcsV0KOhrThD9kZzNDYT6W3GLe/AfEuLa4IQ==', 'GwKvF5uLPlY/d3sQB4WXjdTZa/OCowIOfVLOvlJfvj98KG04LTCQTQhkZ9b/OvbPxwEZmo0PL3O+fOp3jam7QVIA4Lxfm/UDj5uk5r7C+Dyn91fp1WVGeIh9R2PHEcDz7K9WPLetQxkgpNW17kQ6Tifgkv/pdynLysSIkJR9VIgnHq6pgsaQA63QvdgrIkPlgcTZa+dgQZOcvvQcw4onaFg81VsPObAB703I1T0LYAN7NlE921J+SuOSAKZr5KngAEks/1O3uy2X6vXsEQ9CTsk9OXPVRV/ZHFgt4F1c5KdL4B22oXWiS/9fbFLUeEvWhSkpPlGL6mZTpDTu940fPg==', 'ninguno', 'GWMVXIYePcCUg4Leo9OG/M2e27u6QAp64JnNTtXDkGqN/tamgzrX4LsOrPtEmxv0atFgiS2zCxLPAgu6jIcjpVVWyCDDTxW6poKBDJRUQHbywjzGZxElqQrCxyxssphzWl7OD+o4Ql+v1eYFcP+6lNVA9elFnYjofLM/oa0r2LRb14LrqVQkBB5MVnOaOm9jrHi4U1Zx3QPR1JMmt1MyED4g+bd7OGbm1Dw+hxYkRpKXn4ZP0p8YRh+FbCcQUrq7Es+mwStg+bXsm8bNawES523wc2CisF18hBfkXgiZRFsmDcSXQryKNgEPwwoOUx24GIVw+Q5BXVyVlPP+6yBu9Q==', 'Maria', '04134546503', 'Madre'),
(16, 38, 'niguno', 'fHJA/dcZUm1tWjF6XD5CqG9hUB4shJ6O70WWawd3n0qhA+w+QnDsR7WAo9YV3r5EBpn6CMS3whi8J1OysHAq8vtt1jAIEqyHN7PZ5+cK6Qa3boWxE386N+u6WO3ucEn2EjAe8cSKHv997Ej9R0t1E6dh4XmbRP9BVsfJIRjRxpEBPaoProx6fkvBCEYdFiiuNAKn22sv8a8sXmvKErEQjaDuCMM+WLqtH3dlbM7cK/QugbEsuHnkpjqWd4YXZfIg4ydH8aQdZOmhg1cssdg9m2jPTbd4+31vMTFTooRF8YADXjVyv47iNeAlb0o9X5OZNXZFMbwtKqm/3bvwqjcWew==', 'ijYFS8tfXkMjjk1SKBw7lBZ8zLS0pyGKMw4qLE/d3/KWyvFoxU87mSUQcapRd+1VmuwJSS1gyPkyKWszP6Y6qRnypWSOssnT6vA3NwM++jLtBIwr4KYMbbRGv2Q7cjLK+BafKipFEKlaQfo5QM5w23HIrn6h7KEH+H0d8qCnW3Qe1wsWOhhOyMfUb8kdxdUPBcB7F7V/M9vMps2AVNaaS1sWPVlRRdKe0Q91OBk85ncM4WCSjhklf1ZXEWpBcqPyVScg7ixPU0BjZLDoelPHdo4RXvtReFJYUSM0EUFMi0yib7fUdcs4sQVc6jFq0Bv3Bbo7AXRvUXe6ih+hEJW06g==', 'bajo en grasas', 'Wy7RchQwEi386c6N1JyE34J+MB1bfdgHOy5njLI0nO23GF405JncRWjEssMhY0iVKGTgjWXd9CU0BVQdvEVrHGR20tVIhXiNBNARcnIxOIorDIHiKBleP/w9YpsQ8H5hAUy4JAdrdmMDjpCI3xojHJeNmgaXIweSvWSeDuraj0aK3g5JsTJC17+eYjfDojNSoSJmFfzntFx5MsMPV01RFv59Xjkesk06KnMevuyxYr0Vv6hT61GpF+I/eoFlfWamNAq/yTtLzTIQWrdrWbBj1sh/V3iV3GnJNqrxmmtZ5gGyrYWvAUF7qpUEEnUuQ7nKc7heeD0xFFEfHftnu4AZTw==', 'Roberto', '04145623456', 'Padre');

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
(12, 32, 'Apartamento', 'Rural', '4', 'NO POSEE', 'POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'Alquilada'),
(13, 30, 'Casa', 'Rural', '1', 'NO POSEE', 'NO POSEE', 'POSEE', 'NO POSEE', 'POSEE', 'Alquilada'),
(14, 35, 'Departamento', 'Urbana', '2', 'NO POSEE', 'NO POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'Otro'),
(15, 28, 'Departamento', 'Rural', '7', 'POSEE', 'POSEE', 'POSEE', 'POSEE', 'POSEE', 'Propia'),
(16, 42, 'Departamento', 'Urbana', '3', 'NO POSEE', 'NO POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'Propia'),
(17, 41, 'Casa', 'Rural', '1', 'POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'POSEE', 'Propia'),
(18, 40, 'Casa', 'Urbana', '6', 'POSEE', 'POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'Propia'),
(19, 39, 'Casa', 'Rural', '3', 'POSEE', 'POSEE', 'POSEE', 'POSEE', 'POSEE', 'Propia'),
(20, 36, 'Casa', 'Urbana', '1', 'POSEE', 'POSEE', 'POSEE', 'NO POSEE', 'NO POSEE', 'Alquilada');

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
(58, 35, '24324552', 'Josmar flores', 'Masculino', '68', '1999-03-21', 'Barinas'),
(59, 36, '43543453', 'Pedro verde', 'Masculino', '56', '1998-03-21', 'Nueva Esparta');

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
(14, 'Perfil de Usuario'),
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
  `direccion` text NOT NULL COMMENT 'ubicacion de la vivienda'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `id_club`, `cedula`, `nombre`, `apellido`, `telefono`, `cargo`, `direccion`) VALUES
(1, 18, '14525135', 'jose', 'ramon', '04122535621', 'Entrenador', 'ZIoA7/9baVe0ahYqiX+rO36TQaYwA67+9sn3wLECFjPnkdKje7QION+39SdSB5pc9Z5kTBMcURzAISZNRVDlBbTbYbVmrBMj3h4bWDUAgTM9jcbzmpB+15Ise5EKhADKxEHHPyB04VKBKjI3nJoCmg96XTCAHQdF86yMLn1BkJ0e292YpTnbsrHaxZCyu8moviuyOfJASUODaCgQNuo25FCLj2tNGZQtLWGt9NZzoBvsEvt+XhKoYYdN0dh+JiEdcbkFGLvEDWyZwlhdr6vcxExkRDIJ3mO3QPJt2ocflkwBUKoVc9vkAz6Ols/VFmZTcZaJOfnymCqti6PivciW6w=='),
(10, 88, '15432785', 'Luisa Maria', 'Perez Rangel', '04167589012', 'Secretaria', 'a4P3SOJNXuPXv/aJQGpLfVOfZRGOi7ehiZh49XlQPi9xjrT9Q1k62eVm6U8wf3NBrleqepPxMwMcY2GAVFsy7imIccKfDnLAia/T+LjFdwsb6LrSuqDnqte+F8+07d74lf7/7m2KudSMIUjk2m6TTiMzI8pRep3MsuJF/BDfvMxz24LlBkkh3NC7Nl2al7KbEyzix8th5fWvJLQlsVynTi9uEE1vRc0UrnTvWQIb/ZlIgeEsGmn8/bVKkNkVWPH557XZnyN/IIuljHUYmgSgB5B+2ZZqnhuNvHW5tZeXRtYthQ76EhDYlnv2vMIZcO3+XsIjqDIo5BYEylyG63Z0og=='),
(11, 87, '7659325', 'Raul Marcos', 'Guimenez Lopez', '04260568894', 'Entrenador', 'bFb/YkCflLTcqogrA/e4ImEaJtWedMBtsDnw5IleO4sXyYcbO+bTPS0cEchyVq6glgOFSgjTrlkj/kD1tEl2eJJciXKxd1dmnq0y9D+vtt05voyoQ7BR/riK0iP/fHBH8BlctBOLoIaYmfCYLtueGWcxJEL179TA7caxcPG82yDX685nHF153VQadk3QDYHU7kQ+o1Uk2qb71RGEfDRj1yD7a7JIJM3g+Crju03V9mHwE/ZufhGf6qytdlhbs6koVjBJ74RM0himnQOGZkBa0LhDhP8bu2IXFXcuysKYcNK5fw2hwnJMF37AW5vUDrmztGfSMEYCyqcT/4LejUzZJA=='),
(12, 19, '7945745', 'Evanyhelis Sofia', 'Gonzales Lopez', '04145381436', 'Administrador', 'HkpqnSfW7DBF40rP8BKozqZdD0mL6v7WfFCuiQe9bcKFE9xggVZMMvSV/EeJKuyu+t8XcqMlr7wvZ1B5jVcq/LOYohnN3maMLPDf4doy+cjja1zj2GjmnFvobZM3FZRljmYhsVHIzr9b95k8WZ12gLDO4YSkSBELCx26Y0C/iO8nOxJ60TvpjaC3de4fKjfDBdEVrv2JYX9Rl/v+iGeGraHyL+p+zhTS9a2iDZxYydpgO0fC2z61ukpZVMmQGZGrduFykrzqbjiaYPqcKEOb5ruS0nOQVAOgy1xkWzyRNUdpZc1WX417NX/LvNk51Nf3+CZ25heoNhWOOXPME+iX8Q=='),
(13, 18, '28463265', 'Carlos gomez', 'Suarez', '04123468999', 'Entrenador', 'fIkeABDag7I2TdtIVa0rBm9qIlUgLNFyEijSmQpQTyTOTTRybWlSG6xHI+RKTYZs+AQnADjD/wnHdA73kz5d0IeptN4hM+qj35mqksjbvf636/wIsJXPB4O9ZPWob7coqJ9NTvqp1I/3WyT8XFNh7DFvcotI7VQVwY6SFzhp1XAEk/TwrN9jvGL+qskp9fGw1D0/FUqOQsMoH8f3dMIFrqJaRahfFOUNXkUe2e19KzirRSsR2QYaSK6fiPhTQ8VoTEbdGyQcWR/TmcdcKkD/n9Yef2P5zGjDvh2+oQJFQmToY7oklKFCVxpYZVD33TAXi1tG8YVtlRQD0d3tvu2iSQ=='),
(14, 19, '7403322', 'Mireya', 'peña', '02514476519', 'Secretaria', 'oL71Md21EG0hh0KnC82nSFYlfOGlhQQ5gRHx5sqjAezBgCv2vQI3uX3PEcDOWk5hAe7kgKawIw99pqzSgEBfpmIwbHTZKv73BlMW/8l+a9t7aPfc/zHpYn9niZC48LXHKdrIKBtdrY2w50Uof5HaXXm/AnUHfr0jFfyqeEvtopRB+tiVnD9HvE9rWFAGBm23bRJf62uYgsKSQ/6GFxt96pZVnApw3zbUIexky7alc3l88t/KQWceJhcvsgVGfk5zMb2SIF7e8wRAcrHxeO96nzffwblyVgsYNld5GngH5GZnmFD1CaVjPr88WusEjV6sGmzVMQ8hyR+U+JqYbVJKkQ=='),
(15, 87, '8543336', 'Vanesa', 'verde', '04145678934', 'Secretaria', 'gpDSIgpXCfKkOtqev01gofTZ0BYDnjck0qqwmvvwG9REqWzh66XTK5mMKiZDZjmMTzGZ+U4StXffOJ6AnUYqA5t5CEduru7HufU3uij6w/mXwVgdUqedbGvc4KruXeOq5ggADOhKTZjhxnjkU7f1FHDv2oD3XefjTrg8C9Qno9hIeJ8h7DXnI444AZCBJx5OyDY56kbdxkHRbzD+W1Z/2GQCxwwz/tie6w+/Aq1RbkfJNm+qgTNn1/r5FFER48LaKUtcGFzs5lXRmQz8xc/S0LzK0t51oij+cAJ0WxCkELNcVHDcmppaT5dj09To6iwmAw2z3FEu1CB752AlLHLCZg=='),
(16, 88, '17034388', 'Carmen', 'rojas', '04246784566', 'Secretaria', 'Qq8RudIdsYtfU977NkD2mdqmybqG3cmKtB9eK62wLW+sgEiIW4+rg5I+1AjyrCJL3n6NpSl5e4PKs2GDqPrVLwSVpwypLbAuS61tGj1AHOHUUpsebet2H/vk0PP8lMnxFVjgZlTBbLd8Bh+WM2XbVuDdFHkS5kcKnf5NJUx5wEg2OJPt050j7/VMIOdzQA3Ea0RNdv2Xp7QaYdovH0mjKBK7xzYOqzNGeWLmnrvYcLgjb0x+LPwFdA8sDPjr2lAdMKdShJqrBhDpG18i9xkWuVZRSYTTZcwIljbq0iNAe78IvUOjiru1UG0/dyUNOta2VfK4P4UJ0TKfDbeDcbQSRA=='),
(17, 87, '12312311', 'Carlos', 'mujica', '04148658694', 'Administrador', 'N8q5EBiaAsp/Va1ogzZx60y+3jg5b8+xqcgwfP/Cc9c8fSVzM137CbFwcHNp7+NNuduAjdmOIoTyMLeb7WVUEVdEmy1hCn1lwR7UMJ0/SeC9eGgmQ0ugpWknARJxQRfpYHxc1q+Xi7i9T+bB0qIgMT/2d8cMQ8Ptm5uAruXfLzJeG/lJF5XB4Qgazv044TfN63eexNwXR3FqKayH+HKiE+0XIlCsDoLbUx4wZPIL4cG7tiV0BdKUSD7QVZuLFCE5egsreu+r23oTr6DGeOBoJmPf9XAO3s0ZZ00ycr01Cw2ruPJhPKWBH6dOxw0L0NFbQyssonFMrQ1wCVgv536XQw=='),
(18, 18, '32432533', 'Angel', 'Delgado', '04145696032', 'Entrenador', 'GEu5XbfoRFuYZjXWsdUZog8vB5qdOPPICKC2yp4XDTqd/F7+0g1sPG6ozKwxa7sLA8Wd7BKz1kWTzzseDCJDcVYv4drMbpS4bIJ+25ufVsm/rLARVMZZkJ5yKXl7P5yXTcO6cMYSbpW5JifBsOL/IQcrWTgXJyfXY3W7SgWuBPApcXYPfkeYQDrm8oxaiARX5yx3eIv7XWQt9ETuqg/d4UciDaPMjXqnRLRm/bsvJl7dgViMK7SNyJqSCfVGAJttNQHa2IKnrbPwjLre/8+EnHCMTqOZ1Ot4e5ESwpponoeOtwqdPYW40m1BGMC4vSvmE0+rQpah90/za5GrxtgXcw=='),
(19, 88, '35236243', 'Cesar', 'verde', '02514478645', 'Administrador', 'sY7j0Wli5WzpPuNzkiG44WOz9wvnrg2/wBsYPSVFZUziM1kF1fXFmq2hMc/reFqJcvT4Yg75clqOv/utjk+/tXPiy8AAtinG7L7yQyf7ir57/nJodtcQMgiUXYcKrP4sYhGmN2QMHa4MqFQHj9RJcG2IPKQXefSsHVyM+oX62o43OTzThB6lG+xLt/Mah3eM1VPqOtmwZzRqgZ4VYGARw/gWbPGVyL4j+XRTSLJsj0kSCiA8xCeOq3kDPZWqnihbvfHPRapYWC0QaIcI+uYkaK1V242Uv0ZR232GHqbgTJW/eizOXiFVBoiEIXv3XDO3ojkxTJ4avG4Q92auMbNhCg=='),
(20, 87, '30591237', 'luis', 'perdomo', '67844211243', 'Administrador', 'UOfY4h7l9BvSmuq20k/o8k1cW7zHt6c5Hzo0JaKTrH0HIKdtJbdttmyswLwFmfzDjerFTbSTdjbusqT68f0vrqa9dMc19AJkNfY1HYas9/de7e0ytp/y1Yk74+Wui/8bbiciCqASRgDzRolYEMXh1nnaLG/0XANQxiUWInHFHcqJf0HxEwypspEx0Fwl68EeGu9ebCM9N6KW5XVeqm1DSqdH9rWIiv35JFXFQMPWFO+X3uq5gd8snx3i92iznbyHhwWuuKi5y66RhCNAiBE+qzF9xG3hUmrrqfL67eC3FkGbLlodEiLD6C5+hHm+/Wp5s0q4IApZmqSBcLGtestgQw=='),
(21, 19, '14351513', 'jose', 'pereira', '04122355522', 'Administrador', 'FkcKYn2Tz7weSjUbzoDesNXXz5yjHl55StwiW8pO6XPlSqJ3AfrM+TQBerlePvlLPgIEyAgFl3OW3iSs6sF7PFS2LRkh0z2ful6XPJtKYr3QjQPoyQ/sNqzUjsKS/u6YHgnebYl9BtCcespMvjvkVjxDRmfEJiEbdG77nJGnQODImICWjXUvA5LXUfvJrHuxivrMLAT5T+9czEh53LBxGSFkZX0K3HD4nhVAuHvzRwFjhL8s7yQztx9Xf8O6uKF5gW5mCyTqyITG2ylqwiNrea0gXRNmnruCEiZfiz77iyCQlEUHu3UOTPbz2C/TbKP151FDkJgpcihUZaXdASpgbw==');

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

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `id_evento`, `atleta1`, `atleta2`, `forma_ganar`, `ronda`) VALUES
(2, 35, 46, 45, 'decision', '1');

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
(12, 'Invitado', 'solo puede visualizar ciertos modulos');

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
  `token` text NOT NULL COMMENT 'token de usuario',
  `token_contrasena` text COMMENT 'token generado para cambio de contrasena',
  `solicitud_contrasena` int(11) DEFAULT NULL COMMENT 'solicitud de cambio de contrasena'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `id_rol`, `nombre`, `contrasena`, `correo`, `token`, `token_contrasena`, `solicitud_contrasena`) VALUES
(29604245, 1, 'Ruander Cuello', '$2y$12$/MbXa.WbIobE2aAAXy2XZe1gZduG9rMXNVYGhZbCpZ5zO1/EJSslO', 'ruander@gmail.com', '3fb207d5a79a6b5b4ec4aa9fa0c20dd2', '', 0),
(29831184, 1, 'Diego Aguilar', '$2y$12$3cDdVUUVElEWwXtdba3FBO33uje5wIfbqI/kF3oOo/y.qBGiuLSnu', 'diegoaguilar221202@gmail.com', '3c3548f7d26a892b08faefaa1cfca4b4', '', 0),
(29945099, 1, 'Cirez Barriga', '$2y$12$dnf0Yo3Zko6AhZEWwJVkMOaTw2.kh4B/F7PA1hphVT1Wa5nDmcVbq', 'cirezeduardo10@gmail.com', '03b65da7e4186c722674cef9f9ae4409', '', 0),
(30591237, 1, 'luis perdomo', '$2y$12$niYt9aHO3FXEZ0KxxJEnauqPREqfqLtcxPLLemCp8w8o2mFrP1yom', 'luis@gmail.com', '968cd41c18b96a40e68d4c18786925cb', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `bitacora_usuario`
--
ALTER TABLE `bitacora_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clubes`
--
ALTER TABLE `clubes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de tabla clubes', AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de la tabla `emparejamientos`
--
ALTER TABLE `emparejamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `informacion_medica`
--
ALTER TABLE `informacion_medica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `informacion_socioeconomica`
--
ALTER TABLE `informacion_socioeconomica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `inscripcion_evento`
--
ALTER TABLE `inscripcion_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `intermediaria`
--
ALTER TABLE `intermediaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de tabla personal', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  ADD CONSTRAINT `cedula_usuario_fk` FOREIGN KEY (`cedula_usuario`) REFERENCES `usuarios` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `informacion_medica_idfk_1` FOREIGN KEY (`id_atleta`) REFERENCES `atletas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `informacion_socioeconomica`
--
ALTER TABLE `informacion_socioeconomica`
  ADD CONSTRAINT `informacion_socioeconomica_idfk_1` FOREIGN KEY (`id_atleta`) REFERENCES `atletas` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `rol_fk` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
