-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 08:11 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamproject`
--
CREATE DATABASE IF NOT EXISTS `teamproject` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `teamproject`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `street_num` int(11) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `profile_id`, `street_num`, `street_name`, `postal_code`, `city`, `province`, `country`) VALUES
(1, 1, 1122, 'adsfdfdg', 'sfsfs', 'sdsadad', 'adada', 'adadad'),
(2, 2, 1234, 'Ave Papineau', 'H4H2S9', 'Montreal', 'Quebec', 'Canada'),
(3, 3, 1122, 'adsfdfdg', 'sfsfs', 'sdsadad', 'adada', 'adadad');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `favorite_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`favorite_id`, `item_id`, `profile_id`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_pic` varchar(50) NOT NULL,
  `item_desc` text NOT NULL,
  `item_price` double NOT NULL,
  `posted_date` date NOT NULL DEFAULT current_timestamp(),
  `visits` int(11) NOT NULL,
  `status` enum('available','unavailable') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `profile_id`, `item_name`, `item_pic`, `item_desc`, `item_price`, `posted_date`, `visits`, `status`) VALUES
(1, 1, 'Actual Crepes', '/uploads/61b0161036be9.jpg', 'yummy', 2.99, '2021-12-07', 0, 'unavailable'),
(2, 1, 'macaroons', '/uploads/61b016347e170.jpg', 'yay', 3.24, '2021-12-07', 0, 'unavailable'),
(3, 1, 'cake', '/uploads/61b0164713dc1.jpg', 'wert', 34, '2021-12-07', 0, 'available'),
(4, 1, 'Jam scones', '/uploads/61b0165f8d879.png', 'wow', 3.2, '2021-12-07', 0, 'available'),
(5, 1, 'banana crepes', '/uploads/61b0168483479.jpg', 'not a scam', 300, '2021-12-07', 0, 'unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `read_status` enum('unread','read','reread') NOT NULL DEFAULT 'unread',
  `private_status` enum('public','private') NOT NULL DEFAULT 'public',
  `time_sent` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_num` varchar(10) NOT NULL,
  `profile_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `profile_name`, `email`, `phone_num`, `profile_pic`) VALUES
(1, 1, 'Princess', 'mariaramlochan@hotmail.com', '5146600819', '/uploads/61b4f3b9de142.jpg'),
(2, 2, 'Bear', 'bear@gmail.com', '2147483647', '/uploads/61b4f40f96ef0.jpg'),
(3, 3, 'Dovey', 'dove@gmail.com', '5149998888', '/uploads/61b4f6232b71f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(72) NOT NULL,
  `secret_key` varchar(16) NOT NULL,
  `last_login_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `secret_key`, `last_login_timestamp`) VALUES
(1, 'bunny', '$2y$10$RWvyAdk1X3Hzn08J6VIspe5uP8xgF4jcPLdszpS83YhjTGcy6nAs6', '', '2021-12-11 23:48:41'),
(2, 'bear', '$2y$10$9w5kS2uMWKqzvRkAH4SYLeIL3ZufOc3/ONQZyDHuycIq.rHnWuoZm', '', '2021-12-12 09:55:05'),
(3, 'dove', '$2y$10$JCRVBRgQsJGXYx6C6bXhZOkaxiEJa4tG6ziNkmJoiVqry2QAlz9ne', '', '2021-12-12 10:02:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `profile_address` (`profile_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `item_favorite` (`item_id`),
  ADD KEY `profile_favorite` (`profile_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `profile_item` (`profile_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_sender` (`sender`),
  ADD KEY `message_receiver` (`receiver`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_profile` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `profile_address` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `item_favorite` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `profile_favorite` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `profile_item` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_receiver` FOREIGN KEY (`receiver`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `message_sender` FOREIGN KEY (`sender`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
