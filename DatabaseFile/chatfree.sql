-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 07:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatfree`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_comment`
--

CREATE TABLE `user_comment` (
  `post_id` text NOT NULL,
  `user_id` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` int(11) NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `pwd` text NOT NULL,
  `birth` text NOT NULL,
  `gender` text NOT NULL,
  `profic` text NOT NULL,
  `country` text NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `fname`, `lname`, `email`, `pwd`, `birth`, `gender`, `profic`, `country`, `time`) VALUES
(1, 58877, 0, 'hasan', 'zahidhasan6112@gmail.com', '12345', '2022-07-15', 'Gender', '58877', 'Country', '2022-07-30'),
(2, 0, 0, 'dsfa', 'zahidhasan8061@gmail.com', '12345', '2022-08-03', 'Male', 'sahin', 'Pakistan', '2022-07-30'),
(3, 0, 0, 'gdas', 'avishekreve@gmail.com', '12345', '2022-07-20', 'Male', 'sahin', 'India', '2022-07-30'),
(4, 0, 0, 'gdas', 'your.next.bf.421@gmail.com', '12345', '2022-07-13', 'Male', 'sahin', 'USA', '2022-07-30'),
(6, 197, 0, 'fdas', 'a@gmail.com', '12345', '2022-07-05', 'Male', 'sahin', 'Bangladesh', '2022-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `user_like`
--

CREATE TABLE `user_like` (
  `id` int(11) NOT NULL,
  `post_id` text NOT NULL,
  `user_id` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `propic` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_like`
--

INSERT INTO `user_like` (`id`, `post_id`, `user_id`, `fname`, `lname`, `propic`, `time`) VALUES
(2, '2', '0', '0', 'dsfa', 'sahin', '2022-07-31 05:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_messege`
--

CREATE TABLE `user_messege` (
  `fid` text NOT NULL,
  `tid` text NOT NULL,
  `from_id` text NOT NULL,
  `to_id` text NOT NULL,
  `messege_sub` text NOT NULL,
  `messege` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_messege`
--

INSERT INTO `user_messege` (`fid`, `tid`, `from_id`, `to_id`, `messege_sub`, `messege`) VALUES
('2', '1', '0', '58877', '', 'hi'),
('1', '2', '58877', '0', '', 'fdasfdsa');

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `post_id` int(11) NOT NULL,
  `id` text NOT NULL,
  `user_id` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `post` text NOT NULL,
  `post_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`post_id`, `id`, `user_id`, `fname`, `lname`, `post`, `post_time`) VALUES
(6, '2', '0', '0', 'dsfa', 'dfas', '2022-07-30 22:19:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
