-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2023 at 09:33 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionnaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id_annonce` int(11) NOT NULL,
  `titre` text NOT NULL,
  `prix` int(250) NOT NULL,
  `date_ajout` date NOT NULL,
  `dae_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adresse` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ville` text NOT NULL,
  `categorie` text NOT NULL,
  `type` text NOT NULL,
  `url_image_principal` varchar(250) NOT NULL,
  `url_image1` varchar(250) NOT NULL,
  `url_image2` varchar(250) NOT NULL,
  `url_image3` varchar(250) NOT NULL,
  `url_image4` varchar(250) NOT NULL,
  `url_image5` varchar(250) NOT NULL,
  `url_image6` varchar(250) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `titre`, `prix`, `date_ajout`, `dae_modif`, `adresse`, `description`, `ville`, `categorie`, `type`, `url_image_principal`, `url_image1`, `url_image2`, `url_image3`, `url_image4`, `url_image5`, `url_image6`, `id_client`) VALUES
(1, 'home', 2334, '2023-02-09', '2023-02-20 12:29:32', 'tgrtrerr345', '', 'tanger', 'appartemant', 'location', 'hhh', 'trrert', 'rew', 'erwe', 'erw', 'y5t4r3', '5t4r3', 1),
(3, 'you', 5000, '2000-03-22', '2003-04-22 22:00:00', 'yuiopewerr', 'rjengjngnrtlntrln', 'tanger', 'appartemant', 'vente', '/rtmewwmwemrr', 'rgekt jkt ttjre', 'tmrterkmt', 'tkemtlt', 'rtmetle', 'erkmltklt', 'ernn tkjtkt', 1),
(4, 'qaw', 2134, '2023-02-23', '2023-02-20 12:58:00', '53423gfs', '', 'tewrerweerwerew', 'rewe', 'ewq', 'erw', 'erw', 'trew', 'tre', '43', 'erw', 'trerwe', 1),
(5, 'qaw', 2134, '2023-02-23', '2023-02-20 12:58:05', '53423gfs', '', 'tewrerweerwerew', 'rewe', 'ewq', 'erw', 'erw', 'trew', 'tre', '43', 'erw', 'trerwe', 1),
(6, 'qaw', 2134, '2023-02-23', '2023-02-20 12:58:19', '53423gfs', '', 'tewrerweerwerew', 'rewe', 'ewq', 'erw', 'erw', 'trew', 'tre', '43', 'erw', 'trerwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `telephone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `prenom`, `email`, `password`, `telephone`) VALUES
(1, 'youssef', 'bouayez', 'youssef@gmail.com', 'you404303', 6373738);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
