-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 04:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_account`
--

CREATE TABLE `create_account` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productsss`
--

CREATE TABLE `productsss` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productsss`
--

INSERT INTO `productsss` (`id`, `name`, `price`, `image_url`, `category`, `availability`, `color`, `year`) VALUES
(1, 'Bone Shaker', 150000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1729420768/Bone-Shaker_jvodeu.jpg', 'Truck', 10, 'white', 2012),
(2, 'Twin Mill', 120000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573784/wvgp8imqtj9krs5mz0dv.png', 'Race Car', 15, 'Blue', 2011),
(3, '24 Ours', 130000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573781/wqx3vokvrligc4hhnv22.png', 'Race Car', 8, 'Blue', 2010),
(4, 'Roger dogger', 140000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573781/gojnjfnogb0drzmynccz.png', 'Muscle Car', 5, 'red', 2015),
(5, 'Street Creeper', 100000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573783/zfz3ergorsnct8kyywsd.webp', 'Truck', 20, 'blue', 2010),
(6, 'Shark Kruiser', 120000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573783/i4fxc7s0gi8jancd8zn6.png', 'Race car', 7, 'green', 2018),
(7, 'Turbo Charged', 15000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573783/rze1xmjar6ijgzriz3as.png', 'Race Car', 10, 'Blue', 2017),
(8, 'Deora II', 12000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573782/wmmuhm8514dnsygm233c.png', 'Race Car', 8, 'Blue', 2011),
(9, 'Skull Crasher', 14000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573783/ie2bvnvrghln2ipajnzn.png', 'Truck', 15, 'orange', 2007),
(10, 'Rd-02', 15000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573783/plu3hlrkdtyx0fv0iqd8.png', 'Race Car', 10, 'green', 2013),
(11, 'Power Rocket', 11000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573782/bk7033qlocvizob85pfj.webp', 'Race Car', 16, 'Orange', 2018),
(12, 'Sand Blaster', 10000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573781/dyky0huqwojt0vv4tbs9.png', 'Race Car', 14, 'Blue', 2020),
(13, 'Fast Fish', 15000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573782/ig4eaewxmcum9ljc3ukv.png', 'Race Car', 20, 'Blue', 2021),
(14, 'Cloak & Dagger', 15000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728573781/yfpamgz0x2uoq8yy5ery.webp', 'Race Car', 13, '2018', 2011),
(15, 'Hollowback', 13000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1728578376/Hollowback_haofsq.png', 'Race Car', 12, 'red', 2010),
(17, 'F1 Racer', 150000.00, 'https://res.cloudinary.com/dw44z8kbk/image/upload/v1729413828/F1_Racer_q3knds.png', 'Race Car', 10, 'red', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_sold` int(11) NOT NULL,
  `sale_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `phone_number`, `address`, `password`) VALUES
(1, 'alvarezjohndexter', 'alvarezjohndexter03@gmail.com', '09123456789', 'dsahdu12dsad', '$2y$10$PIMp67XenIDE.rBOSQXxDeFqpFDLLmnKrZFpX9QhAxE/VfNDvTlza'),
(3, 'sadqwe', 'alvarezjohndexter04@gmail.com', '09123456789', 'dsahdu12dsad', '$2y$10$OumMr4rEOhskliAjXVm.K.QWcR2ZzdAglFjUdAR2ituZNwqvjRO3m'),
(4, 'dexter', 'dexter@gmail.com', '09992132139', 'dsahdu12dsad', '$2y$10$ZM0TX0VC7rXEdEPFkiOSoeCHdsWdCJapMHXx/m8uUq0P7lw48JqYa'),
(6, 'johnd', 'alvarezjohndexter05@gmail.com', '09876543213', 'dsahdu12dsadaasd', '$2y$10$LuImPoar2ljMh3F0KOkhs.Nc.jkQ4KWmE1Y6gKoPgmJACUEGlyEYa'),
(7, 'sadqwe', 'alvarezdexterjohn06@gmail.com', '09876543213', 'dsahdu12dsadaasd', '$2y$10$vjQY5SeXHef2yosrPTAid.9rgMUUnD0MPUeMzG7v68GaR3/pI/KKy'),
(8, 'sadqwe', 'alvarezdexterjohn01@gmail.com', '09992132139', 'dsahdu12dsad', '$2y$10$UAbja994U/p.EbdX76KXR.7fgsEOiBLPYEU.nMluSe0.gU0uwBvbm'),
(9, 'john', 'qwerty@gmail.com', '09867452714', 'qweasd1234', '$2y$10$kac5IKAm12XCg/i9/7No.eenTJNvhvNFneCLjOwfw4WM2.WAAKSpC'),
(10, 'yan1', 'yan@gmail.com', '12345678909', 'qwe213ewq32', '$2y$10$.EWcP29.ODXY4fKIKolf1eeyw5OO4dfW3XLsNGBQZvEU0XmMOP6JK'),
(11, 'rold', 'rold@mail.com', '09123874213', 'eh24h43', '$2y$10$Y6eVR18YaTOqLNa5bYAMTO6iBSwKmsZKrGlr9x3svjQsTombnUKqC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productsss`
--
ALTER TABLE `productsss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productsss`
--
ALTER TABLE `productsss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
