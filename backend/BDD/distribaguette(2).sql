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
  `id_boulanger` int(10) UNSIGNED NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse_mail` varchar(40) NOT NULL,
  `telephone` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `boulanger`
--

INSERT INTO `boulanger` (`id_boulanger`, `nom`, `prenom`, `adresse_mail`, `telephone`) VALUES
(1, 'DOUFFET', 'Andre', 'a.douffet@gmail.com', 658742349),
(2, 'LANGLET', 'Eric', 'e.langlet@gmail.com', 612478753),
(3, 'AUBET', 'Maurenne', 'm.aubet@gmail.com', 745896321),
(4, 'MONTY', 'Christian', 'm.monty@gmail.com', 744953266),
(5, 'ROGER', 'Albert', 'a.roger@gmail.com', 654239811),
(6, 'DUBOIS', 'Phillipe', 'p.dubois@gmail.com', 625981235),
(7, 'TRUCHON', 'Thierry', 't.truchon@gmail.com', 632594234),
(8, 'LAJOIE', 'Serge', 's.lajoie@gmail.com', 632149835),
(9, 'PLADOT', 'Didier', 'd.pladot@gmail.com', 674321985),
(10, 'NOUNIER', 'Arthur', 'a.nounier@gmail.com', 767663955);

-- AUTO_INCREMENT pour la table `boulanger`
--
ALTER TABLE `boulanger`
  MODIFY `id_boulanger` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- Index pour la table `boulanger`
--
ALTER TABLE `boulanger`
  ADD PRIMARY KEY (`id_boulanger`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `prenom` (`prenom`),
  ADD UNIQUE KEY `adresse_mail` (`adresse_mail`),
  ADD UNIQUE KEY `telephone` (`telephone`);
  
  -- Contraintes pour la table `boulanger`

ALTER TABLE `boulanger`
  ADD CONSTRAINT `CHK2` CHECK (`nom` != `` AND `prenom` != `` AND `adresse_mail` != `` );
-- --------------------------------------------------------

--
-- Structure de la table `distributeur`
--

CREATE TABLE `distributeur` (
  `id_distributeur` int(10) UNSIGNED NOT NULL,
  `nom` varchar(30) NOT NULL,
  `localisation` varchar(30) NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `etat` enum('0','1','2') NOT NULL
) ;

--
-- Contenu de la table `distributeur`
--

INSERT INTO `distributeur` (`id_distributeur`, `nom`, `localisation`, `stock`, `etat`) VALUES
(1, 'Ditri Mairie', 'Mairie Angers', 59, '1'),
(2, 'Distri Parc', 'Parc Angers', 58, '0'),
(3, 'Distri Stade', 'Stade Angers', 57, '2'),
(4, 'Distri Piscine', 'Piscine Angers', 56, '1'),
(5, 'Distri Centre', 'Centre Commercial', 55, '1'),
(6, 'Distri raliemment', 'Place du Raliemment', 54, '2'),
(7, 'Distri Gymnase', 'Gymnase Angers', 53, '1'),
(8, 'Distri Carburant', 'Station Service Nord', 52, '1'),
(9, 'Distri Cinema', 'Cinema Pathe Angers', 51, '0'),
(10, 'Distri Bowling', 'Bowling Angers', 50, '1');


-- Index pour la table `distributeur`
--
ALTER TABLE `distributeur`
  ADD PRIMARY KEY (`id_distributeur`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `localisation` (`localisation`);

-- AUTO_INCREMENT pour la table `distributeur`
--
ALTER TABLE `distributeur`
  MODIFY `id_distributeur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

-- Contraintes pour la table `distributeur`
--
ALTER TABLE `distributeur`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_distributeur`) REFERENCES `boulanger` (`id_boulanger`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `distributeur`
  ADD CONSTRAINT `CHK` CHECK (`nom` != `` AND `localisation` != ``);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
