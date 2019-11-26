-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 09, 2019 at 02:54 AM
-- Server version: 5.7.23
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_mobile` varchar(10) NOT NULL,
  `user_address` text NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `user_type` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `bill_id` int(5) NOT NULL,
  `bill_amt` int(5) NOT NULL,
  `order_id` varchar(7) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masteritemlist`
--

DROP TABLE IF EXISTS `masteritemlist`;
CREATE TABLE IF NOT EXISTS `masteritemlist` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masteritemlist`
--

INSERT INTO `masteritemlist` (`id`, `item_name`, `price`, `unit`, `item_image`, `category`) VALUES
(1, 'Brown Bread', '10.00', 'Loaf', 'BrownBread.png', 'BREADS'),
(2, 'French Bread', '10.00', 'Loaf', 'FrenchBread.png', 'BREADS'),
(3, 'Garlic Bread', '10.00', 'Loaf', 'GarlicBread.png', 'BREADS'),
(4, 'Multigrain Bread', '10.00', 'Loaf', 'Multigrain.png', 'BREADS'),
(5, 'White Bread', '10.00', 'Loaf', 'WhiteBread.png', 'BREADS'),
(6, 'Black Forest', '300.00', 'Half KG.', 'blackforest.png', 'CAKES'),
(7, 'Carrot Cake', '300.00', 'Half KG.', 'carrotcake.png', 'CAKES'),
(8, 'Choco Chip', '300.00', 'Half KG.', 'chocochip.png', 'CAKES'),
(9, 'Choco Truffle', '300.00', 'Half KG.', 'chocotruffle.png', 'CAKES'),
(10, 'Plum Cake', '300.00', 'Half KG', 'plumcake.png\r\n', 'CAKES'),
(11, 'Red Velvet', '300.00', 'Half KG', 'redvelvet.png', 'CAKES'),
(12, 'Choco Chip', '300.00', 'Dozen', 'chocochip.png', 'COOKIES'),
(13, 'Chocolate', '300.00', 'Dozen', 'chocolate.png', 'COOKIES'),
(14, 'Choco Scotch', '300.00', 'Dozen', 'chocoscotch', 'COOKIES'),
(15, 'Oreo', '300.00', 'Dozen', 'oreo.png', 'COOKIES'),
(16, 'Blue Berry', '300.00', 'Dozen', 'blueberry.png', 'CUPCAKES'),
(17, 'Choco Lava', '300.00', 'Dozen', 'chocolava.png', 'CUPCAKES'),
(18, 'Hazel Nut', '300.00', 'Dozen', 'Picture1.png', 'CUPCAKES'),
(19, 'Red Velvet', '300.00', 'Dozen', 'redvelvet.png', 'CUPCAKES'),
(20, 'Sticky Toffee', '300.00', 'Dozen', 'stickytoffee.png', 'CUPCAKES'),
(21, 'Choco Bomb', '300.00', '1 ', 'ChocoBomb.png', 'DOUGHNUTS'),
(22, 'Chocolate Decadence', '300.00', '1 ', 'ChocolateDecadence.png', 'DOUGHNUTS'),
(23, 'Cookie Overload', '300.00', '1', 'CookieOverload.png', 'DOUGHNUTS'),
(24, 'Divine Crush', '300.00', '1', 'DivineCrush.png', 'DOUGHNUTS'),
(25, 'Mocha Truffle', '300.00', '1', 'MochaTruffle.png', 'DOUGHNUTS');

-- --------------------------------------------------------

--
-- Table structure for table `myorders`
--

DROP TABLE IF EXISTS `myorders`;
CREATE TABLE IF NOT EXISTS `myorders` (
  `orderid` int(4) NOT NULL,
  `user_id` int(5) NOT NULL,
  `orderdate` date NOT NULL,
  `orderstatus` char(1) NOT NULL,
  `orderquantity` int(4) NOT NULL,
  `item_id` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myorders`
--

INSERT INTO `myorders` (`orderid`, `user_id`, `orderdate`, `orderstatus`, `orderquantity`, `item_id`) VALUES
(1, 2, '0000-00-00', '0', 1, 0),
(1, 2, '0000-00-00', '0', 0, 0),
(1, 2, '0000-00-00', '0', 2, 0),
(1, 2, '0000-00-00', '0', 0, 0),
(2, 2, '2019-10-08', '0', 1, 0),
(2, 2, '2019-10-08', '0', 0, 0),
(2, 2, '2019-10-08', '0', 2, 0),
(2, 2, '2019-10-08', '0', 0, 0),
(3, 2, '2019-10-08', '0', 1, 0),
(3, 2, '2019-10-08', '0', 0, 0),
(3, 2, '2019-10-08', '0', 2, 0),
(3, 2, '2019-10-08', '0', 0, 0),
(4, 2, '2019-10-08', '0', 1, 1),
(4, 2, '2019-10-08', '0', 2, 2),
(4, 2, '2019-10-08', '0', 0, 4),
(4, 2, '2019-10-08', '0', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_mobile` varchar(10) NOT NULL,
  `user_address` text NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` char(1) NOT NULL DEFAULT 'U',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_mobile`, `user_address`, `user_password`, `user_type`) VALUES
(1, 'Akash', 'Vanarse', 'akashjvanarse@yahoo.com', '9561969435', 'Pune', 'akash', 'u'),
(2, 'Ruturaj', 'N', 'Ruturajn@gmail.com', '7845124569', 'Pune', 'asd', 'A'),
(3, 'manjusha', 'wadekar', 'manjusha_wadekar@hotmail.com', '9637411845', 'Deccan Gymkhana', 'abcd1234', 'u'),
(4, 'a', 'hg', 'jkh@hklfh.com', '1564123589', 'hg', '123', 'u'),
(5, 'asdff', 'sdq', 's@s.s', '2014689134', 'we', 'we', 'u'),
(6, 'suman ', 'jain', 'sumanjain@gmail.com', '1111111111', 'sd', 'asd', 'u'),
(7, 'suman ', 'jain', 'sumanjain@gmail.com', '1111111111', 'sd', 'asd', 'u'),
(8, 'a', 'v', 'a@gamil.com', '745125486', 'pp', 'asd', 'u'),
(9, 'b', 'av', 'ab@gmail.com', '8451254', 'io', 'asd', 'u'),
(10, 'bn', 'kl', 'abc@gmail.com', '451248953', 'hj', 'asd', 'u'),
(11, 'd', 'nj', 'asd@gmail.com', '845155122', 'pl', 'asd', 'u'),
(12, 'akash', 'vanarse', 'akash@gmail.com', '7895156324', 'pune', 'akash', 'u');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
