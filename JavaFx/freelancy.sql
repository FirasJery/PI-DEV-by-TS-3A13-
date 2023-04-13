-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 05 mars 2023 à 20:31
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
-- Structure de la table `credit_card`
--

CREATE TABLE `credit_card` (
  `id` int(10) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `date_expiration` varchar(250) NOT NULL,
  `cvc` int(3) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `ville` varchar(200) NOT NULL,
  `num` int(20) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `credit_card`
--

INSERT INTO `credit_card` (`id`, `nom`, `prenom`, `date_expiration`, `cvc`, `zipcode`, `ville`, `num`, `id_user`) VALUES
(1, 'ghass', 'gass', '20/12', 5000, 5000, 'fddf', 300, 26);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(10) NOT NULL,
  `montant_paye` float NOT NULL,
  `wallet_s` int(10) NOT NULL,
  `Certif` varchar(250) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `title`, `description`, `category`, `type`, `duree`, `isAccepted`, `isFinished`, `id_entreprise`, `date_debut`, `date_fin`) VALUES
(25, 'test', 'test', 'test', 'test', 0, 1, 1, 36, '2023-03-01', '2023-03-01'),
(26, 'teeeest 2 ', 'azer', 'azer', 'azer', 8, 1, 0, 36, '2023-03-01', '2023-11-01'),
(27, ' join', 'aze', 'aze', 'aze', 0, 1, 1, 36, '2023-03-01', '2023-03-01'),
(28, 'join 2 ', 'aze', 'aze', 'aze', 0, 1, 1, 36, '2023-03-01', '2023-03-01'),
(29, 'COLOR', 'aze', 'aze', 'aze', 7, 1, 0, 36, '2023-03-01', '2023-10-01'),
(30, 'test non post', 'aze', 'aze', 'aze', 7, 0, 0, 36, '2000-01-01', '2000-01-01'),
(31, 'test post', 'aze', 'aze', 'aze', 7, 0, 0, 36, '2000-01-01', '2000-01-01');

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

--
-- Déchargement des données de la table `postulation`
--

INSERT INTO `postulation` (`id_postulation`, `isAccepted`, `id_offre`, `id_freelancer`) VALUES
(9, 1, 25, 37),
(10, 0, 26, 37),
(11, 1, 26, 38),
(12, 1, 27, 37),
(13, 1, 28, 37),
(14, 1, 29, 37),
(15, 0, 31, 37);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `type` varchar(200) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE `review` (
  `id` int(10) NOT NULL,
  `id_editeur` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `message` varchar(500) NOT NULL,
  `note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `review`
--

INSERT INTO `review` (`id`, `id_editeur`, `id_user`, `message`, `note`) VALUES
(4, 36, 37, 'bien', 7);

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `montant` float NOT NULL,
  `sending_wallet` int(10) NOT NULL,
  `rec_wallet` int(10) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `ImagePath` varchar(500) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `total_jobs` int(10) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `domaine` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `nbe` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `name`, `LastName`, `UserName`, `email`, `password`, `role`, `ImagePath`, `bio`, `experience`, `education`, `total_jobs`, `rating`, `domaine`, `info`, `location`, `nbe`) VALUES
(36, 'chariket Omar firas et ghaton ', 'esprit', 'esprit', 'esprit@esprit.tn', 'espritesprit', 'Entreprise', 'resources/.png', NULL, NULL, NULL, NULL, NULL, 'chikha', 'ahna chabeb nhebou nchikhou ', 'Kahwetkom', 3),
(37, 'firas', 'jery', 'firasjery', 'firas.jery@gmail.com', 'firasfiras', 'Freelancer', 'resources/aze@aze.aze.png', 'Ingénieur CLOUD', 'deux années à actia ', 'cycle ingénieurie à esprit', 0, 0, NULL, NULL, NULL, NULL),
(38, 'firas', 'jery', 'aze', 'firas@esprit.tn', 'firasfiras', 'Freelancer', 'resources/profile.jpg', 'ingénieur GL', 'travaillé à actia 5 ans ', 'etudié 5 ans à esprit', 0, 0, NULL, NULL, NULL, NULL),
(41, 'firas et safa ', 'aze', 'aze', 'fff@ff.tn', 'azeazeaze', 'Freelancer', 'resources/fff@ff.tn.png', 'aze', 'aze', 'aze', 0, 0, NULL, NULL, NULL, NULL),
(43, 'omar', 'haj', 'hajomar', 'omar@esprit.tn', 'azeazeaze', 'Freelancer', 'resources/.png', 'aze', 'aze', 'aze', 0, 0, NULL, NULL, NULL, NULL),
(44, 'admin', 'admin', 'admin', 'admin@esprit.tn', 'adminadmin', 'Admin', 'resources/profile.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'flower', NULL, 'aze', 'flower@esprit.tn', 'azertyazerty', 'Entreprise', 'resources/profile.jpg', NULL, NULL, NULL, NULL, NULL, 'aze', 'aze', 'aze', 1),
(46, 'aze', 'aze', 'aze', 'aze@test.tn', 'azertyazerty', 'Freelancer', 'resources/profile.jpg', 'aze', 'aze', 'aze', 0, 0, NULL, NULL, NULL, NULL),
(47, 'firas', 'jery', 'test', 'firasss@esprit.tn', 'azeazeaze', 'Freelancer', 'resources/.png', 'aze', 'aze', 'aze', 0, 0, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `fork1` (`id_entreprise`);

--
-- Index pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD PRIMARY KEY (`id_postulation`),
  ADD KEY `fk1` (`id_freelancer`),
  ADD KEY `fk2` (`id_offre`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fku1` (`id_editeur`),
  ADD KEY `fku2` (`id_user`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rec_wallet` (`rec_wallet`),
  ADD KEY `sending_wallet` (`sending_wallet`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `postulation`
--
ALTER TABLE `postulation`
  MODIFY `id_postulation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fork1` FOREIGN KEY (`id_entreprise`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_freelancer`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id_offre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fku1` FOREIGN KEY (`id_editeur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fku2` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
