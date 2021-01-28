-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `db` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db`;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(1024) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id_fk` int NOT NULL,
  `price` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_name_fk` (`user_id_fk`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `products` (`id`, `product_name`, `img`, `created_at`, `user_id_fk`, `price`) VALUES
(2,	'Tелевизор LG 43',	'https://www.lg.com/ru/images/televisions/md06099877/gallery/UM7100_medium.jpg',	'2021-01-26 11:16:27',	1,	9000),
(3,	'Samsung Galasy S8',	'https://images.ua.prom.st/1898937543_smartfon-samsung-galaxy.jpg',	'2021-01-26 11:25:57',	1,	7850),
(4,	'IPhone XS Max GOLD 256gb',	'https://ipatrik.com.ua/wp-content/uploads/2018/11/iphone-xs-gold.jpg',	'2021-01-26 11:27:18',	1,	11200),
(5,	'Yeelight LED Ceiling Lamp',	'https://ru-mi.com/image/cache/data/Tovari/Gadjeti/Svet/Yeelight/PotolochnaiaLampa/yeelight_led_lamp-800x800_wmark.jpg',	'2021-01-26 11:28:29',	1,	700),
(103,	'ROZETKA',	'public/img/1611855377Screenshot_2.png',	'2021-01-28 17:36:17',	2,	20000),
(104,	'Macs',	'public/img/1611856008Screenshot_2.png',	'2021-01-28 17:46:48',	6,	49000),
(105,	'hello',	'public/img/1611862283Screenshot_1.png',	'2021-01-28 19:31:23',	9,	20000),
(106,	'Nokia',	'public/img/1611862661Screenshot_2.png',	'2021-01-28 19:37:41',	2,	20000);

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comment` varchar(1024) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id_fk` int NOT NULL,
  `rating` int NOT NULL,
  `product_id_fk` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_name_fk` (`user_id_fk`),
  KEY `product_id_fk` (`product_id_fk`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`id`),
  CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`product_id_fk`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `reviews` (`id`, `comment`, `created_at`, `user_id_fk`, `rating`, `product_id_fk`) VALUES
(2,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',	'2021-01-26 20:46:18',	1,	10,	2),
(9,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',	'2021-01-26 20:47:23',	1,	6,	2),
(10,	'asdasdasdasdads',	'2021-01-28 18:08:05',	2,	7,	2),
(15,	'65654654654',	'2021-01-28 18:56:36',	2,	6,	104),
(16,	'asfasfasf',	'2021-01-28 18:56:47',	2,	10,	104),
(17,	'asdasdas',	'2021-01-28 19:33:13',	10,	6,	105),
(18,	'asdasdasdasdasdasd',	'2021-01-28 19:37:08',	2,	5,	105);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `user_name`) VALUES
(1,	'ROZETKA'),
(2,	'Carl'),
(3,	'Man'),
(4,	'post'),
(5,	'ANTOXA'),
(6,	'ANTOXA222'),
(7,	'postmaster@alncc.com'),
(8,	'postmast'),
(9,	'Carlos'),
(10,	'asdasdas');

-- 2021-01-28 20:44:12
