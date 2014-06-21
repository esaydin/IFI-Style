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
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE IF NOT EXISTS `benutzer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vorname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `benutzername` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kennwort` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `strasse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hausnr` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `plz` int(10) NOT NULL,
  `ort` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idbenutzertyp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Benutzername` (`benutzername`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='BenutzerTypID ist ein Fremdschlüssel' AUTO_INCREMENT=13 ;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`id`, `vorname`, `nachname`, `benutzername`, `kennwort`, `email`, `strasse`, `hausnr`, `plz`, `ort`, `idbenutzertyp`) VALUES
(1, 'GÃ¼rel', 'GÃ¼lcin', 'gguerel', '1c9c0e8133069ad06aa1fb3003b0af17', 'gguerel@hs-bremen.de', 'SeewenjestraÃŸe', '99', 28237, 'Bremen', '1'),
(3, 'Peter', 'MÃ¼ller', 'pmuller', '81dc9bdb52d04dc20036dbd8313ed055', 'pmueler@hs-bremen.de', '', '', 0, '', '2'),
(5, 'Alex', 'Topf', 'atopf', '81dc9bdb52d04dc20036dbd8313ed055', 'atopf@hs-bremen.de', '', '', 0, 'Bremen', '1'),
(6, 'Marina', 'KÃ¶nig', 'mkoenig', '81dc9bdb52d04dc20036dbd8313ed055', 'koenig@yahoo.de', 'Alter Weg', '23', 24567, 'Bremen', '1'),
(7, 'Esra', 'Aydin', 'eaydin', '81dc9bdb52d04dc20036dbd8313ed055', 'eaydin@gmx.de', '', '', 0, '', '2'),
(8, 'Nurhan', 'Koc', 'nkoc', '81dc9bdb52d04dc20036dbd8313ed055', 'nkoc@hs-bremen.de', '', '', 0, '', '1'),
(9, 'Jana', 'GrÃ¼n', 'jgruen', '81dc9bdb52d04dc20036dbd8313ed055', 'jana@hotmail.de', '', '', 0, '', '1'),
(10, 'Linda', 'Baum', 'lbaum', '81dc9bdb52d04dc20036dbd8313ed055', 'baumlinda@yahoo.de', '', '', 0, '', '1'),
(11, 'Jutta', 'Munter', 'jmunter', '81dc9bdb52d04dc20036dbd8313ed055', 'j-munter@hs-bremen.de', '', '', 0, '', '1'),
(12, 'Karina', 'Traurig', 'ktraurig', '81dc9bdb52d04dc20036dbd8313ed055', 'karina_traurig@gmail.de', '', '', 0, '', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
