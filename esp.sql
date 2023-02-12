-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 09:06 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `engineer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `service_price` double NOT NULL,
  `paid_price` int(11) DEFAULT NULL,
  `detail` varchar(4000) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `state` varchar(50) NOT NULL DEFAULT 'Draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `engineer_id`, `service_id`, `customer_id`, `card_number`, `service_price`, `paid_price`, `detail`, `booking_date`, `state`) VALUES
(1, 1, 1, 6, NULL, 80, NULL, 'asdfg', '2023-01-29', 'ready'),
(2, 4, 1, 8, NULL, 80, NULL, 'sdfghjk', '2023-02-10', 'working');

-- --------------------------------------------------------

--
-- Table structure for table `booking_note`
--

CREATE TABLE `booking_note` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `engineer_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_note`
--

INSERT INTO `booking_note` (`id`, `booking_id`, `engineer_id`, `customer_id`, `note`) VALUES
(1, 2, NULL, 8, 'Hello'),
(2, 2, NULL, 8, 'How Do You Do ?'),
(3, 2, 1, NULL, 'Fine thanks'),
(4, 2, NULL, 8, 'asdfg'),
(5, 2, NULL, 8, 'asdfgh'),
(6, 2, NULL, 8, 'Hi i want to Travel To Egypt'),
(7, 2, NULL, 8, 'hhhhh Not in Gardien');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`) VALUES
(1, 'test', 'customer', '', 'customer@gmail.com', 'customer'),
(2, 'maryam', 'maryam', '', 'maryam@gmail.com', '123'),
(3, 'asdf', 'asd', '', 'as@gmial.com', 'asd'),
(4, 'asdf', 'as', '', 'as@gmail.oxs', 'as'),
(5, 'asd', 'asd', '', 'asd@gmail.com', 'asd'),
(6, 'e', 'e', '098765432', 'e@gmail.com', 'e'),
(7, 'qqq', 'qqq', '12345678', 'qqq@gmail.com', 'qqq'),
(8, 'o', 'o', '2345678', 'o@gmail.com', 'o'),
(9, 'wala', 'wala', '0987654321', 'wala@gmail.com', 'wala'),
(11, 'rr', 'rr', 'rr@gmail.com', 'rr', '778899002'),
(12, 'rr', 'rr', 'rr@gmail.com', 'rr', '778899002'),
(13, 'rr', 'rr', 'rr@gmail.com', 'rr', '778899002'),
(15, 'qqqq', 'qqqq', '0543214322', 'qqqq@gmail.com', 'qqqq');

-- --------------------------------------------------------

--
-- Table structure for table `engineer`
--

CREATE TABLE `engineer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `specialty` varchar(255) NOT NULL,
  `date_of_graduate` date NOT NULL,
  `experience_years` varchar(50) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `engineer`
--

INSERT INTO `engineer` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `city`, `specialty`, `date_of_graduate`, `experience_years`, `cv`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `state`) VALUES
(1, 'ftoom', 'ftoom', '', 'ftoom@gmail.com', '123', NULL, 'Building Engineer', '2000-06-13', '', 'BFD_ESP.pdf', 'h1.jpg', 'h2.jpg', 'h3.jpg', 'h4.jpg', 'h1.jpg', 'h2.jpg', ''),
(2, 'Naser', 'Naser', '', 'Naser@gmail.com', '123', NULL, 'Sevil Engineer', '2000-06-13', '', '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(3, 'asdfg', 'asdfg', '08765544333', 'asdfg@gmail.com', 'asdfg', NULL, 'asdfg', '2023-01-29', '', '3 Classes and other Concepts (1).pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'accept'),
(4, 'eng', 'eng', '098765432', 'eng@gmail.com', 'eng', NULL, 'Engineering Blaconfica', '1998-06-13', '', 'CS406_All_Lectues (1).pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'accept'),
(5, 'ww', 'ww', 'ww', 'ww@gmail.com', 'ww', NULL, 'ww', '2023-02-05', '', 'Lab 4.pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'request'),
(6, 'bb', 'bb', 'bb', 'bb@gmail.com', 'bb', NULL, 'bb', '2023-02-06', '3 years', '1.jpg', '1.jpg', '', '', '', '', '', 'request');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `engineer_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `engineer_id`, `customer_id`, `rate`) VALUES
(1, 1, 1, 23),
(2, 1, 2, 11),
(3, 1, 1, 100),
(4, 2, 2, 97),
(5, 1, 8, 72);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `engineer_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `detail` varchar(4000) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `engineer_id`, `service_type_id`, `name`, `price`, `detail`, `image`) VALUES
(1, 1, 1, 'Drawing Building House', 70, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam numquam excepturi, magni aperiam dolorem consectetur ratione blanditiis repudiandae neque inventore pariatur impedit quis eos illo reprehenderit velit et sed ea?', '1.jpg'),
(2, 2, 3, 'New Service', 40, 'sdfghjadsfgh', 'i.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`id`, `name`, `detail`) VALUES
(1, 'General Service', ''),
(2, 'Drawing Diagrams', ''),
(3, 'Full Study', 'You can Write Any Description Here'),
(4, 'Building With Specification', 'asdfg adfgasfdg asdfasf');

-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

CREATE TABLE `webuser` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`id`, `email`, `usertype`) VALUES
(1, 'admin@gmail.com', 'a'),
(2, 'customer@gmail.com', 'c'),
(3, 'maryam@gmail.com', 'c'),
(4, 'ftoom@gmail.com', 'e'),
(5, 'as@gmial.com', 'c'),
(6, 'as@gmial.com', 'c'),
(7, 'as@gmial.com', 'c'),
(8, 'as@gmail.oxs', 'c'),
(9, 'asd@gmail.com', 'c'),
(10, 'asdfg@gmail.com', 'e'),
(11, 'e@gmail.com', 'c'),
(12, 'qqq@gmail.com', 'c'),
(13, 'eng@gmail.com', 'e'),
(14, 'o@gmail.com', 'c'),
(15, 'ww@gmail.com', 'e'),
(16, 'rr@gmail.com', 'c'),
(17, 'rr@gmail.com', 'c'),
(18, 'rr@gmail.com', 'c'),
(20, 'qqqq@gmail.com', 'c'),
(21, 'jj@gmail.com', 'e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_booking_engineer` (`engineer_id`),
  ADD KEY `fk_booking_customer` (`customer_id`),
  ADD KEY `fk_booking_service` (`service_id`);

--
-- Indexes for table `booking_note`
--
ALTER TABLE `booking_note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_booking_note_booking` (`booking_id`),
  ADD KEY `fk_booking_note_customer` (`customer_id`),
  ADD KEY `fk_booking_note_engineer` (`engineer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineer`
--
ALTER TABLE `engineer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rating_engineer` (`engineer_id`),
  ADD KEY `fk_rating_customer` (`customer_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_service_service_type` (`service_type_id`),
  ADD KEY `fk_service_engineer` (`engineer_id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webuser`
--
ALTER TABLE `webuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_note`
--
ALTER TABLE `booking_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `engineer`
--
ALTER TABLE `engineer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `webuser`
--
ALTER TABLE `webuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_booking_engineer` FOREIGN KEY (`engineer_id`) REFERENCES `engineer` (`id`),
  ADD CONSTRAINT `fk_booking_service` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);

--
-- Constraints for table `booking_note`
--
ALTER TABLE `booking_note`
  ADD CONSTRAINT `fk_booking_note_booking` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`),
  ADD CONSTRAINT `fk_booking_note_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_booking_note_engineer` FOREIGN KEY (`engineer_id`) REFERENCES `engineer` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_rating_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_rating_engineer` FOREIGN KEY (`engineer_id`) REFERENCES `engineer` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_service_engineer` FOREIGN KEY (`engineer_id`) REFERENCES `engineer` (`id`),
  ADD CONSTRAINT `fk_service_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `service_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
