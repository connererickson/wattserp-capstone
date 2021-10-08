-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2021 at 11:01 PM
-- Server version: 5.7.25-0ubuntu0.18.10.2
-- PHP Version: 7.2.16-1+ubuntu18.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wattserp`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `activity` text COLLATE utf8mb4_bin NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `activity`, `updated_at`, `created_at`) VALUES
(5, 2, ' added permissions for Field Crew to manage View Employee Basic Information', '2018-09-12 15:24:28', '2018-09-12 15:24:28'),
(6, 2, ' removed permissions for Field Crew to manage View Employee Basic Information', '2018-09-12 15:26:30', '2018-09-12 15:26:30'),
(10, 2, ' created a new training slide Another Slide Test with id 16', '2018-09-14 03:43:02', '2018-09-14 03:43:02'),
(11, 2, ' added permissions for Administrator to manage View Project Leads', '2018-09-15 02:04:23', '2018-09-15 02:04:23'),
(12, 2, ' added permissions for Administrator to manage Create Project Leads', '2018-09-15 02:04:23', '2018-09-15 02:04:23'),
(13, 2, ' added permissions for Administrator to manage Edit Project Leads', '2018-09-15 02:04:25', '2018-09-15 02:04:25'),
(14, 2, ' added permissions for Administrator to manage View Company Vehicle Information', '2018-09-15 02:04:27', '2018-09-15 02:04:27'),
(15, 2, ' added permissions for Administrator to manage Create Company Vehicle', '2018-09-15 02:04:28', '2018-09-15 02:04:28'),
(16, 2, ' added permissions for Administrator to manage Edit Company Vehicle Information', '2018-09-15 02:04:29', '2018-09-15 02:04:29'),
(17, 2, ' created a new training course named awefawef with id 4', '2018-10-16 00:01:08', '2018-10-16 00:01:08'),
(18, 2, ' created a new training course named awefaewf with id 5', '2018-10-16 00:03:30', '2018-10-16 00:03:30'),
(19, 2, ' created a new training course named aefawef with id 7', '2018-10-16 00:08:06', '2018-10-16 00:08:06'),
(20, 2, ' created a new training course named ssssss with id 8', '2018-10-16 00:08:19', '2018-10-16 00:08:19'),
(21, 2, ' created a new training course named fffffff with id 10', '2018-10-16 00:11:09', '2018-10-16 00:11:09'),
(22, 2, ' unscheduled training Test Course for Stephen Hieb', '2018-10-16 06:07:05', '2018-10-16 06:07:05'),
(23, 2, ' unscheduled training Test Course for Stephen Hieb', '2018-10-16 06:08:55', '2018-10-16 06:08:55'),
(24, 2, ' unscheduled training Test Course for Sara Boersma', '2018-10-16 06:10:38', '2018-10-16 06:10:38'),
(25, 2, ' unscheduled training Test Course for Stephen Hieb', '2018-10-16 06:11:20', '2018-10-16 06:11:20'),
(26, 2, ' scheduled training  for 3', '2018-10-16 06:45:24', '2018-10-16 06:45:24'),
(27, 2, ' scheduled training  for 1', '2018-10-16 06:45:34', '2018-10-16 06:45:34'),
(28, 2, ' added new dashboard module My Tasks', '2018-10-17 02:29:04', '2018-10-17 02:29:04'),
(29, 2, ' removed training course Test Course', '2018-10-18 00:55:23', '2018-10-18 00:55:23'),
(30, 2, ' removed training course Test 2', '2018-10-18 00:58:23', '2018-10-18 00:58:23'),
(31, 2, ' updated training slide Slide Test 1000 with id 11', '2018-10-18 01:01:17', '2018-10-18 01:01:17'),
(32, 2, ' removed dashboard module My Activity Log', '2018-10-19 23:13:47', '2018-10-19 23:13:47'),
(33, 2, ' added new dashboard module My Activity Log', '2018-10-19 23:15:40', '2018-10-19 23:15:40'),
(34, 2, ' removed dashboard module My Activity Log', '2018-10-21 04:21:02', '2018-10-21 04:21:02'),
(35, 2, ' added new dashboard module My Activity Log', '2018-10-21 04:21:07', '2018-10-21 04:21:07'),
(36, 2, ' unscheduled training Test 2 for Stephen Hieb', '2018-10-21 05:04:44', '2018-10-21 05:04:44'),
(37, 2, ' scheduled training  for 1', '2018-10-21 05:04:50', '2018-10-21 05:04:50'),
(38, 2, ' scheduled training  for 1', '2018-10-22 23:31:57', '2018-10-22 23:31:57'),
(39, 2, ' created new user Tester5 with username tester5 and user id 10', '2018-12-05 02:54:23', '2018-12-05 02:54:23'),
(40, 2, ' updated user tester5 with user id 10', '2018-12-05 03:16:43', '2018-12-05 03:16:43'),
(41, 2, ' added permissions for Administrator to manage View Inventory Topics', '2019-01-15 02:52:02', '2019-01-15 02:52:02'),
(42, 2, ' removed permissions for Administrator to manage View Inventory Topics', '2019-01-15 02:52:02', '2019-01-15 02:52:02'),
(43, 2, ' added permissions for Administrator to manage Manage Inventory', '2019-01-15 02:52:03', '2019-01-15 02:52:03'),
(44, 2, ' added permissions for Administrator to manage View Inventory Topics', '2019-01-15 02:52:03', '2019-01-15 02:52:03'),
(45, 2, ' added permissions for Administrator to manage Pull Inventory', '2019-01-15 02:52:05', '2019-01-15 02:52:05'),
(46, 2, ' added permissions for Administrator to manage Receive Inventory', '2019-01-15 02:52:07', '2019-01-15 02:52:07'),
(47, 2, ' added permissions for Administrator to manage Create Inventory Order', '2019-01-15 02:52:09', '2019-01-15 02:52:09'),
(48, 2, ' removed permissions for Administrator to manage Create Inventory Order', '2019-01-15 03:26:19', '2019-01-15 03:26:19'),
(49, 2, ' added permissions for Administrator to manage Create Inventory Order', '2019-01-15 03:26:21', '2019-01-15 03:26:21'),
(50, 2, ' added permissions for Administrator to manage View Projects', '2019-01-16 02:02:43', '2019-01-16 02:02:43'),
(51, 2, ' added permissions for Administrator to manage Edit Projects', '2019-01-16 02:02:46', '2019-01-16 02:02:46'),
(52, 2, ' added permissions for Administrator to manage View Archived Projects', '2019-01-16 02:14:34', '2019-01-16 02:14:34'),
(53, 2, ' removed permissions for Administrator to manage Create, Edit and Assign Audits', '2019-01-16 02:16:34', '2019-01-16 02:16:34'),
(54, 2, ' removed permissions for Administrator to manage Complete and Log Audits', '2019-01-16 02:16:36', '2019-01-16 02:16:36'),
(55, 2, ' added permissions for Administrator to manage Create, Edit and Assign Audits', '2019-01-16 02:26:18', '2019-01-16 02:26:18'),
(56, 2, ' added permissions for Administrator to manage Complete and Log Audits', '2019-01-16 02:26:19', '2019-01-16 02:26:19'),
(57, 2, ' added permissions for Administrator to manage View Parts Repository', '2019-01-16 02:30:25', '2019-01-16 02:30:25'),
(58, 2, ' added permissions for Administrator to manage Create Parts Repository', '2019-01-16 02:30:26', '2019-01-16 02:30:26'),
(59, 2, ' added permissions for Administrator to manage Edit Parts Repository', '2019-01-16 02:30:28', '2019-01-16 02:30:28'),
(60, 2, ' added permissions for Administrator to manage Create Parts Repository', '2019-01-18 03:06:06', '2019-01-18 03:06:06'),
(61, 2, ' removed permissions for Administrator to manage Create Parts Repository', '2019-01-18 03:06:07', '2019-01-18 03:06:07'),
(62, 2, ' added permissions for Administrator to manage Create Parts Repository', '2019-01-18 03:06:08', '2019-01-18 03:06:08'),
(63, 2, ' added permissions for Administrator to manage Edit Parts Repository', '2019-01-18 03:06:11', '2019-01-18 03:06:11'),
(64, 2, ' added permissions for Administrator to manage View Projects', '2019-01-18 03:06:13', '2019-01-18 03:06:13'),
(65, 2, ' added permissions for Administrator to manage Edit Projects', '2019-01-18 03:06:15', '2019-01-18 03:06:15'),
(66, 2, ' added permissions for Administrator to manage View Archived Projects', '2019-01-18 03:06:19', '2019-01-18 03:06:19'),
(67, 2, ' added permissions for Administrator to manage View Project Leads', '2019-01-18 03:08:09', '2019-01-18 03:08:09'),
(68, 2, ' removed permissions for Administrator to manage View Project Leads', '2019-01-18 03:08:10', '2019-01-18 03:08:10'),
(69, 2, ' added permissions for Administrator to manage View Project Leads', '2019-01-18 03:08:12', '2019-01-18 03:08:12'),
(70, 2, ' added permissions for Administrator to manage Create Project Leads', '2019-01-18 03:08:13', '2019-01-18 03:08:13'),
(71, 2, ' added permissions for Administrator to manage Edit Project Leads', '2019-01-18 03:08:16', '2019-01-18 03:08:16'),
(72, 2, ' added permissions for Administrator to manage View Company Vehicle Information', '2019-01-18 03:08:19', '2019-01-18 03:08:19'),
(73, 2, ' added permissions for Administrator to manage Create Company Vehicle', '2019-01-18 03:08:22', '2019-01-18 03:08:22'),
(74, 2, ' added permissions for Administrator to manage Edit Company Vehicle Information', '2019-01-18 03:08:25', '2019-01-18 03:08:25'),
(75, 2, ' added permissions for Administrator to manage View Inventory', '2019-01-18 03:08:28', '2019-01-18 03:08:28'),
(76, 2, ' added permissions for Administrator to manage Create Inventory', '2019-01-18 03:08:34', '2019-01-18 03:08:34'),
(77, 2, ' added permissions for Administrator to manage Edit Inventory', '2019-01-18 03:08:38', '2019-01-18 03:08:38'),
(78, 2, ' added permissions for Administrator to manage View Inventory Pulls', '2019-01-18 03:08:41', '2019-01-18 03:08:41'),
(79, 2, ' added permissions for Administrator to manage Create Inventory Pulls', '2019-01-18 03:08:44', '2019-01-18 03:08:44'),
(80, 2, ' added permissions for Administrator to manage Edit Inventory Pulls', '2019-01-18 03:08:46', '2019-01-18 03:08:46'),
(81, 2, ' added permissions for Administrator to manage Receive Inventory', '2019-01-18 03:08:49', '2019-01-18 03:08:49'),
(82, 2, ' added permissions for Administrator to manage View Inventory Order', '2019-01-18 03:08:52', '2019-01-18 03:08:52'),
(83, 2, ' added permissions for Administrator to manage Create Inventory Order', '2019-01-18 03:08:54', '2019-01-18 03:08:54'),
(84, 2, ' added permissions for Administrator to manage Edit Inventory Order', '2019-01-18 03:08:56', '2019-01-18 03:08:56'),
(85, 2, ' added permissions for Administrator to manage View Parts Repository', '2019-01-18 03:08:59', '2019-01-18 03:08:59'),
(86, 2, ' added permissions for Administrator to manage Create Parts Repository', '2019-01-18 03:09:01', '2019-01-18 03:09:01'),
(87, 2, ' added permissions for Administrator to manage Edit Parts Repository', '2019-01-18 03:09:03', '2019-01-18 03:09:03'),
(88, 2, ' added permissions for Administrator to manage View Projects', '2019-01-18 03:09:06', '2019-01-18 03:09:06'),
(89, 2, ' added permissions for Administrator to manage Edit Projects', '2019-01-18 03:09:09', '2019-01-18 03:09:09'),
(90, 2, ' added permissions for Administrator to manage View Archived Projects', '2019-01-18 03:09:11', '2019-01-18 03:09:11'),
(91, 2, ' created a new directory entry for Manufacturer - L. H. Dottie Company( L. H. Dottie Company )', '2019-01-21 00:37:25', '2019-01-21 00:37:25'),
(92, 2, ' created a new directory entry for Supplier/Service - Consolidated Electrical Distributors( Consolidated Electrical Distributors, Inc )', '2019-01-21 06:04:10', '2019-01-21 06:04:10'),
(93, 2, ' added permissions for Administrator to manage Administrate Repository', '2019-01-29 04:54:28', '2019-01-29 04:54:28'),
(94, 2, ' added permissions for Administrator to manage Edit Projects', '2019-01-29 04:54:33', '2019-01-29 04:54:33'),
(95, 2, ' added permissions for Administrator to manage View Projects', '2019-01-29 04:54:38', '2019-01-29 04:54:38'),
(96, 2, ' added permissions for Administrator to manage View Archived Projects', '2019-01-29 04:54:43', '2019-01-29 04:54:43'),
(97, 2, ' unset filter OFF for type 1', '2019-01-31 02:55:30', '2019-01-31 02:55:30'),
(98, 2, ' unset filter OFF for type 3', '2019-01-31 02:59:19', '2019-01-31 02:59:19'),
(99, 2, ' unset filter OFF for type 5', '2019-01-31 02:59:22', '2019-01-31 02:59:22'),
(100, 2, ' set filter ON for type 3', '2019-01-31 02:59:29', '2019-01-31 02:59:29'),
(101, 2, ' set filter ON for type 1', '2019-01-31 03:01:01', '2019-01-31 03:01:01'),
(102, 2, ' set filter ON for type 5', '2019-01-31 03:01:05', '2019-01-31 03:01:05'),
(103, 2, ' unset filter OFF for type 8', '2019-01-31 03:01:11', '2019-01-31 03:01:11'),
(104, 2, ' unset filter OFF for type 5', '2019-01-31 03:01:24', '2019-01-31 03:01:24'),
(105, 2, ' unset filter OFF for type 7', '2019-01-31 03:01:26', '2019-01-31 03:01:26'),
(106, 2, ' unset filter OFF for type 9', '2019-01-31 03:01:26', '2019-01-31 03:01:26'),
(107, 2, ' unset filter OFF for type 11', '2019-01-31 03:01:29', '2019-01-31 03:01:29'),
(108, 2, ' unset filter OFF for type 13', '2019-01-31 03:01:29', '2019-01-31 03:01:29'),
(109, 2, ' unset filter OFF for type 3', '2019-01-31 03:01:35', '2019-01-31 03:01:35'),
(110, 2, ' unset filter OFF for type 1', '2019-01-31 03:01:35', '2019-01-31 03:01:35'),
(111, 2, ' unset filter OFF for type 14', '2019-01-31 03:01:37', '2019-01-31 03:01:37'),
(112, 2, ' unset filter OFF for type 12', '2019-01-31 03:01:37', '2019-01-31 03:01:37'),
(113, 2, ' unset filter OFF for type 10', '2019-01-31 03:01:39', '2019-01-31 03:01:39'),
(114, 2, ' set filter ON for type 1', '2019-01-31 03:01:57', '2019-01-31 03:01:57'),
(115, 2, ' set filter ON for type 3', '2019-01-31 03:01:57', '2019-01-31 03:01:57'),
(116, 2, ' set filter ON for type 5', '2019-01-31 03:01:59', '2019-01-31 03:01:59'),
(117, 2, ' set filter ON for type 7', '2019-01-31 03:02:00', '2019-01-31 03:02:00'),
(118, 2, ' set filter ON for type 9', '2019-01-31 03:02:01', '2019-01-31 03:02:01'),
(119, 2, ' set filter ON for type 11', '2019-01-31 03:02:01', '2019-01-31 03:02:01'),
(120, 2, ' set filter ON for type 13', '2019-01-31 03:02:03', '2019-01-31 03:02:03'),
(121, 2, ' set filter ON for type 8', '2019-01-31 03:02:05', '2019-01-31 03:02:05'),
(122, 2, ' set filter ON for type 10', '2019-01-31 03:02:05', '2019-01-31 03:02:05'),
(123, 2, ' set filter ON for type 12', '2019-01-31 03:02:07', '2019-01-31 03:02:07'),
(124, 2, ' set filter ON for type 14', '2019-01-31 03:02:07', '2019-01-31 03:02:07'),
(125, 2, ' created a new filter with name type', '2019-01-31 06:20:38', '2019-01-31 06:20:38'),
(126, 2, ' created a new filter with name testing Type', '2019-01-31 06:21:41', '2019-01-31 06:21:41'),
(127, 2, ' created a new type with name testing Type', '2019-01-31 06:27:22', '2019-01-31 06:27:22'),
(128, 2, ' created a new type with name testing Type 2', '2019-01-31 06:27:35', '2019-01-31 06:27:35'),
(129, 2, ' created a new type with name awfewefa a A D', '2019-01-31 06:32:44', '2019-01-31 06:32:44'),
(130, 2, ' created a new type with name aewf aE', '2019-01-31 06:36:29', '2019-01-31 06:36:29'),
(131, 2, ' created a new type with name afadsf A', '2019-01-31 06:50:03', '2019-01-31 06:50:03'),
(132, 2, ' created a new type with name afadsf Aadfs', '2019-01-31 06:51:18', '2019-01-31 06:51:18'),
(133, 2, ' created a new type with name awefawef', '2019-01-31 06:51:47', '2019-01-31 06:51:47'),
(134, 2, ' created a new type with name awefawef', '2019-01-31 06:54:24', '2019-01-31 06:54:24'),
(135, 2, ' created a new type with name awefawefwefwf', '2019-01-31 06:54:34', '2019-01-31 06:54:34'),
(136, 2, ' deleted type with id e23', '2019-02-01 03:35:13', '2019-02-01 03:35:13'),
(137, 2, ' deleted type with id e23', '2019-02-01 03:35:24', '2019-02-01 03:35:24'),
(138, 2, ' deleted type with id e23', '2019-02-01 03:36:29', '2019-02-01 03:36:29'),
(139, 2, ' deleted type with id 23', '2019-02-01 03:37:26', '2019-02-01 03:37:26'),
(140, 2, ' created a new type with name adfadsfasdf', '2019-02-01 03:39:49', '2019-02-01 03:39:49'),
(141, 2, ' created a new type with name ytuyuiyui', '2019-02-01 03:40:13', '2019-02-01 03:40:13'),
(142, 2, ' updated a training course named Test Course with id 1', '2019-02-01 04:15:53', '2019-02-01 04:15:53'),
(143, 2, ' deleted a training slide Another Slide Test with id 16', '2019-02-01 04:16:12', '2019-02-01 04:16:12'),
(144, 2, ' created a new type with name test', '2019-02-02 02:02:09', '2019-02-02 02:02:09'),
(145, 2, ' deleted type with id 26', '2019-02-02 02:16:41', '2019-02-02 02:16:41'),
(146, 2, ' deleted type with id 24', '2019-02-02 02:29:29', '2019-02-02 02:29:29'),
(147, 2, ' deleted type with id 25', '2019-02-02 02:29:34', '2019-02-02 02:29:34'),
(148, 2, ' deleted type with id 17', '2019-02-02 02:29:39', '2019-02-02 02:29:39'),
(149, 2, ' created a new type with name rawrt', '2019-02-02 02:29:44', '2019-02-02 02:29:44'),
(150, 2, ' created a new type with name rawr2', '2019-02-02 02:32:17', '2019-02-02 02:32:17'),
(151, 2, ' deleted type with id 28', '2019-02-02 02:33:07', '2019-02-02 02:33:07'),
(152, 2, ' deleted type with id 22', '2019-02-02 02:33:10', '2019-02-02 02:33:10'),
(153, 2, ' deleted type with id 27', '2019-02-02 02:33:14', '2019-02-02 02:33:14'),
(154, 2, ' deleted type with id 20', '2019-02-02 02:33:17', '2019-02-02 02:33:17'),
(155, 2, ' deleted type with id 21', '2019-02-02 02:33:21', '2019-02-02 02:33:21'),
(156, 2, ' deleted type with id 18', '2019-02-02 02:33:33', '2019-02-02 02:33:33'),
(157, 2, ' deleted type with id 19', '2019-02-02 02:33:36', '2019-02-02 02:33:36'),
(158, 2, ' deleted type with id 15', '2019-02-02 02:33:40', '2019-02-02 02:33:40'),
(159, 2, ' deleted type with id 16', '2019-02-02 02:33:43', '2019-02-02 02:33:43'),
(160, 2, ' created a new type with name rawr2', '2019-02-02 02:33:49', '2019-02-02 02:33:49'),
(161, 2, ' deleted type with id 29', '2019-02-02 02:33:55', '2019-02-02 02:33:55'),
(162, 2, ' updated information for employee Stephens Garrett Hieb with id 1', '2019-02-04 23:19:06', '2019-02-04 23:19:06'),
(163, 2, ' updated information for employee Stephen Garrett Hieb with id 1', '2019-02-04 23:19:10', '2019-02-04 23:19:10'),
(164, 2, ' updated user shieb with user id 2', '2019-02-04 23:19:31', '2019-02-04 23:19:31'),
(165, 2, ' added permissions for Administrator to manage Create, Edit and Assign Audits', '2019-02-04 23:20:10', '2019-02-04 23:20:10'),
(166, 2, ' removed training course Test Course 7', '2019-02-04 23:27:41', '2019-02-04 23:27:41'),
(167, 2, ' scheduled training Test Course for Sara Jane Boersma', '2019-02-04 23:30:30', '2019-02-04 23:30:30'),
(168, 2, ' unscheduled training Test Course for Sara Jane Boersma', '2019-02-04 23:31:09', '2019-02-04 23:31:09'),
(169, 2, ' created a new unit with name degrees_fahrenheit', '2019-02-05 00:21:18', '2019-02-05 00:21:18'),
(170, 2, ' created a new unit with name aewfaw', '2019-02-05 00:22:20', '2019-02-05 00:22:20'),
(171, 2, ' deleted unit with id 5', '2019-02-05 00:30:41', '2019-02-05 00:30:41'),
(172, 2, ' created a new unit with name degrees_celsius', '2019-02-05 00:32:10', '2019-02-05 00:32:10'),
(173, 2, ' scheduled training Test Course for Stephen Garrett Hieb', '2019-02-14 21:42:52', '2019-02-14 21:42:52'),
(174, 2, ' moved tag with id 14 from type 2to type 3', '2019-02-15 22:15:45', '2019-02-15 22:15:45'),
(175, 2, ' copied tag with id 14 from type 3to type 2', '2019-02-15 22:16:21', '2019-02-15 22:16:21'),
(176, 2, ' copied tag with id 14 from type 2to type 3', '2019-02-15 22:16:39', '2019-02-15 22:16:39'),
(177, 2, ' copied tag with id 14 from type 2to type 3', '2019-02-15 22:38:43', '2019-02-15 22:38:43'),
(178, 2, ' copied tag with id 14 from type 2to type 3', '2019-02-15 22:39:01', '2019-02-15 22:39:01'),
(179, 2, ' copied tag with id 14 from type 2to type 3', '2019-02-15 22:41:03', '2019-02-15 22:41:03'),
(180, 2, ' moved tag with id 14 from type 3to type 1', '2019-02-15 22:41:14', '2019-02-15 22:41:14'),
(181, 2, ' copied tag with id 24 from type to type 1', '2019-02-15 23:36:29', '2019-02-15 23:36:29'),
(182, 2, ' moved tag with id 24 from type to type 4', '2019-02-15 23:37:00', '2019-02-15 23:37:00'),
(183, 2, ' moved tag with id 24 from type 4to type 1', '2019-02-15 23:37:18', '2019-02-15 23:37:18'),
(184, 2, ' removed tags from1', '2019-02-15 23:54:23', '2019-02-15 23:54:23'),
(185, 2, ' removed tags from6', '2019-02-15 23:54:36', '2019-02-15 23:54:36'),
(186, 2, ' moved tag with id 16 from type to type 6', '2019-02-15 23:54:47', '2019-02-15 23:54:47'),
(187, 2, ' copied tag with id 17 from type to type 6', '2019-02-15 23:54:58', '2019-02-15 23:54:58'),
(188, 2, ' removed tags from9', '2019-02-15 23:57:32', '2019-02-15 23:57:32'),
(189, 2, ' moved tag with id 18 from type to type 9', '2019-02-15 23:57:43', '2019-02-15 23:57:43'),
(190, 2, ' moved tag with id 17 from type to type 6', '2019-02-15 23:57:52', '2019-02-15 23:57:52'),
(191, 2, ' copied tag with id 4 from type 4to type 1', '2019-02-15 23:59:14', '2019-02-15 23:59:14'),
(192, 2, ' copied tag with id 4 from type 4to type 1', '2019-02-15 23:59:42', '2019-02-15 23:59:42'),
(193, 2, ' copied tag with id 4 from type 4to type 1', '2019-02-16 00:00:45', '2019-02-16 00:00:45'),
(194, 2, ' copied tag with id 4 from type 4to type 1', '2019-02-16 00:00:50', '2019-02-16 00:00:50'),
(195, 2, ' copied tag with id 4 from type 4to type 1', '2019-02-16 00:02:34', '2019-02-16 00:02:34'),
(196, 2, ' copied tag with id 4 from type 4to type 1', '2019-02-16 00:04:04', '2019-02-16 00:04:04'),
(197, 2, ' copied tag with id 24 from type to type 1', '2019-02-16 00:04:11', '2019-02-16 00:04:11'),
(198, 2, ' removed tags from1', '2019-02-16 00:04:26', '2019-02-16 00:04:26'),
(199, 2, ' copied tag with id 17 from type 6to type 1', '2019-02-16 00:04:34', '2019-02-16 00:04:34'),
(200, 2, ' created a new tag with name blarg', '2019-02-16 00:29:40', '2019-02-16 00:29:40'),
(201, 2, ' copied tag with id 25 from type to type 2', '2019-02-16 00:29:50', '2019-02-16 00:29:50'),
(202, 2, ' removed tags from2', '2019-02-16 00:30:00', '2019-02-16 00:30:00'),
(203, 2, ' deleted tags', '2019-02-16 00:47:48', '2019-02-16 00:47:48'),
(204, 2, ' created a new tag with name blarg', '2019-02-16 00:48:21', '2019-02-16 00:48:21'),
(205, 2, ' moved tag with id 26 from type to type 2', '2019-02-16 00:48:28', '2019-02-16 00:48:28'),
(206, 2, ' copied tag with id 26 from type 2to type 1', '2019-02-16 00:48:33', '2019-02-16 00:48:33'),
(207, 2, ' deleted tags', '2019-02-16 00:48:45', '2019-02-16 00:48:45'),
(208, 2, ' created a new repository color with name Blue', '2019-02-26 05:26:16', '2019-02-26 05:26:16'),
(209, 2, ' created a new repository color with name Blue', '2019-02-26 05:31:00', '2019-02-26 05:31:00'),
(210, 2, ' deleted color with id 3', '2019-02-26 05:31:21', '2019-02-26 05:31:21'),
(211, 2, ' created a new part in the repository with id , and part # A-BRK-X2', '2019-03-02 03:05:45', '2019-03-02 03:05:45'),
(212, 2, ' created a new part in the repository with id , and part # A-BRK-X2', '2019-03-02 03:07:08', '2019-03-02 03:07:08'),
(213, 2, ' created a new part in the repository with id , and part # A-BRK-X2', '2019-03-02 03:08:29', '2019-03-02 03:08:29'),
(214, 2, ' created a new part in the repository with id , and part # A-BRK-X2', '2019-03-02 03:12:19', '2019-03-02 03:12:19'),
(215, 2, ' created a new part in the repository with id , and part # A-BRK-X222', '2019-03-04 01:18:23', '2019-03-04 01:18:23'),
(216, 2, ' created a new part in the repository with id , and part # A-BRK-X2224', '2019-03-04 01:35:25', '2019-03-04 01:35:25'),
(217, 2, ' created a new part in the repository with id , and part # A-BRK-X22245', '2019-03-04 01:39:53', '2019-03-04 01:39:53'),
(218, 2, ' created a new part in the repository with id , and part # A-BRK-X222456', '2019-03-04 01:44:49', '2019-03-04 01:44:49'),
(219, 2, ' created a new part in the repository with id , and part # A-BRK-X2224567', '2019-03-04 01:46:27', '2019-03-04 01:46:27'),
(220, 2, ' created a new part in the repository with id , and part # A-BRK-X22245678', '2019-03-04 02:02:24', '2019-03-04 02:02:24'),
(221, 2, ' created a new tag with name pvc', '2019-03-04 02:03:34', '2019-03-04 02:03:34'),
(222, 2, ' moved tag with id 25 from type to type 11', '2019-03-04 02:03:44', '2019-03-04 02:03:44'),
(223, 2, ' created a new tag with name form_2s', '2019-03-04 17:25:28', '2019-03-04 17:25:28'),
(224, 2, ' removed tags from1', '2019-03-04 17:26:14', '2019-03-04 17:26:14'),
(225, 2, ' created a new tag with name james', '2019-03-04 17:26:23', '2019-03-04 17:26:23'),
(226, 2, ' copied tag with id 27 from type to type 6', '2019-03-04 17:26:38', '2019-03-04 17:26:38'),
(227, 2, ' copied tag with id 27 from type 6to type 3', '2019-03-04 17:26:47', '2019-03-04 17:26:47'),
(228, 2, ' removed tags from3', '2019-03-04 17:26:54', '2019-03-04 17:26:54'),
(229, 2, ' deleted tags', '2019-03-04 17:27:02', '2019-03-04 17:27:02'),
(230, 2, ' created a new repository color with name James', '2019-03-04 17:27:54', '2019-03-04 17:27:54'),
(231, 2, ' created a new part in the repository with id , and part # A-BRK-X22245678', '2019-03-04 17:29:22', '2019-03-04 17:29:22'),
(232, 2, ' created a new part in the repository with id , and part # awefawefaefaef', '2019-03-04 23:28:37', '2019-03-04 23:28:37'),
(233, 2, ' added a vendor for part 1 with id 4', '2019-03-09 00:22:32', '2019-03-09 00:22:32'),
(234, 2, ' added a vendor for part 1 with id 4', '2019-03-09 00:35:29', '2019-03-09 00:35:29'),
(235, 2, ' updated pricing for vendor with id 4 for part with id 1', '2019-03-09 00:45:21', '2019-03-09 00:45:21'),
(236, 2, ' updated pricing for vendor with id 4 for part with id 1', '2019-03-09 00:48:22', '2019-03-09 00:48:22'),
(237, 2, ' updated pricing for vendor with id 4 for part with id 1', '2019-03-09 00:48:57', '2019-03-09 00:48:57'),
(238, 2, ' updated pricing for vendor with id 4 for part with id 1', '2019-03-09 00:52:07', '2019-03-09 00:52:07'),
(239, 2, ' updated pricing for vendor with id 4 for part with id 1', '2019-03-09 00:53:34', '2019-03-09 00:53:34'),
(240, 2, ' updated pricing for vendor with id 4 for part with id 1', '2019-03-09 00:54:54', '2019-03-09 00:54:54'),
(241, 2, ' updated pricing for vendor with id 4 for part with id 1', '2019-03-09 00:55:46', '2019-03-09 00:55:46'),
(242, 2, ' updated pricing for vendor with id 4 for part with id 1', '2019-03-09 00:56:14', '2019-03-09 00:56:14'),
(243, 2, ' created a new directory entry for Vendor - Brown Wholesale Electric (Wesco)( Brown Wholesale Electric, A Division of Wesco )', '2019-03-09 00:57:16', '2019-03-09 00:57:16'),
(244, 2, ' added a vendor with id 5 for part with id 1', '2019-03-09 00:57:32', '2019-03-09 00:57:32'),
(245, 2, ' updated pricing for vendor with id 5 for part with id 1', '2019-03-09 00:58:30', '2019-03-09 00:58:30'),
(246, 2, ' added a vendor with id 5 for part with id 1', '2019-03-09 00:58:52', '2019-03-09 00:58:52'),
(247, 2, ' created a new repository color with name Black', '2019-03-09 01:23:42', '2019-03-09 01:23:42'),
(248, 2, ' deleted color with id 5', '2019-03-09 01:23:48', '2019-03-09 01:23:48'),
(249, 2, ' created a new repository color with name White', '2019-03-09 01:24:39', '2019-03-09 01:24:39'),
(250, 2, ' updated tags for part with id 3', '2019-03-11 00:46:15', '2019-03-11 00:46:15'),
(251, 2, ' updated tags for part with id 3', '2019-03-11 00:46:16', '2019-03-11 00:46:16'),
(252, 2, ' updated tags for part with id 3', '2019-03-11 00:46:18', '2019-03-11 00:46:18'),
(253, 2, ' updated tags for part with id 3', '2019-03-11 00:46:18', '2019-03-11 00:46:18'),
(254, 2, ' updated tags for part with id 3', '2019-03-11 00:46:32', '2019-03-11 00:46:32'),
(255, 2, ' updated tags for part with id 3', '2019-03-11 00:46:33', '2019-03-11 00:46:33'),
(256, 2, ' updated tags for part with id 3', '2019-03-11 00:46:34', '2019-03-11 00:46:34'),
(257, 2, ' updated tags for part with id 3', '2019-03-11 00:46:35', '2019-03-11 00:46:35'),
(258, 2, ' updated tags for part with id 3', '2019-03-11 00:46:35', '2019-03-11 00:46:35'),
(259, 2, ' added a vendor with id 5 for part with id 3', '2019-03-11 00:46:56', '2019-03-11 00:46:56'),
(260, 2, ' updated tags for part with id 2', '2019-03-11 00:47:11', '2019-03-11 00:47:11'),
(261, 2, ' updated tags for part with id 1', '2019-03-11 01:01:17', '2019-03-11 01:01:17'),
(262, 2, ' updated pricing for vendor with id 4 for part with id 1', '2019-03-11 16:54:50', '2019-03-11 16:54:50'),
(263, 2, ' updated pricing for vendor with id 4 for part with id 1', '2019-03-11 16:55:25', '2019-03-11 16:55:25'),
(264, 2, ' created a new directory entry for Utility - Siemens(  )', '2019-03-11 16:59:07', '2019-03-11 16:59:07'),
(265, 2, ' created a new part in the repository with id , and part # MC4040S1200SC', '2019-03-11 17:02:06', '2019-03-11 17:02:06'),
(266, 2, ' updated tags for part with id 156', '2019-03-11 17:02:39', '2019-03-11 17:02:39'),
(267, 2, ' updated image for part with id 1', '2019-03-13 04:06:28', '2019-03-13 04:06:28'),
(268, 2, ' updated image for part with id 1', '2019-03-13 04:07:07', '2019-03-13 04:07:07'),
(269, 2, ' updated image for part with id 1', '2019-03-13 04:11:43', '2019-03-13 04:11:43'),
(270, 2, ' updated image for part with id 1', '2019-03-13 04:16:07', '2019-03-13 04:16:07'),
(271, 2, ' updated image for part with id 1', '2019-03-13 04:16:30', '2019-03-13 04:16:30'),
(272, 2, ' updated image for part with id 1', '2019-03-13 04:19:32', '2019-03-13 04:19:32'),
(273, 2, ' updated image for part with id 1', '2019-03-13 04:20:23', '2019-03-13 04:20:23'),
(274, 2, ' updated image for part with id 1', '2019-03-13 04:20:53', '2019-03-13 04:20:53'),
(275, 2, ' updated image for part with id 1', '2019-03-13 04:24:49', '2019-03-13 04:24:49'),
(276, 2, ' updated image for part with id 1', '2019-03-13 04:43:03', '2019-03-13 04:43:03'),
(277, 2, ' updated image for part with id 1', '2019-03-13 04:43:44', '2019-03-13 04:43:44'),
(278, 2, ' updated image for part with id 1', '2019-03-13 15:52:21', '2019-03-13 15:52:21'),
(279, 2, ' updated image for part with id 1', '2019-03-13 15:54:12', '2019-03-13 15:54:12'),
(280, 2, ' updated image for part with id 1', '2019-03-13 15:55:59', '2019-03-13 15:55:59'),
(281, 2, ' updated image for part with id 1', '2019-03-13 15:56:24', '2019-03-13 15:56:24'),
(282, 2, ' updated image for part with id 1', '2019-03-13 16:18:53', '2019-03-13 16:18:53'),
(283, 2, ' updated image for part with id 1', '2019-03-13 16:21:07', '2019-03-13 16:21:07'),
(284, 2, ' updated image for part with id 1', '2019-03-13 16:25:21', '2019-03-13 16:25:21'),
(285, 2, ' updated image for part with id 1', '2019-03-13 16:26:33', '2019-03-13 16:26:33'),
(286, 2, ' updated image for part with id 1', '2019-03-13 16:27:08', '2019-03-13 16:27:08'),
(287, 2, ' updated image for part with id 1', '2019-03-13 16:28:12', '2019-03-13 16:28:12'),
(288, 2, ' updated image for part with id 1', '2019-03-13 16:28:37', '2019-03-13 16:28:37'),
(289, 2, ' updated image for part with id 1', '2019-03-13 16:29:19', '2019-03-13 16:29:19'),
(290, 2, ' updated image for part with id 1', '2019-03-13 16:30:11', '2019-03-13 16:30:11'),
(291, 2, ' updated image for part with id 1', '2019-03-13 16:34:52', '2019-03-13 16:34:52'),
(292, 2, ' updated image for part with id 1', '2019-03-13 16:35:53', '2019-03-13 16:35:53'),
(293, 2, ' updated image for part with id 1', '2019-03-13 16:53:47', '2019-03-13 16:53:47'),
(294, 2, ' updated image for part with id 1', '2019-03-13 16:53:57', '2019-03-13 16:53:57'),
(295, 2, ' updated image for part with id 2', '2019-03-13 16:54:53', '2019-03-13 16:54:53'),
(296, 2, ' updated image for part with id 1', '2019-03-13 16:55:41', '2019-03-13 16:55:41'),
(297, 2, ' updated image for part with id 1', '2019-03-13 16:56:11', '2019-03-13 16:56:11'),
(298, 2, ' updated image for part with id 2', '2019-03-13 16:57:38', '2019-03-13 16:57:38'),
(299, 2, ' updated image for part with id 1', '2019-03-13 16:58:55', '2019-03-13 16:58:55'),
(300, 2, ' updated image for part with id 1', '2019-03-13 17:01:06', '2019-03-13 17:01:06'),
(301, 2, ' updated image for part with id 1', '2019-03-13 17:03:13', '2019-03-13 17:03:13'),
(302, 2, ' updated image for part with id 1', '2019-03-13 17:03:20', '2019-03-13 17:03:20'),
(303, 2, ' updated image for part with id 1', '2019-03-13 17:03:36', '2019-03-13 17:03:36'),
(304, 2, ' updated image for part with id 1', '2019-03-13 17:04:29', '2019-03-13 17:04:29'),
(305, 2, ' updated image for part with id 2', '2019-03-13 17:04:39', '2019-03-13 17:04:39'),
(306, 2, ' updated image for part with id 1', '2019-03-13 17:04:48', '2019-03-13 17:04:48'),
(307, 2, ' updated image for part with id 1', '2019-03-13 17:04:57', '2019-03-13 17:04:57'),
(308, 2, ' updated image for part with id 2', '2019-03-13 17:05:05', '2019-03-13 17:05:05'),
(309, 2, ' updated image for part with id 2', '2019-03-13 17:05:39', '2019-03-13 17:05:39'),
(310, 2, ' updated image for part with id 2', '2019-03-13 17:05:46', '2019-03-13 17:05:46'),
(311, 2, ' updated tags for part with id 2', '2019-03-13 17:05:56', '2019-03-13 17:05:56'),
(312, 2, ' updated tags for part with id 2', '2019-03-13 17:05:57', '2019-03-13 17:05:57'),
(313, 2, ' updated image for part with id 1', '2019-03-13 17:08:31', '2019-03-13 17:08:31'),
(314, 2, ' updated image for part with id 1', '2019-03-13 17:12:46', '2019-03-13 17:12:46'),
(315, 2, ' updated image for part with id 2', '2019-03-13 17:15:58', '2019-03-13 17:15:58'),
(316, 2, ' added a vendor with id 4 for part with id 2', '2019-03-13 17:16:16', '2019-03-13 17:16:16'),
(317, 2, ' updated image for part with id 1', '2019-03-13 17:20:40', '2019-03-13 17:20:40'),
(318, 2, ' updated image for part with id 1', '2019-03-13 17:21:09', '2019-03-13 17:21:09'),
(319, 2, ' updated image for part with id 1', '2019-03-13 17:21:15', '2019-03-13 17:21:15'),
(320, 2, ' updated image for part with id 1', '2019-03-13 17:21:23', '2019-03-13 17:21:23'),
(321, 2, ' updated image for part with id 1', '2019-03-13 17:21:30', '2019-03-13 17:21:30'),
(322, 2, ' updated image for part with id 1', '2019-03-13 17:25:04', '2019-03-13 17:25:04'),
(323, 2, ' updated image for part with id 2', '2019-03-13 17:25:11', '2019-03-13 17:25:11'),
(324, 2, ' updated image for part with id 1', '2019-03-13 17:25:32', '2019-03-13 17:25:32'),
(325, 2, ' updated image for part with id 2', '2019-03-13 17:25:43', '2019-03-13 17:25:43'),
(326, 2, ' updated image for part with id 2', '2019-03-13 17:29:12', '2019-03-13 17:29:12'),
(327, 2, ' added a vendor with id 5 for part with id 2', '2019-03-13 17:29:21', '2019-03-13 17:29:21'),
(328, 2, ' updated tags for part with id 1', '2019-03-13 17:29:39', '2019-03-13 17:29:39'),
(329, 2, ' updated tags for part with id 1', '2019-03-13 17:29:59', '2019-03-13 17:29:59'),
(330, 2, ' created a new repository color with name Jeanne', '2019-03-13 17:31:15', '2019-03-13 17:31:15'),
(331, 2, ' deleted color with id 8', '2019-03-13 17:31:24', '2019-03-13 17:31:24'),
(332, 2, ' updated image for part with id 2', '2019-03-13 17:32:18', '2019-03-13 17:32:18'),
(333, 2, ' updated image for part with id 2', '2019-03-13 17:32:29', '2019-03-13 17:32:29'),
(334, 2, ' updated pricing for vendor with id 4 for part with id 2', '2019-03-13 17:32:46', '2019-03-13 17:32:46'),
(335, 2, ' updated repository part with id , and part # #6-Wire-Cu-Bare', '2019-03-15 22:28:35', '2019-03-15 22:28:35'),
(336, 2, ' updated repository part with id , and part # #6-Wire-Cu-Bare2', '2019-03-15 22:28:44', '2019-03-15 22:28:44'),
(337, 2, ' updated repository part with id , and part # #6-Wire-Cu-Bare', '2019-03-15 22:28:55', '2019-03-15 22:28:55'),
(338, 2, ' updated repository part with id , and part # #6-Wire-Cu-Bare', '2019-03-15 22:29:07', '2019-03-15 22:29:07'),
(339, 2, ' updated repository part with id , and part # #6-Wire-Cu-Bare', '2019-03-15 22:29:18', '2019-03-15 22:29:18'),
(340, 2, ' updated tags for part with id 1', '2019-03-15 22:53:57', '2019-03-15 22:53:57'),
(341, 2, ' updated tags for part with id 1', '2019-03-15 22:53:58', '2019-03-15 22:53:58'),
(342, 2, ' updated stock for part with id 1', '2019-03-15 23:30:34', '2019-03-15 23:30:34'),
(343, 2, ' updated stock for part with id 1', '2019-03-15 23:31:28', '2019-03-15 23:31:28'),
(344, 2, ' updated stock for part with id 1', '2019-03-15 23:31:49', '2019-03-15 23:31:49'),
(345, 2, ' updated stock for part with id 1', '2019-03-15 23:32:58', '2019-03-15 23:32:58'),
(346, 2, ' updated stock for part with id 1', '2019-03-15 23:33:01', '2019-03-15 23:33:01'),
(347, 2, ' updated stock for part with id 1', '2019-03-15 23:34:46', '2019-03-15 23:34:46'),
(348, 2, ' updated stock for part with id 1', '2019-03-15 23:35:13', '2019-03-15 23:35:13'),
(349, 2, ' updated stock for part with id 1', '2019-03-15 23:35:40', '2019-03-15 23:35:40'),
(350, 2, ' updated stock for part with id 1', '2019-03-15 23:35:45', '2019-03-15 23:35:45'),
(351, 2, ' added permissions for Administrator to manage Manage Directory Company', '2019-03-29 00:36:07', '2019-03-29 00:36:07'),
(352, 2, ' removed dashboard module My Activity Log', '2019-04-02 22:06:29', '2019-04-02 22:06:29'),
(353, 2, ' unscheduled training Test Course 7 for James \"Hulk Hogan\" Schafnit', '2019-04-02 22:09:57', '2019-04-02 22:09:57'),
(354, 2, ' unscheduled training Test Course for Stephen Garrett Hieb', '2019-04-02 22:10:00', '2019-04-02 22:10:00'),
(355, 2, ' unscheduled training Test Course for Stephen Garrett Hieb', '2019-04-02 22:10:04', '2019-04-02 22:10:04'),
(356, 2, ' unscheduled training Test 2 for Stephen Garrett Hieb', '2019-04-02 22:10:07', '2019-04-02 22:10:07'),
(357, 2, ' scheduled training Test Course for Stephen Garrett Hieb', '2019-04-02 22:10:22', '2019-04-02 22:10:22'),
(358, 2, ' unscheduled training Test Course for Stephen Garrett Hieb', '2019-04-02 22:10:27', '2019-04-02 22:10:27'),
(359, 2, ' updated tags for part with id 1', '2019-04-02 22:11:14', '2019-04-02 22:11:14'),
(360, 2, ' updated tags for part with id 1', '2019-04-02 22:11:15', '2019-04-02 22:11:15'),
(361, 2, ' updated pricing for vendor with id 4 for part with id 1', '2019-04-02 22:11:24', '2019-04-02 22:11:24'),
(362, 2, ' created a new training slide test slide with id 16', '2019-04-03 10:08:45', '2019-04-03 10:08:45'),
(363, 2, ' created a new training slide test slider 100000 with id 17', '2019-04-03 10:14:02', '2019-04-03 10:14:02'),
(364, 2, ' created a new training slide awefawefawef with id 18', '2019-04-03 10:14:38', '2019-04-03 10:14:38'),
(365, 2, ' updated a training course named Test 23 with id 2', '2019-04-03 10:14:49', '2019-04-03 10:14:49'),
(366, 2, ' updated training slide test slide2 with id 16', '2019-04-03 10:15:02', '2019-04-03 10:15:02'),
(367, 2, ' updated training slide awefawefawef with id 18', '2019-04-03 10:15:21', '2019-04-03 10:15:21'),
(368, 2, ' updated stock for part with id 3', '2019-04-03 10:34:22', '2019-04-03 10:34:22'),
(369, 2, ' updated user Schafnit with user id 5', '2019-04-03 12:44:39', '2019-04-03 12:44:39'),
(370, 2, ' removed permissions for Administrator to manage View Employees Basic', '2019-04-03 12:44:57', '2019-04-03 12:44:57'),
(371, 2, ' removed permissions for Administrator to manage View Employee Basic Information', '2019-04-03 12:45:14', '2019-04-03 12:45:14'),
(372, 2, ' created a new tag with name mohamad', '2019-04-03 14:47:33', '2019-04-03 14:47:33'),
(373, 2, ' moved tag with id 28 from type to type 3', '2019-04-03 14:47:45', '2019-04-03 14:47:45'),
(374, 2, ' moved tag with id 28 from type 3to type 7', '2019-04-03 14:47:55', '2019-04-03 14:47:55'),
(375, 2, ' updated tags for part with id 1', '2019-04-03 14:48:11', '2019-04-03 14:48:11'),
(376, 2, ' updated tags for part with id 1', '2019-04-03 14:48:15', '2019-04-03 14:48:15'),
(377, 2, ' removed tags from7', '2019-04-03 14:48:27', '2019-04-03 14:48:27'),
(378, 2, ' deleted tags', '2019-04-03 14:48:31', '2019-04-03 14:48:31'),
(379, 2, ' updated user james with user id 5', '2019-04-03 15:33:12', '2019-04-03 15:33:12'),
(380, 5, ' added new dashboard module My Tasks', '2019-04-03 15:34:41', '2019-04-03 15:34:41'),
(381, 5, ' removed dashboard module My Tasks', '2019-04-03 15:35:03', '2019-04-03 15:35:03'),
(382, 5, ' created a new directory entry for Partner - Red Mountain Lighting( Red Mountain Lighting LLC )', '2019-04-03 15:36:48', '2019-04-03 15:36:48'),
(383, 2, ' added permissions for Inventories to manage View Inventory', '2019-04-03 15:37:46', '2019-04-03 15:37:46'),
(384, 2, ' added permissions for Inventories to manage Create Inventory', '2019-04-03 15:37:51', '2019-04-03 15:37:51'),
(385, 2, ' added permissions for Inventories to manage Edit Inventory', '2019-04-03 15:37:53', '2019-04-03 15:37:53'),
(386, 2, ' added permissions for Inventories to manage View Inventory Pulls', '2019-04-03 15:37:56', '2019-04-03 15:37:56'),
(387, 2, ' added permissions for Inventories to manage Create Inventory Pulls', '2019-04-03 15:37:57', '2019-04-03 15:37:57'),
(388, 2, ' added permissions for Inventories to manage Edit Inventory Pulls', '2019-04-03 15:38:01', '2019-04-03 15:38:01'),
(389, 2, ' added permissions for Inventories to manage Receive Inventory', '2019-04-03 15:38:03', '2019-04-03 15:38:03'),
(390, 2, ' added permissions for Inventories to manage View Inventory Order', '2019-04-03 15:38:06', '2019-04-03 15:38:06'),
(391, 2, ' added permissions for Inventories to manage Create Inventory Order', '2019-04-03 15:38:08', '2019-04-03 15:38:08'),
(392, 2, ' added permissions for Inventories to manage Edit Inventory Order', '2019-04-03 15:38:11', '2019-04-03 15:38:11'),
(393, 2, ' added permissions for Inventories to manage View Parts Repository', '2019-04-03 15:38:13', '2019-04-03 15:38:13'),
(394, 2, ' added permissions for Inventories to manage Create Parts Repository', '2019-04-03 15:38:16', '2019-04-03 15:38:16'),
(395, 2, ' added permissions for Inventories to manage Edit Parts Repository', '2019-04-03 15:38:18', '2019-04-03 15:38:18'),
(396, 2, ' added permissions for Inventories to manage Administrate Repository', '2019-04-03 15:38:21', '2019-04-03 15:38:21'),
(397, 2, ' added permissions for Safety to manage View Safety Programs', '2019-04-03 15:38:33', '2019-04-03 15:38:33'),
(398, 2, ' added permissions for Human Resources to manage View Safety Programs', '2019-04-03 15:38:41', '2019-04-03 15:38:41'),
(399, 2, ' added permissions for Executive to manage View Archived Projects', '2019-04-03 15:39:48', '2019-04-03 15:39:48'),
(400, 2, ' added permissions for Executive to manage Edit Projects', '2019-04-03 15:39:49', '2019-04-03 15:39:49'),
(401, 2, ' added permissions for Executive to manage View Projects', '2019-04-03 15:39:51', '2019-04-03 15:39:51'),
(402, 2, ' added permissions for Executive to manage Administrate Repository', '2019-04-03 15:39:53', '2019-04-03 15:39:53'),
(403, 2, ' added permissions for Executive to manage View Parts Repository', '2019-04-03 15:40:02', '2019-04-03 15:40:02'),
(404, 2, ' added permissions for Executive to manage Create Parts Repository', '2019-04-03 15:40:04', '2019-04-03 15:40:04'),
(405, 2, ' added permissions for Executive to manage Edit Parts Repository', '2019-04-03 15:40:07', '2019-04-03 15:40:07'),
(406, 2, ' removed permissions for Executive to manage Edit Parts Repository', '2019-04-03 15:40:13', '2019-04-03 15:40:13'),
(407, 2, ' removed permissions for Executive to manage Edit Projects', '2019-04-03 15:40:16', '2019-04-03 15:40:16'),
(408, 2, ' added permissions for Executive to manage View Inventory', '2019-04-03 15:40:20', '2019-04-03 15:40:20'),
(409, 2, ' added permissions for Executive to manage View Inventory Pulls', '2019-04-03 15:40:24', '2019-04-03 15:40:24'),
(410, 2, ' added permissions for Executive to manage View Inventory Order', '2019-04-03 15:40:26', '2019-04-03 15:40:26'),
(411, 2, ' added permissions for Executive to manage View Company Vehicle Information', '2019-04-03 15:40:30', '2019-04-03 15:40:30'),
(412, 2, ' added permissions for Executive to manage View Project Leads', '2019-04-03 15:40:33', '2019-04-03 15:40:33'),
(413, 2, ' added permissions for Executive to manage View Incident Reports', '2019-04-03 15:40:36', '2019-04-03 15:40:36'),
(414, 2, ' added permissions for Executive to manage View Job Hazard Analyses (JHAs) and Reports', '2019-04-03 15:40:40', '2019-04-03 15:40:40'),
(415, 2, ' added permissions for Executive to manage View Audits and Audit Results', '2019-04-03 15:40:45', '2019-04-03 15:40:45'),
(416, 2, ' added permissions for Executive to manage View Training Courses, Results and Certs', '2019-04-03 15:40:50', '2019-04-03 15:40:50'),
(417, 2, ' added permissions for Executive to manage View Safety Programs', '2019-04-03 15:40:56', '2019-04-03 15:40:56'),
(418, 2, ' added permissions for Executive to manage View Directory', '2019-04-03 15:40:59', '2019-04-03 15:40:59'),
(419, 2, ' added permissions for Administrator to manage View Employee Basic Information', '2019-04-03 15:41:23', '2019-04-03 15:41:23'),
(420, 2, ' added permissions for Administrator to manage View Employees Basic', '2019-04-03 15:41:26', '2019-04-03 15:41:26'),
(421, 2, ' created new user Rosie Velasquez with username rosie and user id 11', '2019-04-05 13:46:43', '2019-04-05 13:46:43'),
(422, 2, ' added permissions for Human Resources to manage Create Employee', '2019-04-05 13:50:12', '2019-04-05 13:50:12'),
(423, 2, ' added permissions for Human Resources to manage View Directory', '2019-04-05 13:50:20', '2019-04-05 13:50:20'),
(424, 2, ' added permissions for Project Manager to manage View Directory', '2019-04-05 13:50:36', '2019-04-05 13:50:36'),
(425, 2, ' added permissions for Safety to manage View Employee Basic Information', '2019-04-05 13:50:52', '2019-04-05 13:50:52'),
(426, 2, ' added permissions for Safety to manage View Directory', '2019-04-05 13:51:03', '2019-04-05 13:51:03'),
(427, 2, ' added permissions for Inventories to manage View Directory', '2019-04-05 13:51:07', '2019-04-05 13:51:07'),
(428, 2, ' added permissions for Contracts to manage View Directory', '2019-04-05 13:51:09', '2019-04-05 13:51:09'),
(429, 2, ' added permissions for Safety to manage View Training Courses, Results and Certs', '2019-04-05 13:51:18', '2019-04-05 13:51:18'),
(430, 2, ' added permissions for Safety to manage Create, Edit and Assign Training Courses', '2019-04-05 13:51:21', '2019-04-05 13:51:21'),
(431, 2, ' added permissions for Safety to manage Take Training Course', '2019-04-05 13:51:24', '2019-04-05 13:51:24'),
(432, 2, ' added permissions for Human Resources to manage View Training Courses, Results and Certs', '2019-04-05 13:51:27', '2019-04-05 13:51:27'),
(433, 2, ' added permissions for Human Resources to manage Create, Edit and Assign Training Courses', '2019-04-05 13:51:30', '2019-04-05 13:51:30'),
(434, 2, ' added permissions for Human Resources to manage Take Training Course', '2019-04-05 13:51:33', '2019-04-05 13:51:33'),
(435, 2, ' added permissions for Safety to manage View Audits and Audit Results', '2019-04-05 13:51:36', '2019-04-05 13:51:36'),
(436, 2, ' added permissions for Safety to manage Create, Edit and Assign Audits', '2019-04-05 13:51:38', '2019-04-05 13:51:38'),
(437, 2, ' added permissions for Safety to manage Complete and Log Audits', '2019-04-05 13:51:41', '2019-04-05 13:51:41'),
(438, 2, ' added permissions for Safety to manage View Job Hazard Analyses (JHAs) and Reports', '2019-04-05 13:51:46', '2019-04-05 13:51:46'),
(439, 2, ' added permissions for Safety to manage Create and Edit Job Hazard Analyses (JHAs)', '2019-04-05 13:51:49', '2019-04-05 13:51:49'),
(440, 2, ' added permissions for Safety to manage Complete and Log Job Hazard Analyses (JHAs)', '2019-04-05 13:51:51', '2019-04-05 13:51:51'),
(441, 2, ' added permissions for Safety to manage View Incident Reports', '2019-04-05 13:51:54', '2019-04-05 13:51:54'),
(442, 2, ' added permissions for Safety to manage Create and Edit Incident Reports', '2019-04-05 13:51:56', '2019-04-05 13:51:56'),
(443, 2, ' added permissions for Safety to manage Complete Incident Reports', '2019-04-05 13:51:58', '2019-04-05 13:51:58'),
(444, 5, ' created a new tag with name 16s', '2019-04-05 14:05:57', '2019-04-05 14:05:57'),
(445, 5, ' moved tag with id 29 from type to type 2', '2019-04-05 14:06:43', '2019-04-05 14:06:43'),
(446, 5, ' removed tags from2', '2019-04-05 14:24:15', '2019-04-05 14:24:15'),
(447, 5, ' deleted tags', '2019-04-05 14:24:28', '2019-04-05 14:24:28'),
(448, 5, ' created a new tag with name form_16s', '2019-04-05 14:24:38', '2019-04-05 14:24:38'),
(449, 5, ' created a new tag with name form_12s', '2019-04-05 14:24:54', '2019-04-05 14:24:54'),
(450, 5, ' created a new tag with name form_5s', '2019-04-05 14:25:05', '2019-04-05 14:25:05'),
(451, 5, ' created a new tag with name form_1s', '2019-04-05 14:25:19', '2019-04-05 14:25:19'),
(452, 5, ' created a new tag with name form_15s', '2019-04-05 14:25:34', '2019-04-05 14:25:34'),
(453, 5, ' created a new tag with name form_8s', '2019-04-05 14:25:46', '2019-04-05 14:25:46'),
(454, 5, ' moved tag with id 30 from type to type 2', '2019-04-05 14:25:55', '2019-04-05 14:25:55'),
(455, 5, ' moved tag with id 31 from type to type 2', '2019-04-05 14:26:01', '2019-04-05 14:26:01'),
(456, 5, ' moved tag with id 32 from type to type 2', '2019-04-05 14:26:06', '2019-04-05 14:26:06'),
(457, 5, ' moved tag with id 33 from type to type 2', '2019-04-05 14:26:11', '2019-04-05 14:26:11'),
(458, 5, ' moved tag with id 34 from type to type 2', '2019-04-05 14:26:16', '2019-04-05 14:26:16'),
(459, 5, ' moved tag with id 35 from type to type 2', '2019-04-05 14:26:20', '2019-04-05 14:26:20'),
(460, 5, ' created a new tag with name non-fused', '2019-04-05 14:26:45', '2019-04-05 14:26:45'),
(461, 5, ' created a new tag with name aps_approved', '2019-04-05 14:27:43', '2019-04-05 14:27:43'),
(462, 5, ' created a new tag with name srp_approved', '2019-04-05 14:27:54', '2019-04-05 14:27:54'),
(463, 5, ' moved tag with id 36 from type to type 3', '2019-04-05 14:28:03', '2019-04-05 14:28:03'),
(464, 5, ' moved tag with id 37 from type to type 3', '2019-04-05 14:28:08', '2019-04-05 14:28:08'),
(465, 5, ' moved tag with id 38 from type to type 3', '2019-04-05 14:28:13', '2019-04-05 14:28:13'),
(466, 5, ' created a new tag with name nema_3r', '2019-04-05 14:28:34', '2019-04-05 14:28:34'),
(467, 5, ' created a new tag with name nema_1', '2019-04-05 14:28:43', '2019-04-05 14:28:43'),
(468, 5, ' created a new tag with name main_lug', '2019-04-05 14:30:03', '2019-04-05 14:30:03'),
(469, 5, ' created a new tag with name main_breaker', '2019-04-05 14:30:12', '2019-04-05 14:30:12'),
(470, 5, ' copied tag with id 39 from type to type 3', '2019-04-05 14:30:48', '2019-04-05 14:30:48'),
(471, 5, ' copied tag with id 39 from type 3to type 4', '2019-04-05 14:30:59', '2019-04-05 14:30:59'),
(472, 5, ' copied tag with id 40 from type to type 3', '2019-04-05 14:31:14', '2019-04-05 14:31:14'),
(473, 5, ' copied tag with id 40 from type 3to type 4', '2019-04-05 14:31:22', '2019-04-05 14:31:22'),
(474, 5, ' copied tag with id 40 from type 4to type 5', '2019-04-05 14:31:33', '2019-04-05 14:31:33'),
(475, 5, ' copied tag with id 39 from type 3to type 5', '2019-04-05 14:31:40', '2019-04-05 14:31:40'),
(476, 5, ' copied tag with id 41 from type to type 4', '2019-04-05 14:31:52', '2019-04-05 14:31:52'),
(477, 5, ' moved tag with id 42 from type to type 4', '2019-04-05 14:32:03', '2019-04-05 14:32:03'),
(478, 5, ' copied tag with id 41 from type 4to type 5', '2019-04-05 14:32:11', '2019-04-05 14:32:11'),
(479, 5, ' copied tag with id 42 from type 4to type 5', '2019-04-05 14:32:25', '2019-04-05 14:32:25'),
(480, 5, ' created a new tag with name 20\'_rail_section', '2019-04-05 14:33:07', '2019-04-05 14:33:07'),
(481, 5, ' moved tag with id 43 from type to type 8', '2019-04-05 14:34:01', '2019-04-05 14:34:01'),
(482, 5, ' created a new tag with name ct_section', '2019-04-05 14:34:21', '2019-04-05 14:34:21'),
(483, 5, ' created a new tag with name ct_section', '2019-04-05 14:34:22', '2019-04-05 14:34:22'),
(484, 5, ' deleted tags', '2019-04-05 14:36:20', '2019-04-05 14:36:20');
INSERT INTO `activities` (`id`, `user_id`, `activity`, `updated_at`, `created_at`) VALUES
(485, 5, ' moved tag with id 44 from type to type 5', '2019-04-05 14:36:32', '2019-04-05 14:36:32'),
(486, 5, ' created a new tag with name pull_section', '2019-04-05 14:36:58', '2019-04-05 14:36:58'),
(487, 5, ' created a new tag with name 22k_sccr', '2019-04-05 14:37:16', '2019-04-05 14:37:16'),
(488, 5, ' created a new tag with name 22kaic', '2019-04-05 14:37:29', '2019-04-05 14:37:29'),
(489, 5, ' created a new tag with name 10kaic', '2019-04-05 14:37:55', '2019-04-05 14:37:55'),
(490, 5, ' created a new tag with name 600vac', '2019-04-05 14:38:06', '2019-04-05 14:38:06'),
(491, 5, ' created a new tag with name 240vac', '2019-04-05 14:38:14', '2019-04-05 14:38:14'),
(492, 5, ' created a new tag with name 3w', '2019-04-05 14:38:23', '2019-04-05 14:38:23'),
(493, 5, ' created a new tag with name 4w', '2019-04-05 14:38:33', '2019-04-05 14:38:33'),
(494, 5, ' created a new tag with name 1ph', '2019-04-05 14:38:41', '2019-04-05 14:38:41'),
(495, 5, ' created a new tag with name 3ph', '2019-04-05 14:38:48', '2019-04-05 14:38:48'),
(496, 5, ' moved tag with id 47 from type to type 3', '2019-04-05 14:39:17', '2019-04-05 14:39:17'),
(497, 5, ' copied tag with id 47 from type 3to type 4', '2019-04-05 14:39:28', '2019-04-05 14:39:28'),
(498, 5, ' copied tag with id 47 from type 4to type 5', '2019-04-05 14:39:46', '2019-04-05 14:39:46'),
(499, 5, ' created a new tag with name 600vdc', '2019-04-05 14:40:47', '2019-04-05 14:40:47'),
(500, 5, ' created a new tag with name 1000vdc', '2019-04-05 14:40:55', '2019-04-05 14:40:55'),
(501, 5, ' created a new tag with name 600v', '2019-04-05 14:41:12', '2019-04-05 14:41:12'),
(502, 5, ' created a new tag with name 2kv', '2019-04-05 14:41:21', '2019-04-05 14:41:21'),
(503, 5, ' moved tag with id 58 from type to type 7', '2019-04-05 14:41:43', '2019-04-05 14:41:43'),
(504, 5, ' moved tag with id 59 from type to type 7', '2019-04-05 14:41:50', '2019-04-05 14:41:50'),
(505, 5, ' moved tag with id 46 from type to type 5', '2019-04-05 14:41:57', '2019-04-05 14:41:57'),
(506, 5, ' moved tag with id 48 from type to type 6', '2019-04-05 14:42:11', '2019-04-05 14:42:11'),
(507, 5, ' moved tag with id 49 from type to type 6', '2019-04-05 14:42:16', '2019-04-05 14:42:16'),
(508, 5, ' moved tag with id 24 from type to type 6', '2019-04-05 14:42:22', '2019-04-05 14:42:22'),
(509, 5, ' moved tag with id 52 from type to type 4', '2019-04-05 14:43:26', '2019-04-05 14:43:26'),
(510, 5, ' moved tag with id 53 from type to type 4', '2019-04-05 14:43:31', '2019-04-05 14:43:31'),
(511, 5, ' moved tag with id 54 from type to type 4', '2019-04-05 14:43:38', '2019-04-05 14:43:38'),
(512, 5, ' moved tag with id 55 from type to type 4', '2019-04-05 14:43:43', '2019-04-05 14:43:43'),
(513, 5, ' moved tag with id 51 from type to type 4', '2019-04-05 14:43:50', '2019-04-05 14:43:50'),
(514, 5, ' moved tag with id 50 from type to type 4', '2019-04-05 14:43:55', '2019-04-05 14:43:55'),
(515, 5, ' moved tag with id 56 from type to type 14', '2019-04-05 14:44:07', '2019-04-05 14:44:07'),
(516, 5, ' moved tag with id 57 from type to type 14', '2019-04-05 14:44:15', '2019-04-05 14:44:15'),
(517, 5, ' created a new type with name Fuse', '2019-04-15 13:15:51', '2019-04-15 13:15:51'),
(518, 5, ' created a new tag with name class_r', '2019-04-15 13:16:11', '2019-04-15 13:16:11'),
(519, 5, ' created a new tag with name class_l', '2019-04-15 13:16:24', '2019-04-15 13:16:24'),
(520, 5, ' created a new tag with name class_t', '2019-04-15 13:16:36', '2019-04-15 13:16:36'),
(521, 5, ' created a new tag with name class_j', '2019-04-15 13:16:45', '2019-04-15 13:16:45'),
(522, 5, ' created a new tag with name midget', '2019-04-15 13:16:55', '2019-04-15 13:16:55'),
(523, 5, ' copied tag with id 56 from type 14to type 15', '2019-04-15 13:17:20', '2019-04-15 13:17:20'),
(524, 5, ' copied tag with id 57 from type 14to type 15', '2019-04-15 13:17:28', '2019-04-15 13:17:28'),
(525, 5, ' moved tag with id 60 from type to type 15', '2019-04-15 13:17:41', '2019-04-15 13:17:41'),
(526, 5, ' moved tag with id 61 from type to type 15', '2019-04-15 13:17:50', '2019-04-15 13:17:50'),
(527, 5, ' moved tag with id 62 from type to type 15', '2019-04-15 13:18:05', '2019-04-15 13:18:05'),
(528, 5, ' moved tag with id 63 from type to type 15', '2019-04-15 13:18:15', '2019-04-15 13:18:15'),
(529, 5, ' moved tag with id 64 from type to type 15', '2019-04-15 13:18:22', '2019-04-15 13:18:22'),
(530, 5, ' copied tag with id 51 from type 4to type 15', '2019-04-15 13:18:46', '2019-04-15 13:18:46'),
(531, 5, ' copied tag with id 50 from type 4to type 15', '2019-04-15 13:19:05', '2019-04-15 13:19:05'),
(532, 5, ' created a new directory entry for Manufacturer - Fronius( Fronius USA LLC )', '2019-04-15 13:24:54', '2019-04-15 13:24:54'),
(533, 5, ' created a new directory entry for Manufacturer - SMA( SMA Solar Technology AG )', '2019-04-15 13:27:32', '2019-04-15 13:27:32'),
(534, 5, ' created a new directory entry for Manufacturer - Solar Edge( Solar Edge Technologies Inc )', '2019-04-15 13:30:49', '2019-04-15 13:30:49'),
(535, 5, ' created a new directory entry for Manufacturer - Hanwha( Hanwha Energy )', '2019-04-15 13:31:56', '2019-04-15 13:31:56'),
(536, 5, ' created a new directory entry for Utility - Trina Solar( Trina Solar )', '2019-04-15 13:34:16', '2019-04-15 13:34:16'),
(537, 5, ' updated directory information for Manufacturer - Trina Solar( Trina Solar )', '2019-04-15 13:34:23', '2019-04-15 13:34:23'),
(538, 5, ' created a new directory entry for Manufacturer - LG( LG Electronics )', '2019-04-15 13:34:59', '2019-04-15 13:34:59'),
(539, 5, ' created a new directory entry for Manufacturer - S-Energy( S-Energy Co. )', '2019-04-15 13:36:37', '2019-04-15 13:36:37'),
(540, 5, ' created a new directory entry for Manufacturer - Sun Edison( Sun Edison Inc )', '2019-04-15 13:38:10', '2019-04-15 13:38:10'),
(541, 5, ' created a new directory entry for Manufacturer - Yingli Solar( Yingli Green Energy Holding Company Limited )', '2019-04-15 13:41:32', '2019-04-15 13:41:32'),
(542, 5, ' created a new directory entry for Manufacturer - Centro Solar( Centro Solar America Inc )', '2019-04-15 13:42:36', '2019-04-15 13:42:36'),
(543, 5, ' created a new directory entry for Manufacturer - Growatt( Growatt New Energy Technology Co LTD )', '2019-04-15 14:04:01', '2019-04-15 14:04:01'),
(544, 5, ' created a new directory entry for Utility - ABB( ABB )', '2019-04-15 14:05:45', '2019-04-15 14:05:45'),
(545, 5, ' updated directory information for Manufacturer - ABB( ABB )', '2019-04-15 14:05:55', '2019-04-15 14:05:55'),
(546, 5, ' created a new directory entry for Utility - Mesa Electric( City of Mesa Electric Utility )', '2019-04-15 14:13:49', '2019-04-15 14:13:49'),
(547, 5, ' created a new directory entry for Utility - Tuson Electric Power( Tucson Electric Power )', '2019-04-15 14:15:54', '2019-04-15 14:15:54'),
(548, 2, ' created a new part in the repository with id , and part # awefawef', '2019-04-17 13:01:49', '2019-04-17 13:01:49'),
(549, 5, ' created a new unit with name watts', '2019-04-17 13:23:43', '2019-04-17 13:23:43'),
(550, 5, ' created a new part in the repository with id , and part # Tsm-255Pd05.082', '2019-04-17 13:33:31', '2019-04-17 13:33:31'),
(551, 5, ' updated tags for part with id 158', '2019-04-17 13:38:59', '2019-04-17 13:38:59'),
(552, 5, ' updated tags for part with id 158', '2019-04-17 13:39:23', '2019-04-17 13:39:23'),
(553, 5, ' updated tags for part with id 158', '2019-04-17 13:39:24', '2019-04-17 13:39:24'),
(554, 5, ' added a vendor with id 4 for part with id 158', '2019-04-17 13:39:34', '2019-04-17 13:39:34'),
(555, 2, ' updated repository part with id , and part # Tsm-255Pd05.082', '2019-04-17 14:34:39', '2019-04-17 14:34:39'),
(556, 2, ' updated repository part with id , and part # Tsm-255Pd05.082', '2019-04-17 14:35:01', '2019-04-17 14:35:01'),
(557, 2, ' updated repository part with id , and part # TSM-255PD05.082', '2019-04-17 15:02:09', '2019-04-17 15:02:09'),
(558, 2, ' updated image for part with id 158', '2019-04-21 17:35:39', '2019-04-21 17:35:39'),
(559, 2, ' updated user shiebs with user id 2', '2019-04-22 19:05:11', '2019-04-22 19:05:11'),
(560, 2, ' created new employee Stephen Garrett Hieb with id 5', '2019-04-22 19:28:39', '2019-04-22 19:28:39'),
(561, 2, ' created new employee Stephen Garrett Hieb with id 6', '2019-04-22 19:29:40', '2019-04-22 19:29:40'),
(562, 2, ' updated information for employee Stephens Garrett Hieb with id 6', '2019-04-22 19:29:54', '2019-04-22 19:29:54'),
(563, 2, ' updated information for employee Stephen Garrett Hieb with id 6', '2019-04-22 19:30:07', '2019-04-22 19:30:07'),
(564, 2, ' updated stock for part with id 158', '2019-04-22 19:46:06', '2019-04-22 19:46:06'),
(565, 2, ' created a new type with name test', '2019-04-22 19:49:18', '2019-04-22 19:49:18'),
(566, 2, ' created a new tag with name test', '2019-04-22 19:51:31', '2019-04-22 19:51:31'),
(567, 2, ' moved tag with id 65 from type to type 1', '2019-04-22 19:51:36', '2019-04-22 19:51:36'),
(568, 2, ' copied tag with id 65 from type to type 2', '2019-04-22 19:51:41', '2019-04-22 19:51:41'),
(569, 2, ' copied tag with id 65 from type to type 3', '2019-04-22 19:51:47', '2019-04-22 19:51:47'),
(570, 2, ' deleted tags', '2019-04-22 19:51:56', '2019-04-22 19:51:56'),
(571, 2, ' removed permissions for Administrator to manage View Employees Basic', '2019-04-22 19:56:28', '2019-04-22 19:56:28'),
(572, 2, ' added permissions for Administrator to manage View Employees Basic', '2019-04-22 19:56:48', '2019-04-22 19:56:48'),
(573, 2, ' removed permissions for Administrator to manage View Employees Basic', '2019-04-22 19:57:02', '2019-04-22 19:57:02'),
(574, 2, ' removed permissions for Internal to manage View Employees Basic', '2019-04-22 19:57:21', '2019-04-22 19:57:21'),
(575, 2, ' added permissions for Internal to manage View Employees Basic', '2019-04-22 19:57:31', '2019-04-22 19:57:31'),
(576, 2, ' added permissions for Administrator to manage View Employees Basic', '2019-04-22 19:57:33', '2019-04-22 19:57:33'),
(577, 2, ' removed permissions for Administrator to manage View Employee Sensitive', '2019-04-22 19:57:36', '2019-04-22 19:57:36'),
(578, 2, ' removed permissions for Administrator to manage View Employee Admin', '2019-04-22 19:57:39', '2019-04-22 19:57:39'),
(579, 2, ' removed permissions for Administrator to manage Create Employee', '2019-04-22 19:57:41', '2019-04-22 19:57:41'),
(580, 2, ' removed permissions for Administrator to manage Edit Employee', '2019-04-22 19:57:44', '2019-04-22 19:57:44'),
(581, 2, ' removed permissions for Administrator to manage View Employee Basic Information', '2019-04-22 19:57:46', '2019-04-22 19:57:46'),
(582, 2, ' added permissions for Administrator to manage View Employee Basic Information', '2019-04-22 19:57:57', '2019-04-22 19:57:57'),
(583, 2, ' added permissions for Administrator to manage View Employee Sensitive', '2019-04-22 19:58:00', '2019-04-22 19:58:00'),
(584, 2, ' added permissions for Administrator to manage View Employee Admin', '2019-04-22 19:58:03', '2019-04-22 19:58:03'),
(585, 2, ' added permissions for Administrator to manage Create Employee', '2019-04-22 19:58:05', '2019-04-22 19:58:05'),
(586, 2, ' added permissions for Administrator to manage Edit Employee', '2019-04-22 19:58:08', '2019-04-22 19:58:08'),
(587, 2, ' updated image for part with id 158', '2019-04-22 21:25:31', '2019-04-22 21:25:31'),
(588, 5, ' updated tags for part with id 158', '2019-04-23 07:17:20', '2019-04-23 07:17:20'),
(589, 5, ' updated tags for part with id 158', '2019-04-23 07:17:22', '2019-04-23 07:17:22'),
(590, 5, ' updated repository part with id , and part # TSM-255PD05.082', '2019-04-23 11:01:12', '2019-04-23 11:01:12'),
(591, 5, ' updated repository part with id , and part # TSM-255PD05.082', '2019-04-23 11:01:44', '2019-04-23 11:01:44'),
(592, 5, ' created a new directory entry for Vendor - Ontility( Ontility )', '2019-04-23 11:03:39', '2019-04-23 11:03:39'),
(593, 5, ' updated repository part with id , and part # TSM-255PD05.082', '2019-04-23 11:04:10', '2019-04-23 11:04:10'),
(594, 5, ' added a vendor with id 22 for part with id 158', '2019-04-23 11:23:00', '2019-04-23 11:23:00'),
(595, 5, ' created a new part in the repository with id , and part # TSM-250PA05.082', '2019-04-23 11:26:32', '2019-04-23 11:26:32'),
(596, 5, ' updated tags for part with id 159', '2019-04-23 11:26:52', '2019-04-23 11:26:52'),
(597, 5, ' created a new part in the repository with id , and part # TSM-250PD05.082', '2019-04-23 11:29:38', '2019-04-23 11:29:38'),
(598, 5, ' updated repository part with id , and part # TSM-255PD05.082', '2019-04-23 11:30:05', '2019-04-23 11:30:05'),
(599, 5, ' updated repository part with id , and part # TSM-250PA05.082', '2019-04-23 11:34:11', '2019-04-23 11:34:11'),
(600, 5, ' updated repository part with id , and part # TSM-250PD05.082', '2019-04-23 11:34:38', '2019-04-23 11:34:38'),
(601, 5, ' created a new part in the repository with id , and part # TSM-280 PA14', '2019-04-23 11:43:54', '2019-04-23 11:43:54'),
(602, 5, ' created a new repository color with name Silver', '2019-04-23 11:45:22', '2019-04-23 11:45:22'),
(603, 5, ' updated tags for part with id 161', '2019-04-23 11:46:57', '2019-04-23 11:46:57'),
(604, 5, ' updated repository part with id , and part # TSM-280 PA14', '2019-04-23 11:47:04', '2019-04-23 11:47:04'),
(605, 5, ' updated repository part with id , and part # TSM-280 PA14', '2019-04-23 11:47:21', '2019-04-23 11:47:21'),
(606, 5, ' updated repository part with id , and part # TSM-250PD05.082', '2019-04-23 11:48:58', '2019-04-23 11:48:58'),
(607, 5, ' updated repository part with id , and part # TSM-250PA05.082', '2019-04-23 11:49:10', '2019-04-23 11:49:10'),
(608, 5, ' updated repository part with id , and part # TSM-255PD05.082', '2019-04-23 11:49:26', '2019-04-23 11:49:26'),
(609, 5, ' updated tags for part with id 160', '2019-04-23 11:49:37', '2019-04-23 11:49:37'),
(610, 2, ' added modules for Internal to manage ERP Updates', '2019-04-24 12:03:42', '2019-04-24 12:03:42'),
(611, 5, ' added new dashboard module ERP Updates', '2019-04-24 12:04:11', '2019-04-24 12:04:11'),
(612, 2, ' removed modules for Internal to manage ERP Updates', '2019-04-24 12:25:44', '2019-04-24 12:25:44'),
(613, 2, ' added modules for Internal to manage ERP Updates', '2019-04-24 12:25:53', '2019-04-24 12:25:53'),
(614, 2, ' added new dashboard module ERP Updates', '2019-04-25 18:49:36', '2019-04-25 18:49:36'),
(615, 2, ' updated user shieb with user id 2', '2019-04-25 19:14:01', '2019-04-25 19:14:01'),
(616, 2, ' updated user shieb with user id 2', '2019-04-25 19:14:12', '2019-04-25 19:14:12'),
(617, 2, ' updated image for part with id 158', '2019-04-25 19:41:45', '2019-04-25 19:41:45'),
(618, 2, ' updated image for part with id 158', '2019-04-25 19:42:14', '2019-04-25 19:42:14'),
(619, 2, ' updated image for part with id 158', '2019-04-25 19:46:21', '2019-04-25 19:46:21'),
(620, 2, ' updated image for part with id 159', '2019-04-25 19:46:31', '2019-04-25 19:46:31'),
(621, 2, ' updated image for part with id 160', '2019-04-25 19:47:12', '2019-04-25 19:47:12'),
(622, 2, ' updated image for part with id 161', '2019-04-25 19:48:19', '2019-04-25 19:48:19'),
(623, 2, ' updated image for part with id 161', '2019-04-25 19:48:46', '2019-04-25 19:48:46'),
(624, 2, ' updated image for part with id 158', '2019-04-25 20:16:23', '2019-04-25 20:16:23'),
(625, 2, ' updated image for part with id 159', '2019-04-25 20:16:48', '2019-04-25 20:16:48'),
(626, 2, ' updated image for part with id 160', '2019-04-25 20:17:02', '2019-04-25 20:17:02'),
(627, 2, ' updated image for part with id 161', '2019-04-25 20:17:12', '2019-04-25 20:17:12'),
(628, 2, ' updated image for part with id 160', '2019-04-25 20:17:27', '2019-04-25 20:17:27'),
(629, 2, ' updated image for part with id 158', '2019-04-25 20:21:14', '2019-04-25 20:21:14'),
(630, 2, ' updated image for part with id 161', '2019-04-25 20:21:33', '2019-04-25 20:21:33'),
(631, 2, ' updated image for part with id 159', '2019-04-25 20:21:47', '2019-04-25 20:21:47'),
(632, 2, ' updated image for part with id 160', '2019-04-25 20:22:00', '2019-04-25 20:22:00'),
(633, 2, ' created new employee Stephen Garrett Hieb with id 7', '2019-04-27 21:00:33', '2019-04-27 21:00:33'),
(634, 2, ' scheduled training Test Course for Stephen Garrett Hieb', '2019-04-27 21:00:44', '2019-04-27 21:00:44'),
(635, 2, ' updated training slide Slide Test 3 with id 15', '2019-04-27 21:01:09', '2019-04-27 21:01:09'),
(636, 2, ' updated training slide Slide Test 21 with id 14', '2019-04-27 21:01:14', '2019-04-27 21:01:14'),
(637, 2, ' updated a training course named Test Course with id 1', '2019-04-27 21:01:16', '2019-04-27 21:01:16'),
(638, 2, ' updated training slide Slide Test 1000 with id 11', '2019-04-27 21:01:24', '2019-04-27 21:01:24'),
(639, 5, ' created a new part in the repository with id , and part # Q.Pro L-G2 305', '2019-05-01 14:41:49', '2019-05-01 14:41:49'),
(640, 5, ' created a new part in the repository with id , and part # SF260-36-P285L', '2019-05-01 14:51:03', '2019-05-01 14:51:03'),
(641, 5, ' created a new part in the repository with id , and part # SF260-36-P290L', '2019-05-01 14:54:48', '2019-05-01 14:54:48'),
(642, 5, ' updated image for part with id 162', '2019-05-03 08:46:42', '2019-05-03 08:46:42'),
(643, 2, ' created new user Katie Thrasher with username katie and user id 12', '2019-07-16 13:45:57', '2019-07-16 13:45:57'),
(644, 12, ' created a new directory entry for Manufacturer - Square D( Square D by Schneider Electric )', '2019-07-16 14:00:36', '2019-07-16 14:00:36'),
(645, 12, ' created a new part in the repository with id , and part # HOM115', '2019-07-16 14:01:47', '2019-07-16 14:01:47'),
(646, 12, ' created a new tag with name single_pole', '2019-07-16 14:03:17', '2019-07-16 14:03:17'),
(647, 12, ' moved tag with id 66 from type to type 6', '2019-07-16 14:03:30', '2019-07-16 14:03:30'),
(648, 12, ' created a new tag with name double_pole', '2019-07-16 14:03:48', '2019-07-16 14:03:48'),
(649, 12, ' moved tag with id 67 from type to type 6', '2019-07-16 14:03:53', '2019-07-16 14:03:53'),
(650, 12, ' created a new tag with name 15_amp', '2019-07-16 14:04:16', '2019-07-16 14:04:16'),
(651, 12, ' copied tag with id 68 from type to type 6', '2019-07-16 14:04:23', '2019-07-16 14:04:23'),
(652, 12, ' updated tags for part with id 165', '2019-07-16 14:04:38', '2019-07-16 14:04:38'),
(653, 12, ' updated tags for part with id 165', '2019-07-16 14:04:39', '2019-07-16 14:04:39'),
(654, 12, ' updated tags for part with id 165', '2019-07-16 14:04:40', '2019-07-16 14:04:40'),
(655, 12, ' updated tags for part with id 165', '2019-07-16 14:04:48', '2019-07-16 14:04:48'),
(656, 12, ' updated image for part with id 163', '2019-07-16 14:55:22', '2019-07-16 14:55:22'),
(657, 12, ' updated image for part with id 163', '2019-07-16 15:07:02', '2019-07-16 15:07:02'),
(658, 12, ' created a new part in the repository with id , and part # YL290P-35B', '2019-07-16 15:25:37', '2019-07-16 15:25:37'),
(659, 12, ' created a new part in the repository with id , and part # SN270P-10', '2019-07-16 15:27:48', '2019-07-16 15:27:48'),
(660, 12, ' created a new part in the repository with id , and part # SE270-KMC', '2019-07-16 15:29:46', '2019-07-16 15:29:46'),
(661, 12, ' created a new part in the repository with id , and part # SM-285PC8', '2019-07-16 15:32:10', '2019-07-16 15:32:10'),
(662, 12, ' created a new part in the repository with id , and part # SN325P-10', '2019-07-16 15:48:15', '2019-07-16 15:48:15'),
(663, 12, ' created a new part in the repository with id , and part # SN330P-10', '2019-07-16 15:51:16', '2019-07-16 15:51:16'),
(664, 12, ' created a new part in the repository with id , and part # IGPlusA7.5', '2019-07-16 15:54:39', '2019-07-16 15:54:39'),
(665, 12, ' created a new part in the repository with id , and part # IGPlusA3.8', '2019-07-16 15:55:23', '2019-07-16 15:55:23'),
(666, 12, ' created a new part in the repository with id , and part # SB5000US-11', '2019-07-16 15:56:02', '2019-07-16 15:56:02'),
(667, 12, ' updated stock for part with id 168', '2019-07-17 09:04:43', '2019-07-17 09:04:43'),
(668, 12, ' updated stock for part with id 169', '2019-07-17 09:05:14', '2019-07-17 09:05:14'),
(669, 12, ' updated stock for part with id 170', '2019-07-17 09:05:49', '2019-07-17 09:05:49'),
(670, 12, ' updated stock for part with id 171', '2019-07-17 10:10:04', '2019-07-17 10:10:04'),
(671, 12, ' created a new directory entry for Manufacturer - Burndy(  )', '2019-07-17 10:41:10', '2019-07-17 10:41:10'),
(672, 12, ' created a new directory entry for Manufacturer - COND(  )', '2019-07-17 10:41:33', '2019-07-17 10:41:33'),
(673, 12, ' created a new directory entry for Manufacturer - Eaton(  )', '2019-07-17 10:42:08', '2019-07-17 10:42:08'),
(674, 12, ' created a new directory entry for Manufacturer - FIT(  )', '2019-07-17 10:42:21', '2019-07-17 10:42:21'),
(675, 12, ' created a new directory entry for Utility - Leviton(  )', '2019-07-17 10:43:20', '2019-07-17 10:43:20'),
(676, 12, ' created a new directory entry for Manufacturer - Little Fuse(  )', '2019-07-17 10:43:39', '2019-07-17 10:43:39'),
(677, 12, ' created a new directory entry for Manufacturer - Milbank(  )', '2019-07-17 10:44:16', '2019-07-17 10:44:16'),
(678, 12, ' created a new directory entry for Manufacturer - Unirc(  )', '2019-07-17 10:44:41', '2019-07-17 10:44:41'),
(679, 12, ' created a new directory entry for Manufacturer - Wire(  )', '2019-07-17 10:44:57', '2019-07-17 10:44:57'),
(680, 12, ' created a new directory entry for Manufacturer - Flex(  )', '2019-07-17 10:45:20', '2019-07-17 10:45:20'),
(681, 12, ' created a new directory entry for Manufacturer - Heyco(  )', '2019-07-17 10:45:35', '2019-07-17 10:45:35'),
(682, 12, ' created a new directory entry for Manufacturer - Ideal Energy(  )', '2019-07-17 10:45:51', '2019-07-17 10:45:51'),
(683, 12, ' created a new directory entry for Manufacturer - PVC(  )', '2019-07-17 10:46:13', '2019-07-17 10:46:13'),
(684, 12, ' created a new part in the repository with id , and part # 302006D', '2019-07-17 11:13:52', '2019-07-17 11:13:52'),
(685, 12, ' updated repository part with id 175, and part # 302005D', '2019-07-17 11:14:22', '2019-07-17 11:14:22'),
(686, 12, ' created a new part in the repository with id , and part # 302006C', '2019-07-17 11:15:01', '2019-07-17 11:15:01'),
(687, 12, ' created a new part in the repository with id , and part # 302027D', '2019-07-17 11:16:10', '2019-07-17 11:16:10'),
(688, 12, ' created a new part in the repository with id , and part # 302021D', '2019-07-17 11:16:55', '2019-07-17 11:16:55'),
(689, 12, ' created a new part in the repository with id , and part # 302028C', '2019-07-17 11:17:48', '2019-07-17 11:17:48'),
(690, 12, ' created a new part in the repository with id , and part # 302022C', '2019-07-17 11:18:31', '2019-07-17 11:18:31'),
(691, 12, ' created a new part in the repository with id , and part # 302022D', '2019-07-17 11:19:21', '2019-07-17 11:19:21'),
(692, 12, ' created a new part in the repository with id , and part # 302023C', '2019-07-17 11:21:10', '2019-07-17 11:21:10'),
(693, 12, ' created a new part in the repository with id , and part # 302005C', '2019-07-17 11:22:10', '2019-07-17 11:22:10'),
(694, 12, ' created a new part in the repository with id , and part # 302029C', '2019-07-17 11:22:54', '2019-07-17 11:22:54'),
(695, 12, ' created a new part in the repository with id , and part # 302021C', '2019-07-17 11:24:08', '2019-07-17 11:24:08'),
(696, 12, ' created a new part in the repository with id , and part # 3120278C', '2019-07-17 11:25:20', '2019-07-17 11:25:20'),
(697, 12, ' created a new part in the repository with id , and part # 303018D', '2019-07-17 11:26:27', '2019-07-17 11:26:27'),
(698, 12, ' created a new part in the repository with id , and part # 304001D', '2019-07-17 11:28:05', '2019-07-17 11:28:05'),
(699, 12, ' created a new part in the repository with id , and part # 304011C', '2019-07-17 11:28:54', '2019-07-17 11:28:54'),
(700, 12, ' created a new part in the repository with id , and part # 302024C', '2019-07-17 11:31:47', '2019-07-17 11:31:47'),
(701, 12, ' created a new part in the repository with id , and part # 302024D', '2019-07-17 11:32:35', '2019-07-17 11:32:35'),
(702, 12, ' created a new part in the repository with id , and part # MB381', '2019-07-17 11:35:36', '2019-07-17 11:35:36'),
(703, 12, ' updated repository part with id 192, and part # MB381', '2019-07-17 11:36:07', '2019-07-17 11:36:07'),
(704, 12, ' created a new part in the repository with id , and part # MB141', '2019-07-17 11:38:06', '2019-07-17 11:38:06'),
(705, 12, ' updated directory information for Manufacturer - L. H. Dottie Company( L. H. Dottie Company )', '2019-07-17 14:25:22', '2019-07-17 14:25:22'),
(706, 12, ' created a new part in the repository with id , and part # LW38', '2019-07-17 14:26:16', '2019-07-17 14:26:16'),
(707, 12, ' created a new part in the repository with id , and part # HW14', '2019-07-17 14:27:13', '2019-07-17 14:27:13'),
(708, 12, ' created a new part in the repository with id , and part # LW14', '2019-07-17 14:28:09', '2019-07-17 14:28:09'),
(709, 12, ' created a new directory entry for Manufacturer - Simpson(  )', '2019-07-17 14:29:09', '2019-07-17 14:29:09'),
(710, 12, ' created a new part in the repository with id , and part # N8D5HDG', '2019-07-17 14:30:05', '2019-07-17 14:30:05'),
(711, 12, ' created a new directory entry for Manufacturer - Eco-Fasten Solar(  )', '2019-07-17 14:33:29', '2019-07-17 14:33:29'),
(712, 12, ' created a new part in the repository with id , and part # 578992', '2019-07-17 14:34:39', '2019-07-17 14:34:39'),
(713, 12, ' created a new directory entry for Manufacturer - Quick Mount PV(  )', '2019-07-17 14:35:17', '2019-07-17 14:35:17'),
(714, 12, ' created a new part in the repository with id , and part # 14C00299A', '2019-07-17 14:36:03', '2019-07-17 14:36:03'),
(715, 12, ' created a new part in the repository with id , and part # 302026C', '2019-07-17 14:38:05', '2019-07-17 14:38:05'),
(716, 12, ' created a new part in the repository with id , and part # 051415-000', '2019-07-17 14:39:18', '2019-07-17 14:39:18'),
(717, 12, ' created a new directory entry for Manufacturer - IronRidge(  )', '2019-07-17 14:40:05', '2019-07-17 14:40:05'),
(718, 12, ' updated repository part with id 186, and part # 3120278C', '2019-07-17 14:40:57', '2019-07-17 14:40:57'),
(719, 12, ' created a new part in the repository with id , and part # UFO-STP-40mm-REVC', '2019-07-17 14:41:42', '2019-07-17 14:41:42'),
(720, 12, ' updated repository part with id 202, and part # UFO-STP-40mm', '2019-07-17 14:42:35', '2019-07-17 14:42:35'),
(721, 12, ' created a new part in the repository with id , and part # GMB17I', '2019-07-17 14:43:49', '2019-07-17 14:43:49'),
(722, 12, ' created a new part in the repository with id , and part # 29-7001-002', '2019-07-17 14:44:52', '2019-07-17 14:44:52'),
(723, 12, ' created a new part in the repository with id , and part # UFOCL-001', '2019-07-17 14:47:11', '2019-07-17 14:47:11'),
(724, 12, ' created a new part in the repository with id , and part # 29-0200-HDW', '2019-07-17 14:47:54', '2019-07-17 14:47:54'),
(725, 12, ' created a new directory entry for Municipality - Grip Rite(  )', '2019-07-17 15:02:11', '2019-07-17 15:02:11'),
(726, 12, ' created a new directory entry for Municipality - Grip Rite(  )', '2019-07-17 15:03:06', '2019-07-17 15:03:06'),
(727, 12, ' created a new directory entry for Manufacturer - Grip Rite(  )', '2019-07-17 15:07:12', '2019-07-17 15:07:12'),
(728, 12, ' created a new part in the repository with id , and part # 78EGRFGI', '2019-07-17 15:08:12', '2019-07-17 15:08:12'),
(729, 12, ' created a new part in the repository with id , and part # 34EGFGI', '2019-07-17 15:09:06', '2019-07-17 15:09:06'),
(730, 12, ' created a new directory entry for Manufacturer - Fastener Center(  )', '2019-07-17 15:10:21', '2019-07-17 15:10:21'),
(731, 12, ' created a new directory entry for Manufacturer - Sammy\'s(  )', '2019-07-17 15:10:35', '2019-07-17 15:10:35'),
(732, 12, ' created a new directory entry for Manufacturer - Copper State(  )', '2019-07-17 15:10:55', '2019-07-17 15:10:55'),
(733, 12, ' created a new directory entry for Manufacturer - Powers(  )', '2019-07-17 15:11:13', '2019-07-17 15:11:13'),
(734, 12, ' created a new directory entry for Manufacturer - Penn Union(  )', '2019-07-17 15:11:33', '2019-07-17 15:11:33'),
(735, 12, ' created a new part in the repository with id , and part # 01018', '2019-07-17 15:13:53', '2019-07-17 15:13:53'),
(736, 12, ' created a new part in the repository with id , and part # 38S-SWG20', '2019-07-17 15:15:54', '2019-07-17 15:15:54'),
(737, 12, ' created a new part in the repository with id , and part # 15FW3-031', '2019-07-17 15:16:37', '2019-07-17 15:16:37'),
(738, 12, ' created a new part in the repository with id , and part # P00235347', '2019-07-17 15:17:33', '2019-07-17 15:17:33'),
(739, 12, ' created a new part in the repository with id , and part # P00333238', '2019-07-17 15:19:17', '2019-07-17 15:19:17'),
(740, 12, ' created a new part in the repository with id , and part # P00334670', '2019-07-17 15:20:18', '2019-07-17 15:20:18'),
(741, 12, ' created a new part in the repository with id , and part # 816003', '2019-07-17 15:21:07', '2019-07-17 15:21:07'),
(742, 12, ' created a new part in the repository with id , and part # 801057', '2019-07-17 15:21:52', '2019-07-17 15:21:52'),
(743, 12, ' created a new directory entry for Manufacturer - Bridgeport(  )', '2019-07-17 15:26:02', '2019-07-17 15:26:02'),
(744, 12, ' created a new directory entry for Manufacturer - Topaz(  )', '2019-07-17 15:26:19', '2019-07-17 15:26:19'),
(745, 12, ' created a new directory entry for Manufacturer - Madison Electrical(  )', '2019-07-17 15:26:40', '2019-07-17 15:26:40'),
(746, 12, ' created a new part in the repository with id , and part # 921-S', '2019-07-17 15:52:00', '2019-07-17 15:52:00'),
(747, 12, ' created a new part in the repository with id , and part # 642S', '2019-07-17 15:52:45', '2019-07-17 15:52:45'),
(748, 12, ' created a new directory entry for Manufacturer - Misc(  )', '2019-07-17 15:53:11', '2019-07-17 15:53:11'),
(749, 12, ' created a new part in the repository with id , and part # 82707B', '2019-07-17 15:53:57', '2019-07-17 15:53:57'),
(750, 12, ' created a new part in the repository with id , and part # LG-144-2-CB', '2019-07-17 15:54:49', '2019-07-17 15:54:49'),
(751, 12, ' created a new part in the repository with id , and part # MECR752B', '2019-07-17 15:55:30', '2019-07-17 15:55:30'),
(752, 12, ' updated repository part with id 220, and part # LG-144-2-CB', '2019-07-17 15:56:11', '2019-07-17 15:56:11'),
(753, 12, ' updated repository part with id 221, and part # MECR752B', '2019-07-17 15:56:35', '2019-07-17 15:56:35'),
(754, 12, ' created a new part in the repository with id , and part # 322', '2019-07-17 15:57:19', '2019-07-17 15:57:19'),
(755, 12, ' created a new part in the repository with id , and part # 1WBA', '2019-07-17 15:58:17', '2019-07-17 15:58:17'),
(756, 12, ' created a new part in the repository with id , and part # DS075H1', '2019-07-17 15:59:11', '2019-07-17 15:59:11'),
(757, 12, ' created a new part in the repository with id , and part # MECR762', '2019-07-17 16:00:33', '2019-07-17 16:00:33'),
(758, 12, ' created a new part in the repository with id , and part # 011', '2019-07-17 16:02:23', '2019-07-17 16:02:23'),
(759, 12, ' updated repository part with id 226, and part # 011', '2019-07-17 16:03:12', '2019-07-17 16:03:12'),
(760, 12, ' created a new directory entry for Manufacturer - B-Line(  )', '2019-07-17 16:03:36', '2019-07-17 16:03:36'),
(761, 12, ' created a new part in the repository with id , and part # 927', '2019-07-17 16:05:19', '2019-07-17 16:05:19'),
(762, 12, ' updated repository part with id 179, and part # 302028C', '2019-07-18 10:27:39', '2019-07-18 10:27:39'),
(763, 12, ' updated repository part with id 177, and part # 302027D', '2019-07-18 10:28:12', '2019-07-18 10:28:12'),
(764, 12, ' updated repository part with id 178, and part # 302021D', '2019-07-18 10:28:32', '2019-07-18 10:28:32'),
(765, 12, ' updated repository part with id 183, and part # 302005C', '2019-07-18 10:28:48', '2019-07-18 10:28:48'),
(766, 12, ' created a new part in the repository with id , and part # GF223NR', '2019-07-18 10:41:34', '2019-07-18 10:41:34'),
(767, 12, ' created a new part in the repository with id , and part # GF324N', '2019-07-18 10:43:59', '2019-07-18 10:43:59'),
(768, 12, ' created a new part in the repository with id , and part # HF364R', '2019-07-18 11:03:41', '2019-07-18 11:03:41'),
(769, 12, ' created a new part in the repository with id , and part # HNF362R', '2019-07-18 11:06:09', '2019-07-18 11:06:09'),
(770, 2, ' removed vendor with id 4 for part with id 158', '2019-07-18 15:14:52', '2019-07-18 15:14:52'),
(771, 12, ' created a new directory entry for Manufacturer - JA Solar(  )', '2019-07-18 15:46:42', '2019-07-18 15:46:42'),
(772, 12, ' created a new part in the repository with id , and part # JAP6-72-285', '2019-07-18 15:47:46', '2019-07-18 15:47:46'),
(773, 12, ' updated repository part with id 232, and part # JAP6-72-285', '2019-07-18 15:48:15', '2019-07-18 15:48:15'),
(774, 12, ' created a new directory entry for Manufacturer - Halex(  )', '2019-07-19 11:34:55', '2019-07-19 11:34:55'),
(775, 12, ' created a new directory entry for Manufacturer - PVC(  )', '2019-07-19 11:36:31', '2019-07-19 11:36:31'),
(776, 12, ' updated directory information for Manufacturer - Burndy( Burndy LLC )', '2019-07-19 11:38:39', '2019-07-19 11:38:39'),
(777, 12, ' updated directory information for Manufacturer - Huawei( Huawei Technologies Co. )', '2019-07-19 11:41:19', '2019-07-19 11:41:19'),
(778, 12, ' created a new part in the repository with id , and part # SUN2000-30KTL-US-PLC', '2019-07-19 12:05:32', '2019-07-19 12:05:32'),
(779, 12, ' created a new part in the repository with id , and part # 7000TL-US-22', '2019-07-19 12:08:33', '2019-07-19 12:08:33'),
(780, 2, ' created new user test with username tester and user id 13', '2019-08-26 15:03:21', '2019-08-26 15:03:21'),
(781, 2, ' created new user Benjamin Connick with username ben and user id 14', '2019-08-27 12:40:45', '2019-08-27 12:40:45'),
(782, 2, ' created new user Henry Ferrer with username henry and user id 15', '2019-08-27 12:42:14', '2019-08-27 12:42:14'),
(783, 2, ' created new user Juan Godinez with username juan and user id 16', '2019-08-27 12:43:46', '2019-08-27 12:43:46'),
(784, 2, ' created new user Ashton Harding with username ashton and user id 17', '2019-08-27 12:44:39', '2019-08-27 12:44:39'),
(785, 2, ' created new user Joaquin Hernandez with username joaquin and user id 18', '2019-08-27 12:46:06', '2019-08-27 12:46:06'),
(786, 2, ' created new user Jason Moore with username jason and user id 19', '2019-08-27 12:47:18', '2019-08-27 12:47:18'),
(787, 2, ' created new user Jairo Munoz with username jairo and user id 20', '2019-08-27 13:43:30', '2019-08-27 13:43:30'),
(788, 2, ' created new user Walter Penick with username walter and user id 21', '2019-08-27 13:44:44', '2019-08-27 13:44:44'),
(789, 2, ' created new user Miguel Penuelas with username miguel and user id 22', '2019-08-27 13:46:15', '2019-08-27 13:46:15'),
(790, 2, ' created new user Ramses Garcia with username ramses and user id 23', '2019-08-27 13:47:20', '2019-08-27 13:47:20'),
(791, 2, ' created new user Lorenzo Ramos with username lorenzo and user id 24', '2019-08-27 13:50:56', '2019-08-27 13:50:56'),
(792, 2, ' created new user Martin Rodriguez with username martin and user id 25', '2019-08-27 14:00:00', '2019-08-27 14:00:00'),
(793, 2, ' created new user Able Samaniego with username able and user id 26', '2019-08-27 14:01:08', '2019-08-27 14:01:08'),
(794, 2, ' created new user Anthony Tschudy with username anthony and user id 27', '2019-08-27 14:03:19', '2019-08-27 14:03:19'),
(795, 11, ' created new employee Rocio Alma Velasquez with id 8', '2019-08-30 11:34:18', '2019-08-30 11:34:18'),
(796, 2, ' updated user rosie with user id 11', '2019-08-30 11:40:45', '2019-08-30 11:40:45'),
(797, 2, ' updated directory information for Manufacturer - Leviton(  )', '2019-09-15 16:27:51', '2019-09-15 16:27:51'),
(798, 2, ' updated directory information for Manufacturer - Grip Rite(  )', '2019-09-15 16:28:02', '2019-09-15 16:28:02'),
(799, 2, ' updated directory information for Manufacturer - Grip Rite(  )', '2019-09-15 16:28:40', '2019-09-15 16:28:40'),
(800, 2, ' created a new directory entry for Supplier/Service - Test( Test )', '2019-09-15 16:31:54', '2019-09-15 16:31:54'),
(801, 2, ' added permissions for Administrator to manage View Employees Basic', '2019-09-15 17:22:11', '2019-09-15 17:22:11'),
(802, 2, ' removed permissions for Administrator to manage View Employees Basic', '2019-09-15 17:22:14', '2019-09-15 17:22:14'),
(803, 2, ' added permissions for Field Crew to manage View Employees Basic', '2019-09-15 17:22:19', '2019-09-15 17:22:19'),
(804, 2, ' added permissions for Administrator to manage View Employees Basic', '2019-09-15 17:22:20', '2019-09-15 17:22:20'),
(805, 2, ' added permissions for Field Lead to manage View Employees Basic', '2019-09-15 17:22:24', '2019-09-15 17:22:24'),
(806, 2, ' added permissions for Project Manager to manage View Employees Basic', '2019-09-15 17:22:26', '2019-09-15 17:22:26'),
(807, 2, ' added permissions for Executive to manage View Employees Basic', '2019-09-15 17:22:29', '2019-09-15 17:22:29'),
(808, 2, ' added permissions for Human Resources to manage View Employees Basic', '2019-09-15 17:22:31', '2019-09-15 17:22:31'),
(809, 2, ' added permissions for Executive to manage View Employee Basic Information', '2019-09-15 17:22:35', '2019-09-15 17:22:35'),
(810, 2, ' added permissions for Human Resources to manage View Employee Basic Information', '2019-09-15 17:22:38', '2019-09-15 17:22:38'),
(811, 2, ' added permissions for Human Resources to manage View Employee Sensitive', '2019-09-15 17:22:42', '2019-09-15 17:22:42'),
(812, 2, ' added permissions for Executive to manage View Employee Sensitive', '2019-09-15 17:22:47', '2019-09-15 17:22:47'),
(813, 2, ' added permissions for Human Resources to manage View Employee Admin', '2019-09-15 17:22:53', '2019-09-15 17:22:53'),
(814, 2, ' added permissions for Human Resources to manage Create Employee', '2019-09-15 17:23:01', '2019-09-15 17:23:01'),
(815, 2, ' added permissions for Human Resources to manage Edit Employee', '2019-09-15 17:23:05', '2019-09-15 17:23:05'),
(816, 2, ' added permissions for Internal to manage View Directory', '2019-09-15 17:23:12', '2019-09-15 17:23:12'),
(817, 2, ' added permissions for Internal to manage Create Directory Company', '2019-09-15 17:23:15', '2019-09-15 17:23:15'),
(818, 2, ' added permissions for Internal to manage Edit Directory Company', '2019-09-15 17:23:17', '2019-09-15 17:23:17'),
(819, 2, ' added permissions for Internal to manage View Employees Basic', '2019-09-15 17:23:31', '2019-09-15 17:23:31'),
(820, 2, ' removed permissions for Field Crew to manage View Employees Basic', '2019-09-15 17:23:35', '2019-09-15 17:23:35'),
(821, 2, ' added permissions for Field Lead to manage View Employee Basic Information', '2019-09-15 17:23:40', '2019-09-15 17:23:40'),
(822, 2, ' removed permissions for Project Manager to manage View Employees Basic', '2019-09-15 17:23:45', '2019-09-15 17:23:45'),
(823, 2, ' added permissions for Safety to manage View Employee Basic Information', '2019-09-15 17:23:56', '2019-09-15 17:23:56'),
(824, 2, ' added permissions for Safety to manage View Safety Programs', '2019-09-15 17:24:19', '2019-09-15 17:24:19'),
(825, 2, ' added permissions for Safety to manage View Training Courses, Results and Certs', '2019-09-15 17:24:23', '2019-09-15 17:24:23'),
(826, 2, ' added permissions for Safety to manage Create, Edit and Assign Training Courses', '2019-09-15 17:24:25', '2019-09-15 17:24:25'),
(827, 2, ' added permissions for Safety to manage Take Training Course', '2019-09-15 17:24:29', '2019-09-15 17:24:29'),
(828, 2, ' added permissions for Internal to manage Take Training Course', '2019-09-15 17:24:33', '2019-09-15 17:24:33'),
(829, 2, ' removed permissions for Safety to manage Take Training Course', '2019-09-15 17:24:36', '2019-09-15 17:24:36'),
(830, 2, ' added permissions for Safety to manage View Audits and Audit Results', '2019-09-15 17:24:40', '2019-09-15 17:24:40'),
(831, 2, ' added permissions for Safety to manage Create, Edit and Assign Audits', '2019-09-15 17:24:42', '2019-09-15 17:24:42'),
(832, 2, ' added permissions for Safety to manage Complete and Log Audits', '2019-09-15 17:24:45', '2019-09-15 17:24:45'),
(833, 2, ' added permissions for Safety to manage View Job Hazard Analyses (JHAs) and Reports', '2019-09-15 17:24:48', '2019-09-15 17:24:48'),
(834, 2, ' added permissions for Safety to manage Create and Edit Job Hazard Analyses (JHAs)', '2019-09-15 17:24:50', '2019-09-15 17:24:50'),
(835, 2, ' added permissions for Safety to manage Complete and Log Job Hazard Analyses (JHAs)', '2019-09-15 17:24:53', '2019-09-15 17:24:53'),
(836, 2, ' added permissions for Safety to manage View Incident Reports', '2019-09-15 17:24:55', '2019-09-15 17:24:55'),
(837, 2, ' added permissions for Safety to manage Create and Edit Incident Reports', '2019-09-15 17:24:58', '2019-09-15 17:24:58'),
(838, 2, ' added permissions for Safety to manage Complete Incident Reports', '2019-09-15 17:25:00', '2019-09-15 17:25:00'),
(839, 2, ' added permissions for Contracts to manage View Project Leads', '2019-09-15 17:25:07', '2019-09-15 17:25:07'),
(840, 2, ' added permissions for Contracts to manage Create Project Leads', '2019-09-15 17:25:10', '2019-09-15 17:25:10'),
(841, 2, ' added permissions for Contracts to manage Edit Project Leads', '2019-09-15 17:25:12', '2019-09-15 17:25:12'),
(842, 2, ' added permissions for Sales to manage View Project Leads', '2019-09-15 17:25:23', '2019-09-15 17:25:23'),
(843, 2, ' added permissions for Sales to manage Create Project Leads', '2019-09-15 17:25:26', '2019-09-15 17:25:26'),
(844, 2, ' added permissions for Inventories to manage View Inventory', '2019-09-15 17:25:37', '2019-09-15 17:25:37'),
(845, 2, ' added permissions for Inventories to manage Create Inventory', '2019-09-15 17:25:42', '2019-09-15 17:25:42'),
(846, 2, ' added permissions for Inventories to manage Edit Inventory', '2019-09-15 17:25:44', '2019-09-15 17:25:44'),
(847, 2, ' added permissions for Inventories to manage View Inventory Pulls', '2019-09-15 17:25:48', '2019-09-15 17:25:48'),
(848, 2, ' added permissions for Inventories to manage Create Inventory Pulls', '2019-09-15 17:25:51', '2019-09-15 17:25:51'),
(849, 2, ' added permissions for Inventories to manage Edit Inventory Pulls', '2019-09-15 17:25:53', '2019-09-15 17:25:53'),
(850, 2, ' added permissions for Inventories to manage Receive Inventory', '2019-09-15 17:25:56', '2019-09-15 17:25:56'),
(851, 2, ' added permissions for Inventories to manage View Inventory Order', '2019-09-15 17:25:58', '2019-09-15 17:25:58'),
(852, 2, ' added permissions for Inventories to manage Create Inventory Order', '2019-09-15 17:26:01', '2019-09-15 17:26:01'),
(853, 2, ' added permissions for Inventories to manage Edit Inventory Order', '2019-09-15 17:26:03', '2019-09-15 17:26:03'),
(854, 2, ' added permissions for Inventories to manage View Parts Repository', '2019-09-15 17:30:59', '2019-09-15 17:30:59'),
(855, 2, ' added permissions for Inventories to manage Create Parts Repository', '2019-09-15 17:31:00', '2019-09-15 17:31:00'),
(856, 2, ' added permissions for Inventories to manage Edit Parts Repository', '2019-09-15 17:31:02', '2019-09-15 17:31:02'),
(857, 2, ' added permissions for Inventories to manage Administrate Repository', '2019-09-15 17:31:04', '2019-09-15 17:31:04'),
(858, 2, ' added permissions for Contracts to manage View Projects', '2019-09-15 17:31:12', '2019-09-15 17:31:12'),
(859, 2, ' added permissions for Contracts to manage Edit Projects', '2019-09-15 17:31:14', '2019-09-15 17:31:14'),
(860, 2, ' added permissions for Contracts to manage View Archived Projects', '2019-09-15 17:31:16', '2019-09-15 17:31:16'),
(861, 2, ' removed permissions for Field Lead to manage View Employees Basic', '2019-09-15 17:31:43', '2019-09-15 17:31:43'),
(862, 2, ' removed permissions for Executive to manage View Employees Basic', '2019-09-15 17:31:46', '2019-09-15 17:31:46'),
(863, 2, ' removed permissions for Human Resources to manage View Employees Basic', '2019-09-15 17:31:49', '2019-09-15 17:31:49'),
(864, 2, ' removed permissions for Administrator to manage View Employees Basic', '2019-09-15 17:31:51', '2019-09-15 17:31:51'),
(865, 2, ' added permissions for Contracts to manage Manage Directory Company', '2019-09-15 17:32:05', '2019-09-15 17:32:05'),
(866, 2, ' added permissions for Inventories to manage Manage Directory Company', '2019-09-15 17:32:07', '2019-09-15 17:32:07'),
(867, 2, ' added permissions for Executive to manage Manage Directory Company', '2019-09-15 17:32:10', '2019-09-15 17:32:10'),
(868, 2, ' added permissions for Project Manager to manage Manage Directory Company', '2019-09-15 17:32:15', '2019-09-15 17:32:15'),
(869, 2, ' added permissions for Administrator to manage Manage Directory Company', '2019-09-15 17:32:22', '2019-09-15 17:32:22'),
(870, 1, ' added new dashboard module Mashed Potatoes', '2019-09-16 10:45:11', '2019-09-16 10:45:11'),
(871, 1, ' removed dashboard module My Tasks', '2019-09-16 10:48:30', '2019-09-16 10:48:30'),
(872, 1, ' added new dashboard module Mashed Potatoes', '2019-09-16 10:48:36', '2019-09-16 10:48:36'),
(873, 1, ' removed dashboard module My Tasks', '2019-09-16 10:48:46', '2019-09-16 10:48:46'),
(874, 11, ' added new dashboard module Mashed Potatoes', '2019-09-16 10:50:17', '2019-09-16 10:50:17'),
(875, 1, ' added new dashboard module ERP Updates', '2019-09-16 20:23:50', '2019-09-16 20:23:50'),
(876, 14, ' added new dashboard module My Tasks', '2019-09-17 09:36:54', '2019-09-17 09:36:54'),
(877, 14, ' added new dashboard module ERP Updates', '2019-09-17 09:37:16', '2019-09-17 09:37:16'),
(878, 1, ' updated user ben with user id 14', '2019-09-17 09:39:25', '2019-09-17 09:39:25'),
(879, 14, ' updated repository part with id 168, and part # SF270-KMC', '2019-09-17 09:46:00', '2019-09-17 09:46:00'),
(880, 14, ' created a new part in the repository with id , and part # D230', '2019-09-17 09:53:14', '2019-09-17 09:53:14'),
(881, 14, ' updated image for part with id 235', '2019-09-17 10:00:54', '2019-09-17 10:00:54'),
(882, 14, ' updated image for part with id 235', '2019-09-17 10:01:26', '2019-09-17 10:01:26'),
(883, 1, ' created new user Jennifer Griffin with username jen and user id 28', '2019-09-17 10:13:40', '2019-09-17 10:13:40'),
(884, 1, ' created new user Glenn Williams with username glenn and user id 29', '2019-09-17 10:16:20', '2019-09-17 10:16:20'),
(885, 1, ' added permissions for Sales Manager to manage View Project Leads', '2019-09-17 19:02:42', '2019-09-17 19:02:42'),
(886, 1, ' added permissions for Sales Manager to manage Create Project Leads', '2019-09-17 19:02:44', '2019-09-17 19:02:44'),
(887, 1, ' added permissions for Sales Manager to manage Edit Project Leads', '2019-09-17 19:02:45', '2019-09-17 19:02:45'),
(888, 1, ' added permissions for Sales Manager to manage View Projects', '2019-09-17 19:02:50', '2019-09-17 19:02:50'),
(889, 1, ' added permissions for Sales Manager to manage Edit Projects', '2019-09-17 19:02:52', '2019-09-17 19:02:52'),
(890, 1, ' added permissions for Sales Manager to manage View Archived Projects', '2019-09-17 19:02:55', '2019-09-17 19:02:55'),
(891, 1, ' added permissions for Executive to manage Edit Projects', '2019-09-17 19:03:03', '2019-09-17 19:03:03'),
(892, 1, ' added permissions for Contracts to manage View Projects', '2019-09-17 19:03:12', '2019-09-17 19:03:12'),
(893, 1, ' added permissions for Contracts to manage Edit Projects', '2019-09-17 19:03:14', '2019-09-17 19:03:14'),
(894, 1, ' added permissions for Contracts to manage View Archived Projects', '2019-09-17 19:03:15', '2019-09-17 19:03:15'),
(895, 1, ' added permissions for Contracts to manage View Project Leads', '2019-09-17 19:03:21', '2019-09-17 19:03:21'),
(896, 1, ' added permissions for Contracts to manage Create Project Leads', '2019-09-17 19:03:23', '2019-09-17 19:03:23'),
(897, 1, ' added permissions for Contracts to manage Edit Project Leads', '2019-09-17 19:03:24', '2019-09-17 19:03:24'),
(898, 1, ' added permissions for Executive to manage Create Project Leads', '2019-09-17 19:03:29', '2019-09-17 19:03:29'),
(899, 1, ' added permissions for Executive to manage Edit Project Leads', '2019-09-17 19:03:32', '2019-09-17 19:03:32'),
(900, 1, ' added permissions for Sales to manage View Projects', '2019-09-17 19:04:19', '2019-09-17 19:04:19'),
(901, 1, ' added permissions for Sales to manage View Archived Projects', '2019-09-17 19:04:23', '2019-09-17 19:04:23'),
(902, 1, ' added permissions for Sales to manage View Project Leads', '2019-09-17 19:04:28', '2019-09-17 19:04:28'),
(903, 1, ' added permissions for Sales to manage Create Project Leads', '2019-09-17 19:04:30', '2019-09-17 19:04:30'),
(904, 1, ' added permissions for Sales to manage Edit Project Leads', '2019-09-17 19:04:36', '2019-09-17 19:04:36'),
(905, 12, ' created a new directory entry for Manufacturer - 3M( 3M )', '2019-09-23 10:05:20', '2019-09-23 10:05:20'),
(906, 12, ' created a new directory entry for Utility - Arlington( Arlington Industries, INC )', '2019-09-23 10:07:53', '2019-09-23 10:07:53'),
(907, 12, ' updated directory information for Manufacturer - Arlington( Arlington Industries, INC )', '2019-09-23 10:08:01', '2019-09-23 10:08:01'),
(908, 12, ' created a new directory entry for Manufacturer - Schneider Electric Solar - Conext( Schneider Electric Solar )', '2019-09-23 10:11:07', '2019-09-23 10:11:07'),
(909, 12, ' created a new directory entry for Manufacturer - APPLETON( APPLETON ELECTRICAL )', '2019-09-23 10:14:05', '2019-09-23 10:14:05'),
(910, 14, ' created a new part in the repository with id , and part # 1700C-WHITE', '2019-09-23 10:21:55', '2019-09-23 10:21:55'),
(911, 14, ' created a new type with name Consumables', '2019-09-23 10:22:28', '2019-09-23 10:22:28'),
(912, 14, ' created a new part in the repository with id , and part # 1700C-YELLOW', '2019-09-23 10:25:24', '2019-09-23 10:25:24'),
(913, 14, ' created a new part in the repository with id , and part # ITCSN3000-48', '2019-09-23 10:27:48', '2019-09-23 10:27:48');
INSERT INTO `activities` (`id`, `user_id`, `activity`, `updated_at`, `created_at`) VALUES
(914, 14, ' created a new part in the repository with id , and part # 4SDEK', '2019-09-23 10:31:40', '2019-09-23 10:31:40'),
(915, 14, ' created a new part in the repository with id , and part # 4SES', '2019-09-23 10:34:00', '2019-09-23 10:34:00'),
(916, 1, ' updated image for part with id 164', '2019-09-23 10:35:30', '2019-09-23 10:35:30'),
(917, 1, ' updated image for part with id 165', '2019-09-23 10:36:45', '2019-09-23 10:36:45'),
(918, 14, ' created a new part in the repository with id , and part # STB100', '2019-09-23 10:36:46', '2019-09-23 10:36:46'),
(919, 14, ' created a new part in the repository with id , and part # STB125', '2019-09-23 10:37:51', '2019-09-23 10:37:51'),
(920, 14, ' created a new part in the repository with id , and part # STB150', '2019-09-23 10:38:51', '2019-09-23 10:38:51'),
(921, 14, ' created a new part in the repository with id , and part # STB50', '2019-09-23 10:39:48', '2019-09-23 10:39:48'),
(922, 14, ' created a new part in the repository with id , and part # STB90100', '2019-09-23 10:40:39', '2019-09-23 10:40:39'),
(923, 14, ' created a new part in the repository with id , and part # 38AST', '2019-09-23 10:41:37', '2019-09-23 10:41:37'),
(924, 14, ' created a new part in the repository with id , and part # NMSC9075', '2019-09-23 10:43:16', '2019-09-23 10:43:16'),
(925, 14, ' created a new part in the repository with id , and part # NMSC50', '2019-09-23 10:44:43', '2019-09-23 10:44:43'),
(926, 14, ' created a new part in the repository with id , and part # G5', '2019-09-23 10:51:03', '2019-09-23 10:51:03'),
(927, 14, ' created a new part in the repository with id , and part # 1025', '2019-09-23 10:53:21', '2019-09-23 10:53:21'),
(928, 14, ' created a new part in the repository with id , and part # 1045', '2019-09-23 10:55:16', '2019-09-23 10:55:16'),
(929, 14, ' created a new part in the repository with id , and part # 1055', '2019-09-23 10:56:36', '2019-09-23 10:56:36'),
(930, 14, ' created a new part in the repository with id , and part # 1066', '2019-09-23 10:57:26', '2019-09-23 10:57:26'),
(931, 14, ' created a new part in the repository with id , and part # 1065', '2019-09-23 10:58:46', '2019-09-23 10:58:46'),
(932, 14, ' created a new part in the repository with id , and part # 1070', '2019-09-23 10:59:30', '2019-09-23 10:59:30'),
(933, 12, ' created a new part in the repository with id , and part # 0WBA', '2019-09-23 10:59:33', '2019-09-23 10:59:33'),
(934, 12, ' updated repository part with id 200, and part # 302026C', '2019-09-23 11:00:23', '2019-09-23 11:00:23'),
(935, 14, ' created a new part in the repository with id , and part # 1075', '2019-09-23 11:01:00', '2019-09-23 11:01:00'),
(936, 14, ' created a new part in the repository with id , and part # 1081', '2019-09-23 11:01:57', '2019-09-23 11:01:57'),
(937, 14, ' created a new part in the repository with id , and part # 1087', '2019-09-23 11:03:16', '2019-09-23 11:03:16'),
(938, 1, ' updated image for part with id 166', '2019-09-23 11:05:24', '2019-09-23 11:05:24'),
(939, 14, ' created a new part in the repository with id , and part # 1105', '2019-09-23 11:07:02', '2019-09-23 11:07:02'),
(940, 1, ' updated image for part with id 167', '2019-09-23 11:07:12', '2019-09-23 11:07:12'),
(941, 14, ' created a new part in the repository with id , and part # 1161', '2019-09-23 11:08:02', '2019-09-23 11:08:02'),
(942, 14, ' created a new part in the repository with id , and part # 1170', '2019-09-23 11:09:00', '2019-09-23 11:09:00'),
(943, 14, ' created a new part in the repository with id , and part # 1175', '2019-09-23 11:13:07', '2019-09-23 11:13:07'),
(944, 1, ' updated image for part with id 168', '2019-09-23 11:13:13', '2019-09-23 11:13:13'),
(945, 14, ' created a new part in the repository with id , and part # 144', '2019-09-23 11:14:07', '2019-09-23 11:14:07'),
(946, 14, ' created a new part in the repository with id , and part # 145', '2019-09-23 11:15:15', '2019-09-23 11:15:15'),
(947, 14, ' created a new part in the repository with id , and part # 146', '2019-09-23 11:16:38', '2019-09-23 11:16:38'),
(948, 1, ' updated image for part with id 169', '2019-09-23 11:17:25', '2019-09-23 11:17:25'),
(949, 14, ' created a new part in the repository with id , and part # 150', '2019-09-23 11:17:56', '2019-09-23 11:17:56'),
(950, 1, ' updated image for part with id 169', '2019-09-23 11:18:09', '2019-09-23 11:18:09'),
(951, 14, ' created a new part in the repository with id , and part # 151DC', '2019-09-23 11:18:59', '2019-09-23 11:18:59'),
(952, 1, ' updated image for part with id 170', '2019-09-23 11:19:18', '2019-09-23 11:19:18'),
(953, 1, ' updated image for part with id 171', '2019-09-23 11:19:36', '2019-09-23 11:19:36'),
(954, 14, ' created a new part in the repository with id , and part # 152DC', '2019-09-23 11:19:48', '2019-09-23 11:19:48'),
(955, 1, ' updated image for part with id 172', '2019-09-23 11:20:37', '2019-09-23 11:20:37'),
(956, 14, ' created a new part in the repository with id , and part # 1523DC', '2019-09-23 11:20:39', '2019-09-23 11:20:39'),
(957, 14, ' created a new part in the repository with id , and part # 153DC', '2019-09-23 11:21:21', '2019-09-23 11:21:21'),
(958, 1, ' updated image for part with id 173', '2019-09-23 11:21:26', '2019-09-23 11:21:26'),
(959, 14, ' created a new part in the repository with id , and part # 154DC', '2019-09-23 11:22:18', '2019-09-23 11:22:18'),
(960, 1, ' updated image for part with id 174', '2019-09-23 11:22:40', '2019-09-23 11:22:40'),
(961, 14, ' created a new part in the repository with id , and part # 155DC', '2019-09-23 11:23:04', '2019-09-23 11:23:04'),
(962, 1, ' updated image for part with id 175', '2019-09-23 11:25:17', '2019-09-23 11:25:17'),
(963, 1, ' updated image for part with id 176', '2019-09-23 11:26:11', '2019-09-23 11:26:11'),
(964, 14, ' created a new part in the repository with id , and part # 160C', '2019-09-23 11:27:11', '2019-09-23 11:27:11'),
(965, 1, ' updated image for part with id 175', '2019-09-23 11:28:37', '2019-09-23 11:28:37'),
(966, 1, ' updated image for part with id 177', '2019-09-23 11:29:14', '2019-09-23 11:29:14'),
(967, 14, ' created a new part in the repository with id , and part # 1907', '2019-09-23 11:31:46', '2019-09-23 11:31:46'),
(968, 12, ' created a new part in the repository with id , and part # 164', '2019-09-23 11:33:33', '2019-09-23 11:33:33'),
(969, 1, ' updated image for part with id 177', '2019-09-23 11:33:35', '2019-09-23 11:33:35'),
(970, 1, ' updated repository part with id 177, and part # 302027D', '2019-09-23 11:33:50', '2019-09-23 11:33:50'),
(971, 1, ' updated image for part with id 178', '2019-09-23 11:34:33', '2019-09-23 11:34:33'),
(972, 14, ' created a new part in the repository with id , and part # 2100', '2019-09-23 11:35:31', '2019-09-23 11:35:31'),
(973, 1, ' updated image for part with id 179', '2019-09-23 11:35:40', '2019-09-23 11:35:40'),
(974, 1, ' updated repository part with id 179, and part # 302028C', '2019-09-23 11:36:24', '2019-09-23 11:36:24'),
(975, 14, ' created a new part in the repository with id , and part # 2110', '2019-09-23 11:36:24', '2019-09-23 11:36:24'),
(976, 1, ' updated image for part with id 180', '2019-09-23 11:37:01', '2019-09-23 11:37:01'),
(977, 14, ' created a new part in the repository with id , and part # 2120', '2019-09-23 11:37:19', '2019-09-23 11:37:19'),
(978, 1, ' updated image for part with id 180', '2019-09-23 11:37:25', '2019-09-23 11:37:25'),
(979, 1, ' updated image for part with id 181', '2019-09-23 11:37:55', '2019-09-23 11:37:55'),
(980, 14, ' created a new part in the repository with id , and part # 2150', '2019-09-23 11:38:10', '2019-09-23 11:38:10'),
(981, 1, ' updated image for part with id 182', '2019-09-23 11:38:30', '2019-09-23 11:38:30'),
(982, 1, ' updated image for part with id 183', '2019-09-23 11:38:56', '2019-09-23 11:38:56'),
(983, 14, ' created a new part in the repository with id , and part # 250SRTI', '2019-09-23 11:39:14', '2019-09-23 11:39:14'),
(984, 1, ' updated repository part with id 184, and part # 302029C', '2019-09-23 11:39:24', '2019-09-23 11:39:24'),
(985, 1, ' updated image for part with id 184', '2019-09-23 11:40:12', '2019-09-23 11:40:12'),
(986, 14, ' created a new part in the repository with id , and part # 251SRTI', '2019-09-23 11:40:14', '2019-09-23 11:40:14'),
(987, 1, ' updated image for part with id 185', '2019-09-23 11:40:40', '2019-09-23 11:40:40'),
(988, 14, ' created a new part in the repository with id , and part # 253SRTI', '2019-09-23 11:41:34', '2019-09-23 11:41:34'),
(989, 1, ' updated repository part with id 186, and part # 302027C', '2019-09-23 11:42:02', '2019-09-23 11:42:02'),
(990, 1, ' updated image for part with id 186', '2019-09-23 11:42:21', '2019-09-23 11:42:21'),
(991, 1, ' updated image for part with id 186', '2019-09-23 11:43:21', '2019-09-23 11:43:21'),
(992, 14, ' created a new part in the repository with id , and part # 254SRTI', '2019-09-23 11:44:02', '2019-09-23 11:44:02'),
(993, 1, ' updated image for part with id 188', '2019-09-23 11:44:21', '2019-09-23 11:44:21'),
(994, 1, ' updated repository part with id 189, and part # 304001C', '2019-09-23 11:44:57', '2019-09-23 11:44:57'),
(995, 14, ' updated stock for part with id 283', '2019-09-23 11:46:16', '2019-09-23 11:46:16'),
(996, 14, ' created a new part in the repository with id , and part # 255SRTI', '2019-09-23 11:48:33', '2019-09-23 11:48:33'),
(997, 14, ' created a new part in the repository with id , and part # 256SRTI', '2019-09-23 11:49:50', '2019-09-23 11:49:50'),
(998, 1, ' updated image for part with id 189', '2019-09-23 11:50:17', '2019-09-23 11:50:17'),
(999, 1, ' updated image for part with id 190', '2019-09-23 11:53:59', '2019-09-23 11:53:59'),
(1000, 14, ' created a new part in the repository with id , and part # 257SRTI', '2019-09-23 11:54:17', '2019-09-23 11:54:17'),
(1001, 1, ' updated repository part with id 191, and part # 302024D', '2019-09-23 11:54:32', '2019-09-23 11:54:32'),
(1002, 1, ' updated image for part with id 181', '2019-09-23 11:55:11', '2019-09-23 11:55:11'),
(1003, 14, ' created a new part in the repository with id , and part # 259SRTI', '2019-09-23 11:55:12', '2019-09-23 11:55:12'),
(1004, 1, ' updated image for part with id 180', '2019-09-23 11:55:46', '2019-09-23 11:55:46'),
(1005, 1, ' updated image for part with id 187', '2019-09-23 11:56:22', '2019-09-23 11:56:22'),
(1006, 14, ' updated stock for part with id 288', '2019-09-23 11:56:26', '2019-09-23 11:56:26'),
(1007, 1, ' updated image for part with id 186', '2019-09-23 11:56:40', '2019-09-23 11:56:40'),
(1008, 1, ' updated repository part with id 190, and part # 302024C', '2019-09-23 11:57:08', '2019-09-23 11:57:08'),
(1009, 1, ' updated image for part with id 191', '2019-09-23 11:57:26', '2019-09-23 11:57:26'),
(1010, 14, ' created a new part in the repository with id , and part # 260SRTI', '2019-09-23 11:57:58', '2019-09-23 11:57:58'),
(1011, 14, ' created a new part in the repository with id , and part # 261SRTI', '2019-09-23 11:58:39', '2019-09-23 11:58:39'),
(1012, 1, ' updated image for part with id 192', '2019-09-23 11:59:14', '2019-09-23 11:59:14'),
(1013, 14, ' created a new part in the repository with id , and part # 262SRTI', '2019-09-23 11:59:26', '2019-09-23 11:59:26'),
(1014, 1, ' updated image for part with id 192', '2019-09-23 12:00:12', '2019-09-23 12:00:12'),
(1015, 14, ' created a new part in the repository with id , and part # 263SRTI', '2019-09-23 12:00:39', '2019-09-23 12:00:39'),
(1016, 1, ' updated image for part with id 192', '2019-09-23 12:00:49', '2019-09-23 12:00:49'),
(1017, 1, ' updated image for part with id 193', '2019-09-23 12:01:03', '2019-09-23 12:01:03'),
(1018, 1, ' updated image for part with id 194', '2019-09-23 12:01:29', '2019-09-23 12:01:29'),
(1019, 14, ' created a new part in the repository with id , and part # 264SRTI', '2019-09-23 12:01:31', '2019-09-23 12:01:31'),
(1020, 14, ' created a new part in the repository with id , and part # 266SRTI', '2019-09-23 12:02:16', '2019-09-23 12:02:16'),
(1021, 1, ' updated image for part with id 195', '2019-09-23 12:02:45', '2019-09-23 12:02:45'),
(1022, 1, ' updated image for part with id 196', '2019-09-23 12:04:06', '2019-09-23 12:04:06'),
(1023, 1, ' updated image for part with id 197', '2019-09-23 12:05:05', '2019-09-23 12:05:05'),
(1024, 14, ' created a new part in the repository with id , and part # 267SRT', '2019-09-23 12:05:41', '2019-09-23 12:05:41'),
(1025, 14, ' created a new part in the repository with id , and part # 267RT', '2019-09-23 12:06:30', '2019-09-23 12:06:30'),
(1026, 14, ' created a new part in the repository with id , and part # 269', '2019-09-23 12:08:41', '2019-09-23 12:08:41'),
(1027, 14, ' created a new part in the repository with id , and part # 321', '2019-09-23 12:09:42', '2019-09-23 12:09:42'),
(1028, 14, ' created a new part in the repository with id , and part # 324', '2019-09-23 12:11:10', '2019-09-23 12:11:10'),
(1029, 14, ' created a new part in the repository with id , and part # 325', '2019-09-23 12:11:46', '2019-09-23 12:11:46'),
(1030, 14, ' created a new part in the repository with id , and part # 330', '2019-09-23 12:12:32', '2019-09-23 12:12:32'),
(1031, 1, ' updated image for part with id 200', '2019-09-23 12:13:00', '2019-09-23 12:13:00'),
(1032, 14, ' created a new part in the repository with id , and part # 382DC', '2019-09-23 12:13:22', '2019-09-23 12:13:22'),
(1033, 1, ' updated repository part with id 201, and part # 307115M', '2019-09-23 12:14:08', '2019-09-23 12:14:08'),
(1034, 14, ' created a new part in the repository with id , and part # 384DC', '2019-09-23 12:14:09', '2019-09-23 12:14:09'),
(1035, 14, ' created a new part in the repository with id , and part # 385DC', '2019-09-23 12:14:51', '2019-09-23 12:14:51'),
(1036, 14, ' created a new part in the repository with id , and part # 386DC', '2019-09-23 12:15:48', '2019-09-23 12:15:48'),
(1037, 1, ' updated image for part with id 201', '2019-09-23 12:16:09', '2019-09-23 12:16:09'),
(1038, 14, ' created a new part in the repository with id , and part # 387DC', '2019-09-23 12:16:22', '2019-09-23 12:16:22'),
(1039, 14, ' created a new part in the repository with id , and part # 388DC', '2019-09-23 12:17:04', '2019-09-23 12:17:04'),
(1040, 14, ' created a new part in the repository with id , and part # 390DC', '2019-09-23 12:17:41', '2019-09-23 12:17:41'),
(1041, 1, ' updated image for part with id 202', '2019-09-23 12:17:45', '2019-09-23 12:17:45'),
(1042, 14, ' created a new part in the repository with id , and part # 414DC2', '2019-09-23 12:18:57', '2019-09-23 12:18:57'),
(1043, 1, ' updated repository part with id 203, and part # XR-1000-SPLC-M1', '2019-09-23 12:19:01', '2019-09-23 12:19:01'),
(1044, 14, ' created a new part in the repository with id , and part # 416DC2', '2019-09-23 12:19:33', '2019-09-23 12:19:33'),
(1045, 1, ' updated image for part with id 203', '2019-09-23 12:20:16', '2019-09-23 12:20:16'),
(1046, 14, ' created a new part in the repository with id , and part # 432SLTI', '2019-09-23 12:21:01', '2019-09-23 12:21:01'),
(1047, 1, ' updated repository part with id 204, and part # 29-7001-002', '2019-09-23 12:21:40', '2019-09-23 12:21:40'),
(1048, 1, ' updated image for part with id 204', '2019-09-23 12:22:16', '2019-09-23 12:22:16'),
(1049, 14, ' created a new part in the repository with id , and part # 434SLTI', '2019-09-23 12:22:24', '2019-09-23 12:22:24'),
(1050, 1, ' updated image for part with id 205', '2019-09-23 12:23:17', '2019-09-23 12:23:17'),
(1051, 14, ' created a new part in the repository with id , and part # 472SLTI', '2019-09-23 12:23:26', '2019-09-23 12:23:26'),
(1052, 14, ' created a new part in the repository with id , and part # 907S', '2019-09-23 12:24:01', '2019-09-23 12:24:01'),
(1053, 14, ' created a new part in the repository with id , and part # 9215', '2019-09-23 12:24:53', '2019-09-23 12:24:53'),
(1054, 14, ' created a new part in the repository with id , and part # 9225', '2019-09-23 12:26:05', '2019-09-23 12:26:05'),
(1055, 1, ' updated repository part with id 205, and part # UFO-CL-001', '2019-09-23 12:26:22', '2019-09-23 12:26:22'),
(1056, 1, ' updated repository part with id 202, and part # UFO-STP-40MM', '2019-09-23 12:26:41', '2019-09-23 12:26:41'),
(1057, 14, ' created a new part in the repository with id , and part # 923S', '2019-09-23 12:27:38', '2019-09-23 12:27:38'),
(1058, 14, ' updated repository part with id 316, and part # 922S', '2019-09-23 12:28:15', '2019-09-23 12:28:15'),
(1059, 14, ' updated repository part with id 315, and part # 921S', '2019-09-23 12:29:14', '2019-09-23 12:29:14'),
(1060, 1, ' updated repository part with id 204, and part # GM-BRC-002', '2019-09-23 12:29:26', '2019-09-23 12:29:26'),
(1061, 14, ' created a new part in the repository with id , and part # 925S', '2019-09-23 12:31:15', '2019-09-23 12:31:15'),
(1062, 14, ' created a new part in the repository with id , and part # 9796', '2019-09-23 12:32:12', '2019-09-23 12:32:12'),
(1063, 14, ' created a new part in the repository with id , and part # LB41CG', '2019-09-23 12:33:30', '2019-09-23 12:33:30'),
(1064, 14, ' created a new part in the repository with id , and part # LB42CG', '2019-09-23 12:34:32', '2019-09-23 12:34:32'),
(1065, 1, ' updated repository part with id 206, and part # XR-1000-168A', '2019-09-23 12:34:50', '2019-09-23 12:34:50'),
(1066, 14, ' created a new part in the repository with id , and part # LB44CG', '2019-09-23 12:35:20', '2019-09-23 12:35:20'),
(1067, 1, ' updated image for part with id 206', '2019-09-23 12:35:56', '2019-09-23 12:35:56'),
(1068, 14, ' created a new part in the repository with id , and part # LB45CG', '2019-09-23 12:36:03', '2019-09-23 12:36:03'),
(1069, 1, ' updated tags for part with id 174', '2019-09-23 12:36:55', '2019-09-23 12:36:55'),
(1070, 1, ' updated tags for part with id 173', '2019-09-23 12:37:05', '2019-09-23 12:37:05'),
(1071, 1, ' updated tags for part with id 172', '2019-09-23 12:37:10', '2019-09-23 12:37:10'),
(1072, 14, ' created a new part in the repository with id , and part # LB46CG', '2019-09-23 12:37:12', '2019-09-23 12:37:12'),
(1073, 14, ' created a new part in the repository with id , and part # LB48CG', '2019-09-23 12:39:09', '2019-09-23 12:39:09'),
(1074, 14, ' created a new part in the repository with id , and part # LB50CG', '2019-09-23 12:40:05', '2019-09-23 12:40:05'),
(1075, 14, ' created a new part in the repository with id , and part # LL41CG', '2019-09-23 12:41:03', '2019-09-23 12:41:03'),
(1076, 14, ' created a new part in the repository with id , and part # LR41CG', '2019-09-23 12:43:49', '2019-09-23 12:43:49'),
(1077, 14, ' created a new part in the repository with id , and part # T41CG', '2019-09-23 12:44:32', '2019-09-23 12:44:32'),
(1078, 14, ' created a new part in the repository with id , and part # T42CG', '2019-09-23 12:48:34', '2019-09-23 12:48:34'),
(1079, 14, ' created a new part in the repository with id , and part # YC4L12', '2019-09-23 13:00:44', '2019-09-23 13:00:44'),
(1080, 14, ' created a new part in the repository with id , and part # 4407', '2019-09-23 13:13:16', '2019-09-23 13:13:16'),
(1081, 14, ' created a new part in the repository with id , and part # EMT1', '2019-09-23 13:23:44', '2019-09-23 13:23:44'),
(1082, 14, ' created a new part in the repository with id , and part # EMT-1/2', '2019-09-23 13:24:48', '2019-09-23 13:24:48'),
(1083, 12, ' created a new directory entry for Manufacturer - Bussmann By Eaton( Eaton )', '2019-09-23 13:25:33', '2019-09-23 13:25:33'),
(1084, 14, ' created a new part in the repository with id , and part # EMT1-1/2', '2019-09-23 13:25:53', '2019-09-23 13:25:53'),
(1085, 14, ' created a new part in the repository with id , and part # EMT1-1/4', '2019-09-23 13:37:06', '2019-09-23 13:37:06'),
(1086, 14, ' created a new part in the repository with id , and part # emt2', '2019-09-23 13:39:03', '2019-09-23 13:39:03'),
(1087, 14, ' created a new part in the repository with id , and part # EMT2-1/2', '2019-09-23 13:39:49', '2019-09-23 13:39:49'),
(1088, 14, ' created a new part in the repository with id , and part # emt3', '2019-09-23 13:40:24', '2019-09-23 13:40:24'),
(1089, 14, ' created a new part in the repository with id , and part # EMT4', '2019-09-23 13:44:23', '2019-09-23 13:44:23'),
(1090, 14, ' created a new part in the repository with id , and part # GALV1-1/2', '2019-09-23 13:45:11', '2019-09-23 13:45:11'),
(1091, 14, ' created a new part in the repository with id , and part # GALV2', '2019-09-23 13:45:43', '2019-09-23 13:45:43'),
(1092, 14, ' created a new part in the repository with id , and part # GALV2-1/2', '2019-09-23 13:46:16', '2019-09-23 13:46:16'),
(1093, 14, ' created a new part in the repository with id , and part # GALV-3/4', '2019-09-23 13:46:50', '2019-09-23 13:46:50'),
(1094, 14, ' created a new part in the repository with id , and part # GALV4', '2019-09-23 13:47:28', '2019-09-23 13:47:28'),
(1095, 14, ' created a new part in the repository with id , and part # RNW86510301', '2019-09-23 13:54:38', '2019-09-23 13:54:38'),
(1096, 14, ' created a new part in the repository with id , and part # RNW8651058', '2019-09-23 13:55:35', '2019-09-23 13:55:35'),
(1097, 14, ' created a new part in the repository with id , and part # RNW8651015', '2019-09-23 13:56:29', '2019-09-23 13:56:29'),
(1098, 14, ' created a new part in the repository with id , and part # RNW8651050', '2019-09-23 13:57:32', '2019-09-23 13:57:32'),
(1099, 14, ' created a new part in the repository with id , and part # RNW10801', '2019-09-23 13:58:20', '2019-09-23 13:58:20'),
(1100, 14, ' created a new part in the repository with id , and part # RNW865848', '2019-09-23 13:59:13', '2019-09-23 13:59:13'),
(1101, 14, ' created a new part in the repository with id , and part # RNW865101761', '2019-09-23 14:00:22', '2019-09-23 14:00:22'),
(1102, 14, ' created a new part in the repository with id , and part # EV305-A', '2019-09-23 14:03:49', '2019-09-23 14:03:49'),
(1103, 14, ' created a new part in the repository with id , and part # 648023', '2019-09-23 14:06:19', '2019-09-23 14:06:19'),
(1104, 14, ' created a new part in the repository with id , and part # BK14', '2019-09-23 14:08:42', '2019-09-23 14:08:42'),
(1105, 14, ' created a new part in the repository with id , and part # BK38', '2019-09-23 14:30:46', '2019-09-23 14:30:46'),
(1106, 14, ' created a new part in the repository with id , and part # FENW141', '2019-09-23 14:32:17', '2019-09-23 14:32:17'),
(1107, 12, ' created a new part in the repository with id , and part # 1701', '2019-09-23 15:07:12', '2019-09-23 15:07:12'),
(1108, 12, ' created a new part in the repository with id , and part # 1702', '2019-09-23 15:07:48', '2019-09-23 15:07:48'),
(1109, 12, ' created a new part in the repository with id , and part # 1704', '2019-09-23 15:08:28', '2019-09-23 15:08:28'),
(1110, 12, ' created a new part in the repository with id , and part # 176', '2019-09-23 15:09:57', '2019-09-23 15:09:57'),
(1111, 12, ' created a new part in the repository with id , and part # CBGI100', '2019-09-23 15:12:26', '2019-09-23 15:12:26'),
(1112, 12, ' created a new part in the repository with id , and part # CBGI300', '2019-09-23 15:13:07', '2019-09-23 15:13:07'),
(1113, 12, ' created a new part in the repository with id , and part # CBGI75', '2019-09-23 15:14:59', '2019-09-23 15:14:59'),
(1114, 12, ' created a new part in the repository with id , and part # IL443', '2019-09-23 15:15:32', '2019-09-23 15:15:32'),
(1115, 12, ' created a new part in the repository with id , and part # IL708', '2019-09-23 15:16:40', '2019-09-23 15:16:40'),
(1116, 12, ' created a new part in the repository with id , and part # L404', '2019-09-23 15:17:22', '2019-09-23 15:17:22'),
(1117, 12, ' created a new part in the repository with id , and part # L805CL', '2019-09-23 15:21:14', '2019-09-23 15:21:14'),
(1118, 12, ' created a new part in the repository with id , and part # L806CL', '2019-09-23 15:22:19', '2019-09-23 15:22:19'),
(1119, 12, ' created a new part in the repository with id , and part # LA100', '2019-09-23 15:23:04', '2019-09-23 15:23:04'),
(1120, 12, ' created a new part in the repository with id , and part # LBLA100', '2019-09-23 15:24:20', '2019-09-23 15:24:20'),
(1121, 1, ' added permissions for Sales Manager to manage View Sales Team', '2019-09-24 13:39:25', '2019-09-24 13:39:25'),
(1122, 1, ' added permissions for Sales Manager to manage View Sales Team as Administrator', '2019-09-24 13:39:27', '2019-09-24 13:39:27'),
(1123, 1, ' added permissions for Sales Manager to manage Create a Sales Member', '2019-09-24 13:39:28', '2019-09-24 13:39:28'),
(1124, 1, ' added permissions for Sales Manager to manage Edit A Sales Member', '2019-09-24 13:39:30', '2019-09-24 13:39:30'),
(1125, 1, ' updated user doug with user id 30', '2019-09-24 13:45:12', '2019-09-24 13:45:12'),
(1126, 1, ' created new sales team member Jennifer  Griffin with id 1', '2019-09-24 13:47:12', '2019-09-24 13:47:12'),
(1127, 1, ' created new sales team member Doug  East with id 2', '2019-09-24 13:49:33', '2019-09-24 13:49:33'),
(1128, 1, ' added permissions for Human Resources to manage View Sales Team', '2019-09-24 13:50:03', '2019-09-24 13:50:03'),
(1129, 1, ' added permissions for Human Resources to manage View Sales Team as Administrator', '2019-09-24 13:50:05', '2019-09-24 13:50:05'),
(1130, 1, ' added permissions for Human Resources to manage Create a Sales Member', '2019-09-24 13:50:06', '2019-09-24 13:50:06'),
(1131, 1, ' added permissions for Human Resources to manage Edit A Sales Member', '2019-09-24 13:50:09', '2019-09-24 13:50:09'),
(1132, 1, ' added permissions for Project Manager to manage View Archived Projects', '2019-09-24 13:50:16', '2019-09-24 13:50:16'),
(1133, 1, ' added permissions for Project Manager to manage Edit Projects', '2019-09-24 13:50:17', '2019-09-24 13:50:17'),
(1134, 1, ' added permissions for Project Manager to manage View Projects', '2019-09-24 13:50:19', '2019-09-24 13:50:19'),
(1135, 1, ' added permissions for Project Manager to manage View Employees Basic', '2019-09-24 13:50:38', '2019-09-24 13:50:38'),
(1136, 1, ' added permissions for Project Manager to manage View Employee Basic Information', '2019-09-24 13:50:47', '2019-09-24 13:50:47'),
(1137, 1, ' added permissions for Project Manager to manage Manage Directory Company', '2019-09-24 13:50:55', '2019-09-24 13:50:55'),
(1138, 1, ' added permissions for Project Manager to manage View Project Leads', '2019-09-24 13:51:08', '2019-09-24 13:51:08'),
(1139, 1, ' added permissions for Project Manager to manage Create Project Leads', '2019-09-24 13:51:10', '2019-09-24 13:51:10'),
(1140, 1, ' added permissions for Project Manager to manage Edit Project Leads', '2019-09-24 13:51:13', '2019-09-24 13:51:13'),
(1141, 5, ' updated information for sales team member Jennifer \"Girly face\" Griffin with id 1', '2019-09-24 13:54:02', '2019-09-24 13:54:02'),
(1142, 5, ' created new employee James Thomas Schafnit with id 9', '2019-09-24 14:00:35', '2019-09-24 14:00:35'),
(1143, 5, ' created new employee emergency contactJames Thomas Schafnit', '2019-09-24 14:03:05', '2019-09-24 14:03:05'),
(1144, 5, ' added new dashboard module My Tasks', '2019-09-24 14:04:31', '2019-09-24 14:04:31'),
(1145, 1, ' added new dashboard module Mashed Potatoes', '2019-10-22 12:48:37', '2019-10-22 12:48:37'),
(1146, 1, ' removed dashboard module My Tasks', '2019-12-27 09:29:15', '2019-12-27 09:29:15'),
(1147, 1, ' removed dashboard module ERP Updates', '2019-12-27 09:29:54', '2019-12-27 09:29:54'),
(1148, 1, ' updated user pam with user id 31', '2019-12-27 09:34:21', '2019-12-27 09:34:21'),
(1149, 31, ' created a new contact Jeanie Guardino', '2019-12-27 10:15:46', '2019-12-27 10:15:46'),
(1150, 31, ' created a new contact Richard Berdahl', '2019-12-27 10:17:18', '2019-12-27 10:17:18'),
(1151, 31, ' created a new contact Dan Collins', '2019-12-27 10:18:39', '2019-12-27 10:18:39'),
(1152, 31, ' created a new contact Jason Bott', '2019-12-27 10:21:46', '2019-12-27 10:21:46'),
(1153, 31, ' created a new directory entry for Supplier/Service - Auto Glass Clinic( Auto Glass Clinic )', '2019-12-27 10:24:08', '2019-12-27 10:24:08'),
(1154, 31, ' created a new directory entry for Supplier/Service - Affordable Solar( Affordable Solar )', '2019-12-27 10:24:43', '2019-12-27 10:24:43'),
(1155, 31, ' created a new directory entry for Supplier/Service - Ahern Rentals( Ahern Rentals )', '2019-12-27 10:26:06', '2019-12-27 10:26:06'),
(1156, 31, ' created a new directory entry for Municipality - City of Casa Grande( City of Casa Grande )', '2019-12-27 10:32:39', '2019-12-27 10:32:39'),
(1157, 31, ' created a new contact Joe Horn', '2019-12-27 10:33:58', '2019-12-27 10:33:58'),
(1158, 31, ' created a new contact Joe Horn', '2019-12-27 10:35:30', '2019-12-27 10:35:30'),
(1159, 31, ' created a new contact Jeanie Guardino', '2019-12-27 10:37:27', '2019-12-27 10:37:27'),
(1160, 31, ' created a new directory entry for Municipality - City of Casa Grande( City of Casa Grande )', '2019-12-27 10:38:38', '2019-12-27 10:38:38'),
(1161, 31, ' created a new directory entry for Supplier/Service - Baker\'s Electric( Baker\'s Electric )', '2019-12-27 10:41:47', '2019-12-27 10:41:47'),
(1162, 31, ' created a new directory entry for Vendor - Border Construction( Border Construction Specialities )', '2019-12-27 10:43:11', '2019-12-27 10:43:11'),
(1163, 31, ' created a new contact Tyler Damman', '2019-12-27 10:44:05', '2019-12-27 10:44:05'),
(1164, 31, ' created a new contact Chris Luman', '2019-12-27 10:45:23', '2019-12-27 10:45:23'),
(1165, 31, ' created a new contact sean Gafvert', '2019-12-27 10:46:33', '2019-12-27 10:46:33'),
(1166, 31, ' created a new directory entry for Vendor - CED Greentech( Capital Electric Supply & Lighting )', '2019-12-27 10:47:53', '2019-12-27 10:47:53'),
(1167, 31, ' created a new contact Lauren Dorsey', '2019-12-27 10:48:48', '2019-12-27 10:48:48'),
(1168, 31, ' created a new contact Kathryn Cleary', '2019-12-27 10:50:43', '2019-12-27 10:50:43'),
(1169, 31, ' created a new contact James Rees', '2019-12-27 10:51:52', '2019-12-27 10:51:52'),
(1170, 31, ' created a new contact Ian McKillip', '2019-12-27 10:54:37', '2019-12-27 10:54:37'),
(1171, 31, ' created a new contact Brian Becker', '2019-12-27 10:55:42', '2019-12-27 10:55:42'),
(1172, 31, ' created a new contact Joseph Horn', '2019-12-27 10:57:11', '2019-12-27 10:57:11'),
(1173, 31, ' created a new contact Yvette Grabados', '2019-12-27 10:58:43', '2019-12-27 10:58:43'),
(1174, 31, ' created a new directory entry for Vendor - Copper State Bolt & Nut( Copper State Bolt & Nut )', '2019-12-27 11:01:53', '2019-12-27 11:01:53'),
(1175, 31, ' created a new directory entry for Municipality - Yuma County( Department of Development Services )', '2019-12-27 11:04:20', '2019-12-27 11:04:20'),
(1176, 31, ' created a new contact Thor Toepfer', '2019-12-27 11:05:19', '2019-12-27 11:05:19'),
(1177, 31, ' created a new directory entry for Vendor - Heyco Products( Heyco Products, Inc, )', '2019-12-27 11:07:03', '2019-12-27 11:07:03'),
(1178, 31, ' created a new contact Michael Bankowski', '2019-12-27 11:07:54', '2019-12-27 11:07:54'),
(1179, 31, ' created a new directory entry for Vendor - IES( Independent Electric Supply, Inc, )', '2019-12-27 11:08:58', '2019-12-27 11:08:58'),
(1180, 31, ' created a new contact Trent Veitch', '2019-12-27 11:09:55', '2019-12-27 11:09:55'),
(1181, 31, ' created a new contact Robert Masters', '2019-12-27 11:11:06', '2019-12-27 11:11:06'),
(1182, 31, ' created a new contact Matt Kaminski', '2019-12-27 11:12:12', '2019-12-27 11:12:12'),
(1183, 31, ' created a new contact Josh LopezFernandez', '2019-12-27 11:13:12', '2019-12-27 11:13:12'),
(1184, 31, ' created a new directory entry for Vendor - Phoenix Welding( Phoenix Welding Supply Co )', '2019-12-27 11:15:50', '2019-12-27 11:15:50'),
(1185, 31, ' created a new contact John Ganzini', '2019-12-27 11:17:21', '2019-12-27 11:17:21'),
(1186, 31, ' created a new contact Steve Lockwood', '2019-12-27 11:18:49', '2019-12-27 11:18:49'),
(1187, 31, ' created a new contact Casey Cole', '2019-12-27 11:19:45', '2019-12-27 11:19:45'),
(1188, 31, ' created a new contact Shan Bates', '2019-12-27 11:21:18', '2019-12-27 11:21:18'),
(1189, 31, ' created a new contact Margaret Bjorklund', '2019-12-27 11:23:40', '2019-12-27 11:23:40'),
(1190, 31, ' created a new contact Joe Chavez', '2019-12-27 11:32:56', '2019-12-27 11:32:56'),
(1191, 31, ' created a new contact Ernie Tom', '2019-12-27 11:34:07', '2019-12-27 11:34:07'),
(1192, 31, ' created a new contact Gina Apsey', '2019-12-27 11:35:11', '2019-12-27 11:35:11'),
(1193, 31, ' created a new contact Claudia Barker', '2019-12-27 11:37:14', '2019-12-27 11:37:14'),
(1194, 31, ' created a new directory entry for Manufacturer - AE Advanced Energy( AE Advanced Energy )', '2019-12-27 11:39:24', '2019-12-27 11:39:24'),
(1195, 31, ' created a new contact Christopher Heinzer', '2019-12-27 11:40:47', '2019-12-27 11:40:47'),
(1196, 31, ' created a new directory entry for Manufacturer - AZ Rack( AZ Rack )', '2019-12-27 11:41:54', '2019-12-27 11:41:54'),
(1197, 31, ' created a new contact Bob Newman', '2019-12-27 11:42:51', '2019-12-27 11:42:51'),
(1198, 31, ' created a new directory entry for Manufacturer - Canadian Solar( Canadian Solor )', '2019-12-27 11:44:22', '2019-12-27 11:44:22'),
(1199, 31, ' created a new contact Anni Nowhitney', '2019-12-27 11:53:40', '2019-12-27 11:53:40'),
(1200, 31, ' created a new contact Travis Falconer', '2019-12-27 11:54:35', '2019-12-27 11:54:35'),
(1201, 31, ' created a new directory entry for Manufacturer - Buse Industries( Buse Industries )', '2019-12-27 11:56:50', '2019-12-27 11:56:50'),
(1202, 31, ' created a new contact Victor Blair', '2019-12-27 11:58:25', '2019-12-27 11:58:25'),
(1203, 31, ' created a new directory entry for Manufacturer - Chargepoint( Chargepoint )', '2019-12-27 11:59:29', '2019-12-27 11:59:29'),
(1204, 31, ' created a new contact Andrew Croll', '2019-12-27 12:10:17', '2019-12-27 12:10:17'),
(1205, 31, ' created a new directory entry for Manufacturer - Chilicon Power( Chilicon Power )', '2019-12-27 12:20:15', '2019-12-27 12:20:15'),
(1206, 31, ' created a new contact Christopher Jones', '2019-12-27 12:21:26', '2019-12-27 12:21:26'),
(1207, 31, ' created a new contact David Sywensky', '2019-12-27 12:23:26', '2019-12-27 12:23:26'),
(1208, 31, ' created a new contact Chris Wood', '2019-12-27 12:24:51', '2019-12-27 12:24:51'),
(1209, 31, ' created a new contact Jennifer Sudol', '2019-12-27 12:25:31', '2019-12-27 12:25:31'),
(1210, 31, ' created a new contact Jordan Lake', '2019-12-27 12:26:20', '2019-12-27 12:26:20'),
(1211, 31, ' created a new directory entry for Municipality - City of Eloy( City of Eloy )', '2019-12-27 12:27:00', '2019-12-27 12:27:00'),
(1212, 31, ' created a new contact Becky Aguirre', '2019-12-27 12:29:49', '2019-12-27 12:29:49'),
(1213, 31, ' created a new directory entry for Manufacturer - CertainTeed( CertainTeed )', '2019-12-27 12:31:12', '2019-12-27 12:31:12'),
(1214, 31, ' created a new contact Kate Collardson', '2019-12-27 12:32:29', '2019-12-27 12:32:29'),
(1215, 31, ' created a new directory entry for Manufacturer - Enphase Energy( Enphase Energy )', '2019-12-27 12:35:37', '2019-12-27 12:35:37'),
(1216, 31, ' created a new contact Michael Haines', '2019-12-27 12:36:40', '2019-12-27 12:36:40'),
(1217, 31, ' created a new directory entry for Manufacturer - Kyocera( Kyocera )', '2019-12-27 12:37:45', '2019-12-27 12:37:45'),
(1218, 31, ' created a new contact Craig Robertson', '2019-12-27 12:38:41', '2019-12-27 12:38:41'),
(1219, 31, ' created a new directory entry for Manufacturer - Fronius( Fronius USA )', '2019-12-27 12:40:01', '2019-12-27 12:40:01'),
(1220, 31, ' created a new contact Sean Hickey', '2019-12-27 12:41:14', '2019-12-27 12:41:14'),
(1221, 31, ' created a new directory entry for Manufacturer - Milwaukee Tool( Milwaukee Tool )', '2019-12-27 12:42:29', '2019-12-27 12:42:29'),
(1222, 31, ' created a new contact Justin Warschauer', '2019-12-27 12:43:44', '2019-12-27 12:43:44'),
(1223, 31, ' created a new directory entry for Manufacturer - Nerktar Energy( Nektar Energy )', '2019-12-27 12:44:55', '2019-12-27 12:44:55'),
(1224, 31, ' created a new contact Michael Gregory', '2019-12-27 12:45:53', '2019-12-27 12:45:53'),
(1225, 31, ' created a new directory entry for Manufacturer - QCells( QCells )', '2019-12-27 12:49:59', '2019-12-27 12:49:59'),
(1226, 31, ' created a new contact Vera Li', '2019-12-27 12:50:59', '2019-12-27 12:50:59'),
(1227, 31, ' created a new directory entry for Municipality - Pinal County( Pinal County )', '2019-12-27 12:51:44', '2019-12-27 12:51:44'),
(1228, 31, ' created a new contact Tabby Villaverde', '2019-12-27 12:52:45', '2019-12-27 12:52:45'),
(1229, 31, ' created a new directory entry for Manufacturer - Performed Line Products( Performed Line Products )', '2019-12-27 12:53:38', '2019-12-27 12:53:38'),
(1230, 31, ' created a new contact Molly Scott', '2019-12-27 12:54:39', '2019-12-27 12:54:39'),
(1231, 31, ' created a new directory entry for Manufacturer - Start Lighting( Start Lighting )', '2019-12-27 12:55:27', '2019-12-27 12:55:27'),
(1232, 31, ' created a new contact Nicole Bagozzi', '2019-12-27 12:56:48', '2019-12-27 12:56:48'),
(1233, 31, ' created a new contact Kelli Ross', '2019-12-27 12:58:32', '2019-12-27 12:58:32'),
(1234, 31, ' created a new contact Brett Dotson', '2019-12-27 13:03:39', '2019-12-27 13:03:39'),
(1235, 31, ' created a new contact Johannes Pabbruwee', '2019-12-27 13:04:50', '2019-12-27 13:04:50'),
(1236, 31, ' created a new contact Mike Mahon', '2019-12-27 13:05:56', '2019-12-27 13:05:56'),
(1237, 31, ' created a new contact Martin Holdgraf', '2019-12-27 13:06:52', '2019-12-27 13:06:52'),
(1238, 31, ' created a new directory entry for Manufacturer - Solar IQ( Solar IQ )', '2019-12-27 13:09:42', '2019-12-27 13:09:42'),
(1239, 31, ' created a new contact Diane Dandeneau', '2019-12-27 13:11:18', '2019-12-27 13:11:18'),
(1240, 31, ' created a new contact Eric Bentsen', '2019-12-27 13:13:15', '2019-12-27 13:13:15'),
(1241, 31, ' created a new directory entry for Manufacturer - Shade N Net( Shade N Net )', '2019-12-27 13:15:25', '2019-12-27 13:15:25'),
(1242, 31, ' created a new contact Harold Morazan', '2019-12-27 13:16:36', '2019-12-27 13:16:36'),
(1243, 31, ' created a new directory entry for Manufacturer - Sun Edison( Sun Edison )', '2019-12-27 13:20:41', '2019-12-27 13:20:41'),
(1244, 31, ' created a new contact Matt Kelly', '2019-12-27 13:21:57', '2019-12-27 13:21:57'),
(1245, 31, ' created a new contact Marcella Fabre', '2019-12-27 13:22:46', '2019-12-27 13:22:46'),
(1246, 31, ' created a new contact Alex Medez', '2019-12-27 13:24:56', '2019-12-27 13:24:56'),
(1247, 31, ' created a new directory entry for Manufacturer - Wesco Distribution( Wesco Distribution )', '2019-12-27 13:29:14', '2019-12-27 13:29:14'),
(1248, 31, ' created a new contact Chris Crump', '2019-12-27 13:30:35', '2019-12-27 13:30:35'),
(1249, 31, ' created a new contact Ryan Davis', '2019-12-27 13:31:27', '2019-12-27 13:31:27'),
(1250, 31, ' created a new contact Shawn Mellott', '2019-12-27 13:32:32', '2019-12-27 13:32:32'),
(1251, 31, ' created a new contact Erin Helland', '2019-12-27 13:33:28', '2019-12-27 13:33:28'),
(1252, 31, ' created a new contact Tim Wheaton', '2019-12-27 13:34:28', '2019-12-27 13:34:28'),
(1253, 31, ' created a new contact Shane Dorsey', '2019-12-27 13:35:26', '2019-12-27 13:35:26'),
(1254, 31, ' created a new contact Brian Hutt', '2019-12-27 13:36:23', '2019-12-27 13:36:23'),
(1255, 31, ' created a new directory entry for Manufacturer - Zep Solar( Zep Solar )', '2019-12-27 13:38:00', '2019-12-27 13:38:00'),
(1256, 31, ' created a new contact Tony Pastore', '2019-12-27 13:39:07', '2019-12-27 13:39:07'),
(1257, 31, ' created a new contact Michael Bankowski', '2019-12-27 13:41:36', '2019-12-27 13:41:36'),
(1258, 31, ' created a new directory entry for Municipality - Maricopa County( Maricopa County )', '2019-12-27 13:56:54', '2019-12-27 13:56:54'),
(1259, 31, ' created a new contact Joe Montana', '2019-12-27 14:03:23', '2019-12-27 14:03:23'),
(1260, 31, ' created a new directory entry for Manufacturer - Hammond Power Solutions( Hammond Power Solutions )', '2019-12-27 14:04:44', '2019-12-27 14:04:44'),
(1261, 31, ' created a new contact Eric Gjersvig', '2019-12-27 14:05:53', '2019-12-27 14:05:53'),
(1262, 31, ' created a new contact Lance Wilson', '2019-12-27 14:12:36', '2019-12-27 14:12:36'),
(1263, 1, ' updated contact Jeanie Guardino', '2019-12-27 15:19:27', '2019-12-27 15:19:27'),
(1264, 1, ' updated contact Joe Chavez', '2019-12-27 15:20:52', '2019-12-27 15:20:52'),
(1265, 1, ' updated contact Ernie Tom', '2019-12-27 15:21:12', '2019-12-27 15:21:12'),
(1266, 1, ' updated contact Joe Chavez', '2019-12-27 16:04:44', '2019-12-27 16:04:44'),
(1267, 31, ' created a new directory entry for Supplier/Service - Bob Jones & Associates( Bob Jones )', '2020-01-02 09:54:42', '2020-01-02 09:54:42'),
(1268, 31, ' created a new directory entry for Supplier/Service - ADP( ADP )', '2020-01-02 09:56:00', '2020-01-02 09:56:00'),
(1269, 31, ' created a new directory entry for Utility - ASH( ASH AUTO SAFETY HOUSE )', '2020-01-02 09:56:53', '2020-01-02 09:56:53'),
(1270, 31, ' created a new directory entry for Supplier/Service - Arizona Accurate Solar and Air Conditioning( Arizona Accurate Solar and Air Conditioning )', '2020-01-02 09:59:18', '2020-01-02 09:59:18'),
(1271, 31, ' created a new directory entry for Supplier/Service - Battery Systems of Phoenix( Battery Systems of Phoenix )', '2020-01-02 10:00:45', '2020-01-02 10:00:45'),
(1272, 31, ' created a new directory entry for Supplier/Service - Arizona Ready Mix Concrete( Arizona Ready Mix Concrete )', '2020-01-02 10:01:23', '2020-01-02 10:01:23'),
(1273, 31, ' created a new directory entry for Supplier/Service - Burns & McDonnell( Burns & McDonnell )', '2020-01-02 10:08:38', '2020-01-02 10:08:38'),
(1274, 31, ' created a new directory entry for Supplier/Service - CPI Building Services( CPI Building Services, Inc, )', '2020-01-02 10:25:42', '2020-01-02 10:25:42'),
(1275, 31, ' created a new directory entry for Supplier/Service - Connect 202( Connect 202 Partners )', '2020-01-02 10:30:25', '2020-01-02 10:30:25'),
(1276, 31, ' created a new directory entry for Supplier/Service - Marbecc( Marbecc Custom Designs, LLC )', '2020-01-02 10:31:10', '2020-01-02 10:31:10'),
(1277, 31, ' created a new directory entry for Supplier/Service - Crescent Moon Enterprises( Crescent Moon Enterprises, Inc. )', '2020-01-02 10:34:40', '2020-01-02 10:34:40'),
(1278, 31, ' created a new directory entry for Supplier/Service - ETA Engineering( ETA Engineering, Inc. )', '2020-01-02 10:36:29', '2020-01-02 10:36:29'),
(1279, 31, ' created a new directory entry for Supplier/Service - Dominion Real Estate( Dominion Real Estate Partners, LLC )', '2020-01-02 10:37:18', '2020-01-02 10:37:18'),
(1280, 31, ' created a new directory entry for Supplier/Service - David R Howard( David R Howard Electric, Inc. )', '2020-01-02 10:42:51', '2020-01-02 10:42:51'),
(1281, 31, ' created a new directory entry for Supplier/Service - Copy Exress( Copy Express )', '2020-01-02 10:43:50', '2020-01-02 10:43:50'),
(1282, 31, ' created a new directory entry for Supplier/Service - Solar Mining( Solar Mining )', '2020-01-02 10:45:10', '2020-01-02 10:45:10'),
(1283, 31, ' created a new directory entry for Supplier/Service - De Fusco( De Fusco Industrial Supply )', '2020-01-02 10:46:43', '2020-01-02 10:46:43'),
(1284, 31, ' created a new directory entry for Supplier/Service - DC Welding( DC Welding )', '2020-01-02 10:47:17', '2020-01-02 10:47:17'),
(1285, 31, ' created a new directory entry for Supplier/Service - Home Remodel Service( Home Remodel Service )', '2020-01-02 10:48:35', '2020-01-02 10:48:35'),
(1286, 31, ' created a new directory entry for Supplier/Service - J Ryan Electric( J Ryan Electric )', '2020-01-02 10:49:47', '2020-01-02 10:49:47'),
(1287, 31, ' created a new directory entry for Supplier/Service - RH Reprographics( RH Reprographics )', '2020-01-02 10:50:54', '2020-01-02 10:50:54'),
(1288, 31, ' created a new directory entry for Supplier/Service - Infinergy( Infinergy Wind & Solar )', '2020-01-02 10:51:53', '2020-01-02 10:51:53'),
(1289, 31, ' created a new directory entry for Supplier/Service - Mage Solar( Mage Solar Projects, Inc. )', '2020-01-02 10:56:36', '2020-01-02 10:56:36'),
(1290, 31, ' created a new directory entry for Utility - MLWP( Mesquite Lake Water & Power LLC )', '2020-01-02 10:57:29', '2020-01-02 10:57:29'),
(1291, 31, ' created a new directory entry for Supplier/Service - McKay Electrical( McKay Electrical Agents )', '2020-01-02 10:58:11', '2020-01-02 10:58:11'),
(1292, 31, ' created a new directory entry for Supplier/Service - Luker Plumbing( Luker Plumbing )', '2020-01-02 10:58:43', '2020-01-02 10:58:43'),
(1293, 31, ' created a new directory entry for Supplier/Service - Ewing-Foley, Inc.( Ewing-Foley Inc. )', '2020-01-02 10:59:39', '2020-01-02 10:59:39'),
(1294, 31, ' created a new directory entry for Supplier/Service - Midtown Signs( Midtown Signs )', '2020-01-02 11:00:14', '2020-01-02 11:00:14'),
(1295, 31, ' created a new directory entry for Supplier/Service - Steel Service Center( Steel Service Center )', '2020-01-02 11:03:24', '2020-01-02 11:03:24'),
(1296, 31, ' created a new directory entry for Supplier/Service - Kowalski( Kowalski Electrical Division )', '2020-01-02 11:03:55', '2020-01-02 11:03:55'),
(1297, 31, ' created a new directory entry for Supplier/Service - Nippon Express( Nippon Express USA, Inc. )', '2020-01-02 11:04:31', '2020-01-02 11:04:31'),
(1298, 31, ' created a new directory entry for Supplier/Service - Gryphon Companies( Gryphon Companies, Inc.  Roofing & Construction )', '2020-01-02 11:09:42', '2020-01-02 11:09:42'),
(1299, 31, ' created a new directory entry for Supplier/Service - Pew Land Surveying( Pew Land Surveying, LLC )', '2020-01-02 11:14:01', '2020-01-02 11:14:01'),
(1300, 31, ' created a new directory entry for Supplier/Service - Peterson Associates( Peterson Associates Consulting Engineers, Inc. )', '2020-01-02 11:15:27', '2020-01-02 11:15:27'),
(1301, 31, ' created a new directory entry for Supplier/Service - Pacific Office( Pacific Office Automation )', '2020-01-02 11:15:52', '2020-01-02 11:15:52'),
(1302, 31, ' created a new directory entry for Supplier/Service - Pop-Off( Pop-Off Construction )', '2020-01-02 11:16:24', '2020-01-02 11:16:24'),
(1303, 31, ' created a new directory entry for Supplier/Service - Phoenix Contracting( Phoenix Contracting Services, Inc. )', '2020-01-02 11:17:28', '2020-01-02 11:17:28'),
(1304, 31, ' created a new directory entry for Supplier/Service - Ritchie Bros( Ritchie Bros Auctioneeers )', '2020-01-02 11:18:01', '2020-01-02 11:18:01'),
(1305, 31, ' created a new directory entry for Supplier/Service - Rogers Corp( Rogers Corporation/Advanced Connectivity Solutions )', '2020-01-02 11:19:27', '2020-01-02 11:19:27'),
(1306, 31, ' created a new directory entry for Supplier/Service - Solar Electric Systems( Solar Electric Systems p& Products, Inc, )', '2020-01-02 11:29:21', '2020-01-02 11:29:21'),
(1307, 31, ' created a new directory entry for Supplier/Service - S.E. Consultants( S.E. Consultants, Inc, )', '2020-01-02 11:32:31', '2020-01-02 11:32:31'),
(1308, 31, ' created a new directory entry for Supplier/Service - SEGI( SEGI )', '2020-01-02 11:33:02', '2020-01-02 11:33:02'),
(1309, 31, ' created a new directory entry for Supplier/Service - Syndic Sales( Syndic Sales, Inc, )', '2020-01-02 11:33:56', '2020-01-02 11:33:56'),
(1310, 31, ' created a new directory entry for Supplier/Service - S N J Construction( S N J Construction )', '2020-01-02 11:34:53', '2020-01-02 11:34:53'),
(1311, 31, ' created a new directory entry for Supplier/Service - Taylor Made Electric( Taylor Made Electric )', '2020-01-02 11:35:28', '2020-01-02 11:35:28'),
(1312, 31, ' created a new directory entry for Supplier/Service - Verde Valley Rentals( Verde Valley Rentals )', '2020-01-02 11:36:16', '2020-01-02 11:36:16'),
(1313, 31, ' created a new directory entry for Supplier/Service - Vintage Iron( Vintage, Iron & Restoration )', '2020-01-02 11:37:01', '2020-01-02 11:37:01'),
(1314, 31, ' created a new directory entry for Supplier/Service - Starling Madison( Starling Madison Lofquist Inc )', '2020-01-02 11:37:47', '2020-01-02 11:37:47'),
(1315, 31, ' created a new directory entry for Supplier/Service - Western & Southern Life( Western & Southerb Life )', '2020-01-02 11:38:23', '2020-01-02 11:38:23'),
(1316, 31, ' created a new directory entry for Supplier/Service - Shermco Industries( SI )', '2020-01-08 09:38:50', '2020-01-08 09:38:50'),
(1317, 31, ' created a new directory entry for Supplier/Service - Lawson Products( Lawson Products )', '2020-01-31 10:22:15', '2020-01-31 10:22:15'),
(1318, 1, ' created a new customer portfolio Green Home Rentals, LLC with id 2', '2020-02-17 14:39:58', '2020-02-17 14:39:58'),
(1319, 1, ' created a new contact Steven Bakal', '2020-02-17 15:01:00', '2020-02-17 15:01:00'),
(1320, 1, ' created a new customer proposal  with id 2', '2020-02-17 15:06:21', '2020-02-17 15:06:21'),
(1321, 1, ' created a new proposal design Test1 with id 1', '2020-02-17 15:20:56', '2020-02-17 15:20:56'),
(1322, 1, ' updated tags for part with id 168', '2020-02-17 15:40:21', '2020-02-17 15:40:21'),
(1323, 1, ' updated tags for part with id 162', '2020-02-17 15:40:41', '2020-02-17 15:40:41'),
(1324, 1, ' updated tags for part with id 163', '2020-02-17 15:40:45', '2020-02-17 15:40:45'),
(1325, 1, ' updated tags for part with id 164', '2020-02-17 15:40:48', '2020-02-17 15:40:48'),
(1326, 1, ' updated repository part with id 198, and part # GF1-MLL-812', '2020-02-17 15:45:35', '2020-02-17 15:45:35'),
(1327, 1, ' updated image for part with id 198', '2020-02-17 15:46:17', '2020-02-17 15:46:17'),
(1328, 1, ' updated repository part with id 199, and part # QMC-F12x12', '2020-02-17 15:48:08', '2020-02-17 15:48:08'),
(1329, 1, ' created new user Jeanne Bakal with username jeanne and user id 32', '2020-02-17 15:55:20', '2020-02-17 15:55:20'),
(1330, 32, ' created a new contact James Rees', '2020-02-17 16:06:59', '2020-02-17 16:06:59'),
(1331, 1, ' updated image for part with id 199', '2020-02-17 16:09:31', '2020-02-17 16:09:31'),
(1332, 1, ' updated image for part with id 210', '2020-02-17 16:11:53', '2020-02-17 16:11:53'),
(1333, 1, ' updated image for part with id 210', '2020-02-17 16:12:04', '2020-02-17 16:12:04');
INSERT INTO `activities` (`id`, `user_id`, `activity`, `updated_at`, `created_at`) VALUES
(1334, 1, ' updated image for part with id 211', '2020-02-17 16:21:09', '2020-02-17 16:21:09'),
(1335, 1, ' updated repository part with id 212, and part # P00235347', '2020-02-17 16:35:34', '2020-02-17 16:35:34'),
(1336, 1, ' updated repository part with id 217, and part # 921-S', '2020-02-17 16:59:22', '2020-02-17 16:59:22'),
(1337, 1, ' updated image for part with id 217', '2020-02-17 17:04:49', '2020-02-17 17:04:49'),
(1338, 1, ' updated repository part with id 218, and part # 642S', '2020-02-17 17:05:26', '2020-02-17 17:05:26'),
(1339, 1, ' updated image for part with id 218', '2020-02-17 17:10:35', '2020-02-17 17:10:35'),
(1340, 1, ' updated repository part with id 219, and part # 82707B', '2020-02-17 20:41:35', '2020-02-17 20:41:35'),
(1341, 1, ' updated image for part with id 219', '2020-02-17 20:44:17', '2020-02-17 20:44:17'),
(1342, 1, ' updated repository part with id 220, and part # LG-144-2-CB', '2020-02-17 20:45:42', '2020-02-17 20:45:42'),
(1343, 1, ' updated image for part with id 220', '2020-02-17 20:47:03', '2020-02-17 20:47:03'),
(1344, 1, ' updated repository part with id 221, and part # MECR-752-B', '2020-02-17 20:49:09', '2020-02-17 20:49:09'),
(1345, 1, ' updated image for part with id 221', '2020-02-17 20:49:50', '2020-02-17 20:49:50'),
(1346, 1, ' updated image for part with id 222', '2020-02-17 20:51:19', '2020-02-17 20:51:19'),
(1347, 1, ' updated repository part with id 223, and part # 1-WBA', '2020-02-17 20:52:59', '2020-02-17 20:52:59'),
(1348, 1, ' updated image for part with id 223', '2020-02-17 20:53:46', '2020-02-17 20:53:46'),
(1349, 1, ' updated repository part with id 224, and part # DS075H1', '2020-02-17 20:54:49', '2020-02-17 20:54:49'),
(1350, 1, ' updated image for part with id 224', '2020-02-17 20:55:32', '2020-02-17 20:55:32'),
(1351, 1, ' updated repository part with id 225, and part # MECR-762', '2020-02-17 20:56:33', '2020-02-17 20:56:33'),
(1352, 1, ' updated repository part with id 225, and part # MECR-762', '2020-02-17 20:57:03', '2020-02-17 20:57:03'),
(1353, 1, ' updated image for part with id 225', '2020-02-17 20:57:55', '2020-02-17 20:57:55'),
(1354, 1, ' updated repository part with id 226, and part # 011', '2020-02-17 20:59:29', '2020-02-17 20:59:29'),
(1355, 1, ' updated repository part with id 226, and part # DG221URB', '2020-02-17 21:00:32', '2020-02-17 21:00:32'),
(1356, 1, ' updated image for part with id 226', '2020-02-17 21:02:56', '2020-02-17 21:02:56'),
(1357, 1, ' updated repository part with id 227, and part # 927', '2020-02-17 21:04:39', '2020-02-17 21:04:39'),
(1358, 1, ' updated image for part with id 227', '2020-02-17 21:07:40', '2020-02-17 21:07:40'),
(1359, 1, ' updated repository part with id 228, and part # GF223NR', '2020-02-17 21:10:27', '2020-02-17 21:10:27'),
(1360, 1, ' updated image for part with id 228', '2020-02-17 21:11:58', '2020-02-17 21:11:58'),
(1361, 1, ' updated repository part with id 229, and part # GF324N', '2020-02-17 21:13:27', '2020-02-17 21:13:27'),
(1362, 1, ' updated image for part with id 229', '2020-02-17 21:50:07', '2020-02-17 21:50:07'),
(1363, 1, ' added permissions for Administrator to manage View Employees Basic', '2020-02-18 10:14:55', '2020-02-18 10:14:55'),
(1364, 1, ' added permissions for Administrator to manage View Employee Basic Information', '2020-02-18 10:14:55', '2020-02-18 10:14:55'),
(1365, 1, ' added permissions for Administrator to manage View Employee Sensitive', '2020-02-18 10:14:55', '2020-02-18 10:14:55'),
(1366, 1, ' added permissions for Administrator to manage View Employee Admin', '2020-02-18 10:14:56', '2020-02-18 10:14:56'),
(1367, 1, ' added permissions for Administrator to manage Create Employee', '2020-02-18 10:14:57', '2020-02-18 10:14:57'),
(1368, 1, ' added permissions for Administrator to manage Edit Employee', '2020-02-18 10:14:57', '2020-02-18 10:14:57'),
(1369, 1, ' added permissions for Administrator to manage View Directory', '2020-02-18 10:15:09', '2020-02-18 10:15:09'),
(1370, 1, ' added permissions for Administrator to manage Create Directory Company', '2020-02-18 10:15:10', '2020-02-18 10:15:10'),
(1371, 1, ' added permissions for Administrator to manage Edit Directory Company', '2020-02-18 10:15:11', '2020-02-18 10:15:11'),
(1372, 1, ' added permissions for Administrator to manage Manage Directory Company', '2020-02-18 10:15:12', '2020-02-18 10:15:12'),
(1373, 1, ' added permissions for Administrator to manage View Safety Programs', '2020-02-18 10:15:13', '2020-02-18 10:15:13'),
(1374, 1, ' added permissions for Administrator to manage View Training Courses, Results and Certs', '2020-02-18 10:15:14', '2020-02-18 10:15:14'),
(1375, 1, ' added permissions for Administrator to manage Create, Edit and Assign Training Courses', '2020-02-18 10:15:15', '2020-02-18 10:15:15'),
(1376, 1, ' added permissions for Administrator to manage Take Training Course', '2020-02-18 10:15:16', '2020-02-18 10:15:16'),
(1377, 1, ' added permissions for Administrator to manage View Audits and Audit Results', '2020-02-18 10:15:17', '2020-02-18 10:15:17'),
(1378, 1, ' added permissions for Administrator to manage Create, Edit and Assign Audits', '2020-02-18 10:15:18', '2020-02-18 10:15:18'),
(1379, 1, ' added permissions for Administrator to manage Complete and Log Audits', '2020-02-18 10:15:19', '2020-02-18 10:15:19'),
(1380, 1, ' added permissions for Administrator to manage View Job Hazard Analyses (JHAs) and Reports', '2020-02-18 10:15:20', '2020-02-18 10:15:20'),
(1381, 1, ' added permissions for Administrator to manage Create and Edit Job Hazard Analyses (JHAs)', '2020-02-18 10:15:21', '2020-02-18 10:15:21'),
(1382, 1, ' added permissions for Administrator to manage Complete and Log Job Hazard Analyses (JHAs)', '2020-02-18 10:15:22', '2020-02-18 10:15:22'),
(1383, 1, ' added permissions for Administrator to manage View Incident Reports', '2020-02-18 10:18:55', '2020-02-18 10:18:55'),
(1384, 1, ' added permissions for Administrator to manage Create and Edit Incident Reports', '2020-02-18 10:18:57', '2020-02-18 10:18:57'),
(1385, 1, ' added permissions for Administrator to manage Complete Incident Reports', '2020-02-18 10:18:58', '2020-02-18 10:18:58'),
(1386, 1, ' added permissions for Administrator to manage View Project Leads', '2020-02-18 10:19:00', '2020-02-18 10:19:00'),
(1387, 1, ' added permissions for Administrator to manage Create Project Leads', '2020-02-18 10:19:01', '2020-02-18 10:19:01'),
(1388, 1, ' added permissions for Administrator to manage Edit Project Leads', '2020-02-18 10:19:03', '2020-02-18 10:19:03'),
(1389, 1, ' added permissions for Administrator to manage View Company Vehicle Information', '2020-02-18 10:19:04', '2020-02-18 10:19:04'),
(1390, 1, ' added permissions for Administrator to manage Create Company Vehicle', '2020-02-18 10:19:06', '2020-02-18 10:19:06'),
(1391, 1, ' added permissions for Administrator to manage Edit Company Vehicle Information', '2020-02-18 10:19:08', '2020-02-18 10:19:08'),
(1392, 1, ' added permissions for Administrator to manage View Inventory', '2020-02-18 10:19:09', '2020-02-18 10:19:09'),
(1393, 1, ' added permissions for Administrator to manage Create Inventory', '2020-02-18 10:19:10', '2020-02-18 10:19:10'),
(1394, 1, ' added permissions for Administrator to manage Edit Inventory', '2020-02-18 10:19:12', '2020-02-18 10:19:12'),
(1395, 1, ' added permissions for Administrator to manage View Inventory Pulls', '2020-02-18 10:19:13', '2020-02-18 10:19:13'),
(1396, 1, ' added permissions for Administrator to manage Create Inventory Pulls', '2020-02-18 10:19:15', '2020-02-18 10:19:15'),
(1397, 1, ' added permissions for Administrator to manage Edit Inventory Pulls', '2020-02-18 10:19:17', '2020-02-18 10:19:17'),
(1398, 1, ' added permissions for Administrator to manage Receive Inventory', '2020-02-18 10:19:18', '2020-02-18 10:19:18'),
(1399, 1, ' added permissions for Administrator to manage View Inventory Order', '2020-02-18 10:19:20', '2020-02-18 10:19:20'),
(1400, 1, ' added permissions for Administrator to manage Create Inventory Order', '2020-02-18 10:19:22', '2020-02-18 10:19:22'),
(1401, 1, ' added permissions for Administrator to manage Edit Inventory Order', '2020-02-18 10:19:23', '2020-02-18 10:19:23'),
(1402, 1, ' added permissions for Administrator to manage View Parts Repository', '2020-02-18 10:19:25', '2020-02-18 10:19:25'),
(1403, 1, ' added permissions for Administrator to manage Create Parts Repository', '2020-02-18 10:19:27', '2020-02-18 10:19:27'),
(1404, 1, ' added permissions for Administrator to manage Edit Parts Repository', '2020-02-18 10:19:28', '2020-02-18 10:19:28'),
(1405, 1, ' added permissions for Administrator to manage Administrate Repository', '2020-02-18 10:19:30', '2020-02-18 10:19:30'),
(1406, 1, ' added permissions for Administrator to manage View Projects', '2020-02-18 10:19:31', '2020-02-18 10:19:31'),
(1407, 1, ' added permissions for Administrator to manage Edit Projects', '2020-02-18 10:19:33', '2020-02-18 10:19:33'),
(1408, 1, ' added permissions for Administrator to manage View Archived Projects', '2020-02-18 10:19:35', '2020-02-18 10:19:35'),
(1409, 1, ' added permissions for Administrator to manage View Sales Team', '2020-02-18 10:19:37', '2020-02-18 10:19:37'),
(1410, 1, ' added permissions for Administrator to manage View Sales Team as Administrator', '2020-02-18 10:19:38', '2020-02-18 10:19:38'),
(1411, 1, ' added permissions for Administrator to manage Create a Sales Member', '2020-02-18 10:19:40', '2020-02-18 10:19:40'),
(1412, 1, ' added permissions for Administrator to manage Edit A Sales Member', '2020-02-18 10:19:42', '2020-02-18 10:19:42'),
(1413, 2, ' updated repository part with id 230, and part # HF364R', '2020-02-18 10:21:51', '2020-02-18 10:21:51'),
(1414, 2, ' updated image for part with id 230', '2020-02-18 10:24:11', '2020-02-18 10:24:11'),
(1415, 2, ' updated repository part with id 231, and part # HNF362R', '2020-02-18 10:26:07', '2020-02-18 10:26:07'),
(1416, 2, ' updated image for part with id 231', '2020-02-18 10:28:30', '2020-02-18 10:28:30'),
(1417, 2, ' updated image for part with id 232', '2020-02-18 10:46:05', '2020-02-18 10:46:05'),
(1418, 2, ' updated image for part with id 233', '2020-02-18 10:49:57', '2020-02-18 10:49:57'),
(1419, 2, ' updated repository part with id 234, and part # SB7000TL-US-22', '2020-02-18 10:50:22', '2020-02-18 10:50:22'),
(1420, 2, ' updated image for part with id 234', '2020-02-18 10:53:34', '2020-02-18 10:53:34'),
(1421, 2, ' updated image for part with id 236', '2020-02-18 10:58:10', '2020-02-18 10:58:10'),
(1422, 2, ' updated image for part with id 237', '2020-02-18 11:00:19', '2020-02-18 11:00:19'),
(1423, 2, ' created a new part in the repository with id , and part # 1700C-Blue', '2020-02-18 11:05:45', '2020-02-18 11:05:45'),
(1424, 2, ' updated repository part with id 372, and part # 1700C-BLUE', '2020-02-18 11:06:13', '2020-02-18 11:06:13'),
(1425, 2, ' created a new repository color with name Yellow', '2020-02-18 11:06:54', '2020-02-18 11:06:54'),
(1426, 2, ' created a new repository color with name Purple', '2020-02-18 11:08:00', '2020-02-18 11:08:00'),
(1427, 2, ' created a new repository color with name Brown', '2020-02-18 11:08:14', '2020-02-18 11:08:14'),
(1428, 2, ' created a new repository color with name Orange', '2020-02-18 11:08:28', '2020-02-18 11:08:28'),
(1429, 2, ' updated repository part with id 237, and part # 1700C-YELLOW', '2020-02-18 11:10:32', '2020-02-18 11:10:32'),
(1430, 2, ' updated image for part with id 372', '2020-02-18 11:10:56', '2020-02-18 11:10:56'),
(1431, 2, ' created a new part in the repository with id , and part # 1700C-ORANGE', '2020-02-18 11:11:35', '2020-02-18 11:11:35'),
(1432, 2, ' updated image for part with id 373', '2020-02-18 11:11:56', '2020-02-18 11:11:56'),
(1433, 2, ' created a new part in the repository with id , and part # 1700C-RED', '2020-02-18 11:12:28', '2020-02-18 11:12:28'),
(1434, 2, ' updated image for part with id 374', '2020-02-18 11:12:47', '2020-02-18 11:12:47'),
(1435, 2, ' created a new repository color with name Grey', '2020-02-18 11:15:55', '2020-02-18 11:15:55'),
(1436, 2, ' created a new part in the repository with id , and part # 1700C-GREY', '2020-02-18 11:16:28', '2020-02-18 11:16:28'),
(1437, 2, ' updated image for part with id 375', '2020-02-18 11:16:52', '2020-02-18 11:16:52'),
(1438, 2, ' updated image for part with id 238', '2020-02-18 11:32:19', '2020-02-18 11:32:19'),
(1439, 2, ' updated image for part with id 238', '2020-02-18 11:33:58', '2020-02-18 11:33:58'),
(1440, 2, ' updated image for part with id 238', '2020-02-18 11:34:31', '2020-02-18 11:34:31'),
(1441, 2, ' updated image for part with id 239', '2020-02-18 11:34:59', '2020-02-18 11:34:59'),
(1442, 2, ' updated image for part with id 240', '2020-02-18 11:36:45', '2020-02-18 11:36:45'),
(1443, 2, ' updated image for part with id 241', '2020-02-18 11:38:05', '2020-02-18 11:38:05'),
(1444, 2, ' updated image for part with id 256', '2020-02-18 11:39:45', '2020-02-18 11:39:45'),
(1445, 2, ' updated repository part with id 256, and part # 0-WBA', '2020-02-18 11:40:23', '2020-02-18 11:40:23'),
(1446, 2, ' updated image for part with id 276', '2020-02-18 11:41:42', '2020-02-18 11:41:42'),
(1447, 2, ' updated image for part with id 358', '2020-02-18 11:42:33', '2020-02-18 11:42:33'),
(1448, 2, ' updated image for part with id 359', '2020-02-18 11:42:51', '2020-02-18 11:42:51'),
(1449, 2, ' updated image for part with id 360', '2020-02-18 11:43:07', '2020-02-18 11:43:07'),
(1450, 2, ' updated image for part with id 361', '2020-02-18 11:44:09', '2020-02-18 11:44:09'),
(1451, 2, ' updated repository part with id 362, and part # CBGI-100', '2020-02-18 11:45:59', '2020-02-18 11:45:59'),
(1452, 2, ' updated image for part with id 362', '2020-02-18 11:46:51', '2020-02-18 11:46:51'),
(1453, 2, ' updated repository part with id 363, and part # CBGI-300', '2020-02-18 11:47:24', '2020-02-18 11:47:24'),
(1454, 2, ' updated image for part with id 363', '2020-02-18 11:47:58', '2020-02-18 11:47:58'),
(1455, 2, ' updated repository part with id 364, and part # CBGI-75', '2020-02-18 11:49:13', '2020-02-18 11:49:13'),
(1456, 2, ' updated image for part with id 364', '2020-02-18 11:49:27', '2020-02-18 11:49:27'),
(1457, 1, ' updated repository part with id 195, and part # MB14114', '2020-02-19 11:49:26', '2020-02-19 11:49:26'),
(1458, 1, ' updated repository part with id 192, and part # MB381', '2020-02-19 11:50:07', '2020-02-19 11:50:07'),
(1459, 1, ' updated image for part with id 242', '2020-02-19 11:51:28', '2020-02-19 11:51:28'),
(1460, 1, ' updated image for part with id 243', '2020-02-19 11:51:56', '2020-02-19 11:51:56'),
(1461, 1, ' updated image for part with id 244', '2020-02-19 11:52:26', '2020-02-19 11:52:26'),
(1462, 1, ' updated repository part with id 245, and part # STB90100', '2020-02-19 11:54:26', '2020-02-19 11:54:26'),
(1463, 1, ' updated image for part with id 245', '2020-02-19 11:56:53', '2020-02-19 11:56:53'),
(1464, 1, ' updated repository part with id 246, and part # 38AST', '2020-02-19 11:59:48', '2020-02-19 11:59:48'),
(1465, 1, ' updated image for part with id 246', '2020-02-19 12:00:15', '2020-02-19 12:00:15'),
(1466, 1, ' updated repository part with id 247, and part # NMSC9075', '2020-02-19 12:00:55', '2020-02-19 12:00:55'),
(1467, 1, ' updated image for part with id 247', '2020-02-19 12:02:37', '2020-02-19 12:02:37'),
(1468, 1, ' updated repository part with id 248, and part # NMSC50', '2020-02-19 12:03:15', '2020-02-19 12:03:15'),
(1469, 1, ' updated image for part with id 248', '2020-02-19 12:04:32', '2020-02-19 12:04:32'),
(1470, 1, ' updated repository part with id 250, and part # 1025', '2020-02-19 12:17:00', '2020-02-19 12:17:00'),
(1471, 1, ' updated image for part with id 250', '2020-02-19 12:19:06', '2020-02-19 12:19:06'),
(1472, 1, ' updated repository part with id 251, and part # 105-S', '2020-02-19 12:23:19', '2020-02-19 12:23:19'),
(1473, 1, ' updated image for part with id 251', '2020-02-19 12:25:25', '2020-02-19 12:25:25'),
(1474, 1, ' updated repository part with id 253, and part # 106666', '2020-02-19 12:27:48', '2020-02-19 12:27:48'),
(1475, 1, ' updated repository part with id 252, and part # 1066', '2020-02-19 12:29:58', '2020-02-19 12:29:58'),
(1476, 1, ' updated image for part with id 252', '2020-02-19 12:30:28', '2020-02-19 12:30:28'),
(1477, 1, ' updated repository part with id 253, and part # 106-S', '2020-02-19 12:36:17', '2020-02-19 12:36:17'),
(1478, 1, ' updated image for part with id 253', '2020-02-19 12:36:34', '2020-02-19 12:36:34'),
(1479, 1, ' updated repository part with id 254, and part # 1070', '2020-02-19 12:37:40', '2020-02-19 12:37:40'),
(1480, 1, ' updated image for part with id 254', '2020-02-19 12:37:57', '2020-02-19 12:37:57'),
(1481, 1, ' updated repository part with id 255, and part # 107-S', '2020-02-19 12:39:36', '2020-02-19 12:39:36'),
(1482, 1, ' updated image for part with id 255', '2020-02-19 12:40:07', '2020-02-19 12:40:07'),
(1483, 1, ' updated repository part with id 257, and part # 1081', '2020-02-19 12:40:44', '2020-02-19 12:40:44'),
(1484, 1, ' updated image for part with id 257', '2020-02-19 12:41:01', '2020-02-19 12:41:01'),
(1485, 1, ' updated repository part with id 258, and part # 1087', '2020-02-19 12:42:24', '2020-02-19 12:42:24'),
(1486, 1, ' updated image for part with id 258', '2020-02-19 12:42:45', '2020-02-19 12:42:45'),
(1487, 1, ' updated repository part with id 260, and part # 1161', '2020-02-19 12:44:16', '2020-02-19 12:44:16'),
(1488, 1, ' updated repository part with id 259, and part # 110-S', '2020-02-19 14:41:41', '2020-02-19 14:41:41'),
(1489, 1, ' updated image for part with id 259', '2020-02-19 14:42:07', '2020-02-19 14:42:07'),
(1490, 1, ' updated image for part with id 260', '2020-02-19 14:45:00', '2020-02-19 14:45:00'),
(1491, 1, ' updated repository part with id 249, and part # 102-S', '2020-02-19 14:46:05', '2020-02-19 14:46:05'),
(1492, 1, ' updated image for part with id 249', '2020-02-19 14:46:54', '2020-02-19 14:46:54'),
(1493, 1, ' updated repository part with id 261, and part # 1170', '2020-02-19 14:47:50', '2020-02-19 14:47:50'),
(1494, 1, ' updated image for part with id 261', '2020-02-19 14:48:09', '2020-02-19 14:48:09'),
(1495, 1, ' updated repository part with id 262, and part # 1179', '2020-02-19 14:49:45', '2020-02-19 14:49:45'),
(1496, 1, ' updated image for part with id 262', '2020-02-19 14:50:05', '2020-02-19 14:50:05'),
(1497, 1, ' updated repository part with id 263, and part # 144', '2020-02-19 14:53:57', '2020-02-19 14:53:57'),
(1498, 1, ' updated image for part with id 263', '2020-02-19 14:54:14', '2020-02-19 14:54:14'),
(1499, 1, ' updated repository part with id 264, and part # 145', '2020-02-19 14:55:08', '2020-02-19 14:55:08'),
(1500, 1, ' updated image for part with id 264', '2020-02-19 14:55:20', '2020-02-19 14:55:20'),
(1501, 1, ' updated repository part with id 265, and part # 146', '2020-02-19 14:55:58', '2020-02-19 14:55:58'),
(1502, 1, ' updated image for part with id 265', '2020-02-19 14:56:09', '2020-02-19 14:56:09'),
(1503, 1, ' updated repository part with id 266, and part # 150', '2020-02-19 14:56:48', '2020-02-19 14:56:48'),
(1504, 1, ' updated image for part with id 266', '2020-02-19 14:57:02', '2020-02-19 14:57:02'),
(1505, 1, ' updated repository part with id 268, and part # 151-DC', '2020-02-19 15:00:35', '2020-02-19 15:00:35'),
(1506, 1, ' updated image for part with id 268', '2020-02-19 15:17:09', '2020-02-19 15:17:09'),
(1507, 1, ' updated repository part with id 269, and part # 1523-DC', '2020-02-19 15:19:41', '2020-02-19 15:19:41'),
(1508, 1, ' updated image for part with id 269', '2020-02-19 15:19:58', '2020-02-19 15:19:58'),
(1509, 1, ' updated repository part with id 267, and part # 152-DC', '2020-02-19 15:41:55', '2020-02-19 15:41:55'),
(1510, 1, ' updated image for part with id 267', '2020-02-19 15:42:16', '2020-02-19 15:42:16'),
(1511, 1, ' updated repository part with id 267, and part # 152-DC', '2020-02-19 15:50:12', '2020-02-19 15:50:12'),
(1512, 1, ' updated repository part with id 270, and part # 1522-DC', '2020-02-19 15:51:21', '2020-02-19 15:51:21'),
(1513, 1, ' updated image for part with id 270', '2020-02-19 15:51:48', '2020-02-19 15:51:48'),
(1514, 1, ' updated repository part with id 271, and part # 153-DC', '2020-02-19 15:53:06', '2020-02-19 15:53:06'),
(1515, 1, ' updated repository part with id 271, and part # 153-DC', '2020-02-19 15:53:25', '2020-02-19 15:53:25'),
(1516, 1, ' updated repository part with id 272, and part # 154-DC', '2020-02-19 15:53:49', '2020-02-19 15:53:49'),
(1517, 1, ' updated repository part with id 273, and part # 155-DC', '2020-02-19 15:54:10', '2020-02-19 15:54:10'),
(1518, 1, ' updated image for part with id 271', '2020-02-19 15:54:38', '2020-02-19 15:54:38'),
(1519, 1, ' updated image for part with id 272', '2020-02-19 15:55:01', '2020-02-19 15:55:01'),
(1520, 1, ' updated image for part with id 273', '2020-02-19 15:56:09', '2020-02-19 15:56:09'),
(1521, 1, ' updated repository part with id 274, and part # 160-DC', '2020-02-19 15:56:55', '2020-02-19 15:56:55'),
(1522, 1, ' updated image for part with id 274', '2020-02-19 15:57:12', '2020-02-19 15:57:12'),
(1523, 1, ' updated repository part with id 275, and part # 1907', '2020-02-19 16:00:15', '2020-02-19 16:00:15'),
(1524, 1, ' updated image for part with id 275', '2020-02-19 16:00:33', '2020-02-19 16:00:33'),
(1525, 1, ' updated repository part with id 277, and part # 2100', '2020-02-19 16:01:38', '2020-02-19 16:01:38'),
(1526, 1, ' updated image for part with id 277', '2020-02-19 16:02:29', '2020-02-19 16:02:29'),
(1527, 1, ' updated repository part with id 278, and part # 2110', '2020-02-19 16:02:48', '2020-02-19 16:02:48'),
(1528, 1, ' updated image for part with id 278', '2020-02-19 16:02:58', '2020-02-19 16:02:58'),
(1529, 1, ' updated repository part with id 279, and part # 2120', '2020-02-19 16:03:12', '2020-02-19 16:03:12'),
(1530, 1, ' updated image for part with id 279', '2020-02-19 16:03:25', '2020-02-19 16:03:25'),
(1531, 1, ' updated repository part with id 280, and part # 2150', '2020-02-19 16:05:42', '2020-02-19 16:05:42'),
(1532, 1, ' updated image for part with id 280', '2020-02-19 16:05:52', '2020-02-19 16:05:52'),
(1533, 1, ' updated repository part with id 281, and part # 250SRTI', '2020-02-19 16:15:04', '2020-02-19 16:15:04'),
(1534, 1, ' updated repository part with id 282, and part # 251SRTI', '2020-02-19 16:15:23', '2020-02-19 16:15:23'),
(1535, 1, ' updated repository part with id 283, and part # 253SRTI', '2020-02-19 16:16:13', '2020-02-19 16:16:13'),
(1536, 1, ' updated repository part with id 284, and part # 254SRTI', '2020-02-19 16:16:27', '2020-02-19 16:16:27'),
(1537, 1, ' updated repository part with id 285, and part # 255SRTI', '2020-02-19 16:16:45', '2020-02-19 16:16:45'),
(1538, 1, ' updated repository part with id 286, and part # 256SRTI', '2020-02-19 16:16:59', '2020-02-19 16:16:59'),
(1539, 1, ' updated repository part with id 287, and part # 257SRTI', '2020-02-19 16:17:10', '2020-02-19 16:17:10'),
(1540, 1, ' updated repository part with id 288, and part # 259SRTI', '2020-02-19 16:17:21', '2020-02-19 16:17:21'),
(1541, 1, ' updated image for part with id 281', '2020-02-19 16:17:49', '2020-02-19 16:17:49'),
(1542, 1, ' updated image for part with id 282', '2020-02-19 16:18:11', '2020-02-19 16:18:11'),
(1543, 1, ' updated image for part with id 283', '2020-02-19 16:18:29', '2020-02-19 16:18:29'),
(1544, 1, ' updated image for part with id 284', '2020-02-19 16:18:47', '2020-02-19 16:18:47'),
(1545, 1, ' updated image for part with id 285', '2020-02-19 16:19:04', '2020-02-19 16:19:04'),
(1546, 1, ' updated image for part with id 286', '2020-02-19 16:19:22', '2020-02-19 16:19:22'),
(1547, 1, ' updated image for part with id 282', '2020-02-19 16:40:13', '2020-02-19 16:40:13'),
(1548, 1, ' updated image for part with id 283', '2020-02-19 16:41:04', '2020-02-19 16:41:04'),
(1549, 1, ' updated image for part with id 284', '2020-02-19 16:45:08', '2020-02-19 16:45:08'),
(1550, 1, ' updated repository part with id 282, and part # 251-SRTI', '2020-02-19 16:45:36', '2020-02-19 16:45:36'),
(1551, 1, ' updated repository part with id 283, and part # 253-SRTI', '2020-02-19 16:45:45', '2020-02-19 16:45:45'),
(1552, 1, ' updated repository part with id 284, and part # 254-SRTI', '2020-02-19 16:45:55', '2020-02-19 16:45:55'),
(1553, 1, ' updated repository part with id 285, and part # 255-SRTI', '2020-02-19 16:46:06', '2020-02-19 16:46:06'),
(1554, 1, ' updated repository part with id 286, and part # 256-SRTI', '2020-02-19 16:46:15', '2020-02-19 16:46:15'),
(1555, 1, ' updated repository part with id 287, and part # 257-SRTI', '2020-02-19 16:46:23', '2020-02-19 16:46:23'),
(1556, 1, ' updated repository part with id 288, and part # 259-SRTI', '2020-02-19 16:46:31', '2020-02-19 16:46:31'),
(1557, 1, ' updated image for part with id 285', '2020-02-19 16:47:08', '2020-02-19 16:47:08'),
(1558, 1, ' updated image for part with id 286', '2020-02-19 16:48:25', '2020-02-19 16:48:25'),
(1559, 1, ' updated image for part with id 287', '2020-02-19 16:50:58', '2020-02-19 16:50:58'),
(1560, 1, ' updated image for part with id 288', '2020-02-19 16:51:18', '2020-02-19 16:51:18'),
(1561, 1, ' updated image for part with id 363', '2020-02-19 16:52:58', '2020-02-19 16:52:58'),
(1562, 1, ' updated repository part with id 281, and part # 250-SRTI', '2020-02-19 16:53:46', '2020-02-19 16:53:46'),
(1563, 1, ' updated repository part with id 289, and part # 260-SRTI', '2020-02-19 16:57:59', '2020-02-19 16:57:59'),
(1564, 1, ' updated repository part with id 290, and part # 261-SRTI', '2020-02-19 16:58:23', '2020-02-19 16:58:23'),
(1565, 1, ' updated repository part with id 291, and part # 262-SRTI', '2020-02-19 16:58:36', '2020-02-19 16:58:36'),
(1566, 1, ' updated repository part with id 292, and part # 263-SRTI', '2020-02-19 16:58:50', '2020-02-19 16:58:50'),
(1567, 1, ' updated repository part with id 293, and part # 264-SRTI', '2020-02-19 16:59:03', '2020-02-19 16:59:03'),
(1568, 1, ' updated repository part with id 294, and part # 266-SRTI', '2020-02-19 16:59:17', '2020-02-19 16:59:17'),
(1569, 1, ' updated repository part with id 295, and part # 267-SRT', '2020-02-19 16:59:46', '2020-02-19 16:59:46'),
(1570, 1, ' updated repository part with id 289, and part # 260-SRT', '2020-02-19 16:59:56', '2020-02-19 16:59:56'),
(1571, 1, ' updated repository part with id 290, and part # 261-SRT', '2020-02-19 17:00:02', '2020-02-19 17:00:02'),
(1572, 1, ' updated repository part with id 291, and part # 262-SRT', '2020-02-19 17:00:11', '2020-02-19 17:00:11'),
(1573, 1, ' updated repository part with id 292, and part # 263-SRT', '2020-02-19 17:00:18', '2020-02-19 17:00:18'),
(1574, 1, ' updated repository part with id 293, and part # 264-SRT', '2020-02-19 17:00:25', '2020-02-19 17:00:25'),
(1575, 1, ' updated repository part with id 294, and part # 266-SRT', '2020-02-19 17:00:34', '2020-02-19 17:00:34'),
(1576, 1, ' updated image for part with id 289', '2020-02-19 17:00:54', '2020-02-19 17:00:54'),
(1577, 1, ' updated image for part with id 290', '2020-02-19 17:01:13', '2020-02-19 17:01:13'),
(1578, 1, ' updated image for part with id 291', '2020-02-19 17:01:38', '2020-02-19 17:01:38'),
(1579, 1, ' updated image for part with id 292', '2020-02-19 17:02:26', '2020-02-19 17:02:26'),
(1580, 1, ' updated image for part with id 293', '2020-02-19 17:02:40', '2020-02-19 17:02:40'),
(1581, 1, ' updated image for part with id 294', '2020-02-19 17:02:58', '2020-02-19 17:02:58'),
(1582, 1, ' updated image for part with id 295', '2020-02-19 17:03:14', '2020-02-19 17:03:14'),
(1583, 1, ' updated repository part with id 296, and part # 267-RT', '2020-02-19 17:05:41', '2020-02-19 17:05:41'),
(1584, 1, ' updated image for part with id 296', '2020-02-19 17:06:00', '2020-02-19 17:06:00'),
(1585, 1, ' updated repository part with id 297, and part # 269', '2020-02-19 17:06:36', '2020-02-19 17:06:36'),
(1586, 1, ' updated image for part with id 297', '2020-02-19 17:11:22', '2020-02-19 17:11:22'),
(1587, 1, ' updated repository part with id 298, and part # 321', '2020-02-19 17:13:04', '2020-02-19 17:13:04'),
(1588, 1, ' updated image for part with id 298', '2020-02-19 17:13:25', '2020-02-19 17:13:25'),
(1589, 1, ' updated repository part with id 299, and part # 324', '2020-02-19 17:13:56', '2020-02-19 17:13:56'),
(1590, 1, ' updated image for part with id 299', '2020-02-19 17:14:07', '2020-02-19 17:14:07'),
(1591, 1, ' updated repository part with id 300, and part # 325', '2020-02-19 17:14:43', '2020-02-19 17:14:43'),
(1592, 1, ' updated image for part with id 300', '2020-02-19 17:14:56', '2020-02-19 17:14:56'),
(1593, 1, ' updated repository part with id 301, and part # 330', '2020-02-19 17:15:32', '2020-02-19 17:15:32'),
(1594, 1, ' updated image for part with id 301', '2020-02-19 17:15:42', '2020-02-19 17:15:42'),
(1595, 1, ' updated repository part with id 302, and part # 382DC', '2020-02-19 17:21:01', '2020-02-19 17:21:01'),
(1596, 1, ' updated repository part with id 302, and part # 382-DC', '2020-02-19 17:21:17', '2020-02-19 17:21:17'),
(1597, 1, ' updated repository part with id 303, and part # 384-DC', '2020-02-19 17:21:33', '2020-02-19 17:21:33'),
(1598, 1, ' updated repository part with id 304, and part # 385-DC', '2020-02-19 17:21:53', '2020-02-19 17:21:53'),
(1599, 1, ' updated repository part with id 305, and part # 386-DC', '2020-02-19 17:22:06', '2020-02-19 17:22:06'),
(1600, 1, ' updated repository part with id 306, and part # 387-DC', '2020-02-19 17:22:19', '2020-02-19 17:22:19'),
(1601, 1, ' updated repository part with id 307, and part # 388-DC', '2020-02-19 17:22:33', '2020-02-19 17:22:33'),
(1602, 1, ' updated repository part with id 308, and part # 390-DC', '2020-02-19 17:22:46', '2020-02-19 17:22:46'),
(1603, 1, ' updated image for part with id 302', '2020-02-19 17:23:09', '2020-02-19 17:23:09'),
(1604, 1, ' updated image for part with id 303', '2020-02-19 17:23:28', '2020-02-19 17:23:28'),
(1605, 1, ' updated image for part with id 304', '2020-02-19 17:23:44', '2020-02-19 17:23:44'),
(1606, 1, ' updated image for part with id 305', '2020-02-19 17:23:58', '2020-02-19 17:23:58'),
(1607, 1, ' updated image for part with id 306', '2020-02-19 17:24:15', '2020-02-19 17:24:15'),
(1608, 1, ' updated image for part with id 307', '2020-02-19 17:24:35', '2020-02-19 17:24:35'),
(1609, 1, ' updated image for part with id 308', '2020-02-19 17:24:51', '2020-02-19 17:24:51'),
(1610, 1, ' updated repository part with id 346, and part # RNW86510301', '2020-02-19 17:27:23', '2020-02-19 17:27:23'),
(1611, 1, ' updated image for part with id 346', '2020-02-19 17:30:03', '2020-02-19 17:30:03'),
(1612, 1, ' updated repository part with id 347, and part # RNW8651058', '2020-02-19 17:30:43', '2020-02-19 17:30:43'),
(1613, 1, ' updated image for part with id 347', '2020-02-19 17:32:00', '2020-02-19 17:32:00'),
(1614, 1, ' updated repository part with id 348, and part # RNW8651015', '2020-02-19 17:32:52', '2020-02-19 17:32:52'),
(1615, 1, ' updated image for part with id 348', '2020-02-19 17:33:52', '2020-02-19 17:33:52'),
(1616, 1, ' updated repository part with id 349, and part # RNW8651050', '2020-02-19 17:34:49', '2020-02-19 17:34:49'),
(1617, 1, ' updated image for part with id 349', '2020-02-19 17:35:46', '2020-02-19 17:35:46'),
(1618, 1, ' updated repository part with id 350, and part # RNW8651080', '2020-02-19 17:37:15', '2020-02-19 17:37:15'),
(1619, 1, ' updated image for part with id 350', '2020-02-19 17:38:06', '2020-02-19 17:38:06'),
(1620, 1, ' updated repository part with id 351, and part # RNW865-6848-01', '2020-02-19 17:40:50', '2020-02-19 17:40:50'),
(1621, 1, ' updated image for part with id 351', '2020-02-19 17:41:38', '2020-02-19 17:41:38'),
(1622, 1, ' created a new directory entry for Manufacturer - Discover Energy( Discover Energy Corp )', '2020-02-19 17:43:00', '2020-02-19 17:43:00'),
(1623, 1, ' updated repository part with id 353, and part # EV305-A', '2020-02-19 17:43:51', '2020-02-19 17:43:51'),
(1624, 1, ' updated image for part with id 353', '2020-02-19 17:46:36', '2020-02-19 17:46:36'),
(1625, 1, ' updated repository part with id 309, and part # 414-DC2', '2020-02-19 17:52:29', '2020-02-19 17:52:29'),
(1626, 1, ' updated image for part with id 309', '2020-02-19 17:52:47', '2020-02-19 17:52:47'),
(1627, 1, ' updated image for part with id 309', '2020-02-19 17:53:16', '2020-02-19 17:53:16'),
(1628, 1, ' updated repository part with id 310, and part # 416-DC2', '2020-02-19 17:53:37', '2020-02-19 17:53:37'),
(1629, 1, ' updated image for part with id 310', '2020-02-19 17:53:54', '2020-02-19 17:53:54'),
(1630, 1, ' updated repository part with id 311, and part # 432-SLTI', '2020-02-19 17:54:49', '2020-02-19 17:54:49'),
(1631, 1, ' updated image for part with id 311', '2020-02-19 17:56:00', '2020-02-19 17:56:00'),
(1632, 1, ' updated repository part with id 312, and part # 434-SLTI', '2020-02-20 09:40:41', '2020-02-20 09:40:41'),
(1633, 1, ' updated image for part with id 312', '2020-02-20 09:41:02', '2020-02-20 09:41:02'),
(1634, 1, ' updated repository part with id 313, and part # 472-SLTI', '2020-02-20 09:56:17', '2020-02-20 09:56:17'),
(1635, 1, ' updated image for part with id 313', '2020-02-20 10:24:22', '2020-02-20 10:24:22'),
(1636, 1, ' updated repository part with id 314, and part # 907-S', '2020-02-20 10:25:04', '2020-02-20 10:25:04'),
(1637, 1, ' updated image for part with id 314', '2020-02-20 10:27:24', '2020-02-20 10:27:24'),
(1638, 1, ' updated repository part with id 315, and part # 921-S', '2020-02-20 10:29:16', '2020-02-20 10:29:16'),
(1639, 1, ' updated image for part with id 315', '2020-02-20 10:29:41', '2020-02-20 10:29:41'),
(1640, 1, ' updated repository part with id 316, and part # 922-S', '2020-02-20 10:48:02', '2020-02-20 10:48:02'),
(1641, 1, ' updated repository part with id 317, and part # 923-S', '2020-02-20 12:19:39', '2020-02-20 12:19:39'),
(1642, 1, ' updated image for part with id 316', '2020-02-20 12:20:19', '2020-02-20 12:20:19'),
(1643, 1, ' updated image for part with id 317', '2020-02-20 12:21:10', '2020-02-20 12:21:10'),
(1644, 1, ' updated repository part with id 318, and part # 925-S', '2020-02-20 12:21:35', '2020-02-20 12:21:35'),
(1645, 1, ' updated image for part with id 318', '2020-02-20 12:21:52', '2020-02-20 12:21:52'),
(1646, 1, ' updated repository part with id 319, and part # 9796', '2020-02-20 12:29:05', '2020-02-20 12:29:05'),
(1647, 1, ' updated image for part with id 319', '2020-02-20 12:30:30', '2020-02-20 12:30:30'),
(1648, 1, ' updated repository part with id 320, and part # LB-41CG', '2020-02-20 12:34:24', '2020-02-20 12:34:24'),
(1649, 1, ' updated image for part with id 320', '2020-02-20 12:34:38', '2020-02-20 12:34:38'),
(1650, 1, ' updated repository part with id 321, and part # LB-42CG', '2020-02-20 12:34:54', '2020-02-20 12:34:54'),
(1651, 1, ' updated image for part with id 321', '2020-02-20 12:35:04', '2020-02-20 12:35:04'),
(1652, 1, ' updated repository part with id 322, and part # LB-44CG', '2020-02-20 12:35:32', '2020-02-20 12:35:32'),
(1653, 1, ' updated image for part with id 322', '2020-02-20 12:35:42', '2020-02-20 12:35:42'),
(1654, 1, ' updated repository part with id 323, and part # LB-45CG', '2020-02-20 12:35:57', '2020-02-20 12:35:57'),
(1655, 1, ' updated image for part with id 323', '2020-02-20 12:36:07', '2020-02-20 12:36:07'),
(1656, 1, ' updated repository part with id 324, and part # LB-46CG', '2020-02-20 12:36:24', '2020-02-20 12:36:24'),
(1657, 1, ' updated image for part with id 324', '2020-02-20 12:36:33', '2020-02-20 12:36:33'),
(1658, 1, ' updated repository part with id 325, and part # LB-48CG', '2020-02-20 12:36:51', '2020-02-20 12:36:51'),
(1659, 1, ' updated image for part with id 325', '2020-02-20 12:37:03', '2020-02-20 12:37:03'),
(1660, 1, ' updated repository part with id 326, and part # LB-50CG', '2020-02-20 12:37:30', '2020-02-20 12:37:30'),
(1661, 1, ' updated image for part with id 326', '2020-02-20 12:37:44', '2020-02-20 12:37:44'),
(1662, 1, ' updated repository part with id 327, and part # LL-41CG', '2020-02-20 12:38:55', '2020-02-20 12:38:55'),
(1663, 1, ' updated image for part with id 327', '2020-02-20 12:39:56', '2020-02-20 12:39:56'),
(1664, 1, ' updated repository part with id 328, and part # LL-42CG', '2020-02-20 12:40:52', '2020-02-20 12:40:52'),
(1665, 1, ' updated image for part with id 328', '2020-02-20 12:41:07', '2020-02-20 12:41:07'),
(1666, 1, ' updated repository part with id 329, and part # T-41CG', '2020-02-20 12:41:55', '2020-02-20 12:41:55'),
(1667, 1, ' updated repository part with id 330, and part # T-42CG', '2020-02-20 12:42:10', '2020-02-20 12:42:10'),
(1668, 1, ' updated image for part with id 329', '2020-02-20 12:43:14', '2020-02-20 12:43:14'),
(1669, 1, ' updated image for part with id 330', '2020-02-20 12:43:29', '2020-02-20 12:43:29'),
(1670, 1, ' updated repository part with id 331, and part # YC4L12', '2020-02-20 12:47:52', '2020-02-20 12:47:52'),
(1671, 1, ' updated image for part with id 331', '2020-02-20 12:48:07', '2020-02-20 12:48:07'),
(1672, 1, ' updated repository part with id 333, and part # EMT12', '2020-02-20 12:50:17', '2020-02-20 12:50:17'),
(1673, 1, ' updated image for part with id 333', '2020-02-20 12:54:33', '2020-02-20 12:54:33'),
(1674, 1, ' updated repository part with id 334, and part # EMT112', '2020-02-20 12:55:02', '2020-02-20 12:55:02'),
(1675, 1, ' updated image for part with id 334', '2020-02-20 12:55:15', '2020-02-20 12:55:15'),
(1676, 1, ' updated repository part with id 335, and part # EMT114', '2020-02-20 12:55:38', '2020-02-20 12:55:38'),
(1677, 1, ' updated image for part with id 335', '2020-02-20 12:55:50', '2020-02-20 12:55:50'),
(1678, 1, ' updated repository part with id 336, and part # EMT1', '2020-02-20 12:57:39', '2020-02-20 12:57:39'),
(1679, 1, ' updated image for part with id 336', '2020-02-20 12:57:52', '2020-02-20 12:57:52'),
(1680, 1, ' updated repository part with id 337, and part # EMT2', '2020-02-20 12:58:14', '2020-02-20 12:58:14'),
(1681, 1, ' updated repository part with id 338, and part # EMT212', '2020-02-20 12:58:33', '2020-02-20 12:58:33'),
(1682, 1, ' updated image for part with id 337', '2020-02-20 12:58:48', '2020-02-20 12:58:48'),
(1683, 1, ' updated image for part with id 338', '2020-02-20 12:59:04', '2020-02-20 12:59:04'),
(1684, 1, ' updated repository part with id 339, and part # EMT3', '2020-02-20 12:59:21', '2020-02-20 12:59:21'),
(1685, 1, ' updated image for part with id 339', '2020-02-20 12:59:32', '2020-02-20 12:59:32'),
(1686, 1, ' updated repository part with id 340, and part # EMT4', '2020-02-20 12:59:52', '2020-02-20 12:59:52'),
(1687, 1, ' updated image for part with id 340', '2020-02-20 13:00:10', '2020-02-20 13:00:10'),
(1688, 1, ' updated repository part with id 341, and part # GALV112', '2020-02-20 13:02:43', '2020-02-20 13:02:43'),
(1689, 1, ' updated repository part with id 342, and part # GALV2', '2020-02-20 13:03:00', '2020-02-20 13:03:00'),
(1690, 1, ' updated repository part with id 343, and part # GALV212', '2020-02-20 13:03:14', '2020-02-20 13:03:14'),
(1691, 1, ' updated repository part with id 344, and part # GALV34', '2020-02-20 13:03:29', '2020-02-20 13:03:29'),
(1692, 1, ' updated repository part with id 345, and part # GALV4', '2020-02-20 13:03:43', '2020-02-20 13:03:43'),
(1693, 1, ' updated image for part with id 341', '2020-02-20 13:03:56', '2020-02-20 13:03:56'),
(1694, 1, ' updated image for part with id 342', '2020-02-20 13:04:08', '2020-02-20 13:04:08'),
(1695, 1, ' updated image for part with id 343', '2020-02-20 13:04:22', '2020-02-20 13:04:22'),
(1696, 1, ' updated image for part with id 344', '2020-02-20 13:04:35', '2020-02-20 13:04:35'),
(1697, 1, ' updated image for part with id 345', '2020-02-20 13:04:47', '2020-02-20 13:04:47'),
(1698, 1, ' updated repository part with id 371, and part # LBLA-100', '2020-02-20 13:08:21', '2020-02-20 13:08:21'),
(1699, 1, ' updated image for part with id 371', '2020-02-20 13:09:08', '2020-02-20 13:09:08'),
(1700, 1, ' updated repository part with id 370, and part # LA-100', '2020-02-20 13:10:24', '2020-02-20 13:10:24'),
(1701, 1, ' updated image for part with id 370', '2020-02-20 13:11:01', '2020-02-20 13:11:01'),
(1702, 1, ' updated repository part with id 369, and part # L-806-CL', '2020-02-20 13:17:22', '2020-02-20 13:17:22'),
(1703, 1, ' updated image for part with id 369', '2020-02-20 13:17:39', '2020-02-20 13:17:39'),
(1704, 1, ' created a new directory entry for Manufacturer - MidNite Solar( MidNite Solar Inc. )', '2020-02-20 13:21:34', '2020-02-20 13:21:34'),
(1705, 1, ' created a new part in the repository with id , and part # MNPV3', '2020-02-20 13:25:22', '2020-02-20 13:25:22'),
(1706, 1, ' updated image for part with id 376', '2020-02-20 13:26:27', '2020-02-20 13:26:27'),
(1707, 1, ' updated repository part with id 368, and part # L-805-CL', '2020-02-20 13:26:46', '2020-02-20 13:26:46'),
(1708, 1, ' updated repository part with id 368, and part # L-805-CL', '2020-02-20 13:27:22', '2020-02-20 13:27:22'),
(1709, 1, ' updated image for part with id 368', '2020-02-20 13:27:36', '2020-02-20 13:27:36'),
(1710, 1, ' updated repository part with id 367, and part # L-40-4', '2020-02-20 13:30:17', '2020-02-20 13:30:17'),
(1711, 1, ' updated image for part with id 367', '2020-02-20 13:30:32', '2020-02-20 13:30:32'),
(1712, 1, ' updated repository part with id 366, and part # IL-708', '2020-02-20 13:31:49', '2020-02-20 13:31:49'),
(1713, 1, ' updated image for part with id 366', '2020-02-20 13:32:21', '2020-02-20 13:32:21'),
(1714, 1, ' updated repository part with id 365, and part # IL-44-3', '2020-02-20 13:34:09', '2020-02-20 13:34:09'),
(1715, 1, ' updated image for part with id 365', '2020-02-20 13:34:36', '2020-02-20 13:34:36'),
(1716, 5, ' updated repository part with id 174, and part # SB5000US-11', '2020-02-20 16:09:05', '2020-02-20 16:09:05'),
(1717, 5, ' updated tags for part with id 234', '2020-02-20 16:13:20', '2020-02-20 16:13:20'),
(1718, 5, ' updated tags for part with id 234', '2020-02-20 16:13:27', '2020-02-20 16:13:27'),
(1719, 5, ' updated tags for part with id 234', '2020-02-20 16:13:28', '2020-02-20 16:13:28'),
(1720, 5, ' updated repository part with id 174, and part # SB5000US-11', '2020-02-20 16:14:54', '2020-02-20 16:14:54'),
(1721, 5, ' updated tags for part with id 174', '2020-02-21 12:43:21', '2020-02-21 12:43:21'),
(1722, 5, ' updated tags for part with id 174', '2020-02-21 12:43:22', '2020-02-21 12:43:22'),
(1723, 5, ' updated tags for part with id 174', '2020-02-21 12:43:27', '2020-02-21 12:43:27'),
(1724, 5, ' updated tags for part with id 174', '2020-02-21 12:43:28', '2020-02-21 12:43:28'),
(1725, 5, ' updated tags for part with id 174', '2020-02-21 12:45:27', '2020-02-21 12:45:27'),
(1726, 5, ' updated tags for part with id 174', '2020-02-21 12:45:29', '2020-02-21 12:45:29'),
(1727, 5, ' updated tags for part with id 174', '2020-02-21 12:45:30', '2020-02-21 12:45:30'),
(1728, 5, ' updated tags for part with id 174', '2020-02-21 12:45:33', '2020-02-21 12:45:33'),
(1729, 31, ' created a new directory entry for Manufacturer - ACRSolar International(  )', '2020-02-24 10:04:34', '2020-02-24 10:04:34'),
(1730, 31, ' created a new directory entry for Supplier/Service - Desert States Electrical Sales(  )', '2020-02-24 10:05:18', '2020-02-24 10:05:18'),
(1731, 31, ' created a new directory entry for Supplier/Service - EcoFasten( EcoFasten )', '2020-02-24 10:05:56', '2020-02-24 10:05:56'),
(1732, 31, ' created a new directory entry for Supplier/Service - HPS-Hammond Power Solutions( HPS-Hammond Power Solutions )', '2020-02-24 10:06:44', '2020-02-24 10:06:44'),
(1733, 31, ' created a new directory entry for Partner - Renewable Energy Consortium( Renewable Energy Consortium )', '2020-02-24 10:07:54', '2020-02-24 10:07:54'),
(1734, 1, ' created a new part in the repository with id , and part # 1026', '2020-02-24 15:35:38', '2020-02-24 15:35:38'),
(1735, 1, ' updated repository part with id 250, and part # 1025', '2020-02-24 15:36:03', '2020-02-24 15:36:03'),
(1736, 1, ' updated image for part with id 377', '2020-02-24 15:36:43', '2020-02-24 15:36:43'),
(1737, 1, ' created a new part in the repository with id , and part # 1027', '2020-02-24 15:37:41', '2020-02-24 15:37:41'),
(1738, 1, ' updated image for part with id 378', '2020-02-24 15:38:05', '2020-02-24 15:38:05'),
(1739, 1, ' created a new part in the repository with id , and part # 1028', '2020-02-24 15:38:59', '2020-02-24 15:38:59'),
(1740, 1, ' created a new part in the repository with id , and part # 1029', '2020-02-24 15:39:39', '2020-02-24 15:39:39'),
(1741, 1, ' created a new part in the repository with id , and part # 1030', '2020-02-24 15:40:16', '2020-02-24 15:40:16'),
(1742, 1, ' updated image for part with id 379', '2020-02-24 15:40:40', '2020-02-24 15:40:40'),
(1743, 1, ' updated image for part with id 380', '2020-02-24 15:40:59', '2020-02-24 15:40:59'),
(1744, 1, ' updated image for part with id 381', '2020-02-24 15:41:21', '2020-02-24 15:41:21'),
(1745, 1, ' created a new part in the repository with id , and part # RNW 865-5548-01', '2020-02-24 15:43:34', '2020-02-24 15:43:34'),
(1746, 1, ' updated repository part with id 382, and part # RNW 865-5548-01', '2020-02-24 15:43:55', '2020-02-24 15:43:55'),
(1747, 1, ' updated image for part with id 382', '2020-02-24 15:44:27', '2020-02-24 15:44:27'),
(1748, 1, ' updated repository part with id 350, and part # RNW 865‑1080‑01', '2020-02-24 15:45:25', '2020-02-24 15:45:25'),
(1749, 1, ' updated repository part with id 349, and part # RNW 865-1050-01', '2020-02-24 15:46:02', '2020-02-24 15:46:02'),
(1750, 1, ' created a new part in the repository with id , and part # RNW 865-6848-21', '2020-02-24 15:48:32', '2020-02-24 15:48:32'),
(1751, 1, ' updated repository part with id 383, and part # RNW 865-6848-21', '2020-02-24 15:48:58', '2020-02-24 15:48:58'),
(1752, 1, ' updated repository part with id 383, and part # RNW 865-6848-21', '2020-02-24 15:49:14', '2020-02-24 15:49:14'),
(1753, 1, ' updated image for part with id 383', '2020-02-24 15:49:47', '2020-02-24 15:49:47'),
(1754, 1, ' updated repository part with id 348, and part # RNW 865-1015-01', '2020-02-24 15:50:38', '2020-02-24 15:50:38'),
(1755, 1, ' updated repository part with id 346, and part # RNW 865-1030-1', '2020-02-24 15:51:42', '2020-02-24 15:51:42'),
(1756, 1, ' updated repository part with id 347, and part # RNW 865-1058', '2020-02-24 15:53:46', '2020-02-24 15:53:46'),
(1757, 1, ' updated repository part with id 352, and part # RNW 865-1017', '2020-02-24 15:55:02', '2020-02-24 15:55:02'),
(1758, 1, ' updated repository part with id 352, and part # RNW 865-1017', '2020-02-24 15:59:14', '2020-02-24 15:59:14'),
(1759, 1, ' updated image for part with id 352', '2020-02-24 15:59:33', '2020-02-24 15:59:33'),
(1760, 1, ' updated image for part with id 352', '2020-02-24 16:00:29', '2020-02-24 16:00:29'),
(1761, 5, ' updated directory information for Vendor - ASH( ASH AUTO SAFETY HOUSE )', '2020-02-27 10:00:40', '2020-02-27 10:00:40'),
(1762, 1, ' created a new directory entry for Manufacturer - Southwire( Southwire Company, LLC )', '2020-02-27 15:29:35', '2020-02-27 15:29:35'),
(1763, 1, ' created new stakeholder correspondence forSalt River Project', '2020-03-03 09:53:53', '2020-03-03 09:53:53'),
(1764, 1, ' created a new directory entry for Partner - Gary Lederer( Gary Lederer )', '2020-03-04 15:24:54', '2020-03-04 15:24:54'),
(1765, 1, ' created a new contact Gary Lederer', '2020-03-04 15:25:42', '2020-03-04 15:25:42'),
(1766, 1, ' created a new address 5191 N 85th Ave Glendale, Arizona 85305 for company Gary Lederer', '2020-03-04 16:22:39', '2020-03-04 16:22:39'),
(1767, 1, ' updated address for company Gary Lederer', '2020-03-04 16:22:47', '2020-03-04 16:22:47'),
(1768, 1, ' updated address for company Gary Lederer', '2020-03-04 16:22:53', '2020-03-04 16:22:53'),
(1769, 1, ' created news forArizona Public Service', '2020-03-05 16:43:40', '2020-03-05 16:43:40'),
(1770, 1, ' created news forArizona Public Service', '2020-03-05 16:44:14', '2020-03-05 16:44:14'),
(1771, 1, ' added new dashboard module ERP Updates', '2020-03-05 16:49:52', '2020-03-05 16:49:52'),
(1772, 1, ' added permissions for Administrator to manage Form Builder Misc', '2020-03-05 20:01:38', '2020-03-05 20:01:38'),
(1773, 1, ' added permissions for Administrator to manage Weather Application', '2020-03-05 20:02:54', '2020-03-05 20:02:54'),
(1774, 1, ' added permissions for Administrator to manage Manage Utility Rates', '2020-03-05 20:03:13', '2020-03-05 20:03:13'),
(1775, 5, ' updated tags for part with id 209', '2020-03-06 07:43:46', '2020-03-06 07:43:46'),
(1776, 5, ' updated repository part with id 209, and part # 01018', '2020-03-06 07:46:36', '2020-03-06 07:46:36'),
(1777, 5, ' updated image for part with id 209', '2020-03-06 07:47:53', '2020-03-06 07:47:53'),
(1778, 5, ' updated repository part with id 215, and part # 816003', '2020-03-06 08:18:15', '2020-03-06 08:18:15'),
(1779, 5, ' updated image for part with id 215', '2020-03-06 08:25:47', '2020-03-06 08:25:47'),
(1780, 5, ' updated image for part with id 355', '2020-03-06 08:28:05', '2020-03-06 08:28:05'),
(1781, 5, ' updated image for part with id 355', '2020-03-06 08:28:20', '2020-03-06 08:28:20'),
(1782, 5, ' updated image for part with id 356', '2020-03-06 08:28:57', '2020-03-06 08:28:57'),
(1783, 5, ' updated repository part with id 216, and part # 801057', '2020-03-06 08:30:31', '2020-03-06 08:30:31'),
(1784, 5, ' updated image for part with id 216', '2020-03-06 08:30:54', '2020-03-06 08:30:54'),
(1785, 5, ' updated tags for part with id 213', '2020-03-06 08:31:13', '2020-03-06 08:31:13'),
(1786, 5, ' updated repository part with id 213, and part # P00333238', '2020-03-06 08:31:39', '2020-03-06 08:31:39'),
(1787, 5, ' updated image for part with id 213', '2020-03-06 08:32:40', '2020-03-06 08:32:40'),
(1788, 5, ' updated tags for part with id 332', '2020-03-06 08:35:12', '2020-03-06 08:35:12'),
(1789, 5, ' updated image for part with id 332', '2020-03-06 08:36:50', '2020-03-06 08:36:50'),
(1790, 5, ' updated image for part with id 158', '2020-03-06 08:49:17', '2020-03-06 08:49:17'),
(1791, 5, ' updated image for part with id 159', '2020-03-06 08:52:07', '2020-03-06 08:52:07'),
(1792, 5, ' updated image for part with id 160', '2020-03-06 08:52:20', '2020-03-06 08:52:20'),
(1793, 1, ' created a new weather app location at Phoenix, Arizona', '2020-03-11 20:11:29', '2020-03-11 20:11:29'),
(1794, 1, ' created a new weather app location at Yuma, Arizona', '2020-03-11 20:14:06', '2020-03-11 20:14:06');
INSERT INTO `activities` (`id`, `user_id`, `activity`, `updated_at`, `created_at`) VALUES
(1795, 1, ' created a new weather app location at Tucson, Arizona', '2020-03-11 20:14:27', '2020-03-11 20:14:27'),
(1796, 1, ' added permissions for Internal to manage Weather Application', '2020-03-12 09:33:22', '2020-03-12 09:33:22'),
(1797, 5, ' created a new weather app location at Flagstaff, Arizona', '2020-03-12 12:42:27', '2020-03-12 12:42:27'),
(1798, 1, ' created new user Danny Diaz with username danny and user id 33', '2020-03-12 14:44:54', '2020-03-12 14:44:54'),
(1799, 1, ' updated user danny with user id 33', '2020-03-12 16:17:39', '2020-03-12 16:17:39'),
(1800, 1, ' added permissions for Sales Manager to manage Weather Application', '2020-03-12 16:17:54', '2020-03-12 16:17:54'),
(1801, 1, ' added permissions for Sales to manage Weather Application', '2020-03-12 16:18:01', '2020-03-12 16:18:01'),
(1802, 1, ' added permissions for Sales Manager to manage View Directory', '2020-03-12 16:18:28', '2020-03-12 16:18:28'),
(1803, 1, ' added permissions for Sales to manage View Directory', '2020-03-12 16:18:34', '2020-03-12 16:18:34'),
(1804, 1, ' removed permissions for Administrator to manage Manage Directory Company', '2020-03-12 16:47:41', '2020-03-12 16:47:41'),
(1805, 1, ' removed permissions for Project Manager to manage Manage Directory Company', '2020-03-12 16:47:45', '2020-03-12 16:47:45'),
(1806, 1, ' added permissions for Administrator to manage View Manage Directory Company', '2020-03-12 16:49:21', '2020-03-12 16:49:21'),
(1807, 1, ' added permissions for Sales to manage View Manage Directory Company', '2020-03-12 16:53:16', '2020-03-12 16:53:16'),
(1808, 1, ' added permissions for Sales Manager to manage View Manage Directory Company', '2020-03-12 16:53:18', '2020-03-12 16:53:18'),
(1809, 1, ' added permissions for Internal to manage View Manage Directory Company', '2020-03-12 16:53:29', '2020-03-12 16:53:29'),
(1810, 1, ' added permissions for Administrator to manage Manage Directory Company', '2020-03-12 16:53:34', '2020-03-12 16:53:34'),
(1811, 33, ' created new sales team member Daniel James Diaz with id 3', '2020-03-12 16:55:25', '2020-03-12 16:55:25'),
(1812, 31, ' created a new directory entry for Partner - CKC - Charles Kirkland Companies( Charles Kirkland Companies )', '2020-03-16 13:51:40', '2020-03-16 13:51:40'),
(1813, 1, ' added permissions for Internal to manage Manage Directory Company', '2020-03-16 13:58:02', '2020-03-16 13:58:02'),
(1814, 1, ' updated directory information for Partner - MLWP( Mesquite Lake Water & Power LLC )', '2020-03-16 22:31:20', '2020-03-16 22:31:20'),
(1815, 1, ' updated directory information for Supplier - Copy Express( Copy Express )', '2020-03-16 22:42:26', '2020-03-16 22:42:26'),
(1816, 1, ' updated directory information for Vendor - Desert States Electrical Sales(  )', '2020-03-16 22:43:02', '2020-03-16 22:43:02'),
(1817, 1, ' updated directory information for Partner - Arizona Accurate Solar and Air Conditioning( Arizona Accurate Solar and Air Conditioning )', '2020-03-16 22:43:57', '2020-03-16 22:43:57'),
(1818, 1, ' updated directory information for Other - Renewable Energy Consortium( Renewable Energy Consortium )', '2020-03-16 22:44:13', '2020-03-16 22:44:13'),
(1819, 1, ' updated directory information for Vendor - De Fusco( De Fusco Industrial Supply )', '2020-03-16 22:44:34', '2020-03-16 22:44:34'),
(1820, 1, ' updated directory information for Manufacturer - HPS-Hammond Power Solutions( HPS-Hammond Power Solutions )', '2020-03-16 22:44:55', '2020-03-16 22:44:55'),
(1821, 1, ' updated directory information for Manufacturer - Mage Solar( Mage Solar Projects, Inc. )', '2020-03-16 22:45:13', '2020-03-16 22:45:13'),
(1822, 1, ' updated directory information for Supplier - Starling Madison( Starling Madison Lofquist Inc )', '2020-03-16 22:46:04', '2020-03-16 22:46:04'),
(1823, 1, ' updated directory information for Partner - Taylor Made Electric( Taylor Made Electric )', '2020-03-16 22:46:16', '2020-03-16 22:46:16'),
(1824, 31, ' created a new directory entry for CKC - Charles Kirkland Companies( Charles Kirkland Companies )', '2020-03-17 08:48:11', '2020-03-17 08:48:11'),
(1825, 31, ' created a new contact Hillari Tischler', '2020-03-17 08:50:15', '2020-03-17 08:50:15'),
(1826, 31, ' created a new contact Kathleen Kulesza', '2020-03-17 08:51:34', '2020-03-17 08:51:34'),
(1827, 31, ' created a new contact Lori Estrada', '2020-03-17 08:53:19', '2020-03-17 08:53:19'),
(1828, 31, ' created a new contact Stephanie Rivera', '2020-03-17 08:54:03', '2020-03-17 08:54:03'),
(1829, 31, ' created a new contact Nathan Samp', '2020-03-17 08:55:06', '2020-03-17 08:55:06'),
(1830, 31, ' created a new contact Rick Lucchesi', '2020-03-18 13:22:34', '2020-03-18 13:22:34'),
(1831, 31, ' created a new contact Cesar Ochoa', '2020-03-18 13:23:51', '2020-03-18 13:23:51'),
(1832, 31, ' created a new contact Dan Cooper', '2020-03-18 13:27:59', '2020-03-18 13:27:59'),
(1833, 31, ' created a new contact Jared Horton', '2020-03-18 13:33:57', '2020-03-18 13:33:57'),
(1834, 31, ' created a new contact Bruce Rasmussen', '2020-03-18 13:35:06', '2020-03-18 13:35:06'),
(1835, 31, ' created a new directory entry for Supplier/Service - Desert States Electrical Sales( Desert States Electrical Sales )', '2020-03-18 13:36:11', '2020-03-18 13:36:11'),
(1836, 31, ' created a new contact Joel Keck', '2020-03-18 13:37:31', '2020-03-18 13:37:31'),
(1837, 31, ' created a new directory entry for Supplier/Service - Quick Mount PV( Quick Mount PV )', '2020-03-18 13:46:04', '2020-03-18 13:46:04'),
(1838, 31, ' created a new contact Kelli Ross', '2020-03-18 13:47:35', '2020-03-18 13:47:35'),
(1839, 31, ' created a new contact Eric Gjersvig', '2020-03-18 13:50:00', '2020-03-18 13:50:00'),
(1840, 31, ' created a new contact James Powell', '2020-03-18 14:01:22', '2020-03-18 14:01:22'),
(1841, 31, ' created a new contact Chris Crump', '2020-03-18 14:07:47', '2020-03-18 14:07:47'),
(1842, 31, ' created a new contact Matt Kelly', '2020-03-18 14:09:51', '2020-03-18 14:09:51'),
(1843, 31, ' created a new directory entry for Vendor - Empire/Cat( Empire )', '2020-03-18 14:11:14', '2020-03-18 14:11:14'),
(1844, 31, ' created a new directory entry for Manufacturer - A4 & T( A4 & T )', '2020-03-18 14:13:24', '2020-03-18 14:13:24'),
(1845, 31, ' created a new contact Ademilua Ayo', '2020-03-18 14:14:27', '2020-03-18 14:14:27'),
(1846, 31, ' created a new contact Amy Pryor', '2020-03-18 14:15:34', '2020-03-18 14:15:34'),
(1847, 31, ' created a new contact Juan Fernando -Salcido', '2020-03-18 14:18:01', '2020-03-18 14:18:01'),
(1848, 31, ' created a new contact Gibson Daoud', '2020-03-19 09:11:30', '2020-03-19 09:11:30'),
(1849, 31, ' created a new contact Darrin Russell', '2020-03-19 09:15:59', '2020-03-19 09:15:59'),
(1850, 31, ' created a new contact Christina Gutierrez', '2020-03-19 09:17:23', '2020-03-19 09:17:23'),
(1851, 31, ' created a new contact Nicole Dorris', '2020-03-19 09:34:26', '2020-03-19 09:34:26'),
(1852, 31, ' updated contact sean Gafvert', '2020-03-19 09:35:49', '2020-03-19 09:35:49'),
(1853, 31, ' updated contact Sean Gafvert', '2020-03-19 09:36:04', '2020-03-19 09:36:04'),
(1854, 31, ' created a new contact Eddie Baker', '2020-03-19 09:37:56', '2020-03-19 09:37:56'),
(1855, 31, ' created a new contact Juan Rubio', '2020-03-19 09:39:33', '2020-03-19 09:39:33'),
(1856, 31, ' created a new contact Jay Miller', '2020-03-19 09:41:17', '2020-03-19 09:41:17'),
(1857, 31, ' created a new contact Lauren Dorsey', '2020-03-19 09:42:48', '2020-03-19 09:42:48'),
(1858, 31, ' created a new contact Kathryn Cleary', '2020-03-19 09:43:51', '2020-03-19 09:43:51'),
(1859, 31, ' updated contact James Rees', '2020-03-19 09:44:04', '2020-03-19 09:44:04'),
(1860, 31, ' created a new contact Brian Becker', '2020-03-19 11:21:47', '2020-03-19 11:21:47'),
(1861, 31, ' created a new contact Jeb Ejstrin', '2020-03-19 11:26:11', '2020-03-19 11:26:11'),
(1862, 31, ' created a new contact Jacqueline Ponce', '2020-03-19 11:39:43', '2020-03-19 11:39:43'),
(1863, 31, ' created a new contact Jacqueline Ponce', '2020-03-19 11:39:54', '2020-03-19 11:39:54'),
(1864, 31, ' created a new contact Joe Shipka', '2020-03-19 11:43:26', '2020-03-19 11:43:26'),
(1865, 31, ' created a new contact Aziz Halal', '2020-03-19 11:44:39', '2020-03-19 11:44:39'),
(1866, 31, ' created a new directory entry for Vendor - Copy Exress( Copy Express )', '2020-03-19 11:46:25', '2020-03-19 11:46:25'),
(1867, 31, ' created a new contact Barrie Blum', '2020-03-19 11:47:20', '2020-03-19 11:47:20'),
(1868, 31, ' created a new contact David Schweers', '2020-03-19 11:56:22', '2020-03-19 11:56:22'),
(1869, 31, ' created a new contact Doug East', '2020-03-19 12:04:13', '2020-03-19 12:04:13'),
(1870, 31, ' created a new contact Chuck Trujillo', '2020-03-19 12:27:08', '2020-03-19 12:27:08'),
(1871, 31, ' created a new directory entry for Manufacturer - Dancor LLC( Dancor LLC )', '2020-03-19 12:32:59', '2020-03-19 12:32:59'),
(1872, 31, ' created a new contact Allen Amis', '2020-03-19 12:35:05', '2020-03-19 12:35:05'),
(1873, 31, ' created a new contact David Howard', '2020-03-19 12:46:53', '2020-03-19 12:46:53'),
(1874, 31, ' created a new contact Daniel Castillo', '2020-03-19 12:48:02', '2020-03-19 12:48:02'),
(1875, 31, ' created a new contact Ignacio Portugal', '2020-03-19 12:53:25', '2020-03-19 12:53:25'),
(1876, 31, ' created a new contact Terry Parker', '2020-03-19 12:55:15', '2020-03-19 12:55:15'),
(1877, 31, ' created a new directory entry for Vendor - Kyocera( Kyocera )', '2020-03-19 13:03:05', '2020-03-19 13:03:05'),
(1878, 31, ' created a new contact Craig Robertson', '2020-03-19 13:04:47', '2020-03-19 13:04:47'),
(1879, 31, ' created a new contact Tom Carter', '2020-03-19 13:07:35', '2020-03-19 13:07:35'),
(1880, 31, ' created a new directory entry for Supplier/Service - Lederer Power LLC( Lederer Power LLC )', '2020-03-19 13:09:21', '2020-03-19 13:09:21'),
(1881, 31, ' created a new contact Gary Lederer', '2020-03-19 13:10:26', '2020-03-19 13:10:26'),
(1882, 31, ' created a new directory entry for Utility - FH Reprographics( FH Reprographics )', '2020-03-19 13:11:52', '2020-03-19 13:11:52'),
(1883, 31, ' created a new directory entry for Supplier/Service - FH Reprographics( FH Reprographics )', '2020-03-19 13:12:32', '2020-03-19 13:12:32'),
(1884, 31, ' created a new directory entry for Utility - Lookout Engineering( Lookout Engineering )', '2020-03-19 13:28:52', '2020-03-19 13:28:52'),
(1885, 31, ' updated directory information for Supplier - Lookout Engineering( Lookout Engineering )', '2020-03-19 13:29:45', '2020-03-19 13:29:45'),
(1886, 31, ' updated directory information for Manufacturer - Renewable Energy Consortium( Renewable Energy Consortium )', '2020-03-19 13:31:59', '2020-03-19 13:31:59'),
(1887, 31, ' created a new directory entry for Supplier/Service - Lookout Engineering( Lookout Engineering )', '2020-03-19 13:33:38', '2020-03-19 13:33:38'),
(1888, 31, ' created a new contact Gary Hancock', '2020-03-19 13:34:39', '2020-03-19 13:34:39'),
(1889, 31, ' created a new contact Donald Wodash Sr', '2020-03-19 13:55:04', '2020-03-19 13:55:04'),
(1890, 31, ' created a new contact Dennis McKay', '2020-03-19 13:58:00', '2020-03-19 13:58:00'),
(1891, 31, ' created a new directory entry for Supplier/Service - Management Concepts PLC( Management Concepts PLC )', '2020-03-20 10:34:06', '2020-03-20 10:34:06'),
(1892, 31, ' created a new contact C Rex Olson', '2020-03-20 10:35:19', '2020-03-20 10:35:19'),
(1893, 31, ' updated directory information for Vendor - Management Concepts PLC( Management Concepts PLC )', '2020-03-20 10:35:41', '2020-03-20 10:35:41'),
(1894, 31, ' created a new directory entry for Manufacturer - Image Solar( Image Solar )', '2020-03-20 10:43:36', '2020-03-20 10:43:36'),
(1895, 31, ' created a new contact Wayne Lee', '2020-03-20 10:44:58', '2020-03-20 10:44:58'),
(1896, 31, ' updated directory information for Manufacturer - Mage Solar( Mage Solar )', '2020-03-20 10:45:32', '2020-03-20 10:45:32'),
(1897, 31, ' created a new contact Harry Luker', '2020-03-20 10:47:23', '2020-03-20 10:47:23'),
(1898, 31, ' created a new contact Curtis Moldenhauer', '2020-03-20 10:48:42', '2020-03-20 10:48:42'),
(1899, 31, ' updated directory information for Manufacturer - Ewing-Foley, Inc.( Ewing-Foley Inc. )', '2020-03-20 10:49:04', '2020-03-20 10:49:04'),
(1900, 31, ' created a new contact Karl Stone', '2020-03-20 10:51:39', '2020-03-20 10:51:39'),
(1901, 31, ' created a new contact Tom Albanesuis', '2020-03-20 10:52:56', '2020-03-20 10:52:56'),
(1902, 31, ' updated directory information for Vendor - Nippon Express( Nippon Express USA, Inc. )', '2020-03-20 10:54:30', '2020-03-20 10:54:30'),
(1903, 31, ' created a new contact Don Nash', '2020-03-20 11:01:29', '2020-03-20 11:01:29'),
(1904, 31, ' created a new contact Ron Olmstead', '2020-03-20 11:04:14', '2020-03-20 11:04:14'),
(1905, 31, ' created a new contact MacKenzie Davis', '2020-03-20 11:16:20', '2020-03-20 11:16:20'),
(1906, 1, ' updated information for employee Stephen G Hieb with id 7', '2021-09-05 18:49:29', '2021-09-05 18:49:29'),
(1907, 1, ' updated information for employee James T Schafnit with id 9', '2021-09-05 18:49:47', '2021-09-05 18:49:47'),
(1908, 1, ' updated information for employee Rocio Alma Velasquez with id 8', '2021-09-05 18:50:04', '2021-09-05 18:50:04'),
(1909, 1, ' added new dashboard module Mashed Potatoes', '2021-09-05 18:50:44', '2021-09-05 18:50:44'),
(1910, 1, ' removed dashboard module My Tasks', '2021-09-05 18:50:55', '2021-09-05 18:50:55'),
(1911, 1, ' updated tags for part with id 267', '2021-09-05 23:40:16', '2021-09-05 23:40:16'),
(1912, 1, ' added new dashboard module Mashed Potatoes', '2021-09-05 23:41:10', '2021-09-05 23:41:10'),
(1913, 1, ' removed dashboard module My Tasks', '2021-09-05 23:41:18', '2021-09-05 23:41:18'),
(1914, 1, ' added new dashboard module My Tasks', '2021-09-07 01:09:43', '2021-09-07 01:09:43'),
(1915, 1, ' removed dashboard module My Tasks', '2021-09-07 01:09:57', '2021-09-07 01:09:57'),
(1916, 1, ' created new user Sales with username sales and user id 34', '2021-09-07 01:31:33', '2021-09-07 01:31:33'),
(1917, 1, ' created new user justin tidwell with username justin and user id 35', '2021-09-07 16:33:21', '2021-09-07 16:33:21'),
(1918, 1, ' removed training course Test Course', '2021-09-08 03:20:26', '2021-09-08 03:20:26'),
(1919, 1, ' removed training course Test 23', '2021-09-08 03:33:08', '2021-09-08 03:33:08'),
(1920, 1, ' created a new training course named atest with id 4', '2021-09-08 03:33:25', '2021-09-08 03:33:25'),
(1921, 1, ' removed training course atest', '2021-09-08 03:33:33', '2021-09-08 03:33:33'),
(1922, 1, ' created a new training course named adfasdfas with id 5', '2021-09-08 03:33:39', '2021-09-08 03:33:39'),
(1923, 1, ' removed training course adfasdfas', '2021-09-08 03:42:01', '2021-09-08 03:42:01'),
(1924, 1, ' created a new training course named Lock Out / Tag Out with id 6', '2021-09-08 03:42:27', '2021-09-08 03:42:27'),
(1925, 1, ' created a new training slide Slide 1 with id 19', '2021-09-08 03:42:57', '2021-09-08 03:42:57'),
(1926, 1, ' created a new training slide Slide 1 with id 20', '2021-09-08 03:44:46', '2021-09-08 03:44:46'),
(1927, 1, ' deleted a training slide Slide 1 with id 19', '2021-09-08 03:44:54', '2021-09-08 03:44:54'),
(1928, 1, ' created a new training slide Slide 2 with id 21', '2021-09-08 03:45:31', '2021-09-08 03:45:31'),
(1929, 1, ' created a new training slide Slide 3 with id 22', '2021-09-08 03:45:50', '2021-09-08 03:45:50'),
(1930, 1, ' scheduled training Lock Out / Tag Out for Stephen G Hieb', '2021-09-08 03:46:45', '2021-09-08 03:46:45'),
(1931, 2, ' unscheduled training Lock Out / Tag Out for Stephen G Hieb', '2021-09-08 22:30:11', '2021-09-08 22:30:11'),
(1932, 2, ' scheduled training Lock Out / Tag Out for Stephen G Hieb', '2021-09-08 22:30:24', '2021-09-08 22:30:24'),
(1933, 35, ' added a vendor with id 73 for part with id 158', '2021-09-08 22:34:58', '2021-09-08 22:34:58'),
(1934, 35, ' removed vendor with id 22 for part with id 158', '2021-09-08 22:35:14', '2021-09-08 22:35:14'),
(1935, 1, ' added new dashboard module Mashed Potatoes', '2021-09-10 23:19:37', '2021-09-10 23:19:37'),
(1936, 1, ' removed dashboard module My Tasks', '2021-09-28 22:41:56', '2021-09-28 22:41:56'),
(1937, 1, ' created a new training course named Electrical Safety & Arc Flash Hazard Awareness with id 7', '2021-10-07 20:35:27', '2021-10-07 20:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ahj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdivision` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zoning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `use_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `city`, `state`, `zip`, `ahj`, `apn`, `subdivision`, `lot`, `zoning`, `use_code`, `created_at`, `updated_at`) VALUES
(6, '12345 W Unknown St', 'Scottsdale', 'AZ', '85000', NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-24 13:47:12', '2019-09-24 13:54:02'),
(5, '324 S. Horne St.', 'Mesa', 'AZ', '85204', NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-30 11:34:18', '2021-09-05 18:50:04'),
(4, '1949 W Utopia Rd', 'Phoenix', 'AZ', '85027', NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 21:00:33', '2021-09-05 18:49:29'),
(7, '3682 S Puesta Del Sol Ave', 'Yuma', 'AZ', '85365', NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-24 13:49:33', '2019-09-24 13:49:33'),
(8, '3313 N 68th St Unit #108E', 'Scottsdale', 'AZ', '85251', NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-24 14:00:35', '2021-09-05 18:49:47'),
(9, '537 W Caroline ln', 'Chandler', 'AZ', '85225', NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-24 14:03:05', '2019-09-24 14:03:05'),
(10, '5191 N 85th Ave', 'Glendale', 'Arizona', '85305', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-04 16:22:39', '2020-03-04 16:22:53'),
(11, '1739 W Mohawk Ln', 'Phoenix', 'AZ', '85027', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-12 16:55:25', '2020-03-12 16:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `type` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `name`, `type`, `description`, `updated_at`, `created_at`) VALUES
(1, 'Field Safety Observation', '1', 'Field Safety Audit used by Field Coordinators and Crew Leads', '2018-06-17 23:24:38', '2018-06-17 23:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `audit_types`
--

CREATE TABLE `audit_types` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `audit_types`
--

INSERT INTO `audit_types` (`id`, `name`) VALUES
(1, 'Safety');

-- --------------------------------------------------------

--
-- Table structure for table `channel_partners`
--

CREATE TABLE `channel_partners` (
  `id` bigint(10) NOT NULL,
  `org_id` bigint(10) DEFAULT NULL,
  `cp_company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_main_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `cp_taxid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_partners_addresses`
--

CREATE TABLE `channel_partners_addresses` (
  `id` bigint(10) NOT NULL,
  `channel_partner_id` bigint(10) NOT NULL,
  `address_id` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel_partners_addresses`
--

INSERT INTO `channel_partners_addresses` (`id`, `channel_partner_id`, `address_id`) VALUES
(1, 1, 6),
(2, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `channel_partners_contacts_addresses`
--

CREATE TABLE `channel_partners_contacts_addresses` (
  `id` bigint(10) NOT NULL,
  `channel_partner_id` bigint(10) NOT NULL,
  `contact_id` bigint(10) NOT NULL,
  `address_id` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_legal_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internal_nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_legal_name`, `internal_nickname`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Arizona Public Service', 'Arizona Public Service Company', 'APS', 'Utility', '2018-06-12 07:00:00', '2018-06-12 07:00:00'),
(2, 'Salt River Project', 'Salt River Project', 'SRP', 'Utility', '2018-06-16 11:22:43', '2018-06-16 11:29:23'),
(3, 'L. H. Dottie Company', 'L. H. Dottie Company', 'Dottie', 'Manufacturer', '2019-01-21 00:37:25', '2019-01-21 00:37:25'),
(4, 'Consolidated Electrical Distributors', 'Consolidated Electrical Distributors, Inc', 'CED GreenTech', 'Vendor', '2019-01-21 06:04:10', '2019-01-21 06:04:10'),
(5, 'Brown Wholesale Electric (Wesco)', 'Brown Wholesale Electric, A Division of Wesco', 'Wesco', 'Vendor', '2019-03-09 00:57:16', '2019-03-09 00:57:16'),
(6, 'Siemens', NULL, 'Siemens', 'Manufacturer', '2019-03-11 16:59:07', '2019-03-11 16:59:07'),
(7, 'Red Mountain Lighting', 'Red Mountain Lighting LLC', 'RML', 'CKC', '2019-04-03 15:36:48', '2019-04-03 15:36:48'),
(8, 'Fronius', 'Fronius USA LLC', 'Fronius', 'Manufacturer', '2019-04-15 13:24:54', '2019-04-15 13:24:54'),
(9, 'SMA', 'SMA Solar Technology AG', 'SMA', 'Manufacturer', '2019-04-15 13:27:32', '2019-04-15 13:27:32'),
(10, 'Solar Edge', 'Solar Edge Technologies Inc', 'Solar Edge', 'Manufacturer', '2019-04-15 13:30:49', '2019-04-15 13:30:49'),
(11, 'Hanwha', 'Hanwha Energy', 'Hanwha', 'Manufacturer', '2019-04-15 13:31:56', '2019-04-15 13:31:56'),
(12, 'Trina Solar', 'Trina Solar', 'Trina', 'Manufacturer', '2019-04-15 13:34:16', '2019-04-15 13:34:23'),
(13, 'LG', 'LG Electronics', 'LG', 'Manufacturer', '2019-04-15 13:34:59', '2019-04-15 13:34:59'),
(14, 'S-Energy', 'S-Energy Co.', 'S-Energy', 'Manufacturer', '2019-04-15 13:36:37', '2019-04-15 13:36:37'),
(15, 'Sun Edison', 'Sun Edison Inc', 'Sun Edison', 'Manufacturer', '2019-04-15 13:38:10', '2019-04-15 13:38:10'),
(16, 'Yingli Solar', 'Yingli Green Energy Holding Company Limited', 'Yingli', 'Manufacturer', '2019-04-15 13:41:32', '2019-04-15 13:41:32'),
(17, 'Centro Solar', 'Centro Solar America Inc', 'Centro Solar', 'Manufacturer', '2019-04-15 13:42:36', '2019-04-15 13:42:36'),
(18, 'Growatt', 'Growatt New Energy Technology Co LTD', 'Growatt', 'Manufacturer', '2019-04-15 14:04:01', '2019-04-15 14:04:01'),
(19, 'ABB', 'ABB', 'A-B-B', 'Manufacturer', '2019-04-15 14:05:45', '2019-04-15 14:05:55'),
(20, 'Mesa Electric', 'City of Mesa Electric Utility', 'Electrical de Mesa!!', 'Utility', '2019-04-15 14:13:49', '2019-04-15 14:13:49'),
(21, 'Tuson Electric Power', 'Tucson Electric Power', 'TEP', 'Utility', '2019-04-15 14:15:54', '2019-04-15 14:15:54'),
(22, 'Ontility', 'Ontility', 'Ontiltiy', 'Vendor', '2019-04-23 11:03:39', '2019-04-23 11:03:39'),
(23, 'Square D', 'Square D by Schneider Electric', 'SQD', 'Manufacturer', '2019-07-16 14:00:36', '2019-07-16 14:00:36'),
(24, 'Burndy', 'Burndy LLC', 'Burndy', 'Manufacturer', '2019-07-17 10:41:10', '2019-07-19 11:38:39'),
(25, 'COND', NULL, 'COND', 'Manufacturer', '2019-07-17 10:41:33', '2019-07-17 10:41:33'),
(26, 'Eaton', NULL, 'Eaton', 'Manufacturer', '2019-07-17 10:42:08', '2019-07-17 10:42:08'),
(27, 'FIT', NULL, 'FIT', 'Manufacturer', '2019-07-17 10:42:21', '2019-07-17 10:42:21'),
(28, 'Leviton', NULL, 'Levition', 'Manufacturer', '2019-07-17 10:43:20', '2019-09-15 16:27:51'),
(29, 'Little Fuse', NULL, 'LF', 'Manufacturer', '2019-07-17 10:43:39', '2019-07-17 10:43:39'),
(30, 'Milbank', NULL, 'Mil', 'Manufacturer', '2019-07-17 10:44:16', '2019-07-17 10:44:16'),
(31, 'Unirc', NULL, 'Unirc', 'Manufacturer', '2019-07-17 10:44:41', '2019-07-17 10:44:41'),
(32, 'Wire', NULL, 'Wire', 'Manufacturer', '2019-07-17 10:44:57', '2019-07-17 10:44:57'),
(33, 'Flex', NULL, 'Flex', 'Manufacturer', '2019-07-17 10:45:20', '2019-07-17 10:45:20'),
(34, 'Heyco', NULL, 'Heyco', 'Manufacturer', '2019-07-17 10:45:35', '2019-07-17 10:45:35'),
(35, 'Ideal Energy', NULL, 'Ideal', 'Manufacturer', '2019-07-17 10:45:51', '2019-07-17 10:45:51'),
(36, 'PVC', NULL, 'PVC', 'Manufacturer', '2019-07-17 10:46:13', '2019-07-17 10:46:13'),
(37, 'Simpson', NULL, 'Simpson', 'Manufacturer', '2019-07-17 14:29:09', '2019-07-17 14:29:09'),
(38, 'Eco-Fasten Solar', NULL, 'Eco Fasten', 'Manufacturer', '2019-07-17 14:33:29', '2019-07-17 14:33:29'),
(39, 'Quick Mount PV', NULL, 'Quick Mount', 'Manufacturer', '2019-07-17 14:35:17', '2019-07-17 14:35:17'),
(40, 'IronRidge', NULL, 'IronRidge', 'Manufacturer', '2019-07-17 14:40:05', '2019-07-17 14:40:05'),
(58, '3M', '3M', '3M', 'Manufacturer', '2019-09-23 10:05:20', '2019-09-23 10:05:20'),
(42, 'Grip Rite', NULL, 'Grip Rite', 'Manufacturer', '2019-07-17 15:03:06', '2019-09-15 16:28:40'),
(59, 'Arlington', 'Arlington Industries, INC', 'ARL', 'Manufacturer', '2019-09-23 10:07:53', '2019-09-23 10:08:01'),
(44, 'Fastener Center', NULL, 'Fastener Center', 'Manufacturer', '2019-07-17 15:10:21', '2019-07-17 15:10:21'),
(45, 'Sammy\'s', NULL, 'Sammy\'s', 'Manufacturer', '2019-07-17 15:10:35', '2019-07-17 15:10:35'),
(46, 'Copper State', NULL, 'Copper State', 'Manufacturer', '2019-07-17 15:10:55', '2019-07-17 15:10:55'),
(47, 'Powers', NULL, 'Powers', 'Manufacturer', '2019-07-17 15:11:13', '2019-07-17 15:11:13'),
(48, 'Penn Union', NULL, 'Penn Union', 'Manufacturer', '2019-07-17 15:11:33', '2019-07-17 15:11:33'),
(49, 'Bridgeport', NULL, 'BPT', 'Manufacturer', '2019-07-17 15:26:02', '2019-07-17 15:26:02'),
(50, 'Topaz', NULL, 'Topaz', 'Manufacturer', '2019-07-17 15:26:19', '2019-07-17 15:26:19'),
(51, 'Madison Electrical', NULL, 'Madison', 'Manufacturer', '2019-07-17 15:26:40', '2019-07-17 15:26:40'),
(52, 'Misc', NULL, 'Misc', 'Manufacturer', '2019-07-17 15:53:11', '2019-07-17 15:53:11'),
(53, 'B-Line', NULL, 'B-Line', 'Manufacturer', '2019-07-17 16:03:36', '2019-07-17 16:03:36'),
(54, 'JA Solar', NULL, 'JA Solar', 'Manufacturer', '2019-07-18 15:46:42', '2019-07-18 15:46:42'),
(55, 'Halex', NULL, 'Halex', 'Manufacturer', '2019-07-19 11:34:55', '2019-07-19 11:34:55'),
(56, 'Huawei', 'Huawei Technologies Co.', 'Huawei', 'Manufacturer', '2019-07-19 11:36:31', '2019-07-19 11:41:19'),
(60, 'Schneider Electric Solar - Conext', 'Schneider Electric Solar', 'Conext', 'Manufacturer', '2019-09-23 10:11:07', '2019-09-23 10:11:07'),
(61, 'APPLETON', 'APPLETON ELECTRICAL', 'APP', 'Manufacturer', '2019-09-23 10:14:05', '2019-09-23 10:14:05'),
(62, 'Bussmann By Eaton', 'Eaton', 'Buss', 'Manufacturer', '2019-09-23 13:25:33', '2019-09-23 13:25:33'),
(63, 'Auto Glass Clinic', 'Auto Glass Clinic', 'Auto', 'Supplier/Service', '2019-12-27 10:24:08', '2019-12-27 10:24:08'),
(64, 'Affordable Solar', 'Affordable Solar', 'Affordable', 'Supplier/Service', '2019-12-27 10:24:43', '2019-12-27 10:24:43'),
(65, 'Ahern Rentals', 'Ahern Rentals', 'Ahern', 'Supplier/Service', '2019-12-27 10:26:06', '2019-12-27 10:26:06'),
(66, 'City of Casa Grande', 'City of Casa Grande', 'Casa Grande', 'Municipality', '2019-12-27 10:32:39', '2019-12-27 10:32:39'),
(161, 'Charles Kirkland Companies', 'Charles Kirkland Companies', 'CKC', 'CKC', '2020-03-17 08:48:11', '2020-03-17 08:48:11'),
(68, 'Baker\'s Electric', 'Baker\'s Electric', 'Baker\'s', 'Supplier/Service', '2019-12-27 10:41:47', '2019-12-27 10:41:47'),
(69, 'Border Construction', 'Border Construction Specialities', 'Border', 'Vendor', '2019-12-27 10:43:11', '2019-12-27 10:43:11'),
(151, 'Discover Energy', 'Discover Energy Corp', 'Discover', 'Manufacturer', '2020-02-19 17:43:00', '2020-02-19 17:43:00'),
(71, 'Copper State Bolt & Nut', 'Copper State Bolt & Nut', 'Copper State', 'Vendor', '2019-12-27 11:01:53', '2019-12-27 11:01:53'),
(72, 'Yuma County', 'Department of Development Services', 'Yuma County', 'Municipality', '2019-12-27 11:04:20', '2019-12-27 11:04:20'),
(73, 'Heyco Products', 'Heyco Products, Inc,', 'Heyco', 'Vendor', '2019-12-27 11:07:03', '2019-12-27 11:07:03'),
(74, 'IES', 'Independent Electric Supply, Inc,', 'IES', 'Vendor', '2019-12-27 11:08:58', '2019-12-27 11:08:58'),
(75, 'Phoenix Welding', 'Phoenix Welding Supply Co', 'Phoenix Welding', 'Vendor', '2019-12-27 11:15:50', '2019-12-27 11:15:50'),
(76, 'AE Advanced Energy', 'AE Advanced Energy', 'AG', 'Manufacturer', '2019-12-27 11:39:24', '2019-12-27 11:39:24'),
(77, 'AZ Rack', 'AZ Rack', 'AZ Rack', 'Manufacturer', '2019-12-27 11:41:54', '2019-12-27 11:41:54'),
(78, 'Canadian Solar', 'Canadian Solor', 'Canadian Solar', 'Manufacturer', '2019-12-27 11:44:22', '2019-12-27 11:44:22'),
(79, 'Buse Industries', 'Buse Industries', 'Buse', 'Manufacturer', '2019-12-27 11:56:50', '2019-12-27 11:56:50'),
(80, 'Chargepoint', 'Chargepoint', 'Chargepoint', 'Manufacturer', '2019-12-27 11:59:29', '2019-12-27 11:59:29'),
(81, 'Chilicon Power', 'Chilicon Power', 'Chilicon Power', 'Manufacturer', '2019-12-27 12:20:15', '2019-12-27 12:20:15'),
(82, 'City of Eloy', 'City of Eloy', 'City of Eloy', 'Municipality', '2019-12-27 12:27:00', '2019-12-27 12:27:00'),
(83, 'CertainTeed', 'CertainTeed', 'CertainTeed', 'Manufacturer', '2019-12-27 12:31:12', '2019-12-27 12:31:12'),
(84, 'Enphase Energy', 'Enphase Energy', 'Enphase Energy', 'Manufacturer', '2019-12-27 12:35:37', '2019-12-27 12:35:37'),
(85, 'Kyocera', 'Kyocera', 'Kyocera', 'Manufacturer', '2019-12-27 12:37:45', '2019-12-27 12:37:45'),
(86, 'Fronius', 'Fronius USA', 'Fronius', 'Manufacturer', '2019-12-27 12:40:01', '2019-12-27 12:40:01'),
(87, 'Milwaukee Tool', 'Milwaukee Tool', 'Milwaukee', 'Manufacturer', '2019-12-27 12:42:29', '2019-12-27 12:42:29'),
(88, 'Nerktar Energy', 'Nektar Energy', 'Nektar Energy', 'Manufacturer', '2019-12-27 12:44:55', '2019-12-27 12:44:55'),
(89, 'QCells', 'QCells', 'QCells', 'Manufacturer', '2019-12-27 12:49:59', '2019-12-27 12:49:59'),
(90, 'Pinal County', 'Pinal County', 'Pinal County', 'Municipality', '2019-12-27 12:51:44', '2019-12-27 12:51:44'),
(91, 'Performed Line Products', 'Performed Line Products', 'PLP', 'Manufacturer', '2019-12-27 12:53:37', '2019-12-27 12:53:37'),
(92, 'Start Lighting', 'Start Lighting', 'Start Lighting', 'Manufacturer', '2019-12-27 12:55:27', '2019-12-27 12:55:27'),
(93, 'Solar IQ', 'Solar IQ', 'Solar IQ', 'Manufacturer', '2019-12-27 13:09:42', '2019-12-27 13:09:42'),
(94, 'Shade N Net', 'Shade N Net', 'Shade N Net', 'Manufacturer', '2019-12-27 13:15:25', '2019-12-27 13:15:25'),
(95, 'Sun Edison', 'Sun Edison', 'Sun Edison', 'Manufacturer', '2019-12-27 13:20:41', '2019-12-27 13:20:41'),
(96, 'Wesco Distribution', 'Wesco Distribution', 'Wesco', 'Manufacturer', '2019-12-27 13:29:14', '2019-12-27 13:29:14'),
(97, 'Zep Solar', 'Zep Solar', 'Zep Solar', 'Manufacturer', '2019-12-27 13:38:00', '2019-12-27 13:38:00'),
(98, 'Maricopa County', 'Maricopa County', 'Maricopa County', 'Municipality', '2019-12-27 13:56:54', '2019-12-27 13:56:54'),
(99, 'Hammond Power Solutions', 'Hammond Power Solutions', 'Hammond Power Solutions', 'Manufacturer', '2019-12-27 14:04:44', '2019-12-27 14:04:44'),
(100, 'Bob Jones & Associates', 'Bob Jones', 'Bob Jones', 'Supplier/Service', '2020-01-02 09:54:42', '2020-01-02 09:54:42'),
(101, 'ADP', 'ADP', 'ADP', 'Supplier/Service', '2020-01-02 09:56:00', '2020-01-02 09:56:00'),
(102, 'ASH', 'ASH AUTO SAFETY HOUSE', 'ASH', 'Vendor', '2020-01-02 09:56:53', '2020-02-27 10:00:40'),
(103, 'Arizona Accurate Solar and Air Conditioning', 'Arizona Accurate Solar and Air Conditioning', 'Arizona Accurate', 'Partner', '2020-01-02 09:59:18', '2020-03-16 22:43:57'),
(104, 'Battery Systems of Phoenix', 'Battery Systems of Phoenix', 'Battery Systems', 'Supplier/Service', '2020-01-02 10:00:45', '2020-01-02 10:00:45'),
(105, 'Arizona Ready Mix Concrete', 'Arizona Ready Mix Concrete', 'Arizona Ready Mix Concrete', 'Supplier/Service', '2020-01-02 10:01:23', '2020-01-02 10:01:23'),
(106, 'Burns & McDonnell', 'Burns & McDonnell', 'Burns & McDonnell', 'Supplier/Service', '2020-01-02 10:08:38', '2020-01-02 10:08:38'),
(107, 'CPI Building Services', 'CPI Building Services, Inc,', 'CPI', 'Supplier/Service', '2020-01-02 10:25:42', '2020-01-02 10:25:42'),
(108, 'Connect 202', 'Connect 202 Partners', 'Connect 202', 'Supplier/Service', '2020-01-02 10:30:25', '2020-01-02 10:30:25'),
(109, 'Marbecc', 'Marbecc Custom Designs, LLC', 'Marbecc', 'Supplier/Service', '2020-01-02 10:31:10', '2020-01-02 10:31:10'),
(110, 'Crescent Moon Enterprises', 'Crescent Moon Enterprises, Inc.', 'Crescent Moon', 'Supplier/Service', '2020-01-02 10:34:40', '2020-01-02 10:34:40'),
(111, 'ETA Engineering', 'ETA Engineering, Inc.', 'ETA', 'Supplier/Service', '2020-01-02 10:36:29', '2020-01-02 10:36:29'),
(112, 'Dominion Real Estate', 'Dominion Real Estate Partners, LLC', 'Dominion Real Estate', 'Supplier/Service', '2020-01-02 10:37:18', '2020-01-02 10:37:18'),
(113, 'David R Howard', 'David R Howard Electric, Inc.', 'David R Howard', 'Supplier/Service', '2020-01-02 10:42:51', '2020-01-02 10:42:51'),
(114, 'Copy Express', 'Copy Express', 'Copy Express', 'Supplier', '2020-01-02 10:43:50', '2020-03-16 22:42:26'),
(115, 'Solar Mining', 'Solar Mining', 'Solar Mining', 'Supplier/Service', '2020-01-02 10:45:10', '2020-01-02 10:45:10'),
(116, 'De Fusco', 'De Fusco Industrial Supply', 'De Fusco', 'Vendor', '2020-01-02 10:46:43', '2020-03-16 22:44:34'),
(117, 'DC Welding', 'DC Welding', 'DC Welding', 'Supplier/Service', '2020-01-02 10:47:17', '2020-01-02 10:47:17'),
(118, 'Home Remodel Service', 'Home Remodel Service', 'Home Remodel Service', 'Supplier/Service', '2020-01-02 10:48:35', '2020-01-02 10:48:35'),
(119, 'J Ryan Electric', 'J Ryan Electric', 'J Ryan Electric', 'Supplier/Service', '2020-01-02 10:49:47', '2020-01-02 10:49:47'),
(120, 'RH Reprographics', 'RH Reprographics', 'RH Reprographics', 'Supplier/Service', '2020-01-02 10:50:54', '2020-01-02 10:50:54'),
(121, 'Infinergy', 'Infinergy Wind & Solar', 'Infinergy', 'Supplier/Service', '2020-01-02 10:51:53', '2020-01-02 10:51:53'),
(122, 'Mage Solar', 'Mage Solar Projects, Inc.', 'Mage Solara', 'Manufacturer', '2020-01-02 10:56:36', '2020-03-16 22:45:13'),
(123, 'MLWP', 'Mesquite Lake Water & Power LLC', 'Mesquite Lake Water', 'Partner', '2020-01-02 10:57:29', '2020-03-16 22:31:20'),
(124, 'McKay Electrical', 'McKay Electrical Agents', 'McKay Electrical', 'Supplier/Service', '2020-01-02 10:58:11', '2020-01-02 10:58:11'),
(125, 'Luker Plumbing', 'Luker Plumbing', 'Luker Plumbing', 'Supplier/Service', '2020-01-02 10:58:43', '2020-01-02 10:58:43'),
(126, 'Ewing-Foley, Inc.', 'Ewing-Foley Inc.', 'Ewing-Foley', 'Manufacturer', '2020-01-02 10:59:39', '2020-03-20 10:49:04'),
(127, 'Midtown Signs', 'Midtown Signs', 'Midtown Signs', 'Supplier/Service', '2020-01-02 11:00:14', '2020-01-02 11:00:14'),
(128, 'Steel Service Center', 'Steel Service Center', 'Steel Service Center', 'Supplier/Service', '2020-01-02 11:03:24', '2020-01-02 11:03:24'),
(129, 'Kowalski', 'Kowalski Electrical Division', 'Kowalski', 'Supplier/Service', '2020-01-02 11:03:55', '2020-01-02 11:03:55'),
(130, 'Nippon Express', 'Nippon Express USA, Inc.', 'Nippon Express', 'Vendor', '2020-01-02 11:04:31', '2020-03-20 10:54:30'),
(131, 'Gryphon Companies', 'Gryphon Companies, Inc.  Roofing & Construction', 'Gryphon Companies', 'Supplier/Service', '2020-01-02 11:09:42', '2020-01-02 11:09:42'),
(132, 'Pew Land Surveying', 'Pew Land Surveying, LLC', 'Pew Land', 'Supplier/Service', '2020-01-02 11:14:01', '2020-01-02 11:14:01'),
(133, 'Peterson Associates', 'Peterson Associates Consulting Engineers, Inc.', 'Peterson Associates', 'Supplier/Service', '2020-01-02 11:15:27', '2020-01-02 11:15:27'),
(134, 'Pacific Office', 'Pacific Office Automation', 'Pacific Office', 'Supplier/Service', '2020-01-02 11:15:52', '2020-01-02 11:15:52'),
(135, 'Pop-Off', 'Pop-Off Construction', 'Pop-Off', 'Supplier/Service', '2020-01-02 11:16:24', '2020-01-02 11:16:24'),
(136, 'Phoenix Contracting', 'Phoenix Contracting Services, Inc.', 'Phoenix Contracting', 'Supplier/Service', '2020-01-02 11:17:28', '2020-01-02 11:17:28'),
(137, 'Ritchie Bros', 'Ritchie Bros Auctioneeers', 'Ritchie Bros', 'Supplier/Service', '2020-01-02 11:18:01', '2020-01-02 11:18:01'),
(138, 'Rogers Corp', 'Rogers Corporation/Advanced Connectivity Solutions', 'Rogers Corp', 'Supplier/Service', '2020-01-02 11:19:27', '2020-01-02 11:19:27'),
(139, 'Solar Electric Systems', 'Solar Electric Systems p& Products, Inc,', 'Solar Electric', 'Supplier/Service', '2020-01-02 11:29:21', '2020-01-02 11:29:21'),
(140, 'S.E. Consultants', 'S.E. Consultants, Inc,', 'S.E. Consultants', 'Supplier/Service', '2020-01-02 11:32:31', '2020-01-02 11:32:31'),
(141, 'SEGI', 'SEGI', 'SEGI', 'Supplier/Service', '2020-01-02 11:33:02', '2020-01-02 11:33:02'),
(142, 'Syndic Sales', 'Syndic Sales, Inc,', 'Syndic Sales', 'Supplier/Service', '2020-01-02 11:33:56', '2020-01-02 11:33:56'),
(143, 'S N J Construction', 'S N J Construction', 'S N J', 'Supplier/Service', '2020-01-02 11:34:53', '2020-01-02 11:34:53'),
(144, 'Taylor Made Electric', 'Taylor Made Electric', 'Taylor Made Electric', 'Partner', '2020-01-02 11:35:28', '2020-03-16 22:46:16'),
(145, 'Verde Valley Rentals', 'Verde Valley Rentals', 'Verde Valley', 'Supplier/Service', '2020-01-02 11:36:16', '2020-01-02 11:36:16'),
(146, 'Vintage Iron', 'Vintage, Iron & Restoration', 'Vintage Iron', 'Supplier/Service', '2020-01-02 11:37:01', '2020-01-02 11:37:01'),
(147, 'Starling Madison', 'Starling Madison Lofquist Inc', 'SML', 'Supplier', '2020-01-02 11:37:47', '2020-03-16 22:46:04'),
(148, 'Western & Southern Life', 'Western & Southerb Life', 'Western & Southerb', 'Supplier/Service', '2020-01-02 11:38:23', '2020-01-02 11:38:23'),
(149, 'Shermco Industries', 'SI', 'SI - Shermco Industries', 'Supplier/Service', '2020-01-08 09:38:50', '2020-01-08 09:38:50'),
(150, 'Lawson Products', 'Lawson Products', 'Lawson', 'Supplier/Service', '2020-01-31 10:22:15', '2020-01-31 10:22:15'),
(152, 'MidNite Solar', 'MidNite Solar Inc.', 'MidNite', 'Manufacturer', '2020-02-20 13:21:34', '2020-02-20 13:21:34'),
(153, 'ACRSolar International', NULL, 'ACRSolar', 'Manufacturer', '2020-02-24 10:04:34', '2020-02-24 10:04:34'),
(154, 'Desert States Electrical Sales', NULL, 'Desert States', 'Vendor', '2020-02-24 10:05:18', '2020-03-16 22:43:02'),
(155, 'EcoFasten', 'EcoFasten', 'EcoFasten', 'Supplier/Service', '2020-02-24 10:05:56', '2020-02-24 10:05:56'),
(156, 'HPS-Hammond Power Solutions', 'HPS-Hammond Power Solutions', 'HPS', 'Manufacturer', '2020-02-24 10:06:44', '2020-03-16 22:44:55'),
(157, 'Renewable Energy Consortium', 'Renewable Energy Consortium', 'Renewable Energy Consortium', 'Manufacturer', '2020-02-24 10:07:54', '2020-03-19 13:31:59'),
(158, 'Southwire', 'Southwire Company, LLC', 'Southwire', 'Manufacturer', '2020-02-27 15:29:35', '2020-02-27 15:29:35'),
(159, 'Gary Lederer', 'Gary Lederer', 'Gary Lederer', 'Partner', '2020-03-04 15:24:54', '2020-03-04 15:24:54'),
(160, 'CKC - Charles Kirkland Companies', 'Charles Kirkland Companies', 'CKC', 'CKC', '2020-03-16 13:51:40', '2020-03-16 13:51:40'),
(162, 'Desert States Electrical Sales', 'Desert States Electrical Sales', 'Desert States', 'Supplier/Service', '2020-03-18 13:36:11', '2020-03-18 13:36:11'),
(163, 'Quick Mount PV', 'Quick Mount PV', 'Quick Mount', 'Supplier/Service', '2020-03-18 13:46:04', '2020-03-18 13:46:04'),
(164, 'Empire/Cat', 'Empire', 'Emmpire', 'Vendor', '2020-03-18 14:11:14', '2020-03-18 14:11:14'),
(165, 'A4 & T', 'A4 & T', 'A4 & T', 'Manufacturer', '2020-03-18 14:13:24', '2020-03-18 14:13:24'),
(166, 'Copy Exress', 'Copy Express', 'Copy Express', 'Vendor', '2020-03-19 11:46:25', '2020-03-19 11:46:25'),
(167, 'Dancor LLC', 'Dancor LLC', 'Dancor', 'Manufacturer', '2020-03-19 12:32:59', '2020-03-19 12:32:59'),
(168, 'Kyocera', 'Kyocera', 'Kyocera', 'Vendor', '2020-03-19 13:03:05', '2020-03-19 13:03:05'),
(169, 'Lederer Power LLC', 'Lederer Power LLC', 'Lederer Power', 'Supplier/Service', '2020-03-19 13:09:20', '2020-03-19 13:09:20'),
(170, 'FH Reprographics', 'FH Reprographics', 'F', 'Utility', '2020-03-19 13:11:52', '2020-03-19 13:11:52'),
(171, 'FH Reprographics', 'FH Reprographics', 'FH Reprographics', 'Supplier/Service', '2020-03-19 13:12:32', '2020-03-19 13:12:32'),
(172, 'Lookout Engineering', 'Lookout Engineering', 'Lookout Engineering', 'Supplier', '2020-03-19 13:28:52', '2020-03-19 13:29:45'),
(173, 'Lookout Engineering', 'Lookout Engineering', 'Lookout Engineering', 'Supplier/Service', '2020-03-19 13:33:38', '2020-03-19 13:33:38'),
(174, 'Management Concepts PLC', 'Management Concepts PLC', 'Management Concepts', 'Vendor', '2020-03-20 10:34:06', '2020-03-20 10:35:41'),
(175, 'Mage Solar', 'Mage Solar', 'Mage Solar', 'Manufacturer', '2020-03-20 10:43:36', '2020-03-20 10:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `companies_addresses`
--

CREATE TABLE `companies_addresses` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `address_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies_addresses`
--

INSERT INTO `companies_addresses` (`id`, `company_id`, `address_id`) VALUES
(1, 159, 10);

-- --------------------------------------------------------

--
-- Table structure for table `companies_contacts`
--

CREATE TABLE `companies_contacts` (
  `id` int(10) NOT NULL,
  `company_id` int(5) NOT NULL,
  `contact_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `companies_contacts`
--

INSERT INTO `companies_contacts` (`id`, `company_id`, `contact_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 2, 5),
(5, 66, 6),
(6, 66, 7),
(7, 1, 8),
(8, 69, 9),
(9, 69, 10),
(10, 69, 11),
(11, 70, 12),
(12, 70, 13),
(13, 70, 14),
(14, 70, 15),
(15, 70, 16),
(16, 67, 17),
(17, 67, 18),
(18, 72, 19),
(19, 73, 20),
(20, 74, 21),
(21, 74, 22),
(22, 74, 23),
(23, 74, 24),
(24, 75, 25),
(25, 7, 26),
(26, 7, 27),
(27, 7, 28),
(28, 7, 29),
(29, 2, 30),
(30, 2, 31),
(31, 2, 32),
(32, 19, 33),
(33, 76, 34),
(34, 77, 35),
(35, 78, 36),
(36, 78, 37),
(37, 79, 38),
(38, 80, 39),
(39, 81, 40),
(40, 81, 41),
(41, 17, 42),
(42, 17, 43),
(43, 17, 44),
(44, 82, 45),
(45, 83, 46),
(46, 84, 47),
(47, 85, 48),
(48, 86, 49),
(49, 87, 50),
(50, 88, 51),
(51, 89, 52),
(52, 90, 53),
(53, 91, 54),
(54, 92, 55),
(55, 39, 56),
(56, 9, 57),
(57, 9, 58),
(58, 9, 59),
(59, 9, 60),
(60, 93, 61),
(61, 60, 62),
(62, 94, 63),
(63, 95, 64),
(64, 95, 65),
(65, 95, 66),
(66, 96, 67),
(67, 96, 68),
(68, 96, 69),
(69, 96, 70),
(70, 96, 71),
(71, 96, 72),
(72, 96, 73),
(73, 97, 74),
(74, 34, 75),
(75, 83, 76),
(76, 99, 77),
(77, 39, 78),
(78, 4, 80),
(79, 159, 81),
(80, 66, 18),
(81, 160, 82),
(82, 160, 83),
(83, 160, 84),
(84, 160, 85),
(85, 160, 86),
(86, 105, 87),
(87, 108, 88),
(88, 105, 89),
(89, 130, 90),
(90, 131, 91),
(91, 162, 92),
(92, 163, 93),
(93, 99, 94),
(94, 98, 95),
(95, 5, 96),
(96, 15, 97),
(97, 165, 98),
(98, 100, 99),
(99, 149, 100),
(100, 63, 101),
(101, 64, 102),
(102, 65, 103),
(103, 101, 104),
(104, 68, 105),
(105, 102, 106),
(106, 103, 107),
(107, 4, 108),
(108, 4, 109),
(109, 4, 110),
(110, 106, 111),
(111, 107, 112),
(112, 107, 113),
(113, 109, 114),
(114, 110, 115),
(115, 166, 116),
(116, 111, 117),
(117, 115, 118),
(118, 116, 119),
(119, 167, 120),
(120, 113, 121),
(121, 117, 122),
(122, 118, 123),
(123, 119, 124),
(124, 168, 125),
(125, 121, 126),
(126, 169, 127),
(127, 173, 128),
(128, 127, 129),
(129, 124, 130),
(130, 174, 131),
(131, 175, 132),
(132, 125, 133),
(133, 126, 134),
(134, 128, 135),
(135, 129, 136),
(136, 137, 137),
(137, 138, 138),
(138, 139, 139);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `middle_name`, `last_name`, `title`, `cell_phone`, `home_phone`, `work_phone`, `email1`, `email2`, `created_at`, `updated_at`) VALUES
(1, 'Cindy', 'L', 'Young', NULL, '4805936465', NULL, NULL, 'cinyou@cox.net', NULL, '2019-09-24 14:03:05', '2019-09-24 14:03:05'),
(2, 'Jeanie', NULL, 'Guardino', 'Customer Project Manager', '6023196133', NULL, '6023717256', 'jean.guardino@aps.com', NULL, '2019-12-27 10:15:46', '2019-12-27 15:19:27'),
(3, 'Richard', NULL, 'Berdahl', NULL, '6023162634', NULL, '4804460171', 'richard.berdhal@aps.com', NULL, '2019-12-27 10:17:18', '2019-12-27 10:17:18'),
(4, 'Dan', NULL, 'Collins', NULL, '6028031803', NULL, '6023716962', 'daniel.collins@aps.com', NULL, '2019-12-27 10:18:39', '2019-12-27 10:18:39'),
(5, 'Joe', NULL, 'Chavez', 'Solar Inspector', NULL, NULL, '6022362069', 'joe.chavez@srpnet.com', NULL, '2019-12-27 10:21:46', '2019-12-27 16:04:44'),
(79, 'Steven', 'J', 'Bakal', 'Organizer', '4809806827', NULL, NULL, 'steven@solarncp.com', NULL, '2020-02-17 15:01:00', '2020-02-17 15:01:00'),
(7, 'Joe', NULL, 'Horn', 'CityPlanner', NULL, NULL, '5204218637', 'Joseph_Horn@casagrandeaz.gov', NULL, '2019-12-27 10:35:30', '2019-12-27 10:35:30'),
(81, 'Gary', NULL, 'Lederer', 'Principle', '6232364832', NULL, NULL, 'glederer@cox.net', NULL, '2020-03-04 15:25:42', '2020-03-04 15:25:42'),
(9, 'Tyler', NULL, 'Damman', 'SafetySpecialist', '4802581445', NULL, '6024371900', 'tdamman@bordercorp.com', NULL, '2019-12-27 10:44:05', '2019-12-27 10:44:05'),
(10, 'Chris', NULL, 'Luman', 'AccountManager', '6027689267', NULL, '6024371900', 'cluman@bordercorp.com', NULL, '2019-12-27 10:45:23', '2019-12-27 10:45:23'),
(11, 'Sean', NULL, 'Gafvert', 'SalesManager', '6022060375', NULL, '6024371900', 'sgafvert@bordercorp.com', NULL, '2019-12-27 10:46:33', '2020-03-19 09:36:04'),
(12, 'Lauren', NULL, 'Dorsey', 'Sales', NULL, NULL, '4809689341', 'LDorsey@CapitalTempe.com', NULL, '2019-12-27 10:48:48', '2019-12-27 10:48:48'),
(13, 'Kathryn', NULL, 'Cleary', 'VMIMarketingSpecialist', NULL, NULL, '4809689341', 'KCleary@CapitalTempe.com', 'KCleary@CEDGreentechsw,con', '2019-12-27 10:50:43', '2019-12-27 10:50:43'),
(14, 'James', NULL, 'Rees', 'InsideSales', NULL, NULL, '4809689341', 'JRees@CapitalTempe.com', NULL, '2019-12-27 10:51:52', '2019-12-27 10:51:52'),
(15, 'Ian', NULL, 'McKillip', 'OutsideSales', '6026941288', NULL, '6235811900', 'imckillip@cednphx.com', NULL, '2019-12-27 10:54:37', '2019-12-27 10:54:37'),
(16, 'Brian', NULL, 'Becker', 'Sales', '6232616832', NULL, '4809689341', 'BBecker@CapitalTempe.com', NULL, '2019-12-27 10:55:42', '2019-12-27 10:55:42'),
(80, 'James', NULL, 'Rees', 'Account Manager', NULL, NULL, '4807316054', 'jrees@capitaltempe.com', NULL, '2020-02-17 16:06:59', '2020-02-17 16:06:59'),
(18, 'Yvette', NULL, 'Grabados', 'PermitsTechnician', NULL, NULL, '5204218632', 'Yvette_Granados@casagrandeaz,gov', 'dcpermits2@gmail.com', '2019-12-27 10:58:43', '2019-12-27 10:58:43'),
(19, 'Thor', NULL, 'Toepfer', 'PlansExaminerII', NULL, NULL, '9288175086', 'thor.toepfer@yumacountyaz.gov', NULL, '2019-12-27 11:05:19', '2019-12-27 11:05:19'),
(20, 'Michael', NULL, 'Bankowski', 'RegionalSalesManager', '5202755777', NULL, '5202299317', 'mbankowski@heyco.com', NULL, '2019-12-27 11:07:54', '2019-12-27 11:07:54'),
(21, 'Trent', NULL, 'Veitch', 'InsideSales', '4807373049', NULL, '4803080500', 'trent.veitch@iesupply.com', NULL, '2019-12-27 11:09:55', '2019-12-27 11:09:55'),
(22, 'Robert', NULL, 'Masters', 'CounterSales', '4803080598', NULL, '4803080500', 'roberet.masters@iesupply.com', NULL, '2019-12-27 11:11:06', '2019-12-27 11:11:06'),
(23, 'Matt', NULL, 'Kaminski', 'OutsideSales', '4803229151', NULL, '4803080500', 'matthew.kaminski@iesupply.com', NULL, '2019-12-27 11:12:12', '2019-12-27 11:12:12'),
(24, 'Josh', NULL, 'LopezFernandez', 'CounterSales', NULL, NULL, '4808927200', 'joshua@iesupply.com', NULL, '2019-12-27 11:13:12', '2019-12-27 11:13:12'),
(25, 'John', NULL, 'Ganzini', NULL, '6023903896', NULL, '6022531108', 'jganzini@phxwelding.com', NULL, '2019-12-27 11:17:21', '2019-12-27 11:17:21'),
(26, 'Steve', NULL, 'Lockwood', 'PurchasingManager', '6234511418', NULL, '4803258315', 'steve@redmtnlighting.com', NULL, '2019-12-27 11:18:49', '2019-12-27 11:18:49'),
(27, 'Casey', NULL, 'Cole', 'LightingDesigner', '4807728021', NULL, '4803258315', 'casey@redmtnlighting.com', NULL, '2019-12-27 11:19:45', '2019-12-27 11:19:45'),
(28, 'Shan', NULL, 'Bates', 'ChiefExecutiveOfficer', '6023540894', NULL, '4803258315', 'shabe@redmtnlighting.com', NULL, '2019-12-27 11:21:18', '2019-12-27 11:21:18'),
(29, 'Margaret', NULL, 'Bjorklund', 'OperationsManager', '4063601519', NULL, '6024415260', 'margaret@redmtnlighting.com', NULL, '2019-12-27 11:23:40', '2019-12-27 11:23:40'),
(30, 'Joe', NULL, 'Chavez', 'SolarInspector', NULL, NULL, '6022362069', 'joe.chavez@srpnet.com', NULL, '2019-12-27 11:32:56', '2019-12-27 11:32:56'),
(32, 'Gina', NULL, 'Apsey', 'Headofsolargreenteam', NULL, NULL, '6022366883', 'gina.apsey@srpnet.com', NULL, '2019-12-27 11:35:11', '2019-12-27 11:35:11'),
(33, 'Claudia', NULL, 'Barker', 'TechnicalSalesManager', '4808480070', NULL, '4806431969', 'clade.baraker@us.abb.com', NULL, '2019-12-27 11:37:14', '2019-12-27 11:37:14'),
(34, 'Christopher', NULL, 'Heinzer', 'FieldApplicationsEngineerII', NULL, NULL, '5207808080', 'christoph.heinzer@aei.com', NULL, '2019-12-27 11:40:47', '2019-12-27 11:40:47'),
(35, 'Bob', NULL, 'Newman', NULL, NULL, NULL, '6022538847', 'rackbob@usazrack.com', NULL, '2019-12-27 11:42:51', '2019-12-27 11:42:51'),
(36, 'Anni', NULL, 'Nowhitney', 'RegionalSalesAssociate', NULL, NULL, '5184878741', 'anni.nowhitney@canadiansolar.com', NULL, '2019-12-27 11:53:40', '2019-12-27 11:53:40'),
(37, 'Travis', NULL, 'Falconer', 'TechnicalSalesEngineer', '9259975938', NULL, '9258662700', 'travis.falconer@na.canadiansolar.com', NULL, '2019-12-27 11:54:35', '2019-12-27 11:54:35'),
(38, 'Victor', NULL, 'Blair', 'VicePresidentEngineering', '6362362318', NULL, '3143441166', 'vblair@buseinc.com', NULL, '2019-12-27 11:58:24', '2019-12-27 11:58:24'),
(39, 'Andrew', NULL, 'Croll', 'AccountExecutive', '9092856252', NULL, '9093005587', 'andrew.croll@chargepoint.com', NULL, '2019-12-27 12:10:17', '2019-12-27 12:10:17'),
(40, 'Christopher', NULL, 'Jones', 'CoFounder', NULL, NULL, '3104037879', 'cjones@chiliconpower.com', NULL, '2019-12-27 12:21:26', '2019-12-27 12:21:26'),
(41, 'David', NULL, 'Sywensky', 'DirectorofClinetServices', NULL, NULL, '3109089726', 'daves@chiliconpower.com', NULL, '2019-12-27 12:23:26', '2019-12-27 12:23:26'),
(42, 'Chris', NULL, 'Wood', 'DirectorSales', '4806520920', NULL, '4803482555', 'chris.wood@centrosolar.com', NULL, '2019-12-27 12:24:51', '2019-12-27 12:24:51'),
(43, 'Jennifer', NULL, 'Sudol', NULL, NULL, NULL, '4804273543', 'jennifer.sudol@centrosolar.com', NULL, '2019-12-27 12:25:31', '2019-12-27 12:25:31'),
(44, 'Jordan', NULL, 'Lake', NULL, NULL, NULL, '4803396862', 'jordan.lake@centrosolar.com', NULL, '2019-12-27 12:26:20', '2019-12-27 12:26:20'),
(45, 'Becky', NULL, 'Aguirre', 'Permittech', NULL, NULL, '5204662578', 'baguirre@ci.eloy.az.us', NULL, '2019-12-27 12:29:49', '2019-12-27 12:29:49'),
(46, 'Kate', NULL, 'Collardson', 'SolarServicesManager', '9286373278', NULL, NULL, 'kate.collardson@saint-gobain.com', NULL, '2019-12-27 12:32:29', '2019-12-27 12:32:29'),
(47, 'Michael', NULL, 'Haines', 'SalesDirector', '4082420345', NULL, '7077634784', 'mhaines@enphaseenergy.com', NULL, '2019-12-27 12:36:40', '2019-12-27 12:36:40'),
(48, 'Craig', NULL, 'Robertson', 'SalesManager', NULL, NULL, '8005446466', 'craig.robertson@kyocera.com', NULL, '2019-12-27 12:38:41', '2019-12-27 12:38:41'),
(49, 'Sean', NULL, 'Hickey', 'SWRegionalSalesManager', '926373262', NULL, '810204414', 'hickey.sean@fronius-usa.com', NULL, '2019-12-27 12:41:14', '2019-12-27 12:41:14'),
(50, 'Justin', NULL, 'Warschauer', 'JSSMarketManager', '2623897904', NULL, NULL, 'justin.warschauer@milwaukeetool.com', NULL, '2019-12-27 12:43:44', '2019-12-27 12:43:44'),
(51, 'Michael', NULL, 'Gregory', 'ChiefOperationsOfficer', NULL, NULL, '4807172565', 'm.gregory@nektarenergy.com', NULL, '2019-12-27 12:45:53', '2019-12-27 12:45:53'),
(52, 'Vera', NULL, 'Li', 'MarketingAssociate', '9498787086', NULL, '9497485996', 'vera.li@u.q-cells.com', NULL, '2019-12-27 12:50:59', '2019-12-27 12:50:59'),
(53, 'Tabby', NULL, 'Villaverde', 'PermitTechnician', NULL, NULL, '5208666537', 'tabitha.villaverde@pinalcountyaz.gov', NULL, '2019-12-27 12:52:45', '2019-12-27 12:52:45'),
(54, 'Molly', NULL, 'Scott', 'FieldSalesManager', '9091021580', NULL, '8002603792', 'mscott@preformed.com', NULL, '2019-12-27 12:54:39', '2019-12-27 12:54:39'),
(55, 'Nicole', NULL, 'Bagozzi', 'Directorofsales', '6026158950', NULL, '8668629352', 'nbagozzi@start-lighting.com', NULL, '2019-12-27 12:56:48', '2019-12-27 12:56:48'),
(56, 'Kelli', NULL, 'Ross', 'ChannelSalesManager', '9253480449', NULL, '9254788835', 'killi.ross@quickmountpv.com', NULL, '2019-12-27 12:58:32', '2019-12-27 12:58:32'),
(57, 'Brett', NULL, 'Dotson', 'RegionalSalesManager', '9162632769', NULL, '9166250870', 'brett.dotson@sma-america.com', NULL, '2019-12-27 13:03:39', '2019-12-27 13:03:39'),
(58, 'Johannes', NULL, 'Pabbruwee', 'TerritorySalesManager', '9165841032', NULL, '9166250870', 'johannes.pabbruwee@sma-america.com', NULL, '2019-12-27 13:04:50', '2019-12-27 13:04:50'),
(59, 'Mike', NULL, 'Mahon', 'SeniorTechnicalTrainingSpecialist', NULL, NULL, '9166250870', 'michael.mahon@sma-america.com', NULL, '2019-12-27 13:05:56', '2019-12-27 13:05:56'),
(60, 'Martin', NULL, 'Holdgraf', 'TerritorySalesManager', '9165084849', NULL, '9166250870', 'martin.holdgraf@sma-america.com', NULL, '2019-12-27 13:06:52', '2019-12-27 13:06:52'),
(61, 'Diane', NULL, 'Dandeneau', 'VPSales', NULL, NULL, '3039221888', 'diane.d@encortech.com', NULL, '2019-12-27 13:11:18', '2019-12-27 13:11:18'),
(62, 'Eric', NULL, 'Bentsen', 'SalesApplicationEngineer', NULL, NULL, '7146421526', 'eric.bentsen@schneider-electric.com', NULL, '2019-12-27 13:13:15', '2019-12-27 13:13:15'),
(63, 'Harold', NULL, 'Morazan', NULL, '6023211766', NULL, '6024847911', 'harold@shade-n-net.com', NULL, '2019-12-27 13:16:36', '2019-12-27 13:16:36'),
(64, 'Matt', NULL, 'Kelly', 'TerritorySalesManager', '4803359845', NULL, NULL, 'mkelly1@sunedison.com', NULL, '2019-12-27 13:21:57', '2019-12-27 13:21:57'),
(65, 'Marcella', NULL, 'Fabre', NULL, NULL, NULL, '6506326324', 'mfabre@sunedison.com', NULL, '2019-12-27 13:22:46', '2019-12-27 13:22:46'),
(66, 'Alex', NULL, 'Medez', 'DealerAccountRep', NULL, NULL, '6506326365', 'amendez@sunedison.com', NULL, '2019-12-27 13:24:56', '2019-12-27 13:24:56'),
(67, 'Chris', NULL, 'Crump', 'SolarSustainabiitySpecialist', '4802312442', NULL, '6022758521', 'ccrump@wesco.com', NULL, '2019-12-27 13:30:35', '2019-12-27 13:30:35'),
(68, 'Ryan', NULL, 'Davis', 'OutsideSales', '4806281663', NULL, '6022758521', 'rydavis@wesco.com', NULL, '2019-12-27 13:31:27', '2019-12-27 13:31:27'),
(69, 'Shawn', NULL, 'Mellott', 'AccountRepresentativeSafetyGuy', '4802625331', NULL, '6022758521', 'smellott@wesco.com', NULL, '2019-12-27 13:32:32', '2019-12-27 13:32:32'),
(70, 'Erin', NULL, 'Helland', 'FinancialServicesSupervisor', NULL, NULL, '6023043213', 'ehelland@wesco.com', NULL, '2019-12-27 13:33:28', '2019-12-27 13:33:28'),
(71, 'Tim', NULL, 'Wheaton', 'Branchsalesmanager', '4803266877', NULL, '6022961768', 'twheaton@wesco.com', NULL, '2019-12-27 13:34:28', '2019-12-27 13:34:28'),
(72, 'Shane', NULL, 'Dorsey', 'SalesAnalyst', '4802323750', NULL, '6022758521', 'sdorsey@wesco.com', NULL, '2019-12-27 13:35:26', '2019-12-27 13:35:26'),
(73, 'Brian', NULL, 'Hutt', 'InsideSales', NULL, NULL, '6022961781', 'bhutt@wesco.com', NULL, '2019-12-27 13:36:23', '2019-12-27 13:36:23'),
(74, 'Tony', NULL, 'Pastore', 'RegionalSalesManager', '5303082459', NULL, '4153290773', 'tony@zepsolar.com', NULL, '2019-12-27 13:39:07', '2019-12-27 13:39:07'),
(75, 'Michael', NULL, 'Bankowski', 'RegionalSalesManager', '5202755777', NULL, NULL, 'mbankowski@heyco.com', NULL, '2019-12-27 13:41:36', '2019-12-27 13:41:36'),
(76, 'Joe', NULL, 'Montana', 'WesternUSSalesManagerSolar', '4242418163', NULL, NULL, 'joe.p.montana@staint-gobain.com', NULL, '2019-12-27 14:03:23', '2019-12-27 14:03:23'),
(77, 'Eric', NULL, 'Gjersvig', 'Renewableenergysalesmanager', '6084487143', NULL, '6083552045', 'egjers@hammondpowersolutions.com', NULL, '2019-12-27 14:05:53', '2019-12-27 14:05:53'),
(78, 'Lance', NULL, 'Wilson', 'TerritorySalesManager', '9258172032', NULL, '9254788843', 'lance.wilson@quickmountpv.com', NULL, '2019-12-27 14:12:36', '2019-12-27 14:12:36'),
(82, 'Hillari', NULL, 'Tischler', 'CFO', '7028084062', NULL, '4803258315', 'hillari@ckcaz.com', NULL, '2020-03-17 08:50:15', '2020-03-17 08:50:15'),
(83, 'Kathleen', NULL, 'Kulesza', 'Controller', '4803636726', NULL, '4803258315', 'kathleenk@ckcaz.com', NULL, '2020-03-17 08:51:34', '2020-03-17 08:51:34'),
(84, 'Lori', NULL, 'Estrada', NULL, NULL, NULL, '4803258315', 'lori@ckaz.com', NULL, '2020-03-17 08:53:19', '2020-03-17 08:53:19'),
(85, 'Stephanie', NULL, 'Rivera', NULL, NULL, NULL, '4803258315', 'stephanie@ckcaz.com', NULL, '2020-03-17 08:54:03', '2020-03-17 08:54:03'),
(86, 'Nathan', NULL, 'Samp', NULL, NULL, NULL, '4803258315', 'natham@ckcaz.com', NULL, '2020-03-17 08:55:06', '2020-03-17 08:55:06'),
(87, 'Rick', NULL, 'Lucchesi', NULL, '4807400627', NULL, '4809647470', 'sales@ammcofmesa.com', NULL, '2020-03-18 13:22:34', '2020-03-18 13:22:34'),
(88, 'Cesar', NULL, 'Ochoa', 'Field Engineer', '4807400927', NULL, '6028758700', 'cesar.ochoa@c202p.com', NULL, '2020-03-18 13:23:51', '2020-03-18 13:23:51'),
(89, 'Dan', NULL, 'Cooper', 'Sales', '4808270198', NULL, '4808270198', 'sales@ammcofmesa.com', NULL, '2020-03-18 13:27:59', '2020-03-18 13:27:59'),
(90, 'Jared', NULL, 'Horton', 'Sr Account Executive', '3106129186', NULL, '4805579334', 'jared_horton@nittsu.com', NULL, '2020-03-18 13:33:57', '2020-03-18 13:33:57'),
(91, 'Bruce', NULL, 'Rasmussen', NULL, '4802288400', NULL, '4809945500', 'brucer@gryphonaz.com', NULL, '2020-03-18 13:35:06', '2020-03-18 13:35:06'),
(92, 'Joel', NULL, 'Keck', 'Sales Representative', '6026161672', NULL, '6022687008', 'joelk@deserttates.com', NULL, '2020-03-18 13:37:31', '2020-03-18 13:37:31'),
(93, 'Kelli', NULL, 'Ross', 'Business Development Manager', '9253480449', NULL, '9254788835', 'kelli@quickmountpv.com', NULL, '2020-03-18 13:47:35', '2020-03-18 13:47:35'),
(94, 'Eric', NULL, 'Gjersvig', 'Renewable Energy Sales Manager', '6083552045', NULL, '6083563921', 'egjers@hammondpowersolutions.com', NULL, '2020-03-18 13:50:00', '2020-03-18 13:50:00'),
(95, 'James', NULL, 'Powell', 'Field Appraiser', NULL, NULL, '6023729205', 'powellj003@mail.maricopa.gov', NULL, '2020-03-18 14:01:22', '2020-03-18 14:01:22'),
(96, 'Chris', NULL, 'Crump', 'Solar & Sustainability Specialist', '4802312442', NULL, '6022758521', 'ccrump@wesco.com', NULL, '2020-03-18 14:07:47', '2020-03-18 14:07:47'),
(97, 'Matt', NULL, 'Kelly', 'Sales', '4803359845', NULL, '4803359845', 'none@gmail.com', NULL, '2020-03-18 14:09:51', '2020-03-18 14:09:51'),
(98, 'Ademilua', NULL, 'Ayo', 'CEO', '2348165471372', NULL, '2348165471372', 'ayodeji@a4tintegrated.com', NULL, '2020-03-18 14:14:27', '2020-03-18 14:14:27'),
(99, 'Amy', NULL, 'Pryor', 'Sales', '6024371111', NULL, '6024371111', 'amy@jonesassc.com', NULL, '2020-03-18 14:15:34', '2020-03-18 14:15:34'),
(100, 'Juan', NULL, 'Fernando -Salcido', 'Field Service Technician/Electrical Testing', '6024993502', NULL, '6024387500', 'jsalcido@shermco.com', NULL, '2020-03-18 14:18:01', '2020-03-18 14:18:01'),
(101, 'Gibson', NULL, 'Daoud', 'General Manager', '6022851000', NULL, '6022851000', 'none@gmail.com', NULL, '2020-03-19 09:11:30', '2020-03-19 09:11:30'),
(102, 'Darrin', NULL, 'Russell', 'Account Manager', '5059444264', NULL, '5059444264', 'darrin@affordable-solar.com', NULL, '2020-03-19 09:15:59', '2020-03-19 09:15:59'),
(103, 'Christina', NULL, 'Gutierrez', 'Sales Representative', '6022453808', NULL, '6022535438', 'chrisag@ahern.com', NULL, '2020-03-19 09:17:23', '2020-03-19 09:17:23'),
(104, 'Nicole', NULL, 'Dorris', 'District Manager', '4802207552', NULL, '4804778991', 'Nicole_Dodrdris@adp.com', NULL, '2020-03-19 09:34:26', '2020-03-19 09:34:26'),
(105, 'Eddie', NULL, 'Baker', 'Superintendent', '4802511666', NULL, '4804232366', 'none@gmail.com', NULL, '2020-03-19 09:37:56', '2020-03-19 09:37:56'),
(106, 'Juan', NULL, 'Rubio', 'Inside Sales Representative', '6023865481', NULL, '6022699721', 'jrubio@autosafetyhouse.com', NULL, '2020-03-19 09:39:33', '2020-03-19 09:39:33'),
(107, 'Jay', NULL, 'Miller', 'Sales Representative', '6022507162', NULL, '6029446807', 'none@gmail.com', NULL, '2020-03-19 09:41:17', '2020-03-19 09:41:17'),
(108, 'Lauren', NULL, 'Dorsey', 'Sales', '4809666468', NULL, '4809689341', 'LDorsey@CapitalTempe.com', NULL, '2020-03-19 09:42:48', '2020-03-19 09:42:48'),
(109, 'Kathryn', NULL, 'Cleary', 'VMIMarketingSpecialist', '4809689341', NULL, '4809689341', 'kcleary@capitaltempe.com', NULL, '2020-03-19 09:43:51', '2020-03-19 09:43:51'),
(110, 'Brian', NULL, 'Becker', 'Sales', '6232616832', NULL, '4809689341', 'BBecker@CapitalTempe.com', NULL, '2020-03-19 11:21:47', '2020-03-19 11:21:47'),
(111, 'Jeb', NULL, 'Ejstrin', 'Project Manager, Energy Division', '4803376546', NULL, '6029772623', 'kekstrom@burnsmced.com', NULL, '2020-03-19 11:26:11', '2020-03-19 11:26:11'),
(112, 'Jacqueline', NULL, 'Ponce', 'Accounting Specialist', '4806213284', NULL, '4809662301', NULL, 'jponce@cpiaz.com', '2020-03-19 11:39:43', '2020-03-19 11:39:43'),
(113, 'Jacqueline', NULL, 'Ponce', 'Accounting Specialist', '4806213284', NULL, '4809662301', NULL, 'jponce@cpiaz.com', '2020-03-19 11:39:54', '2020-03-19 11:39:54'),
(114, 'Joe', NULL, 'Shipka', 'Sales', '6025016282', NULL, '48083688261', 'joes@marbecc.net', NULL, '2020-03-19 11:43:26', '2020-03-19 11:43:26'),
(115, 'Aziz', NULL, 'Halal', 'Principle', '4802367456', NULL, '4802367456', 'cmegdev@aol.com', NULL, '2020-03-19 11:44:39', '2020-03-19 11:44:39'),
(116, 'Barrie', NULL, 'Blum', 'Owner', '4808168162', NULL, '4808168162', 'barrie@copyaz.com', NULL, '2020-03-19 11:47:20', '2020-03-19 11:47:20'),
(117, 'David', NULL, 'Schweers', 'Sales', '4804309277', NULL, '4804309277', 'dmschweers@cox.net', NULL, '2020-03-19 11:56:22', '2020-03-19 11:56:22'),
(118, 'Doug', NULL, 'East', 'Sales', '9283583998', NULL, '9283583998', 'deast7@roadrunner.com', NULL, '2020-03-19 12:04:13', '2020-03-19 12:04:13'),
(119, 'Chuck', NULL, 'Trujillo', 'Sales', '4803305501', NULL, '4809665765', 'chuck@defasco.com', NULL, '2020-03-19 12:27:08', '2020-03-19 12:27:08'),
(120, 'Allen', NULL, 'Amis', 'President CTO', '3033194911', NULL, '3039221888', 'allen.amis@dencortech.com', NULL, '2020-03-19 12:35:05', '2020-03-19 12:35:05'),
(121, 'David', NULL, 'Howard', 'President', '6209206800', NULL, '4808372577', 'drhelectricinc@aol.com', NULL, '2020-03-19 12:46:53', '2020-03-19 12:46:53'),
(122, 'Daniel', NULL, 'Castillo', 'Owner', '9282487778', NULL, '9282487778', 'dcwelding76@hotmail.com', NULL, '2020-03-19 12:48:02', '2020-03-19 12:48:02'),
(123, 'Ignacio', NULL, 'Portugal', 'Owner', '4802559884', NULL, '4802559884', 'az_handyman@yahoo.com', NULL, '2020-03-19 12:53:25', '2020-03-19 12:53:25'),
(124, 'Terry', NULL, 'Parker', 'Sales', '4804062531', NULL, '4804062531', 'jryanelectric@gmail.com', NULL, '2020-03-19 12:55:15', '2020-03-19 12:55:15'),
(125, 'Craig', NULL, 'Robertson', 'Sales Manager', '8005446466', NULL, '8005446466', 'craig.robertson@kyocera.com', NULL, '2020-03-19 13:04:47', '2020-03-19 13:04:47'),
(126, 'Tom', NULL, 'Carter', 'Regional Branch Manager', '4807036886', NULL, '4804571099', 'tom.carter@infinergywindandsolar.com', NULL, '2020-03-19 13:07:35', '2020-03-19 13:07:35'),
(127, 'Gary', NULL, 'Lederer', 'Owner', '6239100749', NULL, '6239100749', 'glederer@cox.net', NULL, '2020-03-19 13:10:26', '2020-03-19 13:10:26'),
(128, 'Gary', NULL, 'Hancock', 'Engineer', '6025708262', NULL, '6027959080', 'lookout_eng@cox.net', NULL, '2020-03-19 13:34:39', '2020-03-19 13:34:39'),
(129, 'Donald', NULL, 'Wodash Sr', 'Business Development/Sales', '6026501150', NULL, '6026501150', 'DonW@midtownsignaz.com', NULL, '2020-03-19 13:55:04', '2020-03-19 13:55:04'),
(130, 'Dennis', NULL, 'McKay', 'Sales', '6232024880', NULL, '6322024880', 'dennis@mckayelectricalagents.com', NULL, '2020-03-19 13:58:00', '2020-03-19 13:58:00'),
(131, 'C Rex', NULL, 'Olson', 'Sales Representative', '4803221616', NULL, '4803221616', 'mgtconcepts@cox.net', NULL, '2020-03-20 10:35:19', '2020-03-20 10:35:19'),
(132, 'Wayne', NULL, 'Lee', 'Sales Manager', '3037253051', NULL, '4786096640', 'wayne.lee@magesolar.com', NULL, '2020-03-20 10:44:58', '2020-03-20 10:44:58'),
(133, 'Harry', NULL, 'Luker', 'Owner', '4808372655', NULL, '4808372655', 'lukerplumbing@yahoo.com', NULL, '2020-03-20 10:47:23', '2020-03-20 10:47:23'),
(134, 'Curtis', NULL, 'Moldenhauer', 'Manufacturing Representative', '4802175818', NULL, '6028750133', 'cmoldenhauer@ewingfoley.com', NULL, '2020-03-20 10:48:42', '2020-03-20 10:48:42'),
(135, 'Karl', NULL, 'Stone', 'Steel Sales Manager', '4804505405', NULL, '4803629314', 'karl.stone@agateinc.com', NULL, '2020-03-20 10:51:39', '2020-03-20 10:51:39'),
(136, 'Tom', NULL, 'Albanesuis', 'Project Manager/Estimator', '6028196113', NULL, '6029442645', 'toma@kowalski.com', NULL, '2020-03-20 10:52:56', '2020-03-20 10:52:56'),
(137, 'Don', NULL, 'Nash', 'Territory Manager', '6026779742', NULL, '6024423320', 'dnash@rbauction.com', NULL, '2020-03-20 11:01:29', '2020-03-20 11:01:29'),
(138, 'Ron', NULL, 'Olmstead', 'Maintenance Manager', '6025417205', NULL, '4809618356', 'ron.olmstead@rogerscorporation.com', NULL, '2020-03-20 11:04:14', '2020-03-20 11:04:14'),
(139, 'MacKenzie', NULL, 'Davis', 'Sales Representative', '8776672327', NULL, '8776672327', 'mackdavi39@gmail.com', NULL, '2020-03-20 11:16:20', '2020-03-20 11:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_addresses`
--

CREATE TABLE `contacts_addresses` (
  `id` int(10) NOT NULL,
  `contact_id` int(10) NOT NULL,
  `address_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts_addresses`
--

INSERT INTO `contacts_addresses` (`id`, `contact_id`, `address_id`) VALUES
(1, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `dashboardmodules_roles`
--

CREATE TABLE `dashboardmodules_roles` (
  `id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `dashboard_module_id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dashboardmodules_roles`
--

INSERT INTO `dashboardmodules_roles` (`id`, `role_id`, `dashboard_module_id`, `org_id`) VALUES
(2, 1000, 4, 1),
(3, 1000, 5, 1),
(4, 1000, 3, 1),
(5, 15, 6, 2),
(7, 15, 5, 2),
(8, 1000, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dashboardmodules_users`
--

CREATE TABLE `dashboardmodules_users` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `dashboard_module_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dashboardmodules_users`
--

INSERT INTO `dashboardmodules_users` (`id`, `user_id`, `dashboard_module_id`) VALUES
(2, 1, 4),
(13, 2, 6),
(17, 5, 5),
(18, 2, 5),
(21, 11, 7),
(23, 14, 6),
(24, 14, 5),
(25, 5, 6),
(27, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_modules`
--

CREATE TABLE `dashboard_modules` (
  `id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `removable` int(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `dashboard_modules`
--

INSERT INTO `dashboard_modules` (`id`, `org_id`, `name`, `description`, `filename`, `removable`, `updated_at`, `created_at`) VALUES
(2, 1, 'Requests', 'This module displays requests issued between users', 'requests', 0, '2019-04-23 03:10:39', '2018-07-09 07:00:00'),
(3, 1, 'My Activity Log', 'This module records all of your activities within CRM', 'user_event', 1, '2019-04-23 03:10:42', '2018-07-09 07:00:00'),
(4, 1, 'All Users Activity Log', 'This module records all activities by all Users for this Company', 'allusers_event', 1, '2019-04-23 03:10:45', '2018-07-09 07:00:00'),
(5, 1, 'ERP Updates', 'Get notified when new features are added to CRM', 'erp_updates', 1, '2019-04-23 03:10:47', '2018-07-09 07:00:00'),
(6, 1, 'My Tasks', 'This module displays your assigned tasks', 'user_tasks', 1, '2019-04-23 03:10:49', '2018-10-16 07:00:00'),
(7, 1, 'Mashed Potatoes', 'Displays Mashed Potatoes', 'mashed_potatoes', 1, '2019-09-16 17:16:41', '2019-09-16 17:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `id` int(10) NOT NULL,
  `proposal_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `proposal_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test1', 'This is a description of the design', '2020-02-17 15:20:56', '2020-02-17 15:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `org_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ssn` varbinary(256) NOT NULL,
  `hire_date` date NOT NULL,
  `dob` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `emergency_contact` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `org_id`, `user_id`, `first_name`, `middle_name`, `last_name`, `phone`, `ssn`, `hire_date`, `dob`, `end_date`, `emergency_contact`, `created_at`, `updated_at`) VALUES
(8, 2, 11, 'Rocio', 'Alma', 'Velasquez', '4802397758', 0x65794a7064694936496e4a46614842425a305979625739346554686c557a6c32525564576255453950534973496e5a686248566c496a6f694d6b6844523142735179745a4b3370566357357063474e486432645355543039496977696257466a496a6f694d444a694e3259304f574669596a4d305a445a6a5957493159325533596a4e6a4e32466a5a44637a5a47466c5a6a45344f475178597a59794f575a6a4d6d4a684d446b344e6a4d7a596d5a6d4e544d78597a51304d794a39, '2018-08-04', '1991-10-10', NULL, 0, '2019-08-30 11:34:18', '2021-09-05 18:50:04'),
(7, 2, 2, 'Stephen', 'G', 'Hieb', '6232069170', 0x65794a7064694936496974486348463552306335635556584b3164575555397a62454d795646453950534973496e5a686248566c496a6f6951554a705a32746b5a57786d57466853656a524b5531564a5647466e55543039496977696257466a496a6f694e4468694d7a6332596d4d325a54426a5a544669596a67344e7a59794d6d4e694e474e6a4e6a526c4d324d784e7a68684e4467355a4759344f544533596a59794e5449784e5755354d5455324d4759334f4463774e694a39, '2009-04-10', '1984-08-25', NULL, 0, '2019-04-27 21:00:33', '2021-09-05 18:49:29'),
(9, 2, 5, 'James', 'T', 'Schafnit', '4802389706', 0x65794a7064694936496c77764d6d303458433931533031554d475a6b55554e575a573035543170475154303949697769646d4673645755694f69497a4f48424253485a5a65455a6a4f484252596c777655546849526c5a3451543039496977696257466a496a6f694d6d55794d325934593252684e6d51324d57517a593255304e44493559546c69596d49344d6a49794d4449774f545533596a6c6b5a445668597a4a6a4e4459354e6a49335a54417a4e6a6b355a475a694d7a67324e794a39, '2016-12-05', '1989-06-11', NULL, 1, '2019-09-24 14:00:35', '2021-09-05 18:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `employees_addresses`
--

CREATE TABLE `employees_addresses` (
  `id` bigint(20) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `address_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_addresses`
--

INSERT INTO `employees_addresses` (`id`, `employee_id`, `address_id`) VALUES
(3, 7, 4),
(4, 8, 5),
(5, 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE `entities` (
  `id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_class` int(10) NOT NULL,
  `archived` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_updates`
--

CREATE TABLE `erp_updates` (
  `id` int(10) NOT NULL,
  `update_text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `erp_updates`
--

INSERT INTO `erp_updates` (`id`, `update_text`, `created_at`, `updated_at`) VALUES
(1, 'Added Function To Remove Vendor & Pricing For Part', '2019-04-23 14:45:27', '2019-04-23 14:45:27'),
(5, 'Made Repository Unit Creation/Deletion Not Refresh', '2019-04-23 19:48:39', '2019-04-23 03:09:19'),
(6, 'Made Repository Color Creation/Deletion Not Refresh', '2019-04-23 20:09:32', '2019-04-23 20:09:32'),
(7, 'Made Type Creation/Deletion Not Refresh', '2019-04-23 20:13:36', '2019-04-23 20:13:36'),
(8, 'Color Deletion Bringing Up 2 Pop-Up Confirmation Boxes - Fixed', '2019-04-23 20:14:35', '2019-04-23 20:14:35'),
(9, 'Added Manufacturers to Product Search', '2019-04-23 20:23:08', '2019-04-23 20:23:08'),
(10, 'Made Tag Move/Copy Not Refresh', '2019-04-23 20:34:09', '2019-04-26 03:24:53'),
(11, 'Added Stocking Unit to Product Units, ie. Solar Module Coming Up \"Stock: 47 Watts\"', '2019-04-24 19:04:33', '2019-04-24 19:05:47'),
(12, 'Made Copied tags fly back to home', '2019-04-24 19:21:34', '2019-04-24 19:21:34'),
(13, 'FIXED - Dragging Dashboard Modules', '2019-04-25 18:43:20', '2019-04-25 18:43:46'),
(14, 'Username minimum length changed from 6 to 5 characters', '2019-04-25 19:15:05', '2019-04-25 19:15:05'),
(15, 'Image cropped automatically updates properly in repository list', '2019-04-25 20:23:29', '2019-04-25 20:23:29'),
(16, 'Record Completed Training Report', '2019-04-27 20:53:35', '2019-04-27 20:53:35'),
(17, 'Generate Completed Training Certificate', '2019-04-27 20:53:40', '2019-04-27 20:53:40'),
(18, 'Show Completed Training Reports in Reports Area of Training', '2019-04-27 20:53:46', '2019-04-27 20:53:46'),
(19, 'Added Projects Section', '2019-09-15 23:34:21', '2019-09-15 23:34:21'),
(20, 'Added Super Admin Functions and Organizations Switching', '2019-09-15 23:34:21', '2019-09-15 23:34:21'),
(21, 'Fixed password reset function', '2019-09-17 03:23:31', '2019-09-17 03:23:31'),
(22, 'Barcodes can now be printed', '2019-09-24 04:38:50', '2019-09-24 04:38:50'),
(23, 'Sales Team section has been added. Sales people can be added and edited.', '2019-09-24 04:40:32', '2019-09-24 04:40:32'),
(24, 'Contacts can now be added to Directory Companies', '2019-09-24 20:16:56', '2019-12-27 16:18:15'),
(25, 'Project Attributes Builder / Editor Complete', '2020-01-08 23:47:15', '2020-01-08 23:51:07'),
(26, 'Project Portfolios can now be created.', '2020-01-22 23:47:29', '2020-01-22 23:51:14'),
(27, 'Can Create and Edit Contact(s) for Portfolios', '2020-02-01 23:47:49', '2020-02-01 23:51:20'),
(28, 'Locations can now be added to Directory Companies', '2020-03-01 23:48:32', '2020-03-01 23:51:25'),
(29, 'Stakeholder Correspondence can now be added to Directory Companies', '2020-03-03 23:48:44', '2020-03-03 23:48:44'),
(30, 'News can now be added to Directory Companies', '2020-03-05 23:48:52', '2020-03-05 23:48:52'),
(31, 'Files, such as Datasheets can now be uploaded to Repository Parts', '2020-02-21 23:49:32', '2020-02-21 23:49:32'),
(32, 'Attributes can now be assigned to Proposals / Projects', '2020-01-19 23:50:55', '2020-01-19 23:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_orders`
--

CREATE TABLE `inventory_orders` (
  `id` int(10) NOT NULL,
  `name` varchar(25) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin,
  `job_id` int(10) NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_orders_parts`
--

CREATE TABLE `inventory_orders_parts` (
  `id` int(10) NOT NULL,
  `inventory_orders_id` int(10) NOT NULL,
  `repository_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_pulls`
--

CREATE TABLE `inventory_pulls` (
  `id` int(10) NOT NULL,
  `name` varchar(25) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin,
  `job_id` int(10) NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_pulls_parts`
--

CREATE TABLE `inventory_pulls_parts` (
  `id` int(10) NOT NULL,
  `inventory_pulls_id` int(10) NOT NULL,
  `repository_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `lead_source`
--

CREATE TABLE `lead_source` (
  `id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `lead_source`
--

INSERT INTO `lead_source` (`id`, `org_id`, `name`) VALUES
(1, 0, 'Clean Energy Systems, LLC'),
(2, 0, 'Green Home Rentals, LLC');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2018_06_07_051744_create_user_roles_table', 1),
(5, '2018_06_08_060536_create_employees_table', 2),
(6, '2018_06_08_060644_create_contacts_table', 2),
(7, '2018_06_08_060714_create_projects_table', 2),
(8, '2018_06_08_060736_create_addresses_table', 2),
(9, '2018_06_08_062808_create_companies_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `directory` varchar(255) COLLATE utf8_bin NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `directory`, `updated_at`, `created_at`) VALUES
(1, 'All Organizations', 'allorgs', '2018-07-09 07:00:00', '2018-07-09 07:00:00'),
(2, 'SCP Solar', 'scpsolar', '2018-06-21 07:00:00', '2018-06-21 07:00:00'),
(3, 'Red Mountain Lighting', 'redmountainlighting', '2018-06-21 07:00:00', '2018-06-21 07:00:00'),
(4, 'Castle Cabinets', 'castlecabinets', '2018-07-09 07:00:00', '2018-07-09 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `organizations_companies`
--

CREATE TABLE `organizations_companies` (
  `id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations_companies`
--

INSERT INTO `organizations_companies` (`id`, `org_id`, `company_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 2, 15),
(16, 2, 16),
(17, 2, 17),
(18, 2, 18),
(19, 2, 19),
(20, 2, 20),
(21, 2, 21),
(22, 2, 22),
(23, 2, 23),
(24, 2, 24),
(25, 2, 25),
(26, 2, 26),
(27, 2, 27),
(28, 2, 28),
(29, 2, 29),
(30, 2, 30),
(31, 2, 31),
(32, 2, 32),
(33, 2, 33),
(34, 2, 34),
(35, 2, 35),
(36, 2, 36),
(37, 2, 37),
(38, 2, 38),
(39, 2, 39),
(40, 2, 40),
(42, 2, 42),
(44, 2, 44),
(45, 2, 45),
(46, 2, 46),
(47, 2, 47),
(48, 2, 48),
(49, 2, 49),
(50, 2, 50),
(51, 2, 51),
(52, 2, 52),
(53, 2, 53),
(54, 2, 54),
(55, 2, 55),
(56, 2, 56),
(58, 2, 58),
(59, 2, 59),
(60, 2, 60),
(61, 2, 61),
(62, 2, 62),
(63, 2, 63),
(64, 2, 64),
(65, 2, 65),
(66, 2, 66),
(67, 2, 67),
(68, 2, 68),
(69, 2, 69),
(70, 2, 70),
(71, 2, 71),
(72, 2, 72),
(73, 2, 73),
(74, 2, 74),
(75, 2, 75),
(76, 2, 76),
(77, 2, 77),
(78, 2, 78),
(79, 2, 79),
(80, 2, 80),
(81, 2, 81),
(82, 2, 82),
(83, 2, 83),
(84, 2, 84),
(85, 2, 85),
(86, 2, 86),
(87, 2, 87),
(88, 2, 88),
(89, 2, 89),
(90, 2, 90),
(91, 2, 91),
(92, 2, 92),
(93, 2, 93),
(94, 2, 94),
(95, 2, 95),
(96, 2, 96),
(97, 2, 97),
(98, 2, 98),
(99, 2, 99),
(100, 2, 100),
(101, 2, 101),
(102, 2, 102),
(103, 2, 103),
(104, 2, 104),
(105, 2, 105),
(106, 2, 106),
(107, 2, 107),
(108, 2, 108),
(109, 2, 109),
(110, 2, 110),
(111, 2, 111),
(112, 2, 112),
(113, 2, 113),
(114, 2, 114),
(115, 2, 115),
(116, 2, 116),
(117, 2, 117),
(118, 2, 118),
(119, 2, 119),
(120, 2, 120),
(121, 2, 121),
(122, 2, 122),
(123, 2, 123),
(124, 2, 124),
(125, 2, 125),
(126, 2, 126),
(127, 2, 127),
(128, 2, 128),
(129, 2, 129),
(130, 2, 130),
(131, 2, 131),
(132, 2, 132),
(133, 2, 133),
(134, 2, 134),
(135, 2, 135),
(136, 2, 136),
(137, 2, 137),
(138, 2, 138),
(139, 2, 139),
(140, 2, 140),
(141, 2, 141),
(142, 2, 142),
(143, 2, 143),
(144, 2, 144),
(145, 2, 145),
(146, 2, 146),
(147, 2, 147),
(148, 2, 148),
(149, 2, 149),
(150, 2, 150),
(151, 2, 151),
(152, 2, 152),
(153, 2, 153),
(154, 2, 154),
(155, 2, 155),
(156, 2, 156),
(157, 2, 157),
(158, 2, 158),
(159, 2, 159),
(160, 2, 160),
(161, 2, 161),
(162, 2, 162),
(163, 2, 163),
(164, 2, 164),
(165, 2, 165),
(166, 2, 166),
(167, 2, 167),
(168, 2, 168),
(169, 2, 169),
(170, 2, 170),
(171, 2, 171),
(172, 2, 172),
(173, 2, 173),
(174, 2, 174),
(175, 2, 175);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(23, 'stephen.hieb@solarncp.com', '$2y$10$4Tf.ZD9dAdhTyAMyatzuW.yfABdhRQcV2laYbMBM/WfgSWZ1cj6PS', '2020-02-20 15:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `display_order` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `category`, `display_name`, `description`, `display_order`) VALUES
(1, 'view_employees', 'employees', 'View Employees Basic', 'Roles may view the most basic Employee Information', 1),
(2, 'view_employee_basic', 'employees', 'View Employee Basic Information', 'Roles may view Basic Employee Information', 2),
(3, 'view_employee_detailed', 'employees', 'View Employee Sensitive', 'Roles may view Sensitive Employee Information', 3),
(4, 'view_employee_admin', 'employees', 'View Employee Admin', 'Roles may view Administrator Employee Information', 4),
(5, 'create_employee', 'employees', 'Create Employee', 'Roles may create new Employees from Users', 5),
(6, 'edit_employee', 'employees', 'Edit Employee', 'Roles may Edit Employee Information', 6),
(7, 'view_directory', 'directory', 'View Directory', 'Roles may View the Directory', 401),
(8, 'create_company', 'directory', 'Create Directory Company', 'Roles may Create Directory Companies', 402),
(9, 'edit_company', 'directory', 'Edit Directory Company', 'Roles may Edit Directory Companies', 403),
(10, 'view_safety', 'safety', 'View Safety Programs', 'Roles may view Safety Programs', 101),
(11, 'view_training_courses_results', 'training', 'View Training Courses, Results and Certs', 'Roles may view Training Materials, Results and Employee Certifications', 103),
(12, 'create_edit_assign_training', 'training', 'Create, Edit and Assign Training Courses', 'Roles may Create, Edit and Assign Training Courses to Employees\r\n', 102),
(13, 'take_training_course', 'training', 'Take Training Course', 'Roles may Complete a Training Course', 104),
(14, 'view_audits_results', 'audit', 'View Audits and Audit Results', 'Roles may view Available Audits and Completed Audit Results', 111),
(15, 'create_edit_assign_audits', 'audit', 'Create, Edit and Assign Audits', 'Roles may Create, Edit, and Assign Audits to be Completed by Employees', 112),
(16, 'log_audits', 'audit', 'Complete and Log Audits', 'Roles may Complete and Log Audits', 113),
(17, 'view_jhas_results', 'jha', 'View Job Hazard Analyses (JHAs) and Reports', 'Roles may view Job Hazard Analyses (JHAs) and Results', 121),
(18, 'create_edit_jhas', 'jha', 'Create and Edit Job Hazard Analyses (JHAs)', 'Roles may Create and Edit Job Hazard Analyses', 122),
(19, 'log_jhas', 'jha', 'Complete and Log Job Hazard Analyses (JHAs)', 'Roles may Complete and Log Job Hazard Analyses (JHAs)', 123),
(20, 'view_incidents_reports', 'incident', 'View Incident Reports', 'Roles may view Incident Reports', 131),
(21, 'create_edit_incident_reports', 'incident', 'Create and Edit Incident Reports', 'Roles may Create and Edit Incident Reports', 132),
(22, 'log_incident_reports', 'incident', 'Complete Incident Reports', 'Roles may Complete and Log Incident Reports', 133),
(23, 'view_leads', 'leads', 'View Project Leads', 'Roles may View Project Leads', 201),
(24, 'create_project_leads', 'leads', 'Create Project Leads', 'Roles May Create Project Leads', 202),
(25, 'edit_project_leads', 'leads', 'Edit Project Leads', 'Roles May Edit Project Leads', 203),
(26, 'view_vehicle_information', 'vehicle', 'View Company Vehicle Information', 'Roles May View Company Vehicle Information', 141),
(27, 'create_vehicle', 'vehicle', 'Create Company Vehicle', 'Roles May Create Company Vehicles', 142),
(28, 'edit_vehicle_information', 'vehicle', 'Edit Company Vehicle Information', 'Roles May Edit Company Vehicle Information', 143),
(29, 'view_inventory', 'inventory', 'View Inventory', 'Roles may View Inventory', 301),
(30, 'create_inventory', 'inventory', 'Create Inventory', 'Roles may Create Inventory', 302),
(31, 'edit_inventory', 'inventory', 'Edit Inventory', 'Roles may Edit Inventory', 303),
(32, 'view_inventory_pull', 'inventory', 'View Inventory Pulls', 'Roles may View Inventory Pulls', 321),
(33, 'create_inventory_pull', 'inventory', 'Create Inventory Pulls', 'Roles may Create Inventory Pulls', 322),
(34, 'edit_inventory_pull', 'inventory', 'Edit Inventory Pulls', 'Roles may Edit Inventory Pulls', 323),
(35, 'receive_inventory', 'inventory', 'Receive Inventory', 'Roles may Receive Inventory', 331),
(36, 'view_inventory_order', 'inventory', 'View Inventory Order', 'Roles may View Inventory Orders', 341),
(37, 'create_inventory_order', 'inventory', 'Create Inventory Order', 'Roles may Create Inventory Orders', 342),
(38, 'edit_inventory_order', 'inventory', 'Edit Inventory Order', 'Roles may Edit Inventory Orders', 343),
(39, 'view_repository', 'repository', 'View Parts Repository', 'Roles may View Parts Repository', 351),
(40, 'create_repository', 'repository', 'Create Parts Repository', 'Roles may Create Parts in the Parts Repository', 352),
(41, 'edit_repository', 'repository', 'Edit Parts Repository', 'Roles may Make Changes to the Parts Repository', 353),
(42, 'administrate_repository', 'repository', 'Administrate Repository', 'User may expand repository capabilities, kit parts, and share them across organizations', 354),
(46, 'view_projects', 'projects', 'View Projects', 'Roles may View Projects', 221),
(47, 'edit_projects', 'projects', 'Edit Projects', 'Roles may Edit Projects', 222),
(48, 'view_archive', 'archive', 'View Archived Projects', 'Roles may View Archived Projects', 241),
(49, 'manage_company', 'directory', 'Manage Directory Company', 'Roles may Manage Directory Companies', 421),
(50, 'form_builder', 'misc', 'Form Builder Misc', 'Role may create and edit web forms', 501),
(51, 'view_channel_partners', 'sales', 'View Channel Partners', 'Role may view the channel partners', 21),
(52, 'create_channel_partner', 'sales', 'Create a Channel Partner', 'Role may create channel partners', 22),
(53, 'view_channel_partners_admin', 'sales', 'View Channel Partners as Administrator', 'Role may view the channel partners with administrator information', 23),
(54, 'edit_channel_partner', 'sales', 'Edit A Channel Partner', 'Role may edit channel partners', 24),
(55, 'manage_utility_rates', 'directory', 'Manage Utility Rates', 'Roles may create and edit utility rates.', 422),
(56, 'weather_app', 'misc', 'Weather Application', 'Access to the weather application', 502),
(57, 'view_manage_company', 'directory', 'View Manage Directory Company', 'Roles may view directory company management but cannot make edits', 423);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archived` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `org_id`, `name`, `nickname`, `archived`, `created_at`, `updated_at`) VALUES
(1, 2, 'Green Home Rentals, LLC', 'Green Home', 0, '2020-02-17 14:30:45', '2020-02-17 14:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios_contacts`
--

CREATE TABLE `portfolios_contacts` (
  `id` int(10) NOT NULL,
  `portfolio_id` int(10) NOT NULL,
  `contact_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios_contacts`
--

INSERT INTO `portfolios_contacts` (`id`, `portfolio_id`, `contact_id`) VALUES
(1, 1, 79);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `org_id` int(10) NOT NULL,
  `portfolio_id` int(10) NOT NULL,
  `project_number` int(6) NOT NULL,
  `corporate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_legal_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internal_nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_lead` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archived` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `org_id`, `portfolio_id`, `project_number`, `corporate`, `company_name`, `company_legal_name`, `internal_nickname`, `is_lead`, `class`, `archived`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1234, '', NULL, '', '21 W Tonto', '1', 'Residential', 0, '2020-02-17 00:00:00', '2020-02-17 00:00:00'),
(2, 2, 1, 1235, NULL, NULL, NULL, '208 N Cameron', '1', 'Residential', 0, '2020-02-17 15:06:21', '2020-02-17 15:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `projects_addresses`
--

CREATE TABLE `projects_addresses` (
  `id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `address_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `projects_contacts`
--

CREATE TABLE `projects_contacts` (
  `id` int(10) NOT NULL,
  `project_id` int(5) NOT NULL,
  `contact_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `projects_meta`
--

CREATE TABLE `projects_meta` (
  `id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects_meta_attributes`
--

CREATE TABLE `projects_meta_attributes` (
  `id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects_meta_attributes`
--

INSERT INTO `projects_meta_attributes` (`id`, `org_id`, `class`, `category`, `tag`, `display`) VALUES
(1, 2, 'Residential', 'Roof', 'asphalt_shingle', 'Asphalt Shingle'),
(2, 2, 'Residential', 'Roof', 'flat_rolled', 'Flat rolled'),
(3, 2, 'Residential', 'Roof', 's-tile', 'S-Tile'),
(4, 2, 'Residential', 'Electrical', 'mpu_-_main_panel_upgrade', 'MPU - Main Panel Upgrade'),
(5, 2, 'Residential', 'Electrical', 'mbd-_main_breaker_derate', 'MBD- Main Breaker Derate'),
(6, 2, 'Residential', 'Roof', 'square_tile', 'Square Tile'),
(8, 2, 'Residential', 'Roof', 'rolled_asphalt', 'Rolled Asphalt'),
(9, 2, 'Residential', 'Roof', 'flat_foam', 'Flat Foam'),
(10, 2, 'Residential', 'Roof', 'spanish_clay', 'Spanish Clay'),
(11, 2, 'Residential', 'Roof', 'wood_shake', 'Wood Shake'),
(12, 2, 'Residential', 'Point of Interconnection', 'backfeed_breaker', 'Backfeed Breaker'),
(13, 2, 'Residential', 'Point of Interconnection', '200a-_solar_ready', '200A- Solar Ready'),
(14, 2, 'Residential', 'Point of Interconnection', '400a-_solar_ready', '400A- Solar Ready'),
(15, 2, 'Residential', 'Point of Interconnection', 'load_side_feeder_tap', 'Load Side Feeder Tap'),
(16, 2, 'Residential', 'Point of Interconnection', 'sub_panel_backfeed_breaker', 'Sub Panel Backfeed Breaker');

-- --------------------------------------------------------

--
-- Table structure for table `repository_colors`
--

CREATE TABLE `repository_colors` (
  `id` int(10) NOT NULL,
  `color_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repository_colors`
--

INSERT INTO `repository_colors` (`id`, `color_name`, `color_code`, `active`) VALUES
(0, 'N/A', '#FFFFFF', 1),
(1, 'Red', '#e11c33', 1),
(2, 'Green', '#37b23a', 1),
(3, 'Blue', '#0f5dd0', 1),
(6, 'Black', '#000000', 1),
(7, 'White', '#ffffff', 1),
(9, 'Silver', '#bebebe', 1),
(10, 'Yellow', '#c3d70b', 1),
(11, 'Purple', '#6d0bd2', 1),
(12, 'Brown', '#512d09', 1),
(13, 'Orange', '#da760f', 1),
(14, 'Grey', '#747474', 1);

-- --------------------------------------------------------

--
-- Table structure for table `repository_parts`
--

CREATE TABLE `repository_parts` (
  `id` int(5) NOT NULL,
  `org_id` int(3) NOT NULL DEFAULT '2',
  `sku` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_type` int(10) DEFAULT NULL,
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pricing_unit` int(10) NOT NULL,
  `stocking_unit` int(10) NOT NULL,
  `length` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length_unit` int(10) DEFAULT NULL,
  `height` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height_unit` int(10) DEFAULT NULL,
  `width` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width_unit` int(10) DEFAULT NULL,
  `weight` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` int(10) DEFAULT NULL,
  `volts` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watts` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amps` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(6) DEFAULT '0',
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode_image` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `repository_parts`
--

INSERT INTO `repository_parts` (`id`, `org_id`, `sku`, `part_no`, `manufacturer`, `description`, `parent_type`, `tags`, `pricing_unit`, `stocking_unit`, `length`, `length_unit`, `height`, `height_unit`, `width`, `width_unit`, `weight`, `color`, `volts`, `watts`, `amps`, `stock`, `image`, `barcode_image`, `location`, `updated_at`, `created_at`) VALUES
(158, 2, '200009132102', 'TSM-255PD05.082', '12', '255Watt Solar Module\r\n1000V STRINGS\r\n15A MAX SERIES FUSE RATING \r\n30 MODULES PER PALLET', 9, 'a:1:{i:19;s:11:\"Black Frame\";}', 8, 1, '64.95', 3, '1.37', 3, '39.05', 3, '41.9 lbs', 6, 'VOC=33.0 / VMP=30.3', '255', 'ISC=9.5 / IMP=8.27', 10447, 'annotation-2020-03-06-084900.jpg', '200009132102.png', NULL, '2020-03-06 15:49:17', '2019-04-17 13:33:31'),
(159, 2, '200009570218', 'TSM-250PA05.082', '12', '250 WATT MODULES \r\n600V STRINGS\r\n15A MAX SERIES FUSE RATING \r\n30 MODULES PER PALLET', 9, 'a:1:{i:19;s:11:\"Black Frame\";}', 8, 1, '64.96', 3, '1.38', 3, '39.06', 3, '41.9 lbs', 6, 'VOC=33.4 / VMP=30.3', '250', 'ISC=9.5 / IMP=8.27', 5060, 'annotation-2020-03-06-084900.jpg', '200009570218.png', NULL, '2020-03-06 15:52:07', '2019-04-23 11:26:32'),
(160, 2, '200009547906', 'TSM-250PD05.082', '12', '250 WATT MODULES \r\n1000VDC STRINGS\r\n15A MAX SERIES FUSE RATING \r\n30 MODULES PER PALLET', 9, 'a:1:{i:19;s:11:\"Black Frame\";}', 8, 1, '64.95', 3, '1.37', 3, '39.05', 3, '41.9 LBS', 6, 'VOC=33.0 / VMP=30.3', '250', 'ISC=9.5 / IMP=8.27', 10372, 'annotation-2020-03-06-084900.jpg', '200009547906.png', NULL, '2020-03-06 15:52:20', '2019-04-23 11:29:38'),
(161, 2, '200009892204', 'TSM-280 PA14', '12', '280 WATT MODULE\r\n600VDC STRINGS\r\n15A MAX SERIES FUSE RATING  \r\n20PCS PER PALLET', 9, 'a:1:{i:18;s:12:\"Silver Frame\";}', 8, 1, '77.0', 3, '1.81', 3, '39.05', 3, '61.7 LBS', 9, 'VOC=44.4 / VMP=36.0', '280', 'ISC=8.33 / IMP=7.78', 309, 'trinasolartsm-275pd05.jpg', '200009892204.png', NULL, '2019-04-26 03:21:33', '2019-04-23 11:43:54'),
(162, 2, '200009420056', 'Q.Pro L-G2 305', '11', '305 Watt Solar Module \r\n1000vdc Strings\r\n20A Max Series Fuse Rating \r\n24 Module per Pallet', 9, 'a:1:{i:18;s:12:\"Silver Frame\";}', 8, 1, '76.7', 3, '1.57', 3, '38.7', 3, '48.72Lbs', 0, 'VOC = 45.14 /  VMP = 36.99', '305', 'ISC = 8.99 / IMP = 8.38', 161, 'q-pro.jpg', '200009420056.png', NULL, '2020-02-17 22:40:41', '2019-05-01 14:41:49'),
(163, 2, '200009837212', 'SF260-36-P285L', '11', '285W Solar Module\r\n1000VDC\r\n15A Max Series Fuse Rating \r\n20 per Pallet', 9, 'a:1:{i:18;s:12:\"Silver Frame\";}', 8, 1, '77.4', 3, '1.97', 3, '39.37', 3, '57.3Lbs', 0, 'VOC = 44.5 / VMP = 36.2', '285', 'ISC = 8.45 / IMP = 7.87', 37, 'hanwha285.jpg', '200009837212.png', NULL, '2020-02-17 22:40:45', '2019-05-01 14:51:03'),
(164, 2, '200009564026', 'SF260-36-P290L', '11', '290Watt Module\r\n1000VDC \r\n15A Max series Fuse Rating \r\n20 per Pallet', 9, 'a:1:{i:18;s:12:\"Silver Frame\";}', 8, 1, '77.4', 3, '1.97', 3, '39.37', 3, '57.3Lbs', 0, 'VOC = 44.7 / VMP = 36.3', '290', 'ISC = 8.5 / IMP = 7.99', 122, 'sf260-36-p290l.jpg', '200009564026.png', NULL, '2020-02-17 22:40:48', '2019-05-01 14:54:48'),
(165, 2, '200006019536', 'HOM115', '23', '1P / 15A / Homeline Breaker', 6, 'a:2:{i:66;s:11:\"Single Pole\";i:68;s:6:\"15 Amp\";}', 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 33, 'hom115.jpg', '200006019536.png', NULL, '2019-09-23 17:36:45', '2019-07-16 14:01:47'),
(166, 2, '200009780068', 'YL290P-35B', '16', '290W Solar Module', 9, NULL, 1, 1, '77.56', 3, '1.97', 3, '38.98', 3, '59lbs', 0, NULL, '290', NULL, NULL, 'yl290p-35b.jpg', '200009780068.png', NULL, '2019-09-23 18:05:24', '2019-07-16 15:25:37'),
(167, 2, '200009926657', 'SN270P-10', '14', '270 Watt Solar Module', 9, NULL, 1, 1, '64.96', 3, '1.18', 3, '39.98', 3, '37.48', 0, NULL, '270', NULL, 283, 'sn270p-10.jpg', '200009926657.png', NULL, '2019-09-23 18:07:12', '2019-07-16 15:27:48'),
(168, 2, '200009155620', 'SF270-KMC', '15', '270 Watt Solar Module', 9, 'a:1:{i:19;s:11:\"Black Frame\";}', 1, 1, '65.3', 3, '1.97', 3, '38.97', 3, '41.90 lbs', 0, NULL, '270', NULL, 361, 'sf270-kmc.jpg', '200009155620.png', NULL, '2020-02-17 22:40:21', '2019-07-16 15:29:46'),
(169, 2, '200009347513', 'SM-285PC8', '14', '285 Watt Solar Module', 9, NULL, 1, 1, '78.15', 3, '2.0', 3, '39.33', 3, '61.7 lbs', 0, NULL, '285', NULL, 1628, 'sm-285pc8.jpg', '200009347513.png', NULL, '2019-09-23 18:17:25', '2019-07-16 15:32:10'),
(170, 2, '200009288120', 'SN325P-10', '14', '325 Watts Solar Module', 9, NULL, 1, 1, '77.56', 3, '1.57', 3, '39.98', 3, NULL, 0, NULL, '325', NULL, 1550, 'sm-285pc8.jpg', '200009288120.png', NULL, '2019-09-23 18:19:18', '2019-07-16 15:48:15'),
(171, 2, '200009483693', 'SN330P-10', '14', '330 Watts Solar Module', 9, NULL, 1, 1, '77.56', 3, '1.57', 3, '38.98', 3, '50.71 lbs', 0, NULL, '330 Watts', NULL, 560, 'sm-285pc8.jpg', '200009483693.png', NULL, '2019-09-23 18:19:36', '2019-07-16 15:51:16'),
(172, 2, '200010274594', 'IGPlusA7.5', '8', '7.5 Inverter', 10, 'a:1:{i:20;s:17:\"Transformer Based\";}', 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 'ig-plus-75.jpg', '200010274594.png', NULL, '2019-09-23 19:37:10', '2019-07-16 15:54:39'),
(173, 2, '200010856141', 'IGPlusA3.8', '8', '3.8 Inverter', 10, 'a:1:{i:20;s:17:\"Transformer Based\";}', 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 'ig-plus-38.jpg', '200010856141.png', NULL, '2019-09-23 19:37:05', '2019-07-16 15:55:23'),
(174, 2, '200010024489', 'SB5000US-11', '9', '5,000W Transformer-based Inverter with 1 MPPT\r\nNot compatible with optimizers', 10, 'a:1:{i:20;s:17:\"Transformer Based\";}', 1, 1, '9', 3, '24.0', 3, '18.5', 3, '147LBS', 14, '240VAC / 600VDC', '5,000', '21.0AAC Output / 36.0ADC Input', NULL, 'sma-sunny-boy-5000us-12-2t.jpg', '200010024489.png', NULL, '2020-02-21 19:45:33', '2019-07-16 15:56:02'),
(175, 2, '200008196549', '302005D', '31', 'Small End Cap (DarK)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 800, '302005d.jpg', '200008196549.png', NULL, '2019-09-23 18:25:17', '2019-07-17 11:13:52'),
(176, 2, '200008203537', '302006C', '31', 'Small End Clamp ( Clear)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 680, '31rvy7hk9rlsx342.jpg', '200008203537.png', NULL, '2019-09-23 18:26:11', '2019-07-17 11:15:01'),
(177, 2, '200008653615', '302027D', '31', 'Small Mid Clamp & BC (Dark)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1480, '302027d.jpg', '200008653615.png', NULL, '2019-09-23 11:33:50', '2019-07-17 11:16:10'),
(178, 2, '200008816584', '302021D', '31', 'Small End Clamp B (Dark)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 639, '302005d.jpg', '200008816584.png', NULL, '2019-09-23 18:34:33', '2019-07-17 11:16:55'),
(179, 2, '200008091073', '302028C', '31', 'Small Mid EF SS', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 60, 'unirac-302028c-2.jpg', '200008091073.png', NULL, '2019-09-23 11:36:24', '2019-07-17 11:17:47'),
(180, 2, '200008494669', '302022C', '31', 'Small End O Clear', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 20, '31rvy7hk9rlsx342.jpg', '200008494669.png', NULL, '2019-09-23 18:55:46', '2019-07-17 11:18:31'),
(181, 2, '200008627241', '302022D', '31', 'Small End O Dark', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 160, '302005d.jpg', '200008627241.png', NULL, '2019-09-23 18:55:11', '2019-07-17 11:19:21'),
(182, 2, '200008421290', '302023C', '31', 'Small End D Clear', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 80, '31rvy7hk9rlsx342.jpg', '200008421290.png', NULL, '2019-09-23 18:38:30', '2019-07-17 11:21:10'),
(183, 2, '200008458531', '302005C', '31', 'Small End E (Clear)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 80, '31rvy7hk9rlsx342.jpg', '200008458531.png', NULL, '2019-09-23 18:38:56', '2019-07-17 11:22:10'),
(184, 2, '200008979005', '302029C', '31', 'Small BND Mid (clear)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 20, 'unirac-302028c-2.jpg', '200008979005.png', NULL, '2019-09-23 18:40:12', '2019-07-17 11:22:54'),
(185, 2, '200008160526', '302021C', '31', 'Small End B (Clear)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 20, '31rvy7hk9rlsx342.jpg', '200008160526.png', NULL, '2019-09-23 18:40:40', '2019-07-17 11:24:08'),
(186, 2, '200008267355', '302027C', '31', 'Small BND Mid BC (Clear)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 20, 'unirac-302028c-2.jpg', '200008267355.png', NULL, '2019-09-23 18:56:40', '2019-07-17 11:25:20'),
(187, 2, '200008111412', '303018D', '31', 'Splice Bar  (dark)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 138, '303018d.jpg', '200008111412.png', NULL, '2019-09-23 18:56:22', '2019-07-17 11:26:27'),
(188, 2, '200008645184', '304001D', '31', 'L-Foot W/Bolt', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 363, '304001d.jpg', '200008645184.png', NULL, '2019-09-23 18:44:21', '2019-07-17 11:28:05'),
(189, 2, '200008037699', '304001C', '31', 'L-Foot W/Bolt ( Clear)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 40, '304001c.jpg', '200008037699.png', NULL, '2019-09-23 18:50:17', '2019-07-17 11:28:54'),
(190, 2, '200008860273', '302024C', '31', 'Small End E Clamp (Clear)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 40, '31rvy7hk9rlsx342.jpg', '200008860273.png', NULL, '2019-09-23 11:57:08', '2019-07-17 11:31:47'),
(191, 2, '200008294696', '302024D', '31', 'Small End E Clamp (dark)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 20, '302005d.jpg', '200008294696.png', NULL, '2019-09-23 18:57:26', '2019-07-17 11:32:35'),
(192, 2, '200012268317', 'MB381', '3', '3/8 X 1\" Hex Bolt', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, 'mb381.jpg', '200012268317.png', NULL, '2020-02-19 11:50:07', '2019-07-17 11:35:36'),
(193, 2, '200012609325', 'MB141', '3', '1/4 x 1 Hex Bolt', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, 'mb141.jpg', '200012609325.png', NULL, '2019-09-23 19:01:03', '2019-07-17 11:38:06'),
(194, 2, '200012261202', 'LW38', '3', '3/8 Hex Bolt', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 40, 'mb381.jpg', '200012261202.png', NULL, '2019-09-23 19:01:29', '2019-07-17 14:26:16'),
(195, 2, '200012220384', 'MB14114', '3', '1/4 X 1 1/4\" Hex Bolt', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 39, 'mb141.jpg', '200012220384.png', NULL, '2020-02-19 11:49:26', '2019-07-17 14:27:13'),
(196, 2, '200012581218', 'LW14', '3', '1/4 Comp Washer', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 50, 'lw14.jpg', '200012581218.png', NULL, '2019-09-23 19:04:06', '2019-07-17 14:28:09'),
(197, 2, '200012725131', 'N8D5HDG', '37', '1-1/2 Concrete nails', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 750, 'n8d5hdg.jpg', '200012725131.png', NULL, '2019-09-23 19:05:05', '2019-07-17 14:30:05'),
(198, 2, '200012441390', 'GF1-MLL-812', '38', '12 x 8 Galvanized Flashing', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 273, 'ecofasten-gf1.jpg', '200012441390.png', NULL, '2020-02-17 22:46:17', '2019-07-17 14:34:39'),
(199, 2, '200012172041', 'QMC-F12x12', '39', '12 x 12 Galvanized Flashing', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 108, 'flasining12x12.jpg', '200012172041.png', NULL, '2020-02-17 23:09:31', '2019-07-17 14:36:03'),
(200, 2, '200008758501', '302026C', '31', 'Small End K (clear)', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 25, '31rvy7hk9rlsx342.jpg', '200008758501.png', NULL, '2019-09-23 19:13:00', '2019-07-17 14:38:05'),
(201, 2, '200008396208', '307115M', '31', '30\" Tilt Legs', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 7, 'sm-ajd-tilt-leg-no-l-feet-e1505331752822.jpg', '200008396208.png', NULL, '2019-09-23 19:16:09', '2019-07-17 14:39:18'),
(202, 2, '200008918677', 'UFO-STP-40MM', '40', 'Stopper Sleeve', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 27, 'iron-ridge-stp-clear-40mm.jpg', '200008918677.png', NULL, '2019-09-23 12:26:41', '2019-07-17 14:41:42'),
(203, 2, '200008582519', 'XR-1000-SPLC-M1', '40', 'Rail Splice', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 25, 'xr-1000-splc-m1.jpg', '200008582519.png', NULL, '2019-09-23 19:20:16', '2019-07-17 14:43:49'),
(204, 2, '200008304371', 'GM-BRC-002', '40', 'SGA Rail Connector, for 2\" Pipe', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 23, '29-7001-002.jpg', '200008304371.png', NULL, '2019-09-23 12:29:26', '2019-07-17 14:44:52'),
(205, 2, '200008766995', 'UFO-CL-001', '40', 'Univ Module Clamp', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'ufo.jpg', '200008766995.png', NULL, '2019-09-23 12:26:22', '2019-07-17 14:47:11'),
(206, 2, '200008996552', 'XR-1000-168A', '40', 'XR1000, Rail 168” (14 Feet) Clear', 8, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 14, 'xr1000.jpg', '200008996552.png', NULL, '2019-09-23 19:35:56', '2019-07-17 14:47:54'),
(207, 2, '200012893403', '78EGRFGI', '43', '7/8\" Roofing Nails', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 269, NULL, '200012893403.png', NULL, '2019-07-17 15:08:12', '2019-07-17 15:08:12'),
(208, 2, '200012272277', '34EGFGI', '43', '3/4\" Roofing Nail', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 269, NULL, '200012272277.png', NULL, '2019-07-17 15:09:06', '2019-07-17 15:09:06'),
(209, 2, '200012898361', '01018', '44', '5/16 x 1-1/2 Lag Screw', 12, 'a:1:{i:10;s:8:\"Lag Bolt\";}', 1, 1, '1.5', 3, NULL, 0, '.3125', 3, NULL, 9, NULL, NULL, NULL, 100, 'annotation-2020-03-06-074700.jpg', '200012898361.png', NULL, '2020-03-06 14:47:53', '2019-07-17 15:13:53'),
(210, 2, '200012606423', '38S-SWG20', '45', '1/4 x 2 sidewinder', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 85, 'sammysside142.jpg', '200012606423.png', NULL, '2020-02-17 23:11:53', '2019-07-17 15:15:54'),
(211, 2, '200012989458', '15FW3-031', '46', '5/16 Flat Washer', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 3000, 'item-flat-washer-zp984221574438066.jpg', '200012989458.png', NULL, '2020-02-17 23:21:09', '2019-07-17 15:16:37'),
(212, 2, '200012737967', 'P00235347', '46', '304SS Hex Head Screw', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, NULL, '200012737967.png', NULL, '2019-07-17 15:17:33', '2019-07-17 15:17:33'),
(213, 2, '200012913989', 'P00333238', '46', '#8-32 Keps Nut Zinc', 12, 'a:1:{i:11;s:3:\"Nut\";}', 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 200, 'annotation-2020-03-06-083221.jpg', '200012913989.png', NULL, '2020-03-06 15:32:40', '2019-07-17 15:19:17'),
(214, 2, '200012803808', 'P00334670', '46', 'Pan Head Phillips Screw Zinc', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, NULL, '200012803808.png', NULL, '2019-07-17 15:20:18', '2019-07-17 15:20:18'),
(215, 2, '200012678727', '816003', '47', '3/8-16 Finish Hex Nut', 12, NULL, 1, 1, NULL, 0, NULL, 0, '.375', 3, NULL, 0, NULL, NULL, NULL, 100, 'annotation-2020-03-06-082527.jpg', '200012678727.png', NULL, '2020-03-06 15:25:47', '2019-07-17 15:21:07'),
(216, 2, '200012589665', '801057', '47', '3/8 -16 x 1', 12, NULL, 1, 1, '1.0', 3, NULL, 0, '.375', 3, NULL, 0, NULL, NULL, NULL, 100, 'annotation-2020-03-06-083046.jpg', '200012589665.png', NULL, '2020-03-06 15:30:54', '2019-07-17 15:21:52'),
(217, 2, '200011590785', '921-S', '49', '1-Hole Conduit Strap, 3/4 inch, Steel, Zinc Electro-Plated', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, '34strap23.jpg', '200011590785.png', NULL, '2020-02-18 00:04:49', '2019-07-17 15:52:00'),
(218, 2, '200011217903', '642S', '50', '3/4\" Indoor Set Screw EMT Coupling', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 27, '642s-3.jpg', '200011217903.png', NULL, '2020-02-18 00:10:35', '2019-07-17 15:52:45'),
(219, 2, '200011944984', '82707B', '55', '3/4\" Electrical Metallic Tube (EMT) Compression Connector with Insulated Throat', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 38, 'halex-conduit-fittings-82707b-641000.jpg', '200011944984.png', NULL, '2020-02-18 03:44:17', '2019-07-17 15:53:57'),
(220, 2, '200011667364', 'LG-144-2-CB', '51', '3/4\" EMT Rigid 90 Degree Combo Pull Elbow', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 5, 'lg-144-2-cbthumb.jpg', '200011667364.png', NULL, '2020-02-18 03:47:03', '2019-07-17 15:54:49'),
(221, 2, '200011492089', 'MECR-752-B', '51', '1\" EMT Rain Tight Compression Connector', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 70, 'madisompmecr-750.jpg', '200011492089.png', NULL, '2020-02-18 03:49:50', '2019-07-17 15:55:30'),
(222, 2, '200011504843', '322', '49', '3/4\" Plastic Bushing', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, 'bpftngmp321.jpg', '200011504843.png', NULL, '2020-02-18 03:51:19', '2019-07-17 15:57:19'),
(223, 2, '200011205054', '1-WBA', '51', '3/4 Conduit Hanger with Bolt', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 102, '1-wbathumb.jpg', '200011205054.png', NULL, '2020-02-18 03:53:46', '2019-07-17 15:58:17'),
(224, 2, '200011548359', 'DS075H1', '26', '3/4\" Rain Tight Hub Plate', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 30, 'ds075h1.jpg', '200011548359.png', NULL, '2020-02-18 03:55:32', '2019-07-17 15:59:11'),
(225, 2, '200011872119', 'MECR-762', '51', '1\" EMT Rain Tight Coupling', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 167, 'mecr-762thumb.jpg', '200011872119.png', NULL, '2020-02-18 03:57:55', '2019-07-17 16:00:33'),
(226, 2, '200003106826', 'DG221URB', '26', '2 Pole / 30 Amp Non-Fused Disconnect Safety Switch', 3, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, '30', 63, 'eaton-disconnects-dg221urb-641000.jpg', '200003106826.png', NULL, '2020-02-18 04:02:56', '2019-07-17 16:02:23'),
(227, 2, '200002446909', '927', '53', 'Meter Socket, 100A, 3PH, 4W, 7 Jaw, 600VAC, Ring Type, No Bypass', 2, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '600', NULL, '100', 1, 'prod2395907902.jpg', '200002446909.png', NULL, '2020-02-18 04:07:40', '2019-07-17 16:05:19'),
(228, 2, '200003534629', 'GF223NR', '6', '100 Amp, 2 Pole, 240VAC, Type 3R (Outdoor), Fusible General Duty Safety Disconnect Switch', 3, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '240', NULL, '100', NULL, 'gf322nr12.jpg', '200003534629.png', NULL, '2020-02-18 04:11:58', '2019-07-18 10:41:34'),
(229, 2, '200003725249', 'GF324N', '6', '200 Amp, 3 Pole, 240VAC, Type 1 (Indoor), Fusible General Duty Safety Disconnect Switch', 3, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '240', NULL, '200', NULL, 'gf323n40593153427191312801280.jpg', '200003725249.png', NULL, '2020-02-18 04:50:07', '2019-07-18 10:43:59'),
(230, 2, '200003197688', 'HF364R', '6', '200 Amp, 3 Pole, 600VAC, Type 3R (Outdoor), Fusible Heavy Duty Safety Disconnect Switch', 3, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '600', NULL, '200', 0, '814fhkaztlsy879.jpg', '200003197688.png', NULL, '2020-02-18 17:24:11', '2019-07-18 11:03:41'),
(231, 2, '200003686830', 'HNF362R', '6', '60 Amp, 3 Pole, 600VAC, Type 3R (Outdoor), Non-Fused Heavy Duty Safety Disconnect Switch', 3, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '600', NULL, '60', 0, '81oj9pd7blsx679.jpg', '200003686830.png', NULL, '2020-02-18 17:28:30', '2019-07-18 11:06:09'),
(232, 2, '200009528974', 'JAP6-72-285', '54', '285 Watt Solar Module', 9, NULL, 8, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 418, 'ezgif-2-7e37498708c5.jpg', '200009528974.png', NULL, '2020-02-18 17:46:05', '2019-07-18 15:47:46'),
(233, 2, '200000900298', 'SUN2000-30KTL-US-PLC', '56', '30000W GridTie Inverter 480V', 10, NULL, 1, 1, '30.3', 3, '10.6', 3, '21.7', 3, '121 lb', 0, '1,000 max input', '30,000', NULL, NULL, 'huaweimart.jpg', '200000900298.png', NULL, '2020-02-18 17:49:57', '2019-07-19 12:05:32'),
(234, 2, '200010222007', 'SB7000TL-US-22', '9', 'SMA Sunny Boy 7000TL-US-22 Inverter', 10, 'a:1:{i:21;s:15:\"Transformerless\";}', 1, 1, '20.5', 3, '19.3', 3, '7.3', 3, '86 lbs', 0, 'Input 600VDC - Output 208/240VAC', '7300', NULL, NULL, 'sb.jpg', '200010222007.png', NULL, '2020-02-20 23:13:28', '2019-07-19 12:08:33'),
(235, 2, '200009903313', 'D230', '17', NULL, 9, NULL, 8, 1, '64.49', 3, '4.82', 3, '38.66', 3, '40.8 lbs', 9, 'Voc: 36.8  |  Vmp: 29.8', '230', 'Isc: 8.34 | Imp: 7.71', 204, 'capture2.jpg', '200009903313.png', NULL, '2019-09-17 17:00:54', '2019-09-17 09:53:14'),
(236, 2, '200007024041', '1700C-WHITE', '58', 'Vinyl Tape - White', 17, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 's-l300.jpg', '200007024041.png', NULL, '2020-02-18 17:58:10', '2019-09-23 10:21:55'),
(237, 2, '200017235994', '1700C-YELLOW', '58', 'Vinyl Tape - Yellow', 17, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 10, NULL, NULL, NULL, 2, 'a0zc129793201357598967d8g6yarez3.jpg', '200017235994.png', NULL, '2020-02-18 11:10:32', '2019-09-23 10:25:24'),
(238, 2, '200011138000', 'ITCSN3000-48', '58', '3.0 X 48\" BLK SHRINK TUBE', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'iiimepmpitcsn-3000-48in-black-20-pcs.jpg', '200011138000.png', NULL, '2020-02-18 18:34:31', '2019-09-23 10:27:48'),
(239, 2, '200011651080', '4SDEK', '61', '4SQ 2-1/8D BOX COMB KO BOX 25', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'tp404-crs-0-1.jpg', '200011651080.png', NULL, '2020-02-18 18:34:59', '2019-09-23 10:31:40'),
(240, 2, '200011678001', '4SES', '61', '4SQ 1-1/2D COMB KO BOX 50', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '4ses.jpg', '200011678001.png', NULL, '2020-02-18 18:36:45', '2019-09-23 10:34:00'),
(241, 2, '200011300964', 'STB100', '61', '1-IN STR INS L/T CONN', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 22, 's-l400.jpg', '200011300964.png', NULL, '2020-02-18 18:38:05', '2019-09-23 10:36:46'),
(242, 2, '200011041706', 'STB125', '61', '1-1/4 STR INS L/T CONN', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 4, 's-l400.jpg', '200011041706.png', NULL, '2020-02-19 18:51:28', '2019-09-23 10:37:51'),
(243, 2, '200011348652', 'STB150', '61', '1-1/2 STR INS L/T CONN', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 8, 's-l400.jpg', '200011348652.png', NULL, '2020-02-19 18:51:56', '2019-09-23 10:38:51'),
(244, 2, '200011546270', 'STB50', '61', '1/2 STR INS L/T CONN', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 48, 's-l400.jpg', '200011546270.png', NULL, '2020-02-19 18:52:26', '2019-09-23 10:39:48'),
(245, 2, '200011288453', 'STB90100', '61', 'Liquidtight Connector, 90°, 1\", Malleable Iron, Insulated', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 22, 'egs-appstb90100-73843jpg.jpg', '200011288453.png', NULL, '2020-02-19 18:56:53', '2019-09-23 10:40:39'),
(246, 2, '200011364805', '38AST', '59', 'MC/AC Cable Connector, Snap-In, 3/8\", Insulated, Zinc Die Cast', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 10, '38astjpg.jpg', '200011364805.png', NULL, '2020-02-19 19:00:15', '2019-09-23 10:41:37'),
(247, 2, '200011411578', 'NMSC9075', '59', 'Liquidtight Connector, 3/4\", Screw-On, 90°, Non-Metallic', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'nmsc9075.jpg', '200011411578.png', NULL, '2020-02-19 19:02:37', '2019-09-23 10:43:16'),
(248, 2, '200013107387', 'NMSC50', '59', 'Liquidtight Connector, Screw-On, Straight, 1/2\", Non-Metallic', 13, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'nmsc50.jpg', '200013107387.png', NULL, '2020-02-19 19:04:32', '2019-09-23 10:44:43'),
(249, 2, '200011703789', '102-S', '49', 'Locknut, UL Listed, Conduit, Steel 3/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'locknut.jpg', '200011703789.png', NULL, '2020-02-19 21:46:54', '2019-09-23 10:51:03'),
(250, 2, '200011952996', '1025', '49', 'Service Entrance, LB, Aluminum, Size 1/2 Inch', 11, NULL, 1, 1, '3.25', 3, NULL, 0, '1.375', 3, '.26', 0, NULL, NULL, NULL, 1, '1025.jpg', '200011952996.png', NULL, '2020-02-24 15:36:03', '2019-09-23 10:53:21'),
(251, 2, '200011228237', '105-S', '49', 'Locknut, UL Listed, Conduit, Steel 1-1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 4, 'locknut.jpg', '200011228237.png', NULL, '2020-02-19 19:25:25', '2019-09-23 10:55:16'),
(252, 2, '200011272353', '1066', '49', 'Washer, Reducing, Galvanized Steel, Size 1 1/4 Inch - 1 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 3, 'reducingwasher.jpg', '200011272353.png', NULL, '2020-02-19 19:30:27', '2019-09-23 10:56:36'),
(253, 2, '200011481434', '106-S', '49', 'Locknut, UL Listed, Conduit, Steel 2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'locknut.jpg', '200011481434.png', NULL, '2020-02-19 19:36:34', '2019-09-23 10:57:26'),
(254, 2, '200011954242', '1070', '49', 'Washer, Reducing, Galvanized Steel, Size 1 1/2 Inch - 1 1/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 25, 'reducingwasher.jpg', '200011954242.png', NULL, '2020-02-19 19:37:57', '2019-09-23 10:58:46'),
(255, 2, '200011994583', '107-S', '49', 'Locknut, UL Listed, Conduit, Steel 2-1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'locknut.jpg', '200011994583.png', NULL, '2020-02-19 19:40:07', '2019-09-23 10:59:30'),
(256, 2, '200011300131', '0-WBA', '51', '1/2\" COND HGR W/BOLT', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 23, '1-wbathumb.jpg', '200011300131.png', NULL, '2020-02-18 11:40:23', '2019-09-23 10:59:33'),
(257, 2, '200011262743', '1081', '49', 'Washer, Reducing, Galvanized Steel, Size 2 1/2 Inch - 2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'reducingwasher.jpg', '200011262743.png', NULL, '2020-02-19 19:41:01', '2019-09-23 11:01:00'),
(258, 2, '200011056830', '1087', '49', 'Washer, Reducing, Galvanized Steel, Size 3 Inch - 2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 4, 'reducingwasher.jpg', '200011056830.png', NULL, '2020-02-19 19:42:45', '2019-09-23 11:01:57'),
(259, 2, '200011242356', '110-S', '49', 'Locknut, UL Listed, Conduit, Steel 4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'locknut.jpg', '200011242356.png', NULL, '2020-02-19 21:42:07', '2019-09-23 11:03:16'),
(260, 2, '200011752602', '1161', '49', 'Bushing, Reducing, Steel, Size 3/4 - 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 8, 'reducingbushing.jpg', '200011752602.png', NULL, '2020-02-19 21:45:00', '2019-09-23 11:07:02'),
(261, 2, '200011540827', '1170', '49', 'Bushing, Reducing, Steel, Size 1 1/2 - 1 1/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 5, 'reducingbushing.jpg', '200011540827.png', NULL, '2020-02-19 21:48:09', '2019-09-23 11:08:02'),
(262, 2, '200011489997', '1179', '49', 'Bushing, Reducing, Malleable Iron, Size 3 - 2 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 3, 'reducingbushing.jpg', '200011489997.png', NULL, '2020-02-19 21:50:05', '2019-09-23 11:09:00'),
(263, 2, '200011466196', '144', '49', 'Locknut, Sealing, Steel / PVC, Size 1 1/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 3, 'sealinglocknut.jpg', '200011466196.png', NULL, '2020-02-19 21:54:14', '2019-09-23 11:13:07'),
(264, 2, '200011823500', '145', '49', 'Locknut, Sealing, Steel / PVC, Size 1 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'sealinglocknut.jpg', '200011823500.png', NULL, '2020-02-19 21:55:20', '2019-09-23 11:14:07'),
(265, 2, '200011566056', '146', '49', 'Locknut, Sealing, Steel / PVC, Size 2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 8, 'sealinglocknut.jpg', '200011566056.png', NULL, '2020-02-19 21:56:09', '2019-09-23 11:15:15'),
(266, 2, '200011424073', '150', '49', 'Locknut, Sealing, Steel / PVC, Size 4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 8, 'sealinglocknut.jpg', '200011424073.png', NULL, '2020-02-19 21:57:02', '2019-09-23 11:16:38'),
(267, 2, '200011770590', '152-DC', '49', 'Conduit Hub, Myer\'s Hub, 3/4\", Insulated, Raintight, Zinc Die Cast', 11, 'a:1:{i:23;s:3:\"EMT\";}', 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 6, 'myers1.jpg', '200011770590.png', NULL, '2021-09-05 23:40:16', '2019-09-23 11:17:56'),
(268, 2, '200011238328', '151-DC', '49', 'Conduit Hub, Myer\'s Hub, 1/2\", Insulated, Raintight, Zinc Die Cast', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'myers1.jpg', '200011238328.png', NULL, '2020-02-19 22:17:09', '2019-09-23 11:18:59'),
(269, 2, '200011238731', '1523-DC', '49', 'Nipple, Offset, Zinc Die Cast, Size 1 1/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'offsetnip.jpg', '200011238731.png', NULL, '2020-02-19 22:19:58', '2019-09-23 11:19:48'),
(270, 2, '200011385602', '1522-DC', '49', 'Nipple, Offset, Zinc Die Cast, Size 1 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'offsetnip.jpg', '200011385602.png', NULL, '2020-02-19 22:51:48', '2019-09-23 11:20:39'),
(271, 2, '200011832885', '153-DC', '49', 'Conduit Hub, Myer\'s Hub, 1\", Insulated, Raintight, Zinc Die Cast', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 9, 'myers1.jpg', '200011832885.png', NULL, '2020-02-19 22:54:38', '2019-09-23 11:21:21'),
(272, 2, '200011524384', '154-DC', '49', 'Conduit Hub, Myer\'s Hub, 1 1/4\", Insulated, Raintight, Zinc Die Cast', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'myers1.jpg', '200011524384.png', NULL, '2020-02-19 22:55:01', '2019-09-23 11:22:18'),
(273, 2, '200011432627', '155-DC', '49', 'Conduit Hub, Myer\'s Hub, 1 1/2\", Insulated, Raintight, Zinc Die Cast', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 3, 'myers1.jpg', '200011432627.png', NULL, '2020-02-19 22:56:09', '2019-09-23 11:23:04'),
(274, 2, '200011849593', '160-DC', '49', 'Conduit Hub, Myer\'s Hub, 4\", Insulated, Raintight, Zinc Die Cast', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 6, 'myers1.jpg', '200011849593.png', NULL, '2020-02-19 22:57:12', '2019-09-23 11:27:11'),
(275, 2, '200011028288', '1907', '49', 'Strap, Two Hole Pipe, Steel, Size 2-1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 200, '2hstrap.jpg', '200011028288.png', NULL, '2020-02-19 23:00:33', '2019-09-23 11:31:46'),
(276, 2, '200011693578', '164', '51', '1/4\" one hole midget strap', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 102, 'madisomp162.jpg', '200011693578.png', NULL, '2020-02-18 18:41:42', '2019-09-23 11:33:33'),
(277, 2, '200011619790', '2100', '49', 'Hanger, Steel, Bolt, Trade Size 0 for 1/2\" Conduit', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, '0-wba.jpg', '200011619790.png', NULL, '2020-02-19 23:02:29', '2019-09-23 11:35:31'),
(278, 2, '200011561976', '2110', '49', 'Hanger, Steel, Bolt, Trade Size 0 for 3/4\" Conduit', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 25, '0-wba.jpg', '200011561976.png', NULL, '2020-02-19 23:02:58', '2019-09-23 11:36:24'),
(279, 2, '200011063937', '2120', '49', 'Hanger, Steel, Bolt, Trade Size 0 for 1\" Conduit', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 20, '0-wba.jpg', '200011063937.png', NULL, '2020-02-19 23:03:25', '2019-09-23 11:37:19'),
(280, 2, '200011986557', '2150', '49', 'Hanger, Steel, Bolt, Trade Size 0 for 2\" Conduit', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 20, '0-wba.jpg', '200011986557.png', NULL, '2020-02-19 23:05:52', '2019-09-23 11:38:10'),
(281, 2, '200011815352', '250-SRTI', '49', 'Raintight Connector, Compression, Steel, Insulated Throat, Size 1/2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 225, '250-srti.jpg', '200011815352.png', NULL, '2020-02-19 16:53:46', '2019-09-23 11:39:14'),
(282, 2, '200011019101', '251-SRTI', '49', 'Raintight Connector, Compression, Steel, Insulated Throat, Size 3/4\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, '251-srti.jpg', '200011019101.png', NULL, '2020-02-19 16:45:36', '2019-09-23 11:40:14'),
(283, 2, '200011394451', '253-SRTI', '49', 'Raintight Connector, Compression, Steel, Insulated Throat, Size 1 1/4\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 62, '251-srti.jpg', '200011394451.png', NULL, '2020-02-19 16:45:45', '2019-09-23 11:41:34'),
(284, 2, '200011561433', '254-SRTI', '49', 'Raintight Connector, Compression, Steel, Insulated Throat, Size 1 1/2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 12, '254-srti.jpg', '200011561433.png', NULL, '2020-02-19 16:45:55', '2019-09-23 11:44:02'),
(285, 2, '200011233477', '255-SRTI', '49', 'Raintight Connector, Compression, Steel, Insulated Throat, Size 2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 33, '254-srti.jpg', '200011233477.png', NULL, '2020-02-19 23:47:08', '2019-09-23 11:48:33'),
(286, 2, '200011568371', '256-SRTI', '49', 'Raintight Connector, Compression, Steel, Insulated Throat, Size 2 1/2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 22, '256srti-bri-0-1.jpg', '200011568371.png', NULL, '2020-02-19 23:48:25', '2019-09-23 11:49:50'),
(287, 2, '200011972635', '257-SRTI', '49', 'Raintight Connector, Compression, Steel, Insulated Throat, Size 3\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 6, '256srti-bri-0-1.jpg', '200011972635.png', NULL, '2020-02-19 23:50:58', '2019-09-23 11:54:17'),
(288, 2, '200011289689', '259-SRTI', '49', 'Raintight Connector, Compression, Steel, Insulated Throat, Size 4\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 14, '256srti-bri-0-1.jpg', '200011289689.png', NULL, '2020-02-19 23:51:18', '2019-09-23 11:55:12'),
(289, 2, '200011357678', '260-SRT', '49', 'Raintight Coupling, Compression, Steel, Size 1/2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 4, '260srt.jpg', '200011357678.png', NULL, '2020-02-20 00:00:54', '2019-09-23 11:57:58'),
(290, 2, '200011933674', '261-SRT', '49', 'Raintight Coupling, Compression, Steel, Size 3/4\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 7, '260srt.jpg', '200011933674.png', NULL, '2020-02-20 00:01:13', '2019-09-23 11:58:39'),
(291, 2, '200011294034', '262-SRT', '49', 'Raintight Coupling, Compression, Steel, Size 1\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 75, '260srt.jpg', '200011294034.png', NULL, '2020-02-20 00:01:38', '2019-09-23 11:59:26'),
(292, 2, '200011465441', '263-SRT', '49', 'Raintight Coupling, Compression, Steel, Size 1 1/4\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 60, '260srt.jpg', '200011465441.png', NULL, '2020-02-20 00:02:26', '2019-09-23 12:00:39'),
(293, 2, '200011134736', '264-SRT', '49', 'Raintight Coupling, Compression, Steel, Size 1 1/2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 14, '260srt.jpg', '200011134736.png', NULL, '2020-02-20 00:02:40', '2019-09-23 12:01:31'),
(294, 2, '200011785747', '266-SRT', '49', 'Raintight Coupling, Compression, Steel, Size 2 1/2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 42, '260srt.jpg', '200011785747.png', NULL, '2020-02-20 00:02:58', '2019-09-23 12:02:16'),
(295, 2, '200011682190', '267-SRT', '49', 'Raintight Coupling, Compression, Steel, Size 3\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 8, '260srt.jpg', '200011682190.png', NULL, '2020-02-20 00:03:14', '2019-09-23 12:05:41'),
(296, 2, '200011166423', '267-RT', '49', '3\" Raintight Coupling', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 4, '260-rtlg.jpg', '200011166423.png', NULL, '2020-02-20 00:06:00', '2019-09-23 12:06:30'),
(297, 2, '200011228916', '269', '49', 'Coupling, Compression, Steel, Size 4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 4, 'bp-269cpl.jpg', '200011228916.png', NULL, '2020-02-20 00:11:22', '2019-09-23 12:08:41'),
(298, 2, '200011043045', '321', '49', '1/2\" Plastic Bushing', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 4, 'bpftngmp321.jpg', '200011043045.png', NULL, '2020-02-20 00:13:25', '2019-09-23 12:09:42'),
(299, 2, '200011144919', '324', '49', '1 1/4\" Plastic Bushing', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'bpftngmp321.jpg', '200011144919.png', NULL, '2020-02-20 00:14:07', '2019-09-23 12:11:10'),
(300, 2, '200011005944', '325', '49', '1 1/2\" Plastic Bushing', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'bpftngmp321.jpg', '200011005944.png', NULL, '2020-02-20 00:14:56', '2019-09-23 12:11:46'),
(301, 2, '200011248471', '330', '49', '4\" Plastic Bushing', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'bpftngmp321.jpg', '200011248471.png', NULL, '2020-02-20 00:15:42', '2019-09-23 12:12:32'),
(302, 2, '200011572880', '382-DC', '49', 'Bushing, Insulated, Grounding, Zinc Die Cast, Size 3/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 103, '381-dc1.jpg', '200011572880.png', NULL, '2020-02-20 00:23:09', '2019-09-23 12:13:22'),
(303, 2, '200011375320', '384-DC', '49', 'Bushing, Insulated, Grounding, Zinc Die Cast, Size 1 1/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 9, '381-dc1.jpg', '200011375320.png', NULL, '2020-02-20 00:23:28', '2019-09-23 12:14:09'),
(304, 2, '200011996907', '385-DC', '49', 'Bushing, Insulated, Grounding, Zinc Die Cast, Size 1 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 12, '381-dc1.jpg', '200011996907.png', NULL, '2020-02-20 00:23:44', '2019-09-23 12:14:51'),
(305, 2, '200011901932', '386-DC', '49', 'Bushing, Insulated, Grounding, Zinc Die Cast, Size 2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 6, '381-dc1.jpg', '200011901932.png', NULL, '2020-02-20 00:23:58', '2019-09-23 12:15:48'),
(306, 2, '200011240833', '387-DC', '49', 'Bushing, Insulated, Grounding, Zinc Die Cast, Size 2 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, '381-dc1.jpg', '200011240833.png', NULL, '2020-02-20 00:24:15', '2019-09-23 12:16:22'),
(307, 2, '200011026543', '388-DC', '49', 'Bushing, Insulated, Grounding, Zinc Die Cast, Size 3 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 10, '381-dc1.jpg', '200011026543.png', NULL, '2020-02-20 00:24:35', '2019-09-23 12:17:04'),
(308, 2, '200011885157', '390-DC', '49', 'Bushing, Insulated, Grounding, Zinc Die Cast, Size 4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, '381-dc1.jpg', '200011885157.png', NULL, '2020-02-20 00:24:51', '2019-09-23 12:17:41'),
(309, 2, '200011312981', '414-DC2', '49', 'Connector, Squeeze, Zinc Die Cast, Trade Size 1 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, '414-dc2.jpg', '200011312981.png', NULL, '2020-02-20 00:53:16', '2019-09-23 12:18:57'),
(310, 2, '200011883429', '416-DC2', '49', 'Connector, Squeeze, Zinc Die Cast, Trade Size 2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, '414-dc2.jpg', '200011883429.png', NULL, '2020-02-20 00:53:54', '2019-09-23 12:19:33'),
(311, 2, '200011816625', '432-SLTI', '49', 'Connector, Liquid Tight, Straight, Steel, Insulated Throat, Size 1 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 6, '432-slti.jpg', '200011816625.png', NULL, '2020-02-20 00:56:00', '2019-09-23 12:21:01'),
(312, 2, '200011487047', '434-SLTI', '49', 'Connector, Liquid Tight, Straight,Insulated Throat, Size 1 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 6, '432-slti.jpg', '200011487047.png', NULL, '2020-02-20 16:41:02', '2019-09-23 12:22:24'),
(313, 2, '200011134835', '472-SLTI', '49', 'Connector, Liquid Tight, 90 Degree, Insulated Throat, Size 1 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, '472-slti.jpg', '200011134835.png', NULL, '2020-02-20 17:24:22', '2019-09-23 12:23:26'),
(314, 2, '200011198929', '907-S', '49', 'Strap, One Hole, Steel, Size 2 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 6, '907-s.jpg', '200011198929.png', NULL, '2020-02-20 17:27:24', '2019-09-23 12:24:01'),
(315, 2, '200011364225', '921-S', '49', 'Strap, EMT, One Hole, Steel, Size 3/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, '921-s.jpg', '200011364225.png', NULL, '2020-02-20 17:29:41', '2019-09-23 12:24:53'),
(316, 2, '200011231329', '922-S', '49', 'Strap, EMT, One Hole, Steel, Size 1 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 50, '921-s.jpg', '200011231329.png', NULL, '2020-02-20 19:20:19', '2019-09-23 12:26:05'),
(317, 2, '200011940894', '923-S', '49', 'Strap, EMT, One Hole, Steel, Size 1 1/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 20, '921-s.jpg', '200011940894.png', NULL, '2020-02-20 19:21:10', '2019-09-23 12:27:38'),
(318, 2, '200011616553', '925-S', '49', 'Strap, EMT, One Hole, Steel, Size 2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, '921-s.jpg', '200011616553.png', NULL, '2020-02-20 19:21:52', '2019-09-23 12:31:15'),
(319, 2, '200011778077', '9796', '49', 'Bushing, Insulating, Plastic, Rated 105 Degrees C, 2\" Trade Size, Fits 2.500\" Actual Hole Dia.', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, '9796.jpg', '200011778077.png', NULL, '2020-02-20 19:30:30', '2019-09-23 12:32:12'),
(320, 2, '200011894609', 'LB-41CG', '49', 'Rigid and IMC Conduit Body, Type LB, Aluminum, Cover and Gasket, Size 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 13, 'lb-41cg.jpg', '200011894609.png', NULL, '2020-02-20 19:34:38', '2019-09-23 12:33:30'),
(321, 2, '200011319898', 'LB-42CG', '49', 'Rigid and IMC Conduit Body, Type LB, Aluminum, Cover and Gasket, Size 3/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 7, 'lb-41cg.jpg', '200011319898.png', NULL, '2020-02-20 19:35:04', '2019-09-23 12:34:32'),
(322, 2, '200011307024', 'LB-44CG', '49', 'Rigid and IMC Conduit Body, Type LB, Aluminum, Cover and Gasket, Size 1 1/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 4, 'lb-41cg.jpg', '200011307024.png', NULL, '2020-02-20 19:35:42', '2019-09-23 12:35:20'),
(323, 2, '200011273336', 'LB-45CG', '49', 'Rigid and IMC Conduit Body, Type LB, Aluminum, Cover and Gasket, Size 1 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'lb-41cg.jpg', '200011273336.png', NULL, '2020-02-20 19:36:07', '2019-09-23 12:36:03'),
(324, 2, '200011082204', 'LB-46CG', '49', 'Rigid and IMC Conduit Body, Type LB, Aluminum, Cover and Gasket, Size 2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 4, 'lb-41cg.jpg', '200011082204.png', NULL, '2020-02-20 19:36:33', '2019-09-23 12:37:12'),
(325, 2, '200011724524', 'LB-48CG', '49', 'Rigid and IMC Conduit Body, Type LB, Aluminum, Cover and Gasket, Size 3 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'lb-41cg.jpg', '200011724524.png', NULL, '2020-02-20 19:37:03', '2019-09-23 12:39:09'),
(326, 2, '200011364874', 'LB-50CG', '49', 'Rigid and IMC Conduit Body, Type LB, Aluminum, Cover and Gasket, Size 4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'lb-41cg.jpg', '200011364874.png', NULL, '2020-02-20 19:37:44', '2019-09-23 12:40:05'),
(327, 2, '200011952125', 'LL-41CG', '49', 'Rigid and IMC Conduit Body, Type LL, Aluminum, Cover and Gasket, Size 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'll-41cg.jpg', '200011952125.png', NULL, '2020-02-20 19:39:56', '2019-09-23 12:41:03'),
(328, 2, '200011325035', 'LL-42CG', '49', 'Rigid and IMC Conduit Body, Type LL, Aluminum, Cover and Gasket, Size 3/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'll-41cg.jpg', '200011325035.png', NULL, '2020-02-20 19:41:07', '2019-09-23 12:43:49'),
(329, 2, '200011410168', 'T-41CG', '49', 'Rigid and IMC Conduit Body, Type T, Aluminum, Cover and Gasket, Size 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 25, 't-41cg.jpg', '200011410168.png', NULL, '2020-02-20 19:43:14', '2019-09-23 12:44:32'),
(330, 2, '200011401944', 'T-42CG', '49', 'Rigid and IMC Conduit Body, Type T, Aluminum, Cover and Gasket, Size 3/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 't-41cg.jpg', '200011401944.png', NULL, '2020-02-20 19:43:29', '2019-09-23 12:48:34'),
(331, 2, '200014914229', 'YC4L12', '24', 'Copper Compression C Tap, Thin Wall, 6 AWG (Run), 6-8 AWG (Tap)', 14, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 217, 'yc4l12.jpg', '200014914229.png', NULL, '2020-02-20 19:48:07', '2019-09-23 13:00:44'),
(332, 2, '200014379691', '4407', '24', '1P 30A FUSE HLDR', 14, 'a:1:{i:56;s:6:\"600VDC\";}', 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'annotation-2020-03-06-083638.jpg', '200014379691.png', NULL, '2020-03-06 15:36:50', '2019-09-23 13:13:16'),
(333, 2, '200011087452', 'EMT12', '25', 'EMT Conduit 1/2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 400, 'emt.jpg', '200011087452.png', NULL, '2020-02-20 19:54:33', '2019-09-23 13:23:44'),
(334, 2, '200011825177', 'EMT112', '25', 'EMT Conduit 1 1/2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 300, 'emt.jpg', '200011825177.png', NULL, '2020-02-20 19:55:15', '2019-09-23 13:24:48'),
(335, 2, '200011495585', 'EMT114', '25', 'EMT Conduit 1 1/4\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 88, 'emt.jpg', '200011495585.png', NULL, '2020-02-20 19:55:50', '2019-09-23 13:25:53'),
(336, 2, '200011898683', 'EMT1', '25', 'EMT Conduit 1\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 249, 'emt.jpg', '200011898683.png', NULL, '2020-02-20 19:57:52', '2019-09-23 13:37:06'),
(337, 2, '200011404495', 'EMT2', '25', 'EMT Conduit 2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, 'emt.jpg', '200011404495.png', NULL, '2020-02-20 19:58:48', '2019-09-23 13:39:03'),
(338, 2, '200011780377', 'EMT212', '25', 'EMT Conduit 2 1/2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 70, 'emt.jpg', '200011780377.png', NULL, '2020-02-20 19:59:04', '2019-09-23 13:39:49'),
(339, 2, '200011437134', 'EMT3', '25', 'EMT Conduit 3\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 50, 'emt.jpg', '200011437134.png', NULL, '2020-02-20 19:59:32', '2019-09-23 13:40:24'),
(340, 2, '200011038317', 'EMT4', '25', 'EMT Conduit 4\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 10, 'emt.jpg', '200011038317.png', NULL, '2020-02-20 20:00:10', '2019-09-23 13:44:23'),
(341, 2, '200011963626', 'GALV112', '25', 'EMT Conduit, Steel, Galvanized 1 1/2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 30, 'emt.jpg', '200011963626.png', NULL, '2020-02-20 20:03:56', '2019-09-23 13:45:11'),
(342, 2, '200011115445', 'GALV2', '25', 'EMT Conduit, Steel, Galvanized 2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 10, 'emt.jpg', '200011115445.png', NULL, '2020-02-20 20:04:08', '2019-09-23 13:45:43'),
(343, 2, '200011037020', 'GALV212', '25', 'EMT Conduit, Steel, Galvanized 2 1/2\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 10, 'emt.jpg', '200011037020.png', NULL, '2020-02-20 20:04:22', '2019-09-23 13:46:16'),
(344, 2, '200011600606', 'GALV34', '25', 'EMT Conduit, Steel, Galvanized 3/4\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 20, 'emt.jpg', '200011600606.png', NULL, '2020-02-20 20:04:35', '2019-09-23 13:46:50'),
(345, 2, '200011574822', 'GALV4', '25', 'EMT Conduit, Steel, Galvanized 4\"', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 40, 'emt.jpg', '200011574822.png', NULL, '2020-02-20 20:04:47', '2019-09-23 13:47:28'),
(346, 2, '200014772102', 'RNW 865-1030-1', '60', 'Conext MPPT 60 150 PV Solar Charge Controller', 14, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 7, '150', '3300', '60', 2, 'conextmppt60150.jpg', '200014772102.png', NULL, '2020-02-24 15:51:42', '2019-09-23 13:54:38'),
(347, 2, '200014172599', 'RNW 865-1058', '60', 'Conext ComBox Communications Device', 14, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 5, 'conextcombox.jpg', '200014172599.png', NULL, '2020-02-24 15:53:46', '2019-09-23 13:55:35'),
(348, 2, '200005641493', 'RNW 865-1015-01', '60', 'Conext XW PDP Solar Power Distribution Panel', 5, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'pdp.jpg', '200005641493.png', NULL, '2020-02-24 15:50:38', '2019-09-23 13:56:29'),
(349, 2, '200014067000', 'RNW 865-1050-01', '60', 'Conext SCP: Solar System Control Panel', 14, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 5, 'conextscp.jpg', '200014067000.png', NULL, '2020-02-24 15:46:02', '2019-09-23 13:57:32');
INSERT INTO `repository_parts` (`id`, `org_id`, `sku`, `part_no`, `manufacturer`, `description`, `parent_type`, `tags`, `pricing_unit`, `stocking_unit`, `length`, `length_unit`, `height`, `height_unit`, `width`, `width_unit`, `weight`, `color`, `volts`, `watts`, `amps`, `stock`, `image`, `barcode_image`, `location`, `updated_at`, `created_at`) VALUES
(350, 2, '200014803523', 'RNW 865‑1080‑01', '60', 'Conext Battery Monitor: Solar Battery Monitoring System', 14, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 5, 'conextbattmon.jpg', '200014803523.png', NULL, '2020-02-24 15:45:25', '2019-09-23 13:58:20'),
(351, 2, '200010890718', 'RNW865-6848-01', '60', 'Conext XW+ 6848 Solar Hybrid Inverter System 120/240V', 10, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 7, '120/240', '6800', '60', 1, 'xw1.jpg', '200010890718.png', NULL, '2020-02-20 00:41:38', '2019-09-23 13:59:13'),
(352, 2, '200012132335', 'RNW 865-1017', '60', 'Conext SW AC PDP Solar Power Distribution Panel', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 3, 'swacpdp.jpg', '200012132335.png', NULL, '2020-02-24 22:59:33', '2019-09-23 14:00:22'),
(353, 2, '200014588710', 'EV305-A', '151', 'AGM Battery, 6V, 330 Ah', 14, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '6', NULL, NULL, 62, 'ev305a-a.jpg', '200014588710.png', NULL, '2020-02-20 00:46:36', '2019-09-23 14:03:49'),
(354, 2, '200014606322', '648023', '52', 'RV RCPT-2P3W30A125V', 14, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, NULL, '200014606322.png', NULL, '2019-09-23 14:06:19', '2019-09-23 14:06:19'),
(355, 2, '200012829433', 'BK14', '3', '1/4-20 BEAM CLAMP', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 24, 'annotation-2020-03-06-082730.jpg', '200012829433.png', NULL, '2020-03-06 15:28:05', '2019-09-23 14:08:42'),
(356, 2, '200012813234', 'BK38', '3', '3/8-16 BEAM CLAMP', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'annotation-2020-03-06-082730.jpg', '200012813234.png', NULL, '2020-03-06 15:28:57', '2019-09-23 14:30:46'),
(357, 2, '200012506822', 'FENW141', '3', 'FENDER WASHER HQ', 12, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 89, NULL, '200012506822.png', NULL, '2019-09-23 14:32:17', '2019-09-23 14:32:17'),
(358, 2, '200011245937', '1701', '51', '1/2\" ONE HOLE EMT STRAP', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, '1strap.jpg', '200011245937.png', NULL, '2020-02-18 18:42:33', '2019-09-23 15:07:12'),
(359, 2, '200011493482', '1702', '51', '3/4\" ONE HOLE EMT STRAP', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, '1strap.jpg', '200011493482.png', NULL, '2020-02-18 18:42:51', '2019-09-23 15:07:48'),
(360, 2, '200011031134', '1704', '51', '1-1/4\" ONE HOLE EMT STRAP', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 10, '1strap.jpg', '200011031134.png', NULL, '2020-02-18 18:43:07', '2019-09-23 15:08:28'),
(361, 2, '200011464383', '176', '51', '2-1/2 PLASTIC BUSHING', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, '176thumb.jpg', '200011464383.png', NULL, '2020-02-18 18:44:09', '2019-09-23 15:09:57'),
(362, 2, '200011577458', 'CBGI-100', '51', '1\" Insulated Ground Bushing', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 80, 'cbgi-100thumb.jpg', '200011577458.png', NULL, '2020-02-18 18:46:51', '2019-09-23 15:12:26'),
(363, 2, '200011497800', 'CBGI-300', '51', '3\" Insulated Ground Bushing', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'cbgi-300.jpg', '200011497800.png', NULL, '2020-02-19 23:52:58', '2019-09-23 15:13:07'),
(364, 2, '200011828550', 'CBGI-75', '51', '3/4\" Insulated Ground Bushing', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 100, 'cbgi-100thumb.jpg', '200011828550.png', NULL, '2020-02-18 18:49:27', '2019-09-23 15:14:59'),
(365, 2, '200011663977', 'IL-44-3', '51', '1\" Screw-In Box Connector With Insulated Throat; 1 Inch MNPT x Screw-In, Die-Cast Zinc, Connects Flexible Metal Conduit To Box Or Enclosure', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'il-44-3.jpg', '200011663977.png', NULL, '2020-02-20 20:34:36', '2019-09-23 15:15:32'),
(366, 2, '200011029285', 'IL-708', '51', '3 Speed Nipple Insert for Connecting Rigid Conduit to Box, Zinc Die Cast', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'il-708.jpg', '200011029285.png', NULL, '2020-02-20 20:32:21', '2019-09-23 15:16:40'),
(367, 2, '200011491013', 'L-40-4', '51', 'Rigid Offset Nipple, Zinc Die-CastAST, Trade Size: 1-1/4\", 1.85\" Outside Diameter, Connection: Male Threaded, UL Listed, Meets UL514B', 11, NULL, 1, 1, '2.88', 3, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'l-40-4.jpg', '200011491013.png', NULL, '2020-02-20 20:30:32', '2019-09-23 15:17:22'),
(368, 2, '200011200912', 'L-805-CL', '51', 'Clamp-On Service Entrance Cap, Size: 2\", Cast Aluminum, Number of Holes: 7, UL Listed, For Use With Rigid/IMC Conduit', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, 'l806cl.jpg', '200011200912.png', NULL, '2020-02-20 20:27:36', '2019-09-23 15:21:14'),
(369, 2, '200011588447', 'L-806-CL', '51', 'Clamp-On Service Entrance Cap, Size: 2-1/2\", Cast Aluminum, Number of Holes: 7, UL Listed, For Use With Rigid/IMC Conduit', 11, NULL, 1, 1, '10.5', 3, '7', 3, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'l806cl.jpg', '200011588447.png', NULL, '2020-02-20 20:17:39', '2019-09-23 15:22:19'),
(370, 2, '200011204040', 'LA-100', '51', '1\" Aluminum Cover for Madison Aluminum Conduit Bodies', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'la-100.jpg', '200011204040.png', NULL, '2020-02-20 20:11:01', '2019-09-23 15:23:04'),
(371, 2, '200011882576', 'LBLA-100', '51', '1\" Conduit Body W/Cover & Gasket Type \"LB\" for Rigid Conduit w/ Neoprene Gasket, Meets UL514B', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 8, 'lbla-100.jpg', '200011882576.png', NULL, '2020-02-20 20:09:07', '2019-09-23 15:24:20'),
(372, 2, '200017647131', '1700C-BLUE', '58', 'Vinyl Tape - Blue', 17, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 3, NULL, NULL, NULL, NULL, '3m-1700c-blue.jpg', '200017647131.png', NULL, '2020-02-18 18:10:56', '2020-02-18 11:05:45'),
(373, 2, '200017463144', '1700C-ORANGE', '58', 'Vinyl Tape - Orange', 17, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 13, NULL, NULL, NULL, 0, 'a67y120160224065300701.jpg', '200017463144.png', NULL, '2020-02-18 18:11:56', '2020-02-18 11:11:35'),
(374, 2, '200017063597', '1700C-RED', '58', 'Vinyl Tape - Red', 17, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 1, NULL, NULL, NULL, 0, 'product.jpg', '200017063597.png', NULL, '2020-02-18 18:12:47', '2020-02-18 11:12:28'),
(375, 2, '200017902674', '1700C-GREY', '58', 'Vinyl Tape - Grey', 17, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 14, NULL, NULL, NULL, 0, '398796.jpg', '200017902674.png', NULL, '2020-02-18 18:16:52', '2020-02-18 11:16:28'),
(376, 2, '200014316986', 'MNPV3', '152', 'For 150 VDC charge controllers and 600 VDC grid tie inverters.\r\nIncludes a 60 amp plus bus bar, 6 position PV negative bus bar and a 6 position ground bus bar. \r\nWill accept three 150VDC (MNEPV) breakers or two touch-safe fuse holders.\r\nGrey Aluminum, Type 3R, Enclosure with Deadfront, ETL Listed, 5 Year Warranty', 14, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 2, 'pv3wfuses.jpg', '200014316986.png', NULL, '2020-02-20 20:26:27', '2020-02-20 13:25:22'),
(377, 2, '200011916455', '1026', '49', 'Service Entrance, LB, Aluminum, Size 3/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, '1025.jpg', '200011916455.png', NULL, '2020-02-24 22:36:43', '2020-02-24 15:35:38'),
(378, 2, '200011408325', '1027', '49', 'Service Entrance, LB, Aluminum, Size 1 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, '1025.jpg', '200011408325.png', NULL, '2020-02-24 22:38:05', '2020-02-24 15:37:41'),
(379, 2, '200011680745', '1028', '49', 'Service Entrance, LB, Aluminum, Size 1-1/4 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, '1025.jpg', '200011680745.png', NULL, '2020-02-24 22:40:40', '2020-02-24 15:38:59'),
(380, 2, '200011082648', '1029', '49', 'Service Entrance, LB, Aluminum, Size 1 1/2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, '1025.jpg', '200011082648.png', NULL, '2020-02-24 22:40:59', '2020-02-24 15:39:39'),
(381, 2, '200011043625', '1030', '49', 'Service Entrance, LB, Aluminum, Size 2 Inch', 11, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, '1025.jpg', '200011043625.png', NULL, '2020-02-24 22:41:21', '2020-02-24 15:40:16'),
(382, 2, '200010314887', 'RNW 865-5548-01', '60', 'Conext XW+ 5548 Solar Hybrid Inverter System 120/240V', 10, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 7, '120/240', '5500', '23', 0, 'xw1.jpg', '200010314887.png', NULL, '2020-02-24 22:44:27', '2020-02-24 15:43:34'),
(383, 2, '200010793118', 'RNW 865-6848-21', '60', 'Conext XW+ 6848 Pro Solar Hybrid Inverter/Charger 120/240V', 10, NULL, 1, 1, NULL, 0, NULL, 0, NULL, 0, NULL, 7, '120/240', '6800', '28.3', 0, 'xw1.jpg', '200010793118.png', NULL, '2020-02-24 22:49:47', '2020-02-24 15:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `repository_parts_vendors`
--

CREATE TABLE `repository_parts_vendors` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `repository_part_id` int(10) NOT NULL,
  `price` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repository_parts_vendors`
--

INSERT INTO `repository_parts_vendors` (`id`, `company_id`, `repository_part_id`, `price`) VALUES
(1, 4, 1, 0.31),
(4, 5, 1, 0.58),
(5, 5, 3, 0.56),
(6, 4, 2, 0.35),
(7, 5, 2, 0.25),
(10, 73, 158, 1);

-- --------------------------------------------------------

--
-- Table structure for table `repository_tags`
--

CREATE TABLE `repository_tags` (
  `id` int(10) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repository_tags`
--

INSERT INTO `repository_tags` (`id`, `name`, `tag`, `active`) VALUES
(1, 'wire', 'Wire', 1),
(2, 'copper', 'Copper', 1),
(3, 'aluminum', 'Aluminum', 1),
(4, 'copper_bus', 'Copper Bussing', 1),
(5, 'aluminum_bus', 'Aluminum Bussing', 1),
(6, 'grounding', 'Grounding', 1),
(7, 'washer', 'Washer', 1),
(8, 'stainless_steel', 'Stainless Steel', 1),
(9, 'bolt', 'Bolt', 1),
(10, 'lag_bolt', 'Lag Bolt', 1),
(11, 'nut', 'Nut', 1),
(12, 'wingnut', 'Wingnut', 1),
(13, 'standoff', 'Standoff', 1),
(14, 'form_9S', 'Form 9S', 1),
(15, 'fused', 'Fused', 1),
(16, '240_volt', '240 Volt', 1),
(17, '480_volt', '480 Volt', 0),
(18, 'silver_frame', 'Silver Frame', 1),
(19, 'black_frame', 'Black Frame', 1),
(20, 'transformer_based', 'Transformer Based', 1),
(21, 'transformerless', 'Transformerless', 1),
(22, 'rmc', 'RMC', 1),
(23, 'emt', 'EMT', 1),
(24, '600_volt', '600 Volt', 1),
(25, 'pvc', 'PVC', 1),
(26, 'form_2s', 'Form 2S', 1),
(29, '16s', '16s', 0),
(30, 'form_16s', 'Form 16s', 1),
(31, 'form_12s', 'Form 12s', 1),
(32, 'form_5s', 'Form 5s', 1),
(33, 'form_1s', 'form 1s', 1),
(34, 'form_15s', 'Form 15s', 1),
(35, 'form_8s', 'Form 8s', 1),
(36, 'non-fused', 'Non-Fused', 1),
(37, 'aps_approved', 'APS Approved', 1),
(38, 'srp_approved', 'SRP Approved', 1),
(39, 'nema_3r', 'Nema 3R', 1),
(40, 'nema_1', 'Nema 1', 1),
(41, 'main_lug', 'Main Lug', 1),
(42, 'main_breaker', 'Main Breaker', 1),
(43, '20\'_rail_section', '20\' Rail Section', 1),
(44, 'ct_section', 'CT Section', 1),
(45, 'ct_section', 'CT Section', 0),
(46, 'pull_section', 'Pull Section', 1),
(47, '22k_sccr', '22K SCCR', 1),
(48, '22kaic', '22kAIC', 1),
(49, '10kaic', '10kAIC', 1),
(50, '600vac', '600VAC', 1),
(51, '240vac', '240VAC', 1),
(52, '3w', '3W', 1),
(53, '4w', '4W', 1),
(54, '1ph', '1PH', 1),
(55, '3ph', '3PH', 1),
(56, '600vdc', '600VDC', 1),
(57, '1000vdc', '1000VDC', 1),
(58, '600v', '600V', 1),
(59, '2kv', '2kV', 1),
(60, 'class_r', 'Class R', 1),
(61, 'class_l', 'Class L', 1),
(62, 'class_t', 'Class T', 1),
(63, 'class_j', 'Class J', 1),
(64, 'midget', 'Midget', 1),
(66, 'single_pole', 'Single Pole', 1),
(67, 'double_pole', 'Double Pole', 1),
(68, '15_amp', '15 Amp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `repository_types`
--

CREATE TABLE `repository_types` (
  `id` int(10) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_filter` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repository_types`
--

INSERT INTO `repository_types` (`id`, `name`, `type`, `is_filter`, `active`) VALUES
(1, 'service', 'Service', 1, 1),
(2, 'meter', 'Meter', 1, 1),
(3, 'disconnect', 'Disconnect', 1, 1),
(4, 'load_center', 'Load Center', 1, 1),
(5, 'panel_board', 'Panel Board', 1, 1),
(6, 'breaker', 'Breaker', 1, 1),
(7, 'wire', 'Wire', 1, 1),
(8, 'racking', 'Racking', 1, 1),
(9, 'solar_module', 'Solar Module', 1, 1),
(10, 'inverter', 'Inverter', 1, 1),
(11, 'conduit', 'Conduit', 1, 1),
(12, 'hardware', 'Hardware', 1, 1),
(13, 'grounding_bonding', 'Grounding & Bonding', 1, 1),
(14, 'dc_equipment', 'DC Equipment', 1, 1),
(15, 'fuse', 'Fuse', 1, 1),
(17, 'consumables', 'Consumables', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `repository_types_tags`
--

CREATE TABLE `repository_types_tags` (
  `id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `repository_types_tags`
--

INSERT INTO `repository_types_tags` (`id`, `type_id`, `tag_id`) VALUES
(1, 7, 1),
(4, 7, 2),
(7, 7, 3),
(8, 4, 4),
(9, 4, 5),
(10, 5, 4),
(11, 5, 5),
(12, 13, 6),
(13, 12, 7),
(14, 12, 8),
(15, 12, 9),
(16, 12, 10),
(17, 12, 11),
(18, 12, 12),
(19, 8, 13),
(21, 3, 15),
(25, 9, 19),
(26, 10, 20),
(27, 10, 21),
(28, 11, 22),
(29, 11, 23),
(30, 14, 15),
(32, 2, 14),
(37, 6, 16),
(38, 9, 18),
(39, 6, 17),
(40, 1, 4),
(42, 1, 17),
(44, 2, 26),
(46, 11, 25),
(47, 6, 27),
(51, 2, 30),
(52, 2, 31),
(53, 2, 32),
(54, 2, 33),
(55, 2, 34),
(56, 2, 35),
(57, 3, 36),
(58, 3, 37),
(59, 3, 38),
(60, 3, 39),
(61, 4, 39),
(62, 3, 40),
(63, 4, 40),
(64, 5, 40),
(65, 5, 39),
(66, 4, 41),
(67, 4, 42),
(68, 5, 41),
(69, 5, 42),
(70, 8, 43),
(71, 5, 44),
(72, 3, 47),
(73, 4, 47),
(74, 5, 47),
(75, 7, 58),
(76, 7, 59),
(77, 5, 46),
(78, 6, 48),
(79, 6, 49),
(80, 6, 24),
(81, 4, 52),
(82, 4, 53),
(83, 4, 54),
(84, 4, 55),
(85, 4, 51),
(86, 4, 50),
(87, 14, 56),
(88, 14, 57),
(89, 15, 56),
(90, 15, 57),
(91, 15, 60),
(92, 15, 61),
(93, 15, 62),
(94, 15, 63),
(95, 15, 64),
(96, 15, 51),
(97, 15, 50),
(98, 1, 65),
(99, 2, 65),
(100, 3, 65),
(101, 6, 66),
(102, 6, 67),
(103, 6, 68);

-- --------------------------------------------------------

--
-- Table structure for table `repository_units`
--

CREATE TABLE `repository_units` (
  `id` int(10) NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternate_display` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_mark` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `repository_units`
--

INSERT INTO `repository_units` (`id`, `name`, `unit`, `alternate_display`, `unit_mark`, `active`) VALUES
(1, 'count', 'Count', 'each', 'ea.', 1),
(2, 'feet', 'Feet', 'per foot', '\'', 1),
(3, 'inches', 'Inches', 'per inch', '\"', 1),
(4, 'degrees_fahrenheit', 'Degrees Fahrenheit', 'degrees F', '°F', 1),
(6, 'degrees_celsius', 'Degrees Celsius', 'degrees C', '°C', 1),
(0, 'n/a', 'N/A', 'N/A', 'N/A', 1),
(8, 'watts', 'Watts', 'per watt', 'W', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'An Admin User', '2018-06-02 11:30:35', '2018-06-02 11:30:35'),
(2, 'Field Crew', 'A Field Crew User', '2018-06-02 11:30:35', '2018-06-02 11:30:35'),
(3, 'Field Lead', 'A Field Lead User', '2018-06-02 11:30:35', '2018-06-02 11:30:35'),
(4, 'Project Manager', 'A Project Manager User', '2018-06-02 11:30:36', '2018-06-02 11:30:36'),
(5, 'Executive', 'An Executive User', '2018-06-02 11:30:36', '2018-06-02 11:30:36'),
(6, 'Human Resources', 'An HR User', '2018-06-02 11:30:36', '2018-06-02 11:30:36'),
(7, 'Contracts', 'A Contracts User', '2018-06-02 11:30:36', '2018-06-02 11:30:36'),
(8, 'Inventories', 'An Inventories User', '2018-06-02 11:30:36', '2018-06-02 11:30:36'),
(9, 'Safety', 'A Safety User', '2018-06-02 11:30:36', '2018-06-02 11:30:36'),
(10, 'Field Coordinator', 'A Field Coordinator User', '2018-06-02 11:30:36', '2018-06-02 11:30:36'),
(11, 'Guest', 'A Guest User', '2018-06-02 11:30:36', '2018-06-02 11:30:36'),
(12, 'Sales', 'A Sales User', '2018-06-02 11:30:36', '2018-06-02 11:30:36'),
(13, 'Vendor', 'A Vendor User', '2018-06-02 11:30:36', '2018-06-02 11:30:36'),
(14, 'Partner', 'A Partner User', '2018-06-02 11:30:36', '2018-06-02 11:30:36'),
(15, 'Internal', 'An Internal User', '2018-06-01 07:00:00', '2018-06-01 07:00:00'),
(1000, 'Super Admin', 'This user can manage multiple organizations', '2018-07-09 07:00:00', '2018-07-09 07:00:00'),
(10001, 'God Mode', 'Can See Everything', '2019-09-23 00:00:00', '2019-09-23 00:00:00'),
(16, 'Sales Manager', 'A Sales Manager', '2019-09-17 00:00:00', '2019-09-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `permission_id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id`, `role_id`, `permission_id`, `org_id`) VALUES
(11, 6, 4, 2),
(20, 7, 1, 2),
(21, 8, 1, 2),
(22, 9, 1, 2),
(23, 10, 1, 2),
(27, 6, 2, 2),
(35, 6, 6, 2),
(36, 5, 3, 2),
(37, 6, 3, 2),
(38, 9, 3, 2),
(39, 10, 3, 2),
(40, 15, 7, 2),
(41, 10001, 8, 1),
(42, 4, 8, 2),
(43, 5, 8, 2),
(44, 6, 8, 2),
(45, 7, 8, 2),
(46, 8, 8, 2),
(48, 9, 8, 2),
(49, 10001, 9, 1),
(50, 4, 9, 2),
(51, 5, 9, 2),
(52, 6, 9, 2),
(53, 7, 9, 2),
(54, 8, 9, 2),
(55, 9, 9, 2),
(57, 10001, 11, 1),
(58, 10001, 12, 1),
(59, 10001, 13, 1),
(63, 10001, 17, 1),
(64, 10001, 18, 1),
(65, 10001, 19, 1),
(66, 10001, 20, 1),
(67, 10001, 21, 1),
(68, 10001, 22, 1),
(69, 10001, 10, 1),
(70, 10001, 14, 1),
(72, 10001, 7, 1),
(101, 10001, 23, 1),
(102, 10001, 24, 1),
(103, 10001, 25, 1),
(104, 10001, 26, 1),
(105, 10001, 27, 1),
(106, 10001, 28, 1),
(107, 10001, 29, 1),
(108, 10001, 30, 1),
(109, 10001, 31, 1),
(110, 10001, 32, 1),
(111, 10001, 33, 1),
(112, 10001, 34, 1),
(113, 10001, 35, 1),
(114, 10001, 36, 1),
(115, 10001, 37, 1),
(116, 10001, 38, 1),
(117, 10001, 39, 1),
(118, 10001, 40, 1),
(119, 10001, 41, 1),
(123, 10001, 42, 1),
(124, 10001, 47, 1),
(125, 10001, 46, 1),
(126, 10001, 48, 1),
(127, 10001, 15, 1),
(128, 10001, 49, 1),
(129, 8, 29, 2),
(130, 8, 30, 2),
(131, 8, 31, 2),
(132, 8, 32, 2),
(133, 8, 33, 2),
(134, 8, 34, 2),
(135, 8, 35, 2),
(136, 8, 36, 2),
(137, 8, 37, 2),
(138, 8, 38, 2),
(139, 8, 39, 2),
(140, 8, 40, 2),
(141, 8, 41, 2),
(142, 8, 42, 2),
(143, 9, 10, 2),
(144, 6, 10, 2),
(145, 5, 48, 2),
(147, 5, 46, 2),
(148, 5, 42, 2),
(149, 5, 39, 2),
(150, 5, 40, 2),
(152, 5, 29, 2),
(153, 5, 32, 2),
(154, 5, 36, 2),
(155, 5, 26, 2),
(156, 5, 23, 2),
(157, 5, 20, 2),
(158, 5, 17, 2),
(159, 5, 14, 2),
(160, 5, 11, 2),
(161, 5, 10, 2),
(162, 5, 7, 2),
(165, 6, 5, 2),
(166, 6, 7, 2),
(167, 4, 7, 2),
(168, 9, 2, 2),
(169, 9, 7, 2),
(170, 8, 7, 2),
(171, 7, 7, 2),
(172, 9, 11, 2),
(173, 9, 12, 2),
(175, 6, 11, 2),
(176, 6, 12, 2),
(177, 6, 13, 2),
(178, 9, 14, 2),
(179, 9, 15, 2),
(180, 9, 16, 2),
(181, 9, 17, 2),
(182, 9, 18, 2),
(183, 9, 19, 2),
(184, 9, 20, 2),
(185, 9, 21, 2),
(186, 9, 22, 2),
(188, 15, 1, 2),
(189, 10001, 1, 1),
(190, 10001, 2, 1),
(191, 10001, 3, 1),
(192, 10001, 4, 1),
(193, 10001, 5, 1),
(194, 10001, 6, 1),
(202, 5, 2, 1),
(203, 6, 2, 1),
(204, 6, 3, 1),
(205, 5, 3, 1),
(206, 6, 4, 1),
(207, 6, 5, 1),
(208, 6, 6, 1),
(209, 15, 7, 1),
(210, 15, 8, 1),
(211, 15, 9, 1),
(212, 15, 1, 1),
(213, 3, 2, 1),
(214, 9, 2, 1),
(215, 9, 10, 1),
(216, 9, 11, 1),
(217, 9, 12, 1),
(219, 15, 13, 1),
(220, 9, 14, 1),
(221, 9, 15, 1),
(222, 9, 16, 1),
(223, 9, 17, 1),
(224, 9, 18, 1),
(225, 9, 19, 1),
(226, 9, 20, 1),
(227, 9, 21, 1),
(228, 9, 22, 1),
(229, 7, 23, 1),
(230, 7, 24, 1),
(231, 7, 25, 1),
(232, 12, 23, 1),
(233, 12, 24, 1),
(234, 8, 29, 1),
(235, 8, 30, 1),
(236, 8, 31, 1),
(237, 8, 32, 1),
(238, 8, 33, 1),
(239, 8, 34, 1),
(240, 8, 35, 1),
(241, 8, 36, 1),
(242, 8, 37, 1),
(243, 8, 38, 1),
(244, 8, 39, 1),
(245, 8, 40, 1),
(246, 8, 41, 1),
(247, 8, 42, 1),
(248, 7, 46, 1),
(249, 7, 47, 1),
(250, 7, 48, 1),
(256, 16, 23, 2),
(257, 16, 24, 2),
(258, 16, 25, 2),
(259, 16, 46, 2),
(260, 16, 47, 2),
(261, 16, 48, 2),
(262, 5, 47, 2),
(263, 7, 46, 2),
(264, 7, 47, 2),
(265, 7, 48, 2),
(266, 7, 23, 2),
(267, 7, 24, 2),
(268, 7, 25, 2),
(269, 5, 24, 2),
(270, 5, 25, 2),
(271, 12, 46, 2),
(272, 12, 48, 2),
(273, 12, 23, 2),
(274, 12, 24, 2),
(275, 12, 25, 2),
(276, 16, 51, 2),
(277, 16, 53, 2),
(278, 16, 52, 2),
(279, 16, 54, 2),
(280, 10001, 50, 1),
(281, 10001, 51, 1),
(282, 10001, 52, 1),
(283, 10001, 53, 1),
(284, 10001, 54, 1),
(285, 6, 51, 2),
(286, 6, 53, 2),
(287, 6, 52, 2),
(288, 6, 54, 2),
(289, 4, 48, 2),
(290, 4, 47, 2),
(291, 4, 46, 2),
(292, 4, 1, 2),
(293, 4, 2, 2),
(295, 4, 23, 2),
(296, 4, 24, 2),
(297, 4, 25, 2),
(298, 1, 1, 2),
(299, 1, 2, 2),
(300, 1, 3, 2),
(301, 1, 4, 2),
(302, 1, 5, 2),
(303, 1, 6, 2),
(304, 1, 7, 2),
(305, 1, 8, 2),
(306, 1, 9, 2),
(308, 1, 10, 2),
(309, 1, 11, 2),
(310, 1, 12, 2),
(311, 1, 13, 2),
(312, 1, 14, 2),
(313, 1, 15, 2),
(314, 1, 16, 2),
(315, 1, 17, 2),
(316, 1, 18, 2),
(317, 1, 19, 2),
(318, 1, 20, 2),
(319, 1, 21, 2),
(320, 1, 22, 2),
(321, 1, 23, 2),
(322, 1, 24, 2),
(323, 1, 25, 2),
(324, 1, 26, 2),
(325, 1, 27, 2),
(326, 1, 28, 2),
(327, 1, 29, 2),
(328, 1, 30, 2),
(329, 1, 31, 2),
(330, 1, 32, 2),
(331, 1, 33, 2),
(332, 1, 34, 2),
(333, 1, 35, 2),
(334, 1, 36, 2),
(335, 1, 37, 2),
(336, 1, 38, 2),
(337, 1, 39, 2),
(338, 1, 40, 2),
(339, 1, 41, 2),
(340, 1, 42, 2),
(341, 1, 46, 2),
(342, 1, 47, 2),
(343, 1, 48, 2),
(344, 1, 51, 2),
(345, 1, 53, 2),
(346, 1, 52, 2),
(347, 1, 54, 2),
(348, 1, 50, 2),
(349, 1, 56, 2),
(350, 1, 55, 2),
(351, 15, 56, 2),
(352, 16, 56, 2),
(353, 12, 56, 2),
(354, 16, 7, 2),
(355, 12, 7, 2),
(356, 1, 57, 2),
(357, 12, 57, 2),
(358, 16, 57, 2),
(359, 15, 57, 2),
(360, 1, 49, 2),
(361, 15, 49, 2);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) NOT NULL,
  `training_course_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `audio` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `seconds` int(10) NOT NULL,
  `slide_order` int(10) DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `training_course_id`, `name`, `image`, `audio`, `seconds`, `slide_order`, `updated_at`, `created_at`) VALUES
(11, 1, 'Slide Test 1000', 'slide_img.jpg', 'Stephen.mp3', 5, 1, '2019-09-09 23:13:03', '2018-10-18 01:01:17'),
(14, 1, 'Slide Test 21', 'slide_img.jpg', 'Stephen.mp3', 5, 2, '2019-04-27 21:01:14', '2018-07-08 14:43:01'),
(15, 1, 'Slide Test 3', 'edit.png', 'Stephen.mp3', 5, 3, '2019-09-09 23:13:03', '2018-07-08 14:37:58'),
(16, 2, 'test slide2', 'slide_img.jpg', 'Stephen.mp3', 30, 4, '2019-04-08 18:23:07', '2019-04-03 10:15:02'),
(17, 2, 'test slider 100000', 'slide_img.jpg', 'Stephen.mp3', 45, 5, '2019-04-08 18:23:09', '2019-04-03 10:14:02'),
(18, 2, 'awefawefawef', '1-94-512.png', 'Stephen.mp3', 60, 6, '2019-04-08 18:23:10', '2019-04-03 10:15:21'),
(20, 6, 'Slide 1', '1.jpg', '1ttsMP3.com_VoiceText_2021-9-7_19_54_11.mp3', 16, 2, '2021-09-08 03:44:46', '2021-09-08 03:44:46'),
(21, 6, 'Slide 2', '2.jpg', '2ttsMP3.com_VoiceText_2021-9-7_19_56_6.mp3', 14, 3, '2021-09-08 03:45:30', '2021-09-08 03:45:30'),
(22, 6, 'Slide 3', '3.jpg', '3ttsMP3.com_VoiceText_2021-9-7_19_58_32.mp3', 15, 4, '2021-09-08 03:45:50', '2021-09-08 03:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `stakeholder_correspondence`
--

CREATE TABLE `stakeholder_correspondence` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stakeholder_correspondence`
--

INSERT INTO `stakeholder_correspondence` (`id`, `company_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 'Improper labels will no longer be accepted by Field Staff', '2020-03-03 16:56:38', '2020-03-03 09:53:53'),
(2, 2, 'Meter socket part must match prints exactly', '2020-03-03 09:53:53', '2020-03-03 09:53:53'),
(3, 2, 'A Site Map must be provided if equipment is more than 10\' from service', '2020-03-03 09:53:53', '2020-03-03 09:53:53'),
(4, 2, 'Solar Company must be on site for commissioning', '2020-03-03 09:53:53', '2020-03-03 09:53:53'),
(5, 2, 'Low voltage / communication / monitoring conductors may NOT be run through the meter, disconnect or other raceways', '2020-03-03 09:53:53', '2020-03-03 09:53:53'),
(6, 2, 'Systems must be tested working perfectly before scheduling of commissioning', '2020-03-03 09:53:53', '2020-03-03 09:53:53'),
(7, 2, '\"Cosmic\" is the name of the scheduling tool used by SRP. Once the allotted time for an appointment has expired, field techs must move to the next appointment.', '2020-03-03 09:53:53', '2020-03-03 09:53:53'),
(8, 2, '\"or equivalent\" on drawings will no longer be acceptable, must specify exact part numbers, though you may put 2 options', '2020-03-03 09:53:53', '2020-03-03 09:53:53'),
(9, 2, 'A different Revision Date is required for each submittal update or change', '2020-03-03 09:53:53', '2020-03-03 09:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `training_courses`
--

CREATE TABLE `training_courses` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `active` int(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `training_courses`
--

INSERT INTO `training_courses` (`id`, `name`, `description`, `active`, `updated_at`, `created_at`) VALUES
(1, 'Test Course', 'This is a test training courses', 0, '2021-09-08 03:20:26', '2019-02-01 04:15:53'),
(2, 'Test 23', 'This is another training course', 0, '2021-09-08 03:33:08', '2019-04-03 10:14:49'),
(3, 'Test Course 7', 'This is test course 7', 0, '2018-06-30 11:58:58', '2018-06-30 11:58:58'),
(4, 'atest', 'fwefawef', 0, '2021-09-08 03:33:33', '2021-09-08 03:33:25'),
(5, 'adfasdfas', 'dasdfasdf', 0, '2021-09-08 03:42:01', '2021-09-08 03:33:39'),
(6, 'Lock Out / Tag Out', 'In this training session you will become acquainted with the practice and procedures of Lock Out / Tag Out. This involves understanding when to implement Lock Out / Tag Out and how to do it properly to protect yourself, others and property.', 1, '2021-09-08 03:42:27', '2021-09-08 03:42:27'),
(7, 'Electrical Safety & Arc Flash Hazard Awareness', 'This is the description', 1, '2021-10-07 20:35:27', '2021-10-07 20:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `training_courses_employees`
--

CREATE TABLE `training_courses_employees` (
  `id` int(10) NOT NULL,
  `training_course_id` int(10) NOT NULL,
  `employee_id` int(10) NOT NULL,
  `completed` int(1) DEFAULT '0',
  `certificate_file` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `training_courses_employees`
--

INSERT INTO `training_courses_employees` (`id`, `training_course_id`, `employee_id`, `completed`, `certificate_file`, `created_at`, `updated_at`) VALUES
(10, 1, 7, 1, 'Hieb_Apr272019_TestCourse.pdf', '2019-04-27 21:00:44', '2019-04-28 04:04:35'),
(12, 6, 7, 1, 'Hieb_Sep082021_LockOut/TagOut.pdf', '2021-09-08 22:30:24', '2021-09-08 22:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `training_courses_organizations`
--

CREATE TABLE `training_courses_organizations` (
  `id` int(10) NOT NULL,
  `training_course_id` int(10) NOT NULL,
  `organization_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `training_courses_organizations`
--

INSERT INTO `training_courses_organizations` (`id`, `training_course_id`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 2, '2021-09-08 03:33:25', '2021-09-08 03:33:25'),
(5, 5, 2, '2021-09-08 03:33:39', '2021-09-08 03:33:39'),
(6, 6, 2, '2021-09-08 03:42:27', '2021-09-08 03:42:27'),
(7, 7, 2, '2021-10-07 20:35:27', '2021-10-07 20:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `org_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  `dashboard_layout` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `org_id`, `name`, `email`, `username`, `password`, `is_active`, `dashboard_layout`, `remember_token`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip`) VALUES
(2, 2, 'Stephen Hieb', 'stephen.hieb@solarncp.com', 'shieb', '$2y$10$RGFg74MtYD9d3oPL6iWKNeCJE7WHkJoAFnXlZIcu4YubDvifpO1ge', 1, '[{\"attr\":\"2\",\"x\":0},{\"attr\":\"1\",\"x\":0.502285835430721}]', 'aRwF5T7THuCUnP50KiEEZBTi3tdgU24A08tEfOH5bGThFuXW5UjDtkXyPOSX', '2018-05-28 23:36:34', '2021-09-08 22:29:24', '2021-09-08 22:29:24', '184.183.14.216'),
(12, 2, 'Katie Thrasher', 'kthrasher@solarncp.com', 'katie', '$2y$10$wNdDpLscHTrxbNQcj8LHPO5oP21JeDvQackjl.5nAHGUJyfZEjmWG', 1, NULL, 'nqdqnbQivejTC2siCkBn0RJjeFqHHVXnMoGZENGW4l7c5bSRA6d364oKjtup', '2019-07-16 13:45:57', '2020-03-18 13:57:43', '2020-03-18 13:57:43', '184.183.14.216'),
(5, 2, 'James Schafnit', 'james@solarncp.com', 'james', '$2y$10$VxHIfEq8sjH8DtJBjFzl2OJHZi6qrelNeqndlaCLuEe7Lvd9g2Btu', 1, '[{\"attr\":\"1\",\"x\":0}]', 'KEj1583L4T6tDYqQvy6mjaINt3VyucHzKMGp4oNeQXWhkJ7tYPfotfU08BGZ', '2018-06-14 06:01:22', '2020-03-12 09:37:52', '2020-03-12 09:37:52', '184.183.14.216'),
(1, 1, 'GOD MODE', 'admin@solarncp.com', 'admin', '$2y$10$bzl2Jq7jvfzZlQxyf0SNaOBG5p.4sk5gsxU.GwSUNkGuwV38i5bvK', 1, '[{\"attr\":\"1\",\"x\":0.490870248261841},{\"attr\":\"2\",\"x\":0.490870248261841}]', 's0CL4qKjrEiFD4LnEaRTHFSwLM2v39fiq82G5iDEioMPPs2pnk0eHTU15dbG', '2018-07-09 07:00:00', '2021-10-07 20:33:51', '2021-10-07 20:33:51', '184.183.14.216'),
(14, 2, 'Benjamin Connick', 'benjamin@solarncp.com', 'ben', '$2y$10$xhPG4c0x.1JnCmOZPyS9BuaAxlNU7D4yIQqyhxxXuXs1cfNtdEchq', 0, NULL, 'prdcL0ldQhknvyuFgCIWdwZlDwYyXbD9cwZtduERA3ACTXNGd6nT4Fhswjuh', '2019-08-27 12:40:45', '2019-10-07 10:10:55', '2019-10-07 10:10:55', '184.183.14.216'),
(11, 1, 'Rosie Velasquez', 'rosie@solarncp.com', 'rosie', '$2y$10$PP0wNuzFpx7y5mOVXnC3tuYTJER50LoDu5Fh8aH3MJxSS9CIiX7ni', 1, NULL, 'FSQNNtXrb2R2q4P2N1D3qtbUWw6S2HioomKBuO3hbQEYCzlSzlRifrbg07yD', '2019-04-05 13:46:43', '2019-09-20 13:47:27', '2019-09-20 13:47:27', '184.183.14.216'),
(15, 2, 'Henry Ferrer', 'hferrer941@gmail.com', 'henry', '$2y$10$HDAWBRsUgC1kNULW12efqOxUw3AlZd0Aenq3hvS6DUallok1EXU46', 0, NULL, NULL, '2019-08-27 12:42:14', '2019-08-27 12:42:14', NULL, NULL),
(16, 2, 'Juan Godinez', 'juan.godinez5@gmail.com', 'juan', '$2y$10$sqjFPn0tMWotqS5sAj2AdOEqgJXvwZ/UhezhF7GxW2l1AbkguGx2i', 0, NULL, NULL, '2019-08-27 12:43:46', '2019-08-27 12:43:46', NULL, NULL),
(17, 2, 'Ashton Harding', 'believeinyourself630@gmail.com', 'ashton', '$2y$10$2DRazz73OgyW8RtVrTie7epgYDLsb37HjQh/YowZM63OvWGzwhzyC', 0, NULL, NULL, '2019-08-27 12:44:39', '2019-08-27 12:44:39', NULL, NULL),
(18, 2, 'Joaquin Hernandez', 'jh46627@gmail.com', 'joaquin', '$2y$10$hCu1nNVUn3NiAvOn/YK.z.IV5YELHKxy94p/4SM59CV9HFk1G2/GC', 0, NULL, NULL, '2019-08-27 12:46:06', '2019-08-27 12:46:06', NULL, NULL),
(19, 2, 'Jason Moore', 'jayrmoore73@live.com', 'jason', '$2y$10$.a1Ntb/00DcS2GfedRw3nerVxBikG1dU6efPkjuUv4vpcbVWP0F62', 0, NULL, NULL, '2019-08-27 12:47:18', '2019-08-27 12:47:18', NULL, NULL),
(20, 2, 'Jairo Munoz', 'munozjairo2018@gmail.com', 'jairo', '$2y$10$jr3XjUpKjidnZ02VZfP5D.RaRdr3YN9YyPswPaolFbyYifKbpnnES', 0, NULL, NULL, '2019-08-27 13:43:30', '2019-08-27 13:43:30', NULL, NULL),
(21, 2, 'Walter Penick', 'penickwalter56@gmail.com', 'walter', '$2y$10$ocIRFJALY1NdpAZ0V0zgEuHSPEtQ5Kt8P9CzSltsBtpLgNPPgHN62', 0, NULL, NULL, '2019-08-27 13:44:44', '2019-08-27 13:44:44', NULL, NULL),
(22, 2, 'Miguel Penuelas', 'none@solarncp.com', 'miguel', '$2y$10$1bhMhUkihdk0h/SzIUBR2O.eKdQiBsCjB.9bej5xWWyXkPId/JnGS', 0, NULL, NULL, '2019-08-27 13:46:15', '2019-08-27 13:46:15', NULL, NULL),
(23, 2, 'Ramses Garcia', 'none@solarncp.com', 'ramses', '$2y$10$dYFBsCJsJltaau7cMBdZAuNKz1npemkRWMKmI.yIgkghTqkLe2h8K', 0, NULL, NULL, '2019-08-27 13:47:20', '2019-08-27 13:47:20', NULL, NULL),
(24, 2, 'Lorenzo Ramos', 'none@solarncp.com', 'lorenzo', '$2y$10$GvWEpTCp4Hw0QrND/GsfoOuIhREL1vfII4v0GymYqATO6ZQCbbbSW', 0, NULL, NULL, '2019-08-27 13:50:56', '2019-08-27 13:50:56', NULL, NULL),
(25, 2, 'Martin Rodriguez', 'rodriguez.martin.25.mr@gmail.com', 'martin', '$2y$10$anw/ZX./vcJm7ohq4Kt3zu/PmRGqpnJOsurgbhOwVkpRquaYIVuh.', 0, NULL, NULL, '2019-08-27 14:00:00', '2019-08-27 14:00:00', NULL, NULL),
(26, 2, 'Able Samaniego', 'samaniego0@gmail.com', 'able', '$2y$10$8Zt0fde4j4prcHdg/W4LK.TZI6TMKtTOj8YUKee8anskn7IkAMC96', 0, NULL, NULL, '2019-08-27 14:01:08', '2019-08-27 14:01:08', NULL, NULL),
(27, 2, 'Anthony Tschudy', 'tchewdee@gmail.com', 'anthony', '$2y$10$5lRPRw0s1.5gSMn3b4T1xORj9DHAytIhoCWlEB4DEixmywH8FcH2C', 0, NULL, NULL, '2019-08-27 14:03:19', '2019-08-27 14:03:19', NULL, NULL),
(30, 2, 'Doug East', 'deast7@roadrunner.com', 'doug', '$2y$10$SQ3cRTCANUEZ02Bc5O/NDuofE7KK8WJ/94gKKmFdCb.XbJdXoXTaC', 0, NULL, NULL, '2019-09-17 10:13:40', '2019-09-24 13:45:12', NULL, NULL),
(28, 2, 'Jennifer Griffin', 'jen@solarncp.com', 'jen', '$2y$10$qxd56jRc2skZY8/Df77IPOtkbRpBIvLcNJathshiDPvRBMZKBiR8e', 0, NULL, NULL, '2019-09-17 10:13:40', '2019-09-17 10:13:40', NULL, NULL),
(32, 2, 'Jeanne Bakal', 'jeanne@solarncp.com', 'jeanne', '$2y$10$/KeE2yZ0mEdRud7vuL8ubuiPBqXviHjYY6cWzqBojY.EVLHglIkXK', 0, NULL, 'JLfLaVL4nAMt7nlaHwZoxfVq32BzyXSy3WeZbQM4oQiaGfRgcfAWRrNMZ8dI', '2020-02-17 15:55:20', '2020-03-12 09:37:14', '2020-03-12 09:35:46', '184.183.14.216'),
(31, 2, 'Pam Cole', 'pam@solarncp.com', 'pam', '$2y$10$flVSDjhUNqO13Sbggt7k5.6sOoXPjANo2sh9iLHCstgrL98VmhYVq', 1, NULL, 'HuRWnzWDuYKRc7DZ6jf1y28NoATefgxvqGCRtZGTUcpnATPb95OO4xNDhdNd', '2019-12-27 00:00:00', '2020-03-20 10:31:21', '2020-03-20 10:31:21', '184.183.14.216'),
(33, 2, 'Danny Diaz', 'danny@peopleschoicesolar.com', 'danny', '$2y$10$sMxa0.cXnZY9Wwp9fV5VEurtd2KCKVJZifr.HV1NIqCqwEti62AXS', 0, NULL, 'fELvxKsurX9LGYiBI3OPujCKDBX1II3Ows8tDnaZfelGxZ29kdXdb0Uz8SEE', '2020-03-12 14:44:54', '2020-03-12 17:20:05', '2020-03-12 17:12:25', '184.183.14.216'),
(34, 2, 'Sales', 'info@solarncp.com', 'sales', '$2y$10$jrGaLUatxb9yX2Aiq93nTOv3DuZ5ySKD0kN/fQFa17e3Ie4O1.bu2', 0, NULL, NULL, '2021-09-07 01:31:33', '2021-09-10 23:23:58', '2021-09-10 23:22:54', '129.219.21.126'),
(35, 2, 'justin tidwell', 'justin@solarncp.com', 'justin', '$2y$10$LnIvN7jSePfWDf9HnUojvud/Iot8jRtla7DMXjENw26QbM7IJSh2y', 1, NULL, NULL, '2021-09-07 16:33:21', '2021-09-08 22:33:04', '2021-09-08 22:33:04', '184.183.14.216');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(6) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 10001),
(12, 2, 15),
(37, 11, 9),
(36, 11, 6),
(35, 11, 4),
(25, 1, 1000),
(30, 5, 4),
(31, 5, 6),
(32, 5, 7),
(33, 5, 8),
(34, 5, 15),
(38, 11, 15),
(39, 12, 3),
(40, 12, 4),
(41, 12, 8),
(42, 12, 10),
(43, 12, 15),
(45, 14, 7),
(46, 14, 15),
(47, 15, 2),
(48, 15, 15),
(49, 16, 2),
(50, 16, 15),
(51, 17, 2),
(52, 17, 15),
(53, 18, 2),
(54, 18, 15),
(55, 19, 2),
(56, 19, 3),
(57, 19, 10),
(58, 19, 15),
(59, 20, 2),
(60, 20, 15),
(61, 21, 2),
(62, 21, 3),
(63, 21, 15),
(64, 22, 2),
(65, 22, 15),
(66, 23, 2),
(67, 23, 15),
(68, 24, 2),
(69, 24, 15),
(70, 25, 2),
(71, 25, 15),
(72, 26, 2),
(73, 26, 3),
(74, 26, 15),
(75, 27, 2),
(76, 27, 3),
(77, 27, 15),
(78, 11, 1),
(79, 1, 15),
(80, 2, 1),
(81, 1, 1),
(82, 11, 1000),
(83, 14, 8),
(84, 28, 12),
(85, 29, 15),
(86, 30, 12),
(87, 31, 8),
(88, 31, 9),
(89, 31, 10),
(90, 31, 15),
(91, 32, 5),
(92, 32, 6),
(93, 32, 8),
(94, 32, 9),
(95, 32, 15),
(96, 33, 12),
(97, 33, 16),
(98, 34, 12),
(99, 35, 1),
(100, 35, 4),
(101, 35, 6),
(102, 35, 7),
(103, 35, 8),
(104, 35, 15);

-- --------------------------------------------------------

--
-- Table structure for table `utility_rates`
--

CREATE TABLE `utility_rates` (
  `id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `utility` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `frozen` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weather_locations`
--

CREATE TABLE `weather_locations` (
  `id` int(10) NOT NULL,
  `org_id` int(10) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weather_locations`
--

INSERT INTO `weather_locations` (`id`, `org_id`, `city`, `state`, `latitude`, `longitude`) VALUES
(1, 2, 'Phoenix', 'Arizona', 33.4484, -112.074),
(2, 2, 'Yuma', 'Arizona', 32.6927, -114.628),
(3, 2, 'Tucson', 'Arizona', 32.2226, -110.975),
(4, 2, 'Flagstaff', 'Arizona', 35.1983, -111.651);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_types`
--
ALTER TABLE `audit_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_partners`
--
ALTER TABLE `channel_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_partners_addresses`
--
ALTER TABLE `channel_partners_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_partners_contacts_addresses`
--
ALTER TABLE `channel_partners_contacts_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies_addresses`
--
ALTER TABLE `companies_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies_contacts`
--
ALTER TABLE `companies_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts_addresses`
--
ALTER TABLE `contacts_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboardmodules_roles`
--
ALTER TABLE `dashboardmodules_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboardmodules_users`
--
ALTER TABLE `dashboardmodules_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_modules`
--
ALTER TABLE `dashboard_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `employees_addresses`
--
ALTER TABLE `employees_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_updates`
--
ALTER TABLE `erp_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_orders`
--
ALTER TABLE `inventory_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_pulls`
--
ALTER TABLE `inventory_pulls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_pulls_parts`
--
ALTER TABLE `inventory_pulls_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_source`
--
ALTER TABLE `lead_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations_companies`
--
ALTER TABLE `organizations_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios_contacts`
--
ALTER TABLE `portfolios_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`project_number`);

--
-- Indexes for table `projects_addresses`
--
ALTER TABLE `projects_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_contacts`
--
ALTER TABLE `projects_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_meta`
--
ALTER TABLE `projects_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_meta_attributes`
--
ALTER TABLE `projects_meta_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository_colors`
--
ALTER TABLE `repository_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository_parts`
--
ALTER TABLE `repository_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository_parts_vendors`
--
ALTER TABLE `repository_parts_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository_tags`
--
ALTER TABLE `repository_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository_types`
--
ALTER TABLE `repository_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository_types_tags`
--
ALTER TABLE `repository_types_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository_units`
--
ALTER TABLE `repository_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stakeholder_correspondence`
--
ALTER TABLE `stakeholder_correspondence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_courses`
--
ALTER TABLE `training_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_courses_employees`
--
ALTER TABLE `training_courses_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_courses_organizations`
--
ALTER TABLE `training_courses_organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_rates`
--
ALTER TABLE `utility_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weather_locations`
--
ALTER TABLE `weather_locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1938;
--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `audit_types`
--
ALTER TABLE `audit_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `channel_partners`
--
ALTER TABLE `channel_partners`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channel_partners_addresses`
--
ALTER TABLE `channel_partners_addresses`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `channel_partners_contacts_addresses`
--
ALTER TABLE `channel_partners_contacts_addresses`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
--
-- AUTO_INCREMENT for table `companies_addresses`
--
ALTER TABLE `companies_addresses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companies_contacts`
--
ALTER TABLE `companies_contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `contacts_addresses`
--
ALTER TABLE `contacts_addresses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dashboardmodules_roles`
--
ALTER TABLE `dashboardmodules_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dashboardmodules_users`
--
ALTER TABLE `dashboardmodules_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `dashboard_modules`
--
ALTER TABLE `dashboard_modules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employees_addresses`
--
ALTER TABLE `employees_addresses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `erp_updates`
--
ALTER TABLE `erp_updates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `inventory_orders`
--
ALTER TABLE `inventory_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory_pulls`
--
ALTER TABLE `inventory_pulls`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory_pulls_parts`
--
ALTER TABLE `inventory_pulls_parts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lead_source`
--
ALTER TABLE `lead_source`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `organizations_companies`
--
ALTER TABLE `organizations_companies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `portfolios_contacts`
--
ALTER TABLE `portfolios_contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projects_addresses`
--
ALTER TABLE `projects_addresses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects_contacts`
--
ALTER TABLE `projects_contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects_meta`
--
ALTER TABLE `projects_meta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects_meta_attributes`
--
ALTER TABLE `projects_meta_attributes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `repository_colors`
--
ALTER TABLE `repository_colors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `repository_parts`
--
ALTER TABLE `repository_parts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;
--
-- AUTO_INCREMENT for table `repository_parts_vendors`
--
ALTER TABLE `repository_parts_vendors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `repository_tags`
--
ALTER TABLE `repository_tags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `repository_types`
--
ALTER TABLE `repository_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `repository_types_tags`
--
ALTER TABLE `repository_types_tags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `repository_units`
--
ALTER TABLE `repository_units`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;
--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `stakeholder_correspondence`
--
ALTER TABLE `stakeholder_correspondence`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `training_courses`
--
ALTER TABLE `training_courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `training_courses_employees`
--
ALTER TABLE `training_courses_employees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `training_courses_organizations`
--
ALTER TABLE `training_courses_organizations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `utility_rates`
--
ALTER TABLE `utility_rates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `weather_locations`
--
ALTER TABLE `weather_locations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
