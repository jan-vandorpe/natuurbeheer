-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2014 at 12:53 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `natuurbeheer`
--
CREATE DATABASE IF NOT EXISTS `natuurbeheer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `natuurbeheer`;

-- --------------------------------------------------------

--
-- Table structure for table `categorieen`
--

CREATE TABLE IF NOT EXISTS `categorieen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(50) NOT NULL COMMENT 'vb. geschiedenis, ecologie, ...',
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locatie`
--

CREATE TABLE IF NOT EXISTS `locatie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `QRcode` varchar(100) NOT NULL COMMENT 'url or store png/id in folder',
  `naam` varchar(50) NOT NULL COMMENT 'vb. ''locatie Dode Eik''',
  `beschrijving` text NOT NULL COMMENT 'alg. info over deze locatie',
  `geo_lat` decimal(11,0) NOT NULL,
  `geo_long` decimal(10,0) NOT NULL,
  `natuurgebied_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `natuurgebied_id` (`natuurgebied_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locaties_categorieen`
--

CREATE TABLE IF NOT EXISTS `locaties_categorieen` (
  `locatie_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  KEY `locatie_id` (`locatie_id`),
  KEY `categorie_id` (`categorie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `natuurgebied`
--

CREATE TABLE IF NOT EXISTS `natuurgebied` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(50) NOT NULL,
  `beschrijving` text NOT NULL COMMENT 'wat valt er te beleven',
  `geo_lat` decimal(11,0) NOT NULL,
  `geo_long` decimal(10,0) NOT NULL,
  `info` text NOT NULL COMMENT 'openingsuren, etc',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `locatie`
--
ALTER TABLE `locatie`
  ADD CONSTRAINT `locatie_ibfk_1` FOREIGN KEY (`natuurgebied_id`) REFERENCES `natuurgebied` (`id`);

--
-- Constraints for table `locaties_categorieen`
--
ALTER TABLE `locaties_categorieen`
  ADD CONSTRAINT `locaties_categorieen_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categorieen` (`id`),
  ADD CONSTRAINT `locaties_categorieen_ibfk_1` FOREIGN KEY (`locatie_id`) REFERENCES `locatie` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
