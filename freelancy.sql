-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 mars 2023 à 14:39
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `freelancy`
--

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `duree` int(11) NOT NULL,
  `isAccepted` tinyint(1) NOT NULL,
  `isFinished` tinyint(1) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `postulation`
--

CREATE TABLE `postulation` (
  `id_postulation` int(11) NOT NULL,
  `isAccepted` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL,
  `id_freelancer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `LastName` varchar(200) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `ImagePath` varchar(500) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `total_jobs` int(10) DEFAULT NULL,
  `rating` float NOT NULL,
  `domaine` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `nbe` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`);

--
-- Index pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD PRIMARY KEY (`id_postulation`),
  ADD KEY `fk1` (`id_freelancer`),
  ADD KEY `fk2` (`id_offre`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `postulation`
--
ALTER TABLE `postulation`
  MODIFY `id_postulation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_freelancer`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id_offre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
