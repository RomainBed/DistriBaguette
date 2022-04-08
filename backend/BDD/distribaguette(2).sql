-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 17 Mars 2022 à 14:26
-- Version du serveur :  10.3.31-MariaDB-0+deb10u1
-- Version de PHP :  7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `distribaguette`
--

-- --------------------------------------------------------

--
-- Structure de la table `boulanger`
--

CREATE TABLE `boulanger` (
  `id_boulanger` int UNSIGNED DEFAULT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL CHECK (`nom` != ``),
  `prenom` varchar(30) NOT NULL,
  `adresse_mail` varchar(50) NOT NULL  CHECK (`adresse_mail` != ``),
  `telephone` int(10) UNSIGNED NOT NULL CHECK (`telephone` != ``),
  PRIMARY KEY (`id_boulanger`),
  UNIQUE KEY `nom` (`nom`),
  UNIQUE KEY `adresse_mail` (`adresse_mail`),
  UNIQUE KEY `telephone` (`telephone`))
 ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `boulanger`
--

INSERT INTO `boulanger` (`nom`, `prenom`, `adresse_mail`, `telephone`) VALUES
('DOUFFET', 'Andre', 'a.douffet@gmail.com', 658742349),
('LANGLET', 'Eric', 'e.langlet@gmail.com', 612478753),
('AUBET', 'Maurenne', 'm.aubet@gmail.com', 745896321),
('MONTY', 'Christian', 'm.monty@gmail.com', 744953266),
('ROGER', 'Albert', 'a.roger@gmail.com', 654239811),
('DUBOIS', 'Phillipe', 'p.dubois@gmail.com', 625981235),
('TRUCHON', 'Thierry', 't.truchon@gmail.com', 632594234),
('LAJOIE', 'Serge', 's.lajoie@gmail.com', 632149835),
('PLADOT', 'Didier', 'd.pladot@gmail.com', 674321985),
('NOUNIER', 'Arthur', 'a.nounier@gmail.com', 767663955);

-- Structure de la table `distributeur`
--

CREATE TABLE `distributeur` (
  `id_distributeur` int UNSIGNED DEFAULT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL CHECK (`nom` != ``),
  `localisation` varchar(30) NOT NULL CHECK ( `localisation` != ``),
  `stock` int(10) UNSIGNED NOT NULL,
  `etat` enum('0','1','2') NOT NULL,
  PRIMARY KEY (`id_distributeur`),
  FOREIGN KEY (`id_distributeur`) REFERENCES `boulanger` (`id_boulanger`) ON DELETE CASCADE ON UPDATE CASCADE,
  UNIQUE KEY `nom` (`nom`),
  UNIQUE KEY `localisation` (`localisation`)
) ;

--
-- Contenu de la table `distributeur`
--

INSERT INTO `distributeur` (`nom`, `localisation`, `stock`, `etat`) VALUES
('Ditri Mairie', 'Mairie Angers', 59, '1'),
('Distri Parc', 'Parc Angers', 58, '0'),
('Distri Stade', 'Stade Angers', 57, '2'),
('Distri Piscine', 'Piscine Angers', 56, '1'),
('Distri Centre', 'Centre Commercial', 55, '1'),
('Distri raliemment', 'Place du Raliemment', 54, '2'),
('Distri Gymnase', 'Gymnase Angers', 53, '1'),
('Distri Carburant', 'Station Service Nord', 52, '1'),
('Distri Cinema', 'Cinema Pathe Angers', 51, '0'),
('Distri Bowling', 'Bowling Angers', 50, '1');

-- Structure de la table `Config`
--

CREATE TABLE `Config` (
  `id_config` int(10) UNSIGNED DEFAULT NULL AUTO_INCREMENT,
  `prix` float UNSIGNED NOT NULL CHECK (prix = `1`),
  `TVA` float UNSIGNED NOT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Structure de la table `Vente`
--

CREATE TABLE `Vente` (
  `id_vente` int(10) UNSIGNED DEFAULT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id_vente`),
  FOREIGN KEY (`id_vente`) REFERENCES `Config` (`id_config`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`id_vente`) REFERENCES `distributeur` (`id_distributeur`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Structure de la table `Vente`
--

CREATE TABLE `coordonnees` (
  `id_coord` int UNSIGNED DEFAULT NULL AUTO_INCREMENT,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `nom_coord` varchar(30) NOT NULL,
  PRIMARY KEY (`id_coord`),
  UNIQUE KEY (`nom_coord`),
  FOREIGN KEY (`id_coord`) REFERENCES `distributeur` (`id_distributeur`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `distributeur`
--
INSERT INTO `coordonnees` (`Latitude`, `Longitude`, `nom_coord`) VALUES
(47.4708, -0.547521, 'Mairie'),
(47.4992, -0.564954, 'Parc'),
(47.4627, -0.532281, 'Stade'),
(47.4937, -0.569484, 'Piscine'),
(47.4683, 0.530101, 'Centre'),
(47.4713, -0.553791, 'raliement'),
(47.4681, -0.545782, 'Gymnase'),
(47.4792, -0.552312, 'Carburant'),
(47.4792, -0.552312, 'Cinema');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
