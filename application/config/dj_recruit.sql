-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2013 at 03:35 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dj_recruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `dj_contacts`
--

CREATE TABLE IF NOT EXISTS `dj_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(380) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `postcode` varchar(15) NOT NULL,
  `dob` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `dj_contacts`
--

INSERT INTO `dj_contacts` (`id`, `name`, `email`, `mobile`, `address_line1`, `address_line2`, `town`, `postcode`, `dob`) VALUES
(11, 'Nick White', 'nickwhite@toxicd.co.uk', '447966399608', 'Flat 16 Farmstead Court', 'Melbourne Road', 'Wallington', 'SM1 4BL', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dj_contact_equipment`
--

CREATE TABLE IF NOT EXISTS `dj_contact_equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dj_contact_equipment`
--

INSERT INTO `dj_contact_equipment` (`id`, `equipment_id`, `contact_id`) VALUES
(1, 4, 11),
(3, 6, 11),
(4, 7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `dj_contact_music`
--

CREATE TABLE IF NOT EXISTS `dj_contact_music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dj_contact_music`
--

INSERT INTO `dj_contact_music` (`id`, `contact_id`, `music_id`) VALUES
(1, 11, 1),
(2, 11, 2),
(3, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dj_equipment`
--

CREATE TABLE IF NOT EXISTS `dj_equipment` (
  `name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dj_equipment`
--

INSERT INTO `dj_equipment` (`name`, `id`) VALUES
('Smoke machine', 4),
('Lights', 5),
('Laptop', 7);

-- --------------------------------------------------------

--
-- Table structure for table `dj_music`
--

CREATE TABLE IF NOT EXISTS `dj_music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `music` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dj_music`
--

INSERT INTO `dj_music` (`id`, `music`) VALUES
(1, 'Drum n Base'),
(2, 'RnB'),
(3, 'Techno');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
