-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 01 avr. 2020 à 09:07
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
-- Base de données :  `boutique`
--
CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `boutique`;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `commentaire`, `id_utilisateur`, `id_produit`, `date`) VALUES
(16, 'Rapport qualitÃ© prix pas mal', 1, 44, '2020-03-30 22:36:37'),
(15, 'Avec quelle capacitÃ© de stockage\r\n', 1, 41, '2020-03-27 19:33:11'),
(14, 'Top de des smartphones', 1, 39, '2020-03-25 12:54:10'),
(13, 'TÃ©lÃ©phone Apple mon prÃ©fÃ©rÃ© ', 1, 38, '2020-03-25 12:47:25');

-- --------------------------------------------------------

--
-- Structure de la table `pannier`
--

DROP TABLE IF EXISTS `pannier`;
CREATE TABLE IF NOT EXISTS `pannier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `valider` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pannier`
--

INSERT INTO `pannier` (`id`, `id_user`, `id_prod`, `quantite`, `valider`) VALUES
(13, 5, 39, 3, 0),
(12, 5, 39, 1, 0),
(11, 5, 39, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `prix` double NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `souscategorie` varchar(255) NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `info`, `prix`, `categorie`, `souscategorie`, `quantite`, `icon`, `date`) VALUES
(46, 'Samsung Galaxy S10 plus', 'Ecran Infinity 6.4 incurvÃ© Quad HD Super Amoled  Stockage 128 Go  RAM 8 Go Port microSD jusquÃ  512 Go ', 719, 'TÃ©lÃ©phone', 'SAMSUNG', '50', 'uploads/samsung-galaxy-s10+.jpg', '2020-03-30 23:03:04'),
(45, 'Antichoc Wiko Pro ', 'WIko Pro Case View 2 Pro antichoc 3m', 27.66, 'Accessoire', 'WIKO', '200', 'uploads/wiko-pro-case-view-2-pro-antichoc-3m.jpg', '2020-03-30 22:58:18'),
(44, 'XIAOMI Mi Note 10 Pro', 'Ecran incurvÃ© 6 pouce 3D AMOLED  Stockage 256 Go  RAM 8 Go  Photo arriÃ¨re 5 camÃ©ras 108 MP   avant  32 MP  Batterie 5260 mAh ', 500, 'TÃ©lÃ©phone', 'XIAOMI', '40', 'uploads/xiaomi-mi-note-10-pro.jpg', '2020-03-30 21:46:52');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`, `adresse`, `email`, `telephone`) VALUES
(1, 'admin', 'MOHAMED', 'HADJADJI', '$2y$12$bhcVMFoJJA/xTKmiT1/THOB9Ybmn9B9xCOth1dmuteR7Yhgd7tlT.', '44 Traverse Adoul BTC n32 Saint Louis', 'mohamed.hadjadji04@gmail.com', '0768328591'),
(2, 'momo', 'MOHA', 'HADJ', '$2y$12$CviOQlX.1M3sgTpp2dX6d.RrT1IPgJ53d6txGL0Ac8KEvP/CG3q2W', 'Saint Louis', 'mohamed.hadjadji@gmail.com', '0968328593'),
(3, 'moha', 'MO', 'HAD', '$2y$12$kA9hQ/33na3aN2LbneuHD.ZS7zz4f6CWIiCEuqmbHYFe.DqzO.ADC', 'BTC n32 Saint Louis', 'moh.hadj@gmail.com', '0368328594'),
(4, 'kiki', 'MED', 'JADJI', '$2y$12$tKJc/8rMkvO7cnT1R6HCouGrG2./uney0u2T5QcFG1phdYlIRceYG', '44 Traverse ', 'mohamed.hadjadji04@gmail.fr', '0768328591'),
(5, 'eti', 'eti', 'eti', '$2y$12$cUfTtWSCN.SFhryRcRHElu7tEc/wJYAZ.r3qrF6h6CQsG9JLxAUR.', 'fdsf', 'eee@hotmail.fr', '44444444444');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
