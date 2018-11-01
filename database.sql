-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2018 a las 00:06:21
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(80) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `street` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `street`, `city`, `postcode`, `country`, `email`, `password`) VALUES
(1, 'Jonh', 'Doe', 'street_name', 'city', 11111, 12, 'Jonh@email.com', '123'),
(2, 'David', 'Doe', 'Street_name_2', 'city', 11111, 12, 'David@email.com', '321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `model` varchar(65) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `viewed` int(5) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`product_id`, `quantity`, `model`, `image`, `price`, `enable`, `viewed`) VALUES
(0, 20, 'V20-061-2a', 'tiles/A0001b.jpg', '0.00', 1, 0),
(1, 21, 'V20-062-2a', 'tiles/A0002b.jpg', '0.00', 1, 0),
(2, 20, 'V20-063-1a', 'tiles/A0003b.jpg', '0.00', 1, 0),
(3, 22, 'V20-064-1a', 'tiles/A0004b.jpg', '0.00', 1, 0),
(4, 20, 'V20-001-1a', 'tiles/A0005b.jpg', '0.00', 1, 0),
(5, 21, 'V20-002-1a', 'tiles/A0006b.jpg', '0.00', 1, 0),
(6, 24, 'S021a', 'tiles/A0007b.jpg', '0.00', 1, 0),
(7, 23, 'S022a', 'tiles/A0008b.jpg', '0.00', 1, 0),
(8, 26, 'S019a', 'tiles/A0009b.jpg', '0.00', 1, 0),
(9, 52, 'S018a', 'tiles/A0010b.jpg', '0.00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_info`
--

CREATE TABLE `product_info` (
  `product_id` int(11) NOT NULL,
  `title` varchar(65) COLLATE utf8_bin DEFAULT NULL,
  `short_description` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `product_info`
--

INSERT INTO `product_info` (`product_id`, `title`, `short_description`, `description`) VALUES
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
  `user_id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `hash` varchar(50) COLLATE utf8_bin NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table of users to login in the admin page';

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `hash`, `role`) VALUES
(1, 'user_1', 'test@email.com', '123', 'aaa', 1),
(2, 'user_2', 'user2@email.com', '321', 'bbb', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `model_UNIQUE` (`model`);

--
-- Indices de la tabla `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9399;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
