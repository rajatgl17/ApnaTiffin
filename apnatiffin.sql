-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2016 at 04:14 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apnatiffin`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
`pk_address_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `fk_region_id` int(11) NOT NULL,
  `fk_city_id` int(11) NOT NULL,
  `fk_country_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
`pk_user_id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fk_user_type_id` tinyint(1) DEFAULT '2',
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`pk_user_id`, `username`, `email`, `password`, `fk_user_type_id`, `status`) VALUES
(1, 'Demo admin', 'demoadmin@apnatiffin.in', '$2y$10$xoCw45I1Q/LXvr0PzHuASO64kvuvB8bU0xrvu0DJ3PMigYtIYmFKa', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('67d7c3bbfb699bcfd19e725f6f7faa5b087ed9f5', '::1', 1469449583, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393434393538333b),
('74bb172cba69c73c44f44ef2c8f433dac8ed4810', '::1', 1469541919, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393534313931393b69735f6c6f676765645f696e7c623a313b757365725f64657461696c737c613a353a7b733a323a226964223b733a323a223130223b733a343a226e616d65223b733a393a2244656d6f2075736572223b733a353a22656d61696c223b733a32323a2264656d6f757365724061706e6174696666696e2e696e223b733a363a226d6f62696c65223b733a31303a2239393939393939393939223b733a363a2277616c6c6574223b733a313a2230223b7d),
('82034092bbaba2d1e8ba6d494364cd8455875613', '::1', 1469542241, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393534323234313b69735f6c6f676765645f696e7c623a313b757365725f64657461696c737c613a353a7b733a323a226964223b733a323a223130223b733a343a226e616d65223b733a393a2244656d6f2075736572223b733a353a22656d61696c223b733a32323a2264656d6f757365724061706e6174696666696e2e696e223b733a363a226d6f62696c65223b733a31303a2239393939393939393939223b733a363a2277616c6c6574223b733a313a2230223b7d),
('d45c3a038a603040ab90f0ac4ac4d028ab1d4cee', '::1', 1469541844, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393534313538373b69735f6c6f676765645f696e7c623a313b757365725f64657461696c737c613a353a7b733a323a226964223b733a323a223130223b733a343a226e616d65223b733a393a2244656d6f2075736572223b733a353a22656d61696c223b733a32323a2264656d6f757365724061706e6174696666696e2e696e223b733a363a226d6f62696c65223b733a31303a2239393939393939393939223b733a363a2277616c6c6574223b733a313a2230223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions_admin`
--

CREATE TABLE IF NOT EXISTS `ci_sessions_admin` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions_admin`
--

INSERT INTO `ci_sessions_admin` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('43966496000d05253b5a1d42cc574b3916b0b200', '::1', 1469542029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393534313933303b6c6f676765645f696e7c623a313b757365726e616d657c733a31303a2244656d6f2061646d696e223b656d61696c7c733a32333a2264656d6f61646d696e4061706e6174696666696e2e696e223b757365725f69647c733a313a2231223b757365725f747970657c733a313a2231223b),
('6c1477a6ae76838c2e3381b578d880a9fe184a4f', '::1', 1469542294, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393534323239343b6c6f676765645f696e7c623a313b757365726e616d657c733a31303a2244656d6f2061646d696e223b656d61696c7c733a32333a2264656d6f61646d696e4061706e6174696666696e2e696e223b757365725f69647c733a313a2231223b757365725f747970657c733a313a2231223b);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
`pk_contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE IF NOT EXISTS `forgot_password` (
`pk_fp_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `create_time` bigint(20) NOT NULL,
  `expire_time` bigint(20) NOT NULL,
  `key` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_banners`
--

CREATE TABLE IF NOT EXISTS `mst_banners` (
`pk_banner_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_banners`
--

INSERT INTO `mst_banners` (`pk_banner_id`, `path`, `status`) VALUES
(1, 'slide1-img.jpg', 1),
(2, 'slide2-img.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_cities`
--

CREATE TABLE IF NOT EXISTS `mst_cities` (
`pk_city_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_cities`
--

INSERT INTO `mst_cities` (`pk_city_id`, `city`, `status`) VALUES
(1, 'Jaipur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_constants`
--

CREATE TABLE IF NOT EXISTS `mst_constants` (
`pk_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_constants`
--

INSERT INTO `mst_constants` (`pk_id`, `name`, `value`) VALUES
(1, 'CONTACT_NUMBER', '+91-XXXXX-XXXXX or +91-XXXXX-XXXXX'),
(2, 'IS_DISCOUNT_AVAILABLE', '1'),
(3, 'DISCOUNT', '10'),
(4, 'LUNCH_BEFORE', '10:00 AM'),
(5, 'DINNER_BEFORE', '06:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `mst_countries`
--

CREATE TABLE IF NOT EXISTS `mst_countries` (
`pk_country_id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_countries`
--

INSERT INTO `mst_countries` (`pk_country_id`, `country`, `status`) VALUES
(1, 'India', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_dinner_time`
--

CREATE TABLE IF NOT EXISTS `mst_dinner_time` (
`pk_dinner_time_id` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_dinner_time`
--

INSERT INTO `mst_dinner_time` (`pk_dinner_time_id`, `time`, `status`) VALUES
(2, '07:15 PM', 1),
(3, '07:30 PM', 1),
(4, '08:00 PM', 1),
(5, '08:15 PM', 1),
(6, '08:30 PM', 1),
(7, '08:45 PM', 1),
(8, '09:00 PM', 1),
(9, '07:00 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_food_menu`
--

CREATE TABLE IF NOT EXISTS `mst_food_menu` (
`pk_food_menu_id` int(11) NOT NULL,
  `fk_tiffin_id` int(11) NOT NULL,
  `mon_l` varchar(255) DEFAULT NULL,
  `tue_l` varchar(255) DEFAULT NULL,
  `wed_l` varchar(255) DEFAULT NULL,
  `thu_l` varchar(255) DEFAULT NULL,
  `fri_l` varchar(255) DEFAULT NULL,
  `sat_l` varchar(255) DEFAULT NULL,
  `sun_l` varchar(255) DEFAULT NULL,
  `mon_d` varchar(255) DEFAULT NULL,
  `tue_d` varchar(255) DEFAULT NULL,
  `wed_d` varchar(255) DEFAULT NULL,
  `thu_d` varchar(255) DEFAULT NULL,
  `fri_d` varchar(255) DEFAULT NULL,
  `sat_d` varchar(255) DEFAULT NULL,
  `sun_d` varchar(255) DEFAULT NULL,
  `mon` varchar(255) DEFAULT NULL,
  `tue` varchar(255) DEFAULT NULL,
  `wed` varchar(255) DEFAULT NULL,
  `thu` varchar(255) DEFAULT NULL,
  `fri` varchar(255) DEFAULT NULL,
  `sat` varchar(255) DEFAULT NULL,
  `sun` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_food_menu`
--

INSERT INTO `mst_food_menu` (`pk_food_menu_id`, `fk_tiffin_id`, `mon_l`, `tue_l`, `wed_l`, `thu_l`, `fri_l`, `sat_l`, `sun_l`, `mon_d`, `tue_d`, `wed_d`, `thu_d`, `fri_d`, `sat_d`, `sun_d`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`) VALUES
(3, 7, 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', 'Daal, Vegetable, Rice, Roti and Salad', '6cb2949bf00f32f80266bfcdda130c19.jpg', '6bb32359f77bc2d429d1932fe221e4f5.jpg', '0e533b315a3d6725e3fa4833a8fdf8ce.jpg', '07c9bb17355df199af1fad7274430409.jpg', 'e73c66700ff4f888939264b4191a239f.jpg', '7ac8f4203d3394996b791704dc43d0c6.jpg', '2ede0c9fc354b93f8770208c2d7f2995.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mst_lunch_time`
--

CREATE TABLE IF NOT EXISTS `mst_lunch_time` (
`pk_lunch_time_id` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_lunch_time`
--

INSERT INTO `mst_lunch_time` (`pk_lunch_time_id`, `time`, `status`) VALUES
(1, '11:00 AM', 1),
(2, '11:15 AM', 1),
(3, '11:30 AM', 1),
(4, '12:00 AM', 1),
(5, '12:15 PM', 1),
(6, '01:00 PM', 0),
(7, '02:00 PM', 0),
(8, '01:00 PM', 0),
(9, '01:00 PM', 1),
(10, '02:00 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_regions`
--

CREATE TABLE IF NOT EXISTS `mst_regions` (
`pk_region_id` int(11) NOT NULL,
  `region` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_regions`
--

INSERT INTO `mst_regions` (`pk_region_id`, `region`, `status`) VALUES
(1, 'Jagatpura', 1),
(3, 'Pratap Nagar', 1),
(4, 'Tonk Phatak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_tiffins`
--

CREATE TABLE IF NOT EXISTS `mst_tiffins` (
`pk_tiffin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `is_menu_available` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_tiffins`
--

INSERT INTO `mst_tiffins` (`pk_tiffin_id`, `name`, `price`, `is_menu_available`, `status`) VALUES
(7, 'Ordinary Meal', 49, 1, 1),
(8, 'Special Meal', 79, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_user_type`
--

CREATE TABLE IF NOT EXISTS `mst_user_type` (
`pk_user_type_id` int(11) NOT NULL,
  `alias` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user_type`
--

INSERT INTO `mst_user_type` (`pk_user_type_id`, `alias`) VALUES
(1, 'Superadmin'),
(2, 'Delivery Boy');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`pk_order_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `order_for` tinyint(1) NOT NULL DEFAULT '1',
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `lunch_address` int(11) NOT NULL,
  `dinner_address` int(11) NOT NULL,
  `lunch_time` int(11) NOT NULL,
  `dinner_time` int(11) NOT NULL,
  `meal_type` int(11) NOT NULL,
  `meals` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `create_time` bigint(20) NOT NULL,
  `order_status` int(1) NOT NULL DEFAULT '1',
  `uniqid` varchar(255) NOT NULL,
  `is_checked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`pk_user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `wallet` int(11) NOT NULL DEFAULT '0',
  `is_activated` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`pk_user_id`, `name`, `email`, `mobile`, `password`, `wallet`, `is_activated`, `create_time`) VALUES
(10, 'Demo user', 'demouser@apnatiffin.in', '9999999999', '$2y$10$u9/MnOZJBg.UCXs6AYyyPO9RoV.uIs7UA4BT3LJT3Kj.ZwlCbskce', 0, 1, 1469541824);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
 ADD PRIMARY KEY (`pk_address_id`), ADD KEY `region` (`fk_region_id`,`fk_city_id`,`fk_country_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
 ADD PRIMARY KEY (`pk_user_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `ci_sessions_admin`
--
ALTER TABLE `ci_sessions_admin`
 ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
 ADD PRIMARY KEY (`pk_contact_id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
 ADD PRIMARY KEY (`pk_fp_id`);

--
-- Indexes for table `mst_banners`
--
ALTER TABLE `mst_banners`
 ADD PRIMARY KEY (`pk_banner_id`);

--
-- Indexes for table `mst_cities`
--
ALTER TABLE `mst_cities`
 ADD PRIMARY KEY (`pk_city_id`);

--
-- Indexes for table `mst_constants`
--
ALTER TABLE `mst_constants`
 ADD PRIMARY KEY (`pk_id`);

--
-- Indexes for table `mst_countries`
--
ALTER TABLE `mst_countries`
 ADD PRIMARY KEY (`pk_country_id`);

--
-- Indexes for table `mst_dinner_time`
--
ALTER TABLE `mst_dinner_time`
 ADD PRIMARY KEY (`pk_dinner_time_id`);

--
-- Indexes for table `mst_food_menu`
--
ALTER TABLE `mst_food_menu`
 ADD PRIMARY KEY (`pk_food_menu_id`);

--
-- Indexes for table `mst_lunch_time`
--
ALTER TABLE `mst_lunch_time`
 ADD PRIMARY KEY (`pk_lunch_time_id`);

--
-- Indexes for table `mst_regions`
--
ALTER TABLE `mst_regions`
 ADD PRIMARY KEY (`pk_region_id`);

--
-- Indexes for table `mst_tiffins`
--
ALTER TABLE `mst_tiffins`
 ADD PRIMARY KEY (`pk_tiffin_id`);

--
-- Indexes for table `mst_user_type`
--
ALTER TABLE `mst_user_type`
 ADD PRIMARY KEY (`pk_user_type_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`pk_order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`pk_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
MODIFY `pk_address_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
MODIFY `pk_user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
MODIFY `pk_contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
MODIFY `pk_fp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_banners`
--
ALTER TABLE `mst_banners`
MODIFY `pk_banner_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mst_cities`
--
ALTER TABLE `mst_cities`
MODIFY `pk_city_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_constants`
--
ALTER TABLE `mst_constants`
MODIFY `pk_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mst_countries`
--
ALTER TABLE `mst_countries`
MODIFY `pk_country_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_dinner_time`
--
ALTER TABLE `mst_dinner_time`
MODIFY `pk_dinner_time_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mst_food_menu`
--
ALTER TABLE `mst_food_menu`
MODIFY `pk_food_menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mst_lunch_time`
--
ALTER TABLE `mst_lunch_time`
MODIFY `pk_lunch_time_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mst_regions`
--
ALTER TABLE `mst_regions`
MODIFY `pk_region_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mst_tiffins`
--
ALTER TABLE `mst_tiffins`
MODIFY `pk_tiffin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mst_user_type`
--
ALTER TABLE `mst_user_type`
MODIFY `pk_user_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `pk_order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `pk_user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
