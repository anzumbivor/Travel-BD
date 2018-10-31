-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2017 at 06:45 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travelbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE IF NOT EXISTS `agency` (
  `agency_id` varchar(200) NOT NULL,
  `ag_name` varchar(200) NOT NULL,
  `contact_num` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`agency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`agency_id`, `ag_name`, `contact_num`, `email`) VALUES
('ag1', 'Khaled Travel Agency of Bangladesh', '01684911589', 'anzumbivor@gmail.com'),
('ag2', 'Bangladesh Travel Homes', '01684911591', 'ashzavin@gmail.com'),
('ag3', 'Travel Booking Bangladesh', '01845162434', 'decipherbivor@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `disaster`
--

CREATE TABLE IF NOT EXISTS `disaster` (
  `id` varchar(200) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `Lati` int(100) NOT NULL,
  `Longi` int(100) NOT NULL,
  `dis_type` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disaster`
--

INSERT INTO `disaster` (`id`, `p_name`, `Lati`, `Longi`, `dis_type`) VALUES
('1', 'Bichanakandi', 24, 91, 'Storm');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` varchar(200) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `location`) VALUES
('h1', 'DuSai Resort & Spa', 'Srimangal Road, Niteshwar, Giashnagar, Maulvi Bazar, Bangladesh'),
('h2', 'Rose View Hotel', 'Plot # 2, Block #D | Shahjalal Uposhohor, 3100, Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `place` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`user_id`, `place`) VALUES
(1, 'University Ave, Sylhet, Bangladesh'),
(2, 'IICT, University Ave, Sylhet 3114, Bangladesh'),
(3, 'IICT, University Ave, Sylhet 3114, Bangladesh'),
(4, 'IICT, University Ave, Sylhet 3114, Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `pkg_id` varchar(200) NOT NULL,
  `pkg_name` varchar(200) NOT NULL,
  `agency_id` varchar(200) NOT NULL,
  `cost` varchar(200) NOT NULL,
  `day` varchar(200) NOT NULL,
  `descr` varchar(500) NOT NULL,
  PRIMARY KEY (`pkg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pkg_id`, `pkg_name`, `agency_id`, `cost`, `day`, `descr`) VALUES
('pkg1', 'Sylhet: Group Tour ( Ratargul – Bisanakandi – Jaflong –Dargah Shariff )', 'ag1', '5500 BDT', '5 Days 4 Nights', 'Package Inclusions: \r\n1. Dhaka - Sylhet - Dhaka Non Ac Bus\r\n2. Non  AC hotel Accommodation (3/4 Sharing) (Couple room extra 500 per person applicable)\r\n3. AC transport for sightseeing\r\n4. Experienced Guide facilities\r\nHotel Name: Holy Gate,supreme & Similar Category'),
('pkg2', 'Daruchini Dwip: Saint Martin', 'ag2', '7500 BDT', '5 days 4 nights', 'Package Includes:\r\n1. Dhaka - Sylhet - Dhaka Non Ac Bus\r\n2. Non  AC hotel Accommodation (3/4 Sharing) (Couple room extra 500 per person applicable)\r\n3. AC transport for sightseeing\r\n5. Experienced Guide facilities'),
('pkg3', 'Hotel Graver Inn', 'ag3', '2960 BDT', '5 Days 4 Nights', 'Package Includes:\r\n1. Dhaka - Sylhet - Dhaka Non Ac Bus\r\n2. Non  AC hotel Accommodation (3/4 Sharing) (Couple room extra 500 per person applicable)\r\n3. AC transport for sightseeing\r\n5. Experienced Guide facilities');

-- --------------------------------------------------------

--
-- Table structure for table `rev_loc`
--

CREATE TABLE IF NOT EXISTS `rev_loc` (
  `rev_id` varchar(200) NOT NULL,
  `loc_id` varchar(200) NOT NULL,
  `food` int(200) NOT NULL,
  `nature` int(200) NOT NULL,
  `trans_fac` int(200) NOT NULL,
  `pos_rev` varchar(500) NOT NULL,
  `neg_rev` varchar(500) NOT NULL,
  PRIMARY KEY (`rev_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rev_loc`
--

INSERT INTO `rev_loc` (`rev_id`, `loc_id`, `food`, `nature`, `trans_fac`, `pos_rev`, `neg_rev`) VALUES
('rev1', 'sp1', 4, 5, 3, 'One of the most vivid places in Bangladesh', 'Transportation facility was not upto the mark'),
('rev2', 'sp1', 3, 5, 4, 'I loved this place and want to visit over and over again', 'No negative impression from me'),
('rev3', 'sp2', 3, 4, 4, 'Love this place', 'Got bitten by some horrible insects'),
('rev4', 'sp2', 2, 5, 4, 'Wish to come here again', 'Food is not good'),
('rev5', 'sp3', 3, 5, 4, 'Had great experience', 'No bad experience from me');

-- --------------------------------------------------------

--
-- Table structure for table `rev_pkg`
--

CREATE TABLE IF NOT EXISTS `rev_pkg` (
  `rev_id` varchar(200) NOT NULL,
  `pkg_id` varchar(200) NOT NULL,
  `cost` int(200) NOT NULL,
  `trust` int(200) NOT NULL,
  `service` int(200) NOT NULL,
  PRIMARY KEY (`rev_id`),
  UNIQUE KEY `pkg_id` (`pkg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rev_pkg`
--

INSERT INTO `rev_pkg` (`rev_id`, `pkg_id`, `cost`, `trust`, `service`) VALUES
('rev1', 'pkg1', 3, 4, 3),
('rev2', 'pkg2', 2, 2, 1),
('rev3', 'pkg3', 4, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `spot`
--

CREATE TABLE IF NOT EXISTS `spot` (
  `spot_id` varchar(200) NOT NULL,
  `spot_name` varchar(200) NOT NULL,
  `division` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `map_id` varchar(200) NOT NULL,
  PRIMARY KEY (`spot_id`),
  UNIQUE KEY `map_id` (`map_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spot`
--

INSERT INTO `spot` (`spot_id`, `spot_name`, `division`, `description`, `map_id`) VALUES
('sp1', 'Bichanakandi', 'Sylhet', 'Bisanakandi is situated at Bangladesh-India border in Sylhet. It is a landscape beauty among gardens and hills. Bichanakandi is a village situated in Rustompur Union under Guainghat Upazilla.', 'mp1'),
('sp2', 'Jaflong', 'Sylhet', 'Jaflong is a hill station and popular tourist destination in the Division of Sylhet, Bangladesh. It is located in Gowainghat Upazila of Sylhet District and situated at the border between Bangladesh and the Indian state of Meghalaya, overshadowed by subtropical mountains and rainforests. Jaflong is famous for its stone collections and is home of the Khasi tribe.', 'mp2'),
('sp3', 'Ratargul Swamp Forest', 'Sylhet', 'Ratargul Swamp Forest is a freshwater swamp forest located in Gowainghat, Sylhet, Bangladesh. It is the only swamp forest located in Bangladesh and one of the few freshwater swamp forest in the world. The forest is naturally conserved under the Department of Forestry, Govt. of Bangladesh.', 'mp3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `trade` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) NOT NULL,
  `trade` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id`, `category`, `trade`, `email`, `address`) VALUES
('Pratik', 'pass11', 1, 'User', '', '', ''),
('Affan', 'pass11', 2, 'Agency', '', '', ''),
('bb1', 'sourcecode123', 4, 'User', '', 'ashzavin@gmail.com', 'asas');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
