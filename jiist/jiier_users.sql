-- MySQL dump 10.13  Distrib 5.7.34, for Linux (x86_64)
--
-- Host: localhost    Database: stjoseph
-- ------------------------------------------------------
-- Server version	5.7.34-0ubuntu0.18.04.1

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
-- Table structure for table `jiier_users`
--

DROP TABLE IF EXISTS `jiier_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jiier_users` (
  `centre_id` int(50) DEFAULT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `register_number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `name_of_the_organization` varchar(1000) DEFAULT NULL,
  `type_of_organization` varchar(1000)DEFAULT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `district` varchar(1000) DEFAULT NULL,
  `year_of_establishment` varchar(1000) DEFAULT NULL,
  `year_of_experience` varchar(1000) DEFAULT NULL,
  `center_total_area` varchar(1000) DEFAULT NULL,
  `no_of_class_rooms` varchar(1000) DEFAULT NULL,
  `no_of_laboratories` varchar(1000) DEFAULT NULL,
  `no_of_staff_available` varchar(1000) DEFAULT NULL,
  `remark_if_any` varchar(1000) DEFAULT NULL,
  `pan_no_of_organization` varchar(1000) DEFAULT NULL,
  `mobile_number` varchar(1000) DEFAULT NULL,
  `website` varchar(1000) DEFAULT NULL,
  `institute_profile_promoter_profile` varchar(1000) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `followup_message` varchar(1000) DEFAULT NULL,
  `followup_date` date DEFAULT NULL,
  `lastup_date` date DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `photo` varchar(10) DEFAULT NULL,
  `centre_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jiier_users`
--

LOCK TABLES `jiier_users` WRITE;
/*!40000 ALTER TABLE `jiier_users` DISABLE KEYS */;
INSERT INTO `jiier_users` VALUES (1,1,'JIIST','','safetysujin@gmail.com','Sujin7721*','9994207721','St.Joseph Institutions,No25/196D,St.Joseph Street,Karankadu Po,Kanyakumari Dist-629809','Superadmin','JIIST Campus','Proprietorship','','','2000','NILL','5000','6','2','5','','NILL','9994357721','www.jiier.org','SUJIN','Active','','0000-00-00','2021-02-27',1,NULL,'TNKK001');
/*!40000 ALTER TABLE `jiier_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-17  6:12:13
