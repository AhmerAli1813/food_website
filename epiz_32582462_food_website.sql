-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 08:16 PM
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
  `p_id` int(11) NOT NULL,
  `b_title` varchar(30) NOT NULL,
  `b_subtitle` varchar(30) NOT NULL,
  `b_desc` varchar(100) NOT NULL,
  `b_image` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`b_id`, `u_id`, `cat_id`, `scat_id`, `p_id`, `b_title`, `b_subtitle`, `b_desc`, `b_image`, `status`) VALUES
(4, 2, 6, 7, 2, 'spicy noodles', 'chines special noodles', 'A bowl of slurpy, tasty and spicy noodles is a dish that we could hard', 'home-img-1.png', 'good'),
(5, 2, 3, 3, 3, 'spicy pizza', 'hot & spicy dishes', 'a flat, open-faced baked pie of Italian origin, consisting of a thin layer of bread dough topped wit', 'home-img-3.png', 'good'),
(6, 3, 2, 6, 4, 'spicy chicken', 'world famous dishes', 'Delicious chicken recipes from the pakistan best chefs including roast chicken', 'home-img-2.png', 'delusion');

-- --------------------------------------------------------

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
  `p_desc` varchar(70) NOT NULL,
  `p_prize` decimal(10,0) NOT NULL,
  `p_image` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `action` varchar(10) NOT NULL DEFAULT 'far'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `cat_id`, `scat_id`, `u_id`, `p_title`, `p_subtitle`, `p_desc`, `p_prize`, `p_image`, `status`, `action`) VALUES
(1, 1, 1, 2, 'zinger burger', 'so Delicious', 'zinger buger is very nice', '80', 'dish1.png', 'good', 'far'),
(2, 4, 4, 3, 'roster moster', 'small roster', 'this is roster', '110', 'dish-2.png', 'nicee', 'far'),
(3, 3, 3, 2, 'down pizza', 'so Delicious', 'pizza is  is very nice', '280', 'dish-4.png', 'special', 'far'),
(4, 4, 4, 3, 'legs roster', 'larger roster', 'this is roster', '160', 'dish-6.png', 'nicee', 'far'),
(5, 5, 5, 2, 'black ice cream', 'so Delicious', 'ice cream is nice', '140', 'dish-5.png', 'special', 'far');

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
  `status` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `address` varchar(100) NOT NULL DEFAULT 'karachi',
  `number` varchar(14) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`u_id`, `unique_id`, `Name`, `email`, `password`, `image`, `status`, `role_id`, `address`, `number`) VALUES
(2, 1357678, 'ahmer ali', 'ahmer@gmail.com', '123', 'admin.jpg', 'active now', 1, 'karachi', 'N/A'),
(3, 1133030496, 'samuel', 'samuel@gmail.com', '123', 'pic.jpg', 'offline', 2, 'karachi', 'N/A'),
(4, 97668943, 'aliysha', 'aliysha@gmail.com', '123', '1663620232face11.jpg', 'Active now', 2, 'karachi', 'N/A'),
(5, 267757519, 'samuel Yaqoob', 'samuel844@gmail.com', '123', '1663649138face12.jpg', 'offline', 2, 'karachi', 'N/A'),
(6, 1117230790, 'rehman', 'rehman@gmail.com', '0000', '1663767978Koala.jpg', 'offline', 2, 'karachi', 'N/A');

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

-- --------------------------------------------------------

--
-- Table structure for table `whitelist`
--

CREATE TABLE `whitelist` (
  `w_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `subtitle` varchar(40) NOT NULL,
  `prize` decimal(10,0) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `u` (`u_id`),
  ADD KEY `c` (`cat_id`),
  ADD KEY `p` (`p_id`),
  ADD KEY `sc` (`scat_id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cr_id`),
  ADD KEY `user_id_cr` (`u_id`),
  ADD KEY `u_cat_igd` (`cat_id`),
  ADD KEY `por_id` (`pro_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `user_id_cat` (`u_id`);

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
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `user_id_p` (`u_id`),
  ADD KEY `u_cat_id_p` (`cat_id`),
  ADD KEY `u_sub_cat_id` (`scat_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`scat_id`),
  ADD KEY `sab_cat_id` (`cat_id`),
  ADD KEY `user_id_scat` (`u_id`);

--
-- Indexes for table `whitelist`
--
ALTER TABLE `whitelist`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `whitelist`
--
ALTER TABLE `whitelist`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `c` FOREIGN KEY (`cat_id`) REFERENCES `catagory` (`cat_id`),
  ADD CONSTRAINT `p` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`),
  ADD CONSTRAINT `sc` FOREIGN KEY (`scat_id`) REFERENCES `sub_category` (`scat_id`),
  ADD CONSTRAINT `u` FOREIGN KEY (`u_id`) REFERENCES `register` (`u_id`);

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `por_id` FOREIGN KEY (`pro_id`) REFERENCES `product` (`p_id`),
  ADD CONSTRAINT `u_cat_igd` FOREIGN KEY (`cat_id`) REFERENCES `catagory` (`cat_id`),
  ADD CONSTRAINT `user_id_cr` FOREIGN KEY (`u_id`) REFERENCES `register` (`u_id`);

--
-- Constraints for table `catagory`
--
ALTER TABLE `catagory`
  ADD CONSTRAINT `user_id_cat` FOREIGN KEY (`u_id`) REFERENCES `register` (`u_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `u_cat_id_p` FOREIGN KEY (`cat_id`) REFERENCES `catagory` (`cat_id`),
  ADD CONSTRAINT `u_sub_cat_id` FOREIGN KEY (`scat_id`) REFERENCES `sub_category` (`scat_id`),
  ADD CONSTRAINT `user_id_p` FOREIGN KEY (`u_id`) REFERENCES `register` (`u_id`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sab_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `catagory` (`cat_id`),
  ADD CONSTRAINT `user_id_scat` FOREIGN KEY (`u_id`) REFERENCES `register` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
