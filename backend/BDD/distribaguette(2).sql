-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 10 mars 2022 à 09:44
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `ID_Boulanger` int(11) UNSIGNED NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prénom` varchar(20) NOT NULL,
  `Adresse_Mail` varchar(30) NOT NULL,
  `Téléphone` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boulanger`
--

INSERT INTO `boulanger` (`ID_Boulanger`, `Nom`, `Prénom`, `Adresse_Mail`, `Téléphone`) VALUES
(1, 'DOUFFET', 'André', 'a.douffet@gmail.com', 658742349),
(2, 'LANGLET', 'Eric', 'e.langlet@gmail.com', 612478753),
(3, 'AUBET', 'Maurenne', 'm.aubet@gmail.com', 745896321),
(4, 'MONTY', 'Christian', 'm.monty@gmail.com', 744953266),
(5, 'ROGER', 'Albert', 'a.roger@gmail.com', 654239811),
(6, 'DUBOIS', 'Phillipe', 'p.dubois@gmail.com', 625981235),
(7, 'TRUCHON', 'Thierry', 't.truchon@gmail.com', 632594234),
(8, 'LAJOIE', 'Serge', 's.lajoie@gmail.com', 632149835),
(9, 'PLADOT', 'Didier', 'd.pladot@gmail.com', 674321985),
(10, 'NOUNIER', 'Arthur', 'a.nounier@gmail.com', 767663955);

-- --------------------------------------------------------

--
-- Structure de la table `distributeur`
--

CREATE TABLE `distributeur` (
  `ID_Distributeur` int(10) UNSIGNED NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Localisation` varchar(30) NOT NULL,
  `Stock` int(10) UNSIGNED NOT NULL,
  `Etat` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `distributeur`
--

INSERT INTO `distributeur` (`ID_Distributeur`, `Nom`, `Localisation`, `Stock`, `Etat`) VALUES
(1, 'Ditri Mairie', 'Mairie Angers', 60, '1'),
(2, 'Distri Parc', 'Parc Angers', 60, '1'),
(3, 'Distri Stade', 'Stade Angers', 60, '1'),
(4, 'Distri Piscine', 'Piscine Angers', 60, '1'),
(5, 'Distri Centre', 'Centre Commercial', 60, '1'),
(6, 'Distri raliemment', 'Place du Raliemment', 60, '1'),
(7, 'Distri Gymnase', 'Gymnase Angers', 60, '1'),
(8, 'Distri Carburant', 'Station Service Nord', 60, '1'),
(9, 'Distri Cinéma', 'Cinéma Pathé Angers', 60, '1'),
(10, 'Distri Bowling', 'Bowling Angers', 60, '1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boulanger`
--
ALTER TABLE `boulanger`
  ADD PRIMARY KEY (`ID_Boulanger`),
  ADD UNIQUE KEY `Adresse_Mail` (`Adresse_Mail`),
  ADD UNIQUE KEY `Nom` (`Nom`),
  ADD UNIQUE KEY `Téléphone` (`Téléphone`);

--
-- Index pour la table `distributeur`
--
ALTER TABLE `distributeur`
  ADD PRIMARY KEY (`ID_Distributeur`),
  ADD UNIQUE KEY `Nom` (`Nom`),
  ADD UNIQUE KEY `Localisation` (`Localisation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boulanger`
--
ALTER TABLE `boulanger`
  MODIFY `ID_Boulanger` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `distributeur`
--
ALTER TABLE `distributeur`
  MODIFY `ID_Distributeur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `distributeur`
--
ALTER TABLE `distributeur`
  ADD CONSTRAINT `FK_Distributeur` FOREIGN KEY (`ID_Distributeur`) REFERENCES `boulanger` (`ID_Boulanger`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
