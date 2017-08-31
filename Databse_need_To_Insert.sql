-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2017 at 08:55 PM
-- Server version: 10.1.6-MariaDB
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ent`
--

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
  `id` int(11) NOT NULL,
  `reg_num` varchar(25) DEFAULT NULL,
  `operation_name` varchar(125) DEFAULT NULL,
  `patient_age` varchar(3) DEFAULT NULL,
  `disease_name` varchar(125) DEFAULT NULL,
  `patient_sex` varchar(11) DEFAULT NULL,
  `operation_date` date DEFAULT NULL,
  `unit` varchar(25) NOT NULL,
  `remarks` varchar(30) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`id`, `reg_num`, `operation_name`, `patient_age`, `disease_name`, `patient_sex`, `operation_date`, `unit`, `remarks`) VALUES
(21, '9384117', 'SMR', '32', 'DN37RT', 'male', '2017-07-30', 'C1', 'G/A'),
(20, '08', 'opera', '4', 'One Disease', 'female', '2017-08-26', 'B3', 'EQ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `pass` varchar(55) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`) VALUES
(1, 'admin', 'admin@optimushostbd', '123456'),
(2, 'pias', 'shamsuddinpias0@gmail.com', 'pias'),
(3, 'alamin', 'alaminfirdows@gmail.com', 'alamin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
