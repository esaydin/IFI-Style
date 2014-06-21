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
-- Tabellenstruktur für Tabelle `projektbenutzerzuordnung`
--

CREATE TABLE IF NOT EXISTS `projektbenutzerzuordnung` (
  `idprojekt` int(10) NOT NULL,
  `idbenutzer` int(10) NOT NULL,
  `idbenutzertyp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `projektbenutzerzuordnung`
--

INSERT INTO `projektbenutzerzuordnung` (`idprojekt`, `idbenutzer`, `idbenutzertyp`) VALUES
(1, 3, 2),
(2, 3, 2),
(3, 7, 2),
(4, 12, 2),
(5, 12, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
