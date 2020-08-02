-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2013 at 09:19 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kreasiboutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategoriblog`
--

CREATE TABLE IF NOT EXISTS `kategoriblog` (
  `id_kategoriblog` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategoriblog` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `kategoriblog_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kategoriblog`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kategoriblog`
--

INSERT INTO `kategoriblog` (`id_kategoriblog`, `nama_kategoriblog`, `username`, `kategoriblog_seo`) VALUES
(2, 'Tips & Trik', 'admin', 'tips--trik'),
(3, 'Kabar-kabari', 'admin', 'kabarkabari'),
(4, 'Dunia Fashion', 'admin', 'dunia-fashion');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
