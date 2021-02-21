-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 27 2015 г., 18:02
-- Версия сервера: 5.5.33-log
-- Версия PHP: 5.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `barattson`
--

-- --------------------------------------------------------

--
-- Структура таблицы `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'Name Surname',
  `date` datetime NOT NULL COMMENT 'Date of Birth',
  `reg_num` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'Reg num',
  `phone` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'Phone number',
  `company` varchar(512) COLLATE utf8_bin DEFAULT NULL COMMENT 'Company',
  `email` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'E-mail',
  `imgpath` varchar(1024) COLLATE utf8_bin DEFAULT NULL COMMENT 'Personal ID image',
  `fab` int(1) DEFAULT NULL COMMENT 'F1/FAB Accountant in Business',
  `fma` int(1) DEFAULT NULL COMMENT 'F2/FMA Management Accounting',
  `ffa` int(1) DEFAULT NULL COMMENT 'F3/FFA Financial Accounting',
  `glo` int(1) DEFAULT NULL COMMENT 'F4 Corporate and Business Law (Glo)',
  `eng` int(1) DEFAULT NULL COMMENT 'F4 Corporate and Business Law (Eng)',
  `fa_one` int(1) DEFAULT NULL COMMENT 'FA1 Introductory',
  `ma_one` int(1) DEFAULT NULL COMMENT 'MA1 Introductory',
  `fa_two` int(1) DEFAULT NULL COMMENT 'FA2 Intermediate',
  `ma_two` int(1) DEFAULT NULL COMMENT 'MA2 Intermediate',
  `status` int(1) NOT NULL COMMENT 'Status',
  `fab_date` datetime NOT NULL,
  `fma_date` datetime NOT NULL,
  `ffa_date` datetime NOT NULL,
  `glo_date` datetime NOT NULL,
  `eng_date` datetime NOT NULL,
  `fa_one_date` datetime NOT NULL,
  `ma_one_date` datetime NOT NULL,
  `fa_two_date` datetime NOT NULL,
  `ma_two_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

