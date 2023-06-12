-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 12 juin 2023 à 07:32
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
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `tagId` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
