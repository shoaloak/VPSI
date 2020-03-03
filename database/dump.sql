-- MariaDB dump 10.17  Distrib 10.4.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: vpsi
-- ------------------------------------------------------
-- Server version	10.4.12-MariaDB-1:10.4.12+maria~bionic-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*
CREATE USER 'admin' IDENTIFIED BY 'zaza-4';
GRANT ALL privileges on `vpsi`.* TO 'admin'@'%';
*/

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsersOwn`
--

DROP TABLE IF EXISTS `UsersOwn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsersOwn` (
  `user_id` int(11) NOT NULL,
  `vps_id` int(11) NOT NULL,
  KEY `fk_user` (`user_id`),
  KEY `fk_vps` (`vps_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_vps` FOREIGN KEY (`vps_id`) REFERENCES `VPSs` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsersOwn`
--

LOCK TABLES `UsersOwn` WRITE;
/*!40000 ALTER TABLE `UsersOwn` DISABLE KEYS */;
/*!40000 ALTER TABLE `UsersOwn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VPSs`
--

DROP TABLE IF EXISTS `VPSs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VPSs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `ipv4` varchar(15) DEFAULT NULL,
  `ipv6` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VPSs`
--

LOCK TABLES `VPSs` WRITE;
/*!40000 ALTER TABLE `VPSs` DISABLE KEYS */;
/*!40000 ALTER TABLE `VPSs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-03  9:37:26
