-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 mars 2023 à 12:42
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
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Developpement'),
(2, 'Mecanique');

-- --------------------------------------------------------

--
-- Structure de la table `certif`
--

CREATE TABLE `certif` (
  `id` int(11) NOT NULL,
  `nom` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `badge` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `certif`
--

INSERT INTO `certif` (`id`, `nom`, `description`, `badge`) VALUES
(3, 'Web', 'webdesign', 'src/resources/DefaultProfile.png');

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `id_source` varchar(50) NOT NULL,
  `id_dest` varchar(50) NOT NULL,
  `status_src` varchar(10) NOT NULL,
  `status_dest` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`id`, `id_source`, `id_dest`, `status_src`, `status_dest`) VALUES
(0, '606', 'SERVER', 'true', 'true'),
(19, '202', '606', 'true', 'pending'),
(20, '2024', 'ssss5', 'true', 'pending'),
(26, '56', '55', 'true', 'true');

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
  `num` varchar(200) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `credit_card`
--

INSERT INTO `credit_card` (`id`, `nom`, `prenom`, `date_expiration`, `cvc`, `zipcode`, `ville`, `num`, `id_user`) VALUES
(14, 'ghassen', 'ghassen', '12/22', 300, 2055, 'hola', '5555568', 59);

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

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `montant_paye`, `wallet_s`, `Certif`, `id_user`) VALUES
(6, 20, 35, 'Web', 59),
(7, 20, 35, 'Web', 59);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_source` varchar(50) NOT NULL,
  `id_dest` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id_convo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `id_source`, `id_dest`, `message`, `id_convo`) VALUES
(47, '56', '55', 'hey', 26),
(48, '55', '56', 'salut ', 26),
(49, '55', '56', 'how are you', 26);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `isRead` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `id_user`, `message`, `date`, `isRead`) VALUES
(13, 36, 'You Recieved 10 DT From firas', '2023-03-06 22:24:55', 0),
(14, 36, 'You Recieved 50 DT From omar', '2023-03-07 03:30:02', 0);

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
(44, 'poste', 'aal jaw ', 'aal chikha', 'exta', 0, 1, 1, 54, '2023-03-07', '2023-03-07'),
(45, 'Tache Java', 'developpement', 'Informatique', 'type', 0, 1, 1, 54, '2023-03-07', '2023-03-08'),
(46, 'Tache PHP', 'developpement', 'Informatique', 'type', 0, 1, 1, 54, '2023-03-08', '2023-03-08'),
(47, 'Tache c++', 'developpement', 'Informatique', 'type', 0, 1, 1, 54, '2023-03-08', '2023-03-08'),
(48, 'Tache Python', 'developpement', 'Informatique', 'type', 7, 0, 0, 54, '2000-01-01', '2000-01-01'),
(49, 'Tache JavaFx', 'developpement', 'Informatique', 'type', 7, 0, 0, 54, '2000-01-01', '2000-01-01'),
(50, 'Tache Codename', 'developpement', 'Informatique', '15$/h', 7, 0, 0, 54, '2000-01-01', '2000-01-01'),
(51, 'Tache sdl', 'developpement', 'Informatique', '$15/h', 7, 0, 0, 54, '2000-01-01', '2000-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `passage`
--

CREATE TABLE `passage` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `idtest` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `passage`
--

INSERT INTO `passage` (`id`, `score`, `etat`, `idtest`, `iduser`) VALUES
(4, 10, 1, 7, 59),
(5, 20, 0, 7, 59),
(6, 5, 0, 7, 59),
(7, 10, 1, 8, 59);

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
(23, 1, 44, 55),
(24, 1, 45, 56),
(25, 1, 46, 56),
(26, 0, 47, 56),
(27, 1, 47, 58),
(28, 0, 48, 59);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `reponse` varchar(1000) NOT NULL,
  `note` int(11) NOT NULL,
  `idtest` int(11) NOT NULL,
  `choix1` varchar(255) NOT NULL,
  `choix2` varchar(255) NOT NULL,
  `choix3` varchar(255) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `question`, `reponse`, `note`, `idtest`, `choix1`, `choix2`, `choix3`, `Type`) VALUES
(1, 'Yes or No ?', 'Yes', 5, 7, '', '', '', 'Text'),
(2, '1 or 2 or 3 ?', '1', 5, 7, '1', '2', '3', 'QCM'),
(11, 'Testtttt', 'yes', 5, 7, '', '', '', 'Text'),
(12, 'howa', 'howa', 10, 8, '', '', '', 'Text'),
(13, 'hiya', 'hoe', 5, 9, 'hiya', 'hiya', 'hoe', 'QCM');

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

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `description`, `type`, `etat`, `id_user`) VALUES
(9, 'azeazeazeazeazeazez', 'Problème technique', 0, 56),
(11, 'Yalllla', 'Problème technique', 2, 54),
(12, 'yolllo', 'Problème technique', 1, 54),
(13, 'HELLO', 'Problème technique', 2, 54),
(14, 't3agriba', 'Problème technique', 0, 54),
(15, 'ALO', 'Problème technique', 0, 54),
(16, 'test', 'Problème technique', 0, 59);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `Objet` varchar(500) NOT NULL,
  `Contenu` varchar(500) NOT NULL,
  `idrec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id`, `Objet`, `Contenu`, `idrec`) VALUES
(1, 'Problème technique', 'C BON', 11),
(2, 'Problème technique', 'Repondu', 13);

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
(6, 54, 55, 'sahit', 8),
(7, 54, 55, 'tres bien firas bon travail', 5),
(8, 60, 55, 'tres bien firas bon travail', 2),
(9, 58, 55, 'tres bien firas bon travail', 4),
(10, 54, 55, 'sahit', 8),
(11, 54, 56, 'aadi', 7),
(12, 54, 58, 'kessah', 10);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(10) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `categorie` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `idcertif` int(11) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `titre`, `categorie`, `description`, `idcertif`, `prix`) VALUES
(7, 'Test Web', 'Info', 'test', 3, 50),
(8, 'Test php', 'dev', 'aaaa', 3, 20),
(9, 'Test js', 'dev', 'desc', 3, 30),
(10, 'test java', 'Developpement', 'deeeeesc', 3, 0);

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
  `password` varchar(500) DEFAULT NULL,
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
  `nbe` int(10) DEFAULT NULL,
  `isBanned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `name`, `LastName`, `UserName`, `email`, `password`, `role`, `ImagePath`, `bio`, `experience`, `education`, `total_jobs`, `rating`, `domaine`, `info`, `location`, `nbe`, `isBanned`) VALUES
(54, 'esprit', NULL, 'esprit', 'esprit@esprit.tn', 'OUYx6Wtfc2eK4cg9oQX2dw==', 'Entreprise', 'resources/arwa.aliàesprit.tn.png', NULL, NULL, NULL, NULL, NULL, 'Informatique', 'ecole sup privee', 'charguia', 155, 0),
(55, 'chadine', 'ben aissa', 'chdon', 'chadine@esprit.tn', 'UfU2jVNiD6MNHj5+qKZU/w==', 'Freelancer', 'resources/805759.png', 'carriere ', 'fel menzah 6 ', 'makritech', 0, 0, NULL, NULL, NULL, NULL, 0),
(56, 'firas', 'jery', 'firasjery', 'firas.jery@gmail.com', 'UfU2jVNiD6MNHj5+qKZU/w==', 'Freelancer', 'resources/profile.jpg', 'test', 'test', 'test', 1, 7, NULL, NULL, NULL, NULL, 0),
(57, 'omar', 'test', 'omar', 'omar@esprit.tn', 'UfU2jVNiD6MNHj5+qKZU/w==', 'Freelancer', 'resources/profile.jpg', 'encore etudiant', 'stage ', 'esprit', 0, 0, NULL, NULL, NULL, NULL, 1),
(58, 'khalil', 'khalil', 'khalil', 'khalil@esprit.tn', 'UfU2jVNiD6MNHj5+qKZU/w==', 'Freelancer', 'resources/profile.jpg', 'aze', 'aze', 'aze', 0, 10, NULL, NULL, NULL, NULL, 0),
(59, 'ghassen', 'ghassen', 'ghassen', 'ghassen@esprit.tn', 'UfU2jVNiD6MNHj5+qKZU/w==', 'Freelancer', 'resources/profile.jpg', 'aze', 'aze', 'aze', 0, 0, NULL, NULL, NULL, NULL, 0),
(60, 'Admin', 'admoun', 'admina', 'admin@esprit.tn', 'UfU2jVNiD6MNHj5+qKZU/w==', 'Admin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(10) NOT NULL,
  `Nom_wallet` varchar(200) NOT NULL,
  `solde` float NOT NULL,
  `bonus` float NOT NULL,
  `tel` varchar(200) NOT NULL,
  `id_user` int(10) NOT NULL,
  `cle` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `wallet`
--

INSERT INTO `wallet` (`id`, `Nom_wallet`, `solde`, `bonus`, `tel`, `id_user`, `cle`) VALUES
(32, 'esprit', 0, 0, 'esprit@esprit.tn', 54, 'VXkrFXJqY'),
(33, 'chadine', 0, 0, 'chadine@esprit.tn', 55, 'NV3l8iFat'),
(34, 'firas', 0, 0, 'firas.jery@gmail.com', 56, 'tqDjfgjDV'),
(35, 'ghassen', 40, 188, 'ghassen@esprit.tn', 59, '6Ao4UXZpe'),
(36, 'Admin', 0, 0, 'admin@esprit.tn', 60, 't88US872J'),
(37, 'omar', 0, 0, 'omar@esprit.tn', 57, 'FZd4e0U5D'),
(38, 'khalil', 0, 0, 'khalil@esprit.tn', 58, 'RL1z96Cs4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `certif`
--
ALTER TABLE `certif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `fork1` (`id_entreprise`);

--
-- Index pour la table `passage`
--
ALTER TABLE `passage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtest` (`idtest`),
  ADD KEY `iduser` (`iduser`);

--
-- Index pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD PRIMARY KEY (`id_postulation`),
  ADD KEY `fk1` (`id_freelancer`),
  ADD KEY `fk2` (`id_offre`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtest` (`idtest`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fku1` (`id_editeur`),
  ADD KEY `fku2` (`id_user`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcertif` (`idcertif`);

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
-- Index pour la table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `certif`
--
ALTER TABLE `certif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `passage`
--
ALTER TABLE `passage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `postulation`
--
ALTER TABLE `postulation`
  MODIFY `id_postulation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fork1` FOREIGN KEY (`id_entreprise`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `passage`
--
ALTER TABLE `passage`
  ADD CONSTRAINT `passage_ibfk_1` FOREIGN KEY (`idtest`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `passage_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_freelancer`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id_offre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`idtest`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fku1` FOREIGN KEY (`id_editeur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fku2` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`idcertif`) REFERENCES `certif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
