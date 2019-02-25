SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS bios;
USE bios;

CREATE TABLE `bios` (
  `bio_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` nvarchar(100) NOT NULL,
  `last_name` nvarchar(100) NOT NULL,
  `address` nvarchar(500) NOT NULL,
  PRIMARY KEY (`bio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;