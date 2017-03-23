-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2017 at 02:05 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quiz_cakephp_3.3.10`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `user_id`, `name`, `email`, `address`, `created`, `modified`) VALUES
(2, 2, 'Rahul kutes', 'rahul@gmail.com', 'vardha', '2013-05-23 19:11:43', '2017-03-16 07:08:26'),
(5, 1, 'Devendra Gadre', 'devendragdr@gmail.com', 'sadar nagpur', '2017-02-21 12:33:28', '2017-02-22 11:06:55'),
(6, 0, 'Jitendra', 'jitendra@gmail.com', 'it park nagpur', '2017-02-22 11:03:59', '2017-03-16 07:00:48'),
(7, 0, 'Ajay chinchkhedea', 'ajay@gmail.com', 'sadar, koradi nagpur', '2017-02-23 08:21:04', '2017-03-16 07:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
`id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mark` int(111) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `name`, `mark`, `created`, `modified`) VALUES
(1, 38, 'Abstract', 2, '2017-02-21 12:43:56', '2017-03-15 11:38:06'),
(2, 38, 'Protected', 3, '2017-02-21 12:43:56', '2017-03-15 11:38:07'),
(4, 1, 'Static', NULL, '2017-02-21 12:43:56', '2017-02-28 07:38:11'),
(5, 2, '(ii) and (iii)', NULL, '2017-02-21 12:59:12', '2017-02-28 08:51:52'),
(6, 2, 'All of the mentioned', NULL, '2017-02-21 12:59:12', '2017-02-28 08:51:52'),
(7, 2, 'None of the mentioned', NULL, '2017-02-21 12:59:12', '2017-02-28 08:51:52'),
(8, 2, '(ii), (iii) and (iv)', NULL, '2017-02-21 12:59:12', '2017-02-28 08:51:52'),
(9, 3, 'classname()', NULL, '2017-02-21 13:00:19', '2017-02-28 08:53:26'),
(10, 3, ' _construct()', NULL, '2017-02-21 13:00:20', '2017-02-28 08:53:26'),
(11, 3, 'function _construct()', NULL, '2017-02-21 13:00:20', '2017-02-28 08:53:26'),
(12, 3, 'function __construct()', NULL, '2017-02-21 13:00:20', '2017-02-28 08:53:26'),
(13, 4, 'PHP 4', NULL, '2017-02-21 13:01:13', '2017-02-28 08:52:00'),
(14, 4, ' PHP 5', NULL, '2017-02-21 13:01:13', '2017-02-28 08:52:00'),
(15, 4, ' PHP 5.3', NULL, '2017-02-21 13:01:13', '2017-02-28 08:52:00'),
(16, 4, ' PHP 6', NULL, '2017-02-21 13:01:13', '2017-02-28 08:52:01'),
(17, 5, 'ans5-1', NULL, '2017-02-23 08:56:26', '2017-02-23 08:56:26'),
(18, 5, 'ans5-2', NULL, '2017-02-23 08:56:26', '2017-02-23 08:56:26'),
(19, 5, 'ans5-3', NULL, '2017-02-23 08:56:26', '2017-02-23 08:56:26'),
(20, 5, 'ans5-4', NULL, '2017-02-23 08:56:26', '2017-02-23 08:56:26'),
(21, 6, 'exist(', NULL, '2017-02-28 08:48:58', '2017-02-28 08:49:23'),
(22, 6, 'exist_class()', NULL, '2017-02-28 08:48:58', '2017-02-28 08:49:23'),
(23, 6, 'class_exist()', NULL, '2017-02-28 08:48:58', '2017-02-28 08:49:23'),
(24, 6, '__exist()', NULL, '2017-02-28 08:48:58', '2017-02-28 08:49:23'),
(25, 7, 'A', NULL, '2017-03-06 11:11:51', '2017-03-06 11:11:51'),
(26, 7, 'B', NULL, '2017-03-06 11:11:51', '2017-03-06 11:11:51'),
(27, 7, 'C', NULL, '2017-03-06 11:11:51', '2017-03-06 11:11:51'),
(28, 7, 'D', NULL, '2017-03-06 11:11:51', '2017-03-06 11:11:51'),
(34, 41, 'x', NULL, '2017-03-09 12:26:53', '2017-03-09 12:26:53'),
(35, 41, 'y', NULL, '2017-03-09 12:26:53', '2017-03-09 12:26:53'),
(36, 41, 'z', NULL, '2017-03-09 12:26:53', '2017-03-09 12:26:53'),
(37, 41, 'cc', NULL, '2017-03-09 12:26:53', '2017-03-09 12:26:53'),
(38, 43, 'ccx', NULL, '2017-03-09 12:30:48', '2017-03-09 12:30:48'),
(39, 43, 'cxcx', NULL, '2017-03-09 12:30:48', '2017-03-09 12:30:48'),
(40, 43, 'cxcx', NULL, '2017-03-09 12:30:48', '2017-03-09 12:30:48'),
(41, 43, 'cx', NULL, '2017-03-09 12:30:48', '2017-03-09 12:30:48'),
(66, 15, 'v1', NULL, '2017-03-10 06:24:09', '2017-03-10 06:24:09'),
(67, 15, 'v2', NULL, '2017-03-10 06:24:09', '2017-03-10 06:24:09'),
(68, 15, 'v3', NULL, '2017-03-10 06:24:09', '2017-03-10 06:24:09'),
(69, 15, 'v4', NULL, '2017-03-10 06:24:09', '2017-03-10 06:24:09'),
(70, 16, 'sm1', NULL, '2017-03-10 06:26:52', '2017-03-10 06:26:52'),
(71, 16, 'sm2', NULL, '2017-03-10 06:26:52', '2017-03-10 06:26:52'),
(72, 16, 'sm3', NULL, '2017-03-10 06:26:52', '2017-03-10 06:26:52'),
(73, 16, 'sm4', NULL, '2017-03-10 06:26:52', '2017-03-10 06:26:52'),
(74, 17, 'lmi1', NULL, '2017-03-10 06:33:19', '2017-03-10 06:33:19'),
(75, 17, 'lml2', NULL, '2017-03-10 06:33:19', '2017-03-10 06:33:19'),
(76, 17, 'lmi3', NULL, '2017-03-10 06:33:19', '2017-03-10 06:33:19'),
(77, 17, 'lmi4', NULL, '2017-03-10 06:33:19', '2017-03-10 06:33:19'),
(78, 23, 'sss2', NULL, '2017-03-10 07:27:44', '2017-03-10 07:27:44'),
(79, 23, 'cxcx', NULL, '2017-03-10 07:27:44', '2017-03-10 07:27:44'),
(80, 23, 'cxc', NULL, '2017-03-10 07:27:44', '2017-03-10 07:27:44'),
(81, 23, 'cxcx', NULL, '2017-03-10 07:27:44', '2017-03-10 07:27:44'),
(82, 24, 'dfdf', NULL, '2017-03-10 07:28:11', '2017-03-10 07:28:11'),
(83, 24, 'fd', NULL, '2017-03-10 07:28:11', '2017-03-10 07:28:11'),
(84, 24, 'dfd', NULL, '2017-03-10 07:28:11', '2017-03-10 07:28:11'),
(85, 24, 'fd', NULL, '2017-03-10 07:28:11', '2017-03-10 07:28:11'),
(86, 25, 'daa', NULL, '2017-03-10 07:30:31', '2017-03-10 07:30:31'),
(87, 25, 'sas', NULL, '2017-03-10 07:30:31', '2017-03-10 07:30:31'),
(88, 25, 'sasa', NULL, '2017-03-10 07:30:31', '2017-03-10 07:30:31'),
(89, 25, 'sa', NULL, '2017-03-10 07:30:31', '2017-03-10 07:30:31'),
(90, 26, 'dsds', NULL, '2017-03-10 07:31:45', '2017-03-10 07:31:45'),
(91, 26, 'dsd', NULL, '2017-03-10 07:31:45', '2017-03-10 07:31:45'),
(92, 26, 'dsd', NULL, '2017-03-10 07:31:45', '2017-03-10 07:31:45'),
(93, 26, 'dsd', NULL, '2017-03-10 07:31:45', '2017-03-10 07:31:45'),
(94, 27, 'cxcxc', NULL, '2017-03-10 07:32:48', '2017-03-10 07:32:48'),
(95, 27, 'xcxc', NULL, '2017-03-10 07:32:48', '2017-03-10 07:32:48'),
(96, 27, 'xc', NULL, '2017-03-10 07:32:49', '2017-03-10 07:32:49'),
(97, 27, 'cxc', NULL, '2017-03-10 07:32:49', '2017-03-10 07:32:49'),
(98, 28, 'zxzxz', NULL, '2017-03-10 07:37:46', '2017-03-10 07:37:46'),
(99, 28, 'xzx', NULL, '2017-03-10 07:37:47', '2017-03-10 07:37:47'),
(100, 28, 'xz', NULL, '2017-03-10 07:37:47', '2017-03-10 07:37:47'),
(101, 28, 'xz', NULL, '2017-03-10 07:37:47', '2017-03-10 07:37:47'),
(102, 29, 'vcs', 1, '2017-03-10 07:38:51', '2017-03-16 05:33:09'),
(103, 29, 'vcsw', 2, '2017-03-10 07:38:51', '2017-03-16 05:33:09'),
(106, 30, 'cx', NULL, '2017-03-10 07:41:14', '2017-03-10 07:41:14'),
(107, 30, 'cx', NULL, '2017-03-10 07:41:14', '2017-03-10 07:41:14'),
(108, 30, 'cxcx', NULL, '2017-03-10 07:41:14', '2017-03-10 07:41:14'),
(109, 30, 'cx', NULL, '2017-03-10 07:41:14', '2017-03-10 07:41:14'),
(110, 31, 'cx', NULL, '2017-03-10 07:43:29', '2017-03-10 07:43:29'),
(111, 31, 'cx', NULL, '2017-03-10 07:43:30', '2017-03-10 07:43:30'),
(112, 31, 'cxc', NULL, '2017-03-10 07:43:30', '2017-03-10 07:43:30'),
(121, 37, 'shiv11', 2, '2017-03-10 13:06:20', '2017-03-14 11:19:02'),
(122, 37, 'shiv22', 3, '2017-03-10 13:06:20', '2017-03-14 11:19:02'),
(123, 37, 'shiv33', 45, '2017-03-10 13:06:21', '2017-03-14 11:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(11) NOT NULL,
  `company_registration_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `controller` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `module` text NOT NULL,
  `main_link` varchar(255) NOT NULL,
  `title_link` text NOT NULL,
  `sidebar_link` int(11) NOT NULL,
  `order_sequence` int(11) DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=1469 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `company_registration_id`, `role_id`, `designation_id`, `view`, `edit`, `controller`, `action`, `module`, `main_link`, `title_link`, `sidebar_link`, `order_sequence`) VALUES
(1346, 0, 0, 0, 0, 0, 'Questions', 'index', 'Question', '', 'Question List', 1, 1),
(1347, 0, 0, 0, 0, 0, 'Questions', 'add', 'Question', '', 'Question Add', 1, 2),
(1348, 0, 0, 0, 1, 0, 'Quizzes', 'index', 'Quizz', '', 'Quizz List', 1, 1),
(1349, 0, 0, 0, 0, 0, 'Quizzes', 'generate', 'Quizz', '', 'Quizz Generate', 1, 2),
(1350, 0, 0, 0, 1, 0, 'Quizzes', 'appear', 'Quizz', '', 'Quizz Appear', 1, 3),
(1351, 0, 0, 0, 0, 0, 'permissions', 'index', 'Setting', '', 'Access Rights', 1, 1),
(1345, 0, 0, 0, 0, 0, 'Users', 'index', 'Candidate', '', 'User List', 1, 3),
(1343, 0, 0, 0, 0, 0, 'candidates', 'index', 'Candidate', '', 'Candidate List', 1, 1),
(1344, 0, 0, 0, 0, 0, 'candidates', 'edit', 'Candidate', '', 'Registration', 1, 2),
(1468, 0, 0, 1, 1, 0, 'permissions', 'index', 'Setting', '', 'Access Rights', 1, 1),
(1467, 0, 0, 1, 1, 0, 'Quizzes', 'appear', 'Quizz', '', 'Quizz Appear', 1, 3),
(1466, 0, 0, 1, 1, 0, 'Quizzes', 'generate', 'Quizz', '', 'Quizz Generate', 1, 2),
(1465, 0, 0, 1, 1, 0, 'Quizzes', 'index', 'Quizz', '', 'Quizz List', 1, 1),
(1464, 0, 0, 1, 1, 0, 'Questions', 'add', 'Question', '', 'Question Add', 1, 2),
(1463, 0, 0, 1, 1, 0, 'Questions', 'index', 'Question', '', 'Question List', 1, 1),
(1462, 0, 0, 1, 1, 0, 'Users', 'index', 'Candidate', '', 'User List', 1, 3),
(1461, 0, 0, 1, 1, 0, 'candidates', 'edit', 'Candidate', '', 'Registration', 1, 2),
(1460, 0, 0, 1, 1, 0, 'candidates', 'index', 'Candidate', '', 'Candidate List', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `correct_option_id` int(11) NOT NULL,
  `number_of_option` int(111) DEFAULT '0',
  `mark` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `name`, `correct_option_id`, `number_of_option`, `mark`, `status`, `created`, `modified`) VALUES
(2, 'Which of the following statements is/are true about Constructors in PHP ? (i) PHP 4 introduced class constructors. (ii) Constructors can accept parameters. (iii) Constructors can call class methods or other functions (iv) Class constructors can call on other constructors.', 6, NULL, 2, 0, '2017-02-21 12:59:12', '2017-02-28 08:51:52'),
(3, '3. PHP recognizes constructors by the name. ', 12, NULL, 3, 0, '2017-02-21 13:00:19', '2017-02-28 08:53:26'),
(4, 'Which version of PHP introduced the instanceof keyword ? ', 14, NULL, 4, 0, '2017-02-21 13:01:13', '2017-02-28 08:52:01'),
(6, 'Which one of the following functions is used to determine whether a class exists ? ', 23, NULL, 0, 0, '2017-02-28 08:48:58', '2017-02-28 08:49:23'),
(7, 'Which is the first Alphabeate of English ? ', 27, NULL, 0, 0, '2017-03-06 11:11:50', '2017-03-06 11:11:51'),
(15, 'vimal', 68, NULL, 0, 0, '2017-03-10 06:24:09', '2017-03-10 06:24:09'),
(16, 'sample', 73, NULL, 0, 0, '2017-03-10 06:26:52', '2017-03-10 06:26:52'),
(23, 'sss', 79, NULL, 0, 0, '2017-03-10 07:27:44', '2017-03-10 07:27:44'),
(24, 'sss', 83, NULL, 0, 0, '2017-03-10 07:28:11', '2017-03-10 07:28:11'),
(25, 'ds', 88, NULL, 0, 0, '2017-03-10 07:30:30', '2017-03-10 07:30:31'),
(26, 'dsds', 92, NULL, 0, 0, '2017-03-10 07:31:45', '2017-03-10 07:31:45'),
(27, 'cxcx', 95, NULL, 0, 0, '2017-03-10 07:32:48', '2017-03-10 07:32:49'),
(28, 'xz', 99, NULL, 0, 0, '2017-03-10 07:37:46', '2017-03-10 07:37:47'),
(29, 'v', 103, 2, 0, 0, '2017-03-10 07:38:51', '2017-03-16 05:33:10'),
(30, 'cx', 107, NULL, 0, 0, '2017-03-10 07:41:14', '2017-03-10 07:41:14'),
(31, 'cxcx', 112, NULL, 0, 0, '2017-03-10 07:43:29', '2017-03-10 07:43:30'),
(37, 'shiv', 122, 3, 0, 0, '2017-03-10 13:06:20', '2017-03-15 09:11:23'),
(38, 'sample', 2, 2, 0, 0, '2017-03-11 06:03:00', '2017-03-15 11:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE IF NOT EXISTS `quizzes` (
`id` int(11) NOT NULL,
  `quiz_name` varchar(555) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `code` varchar(4) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `quiz_time` double NOT NULL,
  `elapsedTime` varchar(555) NOT NULL,
  `completed_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `quiz_name`, `candidate_id`, `code`, `total_questions`, `score`, `quiz_time`, `elapsedTime`, `completed_date`, `status`, `created`, `modified`) VALUES
(1, 'Quiz A', 5, '7qw5', 3, 3, 2, '', '0000-00-00 00:00:00', 0, '2017-03-18 10:06:22', '2017-03-18 10:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `quizz_candidates`
--

CREATE TABLE IF NOT EXISTS `quizz_candidates` (
`id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `quizz_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `elapsedTime` double NOT NULL,
  `completed_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizz_candidates`
--

INSERT INTO `quizz_candidates` (`id`, `candidate_id`, `quizz_id`, `score`, `elapsedTime`, `completed_date`, `status`, `created`, `modified`) VALUES
(1, 5, 1, 3, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 6, 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quizz_questions`
--

CREATE TABLE IF NOT EXISTS `quizz_questions` (
`id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `quizz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizz_questions`
--

INSERT INTO `quizz_questions` (`id`, `candidate_id`, `quizz_id`, `question_id`, `option_id`, `position`, `created`, `modified`) VALUES
(1, 5, 1, 4, 15, 1, '2017-03-18 10:06:22', '2017-03-18 10:06:22'),
(2, 5, 1, 31, 111, 2, '2017-03-18 10:06:22', '2017-03-18 10:06:22'),
(3, 5, 1, 30, 108, 3, '2017-03-18 10:06:22', '2017-03-18 10:06:22'),
(4, 6, 1, 7, NULL, 1, '2017-03-18 10:06:22', '2017-03-18 10:06:22'),
(5, 6, 1, 16, NULL, 2, '2017-03-18 10:06:22', '2017-03-18 10:06:22'),
(6, 6, 1, 38, NULL, 3, '2017-03-18 10:06:22', '2017-03-18 10:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(555) NOT NULL,
  `admin` int(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `candidate_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `admin`, `created`, `modified`, `candidate_id`, `status`) VALUES
(1, 'admin', 'a8ae69be8b3089142648dfd70e40f648494ed413', 1, NULL, '2017-02-27 12:53:20', 0, 1),
(6, 'aaa', '8adb89029e19fc97b8d434cacc549347a87c0d95', 0, '2017-02-27 12:00:04', '2017-02-27 12:53:21', 2, 1),
(7, 'ajay', '501d26ec0a1a552741e74206fe4ee8f01b24a7fa', 0, '2017-02-27 13:32:37', '2017-02-27 13:32:37', 7, 1),
(8, 'admin@admin.com', '$2y$10$o23oUOZt49RXpauXLmyAzOmHMikeUaGk.OmR24kSB9mQ82KTd8ktG', 1, '2017-03-07 11:12:15', '2017-03-07 11:12:15', 5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `correct_option_id` (`correct_option_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `testcode` (`code`);

--
-- Indexes for table `quizz_candidates`
--
ALTER TABLE `quizz_candidates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizz_questions`
--
ALTER TABLE `quizz_questions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1469;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quizz_candidates`
--
ALTER TABLE `quizz_candidates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quizz_questions`
--
ALTER TABLE `quizz_questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
