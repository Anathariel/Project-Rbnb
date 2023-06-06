-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 06 juin 2023 à 13:22
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rbnb`
--

-- --------------------------------------------------------

--
-- Structure de la table `accommodationtype`
--

DROP TABLE IF EXISTS `accommodationtype`;
CREATE TABLE IF NOT EXISTS `accommodationtype` (
  `accommodationTypeId` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`accommodationTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `accommodationtype`
--

INSERT INTO `accommodationtype` (`accommodationTypeId`, `type`) VALUES
(1, 'Piscine'),
(2, 'Parking gratuit'),
(3, 'Jacuzzi'),
(4, 'Wifi'),
(5, 'Cuisine'),
(6, 'Lave-linge'),
(7, 'Sèche-linge'),
(8, 'Climatisation'),
(9, 'Chauffage'),
(10, 'Espace de travail dédié'),
(11, 'Télévision'),
(12, 'Sèche-cheveux'),
(13, 'Fer à repasser'),
(14, 'Station de recharge pour véhicules électriques'),
(15, 'Lit pour bébé'),
(16, 'Salle de sport'),
(17, 'Barbecue'),
(18, 'Petit déjeuner'),
(19, 'Cheminée'),
(20, 'Logement fumeur'),
(21, 'Détecteur de fumée'),
(22, 'Détecteur de monoxyde de carbone');

-- --------------------------------------------------------

--
-- Structure de la table `cancellationpolicy`
--

DROP TABLE IF EXISTS `cancellationpolicy`;
CREATE TABLE IF NOT EXISTS `cancellationpolicy` (
  `cancellationPolicyId` int NOT NULL AUTO_INCREMENT,
  `propertyId` int NOT NULL,
  `cancellationTime` int NOT NULL,
  `refundPolicy` text COLLATE utf8mb4_general_ci NOT NULL,
  `cancellationFees` decimal(10,0) NOT NULL,
  PRIMARY KEY (`cancellationPolicyId`),
  KEY `PROPERTY` (`propertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `propertyId` int NOT NULL,
  `rating` int NOT NULL,
  `commentText` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`commentId`),
  KEY `USER` (`uid`),
  KEY `property` (`propertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
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
-- Structure de la table `favorite`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hostlanguage`
--

DROP TABLE IF EXISTS `hostlanguage`;
CREATE TABLE IF NOT EXISTS `hostlanguage` (
  `hostLanguageId` int NOT NULL AUTO_INCREMENT,
  `propertyId` int NOT NULL,
  `language` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`hostLanguageId`),
  KEY `PROPERTY` (`propertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `houserules`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoiceId` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `reservationId` int NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `billingDate` date NOT NULL,
  `dueDate` date NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`invoiceId`),
  KEY `USER` (`uid`),
  KEY `RESERVATION` (`reservationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `messageId` int NOT NULL AUTO_INCREMENT,
  `conversationId` int NOT NULL,
  `senderId` int NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`messageId`),
  KEY `messageId` (`messageId`,`conversationId`),
  KEY `conversationId` (`conversationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messagestatus`
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
-- Structure de la table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentId` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `reservationId` int NOT NULL,
  `paymentAmount` decimal(10,0) NOT NULL,
  `paymentDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentstatus` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`paymentId`),
  KEY `USER` (`uid`),
  KEY `RESERVATION` (`reservationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `propertyId` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `propertyType` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `priceNight` decimal(10,0) NOT NULL,
  `accommodationTypeId` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `latitude` decimal(10,0) NOT NULL,
  `longitude` decimal(10,0) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `publicationdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reservationOption` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `owner` int NOT NULL,
  PRIMARY KEY (`propertyId`),
  KEY `PROPERTYTYPE` (`accommodationTypeId`),
  KEY `USER` (`owner`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `property`
--

INSERT INTO `property` (`propertyId`, `title`, `description`, `propertyType`, `priceNight`, `accommodationTypeId`, `address`, `latitude`, `longitude`, `availability`, `publicationdate`, `reservationOption`, `owner`) VALUES
(3, 'Belle villa avec piscine privée', 'Une magnifique villa avec une piscine privée pour des vacances relaxantes. Profitez du cadre luxueux et du confort moderne.', 'Villa', '200', 1, '123 Rue du Soleil, Ville', '49', '2', 1, '2023-06-02 14:39:17', 'Instant', 3),
(4, 'test 2', 'Une magnifique villa avec une piscine privée pour des vacances relaxantes. Profitez du cadre luxueux et du confort moderne.', 'Villa', '200', 1, '123 Rue du Soleil, Ville', '51', '2', 1, '2023-06-02 14:39:17', 'Instant', 3),
(5, 'test 3', 'Une magnifique villa avec une piscine privée pour des vacances relaxantes. Profitez du cadre luxueux et du confort moderne.', 'Villa', '200', 1, '123 Rue du Soleil, Ville', '51', '2', 1, '2023-06-02 14:39:17', 'Instant', 3),
(6, 'test 4', 'Une magnifique villa avec une piscine privée pour des vacances relaxantes. Profitez du cadre luxueux et du confort moderne.', 'Villa', '200', 1, '123 Rue du Soleil, Ville', '51', '2', 1, '2023-06-02 14:39:17', 'Instant', 3);

-- --------------------------------------------------------

--
-- Structure de la table `propertyamenities`
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `propertyimages`
--

DROP TABLE IF EXISTS `propertyimages`;
CREATE TABLE IF NOT EXISTS `propertyimages` (
  `propertyImagesId` int NOT NULL AUTO_INCREMENT,
  `propertyId` int NOT NULL,
  `imageURL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`propertyImagesId`),
  KEY `PROPERTY` (`propertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `propertytag`
--

DROP TABLE IF EXISTS `propertytag`;
CREATE TABLE IF NOT EXISTS `propertytag` (
  `propertyId` int NOT NULL,
  `tagId` int NOT NULL,
  KEY `PROPERTY` (`propertyId`),
  KEY `TAG` (`tagId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `ratingId` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `propertyId` int NOT NULL,
  `rating` int NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ratingId`),
  KEY `USER` (`uid`),
  KEY `PROPERTY` (`propertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservationId` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `propertyId` int NOT NULL,
  `checkInDate` date NOT NULL,
  `checkoutDate` date NOT NULL,
  `numAdults` int NOT NULL,
  `numberChildren` int NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`reservationId`),
  KEY `PROPERTY` (`propertyId`),
  KEY `USER` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `tagId` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `picto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`tagId`)
) ENGINE=InnoDB AUTO_INCREMENT=376 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`tagId`, `type`, `picto`) VALUES
(315, 'Avec vue', 'avecvue.svg'),
(316, 'Chambres', 'chambres.svg'),
(317, 'Campagne', 'campagne.svg'),
(318, 'Wow !', 'wow.svg'),
(319, 'Sur l\'eau', 'surleau.svg'),
(320, 'Espaces de jeu', 'espacesdejeu.svg'),
(321, 'Piscines', 'piscines.svg'),
(322, 'Bord de mer', 'borddemer.svg'),
(323, 'Cabanes perchées', 'cabanesperchees.svg'),
(324, 'Bateaux', 'bateaux.svg'),
(325, 'Luxe', 'luxe.svg'),
(326, 'Dômes', 'domes.svg'),
(327, 'Tiny houses', 'tinyhouses.svg'),
(328, 'Tendance', 'tendance.svg'),
(329, 'Bord de lac', 'borddelac.svg'),
(330, 'Fermes', 'fermes.svg'),
(331, 'Châteaux', 'chateaux.svg'),
(332, 'Cabanes', 'cabanes.svg'),
(333, 'Design', 'design.svg'),
(334, 'Grandes demeures', 'grandesdemeures.svg'),
(335, 'Séjours déconnectés', 'sejoursdeconnectes.svg'),
(336, 'Lacs', 'lacs.svg'),
(337, 'Camping', 'camping.svg'),
(338, 'Parcs nationaux', 'parcsnationaux.svg'),
(339, 'Sous les tropiques', 'souslestropiques.svg'),
(340, 'Maisons troglodytes', 'maisonstroglodytes.svg'),
(341, 'Vignobles', 'vignobles.svg'),
(342, 'Ski', 'ski.svg'),
(343, 'Nouveautés', 'nouveautes.svg'),
(344, 'Îles', 'iles.svg'),
(345, 'Maisons organiques', 'maisonsorganiques.svg'),
(346, 'Patrimoine', 'patrimoine.svg'),
(347, 'Villes emblématiques', 'villesemblematiques.svg'),
(348, 'Chambres d\'hôtes', 'chambresdhotes.svg'),
(349, 'Yourtes', 'yourtes.svg'),
(350, 'Art et créativité', 'artetcreativite.svg'),
(351, 'Maisons cycladiques', 'maisonscycladiques.svg'),
(352, 'Riads', 'riads.svg'),
(353, 'Granges', 'granges.svg'),
(354, 'Au pied des pistes', 'aupieddespistes.svg'),
(355, 'Chalets tipi', 'chaletstipi.svg'),
(356, 'Cabanes de berger', 'cabanesdeberger.svg'),
(357, 'Dammusi', 'dammusi.svg'),
(358, 'Surf', 'surf.svg'),
(359, 'Toit du monde', 'toitdumonde.svg'),
(360, 'Arctique', 'arctique.svg'),
(361, 'Conteneurs maritimes', 'conteneursmaritimes.svg'),
(362, 'Ryokans', 'ryokans.svg'),
(363, 'Désert', 'desert.svg'),
(364, 'Moulins à vent', 'moulinsavent.svg'),
(365, 'Casas particulares', 'casasparticulares.svg'),
(366, 'Pianos à queue', 'pianosaqueue.svg'),
(367, 'Tours', 'tours.svg'),
(368, 'Cuisines équipées', 'cuisinesequipees.svg'),
(369, 'Hanoks', 'hanoks.svg'),
(370, 'Trulli', 'trulli.svg'),
(371, 'Minsus', 'minsus.svg'),
(372, 'Golf', 'golf.svg'),
(373, 'Logements adaptés', 'logementsadaptes.svg'),
(374, 'Caravanes', 'caravanes.svg'),
(375, 'Plages', 'plages.svg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `birthDate` date NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phoneNumber` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`uid`, `firstName`, `lastName`, `birthDate`, `email`, `password`, `phoneNumber`, `role`) VALUES
(2, 'Frédéric', 'Favreau', '0000-00-00', 'fred@gmail.com', '$2y$10$GaZ/gznrAdDs9Ax9NUc7Q.782X9AzSevwHe5D78txYhFnxhFKu9b.', '', ''),
(3, 'demo', 'demo', '0000-00-00', 'demo@rbnb.com', '$2y$10$YpOsI8takAJZtp.B5phhZO./N0aL9FFsT4T3N6ltIl/UvGNmCHl8K', '', ''),
(5, 'toto', 'robert', '0000-00-00', 'toto@gmail.com', '$2y$10$E8SiOsulhDiZuQXCRgm1xe8a1i2O0cRa5/K79aHTooVtSa9YXbwti', '', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cancellationpolicy`
--
ALTER TABLE `cancellationpolicy`
  ADD CONSTRAINT `cancellationpolicy_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `hostlanguage`
--
ALTER TABLE `hostlanguage`
  ADD CONSTRAINT `hostlanguage_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `houserules`
--
ALTER TABLE `houserules`
  ADD CONSTRAINT `houserules_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`reservationId`) REFERENCES `reservation` (`reservationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`conversationId`) REFERENCES `conversation` (`conversationId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `messagestatus`
--
ALTER TABLE `messagestatus`
  ADD CONSTRAINT `messagestatus_ibfk_1` FOREIGN KEY (`messageId`) REFERENCES `message` (`messageId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `messagestatus_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`reservationId`) REFERENCES `reservation` (`reservationId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`accommodationTypeId`) REFERENCES `accommodationtype` (`accommodationTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `propertyamenities`
--
ALTER TABLE `propertyamenities`
  ADD CONSTRAINT `propertyamenities_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `propertyimages`
--
ALTER TABLE `propertyimages`
  ADD CONSTRAINT `propertyimages_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `propertytag`
--
ALTER TABLE `propertytag`
  ADD CONSTRAINT `propertytag_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `propertytag_ibfk_2` FOREIGN KEY (`tagId`) REFERENCES `tag` (`tagId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
