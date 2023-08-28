-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 21, 2023 at 05:48 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rbnb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodationtype`
--

DROP TABLE IF EXISTS `accommodationtype`;
CREATE TABLE IF NOT EXISTS `accommodationtype` (
  `accommodationTypeId` int NOT NULL AUTO_INCREMENT,
  `propertyId` int NOT NULL,
  `piscine` tinyint(1) NOT NULL,
  `parkingGratuit` tinyint(1) NOT NULL,
  `jacuzzi` tinyint(1) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `laveLinge` tinyint(1) NOT NULL,
  `secheLinge` tinyint(1) NOT NULL,
  `climatisation` tinyint(1) NOT NULL,
  `chauffage` tinyint(1) NOT NULL,
  `espaceTravailDedie` tinyint(1) NOT NULL,
  `television` tinyint(1) NOT NULL,
  `secheCheveux` tinyint(1) NOT NULL,
  `ferRepasser` tinyint(1) NOT NULL,
  `stationRechargeVehiElectriques` tinyint(1) NOT NULL,
  `litBebe` tinyint(1) NOT NULL,
  `salleSport` tinyint(1) NOT NULL,
  `barbecue` tinyint(1) NOT NULL,
  `petitDejeuner` tinyint(1) NOT NULL,
  `cheminee` tinyint(1) NOT NULL,
  `logementFumeur` tinyint(1) NOT NULL,
  `detecteurFumee` tinyint(1) NOT NULL,
  `detecteurMonoxyDeCarbone` tinyint(1) NOT NULL,
  PRIMARY KEY (`accommodationTypeId`),
  KEY `PROPERTY` (`propertyId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accommodationtype`
--

INSERT INTO `accommodationtype` (`accommodationTypeId`, `propertyId`, `piscine`, `parkingGratuit`, `jacuzzi`, `wifi`, `laveLinge`, `secheLinge`, `climatisation`, `chauffage`, `espaceTravailDedie`, `television`, `secheCheveux`, `ferRepasser`, `stationRechargeVehiElectriques`, `litBebe`, `salleSport`, `barbecue`, `petitDejeuner`, `cheminee`, `logementFumeur`, `detecteurFumee`, `detecteurMonoxyDeCarbone`) VALUES
(63, 92, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 100, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 1),
(72, 101, 1, 1, 0, 1, 1, 1, 0, 0, 1, 1, 0, 1, 0, 1, 1, 1, 0, 0, 0, 1, 0),
(73, 102, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 1, 0, 1, 1, 1, 0),
(74, 103, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 1),
(75, 104, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 1, 0),
(76, 105, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1),
(77, 106, 0, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
(90, 119, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 120, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 121, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(96, 125, 1, 1, 0, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(97, 126, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(98, 127, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(99, 128, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(100, 129, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(101, 130, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(102, 131, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(103, 132, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(104, 133, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, 134, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(106, 135, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(107, 136, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(108, 137, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(109, 138, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(110, 139, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(111, 140, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(112, 141, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(113, 142, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(114, 143, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(115, 144, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(116, 145, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(117, 146, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(118, 147, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(119, 148, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(120, 149, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(121, 150, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(122, 151, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(123, 152, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(124, 153, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(125, 154, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(126, 155, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(127, 156, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(128, 157, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `articleId` int NOT NULL AUTO_INCREMENT,
  `author` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `extract` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`articleId`),
  KEY `user` (`author`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`articleId`, `author`, `image`, `title`, `extract`, `content`, `date`) VALUES
(24, 14, 'pexels-kristina-snowasp-9956592.jpg', 'Airbnb : Redéfinir les Voyages au 21ème Siècle', 'Découvrez comment Airbnb a transformé la façon dont nous voyageons et pourquoi il est devenu le choix préféré de millions de voyageurs à travers le mo', 'Dans un monde de plus en plus globalisé, la quête d\'authenticité devient cruciale pour de nombreux voyageurs. Plutôt que de séjourner dans un hôtel impersonnel, ils cherchent à s\'immerger dans la culture locale. Airbnb, avec son modèle basé sur le partage de domiciles privés, répond parfaitement à cette demande. Imaginez prendre votre petit déjeuner dans une boulangerie locale recommandée par votre hôte, ou explorer un marché caché que seul un résident connaîtrait. Ces expériences, bien que simples, enrichissent notre compréhension du monde et créent des connexions durables avec les lieux que nous visitons.', '2023-08-21'),
(25, 8, 'pexels-alex-azabache-3214968.jpg', 'Voyager Local : L\'Essence d\'Airbnb', 'Oubliez les hôtels et les circuits touristiques génériques. Avec Airbnb, découvrez le charme de vivre comme un local lors de vos voyages.', 'Dans un monde de plus en plus globalisé, la quête d\'authenticité devient cruciale pour de nombreux voyageurs. Plutôt que de séjourner dans un hôtel impersonnel, ils cherchent à s\'immerger dans la culture locale. Airbnb, avec son modèle basé sur le partage de domiciles privés, répond parfaitement à cette demande. Imaginez prendre votre petit déjeuner dans une boulangerie locale recommandée par votre hôte, ou explorer un marché caché que seul un résident connaîtrait. Ces expériences, bien que simples, enrichissent notre compréhension du monde et créent des connexions durables avec les lieux que nous visitons.', '2023-08-21'),
(26, 15, 'sandra-kaas-BDlz85DMHBc-unsplash.jpg', 'Comment Assurer un Séjour Inoubliable à vos Hôtes Airbnb', 'Vous êtes un hôte Airbnb ou envisagez de le devenir ? Voici nos meilleures astuces pour garantir que vos invités passent un séjour mémorable.', 'L\'hospitalité va au-delà de fournir un lit confortable. C\'est l\'art de faire en sorte que vos invités se sentent accueillis et choyés. En tant qu\'hôte Airbnb, chaque détail compte. De la propreté de l\'espace à l\'attention aux besoins individuels de vos invités, tout contribue à créer une expérience mémorable. Commencez par personnaliser leur séjour: demandez-leur leurs préférences avant leur arrivée. Peut-être aiment-ils un type particulier de café ou sont-ils intéressés par l\'histoire locale ? Fournir des touches personnelles, comme un guide des endroits préférés du quartier ou des recommandations sur les événements locaux, peut vraiment faire la différence. Rappelez-vous, le bouche-à-oreille est puissant, et un invité heureux partagera certainement son expérience positive avec d\'autres.', '2023-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `cancellationpolicy`
--

DROP TABLE IF EXISTS `cancellationpolicy`;
CREATE TABLE IF NOT EXISTS `cancellationpolicy` (
  `cancellationPolicyId` int NOT NULL AUTO_INCREMENT,
  `propertyId` int NOT NULL,
  `cancellationTime` int NOT NULL,
  `refundPolicy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cancellationFees` decimal(10,0) NOT NULL,
  PRIMARY KEY (`cancellationPolicyId`),
  KEY `PROPERTY` (`propertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `propertyId` int NOT NULL,
  `rating` int NOT NULL,
  `commentText` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`commentId`),
  KEY `USER` (`uid`),
  KEY `property` (`propertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentId`, `uid`, `propertyId`, `rating`, `commentText`) VALUES
(3, 14, 121, 5, 'test'),
(4, 14, 121, 5, 'test'),
(7, 14, 125, 3, 'L\'internet est pas terrible'),
(8, 14, 125, 1, 'test'),
(9, 14, 125, 5, '2test'),
(10, 10, 120, 5, 'top'),
(11, 10, 119, 5, '4'),
(12, 10, 126, 5, '5'),
(13, 25, 130, 1, 'meh'),
(14, 14, 106, 3, 'eazeazeaz');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE IF NOT EXISTS `conversation` (
  `conversationId` int NOT NULL AUTO_INCREMENT,
  `u1Id` int NOT NULL,
  `u2Id` int NOT NULL,
  PRIMARY KEY (`conversationId`),
  KEY `USER` (`u2Id`),
  KEY `USER1` (`u1Id`),
  KEY `USER2` (`u2Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE IF NOT EXISTS `favorite` (
  `favoriteId` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `propertyId` int NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`favoriteId`),
  KEY `USER` (`uid`),
  KEY `PROPERTY` (`propertyId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`favoriteId`, `uid`, `propertyId`, `addedDate`) VALUES
(101, 14, 103, '2023-08-21 07:16:55'),
(102, 14, 104, '2023-08-21 07:16:57'),
(108, 14, 101, '2023-08-21 07:22:19'),
(109, 14, 102, '2023-08-21 07:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `hostlanguage`
--

DROP TABLE IF EXISTS `hostlanguage`;
CREATE TABLE IF NOT EXISTS `hostlanguage` (
  `hostLanguageId` int NOT NULL AUTO_INCREMENT,
  `propertyId` int NOT NULL,
  `anglais` tinyint(1) NOT NULL,
  `français` tinyint(1) NOT NULL,
  `allemand` tinyint(1) NOT NULL,
  `japonais` tinyint(1) NOT NULL,
  `italien` tinyint(1) NOT NULL,
  `russe` tinyint(1) NOT NULL,
  `espagnol` tinyint(1) NOT NULL,
  `chinois` tinyint(1) NOT NULL,
  `arabe` tinyint(1) NOT NULL,
  PRIMARY KEY (`hostLanguageId`),
  KEY `PROPERTY` (`propertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostlanguage`
--

INSERT INTO `hostlanguage` (`hostLanguageId`, `propertyId`, `anglais`, `français`, `allemand`, `japonais`, `italien`, `russe`, `espagnol`, `chinois`, `arabe`) VALUES
(50, 92, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(58, 100, 1, 1, 1, 0, 0, 0, 0, 0, 1),
(59, 101, 1, 1, 1, 0, 0, 0, 0, 1, 1),
(60, 102, 1, 1, 0, 0, 1, 1, 1, 1, 1),
(61, 103, 1, 1, 1, 0, 1, 1, 0, 0, 0),
(62, 104, 1, 1, 1, 0, 0, 1, 0, 1, 1),
(63, 105, 1, 1, 1, 0, 0, 1, 1, 0, 1),
(64, 106, 1, 1, 0, 0, 0, 1, 1, 0, 0),
(77, 119, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(78, 120, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(79, 121, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 125, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(84, 126, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(85, 127, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(86, 128, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 129, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 130, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 131, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 132, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 133, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 134, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 135, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 136, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 137, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(96, 138, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(97, 139, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(98, 140, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(99, 141, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(100, 142, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(101, 143, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(102, 144, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(103, 145, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(104, 146, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(105, 147, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(106, 148, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(107, 149, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(108, 150, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(109, 151, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(110, 152, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(111, 153, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(112, 154, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(113, 155, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(114, 156, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(115, 157, 0, 0, 0, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `houserules`
--

DROP TABLE IF EXISTS `houserules`;
CREATE TABLE IF NOT EXISTS `houserules` (
  `houseRulesId` int NOT NULL AUTO_INCREMENT,
  `propertyId` int NOT NULL,
  `checkInTime` time NOT NULL,
  `checkOutTime` time NOT NULL,
  `maxGuests` int NOT NULL,
  PRIMARY KEY (`houseRulesId`),
  KEY `PROPERTY` (`propertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `houserules`
--

INSERT INTO `houserules` (`houseRulesId`, `propertyId`, `checkInTime`, `checkOutTime`, `maxGuests`) VALUES
(34, 92, '16:19:00', '16:19:00', 5),
(42, 100, '17:00:00', '11:00:00', 50),
(43, 101, '18:30:00', '11:00:00', 8),
(44, 102, '16:30:00', '10:00:00', 12),
(45, 103, '16:30:00', '10:00:00', 12),
(46, 104, '15:30:00', '10:30:00', 16),
(47, 105, '18:00:00', '09:00:00', 6),
(48, 106, '16:30:00', '09:30:00', 14),
(61, 119, '14:47:00', '14:47:00', 2),
(62, 120, '14:51:00', '14:51:00', 1),
(63, 121, '14:59:00', '14:59:00', 4),
(67, 125, '09:32:00', '13:36:00', 3),
(68, 126, '06:06:00', '06:06:00', 4),
(69, 127, '19:51:00', '13:51:00', 2),
(70, 128, '19:57:00', '19:57:00', 1),
(71, 129, '09:46:00', '10:46:00', 5),
(72, 130, '15:09:00', '15:09:00', 2),
(73, 131, '19:31:00', '14:31:00', 1),
(74, 132, '19:31:00', '14:31:00', 1),
(75, 133, '20:34:00', '18:34:00', 1),
(76, 134, '15:36:00', '17:36:00', 2),
(77, 135, '14:38:00', '15:39:00', 1),
(78, 136, '17:49:00', '17:49:00', 1),
(79, 137, '14:52:00', '15:52:00', 2),
(80, 138, '16:56:00', '18:56:00', 1),
(81, 139, '15:07:00', '16:07:00', 1),
(82, 140, '09:33:00', '13:33:00', -1),
(83, 141, '20:10:00', '18:10:00', 1),
(84, 142, '14:20:00', '17:20:00', 1),
(85, 143, '14:32:00', '16:32:00', 1),
(86, 144, '20:21:00', '21:21:00', 2),
(87, 145, '15:22:00', '16:22:00', 1),
(88, 146, '15:32:00', '21:32:00', 2),
(89, 147, '15:41:00', '18:41:00', 1),
(90, 148, '15:43:00', '17:43:00', 2),
(91, 149, '15:53:00', '21:53:00', 2),
(92, 150, '15:54:00', '16:54:00', 2),
(93, 151, '15:58:00', '15:58:00', 1),
(94, 152, '16:01:00', '16:01:00', 1),
(95, 153, '22:07:00', '19:07:00', -1),
(96, 154, '16:08:00', '21:08:00', 1),
(97, 155, '22:09:00', '19:09:00', 3),
(98, 156, '16:09:00', '17:09:00', 1),
(99, 157, '21:10:00', '21:10:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoiceId` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `reservationId` int NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `billingDate` date NOT NULL,
  `dueDate` date NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`invoiceId`),
  KEY `USER` (`uid`),
  KEY `RESERVATION` (`reservationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `messageId` int NOT NULL AUTO_INCREMENT,
  `conversationId` int NOT NULL,
  `senderId` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`messageId`),
  KEY `messageId` (`messageId`,`conversationId`),
  KEY `conversationId` (`conversationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messagestatus`
--

DROP TABLE IF EXISTS `messagestatus`;
CREATE TABLE IF NOT EXISTS `messagestatus` (
  `messageStatusId` int NOT NULL AUTO_INCREMENT,
  `messageId` int NOT NULL,
  `uid` int NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`messageStatusId`),
  KEY `USER` (`uid`),
  KEY `MESSAGE` (`messageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentId` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `reservationId` int NOT NULL,
  `paymentAmount` decimal(10,0) NOT NULL,
  `paymentDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentstatus` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`paymentId`),
  KEY `USER` (`uid`),
  KEY `RESERVATION` (`reservationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `propertyId` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `priceNight` decimal(10,2) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `postalCode` int NOT NULL,
  `department` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `region` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `latitude` decimal(12,9) NOT NULL,
  `longitude` decimal(12,9) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `publicationdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reservationOption` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `owner` int NOT NULL,
  PRIMARY KEY (`propertyId`),
  KEY `USER` (`owner`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertyId`, `title`, `description`, `priceNight`, `address`, `city`, `postalCode`, `department`, `region`, `country`, `latitude`, `longitude`, `availability`, `publicationdate`, `reservationOption`, `owner`) VALUES
(92, 'Card dashboard', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '50.00', '14 Allée des Mélèzes', 'Embrun', 5200, 'Hautes-Alpes', 'Provence-Alpes-Côte d\'Azur', 'France', '0.000000000', '0.000000000', 0, '2023-07-05 16:19:51', '', 13),
(100, 'Château de conte de fées : luxe et élégance', 'Bienvenue dans ce château majestueux, symbole d\'élégance et de raffinement. Niché au cœur d\'un domaine verdoyant, cet hébergement vous transporte dans un univers féérique où l\'histoire et le luxe se rencontrent.  Le château est entièrement rénové et réaménagé, offrant des chambres spacieuses et richement décorées qui vous plongent dans une atmosphère unique. Les jardins à la française soigneusement entretenus ajoutent une touche de charme supplémentaire à cet endroit enchanteur.  Vous pourrez profiter des vastes jardins paysagers, de la piscine extérieure et des terrasses offrant une vue panoramique sur les environs. Les activités ne manquent pas : promenades à cheval, visites de châteaux voisins et découvertes culinaires vous promettent des moments uniques et mémorables.  Réservez dès maintenant votre séjour dans ce château d\'exception, et laissez-vous envoûter par l\'atmosphère enchanteresse qui règne en ces lieux. Une expérience hors du commun vous attend, où vous serez les héros d\'un conte de fées moderne, plongés dans l\'histoire et le luxe d\'un château majestueux.', '222.00', '89 Route des Bois', 'Remiremont', 88200, 'Vosges', 'Grand Est', 'France', '46.212939400', '6.282479400', 0, '2023-07-11 18:20:37', '', 8),
(101, 'Château de charme au cœur de la campagne', 'Bienvenue dans ce château exceptionnel qui vous transporte dans un univers hors du temps. Niché au milieu d\'un paysage pittoresque, ce château de charme respire l\'histoire et la tranquillité. Son architecture élégante et ses jardins verdoyants créent une atmosphère enchanteresse dès votre arrivée.  Les intérieurs sont luxueusement aménagés avec un mélange subtil d\'éléments d\'époque et de touches contemporaines. Les chambres spacieuses et raffinées vous offrent un confort absolu pour un séjour des plus agréables. Les vastes salles de réception sont parfaites pour les rassemblements en famille ou entre amis, créant ainsi des souvenirs précieux.  Laissez-vous séduire par les jardins soigneusement entretenus qui entourent le château. Vous pourrez flâner le long des allées bordées d\'arbres centenaires, vous détendre dans des espaces de repos paisibles ou vous divertir avec une partie de croquet sur la pelouse impeccablement entretenue.  La campagne environnante vous invite à de belles excursions, que ce soit pour des promenades à vélo à travers les paysages pittoresques, des visites de villages charmants ou des dégustations de vins dans les vignobles locaux. Les activités de plein air, comme la pêche, la randonnée et l\'équitation, sont également accessibles à proximité.  Réservez dès maintenant votre séjour dans ce château de charme et laissez-vous envoûter par son atmosphère romantique et paisible. Une expérience inoubliable vous attend, où vous pourrez vous évader du quotidien et vous immerger dans l\'élégance intemporelle d\'un château de campagne enchanteur.', '100.00', '3 Place de l\'Église', 'Pont-l\'Abbé', 29120, 'Finistère', 'Bretagne', 'France', '0.000000000', '0.000000000', 0, '2023-07-11 18:31:11', '', 8),
(102, 'Château historique : plongez dans le passé', 'Bienvenue dans ce château chargé d\'histoire, véritable joyau architectural qui vous transporte à travers les siècles. Imprégnez-vous de l\'atmosphère authentique de ses murs et laissez-vous envoûter par son charme intemporel.  Ce château magnifiquement restauré est un véritable témoin du passé. Les pièces sont décorées avec soin, mettant en valeur les détails d\'époque et créant une ambiance chaleureuse et raffinée. Les chambres spacieuses et élégantes vous accueillent dans un confort absolu, vous invitant à vous détendre et à vous ressourcer.  Les vastes jardins qui entourent le château sont un véritable havre de paix. Promenez-vous le long des allées bordées de fleurs parfumées, reposez-vous à l\'ombre des arbres centenaires ou profitez d\'un pique-nique romantique dans un coin tranquille. Les vues panoramiques sur la campagne environnante ajoutent une dimension magique à cet écrin historique.  Les amateurs d\'histoire seront comblés par les nombreuses possibilités d\'exploration à proximité. Visitez les sites historiques locaux, découvrez les anecdotes fascinantes du château lors de visites guidées ou partez à la découverte des villages pittoresques environnants.  Réservez dès maintenant votre séjour dans ce château historique et laissez-vous transporter dans le passé. Une expérience unique vous attend, où vous pourrez vous plonger dans l\'histoire et profiter de l\'élégance intemporelle d\'un château chargé d\'émotions.', '150.00', '64 Chemin du Roy', 'Nice', 6300, 'Alpes-Maritimes', 'Provence-Alpes-Côte d\'Azur', 'France', '44.808123400', '6.575133000', 0, '2023-07-11 18:35:08', '', 8),
(103, 'Château de luxe : l\'art de vivre à son apogée', 'Bienvenue dans ce château d\'exception, véritable paradis du luxe et du raffinement. Dès votre arrivée, vous serez captivé par l\'atmosphère grandiose et la beauté architecturale de cet édifice majestueux.  Les intérieurs sont un mélange harmonieux de design contemporain et de touches classiques, créant ainsi une ambiance à la fois sophistiquée et chaleureuse. Les chambres sont somptueusement aménagées, offrant des espaces spacieux où le confort et l\'élégance se marient à la perfection.  Les espaces extérieurs ne sont pas en reste. Les jardins magnifiquement entretenus, agrémentés de fontaines et de sculptures, vous invitent à des moments de détente et de contemplation. Profitez d\'une piscine privée, détendez-vous sur les terrasses ensoleillées ou promenez-vous dans les allées parfumées.  Ce château offre une expérience gastronomique d\'exception. Un chef privé peut être mis à votre disposition pour créer des repas raffinés, mettant en valeur les délices culinaires de la région. Vous pourrez également vous adonner à des dégustations de vins fins dans la cave à vins du château.  Pour agrémenter votre séjour, une multitude d\'activités vous sont proposées : spa, salle de sport, salle de jeux, courts de tennis, et bien plus encore. Vous aurez également la possibilité d\'explorer les environs en hélicoptère pour admirer les paysages à couper le souffle.  Réservez dès maintenant votre séjour dans ce château de luxe et laissez-vous envoûter par l\'art de vivre à son apogée. Une expérience inoubliable vous attend, où chaque instant sera empreint de glamour, de confort et de sophistication.', '300.00', '15 Allée des Chênes', 'Montargis', 45200, 'Centre-Val de Loire', 'Loiret', 'France', '0.000000000', '0.000000000', 0, '2023-07-11 18:38:25', '', 8),
(104, 'Château romantique : une évasion amoureuse', 'Bienvenue dans ce château romantique, niché au cœur d\'un paysage pittoresque, offrant une escapade parfaite pour les amoureux en quête de moments précieux. Dès votre arrivée, vous serez transporté dans un univers de douceur et de passion.  Le château dégage une aura romantique indéniable avec ses tours élancées, ses jardins fleuris et ses intérieurs élégants. Les chambres sont décorées avec goût, alliant charme d\'époque et confort moderne, pour une ambiance intime et chaleureuse propice à la romance.  Les jardins romantiques qui entourent le château sont parfaits pour des promenades main dans la main. Découvrez des recoins secrets, des bancs ombragés et des points de vue panoramiques, créant ainsi des instants de complicité inoubliables.  Pour une expérience romantique ultime, profitez des services exclusifs tels que des dîners aux chandelles dans des salles de réception privées, des massages relaxants en duo ou des moments de détente dans un bain à remous avec vue sur le paysage enchanteur.  Vous aurez également la possibilité de partir à la découverte des alentours, en explorant des villages pittoresques, en dégustant des vins régionaux ou en partageant des activités romantiques telles que des balades en calèche ou des pique-niques dans des sites romantiques.  Réservez dès maintenant votre séjour dans ce château romantique et laissez-vous emporter par la magie de l\'amour. Une évasion amoureuse vous attend, où vous pourrez créer des souvenirs inoubliables et vivre des moments de passion et de complicité dans un cadre enchanteur.', '400.00', '27 Rue des Vignes', 'La Rochelle', 17000, 'Charente-Maritime', 'Nouvelle-Aquitaine', 'France', '48.855324100', '2.276443100', 0, '2023-07-11 18:41:05', '', 8),
(105, 'Chalet alpin : ressourcez-vous en pleine nature', 'Bienvenue dans ce chalet alpin pittoresque, un véritable refuge de montagne qui vous invite à vous ressourcer et à vous reconnecter avec la nature. Situé au cœur d\'un paysage montagneux à couper le souffle, ce chalet offre une expérience authentique et chaleureuse.  L\'intérieur du chalet allie avec harmonie le bois traditionnel et des touches de modernité. Les espaces de vie sont accueillants et confortables, créant une atmosphère conviviale pour des moments de détente en famille ou entre amis. Les grandes baies vitrées offrent des vues panoramiques sur les sommets enneigés ou les paysages verdoyants, selon la saison.  Le chalet dispose de tout le confort nécessaire pour rendre votre séjour agréable. Profitez d\'une soirée près de la cheminée, détendez-vous dans le jacuzzi extérieur ou dégustez un délicieux repas dans la cuisine entièrement équipée. Les chambres confortables vous invitent à des nuits paisibles, bercées par le calme de la montagne.  Les activités ne manquent pas, été comme hiver. En hiver, vous pourrez dévaler les pistes de ski à proximité, faire de la raquette ou vous initier à la glisse sur la patinoire du village. En été, partez en randonnée à travers des sentiers magnifiques, explorez les lacs alpins environnants ou faites du VTT sur des pistes pittoresques.  Réservez dès maintenant votre séjour dans ce chalet alpin et laissez-vous séduire par l\'atmosphère chaleureuse et l\'authenticité de la montagne. Une escapade en pleine nature vous attend, où vous pourrez vous ressourcer, vous amuser et profiter des merveilles de l\'environnement alpin.', '70.00', '5 Chemin des Sapins', 'Chamonix-Mont-Blanc', 74400, 'Haute-Savoie Auvergne-Rhône-Al', 'Auvergne-Rhône-Alpes', 'France', '0.000000000', '0.000000000', 0, '2023-07-11 18:45:12', '', 13),
(106, 'Château de caractère : une immersion dans l\'histoire', 'Bienvenue dans ce château de caractère, véritable vestige du temps qui vous transporte dans une époque révolue. Imprégnez-vous de l\'atmosphère chargée d\'histoire dès votre arrivée et laissez-vous emporter par son charme envoûtant.  Le château, magnifiquement restauré, est le reflet d\'une architecture remarquable et de détails d\'époque préservés avec soin. Les salles majestueuses, les galeries aux voûtes imposantes et les chambres richement décorées vous plongent dans une ambiance digne des contes de fées.  Chaque coin du château raconte une histoire. Promenez-vous dans les jardins à la française, admirez les fresques murales et les tapisseries anciennes, et explorez les pièces secrètes qui recèlent des trésors cachés.  Votre séjour au château sera agrémenté d\'expériences uniques. Vous pourrez déguster des mets raffinés dans une salle à manger d\'époque, assister à des concerts de musique classique dans la salle de bal somptueuse ou vous détendre dans un salon confortable en dégustant un verre de vin sélectionné parmi la cave du château.  Pour une immersion totale, des visites guidées vous permettront de découvrir les secrets et les légendes du château, vous transportant ainsi dans une époque révolue. Vous pourrez également profiter des activités de loisirs proposées, telles que des balades à cheval dans le parc environnant ou des soirées costumées à thème.  Réservez dès maintenant votre séjour dans ce château de caractère et plongez dans une immersion passionnante dans l\'histoire. Une expérience inoubliable vous attend, où vous pourrez vivre une vie de châtelain et vous émerveiller devant la grandeur et la beauté d\'un château chargé de mystères.', '400.00', '12 Rue du Chateau d\'Eau', 'Montmirail', 51210, 'Marne', 'Grand Est', 'France', '49.564106000', '6.076458300', 0, '2023-07-12 09:04:46', '', 13);

-- --------------------------------------------------------

--
-- Table structure for table `propertyamenities`
--

DROP TABLE IF EXISTS `propertyamenities`;
CREATE TABLE IF NOT EXISTS `propertyamenities` (
  `propertyAmenitiesId` int NOT NULL AUTO_INCREMENT,
  `propertyId` int NOT NULL,
  `bedrooms` int NOT NULL,
  `beds` int NOT NULL,
  `bathrooms` int NOT NULL,
  `toilets` int NOT NULL,
  PRIMARY KEY (`propertyAmenitiesId`),
  KEY `PROPERTY` (`propertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propertyamenities`
--

INSERT INTO `propertyamenities` (`propertyAmenitiesId`, `propertyId`, `bedrooms`, `beds`, `bathrooms`, `toilets`) VALUES
(27, 92, 4, 3, 3, 5),
(36, 100, 8, 8, 8, 8),
(37, 101, 8, 8, 4, 5),
(38, 102, 8, 8, 6, 6),
(39, 103, 8, 8, 6, 8),
(40, 104, 8, 8, 8, 8),
(41, 105, 3, 5, 2, 2),
(42, 106, 8, 8, 8, 8),
(55, 119, 1, 1, 1, 1),
(56, 120, 1, 1, 1, 1),
(57, 121, 8, 8, 8, 8),
(61, 125, 3, 4, 2, 2),
(62, 126, 3, 3, 1, 1),
(63, 127, 2, 2, 2, 2),
(64, 128, 1, 1, 1, 1),
(65, 129, 2, 2, 2, 2),
(66, 130, 2, 2, 1, 2),
(67, 131, 1, 1, 1, 1),
(68, 132, 1, 1, 1, 1),
(69, 133, 2, 2, 2, 2),
(70, 134, 2, 2, 2, 2),
(71, 135, 1, 1, 1, 1),
(72, 136, 1, 1, 1, 1),
(73, 137, 1, 1, 1, 1),
(74, 138, 1, 1, 1, 1),
(75, 139, 1, 1, 1, 1),
(76, 140, 2, 2, 2, 2),
(77, 141, 1, 1, 1, 1),
(78, 142, 1, 1, 1, 1),
(79, 143, 1, 1, 1, 1),
(80, 144, 2, 2, 2, 2),
(81, 145, 1, 1, 1, 1),
(82, 146, 2, 2, 2, 2),
(83, 147, 1, 1, 1, 1),
(84, 148, 2, 2, 2, 2),
(85, 149, 2, 2, 2, 2),
(86, 150, 2, 2, 2, 2),
(87, 151, 1, 1, 1, 1),
(88, 152, 2, 2, 2, 2),
(89, 153, 2, 2, 2, 2),
(90, 154, 1, 1, 1, 1),
(91, 155, 3, 2, 5, 3),
(92, 156, 1, 1, 1, 1),
(93, 157, 1, 8, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `propertyimages`
--

DROP TABLE IF EXISTS `propertyimages`;
CREATE TABLE IF NOT EXISTS `propertyimages` (
  `propertyImagesId` int NOT NULL AUTO_INCREMENT,
  `propertyId` int NOT NULL,
  `imageMainURL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image1URL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image2URL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image3URL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image4URL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`propertyImagesId`),
  KEY `PROPERTY` (`propertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propertyimages`
--

INSERT INTO `propertyimages` (`propertyImagesId`, `propertyId`, `imageMainURL`, `image1URL`, `image2URL`, `image3URL`, `image4URL`) VALUES
(26, 92, '64a57c0723fae.jpg', '64a57c0724168.jpg', '64a57c07242e9.jpg', '64a57c0724424.jpg', '64a57c072452e.jpg'),
(34, 100, '64aebf365205b.jpg', '64aebf36521f8.jpg', '64aebf3652310.jpg', '64aebf36524e8.jpg', '64aebf3652616.jpg'),
(35, 101, '64ad83cf0ce47.jpg', '64ad83cf0cffe.jpg', '64ad83cf0d11f.jpg', '64ad83cf0d234.jpg', '64ad83cf0d36d.jpg'),
(36, 102, '64ad84bca453f.jpg', '64ad84bca46cf.jpg', '64ad84bca47fe.jpg', '64ad84bca4961.jpg', '64ad84bca50ee.jpg'),
(37, 103, '64ad8581498a2.jpg', '64ad858149a78.jpg', '64ad858149ba2.jpg', '64ad858149d10.jpg', '64ad858149e6d.jpg'),
(38, 104, '64ad86217d184.jpg', '64ad86217d395.jpg', '64ad86217d4e5.jpg', '64ad86217d6ae.jpg', '64ad86217e0db.jpg'),
(39, 105, '64ad8718d2ac2.jpg', '64ad8718d2ca4.jpg', '64ad8718d2e13.jpg', '64ad8718d2f6b.jpg', '64ad8718d319d.jpg'),
(40, 106, '64aeabe6beadc.jpg', '64aeabe6becb2.jpg', '64aeabe6bee88.jpg', '64aeabe6bf007.jpg', '64aeabe6bf1ea.jpg'),
(73, 139, '64dcca23649be.jpg', '', '', '', ''),
(74, 140, '64ddcd5f7cf83.jpg', '', '', '', ''),
(87, 153, '64df7b34860c2.jpg', '', '', '', ''),
(88, 154, '64df7b6910769.jpg', '64df7b69109f0.jpg', '', '', ''),
(89, 155, '64df7b91a28bf.png', '64df7b91a2adf.png', '64df7b91a2c69.png', '', ''),
(90, 156, '64df7bba58eff.png', '64df7bba59187.png', '64df7bba593ab.jpg', '64df7bba59513.png', ''),
(91, 157, '64df7be3228e6.jpg', '64df7be322d27.jpg', '64df7be32322d.jpg', '64df7be3233b4.jpg', '64df7be3234f9.png');

-- --------------------------------------------------------

--
-- Table structure for table `propertytag`
--

DROP TABLE IF EXISTS `propertytag`;
CREATE TABLE IF NOT EXISTS `propertytag` (
  `propertyId` int NOT NULL,
  `tagId` int NOT NULL,
  KEY `PROPERTY` (`propertyId`),
  KEY `TAG` (`tagId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propertytag`
--

INSERT INTO `propertytag` (`propertyId`, `tagId`) VALUES
(92, 376),
(92, 377),
(101, 392),
(102, 392),
(103, 392),
(104, 392),
(105, 376),
(105, 377),
(105, 378),
(105, 381),
(105, 393),
(105, 425),
(106, 392),
(100, 392),
(119, 376),
(120, 376),
(121, 376),
(125, 376),
(126, 376),
(126, 377),
(127, 417),
(128, 381),
(129, 376),
(130, 391),
(131, 376),
(132, 376),
(133, 377),
(134, 382),
(135, 389),
(136, 376),
(137, 376),
(138, 404),
(139, 379),
(140, 376),
(141, 400),
(142, 393),
(143, 382),
(144, 379),
(145, 376),
(146, 382),
(147, 381),
(148, 384),
(149, 382),
(150, 376),
(150, 380),
(151, 382),
(152, 377),
(153, 379),
(154, 378),
(155, 382),
(156, 382),
(157, 379),
(157, 415);

-- --------------------------------------------------------

--
-- Table structure for table `propertytype`
--

DROP TABLE IF EXISTS `propertytype`;
CREATE TABLE IF NOT EXISTS `propertytype` (
  `PropertyTypeId` int NOT NULL AUTO_INCREMENT,
  `propertyId` int NOT NULL,
  `house` tinyint(1) NOT NULL,
  `flat` tinyint(1) NOT NULL,
  `guesthouse` tinyint(1) NOT NULL,
  `hotel` tinyint(1) NOT NULL,
  PRIMARY KEY (`PropertyTypeId`),
  KEY `PROPERTY` (`propertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propertytype`
--

INSERT INTO `propertytype` (`PropertyTypeId`, `propertyId`, `house`, `flat`, `guesthouse`, `hotel`) VALUES
(107, 127, 1, 0, 0, 0),
(108, 128, 1, 0, 0, 0),
(109, 129, 0, 0, 1, 0),
(110, 130, 1, 0, 0, 0),
(111, 131, 1, 0, 0, 0),
(112, 132, 1, 0, 0, 0),
(113, 133, 1, 0, 0, 0),
(114, 134, 1, 0, 0, 0),
(115, 135, 1, 0, 0, 0),
(116, 136, 1, 0, 0, 0),
(117, 137, 1, 0, 0, 0),
(118, 138, 0, 1, 0, 0),
(119, 139, 1, 0, 0, 0),
(120, 140, 1, 0, 0, 0),
(121, 141, 1, 0, 0, 0),
(122, 142, 1, 0, 0, 0),
(123, 143, 1, 0, 0, 0),
(124, 144, 1, 0, 0, 0),
(125, 145, 1, 0, 0, 0),
(126, 146, 1, 0, 0, 0),
(127, 147, 1, 0, 0, 0),
(128, 148, 1, 0, 0, 0),
(129, 149, 1, 0, 0, 0),
(130, 150, 1, 0, 0, 0),
(131, 151, 0, 0, 0, 1),
(132, 152, 1, 0, 0, 0),
(133, 153, 0, 1, 0, 0),
(134, 154, 0, 1, 0, 0),
(135, 155, 1, 0, 0, 0),
(136, 156, 0, 0, 1, 0),
(137, 157, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservationId` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `propertyId` int NOT NULL,
  `checkInDate` date NOT NULL,
  `checkoutDate` date NOT NULL,
  `numTravelers` int NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  PRIMARY KEY (`reservationId`),
  KEY `PROPERTY` (`propertyId`),
  KEY `USER` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationId`, `uid`, `propertyId`, `checkInDate`, `checkoutDate`, `numTravelers`, `totalPrice`) VALUES
(5, 8, 106, '2023-07-26', '2023-07-30', 4, '1908.00'),
(12, 14, 106, '2023-08-18', '2023-08-21', 1, '1444.50');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleId` int NOT NULL,
  `uid` int NOT NULL,
  `user` tinyint(1) NOT NULL,
  `owner` tinyint(1) NOT NULL,
  `administrator` tinyint(1) NOT NULL,
  KEY `USER` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `tagId` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`tagId`)
) ENGINE=InnoDB AUTO_INCREMENT=428 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tagId`, `type`, `picto`) VALUES
(376, 'Avec vue', 'avecvue'),
(377, 'Chambres', 'chambres'),
(378, 'Campagne', 'campagne'),
(379, 'Wow !', 'wow'),
(380, 'Sur l\'eau', 'surleau'),
(381, 'Espaces de jeu', 'espacesdejeu'),
(382, 'Piscines', 'piscines'),
(383, 'Bord de mer', 'borddemer'),
(384, 'Cabanes perchées', 'cabanesperchees'),
(385, 'Bateaux', 'bateaux'),
(386, 'Luxe', 'luxe'),
(387, 'Dômes', 'domes'),
(388, 'Tiny houses', 'tinyhouses'),
(389, 'Tendance', 'tendance'),
(390, 'Bord de lac', 'borddelac'),
(391, 'Fermes', 'fermes'),
(392, 'Châteaux', 'chateaux'),
(393, 'Cabanes', 'cabanes'),
(394, 'Design', 'design'),
(395, 'Grandes demeures', 'grandesdemeures'),
(396, 'Séjours déconnectés', 'sejoursdeconnectes'),
(397, 'Lacs', 'lacs'),
(398, 'Camping', 'camping'),
(399, 'Parcs nationaux', 'parcsnationaux'),
(400, 'Maisons troglodytes', 'maisonstroglodytes'),
(401, 'Vignobles', 'vignobles'),
(402, 'Ski', 'ski'),
(403, 'Nouveautés', 'nouveautes'),
(404, 'Maisons organiques', 'maisonsorganiques'),
(405, 'Patrimoine', 'patrimoine'),
(406, 'Villes emblématiques', 'villesemblematiques'),
(407, 'Chambres d\'hôtes', 'chambresdhotes'),
(408, 'Yourtes', 'yourtes'),
(409, 'Art et créativité', 'artetcreativite'),
(410, 'Maisons cycladiques', 'maisonscycladiques'),
(411, 'Riads', 'riads'),
(412, 'Granges', 'granges'),
(413, 'Au pied des pistes', 'aupieddespistes'),
(414, 'Chalets tipi', 'chaletstipi'),
(415, 'Cabanes de berger', 'cabanesdeberger'),
(416, 'Dammusi', 'dammusi'),
(417, 'Surf', 'surf'),
(418, 'Toit du monde', 'toitdumonde'),
(419, 'Conteneurs maritimes', 'conteneursmaritimes'),
(420, 'Moulins à vent', 'moulinsavent'),
(421, 'Casas particulares', 'casasparticulares'),
(422, 'Tours', 'tours'),
(423, 'Cuisines équipées', 'cuisinesequipees'),
(424, 'Hanoks', 'hanoks'),
(425, 'Logements adaptés', 'logementsadaptes'),
(426, 'Caravanes', 'caravanes'),
(427, 'Plages', 'plages');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birthDate` date NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phoneNumber` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picture` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `registrationDate` date NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `firstName`, `lastName`, `birthDate`, `email`, `password`, `phoneNumber`, `picture`, `registrationDate`) VALUES
(8, 'Frédéric', 'Favreau', '0000-00-00', 'fred@gmail.com', '$2y$10$GaZ/gznrAdDs9Ax9NUc7Q.782X9AzSevwHe5D78txYhFnxhFKu9b.', '', 'user.png', '0000-00-00'),
(10, 'Roberto', 'Toto', '2023-08-11', 'toto@gmail.com', '$2y$10$E8SiOsulhDiZuQXCRgm1xe8a1i2O0cRa5/K79aHTooVtSa9YXbwti', '0607080910', '2vdapi.jpg', '0000-00-00'),
(13, 'zaza', 'zaza', '2023-08-18', 'zaza@gmail.com', '$2y$10$3.2nyNMAMJX1hcE/W7AqOOQSUF1Vy/FZG4X7FPzxDF6Eq3k5/lw32', '050600708', 'user.png', '0000-00-00'),
(14, 'Walesca', 'MissU', '1995-05-11', 'Walescat@gmail.com', '$2y$10$E5QchFZpZSDgFyqvJlKqueHsH6nTfBu7cQyyZhWTRVQGWWCzxKx0q', '06 66 66 66 69', 'WaNom.png', '0000-00-00'),
(15, 'Hamid', 'Ham', '0000-00-00', 'hamid@gmail.com', '$2y$10$tBZT.QziDePhCenELfdqaeLXOfv6vaok5biEKkvIBl3.hxCvfrwtq', '', 'user.png', '0000-00-00'),
(25, 'Bug', 'Finder', '2023-08-11', 'bugger@gmail.com', '$2y$10$owWNy7kLz3uf/M.h6GV7Zew.wshLQk/bcRA6XcdlAdGQlWaI5qz8y', '666666', '4b487d40edcb2c597ec9db18537c117e.jpg', '2023-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `user_properties`
--

DROP TABLE IF EXISTS `user_properties`;
CREATE TABLE IF NOT EXISTS `user_properties` (
  `userPropertyId` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `propertyId` int NOT NULL,
  PRIMARY KEY (`userPropertyId`),
  KEY `USER` (`uid`),
  KEY `PROPERTY` (`propertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`conversationId`) REFERENCES `conversation` (`conversationId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_properties`
--
ALTER TABLE `user_properties`
  ADD CONSTRAINT `user_properties_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_properties_ibfk_2` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
