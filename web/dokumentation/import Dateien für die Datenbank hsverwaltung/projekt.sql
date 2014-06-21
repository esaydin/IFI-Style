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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
