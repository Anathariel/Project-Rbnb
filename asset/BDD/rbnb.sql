-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 juil. 2023 à 06:35
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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `accommodationtype`
--

INSERT INTO `accommodationtype` (`accommodationTypeId`, `propertyId`, `piscine`, `parkingGratuit`, `jacuzzi`, `wifi`, `laveLinge`, `secheLinge`, `climatisation`, `chauffage`, `espaceTravailDedie`, `television`, `secheCheveux`, `ferRepasser`, `stationRechargeVehiElectriques`, `litBebe`, `salleSport`, `barbecue`, `petitDejeuner`, `cheminee`, `logementFumeur`, `detecteurFumee`, `detecteurMonoxyDeCarbone`) VALUES
(61, 90, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 91, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `cancellationpolicy`
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
-- Structure de la table `comment`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hostlanguage`
--

INSERT INTO `hostlanguage` (`hostLanguageId`, `propertyId`, `anglais`, `français`, `allemand`, `japonais`, `italien`, `russe`, `espagnol`, `chinois`, `arabe`) VALUES
(48, 90, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 91, 1, 0, 0, 0, 0, 0, 0, 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `houserules`
--

INSERT INTO `houserules` (`houseRulesId`, `propertyId`, `checkInTime`, `checkOutTime`, `maxGuests`) VALUES
(32, 90, '13:34:00', '13:34:00', 4),
(33, 91, '14:32:00', '14:32:00', 5);

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
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `paymentstatus` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `priceNight` decimal(10,2) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `latitude` decimal(12,9) NOT NULL,
  `longitude` decimal(12,9) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `publicationdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reservationOption` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `owner` int NOT NULL,
  PRIMARY KEY (`propertyId`),
  KEY `USER` (`owner`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `property`
--

INSERT INTO `property` (`propertyId`, `title`, `description`, `priceNight`, `address`, `latitude`, `longitude`, `availability`, `publicationdate`, `reservationOption`, `owner`) VALUES
(90, 'Upload images', 'ceci est un test', '22.00', '', '0.000000000', '0.000000000', 0, '2023-06-30 13:34:51', '', 8),
(91, 'dede', 'ededed', '69.00', '', '0.000000000', '0.000000000', 0, '2023-06-30 14:32:21', '', 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `propertyamenities`
--

INSERT INTO `propertyamenities` (`propertyAmenitiesId`, `propertyId`, `bedrooms`, `beds`, `bathrooms`, `toilets`) VALUES
(25, 90, 3, 2, 5, 2),
(26, 91, 2, 3, 6, 8);

-- --------------------------------------------------------

--
-- Structure de la table `propertyimages`
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `propertyimages`
--

INSERT INTO `propertyimages` (`propertyImagesId`, `propertyId`, `imageMainURL`, `image1URL`, `image2URL`, `image3URL`, `image4URL`) VALUES
(24, 90, '649ebddb88db0.jpg', '649ebddb88f41.jpg', '649ebddb8908a.jpg', '649ebddb8919c.jpg', '649ebddb892f3.jpg'),
(25, 91, '649ecb5543fa3.jpg', '649ecb5544184.jpg', '649ecb55442c2.jpg', '649ecb554442c.jpg', '649ecb5544594.jpg');

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

--
-- Déchargement des données de la table `propertytag`
--

INSERT INTO `propertytag` (`propertyId`, `tagId`) VALUES
(90, 376),
(90, 377),
(90, 378),
(90, 379),
(91, 376),
(91, 378),
(91, 379),
(91, 380);

-- --------------------------------------------------------

--
-- Structure de la table `propertytype`
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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `propertytype`
--

INSERT INTO `propertytype` (`PropertyTypeId`, `propertyId`, `house`, `flat`, `guesthouse`, `hotel`) VALUES
(69, 90, 1, 0, 0, 0),
(70, 91, 1, 0, 0, 0);

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
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`reservationId`),
  KEY `PROPERTY` (`propertyId`),
  KEY `USER` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
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
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `tagId` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`tagId`)
) ENGINE=InnoDB AUTO_INCREMENT=428 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tag`
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
-- Structure de la table `user`
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
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`uid`, `firstName`, `lastName`, `birthDate`, `email`, `password`, `phoneNumber`) VALUES
(8, 'Frédéric', 'Favreau', '0000-00-00', 'fred@gmail.com', '$2y$10$GaZ/gznrAdDs9Ax9NUc7Q.782X9AzSevwHe5D78txYhFnxhFKu9b.', ''),
(9, 'demo', 'demo', '0000-00-00', 'demo@rbnb.com', '$2y$10$YpOsI8takAJZtp.B5phhZO./N0aL9FFsT4T3N6ltIl/UvGNmCHl8K', ''),
(10, 'toto', 'robert', '0000-00-00', 'toto@gmail.com', '$2y$10$E8SiOsulhDiZuQXCRgm1xe8a1i2O0cRa5/K79aHTooVtSa9YXbwti', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accommodationtype`
--
ALTER TABLE `accommodationtype`
  ADD CONSTRAINT `accommodationtype_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Contraintes pour la table `propertytype`
--
ALTER TABLE `propertytype`
  ADD CONSTRAINT `propertytype_ibfk_1` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`propertyId`) REFERENCES `property` (`propertyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
