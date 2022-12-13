-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 04:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `receptkonyv`
--

-- --------------------------------------------------------

--
-- Table structure for table `etel`
--

CREATE TABLE `etel` (
  `id` int(11) NOT NULL,
  `nev` text COLLATE utf8_bin NOT NULL,
  `elkIdo` int(11) NOT NULL,
  `alapanyag` varchar(200) COLLATE utf8_bin NOT NULL,
  `hanyszemely` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `etel`
--

INSERT INTO `etel` (`id`, `nev`, `elkIdo`, `alapanyag`, `hanyszemely`) VALUES
(1, 'Lasagne', 60, '50-marhahús 2-fokhagyma 20-tészta 10-mozzarella', 2),
(2, 'Carbonara spagetti', 45, '40-tészta 4-tojássárgája 1-tojás 10-pancetta 8-pecorino sajt', 2),
(3, 'Pizza', 20, '50-finomliszt 40-kolbász 5-paradicsom 2-fokhagyma 1-vöröshagyma 10-gomba 14-csemegekukorica 10-sajt', 1),
(4, 'Rántotta', 10, '3-tojás 1-só 1-bors 1-vaj', 1),
(5, 'Óriás Pizza', 40, '80-kolbász 10-paradicsom 4-fokhagyma 2-vöröshagyma 20-gomba 28-csemegekukorica 20-sajt', 4),
(6, 'Wellington bélszin', 90, '60-marhabélszín 1-vöröshagyma 12-specksonka 24-tészta 1-tojás', 2),
(7, 'Nutellás Palacsinta', 20, '3-tej 2-szódavíz 2-tojás 25-liszt 1-nutella', 2),
(8, 'Brownie', 40, '10-finomliszt 22-étcsokoládé 12-vaj 1-nutella 3-tojás 15-cukor 1-vaníliakivonat', 3),
(9, 'Hamburger', 35, '40-marhahús 3-zsemle 3-cheddar 1-ketchup 1-mustár', 2),
(10, 'Rosé kacsamell', 50, '2-kacsamell 1-rozmaring 2-fokhagyma', 1),
(11, 'Nokedli', 30, '50-liszt 2-tojás', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etel`
--
ALTER TABLE `etel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etel`
--
ALTER TABLE `etel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
