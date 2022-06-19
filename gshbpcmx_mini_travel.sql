-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 01:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gshbpcmx_mini_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `manage_gallery`
--

CREATE TABLE `manage_gallery` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_master`
--

CREATE TABLE `tbl_admin_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `fotp` varchar(10) DEFAULT NULL,
  `brokerage` decimal(20,2) DEFAULT NULL,
  `cby` varchar(50) DEFAULT NULL,
  `con` datetime DEFAULT current_timestamp(),
  `uby` varchar(50) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_master`
--

INSERT INTO `tbl_admin_master` (`id`, `name`, `password`, `mobile`, `email`, `image`, `fotp`, `brokerage`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(1, 'suraj kumar', '202cb962ac59075b964b07152d234b70', '7004417126', 'sk825252@gmail.com', '5f7238d2b472e.jpeg', NULL, '20.00', 'self', '2020-01-31 01:12:33', '1', '2021-01-13 15:46:17', '1'),
(3, 'suraj kumar', '81dc9bdb52d04dc20036dbd8313ed055', '7004419126', 'test@gmail.com', '5f7238d2b472e.jpeg', NULL, NULL, 'self', '2020-01-31 01:12:33', '1', '2020-09-29 16:35:18', '1'),
(4, 'suraj kumar', '81dc9bdb52d04dc20036dbd8313ed055', '4004417126', 'test@gmail.com', '5f7238d2b472e.jpeg', NULL, NULL, 'self', '2020-01-31 01:12:33', '1', '2020-09-29 16:35:18', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agentpay_master`
--

CREATE TABLE `tbl_agentpay_master` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `toadmin` decimal(20,2) NOT NULL,
  `toagent` decimal(20,2) NOT NULL,
  `percentage` decimal(20,2) NOT NULL,
  `ptype` enum('online','cash') NOT NULL,
  `paystatus` enum('due','sended') NOT NULL DEFAULT 'due',
  `payid` varchar(150) DEFAULT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agentpay_master`
--

INSERT INTO `tbl_agentpay_master` (`id`, `rid`, `aid`, `toadmin`, `toagent`, `percentage`, `ptype`, `paystatus`, `payid`, `createdat`) VALUES
(4, 34, 12, '4.46', '32.74', '12.00', 'cash', 'sended', '123124', '2020-10-16 13:35:57'),
(5, 35, 12, '111.55', '2119.45', '5.00', 'online', 'sended', 'CASH', '2020-10-16 22:49:37'),
(6, 52, 14, '1.04', '103.36', '1.00', 'online', 'due', NULL, '2020-12-10 19:39:44'),
(7, 55, 15, '0.00', '127.20', '0.00', 'cash', 'due', NULL, '2020-12-10 20:10:01'),
(8, 64, 18, '0.00', '118.00', '0.00', 'cash', 'sended', 'CASH', '2020-12-15 08:36:31'),
(9, 63, 17, '0.00', '472.00', '0.00', 'cash', 'sended', 'CASH', '2020-12-15 08:57:32'),
(10, 65, 18, '0.00', '104.00', '0.00', 'cash', 'due', NULL, '2020-12-15 11:24:43'),
(11, 67, 18, '0.00', '183.00', '0.00', 'cash', 'due', NULL, '2020-12-16 19:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent_master`
--

CREATE TABLE `tbl_agent_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adhar_no` varchar(12) NOT NULL,
  `adhar_doc` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `driver_bio` varchar(250) DEFAULT NULL,
  `brokrage` decimal(20,2) NOT NULL,
  `fotp` varchar(10) DEFAULT NULL,
  `accountnumber` varchar(50) NOT NULL,
  `ifsc` varchar(50) NOT NULL,
  `con` timestamp NOT NULL DEFAULT current_timestamp(),
  `uon` timestamp NULL DEFAULT NULL,
  `vby` varchar(100) DEFAULT NULL,
  `wallet` decimal(20,2) NOT NULL,
  `status` enum('verify','1','0') NOT NULL DEFAULT 'verify'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agent_master`
--

INSERT INTO `tbl_agent_master` (`id`, `name`, `email`, `mobile`, `password`, `adhar_no`, `adhar_doc`, `photo`, `address`, `driver_bio`, `brokrage`, `fotp`, `accountnumber`, `ifsc`, `con`, `uon`, `vby`, `wallet`, `status`) VALUES
(17, 'MiniTravels1', 'minitravelagency@gmail.com', '8789882539', '827ccb0eea8a706c4c34a16891f84e7b', '998567266451', '5fd812e2296b0.jpeg', '5fd812e22943b.jpeg', 'Ashok Nagar, Ranchi', NULL, '0.00', NULL, '', '', '2020-12-15 01:35:30', '2020-12-15 03:24:10', 'test@gmail.com', '0.00', '1'),
(18, 'Minitravels', '16azharuddin@gmail.com', '7766044811', '202cb962ac59075b964b07152d234b70', '123456789876', '5fd8182a79717.jpeg', '5fd8182a7962d.jpeg', 'Ranchi', NULL, '0.00', NULL, '', '', '2020-12-15 01:58:02', '2020-12-15 02:04:40', 'test@gmail.com', '0.00', '1'),
(19, 'Suraj Kumar', 'sk825252@gmail.com', '7004417126', '202cb962ac59075b964b07152d234b70', '987987987111', '5fd82aca822d3.jpeg', '5fd82aca821c1.jpeg', 'Kokar Ranchi', NULL, '0.00', '981434', 'srj.kmr.pro@kotak', 'ifsc', '2020-12-15 03:17:30', '2020-12-23 16:50:36', 'test@gmail.com', '43167.00', '1'),
(20, 'Salman khurshid', 'Khurshidsalman0571@gmail.com', '8709090571', '1e5978d3c3d20fd1b8902f1db1d3e5d7', '675600005107', '5fd85183e2523.jpeg', '5fd85183e1a88.jpeg', 'Karbla tank road imarat sariya lane karbla chok', NULL, '0.00', NULL, '', '', '2020-12-15 06:02:43', '2020-12-24 12:39:15', 'test@gmail.com', '0.00', '1'),
(21, 'Suman oraon', 'oraons645@gmail.com', '9334177644', '91cc12d7186270785a2f2f388b4f79aa', '399687905667', '5fd8708936f60.jpeg', '5fd870893660b.jpeg', 'Karkara mandar Ranchi', 'I need a job', '0.00', NULL, '', '', '2020-12-15 08:15:05', '2020-12-24 12:39:24', 'test@gmail.com', '0.00', '1'),
(22, 'John Doe', 'teamguardiandummy01@gmail.com', '9772827002', '486dccb55ba1906334f7c1ac8bce362f', '097728270022', '5fdd215faac07.jpeg', '5fdd215fa9fd0.jpeg', 'Manila', 'Test', '0.00', NULL, '', '', '2020-12-18 21:38:41', '0000-00-00 00:00:00', NULL, '0.00', 'verify'),
(23, 'Gaurav Kumar', 'gauravsbs420@gmail.com', '1234567890', '202cb962ac59075b964b07152d234b70', '', '', '5fe24c642c811.jpeg', '', NULL, '0.00', NULL, '', '', '2020-12-22 19:43:33', '2020-12-23 15:10:45', NULL, '0.00', 'verify'),
(37, 'srj', 'srj.kmr.pro@gmail.com', '8084795184', '202cb962ac59075b964b07152d234b70', '', '', '', '', NULL, '0.00', NULL, '', '', '2020-12-23 13:07:23', '0000-00-00 00:00:00', NULL, '0.00', 'verify');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_canceled_ride_by_pilot`
--

CREATE TABLE `tbl_canceled_ride_by_pilot` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `mpilot` varchar(15) NOT NULL,
  `rid` int(11) NOT NULL,
  `pcause` varchar(200) NOT NULL,
  `cancelon` datetime NOT NULL DEFAULT current_timestamp(),
  `rstatus` enum('waiting','solved','canceled') NOT NULL DEFAULT 'waiting',
  `aaction` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon_master`
--

CREATE TABLE `tbl_coupon_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `discount` decimal(20,2) NOT NULL,
  `type` enum('ONETIME','SONETIME','SEASONAL') NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coupon_master`
--

INSERT INTO `tbl_coupon_master` (`id`, `name`, `description`, `discount`, `type`, `status`) VALUES
(1, 'FIRSTRIDE', 'first ride coupan', '20.00', 'ONETIME', '1'),
(2, 'MINI', 'mini gift', '10.00', 'SEASONAL', '1'),
(3, 'NEWYEAR2021', 'New year Gift2021', '10.00', 'SONETIME', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_master`
--

CREATE TABLE `tbl_customer_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `con` datetime DEFAULT current_timestamp(),
  `uby` varchar(30) DEFAULT NULL,
  `uon` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(30) DEFAULT '1',
  `cookie` varchar(200) DEFAULT NULL,
  `cookie_pass` varchar(100) DEFAULT NULL,
  `wallet` decimal(20,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_master`
--

INSERT INTO `tbl_customer_master` (`id`, `name`, `mobile`, `email`, `password`, `image`, `con`, `uby`, `uon`, `status`, `cookie`, `cookie_pass`, `wallet`) VALUES
(163, 'Suraj Kumar', '7004417126', 'sk825252@gmail.com', NULL, '5f86e3543fd62.jpeg', '2020-10-04 16:27:45', NULL, '2021-01-14 12:41:03', '1', 'd29bd6c71bc0e7bc29b98bf5b196bf5d', 'a1d3e0e3f04eb5839d1fa605d6329c10', '0.00'),
(165, NULL, '7903562598', NULL, NULL, NULL, '2020-10-04 17:13:23', NULL, '2020-12-15 20:43:18', '1', '3a47f3c94442377a034e19ee28904e17', 'd0b403eef2d1e11d5dc7c6e53d17cca2', '0.00'),
(166, 'karan', '7979744874', 'karuoraon@gmail.com', NULL, '5f7ed8db88bad.jpeg', '2020-10-04 17:20:53', NULL, '2020-12-09 20:28:16', '1', 'ae59aab0b12ec7259d7c95e0bc13b83a', 'afa6b0230ca6c17afb49fb2aaa026c57', '0.00'),
(167, NULL, '7979844874', NULL, NULL, NULL, '2020-12-09 21:22:50', NULL, NULL, '1', NULL, NULL, '0.00'),
(168, NULL, '8789882539', NULL, NULL, NULL, '2020-12-10 07:58:21', NULL, '2021-01-06 08:58:04', '1', '7e7d51c6669ed3d9b0fdf83caa2426d6', '666ddb0589bd13ba8cea0932ed229f38', '0.00'),
(169, NULL, '7488882167', NULL, NULL, NULL, '2020-12-12 03:32:50', NULL, '2020-12-11 22:03:14', '1', 'dc7c6f4e3164dd4ae2870f5228adfada', '39e49e5c15b12d3c592c24e15b0bc064', '0.00'),
(170, '', '7979747448', '', NULL, '5fda1ea945a94.jpeg', '2020-12-14 13:21:47', NULL, '2020-12-16 14:50:17', '1', '2d69146c767811dc46bb17b7c7571bf9', 'e5d4ab0af4f87efb3c6fe064b453ba36', '0.00'),
(171, NULL, '7004848552', NULL, NULL, NULL, '2020-12-15 13:08:38', NULL, NULL, '1', NULL, NULL, '0.00'),
(172, NULL, '9798581069', NULL, NULL, NULL, '2020-12-24 11:06:43', NULL, '2020-12-24 05:39:44', '1', 'fd40d95bd22c91bcb1fee12629004388', 'ad1c84584cf5ee3ceb4dbf888ef731c3', '0.00'),
(173, NULL, '8709090571', NULL, NULL, NULL, '2020-12-24 14:18:33', NULL, NULL, '1', NULL, NULL, '0.00'),
(174, NULL, '9565083038', NULL, NULL, NULL, '2020-12-25 17:54:07', NULL, NULL, '1', NULL, NULL, '0.00'),
(175, NULL, '7209627061', NULL, NULL, NULL, '2021-01-06 22:09:27', NULL, '2021-01-06 16:40:28', '1', '97ec821eb371e454af144e234ac56a06', 'acfeb3bf84e9507398e736c2cc36b753', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification_master`
--

CREATE TABLE `tbl_notification_master` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `pilotid` varchar(100) NOT NULL,
  `amount` decimal(65,0) NOT NULL,
  `msg` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL,
  `readstatus` enum('0','1','seen','') NOT NULL DEFAULT '0',
  `con` datetime NOT NULL DEFAULT current_timestamp(),
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification_master`
--

INSERT INTO `tbl_notification_master` (`id`, `userid`, `pilotid`, `amount`, `msg`, `description`, `readstatus`, `con`, `url`) VALUES
(7, '165', '', '0', 'Password Changed', 'You have Successfully Changed Your Password', 'seen', '2021-01-11 15:36:39', ''),
(8, '165', '', '0', 'Other Notification', 'Description of Other Notification', 'seen', '2021-01-11 15:39:01', ''),
(16, '165', '', '100', 'Money Added To wallet', 'Rs 100 Successfully added To Your Wallet', 'seen', '2021-01-12 14:17:18', 'notification-details'),
(17, '165', '', '100', 'Money Added To wallet', 'Rs 100 Successfully added To Your Wallet', 'seen', '2021-01-12 14:41:03', 'notification-details'),
(18, '165', '', '0', 'Money Added To wallet', 'Rs 500 Successfully added To Your Wallet', '1', '2021-01-12 15:52:25', 'notification-details'),
(19, '165', '', '0', 'Money Added To wallet', 'Rs 200 Successfully added To Your Wallet', '1', '2021-01-12 16:17:52', 'notification-details'),
(20, '165', '', '0', 'Money Added To wallet', 'Rs 100 Successfully added To Your Wallet', '1', '2021-01-12 16:58:08', 'notification-details'),
(21, '163', '', '0', 'Money Added To wallet', 'Rs 100 Successfully added To Your Wallet', '0', '2021-01-14 17:33:19', 'notification-details');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ride_master`
--

CREATE TABLE `tbl_ride_master` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `coupanid` varchar(100) DEFAULT NULL,
  `vid` int(11) DEFAULT NULL,
  `con` timestamp NOT NULL DEFAULT current_timestamp(),
  `sorcelatitude` varchar(100) NOT NULL,
  `sorcelongitude` varchar(100) NOT NULL,
  `destinationlatitude` varchar(100) NOT NULL,
  `destinationlongitude` varchar(100) NOT NULL,
  `fromaddress` varchar(200) NOT NULL,
  `toaddress` varchar(200) NOT NULL,
  `kms` decimal(10,0) NOT NULL,
  `bookdate` datetime DEFAULT NULL,
  `returndate` datetime DEFAULT NULL,
  `otp` varchar(6) NOT NULL,
  `endotp` varchar(15) DEFAULT NULL,
  `type` enum('oneway','twoway') NOT NULL DEFAULT 'oneway',
  `fair` decimal(20,2) NOT NULL,
  `tax` decimal(20,2) NOT NULL,
  `payment` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `ptype` enum('cash','online') NOT NULL DEFAULT 'cash',
  `wallet_pay` decimal(20,2) NOT NULL DEFAULT 0.00,
  `wcotp` varchar(4) DEFAULT NULL,
  `pid` varchar(100) DEFAULT NULL,
  `ridingon` datetime DEFAULT current_timestamp(),
  `rpkm` decimal(20,2) DEFAULT NULL,
  `brockarage` decimal(20,2) DEFAULT NULL,
  `dallowence` decimal(10,0) NOT NULL,
  `baseprice` decimal(10,0) DEFAULT NULL,
  `subcat` varchar(100) NOT NULL,
  `dstatus` enum('waiting','accepted','compteted','cancel') DEFAULT NULL,
  `cstatus` enum('waiting','riding','complete','cancel') NOT NULL DEFAULT 'waiting',
  `rating` enum('1','2','3','4','5') DEFAULT NULL,
  `ratingdescription` varchar(200) DEFAULT NULL,
  `upon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ride_master`
--

INSERT INTO `tbl_ride_master` (`id`, `cid`, `coupanid`, `vid`, `con`, `sorcelatitude`, `sorcelongitude`, `destinationlatitude`, `destinationlongitude`, `fromaddress`, `toaddress`, `kms`, `bookdate`, `returndate`, `otp`, `endotp`, `type`, `fair`, `tax`, `payment`, `ptype`, `wallet_pay`, `wcotp`, `pid`, `ridingon`, `rpkm`, `brockarage`, `dallowence`, `baseprice`, `subcat`, `dstatus`, `cstatus`, `rating`, `ratingdescription`, `upon`) VALUES
(63, 168, '', 25, '2020-12-15 01:51:49', '23.3636008', '85.3389805', '23.3955394', '85.3352428', 'KM Rd, Dangartoli, Nayatoli, Ranchi, Jharkhand 834001, India', 'Morabadi, Ranchi, Jharkhand, India', '5', '2020-12-15 07:21:00', '0000-00-00 00:00:00', '8JX7W3', '584480', 'oneway', '472.00', '28.32', 'paid', 'cash', '0.00', NULL, NULL, '2020-12-15 07:21:49', '15.00', '200.00', '100', '100', 'Large', 'compteted', 'complete', NULL, NULL, NULL),
(64, 168, '', 27, '2020-12-15 02:07:39', '23.3636008', '85.3389805', '23.3955394', '85.3352428', 'KM Rd, Dangartoli, Nayatoli, Ranchi, Jharkhand 834001, India', 'Morabadi, Ranchi, Jharkhand, India', '5', '2020-12-15 07:37:00', '0000-00-00 00:00:00', '5RYLJY', '383105', 'oneway', '118.00', '7.08', 'paid', 'cash', '0.00', NULL, NULL, '2020-12-15 07:37:39', '10.00', '20.00', '0', '50', 'Small', 'compteted', 'complete', NULL, NULL, NULL),
(65, 168, '', 27, '2020-12-15 05:51:53', '23.3920461', '85.3286286', '23.3721233', '85.33827099999999', 'Unnamed Road, Ranchi University, Morabadi, Ranchi, Jharkhand 834008, India', 'Lalpur, Ranchi, Jharkhand, India', '3', '2020-12-15 11:20:00', '0000-00-00 00:00:00', 'YYPI5M', '560390', 'oneway', '104.00', '6.24', 'paid', 'cash', '0.00', NULL, NULL, '2020-12-15 11:21:53', '10.00', '20.00', '0', '50', 'Small', 'compteted', 'complete', NULL, NULL, NULL),
(66, 165, '', NULL, '2020-12-15 20:43:47', '23.377538', '85.3457623', '23.3721331', '85.338267', 'Galli No. 2, Sarhul Nagar, Ranchi, Jharkhand 834001, India', 'Agrasen Chowk, Lalpur, Ranchi, Jharkhand 834001', '2', '2020-12-16 02:12:00', '0000-00-00 00:00:00', '', NULL, 'oneway', '427.00', '25.62', 'unpaid', '', '0.00', NULL, NULL, '2020-12-16 02:13:47', '15.00', '200.00', '100', '100', 'Large', NULL, 'waiting', NULL, NULL, NULL),
(67, 168, '', 27, '2020-12-16 14:19:42', '23.3609827', '85.3384522', '23.4345371', '85.321376', 'Unnamed Road, Konka, Nayatoli, Ranchi, Jharkhand 834001, India', 'Kanke, Jharkhand 834006, India', '11', '2020-12-16 19:49:00', '0000-00-00 00:00:00', '1TH89Y', '531348', 'oneway', '183.00', '10.98', 'paid', 'cash', '0.00', NULL, NULL, '2020-12-16 19:49:42', '10.00', '20.00', '0', '50', 'Small', 'compteted', 'complete', NULL, NULL, NULL),
(68, 163, '', 27, '2021-01-14 12:11:25', '25.0960742', '85.31311939999999', '25.0960599', '85.31301909999999', 'Bihar - Mokama Rd, Laranpur, Bihar 801303, India', 'Laranpur, Bihar 801303, India', '10', '2021-01-14 17:45:00', '0000-00-00 00:00:00', '67BZ8V', '876031', 'oneway', '170.00', '10.20', 'paid', 'cash', '100.00', '0135', NULL, '2021-01-14 17:41:25', '10.00', '20.00', '0', '50', 'Small', 'accepted', 'riding', NULL, NULL, '2021-01-14 18:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_cat_master`
--

CREATE TABLE `tbl_vehicle_cat_master` (
  `id` int(11) NOT NULL,
  `subcategory` enum('Small','Medium','Large','Regular','Standard','Light','Normal','Heavy') NOT NULL,
  `rpkm` decimal(10,0) NOT NULL,
  `dallowence` decimal(10,0) NOT NULL,
  `brockarage` decimal(10,0) NOT NULL,
  `baseprice` decimal(10,0) DEFAULT NULL,
  `ridetype` enum('local','outstation') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehicle_cat_master`
--

INSERT INTO `tbl_vehicle_cat_master` (`id`, `subcategory`, `rpkm`, `dallowence`, `brockarage`, `baseprice`, `ridetype`) VALUES
(7, 'Small', '10', '0', '20', '50', 'local'),
(13, 'Small', '9', '400', '50', NULL, 'outstation'),
(14, 'Medium', '12', '0', '20', '70', 'local'),
(15, 'Medium', '12', '400', '100', NULL, 'outstation'),
(16, 'Large', '15', '200', '100', '100', 'local'),
(17, 'Large', '14', '400', '100', NULL, 'outstation'),
(18, 'Regular', '7', '0', '20', '0', 'local'),
(19, 'Regular', '7', '100', '20', NULL, 'outstation'),
(20, 'Standard', '8', '0', '20', '0', 'local'),
(21, 'Standard', '8', '120', '20', NULL, 'outstation'),
(22, 'Light', '15', '50', '20', '20', 'local'),
(23, 'Light', '15', '50', '20', '0', 'outstation'),
(24, 'Normal', '15', '50', '20', '20', 'local'),
(25, 'Normal', '15', '50', '20', '0', 'outstation'),
(26, 'Heavy', '15', '50', '20', '20', 'local'),
(27, 'Heavy', '15', '50', '20', '0', 'outstation');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_master`
--

CREATE TABLE `tbl_vehicle_master` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `vnumber` varchar(50) NOT NULL,
  `vregistrationnumber` varchar(50) NOT NULL,
  `vphoto` varchar(50) NOT NULL,
  `insurance_number` varchar(50) NOT NULL,
  `insurance_photo` varchar(150) NOT NULL,
  `plate_type` enum('commercial','private') NOT NULL,
  `vlatitude` varchar(50) NOT NULL,
  `vlongitude` varchar(50) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `demail` varchar(100) NOT NULL,
  `dimage` varchar(50) NOT NULL,
  `dmobile` varchar(10) NOT NULL,
  `dlicence_number` varchar(100) NOT NULL,
  `dlicence_doc` varchar(50) NOT NULL,
  `dexperience` int(3) NOT NULL DEFAULT 0,
  `password` varchar(100) NOT NULL,
  `logincookie` varchar(100) DEFAULT NULL,
  `logincookiepass` varchar(100) DEFAULT NULL,
  `fmctoken` varchar(255) NOT NULL,
  `dtype` enum('app','web') NOT NULL,
  `cat` enum('CAB','GOODS','RENTAL') DEFAULT NULL,
  `subcat` varchar(100) DEFAULT NULL,
  `alocal` enum('yes','no') NOT NULL DEFAULT 'no',
  `along` enum('yes','no') NOT NULL DEFAULT 'no',
  `status` enum('0','free','inuse','verify','blocked') NOT NULL DEFAULT 'verify'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehicle_master`
--

INSERT INTO `tbl_vehicle_master` (`id`, `aid`, `vname`, `vnumber`, `vregistrationnumber`, `vphoto`, `insurance_number`, `insurance_photo`, `plate_type`, `vlatitude`, `vlongitude`, `dname`, `demail`, `dimage`, `dmobile`, `dlicence_number`, `dlicence_doc`, `dexperience`, `password`, `logincookie`, `logincookiepass`, `fmctoken`, `dtype`, `cat`, `subcat`, `alocal`, `along`, `status`) VALUES
(25, 17, 'DMScorpio', 'jh01xxxx', 'xxxxxxxx', '5fd81397e88c6.jpeg', '', '', 'commercial', '25.0960742', '85.3131194', 'MiniTravels1', 'minitravelagency@gmail.com', '5fd81397e8c92.jpeg', '8789882539', '1234567890', '5fd81397e8d21.jpeg', 5, '', NULL, NULL, '', 'app', 'CAB', 'Large', 'no', 'no', 'free'),
(27, 18, 'DM Wagonr', 'jh01xxx1', 'xxxxxxx1', '5fd819795f43b.jpeg', '', '', 'commercial', '25.0960742', '85.3131194', 'Minitravels', '16azharuddin@gmail.com', '5fd819795f590.jpeg', '7766044811', '12313233', '5fd819795f63b.jpeg', 5, '', NULL, NULL, '', 'app', 'CAB', 'Small', 'no', 'no', 'inuse'),
(28, 19, 'DM Swift Desire', 'jh12xx12', 'xxxxxxxx2', '5fd82b93b94a3.jpeg', '', '', 'commercial', '23.3786709', '85.3464082', 'MiniTravels', 'sk825252@gmail.com', '5fd82b93b9631.jpeg', '7004417126', '2345678765432', '5fd82b93b96db.jpeg', 5, '', 'ffd1b16d58581d9357aeb8e3f25d74c9', '9e7e2e93afa2362f7475eddc8ea1ad92', 'fWLzslgjSfGga-KXliUxTv:APA91bFowNhe1WLKKvob-mUQu5iTLSR4VyqNMYzTfd3Ic6_CFEnBdBs0dmWxLL1iNlwQgo3RWzaKuHrhwBsyOY2aiRa0c93izzwHRrgqTueTXvQZAxoTXZ3RvC8tyXoz43214fVl_r-O', 'app', 'CAB', 'Medium', 'yes', 'yes', 'free'),
(29, 22, 'Test', '123', '123', '5fdd21b0312fc.jpeg', '', '', 'commercial', '25.0960742', '85.3131194', 'John Doe', 'teamguardiandummy01@gmail.com', '5fdd21b0322c2.jpeg', '9772827002', '123', '5fdd21b0331b5.jpeg', 0, '', NULL, NULL, '', 'app', 'CAB', 'Small', 'no', 'no', 'verify');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet_txn_master_agent`
--

CREATE TABLE `tbl_wallet_txn_master_agent` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `description` varchar(300) NOT NULL,
  `txntype` enum('ride','req') NOT NULL,
  `accountnumber` varchar(100) DEFAULT NULL,
  `ifsc` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `rrid` varchar(100) DEFAULT NULL,
  `pid` varchar(50) DEFAULT NULL,
  `admb` decimal(20,2) DEFAULT NULL,
  `status` enum('pending','success') NOT NULL,
  `nwallet` decimal(20,2) NOT NULL,
  `con` timestamp NOT NULL DEFAULT current_timestamp(),
  `pon` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wallet_txn_master_agent`
--

INSERT INTO `tbl_wallet_txn_master_agent` (`id`, `aid`, `amount`, `description`, `txntype`, `accountnumber`, `ifsc`, `name`, `rrid`, `pid`, `admb`, `status`, `nwallet`, `con`, `pon`) VALUES
(2, 19, '500.00', 'Withdrawel Request', 'ride', 'srj.kmr.pro@kotak', 'ifsc', 'Suraj Kumar', '63', NULL, '20.00', 'success', '55667.00', '2021-01-12 10:29:35', '2021-01-13 13:13:06'),
(3, 19, '-600.00', 'Withdrawel Request', 'req', 'srj.kmr.pro@kotak', 'ifsc', 'Suraj Kumar', NULL, '234567676', NULL, 'success', '55167.00', '2021-01-12 10:29:41', '2021-01-13 13:07:41'),
(4, 19, '-5000.00', 'Withdrawel Request', 'req', 'srj.kmr.pro@kotak', 'ifsc', 'Suraj Kumar', NULL, '71674567267563273', NULL, 'success', '50167.00', '2021-01-12 10:29:53', '2021-01-13 11:03:49'),
(5, 19, '-6500.00', 'Withdrawel Request', 'req', 'srj.kmr.pro@kotak', 'ifsc', 'Suraj Kumar', NULL, '12345676543', NULL, 'success', '43667.00', '2021-01-12 10:30:00', '2021-01-13 13:04:46'),
(6, 19, '-500.00', 'Withdrawel Request', 'req', 'srj.kmr.pro@kotak', 'ifsc', 'Suraj Kumar', NULL, '57326857635', NULL, 'success', '43167.00', '2021-01-13 13:14:13', '2021-01-13 13:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet_txn_master_customer`
--

CREATE TABLE `tbl_wallet_txn_master_customer` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `msg` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `txn_id` varchar(100) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `con` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wallet_txn_master_customer`
--

INSERT INTO `tbl_wallet_txn_master_customer` (`id`, `cid`, `amount`, `msg`, `description`, `txn_id`, `rid`, `con`) VALUES
(2, 165, '200.00', 'Mini Wallet', 'Rs 200 Successfully added To Your Wallet', 'pay_GOMrbYofrEU9NN', NULL, '2021-01-12 10:47:52'),
(3, 165, '100.00', 'Mini Wallet', 'Rs 100 Successfully added To Your Wallet', 'pay_GONY9gcAmqQd0T', NULL, '2021-01-12 11:28:08'),
(14, 165, '-100.00', 'Used For Trip : 66', 'Your wallet is debited of &#8377 100.00 for Trip:66', NULL, 66, '2021-01-14 11:22:57'),
(15, 163, '100.00', 'Mini Wallet', 'Rs 100 Successfully added To Your Wallet', 'pay_GPBDXnIz7fhgIF', NULL, '2021-01-14 12:03:19'),
(16, 163, '-100.00', 'Used For Trip : 68', 'Your wallet is debited of &#8377 100.00 for Trip:68', NULL, 68, '2021-01-14 12:41:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manage_gallery`
--
ALTER TABLE `manage_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_master`
--
ALTER TABLE `tbl_admin_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `fotp` (`fotp`);

--
-- Indexes for table `tbl_agentpay_master`
--
ALTER TABLE `tbl_agentpay_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rid` (`rid`);

--
-- Indexes for table `tbl_agent_master`
--
ALTER TABLE `tbl_agent_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `fotp` (`fotp`);

--
-- Indexes for table `tbl_canceled_ride_by_pilot`
--
ALTER TABLE `tbl_canceled_ride_by_pilot`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rid` (`rid`);

--
-- Indexes for table `tbl_coupon_master`
--
ALTER TABLE `tbl_coupon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_master`
--
ALTER TABLE `tbl_customer_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `tbl_notification_master`
--
ALTER TABLE `tbl_notification_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ride_master`
--
ALTER TABLE `tbl_ride_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_cat_master`
--
ALTER TABLE `tbl_vehicle_cat_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_master`
--
ALTER TABLE `tbl_vehicle_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vnumber` (`vnumber`),
  ADD UNIQUE KEY `vregistrationnumber` (`vregistrationnumber`),
  ADD UNIQUE KEY `demail` (`demail`),
  ADD UNIQUE KEY `dmobile` (`dmobile`),
  ADD UNIQUE KEY `dlicence_number` (`dlicence_number`),
  ADD UNIQUE KEY `logincookie` (`logincookie`);

--
-- Indexes for table `tbl_wallet_txn_master_agent`
--
ALTER TABLE `tbl_wallet_txn_master_agent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rrid` (`rrid`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `tbl_wallet_txn_master_customer`
--
ALTER TABLE `tbl_wallet_txn_master_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rid` (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manage_gallery`
--
ALTER TABLE `manage_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_admin_master`
--
ALTER TABLE `tbl_admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_agentpay_master`
--
ALTER TABLE `tbl_agentpay_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_agent_master`
--
ALTER TABLE `tbl_agent_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_coupon_master`
--
ALTER TABLE `tbl_coupon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_customer_master`
--
ALTER TABLE `tbl_customer_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `tbl_notification_master`
--
ALTER TABLE `tbl_notification_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_ride_master`
--
ALTER TABLE `tbl_ride_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_vehicle_cat_master`
--
ALTER TABLE `tbl_vehicle_cat_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_vehicle_master`
--
ALTER TABLE `tbl_vehicle_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_wallet_txn_master_agent`
--
ALTER TABLE `tbl_wallet_txn_master_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_wallet_txn_master_customer`
--
ALTER TABLE `tbl_wallet_txn_master_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
