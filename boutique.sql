-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 12 avr. 2020 à 17:22
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
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'p',
  `cmd` json NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id`, `id_user`, `date`, `status`, `cmd`, `total`) VALUES
(31, 5, '2020-04-11 21:52:56', 'p', '[{\"id\": 44, \"prix\": 500, \"total\": 5000, \"quantite\": 10}, {\"id\": 57, \"prix\": 134.99, \"total\": 134.99, \"quantite\": 1}]', 5134.99),
(26, 5, '2020-04-08 16:44:03', 'p', '[{\"id\": 46, \"prix\": 719, \"total\": 719, \"quantite\": 1}]', 719),
(27, 5, '2020-04-08 16:46:54', 'p', '[{\"id\": 45, \"prix\": 27.66, \"total\": 55.32, \"quantite\": 2}]', 55.32),
(28, 5, '2020-04-08 16:51:52', 'p', '[{\"id\": 44, \"prix\": 500, \"total\": 500, \"quantite\": 1}]', 500),
(29, 5, '2020-04-09 17:39:39', 'p', '[{\"id\": 46, \"prix\": 719, \"total\": 719, \"quantite\": 1}]', 719),
(30, 5, '2020-04-09 17:40:47', 'p', '[{\"id\": 46, \"prix\": 719, \"total\": 719, \"quantite\": 1}]', 719);

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pannier`
--

INSERT INTO `pannier` (`id`, `id_user`, `id_prod`, `quantite`, `valider`) VALUES
(13, 5, 39, 3, 1),
(12, 5, 39, 1, 1),
(11, 5, 39, 1, 1),
(14, 5, 44, 10, 1),
(15, 5, 57, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `info` varchar(510) NOT NULL,
  `prix` double NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `souscategorie` varchar(255) NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `info`, `prix`, `categorie`, `souscategorie`, `quantite`, `icon`, `date`) VALUES
(46, 'Samsung Galaxy S10 plus', 'Ecran Infinity 6,4\" incurvÃ© Quad HD Super Amoled - Stockage 128 Go - RAM 8 Go - Port microSD jusqu Ã  512 Go - Triple capteur photo ultra grand angle  - Lecteur d empreinte sous l Ã©cran - Partage d Ã©nergie Batterie 4100 mAh - Charge rapide sans fil - ConnectivitÃ©  USB Type C - Prise jack 3,5 mm - Certification IP68', 1230, 'TÃ©lÃ©phone', 'SAMSUNG', '60', 'uploads/samsung-galaxy-s10+.jpg', '2020-03-30 23:03:04'),
(45, 'Antichoc Wiko Pro ', 'WIko Pro Case View 2 Pro antichoc 3m', 27.66, 'Accessoire', 'WIKO', '200', 'uploads/wiko-pro-case-view-2-pro-antichoc-3m.jpg', '2020-03-30 22:58:18'),
(44, 'XIAOMI Mi Note 10 Pro', 'Ecran incurvÃ© 6 pouce 3D AMOLED  Stockage 256 Go  RAM 8 Go  Photo arriÃ¨re 5 camÃ©ras 108 MP   avant  32 MP  Batterie 5260 mAh ', 500, 'TÃ©lÃ©phone', 'XIAOMI', '30', 'uploads/xiaomi-mi-note-10-pro.jpg', '2020-03-30 21:46:52'),
(47, 'Samsung Galaxy Note 10 256 go Argent', 'Ecran Dynamic AMOLED Infinity 6,3\" - Triple Capteur Photo - Batterie 3500 mAh - Charge Rapide 25W - Partage d Ã©nergie sans fil - RAM 8 Go - Stockage 256 Go - Reconnaissance faciale - S PEN : 4096 Niveaux de pressions, Naviagation par gestes', 719, 'TÃ©lÃ©phone', 'SAMSUNG', '35', 'uploads/samsung-galaxy-note-10-256-go-argent.jpg', '2020-04-08 16:45:50'),
(48, 'Samsung Galaxy S10 plus 128 go Rouge', 'Ecran Infinity 6,4\" incurvÃ© Quad HD Super Amoled - Stockage 128 Go - RAM 8 Go - Port microSD jusqu Ã  512 Go - Triple capteur photo ultra grand angle  - Lecteur d empreinte sous l Ã©cran - Partage d Ã©nergie Batterie 4100 mAh - Charge rapide sans fil - ConnectivitÃ© : USB Type C - Prise jack 3,5 mm - Certification IP68', 719, 'TÃ©lÃ©phone', 'SAMSUNG', '45', 'uploads/samsung-galaxy-s10-128-go-rouge.jpg', '2020-04-08 20:29:27'),
(49, 'iPhone 8 64 Go Gris', 'Les points forts : 1. 4.7\" - Ecran Retina HD avec technologie IPS, 2. Taille de la diagonale : 4.7\", 3. RÃ©solution du capteur : 12 mÃ©gapixels, 4. CapacitÃ© de la mÃ©moire interne : 64 Go, 5. GÃ©nÃ©ration Ã  haut dÃ©bit mobile : 4G ', 254.21, 'TÃ©lÃ©phone', 'APPLE iPhone', '20', 'uploads/iphone-8-64-go-gris.jpg', '2020-04-08 20:41:38'),
(50, 'OPPO RX17 Pro Violet', 'RÃ©solution du capteur : 12 mÃ©gapixels - CapacitÃ© : 3700 mAh\r\n - CapacitÃ© de la mÃ©moire interne : 128 Go - 8 cÅ“urs - RAM : 6 Go\r\n', 299, 'TÃ©lÃ©phone', 'OPPO', '30', 'uploads/oppo-rx17-pro-violet-neon.jpg', '2020-04-08 20:49:53'),
(51, 'WIKO View 3 Pro Ocean 128Go', 'Taille de la diagonale : 6.3\" - RÃ©solution du capteur : 12 mÃ©gapixels - CapacitÃ© : 4000 mAh - CapacitÃ© de la mÃ©moire - \r\n interne : 128 Go - 8 cÅ“urs - RAM : 6 Go - GÃ©nÃ©ration Ã  haut dÃ©bit mobile : 4G', 224.99, 'TÃ©lÃ©phone', 'WIKO', '25', 'uploads/wiko-view-3-pro-ocean.jpg', '2020-04-08 20:55:03'),
(52, 'HUAWEI P30 lite Bleu 128 Go', 'Taille de la diagonale : 6.15\" - RÃ©solution du capteur : 48 mÃ©gapixels - CapacitÃ© : 3340 mAh - CapacitÃ© de la mÃ©moire \r\n - interne : 128 Go - 8 coeurs - RAM : 4 Go - GÃ©nÃ©ration Ã  haut dÃ©bit mobile : 4G', 369, 'TÃ©lÃ©phone', 'HUAWEI', '22', 'uploads/huawei-p30.jpg', '2020-04-08 21:00:51'),
(53, 'SONY Xperia 10 Noir 64 Go', 'Taille de la diagonale : 6\" - RÃ©solution du capteur : 13 mÃ©gapixels - CapacitÃ© : 2870 mAh - CapacitÃ© de la mÃ©moire interne : 64 Go - 8 coeurs - RAM : 3 Go - LPDDR4X SDRAM\r\nGÃ©nÃ©ration Ã  haut dÃ©bit mobile : 4G', 315.99, 'TÃ©lÃ©phone', 'SONY Xperia', '15', 'uploads/sony-xperia-10-noir-64-go.jpg', '2020-04-08 21:10:33'),
(54, 'APPLE iPhone 11 Jaune 64 Go', 'Taille de la diagonale : 6.1\" - RÃ©solution du capteur : 12 mÃ©gapixels - CapacitÃ© de la mÃ©moire interne : 64 Go - 6 coeurs - GÃ©nÃ©ration Ã  haut dÃ©bit mobile : 4G Protection : RevÃªtement olÃ©ophobe antitrace.', 824.99, 'TÃ©lÃ©phone', 'APPLE iPhone', '25', 'uploads/apple-iphone-11-jaune-64-go.jpg', '2020-04-08 21:21:46'),
(55, 'Oreillettes SAMSUNG Galaxy  J3 Pro ', 'SAMSUNG Galaxy  J3 Pro , Oreillette Bluetooth sans Fil -Auriculaire une Haute qualitÃ© audio dans un design ergonomique et Ã©lÃ©gant. Bluetooth V5.0, Signal stable, un appareillage facile rapide et une basse consommation. BoÃ®tier de Chargement aimentÃ© pouvant recharger de 3-5 fois vos oreillettes , compatible avec votre SAMSUNG Galaxy  J3 Pro', 27.99, 'Accessoire', 'SAMSUNG', '100', 'uploads/samsung-galaxy-j3-pro-oreillettes.jpg', '2020-04-09 14:50:57'),
(56, 'Oreillette SAMSUNG Galaxy A10 ', 'SAMSUNG Galaxy A10 , Oreillette bluetooth sans fil, une Haute qualitÃ© audio dans un design ergonomique et Ã©lÃ©gant. Une version Bluetooth amÃ©liorÃ©e qui propose un signal plus stable, une meilleure transmission, un appareillage facile rapide et une basse consommation.', 70, 'Accessoire', 'SAMSUNG', '90', 'uploads/samsung-galaxy-a10-oreillette.jpg', '2020-04-09 14:57:07'),
(57, 'Ecouteurs APPLE sans fil AirPods 2', 'AirPods avec Ã©tui de charge - Micro intÃ©grÃ© - Autonomie standard 5h (max) - RÃ©glage du volume - BoÃ®tier de recharge - Recharge rapide 15 minutes pour 3h d Ã©coute -Se connectent avec tous vos appareils - SÃ©lection de plages musicales - True Wirless avec BoÃ®tier de charge filaire', 134.99, 'Accessoire', 'APPLE iPhone', '67', 'uploads/apple-ecouteurs-sans-fil-airpods.jpg', '2020-04-09 15:01:46'),
(58, 'Etui folio noir Huawei P30 Pro', 'HUAWEI Ã‰tui folio noir pour P30 Pro - Coque rigide Ã  l arriÃ¨re et rabat Ã  l avant pour protÃ©ger l Ã©cran - Ouverture latÃ©rale du rabat - Rabat transparent pour visualiser directement les informations principales de votre mobile - ProtÃ¨ge votre mobile des chocs et des rayures - Permet d utiliser le mobile et ses fonctionnalitÃ©s sans retirer l Ã©tui.', 38.99, 'Accessoire', 'HUAWEI', '50', 'uploads/Etui-flip-black-p30-pro.jpg', '2020-04-09 15:10:45'),
(59, 'Coque Xiaomi Redmi Note 8 Pro', 'Coque pour Xiaomi Redmi Note 8 Pro (6.53\"), Ã‰tui Folio en Cuir PU Protecteur Clapet Portefeuille avec Slots de Cartes,Fonction Support,Fermeture MagnÃ©tique,Antichoc,De qualitÃ© supÃ©rieure, style, Ã©lÃ©gant.', 14, 'Accessoire', 'XIAOMI', '90', 'uploads/coque-xiaomi-redmi-note-8-pro.jpg', '2020-04-09 15:14:43');

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
