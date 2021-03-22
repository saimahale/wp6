-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 11:57 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `userid` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `files` text NOT NULL,
  `graduation` text NOT NULL,
  `grade` text NOT NULL,
  `gyear` text NOT NULL,
  `spec` text NOT NULL,
  `college` text NOT NULL,
  `preskill` text NOT NULL,
  `secskill` text NOT NULL,
  `certificate` text NOT NULL,
  `pitch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`userid`, `firstname`, `lastname`, `gender`, `email`, `phone`, `state`, `city`, `files`, `graduation`, `grade`, `gyear`, `spec`, `college`, `preskill`, `secskill`, `certificate`, `pitch`) VALUES
(1, 'Sai', 'Mahale', 'Male', 'saimahale1234@gmail.com', '7972161772', 'Maharashtra', 'Shirdi', '55__1_-removebg-preview.1616406360.png', 'BE', '60%', '2020', 'IT', 'Sanjivani College of Engineering, Kopargaon', 'Php, mysql', 'responsive Design , bootstrap', 'responsive designing through coursera', 'I am having a hand on experience of php and mysql. i rate myself at 4/5 on php. I am familiar with html5, css3, bootstrap4 and responsive designing.'),
(2, 'Shraddha', 'Mahale', 'Male', 'saimahale@gmail.com', '7972161772', 'Maharashtra', 'Shirdi', 'IMAGE.png', 'BA', '60%', '2020', 'Geography', 'KJS College, Kopargaon', 'google Earth, GIS Softaware', 'MS Word , MS Excel', 'GIS ', 'I am having a hand on experience of GIS software . i rate myself at 4/5 on GIS. I am familiar with Google Earth , Google Map and MS office.'),
(3, 'Shraddha', 'Mahale', 'Female', 'saimahale@gmail.com', '7972161772', 'Maharashtra', 'Shirdi', 'IMAGE.1616406742.png', 'BA', '60%', '2020', 'Geography', 'KJS College, Kopargaon', 'google Earth, GIS Softaware', 'MS Word , MS Excel', 'GIS ', 'I am having a hand on experience of GIS software . i rate myself at 4/5 on GIS. I am familiar with Google Earth , Google Map and MS office.'),
(4, 'Shraddhha', 'Mahale', 'Female', 'saimahale@gmail.com', '7972161772', 'Maharashtra', 'Shirdi', 'IMAGE.1616406761.png', 'BA', '60%', '2020', 'Geography', 'KJS College, Kopargaon', 'google Earth, GIS Softaware', 'MS Word , MS Excel', 'GIS ', 'I am having a hand on experience of GIS software . i rate myself at 4/5 on GIS. I am familiar with Google Earth , Google Map and MS office.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
