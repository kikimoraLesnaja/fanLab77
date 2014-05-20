-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2014 at 05:44 PM
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
-- Table structure for table `fan_words`
--

CREATE TABLE IF NOT EXISTS `fan_words` (
  `kw` varchar(255) NOT NULL,
  `ee` varchar(255) NOT NULL,
  `en` varchar(255) NOT NULL,
  `ru` varchar(255) NOT NULL,
  PRIMARY KEY (`kw`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fan_words`
--

INSERT INTO `fan_words` (`kw`, `ee`, `en`, `ru`) VALUES
('about', 'Mängust', 'About', 'О игре'),
('allhero', 'K&otilde;ik kangelased', 'All heroes', 'Все герои'),
('chpass', 'Vaheta passi', 'Change password', 'Сменить пароль'),
('creahero', 'Uus kangelane', 'Create hero', 'Создать героя'),
('email', 'E-post', 'E-mail', 'Эл. почта'),
('firstname', 'Eesnimi', 'Firstname', 'Имя'),
('heroes', 'Kangelased', 'Heroes', 'Герои'),
('lastname', 'Perenimi', 'Lastname', 'Фамилия'),
('loginok', 'Autentifikatsioon on &otilde;nnelik', 'Login is OK', 'Вы вошли в игру'),
('nick', 'Kasutaja', 'Nickname', 'Пользователь'),
('nickname', 'Kasutaja nimi', 'Nickname', 'Имя пользов.'),
('pass', 'Pass', 'Password', 'Пароль'),
('reg', 'Registratsioon', 'Registration', 'Регистрация'),
('regok', 'Registratsioon on &otilde;nnelik', 'Registration complete', 'Регистрация удалась'),
('repeat_pass', 'Pass veel kord', 'Repeat Password', 'Пароль ещё раз'),
('tel', 'Telefon', 'Phone', 'Телефон'),
('updateok', 'Uuendamine oli &otilde;nnelik', 'Update was sucsesfully', 'Обновление было успешным'),
('user', 'Kasutaja', 'User', 'Имя пользов.'),
('user_profil', 'Kasutaja andmed', 'Users''s Profil', 'Даннные пользователя');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
