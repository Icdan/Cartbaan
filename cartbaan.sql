-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 09:25 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartbaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `nummer` int(3) NOT NULL,
  `merk` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`idcart`, `nummer`, `merk`, `type`, `status`) VALUES
(0, 335, 'Ninebot', '500R', 'Ready to race'),
(1, 337, 'Ninebot', '500R', 'Ready to race'),
(2, 523, 'MF Racing', 'FS2', 'In reparatie'),
(3, 524, 'MF Racing', 'FS2', 'Ready to race'),
(4, 541, 'Rutix', 'GBD4', 'Ready to race'),
(5, 545, 'BMG', '2000', 'Ready to race'),
(6, 546, 'BMG', '2000', 'In reparatie');

-- --------------------------------------------------------

--
-- Table structure for table `cart_has_cursus`
--

CREATE TABLE `cart_has_cursus` (
  `idcart` int(11) NOT NULL,
  `idcursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cursist`
--

CREATE TABLE `cursist` (
  `idcursist` int(11) NOT NULL,
  `voornaam` varchar(45) DEFAULT NULL,
  `tussenvoegsel` varchar(45) DEFAULT NULL,
  `achternaam` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `adres` varchar(45) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `woonplaats` varchar(45) NOT NULL,
  `telefoon` varchar(45) NOT NULL,
  `wachtwoord` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cursist`
--

INSERT INTO `cursist` (`idcursist`, `voornaam`, `tussenvoegsel`, `achternaam`, `email`, `adres`, `postcode`, `woonplaats`, `telefoon`, `wachtwoord`) VALUES
(0, 'Klaas', NULL, 'Wonderschoon', 'wonder@gmail.com', 'Rozenplein 3', '8853ED', 'Amsterdam', '064928838', '123'),
(1, 'Pieter', 'Van', 'Voorn', 'voorn@kpn.nl', 'Karaf 33', '8499ED', 'Almere', '064392283', '123'),
(2, 'Wim', NULL, 'Schaafstra', 'ws@bla.nl', 'Van Mintstraat 3', '3829DS', 'Den Haag', '062835214', '123'),
(3, 'Josien', 'van de', 'Swan', 'josien@gmail.com', 'Groenstraat 32', '5930SA', 'Dronten', '063817281', '123'),
(4, 'Anna', 'van', 'Boven', 'anna@hotmail.nl', 'Antartica 37', '2399DE', 'Harderwijk', '063812737', '123'),
(5, 'Frits', NULL, 'Vals', 'vals@dewild.nl', 'Perthlaan 11', '2833DS', 'Zwolle', '062711718', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cursus`
--

CREATE TABLE `cursus` (
  `idcursus` int(11) NOT NULL,
  `omschrijving` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cursus`
--

INSERT INTO `cursus` (`idcursus`, `omschrijving`) VALUES
(0, 'Beginnerscursus'),
(1, 'Gevorderden'),
(2, 'Professional racing');

-- --------------------------------------------------------

--
-- Table structure for table `docent`
--

CREATE TABLE `docent` (
  `iddocent` int(11) NOT NULL,
  `voornaam` varchar(45) DEFAULT NULL,
  `tussenvoegsel` varchar(45) DEFAULT NULL,
  `achternaam` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docent`
--

INSERT INTO `docent` (`iddocent`, `voornaam`, `tussenvoegsel`, `achternaam`) VALUES
(1, 'Wil', 'van', 'Doornhout'),
(2, 'Liam ', NULL, 'Jansen');

-- --------------------------------------------------------

--
-- Table structure for table `uitvoering`
--

CREATE TABLE `uitvoering` (
  `idcursus` int(11) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `iddocent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uitvoering`
--

INSERT INTO `uitvoering` (`idcursus`, `begindatum`, `einddatum`, `iddocent`) VALUES
(0, '2019-10-15', '2019-10-16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `uitvoering_has_cursist`
--

CREATE TABLE `uitvoering_has_cursist` (
  `idcursus` int(11) NOT NULL,
  `idcursist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`);

--
-- Indexes for table `cart_has_cursus`
--
ALTER TABLE `cart_has_cursus`
  ADD PRIMARY KEY (`idcart`,`idcursus`),
  ADD KEY `fk_cart_has_cursus_cursus1_idx` (`idcursus`),
  ADD KEY `fk_cart_has_cursus_cart_idx` (`idcart`);

--
-- Indexes for table `cursist`
--
ALTER TABLE `cursist`
  ADD PRIMARY KEY (`idcursist`);

--
-- Indexes for table `cursus`
--
ALTER TABLE `cursus`
  ADD PRIMARY KEY (`idcursus`);

--
-- Indexes for table `docent`
--
ALTER TABLE `docent`
  ADD PRIMARY KEY (`iddocent`);

--
-- Indexes for table `uitvoering`
--
ALTER TABLE `uitvoering`
  ADD PRIMARY KEY (`idcursus`),
  ADD KEY `fk_uitvoering_docent1_idx` (`iddocent`);

--
-- Indexes for table `uitvoering_has_cursist`
--
ALTER TABLE `uitvoering_has_cursist`
  ADD PRIMARY KEY (`idcursus`,`idcursist`),
  ADD KEY `fk_uitvoering_has_cursist_cursist1_idx` (`idcursist`),
  ADD KEY `fk_uitvoering_has_cursist_uitvoering1_idx` (`idcursus`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_has_cursus`
--
ALTER TABLE `cart_has_cursus`
  ADD CONSTRAINT `fk_cart_has_cursus_cart` FOREIGN KEY (`idcart`) REFERENCES `cart` (`idcart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cart_has_cursus_cursus1` FOREIGN KEY (`idcursus`) REFERENCES `cursus` (`idcursus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uitvoering`
--
ALTER TABLE `uitvoering`
  ADD CONSTRAINT `fk_uitvoering_cursus1` FOREIGN KEY (`idcursus`) REFERENCES `cursus` (`idcursus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uitvoering_docent1` FOREIGN KEY (`iddocent`) REFERENCES `docent` (`iddocent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uitvoering_has_cursist`
--
ALTER TABLE `uitvoering_has_cursist`
  ADD CONSTRAINT `fk_uitvoering_has_cursist_cursist1` FOREIGN KEY (`idcursist`) REFERENCES `cursist` (`idcursist`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uitvoering_has_cursist_uitvoering1` FOREIGN KEY (`idcursus`) REFERENCES `uitvoering` (`idcursus`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
