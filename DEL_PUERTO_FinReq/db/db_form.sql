-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 09:10 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int NOT NULL,
  `userType` int(2) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_num` varchar(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `pwd` varchar(80) NOT NULL,
  `repeatpwd` varchar(80) NOT NULL,
  `birthdate` date NOT NULL,
  `stat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userType`, `firstName`, `lastName`, `email`, `phone_num`, `gender`, `pwd`, `repeatpwd`, `birthdate`, `stat`) VALUES
(1, 1,'admin', 'admin', 'admin@admin.com', '09779999999', 'Male', '$2y$10$.mGQsfp1atGeBXivzxfzMu81MifqQRA2uHiQmGxodOsqP8Ln4l2r2', 'admin', '2001-02-24', 'Single'),
(2, 0,'user', 'user', 'user@user.com', '09774012924', 'Female', '$2y$10$dtp6h.qi1Iqof3MrsGHPN.hAhKnCkJIkRjU4zBnHjSs15nq.8Jmju', 'user', '2001-02-24', 'Single'),
(3, 0,'Dominic', 'Del Puerto', 'dmncdlprt@gmail.com', '09774347454', 'Male', '$2y$10$hKJHbckW89OrYlRR8ZGbkO1Kp2CYaXEHqn39ztwrOVE2ycYY.EXGi', 'dominic', '2001-02-24', 'Single');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;