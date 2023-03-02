-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2023 at 09:01 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18044649_food_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `b_id` varchar(50) NOT NULL,
  `u_id` varchar(50) NOT NULL,
  `cat_id` varchar(50) NOT NULL,
  `scat_id` varchar(50) NOT NULL,
  `b_title` varchar(100) NOT NULL,
  `b_subtitle` varchar(100) NOT NULL,
  `b_desc` varchar(200) NOT NULL,
  `b_image` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'show'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `b_id`, `u_id`, `cat_id`, `scat_id`, `b_title`, `b_subtitle`, `b_desc`, `b_image`, `status`) VALUES
(4, 'b-80001', '1357678', 'cat-20006', 'scat-30006', 'spicy noodles', 'chines special noodles', ' A bowl of slurpy, tasty and spicy noodles is a dish that we could hard', 'home-img-1.png', 'show'),
(5, 'b-80002', '1357678', 'cat-20003', 'scat-30011', 'spicy pizza', 'hot & spicy dishes', ' a flat, open-faced baked pie of Italian origin, consisting of a thin layer of bread dough topped wit', 'home-img-3.png', 'show'),
(6, 'b-80003', '1357678', 'cat-20002', 'scat-30005', 'spicy chicken', 'world famous dishes', '  Delicious chicken recipes from the pakistan best chefs including roast chicken', 'home-img-2.png', 'hide'),
(7, 'b-80004', '1357678', 'cat-20008', 'scat-30012', 'hyderbadi biryani', 'very tasty and spicy', 'N/A', 'home-img-4.png', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cr_id` int(11) NOT NULL,
  `inv_id` varchar(50) NOT NULL,
  `cat_id` varchar(50) NOT NULL,
  `scat_id` varchar(50) NOT NULL,
  `pro_id` varchar(50) NOT NULL,
  `u_id` varchar(50) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `prize` decimal(10,0) NOT NULL,
  `tax` int(10) NOT NULL DEFAULT 3,
  `date` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `number` varchar(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cr_id`, `inv_id`, `cat_id`, `scat_id`, `pro_id`, `u_id`, `qty`, `prize`, `tax`, `date`, `status`, `number`, `address`) VALUES
(22, 'inv-50001', 'cat-20001', '', 'p-10002', '1357678', 5, 110, 3, '2023-01-13 08:08:29.000000', 'show', NULL, NULL),
(23, 'inv-50002', 'cat-20001', 'scat-30009', 'p-10009', '1133030496', 4, 190, 3, '2023-02-27 10:18:06', 'pending', NULL, NULL),
(24, 'inv-50003', 'cat-20004', 'scat-30013', 'p-10004', '1102389833', 3, 160, 3, '2023-02-28 08:00:28', 'pending', NULL, NULL),
(25, 'inv-50003', 'cat-20007', 'scat-30015', 'p-10011', '1102389833', 3, 200, 3, '2023-02-28 08:00:28', 'pending', NULL, NULL),
(26, 'inv-50003', 'cat-20001', 'scat-30009', 'p-10009', '1102389833', 1, 190, 3, '2023-02-28 08:00:28', 'pending', NULL, NULL),
(27, 'inv-50004', 'cat-20001', 'scat-30001', 'p-10001', '387243604', 25, 115, 3, '28-02-23', 'direct order', '03409736543', 'kARACHI'),
(28, 'inv-50005', 'cat-20005', 'scat-30004', 'p-10005', '754079780', 25, 150, 3, '28-02-23', 'direct order', '03409736543', 'kARACHI'),
(29, 'inv-50006', 'cat-20007', 'scat-30015', 'p-10011', '', 15, 200, 3, '28-02-23', 'direct order', '03409736543', 'LAHORE'),
(30, 'inv-50007', 'cat-20001', 'scat-30009', 'p-10009', '317669658', 3, 190, 3, '2023-03-01 10:54:48', 'pending', NULL, NULL),
(31, 'inv-50007', 'cat-20004', 'scat-30013', 'p-10004', '317669658', 2, 160, 3, '2023-03-01 10:54:48', 'pending', NULL, NULL),
(32, 'inv-50008', 'cat-20004', 'scat-30013', 'p-10004', '317669658', 1, 160, 3, '2023-03-01 10:55:26', 'pending', NULL, NULL),
(33, 'inv-50009', 'cat-20007', 'scat-30015', 'p-10011', '317669658', 1, 200, 3, '2023-03-01 10:57:19', 'pending', NULL, NULL),
(34, 'inv-50010', 'cat-20008', 'scat-30012', 'p-10008', '317669658', 1, 250, 3, '2023-03-01 10:57:51', 'pending', NULL, NULL),
(35, 'inv-50011', 'cat-20001', 'scat-30009', 'p-10009', '317669658', 3, 190, 3, '2023-03-01 10:59:07', 'pending', NULL, NULL),
(36, 'inv-50012', 'cat-20008', 'scat-30012', 'p-10008', '317669658', 1, 250, 3, '2023-03-01 10:59:39', 'pending', NULL, NULL),
(37, 'inv-50012', 'cat-20007', 'scat-30015', 'p-10011', '317669658', 1, 200, 3, '2023-03-01 10:59:39', 'pending', NULL, NULL),
(38, 'inv-50012', 'cat-20004', 'scat-30013', 'p-10004', '317669658', 1, 160, 3, '2023-03-01 10:59:39', 'pending', NULL, NULL),
(39, 'inv-50013', 'cat-20008', 'scat-30012', 'p-10008', '317669658', 4, 250, 3, '2023-03-01 11:09:24', 'pending', NULL, NULL),
(40, 'inv-50013', 'cat-20004', 'scat-30013', 'p-10004', '317669658', 3, 160, 3, '2023-03-01 11:09:24', 'pending', NULL, NULL),
(41, 'inv-50013', 'cat-20007', 'scat-30015', 'p-10011', '317669658', 4, 200, 3, '2023-03-01 11:09:24', 'pending', NULL, NULL),
(42, 'inv-50014', 'cat-20001', 'scat-30009', 'p-10009', '317669658', 5, 190, 3, '2023-03-01 11:14:49', 'pending', NULL, NULL),
(43, 'inv-50014', 'cat-20004', 'scat-30013', 'p-10004', '317669658', 5, 160, 3, '2023-03-01 11:14:49', 'pending', NULL, NULL),
(44, 'inv-50015', 'cat-20004', 'scat-30013', 'p-10004', '1133030496', 5, 160, 3, '2023-03-01 11:20:13', 'pending', NULL, NULL),
(45, 'inv-50016', 'cat-20004', 'scat-30013', 'p-10004', '1133030496', 5, 160, 3, '2023-03-01 11:20:38', 'pending', NULL, NULL),
(46, 'inv-50017', 'cat-20001', 'scat-30001', 'p-10001', '', 25, 115, 3, '01-03-23', 'direct order', '03409736543', 'karachi'),
(47, 'inv-50018', 'cat-20001', 'scat-30001', 'p-10001', '', 25, 115, 3, '01-03-23', 'direct order', '03409736543', 'karachi'),
(48, 'inv-50019', 'cat-20001', 'scat-30001', 'p-10001', '', 25, 115, 3, '01-03-23', 'direct order', '03409736543', 'karachi'),
(49, 'inv-50020', 'cat-20001', 'scat-30001', 'p-10001', '', 25, 115, 3, '01-03-23', 'direct order', '03409736543', 'karachi');

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id` int(11) NOT NULL,
  `cash-in` decimal(10,0) NOT NULL,
  `cash-out` decimal(10,0) NOT NULL,
  `invetment` decimal(10,0) NOT NULL,
  `profite` decimal(10,0) NOT NULL,
  `extra` decimal(10,0) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`id`, `cash-in`, `cash-out`, `invetment`, `profite`, `extra`, `date`) VALUES
(1, 3000, 0, 150000, 4000, 0, '2023-02-17 16:02:08.000000'),
(2, 2500, 20000, 150000, 4000, 0, '2023-02-18 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(50) NOT NULL,
  `u_id` varchar(50) NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `cat_id`, `u_id`, `cat_name`, `status`) VALUES
(1, 'cat-20001', '1357678', 'burgers', 'show'),
(2, 'cat-20002', '1357678', 'meat', 'show'),
(3, 'cat-20003', '1133030496', 'pizza', 'show'),
(4, 'cat-20004', '1357678', 'rots', 'show'),
(5, 'cat-20005', '1357678', 'ice cream', 'show'),
(6, 'cat-20006', '1357678', 'noodles', 'show'),
(7, 'cat-20007', '1357678', 'beverages', 'show'),
(9, 'cat-20008', '1357678', 'Biryani', 'show'),
(10, 'cat-20009', '1357678', 'n', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `clr_id` int(11) NOT NULL,
  `hsl` varchar(50) NOT NULL,
  `clr` varchar(50) NOT NULL,
  `color_alt` varchar(50) NOT NULL,
  `color_lighter` varchar(50) NOT NULL,
  `clr_sts` varchar(50) NOT NULL DEFAULT 'white'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`clr_id`, `hsl`, `clr`, `color_alt`, `color_lighter`, `clr_sts`) VALUES
(1, '250', 'hsl(250,69% , 61%)', 'hsl(250,57% , 53%)', 'hsl(250,92% , 85%)', 'white'),
(2, '340', 'hsl(340,69% , 61%)', 'hsl(340,57% , 53%)', 'hsl(340,92% , 85%)', 'dark'),
(3, '275', 'hsl(275,69% , 61%)', 'hsl(275,57% , 53%)', 'hsl(275,92% , 85%)', 'white'),
(4, '206', 'hsl(206,69% , 61%)', 'hsl(206,57% , 53%)', 'hsl(206,92% , 85%)', 'dark');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inv_id` varchar(50) NOT NULL,
  `msg` varchar(150) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `user_id`, `inv_id`, `msg`, `date`) VALUES
(7, 1357678, 'inv_005402', 'i am very Thankfully your website and your team , i am Received your product  in 30 mint And your pizza is very spicy', '2023-01-20 16:08:49'),
(8, 1133030496, 'inv_005403', 'your roster moster is very hot  and oily  but your service is free fasr nd your product prize is helpful us , thanks , ', '2023-01-20 16:31:10'),
(9, 1357678, 'inv_005404', 'your products is very spicy but  your burger have small amount of chechkup', '2023-02-14 19:19:21'),
(10, 1357678, 'inv_005404', 'your products is very spicy but  your burger have small amount of chechkup', '2023-02-14 19:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `p_id` varchar(50) NOT NULL,
  `cat_id` varchar(50) NOT NULL,
  `scat_id` varchar(50) NOT NULL,
  `u_id` varchar(50) NOT NULL,
  `p_title` varchar(30) NOT NULL,
  `p_subtitle` varchar(30) NOT NULL,
  `p_desc` varchar(150) NOT NULL,
  `p_prize` decimal(10,0) NOT NULL,
  `p_image` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'show',
  `action` varchar(10) NOT NULL DEFAULT 'far',
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `p_id`, `cat_id`, `scat_id`, `u_id`, `p_title`, `p_subtitle`, `p_desc`, `p_prize`, `p_image`, `status`, `action`, `date`) VALUES
(1, 'p-10001', 'cat-20001', 'scat-30001', '1357678', 'zinger burger', 'so spicy and ziz izz', ' spicy and low fat', 115, 'dish-1.png', 'show', 'far', '2023-02-20 17:46:03.000000'),
(2, 'p-10002', 'cat-20004', 'scat-30003', '1357678', 'roster moster', 'small roster', ' this is roster', 110, 'dish-2.png', 'show', 'far', '2023-02-21 17:46:03.000000'),
(3, 'p-10003', 'cat-20003', 'scat-30011', '1357678', 'down pizza', 'so Delicious', '  pizza is  is very nice', 250, 'dish-4.png', 'show', 'far', '2023-03-01 20:14:29.000000'),
(4, 'p-10004', 'cat-20004', 'scat-30013', '1357678', 'legs roster', 'larger roster', '  this is roster', 160, 'dish-6.png', 'show', 'far', '2023-02-22 17:46:03.000000'),
(5, 'p-10005', 'cat-20005', 'scat-30004', '1357678', 'black ice cream', 'so Delicious', '   ice cream is nice', 150, 'dish-5.png', 'hide', 'far', '2023-02-23 17:46:03.000000'),
(6, 'p-10006', 'cat-20001', 'scat-30014', '1357678', 'ELK burger', 'Lean, delicious ', '   Lean, delicious and free-range , Awesome In Rang , Elk Burger is Spicy', 360, 'dish-7.png', 'show', 'far', '2023-02-23 17:46:03.000000'),
(13, 'p-10008', 'cat-20008', 'scat-30012', '1357678', 'Hyderabadi biryani', 'fried chicken', '   Hyderabadi chicken biryani is an aromatic, mouth watering and authentic Indian dish with succulent chicken in layers of fluffy rice, fragrant spice', 250, 'chicken.png', 'show', 'far', '2023-02-24 17:46:03.000000'),
(14, 'p-10009', 'cat-20001', 'scat-30009', '1357678', 'cheez burger', 'Extra spicy and hot', '  hello guys, new offer of cheezz burger', 190, 'dish-7.png', 'show', 'far', '2023-02-25 17:46:03.000000'),
(17, 'p-10010', 'cat-20005', 'scat-30010', '1357678', 'Mango Ice', 'Sweet & ice ', ' 125kcal', 250, 'dish-8.jpg', 'show', 'far', '2023-02-26 17:46:03.000000'),
(18, 'p-10011', 'cat-20007', 'scat-30015', '1357678', 'pepsi', 'All brand available.', ' N/A', 200, 'pngegg.png', 'show', 'far', '2023-02-28 17:46:03.000000'),
(19, 'p-10012', 'cat-20002', 'scat-30005', '1357678', 'Spicy chicken ', 'world famous dishes', '  N/A', 1100, 'chicken.png', 'show', 'far', '2023-03-01 20:15:34.000000');

-- --------------------------------------------------------

--
-- Table structure for table `pro_stock`
--

CREATE TABLE `pro_stock` (
  `pp_id` int(11) NOT NULL,
  `ps_id` varchar(50) NOT NULL,
  `cat_id` varchar(50) NOT NULL,
  `scat_id` varchar(50) NOT NULL,
  `pro_id` varchar(50) NOT NULL,
  `u_id` int(11) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `prize` decimal(10,0) NOT NULL,
  `tax` int(10) NOT NULL DEFAULT 3,
  `date` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pro_stock`
--

INSERT INTO `pro_stock` (`pp_id`, `ps_id`, `cat_id`, `scat_id`, `pro_id`, `u_id`, `qty`, `prize`, `tax`, `date`, `status`) VALUES
(1, 'stk-40001', 'cat-20004', 'scat-30013', 'p-10004', 1357678, 0, 160, 2, '2023-03-01 11:20:38', 'show'),
(2, 'stk-40002', 'cat-20001', 'scat-30009', 'p-10009', 1357678, 9, 170, 2, '2023-03-01 11:14:49', 'show'),
(3, 'stk-40003', 'cat-20007', 'scat-30015', 'p-10011', 1357678, 24, 180, 2, '2023-03-01 11:09:24', 'show'),
(4, 'stk-40004', 'cat-20007', 'scat-30015', 'p-10011', 1357678, 147, 190, 2, '2023-02-28 08:00:28', 'show'),
(5, 'stk-40005', 'cat-20008', 'scat-30012', 'p-10008', 1357678, 94, 220, 3, '2023-03-01 11:09:24', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `u_id` int(11) NOT NULL,
  `unique_id` int(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `address` varchar(100) NOT NULL DEFAULT 'karachi',
  `number` varchar(14) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`u_id`, `unique_id`, `Name`, `email`, `password`, `image`, `status`, `role_id`, `address`, `number`) VALUES
(2, 1357678, 'ahmer ali', 'ahmer@gmail.com', '123', '1677523302uesr.jpg', 'signal_cellular_null', 1, 'karachi', 'N/A'),
(3, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(13, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(16, 1117230790, 'rehman', 'rehman@gmail.com', '0000', '1663767978Koala.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(18, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(28, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(29, 97668943, 'aliysha', 'aliysha@hr.com', '123', '1677583448Thinking-Woman-PNG.png', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(33, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(36, 1117230790, 'Abdul Rehman 003', 'rehman@gmail.com', '0000', '1676055615pic-4.png', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(38, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(39, 97668943, 'aliysha', 'aliysha@gmail.com', '123', '1663620232face11.jpg', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(41, 1117230790, 'rehman', 'rehman@gmail.com', '0000', '1663767978Koala.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(42, 514652895, 'Dawood', 'Dawood@user.in', '123', 'pic.png', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(43, 87139959, 'Muslim ', 'Muslim@user.in', '123', '1675247857pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(44, 728356719, 'abdul Rehman', 'rehman@test.in', '123', '1675248388admin.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(47, 1357678, 'Imran Ali', 'Imran.Ali@fooddelever.com', '123', '1675417255pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(48, 1357678, 'Imran Ali', 'Imran.Ali@fooddelever.com', '123', '1675417425pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(49, 1357678, 'Imran Ali', 'Imran.Ali@fooddelever.com', '123', '16754175051675417425pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(50, 1133030496, 'samuel Yaqoob', 'samuel@gmail.com', '123', '167542006216754175051675417425pic.jpg', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(51, 267757519, 'samuel Yaqoob', 'samuel855@gmail.com', '123', '1676112226pic-1.png', 'signal_cellular_4_bar', 1, 'karachi', 'N/A'),
(52, 1117230790, 'Abdul Rehman', 'Abdulrehman@foodCeo.com', '0000', '1675421206admin.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(53, 676373578, 'umer akber', 'umerAkber@gmail.com', '123', '16755359111675420102pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(54, 1584050050, 'Junaid Rehman', 'junaidRehman@worker.in', '123', '1676111192pic-3.png', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(56, 1102389833, 'javeed iqbal', 'javedIgbal@gmal.com', '123', '1677596306Thinking-Woman-PNG.png', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(57, 317669658, 'Mahroosh  asad', 'mahroosh@hr.com', '123', '1677691780Thinking-Woman-PNG.png', 'signal_cellular_null', 2, 'karachi', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'users');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `scat_id` varchar(50) NOT NULL,
  `cat_id` varchar(50) NOT NULL,
  `u_id` varchar(50) NOT NULL,
  `scat_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `scat_id`, `cat_id`, `u_id`, `scat_name`, `status`) VALUES
(1, 'scat-30001', 'cat-20001', '1133030496', 'zinger burger', 'show'),
(3, 'scat-30002', 'cat-20003', '1357678', 'larger pizza', 'show'),
(4, 'scat-30003', 'cat-20004', '1357678', 'menu roster', 'show'),
(5, 'scat-30004', 'cat-20005', '1357678', 'black ice', 'show'),
(6, 'scat-30005', 'cat-20002', '1133030496', 'chicken', 'show'),
(7, 'scat-30006', 'cat-20006', '1357678', 'chines noodles', 'show'),
(10, 'scat-30008', 'cat-20005', '1357678', 'stabber', 'show'),
(11, 'scat-30009', 'cat-20001', '1357678', 'cheez burger', 'show'),
(12, 'scat-30010', 'cat-20005', '1357678', 'Mango Ice', 'show'),
(13, 'scat-30011', 'cat-20003', '1357678', 'down pizza', 'show'),
(14, 'scat-30012', 'cat-20008', '1357678', 'Hyderabadi biryani ', 'show'),
(15, 'scat-30013', 'cat-20004', '1357678', 'leg roster', 'show'),
(16, 'scat-30014', 'cat-20001', '1357678', 'elk burgers', 'show'),
(17, 'scat-30015', 'cat-20007', '1357678', 'pepsi', 'show');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`clr_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_stock`
--
ALTER TABLE `pro_stock`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `clr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pro_stock`
--
ALTER TABLE `pro_stock`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
