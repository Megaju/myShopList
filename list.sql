-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 10 Avril 2017 à 19:16
-- Version du serveur :  10.0.29-MariaDB-0ubuntu0.16.04.1
-- Version de PHP :  7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `shoplist`
--

-- --------------------------------------------------------

--
-- Structure de la table `list`
--

DROP TABLE IF EXISTS `list`;
CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `amount` int(11) NOT NULL,
  `kilos` int(11) DEFAULT NULL,
  `gramme` int(11) DEFAULT NULL,
  `euro` int(11) DEFAULT NULL,
  `centim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `list`
--

INSERT INTO `list` (`id`, `name`, `amount`, `kilos`, `gramme`, `euro`, `centim`) VALUES
(19, 'Patates', 1, 1, 0, 3, 99),
(21, 'Camember', 1, 0, 100, 2, 1),
(22, 'Pains grillés blé complet Carrefour', 2, 0, 220, 2, 2),
(23, 'Beurre', 1, 0, 250, 2, 0),
(24, 'Pates', 4, 1, 0, 3, 97),
(25, 'Tomates cerises', 2, 0, 50, 1, 15),
(26, 'éponge', 4, 0, 0, 0, 10);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
