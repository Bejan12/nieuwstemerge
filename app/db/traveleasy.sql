-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Gegenereerd op: 19 feb 2025 om 09:12
-- Serverversie: 8.2.0
-- PHP-versie: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traveleasy`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestemming`
--

DROP TABLE IF EXISTS `bestemming`;
CREATE TABLE IF NOT EXISTS `bestemming` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Land` varchar(50) NOT NULL,
  `Luchthaven` varchar(100) NOT NULL,
  `IsActief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boeking`
--

DROP TABLE IF EXISTS `boeking`;
CREATE TABLE IF NOT EXISTS `boeking` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `KlantId` int NOT NULL,
  `ReisId` int NOT NULL,
  `Stoelnummer` varchar(10) NOT NULL,
  `Aankoopdatum` date NOT NULL,
  `Aankooptijd` time NOT NULL,
  `Boekingstatus` varchar(50) NOT NULL,
  `Prijs` decimal(10,2) NOT NULL,
  `Aantal` int NOT NULL,
  `Specialewensen` text,
  `IsActief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `KlantId` (`KlantId`),
  KEY `ReisId` (`ReisId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `communicatie`
--

DROP TABLE IF EXISTS `communicatie`;
CREATE TABLE IF NOT EXISTS `communicatie` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `KlantId` int NOT NULL,
  `MedewerkerId` int NOT NULL,
  `Bericht` text NOT NULL,
  `VerzondenDatum` datetime NOT NULL,
  `IsActief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `Datumaangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Datumgewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `KlantId` (`KlantId`),
  KEY `MedewerkerId` (`MedewerkerId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `KlantId` int NOT NULL,
  `Straatnaam` varchar(100) NOT NULL,
  `Huisnummer` varchar(10) NOT NULL,
  `Toevoeging` varchar(10) DEFAULT NULL,
  `Postcode` varchar(10) NOT NULL,
  `Plaats` varchar(50) NOT NULL,
  `Mobiel` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `IsActief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `KlantId` (`KlantId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `factuur`
--

DROP TABLE IF EXISTS `factuur`;
CREATE TABLE IF NOT EXISTS `factuur` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `BoekingId` int NOT NULL,
  `Factuurnummer` varchar(50) NOT NULL,
  `Factuurdatum` date NOT NULL,
  `BedragExcBtw` decimal(10,2) NOT NULL,
  `Btw` decimal(10,2) NOT NULL,
  `BedragIncBtw` decimal(10,2) NOT NULL,
  `Factuurstatus` varchar(50) NOT NULL,
  `IsActief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Factuurnummer` (`Factuurnummer`),
  KEY `BoekingId` (`BoekingId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `KlantId` int NOT NULL,
  `ReisId` int NOT NULL,
  `Beoordeling` int DEFAULT NULL,
  `ReisbureauEmail` varchar(100) NOT NULL,
  `ReisbureauTelefoon` varchar(20) NOT NULL,
  `IsActief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `Datumaangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Datumgewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `KlantId` (`KlantId`),
  KEY `ReisId` (`ReisId`)
) ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

DROP TABLE IF EXISTS `gebruiker`;
CREATE TABLE IF NOT EXISTS `gebruiker` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `PersoonId` int NOT NULL,
  `Gebruikersnaam` varchar(50) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `IsIngelogd` tinyint(1) DEFAULT '0',
  `Ingelogd` datetime DEFAULT NULL,
  `Uitgelogd` datetime DEFAULT NULL,
  `Isactief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `Datumaangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Datumgewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Gebruikersnaam` (`Gebruikersnaam`),
  KEY `PersoonId` (`PersoonId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

DROP TABLE IF EXISTS `klant`;
CREATE TABLE IF NOT EXISTS `klant` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `PersoonId` int NOT NULL,
  `Relatienummer` varchar(50) NOT NULL,
  `Isactief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `Datumaangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Datumgewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Relatienummer` (`Relatienummer`),
  KEY `PersoonId` (`PersoonId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerker`
--

DROP TABLE IF EXISTS `medewerker`;
CREATE TABLE IF NOT EXISTS `medewerker` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `PersoonId` int NOT NULL,
  `Nummer` varchar(20) NOT NULL,
  `Medewerkertype` enum('Manager','Beheerder','Diskmedewerker') NOT NULL,
  `Isactief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `Datumaangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Datumgewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Nummer` (`Nummer`),
  KEY `PersoonId` (`PersoonId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persoon`
--

DROP TABLE IF EXISTS `persoon`;
CREATE TABLE IF NOT EXISTS `persoon` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(50) NOT NULL,
  `Tussenvoegsel` varchar(20) DEFAULT NULL,
  `Achternaam` varchar(50) NOT NULL,
  `Geboortedatum` date NOT NULL,
  `Paspoortgegevens` varchar(100) DEFAULT NULL,
  `Isactief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `Datumaangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Datumgewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reis`
--

DROP TABLE IF EXISTS `reis`;
CREATE TABLE IF NOT EXISTS `reis` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `MedewerkerId` int NOT NULL,
  `VertrekId` int NOT NULL,
  `BestemmingId` int NOT NULL,
  `Vluchtnummer` varchar(20) NOT NULL,
  `Vertrekdatum` date NOT NULL,
  `Vertrektijd` time NOT NULL,
  `Aankomstdatum` date NOT NULL,
  `Aankomsttijd` time NOT NULL,
  `Reisstatus` varchar(50) NOT NULL,
  `IsActief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `MedewerkerId` (`MedewerkerId`),
  KEY `VertrekId` (`VertrekId`),
  KEY `BestemmingId` (`BestemmingId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `GebruikerId` int NOT NULL,
  `Naam` varchar(50) NOT NULL,
  `Isactief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `Datumaangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Datumgewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `GebruikerId` (`GebruikerId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vertrek`
--

DROP TABLE IF EXISTS `vertrek`;
CREATE TABLE IF NOT EXISTS `vertrek` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Land` varchar(50) NOT NULL,
  `Luchthaven` varchar(100) NOT NULL,
  `IsActief` tinyint(1) NOT NULL DEFAULT '1',
  `Opmerking` text,
  `DatumAangemaakt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
