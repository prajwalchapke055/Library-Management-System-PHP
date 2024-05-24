-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 06:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbook`
--

CREATE TABLE `addbook` (
  `b_id` int(30) NOT NULL,
  `b_category` varchar(80) NOT NULL,
  `b_author` varchar(80) NOT NULL,
  `b_location_rack` varchar(80) NOT NULL,
  `b_name` varchar(80) NOT NULL,
  `b_isbn` varchar(80) NOT NULL,
  `b_no_of_copy` int(20) NOT NULL,
  `b_added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `cidd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addbook`
--

INSERT INTO `addbook` (`b_id`, `b_category`, `b_author`, `b_location_rack`, `b_name`, `b_isbn`, `b_no_of_copy`, `b_added_on`, `cidd`) VALUES
(11, '3', 'harry Potter', 'A1', 'Php And Mysql', '123456789123', 96, '2023-02-08 22:30:57', 3),
(12, '1', 'Tom Rider', 'A2', 'Programming with C++', '123456789124', 2, '2023-02-08 22:37:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `a_id` int(30) NOT NULL,
  `a_fname` varchar(80) NOT NULL,
  `a_lname` varchar(80) NOT NULL,
  `a_create_on` datetime NOT NULL DEFAULT current_timestamp(),
  `a_udate_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`a_id`, `a_fname`, `a_lname`, `a_create_on`, `a_udate_on`) VALUES
(1, 'harry', 'Potter', '2023-01-31 19:56:58', '2023-01-31 20:17:03'),
(4, 'Tom', 'Rider', '2023-01-31 22:09:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(80) NOT NULL,
  `c_create_dt` datetime NOT NULL DEFAULT current_timestamp(),
  `c_update_dt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `c_create_dt`, `c_update_dt`) VALUES
(1, 'Classics', '2023-02-08 20:34:52', '0000-00-00 00:00:00'),
(3, 'Fantasy', '2023-02-08 20:35:03', '0000-00-00 00:00:00'),
(4, 'Historical fiction', '2023-02-08 20:35:10', '0000-00-00 00:00:00'),
(5, ' Horror', '2023-02-08 20:35:29', '0000-00-00 00:00:00'),
(6, 'Crime', '2023-02-08 22:30:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `i_id` int(50) NOT NULL,
  `book_isbn` varchar(30) NOT NULL,
  `user_mail` varchar(70) NOT NULL,
  `issue_date` date NOT NULL DEFAULT current_timestamp(),
  `return_date` date NOT NULL,
  `book_fine` int(11) NOT NULL,
  `book_issue_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `dt`) VALUES
(1, 'admin', '$2y$10$HLVw.F7gKcVONSzdHR9ShOwJEpzGpnYjs7BiCb9EI27jMAD191YdC', '2023-01-22 17:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `rack_location`
--

CREATE TABLE `rack_location` (
  `r_id` int(30) NOT NULL,
  `r_name` varchar(80) NOT NULL,
  `r_create_on` datetime NOT NULL DEFAULT current_timestamp(),
  `r_update_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rack_location`
--

INSERT INTO `rack_location` (`r_id`, `r_name`, `r_create_on`, `r_update_on`) VALUES
(1, 'A1', '2023-01-31 20:26:53', '2023-01-31 20:35:10'),
(3, 'A2', '2023-01-31 20:36:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `s_id` int(11) NOT NULL,
  `fine` int(11) NOT NULL,
  `maxbook` int(11) NOT NULL,
  `book_max_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`s_id`, `fine`, `maxbook`, `book_max_date`) VALUES
(1, 20, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `uid` int(50) NOT NULL,
  `ufname` varchar(30) NOT NULL,
  `ulname` varchar(30) NOT NULL,
  `ucontact` varchar(10) NOT NULL,
  `uemail` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ugender` varchar(10) NOT NULL,
  `udob` date NOT NULL,
  `uregdate` datetime NOT NULL DEFAULT current_timestamp(),
  `uestatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`uid`, `ufname`, `ulname`, `ucontact`, `uemail`, `password`, `ugender`, `udob`, `uregdate`, `uestatus`) VALUES
(1, 'Govind', 'Ambade', '9960294694', 'govindambade28@gmail.com', '$2y$10$udYYrYuQXSamrgSpzfe3ZeZBVjA7Rrvxbnj.bxXmSxhTbcQ2/MAAG', 'Male', '2001-05-28', '2023-01-28 20:00:02', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbook`
--
ALTER TABLE `addbook`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `b_isbn` (`b_isbn`),
  ADD KEY `relation_cascade` (`cidd`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `rack_location`
--
ALTER TABLE `rack_location`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `Unique_email` (`uemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbook`
--
ALTER TABLE `addbook`
  MODIFY `b_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `a_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `issuebook`
--
ALTER TABLE `issuebook`
  MODIFY `i_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rack_location`
--
ALTER TABLE `rack_location`
  MODIFY `r_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addbook`
--
ALTER TABLE `addbook`
  ADD CONSTRAINT `relation_cascade` FOREIGN KEY (`cidd`) REFERENCES `category` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
