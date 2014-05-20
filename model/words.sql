-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2014 at 12:48 AM
-- Server version: 5.5.25
-- PHP Version: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fanlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE IF NOT EXISTS `words` (
  `kw` varchar(255) NOT NULL,
  `ee` varchar(255) NOT NULL,
  `en` varchar(255) NOT NULL,
  `ru` varchar(255) NOT NULL,
  PRIMARY KEY (`kw`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`kw`, `ee`, `en`, `ru`) VALUES
('about', 'Mängust', 'About', 'О игре'),
('allhero', 'K&otilde;ik kangelased', 'All heroes', 'Все герои'),
('creahero', 'Moodusta kangelast', 'Create hero', 'Создать героя'),
('email', 'E-post', 'E-mail', 'Эл. почта'),
('heroes', 'Kangelased', 'Heroes', 'Герои'),
('nick', 'Kasutaja', 'Nickname', 'Пользователь'),
('nickname', 'Kasutaja nimi', 'Nickname', 'Имя пользов.'),
('pass', 'Pass', 'Password', 'Пароль'),
('reg', 'Registration', 'Registratioon', 'Регистрация'),
('repeat_pass', 'Pass veel kord', 'Repeat Password', 'Пароль ещё раз'),
('user', 'Kasutaja', 'User', 'Имя пользов.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
