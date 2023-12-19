-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 04:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--
CREATE DATABASE IF NOT EXISTS `data` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `data`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id`, `name`, `email`, `age`, `country`) VALUES
(4, 'Akila', 'akeeumayanga@gmail.com', '24', 'sl'),
(5, 'dikki', 'dilan@gmail.com', '26', 'NZ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Database: `dbtest`
--
CREATE DATABASE IF NOT EXISTS `dbtest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbtest`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `name`, `lastname`, `contact`, `address`) VALUES
(32, 'Akila', 'Umayanga', '4565', 'rau'),
(33, 'Akila', 'Umayanga', '4565', 'rau'),
(34, 'Akila', 'Umayanga', '4565', 'rau'),
(35, 'Akila', 'Umayanga', '4565', 'rau');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Database: `lplsystem`
--
CREATE DATABASE IF NOT EXISTS `lplsystem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lplsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email`, `password`, `profile_picture`) VALUES
(1, 'Akila', 'Umayanga', 'admin@gmail.com', '$2y$10$2bHX4KfQRVTT.DzFqTDZceYYmcCNyoUKSTYRf2xpmZhlgr0/x.ZDO', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `allrounder`
--

CREATE TABLE `allrounder` (
  `player_al_id` int(11) NOT NULL,
  `b_style` varchar(255) DEFAULT NULL,
  `lpl_nom` int(6) DEFAULT NULL,
  `t20_nom` int(6) DEFAULT NULL,
  `runs` int(6) DEFAULT NULL,
  `b_average` float DEFAULT NULL,
  `strike_rate` float DEFAULT NULL,
  `high_score` int(6) DEFAULT NULL,
  `not_out` int(11) DEFAULT NULL,
  `fifty` int(6) DEFAULT NULL,
  `hundred` int(6) DEFAULT NULL,
  `bowl_style` varchar(255) DEFAULT NULL,
  `wickets` int(6) DEFAULT NULL,
  `bowl_average` float DEFAULT NULL,
  `economy` float DEFAULT NULL,
  `best_bowl` varchar(100) DEFAULT NULL,
  `w5` int(11) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL,
  `base_price` int(11) DEFAULT NULL,
  `gotoauction` int(1) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allrounder`
--

INSERT INTO `allrounder` (`player_al_id`, `b_style`, `lpl_nom`, `t20_nom`, `runs`, `b_average`, `strike_rate`, `high_score`, `not_out`, `fifty`, `hundred`, `bowl_style`, `wickets`, `bowl_average`, `economy`, `best_bowl`, `w5`, `sold`, `base_price`, `gotoauction`, `team_id`) VALUES
(137, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'Right Hand', 32, 324, 234, 324, 324, 234, 234, 324, 234, 'Right Arm Off Break', 234, 243, 234, ' 324', 234, 7000, 324, 1, 21),
(153, 'Left Hand', 32, 213, 213, 132, 312, 132, 321, 321, 123, 'Rigth Arm Leg Break Googly', 132, 312, 312, ' 321', 213, 250, 213, 1, 20),
(158, 'Right Hand', 324, 324, 324, 324, 342, 324, 324, 234, 342, 'Right Arm Fast Bowler', 342, 342, 324, ' 342', 234, NULL, 342, 1, NULL),
(159, 'Right Hand', 43, 324, 324, 324, 342, 324, 324, 324, 324, 'Right Arm Medium Fast Bowler', 234, 432, 324, ' 342', 342, 777, 342, 1, 20),
(163, 'Right Hand', 23, 123, 312, 312, 312, 123, 132, 312, 12, 'Rigth Arm Leg Break Googly', 123, 123, 321, ' 12', 132, 1000, 213, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `auction_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `auction_start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `auction_end_time` timestamp NULL DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auction_id`, `player_id`, `auction_start_time`, `auction_end_time`, `active`) VALUES
(298, 135, '2023-12-11 13:24:41', '2023-12-11 08:54:41', 1),
(299, 138, '2023-12-11 13:26:22', '2023-12-11 08:56:22', 1),
(300, 137, '2023-12-11 13:28:04', '2023-12-11 08:58:04', 1),
(301, 136, '2023-12-11 13:29:30', '2023-12-11 08:59:30', 1),
(302, 137, '2023-12-11 13:30:40', '2023-12-11 09:00:40', 1),
(303, 136, '2023-12-11 13:39:05', '2023-12-11 09:09:05', 1),
(304, 146, '2023-12-11 13:47:00', '2023-12-11 09:17:00', 1),
(305, 139, '2023-12-11 13:54:54', '2023-12-11 09:24:54', 1),
(306, 146, '2023-12-11 13:56:50', '2023-12-11 09:26:50', 1),
(307, 139, '2023-12-11 13:59:31', '2023-12-11 09:29:31', 1),
(308, 146, '2023-12-11 14:00:53', '2023-12-11 09:30:53', 1),
(310, 148, '2023-12-12 08:24:28', '2023-12-12 03:54:28', 1),
(311, 157, '2023-12-12 08:25:49', '2023-12-12 03:55:49', 1),
(312, 148, '2023-12-12 08:28:53', '2023-12-12 03:58:53', 1),
(313, 160, '2023-12-12 08:30:35', '2023-12-12 04:00:35', 1),
(316, 156, '2023-12-12 08:45:09', '2023-12-12 04:15:09', 1),
(317, 168, '2023-12-13 03:01:51', '2023-12-12 22:31:25', 1),
(318, 148, '2023-12-13 14:18:20', '2023-12-13 09:48:20', 1),
(319, 157, '2023-12-13 14:20:20', '2023-12-13 09:50:20', 1),
(320, 150, '2023-12-14 01:28:05', '2023-12-13 20:58:05', 1),
(321, 157, '2023-12-15 12:45:06', '2023-12-15 08:15:06', 1),
(322, 151, '2023-12-15 12:47:15', '2023-12-15 08:17:15', 1),
(323, 168, '2023-12-15 13:08:26', '2023-12-15 08:38:26', 1),
(324, 160, '2023-12-15 13:09:34', '2023-12-15 08:39:34', 1),
(325, 151, '2023-12-15 14:37:33', '2023-12-15 10:07:33', 1),
(326, 161, '2023-12-15 15:04:21', '2023-12-15 10:34:21', 1),
(327, 152, '2023-12-15 15:06:01', '2023-12-15 10:36:01', 1),
(328, 153, '2023-12-15 15:07:22', '2023-12-15 10:37:22', 1),
(329, 152, '2023-12-15 17:10:36', '2023-12-15 12:40:36', 1),
(330, 162, '2023-12-15 17:13:46', '2023-12-15 12:43:46', 1),
(331, 151, '2023-12-16 00:54:57', '2023-12-15 20:24:57', 1),
(332, 153, '2023-12-16 00:57:48', '2023-12-15 20:27:48', 1),
(333, 151, '2023-12-16 01:06:06', '2023-12-15 20:36:06', 1),
(334, 153, '2023-12-16 01:08:10', '2023-12-15 20:38:10', 1),
(335, 162, '2023-12-16 01:12:28', '2023-12-15 20:42:28', 1),
(336, 168, '2023-12-16 01:14:17', '2023-12-15 20:44:17', 1),
(337, 151, '2023-12-16 01:16:53', '2023-12-15 20:46:53', 1),
(338, 152, '2023-12-16 01:21:50', '2023-12-15 20:51:50', 1),
(339, 153, '2023-12-16 01:25:14', '2023-12-15 20:55:13', 1),
(340, 161, '2023-12-16 01:26:23', '2023-12-15 20:56:23', 1),
(341, 151, '2023-12-16 01:31:02', '2023-12-15 21:01:02', 1),
(342, 168, '2023-12-16 01:33:59', '2023-12-15 21:03:59', 1),
(343, 162, '2023-12-16 01:35:31', '2023-12-15 21:05:31', 1),
(344, 153, '2023-12-16 01:37:43', '2023-12-15 21:07:43', 1),
(345, 152, '2023-12-16 01:40:55', '2023-12-15 21:10:55', 1),
(346, 153, '2023-12-16 01:42:06', '2023-12-15 21:12:06', 1),
(347, 151, '2023-12-16 01:53:01', '2023-12-15 21:23:01', 1),
(348, 162, '2023-12-16 01:54:19', '2023-12-15 21:24:19', 1),
(349, 168, '2023-12-16 01:58:18', '2023-12-15 21:28:18', 1),
(350, 158, '2023-12-16 02:00:52', '2023-12-15 21:30:52', 1),
(351, 168, '2023-12-16 02:02:04', '2023-12-15 21:32:04', 1),
(352, 158, '2023-12-16 02:03:08', '2023-12-15 21:33:08', 1),
(353, 168, '2023-12-16 02:04:26', '2023-12-15 21:34:26', 1),
(354, 159, '2023-12-16 02:06:41', '2023-12-15 21:36:41', 1),
(355, 169, '2023-12-16 02:07:58', '2023-12-15 21:37:58', 1),
(356, 167, '2023-12-16 02:09:09', '2023-12-15 21:39:09', 1),
(357, 174, '2023-12-16 02:13:11', '2023-12-15 21:43:11', 1),
(358, 158, '2023-12-16 02:43:57', '2023-12-15 22:13:57', 1),
(359, 159, '2023-12-16 02:46:32', '2023-12-15 22:16:32', 1),
(360, 167, '2023-12-16 02:47:54', '2023-12-15 22:17:54', 1),
(361, 168, '2023-12-16 03:32:23', '2023-12-15 23:02:23', 1),
(362, 158, '2023-12-16 03:33:39', '2023-12-15 23:03:39', 1),
(363, 167, '2023-12-16 04:38:45', '2023-12-16 00:08:45', 1),
(364, 158, '2023-12-16 04:46:38', '2023-12-16 00:16:38', 1),
(365, 159, '2023-12-16 05:12:29', '2023-12-16 00:42:29', 1),
(366, 169, '2023-12-16 05:13:44', '2023-12-16 00:43:44', 1),
(367, 158, '2023-12-16 05:14:53', '2023-12-16 00:44:53', 1),
(368, 159, '2023-12-16 05:31:33', '2023-12-16 01:01:33', 1),
(369, 158, '2023-12-16 05:40:43', '2023-12-16 01:10:43', 1),
(370, 163, '2023-12-16 06:07:06', '2023-12-16 01:37:06', 1),
(371, 158, '2023-12-16 06:08:23', '2023-12-16 01:38:23', 1),
(372, 159, '2023-12-16 06:38:13', '2023-12-16 02:08:13', 1),
(373, 174, '2023-12-16 07:07:08', '2023-12-16 02:37:07', 1),
(374, 167, '2023-12-16 07:09:29', '2023-12-16 02:39:29', 1),
(375, 174, '2023-12-16 07:21:43', '2023-12-16 02:51:43', 1),
(376, 158, '2023-12-16 07:23:49', '2023-12-16 02:53:49', 1),
(377, 167, '2023-12-16 07:48:22', '2023-12-16 03:18:22', 1),
(378, 168, '2023-12-16 12:56:40', '2023-12-16 08:26:39', 1),
(379, 158, '2023-12-16 12:58:23', '2023-12-16 08:28:23', 1),
(380, 168, '2023-12-16 14:01:12', '2023-12-16 09:31:12', 1),
(381, 174, '2023-12-16 14:05:10', '2023-12-16 09:35:10', 1),
(382, 171, '2023-12-16 20:14:53', '2023-12-16 15:44:53', 1),
(383, 168, '2023-12-16 20:18:45', '2023-12-16 15:48:45', 1),
(384, 171, '2023-12-16 20:22:02', '2023-12-16 15:52:02', 1),
(385, 168, '2023-12-17 03:22:39', '2023-12-16 22:52:39', 1),
(386, 171, '2023-12-17 03:23:47', '2023-12-16 22:53:47', 1),
(387, 168, '2023-12-17 06:44:02', '2023-12-17 02:14:02', 1),
(388, 171, '2023-12-17 06:45:07', '2023-12-17 02:15:07', 1),
(389, 158, '2023-12-17 06:59:22', '2023-12-17 02:29:22', 1),
(390, 176, '2023-12-17 07:16:26', '2023-12-17 02:46:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batsman`
--

CREATE TABLE `batsman` (
  `player_batting_id` int(11) NOT NULL,
  `b_style` varchar(255) DEFAULT NULL,
  `lpl_nom` int(6) DEFAULT NULL,
  `t20_nom` int(6) DEFAULT NULL,
  `runs` int(6) DEFAULT NULL,
  `b_average` float DEFAULT NULL,
  `strike_rate` float DEFAULT NULL,
  `high_score` int(6) DEFAULT NULL,
  `not_out` int(6) DEFAULT NULL,
  `fifty` int(6) DEFAULT NULL,
  `hundred` int(6) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL,
  `based_price` int(11) DEFAULT NULL,
  `gotoauction` int(1) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batsman`
--

INSERT INTO `batsman` (`player_batting_id`, `b_style`, `lpl_nom`, `t20_nom`, `runs`, `b_average`, `strike_rate`, `high_score`, `not_out`, `fifty`, `hundred`, `sold`, `based_price`, `gotoauction`, `team_id`) VALUES
(135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, 1, 20),
(138, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, 1, 20),
(156, 'Left Hand', 33, 33, 33, 33, 33, 33, 33, 33, 33, 15000, 33, 0, 20),
(161, 'Right Hand', 123, 231, 321, 132, 312, 312, 321, 321, 321, 75, 312, 1, 20),
(167, 'Right Hand', 243, 324, 324, 324, 324, 324, 432, 432, 324, 1000, 432, 1, 20),
(171, 'Right Hand', 32, 32, 32, 32, 32, 32, 32, 32, 3, 1000, 23, 1, 21),
(172, 'Right Hand', 20, 20, 20, 20, 20, 20, 20, 20, 20, 15000, 20, 0, 18),
(174, 'Right Hand', 234, 342, 43, 234, 324, 324, 324, 324, 324, 1000, 324, 1, 20),
(176, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, NULL, 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bid_id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `bid_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bid_id`, `player_id`, `team_id`, `bid_price`) VALUES
(515, 135, 20, '1000.00'),
(516, 138, 20, '1000.00'),
(517, 137, 20, '856.00'),
(518, 136, 20, '452.00'),
(519, 146, 20, '1000.00'),
(520, 146, 20, '1000.00'),
(521, 139, 20, '1000.00'),
(522, 146, 20, '6874.00'),
(523, 148, 20, '4444.00'),
(524, 156, 20, '9999.00'),
(525, 148, 21, '2000.00'),
(526, 148, 21, '5000.00'),
(527, 150, 20, '2000.00'),
(528, 150, 21, '7000.00'),
(529, 157, 20, '1000.00'),
(530, 160, 20, '6874.00'),
(531, 161, 20, '75.00'),
(532, 152, 20, '350.00'),
(533, 153, 20, '250.00'),
(534, 151, 20, '1230.00'),
(535, 162, 20, '1230.00'),
(536, 169, 20, '5000.00'),
(537, 159, 20, '777.00'),
(539, 167, 20, '1000.00'),
(540, 174, 20, '1000.00'),
(541, 171, 20, '75.00'),
(542, 171, 21, '1000.00'),
(543, 176, 20, '500.00'),
(544, 176, 21, '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `bowler`
--

CREATE TABLE `bowler` (
  `player_bowlling_id` int(11) NOT NULL,
  `bowl_style` varchar(255) DEFAULT NULL,
  `lpl_nom` int(6) DEFAULT NULL,
  `t20_nom` int(6) DEFAULT NULL,
  `wickets` int(6) DEFAULT NULL,
  `bowl_average` float DEFAULT NULL,
  `economy` float DEFAULT NULL,
  `best_bowl` varchar(100) DEFAULT NULL,
  `w5` int(11) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL,
  `besed_price` int(11) DEFAULT NULL,
  `gotoauction` int(1) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bowler`
--

INSERT INTO `bowler` (`player_bowlling_id`, `bowl_style`, `lpl_nom`, `t20_nom`, `wickets`, `bowl_average`, `economy`, `best_bowl`, `w5`, `sold`, `besed_price`, `gotoauction`, `team_id`) VALUES
(148, 'Right Arm Fast Bowler', 33, 33, 33, 33, 33, '33', 33, 5000, 33, 1, 21),
(157, 'Right Arm Fast Bowler', 33, 33, 333, 33, 33, '33', 33, 1000, 33, 1, 20),
(160, 'Right Arm Fast Bowler', 22, 22, 22, 22, 22, '22', 22, 6874, 22, 1, 20),
(168, 'Right Arm Fast Bowler', 32, 32, 32, 32, 32, '321', 32, NULL, 32, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `massage` text NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `sender_id`, `receiver_id`, `massage`, `status`) VALUES
(1, 1, 19, 'wdewfewfeewfew', NULL),
(2, 1, 19, 'asdf', NULL),
(3, 0, 1, 'hi', NULL),
(4, 20, 1, 'hi', NULL),
(5, 20, 1, 'hii', NULL),
(6, 19, 1, 'hiii', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `d_id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `sold_price` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`d_id`, `player_id`, `sold_price`, `team_id`, `year`) VALUES
(17, 146, 6874, 20, 2023),
(18, 148, 5000, 21, 2023),
(19, 157, 1000, 20, 2023),
(20, 160, 6874, 20, 2023),
(21, 156, 9999, 20, 2023),
(22, 147, NULL, NULL, 2023),
(23, 168, NULL, NULL, 2023),
(24, 150, 7000, 21, 2023),
(25, 151, 1230, 20, 2023),
(32, 152, 350, 20, 2023),
(33, 153, 250, 20, 2023),
(34, 161, 75, 20, 2023),
(35, 162, 1230, 20, 2023),
(36, 158, NULL, NULL, 2023),
(37, 159, 777, 20, 2023),
(38, 167, 1000, 20, 2023),
(39, 174, 1000, 20, 2023),
(40, 169, 5000, 20, 2023),
(41, 163, NULL, NULL, 2023),
(42, 171, 1000, 21, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `verification` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `first_name`, `last_name`, `email`, `password`, `profile_photo`, `dob`, `verification`, `verification_code`) VALUES
(18, 'Dilanka', 'Rajapaksha', 'savindudilanka16@gmail.com', '$2y$10$heKYmxeXsENIfqRCRW0aMuq375UEXDiG9fzHPh581/IRSSmCh1RH.', 'm2H7i8i8m2K9d3G6.jpg', '2023-09-03', '0', '66a252a7f4d695e255b8d6b5451c1bc8'),
(19, 'Akila', 'Umayanga', 'akeeumayanga777775@gmail.com', '$2y$10$dkoWCf0y0kdmVfB3O4vwVe7H7s8MSid/HcCdeb79NuX5fiKrochre', 'GridArt_20221101_214643649.jpg', '1999-10-26', '0', 'feb9b5ee9f35d69f3bb91e95cd21c0b7'),
(20, 'Akila', 'Umayanga', 'aakeeumayanga7775@gmail.com', '$2y$10$01xK4/aTovaf5YTXYuhMWOOdBhYleVBcxIl.gk2Ctf4nwFZY6i7gS', 'IMG-20231106-WA0067.jpg', '2023-12-12', '0', '89bd94a2d55699ad22d343fa251082b6'),
(21, 'Akila', 'Umayanga', 'guest@gmail.com', '$2y$10$P57CF/3Wz63OYePQAQWqtev9cq9BhSrzpG9wpStjEGGjO6ToSa5w6', 'IMG-20231106-WA0067.jpg', '2023-12-05', '0', '46703fb10e96d08dca023b7a7b2f17e0');

-- --------------------------------------------------------

--
-- Table structure for table `moderators`
--

CREATE TABLE `moderators` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moderators`
--

INSERT INTO `moderators` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`) VALUES
(19, 'Moderator', '2', 'moderator2@gmail.com', '$2y$10$KapPeQI7sKbhSn/PqM.cSOeDBU.x0xldbJ.OVUmDeR8BAR81BIWsi', 'male'),
(20, 'Moderator', '1', 'moderator1@gmail.com', '$2y$10$aGPpdcE1XgjXn9GnQJtPYO1eJWjFiqRSRVLRCwdl/DdqiQi8/nffC', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `post_text` text NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `posted_date` date NOT NULL,
  `likes_count` int(11) NOT NULL,
  `unlikes_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `player_id`, `post_text`, `post_img`, `posted_date`, `likes_count`, `unlikes_count`) VALUES
(2, 135, 'Friendz', 'babar.jpg', '2023-12-06', 254, 0),
(3, 138, 'I Like lpl', 'asalanka vs siraj.jpg', '2023-12-01', 0, 0),
(4, 139, 'ONE-indu❤️ #LPL2023 #Wanindu', 'super waniya.jpg', '2023-12-07', 0, 0),
(5, 139, 'Pubg ❤️❤️❤️', 'dana pubg.jpg', '2023-12-05', 0, 0),
(6, 141, 'sdasdfaf edfdfhyguhgh', '', '2023-12-01', 0, 0),
(7, 143, 'A left handed top-order batsman and a wicket-keeper. Sounds all too familiar in the Sri Lankan circuit. Niroshan Dickwella presents himself as yet another one of these all-round options. Like most of the young Sri Lankan batsmen to have made it big, Dickwella’s majot claim to fame was his Schoolboy Cricketer of the Year award in 2012 when he amassed over 1000 runs to lead Trinity College to the title. The transformation upwards saw him become a regular for his domestic side, Nondescripts Cricket Club, keeping wickets and opening the batting. He soon earned a reputation for himself of being a highly attacking option in the limited overs format.', 'dikka.jpg', '2023-12-11', 0, 0),
(8, 138, 'Eazy', 'Charith A drop bat.jpg', '2023-12-15', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `player_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `identity` varchar(255) DEFAULT NULL,
  `identity_number` varchar(255) DEFAULT NULL,
  `identity_photo` varchar(255) DEFAULT NULL,
  `catogary` varchar(255) DEFAULT NULL,
  `capped` varchar(255) DEFAULT NULL,
  `additional_details` text DEFAULT NULL,
  `certificate_photo` varchar(255) DEFAULT NULL,
  `verification` varchar(255) DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `approved` varchar(255) DEFAULT NULL,
  `moderators_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`player_id`, `first_name`, `last_name`, `email`, `password`, `country`, `dob`, `profile_photo`, `identity`, `identity_number`, `identity_photo`, `catogary`, `capped`, `additional_details`, `certificate_photo`, `verification`, `verification_code`, `approved`, `moderators_id`) VALUES
(135, 'Babar', 'Azam', 'babarazam@gmail.com', '$2y$10$meQG2InU0lV2jaW4AfNgC.VbqsLJetsDFTsp97/cCEqslfEcO6R/i', 'Pakisthan', '1994-10-15', 'babar.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '850a436b17fe6a375dfb2295618b5d3b', 'Yes', 20),
(136, 'Jos', 'Buttler', 'josbuttler@gmail.com', '$2y$10$PpmRZQYzQ8S.qRMrGWQHKORlWF3SwlDTUby/GMcNkslhgt4Mzlq.u', 'England', '1990-09-08', 'butller.jpg', 'nic', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', '51817fad7e12dc837d25dc1e183bfe40', 'Yes', 20),
(137, 'Chamika', 'Karunarathna', 'chamika@gmail.com', '$2y$10$UQb.sQgB3uU5oC2KTtM0U.qT9OenA5XJJS5FnWo/J7ea.iYWrPDYC', 'Sri lanka', '1996-05-29', 'chamika.jpg', 'nic', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', 'e484cd6ed2b38efb7ff735089a387e06', 'Yes', 20),
(138, 'Charith', 'Asalanka', 'charith@gmail.com', '$2y$10$8Lni8b9cLhIwZ9HXuXyL3OAHYgVgc9SBIUIybUqtOFK13VcMXXCAu', 'Sri lanka', '1997-06-29', 'charith.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '2a9188b88e92721b11f80c2fd7c59926', 'Yes', 20),
(139, 'Dhananjaya', 'De Silava', 'dhananjaya@gmail.com', '$2y$10$PtUN8UILxzgPhPYN0Yd9jugC2c6nOUuUDpBiWQk0AA8uT4r5vaUPe', 'Sri lanka', '1991-06-09', 'dananjaya.jpg', 'nic', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', '34d922ee941451bb11612ed82844d37d', 'Yes', 20),
(140, 'Dhanushka', 'Gunathilaka', 'gunathilaka@gmail.com', '$2y$10$ZxYThw1AvAAbSmbwYsu6DOShj1Mbssy/6ky4qgIrqxxJR7izZXInm', 'Sri lanka', '0991-12-03', 'danushka.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '7e1fe7996123c476e28d5677648e66b7', 'Yes', 20),
(141, 'Dasun', 'Shanaka', 'dasun@gmail.com', '$2y$10$SNk3yIZpPbgj62LIdIulQ./xGDrjJO7NAy1CWTbmFSnjsWLEo.L8a', 'Sri lanka', '1991-09-09', 'dasun.jpg', 'nic', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', '90ab702d3298ccdc60d1497b348eef33', 'Yes', 20),
(142, 'Shikar', 'Dhawan', 'dhawan@gmail.com', '$2y$10$sE9y32Al7M3IzhOAtbPQbeZlWb4f4zjz.xj34gNHBscfizdH7Mk7a', 'India', '1985-05-12', 'dawan.png', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'f7a57016958f1c6ffe9756425f4b8162', 'Yes', 20),
(143, 'Niroshan', 'Dickwella', 'dickwella@gmail.com', '$2y$10$.59icrmjwPRPonxRDQyZVOgg18GtRZn7Vdcgv5ebZqnpeMaUr7KUG', 'Sri lanka', '1993-06-23', 'dickwela.jpg', 'nic', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', '94bcc2e64ad8f6d07554d4cfa060b537', 'Yes', 20),
(144, 'Dilshan', 'Madusanka', 'dilshan@gmail.com', '$2y$10$GZG.FFLjv/eTew7GizmnTuHkMTQtvTOn5WFrBBhhQ7/gfTjtlpHa.', 'Sri lanka', '2000-08-09', 'dilshan madusanka.jpg', 'nic', '993001970V', 'images.png', 'BOWLER', 'Yes', '                            ', '', '1', 'cd9f184e412f9004771917151ce9f69a', 'Yes', 20),
(145, 'Dilshan', 'Munaweera', 'dishanmunaweera@gmail.com', '$2y$10$UfJPBl/yvxQb2wpBoqVTXuJVr/SV26ZBV634tlPYjDIqEZC/V5Lvi', 'Sri lanka', '1989-04-12', 'dilshan munaweera.jpg', 'driving_license', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'ae5a9809eff3f761da8ec1c6d6afb858', 'Yes', 20),
(146, 'MS', 'Dhoni', 'dhoni@gmail.com', '$2y$10$Ob.8PCtpbGOeKo0WDkl73.15tlIL4KgqMc94whiwZOoloxtgo57jy', 'India', '1981-07-07', 'doni.png', 'driving_license', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', 'c6bd79630258fdef6b64ccc41693bd1c', 'Yes', 20),
(147, 'Dunith', 'Wellalage', 'dunith@gmail.com', '$2y$10$bBE9SWA6nAEsOEfY2A1LDOJXl5F1/XFwaHMHd9Gq26EADVy5uh93K', 'Sri lanka', '2003-09-01', 'dunit.png', 'driving_license', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', '160061592a49d84927c22d8f8d47aecc', 'Yes', 20),
(148, 'Dushmantha', 'Chameera', 'dushmantha@gmail.com', '$2y$10$2FD9F3oSlvhJBbSyYuwh3OSixmVTSsBx2gGwVjDXoaajf6LsycXiG', 'Sri lanka', '1992-12-01', 'dushmantha.jpg', 'driving_license', '993001970V', 'images.png', 'BOWLER', 'Yes', '                            ', '', '1', '37b262688b3db0d53ab6fe4c851fb827', 'Yes', 20),
(149, 'Shubman', 'Gill', 'shubman@gmail.com', '$2y$10$LicbuLErTUju3gT6E/6oL.qUi0qoO.6PEWYp9xW3CJN96P7QRGXBa', 'India', '1999-08-09', 'gill.png', 'driving_license', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'ca546979f278b61b052c272ec2bbb5d6', 'Yes', 20),
(150, 'Hardik', 'Pandya', 'hardik@gmIl.com', '$2y$10$CMG7Rr5Ewllp7ZeUOTRE3OwXdkRpZMDfsFCs/o4YUE/a8EjvXBGrK', 'India', '1993-11-10', 'hardik.png', 'driving_license', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', 'cb588b6c10bb29068b46f04aa01dec80', 'Yes', 19),
(151, 'Rahmanulla', 'Gurbaz', 'gurbas@gmail.com', '$2y$10$Rw5RmayVuKAm/dEIjD6nYelxxkYvjG/KqH5d3CBStfdjC8VfJ3N4m', 'Afganisthan', '2001-02-08', 'gurbaz.jpg', 'driving_license', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', 'cb879ad5e96e781f8a5fb1f92b872ff4', 'Yes', 20),
(152, 'Ishan', 'Kishan', 'ishan@gmail.com', '$2y$10$HSLXL8/wxxoOIVaIZXNqNODbwM5mt8h3ZV8Een16LFKbTKjzfoTg.', 'India', '1998-12-07', 'ishan.png', 'driving_license', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', 'd8d768c9938c43e7a03e784bcc8ec1ee', 'Yes', 20),
(153, 'Ravindra', 'Jadeja', 'jadeja@gmail.com', '$2y$10$1pUBkyyxmYoc7BBq7CEhsuiZEYSpAE2hz8H48Oo2Vh5USa19/5l/2', 'India', '1988-06-12', 'jadeja.png', 'nic', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', 'a92b0ef5fed2e309e08d8d1f6649edf1', 'Yes', 20),
(154, 'Kane', 'Willianson', 'kane@gmail.com', '$2y$10$yYQ1wPcrAEA9FSABHyX2buNhDhyfCEYDsRtcIaOm/sLTIMn5wC/XO', 'New Zealand', '1990-08-24', 'ken.png', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '586710627e035b497f635edb66500a39', 'Yes', 20),
(155, 'Kusal', 'Perera', 'kusalperera@gmail.com', '$2y$10$EQzMExPUd53ek3vw8fFIeOhY8nNOVGwU4iVQbjZEGGo5e0zzivab2', 'Sri lanka', '1990-08-17', 'kusalperera.jpg', 'driving_license', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', 'e2cf5dddb941a8050d64bc42f3a571e4', 'Yes', 20),
(156, 'Kusal', 'Mendis', 'kusalmendis@gmail.com', '$2y$10$sr69xbS9KAjlbS5xJeiM..lwMXDivwgbSKCTftlnMxGVoP4CSzE9.', 'Sri lanka', '1995-02-02', 'kusal mendis.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '9661d604a124d3c25e95e69de7281144', 'Yes', 20),
(157, 'Maheesh', 'Theekshana', 'maheesh@gmail.com', '$2y$10$L4g0nzUKVbTgJ/utUTaHQu5ZZfcrKYvELHFvWazwmA1DVwKwxq.Iy', 'Sri lanka', '2001-08-01', 'maheesh.jpg', 'driving_license', '993001970V', 'images.png', 'BOWLER', 'Yes', '                            ', '', '1', 'ff3aeff528b9722d782aa317f11449cb', 'Yes', 20),
(158, 'Glenn', 'Maxwell', 'maxwell@gmail.com', '$2y$10$fgj8rMUR5UC9lpnyU/Hkh.BxuELpQYY/T02dk7EEDumfaS/p8CVqi', 'Australia', '2023-12-06', 'maxwell.jpg', 'nic', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', 'd887fe6995ffa24b6720c4fbed68e253', 'Yes', 20),
(159, 'Angelo', 'Mathews', 'angelo@gmail.com', '$2y$10$szvTw7UnZ7q5xPn0t66iU.Ny3cIGhRpsdcJt4l/cQNDIyb.vU3Cs2', 'Sri lanka', '1987-02-06', 'methews.jpg', 'driving_license', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', 'a6771cec5f168370f3c7196cba2885f9', 'Yes', 20),
(160, 'Nuwan', 'Pradeep', 'nuwan@gmail.com', '$2y$10$qSD/KLILH4FlkmX3a97ee.0BstE0nI8GeH3Mr/5UNwHgkSFo3B4k.', 'Sri lanka', '1986-12-10', 'nuwan pradeep.jpg', 'driving_license', '993001970V', 'images.png', 'BOWLER', 'Yes', '                            ', '', '1', 'a056f074e7fb3a024f4e40c040e96639', 'Yes', 20),
(161, 'Pethum', 'Nissanka', 'pethum@gmail.com', '$2y$10$w1xxjKXZzP90V4rLaqltPuZVuQluTcCSYVIlsKAkqztgh0RV/Xd5q', 'Sri lanka', '1998-12-05', 'pethum.jpg', 'driving_license', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '0ec43641a98d407a31d33d8b1b414d13', 'Yes', 20),
(162, 'KL', 'Rahul', 'rahul@gmail.com', '$2y$10$beec2eb4R9bm9PDrBfkTau.4h.zRld0vtLahgzwlOPb8Ua4iLXo0W', 'India', '1992-10-04', 'rahul.jpg', 'driving_license', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', '007577c2c6d112283295aaa0d4adaa8d', 'Yes', 20),
(163, 'Rashid', 'Khan', 'rashid@gmail.com', '$2y$10$wdmgPeEfT25g8QGgb9A19eXtBlbvNL/ml1Z952n9Z/HlubhC0cWN2', 'Afganisthan', '1998-09-21', 'rashid.png', 'driving_license', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', '3531b7238bd94802da021cc7e898f32c', 'Yes', 20),
(164, 'Mohomad', 'Riswan', 'riswan@gmail.com', '$2y$10$0IHtLm0yRddSmwnP9Fbd.ehEr7uLjxDkUJyoWOeJlFdGP3sguBeQK', 'Pakisthan', '1992-01-06', 'riswan.png', 'nic', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', 'dd99294ca58d60ef152b241569256415', NULL, 0),
(165, 'Rohith', 'Sharma', 'rohith@gmail.com', '$2y$10$Xmnp.F4EhduZbBifoGj/1ep.93EQ82WXFwFu6Ew8DJ/0TY0rS0Sjm', 'India', '1987-03-01', 'rohith.jpg', 'driving_license', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'b4664753ebc3e10b3cc72db03e927897', 'Yes', 20),
(166, 'sadeera', 'Samarawickrama', 'sadeera@gmail.com', '$2y$10$T7G6LSvmbVzRXW.ZvAKZ4eVZkuaF.W8AEjhnl2NBNg.tICa7TMeM6', 'Sri lanka', '1995-08-30', 'sadeera.jpeg', 'nic', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', '9c350d54b3ef7ebfd2050f9913777998', NULL, 0),
(167, 'Steve', 'Smith', 'smith@gmail.com', '$2y$10$UoV8WADJ3nwEWUb3rDya4ec9h90hYgZ/BabbVhAKy6p4nBXioQTpy', 'Australia', '1989-06-02', 'smith.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'a066fb53c7bf78139b411bdb887160c1', 'Yes', 20),
(168, 'Mitchell', 'Stark', 'mitchell@gmail.com', '$2y$10$lVOLbu11zwfJs53hVuyD0u7W5/FPojohx.mXadZOt/Ro7sX1qJsTO', 'Australia', '1990-08-15', 'stark.png', 'driving_license', '993001970V', 'images.png', 'BOWLER', 'Yes', '                            ', '', '1', 'cd653729f267d3262c400edb32e0a10a', 'Yes', 20),
(169, 'Tom', 'Letham', 'tomletham@gmail.com', '$2y$10$Uz1Gn4gPijHW3txk0jBMruuRdJ5Y0icp0iobEne44gemcvZMkUqf2', 'New Zealand', '1992-06-12', 'tom.png', 'nic', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', '90c059ad0c5764eba85353346918c4f7', 'Yes', 20),
(170, 'Wanindu', 'Hasaranga', 'waniduhasaranga@gmail.com', '$2y$10$AYj8N3TVjm0H52s6GQCaSeSyBn3qyuJCgwwgzGCBuMBumb1QCFhBS', 'Sri lanka', '1997-07-29', 'wanindu.jpg', 'driving_license', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', '9a02f2ebc93db7430b2dc790e24e59cc', NULL, 0),
(171, 'Devid', 'Warner', 'devid@gmail.com', '$2y$10$x1RFHyTW37NLJzOqpUWdmOHauDcIi45hyMA4x4oeBMe/z.OfU6Szm', 'Australia', '1987-10-27', 'wonner.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'b871f2f31e1a1adb86683b6094d432af', 'Yes', 20),
(172, 'Akila', 'Umayanga', 'akeeumayanga7775@gmail.com', '$2y$10$O/L1QNQ2PM0W93HEPseifOek9/EyQNFbev.e1cd2w8McGhNHoisoa', 'Sri lanka', '1999-10-26', 'chamika.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '2d2d1e17fe1d70f55a2cf88811025c8a4bd8df4fa0df10a4c23275702a8273c0', 'Yes', 20),
(174, 'Akila', 'Umayanga', 'akeeumayanga777335@gmail.com', '$2y$10$.JKAakiPeUD1nAvPspMAv.b6pZ1AizsTlveBFhSDQjhrmNaUdO0oa', 'Sri lanka', '2023-12-27', 'IMG-20231106-WA0067.jpg', 'nic', '9930016970V', 'IMG-20231106-WA0068.jpg', 'BATSMAN', 'Yes', '                            ', '', '0', '1e7dc0c0d2caa736b93c75f13fe12940', 'Yes', 20),
(176, 'Kusal', 'Mendis', 'randima19991213@gmail.com', '$2y$10$RfoLEEiTvXm9ku8U1hl.beoIrQ1RvaJu4gUd/7kgvDiKjKWif.3HS', 'Sri Lanka', '2023-11-29', '657e9eb8003a7_1702796984.jpg', 'nic', '199821542v', '657e9eb7f32e1_1702796983.jpg', 'BATSMAN', 'Yes', '                            ', '657e9eb80039b_1702796984.', '1', '575bba5da329e291efeb9f9fddda0510', 'Yes', 20);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id` int(11) NOT NULL,
  `auction_year` year(4) NOT NULL,
  `no_local_players` int(11) NOT NULL,
  `no_foering_players` int(11) NOT NULL,
  `total_amount_of_bid` int(11) NOT NULL,
  `total_amount_of_contract` int(11) NOT NULL,
  `auction_duration_time` int(11) NOT NULL,
  `register_period` int(11) NOT NULL,
  `start` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id`, `auction_year`, `no_local_players`, `no_foering_players`, `total_amount_of_bid`, `total_amount_of_contract`, `auction_duration_time`, `register_period`, `start`) VALUES
(1, 2023, 11, 9, 100000000, 10000000, 1, 2, '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `team_name`, `owner_name`, `email`, `password`, `icon`) VALUES
(17, 'Jaffna Kings', 'Jaffna Owner', 'team3@gmail.com', '$2y$10$L2COah5UTrbm5ffUGR3fNeKdMZUXARngkCKKRCiWl2MvkF8icHAxK', 'jaffna.png'),
(18, 'B - Love Kandy', 'Kandy Owner', 'team4@gmail.com', '$2y$10$iMxri8mMXCny3O8DPBuRNOJzxrEJfifQa3yet6/DtGp58YL2WSJv2', 'Screenshot (6).png'),
(20, 'Colombo Strikers', 'Colombo Owner', 'team1@gmail.com', '$2y$10$RFmVNVPkY10df348pTI3S.HOGvQySfb3E.SCjtRPz9nNC2iIHKVd6', 'colombo.png'),
(21, 'Galle Titans', 'Galle Owner', 'team2@gmail.com', '$2y$10$RFmVNVPkY10df348pTI3S.HOGvQySfb3E.SCjtRPz9nNC2iIHKVd6', 'galle.png'),
(22, 'Dambulla Aura', 'Dambulla Owner', 'team5@gmail.com', '$2y$10$8Sxf9h6Mfg93iTu3i0c4RuNLWeHG0hZK9SEIwqXwhJE8gkY3gi9By', 'dabulla.png');

-- --------------------------------------------------------

--
-- Table structure for table `wicketkeeper`
--

CREATE TABLE `wicketkeeper` (
  `player_keeping_id` int(11) NOT NULL,
  `b_style` varchar(255) DEFAULT NULL,
  `lpl_nom` int(6) DEFAULT NULL,
  `t20_nom` int(6) DEFAULT NULL,
  `runs` int(6) DEFAULT NULL,
  `b_average` float DEFAULT NULL,
  `strike_rate` float DEFAULT NULL,
  `high_score` int(6) DEFAULT NULL,
  `not_out` int(6) DEFAULT NULL,
  `stumps` int(6) DEFAULT NULL,
  `catch` int(6) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL,
  `based_price` int(11) DEFAULT NULL,
  `gotoauction` int(1) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wicketkeeper`
--

INSERT INTO `wicketkeeper` (`player_keeping_id`, `b_style`, `lpl_nom`, `t20_nom`, `runs`, `b_average`, `strike_rate`, `high_score`, `not_out`, `stumps`, `catch`, `sold`, `based_price`, `gotoauction`, `team_id`) VALUES
(136, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 452, NULL, 1, 20),
(146, 'Left Hand', 43, 34, 43, 34, 3434, 43, 43, 34, 43, 6874, 34, 1, 20),
(151, 'Left Hand', 34, 32, 234, 324, 324, 324, 324, 324, 324, 1230, 324, 1, 20),
(152, 'Right Hand', 321, 123, 132, 321, 321, 321, 312, 312, 312, 350, 321, 1, 20),
(162, 'Left Hand', 324, 324, 324, 342, 432, 432, 42, 342, 342, 1230, 342, 1, 20),
(169, 'Left Hand', 234, 234, 234, 324, 234, 324, 243, 32, 324, 15000, 4323, 0, 20);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'database', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"admin\",\"allrounder\",\"auction\",\"batsman\",\"bid\",\"bowler\",\"data\",\"guest\",\"moderators\",\"register\",\"rule\",\"team\",\"wicketkeeper\"],\"table_structure[]\":[\"admin\",\"allrounder\",\"auction\",\"batsman\",\"bid\",\"bowler\",\"data\",\"guest\",\"moderators\",\"register\",\"rule\",\"team\",\"wicketkeeper\"],\"table_data[]\":[\"admin\",\"allrounder\",\"auction\",\"batsman\",\"bid\",\"bowler\",\"data\",\"guest\",\"moderators\",\"register\",\"rule\",\"team\",\"wicketkeeper\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(2, 'root', 'server', 'database lplsystem', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"data\",\"dbtest\",\"lplsystem\",\"phpmyadmin\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"lplsystem\",\"table\":\"register\"},{\"db\":\"mysql\",\"table\":\"innodb_index_stats\"},{\"db\":\"lplsystem\",\"table\":\"team\"},{\"db\":\"lplsystem\",\"table\":\"bowler\"},{\"db\":\"lplsystem\",\"table\":\"batsman\"},{\"db\":\"lplsystem\",\"table\":\"allrounder\"},{\"db\":\"lplsystem\",\"table\":\"bid\"},{\"db\":\"lplsystem\",\"table\":\"auction\"},{\"db\":\"lplsystem\",\"table\":\"rule\"},{\"db\":\"lplsystem\",\"table\":\"wicketkeeper\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-12-19 15:40:19', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
