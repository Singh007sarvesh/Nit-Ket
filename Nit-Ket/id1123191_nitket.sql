-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2017 at 01:37 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1123191_nitket`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `itemid` int(11) NOT NULL,
  `stime` datetime DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `initialamount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`itemid`, `stime`, `ctime`, `initialamount`) VALUES
(50, '2017-03-30 18:55:00', '2017-03-30 18:00:00', 200),
(63, '2017-03-30 15:00:00', '2017-03-30 18:44:00', 5000),
(365, '2017-03-30 18:37:00', '2017-03-30 17:00:00', 55000),
(366, '2017-03-30 19:06:00', '2017-03-30 19:10:00', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `Id` varchar(255) NOT NULL,
  `pref` char(1) NOT NULL,
  `Ip` varchar(39) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`Id`, `pref`, `Ip`, `contact`, `email`) VALUES
('107041567579407447717', 'B', '14.139.185.114', ' ', '0786mohdarsh@gmail.com'),
('104259148824240844594', 'B', '14.139.185.114', '9898989898', 'amitamora@gmail.com'),
('103749789759620927527', 'B', '14.139.185.114', ' ', 'anuj.srivastava418@gmail.com'),
('115187749035894803999', 'B', '14.139.185.114', ' ', 'avinashpatelacs@gmail.com'),
('115881888418483421042', 'B', '14.139.185.114', ' ', 'bishakhapriyam14@gmail.com'),
('116899549380975862563', 'B', '14.139.185.114', ' ', 'jeevanprakash612@gmail.com'),
('114013532423286614320', 'B', '::1', ' ', 'jiwanprakashchoudhary@gmail.com'),
('112438690276064233944', 'B', '14.139.185.114', ' ', 'kesarwani.namita11@gmail.com'),
('105125002484545830720', 'B', '14.139.185.114', ' ', 'nitianpk07@gmail.com'),
('100861081965675201530', 'B', '14.139.185.114', ' ', 'priyankaekka15@gmail.com'),
('104094845312737635192', 'B', '14.139.185.114', ' ', 'somnathsamanta0@gmail.com'),
('102276542967729684142', 'B', '117.245.47.35', ' ', 'somnathsamanta900@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Fid` int(10) NOT NULL,
  `uname` char(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `msg` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Fid`, `uname`, `email`, `mob`, `subject`, `msg`) VALUES
(4, 'Soorya', 'sooryarajane@gmail.com', '7032222829', 'Feed back', 'Awesome site... Great work...'),
(5, 'Amit Kumar soni', 'amitamora@gmail.com', '7805911389', 'First Feedback ', 'Please Improve Site Performance'),
(6, 'VIJAY MISHRA', 'vijaymishravm99@gmail.com', '9037772877', 'subject ', 'message'),
(7, 'mayank', 'mayank1158336@gmail.com', '8089187179', 'bug test', 'test for the bug\r\ndont try to make changes :)');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemid` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `itempicture` text NOT NULL,
  `itemdesc` varchar(200) NOT NULL,
  `itemprice` float NOT NULL,
  `itemcategory` varchar(100) NOT NULL,
  `itemstatus` varchar(100) NOT NULL,
  `uploadedBy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `itemname`, `itempicture`, `itemdesc`, `itemprice`, `itemcategory`, `itemstatus`, `uploadedBy`) VALUES
(46, 'Computer Networks ed6', 'image/compnetworkandrew.jpg', 'by Andrew s tanenbaum', 200, 'Book', 'Not Available', 'bishakhapriyam14@gmail.com'),
(47, 'Hero Sprint', 'image/herosprint.PNG', 'color: Black &Blue', 2000, 'Bicycle', 'Not Available', 'bishakhapriyam14@gmail.com'),
(48, 'Apple iphone6', 'image/apple6.jpg', 'image/apple-iphone-6-1.jpg, 2GB RAM, 4.7 inch screen, color:silver', 30000, 'Mobile', 'Not Available', 'bishakhapriyam14@gmail.com'),
(49, 'Apple iphone7', 'image/apple7.jpg', '3GB RAM, 5.5inch screen, color:gold', 30000, 'Mobile', 'Available', 'priyankaekka15@gmail.com'),
(50, 'Computer Networks', 'image/compnetworkross.jpg', ' By JamesF kurose & Keith w.Ross', 200, 'Book', 'Available', 'priyankaekka15@gmail.com'),
(51, 'Lenova Tablet', 'image/lenovo_yoga_tablet_3_8_inch.jpeg', '2GB RAM, Android 5.1, 8 MP camera color:black', 8000, 'Tab', 'Not Available', 'priyankaekka15@gmail.com'),
(52, 'Hero Hawk', 'image/Hero_Hawk.jpg', 'color: Black & Red', 2500, 'Bicycle', 'Not Available', 'priyankaekka15@gmail.com'),
(55, 'Micromax Canvas Tab ', 'image/micromax-tab.jpg', '7 inch, 8GB, Wi-Fi Only), Black by Micromax', 3000, 'Tab', 'Not Available', 'bishakhapriyam14@gmail.com'),
(56, 'Nokia6', 'image/Nokia-6-1.jpg', '4G', 19000, 'Mobile', 'Not Available', 'somnathsamanta0@gmail.com'),
(58, 'Asus Zenfone Max', 'image/asus.jpg', '2GB RAM,5 inch Screen,13MP camera, color:Black', 6000, 'Mobile', 'Not Available', 'anuj.srivastava418@gmail.com'),
(59, 'phone', 'image/mobile.jpg', 'Good Quality Phone', 2500, 'Mobile', 'Not Available', 'jeevanprakash612@gmail.com'),
(60, 'Lenovo PHAB Plus Tablet ', 'image/lenovo-phab-2-pro-7591.jpg', '6.8 inch, 32GB, Wi-Fi+ LTE+ Voice Calling), Gunmetal Platinum by Lenovo ', 8000, 'Tab', 'Not Available', 'anuj.srivastava418@gmail.com'),
(61, 'SAMSUNG Galaxy Tab 3', 'image/samsung_tab.jpeg', 'Single Sim 7 Inch Tablet 8 GB 7 inch with Wi-Fi+3G ', 4500, 'Tab', 'Not Available', 'priyankaekka15@gmail.com'),
(62, 'SAMSUNG Galaxy tab', 'image/stab.jpeg', 'Single Sim 7 Inch Tablet 8 GB 7 inch with Wi-Fi+3G', 5000, 'Tab', 'Not Available', 'priyankaekka15@gmail.com'),
(63, 'Pixel2', 'image/513201564925PM_635_general_mobile_4g.jpeg', '4G', 5000, 'Mobile', 'Available', 'somnathsamanta0@gmail.com'),
(64, 'Pixel3', 'image/alcatel_onetouch_fierce_xl.jpg', '3G', 5600, 'Mobile', 'Available', 'somnathsamanta0@gmail.com'),
(65, 'watch mobile', 'image/watch-mobile-phone-big.jpg', 'Branded watch mobile', 2500, 'Mobile', 'Available', 'jiwanprakashchoudhary@gmail.com'),
(67, 'Nokia6', 'image/1level.jpg', '4G', 5000, 'Mobile', 'Not Available', 'priyankaekka15@gmail.com'),
(76, 'bicycle', 'image/Ladybird_Splash_Pink2-1-300x183.png', '1233', 1500, 'Bicycle', 'Not Available', 'nitianpk07@gmail.com'),
(79, 'BOOK', 'image/20150903173413-books-shop-fair-library-used-bookshelf-literature-study-textbooks.jpeg', 'EXAM', 1400, 'Book', 'Not Available', 'nitianpk07@gmail.com'),
(80, 'fastrack', 'image/Group8_mindmap.jpg', 'goodwatch', 2000, 'others', 'Not Available', 'nitianpk07@gmail.com'),
(350, 'Item Name ', 'image/git_nit-ket.jpg', 'Description Of Item ', 9000, 'Mobile', 'Not Available', 'amitamora@gmail.com'),
(351, 'Item Name ', 'image/git_nit-ket.jpg', 'Description Of Item ', 9000, 'Mobile', 'Not Available', 'amitamora@gmail.com'),
(355, 'zenfone3', 'image/93.jpg', 'four', 8000, 'Mobile', 'Available', 'somnathsamanta0@gmail.com'),
(356, 'Iphone7', 'image/iphone-7BLACK.png', 'IOS10', 56000, 'Mobile', 'Not Available', 'somnathsamanta900@gmail.com'),
(357, 'data', 'image/Next_Generation_Sequencing_NGS_Comparisons_of_Sequencing_By_Ligation_Sequencing_By_Synthesis_Pyrosequencing.png', 'book by rn', 300, 'Book', 'Not Available', 'priyankaekka15@gmail.com'),
(358, 'Apple iphone', 'image/images.png', 'phone', 50000, 'Mobile', 'Not Available', 'priyankaekka15@gmail.com'),
(359, 'Lenovo', 'image/lenovo-ideapad-original-imaezxn6hjabtjay.jpeg', 'Lenovo 310 Core i5 6th Gen 8 GB1 TB HDDDOS2 GB Graphics 80SM01EEIH IP 310 Notebook  156 inch Black 22 kg', 40990, 'Laptop', 'Not Available', 'amitamora@gmail.com'),
(360, 'Ipad mini4', 'image/mobile-ipad-mini-4-hero-2015.jpg', '4G Tablet', 10000, 'Tab', 'Available', 'somnathsamanta0@gmail.com'),
(361, 'dsdsdd', 'image/andy-conrad.jpg', 'dsdsdsd nnnn', 45, 'Mobile', 'Not Available', 'amitamora@gmail.com'),
(362, 'Blackberry priv4', 'image/blackberry-priv-review-02233.jpg', 'Android Nougat 7', 6500, 'Mobile', 'Available', 'somnathsamanta0@gmail.com'),
(363, 'dfsdf', 'image/image1.jpg', 'fvrfffff', 3333, 'Laptop', 'Not Available Create New', 'priyankaekka15@gmail.com'),
(364, 'gfgh', 'image/wristband.jpg', 'hnhgn nggh ghn', 88, 'Mobile', 'Not Available Create New', 'priyankaekka15@gmail.com'),
(365, 'Apple MacBook Pro15', 'image/og.png', 'New MAC', 125000, 'Laptop', 'Available', 'somnathsamanta0@gmail.com'),
(366, 'Alcatel4', 'image/xxx.jpg', 'VOLTE', 6500, 'Mobile', 'Available', 'somnathsamanta0@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `itemid` int(11) NOT NULL,
  `dateofbid` datetime NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`email`, `itemid`, `dateofbid`, `amount`) VALUES
('priyankaekka15@gmail.com', 63, '2017-03-30 13:06:55', 6000),
('priyankaekka15@gmail.com', 365, '2017-03-30 13:18:52', 58000),
('priyankaekka15@gmail.com', 50, '2017-03-30 13:33:07', 300);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pref` char(1) NOT NULL,
  `id` varchar(255) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`email`, `pref`, `id`, `ip`, `contact`) VALUES
('amitamora@gmail.com', 'S', '104259148824240844594', '14.139.185.114', ''),
('anuj.srivastava418@gmail.com', 'S', '103749789759620927527', '14.139.185.114', ' '),
('avinashpatelacs@gmail.com', 'S', '115187749035894803999', '14.139.185.114', ' '),
('bishakhapriyam14@gmail.com', 'S', '115881888418483421042', '137.97.4.40', ' '),
('jeevanprakash612@gmail.com', 'S', '116899549380975862563', '14.139.185.114', ' '),
('jiwanprakashchoudhary@gmail.com', 'S', '114013532423286614320', '::1', ' '),
('kesarwani.namita11@gmail.com', 'S', '112438690276064233944', '14.139.185.114', ' '),
('nitianpk07@gmail.com', 'S', '105125002484545830720', '14.139.185.114', '9981890555'),
('nitketnitc15@gmail.com', 'S', '106897908046517507037', '137.97.1.7', ' '),
('priyankaekka15@gmail.com', 'S', '100861081965675201530', '42.110.128.120', ' '),
('somnathsamanta0@gmail.com', 'S', '104094845312737635192', '14.139.185.114', ' '),
('somnathsamanta900@gmail.com', 'S', '102276542967729684142', '117.245.47.35', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gpluslink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `fname`, `lname`, `email`, `gender`, `locale`, `gpluslink`, `picture`, `created`, `modified`) VALUES
(0, 'google', '114013532423286614320', 'JIWAN', 'PRAKASH', 'jiwanprakashchoudhary@gmail.com', 'male', 'en', 'https://plus.google.com/114013532423286614320', 'https://lh4.googleusercontent.com/-NAk8Dnatouk/AAAAAAAAAAI/AAAAAAAABB0/8g5ujMIqd1k/photo.jpg', '2017-03-19 17:23:51', '2017-03-30 12:02:38'),
(7, 'google', '118085557121770991952', 'Sarvesh', 'Singh', '007sarveshsingh@gmail.com', '', 'en', 'https://plus.google.com/118085557121770991952', 'https://lh5.googleusercontent.com/-5RJdFlVZMYw/AAAAAAAAAAI/AAAAAAAAABY/0kr8R2hsG2U/photo.jpg', '2017-03-20 10:57:10', '2017-03-20 11:14:38'),
(8, 'google', '100861081965675201530', 'Priyanka', 'Ekka', 'priyankaekka15@gmail.com', 'female', 'en', 'https://plus.google.com/100861081965675201530', 'https://lh4.googleusercontent.com/-rdAs54dMHKM/AAAAAAAAAAI/AAAAAAAAAdM/c7CD5vYpRnE/photo.jpg', '2017-03-20 12:20:19', '2017-03-30 13:33:34'),
(9, 'google', '106897908046517507037', 'nit-ket', 'nitc', 'nitketnitc15@gmail.com', '', 'en', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2017-03-20 14:59:09', '2017-03-20 14:59:09'),
(10, 'google', '115881888418483421042', 'Bishakha', 'Kumari', 'bishakhapriyam14@gmail.com', '', 'en', 'https://plus.google.com/115881888418483421042', 'https://lh6.googleusercontent.com/-3wW5KEyoJBA/AAAAAAAAAAI/AAAAAAAAAFQ/v-WmYFN_88k/photo.jpg', '2017-03-20 15:32:27', '2017-03-20 22:04:58'),
(11, 'google', '104094845312737635192', 'somnath', 'samanta', 'somnathsamanta0@gmail.com', 'male', 'en', 'https://plus.google.com/104094845312737635192', 'https://lh4.googleusercontent.com/-4021aWnanQk/AAAAAAAAAAI/AAAAAAAAAXI/2pP3SlvvKr4/photo.jpg', '2017-03-20 17:00:51', '2017-03-30 13:37:39'),
(12, 'google', '103749789759620927527', 'Anuj', 'Srivastava', 'anuj.srivastava418@gmail.com', 'male', 'en', 'https://plus.google.com/103749789759620927527', 'https://lh4.googleusercontent.com/-XCQNAcP36x0/AAAAAAAAAAI/AAAAAAAABgU/Bt4McpRNxSY/photo.jpg', '2017-03-20 18:31:37', '2017-03-21 16:04:25'),
(13, 'google', '102276542967729684142', 'somnath', 'samanta', 'somnathsamanta900@gmail.com', '', 'en', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2017-03-20 19:00:01', '2017-03-29 12:41:24'),
(14, 'google', '116899549380975862563', 'Jeevan', 'Prakash', 'jeevanprakash612@gmail.com', 'male', 'en', 'https://plus.google.com/116899549380975862563', 'https://lh6.googleusercontent.com/-AUomKloMKYA/AAAAAAAAAAI/AAAAAAAAADI/casxVpPanp0/photo.jpg', '2017-03-20 20:20:54', '2017-03-27 19:57:34'),
(15, 'google', '112438690276064233944', 'namita', 'kesarwani', 'kesarwani.namita11@gmail.com', '', 'en', 'https://plus.google.com/112438690276064233944', 'https://lh4.googleusercontent.com/-b9hHAr5-u14/AAAAAAAAAAI/AAAAAAAADJA/JWoLVbsAgtA/photo.jpg', '2017-03-21 08:30:09', '2017-03-21 08:33:06'),
(16, 'google', '105125002484545830720', 'pankaj', 'kumar', 'nitianpk07@gmail.com', '', 'en', 'https://plus.google.com/105125002484545830720', 'https://lh3.googleusercontent.com/-L8rf4ChVcWs/AAAAAAAAAAI/AAAAAAAAAC0/YeUR2wUM0rw/photo.jpg', '2017-03-21 14:59:07', '2017-03-28 12:24:34'),
(17, 'google', '115187749035894803999', 'avinash', 'patel', 'avinashpatelacs@gmail.com', '', 'en', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2017-03-21 15:22:09', '2017-03-27 13:50:06'),
(18, 'google', '107041567579407447717', 'Mohammad', 'Arsh', '0786mohdarsh@gmail.com', '', 'en', 'https://plus.google.com/107041567579407447717', 'https://lh6.googleusercontent.com/-WHjXf0x64t4/AAAAAAAAAAI/AAAAAAAAACs/O08vtOKq1k4/photo.jpg', '2017-03-22 11:50:50', '2017-03-22 11:50:50'),
(20, 'google', '104259148824240844594', 'Amit', 'kumar', 'amitamora@gmail.com', 'male', 'en', 'https://plus.google.com/104259148824240844594', 'https://lh5.googleusercontent.com/-vm_66c6hPcw/AAAAAAAAAAI/AAAAAAAAAq0/lt4f-O8Uhf4/photo.jpg', '2017-03-23 22:08:22', '2017-03-29 17:16:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`itemid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Fid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemid`),
  ADD KEY `uploadedBy` (`uploadedBy`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD KEY `participant_ibfk_1` (`email`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `item` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`uploadedBy`) REFERENCES `seller` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`email`) REFERENCES `buyer` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `bid` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
