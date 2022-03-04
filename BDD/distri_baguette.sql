-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 04 mars 2022 à 13:37
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
-- Base de données :  `distri_baguette`
--

-- --------------------------------------------------------

--
-- Structure de la table `boulanger`
--

CREATE TABLE `boulanger` (
  `ID_Boulanger` int(2) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Adresse_Mail` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boulanger`
--

INSERT INTO `boulanger` (`ID_Boulanger`, `Nom`, `Adresse_Mail`) VALUES
(1, 'George DUMONT', 'g.dumont@gmail.com'),
(2, 'Mickael MULOT', 'm.mulot@gmail.com'),
(3, 'Baptiste JUNIO', 'b.junio@gmail.com'),
(4, 'Valérie FEUILLOU', 'v.feuillou@gmail.com'),
(5, 'Gérald TIPLOUF', 'g.tiplouf@gmail.com'),
(6, 'Anna MOUCK', 'a.mouck@gmail.com'),
(7, 'Julien BRIDOU', 'j.bridou@gmail.com'),
(8, 'Kate JACK', 'k.jack@gmail.com'),
(9, 'Luigi PEKKA', 'l.pekka@gmail.com'),
(10, 'Arthur NINHO', 'a.ninho@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `distributeur`
--

CREATE TABLE `distributeur` (
  `ID_Distributeur` int(2) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Localisation` varchar(30) NOT NULL,
  `Stock` int(2) NOT NULL,
  `Etat` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `distributeur`
--

INSERT INTO `distributeur` (`ID_Distributeur`, `Nom`, `Localisation`, `Stock`, `Etat`) VALUES
(1, 'Distri Mairie', 'Mairie Angers', 60, 1),
(2, 'Distrie Stade', 'Stade Angers', 60, 1),
(3, 'Distri Fête', 'Salle des fête angers', 60, 1),
(4, 'Distri Collège', 'Collège Angers', 60, 1),
(5, 'Distri Centre', 'Centre Ville Angers', 60, 1),
(6, 'Distri Piscine', 'Piscine Angers', 60, 1),
(7, 'Distri Ralliement', 'Place du Ralliement', 60, 1),
(8, 'Distri Cinéma', 'Cinéma Angers', 60, 1),
(9, 'Distri Commerce', 'Centre Commercial Angers', 60, 1),
(10, 'Distri Parc', 'Parc Angers', 60, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boulanger`
--
ALTER TABLE `boulanger`
  ADD PRIMARY KEY (`ID_Boulanger`);

--
-- Index pour la table `distributeur`
--
ALTER TABLE `distributeur`
  ADD PRIMARY KEY (`ID_Distributeur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boulanger`
--
ALTER TABLE `boulanger`
  MODIFY `ID_Boulanger` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `distributeur`
--
ALTER TABLE `distributeur`
  MODIFY `ID_Distributeur` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
