-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 07:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photographer_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `cust_id` int(11) DEFAULT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `categ_name` varchar(50) DEFAULT NULL,
  `dateandtime` datetime NOT NULL,
  `venue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`cust_id`, `stud_id`, `categ_name`, `dateandtime`, `venue`) VALUES
(1, 1, 'baby shower', '2021-05-19 20:58:00', ''),
(1, 1, 'birthday', '2021-05-13 21:03:00', ''),
(1, 1, 'birthday', '2021-05-13 21:03:00', 'ymca , chennai'),
(1, 1, 'birthday', '2021-05-13 21:03:00', 'ymca , chennai'),
(25, 1, 'wedding', '2021-05-31 14:00:00', 'Tag auditorium , chennai.'),
(25, 1, 'wedding', '2021-05-31 14:00:00', 'Tag auditorium , chennai.'),
(25, 1, 'wedding', '2021-05-31 14:00:00', 'Tag auditorium , chennai.'),
(25, 1, 'wedding', '2021-05-31 14:00:00', 'Tag auditorium, Chennai.'),
(25, 1, 'wedding', '2021-05-31 14:00:00', 'Tag auditorium, Chennai.'),
(25, 1, 'wedding', '2021-05-31 14:00:00', 'Tag auditorium, Chennai.'),
(25, 1, 'wedding', '2021-05-31 14:00:00', 'Tag auditorium, Chennai.'),
(25, 2, 'baby shower', '2021-09-24 11:19:00', 'Chepauk, Chennai.'),
(29, 1, 'wedding', '2021-05-31 14:00:00', 'Tag auditorium, Chennai.'),
(25, 2, 'birthday', '2021-06-01 10:36:00', 'Leela palace, Chennai.'),
(29, 3, 'commercial', '2021-06-01 14:21:00', 'ITC grand chola, Chennai.'),
(25, 39, 'baby shower', '2021-05-15 11:25:00', 'Leela palace , chennai.'),
(25, 39, 'baby shower', '2021-05-15 11:25:00', 'Leela palace , chennai.'),
(25, 4, 'special occasion', '2021-06-03 11:34:00', 'Vivek audi , Chennai .'),
(1, 2, 'special occasion', '2021-05-31 18:07:00', 'Anna nagar, chennai .'),
(32, 2, 'birthday', '2021-05-31 17:30:00', 'Anna nagar , chennai .');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categ_name` varchar(50) NOT NULL,
  `stud_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categ_name`, `stud_id`) VALUES
('baby shower', 1),
('birthday', 1),
('special occasion', 1),
('wedding', 1),
('special occasion', 2),
('baby shower', 2),
('birthday', 2),
('wedding', 2),
('wedding', 3),
('birthday', 3),
('commercial', 3),
('ear piercing ', 3),
('special occasion', 3),
('special occasion', 4),
('commercial', 4),
('birthday', 4),
('wedding', 4),
('special occasion', 5),
('spiritual function ', 5),
('commercial', 5),
('engagement', 5),
('wedding', 5),
('wedding', 6),
('engagement', 6),
('commercial', 6),
('spiritual function ', 6),
('special occasion', 6),
('birthday', 24),
('baby shower', 24),
('birthday', 25),
('baby shower', 25),
('baby shower', 26),
('wedding', 30),
('birthday', 30),
('wedding', 32),
('birthday', 32),
('wedding', 4),
('wedding', 34),
('ear piercing', 34),
('commercial', 1),
('wedding', 35),
('ear piercing', 35),
('wedding', 37),
('birthday', 37),
('baby shower', 37),
('wedding', 38),
('birthday', 38),
('wedding', 39),
('birthday', 39),
('baby shower', 39);

-- --------------------------------------------------------

--
-- Table structure for table `coment`
--

CREATE TABLE `coment` (
  `cust_id` int(11) DEFAULT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `cust_comments` varchar(100) DEFAULT NULL,
  `comenttime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coment`
--

INSERT INTO `coment` (`cust_id`, `stud_id`, `cust_comments`, `comenttime`) VALUES
(1, 1, 'This studio is awesome . They are very punctual.', '2021-05-29 06:05:52'),
(1, 1, '', '2021-05-29 06:06:03'),
(1, 1, '', '2021-05-29 06:06:15'),
(1, 2, '', '2021-05-29 07:03:56'),
(1, 2, 'This studio is the best in the city for baby photoshoot.', '2021-05-29 07:04:28'),
(1, 2, 'Very nice studio...nice photographers.', '2021-05-29 07:04:58'),
(1, 37, 'They are the best studio in the town..', '2021-05-30 05:43:09'),
(1, 37, 'They are the best studio in the town..', '2021-05-30 05:44:12'),
(1, 37, 'They are the best studio in the town.. today', '2021-05-30 05:44:51'),
(29, 1, 'Wonderful photography  ....', '2021-05-30 10:27:29'),
(1, 38, 'Awesome Studio..', '2021-05-30 11:18:48'),
(1, 38, 'Awesome Studio..', '2021-05-30 11:18:57'),
(25, 2, 'Very nice people...kind hearted.', '2021-05-30 14:06:07'),
(29, 3, 'One of the best in the town..', '2021-05-30 17:48:30'),
(1, 1, 'Nice albums', '2021-05-31 08:22:39'),
(1, 1, 'Good portraits', '2021-05-31 08:23:08'),
(32, 2, 'Awesome photo studio', '2021-05-31 09:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(30) DEFAULT NULL,
  `cust_phone` varchar(12) NOT NULL,
  `cust_email` varchar(30) DEFAULT NULL,
  `cust_password` varchar(100) DEFAULT NULL,
  `cust_address` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_phone`, `cust_email`, `cust_password`, `cust_address`) VALUES
(1, 'vaanmathi', '9840128424', 'vaansrini3@gmail.com', '$2y$10$8GhjIKPp46CetxRD.mHacudeEBfP.0.tkLSFtEBum8a', 'chennai'),
(2, 'vaanu', '9876543210', 'vaan@gmail.com', '$2y$10$id93I7J4zs4xNUfQUSdxKufdyO9Xs2j12/fgqLVynr2', 'chennai'),
(3, 'barath', '9808912345', 'barathraj@gmail.com', '$2y$10$XoySZFRIeQXQlV7TByet4.WPoqivVDRW8JGvQKHb/BV7gy3w7hEEW', 'nehru nagar,erode'),
(4, 'sanjeev', '7890563422', 'sanjeevkarthick@gmail.com', '$2y$10$NugJ1RycpkoXeZSCAcEmLORxWjz5QVPj7YJLA8fVqa7o6X8g8WfaW', 'villivakam, chennai'),
(25, 'Sanjeev', '9347543556', 'sanjugirish2008@gmail.com', '$2y$10$oqPFazit7BC8XN54OrNBluKmS8xselegvHnOKnZiQdgKLBVpLkKWC', 'Room 23 , Marutham hostel , CEG , Guindy , Chennai.'),
(27, 'Veena', '9875642345', 'veenaprabhu2001@gmail.com', '$2y$10$8GhjIKPp46CetxRD.mHacudeEBfP.0.tkLSFtEBum8aN0RFflhfw.', ' 201 , Anna Nagar , Chennai .'),
(29, 'Veena', '9754365238', 'veenaprabu2001@gmail.com', '$2y$10$8GhjIKPp46CetxRD.mHacudeEBfP.0.tkLSFtEBum8aN0RFflhfw.', ' 322 , Anna Nagar , Chennai .'),
(32, 'sanjeev', '932562123', 'sanjeen.karthick.k@gmail.com', '$2y$10$8GhjIKPp46CetxRD.mHacudeEBfP.0.tkLSFtEBum8aN0RFflhfw.', ' Guindy , chennai.'),
(36, 'Vijayalakshmi ', '9787082407', 'tvijayalakshmi100@gmail.com', '$2y$10$8GhjIKPp46CetxRD.mHacudeEBfP.0.tkLSFtEBum8aN0RFflhfw.', '6/47 A1 subramaniya swami kovil street , kumarasamypet , Dha');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `stud_id` int(11) DEFAULT NULL,
  `img_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`stud_id`, `img_name`, `email`) VALUES
(1, '16.jpg', 'imageeye@gmail.com'),
(1, '14.jpg', 'imageeye@gmail.com'),
(1, '20.jpg', 'imageeye@gmail.com'),
(1, '15.jpg', 'imageeye@gmail.com'),
(12, 'Screenshot (102).png', 'newcolourlab@gmail.com'),
(12, 'Screenshot (103).png', 'newcolourlab@gmail.com'),
(12, 'Screenshot (104).png', 'newcolourlab@gmail.com'),
(12, 'Screenshot (105).png', 'newcolourlab@gmail.com'),
(12, 'Screenshot (106).png', 'newcolourlab@gmail.com'),
(12, 'Screenshot (107).png', 'newcolourlab@gmail.com'),
(13, '2J6A8842.JPG', 'bi@gmail.com'),
(13, '2J6A9386.JPG', 'bi@gmail.com'),
(13, '2J6A9969.JPG', 'bi@gmail.com'),
(13, '8X9A0941.JPG', 'bi@gmail.com'),
(22, 'dbms mini project.png', 'asdgf@1.com'),
(24, 'Screenshot (18).png', 'art@1.com'),
(24, 'Screenshot (19).png', 'art@1.com'),
(24, 'Screenshot (20).png', 'art@1.com'),
(24, 'Screenshot (21).png', 'art@1.com'),
(25, 'dbms mini project.png', '44@2.com'),
(30, 'Screenshot (25).png', 'arr@gmail.com'),
(32, 'Screenshot (103).png', 'stud@gmail.com'),
(32, 'Screenshot (104).png', 'stud@gmail.com'),
(32, 'Screenshot (105).png', 'stud@gmail.com'),
(32, 'Screenshot (106).png', 'stud@gmail.com'),
(34, '2J6A3352.JPG', 'nani@gmail.com'),
(34, '2J6A8842.JPG', 'nani@gmail.com'),
(34, '2J6A9386.JPG', 'nani@gmail.com'),
(34, '2J6A9969.JPG', 'nani@gmail.com'),
(35, '2J6A9969.JPG', 'sancode72@gmail.com'),
(37, '8X9A0941.JPG', 'sancode72@gmail.com'),
(37, '14.jpg', 'sancode72@gmail.com'),
(37, '15.jpg', 'sancode72@gmail.com'),
(38, '2J6A9969.JPG', 'vaanu2001@gmail.com'),
(38, '8X9A0941.JPG', 'vaanu2001@gmail.com'),
(38, '14.jpg', 'vaanu2001@gmail.com'),
(38, '15.jpg', 'vaanu2001@gmail.com'),
(39, '15.jpg', 'sanjeev.karthick.k@gmail.com'),
(39, '16.jpg', 'sanjeev.karthick.k@gmail.com'),
(39, '20.jpg', 'sanjeev.karthick.k@gmail.com'),
(39, '30.jpg', 'sanjeev.karthick.k@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `photostudio`
--

CREATE TABLE `photostudio` (
  `stud_id` int(11) NOT NULL,
  `stud_profile_pic` varchar(100) NOT NULL,
  `stud_name` varchar(50) DEFAULT NULL,
  `stud_phone` varchar(12) DEFAULT NULL,
  `stud_email` varchar(50) DEFAULT NULL,
  `stud_password` varchar(100) DEFAULT NULL,
  `stud_rating` int(11) DEFAULT NULL,
  `stud_address` varchar(60) DEFAULT NULL,
  `stud_city` varchar(50) NOT NULL,
  `stud_description` varchar(200) NOT NULL,
  `studio_val` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photostudio`
--

INSERT INTO `photostudio` (`stud_id`, `stud_profile_pic`, `stud_name`, `stud_phone`, `stud_email`, `stud_password`, `stud_rating`, `stud_address`, `stud_city`, `stud_description`, `studio_val`) VALUES
(1, 'photoo.jpg', 'imageeye', '04426284248', 'imageeye@gmail.com', '$2y$10$FyImTKL9QYZwz/JE6H9ApO7NXOskPJnXq/p76c2eTZ6ULDbT8uCOq', 3, 'anna nagar, chennai', 'chennai', 'We are one of the most famous studios in this city, mainly specialized in wedding.', 0),
(2, '', 'jaya studio', '9034523523', 'jayastud@gmail.com', '$2y$10$y2Sobu7fat2A1Bzlp1alnO/ykVm5Ssec0uf9v2YMcYjT08JNqcMMK', 4, 'anna nagar, chennai .', 'chennai', 'We specialize in capturing the moments of your life.', 0),
(3, '', 'era studio', '04423255950', 'era1998@gmail.com', '$2y$10$Dz7JlRbJOerZ75zYP4M8AeIeG7QiP.k4B6YPU4ISbS.qezXE6FIfu', 5, 'domlur, bengaluru', 'bengaluru', '', 0),
(4, '', 'pioneer studio', '04426244248', 'pioneer12@gmail.com', '$2y$10$SEAkDy3gW.nrBHJv61ruqegxL8pcmNS.UlRWmvJEFLVCagYeY1aha', NULL, 'indira nagar, bengaluru', 'bengaluru', '', 0),
(37, '8X9A0941.JPG', 'Capture the moment studio', '9922368377', 'sancode72@gmail.com', '$2y$10$WB2QeZbkyz0zhdEeiHo5EuvAnO/mMgwYV0fW8jN0cYN', 4, 'New No.1, Old No.2, Bharathidasan Salai,\r\nK.K.Nagar,. Chenna', 'chennai', 'We capture great moments', 0),
(38, '2J6A9969.JPG', 'Vaan studio', '8907654321', 'vaanu2001@gmail.com', '$2y$10$RlcIDz3AP7q7QzmyWgWm0erJu2z4LulMKaT7zqjxVgjBaLAlY5W5K', 5, 'Anna Nagar Chennai', 'chennai', 'We specialize in wedding .', 0),
(39, '2J6A3352.JPG', 'My pics ', '9999992222', 'sanjeev.karthick.k@gmail.com', '$2y$10$RlcIDz3AP7q7QzmyWgWm0erJu2z4LulMKaT7zqjxVgjBaLAlY5W5K', NULL, 'Nehru nagar , Chennai .', 'chennai', 'We have everything to make your life time moments cherish.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `cust_id` int(11) DEFAULT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `cust_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`cust_id`, `stud_id`, `cust_rating`) VALUES
(1, 1, 0),
(1, 1, 3),
(1, 1, 3),
(1, 2, 5),
(1, 2, 0),
(1, 2, 5),
(1, 37, 5),
(1, 37, 5),
(1, 37, 3),
(29, 1, 4),
(1, 38, 5),
(1, 38, 5),
(25, 2, 5),
(29, 3, 5),
(1, 1, 0),
(1, 1, 5),
(32, 2, 5);

--
-- Triggers `rating`
--
DELIMITER $$
CREATE TRIGGER `update_rate` AFTER INSERT ON `rating` FOR EACH ROW UPDATE photostudio SET stud_rating = (
      Select AVG(cust_rating) 
      from rating
      where photostudio.stud_id = rating.stud_id
      )
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `categ_name` (`categ_name`);

--
-- Indexes for table `coment`
--
ALTER TABLE `coment`
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_phone` (`cust_phone`),
  ADD UNIQUE KEY `cust_email` (`cust_email`);

--
-- Indexes for table `photostudio`
--
ALTER TABLE `photostudio`
  ADD PRIMARY KEY (`stud_id`),
  ADD UNIQUE KEY `stud_phone` (`stud_phone`),
  ADD UNIQUE KEY `stud_email` (`stud_email`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `photostudio`
--
ALTER TABLE `photostudio`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`stud_id`) REFERENCES `photostudio` (`stud_id`);

--
-- Constraints for table `coment`
--
ALTER TABLE `coment`
  ADD CONSTRAINT `coment_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  ADD CONSTRAINT `coment_ibfk_2` FOREIGN KEY (`stud_id`) REFERENCES `photostudio` (`stud_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`stud_id`) REFERENCES `photostudio` (`stud_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
