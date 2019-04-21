-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 21, 2019 at 10:21 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'Shoes'),
(2, 'Backpacks'),
(3, 'Hats'),
(4, 'Electronics'),
(5, 'Jerseys'),
(6, 'Kids'),
(7, 'Bikes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `prod_id` int(10) UNSIGNED NOT NULL,
  `prod_pic` varchar(20) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_text` text NOT NULL,
  `prod_price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`prod_id`, `prod_pic`, `prod_name`, `prod_text`, `prod_price`) VALUES
(1, 'shoe1.jpg', 'Adidas Ultraboost 4.0 - Black', 'Enable your best-ever run in the Adidas Men’s Ultra Boost Running Shoes.\r\n', '186.97'),
(2, 'shoe2.jpg', 'Saucony Fatal Fours', 'Foot hugging material and primeknit upper create easy wear', '74.99'),
(3, 'shoe3.jpg', 'Lebron Grey Matter', 'Ball like the professionals. Grey Matter Lebron feature new air technology', '145.99'),
(4, 'shoe4.jpg', 'Under Armour Seth Curry 4', 'Midnight Blue colourway of the all new 2019 Curry 4', '137.25'),
(5, 'shoe5.jpg', 'Nike Epic React - Pink', 'Voted most comfortable shoe of 2019. Wear your comfort.', '212.98'),
(6, 'backpack1.jpg', 'Dakine Black Sleek Pack', 'Keep everything you need for a full day on campus neatly organized.', '27.99'),
(7, 'backpack2.jpg', 'Under Armour Black Pack', 'Keep everything you need for a full day on the field neatly organized.', '46.95'),
(8, 'backpack3.jpg', 'Under Armour Blue Pack', 'Keep everything you need for a full day on field neatly organized.', '47.99'),
(9, 'backpack4.jpg', 'Dakine Light Grey Backpack', 'Keep everything you need for a full day on campus neatly organized.', '35.95'),
(10, 'backpack5.jpg', 'Adidas Womens Backpack', 'This roomy backpack comes with curved edges at the top and a square base.', '24.99'),
(11, 'hat1.jpg', 'Champion Dad Hat', 'A classic dad cap with style and comfort', '27.99'),
(12, 'hat2.jpg', 'Oakley Flat Brim', 'FlexFit Hat features a stretch deign that conforms to your head to deliver all-day comfort', '16.88'),
(13, 'hat3.jpg', 'Adidas Dad Hat', 'An embroidered Trefoil logo gives this basic cap adidas Originals style', '12.99'),
(14, 'hat4.jpg', 'Oakley Curved Brown Brim', 'Curved Brim and moisture-wicking sweatband for a contoured fit and lasting comfort', '15.96'),
(15, 'hat5.jpg', 'The North Face Muff Cover', 'Fend off cold temps with this military inspired earflap cap featuring a sherpa fleece liner', '28.94'),
(16, 'electronic1.jpg', 'GoPro HERO7 Black Edition', 'Take Action. Shoot great footage with the all new HD HERO7.', '459.98'),
(17, 'electronic2.jpg', 'Fitbit Charge 2 Fitness Tracker', 'Track your movement. Track your life. Learn your routine and manage your fitness.', '149.97'),
(18, 'electronic3.jpg', 'Apple Watch Series 4 Gold', 'Series 4 Apple Watch with calling, texting and LTE included.', '519.00'),
(19, 'electronic4.jpg', 'Powerbeats3 Wireless Earphones', 'Listen to music on the go. Completely wireless and easy to use.', '249.99'),
(20, 'electronic5.jpg', 'Garmin inReach Explorer +', 'Explore anywhere. Communicate everywhere.', '589.99'),
(21, 'jerseys1.jpg', 'Toronto Maple Leafs Authentic', 'When the puck drops represent your favourite team with the new Toronto Maple Leafs jersey.', '149.99'),
(22, 'jerseys2.jpg', 'Pittsburgh Penguins Authentic', 'When the puck drops represent your favourite team with the new Pittsburgh Penguins jersey', '129.00'),
(23, 'jerseys3.jpg', 'Toronto Blue Jays Away Jersey', 'When the bases are loaded represent your favourite team with the new Toronto Blue Jays jersey', '89.99'),
(24, 'jerseys4.jpg', 'We The North Red Raptors Jersey', 'When the ball drops represent your favourite team with the new Toronto Raptors jersey', '115.99'),
(25, 'jerseys5.jpg', 'Toronto St. Pats Authentic', 'When the puck drops represent your favourite team with the new Toronto St. Pats jersey', '149.99'),
(26, 'kids1.jpg', 'Girls Unicorn Swimmer Top', 'Fit for all pools. Protect yourself from the sun while staying dry too.', '22.99'),
(27, 'kids2.jpg', 'Nike Toddler Running Shoe', 'Size 1-9 Available. Toddler Size.', '35.00'),
(28, 'kids3.jpg', 'Nike Blue Running Shoe', 'Size 1-7 Available. Toddler Size.', '24.99'),
(29, 'kids4.jpg', 'Girls Purple Under Armour Shorts', 'Fit for any athlete. Short shorts for girls with waistband included', '12.99'),
(30, 'kids5.jpg', 'Boys Blue 3D Nike Graphic Tee', 'Screen printed Nike Graphic Tee. Boys Sizing.', '24.98'),
(31, 'bike1.jpg', 'GT Aggressor Sport Mountain Bike', ' The GT Aggressor Sport model provides value-packed features at an entry-level price point, perfect for those looking to get into the sport of mountain biking.', '549.99'),
(32, 'bike2.jpg', 'GT Avalanche Sport Mountain Bike', 'The GT Avalanche Sport model provides value-packed features at an entry-level price point, perfect for those looking to get into the sport of mountain biking.\r\n', '625.00'),
(33, 'bike3.jpg', 'GT Sensor Alloy Sport Bike', 'The GT Sensor Alloy Sport model provides value-packed features at an entry-level price point, perfect for those looking to get into the sport of biking.', '320.99'),
(34, 'bike4.jpg', 'GT Verb Comp Bike', 'The GT Verb Comp model provides value-packed features at an entry-level price point, perfect for those looking to getting an edge in competition.', '899.98'),
(35, 'bike5.jpg', 'Nakamura Antidote Mountain Bike ', 'The Nakamura Antidote model provides value-packed features at an entry-level price point, perfect for those looking to get into the sport of mountain biking.', '220.78');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_cat`
--

CREATE TABLE `tbl_prod_cat` (
  `pc_id` int(10) UNSIGNED NOT NULL,
  `prod_id` mediumint(9) NOT NULL,
  `cat_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_cat`
--

INSERT INTO `tbl_prod_cat` (`pc_id`, `prod_id`, `cat_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 3),
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 4),
(17, 17, 4),
(18, 18, 4),
(19, 19, 4),
(20, 20, 4),
(21, 21, 5),
(22, 22, 5),
(23, 23, 5),
(24, 24, 5),
(25, 25, 5),
(26, 26, 6),
(27, 27, 6),
(28, 28, 6),
(29, 29, 6),
(30, 30, 6),
(31, 31, 7),
(32, 32, 7),
(33, 33, 7),
(34, 34, 7),
(35, 35, 7),
(36, 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_fname` varchar(15) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(15) NOT NULL,
  `user_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_email`, `user_pass`, `user_date`) VALUES
(1, 'Joanna', 'admin', 'joannabaile@gmail.com', '123', '0000-00-00 00:00:00'),
(2, 'test', 'hello', '', '123', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD UNIQUE KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD UNIQUE KEY `prod_id` (`prod_id`);

--
-- Indexes for table `tbl_prod_cat`
--
ALTER TABLE `tbl_prod_cat`
  ADD UNIQUE KEY `pc_id` (`pc_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `prod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_prod_cat`
--
ALTER TABLE `tbl_prod_cat`
  MODIFY `pc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
