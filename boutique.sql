-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 23 mars 2020 à 19:59
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
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `souscategorie` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `info`, `prix`, `categorie`, `souscategorie`, `icon`, `id_utilisateur`) VALUES
(39, 'HUAWEI P30', 'Smartphone HUAWEI P30 lite Bleu 128 Go', '300', 'HUAWEI ', 'smartphone', 'uploads/huawei-p30.jpg', 1),
(36, 'Galaxy S20', 'Samsung Galaxy S20 128 Go Bleu', '800', 'Samsung ', 'smartphone', 'uploads/samsung-galaxy.jpg', 1),
(38, 'APPLE iPhone 11', 'APPLE iPhone 11 Noir 64 Go', '900', 'APPLE ', 'smartphone', 'uploads/apple-iphone-11.jpg', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`, `adresse`, `email`, `telephone`) VALUES
(1, 'admin', 'MOHAMED', 'HADJADJI', '$2y$12$bhcVMFoJJA/xTKmiT1/THOB9Ybmn9B9xCOth1dmuteR7Yhgd7tlT.', '44 Traverse Adoul BTC n32 Saint Louis', 'mohamed.hadjadji04@gmail.com', '0768328591'),
(2, 'momo', 'MOHA', 'HADJ', '$2y$12$CviOQlX.1M3sgTpp2dX6d.RrT1IPgJ53d6txGL0Ac8KEvP/CG3q2W', 'Saint Louis', 'mohamed.hadjadji@gmail.com', '0968328593'),
(3, 'moha', 'MO', 'HAD', '$2y$12$kA9hQ/33na3aN2LbneuHD.ZS7zz4f6CWIiCEuqmbHYFe.DqzO.ADC', 'BTC n32 Saint Louis', 'moh.hadj@gmail.com', '0368328594'),
(4, 'kiki', 'MED', 'JADJI', '$2y$12$tKJc/8rMkvO7cnT1R6HCouGrG2./uney0u2T5QcFG1phdYlIRceYG', '44 Traverse ', 'mohamed.hadjadji04@gmail.fr', '0768328591');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
