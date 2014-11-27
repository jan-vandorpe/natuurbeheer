-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2014 at 10:50 AM
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
  `isActief` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categorieen`
--

INSERT INTO `categorieen` (`id`, `naam`, `isActief`) VALUES
(1, 'geologie', 1),
(2, 'bodem', 1),
(3, 'geschiedenis', 1),
(4, 'wist-je-dat', 1),
(5, 'natuur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locatie`
--

CREATE TABLE IF NOT EXISTS `locatie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `QRcode` varchar(100) NOT NULL COMMENT 'url or store png/id in folder',
  `naam` varchar(50) NOT NULL COMMENT 'vb. ''locatie Dode Eik''',
  `beschrijving` text NOT NULL COMMENT 'alg. info over deze locatie',
  `geo_lat` float(10,6) NOT NULL,
  `geo_long` float(10,6) NOT NULL,
  `natuurgebied_id` int(11) NOT NULL,
  `isActief` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `natuurgebied_id` (`natuurgebied_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `locatie`
--

INSERT INTO `locatie` (`id`, `QRcode`, `naam`, `beschrijving`, `geo_lat`, `geo_long`, `natuurgebied_id`, `isActief`) VALUES
(1, ' ', 'onthaalpunt ', 'Info over het Zwin gratis te verkrijgen. Mogelijkheid tot boeken van een gids (groepen).\nLokatie : inkom van de voormalige Zwinparking', 51.365894, 3.373680, 1, 1),
(2, '  ', 'Internationale dijk', 'Zowel Nederland en BelgiÙ gingen in 1870 de schorre in de Zwinmonding als Staatseigendom beschouwen en kwamen akkoord voor de inpoldering van de Zwinmonding met de Internationale Dijk waardoor de Willem-Leopoldpolder, genoemd naar de beide koningen, zou ontstaan. De dijk vertrok op het meest noordelijke punt van de Hazegrasdijkpolder en liep recht oostwaarts tot de Nederlandse dijk op de oostoever van het Zwin. Door de dijk werden de Grote Plaat en het zuiden van de Zeehondenplaat ingedijkt. Ten noorden van de lijn Zoutedijk - Hazegraspolderdijk en Internationale Dijk lag een groot gebied (huidige Zwinbosjes, Natuurreservaat en Kleine Vlakte) dat enkel door een verdergevorderde duinenrij werd beschermd.', 51.357449, 3.364680, 1, 1),
(3, ' ', 'strand', 'Strandjutten is een leuke ervaring voor jong en oud. ', 51.367134, 3.359255, 1, 1),
(4, ' ', 'bezoekerscentrum ', 'Sinds 1999 houden de vrijwilligers van de “Vrienden van het Zoerselbos” het Vlaamse bezoekerscentrum “Zoerselbos” open. Dit bezoekerscentrum is een bijzondere samenwerking tussen de Vrienden van het Zoerselbos en het Agentschap voor Natuur en Bos.\nHet bezoekerscentrum is gevestigd in de oude hoeve tegenover de herberg “Het Boshuisje” aan de Boshuisweg. ', 51.242531, 4.669434, 2, 1),
(5, ' ', 'Tappelbeek', 'Landschappelijk wordt voor de valleien van de Tappelbeek en Risschotse Loop gestreefd naar een mozaïek van hooilanden, ruigte, struweel en moerasbos, typerend voor natuurlijke beekdalen.', 51.177357, 4.633383, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `locaties_categorieen`
--

CREATE TABLE IF NOT EXISTS `locaties_categorieen` (
  `locatie_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `info` text NOT NULL COMMENT 'info over lokatie in natuurgebied',
  KEY `locatie_id` (`locatie_id`),
  KEY `categorie_id` (`categorie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locaties_categorieen`
--

INSERT INTO `locaties_categorieen` (`locatie_id`, `categorie_id`, `info`) VALUES
(2, 3, 'Zowel Nederland en BelgiÙ gingen in 1870 de schorre in de Zwinmonding als Staatseigendom beschouwen en kwamen akkoord voor de inpoldering van de Zwinmonding met de Internationale Dijk waardoor de Willem-Leopoldpolder, genoemd naar de beide koningen, zou ontstaan. '),
(2, 5, 'De dijk vertrok op het meest noordelijke punt van de Hazegrasdijkpolder en liep recht oostwaarts tot de Nederlandse dijk op de oostoever van het Zwin. Door de dijk werden de Grote Plaat en het zuiden van de Zeehondenplaat ingedijkt. Ten noorden van de lijn Zoutedijk - Hazegraspolderdijk en Internationale Dijk lag een groot gebied (huidige Zwinbosjes, Natuurreservaat en Kleine Vlakte) dat enkel door een verdergevorderde duinenrij werd beschermd.'),
(3, 4, 'Strandjutten is een verloren gegane ambacht.'),
(5, 5, 'Landschappelijk wordt voor de valleien van de Tappelbeek en Risschotse Loop gestreefd naar een mozaïek van hooilanden, ruigte, struweel en moerasbos, typerend voor natuurlijke beekdalen');

-- --------------------------------------------------------

--
-- Table structure for table `natuurgebied`
--

CREATE TABLE IF NOT EXISTS `natuurgebied` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(50) NOT NULL,
  `beschrijving` text NOT NULL COMMENT 'wat valt er te beleven',
  `geo_lat` float(10,6) NOT NULL,
  `geo_long` float(10,6) NOT NULL,
  `info` text NOT NULL COMMENT 'openingsuren, etc',
  `isActief` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `natuurgebied`
--

INSERT INTO `natuurgebied` (`id`, `naam`, `beschrijving`, `geo_lat`, `geo_long`, `info`, `isActief`) VALUES
(1, 'het Zwin', 'Het Zwin is een prachtig natuurgebied aan de Belgische kust met een unieke fauna en flora. Jaarlijks landen er vele duizenden vogels om er te broeden, te overwinteren of naar voedsel te zoeken. Het natuurgebied is ook een droom voor plantenliefhebbers. Heel wat zeldzame planten voelen zich er thuis. Door de voortdurende invloed van het zoute water overleven hier soorten die elders aan de kust nauwelijks nog te vinden zijn.', 51.364498, 3.372184, 'OPENINGSUREN\nIedere dag van 9.00 tot 16.00u.\nGesloten op maandag.', 1),
(2, 'Zoerselbos', 'Het Zoerselbos is een 400 ha groot natuur- en bosgebied bij Zoersel en Halle. ', 51.256252, 4.680390, 'Het bezoekerscentrum is open op alle weekend- en feestdagen en tijdens de schoolvakanties ook op weekdagen (uitgezonderd maandagen). Je kan hier terecht vanaf 13 uur tot 18 uur. \nLet wel op want tijdens de winterperiode sluiten de deuren reeds om 17 uur!', 1);

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
  ADD CONSTRAINT `locaties_categorieen_ibfk_1` FOREIGN KEY (`locatie_id`) REFERENCES `locatie` (`id`),
  ADD CONSTRAINT `locaties_categorieen_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categorieen` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
