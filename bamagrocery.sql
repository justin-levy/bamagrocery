-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 02:08 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bamagrocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(2) NOT NULL,
  `city` varchar(16) NOT NULL,
  `state` varchar(16) NOT NULL,
  `zip_code` int(8) NOT NULL,
  `street` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `city`, `state`, `zip_code`, `street`) VALUES
(1, 'Atlanta', 'Georgia', 30312, '9093 Dorrit Crescent'),
(2, 'Atlanta', 'Georgia', 30312, '1438 White Horse Piece'),
(3, 'Atlanta', 'Georgia', 30312, '6823 Bornedene'),
(4, 'Atlanta', 'Georgia', 30312, '9550 Ramsey Side'),
(5, 'Atlanta', 'Georgia', 30312, '8669 Hare Pines'),
(6, 'Atlanta', 'Georgia', 30312, '8001 Peggieshill Road'),
(7, 'Atlanta', 'Georgia', 30312, '9493 Langdale Copse'),
(8, 'Atlanta', 'Georgia', 30312, '3093 Albion Wynd'),
(9, 'Atlanta', 'Georgia', 30312, '3984 Linnet Mill'),
(10, 'Atlanta', 'Georgia', 30312, '6968 Elgar Limes'),
(11, 'Atlanta', 'Georgia', 30312, '6521 Moor Hill Road'),
(12, 'Atlanta', 'Georgia', 30322, '1431 St James\'s Drove'),
(13, 'Atlanta', 'Georgia', 30322, '4163 Chequers Leas'),
(14, 'Atlanta', 'Georgia', 30322, '968 Canterbury Way'),
(15, 'Atlanta', 'Georgia', 30322, '2427 Moss Rowans'),
(16, 'Atlanta', 'Georgia', 30322, '6024 Allan Side'),
(17, 'Atlanta', 'Georgia', 30322, '2210 Fleet Leaze'),
(18, 'Atlanta', 'Georgia', 31873, '5563 Mill Hill Street'),
(19, 'Atlanta', 'Georgia', 31873, '1112 Grampian Down'),
(20, 'Atlanta', 'Georgia', 31873, '4688 East Central Drive'),
(21, 'Atlanta', 'Georgia', 31873, '6537 Bessbrook Road'),
(22, 'Atlanta', 'Georgia', 31873, '2616 Recreation Pines'),
(23, 'Decatur', 'Georgia', 33090, '6873 Fifth Manor'),
(24, 'Decatur', 'Georgia', 33090, '6696 Post Office Willows'),
(25, 'Decatur', 'Georgia', 33090, '8961 Kennedy Firs'),
(26, 'Decatur', 'Georgia', 33090, '5556 Selby Ride'),
(27, 'Decatur', 'Georgia', 33090, '7898 Melland Road'),
(28, 'Marietta', 'Georgia', 38899, '2245 Causeway By-Pass'),
(29, 'Marietta', 'Georgia', 38899, '3518 Maesteg Terrace'),
(30, 'Marietta', 'Georgia', 38899, '5037 Browns Drive'),
(31, 'Marietta', 'Georgia', 34999, '1294 Bells Wood Court'),
(32, 'Marietta', 'Georgia', 31111, '8526 Sandringham Banks'),
(33, 'Atlanta', 'Georgia', 30312, '7971 Anglesey Drift'),
(34, 'Atlanta', 'Georgia', 30312, '7912 Crown Terrace'),
(35, 'Atlanta', 'Georgia', 30312, '6491 Valley Corner'),
(36, 'Atlanta', 'Georgia', 30312, '5728 Southgate Royd'),
(37, 'Atlanta', 'Georgia', 30312, '2445 Garnlwyd Close'),
(38, 'Atlanta', 'Georgia', 30312, '1758 Hyde Grove'),
(39, 'Atlanta', 'Georgia', 30312, '8754 Brewery Oval'),
(40, 'Atlanta', 'Georgia', 30312, '6745 Archer Laurels'),
(41, 'Atlanta', 'Georgia', 30312, '6158 West View Village'),
(42, 'Atlanta', 'Georgia', 30312, '3758 Barley Brae'),
(43, 'Atlanta', 'Georgia', 30312, '6161 Belvedere Cottages'),
(44, 'Atlanta', 'Georgia', 30322, '1105 Lark Leas'),
(45, 'Atlanta', 'Georgia', 30322, '5165 Belton Hey'),
(46, 'Atlanta', 'Georgia', 30322, '1554 Adam Corner'),
(47, 'Atlanta', 'Georgia', 30322, '9097 Fisher Brook'),
(48, 'Atlanta', 'Georgia', 30322, '384 Andover Hollies'),
(49, 'Atlanta', 'Georgia', 30322, '378 Grant Brow'),
(50, 'Atlanta', 'Georgia', 31873, '4716 Warrington Newydd'),
(51, 'Atlanta', 'Georgia', 31873, '2618 Silverdale Wharf'),
(52, 'Atlanta', 'Georgia', 31873, '3424 Backsands Lane'),
(53, 'Atlanta', 'Georgia', 31873, '8505 Netherfield Dene'),
(54, 'Atlanta', 'Georgia', 31873, '7158 Windings Road'),
(55, 'Decatur', 'Georgia', 33090, '1338 Byker Street'),
(56, 'Decatur', 'Georgia', 33090, '8134 Anglesey Ride'),
(57, 'Decatur', 'Georgia', 33090, '4769 Moorlands Leaze'),
(58, 'Decatur', 'Georgia', 33090, '782 Gipton Gate East'),
(59, 'Decatur', 'Georgia', 33090, '6953 Marina Paddocks'),
(60, 'Marietta', 'Georgia', 38899, '9923 Brackley Drove'),
(61, 'Marietta', 'Georgia', 38899, '4933 Godbold Road'),
(62, 'Marietta', 'Georgia', 38899, '1203 Frogmire Close'),
(63, 'Marietta', 'Georgia', 34999, '742 Vaughan Pines'),
(64, 'Marietta', 'Georgia', 31111, '8261 Parkside East'),
(65, 'Atlanta', 'Georgia', 30312, '8328 Montpelier Newydd'),
(66, 'Atlanta', 'Georgia', 30312, '8897 Bell Weir Close'),
(67, 'Atlanta', 'Georgia', 30312, '4490 Fourth Field');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `username` varchar(64) NOT NULL,
  `phone` char(16) NOT NULL,
  `address` int(11) DEFAULT NULL,
  `default_payment` varchar(16) NOT NULL,
  `default_store_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`username`, `phone`, `address`, `default_payment`, `default_store_id`) VALUES
('adepttimberry', '404887516', 32, 'Debt', 1),
('admirableneville', '404888765', 16, 'Check', 2),
('bossywilfer', '404914121', 22, 'American Express', 3),
('bowedhannibal', '404654644', 31, 'Debt', 4),
('breakabletim', '404215927', 27, 'American Express', 5),
('coldsnewkes', '404466738', 1, 'Visa', 6),
('corruptbayton', '404527538', 7, 'American Express', 7),
('dazzlingjohnny', '404941865', 9, 'Check', 8),
('decimalherbert', '404227614', 20, 'Check', 9),
('disfiguredalderman', '404919615', 29, 'Visa', 10),
('fainthannah', '404249388', 30, 'Check', 10),
('firmdedlock', '404948828', 12, 'Check', 10),
('freshpeltirogus', '404544358', 23, 'American Express', 13),
('frightenedsmallweed', '404229474', 5, 'Debt', 14),
('hurriedplornish', '404625333', 17, 'American Express', 8),
('inactivejane', '404689185', 21, 'American Express', 16),
('maddeningfladdock', '404181323', 14, 'Debt', 17),
('marvelousjinkins', '404488296', 19, 'Debt', 9),
('melodicsparkler', '404848816', 11, 'American Express', 9),
('noxiousmould', '404794841', 15, 'American Express', 9),
('putridsnagsby', '404445867', 18, 'Visa', 9),
('rowdysteerforth', '404457524', 28, 'Check', 22),
('sablemagnus', '404931126', 26, 'Visa', 23),
('severelucy', '404737581', 2, 'Debt', 22),
('snobbymorleena', '404241411', 24, 'Visa', 2),
('tastyadams', '404735117', 25, 'Check', 22),
('torpidkenge', '404884464', 13, 'Visa', 2),
('unwrittensloppy', '404931962', 8, 'Visa', 22),
('vitalbetty', '404834647', 3, 'Check', 29),
('welcomeleicester', '404376223', 4, 'American Express', 30),
('wellmadeconkey', '404873273', 10, 'American Express', 35);

-- --------------------------------------------------------

--
-- Table structure for table `deliveredby`
--

CREATE TABLE `deliveredby` (
  `order_id` int(8) NOT NULL,
  `deliverer_username` varchar(64) NOT NULL,
  `is_delivered` tinyint(1) NOT NULL,
  `delivery_time` varchar(16) DEFAULT NULL,
  `delivery_date` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveredby`
--

INSERT INTO `deliveredby` (`order_id`, `deliverer_username`, `is_delivered`, `delivery_time`, `delivery_date`) VALUES
(13075, 'chivalrouspotatoes', 1, '12:05', '2019-07-02'),
(17466, 'spiffyjudith', 0, NULL, NULL),
(20958, 'chivalrouspotatoes', 1, '15:35', '2019-07-07'),
(23231, 'chivalrouspotatoes', 1, '14:50', '2019-07-04'),
(24784, 'chivalrouspotatoes', 1, '18:25', '2019-07-14'),
(31354, 'twinchicken', 0, NULL, NULL),
(31541, 'teenyroads', 0, NULL, NULL),
(32787, 'chivalrouspotatoes', 1, '17:25', '2019-07-10'),
(33861, 'chivalrouspotatoes', 1, '15:35', '2019-07-01'),
(34346, 'stylishtowlinson', 0, NULL, NULL),
(36188, 'chivalrouspotatoes', 1, '05:35', '2019-07-14'),
(40389, 'twinchicken', 0, NULL, NULL),
(46403, 'chivalrouspotatoes', 1, '10:40', '2019-07-12'),
(47215, 'inventivenickleby', 1, '13:25', '2019-07-04'),
(47361, 'reasonablewrayburn', 1, '12:15', '2019-07-12'),
(59856, 'chivalrouspotatoes', 1, '11:30', '2019-07-01'),
(62224, 'chivalrouspotatoes', 1, '10:15', '2019-07-05'),
(63145, 'shadowywestlock', 0, NULL, NULL),
(64677, 'chivalrouspotatoes', 1, '10:57', '2019-07-13'),
(65334, 'downrightcorney', 1, '22:15', '2019-07-01'),
(67217, 'languidtopsawyer', 1, '09:35', '2019-07-13'),
(68211, 'methodicalcharity', 1, '15:40', '2019-07-11'),
(68759, 'chivalrouspotatoes', 1, '19:05', '2019-07-01'),
(71533, 'chivalrouspotatoes', 1, '20:25', '2019-07-08'),
(72039, 'glumsmike', 1, '12:40', '2019-07-03'),
(78318, 'unknownswidger', 0, NULL, NULL),
(80145, 'chivalrouspotatoes', 1, '20:00', '2019-07-11'),
(81845, 'reasonablewrayburn', 0, NULL, NULL),
(87232, 'teenyroads', 0, NULL, NULL),
(87897, 'teenyroads', 0, NULL, NULL),
(92049, 'chivalrouspotatoes', 1, '10:20', '2019-07-03'),
(94516, 'stylishtowlinson', 0, NULL, NULL),
(96079, 'chivalrouspotatoes', 1, '02:40', '2017-07-14'),
(96350, 'stylishtowlinson', 0, NULL, NULL),
(99511, 'reasonablewrayburn', 1, '12:35', '2017-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `grocerystore`
--

CREATE TABLE `grocerystore` (
  `store_id` int(2) NOT NULL,
  `store_name` varchar(16) NOT NULL,
  `address_id` int(2) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `phone` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grocerystore`
--

INSERT INTO `grocerystore` (`store_id`, `store_name`, `address_id`, `opening_time`, `closing_time`, `phone`) VALUES
(1, 'Publix ', 33, '06:00:00', '05:20:00', '6445119852'),
(2, 'Publix ', 34, '06:05:00', '06:05:00', '5793205609'),
(3, 'Publix ', 35, '06:20:00', '06:15:00', '2256640936'),
(4, 'Publix ', 36, '06:45:00', '07:15:00', '7972476937'),
(5, 'Publix ', 37, '07:40:00', '07:35:00', '6028201944'),
(6, 'Publix ', 38, '08:00:00', '08:05:00', '9099566005'),
(7, 'Publix ', 39, '08:10:00', '08:45:00', '3674680760'),
(8, 'Kroger', 40, '08:15:00', '09:10:00', '6673099641'),
(9, 'Kroger', 41, '08:50:00', '09:20:00', '9873883807'),
(10, 'Kroger', 42, '08:55:00', '09:50:00', '5978516107'),
(11, 'Kroger', 43, '09:05:00', '11:05:00', '9953513489'),
(12, 'Kroger', 44, '09:40:00', '11:15:00', '3987590108'),
(13, 'Kroger', 45, '09:50:00', '11:20:00', '9598997019'),
(14, 'Whole Foods', 46, '10:25:00', '11:25:00', '4174612109'),
(15, 'Whole Foods', 47, '10:30:00', '11:30:00', '7568563917'),
(16, 'Sprouts', 48, '10:35:00', '11:40:00', '5526840452'),
(17, 'Sprouts', 49, '11:05:00', '11:45:00', '2992324086'),
(18, 'Piggly Wiggly', 50, '11:50:00', '12:10:00', '4227524132'),
(19, 'Walmart', 51, '12:00:00', '12:35:00', '6447655890'),
(20, 'Walmart', 52, '12:10:00', '13:55:00', '4722211749'),
(21, 'Target', 53, '12:40:00', '14:00:00', '2215141847'),
(22, 'Target', 54, '12:45:00', '14:05:00', '6038604265'),
(23, 'Aldi', 55, '14:25:00', '14:25:00', '5944719741'),
(24, 'Aldi', 56, '14:50:00', '15:45:00', '3214372158'),
(25, 'Aldi', 57, '15:10:00', '16:05:00', '4584491073'),
(26, 'Winndixie', 58, '15:15:00', '16:15:00', '8288693331'),
(27, 'Sams', 59, '17:00:00', '17:35:00', '8466490485'),
(28, 'Sams', 60, '17:30:00', '17:50:00', '2678220931'),
(29, 'Sams', 61, '18:10:00', '18:00:00', '4135804574'),
(30, 'Sams', 62, '18:45:00', '18:05:00', '7798879185'),
(31, 'Costco', 63, '18:50:00', '19:15:00', '4995330373'),
(32, 'Costco', 64, '18:55:00', '19:20:00', '3389838241'),
(33, 'Costco', 65, '19:15:00', '19:35:00', '3426825578'),
(34, 'Trader Joes', 66, '20:00:00', '20:05:00', '7266703506'),
(35, 'Trader Joes ', 67, '20:35:00', '20:40:00', '2578136712');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(2) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `food_group` varchar(16) NOT NULL,
  `exp_date` varchar(16) NOT NULL,
  `quantity` int(8) NOT NULL,
  `listed_price` decimal(8,2) NOT NULL,
  `wholesale_price` decimal(8,2) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `food_group`, `exp_date`, `quantity`, `listed_price`, `wholesale_price`, `description`) VALUES
(1, 'guavas', 'Produce', '2023-02-27', 3, '14.54', '6.19', '3 items of guava fruit'),
(2, 'wild rice', 'Others', '2023-04-14', 1, '21.99', '22.78', '1 bag of wild rice'),
(3, 'cilantro', 'Produce', '2024-06-12', 1, '23.26', '7.99', '1 bush of cilantro'),
(4, 'Irish cream liqueur', 'Beverages', '2024-10-24', 7, '10.42', '11.28', '7 pack of irish creme liqueor'),
(5, 'tomato sauce', 'Canned Goods', '2025-05-28', 7, '15.50', '22.90', '7 cans'),
(6, 'flax seed', 'Others', '2025-10-20', 6, '16.41', '14.12', '6 pouches of flax seed'),
(7, 'romaine lettuce', 'Produce', '2026-03-04', 1, '16.77', '7.29', '1 bunch of romaine lettuce'),
(8, 'pomegranates', 'Produce', '2026-06-01', 1, '7.89', '5.32', '1 pomegranate'),
(9, 'bok choy', 'Produce', '2027-02-02', 8, '17.62', '6.83', '8 bok choy'),
(10, 'tarragon', 'Others', '2027-11-25', 10, '6.11', '11.85', '10 tarragon packets'),
(11, 'mayonnaise', 'Dairy', '2028-02-03', 11, '18.57', '5.12', '11 mini mayonnaise packets'),
(12, 'cloves', 'Others', '2028-10-26', 2, '7.77', '9.47', '2 cloves'),
(13, 'allspice', 'Others', '2029-11-26', 10, '1.66', '6.91', '10 packets of allspice'),
(14, 'cherries', 'Produce', '2030-07-31', 8, '17.96', '5.17', '8 cherries'),
(15, 'tuna', 'Meat', '2030-12-23', 4, '12.91', '2.76', '4 fresh tuna steaks'),
(16, 'ale', 'Beverages', '2032-01-07', 5, '2.06', '5.41', '5 bottles of ale'),
(17, 'beets', 'Produce', '2032-01-09', 12, '5.37', '16.67', '12 beets'),
(18, 'lemon juice', 'Beverages', '2033-08-16', 6, '21.79', '7.86', '6 bottles of lemon juice'),
(19, 'cod', 'Meat', '2033-11-23', 5, '1.65', '19.76', '5 slabs of cod fish'),
(20, 'bean sprouts', 'Produce', '2034-01-05', 12, '20.85', '22.80', '12 sprouts of bean'),
(21, 'Worcestershire sauce', 'Beverages', '2035-03-21', 7, '4.73', '5.46', '7 bottles'),
(22, 'date sugar', 'Baking Goods', '2035-06-27', 6, '9.34', '21.42', '6 packets of date sugar'),
(23, 'sweet chili sauce', 'Beverages', '2035-11-30', 4, '1.74', '20.82', '4 bottles'),
(24, 'sardines', 'Meat', '2036-10-16', 9, '6.82', '14.54', '9 fresh canned sardines'),
(25, 'octopus', 'Meat', '2036-12-19', 6, '2.62', '24.87', '6 octopus legs'),
(26, 'Canadian bacon', 'Meat', '2022-08-25', 11, '18.23', '2.29', '11 slices of bacon'),
(27, 'mascarpone', 'Daiy', '2023-01-13', 7, '5.50', '9.19', '7 packets of mascarpone'),
(28, 'pork', 'Meat', '2023-07-19', 9, '10.03', '11.17', '9 pieces of pork'),
(29, 'sweet peppers', 'Produce', '2023-08-03', 3, '17.44', '19.38', '3 sweet pepers'),
(30, 'pecans', 'Others', '2023-12-18', 2, '13.45', '6.74', '2 pecans'),
(31, 'rosemary', 'Produce', '2024-10-25', 7, '8.71', '21.93', '7 branches of rosemary'),
(32, 'beef', 'Meat', '2025-11-26', 7, '4.25', '9.62', '7 packets of ground beef'),
(33, 'anchovies', 'Meat', '2026-10-15', 8, '17.96', '9.88', '8 anchovies in can'),
(34, 'spaghetti squash', 'Produce', '2029-01-10', 7, '2.67', '12.55', '7 spaghetti squashes'),
(35, 'cannellini beans', 'Canned Goods', '2029-02-28', 9, '7.16', '9.30', '9 cans of beans'),
(36, 'Romano cheese', 'Dairy', '2029-04-20', 8, '16.75', '12.65', '8 oz of romano cheese'),
(37, 'cooking wine', 'Beverages', '2029-12-06', 11, '14.93', '17.83', '11 mini bottles of white cooking wine'),
(38, 'peanuts', 'Others', '2030-05-22', 1, '3.33', '6.53', '1 penut'),
(39, 'crabs', 'Meat', '2030-12-20', 4, '17.33', '22.14', '4 live crabs '),
(40, 'mozzarella', 'Dairy', '2032-01-30', 5, '2.98', '6.60', '5 mozzarella balls'),
(41, 'vermouth', 'Beverages', '2032-08-13', 11, '2.04', '3.59', '11 mini bottles of vermouth'),
(42, 'cranberries', 'Produce', '2032-10-01', 8, '13.45', '23.17', '8 cranberries'),
(43, 'barley sugar', 'Baking Goods', '2032-11-04', 12, '10.88', '21.82', '12 bags of barley sugar'),
(44, 'zest', 'Others', '2034-12-12', 8, '1.85', '12.49', '8 containers of lemon zest'),
(45, 'baguette', 'Others', '2034-12-25', 10, '15.67', '16.36', '10 baguettes'),
(46, 'sour cream', 'Dairy', '2035-01-10', 7, '24.21', '3.75', '7 containers of sour creme'),
(47, 'prosciutto', 'Meat', '2035-05-18', 11, '8.17', '23.18', '11 slices of prosciutto'),
(48, 'Kahlua', 'Beverages', '2035-07-18', 9, '6.99', '11.62', '9 mini bottles of Kahlua'),
(49, 'squid', 'Meat', '2036-01-16', 11, '2.34', '5.74', '11 live baby squids'),
(50, 'papayas', 'Produce', '2036-03-25', 8, '21.59', '18.33', '8 mini papayas');

-- --------------------------------------------------------

--
-- Table structure for table `manages`
--

CREATE TABLE `manages` (
  `username` varchar(64) NOT NULL,
  `store_address` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manages`
--

INSERT INTO `manages` (`username`, `store_address`) VALUES
('adidaslawrencium', 55),
('amazonzirconium', 42),
('batmanisbetterthanmoonknight', 67),
('boeingaluminum', 61),
('burberrycopper', 64),
('canonxenon', 63),
('chaneliridium', 44),
('chevroletberyllium', 47),
('ciscocobalt', 51),
('colgatesulfur', 40),
('colorlessabbey', 33),
('exxonindium', 49),
('facebookoxygen', 38),
('fordlead', 62),
('foxbarium', 53),
('gillettetellurium', 59),
('guccinickel', 48),
('heinekenplatinum', 56),
('heinzrutherfordium', 45),
('hyundaimeitnerium', 39),
('lancomegermanium', 52),
('legothorium', 66),
('lexuslanthanum', 60),
('malboroneodymium', 65),
('mcdonaldssodium', 41),
('nescafeselenium', 43),
('optimalpluck', 34),
('pepsisilicon', 37),
('pradaphosphorus', 50),
('quickestmortimer', 35),
('rolexfluorine', 57),
('smoothbetsy', 36),
('starbucksrhenium', 54),
('toyotacarbon', 58),
('visahafnium', 46);

-- --------------------------------------------------------

--
-- Table structure for table `orderedby`
--

CREATE TABLE `orderedby` (
  `order_id` int(8) NOT NULL,
  `buyer_username` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderedby`
--

INSERT INTO `orderedby` (`order_id`, `buyer_username`) VALUES
(62224, 'adepttimberry'),
(64677, 'adepttimberry'),
(71533, 'coldsnewkes'),
(33861, 'corruptbayton'),
(96079, 'corruptbayton'),
(23231, 'dazzlingjohnny'),
(13075, 'decimalherbert'),
(32787, 'decimalherbert'),
(36188, 'firmdedlock'),
(68759, 'firmdedlock'),
(24784, 'freshpeltirogus'),
(59856, 'frightenedsmallweed'),
(20958, 'hurriedplornish'),
(80145, 'hurriedplornish'),
(92049, 'hurriedplornish'),
(46403, 'inactivejane'),
(65334, 'maddeningfladdock'),
(72039, 'maddeningfladdock'),
(47215, 'melodicsparkler'),
(68211, 'rowdysteerforth'),
(47361, 'sablemagnus'),
(67217, 'sablemagnus'),
(81845, 'sablemagnus'),
(99511, 'sablemagnus'),
(17466, 'severelucy'),
(63145, 'severelucy'),
(34346, 'snobbymorleena'),
(96350, 'snobbymorleena'),
(31541, 'tastyadams'),
(87232, 'tastyadams'),
(94516, 'tastyadams'),
(31354, 'torpidkenge'),
(40389, 'torpidkenge'),
(87897, 'torpidkenge'),
(78318, 'unwrittensloppy');

-- --------------------------------------------------------

--
-- Table structure for table `orderfrom`
--

CREATE TABLE `orderfrom` (
  `store_id` int(11) DEFAULT NULL,
  `order_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderfrom`
--

INSERT INTO `orderfrom` (`store_id`, `order_id`) VALUES
(1, 40389),
(1, 46403),
(2, 23231),
(2, 31541),
(2, 47361),
(2, 80145),
(2, 96079),
(2, 99511),
(6, 33861),
(6, 68211),
(13, 64677),
(13, 72039),
(15, 13075),
(15, 81845),
(16, 31354),
(16, 47215),
(16, 62224),
(16, 65334),
(17, 20958),
(17, 87897),
(19, 24784),
(19, 96350),
(20, 32787),
(20, 63145),
(20, 87232),
(20, 92049),
(24, 59856),
(24, 78318),
(24, 94516),
(26, 34346),
(26, 68759),
(29, 67217),
(29, 71533),
(31, 17466),
(31, 36188);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(8) NOT NULL,
  `delivery_instructions` varchar(256) DEFAULT NULL,
  `delivery_time` varchar(16) NOT NULL,
  `order_placed_date` varchar(16) NOT NULL,
  `order_placed_time` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `delivery_instructions`, `delivery_time`, `order_placed_date`, `order_placed_time`) VALUES
(13075, NULL, 'ASAP', '2019-07-10', '06:05'),
(17466, NULL, '1', '2019-07-12', '15:35'),
(20958, 'I have a party at 4 please hurry ', '2', '2019-07-06', '09:35'),
(23231, 'avoid dog', '3', '2019-07-03', '05:50'),
(24784, 'thank you!', '4', '2019-07-01', '07:25'),
(31354, NULL, '5', '2019-07-06', '21:20'),
(31541, NULL, '10', '2019-07-08', '17:15'),
(32787, 'violent dog on property, leave in mailbox', '12', '2019-07-06', '06:25'),
(33861, 'ring bell', '24', '2019-07-09', '05:35'),
(34346, 'please bring me fruit', 'ASAP', '2019-07-07', '15:55'),
(36188, NULL, '1', '2019-07-10', '06:35'),
(40389, NULL, '2', '2019-07-12', '20:40'),
(46403, NULL, '3', '2019-07-02', '09:40'),
(47215, NULL, '4', '2019-07-07', '11:25'),
(47361, 'sos', 'ASAP', '2019-07-04', '14:15'),
(59856, NULL, '10', '2019-07-14', '08:30'),
(62224, NULL, '12', '2019-07-10', '05:15'),
(63145, 'I haven\'t eaten in days', 'ASAP', '2019-07-01', '15:00'),
(64677, 'leave at door', 'ASAP', '2019-07-14', '05:10'),
(65334, 'Please keep meat separate from the rest.', 'ASAP', '2019-07-12', '10:15'),
(67217, NULL, '2', '2019-07-04', '11:35'),
(68211, 'no rush', 'ASAP', '2019-07-12', '11:40'),
(68759, 'All the icecream in the same bag please.', '4', '2019-07-01', '07:05'),
(71533, NULL, '5', '2019-07-05', '05:25'),
(72039, NULL, 'ASAP', '2019-07-13', '10:40'),
(78318, 'Thanks', 'ASAP', '2019-07-01', '21:25'),
(80145, 'no rush', 'ASAP', '2019-07-13', '09:00'),
(81845, NULL, 'ASAP', '2019-07-11', '14:55'),
(87232, NULL, '1', '2019-07-01', '18:30'),
(87897, 'I won\'t be home, leave at front door please.', 'ASAP', '2019-07-08', '19:45'),
(92049, NULL, '3', '2019-07-03', '09:20'),
(94516, 'if there\'s meat, don\'t let it get bad please. If you have a cooler, use it please.', '4', '2019-07-11', '16:50'),
(96079, NULL, '5', '2019-07-03', '05:40'),
(96350, NULL, '10', '2017-07-13', '16:45'),
(99511, NULL, 'ASAP', '2017-07-01', '12:05');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `username` varchar(64) NOT NULL,
  `payment_name` varchar(16) NOT NULL,
  `account_number` int(16) NOT NULL,
  `routing_number` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`username`, `payment_name`, `account_number`, `routing_number`) VALUES
('adepttimberry', 'Check', 229335769, 393586216),
('adepttimberry', 'Debt', 224136735, 985947465),
('adepttimberry', 'Visa', 453433338, 475782796),
('admirableneville', 'American Express', 548461883, 936566668),
('admirableneville', 'Check', 859232841, 547162669),
('admirableneville', 'Debt', 443396684, 118153385),
('admirableneville', 'Visa', 938225167, 937188583),
('bossywilfer', 'American Express', 178845786, 969972661),
('bossywilfer', 'Check', 752845415, 255275576),
('bossywilfer', 'Debt', 727423569, 816895789),
('bowedhannibal', 'American Express', 391757451, 262514815),
('bowedhannibal', 'Check', 268541329, 459319425),
('bowedhannibal', 'Debt', 275233278, 828241964),
('bowedhannibal', 'Visa', 711934578, 654199468),
('breakabletim', 'Visa', 479843748, 768442374),
('coldsnewkes', 'American Express', 276637386, 645336717),
('coldsnewkes', 'Debt', 978726843, 293343249),
('coldsnewkes', 'Visa', 419453712, 436877981),
('corruptbayton', 'American Express', 447648956, 369827941),
('corruptbayton', 'Check', 329113184, 561251217),
('corruptbayton', 'Debt', 254367721, 433241274),
('corruptbayton', 'Visa', 393799114, 738933914),
('dazzlingjohnny', 'American Express', 868614372, 586699572),
('dazzlingjohnny', 'Check', 434983631, 996114538),
('dazzlingjohnny', 'Debt', 453677155, 151621565),
('dazzlingjohnny', 'Visa', 244557625, 475358558),
('decimalherbert', 'American Express', 738496917, 989719129),
('decimalherbert', 'Check', 674693568, 497618842),
('decimalherbert', 'Visa', 134237263, 412831959),
('disfiguredalderman', 'American Express', 374186112, 274366889),
('disfiguredalderman', 'Check', 939936896, 548117728),
('disfiguredalderman', 'Visa', 185826867, 365341381),
('fainthannah', 'American Express', 623393852, 582918438),
('fainthannah', 'Check', 569493633, 725291753),
('firmdedlock', 'American Express', 877635171, 713989575),
('firmdedlock', 'Debt', 935488427, 147862112),
('freshpeltirogus', 'American Express', 265211653, 728361669),
('freshpeltirogus', 'Check', 288665872, 313144366),
('freshpeltirogus', 'Debt', 857537257, 283269352),
('frightenedsmallweed', 'American Express', 676595568, 614746883),
('frightenedsmallweed', 'Check', 592111452, 482788459),
('frightenedsmallweed', 'Debt', 968138394, 827692322),
('frightenedsmallweed', 'Visa', 274898237, 495524479),
('hurriedplornish', 'American Express', 339197231, 348799723),
('hurriedplornish', 'Check', 392235583, 954825597),
('hurriedplornish', 'Debt', 636222285, 626825869),
('hurriedplornish', 'Visa', 559157981, 465223522),
('inactivejane', 'American Express', 162265883, 271417791),
('inactivejane', 'Check', 521585611, 899182865),
('inactivejane', 'Debt', 952371439, 138921459),
('inactivejane', 'Visa', 552386235, 989976499),
('maddeningfladdock', 'American Express', 892855416, 915375484),
('maddeningfladdock', 'Check', 422985657, 245546988),
('maddeningfladdock', 'Visa', 382514276, 667231128),
('marvelousjinkins', 'American Express', 141432932, 995816235),
('marvelousjinkins', 'Check', 559373265, 617477844),
('marvelousjinkins', 'Debt', 214289528, 792556368),
('marvelousjinkins', 'Visa', 861589815, 843923475),
('melodicsparkler', 'American Express', 458648683, 261822483),
('melodicsparkler', 'Check', 631399139, 516682724),
('melodicsparkler', 'Visa', 613512645, 653913937),
('noxiousmould', 'American Express', 478788349, 562413535),
('noxiousmould', 'Check', 534451118, 756313563),
('noxiousmould', 'Visa', 139619193, 547863657),
('putridsnagsby', 'American Express', 714574527, 372879695),
('putridsnagsby', 'Check', 216352256, 878542628),
('putridsnagsby', 'Debt', 986516321, 897499545),
('putridsnagsby', 'Visa', 255816926, 145641359),
('rowdysteerforth', 'Visa', 888732334, 397579182),
('sablemagnus', 'American Express', 152577638, 136557188),
('sablemagnus', 'Check', 336333515, 611199514),
('sablemagnus', 'Visa', 784736441, 776622738),
('severelucy', 'American Express', 162488547, 359184544),
('severelucy', 'Visa', 744548525, 656379928),
('snobbymorleena', 'American Express', 817749893, 815527188),
('snobbymorleena', 'Check', 939523859, 488463677),
('snobbymorleena', 'Visa', 183397537, 886223992),
('tastyadams', 'American Express', 612115324, 582579615),
('tastyadams', 'Check', 196122283, 919732316),
('tastyadams', 'Debt', 289127723, 217655562),
('tastyadams', 'Visa', 844181254, 295127233),
('torpidkenge', 'American Express', 559873792, 229153196),
('torpidkenge', 'Check', 287271886, 427673487),
('torpidkenge', 'Debt', 431996582, 541642496),
('torpidkenge', 'Visa', 936913267, 972877989),
('unwrittensloppy', 'American Express', 557898165, 128163653),
('unwrittensloppy', 'Check', 964244214, 751917793),
('unwrittensloppy', 'Debt', 933685543, 421876248),
('unwrittensloppy', 'Visa', 378863772, 781731763),
('vitalbetty', 'Visa', 956166741, 125682616),
('welcomeleicester', 'American Express', 693824943, 258692133),
('wellmadeconkey', 'American Express', 585893344, 938262118),
('woozyprice', 'Check', 439687975, 816246288),
('woozyprice', 'Debt', 654574336, 647211239);

-- --------------------------------------------------------

--
-- Table structure for table `selectitem`
--

CREATE TABLE `selectitem` (
  `item_id` int(2) NOT NULL,
  `quantity` int(8) NOT NULL,
  `order_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selectitem`
--

INSERT INTO `selectitem` (`item_id`, `quantity`, `order_id`) VALUES
(1, 14, 17466),
(1, 8, 46403),
(1, 14, 71533),
(1, 13, 94516),
(2, 13, 36188),
(2, 1, 68211),
(2, 15, 72039),
(3, 3, 36188),
(3, 3, 46403),
(3, 15, 47215),
(5, 1, 47215),
(5, 12, 71533),
(5, 10, 96079),
(6, 9, 81845),
(7, 14, 36188),
(7, 3, 46403),
(7, 15, 62224),
(8, 1, 34346),
(8, 4, 46403),
(11, 6, 47361),
(12, 1, 32787),
(12, 6, 64677),
(13, 3, 59856),
(13, 9, 80145),
(14, 9, 36188),
(14, 4, 67217),
(14, 5, 78318),
(15, 4, 23231),
(15, 1, 81845),
(15, 13, 96350),
(16, 1, 23231),
(16, 4, 87897),
(18, 6, 20958),
(18, 8, 68759),
(18, 2, 87232),
(19, 6, 62224),
(19, 12, 71533),
(20, 1, 23231),
(20, 11, 36188),
(20, 7, 46403),
(20, 6, 81845),
(21, 5, 23231),
(21, 2, 33861),
(21, 13, 36188),
(21, 10, 47215),
(22, 13, 23231),
(22, 5, 59856),
(22, 2, 71533),
(22, 13, 92049),
(23, 8, 13075),
(23, 8, 36188),
(23, 5, 46403),
(23, 10, 96079),
(24, 9, 23231),
(24, 13, 71533),
(25, 5, 24784),
(25, 4, 40389),
(25, 8, 59856),
(25, 11, 71533),
(26, 12, 81845),
(27, 7, 36188),
(27, 3, 81845),
(28, 13, 87897),
(29, 8, 34346),
(29, 4, 36188),
(29, 8, 59856),
(29, 3, 81845),
(30, 6, 64677),
(32, 2, 23231),
(32, 3, 36188),
(32, 13, 63145),
(33, 3, 13075),
(33, 4, 36188),
(34, 1, 13075),
(36, 5, 47215),
(36, 12, 81845),
(36, 13, 87897),
(37, 5, 23231),
(37, 5, 34346),
(37, 10, 36188),
(38, 2, 13075),
(38, 12, 59856),
(38, 13, 96079),
(39, 1, 31541),
(39, 9, 46403),
(39, 13, 47215),
(39, 11, 71533),
(40, 15, 23231),
(40, 7, 34346),
(41, 5, 87897),
(41, 10, 99511),
(42, 11, 71533),
(43, 12, 59856),
(43, 3, 64677),
(44, 4, 31354),
(44, 15, 59856),
(45, 12, 34346),
(45, 15, 46403),
(45, 3, 64677),
(46, 5, 23231),
(46, 11, 87897),
(48, 7, 34346),
(49, 9, 46403),
(49, 9, 65334),
(49, 15, 96079),
(50, 13, 62224),
(50, 4, 96079);

-- --------------------------------------------------------

--
-- Table structure for table `soldat`
--

CREATE TABLE `soldat` (
  `item_id` int(2) NOT NULL,
  `store_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soldat`
--

INSERT INTO `soldat` (`item_id`, `store_id`) VALUES
(1, 13),
(2, 16),
(3, 13),
(4, 16),
(5, 29),
(6, 6),
(7, 2),
(8, 2),
(9, 15),
(10, 20),
(11, 31),
(12, 26),
(13, 19),
(14, 24),
(15, 2),
(16, 20),
(17, 17),
(18, 1),
(19, 16),
(20, 24),
(21, 13),
(22, 24),
(23, 8),
(24, 17),
(25, 27),
(26, 10),
(27, 20),
(28, 22),
(29, 30),
(30, 26),
(31, 14),
(33, 4),
(33, 7),
(33, 9),
(33, 17),
(33, 18),
(34, 4),
(35, 24),
(36, 8),
(37, 17),
(38, 10),
(38, 27),
(39, 20),
(39, 22),
(39, 26),
(39, 30),
(40, 14),
(41, 17),
(42, 4),
(43, 13),
(44, 16),
(45, 29),
(46, 6),
(47, 2),
(48, 2),
(49, 15),
(50, 20);

-- --------------------------------------------------------

--
-- Table structure for table `systeminformation`
--

CREATE TABLE `systeminformation` (
  `system_id` int(2) NOT NULL,
  `user_codes` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systeminformation`
--

INSERT INTO `systeminformation` (`system_id`, `user_codes`) VALUES
(0, 123456789),
(1, 777888999);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(64) NOT NULL,
  `user_password` varchar(20) DEFAULT NULL,
  `user_type` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `user_password`, `user_type`, `email`, `first_name`, `last_name`) VALUES
('adepttimberry', 'cakeholmium', 'buyer', 'dingconie@gmail.com', 'Ganizani', 'States'),
('adidaslawrencium', 'ibmpalladium', 'manager', 'adidaslawrencium@comcast.net', 'Alberich', 'Fauroat'),
('admirableneville', 'apricotsscandium', 'buyer', 'fripperychamois@yahoo.com', 'Wolfgang', 'Stranberg'),
('amazonzirconium', 'dellyttrium', 'manager', 'amazonzirconium@ua.edu', 'Bartholomei', 'Holm'),
('batmanisbetterthanmoonknight', 'duhduhduh', 'manager', 'batmanisbetterthanmoonknight@ofcourse.yeah', 'Bruce', 'Campbell'),
('boeingaluminum', 'nescafeiodine', 'manager', 'boeingaluminum@gmail.com', 'Niga', 'Sacchetti'),
('bossywilfer', 'bagelsantimony', 'buyer', 'magmacoyote@comcast.net', 'Fintan', 'Lewis'),
('bowedhannibal', 'polentahafnium', 'buyer', 'rhubarbcheetah@ua.edu', 'Tempest', 'Donnerstein'),
('breakabletim', 'milkshakestin', 'buyer', 'manholeiguana@gmail.com', 'Nakato', 'Matlock'),
('burberrycopper', 'guccihydrogen', 'manager', 'burberrycopper@gmail.com', 'Nereus', 'Kearns'),
('canonxenon', 'ikearadium', 'manager', 'canonxenon@ua.edu', 'Duri', 'Glazer'),
('chaneliridium', 'microsoftactinium', 'manager', 'chaneliridium@ua.edu', 'Dragos', 'Shephard'),
('chevroletberyllium', 'kellogsterbium', 'manager', 'chevroletberyllium@ua.edu', 'Adrian', 'Chayes'),
('chivalrouspotatoes', 'clamcarbon', 'deliverer', 'pratfallwhiting@gmail.com', 'Clio', 'Allitto'),
('ciscocobalt', 'santandercesium', 'manager', 'ciscocobalt@gmail.com', 'Manuela', 'Saivetz'),
('coldsnewkes', 'oilstrontium', 'buyer', 'lozengecattle@ua.edu', 'Eurydike', 'Saar'),
('colgatesulfur', 'volkswagonholmium', 'manager', 'colgatesulfur@gmail.com', 'Benedict', 'Reinhardt'),
('colorlessabbey', 'mayonnaisemeitnerium', 'manager', 'noodleschimpanzee@gmail.com', 'Blythe', 'Aiken'),
('corruptbayton', 'garliccerium', 'buyer', 'crudivorebarracuda@gmail.com', 'Joonas', 'Larkin'),
('dazzlingjohnny', 'doughnutaluminum', 'buyer', 'rickshawtoucan@gmail.com', 'Elmas', 'Davenport'),
('decimalherbert', 'riceuranium', 'buyer', 'bloviatecardinal@yahoo.com', 'Sawyer', 'Baltz'),
('disfiguredalderman', 'chileerbium', 'buyer', 'flannelcurlew@yahoo.com', 'Rajendra', 'Wicks'),
('downrightcorney', 'basmatiphosphorus', 'deliverer', 'pantsdunlin@gmail.com', 'Katerina', 'Rowse'),
('exxonindium', 'cartiercalifornium', 'manager', 'exxonindium@gmail.com', 'Wairimu', 'Wiske'),
('facebookoxygen', 'chaseiodine', 'manager', 'facebookoxygen@comcast.net', 'Tiburcio', 'Lans'),
('fainthannah', 'oatmealgold', 'buyer', 'fardsandpiper@gmail.com', 'Petronela', 'Kelvin'),
('firmdedlock', 'lardpalladium', 'buyer', 'poppysmicgoose@gmail.com', 'Bilyana', 'Cuthbertson'),
('fordlead', 'nissanindium', 'manager', 'fordlead@gmail.com', 'Geronimo', 'Sobol'),
('foxbarium', 'colauranium', 'manager', 'foxbarium@gmail.com', 'Ernust', 'Nupdal'),
('freshpeltirogus', 'caviardubnium', 'buyer', 'gashbaboon@yahoo.com', 'Haig', 'Heyde'),
('frightenedsmallweed', 'mueslicurium', 'buyer', 'bamboodingo@gmail.com', 'Hannibal', 'Engell'),
('gillettetellurium', 'santandercalifornium', 'manager', 'gillettetellurium@comcast.net', 'Branca', 'Schroth'),
('glumsmike', 'salamiiridium', 'deliverer', 'folderolraccoon@yahoo.com', 'Nimet', 'Bogorad'),
('guccinickel', 'krafthydrogen', 'manager', 'guccinickel@gmail.com', 'Nyoman', 'Mccue'),
('heinekenplatinum', 'toyotasilicon', 'manager', 'heinekenplatinum@gmail.com', 'Lorinda', 'Kinlin'),
('heinzrutherfordium', 'allianztin', 'manager', 'heinzrutherfordium@gmail.com', 'Kynthia', 'Ramella'),
('hurriedplornish', 'coconutcopper', 'buyer', 'doodlepolarbear@yahoo.com', 'Maximilien', 'Felix'),
('hyundaimeitnerium', 'ferrariberkelium', 'manager', 'hyundaimeitnerium@gmail.com', 'Katri', 'Lehr'),
('inactivejane', 'pepperoniberyllium', 'buyer', 'snarkypeafowl@comcast.net', 'Nelli', 'Dimare'),
('inventivenickleby', 'sardinesoxygen', 'deliverer', 'gazebolinnet@comcast.net', 'Greta', 'Berkowitz'),
('lancomegermanium', 'siemenschromium', 'manager', 'lancomegermanium@gmail.com', 'Tobiah', 'Currall'),
('languidtopsawyer', 'applestitanium', 'deliverer', 'conniptionbadger@ua.edu', 'Rivka', 'Guenthart'),
('legothorium', 'gillettecerium', 'manager', 'legothorium@gmail.com', 'Anselm', 'Parnas'),
('lexuslanthanum', 'philipslutetium', 'manager', 'lexuslanthanum@gmail.com', 'Alte', 'Renner'),
('maddeningfladdock', 'abaloneterbium', 'buyer', 'smashinggoldfinch@gmail.com', 'Nadja', 'Fienberg'),
('malboroneodymium', 'foxsulfur', 'manager', 'malboroneodymium@gmail.com', 'Mari', 'Medin'),
('marvelousjinkins', 'pistachiopraseodymiu', 'buyer', 'drizzlebacteria@comcast.net', 'Anneliese', 'Dickson'),
('mcdonaldssodium', 'shelltitanium', 'manager', 'mcdonaldssodium@ua.edu', 'Lorayne', 'Bretscher'),
('melodicsparkler', 'raisinsthorium', 'buyer', 'wabbitkapi@gmail.com', 'Vera', 'Agee'),
('methodicalcharity', 'pearfrancium', 'deliverer', 'glomhound@comcast.net', 'Alessio', 'Griesenbeck'),
('nescafeselenium', 'applechlorine', 'manager', 'nescafeselenium@comcast.net', 'Melqart', 'Voligny'),
('noxiousmould', 'trufflemanganese', 'buyer', 'codswallopbobolink@gmail.com', 'Shui', 'Agostinelli'),
('optimalpluck', 'quicheiron', 'manager', 'sousaphonegnu@yahoo.com', 'Doris', 'Bae'),
('pepsisilicon', 'hondapromethium', 'manager', 'pepsisilicon@gmail.com', 'Aime', 'Stephenson'),
('pradaphosphorus', 'nestlemercury', 'manager', 'pradaphosphorus@comcast.net', 'Henrikas', 'Stine'),
('putridsnagsby', 'gatoradecalifornium', 'buyer', 'liripoopunicorn@ua.edu', 'Jupiter', 'Leitman'),
('quickestmortimer', 'lolliescalcium', 'manager', 'allegatorhornet@ua.edu', 'Tarana', 'Goodwin'),
('reasonablewrayburn', 'saltradium', 'deliverer', 'glabellaswift@yahoo.com', 'Hamida', 'Gugel'),
('rolexfluorine', 'ciscorhodium', 'manager', 'rolexfluorine@comcast.net', 'Wallace', 'Castelda'),
('rowdysteerforth', 'crackersosmium', 'buyer', 'sickleturtle@gmail.com', 'Mahesh', 'Parsons'),
('sablemagnus', 'sausageastatine', 'buyer', 'lugubriousquail@gmail.com', 'Lauma', 'Romberger'),
('severelucy', 'burritosneptunium', 'buyer', 'cougarcur@gmail.com', 'Brendan', 'Pool'),
('shadowywestlock', 'orangetellurium', 'deliverer', 'samovartuna@gmail.com', 'Hristijan', 'Furshpan'),
('smoothbetsy', 'paellatechnetium', 'manager', 'shenaniganbison@ua.edu', 'Hilde', 'Secor'),
('snobbymorleena', 'granolaniobium', 'buyer', 'nincompoopcockatoo@gmail.com', 'Hieremihel', 'Doeringer'),
('spiffyjudith', 'eggsselenium', 'deliverer', 'fuddyduddyvole@gmail.com', 'Aerona', 'Agren'),
('starbucksrhenium', 'pampersfermium', 'manager', 'starbucksrhenium@ua.edu', 'Sybella', 'Stagliano'),
('stylishtowlinson', 'jerkygermanium', 'deliverer', 'masticateguillemot@gmail.com', 'Breixo', 'Sanders'),
('tastyadams', 'puddingneon', 'buyer', 'crunchcapon@gmail.com', 'Sextilius', 'Blew'),
('teenyroads', 'icecreamargon', 'deliverer', 'goonavocet@gmail.com', 'Matty', 'Von kapff'),
('torpidkenge', 'syrupsilicon', 'buyer', 'dollopcoot@comcast.net', 'Pravin', 'Blumberg'),
('toyotacarbon', 'colayttrium', 'manager', 'toyotacarbon@comcast.net', 'Kathe', 'Forte'),
('twinchicken', 'vegetablesprotactini', 'deliverer', 'bobbintamarin@comcast.net', 'Riannon', 'Kelsch'),
('unknownswidger', 'tomatoeplutonium', 'deliverer', 'filibusterbuck@comcast.net', 'Oto', 'Bayo'),
('unwrittensloppy', 'tacoseuropium', 'buyer', 'felinerat@gmail.com', 'Evalds', 'Carper'),
('visahafnium', 'audihassium', 'manager', 'visahafnium@gmail.com', 'Klara', 'Meehan'),
('vitalbetty', 'pepperthallium', 'buyer', 'centipedeanaconda@gmail.com', 'Agneta', 'Inoue'),
('welcomeleicester', 'cheeseboron', 'buyer', 'igloopilchard@gmail.com', 'Moric', 'Prezelin'),
('wellmadeconkey', 'cordialsamarium', 'buyer', 'chinchillapanda@gmail.com', 'Feliciana', 'Burgio'),
('woozyprice', 'venisonlithium', 'buyer', 'snoutoxbird@gmail.com', 'Lelia', 'Marschall');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`username`),
  ADD KEY `ad1` (`address`),
  ADD KEY `dsid` (`default_store_id`);

--
-- Indexes for table `deliveredby`
--
ALTER TABLE `deliveredby`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `dun1` (`deliverer_username`);

--
-- Indexes for table `grocerystore`
--
ALTER TABLE `grocerystore`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `ad9` (`address_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `manages`
--
ALTER TABLE `manages`
  ADD PRIMARY KEY (`username`,`store_address`),
  ADD KEY `ad0` (`store_address`);

--
-- Indexes for table `orderedby`
--
ALTER TABLE `orderedby`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `bun` (`buyer_username`);

--
-- Indexes for table `orderfrom`
--
ALTER TABLE `orderfrom`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `ad2` (`store_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`username`,`payment_name`);

--
-- Indexes for table `selectitem`
--
ALTER TABLE `selectitem`
  ADD PRIMARY KEY (`item_id`,`order_id`),
  ADD KEY `od2` (`order_id`);

--
-- Indexes for table `soldat`
--
ALTER TABLE `soldat`
  ADD PRIMARY KEY (`item_id`,`store_id`),
  ADD KEY `ad3` (`store_id`);

--
-- Indexes for table `systeminformation`
--
ALTER TABLE `systeminformation`
  ADD PRIMARY KEY (`system_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `ad1` FOREIGN KEY (`address`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dsid` FOREIGN KEY (`default_store_id`) REFERENCES `grocerystore` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `us` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliveredby`
--
ALTER TABLE `deliveredby`
  ADD CONSTRAINT `dun1` FOREIGN KEY (`deliverer_username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `od4` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grocerystore`
--
ALTER TABLE `grocerystore`
  ADD CONSTRAINT `ad9` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manages`
--
ALTER TABLE `manages`
  ADD CONSTRAINT `ad0` FOREIGN KEY (`store_address`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `us1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderedby`
--
ALTER TABLE `orderedby`
  ADD CONSTRAINT `bun` FOREIGN KEY (`buyer_username`) REFERENCES `buyer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `od1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderfrom`
--
ALTER TABLE `orderfrom`
  ADD CONSTRAINT `ad2` FOREIGN KEY (`store_id`) REFERENCES `grocerystore` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `od3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `us3` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `selectitem`
--
ALTER TABLE `selectitem`
  ADD CONSTRAINT `iid` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `od2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soldat`
--
ALTER TABLE `soldat`
  ADD CONSTRAINT `ad3` FOREIGN KEY (`store_id`) REFERENCES `grocerystore` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `it` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
