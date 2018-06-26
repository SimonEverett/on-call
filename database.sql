-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2018 at 03:00 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `oncall`
--
CREATE DATABASE IF NOT EXISTS `oncall` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oncall`;

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE IF NOT EXISTS `alert` (
  `alert_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `student_id` char(254) NOT NULL,
  `reason` char(254) NOT NULL,
  `room` varchar(20) NOT NULL,
  `alert_type_id` int(10) NOT NULL COMMENT '2 Infomaction, 1 behavord',
  `behaviour_type_id` int(10) NOT NULL,
  `alert_status` int(10) NOT NULL DEFAULT '4' COMMENT '4 = un-played alert, 3 is unagloged, 2 is agloged and 1 is closed, 0 is error state. ',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alert_response` varchar(254) NOT NULL,
  PRIMARY KEY (`alert_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2750 ;

-- --------------------------------------------------------

--
-- Table structure for table `alert_played`
--

CREATE TABLE IF NOT EXISTS `alert_played` (
  `alert_played_id` int(20) NOT NULL AUTO_INCREMENT,
  `alert_id` int(20) NOT NULL,
  `users_id` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`alert_played_id`),
  KEY `alert_id` (`alert_id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6641 ;

-- --------------------------------------------------------

--
-- Table structure for table `behaviour_type`
--

CREATE TABLE IF NOT EXISTS `behaviour_type` (
  `behaviour_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `behaviour_type_descriptions` varchar(254) NOT NULL,
  PRIMARY KEY (`behaviour_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(12) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `year` int(2) NOT NULL,
  `HomeDirectory` varchar(255) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1816 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `slt` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=721 ;

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `year_id` int(10) NOT NULL AUTO_INCREMENT,
  `year_description` varchar(255) NOT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alert`
--
ALTER TABLE `alert`
  ADD CONSTRAINT `Map teacher to alert` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `alert_played`
--
ALTER TABLE `alert_played`
  ADD CONSTRAINT `alert_played_ibfk_1` FOREIGN KEY (`alert_id`) REFERENCES `alert` (`alert_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `alert_played_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
