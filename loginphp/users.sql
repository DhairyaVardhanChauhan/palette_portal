-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2023 at 07:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(8, 'MYNAMEISDHRUV', '$2y$10$4Bopg9p6hx5z6XJZZWQIGu3QbiUYdK1E7OS8d010W3PAvapq54H3.', '2023-04-11 22:50:17'),
(9, 'Devansh', '$2y$10$DWb5DANwWKBRdzkCXVFBU.pdnBc7nBCLIxz4UriohvtkcK.aO9zp.', '2023-04-11 23:30:25'),
(10, 'Artist1', '$2y$10$5abeI/I4zTLS9ki7377JRuEctsmrrVlzp45f/j6MELourjAssQSve', '2023-04-11 23:57:22'),
(11, 'Dhruv123', '$2y$10$GBoat4lgKshWqCHtbM1NbeNYkkC.6m3A1w9cqogYbRHX2cVLXQLBS', '2023-04-12 09:35:38'),
(12, 'DeepanshuJain', '$2y$10$NkX4s1XA3wi6I.MTJl.G..IFIa7Ms0WNmFL.eebu9ujGt5VSDBDpO', '2023-04-14 18:26:40'),
(13, 'Dhruv1', '$2y$10$2khY8YDfNaiAwAJgooSou.rFBnEUMtAlFmk8AUCbTVCod2lnvKvr.', '2023-04-15 10:42:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
