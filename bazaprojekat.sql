-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 09:26 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazaprojekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idkorisnik` int(10) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idzasluge` int(10) NOT NULL,
  `idstatus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idkorisnik`, `username`, `password`, `email`, `idzasluge`, `idstatus`) VALUES
(1, 'toto7', 'kaleidoskop18', 'sas43@gmail.com', 3, 1),
(2, 'biso12', 'miskatonik1916', 'debril2@gmail.com', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `idproizvod` int(10) NOT NULL,
  `naziv` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(10) NOT NULL,
  `kategorija` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idkorisnik` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`idproizvod`, `naziv`, `cena`, `kategorija`, `idkorisnik`) VALUES
(1, 'Belgrade IPA majica', 1200, 'garderoba', 1),
(2, 'Jagodinsko krigla', 800, 'staklo', 2);

-- --------------------------------------------------------

--
-- Table structure for table `statuskorisnika`
--

CREATE TABLE `statuskorisnika` (
  `idstatus` int(10) NOT NULL,
  `opis` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statuskorisnika`
--

INSERT INTO `statuskorisnika` (`idstatus`, `opis`) VALUES
(1, 'admin'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `zasluge`
--

CREATE TABLE `zasluge` (
  `idzasluge` int(10) NOT NULL,
  `opiszasluge` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zasluge`
--

INSERT INTO `zasluge` (`idzasluge`, `opiszasluge`) VALUES
(1, 'junior'),
(2, 'senior'),
(3, 'pro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idkorisnik`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `veza_1` (`idstatus`),
  ADD KEY `veza_2` (`idzasluge`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`idproizvod`),
  ADD KEY `veza_3` (`idkorisnik`);

--
-- Indexes for table `statuskorisnika`
--
ALTER TABLE `statuskorisnika`
  ADD PRIMARY KEY (`idstatus`);

--
-- Indexes for table `zasluge`
--
ALTER TABLE `zasluge`
  ADD PRIMARY KEY (`idzasluge`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `veza_1` FOREIGN KEY (`idstatus`) REFERENCES `statuskorisnika` (`idstatus`) ON UPDATE CASCADE,
  ADD CONSTRAINT `veza_2` FOREIGN KEY (`idzasluge`) REFERENCES `zasluge` (`idzasluge`) ON UPDATE CASCADE;

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `veza_3` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnik` (`idkorisnik`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
