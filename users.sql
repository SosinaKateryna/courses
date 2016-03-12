-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 12, 2016 at 11:25 AM
-- Server version: 5.6.22-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rubygarage`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(30) NOT NULL DEFAULT '',
  `password` char(40) NOT NULL DEFAULT '',
  `projects` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `projects`) VALUES
(1, 'kate', '12345', ''),
(4, 'root', 'Sosina52892', '[{"pr_name":"1 prро","task":[{"task_name":"first","status":"1","date":"03/16/2016"},{"task_name":"45","status":"0","date":"03/10/2016"},{"task_name":"89","status":"1","date":""}]},{"pr_name":"2 pr","task":[{"task_name":"1","status":"0","date":"03/01/2016"},{"task_name":"2","status":"1","date":"03/02/2016"},{"task_name":"3","status":"0","date":"03/03/2016"}]},{"pr_name":"New TODO List","task":[]},{"pr_name":"New TODO List","task":[{"task_name":"76","status":"1","date":"03/28/2016"}]}]'),
(7, 'roote', 'kjkjj', ''),
(8, 'rootr', 'Sosina52892', '[{"pr_name":"New TODO List","task":[]},{"pr_name":"New TODO List","task":[]}]');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
