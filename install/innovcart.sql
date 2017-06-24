-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2017 at 08:41 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `innovcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_user` varchar(200) NOT NULL,
  `admin_pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `ad_type` enum('72890','250250','60090','') NOT NULL,
  `ad_link` varchar(200) NOT NULL,
  `ad_imglink` varchar(200) NOT NULL,
  `ad_clicks` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `ad_type`, `ad_link`, `ad_imglink`, `ad_clicks`) VALUES
(1, '250250', 'http://videositemaker.com', 'images/ads/sda250.jpg', 13),
(2, '72890', 'http://videositemaker.com', 'images/ads/sda72890.jpg', 10),
(3, '60090', 'http://videositemaker.com', 'images/ads/sda60090.png', 7);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_robots` enum('follow,index','follow,noindex','nofollow,noindex','nofollow,index') NOT NULL DEFAULT 'follow,index',
  `cat_description` varchar(200) NOT NULL,
  `cat_keywords` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_robots`, `cat_description`, `cat_keywords`) VALUES
(15, 'Indian', 'follow,index', 'All Indian type Foods', 'indian,food,south indian,punjabi'),
(16, 'Chinese', 'follow,index', 'All Chinese type Foods', 'chinese'),
(17, 'Itelian', 'follow,index', 'New Delicious Itelian Food', 'itelian'),
(18, 'Maxican', 'follow,index', 'bansdb', 'asd,asdsa,sadsad');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `vid_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_by` varchar(100) NOT NULL DEFAULT 'Guest',
  `comment_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `vid_id`, `comment`, `comment_by`, `comment_on`) VALUES
(1, 3, 'Nice Song by Kokri', 'Guest', '2017-04-18 08:17:15'),
(2, 3, 'nice song', 'Guest', '2017-04-18 08:17:15'),
(3, 3, 'one another comment', 'Guest', '2017-04-18 08:17:15'),
(4, 3, 'lets see', 'Guest', '2017-04-18 08:17:15'),
(5, 3, 'lets see again', 'Guest', '2017-04-18 08:17:15'),
(6, 3, 'lets see again sdd', 'Guest', '2017-04-18 08:17:15'),
(7, 3, 'my name is khan', 'Guest', '2017-04-18 08:17:15'),
(8, 3, 'new comment', 'Guest', '2017-04-18 08:20:10'),
(9, 3, 'hello', 'Guest', '2017-04-18 09:06:44'),
(10, 3, 'my friend', 'Guest', '2017-04-18 09:09:52'),
(11, 3, 'nice my bst friend', 'Guest', '2017-04-18 09:11:18'),
(12, 3, 'new comment', 'Guest', '2017-04-18 09:49:31'),
(13, 3, 'new comment', 'Guest', '2017-04-18 09:50:53'),
(14, 3, 'new comment my', 'Guest', '2017-04-18 09:51:22'),
(15, 5, 'bawa u rocks', 'Guest', '2017-04-18 11:19:00'),
(16, 5, 'u such a awesome guy', 'Guest', '2017-04-18 11:19:13'),
(17, 5, 'dbmds,f.ds', 'Guest', '2017-04-18 12:50:17'),
(18, 5, 'hvsjdbsaf', 'Guest', '2017-04-18 12:50:28'),
(19, 5, 'nkjsblksdn;f', 'Guest', '2017-04-18 12:50:31'),
(20, 5, 'jiyyegrjbwekf;wef', 'Guest', '2017-04-18 12:50:36'),
(21, 7, 'vjhsmjbjsf', 'Guest', '2017-04-19 09:17:33'),
(22, 7, 'vjhsmjbjsfsfsdfd', 'Guest', '2017-04-19 09:17:36'),
(23, 7, 'dsfs', 'Guest', '2017-04-19 09:17:38'),
(24, 9, 'happy you rock', 'Guest', '2017-04-19 16:03:17'),
(25, 16, 'jjhvkb', 'Guest', '2017-04-20 05:11:05'),
(27, 7, 'hello', 'Guest', '2017-04-20 08:01:10'),
(28, 7, 'nice song', 'Guest', '2017-04-20 08:02:43'),
(34, 7, 'nice', 'Guest', '2017-04-21 07:19:45'),
(35, 7, 'helloooo', 'Guest', '2017-04-21 07:22:12'),
(36, 20, 'Nice Product', 'Guest', '2017-06-24 17:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `coupans`
--

CREATE TABLE `coupans` (
  `cup_id` int(11) NOT NULL,
  `cup_code` varchar(100) NOT NULL,
  `cup_valid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cup_desc` text NOT NULL,
  `cup_status` enum('0','1','','') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupans`
--

INSERT INTO `coupans` (`cup_id`, `cup_code`, `cup_valid`, `cup_desc`, `cup_status`) VALUES
(2, '05OFFNEW', '2017-06-23 07:00:00', '05% OFF COUPAN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `f_id` int(11) NOT NULL,
  `vid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_mob` varchar(15) NOT NULL,
  `user_gender` enum('Male','Female','','') NOT NULL,
  `user_pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `user_email`, `user_username`, `user_fname`, `user_lname`, `user_mob`, `user_gender`, `user_pass`) VALUES
(1, 'GUEST@gmail.com', 'guestme', 'guest', 'welcome', '8955678101', 'Male', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'guest@videositemaker.com', 'Guest', 'Guest', 'User', '8977894510', 'Male', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `member_likes`
--

CREATE TABLE `member_likes` (
  `like_id` int(11) NOT NULL,
  `like_by` varchar(100) NOT NULL,
  `like_vid` int(11) NOT NULL,
  `like_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_likes`
--

INSERT INTO `member_likes` (`like_id`, `like_by`, `like_vid`, `like_time`) VALUES
(8, 'Guest', 20, '2017-06-24 17:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `member_watch`
--

CREATE TABLE `member_watch` (
  `watch_id` int(11) NOT NULL,
  `watch_by` varchar(100) NOT NULL,
  `watch_vid` int(11) NOT NULL,
  `watch_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `watch_count` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_watch`
--

INSERT INTO `member_watch` (`watch_id`, `watch_by`, `watch_vid`, `watch_time`, `watch_count`) VALUES
(1, 'Guest', 0, '2017-06-24 18:09:00', 276),
(2, 'Guest', 20, '2017-06-24 17:25:35', 54),
(3, 'Guest', 21, '2017-06-24 17:08:04', 32);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `od_id` int(11) NOT NULL,
  `od_by` int(11) NOT NULL DEFAULT '1',
  `od_fname` varchar(100) NOT NULL,
  `od_lname` varchar(100) NOT NULL,
  `od_email` varchar(100) NOT NULL,
  `od_phone` varchar(100) NOT NULL,
  `od_fax` varchar(100) DEFAULT NULL,
  `od_compony` varchar(100) DEFAULT NULL,
  `od_addr_one` varchar(100) NOT NULL,
  `od_addr_two` varchar(100) NOT NULL,
  `od_city` varchar(100) NOT NULL,
  `od_post_code` varchar(100) NOT NULL,
  `od_country` varchar(100) NOT NULL,
  `od_state` varchar(100) NOT NULL,
  `od_method` varchar(100) NOT NULL,
  `od_subtotal` float NOT NULL,
  `od_ship` int(11) NOT NULL,
  `od_total` float NOT NULL,
  `od_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `od_status` int(11) NOT NULL DEFAULT '0',
  `od_coupan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`od_id`, `od_by`, `od_fname`, `od_lname`, `od_email`, `od_phone`, `od_fax`, `od_compony`, `od_addr_one`, `od_addr_two`, `od_city`, `od_post_code`, `od_country`, `od_state`, `od_method`, `od_subtotal`, `od_ship`, `od_total`, `od_date`, `od_status`, `od_coupan`) VALUES
(26, 1, 'vjhvhj', 'v', 'hjv', 'jv', 'hj', 'vj', 'hv', 'jhv', 'jh', 'vj', 'vj', 'vj', 'cod', 70, 50, 120, '2017-06-23 13:36:56', 1, NULL),
(31, 6, 'Rahul', 'Kumar', 'j', 'vhj', 'vjh', 'vj', '6 K 516,shivaji Park', '', 'Alwar', '301001', 'India', 'Rajasthan', 'cod', 205, 50, 255, '2017-06-23 13:40:59', 1, NULL),
(32, 6, 'Rahul', 'Yadav', 'rahul.ctae94@gmail.com', '8955678110', 'None', 'Master Minds co. inc.', '6 K 516, Shivaji Park', '', 'Alwar', '301001', 'India', 'Rajasthan', 'cod', 275, 50, 325, '2017-06-24 04:11:41', 2, NULL),
(33, 6, 'RAHUL', 'KUMAR', 'rahul@gmail.com', '8955678101', '', '', '6 K 516, Shivaji Park', '', 'Alwar', '301001', 'India', 'Rajasthan', 'cod', 205, 50, 255, '2017-06-23 21:07:48', 4, '10OFFNEW'),
(34, 1, 'ig', 'hjvh', 'jv', 'hv', 'h', 'vhg', 'v', 'hgv', 'hg', 'v', 'hgv', 'df', 'cod', 70, 50, 120, '2017-06-23 20:36:13', 0, ''),
(35, 6, 'hgf', 'fgh', 'fhg', 'fg', 'hg', 'fg', 'h', 'fh', 'gf', 'hgf', 'hg', 'fhgf', 'cod', 485, 50, 535, '2017-06-24 13:41:53', 4, '05OFFNEW'),
(36, 6, 'tyfyt', 'f', 'jbkjb', 'fcytf', 'fyt', 'fy', 'f', 'ytf', 'yt', 'fyt', 'fyt', 'fy', 'cod', 205, 50, 255, '2017-06-24 13:45:36', 1, '05OFFNEW'),
(37, 6, '', '', '', '', '', '', '', '', '', '', '', '', 'cod', 70, 50, 120, '2017-06-24 17:10:14', 1, '05OFFNEW'),
(38, 6, 'Rahul', 'Yadav', 'rahul.ctae94@gmail.com', '8955678110', 'NONE', 'Master Minds co. inc.', '6 K 516, Shivaji Park', '', 'Alwar', '301001', 'India', 'Rajasthan', 'cod', 1045, 0, 1045, '2017-06-24 17:10:37', 1, '05OFFNEW');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `od_prod_id` int(11) NOT NULL,
  `od_ide` int(11) NOT NULL,
  `od_prod_realid` int(11) NOT NULL,
  `od_prod_name` varchar(100) NOT NULL,
  `od_prod_quant` int(10) NOT NULL,
  `od_prod_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`od_prod_id`, `od_ide`, `od_prod_realid`, `od_prod_name`, `od_prod_quant`, `od_prod_price`) VALUES
(11, 26, 20, 'Khaman', 1, 205),
(17, 31, 20, 'Khaman', 1, 205),
(24, 32, 21, 'Dosa', 1, 70),
(25, 32, 20, 'Khaman', 1, 205),
(27, 33, 20, 'Khaman', 1, 205),
(28, 34, 21, 'Dosa', 1, 70),
(29, 35, 20, 'Khaman', 1, 205),
(30, 35, 21, 'Dosa', 4, 70),
(31, 36, 20, 'Khaman', 1, 205),
(32, 37, 21, 'Dosa', 1, 70),
(33, 38, 20, 'Khaman', 1, 205),
(34, 38, 21, 'Dosa', 12, 70);

-- --------------------------------------------------------

--
-- Table structure for table `product_attrib`
--

CREATE TABLE `product_attrib` (
  `attrib_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_attrib` varchar(100) NOT NULL,
  `product_attrib_value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_attrib`
--

INSERT INTO `product_attrib` (`attrib_id`, `product_id`, `product_attrib`, `product_attrib_value`) VALUES
(1, 20, 'Weight', '1000 Gm'),
(2, 20, 'color', 'Red'),
(3, 21, 'Weight', '1000 gms'),
(4, 21, 'Color', 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(100) NOT NULL,
  `subcat_count` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `subcat_robots` enum('follow,index','follow,noindex','nofollow,index','nofollow,noindex') NOT NULL DEFAULT 'follow,index',
  `subcat_description` varchar(200) NOT NULL,
  `subcat_keywords` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`subcat_id`, `subcat_name`, `subcat_count`, `cat_name`, `subcat_robots`, `subcat_description`, `subcat_keywords`) VALUES
(5, 'Gujrati', 0, 'Indian', 'follow,index', 'Gujrati Foods', 'gujrati'),
(6, 'South Indian', 0, 'Indian', 'follow,index', 'New Food from south india', 'india'),
(7, 'Rajasthani', 0, 'Indian', 'follow,index', 'New Rajasthani Thali', 'rajasthani'),
(8, 'Kashmiri', 0, 'Indian', 'follow,index', 'Kashmiri Food', 'kashmiri,food,south,indian');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `theme_id` int(11) NOT NULL,
  `theme_name` varchar(100) NOT NULL,
  `theme_location` varchar(100) NOT NULL,
  `theme_snap` varchar(200) NOT NULL,
  `theme_status` enum('0','1','','') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`theme_id`, `theme_name`, `theme_location`, `theme_snap`, `theme_status`) VALUES
(1, 'Brownish', 'one.css', 'two.jpeg', '0'),
(2, 'Bluish', 'two.css', 'one.jpeg', '0'),
(3, 'Default', 'default.css', 'default.jpeg', '0'),
(6, '3', '3.css', '3.jpeg', '0'),
(7, '4', '4.css', '4.jpeg', '0'),
(8, '12', '12.css', '12.jpeg', '0'),
(9, '9', '9.css', '9.jpeg', '1'),
(11, '7', '7.css', '7.jpeg', '0'),
(12, '10', '10.css', '10.jpeg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `vid_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `views` int(11) DEFAULT '0',
  `likes` int(11) NOT NULL DEFAULT '0',
  `snapshot_link` varchar(500) DEFAULT NULL,
  `vid_name` text NOT NULL,
  `vid_keywords` varchar(200) NOT NULL,
  `vid_robots` enum('follow,index','nofollow,index','follow,noindex','nofollow,noindex') NOT NULL DEFAULT 'follow,index',
  `vid_by` varchar(200) NOT NULL,
  `vid_price` float NOT NULL,
  `vid_quant` int(11) NOT NULL,
  `vid_desc` text NOT NULL,
  `vid_color` varchar(20) NOT NULL,
  `vid_weight` varchar(10) NOT NULL,
  `vid_size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`vid_id`, `subcat_id`, `cat_name`, `views`, `likes`, `snapshot_link`, `vid_name`, `vid_keywords`, `vid_robots`, `vid_by`, `vid_price`, `vid_quant`, `vid_desc`, `vid_color`, `vid_weight`, `vid_size`) VALUES
(20, 5, 'Indian', 253, 1, './images/products/khaman.jpg', 'Khaman', 'khaman,delicius,food,average,range', 'follow,index', 'Desi Khaman', 205, 194, 'Khaman is very delicious food and it is a gujrati dish.', 'Pink', '1000 Gm', ''),
(21, 6, 'Indian', 84, 0, './images/products/dosa.jpg', 'Dosa', 'dosa,south,indian', 'follow,index', 'Rahul Backers', 70, 185, '', 'Red', '1000 Gm', '');

-- --------------------------------------------------------

--
-- Table structure for table `website_attrib`
--

CREATE TABLE `website_attrib` (
  `web_name` varchar(100) NOT NULL,
  `web_title` varchar(100) NOT NULL,
  `web_des` text NOT NULL,
  `web_robots` enum('follow,index','nofollow,index','follow,index','nofollow,noindex') NOT NULL DEFAULT 'follow,index',
  `web_copy` varchar(100) NOT NULL,
  `web_keywords` text NOT NULL,
  `web_facebook` varchar(400) NOT NULL,
  `web_id` int(11) NOT NULL,
  `web_fev` varchar(200) DEFAULT NULL,
  `web_logo` varchar(200) DEFAULT NULL,
  `pageviews` int(11) NOT NULL DEFAULT '0',
  `ads_click` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_attrib`
--

INSERT INTO `website_attrib` (`web_name`, `web_title`, `web_des`, `web_robots`, `web_copy`, `web_keywords`, `web_facebook`, `web_id`, `web_fev`, `web_logo`, `pageviews`, `ads_click`) VALUES
('InnovCart', 'Your Custom Cart', 'Make Your Own Shopping Website', 'follow,index', 'InnovCart', 'innovcart,ecommerce,website', 'innovcart', 1, 'images/fav/twitter.png', 'images/logo/aa.png', 2468, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name_2` (`cat_name`),
  ADD KEY `cat_name` (`cat_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_by` (`comment_by`),
  ADD KEY `comment_by_2` (`comment_by`);

--
-- Indexes for table `coupans`
--
ALTER TABLE `coupans`
  ADD PRIMARY KEY (`cup_id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD KEY `user_username_2` (`user_username`);

--
-- Indexes for table `member_likes`
--
ALTER TABLE `member_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `like_by` (`like_by`);

--
-- Indexes for table `member_watch`
--
ALTER TABLE `member_watch`
  ADD PRIMARY KEY (`watch_id`),
  ADD KEY `watch_vid` (`watch_vid`),
  ADD KEY `watch_by` (`watch_by`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `od_by` (`od_by`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`od_prod_id`),
  ADD KEY `od_prod_realid` (`od_prod_realid`),
  ADD KEY `od_ide` (`od_ide`);

--
-- Indexes for table `product_attrib`
--
ALTER TABLE `product_attrib`
  ADD PRIMARY KEY (`attrib_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`subcat_id`),
  ADD UNIQUE KEY `subcat_name` (`subcat_name`),
  ADD KEY `cat_name` (`cat_name`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`vid_id`),
  ADD KEY `cat_name` (`cat_name`),
  ADD KEY `subcat_id` (`subcat_id`);

--
-- Indexes for table `website_attrib`
--
ALTER TABLE `website_attrib`
  ADD PRIMARY KEY (`web_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `coupans`
--
ALTER TABLE `coupans`
  MODIFY `cup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `member_likes`
--
ALTER TABLE `member_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member_watch`
--
ALTER TABLE `member_watch`
  MODIFY `watch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `od_prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `product_attrib`
--
ALTER TABLE `product_attrib`
  MODIFY `attrib_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `vid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `website_attrib`
--
ALTER TABLE `website_attrib`
  MODIFY `web_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `commentsrky` FOREIGN KEY (`comment_by`) REFERENCES `members` (`user_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_likes`
--
ALTER TABLE `member_likes`
  ADD CONSTRAINT `bysomeone` FOREIGN KEY (`like_by`) REFERENCES `members` (`user_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_watch`
--
ALTER TABLE `member_watch`
  ADD CONSTRAINT `watchbyme` FOREIGN KEY (`watch_by`) REFERENCES `members` (`user_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`od_by`) REFERENCES `members` (`user_id`);

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`od_prod_realid`) REFERENCES `videos` (`vid_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`od_ide`) REFERENCES `orders` (`od_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_attrib`
--
ALTER TABLE `product_attrib`
  ADD CONSTRAINT `product_attrib_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `videos` (`vid_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcat`
--
ALTER TABLE `subcat`
  ADD CONSTRAINT `catname` FOREIGN KEY (`cat_name`) REFERENCES `categories` (`cat_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `catide` FOREIGN KEY (`cat_name`) REFERENCES `categories` (`cat_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcatid` FOREIGN KEY (`subcat_id`) REFERENCES `subcat` (`subcat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
