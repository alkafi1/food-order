-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 08:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(43, 'eshan', 'eshan', '1234'),
(49, 'emran', 'emran', '5e96900ef8c7e62564ecbe76cdba6271'),
(50, 'kafi', 'emran', '5e96900ef8c7e62564ecbe76cdba6271'),
(51, 'admin', 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `tittle`, `image_name`, `featured`, `active`) VALUES
(49, 'pizza', 'Food_category_359.jpg', 'Yes', 'Yes'),
(50, 'Burger', 'Food_category_510.jpg', 'Yes', 'Yes'),
(51, 'Momo', 'Food_category_458.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` varchar(11) NOT NULL,
  `active` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `tittle`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(31, 'Pizza M', 'its good and NIce', '300', 'Food_name_512.jpg', 38, 'No', 'No'),
(32, 'Burger', 'its good', '150', 'Food_name_721.jpg', 37, 'Yes', 'Yes'),
(33, 'Burger S', 'its good and NIce', '200', 'Food_name_700.jpg', 37, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` varchar(11) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Burger', '150', 3, '450', '2021-09-26 10:07:14', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(2, 'Burger', '150', 1, '150', '2021-09-26 10:08:06', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(3, 'Vorta(L)', '30', 3, '90', '2021-09-26 02:04:40', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(4, 'Vorta(L)', '30', 1, '30', '2021-09-26 02:06:28', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(5, 'Vorta(L)', '30', 1, '30', '2021-09-26 02:07:05', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(6, 'Vorta(L)', '30', 1, '30', '2021-09-26 02:08:17', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(7, 'Vorta(L)', '30', 1, '30', '2021-09-26 02:09:47', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(8, 'Vorta(L)', '30', 4, '120', '2021-09-26 02:11:57', 'delivered', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,9/A shankar, DhanmondiDhaka'),
(9, 'Vorta(L)', '30', 2, '60', '2021-09-26 02:12:48', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(10, 'Vorta(L)', '30', 4, '120', '2021-09-26 02:13:50', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(11, 'Pizza S', '250', 4, '1000', '2021-09-26 02:23:16', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(12, 'Pizza S', '250', 3, '750', '2021-09-26 02:24:17', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(13, 'Pizza S', '250', 1, '250', '2021-09-26 03:34:35', 'orderd', 'Md.Al kafi', '0', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(14, 'Pizza S', '250', 1, '250', '2021-09-26 03:42:50', 'orderd', 'Md.Al kafi', 'Array', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(15, 'Pizza S', '250', 5, '1250', '2021-09-26 03:46:46', 'orderd', 'Md.Al kafi', '01626359787', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(16, 'Pizza S', '250', 5, '1250', '2021-09-26 03:59:22', 'orderd', 'Md.Al kafi', '01626359787', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(17, 'Burger S', '200', 2, '400', '2021-09-26 04:00:57', 'orderd', 'Md.Al kafi', '9999', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(18, 'Vorta(L)', '30', 3, '90', '2021-09-26 04:05:12', 'delivered', 'Md.Al kafi', '01626359787', 'rupam272@gmail.com', 'Rahman Villa, 112/A,9/A shankar, DhanmondiDhaka'),
(19, 'Burger S', '200', 7, '1400', '2021-09-26 04:06:41', 'orderd', 'Md.Al kafi', '9999', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(20, 'Pizza S', '250', 3, '750', '2021-09-26 05:00:11', 'orderd', 'Md.Al kafi', '9999', 'rupam272@gmail.com', 'Rahman Villa, 112/A,\r\n9/A shankar, Dhanmondi\r\nDhaka'),
(21, 'Pizza S', '250', 2, '500', '2021-09-27 06:16:35', 'delivered', 'Md.Al kafi', '9999', 'rupam272@gmail.com', 'Rahman Villa, 112/A,9/A shankar, DhanmondiDhaka'),
(22, 'Pizza S', '250', 2, '500', '2021-09-27 06:30:17', 'cancelled', 'Md.Al kafi', '9999888', 'rupam272@gmail.com', 'Rahman Villa, 112/A,9/A shankar, DhanmondiDhaka'),
(23, 'Burger S', '200', 4, '800', '2022-03-01 05:45:21', 'orderd', 'gyutuiy', '54764', 'fgvjkgkh@gmail.com', 'dyhdthfth');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
