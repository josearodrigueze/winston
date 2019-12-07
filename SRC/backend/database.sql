-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-12-2019 a las 20:18:09
-- Versión del servidor: 5.7.23-0ubuntu0.16.04.1-log
-- Versión de PHP: 5.6.37-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `noticia` text NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `autor`, `noticia`, `fecha`, `titulo`, `categoria`) VALUES
  (1, 'Winston Guevara', 'Lorem ipsum dolor sit \r\namet consectetur adipisicing elit. Maxime explicabo \r\nipsum nesciunt expedita animi enim odit suscipit \r\nquidem omnis, esse numquam eveniet totam sapiente \r\nlaborum tempogre officia minima, obcaecati non.', '2019-05-15', 'Noticia1', 'Sucesos'),
  (2, 'Winston Guevara', 'Roberto Navajas, preparador de arqueros que se convirtió en un cercano al chileno Claudio Bravo mientras lo entrenó en Real Sociedad (España), nos compartió su opinión en Al Aire Libre en Cooperativa sobre el encuentro que sostuvo el portero con el seleccionador Reinaldo Rueda, y el rendimiento que posee tras superar una dificil lesión al tendón de aquiles.', '2019-04-15', 'Noticia 2', 'Sucesos'),
  (5, 'Winston2 Guevara', 'desarrollode noticia2', '2019-12-05', 'Titulo phpmyadmin2', 'wherever2'),
  (6, 'Jose Rodriguez', 'Desarrollo de la noticia', '2019-12-02', 'Form Noticia', 'php, javascript'),
  (7, 'Jose Rodriguez', 'Desarrollo de la noticia editada', '2019-12-02', 'Form Edición Noticia', 'php, javascript');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `foto1` varchar(100) DEFAULT NULL,
  `foto2` varchar(100) DEFAULT NULL,
  `foto3` varchar(100) DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `finalizado` tinyint(4) NOT NULL,
  `tecnologia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `titulo`, `descripcion`, `foto1`, `foto2`, `foto3`, `fecha_inicio`, `fecha_fin`, `finalizado`, `tecnologia`) VALUES
  (2, 'Datepicker', 'Datepicker', 'foto1', 'foto2', 'foto3', '2019-12-01', '2020-02-29', 0, 'php, html, javascript, sql'),
  (3, 'Catalog Builder', 'V2 -> Crear productos catálogo a partir de los productos indicados desde el parámetro o los productos correspondientes a una categoría dada una tienda.', './uploads/1574737855-102fc57101b477bcf3f63e6d59b7ec71.jpg', './uploads/1574737856-d252403514d8de495eaf0ee9e6eb2da3.png', './uploads/1574737856-0f15f4a635aee4f15c5b0dd8631e010b.png', '2018-06-01', '2018-06-30', 1, 'php'),
  (4, 'prueba2', 'prueba2', 'foto1', 'foto2', 'foto3', '2019-01-01', '2019-03-03', 1, 'php'),
  (6, 'titulo', 'desp', 'f1', 'f2', 'f3', '2019-11-01', '2019-11-26', 1, 'tech'),
  (7, 'Nuevo', 'Nuevo', 'f1', 'f2', 'f3', '2019-12-13', '2019-12-30', 1, 'html'),
  (8, 'Nuevo2', 'Nuevo2', 'f1', 'f2', 'f3', '2018-01-01', '2018-03-01', 1, 'html'),
  (11, 'nuevo con foto', 'nuevo con foto', '1', '1', '1', '2019-01-01', '2019-01-06', 1, 'html'),
  (12, 'nuevo con foto', 'nuevo con foto', '1', '1', '1', '2019-01-01', '2019-01-06', 1, 'html'),
  (13, 'countFotos', 'countFotos', '1', '1', '1', '2019-05-26', '2019-05-30', 1, 'php'),
  (14, 'countFotos2', 'countFotos2', '1', '1', '1', '2019-05-26', '2019-05-30', 1, 'php'),
  (15, 'countFotos2', 'countFotos2', '1', '1', '1', '2019-05-26', '2019-05-30', 1, 'php'),
  (16, 'countFotos2', 'countFotos2', './uploads/1575203723-c7ed7769654c6097a79a92064b4a3514.jpg', '', '', '2019-05-26', '2019-05-30', 1, 'php'),
  (17, 'countFotos2', 'countFotos2', './uploads/1575203749-c7ed7769654c6097a79a92064b4a3514.jpg', '', '', '2019-05-26', '2019-05-30', 1, 'php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `tipo_usuario`, `status`) VALUES
  (1, 'USUARIO 1', 'admin', 'admin', 'ADMINISTRADOR', 1),
  (3, 'jose', 'email', 'pass', 'NORMAL', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
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
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
