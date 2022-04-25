-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2022 at 04:31 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'marianne_neuts', 'r0832692@student.thomasmore.be', '$2y$12$gzI1Exz4tfIjOG/czIiqb.0BK2N3W5LEiicISQlnVJmjfdM0SP83q'),
(2, 'lauren_vdl', 'r0801100@student.thomasmore.be', '$2y$12$M.6SLiRbbW9UoJ7EVwwcpuAIv29mEJOiyzxGyMPj7.8e/REtsz.xy'),
(3, 'liam_peeters', 'r0797377@student.thomasmore.be', '$2y$12$TSaPlqfAB/Zv1NJC36SgSe6GC5xGsaMXCawq4hoFUKqTIE8a0bi5G'),
(4, 'chelsea_vb', 'r0703841@student.thomasmore.be', '$2y$12$TGXy5xQuTazckSsoNZ.Uh.HcvK3lu2Rf2cnAJ/6v0vWjdoF7jS9CK'),
(5, 'joris_hens', 'joris.hens@thomasmore.be', '$2y$12$hoKYvSaNrzeyuOmrVA4Kgu5/clgTvcHTH4lbJxzGDi85Ur8P.i1jy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;