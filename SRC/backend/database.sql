-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 06, 2019 at 02:42 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
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
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id`, `autor`, `noticia`, `fecha`, `titulo`, `categoria`) VALUES
(1, 'Winston Guevara', 'Lorem ipsum dolor sit \r\namet consectetur adipisicing elit. Maxime explicabo \r\nipsum nesciunt expedita animi enim odit suscipit \r\nquidem omnis, esse numquam eveniet totam sapiente \r\nlaborum tempogre officia minima, obcaecati non.', '2019-04-15', 'Noticia1', 'Sucesos'),
(2, 'Winston Guevara', 'Roberto Navajas, preparador de arqueros que se convirtió en un cercano al chileno Claudio Bravo mientras lo entrenó en Real Sociedad (España), nos compartió su opinión en Al Aire Libre en Cooperativa sobre el encuentro que sostuvo el portero con el seleccionador Reinaldo Rueda, y el rendimiento que posee tras superar una dificil lesión al tendón de aquiles.', '2019-04-15', 'Noticia 2', 'Sucesos');

-- --------------------------------------------------------

--
-- Table structure for table `proyectos`
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
-- Dumping data for table `proyectos`
--

INSERT INTO `proyectos` (`id`, `titulo`, `descripcion`, `foto1`, `foto2`, `foto3`, `fecha_inicio`, `fecha_fin`, `finalizado`, `tecnologia`) VALUES
(1, 'Catalog Builder', 'Crear productos catálogo a partir de los productos indicados desde el parámetro o los productos correspondientes a una categoría dada una tienda.', 'https://managementplaza.es/wp-content/uploads/2015/10/gesti%C3%B3n-de-proyectos.jpg', NULL, '', '2018-06-01', '2018-06-30', 1, 'Php'),
(2, 'Titulo2', 'Descripcion2', 'foto1', 'foto2', 'foto3', '2019-04-01', '2019-05-05', 1, 'javascript'),
(3, 'page', 'pagesdesc', 'foto1', 'foto2', 'foto3', '2019-01-01', '2019-02-02', 1, 'php'),
(4, 'prueba2', 'prueba2', 'foto1', 'foto2', 'foto3', '2019-01-01', '2019-03-03', 1, 'php'),
(5, 'prueba3', 'prueba3', 'foto1', 'foto2', 'foto3', '2019-01-01', '2019-04-04', 1, 'php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
