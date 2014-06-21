-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Jun 2014 um 00:39
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
-- Tabellenstruktur für Tabelle `benutzerskillzuordnung`
--

CREATE TABLE IF NOT EXISTS `benutzerskillzuordnung` (
  `idbenutzer` int(11) NOT NULL,
  `idskill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `benutzerskillzuordnung`
--

INSERT INTO `benutzerskillzuordnung` (`idbenutzer`, `idskill`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 8),
(5, 2),
(5, 6),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(8, 1),
(8, 4),
(8, 5),
(8, 8),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(9, 8),
(10, 2),
(10, 5),
(11, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
