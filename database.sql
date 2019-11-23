/*
    The database is needed for loading the demo site,
    in case you don't need to load the demo site (you can do it for learn how a demo project works)
    just skip this
*/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `framework` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `framework`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `title` varchar(65) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `product` (`id`, `image`, `title`, `description` ) VALUES
(0, 'tiles/A0001b.jpg', 'Custom tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really The tile comes from Spain and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(1, 'tiles/A0002b.jpg', 'Custom tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from .&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(2, 'tiles/A0003b.jpg', 'Custom tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from France and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(3, 'tiles/A0004b.jpg', 'Custom tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from Portugal and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(4, 'tiles/A0005b.jpg', 'Custom tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from blaaalbalbal and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(5, 'tiles/A0006b.jpg', 'Custom tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from Spain and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(6, 'tiles/A0007b.jpg', 'Custom tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from Spain and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(7, 'tiles/A0008b.jpg', 'Custom tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(8, 'tiles/A0009b.jpg', 'Custom tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Nice product.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;'),
(9, 'tiles/A0010b.jpg', 'Custom tile', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 14px;&quot;&gt;Really Nice product, the tile comes from Spain and bla bla bla.&lt;/span&gt;&lt;/p&gt;&lt;p&');


CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(80) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `role` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT 'customer',
  `address` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `address`) VALUES
(1, 'Jonh', 'Doe', 'admin@email.com', '$2y$10$92/CblxMcJPwCHpAcY0.ne6XfYzLQN9ssseW5BtG9IikzdThq0wbS', 'admin_master', ''),
(2, 'David', 'Bak', 'customer@email.com', '$2y$10$ih5AOHQZwBZX7RcLvzlyqefxk3QF3Yo.tgJe6zcm99sBLT8ic2Gy.', 'customer', '');

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 0;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 0;
  
  COMMIT;