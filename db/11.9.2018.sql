-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 03:02 PM
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
  `price` int(11) NOT NULL,
  `class_applicable_for` text NOT NULL,
  `subscription_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`sno`, `club_id`, `article_id`, `name`, `author`, `description`, `date_posted`, `publish_state`, `date_added`, `time_added`, `vendor_id`, `duration`, `article_file`, `price`, `class_applicable_for`, `subscription_level`) VALUES
(1, 'club_app', 'art_1', 'article updated', 'article updated', '<p>article updated</p>\r\n', '0000-00-00', 0, '2018-09-03 12:50:13', '2018-09-03 12:50:13', 'inst_1', '01:30:00', 'a.pdf', 1234, '', ''),
(2, 'club_web', 'art_2', 'test', 'test', '<p>test</p>\r\n', '0000-00-00', 0, '2018-09-11 15:20:32', '2018-09-11 15:20:32', 'inst_1', '01:00:00', '115032am00.pdf', 123, '6,8,10,12', 'silver'),
(4, 'club_web', 'art_4', 'sub', 'sub', '<p>sub</p>\r\n', '0000-00-00', 0, '2018-09-11 15:40:56', '2018-09-11 15:40:56', 'inst_1', '01:00:00', '015751pm12.pdf', 123, '6,7,8,9,10,11,12', 'silver');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `sno` int(11) NOT NULL,
  `club_id` varchar(20) NOT NULL,
  `club_name` varchar(100) NOT NULL,
  `club_description` text NOT NULL,
  `club_category_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`sno`, `club_id`, `club_name`, `club_description`, `club_category_id`) VALUES
(1, 'club_app', 'App Developement', 'App developement club', 'club_tech'),
(3, 'club_web', 'Web Developement', 'Web developement club', 'club_tech'),
(4, 'club_design', 'Design Club', 'UI UX Design', 'club_tech'),
(5, 'club_maths', 'Math Club', 'Maths club', 'club_academics'),
(6, 'club_science', 'Science Club', 'Science club', 'club_academics');

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
(1, 'club_tech', 'technology', 'Technology related clubs', '2018-08-22 12:00:27'),
(2, 'club_academics', 'Academics', 'Academic related clubs', '2018-08-23 00:00:00');

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
  `page_id` varchar(20) NOT NULL,
  `class_applicable_for` text,
  `gender` char(1) NOT NULL,
  `days` text,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `institute_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deployment_control`
--

INSERT INTO `deployment_control` (`sno`, `for_page`, `page_id`, `class_applicable_for`, `gender`, `days`, `start`, `end`, `institute_id`) VALUES
(1, '', '', '1', 'm', '1', '2018-09-06', '2018-09-06', 'inst_1'),
(2, '', '', '1', 'f', '1', '2018-09-06', '2018-09-06', 'inst_1'),
(3, 'article', '', '1', 'f', NULL, '2018-09-26', '2018-09-23', 'inst_1'),
(4, 'article', '', '1', 'f', NULL, '2018-09-26', '2018-09-23', 'inst_2'),
(5, 'article', '', '1', '', '1', '2018-09-18', '2018-09-24', 'inst_2'),
(6, 'article', '', '1', 'm', '1', '2018-09-10', '2018-09-10', 'inst_2'),
(7, 'article', '', '1', 'f', '1', '2018-09-10', '2018-09-10', 'inst_2');

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
  `ebook_file` varchar(50) NOT NULL,
  `subscription_level` varchar(20) NOT NULL,
  `class_applicable_for` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`sno`, `club_id`, `book_id`, `name`, `author`, `description`, `date_added`, `time_added`, `vendor_id`, `price`, `duration`, `ebook_file`, `subscription_level`, `class_applicable_for`) VALUES
(1, 'club_app', 'ebk_1', 'ebook create', 'ebook create', '<p>ebook create</p>\r\n', '2018-09-04 10:19:12', '2018-09-04 10:19:12', 'inst_2', 123, '01:00:00', 'sample.pdf', '', ''),
(2, 'club_web', 'ebk_2', 'A', 'a2', '<p>a</p>\r\n', '2018-09-04 12:08:44', '2018-09-04 12:08:44', 'inst_1', 123, '10:30:00', 'A_64.pdf', 'silver', '6,7'),
(3, 'club_app', 'ebk_3', 'testing', 'testing', '<p>testing</p>\r\n', '2018-09-04 13:00:04', '2018-09-04 13:00:04', NULL, 123, '01:00:00', 'testing_56.pdf', '', ''),
(4, 'club_web', 'ebk_4', 'demo ', 'demo ', '<h1>demo&nbsp;</h1>\r\n', '2018-09-05 11:56:38', '2018-09-05 11:56:38', NULL, 123, '01:00:00', 'demo _42.pdf', '', ''),
(5, 'club_web', 'ebk_5', 'demo 1', 'demo ', '<h1>demo&nbsp;</h1>\r\n', '2018-09-05 12:05:15', '2018-09-05 12:05:15', NULL, 123, '01:00:00', 'demo 1_29.pdf', '', ''),
(6, 'club_web', 'ebk_6', 'ebook title update', 'ebook author update', '<h1>ebook description update</h1>\r\n', '2018-09-05 12:12:09', '2018-09-05 12:12:09', 'inst_2', 1000, '02:45:00', 'ebook title update_3', '', ''),
(7, 'club_web', 'ebk_7', 'demoebook', 'demoebook', '<p>demoebook</p>\r\n', '2018-09-11 17:42:38', '2018-09-11 17:42:38', 'inst_2', 123, '01:00:00', '021238pm01.pdf', 'platinum', '6,8,10,12');

-- --------------------------------------------------------

--
-- Table structure for table `gen_course`
--

CREATE TABLE `gen_course` (
  `sno` int(11) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gen_course`
--

INSERT INTO `gen_course` (`sno`, `course_id`, `course_name`, `course_code`) VALUES
(1, 'technology', 'technology', 'technology'),
(2, 'creativity', 'creativity', 'creativity');

-- --------------------------------------------------------

--
-- Table structure for table `gen_course_class`
--

CREATE TABLE `gen_course_class` (
  `sno` int(11) NOT NULL,
  `class_id` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_details` text NOT NULL,
  `institute_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gen_course_class`
--

INSERT INTO `gen_course_class` (`sno`, `class_id`, `course_id`, `class_name`, `class_details`, `institute_id`) VALUES
(2, 'class_2', 'creativity', 'creativity', 'lalala', 'inst_1'),
(30, 'class_webdesign', 'technology', 'webdesign 3', 'web design and developement ', 'inst_1'),
(31, 'class_app dev', 'technology', 'app dev 3', 'app dev class\r\n', 'inst_1');

-- --------------------------------------------------------

--
-- Table structure for table `gen_section`
--

CREATE TABLE `gen_section` (
  `sno` int(11) NOT NULL,
  `section_id` varchar(20) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `section_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gen_subject`
--

CREATE TABLE `gen_subject` (
  `sno` int(11) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `class_id` varchar(20) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gen_subject`
--

INSERT INTO `gen_subject` (`sno`, `subject_id`, `class_id`, `subject_name`) VALUES
(1, 'app_ui', 'class_app dev', 'App UIs'),
(2, 'app_code', 'class_app dev', 'App Programming'),
(4, 'web_ui', 'class_webdesign', 'Web Uis');

-- --------------------------------------------------------

--
-- Table structure for table `gen_subtopic`
--

CREATE TABLE `gen_subtopic` (
  `sno` int(11) NOT NULL,
  `subtopic_id` varchar(20) NOT NULL,
  `topic_id` varchar(20) NOT NULL,
  `subtopic_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gen_topic`
--

CREATE TABLE `gen_topic` (
  `sno` int(11) NOT NULL,
  `topic_id` varchar(20) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `topic_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inst_course_assign`
--

CREATE TABLE `inst_course_assign` (
  `sno` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `institute_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inst_course_assign`
--

INSERT INTO `inst_course_assign` (`sno`, `course_name`, `course_code`, `institute_id`) VALUES
(1, 'technology', 'technology', 'inst_1'),
(2, 'creativity', 'creativity', 'inst_1');

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
  `vendor_id` varchar(20) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_course`
--

INSERT INTO `live_course` (`sno`, `club_id`, `course_id`, `description_line`, `no_of_classes`, `price`, `class_applicable_for`, `subscription_level`, `description`, `primary_image`, `secondary_image`, `course_icon`, `course_disp_fee`, `course_fee`, `time_added`, `date_added`, `learning`, `prerequisites`, `vendor_id`, `duration`) VALUES
(2, 'club_web', 'course_1', 'asd', 23, 2323, 'sdaa', '12', 'dfasd', '', '', '', 0, 0, '2018-08-31 10:50:00', '2018-08-31 10:50:00', '', '', 'inst_6', 0),
(3, 'club_web', 'asd', 'asdas', 23, 2323, 'sdaaas', '12', 'dfasd', '', '', '', 0, 0, '2018-08-31 10:50:00', '2018-08-31 10:50:00', '', '', 'inst_6', 0),
(4, 'club_web', 'asd', 'asd', 23, 2323, 'sdaa', '12', 'dfasd', '', '', '', 0, 0, '2018-08-31 10:50:00', '2018-08-31 10:50:00', '', '', 'inst_6', 0),
(5, 'club_web', 'course_5', 'course', 0, 123, '6,7,8,9,10,11,12', 'platinum', '<p>course</p>\r\n', 'a.png', 'b.png', 'c.png', 0, 0, '2018-09-03 19:07:19', '2018-09-03 19:07:19', '<p>course</p>\r\n', '', 'inst_1', 2),
(6, 'club_app', 'course_6', 'demo', 0, 123, '', '', '<p>demo</p>\r\n', '113320am75.jpg', '113320am48.jpg', '113320am710.jpg', 0, 0, '2018-09-06 15:03:20', '2018-09-06 15:03:20', '<p>demo</p>\r\n', '', 'inst_1', 0),
(7, 'club_app', 'course_7', 'demoa', 0, 123, '', '', '<p>demo</p>\r\n', '113837am102.jpg', '113837am102.jpg', '113837am38.jpg', 0, 0, '2018-09-06 15:08:37', '2018-09-06 15:08:37', '<p>demo</p>\r\n', '', 'inst_1', 0),
(8, 'club_app', 'course_8', 'asas', 0, 123, '', '', '<p>asas</p>\r\n', '', '', '', 0, 0, '2018-09-06 15:10:13', '2018-09-06 15:10:13', '<p>asas</p>\r\n', '', 'inst_1', 0),
(9, 'club_app', 'course_9', 'asassd', 0, 123, '', '', '<p>asas</p>\r\n', '114030am38.jpg', '114030am02.jpg', '114030am63.jpg', 0, 0, '2018-09-06 15:10:30', '2018-09-06 15:10:30', '<p>asas</p>\r\n', '', 'inst_1', 0),
(10, 'club_app', 'course_10', 'asassdas', 0, 123, '', '', '<p>asas</p>\r\n', '114119am710.jpg', '114119am13.jpg', '114119am91.jpg', 0, 0, '2018-09-06 15:11:19', '2018-09-06 15:11:19', '<p>asas</p>\r\n', '', 'inst_1', 0),
(11, 'club_app', 'course_11', 'asassdasa', 0, 123, '', '', '<p>asas</p>\r\n', '', '114131am1010.jpg', '114131am57.jpg', 0, 0, '2018-09-06 15:11:31', '2018-09-06 15:11:31', '<p>asas</p>\r\n', '', 'inst_1', 0);

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
  `price` int(11) NOT NULL,
  `class_applicable_for` text NOT NULL,
  `subscription_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_test`
--

INSERT INTO `online_test` (`sno`, `club_id`, `test_id`, `institute_id`, `test_type`, `test_name`, `test_creator`, `publish_state`, `time_added`, `date_added`, `display_type`, `duration`, `no_of_ques`, `total_marks`, `feedback_ranges`, `vendor_id`, `test_data`, `price`, `class_applicable_for`, `subscription_level`) VALUES
(17, 'club_app', 'asd', 'asd', 'asd', 'asd', '', 0, '2018-08-30 17:04:12', '2018-08-30 17:04:12', '', '00:00:00', 0, 0, '', NULL, '', 0, '', ''),
(18, 'club_app', 'test_3', '', '', 'test title update 1', 'test creator update 1', 0, '2018-08-30 18:27:19', '2018-08-30 18:27:19', '', '02:45:00', 0, 0, '', 'inst_1', 'test description update 1', 1500, '', ''),
(19, 'club_web', 'test_19', '', '', 'online test updated', 'online test updated', 0, '2018-09-03 12:47:23', '2018-09-03 12:47:23', '', '01:00:00', 0, 0, '', 'inst_1', '<p>online test updated</p>\r\n', 1234, '', ''),
(20, 'club_app', 'test_20', '', '', 'testtest', 'testtest', 0, '2018-09-11 17:49:29', '2018-09-11 17:49:29', '', '22:22:00', 0, 0, '', 'inst_2', '<p>testtest</p>\r\n', 123, '6,7,8,9,10,11', 'platinum');

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
(2, 'inst_1', 'Institute 1', 'Very nice institute', 'wingxp', 'andheri', 'wingxp@wingxp.com', '', '', 'wingxp', '', '', ''),
(4, 'inst_2', 'Institute 2', 'Very very nice institute', 'wingxp 2', 'andheri 2', 'wingxp@wingxp.com', '', '', 'wingxp', '', '', '');

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
  `video_file` varchar(20) NOT NULL,
  `class_applicable_for` text NOT NULL,
  `subscription_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`sno`, `club_id`, `video_id`, `title`, `description_line`, `description_detail`, `duration`, `date_added`, `time_added`, `price`, `learning`, `vendor_id`, `video_file`, `class_applicable_for`, `subscription_level`) VALUES
(1, 'club_maths', 'vid_1', 'ab', '<p>asd</p>\r\n', '', '01:00:00', '2018-08-27 13:05:09', '2018-08-27 13:05:09', 234, '<p>234</p>\r\n', 'inst_1', 'ab_69.mp4', '', ''),
(2, 'club_app', 'vid_2', 'abasd', '<p>asdasd</p>\r\n', '', '01:00:00', '2018-08-27 13:05:54', '2018-08-27 13:05:54', 234234, '<p>234asd</p>\r\n', 'inst_1', '', '', ''),
(3, 'club_maths', 'vid_3', 'a', '<p>a</p>\r\n', '', '00:00:01', '2018-08-27 13:06:57', '2018-08-27 13:06:57', 2344, '<p>a</p>\r\n', 'inst_1', 'a_56.mp4', '', ''),
(4, 'club_science', 'vid_4', 'ad', '<p>a</p>\r\n', '', '01:00:00', '2018-08-30 18:31:12', '2018-08-30 18:31:12', 234, '<p>a</p>\r\n', 'inst_1', '', '', ''),
(5, 'club_app', 'vid_5', 'q', '<p>q</p>\r\n', '', '01:00:00', '2018-08-30 18:36:17', '2018-08-30 18:36:17', 123, '<p>q</p>\r\n', 'inst_1', '', '', ''),
(6, 'club_design', 'vid_6', 'sd', ' <p>sd</p>\r\n', '', '01:12:00', '2018-08-30 18:36:30', '2018-08-30 18:36:30', 1000, ' <p>sd</p>\r\n', 'inst_1', '', '', ''),
(7, 'club_app', 'vid_7', 'video title updated', '<p>video description updated</p>\r\n', '', '01:00:00', '2018-09-03 12:51:22', '2018-09-03 12:51:22', 1234, '<p>video updated</p>\r\n', 'inst_1', 'video title updated_', '', ''),
(8, 'club_app', 'vid_8', 'demo 1', '<p>demo 1</p>\r\n', '', '02:45:00', '2018-09-05 11:33:28', '2018-09-05 11:33:28', 100, '<p>demo 1</p>\r\n', 'inst_1', '122122pm19.mp4', '', ''),
(9, 'club_app', 'vid_9', 'demo 2', '<p>demo</p>\r\n', '', '01:00:00', '2018-09-05 11:34:02', '2018-09-05 11:34:02', 123, '<p>demo</p>\r\n', 'inst_2', 'demo 2_6.mp4', '', ''),
(10, 'club_web', 'vid_10', 'testvideo', '<p>testvideo</p>\r\n', '', '01:00:00', '2018-09-11 17:58:09', '2018-09-11 17:58:09', 123, '<p>testvideo</p>\r\n', 'inst_3', '', '6,7,8,9,10,11,12', 'platinum');

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
  `learning` text NOT NULL,
  `class_applicable_for` text NOT NULL,
  `subscription_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webinar`
--

INSERT INTO `webinar` (`sno`, `club_id`, `webinar_id`, `title`, `speaker`, `description`, `duration`, `date`, `time`, `price`, `time_added`, `date_added`, `vendor_id`, `learning`, `class_applicable_for`, `subscription_level`) VALUES
(1, 'club_app', 'web_1', 'App Developement', 'Kiran Nambiar', '<p>App development using no code block based platform.</p>\r\n', '05:13:00', '2018-08-11', '05:30:00', 100, '2018-08-25 12:44:59', '2018-08-25 12:44:59', 'inst_1', '<p><strong>No code block based platoform<br />\r\n<strong><strong>App developement<strong> </strong></strong></strong></strong></p>\r\n', '', ''),
(5, 'club_app', 'web_5', 'Title 1', 'speaker 1', '<p>description 1</p>\r\n', '01:20:00', '2018-08-17', '12:29:00', 1232, '2018-08-25 14:03:30', '2018-08-25 14:03:30', 'inst_2', '<p>learning 1</p>\r\n', '', ''),
(6, 'club_app', 'web_6', 'aaa', 'aaa', '<p>aaa</p>\r\n', '01:00:00', '2018-08-21', '13:03:00', 123, '2018-08-30 18:44:03', '2018-08-30 18:44:03', 'inst_1', '<p>aaa</p>\r\n', '', ''),
(7, 'club_app', 'web_7', 'qqqq', 'qqqq', '<p>qqqq</p>\r\n', '01:30:00', '2018-08-23', '13:03:00', 123, '2018-08-30 18:44:49', '2018-08-30 18:44:49', 'inst_1', '<p>qqqq</p>\r\n', '', ''),
(8, 'club_app', 'web_8', 'asdasd', 'asd', '<p>asdasd</p>\r\n', '01:00:00', '2018-08-23', '02:03:00', 324234, '2018-08-31 16:16:02', '2018-08-31 16:16:02', 'inst_1', '<p>asdasd</p>\r\n', '', ''),
(9, 'club_app', 'web_9', 'asdasdasdasd', 'asd', '<p>asdasd</p>\r\n', '01:00:00', '2018-08-23', '02:03:00', 324234, '2018-08-31 16:16:22', '2018-08-31 16:16:22', 'inst_1', '<p>asdasd</p>\r\n', '', ''),
(10, 'club_app', 'web_10', 'asdasdasd', 'asd', '<p>asdasd</p>\r\n', '01:00:00', '0000-00-00', '02:34:00', 234, '2018-08-31 16:22:01', '2018-08-31 16:22:01', 'inst_1', '<p>asdasd</p>\r\n', '', ''),
(11, 'club_app', 'web_11', 'AAAAAAAAAAAAAAA', 'asd', '<p>AAAAAAAAA</p>\r\n', '01:00:00', '2018-08-03', '02:34:00', 4324, '2018-08-31 16:29:20', '2018-08-31 16:29:20', 'inst_1', '<p>AAAAAAAAAAAA</p>\r\n', '', ''),
(12, 'club_web', 'web_12', 'AAAAAAAAAAAAAAAsdf', 'asd', '<p>AAAAAAAAA</p>\r\n', '01:00:00', '2018-08-03', '02:34:00', 4324, '2018-08-31 17:06:21', '2018-08-31 17:06:21', 'inst_1', '<p>AAAAAAAAAAAA</p>\r\n', '', ''),
(13, 'club_web', 'web_13', 'BBBBBBBBBBB', 'BBBBBBB', '<p>BBBBBBBBBBB</p>\r\n', '01:00:00', '2018-08-01', '01:01:00', 123, '2018-08-31 17:59:49', '2018-08-31 17:59:49', 'inst_1', '<p>VBBBBBBBBBBB</p>\r\n', '', ''),
(14, 'club_web', 'web_14', 'webinar updated', 'webinar updated', '<p>webinar updated</p>\r\n', '01:00:00', '2018-09-03', '12:48:00', 1234, '2018-09-03 12:48:34', '2018-09-03 12:48:34', 'inst_1', '<p>webinar updated</p>\r\n', '', ''),
(15, 'club_web', '', '', '', '', '00:00:00', '0000-00-00', '00:00:00', 0, '2018-09-03 14:20:09', '2018-09-03 14:20:09', NULL, '', '', ''),
(16, 'club_web', '', '', '', '', '00:00:00', '0000-00-00', '00:00:00', 0, '2018-09-03 14:20:42', '2018-09-03 14:20:42', NULL, '', '', ''),
(17, 'club_app', 'web_17', 'testwebinar', 'testwebinar', '<p>testwebinar</p>\r\n', '01:00:00', '2018-09-11', '00:12:00', 123, '2018-09-11 18:04:36', '2018-09-11 18:04:36', 'inst_1', '<p>testwebinar</p>\r\n', '6,7,8,9,10,11,12', 'platinum');

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
(1, 'club_web', 'work_0', 'asdasda', '<p>2342</p>\r\n', 234, 234, '6', '2', '', 'asdasda_29.png', 'asdasda_16.png', 'asdasda_87.png', 0, 0, '2018-08-25 17:13:45', '2018-08-25 17:13:45', '<p>234</p>\r\n', '<p>234</p>\r\n', 'inst_2'),
(2, 'club_web', 'work_2', 'CCCC', '<p>sdfsdf</p>\r\n', 345, 45345, '2', '2', '', 'CCCC_78.png', 'AAAAAAA_23.png', 'CCCC_33.png', 0, 0, '2018-08-25 17:14:45', '2018-08-25 17:14:45', '<p>ergtferg</p>\r\n', '<p>ergtferg</p>\r\n', 'inst_1'),
(3, 'club_web', 'work_3', 'sdfsdfasdasd', '<p>sdfsdf</p>\r\n', 345, 45345, '6', '1', '', 'sdfsdfasdasd_39.png', 'sdfsdfasdasd_81.png', 'sdfsdfasdasd_72.png', 0, 0, '2018-08-25 17:14:52', '2018-08-25 17:14:52', '<p>3453tf</p>\r\n', '<p>ergtferg</p>\r\n', 'inst_1'),
(4, 'club_web', 'work_4', 'BBBBBB', '<p>asdasdasd</p>\r\n', 45, 345, '6', '1', '', 'BBBBBB_33.png', 'BBBBBB_58.png', 'BBBBBB_35.png', 0, 0, '2018-08-25 18:22:20', '2018-08-25 18:22:20', '<p>sfdsfe</p>\r\n', '<p>wsfwf</p>\r\n', 'inst_1'),
(5, 'club_web', 'work_5', 'sdfss', '<p>sdfsdf</p>\r\n', 34, 43, '6', '1', '', 'sdfss_45.jpg', 'sdfss_11.jpg', 'sdfss_34.jpg', 0, 0, '2018-08-25 18:32:14', '2018-08-25 18:32:14', '<p>345345</p>\r\n', '<p>345345</p>\r\n', 'inst_1'),
(6, 'club_web', 'work_6', 'asdasd', '<p>asdasd</p>\r\n', 234, 234, '5', '1', '', 'asdasd_99.png', 'asdasd_28.png', 'asdasd_24.png', 0, 0, '2018-08-27 10:34:45', '2018-08-27 10:34:45', '<p>fdsf</p>\r\n', '<p>345345</p>\r\n', 'inst_1'),
(8, 'club_web', 'work_8', 'KIRAN', '<p>asdasd</p>\r\n', 234, 234, '5', '1', '', 'KIRAN_7.png', NULL, 'KIRAN_25.png', 0, 0, '2018-08-27 11:08:33', '2018-08-27 11:08:33', '<p>fdsf</p>\r\n', '<p>345345</p>\r\n', 'inst_1'),
(9, 'club_web', 'work_9', 'AAAAAAAAAA', 'asdas', 23, 123, '1', '2', '', NULL, NULL, NULL, 0, 0, '2018-08-31 17:04:50', '2018-08-31 17:04:50', ' asdasd', ' asdasd', 'inst_1'),
(10, 'club_web', 'work_10', 'AAAAAAAAAAj', 'asdas', 23, 123, '1', '2', '', 'AAAAAAAAAAj_44.png', 'AAAAAAAAAAj_24.png', 'AAAAAAAAAAj_10.png', 0, 0, '2018-08-31 17:05:39', '2018-08-31 17:05:39', ' asdasd', ' asdasd', 'inst_1'),
(11, 'club_web', 'work_11', 'asdadasd', '<p>asdadasd</p>\r\n', 234, 234, '5', '2', '', 'asdadasd_75.png', 'asdadasd_39.png', 'asdadasd_36.png', 0, 0, '2018-08-31 17:19:50', '2018-08-31 17:19:50', '<p>234dwfsdf</p>\r\n', '<p>sdfsdf</p>\r\n', 'inst_1'),
(12, 'club_web', 'work_12', 'workshop updated', '<p>workshop updated</p>\r\n', 12, 123, '7', '3', '', 'workshop updated_1.png', 'workshop updated_61.png', 'workshop updated_19.png', 0, 0, '2018-09-03 12:53:03', '2018-09-03 12:53:03', '<p>workshop updated</p>\r\n', '<p>workshop updated</p>\r\n', 'inst_2'),
(13, 'club_app', 'work_13', 'testing workshop', '<p>testing workshop</p>\r\n', 12, 123, '2', '2', '', NULL, NULL, NULL, 0, 0, '2018-09-03 14:47:56', '2018-09-03 14:47:56', '<p>testing workshop</p>\r\n', '<p>testing workshop</p>\r\n', 'inst_1'),
(19, 'club_app', 'work_19', 'test', '<p>test</p>\r\n', 10, 10, '1', '1', '', '121350pm50.png', '121350pm40.png', '121350pm37.png', 0, 0, '2018-09-03 17:26:44', '2018-09-03 17:26:44', '<p>testas</p>\r\n', '<p>testas</p>\r\n', 'inst_2'),
(20, 'club_app', 'work_20', 'tetet', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', NULL, NULL, NULL, 0, 0, '2018-09-05 13:42:14', '2018-09-05 13:42:14', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(21, 'club_app', 'work_21', 'tetetawd', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', '2018-09-05 10:15:16am.png', '2018-09-05 10:15:16am.png', '2018-09-05 10:15:16am.png', 0, 0, '2018-09-05 13:45:16', '2018-09-05 13:45:16', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(22, 'club_app', 'work_22', 'tetetawdas', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', '2018-09-0510:20:05am.png', '2018-09-0510:20:05am.png', '2018-09-0510:20:05am.png', 0, 0, '2018-09-05 13:50:05', '2018-09-05 13:50:05', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(23, 'club_design', 'work_23', 'tetetawdasasd', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', '2018-09-05.png', '2018-09-05.png', '2018-09-05.png', 0, 0, '2018-09-05 13:50:39', '2018-09-05 13:50:39', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(24, 'club_maths', 'work_24', '123', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', '2018-09-05.png', '2018-09-05.png', '2018-09-05.png', 0, 0, '2018-09-05 13:52:03', '2018-09-05 13:52:03', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(25, 'club_science', 'work_25', 'asddd', '<p>etetet</p>\r\n', 23, 123, '1', '3', '', '20180905102344am.png', '20180905102344am.png', '20180905102344am.png', 0, 0, '2018-09-05 13:53:44', '2018-09-05 13:53:44', '<p>sfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(26, 'club_science', 'work_26', 'asdasd2323', '<p>etetet</p>\r\n', 23, 123, '2', '1', '', '103155am22.png', '103155am75.png', '103155am29.png', 0, 0, '2018-09-05 13:55:16', '2018-09-05 13:55:16', '<p>asfasf</p>\r\n', '<p>asfasf</p>\r\n', 'inst_1'),
(27, 'club_web', 'work_27', 'testworkshop', '<p>testworkshop</p>\r\n', 12, 123, '10,11,12', 'silver', '', NULL, NULL, NULL, 0, 0, '2018-09-11 18:13:04', '2018-09-11 18:13:04', '<p>testworkshop</p>\r\n', '<p>testworkshop</p>\r\n', 'inst_1');

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
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `club_id` (`club_id`),
  ADD KEY `club_category_id` (`club_category_id`);

--
-- Indexes for table `club_category`
--
ALTER TABLE `club_category`
  ADD PRIMARY KEY (`sno`,`club_category_name`),
  ADD UNIQUE KEY `club_category_id` (`club_category_id`);

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
  ADD PRIMARY KEY (`sno`),
  ADD KEY `institute_id` (`institute_id`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `gen_course`
--
ALTER TABLE `gen_course`
  ADD PRIMARY KEY (`sno`,`course_id`),
  ADD UNIQUE KEY `course_id` (`course_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `gen_course_class`
--
ALTER TABLE `gen_course_class`
  ADD PRIMARY KEY (`sno`,`class_id`),
  ADD UNIQUE KEY `class_id` (`class_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `gen_section`
--
ALTER TABLE `gen_section`
  ADD PRIMARY KEY (`sno`,`section_id`),
  ADD UNIQUE KEY `section_id` (`section_id`),
  ADD UNIQUE KEY `section_id_2` (`section_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `gen_subject`
--
ALTER TABLE `gen_subject`
  ADD PRIMARY KEY (`sno`,`subject_id`),
  ADD UNIQUE KEY `subject_id` (`subject_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `gen_subtopic`
--
ALTER TABLE `gen_subtopic`
  ADD PRIMARY KEY (`sno`,`subtopic_id`),
  ADD UNIQUE KEY `subtopic_id` (`subtopic_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `gen_topic`
--
ALTER TABLE `gen_topic`
  ADD PRIMARY KEY (`sno`,`topic_id`),
  ADD UNIQUE KEY `topic_id` (`topic_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `inst_course_assign`
--
ALTER TABLE `inst_course_assign`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `institute_id` (`institute_id`);

--
-- Indexes for table `live_course`
--
ALTER TABLE `live_course`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `online_test`
--
ALTER TABLE `online_test`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`sno`,`institute_id`),
  ADD UNIQUE KEY `institute_id` (`institute_id`);

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
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `webinar`
--
ALTER TABLE `webinar`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `club_id` (`club_id`);

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
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `club_category`
--
ALTER TABLE `club_category`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content_manager`
--
ALTER TABLE `content_manager`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deployment_control`
--
ALTER TABLE `deployment_control`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ebook`
--
ALTER TABLE `ebook`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gen_course`
--
ALTER TABLE `gen_course`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gen_course_class`
--
ALTER TABLE `gen_course_class`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `gen_section`
--
ALTER TABLE `gen_section`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gen_subject`
--
ALTER TABLE `gen_subject`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gen_subtopic`
--
ALTER TABLE `gen_subtopic`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gen_topic`
--
ALTER TABLE `gen_topic`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inst_course_assign`
--
ALTER TABLE `inst_course_assign`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `live_course`
--
ALTER TABLE `live_course`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `online_test`
--
ALTER TABLE `online_test`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `webinar`
--
ALTER TABLE `webinar`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`club_category_id`) REFERENCES `club_category` (`club_category_id`);

--
-- Constraints for table `deployment_control`
--
ALTER TABLE `deployment_control`
  ADD CONSTRAINT `deployment_control_ibfk_1` FOREIGN KEY (`institute_id`) REFERENCES `school` (`institute_id`);

--
-- Constraints for table `ebook`
--
ALTER TABLE `ebook`
  ADD CONSTRAINT `ebook_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `ebook_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);

--
-- Constraints for table `gen_course_class`
--
ALTER TABLE `gen_course_class`
  ADD CONSTRAINT `gen_course_class_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `gen_course` (`course_id`);

--
-- Constraints for table `gen_section`
--
ALTER TABLE `gen_section`
  ADD CONSTRAINT `gen_section_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `gen_subject` (`subject_id`);

--
-- Constraints for table `gen_subject`
--
ALTER TABLE `gen_subject`
  ADD CONSTRAINT `gen_subject_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `gen_course_class` (`class_id`);

--
-- Constraints for table `gen_subtopic`
--
ALTER TABLE `gen_subtopic`
  ADD CONSTRAINT `gen_subtopic_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `gen_topic` (`topic_id`);

--
-- Constraints for table `gen_topic`
--
ALTER TABLE `gen_topic`
  ADD CONSTRAINT `gen_topic_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `gen_subject` (`subject_id`);

--
-- Constraints for table `inst_course_assign`
--
ALTER TABLE `inst_course_assign`
  ADD CONSTRAINT `inst_course_assign_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `gen_course` (`course_code`),
  ADD CONSTRAINT `inst_course_assign_ibfk_2` FOREIGN KEY (`institute_id`) REFERENCES `school` (`institute_id`);

--
-- Constraints for table `live_course`
--
ALTER TABLE `live_course`
  ADD CONSTRAINT `live_course_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `live_course_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);

--
-- Constraints for table `online_test`
--
ALTER TABLE `online_test`
  ADD CONSTRAINT `online_test_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `online_test_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `video_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);

--
-- Constraints for table `webinar`
--
ALTER TABLE `webinar`
  ADD CONSTRAINT `webinar_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `webinar_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`),
  ADD CONSTRAINT `workshop_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
