-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 10 oct. 2019 à 14:09
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `mail`, `password`, `username`) VALUES
(4, 'majid.web98@gmail.com', '$2y$10$AepPvuGaYIoBCXqxBzTSUOuuE9NKmqkCr.0L4dtSn0jlDx4AjwjDu', ''),
(5, 'vega@gmail.com', '$2y$10$4yw8JYU.iWe3V85lCNUHHuq7cK/nFPHlfMWZeWsICjM5jOLwn3CrG', ''),
(6, 'majid@gmail.com', '$2y$10$vSjE2JJWxKzgt49IQqBxNujm9.6nCPqZBNIE1MRS7bj/b549Y8j.i', 'Majid'),
(7, 'mafiagogolebrave@gmail.com', '$2y$10$DCesJuvoeEtjT2DizjSZyuKhXiaR8irWREMw.jWS8e1vzFtmD2q4m', ''),
(8, 'nouveau@gmail.com', '$2y$10$/ngpkTtbArFmEze1NUqXReMd8V6p98G2VTJW0GXintDX0k6wE0BEO', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `img`, `title`, `category`, `text`, `author`, `date`) VALUES
(11, 'hipster.png', 'Hipster or Not', 'Test', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis rhoncus, velit nec fermentum vestibulum, lacus nulla cursus nulla, vel viverra eros purus id justo. Integer placerat cursus massa, vel dignissim massa pharetra et. Pellentesque efficitur sit amet nisi nec varius. Nam et erat ut tortor feugiat ultricies et ut ipsum. Pellentesque in justo ultrices, ornare risus ac, maximus mauris. Fusce lectus justo, molestie ac enim quis, porta faucibus lectus. Donec lectus est, facilisis a scelerisque condimentum, posuere at risus. Nulla vehicula lacus ac venenatis mattis.\r\n\r\nAenean congue nisl eu porttitor elementum. Morbi commodo mauris nec risus sodales lacinia. Aliquam fringilla cursus enim vitae aliquet. Proin eget auctor libero, nec eleifend quam. Maecenas rhoncus libero nunc, a laoreet magna sollicitudin in. Sed quis odio vel neque auctor volutpat quis sed ex. Nunc rutrum interdum nisl sed vulputate.\r\n\r\nDuis pulvinar mi sed erat lobortis, nec sagittis risus imperdiet. Phasellus vitae nibh eu orci bibendum facilisis. Aenean accumsan sem eu leo vulputate facilisis. Integer sollicitudin tempus fermentum. Aenean feugiat elit nunc, nec faucibus mi efficitur at. Etiam ultricies, dui id facilisis rutrum, metus sem consectetur ante, luctus luctus turpis diam sed purus. Sed ut condimentum eros. Morbi ac condimentum diam. Fusce pharetra fermentum maximus.\r\n\r\nNam nec malesuada erat. Pellentesque nec nunc sollicitudin, malesuada urna gravida, sagittis felis. Quisque vehicula fringilla ante. Suspendisse vel magna felis. Praesent aliquet ex nec est posuere gravida. Integer id ante eu quam rutrum mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In fringilla felis nibh, ut pulvinar lacus tincidunt at. Nullam feugiat blandit nunc. Curabitur quis porta quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum euismod aliquet lectus ac posuere.\r\n\r\nCurabitur vel mauris ultricies, aliquet nisl eget, semper lorem. Donec risus erat, sodales vehicula lorem ut, scelerisque ultrices neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas ultrices tortor a porta euismod. Pellentesque est augue, cursus a sapien sed, facilisis rhoncus lorem. Maecenas aliquam nunc non ultricies aliquam. Donec lorem mi, gravida vel tristique non, vulputate ut turpis. Nam finibus augue in urna gravida aliquet. Sed interdum rutrum libero, in efficitur urna mollis id. Proin euismod pharetra euismod. Aenean quam dolor, tristique at cursus ac, euismod id neque. In consequat ullamcorper neque, nec suscipit felis dictum id. ', 'Majid', '2019-10-03 18:03:28'),
(12, 'hipster.png', 'Hipster or Not', 'Test', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis rhoncus, velit nec fermentum vestibulum, lacus nulla cursus nulla, vel viverra eros purus id justo. Integer placerat cursus massa, vel dignissim massa pharetra et. Pellentesque efficitur sit amet nisi nec varius. Nam et erat ut tortor feugiat ultricies et ut ipsum. Pellentesque in justo ultrices, ornare risus ac, maximus mauris. Fusce lectus justo, molestie ac enim quis, porta faucibus lectus. Donec lectus est, facilisis a scelerisque condimentum, posuere at risus. Nulla vehicula lacus ac venenatis mattis.\r\n\r\nAenean congue nisl eu porttitor elementum. Morbi commodo mauris nec risus sodales lacinia. Aliquam fringilla cursus enim vitae aliquet. Proin eget auctor libero, nec eleifend quam. Maecenas rhoncus libero nunc, a laoreet magna sollicitudin in. Sed quis odio vel neque auctor volutpat quis sed ex. Nunc rutrum interdum nisl sed vulputate.\r\n\r\nDuis pulvinar mi sed erat lobortis, nec sagittis risus imperdiet. Phasellus vitae nibh eu orci bibendum facilisis. Aenean accumsan sem eu leo vulputate facilisis. Integer sollicitudin tempus fermentum. Aenean feugiat elit nunc, nec faucibus mi efficitur at. Etiam ultricies, dui id facilisis rutrum, metus sem consectetur ante, luctus luctus turpis diam sed purus. Sed ut condimentum eros. Morbi ac condimentum diam. Fusce pharetra fermentum maximus.\r\n\r\nNam nec malesuada erat. Pellentesque nec nunc sollicitudin, malesuada urna gravida, sagittis felis. Quisque vehicula fringilla ante. Suspendisse vel magna felis. Praesent aliquet ex nec est posuere gravida. Integer id ante eu quam rutrum mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In fringilla felis nibh, ut pulvinar lacus tincidunt at. Nullam feugiat blandit nunc. Curabitur quis porta quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum euismod aliquet lectus ac posuere.\r\n\r\nCurabitur vel mauris ultricies, aliquet nisl eget, semper lorem. Donec risus erat, sodales vehicula lorem ut, scelerisque ultrices neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas ultrices tortor a porta euismod. Pellentesque est augue, cursus a sapien sed, facilisis rhoncus lorem. Maecenas aliquam nunc non ultricies aliquam. Donec lorem mi, gravida vel tristique non, vulputate ut turpis. Nam finibus augue in urna gravida aliquet. Sed interdum rutrum libero, in efficitur urna mollis id. Proin euismod pharetra euismod. Aenean quam dolor, tristique at cursus ac, euismod id neque. In consequat ullamcorper neque, nec suscipit felis dictum id. ', 'Majid', '2019-10-03 18:05:00'),
(13, 'hipster.png', 'Hipster or Not', 'Test', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis rhoncus, velit nec fermentum vestibulum, lacus nulla cursus nulla, vel viverra eros purus id justo. Integer placerat cursus massa, vel dignissim massa pharetra et. Pellentesque efficitur sit amet nisi nec varius. Nam et erat ut tortor feugiat ultricies et ut ipsum. Pellentesque in justo ultrices, ornare risus ac, maximus mauris. Fusce lectus justo, molestie ac enim quis, porta faucibus lectus. Donec lectus est, facilisis a scelerisque condimentum, posuere at risus. Nulla vehicula lacus ac venenatis mattis.\r\n\r\nAenean congue nisl eu porttitor elementum. Morbi commodo mauris nec risus sodales lacinia. Aliquam fringilla cursus enim vitae aliquet. Proin eget auctor libero, nec eleifend quam. Maecenas rhoncus libero nunc, a laoreet magna sollicitudin in. Sed quis odio vel neque auctor volutpat quis sed ex. Nunc rutrum interdum nisl sed vulputate.\r\n\r\nDuis pulvinar mi sed erat lobortis, nec sagittis risus imperdiet. Phasellus vitae nibh eu orci bibendum facilisis. Aenean accumsan sem eu leo vulputate facilisis. Integer sollicitudin tempus fermentum. Aenean feugiat elit nunc, nec faucibus mi efficitur at. Etiam ultricies, dui id facilisis rutrum, metus sem consectetur ante, luctus luctus turpis diam sed purus. Sed ut condimentum eros. Morbi ac condimentum diam. Fusce pharetra fermentum maximus.\r\n\r\nNam nec malesuada erat. Pellentesque nec nunc sollicitudin, malesuada urna gravida, sagittis felis. Quisque vehicula fringilla ante. Suspendisse vel magna felis. Praesent aliquet ex nec est posuere gravida. Integer id ante eu quam rutrum mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In fringilla felis nibh, ut pulvinar lacus tincidunt at. Nullam feugiat blandit nunc. Curabitur quis porta quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum euismod aliquet lectus ac posuere.\r\n\r\nCurabitur vel mauris ultricies, aliquet nisl eget, semper lorem. Donec risus erat, sodales vehicula lorem ut, scelerisque ultrices neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas ultrices tortor a porta euismod. Pellentesque est augue, cursus a sapien sed, facilisis rhoncus lorem. Maecenas aliquam nunc non ultricies aliquam. Donec lorem mi, gravida vel tristique non, vulputate ut turpis. Nam finibus augue in urna gravida aliquet. Sed interdum rutrum libero, in efficitur urna mollis id. Proin euismod pharetra euismod. Aenean quam dolor, tristique at cursus ac, euismod id neque. In consequat ullamcorper neque, nec suscipit felis dictum id. ', 'Majid', '2019-10-03 18:06:07'),
(14, 'hipster.png', 'Hipster or Not', 'Test', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis rhoncus, velit nec fermentum vestibulum, lacus nulla cursus nulla, vel viverra eros purus id justo. Integer placerat cursus massa, vel dignissim massa pharetra et. Pellentesque efficitur sit amet nisi nec varius. Nam et erat ut tortor feugiat ultricies et ut ipsum. Pellentesque in justo ultrices, ornare risus ac, maximus mauris. Fusce lectus justo, molestie ac enim quis, porta faucibus lectus. Donec lectus est, facilisis a scelerisque condimentum, posuere at risus. Nulla vehicula lacus ac venenatis mattis.\r\n\r\nAenean congue nisl eu porttitor elementum. Morbi commodo mauris nec risus sodales lacinia. Aliquam fringilla cursus enim vitae aliquet. Proin eget auctor libero, nec eleifend quam. Maecenas rhoncus libero nunc, a laoreet magna sollicitudin in. Sed quis odio vel neque auctor volutpat quis sed ex. Nunc rutrum interdum nisl sed vulputate.\r\n\r\nDuis pulvinar mi sed erat lobortis, nec sagittis risus imperdiet. Phasellus vitae nibh eu orci bibendum facilisis. Aenean accumsan sem eu leo vulputate facilisis. Integer sollicitudin tempus fermentum. Aenean feugiat elit nunc, nec faucibus mi efficitur at. Etiam ultricies, dui id facilisis rutrum, metus sem consectetur ante, luctus luctus turpis diam sed purus. Sed ut condimentum eros. Morbi ac condimentum diam. Fusce pharetra fermentum maximus.\r\n\r\nNam nec malesuada erat. Pellentesque nec nunc sollicitudin, malesuada urna gravida, sagittis felis. Quisque vehicula fringilla ante. Suspendisse vel magna felis. Praesent aliquet ex nec est posuere gravida. Integer id ante eu quam rutrum mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In fringilla felis nibh, ut pulvinar lacus tincidunt at. Nullam feugiat blandit nunc. Curabitur quis porta quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum euismod aliquet lectus ac posuere.\r\n\r\nCurabitur vel mauris ultricies, aliquet nisl eget, semper lorem. Donec risus erat, sodales vehicula lorem ut, scelerisque ultrices neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas ultrices tortor a porta euismod. Pellentesque est augue, cursus a sapien sed, facilisis rhoncus lorem. Maecenas aliquam nunc non ultricies aliquam. Donec lorem mi, gravida vel tristique non, vulputate ut turpis. Nam finibus augue in urna gravida aliquet. Sed interdum rutrum libero, in efficitur urna mollis id. Proin euismod pharetra euismod. Aenean quam dolor, tristique at cursus ac, euismod id neque. In consequat ullamcorper neque, nec suscipit felis dictum id. ', 'Majid', '2019-10-03 18:07:06'),
(17, 'flatiron-thumb.jpg', 'Créer son blog', 'Feedback', 'Créer son propre blog n\'est pas une mince affaire. En effet, l\'utilisation d\'un CMS est ce qui est de plus courant et accessible, en revanche, créer son blog sans faire appel à ces outils comporte une difficulté singulière. \r\nImaginez vous un instant être jeté dans un piscine, sans brassard, ni boué, sans savoir nager, avec une profondeur de 3m... Vous vous sentiriez comment ? Haha, sûrement en panique, c\'est le cas de le dire ! \r\nEh bien c\'est à peu près la même chose pour la création d\'un blog', 'Majid', '2019-10-08 11:04:39');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comments` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(255) NOT NULL,
  `articles_id` int(11) NOT NULL,
  `verify` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FOREIGN` (`articles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comments`, `date`, `username`, `articles_id`, `verify`) VALUES
(1, 'hghghjjv', '2019-09-29 07:00:00', 'jo', 6, 0),
(2, 'je teste les coms', '2019-09-29 17:19:42', 'GoyaveBrave', 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments_verify`
--

DROP TABLE IF EXISTS `comments_verify`;
CREATE TABLE IF NOT EXISTS `comments_verify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comments` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(255) NOT NULL,
  `articles_id` int(11) NOT NULL,
  `verify` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FOREIGN` (`articles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments_verify`
--

INSERT INTO `comments_verify` (`id`, `comments`, `date`, `username`, `articles_id`, `verify`) VALUES
(3, 'je dois être testé', '2019-10-05 06:00:00', 'majonvega', 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Recruteur', 'recruteur@gmail.com', '1', 'Site pourri j\'le pirate comme je veux'),
(2, 'google', 'google@gmail.com', 'PRO CONTACT', 'google recrute man !'),
(3, '', '', 'FEEDBACK', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) DEFAULT NULL,
  `upass` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `uemail` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `uemail` (`uemail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
