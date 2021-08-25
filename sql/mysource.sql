-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 01:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysource`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `email` varchar(60) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `language` varchar(20) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`email`, `titre`, `description`, `language`, `section`) VALUES
('johnanthony@gmail.com', 'allkindsofMods', 'this is just a description of the all mods pack', ' java', 'mods'),
('johnanthony@gmail.com', 'braindead', 'this is the braindead plugin for the UE interface', ' java', 'plugins'),
('johnanthony@gmail.com', 'deep nested', 'this is the deep nested implementation ', ' java', 'deep learning'),
('johnanthony@gmail.com', 'general-downloader api', 'this is the general downloaer API seen in the infamous machine learning approach', ' java', 'downloaders');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `profession` varchar(30) NOT NULL,
  `telephone` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nom`, `prenom`, `email`, `password`, `resume`, `profession`, `telephone`, `picture`) VALUES
('leon', 'martinez', 'casperlight@gmail.com', 'frank', '', '', 36859696, ''),
('test', 'subject ', 'email@mail.com', 'pass', '', '', 9999999, ''),
('john', 'anthony', 'johnanthony@gmail.com', 'pass', 'this is where the resume should go,and this is an attempt to change it', 'ceo', 6969150, 'img\\profiles\\johnanthony@gmail.com.jpg'),
('f5d6', 'prenom', 'johny@gmail.com', 'pass', '', '', 0, 'img/profiles/johny@gmail.com.jpg'),
('julias', 'alfred', 'juluis99@gmail.com', 'pass', '', '', 6669696, ''),
('jack', 'keeper', 'kreeper_jack@gmail.com', 'pass', '', '', 6858549, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`titre`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
