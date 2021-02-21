-- MySQL dump 10.13  Distrib 5.5.38, for Linux (x86_64)
--
-- Host: localhost    Database: barattson
-- ------------------------------------------------------
-- Server version	5.5.38

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `placement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'Name Surname',
  `date` datetime NOT NULL COMMENT 'Date of Birth',
  `reg_course` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'Reg num',
  `reg_course_type` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'Reg num',
  `reg_class_type` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'Reg num',
  `reg_pre_start_date` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'Reg num',
  `reg_pre_week_day` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'Reg num',
  `reg_pre_hours` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'Reg num',
  `phone` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'Phone number',
  `email` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'E-mail',
  `imgpath` varchar(1024) COLLATE utf8_bin DEFAULT NULL COMMENT 'Personal ID image',
  `gepl` int(1) DEFAULT NULL COMMENT 'General English - Placement Test',
  `fmpl` int(1) DEFAULT NULL COMMENT 'IELTS - Free Mock Exam',
  `iltpl` int(1) DEFAULT NULL COMMENT 'IELTS- Placement test',
  `status` int(1) NOT NULL COMMENT 'Status',
  `gepl_date` datetime NOT NULL,
  `fmpl_date` datetime NOT NULL,
  `iltpl_date` datetime NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `reference` varchar(20) COLLATE utf8_bin DEFAULT '',
  `surname` varchar(30) COLLATE utf8_bin NOT NULL,
  `created` datetime DEFAULT NULL,
  `pdf_invoice` varchar(50) COLLATE utf8_bin DEFAULT '',
  `pdf_view` varchar(50) COLLATE utf8_bin DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=310 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-28  5:43:29
