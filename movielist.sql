-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2012 at 04:15 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vank0026`
--

-- --------------------------------------------------------

--
-- Table structure for table `movielist`
--

CREATE TABLE IF NOT EXISTS `movielist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `movielist`
--

INSERT INTO `movielist` (`id`, `title`, `director`, `release_date`) VALUES
(2, 'Star Wars', 'George Lucas', '2012-01-03'),
(3, 'Kill List', 'Ben Wheatley', '2011-09-02'),
(4, 'Red Tails', 'Anthony Hemingway', '2012-01-20'),
(5, 'Man on a Ledge', 'Asger Leth', '2012-02-27'),
(6, 'The Dark Knight', 'Christopher Nolan', '0000-00-00');
