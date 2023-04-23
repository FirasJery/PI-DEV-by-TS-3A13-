-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 01:41 AM
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
-- Database: `freelancyweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `last_message_id` int(11) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `last_message_id`, `type`, `title`) VALUES
(1, 31, 'p2p', 'admin, dummy_user'),
(4, 35, 'p2p', 'admin, test_user'),
(6, 38, 'p2p', 'admin, squirrel'),
(8, 39, 'p2p', 'admin, khalil'),
(9, 40, 'grp', 'admin, grp1, grp2');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230319192509', '2023-03-19 20:26:55', 702),
('DoctrineMigrations\\Version20230331202528', '2023-03-31 22:25:36', 133);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `participant_id` int(11) DEFAULT NULL,
  `conversation_id` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `participant_id`, `conversation_id`, `content`, `created_at`) VALUES
(1, 1, 1, 'test msg', '2023-04-01 00:55:53'),
(3, 1, 1, 'actual conversation', '2023-04-02 00:01:11'),
(4, 2, 1, 'reply', '2023-04-02 00:01:27'),
(5, 3, 4, 'Hello world', '2023-04-04 07:36:33'),
(6, 1, 1, 'aaaa', '2023-04-06 11:52:27'),
(7, 2, 1, 'test pusher', '2023-04-06 11:53:19'),
(8, 3, 4, 'test pusher 2', '2023-04-06 11:55:17'),
(9, 1, 1, 'aloooo', '2023-04-06 12:02:48'),
(10, 1, 1, 'test pusher 2', '2023-04-06 12:03:06'),
(11, 3, 4, 'test bd', '2023-04-06 12:06:50'),
(12, 1, 1, 'autre test', '2023-04-06 12:10:59'),
(13, 2, 1, 'test pusher on recieve', '2023-04-06 12:21:15'),
(14, 2, 1, 'test pusher on recieve 2', '2023-04-06 12:25:22'),
(15, 1, 1, 'test pusher recieve', '2023-04-06 12:26:24'),
(16, 1, 1, 'test', '2023-04-06 12:29:10'),
(17, 1, 1, 'bonjour', '2023-04-06 12:37:13'),
(18, 2, 1, 'bonjour', '2023-04-06 12:39:29'),
(19, 1, 1, 'hello world', '2023-04-06 14:18:12'),
(20, 2, 1, 'test reply', '2023-04-06 14:18:19'),
(21, 1, 1, 'test bd', '2023-04-06 15:23:27'),
(22, 1, 1, 'test msg controller', '2023-04-10 22:24:50'),
(23, 1, 1, 'hellooo', '2023-04-10 22:25:03'),
(24, 1, 1, 'test modal', '2023-04-10 22:32:20'),
(25, 1, 1, 'test modal 2', '2023-04-10 22:33:35'),
(27, 9, 6, 'hello squirrel', '2023-04-10 23:07:24'),
(28, 10, 6, 'hello', '2023-04-13 13:17:35'),
(29, 9, 6, 'test messagerie', '2023-04-13 13:20:35'),
(30, 3, 4, 'tets n', '2023-04-13 13:21:43'),
(31, 1, 1, 'tt', '2023-04-13 13:25:40'),
(32, 9, 6, 'cc', '2023-04-13 13:25:55'),
(33, 3, 4, 'cc', '2023-04-13 13:32:13'),
(34, 3, 4, 'msg msg msg', '2023-04-13 13:34:53'),
(35, 3, 4, 'lii', '2023-04-13 13:35:28'),
(36, 10, 6, 'cv', '2023-04-13 13:35:52'),
(38, 9, 6, 'test message', '2023-04-13 14:04:10'),
(39, 14, 8, 'hello', '2023-04-13 14:04:51'),
(40, 16, 9, 'test grp', '2023-04-22 21:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `conversation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `user_id`, `conversation_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 4),
(4, 3, 4),
(9, 1, 6),
(10, 5, 6),
(14, 1, 8),
(15, 4, 8),
(16, 1, 9),
(17, 7, 9),
(18, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '123'),
(2, 'dummy_user', '123'),
(3, 'test_user', '123'),
(4, 'khalil', '123'),
(5, 'squirrel', '123'),
(6, 'le m', '123'),
(7, 'grp1', '123'),
(8, 'grp2', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8A8E26E9BA0E79C3` (`last_message_id`),
  ADD KEY `last_message_id_index` (`last_message_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6BD307F9AC0396` (`conversation_id`),
  ADD KEY `created_at_index` (`created_at`),
  ADD KEY `IDX_B6BD307F9D1C3019` (`participant_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D79F6B11A76ED395` (`user_id`),
  ADD KEY `IDX_D79F6B119AC0396` (`conversation_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `FK_8A8E26E9BA0E79C3` FOREIGN KEY (`last_message_id`) REFERENCES `message` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_B6BD307F9AC0396` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`),
  ADD CONSTRAINT `FK_B6BD307F9D1C3019` FOREIGN KEY (`participant_id`) REFERENCES `participant` (`id`);

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `FK_D79F6B119AC0396` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`),
  ADD CONSTRAINT `FK_D79F6B11A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
