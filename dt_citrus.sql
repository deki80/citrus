-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2019 at 11:06 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-8+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dt_citrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_text` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_approved` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 - not approved, 2 - approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_text`, `comment_name`, `comment_email`, `comment_date`, `comment_approved`) VALUES
(7, 'Very good company and fresh products!', 'Dejan', 'dejan.tomic@yahoo.com', '2019-11-10 21:21:31', '2'),
(8, 'Creating some comment...', 'John', 'john@doe.com', '2019-11-10 21:23:50', '1'),
(9, 'Just another comment...', 'Joana', 'joana@gmail.com', '2019-11-10 21:24:43', '1'),
(10, 'Comments for testing purpose', 'Another', 'user@test.com', '2019-11-10 21:44:17', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_image`, `product_title`, `product_description`) VALUES
(1, 'lemon.jpg', 'Lemon', 'The lemon, Citrus limon (L.) Osbeck, is a species of small evergreen tree in the flowering plant family Rutaceae.'),
(2, 'orange.jpg', 'Orange', 'The orange is the fruit of the citrus species Citrus × sinensis in the family Rutaceae.'),
(3, 'clementine.jpg', 'Clementine', 'A clementine (Citrus × clementina) or easy peeler (British English) is a tangor, a citrus fruit hybrid.'),
(4, 'lime.jpg', 'Desert lime', 'Early settlers consumed the fruit and retained the trees when clearing for agriculture. '),
(5, 'grapefruit.jpg', 'Grapefruit', 'The grapefruit (Citrus × paradisi) is a subtropical citrus tree known for its relatively large sour.'),
(6, 'mandarine.jpg', 'Mandarine', 'Mandarins are smaller and oblate, rather than spherical, like the common oranges (which are a mandarin hybrid)'),
(7, 'sweetie.jpg', 'Sweetie', 'An oroblanco, or sweetie (Citrus grandis Osbeck) is a sweet seedless citrus hybrid fruit similar to grapefruit'),
(8, 'tangerine.jpg', 'Tangerine', 'Tangerines are smaller and less rounded than common oranges. The taste is considered less sour than that of an orange.'),
(9, 'sudachi.jpg', 'Sudachi', 'Sudachi is a small, round, green citrus fruit of Japanese origin that is a specialty in Japan.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'dejan@admin.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
