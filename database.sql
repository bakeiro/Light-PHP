-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2019 a las 11:31:55
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `framework`
--
CREATE DATABASE IF NOT EXISTS `framework` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `framework`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `model` varchar(65) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `quantity`, `model`, `image`, `enable`) VALUES
(0, 20, 'V20-061-2a', 'tiles/A0001b.jpg', 1),
(1, 21, 'V20-062-2a', 'tiles/A0002b.jpg', 1),
(2, 20, 'V20-063-1a', 'tiles/A0003b.jpg', 1),
(3, 22, 'V20-064-1a', 'tiles/A0004b.jpg', 1),
(4, 20, 'V20-001-1a', 'tiles/A0005b.jpg', 1),
(5, 21, 'V20-002-1a', 'tiles/A0006b.jpg', 1),
(6, 24, 'S021a', 'tiles/A0007b.jpg', 1),
(7, 23, 'S022a', 'tiles/A0008b.jpg', 1),
(8, 26, 'S019a', 'tiles/A0009b.jpg', 1),
(9, 52, 'S018a', 'tiles/A0010b.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_info`
--

CREATE TABLE `product_info` (
  `id` int(11) NOT NULL,
  `title` varchar(65) COLLATE utf8_bin DEFAULT NULL,
  `short_description` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `product_info`
--

INSERT INTO `product_info` (`id`, `title`, `short_description`, `description`) VALUES
(0, 'Custom tile', 'cool tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really The tile comes from Spain and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(1, 'Custom tile', 'cool tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from .&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(2, 'Custom tile', 'cool tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from France and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(3, 'Custom tile', 'cool tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from Portugal and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(4, 'Custom tile', 'cool tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from blaaalbalbal and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(5, 'Custom tile', 'cool tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from Spain and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(6, 'Custom tile', 'cool tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from Spain and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(7, 'Custom tile', 'cool tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(8, 'Custom tile', 'cool tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Nice product.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(9, 'Custom tile', 'cool tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from Spain and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(80) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `salt` varchar(45) COLLATE utf8_bin NOT NULL,
  `role` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT 'customer',
  `address` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `salt`, `role`, `address`) VALUES
(1, 'Jonh', 'Doe', 'admin@email.com', 'd6674395604f7ae0a3750cf4a7280d623daf67d6', 'ySUrWaBHx', 'admin_master', ''),
(2, 'David', 'Bak', 'customer@email.com', 'bdfe37077d9d67d6bec1d2dd8892c286fae37387', 'm7dcl8Acy', 'customer', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `model_UNIQUE` (`model`);

--
-- Indices de la tabla `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9399;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
