-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 01:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lplsystem`
--

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
(1, 'Akila', 'Umayanga', 'admin@gmail.com', '$2y$10$GDC3qoLOBZeY8OtLwxAEN.4L6h4lLe71mphL2DoFqYZaTKeM1pz86', 'admin.jpg');

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
(3, 138, 'I Like lpl', 'asalanka vs siraj.jpg', '2023-12-01', 1, 0),
(4, 139, 'ONE-indu❤️ #LPL2023 #Wanindu', 'super waniya.jpg', '2023-12-07', 1, 0),
(5, 139, 'Pubg ❤️❤️❤️', 'dana pubg.jpg', '2023-12-05', 9, 0),
(6, 141, 'sdasdfaf edfdfhyguhgh', '', '2023-12-01', 1, 0),
(7, 143, 'A left handed top-order batsman and a wicket-keeper. Sounds all too familiar in the Sri Lankan circuit. Niroshan Dickwella presents himself as yet another one of these all-round options. Like most of the young Sri Lankan batsmen to have made it big, Dickwella’s majot claim to fame was his Schoolboy Cricketer of the Year award in 2012 when he amassed over 1000 runs to lead Trinity College to the title. The transformation upwards saw him become a regular for his domestic side, Nondescripts Cricket Club, keeping wickets and opening the batting. He soon earned a reputation for himself of being a highly attacking option in the limited overs format.', 'dikka.jpg', '2023-12-11', 2, 0),
(8, 138, 'Eazy', 'Charith A drop bat.jpg', '2023-12-15', 9, 0),
(11, 172, 'dog and me', 'GridArt_20221101_213718851.jpg', '2023-12-17', 22, 0);

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
(135, 'Babar', 'Azam', 'babarazam@gmail.com', '$2y$10$meQG2InU0lV2jaW4AfNgC.VbqsLJetsDFTsp97/cCEqslfEcO6R/i', 'Pakisthan', '1994-10-15', 'babar.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '850a436b17fe6a375dfb2295618b5d3b', NULL, 0),
(136, 'Jos', 'Buttler', 'josbuttler@gmail.com', '$2y$10$PpmRZQYzQ8S.qRMrGWQHKORlWF3SwlDTUby/GMcNkslhgt4Mzlq.u', 'England', '1990-09-08', 'butller.jpg', 'nic', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', '51817fad7e12dc837d25dc1e183bfe40', NULL, 0),
(137, 'Chamika', 'Karunarathna', 'chamika@gmail.com', '$2y$10$UQb.sQgB3uU5oC2KTtM0U.qT9OenA5XJJS5FnWo/J7ea.iYWrPDYC', 'Sri lanka', '1996-05-29', 'chamika.jpg', 'nic', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', 'e484cd6ed2b38efb7ff735089a387e06', NULL, 0),
(138, 'Charith', 'Asalanka', 'charith@gmail.com', '$2y$10$8Lni8b9cLhIwZ9HXuXyL3OAHYgVgc9SBIUIybUqtOFK13VcMXXCAu', 'Sri lanka', '1997-06-29', 'charith.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '2a9188b88e92721b11f80c2fd7c59926', NULL, 0),
(139, 'Dhananjaya', 'De Silava', 'dhananjaya@gmail.com', '$2y$10$PtUN8UILxzgPhPYN0Yd9jugC2c6nOUuUDpBiWQk0AA8uT4r5vaUPe', 'Sri lanka', '1991-06-09', 'dananjaya.jpg', 'nic', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', '34d922ee941451bb11612ed82844d37d', NULL, 0),
(140, 'Dhanushka', 'Gunathilaka', 'gunathilaka@gmail.com', '$2y$10$ZxYThw1AvAAbSmbwYsu6DOShj1Mbssy/6ky4qgIrqxxJR7izZXInm', 'Sri lanka', '0991-12-03', 'danushka.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '7e1fe7996123c476e28d5677648e66b7', NULL, 0),
(141, 'Dasun', 'Shanaka', 'dasun@gmail.com', '$2y$10$SNk3yIZpPbgj62LIdIulQ./xGDrjJO7NAy1CWTbmFSnjsWLEo.L8a', 'Sri lanka', '1991-09-09', 'dasun.jpg', 'nic', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', '90ab702d3298ccdc60d1497b348eef33', NULL, 0),
(142, 'Shikar', 'Dhawan', 'dhawan@gmail.com', '$2y$10$sE9y32Al7M3IzhOAtbPQbeZlWb4f4zjz.xj34gNHBscfizdH7Mk7a', 'India', '1985-05-12', 'dawan.png', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'f7a57016958f1c6ffe9756425f4b8162', NULL, 0),
(143, 'Niroshan', 'Dickwella', 'dickwella@gmail.com', '$2y$10$.59icrmjwPRPonxRDQyZVOgg18GtRZn7Vdcgv5ebZqnpeMaUr7KUG', 'Sri lanka', '1993-06-23', 'dickwela.jpg', 'nic', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', '94bcc2e64ad8f6d07554d4cfa060b537', NULL, 0),
(144, 'Dilshan', 'Madusanka', 'dilshan@gmail.com', '$2y$10$GZG.FFLjv/eTew7GizmnTuHkMTQtvTOn5WFrBBhhQ7/gfTjtlpHa.', 'Sri lanka', '2000-08-09', 'dilshan madusanka.jpg', 'nic', '993001970V', 'images.png', 'BOWLER', 'Yes', '                            ', '', '1', 'cd9f184e412f9004771917151ce9f69a', NULL, 0),
(145, 'Dilshan', 'Munaweera', 'dishanmunaweera@gmail.com', '$2y$10$UfJPBl/yvxQb2wpBoqVTXuJVr/SV26ZBV634tlPYjDIqEZC/V5Lvi', 'Sri lanka', '1989-04-12', 'dilshan munaweera.jpg', 'driving_license', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'ae5a9809eff3f761da8ec1c6d6afb858', NULL, 0),
(146, 'MS', 'Dhoni', 'dhoni@gmail.com', '$2y$10$Ob.8PCtpbGOeKo0WDkl73.15tlIL4KgqMc94whiwZOoloxtgo57jy', 'India', '1981-07-07', 'doni.png', 'driving_license', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', 'c6bd79630258fdef6b64ccc41693bd1c', NULL, 0),
(147, 'Dunith', 'Wellalage', 'dunith@gmail.com', '$2y$10$bBE9SWA6nAEsOEfY2A1LDOJXl5F1/XFwaHMHd9Gq26EADVy5uh93K', 'Sri lanka', '2003-09-01', 'dunit.png', 'driving_license', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', '160061592a49d84927c22d8f8d47aecc', NULL, 0),
(148, 'Dushmantha', 'Chameera', 'dushmantha@gmail.com', '$2y$10$2FD9F3oSlvhJBbSyYuwh3OSixmVTSsBx2gGwVjDXoaajf6LsycXiG', 'Sri lanka', '1992-12-01', 'dushmantha.jpg', 'driving_license', '993001970V', 'images.png', 'BOWLER', 'Yes', '                            ', '', '1', '37b262688b3db0d53ab6fe4c851fb827', NULL, 0),
(149, 'Shubman', 'Gill', 'shubman@gmail.com', '$2y$10$LicbuLErTUju3gT6E/6oL.qUi0qoO.6PEWYp9xW3CJN96P7QRGXBa', 'India', '1999-08-09', 'gill.png', 'driving_license', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'ca546979f278b61b052c272ec2bbb5d6', NULL, 0),
(150, 'Hardik', 'Pandya', 'hardik@gmIl.com', '$2y$10$CMG7Rr5Ewllp7ZeUOTRE3OwXdkRpZMDfsFCs/o4YUE/a8EjvXBGrK', 'India', '1993-11-10', 'hardik.png', 'driving_license', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', 'cb588b6c10bb29068b46f04aa01dec80', NULL, 0),
(151, 'Rahmanulla', 'Gurbaz', 'gurbas@gmail.com', '$2y$10$Rw5RmayVuKAm/dEIjD6nYelxxkYvjG/KqH5d3CBStfdjC8VfJ3N4m', 'Afganisthan', '2001-02-08', 'gurbaz.jpg', 'driving_license', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', 'cb879ad5e96e781f8a5fb1f92b872ff4', NULL, 0),
(152, 'Ishan', 'Kishan', 'ishan@gmail.com', '$2y$10$HSLXL8/wxxoOIVaIZXNqNODbwM5mt8h3ZV8Een16LFKbTKjzfoTg.', 'India', '1998-12-07', 'ishan.png', 'driving_license', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', 'd8d768c9938c43e7a03e784bcc8ec1ee', NULL, 0),
(153, 'Ravindra', 'Jadeja', 'jadeja@gmail.com', '$2y$10$1pUBkyyxmYoc7BBq7CEhsuiZEYSpAE2hz8H48Oo2Vh5USa19/5l/2', 'India', '1988-06-12', 'jadeja.png', 'nic', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', 'a92b0ef5fed2e309e08d8d1f6649edf1', NULL, 0),
(154, 'Kane', 'Willianson', 'kane@gmail.com', '$2y$10$yYQ1wPcrAEA9FSABHyX2buNhDhyfCEYDsRtcIaOm/sLTIMn5wC/XO', 'New Zealand', '1990-08-24', 'ken.png', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '586710627e035b497f635edb66500a39', NULL, 0),
(155, 'Kusal', 'Perera', 'kusalperera@gmail.com', '$2y$10$EQzMExPUd53ek3vw8fFIeOhY8nNOVGwU4iVQbjZEGGo5e0zzivab2', 'Sri lanka', '1990-08-17', 'kusalperera.jpg', 'driving_license', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', 'e2cf5dddb941a8050d64bc42f3a571e4', NULL, 0),
(156, 'Kusal', 'Mendis', 'kusalmendis@gmail.com', '$2y$10$sr69xbS9KAjlbS5xJeiM..lwMXDivwgbSKCTftlnMxGVoP4CSzE9.', 'Sri lanka', '1995-02-02', 'kusal mendis.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '9661d604a124d3c25e95e69de7281144', NULL, 0),
(157, 'Maheesh', 'Theekshana', 'maheesh@gmail.com', '$2y$10$L4g0nzUKVbTgJ/utUTaHQu5ZZfcrKYvELHFvWazwmA1DVwKwxq.Iy', 'Sri lanka', '2001-08-01', 'maheesh.jpg', 'driving_license', '993001970V', 'images.png', 'BOWLER', 'Yes', '                            ', '', '1', 'ff3aeff528b9722d782aa317f11449cb', NULL, 0),
(158, 'Glenn', 'Maxwell', 'maxwell@gmail.com', '$2y$10$fgj8rMUR5UC9lpnyU/Hkh.BxuELpQYY/T02dk7EEDumfaS/p8CVqi', 'Australia', '2023-12-06', 'maxwell.jpg', 'nic', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', 'd887fe6995ffa24b6720c4fbed68e253', NULL, 0),
(159, 'Angelo', 'Mathews', 'angelo@gmail.com', '$2y$10$szvTw7UnZ7q5xPn0t66iU.Ny3cIGhRpsdcJt4l/cQNDIyb.vU3Cs2', 'Sri lanka', '1987-02-06', 'methews.jpg', 'driving_license', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', 'a6771cec5f168370f3c7196cba2885f9', NULL, 0),
(160, 'Nuwan', 'Pradeep', 'nuwan@gmail.com', '$2y$10$qSD/KLILH4FlkmX3a97ee.0BstE0nI8GeH3Mr/5UNwHgkSFo3B4k.', 'Sri lanka', '1986-12-10', 'nuwan pradeep.jpg', 'driving_license', '993001970V', 'images.png', 'BOWLER', 'Yes', '                            ', '', '1', 'a056f074e7fb3a024f4e40c040e96639', NULL, 0),
(161, 'Pethum', 'Nissanka', 'pethum@gmail.com', '$2y$10$w1xxjKXZzP90V4rLaqltPuZVuQluTcCSYVIlsKAkqztgh0RV/Xd5q', 'Sri lanka', '1998-12-05', 'pethum.jpg', 'driving_license', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '0ec43641a98d407a31d33d8b1b414d13', NULL, 0),
(162, 'KL', 'Rahul', 'rahul@gmail.com', '$2y$10$beec2eb4R9bm9PDrBfkTau.4h.zRld0vtLahgzwlOPb8Ua4iLXo0W', 'India', '1992-10-04', 'rahul.jpg', 'driving_license', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', '007577c2c6d112283295aaa0d4adaa8d', NULL, 0),
(163, 'Rashid', 'Khan', 'rashid@gmail.com', '$2y$10$wdmgPeEfT25g8QGgb9A19eXtBlbvNL/ml1Z952n9Z/HlubhC0cWN2', 'Afganisthan', '1998-09-21', 'rashid.png', 'driving_license', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', '3531b7238bd94802da021cc7e898f32c', NULL, 0),
(164, 'Mohomad', 'Riswan', 'riswan@gmail.com', '$2y$10$0IHtLm0yRddSmwnP9Fbd.ehEr7uLjxDkUJyoWOeJlFdGP3sguBeQK', 'Pakisthan', '1992-01-06', 'riswan.png', 'nic', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', 'dd99294ca58d60ef152b241569256415', NULL, 0),
(165, 'Rohith', 'Sharma', 'rohith@gmail.com', '$2y$10$Xmnp.F4EhduZbBifoGj/1ep.93EQ82WXFwFu6Ew8DJ/0TY0rS0Sjm', 'India', '1987-03-01', 'rohith.jpg', 'driving_license', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'b4664753ebc3e10b3cc72db03e927897', NULL, 0),
(166, 'sadeera', 'Samarawickrama', 'sadeera@gmail.com', '$2y$10$T7G6LSvmbVzRXW.ZvAKZ4eVZkuaF.W8AEjhnl2NBNg.tICa7TMeM6', 'Sri lanka', '1995-08-30', 'sadeera.jpeg', 'nic', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', '9c350d54b3ef7ebfd2050f9913777998', NULL, 0),
(167, 'Steve', 'Smith', 'smith@gmail.com', '$2y$10$UoV8WADJ3nwEWUb3rDya4ec9h90hYgZ/BabbVhAKy6p4nBXioQTpy', 'Australia', '1989-06-02', 'smith.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'a066fb53c7bf78139b411bdb887160c1', NULL, 0),
(168, 'Mitchell', 'Stark', 'mitchell@gmail.com', '$2y$10$lVOLbu11zwfJs53hVuyD0u7W5/FPojohx.mXadZOt/Ro7sX1qJsTO', 'Australia', '1990-08-15', 'stark.png', 'driving_license', '993001970V', 'images.png', 'BOWLER', 'Yes', '                            ', '', '1', 'cd653729f267d3262c400edb32e0a10a', NULL, 0),
(169, 'Tom', 'Letham', 'tomletham@gmail.com', '$2y$10$Uz1Gn4gPijHW3txk0jBMruuRdJ5Y0icp0iobEne44gemcvZMkUqf2', 'New Zealand', '1992-06-12', 'tom.png', 'nic', '993001970V', 'images.png', 'WICKETKEEPER', 'Yes', '                            ', '', '1', '90c059ad0c5764eba85353346918c4f7', NULL, 0),
(170, 'Wanindu', 'Hasaranga', 'waniduhasaranga@gmail.com', '$2y$10$AYj8N3TVjm0H52s6GQCaSeSyBn3qyuJCgwwgzGCBuMBumb1QCFhBS', 'Sri lanka', '1997-07-29', 'wanindu.jpg', 'driving_license', '993001970V', 'images.png', 'ALLROUNDER', 'Yes', '                            ', '', '1', '9a02f2ebc93db7430b2dc790e24e59cc', NULL, 0),
(171, 'Devid', 'Warner', 'devid@gmail.com', '$2y$10$x1RFHyTW37NLJzOqpUWdmOHauDcIi45hyMA4x4oeBMe/z.OfU6Szm', 'Australia', '1987-10-27', 'wonner.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', 'b871f2f31e1a1adb86683b6094d432af', NULL, 0),
(172, 'Akila', 'Umayanga', 'akeeumayanga7775@gmail.com', '$2y$10$O/L1QNQ2PM0W93HEPseifOek9/EyQNFbev.e1cd2w8McGhNHoisoa', 'Sri lanka', '1999-10-26', 'chamika.jpg', 'nic', '993001970V', 'images.png', 'BATSMAN', 'Yes', '                            ', '', '1', '2d2d1e17fe1d70f55a2cf88811025c8a4bd8df4fa0df10a4c23275702a8273c0', NULL, 0),
(174, 'Akila', 'Umayanga', 'akeeumayanga777335@gmail.com', '$2y$10$.JKAakiPeUD1nAvPspMAv.b6pZ1AizsTlveBFhSDQjhrmNaUdO0oa', 'Sri lanka', '2023-12-27', 'IMG-20231106-WA0067.jpg', 'nic', '9930016970V', 'IMG-20231106-WA0068.jpg', 'BATSMAN', 'Yes', '                            ', '', '0', '1e7dc0c0d2caa736b93c75f13fe12940', NULL, 0),
(176, 'Kusal', 'Mendis', 'randima19991213@gmail.com', '$2y$10$RfoLEEiTvXm9ku8U1hl.beoIrQ1RvaJu4gUd/7kgvDiKjKWif.3HS', 'Sri Lanka', '2023-11-29', '657e9eb8003a7_1702796984.jpg', 'nic', '199821542v', '657e9eb7f32e1_1702796983.jpg', 'BATSMAN', 'Yes', '                            ', '657e9eb80039b_1702796984.', '1', '575bba5da329e291efeb9f9fddda0510', NULL, 0);

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
(1, '2023', 11, 9, 100000000, 10000000, 1, 2, '2023-12-08');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `allrounder`
--
ALTER TABLE `allrounder`
  ADD PRIMARY KEY (`player_al_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`auction_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `batsman`
--
ALTER TABLE `batsman`
  ADD PRIMARY KEY (`player_batting_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `player_id` (`player_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `bowler`
--
ALTER TABLE `bowler`
  ADD PRIMARY KEY (`player_bowlling_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wicketkeeper`
--
ALTER TABLE `wicketkeeper`
  ADD PRIMARY KEY (`player_keeping_id`),
  ADD KEY `team_id` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `auction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=546;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allrounder`
--
ALTER TABLE `allrounder`
  ADD CONSTRAINT `allrounder_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `register` (`player_id`);

--
-- Constraints for table `batsman`
--
ALTER TABLE `batsman`
  ADD CONSTRAINT `batsman_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `register` (`player_id`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Constraints for table `bowler`
--
ALTER TABLE `bowler`
  ADD CONSTRAINT `bowler_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Constraints for table `wicketkeeper`
--
ALTER TABLE `wicketkeeper`
  ADD CONSTRAINT `wicketkeeper_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
