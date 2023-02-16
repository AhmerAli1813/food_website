-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 02:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32582462_food_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `b_title` varchar(100) NOT NULL,
  `b_subtitle` varchar(100) NOT NULL,
  `b_desc` varchar(200) NOT NULL,
  `b_image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`b_id`, `u_id`, `cat_id`, `scat_id`,  `b_title`, `b_subtitle`, `b_desc`, `b_image`, `status`) VALUES
(4, 2, 6, 7,  'spicy noodles', 'chines special noodles', 'A bowl of slurpy, tasty and spicy noodles is a dish that we could hard', 'home-img-1.png', 'good'),
(5, 2, 3, 3,  'spicy pizza', 'hot & spicy dishes', 'a flat, open-faced baked pie of Italian origin, consisting of a thin layer of bread dough topped wit', 'home-img-3.png', 'good'),
(6, 3, 2, 6,  'spicy chicken', 'world famous dishes', 'Delicious chicken recipes from the pakistan best chefs including roast chicken', 'home-img-2.png', 'delusion');

-- --------------------------------------------------------

--

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cr_id` int(11) NOT NULL,
  `inv_id` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `prize` decimal(10,0) NOT NULL,
  `tax` int(10) NOT NULL DEFAULT 3,
  `date` datetime(6) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cr_id`, `inv_id`, `cat_id`, `pro_id`, `u_id`, `qty`, `prize`, `tax`, `date`, `status`) VALUES
(6, 'inv_005401', 4, 2, 2, '4', '110', 3, '2023-01-18 09:54:53.000000', 'purchasing'),
(16, 'inv_005402', 3, 3, 2, '1', '280', 3, '2023-01-20 04:05:55.000000', 'purchasing'),
(17, 'inv_005403', 4, 2, 3, '4', '110', 3, '2023-01-20 04:29:00.000000', 'purchasing');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `cat_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`cat_id`, `u_id`, `cat_name`, `status`) VALUES
(1, 2, 'burger', ''),
(2, 2, 'meat', ''),
(3, 3, 'pizza', ''),
(4, 2, 'rots', ''),
(5, 2, 'ice cream', ''),
(6, 2, 'noodles', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `user_id`, `inv_id`, `msg`, `date`) VALUES
(7, 1357678, 'inv_005402', 'i am very Thankfully your website and your team , i am Received your product  in 30 mint And your pizza is very spicy', '2023-01-20 16:08:49'),
(8, 1133030496, 'inv_005403', 'your roster moster is very hot  and oily  but your service is free fasr nd your product prize is helpful us , thanks , ', '2023-01-20 16:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_title` varchar(30) NOT NULL,
  `p_subtitle` varchar(30) NOT NULL,
  `p_desc` varchar(150) NOT NULL,
  `p_prize` decimal(10,0) NOT NULL,
  `p_image` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'show',
  `action` varchar(10) NOT NULL DEFAULT 'far'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `cat_id`, `scat_id`, `u_id`, `p_title`, `p_subtitle`, `p_desc`, `p_prize`, `p_image`, `status`, `action`) VALUES
(1, 1, 1, 2, 'zinger burger', 'so Delicious', '  zinger buger is very nice', '130', 'dish1.png', 'show', 'far'),
(2, 4, 4, 3, 'roster moster', 'small roster', 'this is roster', '110', 'dish-2.png', 'show', 'far'),
(3, 3, 3, 2, 'down pizza', 'so Delicious', 'pizza is  is very nice', '280', 'dish-4.png', 'show', 'far'),
(4, 4, 4, 3, 'legs roster', 'larger roster', 'this is roster', '160', 'dish-6.png', 'show', 'far'),
(5, 5, 5, 2, 'black ice cream', 'so Delicious', ' ice cream is nice', '150', '1675526263dish-5.png', 'hide', 'far'),
(6, 1, 1, 2, 'ELK burger', 'Lean, delicious ', 'Lean, delicious and free-range , Awesome In Rang , Elk Burger is Spicy', '360', '1675515405dish-7.png', 'show', 'far'),
(7, 3, 3, 2, 'down pizza', 'Lean, delicious ', 'ou want the best pizza to be cooked to a crisp. The cheese should be melted, the crust should have some crunch to it, the toppings should be well-cook', '320', '1675526105dish-4.png', 'show', 'far'),
(8, 5, 5, 2, 'black ice cream', 'so Delicious', '  ice cream is nice', '2500', '1675526263dish-5.png', 'show', 'far'),
(13, 2, 6, 2, 'Hyderabadi biryani', 'fried chicken', ' Hyderabadi chicken biryani is an aromatic, mouth watering and authentic Indian dish with succulent chicken in layers of fluffy rice, fragrant spices ', '250', 'chicken.png', 'show', 'far'),
(14, 1, 1, 2, 'cheez burger', 'Extra spicy and hot', 'hello guys, new offer of cheezz burger', '190', 'menu-2.jpg', 'show', 'far'),
(15, 2, 2, 2, 'dle', 'ded', 'sdsdsd', '1250', 'dish-5.png', 'show', 'far');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`u_id`, `unique_id`, `Name`, `email`, `password`, `image`, `status`, `role_id`, `address`, `number`) VALUES
(2, 1357678, 'ahmerAdmin', 'ahmer@gmail.com', '123', '16760963701675421206admin.jpg', 'signal_cellular_4_bar', 1, 'karachi', 'N/A'),
(3, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(13, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(16, 1117230790, 'rehman', 'rehman@gmail.com', '0000', '1663767978Koala.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(18, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(19, 97668943, 'aliysha', 'aliysha@gmail.com', '123', '1663620232face11.jpg', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(28, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(29, 97668943, 'aliysha', 'aliysha@gmail.com', '123', '1663620232face11.jpg', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(33, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(36, 1117230790, 'Abdul Rehman 003', 'rehman@gmail.com', '0000', '1676055615pic-4.png', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(38, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(39, 97668943, 'aliysha', 'aliysha@gmail.com', '123', '1663620232face11.jpg', 'signal_cellular_4_bar', 2, 'karachi', 'N/A'),
(41, 1117230790, 'rehman', 'rehman@gmail.com', '0000', '1663767978Koala.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(42, 514652895, 'Dawood', 'Dawood@user.in', '123', 'pic.png', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(43, 87139959, 'Muslim ', 'Muslim@user.in', '123', '1675247857pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(44, 728356719, 'abdul Rehman', 'rehman@test.in', '123', '1675248388admin.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(47, 1357678, 'Imran Ali', 'Imran.Ali@fooddelever.com', '123', '1675417255pic.jpg', 'signal_cellular_4_null', 2, 'karachi', 'N/A'),
(48, 1357678, 'Imran Ali', 'Imran.Ali@fooddelever.com', '123', '1675417425pic.jpg', 'signal_cellular_4_null', 2, 'karachi', 'N/A'),
(49, 1357678, 'Imran Ali', 'Imran.Ali@fooddelever.com', '123', '16754175051675417425pic.jpg', 'signal_cellular_4_null', 2, 'karachi', 'N/A'),
(50, 1133030496, 'samuel Yaqoob', 'samuel@gmail.com', '123', '167542006216754175051675417425pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(51, 267757519, 'samuel Yaqoob', 'samuel855@gmail.com', '123', '1676112226pic-1.png', 'signal_cellular_4_bar', 1, 'karachi', 'N/A'),
(52, 1117230790, 'Abdul Rehman', 'Abdulrehman@foodCeo.com', '0000', '1675421206admin.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(53, 676373578, 'umer akber', 'umerAkber@gmail.com', '123', '16755359111675420102pic.jpg', 'signal_cellular_null', 2, 'karachi', 'N/A'),
(54, 1584050050, 'Junaid Rehman', 'junaidRehman@worker.in', '123', '1676111192pic-3.png', 'signal_cellular_null', 2, 'karachi', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `scat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `scat_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`scat_id`, `cat_id`, `u_id`, `scat_name`) VALUES
(1, 1, 3, 'zinger burger'),
(2, 2, 2, 'white qorma'),
(3, 3, 2, 'larger pizza'),
(4, 4, 2, 'menu roster'),
(5, 5, 2, 'black ice'),
(6, 2, 3, 'chicken'),
(7, 6, 2, 'chines noodles');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`cat_id`);

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
  ADD PRIMARY KEY (`p_id`);

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
  ADD PRIMARY KEY (`scat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `clr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `scat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
