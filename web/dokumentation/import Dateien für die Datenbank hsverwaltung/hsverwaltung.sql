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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer_typ`
--

CREATE TABLE IF NOT EXISTS `benutzer_typ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `benutzer_typ`
--

INSERT INTO `benutzer_typ` (`id`, `name`) VALUES
(1, 'Student'),
(2, 'Auftraggeber');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekt`
--

CREATE TABLE IF NOT EXISTS `projekt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `beschreibung` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Titel` (`titel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `projekt`
--

INSERT INTO `projekt` (`id`, `titel`, `beschreibung`) VALUES
(1, 'Website AutohÃ¤ndler', 'Es werden Studenten fÃ¼r die Mitarbeit der Entwicklung einer Website gesucht.            '),
(2, 'Website Online Blumenladen', 'Es werden Studenten fÃ¼r die Mitarbeit der Entwicklung einer Website gesucht. Es soll mÃ¶glich sein, Online Blumen zu bestellen und sich als Kunde einzuloggen.             '),
(3, 'Datenbank fÃ¼r einen Wohnungsmakler', ' FÃ¼r die Realisierung einer Datenbank suche ich Studenten die spaÃŸ an programmierung von SQL haben.             '),
(4, 'Spiel 4-Gewinnt', 'FÃ¼r das Spiel 4-Gewinnt werden Studenten mit sehr Guten Java Kenntnissen gesucht!            '),
(5, 'Onlineshop', 'FÃ¼r die Realisierung eines Onlieshops werden Studenten im bereich Datenbank gesucht. AuÃŸerdem brauchen wir jemanden mit den Kenntnissen fÃ¼r CSS und HTML. Dringende UntrerstÃ¼zung wird in PHP benÃ¶tigt!      ');

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `skill`
--

INSERT INTO `skill` (`id`, `skill`) VALUES
(1, 'html'),
(2, 'java'),
(3, 'php'),
(4, 'sql'),
(5, 'C++'),
(6, 'JavaScript'),
(7, 'XML'),
(8, 'css');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
