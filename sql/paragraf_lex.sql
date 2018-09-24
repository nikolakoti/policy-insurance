-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2018 at 05:52 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paragraf_lex`
--

-- --------------------------------------------------------

--
-- Table structure for table `insurers`
--

CREATE TABLE `insurers` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `policy_holder_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurers`
--

INSERT INTO `insurers` (`id`, `name`, `surname`, `email`, `birthday`, `policy_holder_id`, `created_at`) VALUES
(10, 'Marija', 'Milovanovic', 'm@test.com', '1985-07-12', 4, NULL),
(11, 'Milan', 'Milovanovic', 'mm@test.com', '1987-09-14', 4, NULL),
(12, 'Timothy', 'Dalton', 'td@test.com', '1946-03-21', 5, '2018-09-22 22:00:00'),
(13, 'Sean', 'Connery', 'sc@gmail.com', '1930-08-25', 5, '2018-09-22 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `policy_holders`
--

CREATE TABLE `policy_holders` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `policy` varchar(20) NOT NULL,
  `departure_date` date NOT NULL,
  `return_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policy_holders`
--

INSERT INTO `policy_holders` (`id`, `name`, `surname`, `email`, `phone`, `policy`, `departure_date`, `return_date`, `created_at`, `updated_at`) VALUES
(4, 'Milos', 'Milovanovic', 'mmilovanovic@test.com', '065123456', 'group', '2018-09-23', '2018-09-30', '2018-09-23 09:35:37', NULL),
(5, 'Pierce', 'Brosnan', 'pb@yahoo.com', '0441254678', 'group', '2018-09-28', '2018-09-30', '2018-09-23 10:54:04', NULL),
(6, 'Daniel', 'Craig', 'danielc@gmail.com', '+445789123', 'individual', '2018-10-02', '2018-10-16', '2018-09-23 11:10:07', NULL),
(7, 'Michael', 'Jackson', 'mj@gmail.com', '+4456789123', 'individual', '2018-09-28', '2018-10-18', '2018-09-23 17:35:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insurers`
--
ALTER TABLE `insurers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_holders`
--
ALTER TABLE `policy_holders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insurers`
--
ALTER TABLE `insurers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `policy_holders`
--
ALTER TABLE `policy_holders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
