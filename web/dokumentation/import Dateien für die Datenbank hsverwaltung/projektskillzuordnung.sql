-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Jun 2014 um 00:40
-- Server Version: 5.5.36
-- PHP-Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `hsverwaltung`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projektskillzuordnung`
--

CREATE TABLE IF NOT EXISTS `projektskillzuordnung` (
  `idprojekt` int(11) NOT NULL,
  `idskill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `projektskillzuordnung`
--

INSERT INTO `projektskillzuordnung` (`idprojekt`, `idskill`) VALUES
(1, 1),
(1, 3),
(1, 7),
(1, 8),
(2, 1),
(2, 6),
(2, 7),
(2, 8),
(3, 4),
(4, 2),
(5, 1),
(5, 3),
(5, 4),
(5, 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
