-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2014 at 12:45 AM
-- Server version: 5.0.95
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kira77_fanlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `fan_arms`
--

CREATE TABLE IF NOT EXISTS `fan_arms` (
  `ida` int(11) NOT NULL auto_increment,
  `idh` int(11) NOT NULL,
  `ee` varchar(255) NOT NULL,
  `en` varchar(255) NOT NULL,
  `ru` varchar(255) NOT NULL,
  `descee` text,
  `descen` text,
  `descru` text,
  `power` int(11) NOT NULL,
  PRIMARY KEY  (`ida`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `fan_arms`
--

INSERT INTO `fan_arms` (`ida`, `idh`, `ee`, `en`, `ru`, `descee`, `descen`, `descru`, `power`) VALUES
(1, 1, 'Kepp', 'Stick', 'Палка', NULL, NULL, NULL, 10),
(2, 1, 'Vikat', 'Plait', 'Коса', NULL, NULL, NULL, 20),
(3, 1, 'Kirves', 'Axe', 'Топор', NULL, NULL, NULL, 30),
(4, 2, 'Piik', 'Peak', 'Пика', NULL, NULL, NULL, 20),
(5, 2, 'Vibu', 'Bow', 'Лук', NULL, NULL, NULL, 40),
(6, 2, 'M&otilde;&otilde;k', 'Sword', 'Меч', NULL, NULL, NULL, 50),
(7, 4, 'V&otilde;luleheke', 'Magician leaf', 'Волшебный листик', NULL, NULL, NULL, 5),
(8, 4, 'Oksake', 'Branch', 'Веточка', NULL, NULL, NULL, 10),
(9, 4, 'M&uuml;rgiseen', 'Poisonous Mushroom', 'Ядовитый гриб', NULL, NULL, NULL, 20),
(10, 3, 'V&otilde;lukepike', 'Magician stick', 'Вошебная палочка', NULL, NULL, NULL, 30),
(11, 3, 'S&otilde;rmus', 'Ring', 'Перстень', NULL, NULL, NULL, 50),
(12, 3, 'Raamat', 'Book', 'Книга', NULL, NULL, NULL, 100);

-- --------------------------------------------------------

--
-- Table structure for table `fan_artefacts`
--

CREATE TABLE IF NOT EXISTS `fan_artefacts` (
  `idar` int(11) NOT NULL auto_increment,
  `ee` varchar(255) NOT NULL,
  `en` varchar(255) NOT NULL,
  `ru` varchar(255) NOT NULL,
  `descee` text NOT NULL,
  `descen` text NOT NULL,
  `descru` text NOT NULL,
  `amount` int(11) default NULL,
  PRIMARY KEY  (`idar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fan_artefacts`
--


-- --------------------------------------------------------

--
-- Table structure for table `fan_enemies`
--

CREATE TABLE IF NOT EXISTS `fan_enemies` (
  `ide` int(11) NOT NULL auto_increment,
  `ee` varchar(255) NOT NULL,
  `en` varchar(255) NOT NULL,
  `ru` varchar(255) NOT NULL,
  `descee` text NOT NULL,
  `descen` text NOT NULL,
  `descru` text NOT NULL,
  `power` int(11) NOT NULL,
  PRIMARY KEY  (`ide`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fan_enemies`
--


-- --------------------------------------------------------

--
-- Table structure for table `fan_heroes`
--

CREATE TABLE IF NOT EXISTS `fan_heroes` (
  `idh` int(11) NOT NULL auto_increment,
  `ee` varchar(255) NOT NULL,
  `en` varchar(255) NOT NULL,
  `ru` varchar(255) NOT NULL,
  `descee` text,
  `descen` text,
  `descru` text,
  `life` int(11) NOT NULL,
  PRIMARY KEY  (`idh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fan_heroes`
--

INSERT INTO `fan_heroes` (`idh`, `ee`, `en`, `ru`, `descee`, `descen`, `descru`, `life`) VALUES
(1, 'Maamees', 'Peisan', 'Крестьянин', NULL, NULL, NULL, 100),
(2, 'Sõjamees', 'Warrior', 'Воин', NULL, NULL, NULL, 75),
(3, 'Maag', 'Mag', 'Маг', NULL, NULL, NULL, 50),
(4, 'Siil udus', 'Hedgehog in fog', 'Ёжик в тумане', NULL, NULL, NULL, 125);

-- --------------------------------------------------------

--
-- Table structure for table `fan_persons`
--

CREATE TABLE IF NOT EXISTS `fan_persons` (
  `idp` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idh` int(11) NOT NULL,
  `sex` int(1) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `start_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `health` int(11) NOT NULL,
  `end_date` datetime NOT NULL,
  `field` text NOT NULL,
  `ida` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  PRIMARY KEY  (`idp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `fan_persons`
--

INSERT INTO `fan_persons` (`idp`, `id`, `name`, `idh`, `sex`, `avatar`, `start_date`, `health`, `end_date`, `field`, `ida`, `power`) VALUES
(58, 17, 'REKTMASTA', 1, 0, 'view/img/heroes/1_1_0.png', '2014-05-06 15:25:50', -3, '2014-05-06 15:27:32', '0;0;1;3;0;1;2;2;0;0;4;4;4;1;4#2;0;2;2;4;2;2;3;0;4;3;4;1003;4;0#3;1;0;4;0;0;0;2;3;0;3;3;0;2;4#4;0;4;2;3;4;4;1003;1002;4;0;0;4;4;4#4;2;1;4;2;1;0;3;3;4;4;2;2;4;0#2;4;1;2;1;1002;1;1;4;3;0;4;4;0;4#4;0;1;0;4;4;1;0;1003;0;4;2;2;2;2#2;1003;1;3;3;3;3;4;4;2;3;0;2;2;0#1;1;0;3;1001;0;2;1001;1;0;4;1;2;1;4#4;4;4;1;3;2;4;1;2;1001;3;1;4;1;3#4;2;0;0;0;3;1001;3;1;3;4;1002;4;2;2#3;2;2;3;3;0;1001;1002;1;4;1;0;0;0;1#4;0;4;1003;1002;0;2;3;4;4;1;3;0;0;0#3;4;2;0;3;1;1;4;3;3;3;0;3;4;1#0;3;2;0;2;4;0;0;2;4;0;3;3;1;0', 3, 0),
(59, 19, 'Siilike', 4, 0, 'view/img/heroes/4_1_0.png', '2014-05-07 09:57:31', 125, '0000-00-00 00:00:00', '0;3;3;3;1;1;4;3;0;0;0;1;0;3;3#4;0;4;3;1;3;3;1;3;1003;3;1;3;2;4#1;2;2;4;1;3;1;1;1;1;1;1001;2;2;0#1;1;1;1;0;2;4;4;4;2;2;2;3;0;4#2;2;2;0;1;1001;3;2;4;4;4;1;2;2;3#2;3;0;4;4;0;1;4;0;1;1002;2;3;0;3#3;2;0;1;2;2;4;1;0;4;1;4;0;3;1#3;1;0;4;0;4;4;2;4;0;3;0;2;2;0#0;0;3;0;1003;1;2;1;2;2;0;3;2;1002;2#3;4;1002;3;3;3;3;3;0;2;3;3;3;0;1003#3;1;1;2;1;3;1001;4;0;1;2;1;0;1003;2#3;2;1;1;1;0;0;4;4;1;2;3;0;1002;4#1;4;0;3;1001;2;2;1;1;2;3;3;3;3;1003#0;2;0;2;3;2;2;4;1;2;0;3;0;1;4#4;2;3;4;0;0;1002;2;2;3;0;0;2;3;0', 9, 20),
(60, 19, 'Siilike', 1, 0, 'view/img/heroes/1_1_0.png', '2014-05-07 09:58:41', 100, '0000-00-00 00:00:00', '0;1;0;0;2;1;0;1;0;1;4;3;3;1;1#1;2;4;2;4;3;4;4;0;3;1;4;3;4;4#4;3;1;0;3;3;1001;4;4;1;1;4;0;0;0#2;1;3;1002;4;2;0;1001;2;1;3;3;0;1;3#0;0;1;2;0;0;1001;1;0;1001;3;1;0;4;1#1;1;3;4;3;3;2;3;2;4;4;0;3;0;1003#1;1003;3;1002;3;3;2;4;0;2;0;4;4;0;4#1;1;0;0;1;3;3;3;2;1;3;1003;1;1;2#4;1001;3;2;0;2;1;3;2;2;1;2;1;1;3#0;2;0;1;1002;1;0;1;0;2;2;3;4;4;0#2;3;3;1;0;4;4;2;3;1;4;4;3;0;1#2;1;4;2;2;1;1002;2;3;3;0;0;2;0;0#2;3;3;0;0;4;0;4;1;3;1003;0;3;1003;1#4;1;2;3;4;0;0;3;3;3;2;4;1002;4;4#4;1;3;3;2;3;2;2;2;4;0;3;4;3;0', 3, 30),
(61, 20, 'vbn', 1, 0, 'view/img/heroes/1_3_0.png', '2014-05-08 10:03:59', 100, '0000-00-00 00:00:00', '0;1;3;2;2;0;1;3;0;2;3;1;4;3;0#4;3;2;1;0;1003;1;1002;2;2;3;3;1;3;3#3;4;4;1001;1;1003;2;2;0;2;4;3;4;3;2#0;3;0;3;4;0;4;0;0;2;3;4;1;4;2#0;1003;1;4;0;1001;2;3;0;1001;1;0;2;0;4#4;1;1003;4;4;2;0;4;3;0;2;1;0;3;0#2;3;1001;3;3;3;1;1;1;1;4;2;1;1;3#0;0;1002;3;0;4;0;0;3;3;1;1;4;1;4#4;3;3;2;2;2;1;3;3;3;0;2;0;1;3#4;2;3;1002;0;4;4;0;4;2;3;1;4;2;1002#3;2;2;2;0;4;4;1;3;3;4;3;0;0;0#4;0;2;3;4;2;2;3;3;2;1;2;3;1;0#1;1003;2;3;2;3;3;1001;0;1;0;0;0;0;0#0;0;1;2;3;1;0;0;4;4;2;1;1;1;2#1;3;2;4;1002;0;2;0;2;2;1;2;2;1;0', 3, 30),
(62, 21, 'xxx', 4, 1, 'view/img/heroes/4_3_1.png', '2014-05-09 02:25:15', 74, '2014-05-09 02:26:08', '0;1;0;3;2;4;4;3;4;0;0;3;3;4;1#1;2;4;2;4;4;4;1;1;3;0;0;2;2;3#3;3;0;4;2;2;3;1003;1;3;2;1;2;0;0#3;1;3;3;4;2;2;3;4;1002;2;0;4;0;2#2;3;0;3;2;3;1;1;4;2;0;2;4;2;1001#0;1;4;3;4;3;1;2;2;0;1002;0;1;0;0#3;3;3;3;1;1001;1;2;1002;1;0;3;3;4;1001#1;4;1001;1;2;2;4;4;4;2;0;0;2;1;0#2;4;3;1;3;4;1003;0;1;1;1;1;4;0;1#0;2;0;3;3;3;0;3;2;0;1;2;0;4;4#0;2;3;3;3;1;3;1001;1;0;3;3;2;2;1003#3;3;2;4;2;0;3;2;4;1;1002;1;4;3;1003#3;3;2;1;2;0;3;0;2;4;0;1;3;3;4#2;1;2;4;1;4;1003;4;2;0;1;0;1;0;3#1;3;2;4;0;4;0;3;4;2;2;0;4;1;0', 9, 15);

-- --------------------------------------------------------

--
-- Table structure for table `fan_person_arm`
--

CREATE TABLE IF NOT EXISTS `fan_person_arm` (
  `idp` int(11) NOT NULL,
  `ida` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  PRIMARY KEY  (`idp`,`ida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fan_person_arm`
--


-- --------------------------------------------------------

--
-- Table structure for table `fan_person_artefact`
--

CREATE TABLE IF NOT EXISTS `fan_person_artefact` (
  `idp` int(11) NOT NULL,
  `idar` int(11) NOT NULL,
  `amount` int(11) default NULL,
  PRIMARY KEY  (`idp`,`idar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fan_person_artefact`
--


-- --------------------------------------------------------

--
-- Table structure for table `fan_users`
--

CREATE TABLE IF NOT EXISTS `fan_users` (
  `id` int(11) NOT NULL auto_increment,
  `nick` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date_reg` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `tel` varchar(20) default NULL,
  `admin` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `fan_users`
--

INSERT INTO `fan_users` (`id`, `nick`, `name`, `lastname`, `email`, `pass`, `date_reg`, `tel`, `admin`) VALUES
(17, 'getrekt', '', '', 'get@re.kt', 'e1f8d3e36c7f53980ebfd88a30d5e4ee', '2014-05-06 15:24:49', NULL, 0),
(18, '654321', '', '', 'aaaaaa@a.aa', 'e10adc3949ba59abbe56e057f20f883e', '2014-05-06 15:27:01', NULL, 0),
(19, 'testes', '', '', 'Test@Test.test', '6e7906b7fb3f8e1c6366c0910050e595', '2014-05-06 17:39:01', NULL, 0),
(20, 'kikimora', '', '', 'kira@peegel.ee', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-08 10:03:09', NULL, 0),
(21, 'assa123', '', '', 'aed@peegel.ee', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-09 02:24:46', NULL, 0),
(22, 'qwerty', '', '', 'ki@ra.ee', 'e10adc3949ba59abbe56e057f20f883e', '2014-05-12 15:00:12', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fan_words`
--

CREATE TABLE IF NOT EXISTS `fan_words` (
  `kw` varchar(255) NOT NULL,
  `ee` varchar(255) NOT NULL,
  `en` varchar(255) NOT NULL,
  `ru` varchar(255) NOT NULL,
  PRIMARY KEY  (`kw`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fan_words`
--

INSERT INTO `fan_words` (`kw`, `ee`, `en`, `ru`) VALUES
('about', 'Mängust', 'About', 'О игре'),
('allhero', 'K&otilde;ik kangelased', 'All heroes', 'Все герои'),
('arm', 'Relv', 'Arm', 'Оружие'),
('chpass', 'Vaheta passi', 'Change password', 'Сменить пароль'),
('creahero', 'Uus kangelane', 'Create hero', 'Создать героя'),
('curr_hero_prop', 'Kangelase omadused', 'Current Hero''s properties', 'Свойства героя'),
('email', 'E-post', 'E-mail', 'Эл. почта'),
('firstname', 'Eesnimi', 'Firstname', 'Имя'),
('heroes', 'Kangelased', 'Heroes', 'Герои'),
('hero_arm_power', 'Relv (v&otilde;imsus)', 'Hero''s Arm (power)', 'Оружие (мощность)'),
('hero_avatar', 'Kangelase n&auml;gu', 'Hero''s avatar', 'Внешность'),
('hero_name', 'Kangelase Nimi', 'Hero name', 'Имя героя'),
('hero_type_life', 'Kangelase liik (elu)', 'Hero''s type (life)', 'Тип героя (жизнь)'),
('lastname', 'Perenimi', 'Lastname', 'Фамилия'),
('life', 'Elu', 'Life', 'Жизнь'),
('loginok', 'Autentifikatsioon on &otilde;nnelik', 'Login is OK', 'Вы вошли в игру'),
('name', 'Nimi', 'Name', 'Имя'),
('nick', 'Kasutaja', 'Nickname', 'Пользователь'),
('nickname', 'Kasutaja nimi', 'Nickname', 'Имя пользов.'),
('pass', 'Pass', 'Password', 'Пароль'),
('reg', 'Registratsioon', 'Registration', 'Регистрация'),
('regok', 'Registratsioon on &otilde;nnelik', 'Registration complete', 'Регистрация удалась'),
('reg_descr', 'K&otilde;ik väljud peab olla täidetud. Kasutajanimi peab olla min 6 tähte. Pass min 6 tähte.', 'All fileds must be filled. Username must be min 6 characters. Password must be min 6 characters.', 'Все поля должны быть заполнены. Имя пользователя и пароль - мин. 6 символов.'),
('repeat_pass', 'Pass veel kord', 'Repeat Password', 'Пароль ещё раз'),
('tel', 'Telefon', 'Phone', 'Телефон'),
('updateok', 'Uuendamine oli &otilde;nnelik', 'Update was sucsesfully', 'Обновление было успешным'),
('user', 'Kasutaja', 'User', 'Имя пользов.'),
('user_profil', 'Kasutaja andmed', 'Users''s Profil', 'Даннные пользователя');

-- --------------------------------------------------------

--
-- Table structure for table `kersti_users`
--

CREATE TABLE IF NOT EXISTS `kersti_users` (
  `id` int(11) NOT NULL auto_increment,
  `nick` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date_reg` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `tel` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kersti_users`
--

INSERT INTO `kersti_users` (`id`, `nick`, `name`, `lastname`, `email`, `pass`, `date_reg`, `tel`) VALUES
(1, 'kikimora', '', '', 'kira@peegel.ee', 'e10adc3949ba59abbe56e057f20f883e', '2014-03-29 00:37:48', NULL),
(2, 'kikimora1', '', '', 'kiki@mora.ee', 'c33367701511b4f6020ec61ded352059', '2014-03-29 00:44:07', NULL),
(3, 'KIKIMORA2', 'Kira', 'Kirkina', 'kira77@UT.ee', 'e3ceb5881a0a1fdaad01296d7554868d', '2014-03-30 19:38:43', '556566'),
(4, 'MIKOLA', 'Mikolja', 'OIKIN', 'mi@kola.ee', '47fdeb2966d7363f81813639ecf53bb7', '2014-03-30 22:47:15', '778899'),
(5, 'momomo', 'Mumu', 'Gerasimova', 'mo@mo.ee', '9aee390f19345028f03bb16c588550e1', '2014-03-30 23:40:35', '23233434'),
(6, 'dididi', 'Dunja', 'Ivanova', 'di@di.ee', 'adf00707a1c0154a9ad8edb57c8646f4', '2014-04-01 13:11:08', '55555555');
