-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 06:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chariti`
--

-- --------------------------------------------------------

--
-- Table structure for table `ngo_details`
--

CREATE TABLE `ngo_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ngo_details`
--

INSERT INTO `ngo_details` (`id`, `user_id`, `full_name`, `phone_number`, `address`, `profile_image`, `updated_at`) VALUES
(2, 14, 'jdc', '03220230263', 'house no 148', '', '2025-01-22 16:47:48'),
(3, 15, 'jdc', '03220230263', 'house no 148', 'uploads/uni logo.png', '2025-01-22 16:50:19'),
(4, 20, 'jdc', '03220230263', 'house no 148', 'uploads/uni logo.png', '2025-01-22 20:33:03'),
(5, 21, 'hanif', '03220230263', 'house no 148', 'uploads/H1.jpg', '2025-01-22 20:51:56'),
(6, 23, 'hanif', '03220230263', 'house no 148', 'uploads/H1.jpg', '2025-01-22 20:54:11'),
(7, 24, 'jdc', '03220230263', 'house no 148', 'uploads/layers-of-the-human-skin.jpg', '2025-01-22 21:04:49'),
(8, 25, 'hanif', '03220230263', 'house no 148', 'uploads/layers-of-the-human-skin.jpg', '2025-01-22 21:09:00'),
(9, 26, 'hanif', '03220230263', 'house no 148', 'uploads/layers-of-the-human-skin.jpg', '2025-01-22 22:45:44'),
(10, 27, 'hanif', '03220230263', 'house no 148', 'uploads/layers-of-the-human-skin (1).jpg', '2025-01-22 22:54:29'),
(11, 31, 'jdc', '03220230263', 'house no 148', 'uploads/uni logo.png', '2025-01-23 00:20:32'),
(12, 34, 'hanif', '03220230263', 'house no 148', 'uploads/uni logo.png', '2025-01-23 00:23:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ngo_details`
--
ALTER TABLE `ngo_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ngo_details`
--
ALTER TABLE `ngo_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ngo_details`
--
ALTER TABLE `ngo_details`
  ADD CONSTRAINT `ngo_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login_details` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
