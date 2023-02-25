-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 08:35 PM
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
-- Database: `esprit3a13`
--

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
(1, 'SERVER', '606', 'HELLO WORLD', 0),
(2, '606', 'SERVER', 'Hellooo', 0),
(3, '606', 'SERVER', 'hellurr', 0),
(4, '606', 'SERVER', 'wawawaza', 0),
(5, '606', 'SERVER', 'yoooo', 0),
(6, 'SERVER', '606', 'SERVER RESPONDS', 0),
(7, 'SERVER', '606', 'LAST TEST', 0),
(8, 'SERVER', '606', '????', 0),
(9, '606', 'SERVER', 'more tests', 0),
(10, 'SERVER', '606', 'Lhhhhhhhhhhhhhhhhhh', 0),
(20, 'SERVER', '606', 'AU FINAL QU\'EST CE QU\'ON DEVIENT', 0),
(21, 'SERVER', '606', 'le coeur brule, le coeur saigne', 0),
(22, '606', 'SERVER', 'yoo', 0),
(23, 'SERVER', '606', 'PINGING AAAAAAA', 0),
(26, 'SERVER', '606', 'pinging miniscule', 0),
(27, 'SERVER', '606', 'PINGING MAJ', 0),
(33, 'SERVER', '606', 'last test', 0),
(34, 'SERVER', '606', 'lyoum nhar khmiss', 0),
(35, 'SERVER', '606', 'lyoum nhar khmiss2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
