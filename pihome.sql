-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 25. Jul 2015 um 13:25
-- Server Version: 5.5.43
-- PHP-Version: 5.4.41-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `pihome`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pi_admin`
--

CREATE TABLE IF NOT EXISTS `pi_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `pass` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `name` varchar(155) COLLATE latin1_german1_ci NOT NULL,
  `admin` varchar(1) COLLATE latin1_german1_ci NOT NULL DEFAULT '0',
  `color` varchar(7) COLLATE latin1_german1_ci NOT NULL,
  `apikey` varchar(32) COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `pi_admin`
--

INSERT INTO `pi_admin` (`id`, `user`, `pass`, `name`, `admin`, `color`, `apikey`) VALUES
(1, 'admin', 'pihome', 'John Doe', '1', '#187ac1', 's9XcHG3xISfcNc7THYgaWdyjqdsaiLPN'),
(2, '', '', 'Home Guest', '0', '#0f9b00', 'CtX3qo2BCKccCKB0m00NNImXcKPgXicQ');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pi_devices`
--

CREATE TABLE IF NOT EXISTS `pi_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `device` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `letter` varchar(55) COLLATE latin1_german1_ci NOT NULL,
  `code` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '00000',
  `status` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '0',
  `sort` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '0',
  `sunset` varchar(1) COLLATE latin1_german1_ci NOT NULL DEFAULT '0',
  `aktiv` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `pi_devices`
--

INSERT INTO `pi_devices` (`id`, `room_id`, `device`, `letter`, `code`, `status`, `sort`, `sunset`, `aktiv`) VALUES
(1, '1', 'Lamp One', 'A', '00000', '0', '0', '0', '1'),
(2, '2', 'Lamp Two', 'B', '00000', '0', '0', '0', '1'),
(3, '3', 'Lamp Three', 'C', '00000', '0', '0', '0', '1'),
(4, '4', 'Lamp Four', 'D', '00000', '0', '0', '0', '1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pi_rooms`
--

CREATE TABLE IF NOT EXISTS `pi_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `pi_rooms`
--

INSERT INTO `pi_rooms` (`id`, `room`) VALUES
(1, 'office'),
(2, 'living room'),
(3, 'kitchen'),
(4, 'bathroom');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pi_settings`
--

CREATE TABLE IF NOT EXISTS `pi_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(155) COLLATE latin1_german1_ci NOT NULL,
  `value` varchar(155) COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci AUTO_INCREMENT=21 ;

--
-- Daten für Tabelle `pi_settings`
--

INSERT INTO `pi_settings` (`id`, `name`, `value`) VALUES
(5, 'city', 'Berlin'),
(6, 'timezone', 'Europe/Berlin'),
(7, 'weather', 'true'),
(8, 'sunrise', 'false'),
(10, 'country_code', 'DE'),
(11, 'weather_option', 'c_kms'),
(13, 'gcal_ical_activ', 'false'),
(14, 'gcal_ical', ''),
(17, 'oc_ical', 'false'),
(18, 'oc_user', ''),
(19, 'oc_pass', ''),
(20, 'oc_ical_url', ''),
(21, 'api_weather', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
