-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-lebonc.alwaysdata.net
-- Generation Time: May 29, 2018 at 01:17 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lebonc_gestimmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(100) NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_utilisateur`, `mdp`) VALUES
(1, 'Lebon', 'LebonChristophe'),
(5, 'test', 'test'),
(6, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE `demande` (
  `idDemande` int(5) NOT NULL,
  `idPersonne` int(3) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `budget` int(7) NOT NULL,
  `superficie` int(5) NOT NULL,
  `categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`idDemande`, `idPersonne`, `genre`, `ville`, `budget`, `superficie`, `categorie`) VALUES
(0, 0, 'maison', 'petit ile', 10000000, 50, ''),
(1, 1, 'maison', 'Saint-Denis', 530000, 120, 'vente'),
(2, 3, 'appartement', 'Saint-Paul', 120000, 18, 'vente'),
(3, 4, 'appartement', 'Saint-Paul', 145000, 21, 'vente'),
(4, 5, 'appartement', 'Saint-Paul', 172000, 26, 'vente'),
(5, 6, 'appartement', 'Saint-Pierre', 455555, 55, 'vente'),
(6, 7, 'maison', 'Saint-Denis', 600000, 55, 'vente'),
(7, 9, 'appartement', 'Saint-Denis', 371000, 40, 'vente'),
(8, 13, 'appartement', 'Saint-Denis', 253000, 25, 'vente'),
(9, 16, 'appartement', 'Saint-Denis', 162000, 15, 'vente'),
(10, 19, 'Immeuble', 'Saint-Denis', 73000, 80, 'vente'),
(11, 22, 'appartement', 'Saint-Pierre', 68000, 20, 'vente'),
(12, 25, 'maison', 'Saint-Pierre', 558000, 65, 'vente'),
(13, 27, 'appartement', 'Saint-Denis', 49000, 15, 'vente'),
(14, 28, 'maison', 'Saint-Denis', 1100000, 100, 'vente'),
(15, 31, 'appartement', 'Saint-Denis', 145000, 15, 'vente'),
(16, 32, 'appartement', 'Saint-Pierre', 123800, 21, 'vente'),
(17, 35, 'appartement', 'Saint-Pierre', 690000, 70, 'vente'),
(18, 37, 'appartement', 'Saint-Pierre', 1500000, 100, 'vente'),
(19, 43, 'appartement', 'Saint-Denis', 60000, 20, 'vente'),
(20, 44, 'appartement', 'Saint-Denis', 75000, 30, 'vente'),
(21, 45, 'appartement', 'Saint-Paul', 68000, 30, 'vente'),
(22, 46, 'maison', 'Saint-Paul', 413000, 40, 'vente'),
(23, 47, 'appartement', 'Saint-Paul', 70000, 45, 'vente'),
(24, 48, 'appartement', 'Saint-Denis', 495000, 40, 'vente'),
(25, 49, 'maison', 'Saint-Denis', 650000, 60, 'vente'),
(26, 50, 'appartement', 'Saint-Pierre', 110000, 12, 'vente'),
(27, 51, 'appartement', 'Saint-Pierre', 50000, 17, 'vente'),
(28, 52, 'appartement', 'Saint-Denis', 120000, 40, 'vente'),
(29, 53, 'appartement', 'Saint-Denis', 150000, 50, 'vente'),
(30, 54, 'appartement', 'Saint-Denis', 377500, 40, 'vente'),
(31, 55, 'appartement', 'Saint-Denis', 63000, 20, 'vente'),
(32, 58, 'maison', 'saint joseph', 5000000, 22, ''),
(34, 2, 'maison', 'saint louis', 50000, 30, '');

--
-- Triggers `demande`
--
DELIMITER $$
CREATE TRIGGER `Before_Update` BEFORE UPDATE ON `demande` FOR EACH ROW BEGIN
		INSERT INTO Histo_Demande
			(idDemande, idPersonne, genre, ville, budget, superficie, categorie, Action)
		VALUES
			(OLD.idDemande, OLD.idPersonne, OLD.genre, OLD.ville, OLD.budget, OLD.superficie, OLD.categorie, 'UPDATE');
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Histo_Demande`
--

CREATE TABLE `Histo_Demande` (
  `idDemande` int(5) NOT NULL,
  `idPersonne` int(3) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `budget` int(7) NOT NULL,
  `superficie` int(5) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `Action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Histo_Demande`
--

INSERT INTO `Histo_Demande` (`idDemande`, `idPersonne`, `genre`, `ville`, `budget`, `superficie`, `categorie`, `Action`) VALUES
(10, 19, 'appartement', 'Saint-Denis', 720000, 80, 'vente', 'UPDATE');

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `idPersonne` int(3) NOT NULL,
  `prenom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`idPersonne`, `prenom`) VALUES
(0, 'Gael'),
(1, 'william'),
(2, 'gaetan'),
(3, 'mehdi'),
(4, 'charles'),
(5, 'brigitte'),
(6, 'sarah'),
(7, 'lucas'),
(8, 'quentin'),
(9, 'patrick'),
(10, 'emmanuel'),
(11, 'elodie'),
(12, 'agathe'),
(13, 'valentine'),
(14, 'charlotte'),
(15, 'alice'),
(16, 'samuel'),
(17, 'mathieu'),
(18, 'noemie'),
(19, 'simpson'),
(20, 'florian'),
(21, 'clement'),
(22, 'yvon'),
(23, 'lea'),
(24, 'chloe'),
(25, 'camille'),
(26, 'alexandre'),
(27, 'julie'),
(28, 'leo'),
(29, 'antoine'),
(30, 'lola'),
(31, 'celia'),
(32, 'anna'),
(33, 'caroline'),
(34, 'adele'),
(35, 'sabrina'),
(36, 'nathalie'),
(37, 'franck'),
(38, 'tom'),
(39, 'johan'),
(40, 'priscillia'),
(41, 'assia'),
(42, 'nathan'),
(43, 'aurore'),
(44, 'marie'),
(45, 'oceane'),
(46, 'enzo'),
(47, 'ines'),
(48, 'hugo'),
(49, 'jonathan'),
(50, 'axelle'),
(51, 'morgane'),
(52, 'melissa'),
(53, 'kevin'),
(54, 'ophelie'),
(55, 'victoria'),
(56, 'alexis'),
(57, 'robin'),
(58, 'Christophe'),
(59, 'Jerome');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`idDemande`),
  ADD KEY `idPersonne` (`idPersonne`);

--
-- Indexes for table `Histo_Demande`
--
ALTER TABLE `Histo_Demande`
  ADD PRIMARY KEY (`idDemande`),
  ADD KEY `idPersonne` (`idPersonne`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`idPersonne`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
