-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
-- s222325
-- Mannella Luca
--
-- Host: localhost
-- Generation Time: Lug 07, 2015 alle 14:32
-- Versione del server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `s222325`
--
CREATE DATABASE IF NOT EXISTS `s222325` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `s222325`;

-- ---------------------------------------------------------- --------------------------------------------------------
--
-- Removing Tables
--
DROP TABLE IF EXISTS `booking`;
DROP TABLE IF EXISTS `users`;

-- --------------------------------------------------------
--
-- Struttura della tabella `users`
-- Creazione: Lug 03, 2015 alle 13:44
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--
INSERT INTO `users` (`username`, `password`) VALUES
('u1', 'ec6ef230f1828039ee794566b9c58adc'),
('u2', '1d665b9b1467944c128a5575119d1cfd'),
('u3', '7bc3ca68769437ce986455407dab2a1f');

-- --------------------------------------------------------
--
-- Struttura della tabella `booking`
-- Creazione: Lug 03, 2015 alle 23:48
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(36) NOT NULL,
  `username` varchar(36) NOT NULL,
  `participants` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
