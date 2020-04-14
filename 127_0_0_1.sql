-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 14, 2020 at 02:50 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `items`
--
CREATE DATABASE IF NOT EXISTS `items` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `items`;

-- --------------------------------------------------------

--
-- Table structure for table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `ID` int(10) NOT NULL,
  `Nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Photos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prix` int(10) NOT NULL,
  `Catégorie` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `objet`
--

INSERT INTO `objet` (`ID`, `Nom`, `Photos`, `Description`, `Video`, `Prix`, `Catégorie`) VALUES
(101, 'Fleur bleu', '', 'Un crystal d\'un bleu eclatant avec un contour de diamant.\r\n\r\nUn bijou d\'exception.\r\n\r\nCependant attention à sa fragilite.', '', 50000, 3);
--
-- Database: `utilisateurs`
--
CREATE DATABASE IF NOT EXISTS `utilisateurs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `utilisateurs`;

-- --------------------------------------------------------

--
-- Table structure for table `acheteurs`
--

DROP TABLE IF EXISTS `acheteurs`;
CREATE TABLE IF NOT EXISTS `acheteurs` (
  `Nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `N/P` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Adresse ligne 1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Adresse ligne 2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ville` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Code Postal` int(5) NOT NULL,
  `Pays` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Numéro tel` int(10) NOT NULL,
  `Type de carte` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Numero de carte` int(16) NOT NULL,
  `Nom sur carte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date expiration` date NOT NULL,
  `Code secu` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acheteurs`
--

INSERT INTO `acheteurs` (`Nom`, `Prenom`, `Email`, `N/P`, `Adresse ligne 1`, `Adresse ligne 2`, `Ville`, `Code Postal`, `Pays`, `Numéro tel`, `Type de carte`, `Numero de carte`, `Nom sur carte`, `Date expiration`, `Code secu`) VALUES
('Segrentinat', 'Mathieu', 'mathieu.segretinat@edu.ece.fr', 'Segretinat Mathieu', '37, quai de grenelle', '', 'Paris', 75015, 'France', 611223344, 'MasterCard', 1111212, 'SEGRETINAT MATHIEU', '0000-00-00', 159);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(10) NOT NULL,
  `Nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Nom`, `Prenom`, `Email`) VALUES
(1, 'Bonnet', 'Maxime', 'maxime.bonnet@edu.ece.fr');

-- --------------------------------------------------------

--
-- Table structure for table `vendeurs`
--

DROP TABLE IF EXISTS `vendeurs`;
CREATE TABLE IF NOT EXISTS `vendeurs` (
  `Pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Photo` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendeurs`
--

INSERT INTO `vendeurs` (`Pseudo`, `Nom`, `Prenom`, `Email`, `Photo`) VALUES
('Jachetetout', 'Arnold', 'Thibault', 'thibault.arnold@edu.ece.fr', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
