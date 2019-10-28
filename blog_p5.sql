-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 28 oct. 2019 à 09:14
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_p5`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `mail`, `password`, `username`) VALUES
(4, 'majid.web98@gmail.com', '$2y$10$AepPvuGaYIoBCXqxBzTSUOuuE9NKmqkCr.0L4dtSn0jlDx4AjwjDu', ''),
(5, 'vega@gmail.com', '$2y$10$4yw8JYU.iWe3V85lCNUHHuq7cK/nFPHlfMWZeWsICjM5jOLwn3CrG', ''),
(14, 'Admin@gmail.com', '$2y$10$/.WPgbx1MGkp1y1kgJfFVOu2s2bmVPaFdAfap9Z80bT.f/HECv546', 'Admin'),
(15, 'Admin@gmail.com', '$2y$10$lnzuRPHm2HfjgvjXK4roFuAHKRkzEjvM.sRktNqmN6fCEXvgADCeO', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `img`, `title`, `category`, `text`, `author`, `date`) VALUES
(17, 'flatiron-thumb.jpg', 'Créer son blog', 'Feedback', 'Créer son propre blog n\'est pas une mince affaire. En effet, l\'utilisation d\'un CMS est ce qui est de plus courant et accessible, en revanche, créer son blog sans faire appel à ces outils comporte une difficulté singulière. \r\nImaginez vous un instant être jeté dans un piscine, sans brassard, ni boué, sans savoir nager, avec une profondeur de 3m... Vous vous sentiriez comment ? Haha, sûrement en panique, c\'est le cas de le dire ! \r\nEh bien c\'est à peu près la même chose pour la création d\'un blog', 'Majid', '2019-10-08 11:04:39'),
(20, 'blanc.jpg', 'Refactorisation', 'Feedback', 'Refactoriser son code... En voilà une de tâche fatiguante pour un développeur. En effet, passer des heures à tout recoder, debuguer, chercher la faille et régler les problèmes ce n\'est pas de tout repos. C\'est long, fastidieux, redondant et lassant. Mais bon, il faut bien passer par la case apprentissage...', 'Vega', '2019-10-16 09:40:17');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comments` varchar(500) NOT NULL,
  `date` datetime DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `articles_id` int(11) DEFAULT NULL,
  `verify` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FOREIGN` (`articles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comments`, `date`, `username`, `articles_id`, `verify`) VALUES
(2, 'je teste les coms', '2019-09-29 17:19:42', 'GoyaveBrave', NULL, 1),
(7, 'Pas si int&eacute;ressant que &ccedil;a hein', '2019-10-25 18:39:20', 'Majid', NULL, 1),
(11, 'J\'ajoute un commentaire que je veux verifier', '2019-10-27 10:27:37', 'Majid Admin', 17, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
