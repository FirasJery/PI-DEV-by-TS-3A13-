-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 07:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `id_source` varchar(50) NOT NULL,
  `id_dest` varchar(50) NOT NULL,
  `status_src` varchar(10) NOT NULL,
  `status_dest` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `id_source`, `id_dest`, `status_src`, `status_dest`) VALUES
(0, '606', 'SERVER', 'true', 'true'),
(19, '202', '606', 'true', 'pending'),
(20, '2024', 'ssss5', 'true', 'pending'),
(22, '36', '48', 'true', 'pending'),
(23, '48', '47', 'true', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`id`, `nom`, `prenom`, `date_expiration`, `cvc`, `zipcode`, `ville`, `num`, `id_user`) VALUES
(1, 'ghass', 'gass', '20/12', 5000, 5000, 'fddf', 300, 26);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id` int(10) NOT NULL,
  `montant_paye` float NOT NULL,
  `wallet_s` int(10) NOT NULL,
  `Certif` varchar(250) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_source` varchar(50) NOT NULL,
  `id_dest` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id_convo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `id_source`, `id_dest`, `message`, `id_convo`) VALUES
(39, '48', '47', 'test messagerie integration', 0),
(40, '48', '47', 'hello test', 23),
(41, '48', '47', 'hello', 23),
(42, '48', '47', 'this paragraph is made for translation purposes', 23);

-- --------------------------------------------------------

--
-- Table structure for table `offre`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offre`
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
-- Table structure for table `postulation`
--

CREATE TABLE `postulation` (
  `id_postulation` int(11) NOT NULL,
  `isAccepted` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL,
  `id_freelancer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postulation`
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
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `type` varchar(200) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(10) NOT NULL,
  `id_editeur` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `message` varchar(500) NOT NULL,
  `note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `id_editeur`, `id_user`, `message`, `note`) VALUES
(4, 36, 37, 'bien', 7);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `montant` float NOT NULL,
  `sending_wallet` int(10) NOT NULL,
  `rec_wallet` int(10) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
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
(47, 'firas', 'jery', 'Firas', 'firasss@esprit.tn', 'azeazeaze', 'Freelancer', 'resources/.png', 'aze', 'aze', 'aze', 0, 0, NULL, NULL, NULL, NULL),
(48, 'Khalil', 'Khemiri', 'khe', 'khalil@esprit.tn', '123', 'Freelancer', 'resources/.png', 'A paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs.', 'A paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs.', 'makteb', 0, 0, NULL, 'A paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs.', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `fork1` (`id_entreprise`);

--
-- Indexes for table `postulation`
--
ALTER TABLE `postulation`
  ADD PRIMARY KEY (`id_postulation`),
  ADD KEY `fk1` (`id_freelancer`),
  ADD KEY `fk2` (`id_offre`);

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fku1` (`id_editeur`),
  ADD KEY `fku2` (`id_user`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rec_wallet` (`rec_wallet`),
  ADD KEY `sending_wallet` (`sending_wallet`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `postulation`
--
ALTER TABLE `postulation`
  MODIFY `id_postulation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fork1` FOREIGN KEY (`id_entreprise`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postulation`
--
ALTER TABLE `postulation`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_freelancer`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id_offre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fku1` FOREIGN KEY (`id_editeur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fku2` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
