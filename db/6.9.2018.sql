-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 12:54 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testune`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `show_articles` (IN `id` VARCHAR(20))  NO SQL
SELECT article_id, name, description, date_posted, publish_state, duration, price,vendor_id from article where club_id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_courses` (IN `id` VARCHAR(20))  NO SQL
SELECT course_id, description_line, no_of_classes, course_fee, duration,vendor_id from live_course where club_id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_ebooks` (IN `id` VARCHAR(20))  NO SQL
SELECT book_id, name, author, description, price, duration,vendor_id from ebook where club_id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_online_tests` (IN `id` VARCHAR(20))  NO SQL
select  test_id, test_name, test_type, test_creator, publish_state,
test_data, duration , price,vendor_id from online_test where club_id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_summary` (IN `id` VARCHAR(20))  NO SQL
SELECT
  (SELECT COUNT(*) FROM webinar WHERE club_id= id) as webinar , 
  (SELECT COUNT(*) FROM online_test WHERE club_id=id) as online_test ,
  (SELECT COUNT(*) FROM video WHERE club_id=id)  as video,
  (SELECT COUNT(*) FROM ebook WHERE club_id=id) as ebook ,
  (SELECT COUNT(*) FROM article WHERE club_id=id) as article,
  (SELECT COUNT(*) FROM workshop WHERE club_id=id)  as workshop,
  (SELECT COUNT(*) FROM live_course WHERE club_id=id) as live_course$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_videos` (IN `id` VARCHAR(20))  NO SQL
SELECT video_id, title,description_line, price, duration,learning,vendor_id from video where club_id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_webinars` (IN `id` VARCHAR(20))  NO SQL
SELECT webinar_id,title,description, speaker, date, time,duration, vendor_id,price from webinar where club_id = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_workshops` (IN `id` VARCHAR(20))  NO SQL
SELECT workshop_id,title, description_line, price, class_applicable_for,course_fee, vendor_id from workshop where club_id = id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `sno` int(11) NOT NULL,
  `activities_id` varchar(20) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `activities_description` text NOT NULL,
  `icon` varchar(20) NOT NULL,
  `activity_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`sno`, `activities_id`, `page_name`, `activities_description`, `icon`, `activity_name`) VALUES
(1, 'act1', 'webinar.php', 'Webinar', 'webinar.png', 'webinar'),
(2, 'act2', 'article.php', 'articles', 'article.png', 'article'),
(3, 'act3', 'live_course.php', 'sdf', 'article.png', 'live_course'),
(4, 'act4', 'online_test.php', 'sdf', 'webinar.png', 'online_test'),
(5, 'act5', 'ebook.php', 'upload ebooks for each  activity', 'ebook.png', 'ebook'),
(6, 'act6', 'video.php', 'upload ebooks for each  activity', 'ebook.png', 'video'),
(7, 'act7', 'workshop.php', 'upload ebooks for each  activity', 'ebook.png', 'workshop');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `sno` int(11) NOT NULL,
  `club_id` varchar(20) DEFAULT NULL,
  `article_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_posted` date NOT NULL,
  `publish_state` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vendor_id` varchar(20) DEFAULT NULL,
  `duration` time NOT NULL,
  `article_file` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`sno`, `club_id`, `article_id`, `name`, `author`, `description`, `date_posted`, `publish_state`, `date_added`, `time_added`, `vendor_id`, `duration`, `article_file`, `price`) VALUES
(1, 'app', 'art_1', 'article updated', 'article updated', '<p>article updated</p>\r\n', '0000-00-00', 0, '2018-09-03 12:50:13', '2018-09-03 12:50:13', 'inst_1', '01:30:00', 'article updated_74.p', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `sno` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `club_name` varchar(100) NOT NULL,
  `club_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `club_category`
--

CREATE TABLE `club_category` (
  `sno` int(11) NOT NULL,
  `club_category_id` varchar(20) NOT NULL,
  `club_category_name` varchar(100) NOT NULL,
  `club_category_description` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club_category`
--

INSERT INTO `club_category` (`sno`, `club_category_id`, `club_category_name`, `club_category_description`, `date_time`) VALUES
(1, 'asd', 'asda', 'asdasd', '2018-08-22 12:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `content_manager`
--

CREATE TABLE `content_manager` (
  `sno` int(11) NOT NULL,
  `content_manager_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `experience` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `phone_no2` varchar(15) NOT NULL,
  `sec_email_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_manager`
--

INSERT INTO `content_manager` (`sno`, `content_manager_id`, `name`, `dob`, `address`, `phone_number`, `email_id`, `nationality`, `qualification`, `experience`, `photo`, `phone_no2`, `sec_email_id`, `username`, `date_time`) VALUES
(1, 'inst_1', 'Kiran Nambiar', '2018-08-02', 'asdasd', '123asd', 'a@a.com', 'in', 'ae', 'asdasd', 'Kiran Nambiar_2018-08-02_17.jpg', '123', 'abhi@a.com', 'a@a.com', '2018-08-20 16:19:50'),
(3, 'CMI_3', 'name', '2018-08-01', 'address', '123', 'emailid', 'in', 'ae', 'experience', 'name_2018-08-01_22.jpg', '456', 'sec email id', 'emailid', '2018-08-24 16:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `deployment_control`
--

CREATE TABLE `deployment_control` (
  `sno` int(11) NOT NULL,
  `for_page` varchar(20) NOT NULL,
  `class1` tinyint(1) DEFAULT NULL,
  `class2` tinyint(1) DEFAULT NULL,
  `class3` tinyint(1) DEFAULT NULL,
  `class4` tinyint(1) DEFAULT NULL,
  `class5` tinyint(1) DEFAULT NULL,
  `class6` tinyint(1) DEFAULT NULL,
  `class7` tinyint(1) DEFAULT NULL,
  `class8` tinyint(1) DEFAULT NULL,
  `class9` tinyint(1) DEFAULT NULL,
  `class10` tinyint(1) DEFAULT NULL,
  `class11` tinyint(1) DEFAULT NULL,
  `class12` tinyint(1) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `mon` tinyint(1) DEFAULT NULL,
  `tue` tinyint(1) DEFAULT NULL,
  `wed` tinyint(1) DEFAULT NULL,
  `thu` tinyint(1) DEFAULT NULL,
  `fri` tinyint(1) DEFAULT NULL,
  `sat` tinyint(1) DEFAULT NULL,
  `sun` tinyint(1) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deployment_control`
--

INSERT INTO `deployment_control` (`sno`, `for_page`, `class1`, `class2`, `class3`, `class4`, `class5`, `class6`, `class7`, `class8`, `class9`, `class10`, `class11`, `class12`, `gender`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`, `start`, `end`) VALUES
(1, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'm', 1, NULL, 1, NULL, 1, NULL, NULL, '2018-09-06', '2018-09-06'),
(2, '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'f', 1, 1, 1, 1, 1, 1, 1, '2018-09-06', '2018-09-06'),
(3, 'article', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f', NULL, 1, NULL, 1, NULL, 1, 1, '2018-09-26', '2018-09-23'),
(4, 'article', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f', NULL, 1, NULL, 1, NULL, 1, NULL, '2018-09-26', '2018-09-23'),
(5, 'article', 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, '', 1, 1, 1, NULL, NULL, NULL, NULL, '2018-09-18', '2018-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `sno` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `book_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vendor_id` varchar(20) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `duration` time NOT NULL,
  `ebook_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`sno`, `club_id`, `book_id`, `name`, `author`, `description`, `date_added`, `time_added`, `vendor_id`, `price`, `duration`, `ebook_file`) VALUES
(1, 'app', 'ebk_1', 'ebook create', 'ebook create', '<p>ebook create</p>\r\n', '2018-09-04 10:19:12', '2018-09-04 10:19:12', 'inst_2', 123, '01:00:00', 'sample.pdf'),
(2, 'app', 'ebk_2', 'A', 'a2', '<p>a</p>\r\n', '2018-09-04 12:08:44', '2018-09-04 12:08:44', 'inst_1', 123, '10:30:00', 'A_64.pdf'),
(3, 'app', 'ebk_3', 'testing', 'testing', '<p>testing</p>\r\n', '2018-09-04 13:00:04', '2018-09-04 13:00:04', NULL, 123, '01:00:00', 'testing_56.pdf'),
(4, 'app', 'ebk_4', 'demo ', 'demo ', '<h1>demo&nbsp;</h1>\r\n', '2018-09-05 11:56:38', '2018-09-05 11:56:38', NULL, 123, '01:00:00', 'demo _42.pdf'),
(5, 'app', 'ebk_5', 'demo 1', 'demo ', '<h1>demo&nbsp;</h1>\r\n', '2018-09-05 12:05:15', '2018-09-05 12:05:15', NULL, 123, '01:00:00', 'demo 1_29.pdf'),
(6, 'app', 'ebk_6', 'ebook title update', 'ebook author update', '<h1>ebook description update</h1>\r\n', '2018-09-05 12:12:09', '2018-09-05 12:12:09', 'inst_2', 1000, '02:45:00', 'ebook title update_3');

-- --------------------------------------------------------

--
-- Table structure for table `live_course`
--

CREATE TABLE `live_course` (
  `sno` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `description_line` text NOT NULL,
  `no_of_classes` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `class_applicable_for` text NOT NULL,
  `subscription_level` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `primary_image` varchar(100) NOT NULL,
  `secondary_image` varchar(100) NOT NULL,
  `course_icon` varchar(100) NOT NULL,
  `course_disp_fee` int(11) NOT NULL,
  `course_fee` int(11) NOT NULL,
  `time_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `learning` text NOT NULL,
  `prerequisites` text NOT NULL,
  `vendor_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_course`
--

INSERT INTO `live_course` (`sno`, `club_id`, `course_id`, `description_line`, `no_of_classes`, `price`, `class_applicable_for`, `subscription_level`, `description`, `primary_image`, `secondary_image`, `course_icon`, `course_disp_fee`, `course_fee`, `time_added`, `date_added`, `learning`, `prerequisites`, `vendor_id`) VALUES
(2, 'app', 'course_1', 'asd', 23, 2323, 'sdaa', '12', 'dfasd', '', '', '', 0, 0, '2018-08-31 10:50:00', '2018-08-31 10:50:00', '', '', 'inst_6'),
(3, 'app', 'asd', 'asdas', 23, 2323, 'sdaaas', '12', 'dfasd', '', '', '', 0, 0, '2018-08-31 10:50:00', '2018-08-31 10:50:00', '', '', 'inst_6'),
(4, 'app', 'asd', 'asd', 23, 2323, 'sdaa', '12', 'dfasd', '', '', '', 0, 0, '2018-08-31 10:50:00', '2018-08-31 10:50:00', '', '', 'inst_6'),
(5, 'app', 'course_5', 'course', 0, 123, '', '', '<p>course</p>\r\n', 'course_73.png', 'course_15.png', 'course_75.png', 0, 0, '2018-09-03 19:07:19', '2018-09-03 19:07:19', '<p>course</p>\r\n', '', 'inst_1'),
(6, 'app', 'course_6', 'demo', 0, 123, '', '', '<p>demo</p>\r\n', '113320am75.jpg', '113320am48.jpg', '113320am710.jpg', 0, 0, '2018-09-06 15:03:20', '2018-09-06 15:03:20', '<p>demo</p>\r\n', '', 'inst_1'),
(7, 'app', 'course_7', 'demoa', 0, 123, '', '', '<p>demo</p>\r\n', '113837am102.jpg', '113837am102.jpg', '113837am38.jpg', 0, 0, '2018-09-06 15:08:37', '2018-09-06 15:08:37', '<p>demo</p>\r\n', '', 'inst_1'),
(8, 'app', 'course_8', 'asas', 0, 123, '', '', '<p>asas</p>\r\n', '', '', '', 0, 0, '2018-09-06 15:10:13', '2018-09-06 15:10:13', '<p>asas</p>\r\n', '', 'inst_1'),
(9, 'app', 'course_9', 'asassd', 0, 123, '', '', '<p>asas</p>\r\n', '114030am38.jpg', '114030am02.jpg', '114030am63.jpg', 0, 0, '2018-09-06 15:10:30', '2018-09-06 15:10:30', '<p>asas</p>\r\n', '', 'inst_1'),
(10, 'app', 'course_10', 'asassdas', 0, 123, '', '', '<p>asas</p>\r\n', '114119am710.jpg', '114119am13.jpg', '114119am91.jpg', 0, 0, '2018-09-06 15:11:19', '2018-09-06 15:11:19', '<p>asas</p>\r\n', '', 'inst_1'),
(11, 'app', 'course_11', 'asassdasa', 0, 123, '', '', '<p>asas</p>\r\n', '', '114131am1010.jpg', '114131am57.jpg', 0, 0, '2018-09-06 15:11:31', '2018-09-06 15:11:31', '<p>asas</p>\r\n', '', 'inst_1');

-- --------------------------------------------------------

--
-- Table structure for table `online_test`
--

CREATE TABLE `online_test` (
  `sno` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `test_id` varchar(20) NOT NULL,
  `institute_id` varchar(20) NOT NULL,
  `test_type` varchar(20) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `test_creator` varchar(100) NOT NULL,
  `publish_state` tinyint(1) NOT NULL,
  `time_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `display_type` varchar(20) NOT NULL,
  `duration` time NOT NULL,
  `no_of_ques` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `feedback_ranges` text NOT NULL,
  `vendor_id` varchar(20) DEFAULT NULL,
  `test_data` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_test`
--

INSERT INTO `online_test` (`sno`, `club_id`, `test_id`, `institute_id`, `test_type`, `test_name`, `test_creator`, `publish_state`, `time_added`, `date_added`, `display_type`, `duration`, `no_of_ques`, `total_marks`, `feedback_ranges`, `vendor_id`, `test_data`, `price`) VALUES
(17, 'app', 'asd', 'asd', 'asd', 'asd', '', 0, '2018-08-30 17:04:12', '2018-08-30 17:04:12', '', '00:00:00', 0, 0, '', NULL, '', 0),
(18, 'web', 'test_18', '', '', 'App', 'app', 0, '2018-08-30 18:27:19', '2018-08-30 18:27:19', '', '12:12:12', 0, 0, '', NULL, '<p>app</p>\r\n', 10000),
(19, 'web', 'test_19', '', '', 'online test updated', 'online test updated', 0, '2018-09-03 12:47:23', '2018-09-03 12:47:23', '', '01:00:00', 0, 0, '', 'inst_1', '<p>online test updated</p>\r\n', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `sno` int(11) NOT NULL,
  `institute_id` varchar(20) NOT NULL,
  `institute_name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `promoters` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `batch_structure` varchar(120) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`sno`, `institute_id`, `institute_name`, `details`, `promoters`, `address`, `email_id`, `batch_structure`, `phone_no`, `username`, `password`, `code`, `status`) VALUES
(1, 'inst_1', 'Kiran', '123adasd', 'asd1asd', 'asasasdasd', 'nkirandroid@gmail.comdd', '', '123214', '', '123asd', '', ''),
(2, 'inst_2', 'Aditya Birla  111', '123as', 'asdas', 'asasas', 'nkirandroid@gmail.com', '', '123as', '', '123as', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `sno` int(11) NOT NULL,
  `vendor_id` varchar(20) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `vendor_icon` varchar(100) NOT NULL,
  `vendor_description` text NOT NULL,
  `formation_year` date NOT NULL,
  `permanent_address` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `vendor_added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`sno`, `vendor_id`, `vendor_name`, `vendor_icon`, `vendor_description`, `formation_year`, `permanent_address`, `country`, `vendor_added_date`) VALUES
(1, 'inst_1', 'Kiran Nambiar', 'Kiran Nambiar 1_1996-07-04_20.jpg', 'Web App Gameasdasd', '1996-07-04', 'Mumbai sadsa', 'in', '2018-08-20 12:06:00'),
(2, 'inst_2', 'B', 'Kiran Nambiar 1_1996-07-04_20.jpg', 'bbbbbb', '2018-08-01', 'B', 'in', '2018-08-20 12:09:42'),
(3, 'inst_3', 'C', 'C_2018-08-01_19.jpg', 'bbbbbb', '2018-08-01', 'B', 'in', '2018-08-20 13:05:53'),
(4, 'inst_4', 'Kiran Nambiar', 'Kiran Nambiar_1996-07-09_95.jpg', 'sfsdf', '1996-07-09', 'sdf', 'in', '2018-08-20 13:24:35'),
(5, 'inst_5', 'Kiran Nambiarasdasd', 'Kiran Nambiarasdasd_1996-07-09_17.jpg', 'sfsdfasdasd', '1996-07-09', 'sdfasda', 'in', '2018-08-20 13:24:43'),
(6, 'inst_6', 'Kiran Nambiar 1', 'Kiran Nambiar 1_2018-08-02_95.jpg', 'asd', '2018-08-02', 'asd', 'in', '2018-08-20 13:48:39'),
(7, 'inst_7', 'adasds', 'adasds_2018-08-09_21.jpg', 'asdad', '2018-08-09', 'asdad', 'in', '2018-08-22 12:45:03'),
(8, 'TEST 1', 'asd', 'asd', 'asd', '2018-08-15', 'asda', 'asd', '2018-08-22 16:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `sno` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `video_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description_line` text NOT NULL,
  `description_detail` text NOT NULL,
  `duration` time NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` int(11) NOT NULL,
  `learning` text NOT NULL,
  `vendor_id` varchar(20) NOT NULL,
  `video_file` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`sno`, `club_id`, `video_id`, `title`, `description_line`, `description_detail`, `duration`, `date_added`, `time_added`, `price`, `learning`, `vendor_id`, `video_file`) VALUES
(1, 'web', 'vid_1', 'ab', '<p>asd</p>\r\n', '', '01:00:00', '2018-08-27 13:05:09', '2018-08-27 13:05:09', 234, '<p>234</p>\r\n', 'inst_1', 'ab_69.mp4'),
(2, 'web', 'vid_2', 'abasd', '<p>asdasd</p>\r\n', '', '01:00:00', '2018-08-27 13:05:54', '2018-08-27 13:05:54', 234234, '<p>234asd</p>\r\n', 'inst_1', ''),
(3, 'web', 'vid_3', 'a', '<p>a</p>\r\n', '', '00:00:01', '2018-08-27 13:06:57', '2018-08-27 13:06:57', 2344, '<p>a</p>\r\n', 'inst_1', 'a_56.mp4'),
(4, 'app', 'vid_4', 'ad', '<p>a</p>\r\n', '', '01:00:00', '2018-08-30 18:31:12', '2018-08-30 18:31:12', 234, '<p>a</p>\r\n', 'inst_1', ''),
(5, 'app', 'vid_5', 'q', '<p>q</p>\r\n', '', '01:00:00', '2018-08-30 18:36:17', '2018-08-30 18:36:17', 123, '<p>q</p>\r\n', 'inst_1', ''),
(6, 'web', 'vid_6', 'sd', ' <p>sd</p>\r\n', '', '01:12:00', '2018-08-30 18:36:30', '2018-08-30 18:36:30', 1000, ' <p>sd</p>\r\n', 'inst_1', ''),
(7, 'web', 'vid_7', 'video title updated', '<p>video description updated</p>\r\n', '', '01:00:00', '2018-09-03 12:51:22', '2018-09-03 12:51:22', 1234, '<p>video updated</p>\r\n', 'inst_1', 'video title updated_'),
(8, 'web', 'vid_8', 'demo 1', '<p>demo 1</p>\r\n', '', '02:45:00', '2018-09-05 11:33:28', '2018-09-05 11:33:28', 100, '<p>demo 1</p>\r\n', 'inst_1', '122122pm19.mp4'),
(9, 'web', 'vid_9', 'demo 2', '<p>demo</p>\r\n', '', '01:00:00', '2018-09-05 11:34:02', '2018-09-05 11:34:02', 123, '<p>demo</p>\r\n', 'inst_2', 'demo 2_6.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `webinar`
--

CREATE TABLE `webinar` (
  `sno` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `webinar_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `speaker` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `duration` time NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` int(11) NOT NULL,
  `time_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vendor_id` varchar(20) DEFAULT NULL,
  `learning` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webinar`
--

INSERT INTO `webinar` (`sno`, `club_id`, `webinar_id`, `title`, `speaker`, `description`, `duration`, `date`, `time`, `price`, `time_added`, `date_added`, `vendor_id`, `learning`) VALUES
(1, 'app', 'web_1', 'App Developement', 'Kiran Nambiar', '<p>App development using no code block based platform.</p>\r\n', '05:13:00', '2018-08-11', '05:30:00', 100, '2018-08-25 12:44:59', '2018-08-25 12:44:59', 'inst_1', '<p><strong>No code block based platoform<br />\r\n<strong><strong>App developement<strong> </strong></strong></strong></strong></p>\r\n'),
(5, 'appdssssssssssssssss', 'web_5', 'Title 1', 'speaker 1', '<p>description 1</p>\r\n', '01:20:00', '2018-08-17', '12:29:00', 1232, '2018-08-25 14:03:30', '2018-08-25 14:03:30', 'inst_2', '<p>learning 1</p>\r\n'),
(6, 'web', 'web_6', 'aaa', 'aaa', '<p>aaa</p>\r\n', '01:00:00', '2018-08-21', '13:03:00', 123, '2018-08-30 18:44:03', '2018-08-30 18:44:03', 'inst_1', '<p>aaa</p>\r\n'),
(7, 'app', 'web_7', 'qqqq', 'qqqq', '<p>qqqq</p>\r\n', '01:30:00', '2018-08-23', '13:03:00', 123, '2018-08-30 18:44:49', '2018-08-30 18:44:49', 'inst_2', '<p>qqqq</p>\r\n'),
(8, 'app', 'web_8', 'asdasd', 'asd', '<p>asdasd</p>\r\n', '01:00:00', '2018-08-23', '02:03:00', 324234, '2018-08-31 16:16:02', '2018-08-31 16:16:02', 'inst_1', '<p>asdasd</p>\r\n'),
(9, 'app', 'web_9', 'asdasdasdasd', 'asd', '<p>asdasd</p>\r\n', '01:00:00', '2018-08-23', '02:03:00', 324234, '2018-08-31 16:16:22', '2018-08-31 16:16:22', 'inst_1', '<p>asdasd</p>\r\n'),
(10, 'app', 'web_10', 'asdasdasd', 'asd', '<p>asdasd</p>\r\n', '01:00:00', '0000-00-00', '02:34:00', 234, '2018-08-31 16:22:01', '2018-08-31 16:22:01', 'inst_1', '<p>asdasd</p>\r\n'),
(11, 'app', 'web_11', 'AAAAAAAAAAAAAAA', 'asd', '<p>AAAAAAAAA</p>\r\n', '01:00:00', '2018-08-03', '02:34:00', 4324, '2018-08-31 16:29:20', '2018-08-31 16:29:20', 'inst_1', '<p>AAAAAAAAAAAA</p>\r\n'),
(12, 'app', 'web_12', 'AAAAAAAAAAAAAAAsdf', 'asd', '<p>AAAAAAAAA</p>\r\n', '01:00:00', '2018-08-03', '02:34:00', 4324, '2018-08-31 17:06:21', '2018-08-31 17:06:21', 'inst_1', '<p>AAAAAAAAAAAA</p>\r\n'),
(13, 'app', 'web_13', 'BBBBBBBBBBB', 'BBBBBBB', '<p>BBBBBBBBBBB</p>\r\n', '01:00:00', '2018-08-01', '01:01:00', 123, '2018-08-31 17:59:49', '2018-08-31 17:59:49', 'inst_1', '<p>VBBBBBBBBBBB</p>\r\n'),
(14, 'app', 'web_14', 'webinar updated', 'webinar updated', '<p>webinar updated</p>\r\n', '01:00:00', '2018-09-03', '12:48:00', 1234, '2018-09-03 12:48:34', '2018-09-03 12:48:34', 'inst_1', '<p>webinar updated</p>\r\n'),
(15, 'asd', '', '', '', '', '00:00:00', '0000-00-00', '00:00:00', 0, '2018-09-03 14:20:09', '2018-09-03 14:20:09', NULL, ''),
(16, 'abc', '', '', '', '', '00:00:00', '0000-00-00', '00:00:00', 0, '2018-09-03 14:20:42', '2018-09-03 14:20:42', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `sno` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `workshop_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description_line` text NOT NULL,
  `no_of_classes` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `class_applicable_for` text NOT NULL,
  `subscription_level` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `primary_image` varchar(100) DEFAULT NULL,
  `secondary_image` varchar(100) DEFAULT NULL,
  `course_icon` varchar(100) DEFAULT NULL,
  `course_disp_fee` int(11) NOT NULL,
  `course_fee` int(11) NOT NULL,
  `time_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `learning` text NOT NULL,
  `prerequisites` text NOT NULL,
  `vendor_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`sno`, `club_id`, `workshop_id`, `title`, `description_line`, `no_of_classes`, `price`, `class_applicable_for`, `subscription_level`, `description`, `primary_image`, `secondary_image`, `course_icon`, `course_disp_fee`, `course_fee`, `time_added`, `date_added`, `learning`, `prerequisites`, `vendor_id`) VALUES
(1, 'app', 'work_0', 'asdasda', '<p>2342</p>\r\n', 234, 234, '6', '2', '', 'asdasda_29.png', 'asdasda_16.png', 'asdasda_87.png', 0, 0, '2018-08-25 17:13:45', '2018-08-25 17:13:45', '<p>234</p>\r\n', '<p>234</p>\r\n', 'inst_2'),
(2, 'web', 'work_2', 'CCCC', '<p>sdfsdf</p>\r\n', 345, 45345, '2', '2', '', 'CCCC_78.png', 'AAAAAAA_23.png', 'CCCC_33.png', 0, 0, '2018-08-25 17:14:45', '2018-08-25 17:14:45', '<p>ergtferg</p>\r\n', '<p>ergtferg</p>\r\n', 'inst_1'),
(3, 'app', 'work_3', 'sdfsdfasdasd', '<p>sdfsdf</p>\r\n', 345, 45345, '6', '1', '', 'sdfsdfasdasd_39.png', 'sdfsdfasdasd_81.png', 'sdfsdfasdasd_72.png', 0, 0, '2018-08-25 17:14:52', '2018-08-25 17:14:52', '<p>3453tf</p>\r\n', '<p>ergtferg</p>\r\n', 'inst_1'),
(4, 'app', 'work_4', 'BBBBBB', '<p>asdasdasd</p>\r\n', 45, 345, '6', '1', '', 'BBBBBB_33.png', 'BBBBBB_58.png', 'BBBBBB_35.png', 0, 0, '2018-08-25 18:22:20', '2018-08-25 18:22:20', '<p>sfdsfe</p>\r\n', '<p>wsfwf</p>\r\n', 'inst_1'),
(5, 'app', 'work_5', 'sdfss', '<p>sdfsdf</p>\r\n', 34, 43, '6', '1', '', 'sdfss_45.jpg', 'sdfss_11.jpg', 'sdfss_34.jpg', 0, 0, '2018-08-25 18:32:14', '2018-08-25 18:32:14', '<p>345345</p>\r\n', '<p>345345</p>\r\n', 'inst_1'),
(6, 'web', 'work_6', 'asdasd', '<p>asdasd</p>\r\n', 234, 234, '5', '1', '', 'asdasd_99.png', 'asdasd_28.png', 'asdasd_24.png', 0, 0, '2018-08-27 10:34:45', '2018-08-27 10:34:45', '<p>fdsf</p>\r\n', '<p>345345</p>\r\n', 'inst_1'),
(8, 'web', 'work_8', 'KIRAN', '<p>asdasd</p>\r\n', 234, 234, '5', '1', '', 'KIRAN_7.png', NULL, 'KIRAN_25.png', 0, 0, '2018-08-27 11:08:33', '2018-08-27 11:08:33', '<p>fdsf</p>\r\n', '<p>345345</p>\r\n', 'inst_1'),
(9, 'app', 'work_9', 'AAAAAAAAAA', 'asdas', 23, 123, '1', '2', '', NULL, NULL, NULL, 0, 0, '2018-08-31 17:04:50', '2018-08-31 17:04:50', ' asdasd', ' asdasd', 'inst_1'),
(10, 'app', 'work_10', 'AAAAAAAAAAj', 'asdas', 23, 123, '1', '2', '', 'AAAAAAAAAAj_44.png', 'AAAAAAAAAAj_24.png', 'AAAAAAAAAAj_10.png', 0, 0, '2018-08-31 17:05:39', '2018-08-31 17:05:39', ' asdasd', ' asdasd', 'inst_1'),
(11, 'web', 'work_11', 'asdadasd', '<p>asdadasd</p>\r\n', 234, 234, '5', '2', '', 'asdadasd_75.png', 'asdadasd_39.png', 'asdadasd_36.png', 0, 0, '2018-08-31 17:19:50', '2018-08-31 17:19:50', '<p>234dwfsdf</p>\r\n', '<p>sdfsdf</p>\r\n', 'inst_1'),
(12, 'web', 'work_12', 'workshop updated', '<p>workshop updated</p>\r\n', 12, 123, '7', '3', '', 'workshop updated_1.png', 'workshop updated_61.png', 'workshop updated_19.png', 0, 0, '2018-09-03 12:53:03', '2018-09-03 12:53:03', '<p>workshop updated</p>\r\n', '<p>workshop updated</p>\r\n', 'inst_2'),
(13, 'web', 'work_13', 'testing workshop', '<p>testing workshop</p>\r\n', 12, 123, '2', '2', '', NULL, NULL, NULL, 0, 0, '2018-09-03 14:47:56', '2018-09-03 14:47:56', '<p>testing workshop</p>\r\n', '<p>testing workshop</p>\r\n', 'inst_1'),
(19, 'web', 'work_19', 'test', '<p>test</p>\r\n', 10, 10, '1', '1', '', '121350pm50.png', '121350pm40.png', '121350pm37.png', 0, 0, '2018-09-03 17:26:44', '2018-09-03 17:26:44', '<p>testas</p>\r\n', '<p>testas</p>\r\n', 'inst_2'),
(20, 'web', 'work_20', 'tetet', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', NULL, NULL, NULL, 0, 0, '2018-09-05 13:42:14', '2018-09-05 13:42:14', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(21, 'web', 'work_21', 'tetetawd', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', '2018-09-05 10:15:16am.png', '2018-09-05 10:15:16am.png', '2018-09-05 10:15:16am.png', 0, 0, '2018-09-05 13:45:16', '2018-09-05 13:45:16', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(22, 'web', 'work_22', 'tetetawdas', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', '2018-09-0510:20:05am.png', '2018-09-0510:20:05am.png', '2018-09-0510:20:05am.png', 0, 0, '2018-09-05 13:50:05', '2018-09-05 13:50:05', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(23, 'web', 'work_23', 'tetetawdasasd', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', '2018-09-05.png', '2018-09-05.png', '2018-09-05.png', 0, 0, '2018-09-05 13:50:39', '2018-09-05 13:50:39', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(24, 'web', 'work_24', '123', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', '2018-09-05.png', '2018-09-05.png', '2018-09-05.png', 0, 0, '2018-09-05 13:52:03', '2018-09-05 13:52:03', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(25, 'web', 'work_25', 'asddd', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', '20180905102344am.png', '20180905102344am.png', '20180905102344am.png', 0, 0, '2018-09-05 13:53:44', '2018-09-05 13:53:44', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(26, 'web', 'work_26', 'asdasd2323', '<p>etetet</p>\r\n', 23, 123, '2', '1', '', '103155am22.png', '103155am75.png', '103155am29.png', 0, 0, '2018-09-05 13:55:16', '2018-09-05 13:55:16', '<p>asfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `club_category`
--
ALTER TABLE `club_category`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `content_manager`
--
ALTER TABLE `content_manager`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `content_manager_id` (`content_manager_id`);

--
-- Indexes for table `deployment_control`
--
ALTER TABLE `deployment_control`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `live_course`
--
ALTER TABLE `live_course`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `online_test`
--
ALTER TABLE `online_test`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`sno`,`vendor_id`),
  ADD UNIQUE KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `webinar`
--
ALTER TABLE `webinar`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_category`
--
ALTER TABLE `club_category`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content_manager`
--
ALTER TABLE `content_manager`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deployment_control`
--
ALTER TABLE `deployment_control`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ebook`
--
ALTER TABLE `ebook`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `live_course`
--
ALTER TABLE `live_course`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `online_test`
--
ALTER TABLE `online_test`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `webinar`
--
ALTER TABLE `webinar`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `ebook`
--
ALTER TABLE `ebook`
  ADD CONSTRAINT `ebook_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `live_course`
--
ALTER TABLE `live_course`
  ADD CONSTRAINT `live_course_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `online_test`
--
ALTER TABLE `online_test`
  ADD CONSTRAINT `online_test_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `webinar`
--
ALTER TABLE `webinar`
  ADD CONSTRAINT `webinar_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
