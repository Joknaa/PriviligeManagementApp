-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 09 jan. 2022 à 02:46
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ldap`
--

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) DEFAULT NULL,
  `service` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `service`) VALUES
(1, 2),
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(9, 3),
(9, 4),
(9, 3),
(9, 4),
(6, 11),
(6, 12),
(6, 13),
(6, 14),
(6, 15),
(6, 16),
(6, 5),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(10, 5),
(10, 6),
(10, 7),
(10, 8),
(11, 5),
(11, 6),
(11, 7),
(11, 8),
(12, 5),
(12, 6),
(12, 7),
(12, 8),
(13, 5),
(13, 6),
(13, 7),
(13, 8),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `service` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_name_uindex` (`service`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `service`) VALUES
(1, 'Demande de documents scolaires'),
(2, 'Consulter les cours '),
(3, 'Affichage de notes'),
(4, 'Calendrier d\'exams'),
(5, 'Gestion des examens'),
(6, 'Gestion des notes des étudiants'),
(7, 'Calendrier des réunions'),
(8, 'Dépot de cours '),
(9, 'Gestion des réunions'),
(10, 'Gestion de budgets'),
(11, 'Gestion des étudiants'),
(12, 'Gestion des professeurs'),
(13, 'Gestion des salles'),
(14, 'Gestion des départements'),
(15, 'Gestion de la recherche scientifique'),
(16, 'Gestion des privilèges');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `CNE` int(10) NOT NULL,
  `typeUser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_user` (`mail`),
  UNIQUE KEY `CNE_User` (`CNE`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `FirstName`, `LastName`, `CNE`, `typeUser`) VALUES
(1, 'yassin.ghajghouj@etu.uae.ac.ma', 'Yassin', 'GHAJGHOUJ', 1362815, 'student'),
(2, 'mohamed.laadidaoui@etue.uae.ac.ma', 'mohamed', 'laadidaoui', 542144616, 'student'),
(3, 'yasser.mesmoudi@uae.ac.ma', 'Yasser', 'MESMOUDI', 24146216, 'prof'),
(4, 'abdelhamid.benkaddour@uae.ac.ma', 'Abdelhamid', 'BENKADOUR', 2651256, 'prof'),
(5, 'amel.nejjari@uae.ac.ma', 'Amel', 'NEJJARI', 5531561, 'prof'),
(6, 'moustapha.stitou@uae.ac.ma', 'Moustapha', 'STITOU', 6412421, 'admin'),
(7, 'b.bougayou@uae.ac.ma', 'Boutaina', 'BOUGAYOU', 45126543, 'admin'),
(8, 'Yousra.Ouali1@etu.uae.ac.ma', 'Yousra', 'OUALI', 673267, 'student'),
(9, 'Niama.Mouradi@uae.ac.ma', 'Niama', 'MOURADI', 3763167, 'student'),
(10, 'z.besri@gmail.com', 'Zaineb', 'BESRI', 3287732, 'prof'),
(11, 'hseghiouer@uae.ac.ma', 'Hamid', 'SGHIOUER', 57245724, 'prof'),
(12, 'jaber.f15@uae.ac.ma', 'Jaber', 'EL BOUHDIDI', 57576644, 'prof'),
(13, 'sawsanmalla@uae.ac.ma', 'Sawsan', 'MALLA HOUSEIN', 67326343, 'prof');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
