-- MySQL dump 10.13  Distrib 5.7.11, for osx10.11 (x86_64)
--
-- Host: localhost    Database: recipe
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `Recipe`
--

DROP TABLE IF EXISTS `Recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Recipe` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `number_of_serving` tinyint(4) DEFAULT NULL,
  `description` text,
  `username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `username` (`username`),
  CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`username`) REFERENCES `User` (`uname`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Recipe`
--

LOCK TABLES `Recipe` WRITE;
/*!40000 ALTER TABLE `Recipe` DISABLE KEYS */;
INSERT INTO `Recipe` VALUES (1,'huiguorou',2,'chinese recipe','hengwu'),(2,'shizitou',2,'chinese recipe','hengwu'),(3,'tutou',2,'chinese recipe','hengwu'),(4,'mapodoufu',2,'chinese recipe','hengwu'),(5,'jianjiaofeichang',2,'chinese recipe','hengwu'),(6,'guobaorou',2,'chinese northeast recipe','david'),(7,'xiaojiduimogu',2,'chinese northeast recipe','david'),(8,'lidalicai',2,'italian  recipe','haozhang'),(9,'broccoli',2,'italian  broccoli recipe','haozhang'),(19,'sugar cake',2,'sugar cake','haozhang'),(20,'Grandma’s Fettuccini Alfredo',3,'italian recipe','haozhang'),(21,'tuna1',1,'best tuna1','haozhang'),(22,'tuna2',2,'best tuna2','haozhang'),(23,'tuna3',3,'best tuna3','haozhang'),(24,'tuna4',4,'best tuna4','haozhang'),(25,'tuna5',5,'best tuna5','haozhang'),(26,'12',4,'asd','haozhang'),(27,'zxczx',23,'easc','heng'),(28,'zxc',21,'ad','heng'),(29,'12',4,'asd','haozhang'),(30,'asd',31,'asascasc','heng'),(31,'123',23,'321','heng'),(32,'456',21,'789','heng'),(33,'qwd',21,'dddsa','heng'),(34,'321',3,'asd','heng'),(35,'zxc',2,'asd','heng'),(36,'asdacsa',2,'zxc','heng'),(37,'asdaca',21,'acacwqcwq','heng'),(38,'1231e1',21,'asdasdca','heng'),(39,'zxc',2,'asdasd','heng');
/*!40000 ALTER TABLE `Recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `uname` varchar(20) NOT NULL,
  `ugender` char(1) DEFAULT NULL,
  `uloginname` varchar(20) DEFAULT NULL,
  `upassword` varchar(100) DEFAULT NULL,
  `uage` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('12','f','123','$2y$10$coXHpnWiqLq3DsalBB4VuOiNEzAlt8B50QXOlsLpKLNN/JLjDjti6',12),('aaa','f','bdsdds','$2y$10$oMhMNJNJOCGOl/FWtbck.uQj.6yBr/fCOSL2CTY.3JAkYDAam0ocW',12),('asd','f','asdas',NULL,12),('david','M','david','whwhwh',22),('haozhang','M','haozhang','whwhwh',22),('heng','m','hengheng','$2y$10$FION50MKKgK1//d/2DFHxuUF4ygKYbCiDaWNhcR4M/Yu7uijp1Nue',12),('hengwu','M','hengwu','whwhwh',22),('hhhhh','M','hhhhh','whwhwh',22),('idonot','M','idonot','whwhwh',22),('kiser','M','kiser','whwhwh',22),('lalalsdasdas','M','lalalsdasdas','whwhwh',22),('qwe','f','qw12','12',12),('rerkemndssad','M','rerkemndssad','whwhwh',22),('sh','f','sh','$2y$10$0/F9.d8MFVIfCcoCnKO1eO5LfXG4vQjYCLEgnSyehXf75lyiUygGW',12),('siver','M','siver','whwhwh',22),('ssssssa','m','xczzxc','$2y$10$wZ7S230cxongbXAba/e5KO4B6GtgJR56byYWC8GOQp8ESiajnnXsW',23),('xxx','m','xxxx','$2y$10$px6RVMc1/dEdbz06LWipzuYWCWWDPgipmpoWxkVfz7pGB7AjM5Rem',12);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchange`
--

DROP TABLE IF EXISTS `exchange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchange` (
  `inputunit` varchar(20) NOT NULL,
  `outputunit` varchar(20) NOT NULL,
  `uquantities` double(8,4) DEFAULT NULL,
  PRIMARY KEY (`inputunit`,`outputunit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchange`
--

LOCK TABLES `exchange` WRITE;
/*!40000 ALTER TABLE `exchange` DISABLE KEYS */;
INSERT INTO `exchange` VALUES ('g','g',1.0000),('teaspoon','ml',20.0000);
/*!40000 ALTER TABLE `exchange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `creator` varchar(20) DEFAULT NULL,
  `gname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`gid`),
  KEY `creator` (`creator`),
  CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `User` (`uname`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'haozhang','Park Slope Cake Club'),(2,'hengwu','Chinese food'),(3,'heng','ahaa'),(4,'heng','ahaa'),(5,'heng','asdf'),(6,'heng','ss'),(7,'heng','fffff'),(8,'heng','fff'),(9,'heng','fff'),(10,'heng','ssss');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredient` (
  `iid` int(10) NOT NULL AUTO_INCREMENT,
  `iname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient`
--

LOCK TABLES `ingredient` WRITE;
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;
INSERT INTO `ingredient` VALUES (1,'sugar'),(2,'salt'),(3,'vinegar');
/*!40000 ALTER TABLE `ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `join_groups`
--

DROP TABLE IF EXISTS `join_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `join_groups` (
  `gid` int(10) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `jointime` datetime NOT NULL,
  PRIMARY KEY (`gid`,`uname`,`jointime`),
  KEY `uname` (`uname`),
  CONSTRAINT `join_groups_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `User` (`uname`),
  CONSTRAINT `join_groups_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `groups` (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `join_groups`
--

LOCK TABLES `join_groups` WRITE;
/*!40000 ALTER TABLE `join_groups` DISABLE KEYS */;
INSERT INTO `join_groups` VALUES (1,'david','2016-11-24 17:42:21'),(1,'haozhang','2016-11-24 17:42:23'),(1,'heng','2016-11-24 17:42:21'),(1,'heng','2016-12-14 21:38:58'),(1,'heng','2016-12-15 01:14:50'),(2,'heng','2016-12-14 21:39:08'),(2,'heng','2016-12-14 21:39:09'),(10,'heng','2016-12-15 21:28:58'),(1,'hengwu','2016-11-24 17:42:24'),(2,'hengwu','2016-11-24 17:42:26');
/*!40000 ALTER TABLE `join_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meeting`
--

DROP TABLE IF EXISTS `meeting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meeting` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `mname` varchar(20) DEFAULT NULL,
  `mtime` datetime DEFAULT NULL,
  `mholder` int(10) DEFAULT NULL,
  `mlocation` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`mid`),
  KEY `mholder` (`mholder`),
  CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`mholder`) REFERENCES `groups` (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting`
--

LOCK TABLES `meeting` WRITE;
/*!40000 ALTER TABLE `meeting` DISABLE KEYS */;
INSERT INTO `meeting` VALUES (1,'PSCC meeting1','2016-12-12 17:00:00',1,'25 RIVER DE S'),(2,'PSCC meeting2','2016-12-19 17:00:00',1,'25 RIVER DE S'),(3,'PSCC meeting3','2016-12-26 17:00:00',1,'25 RIVER DE S'),(4,'PSCC meeting4','2017-01-01 17:00:00',1,'25 RIVER DE S'),(5,'PSCC meeting5','2016-01-08 17:00:00',1,'25 RIVER DE S'),(6,'PSCC meeting6','2016-01-17 17:00:00',1,'25 RIVER DE S'),(7,'Cf meeting1','2016-01-17 17:00:00',2,'25 RIVER DE S'),(8,'Cf meeting2','2016-02-17 17:00:00',2,'25 RIVER DE S'),(9,'Cf meeting3','2016-03-17 17:00:00',2,'25 RIVER DE S');
/*!40000 ALTER TABLE `meeting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating` (
  `uname` varchar(20) NOT NULL,
  `rid` int(10) NOT NULL,
  `star` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`uname`,`rid`),
  KEY `rid` (`rid`),
  CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `User` (`uname`),
  CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `Recipe` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_item`
--

DROP TABLE IF EXISTS `recipe_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe_item` (
  `iid` int(10) NOT NULL,
  `rid` int(10) NOT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `Quantities` double(8,4) DEFAULT NULL,
  PRIMARY KEY (`iid`,`rid`),
  KEY `rid` (`rid`),
  CONSTRAINT `recipe_item_ibfk_1` FOREIGN KEY (`iid`) REFERENCES `ingredient` (`iid`),
  CONSTRAINT `recipe_item_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `recipe` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_item`
--

LOCK TABLES `recipe_item` WRITE;
/*!40000 ALTER TABLE `recipe_item` DISABLE KEYS */;
INSERT INTO `recipe_item` VALUES (1,19,'g',120.0000),(1,21,'g',12.0000),(2,1,'g',12.0000),(2,21,'kg',12.0000),(3,2,'teaspoon',1.0000);
/*!40000 ALTER TABLE `recipe_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_tag`
--

DROP TABLE IF EXISTS `recipe_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe_tag` (
  `tid` int(10) NOT NULL,
  `rid` int(10) NOT NULL,
  PRIMARY KEY (`tid`,`rid`),
  KEY `rid` (`rid`),
  CONSTRAINT `recipe_tag_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tags` (`tid`),
  CONSTRAINT `recipe_tag_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `Recipe` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_tag`
--

LOCK TABLES `recipe_tag` WRITE;
/*!40000 ALTER TABLE `recipe_tag` DISABLE KEYS */;
INSERT INTO `recipe_tag` VALUES (1,1),(2,1),(1,2),(2,2),(1,3),(2,3),(1,4),(2,4),(1,5),(2,5),(1,6),(2,6),(5,8),(5,9),(11,19),(1,21),(3,21),(5,21),(11,21),(14,36),(1,39);
/*!40000 ALTER TABLE `recipe_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `related_recipe`
--

DROP TABLE IF EXISTS `related_recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `related_recipe` (
  `rid1` int(10) NOT NULL,
  `rid2` int(10) NOT NULL,
  PRIMARY KEY (`rid1`,`rid2`),
  KEY `rid2` (`rid2`),
  CONSTRAINT `related_recipe_ibfk_1` FOREIGN KEY (`rid1`) REFERENCES `recipe` (`rid`),
  CONSTRAINT `related_recipe_ibfk_2` FOREIGN KEY (`rid2`) REFERENCES `recipe` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `related_recipe`
--

LOCK TABLES `related_recipe` WRITE;
/*!40000 ALTER TABLE `related_recipe` DISABLE KEYS */;
INSERT INTO `related_recipe` VALUES (21,1),(25,2),(3,4),(23,21),(21,22),(21,24),(21,25);
/*!40000 ALTER TABLE `related_recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `mid` int(10) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `description` text,
  PRIMARY KEY (`mid`,`uname`),
  KEY `uname` (`uname`),
  CONSTRAINT `report_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `meeting` (`mid`),
  CONSTRAINT `report_ibfk_2` FOREIGN KEY (`uname`) REFERENCES `User` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` VALUES (1,'heng','acascsacascwdqwdqwcqwccqwc'),(2,'heng','ahahahahahaha');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report_photo`
--

DROP TABLE IF EXISTS `report_photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report_photo` (
  `reportwphotoid` int(10) NOT NULL AUTO_INCREMENT,
  `reportphotoname` varchar(20) DEFAULT NULL,
  `reportphotobody` varchar(20) DEFAULT NULL,
  `mid` int(10) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`reportwphotoid`),
  KEY `mid` (`mid`),
  KEY `uname` (`uname`),
  CONSTRAINT `report_photo_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `report` (`mid`),
  CONSTRAINT `report_photo_ibfk_2` FOREIGN KEY (`uname`) REFERENCES `report` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report_photo`
--

LOCK TABLES `report_photo` WRITE;
/*!40000 ALTER TABLE `report_photo` DISABLE KEYS */;
/*!40000 ALTER TABLE `report_photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `uname` varchar(20) NOT NULL,
  `rid` int(10) NOT NULL,
  `content` text,
  `suggestion` text,
  `rating` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`uname`,`rid`),
  KEY `rid` (`rid`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `User` (`uname`),
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `Recipe` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES ('david',21,'best','',4),('david',22,'best','',3),('david',23,'best','',2),('david',24,'best','',1),('heng',6,'','as',1),('heng',23,'ascasdcasca','acasa as da asd as  ad wa ',1),('hengwu',20,'Yummy!','Really, really, tasty!',5),('hengwu',21,'best','',5),('hengwu',22,'best','',4),('hengwu',23,'best','',3),('hengwu',24,'best','',1),('hengwu',25,'best','',1);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review_photo`
--

DROP TABLE IF EXISTS `review_photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review_photo` (
  `reviewphotoid` int(10) NOT NULL AUTO_INCREMENT,
  `reviewphotoname` varchar(20) DEFAULT NULL,
  `reviewphotobody` varchar(20) DEFAULT NULL,
  `rid` int(10) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`reviewphotoid`),
  KEY `rid` (`rid`),
  KEY `uname` (`uname`),
  CONSTRAINT `review_photo_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `review` (`rid`),
  CONSTRAINT `review_photo_ibfk_2` FOREIGN KEY (`uname`) REFERENCES `review` (`uname`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review_photo`
--

LOCK TABLES `review_photo` WRITE;
/*!40000 ALTER TABLE `review_photo` DISABLE KEYS */;
INSERT INTO `review_photo` VALUES (1,'testphoto','axassxa',21,'david');
/*!40000 ALTER TABLE `review_photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rsvpmeeting`
--

DROP TABLE IF EXISTS `rsvpmeeting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rsvpmeeting` (
  `mid` int(10) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `rsvptime` datetime DEFAULT NULL,
  PRIMARY KEY (`mid`,`uname`),
  KEY `uname` (`uname`),
  CONSTRAINT `rsvpmeeting_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `meeting` (`mid`),
  CONSTRAINT `rsvpmeeting_ibfk_2` FOREIGN KEY (`uname`) REFERENCES `User` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rsvpmeeting`
--

LOCK TABLES `rsvpmeeting` WRITE;
/*!40000 ALTER TABLE `rsvpmeeting` DISABLE KEYS */;
INSERT INTO `rsvpmeeting` VALUES (1,'david','2016-11-24 17:39:40'),(1,'haozhang','2016-11-24 17:40:11'),(1,'heng','2016-12-15 03:01:14'),(1,'hengwu','2016-11-24 17:40:15'),(1,'kiser','2016-11-24 17:50:34'),(4,'david','2016-11-24 17:40:07'),(4,'haozhang','2016-11-24 17:40:12'),(4,'hengwu','2016-11-24 17:40:16'),(4,'kiser','2016-11-24 17:50:35'),(5,'david','2016-11-24 17:40:08'),(5,'haozhang','2016-11-24 17:40:14'),(5,'heng','2016-12-15 17:32:36'),(5,'kiser','2016-11-24 17:50:36'),(6,'david','2016-11-24 17:40:10'),(6,'kiser','2016-11-24 17:50:37'),(7,'heng','2016-12-15 17:19:23'),(7,'hengwu','2016-11-24 17:40:17'),(8,'heng','2016-12-15 17:19:48'),(8,'hengwu','2016-11-24 17:40:19'),(9,'heng','2016-12-15 17:20:27'),(9,'hengwu','2016-11-24 17:40:20');
/*!40000 ALTER TABLE `rsvpmeeting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `tname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'spicy'),(2,'chinese'),(3,'warm'),(4,'sugar'),(5,'italian'),(11,'cake'),(12,'kk'),(13,'ascac'),(14,'ascasc');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_recent_recipe`
--

DROP TABLE IF EXISTS `user_recent_recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_recent_recipe` (
  `uname` varchar(20) NOT NULL,
  `rid` int(10) NOT NULL,
  `searchTime` datetime NOT NULL,
  PRIMARY KEY (`uname`,`rid`,`searchTime`),
  KEY `rid` (`rid`),
  CONSTRAINT `user_recent_recipe_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `User` (`uname`),
  CONSTRAINT `user_recent_recipe_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `recipe` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_recent_recipe`
--

LOCK TABLES `user_recent_recipe` WRITE;
/*!40000 ALTER TABLE `user_recent_recipe` DISABLE KEYS */;
INSERT INTO `user_recent_recipe` VALUES ('heng',1,'2016-12-15 23:15:02'),('heng',2,'2016-12-15 23:15:25'),('heng',3,'2016-12-14 20:12:48'),('heng',3,'2016-12-14 20:20:19'),('heng',4,'2016-12-14 20:21:05'),('heng',5,'2016-12-15 21:06:43'),('heng',6,'2016-12-15 01:12:15'),('heng',6,'2016-12-15 01:12:45'),('heng',6,'2016-12-15 01:14:10'),('heng',6,'2016-12-15 01:14:20'),('heng',6,'2016-12-15 17:55:39'),('heng',6,'2016-12-15 18:03:05'),('heng',6,'2016-12-15 18:06:36'),('heng',6,'2016-12-15 18:17:09'),('heng',6,'2016-12-15 18:17:15'),('heng',6,'2016-12-15 18:19:15'),('heng',6,'2016-12-15 18:34:34'),('heng',6,'2016-12-15 18:36:34'),('heng',6,'2016-12-15 18:36:39'),('heng',6,'2016-12-15 18:38:14'),('heng',6,'2016-12-15 18:41:13'),('heng',6,'2016-12-15 18:42:09'),('heng',6,'2016-12-15 21:04:55'),('heng',6,'2016-12-15 22:49:33'),('heng',8,'2016-12-15 21:06:40'),('heng',8,'2016-12-15 23:16:00'),('heng',9,'2016-12-15 23:15:16'),('heng',9,'2016-12-15 23:15:32'),('heng',9,'2016-12-15 23:16:04'),('heng',20,'2016-12-14 22:35:16'),('heng',20,'2016-12-14 22:43:53'),('heng',20,'2016-12-15 23:15:06'),('heng',21,'2016-12-15 21:09:08'),('heng',21,'2016-12-15 21:11:19'),('heng',21,'2016-12-15 21:11:30'),('heng',21,'2016-12-15 21:12:21'),('heng',21,'2016-12-15 21:18:22'),('heng',21,'2016-12-15 21:19:18'),('heng',21,'2016-12-15 21:19:37'),('heng',21,'2016-12-15 21:20:05'),('heng',21,'2016-12-15 23:14:35'),('heng',21,'2016-12-15 23:16:07'),('heng',22,'2016-12-15 23:14:48'),('heng',22,'2016-12-15 23:15:11'),('heng',22,'2016-12-15 23:15:22'),('heng',23,'2016-12-15 01:08:09'),('heng',23,'2016-12-15 01:12:48'),('heng',23,'2016-12-15 18:19:31'),('heng',23,'2016-12-15 18:19:43'),('heng',23,'2016-12-15 18:19:58'),('heng',23,'2016-12-15 18:22:20'),('heng',23,'2016-12-15 18:22:29'),('heng',23,'2016-12-15 18:22:35'),('heng',23,'2016-12-15 18:22:40'),('heng',23,'2016-12-15 18:22:49'),('heng',23,'2016-12-15 18:30:32'),('heng',23,'2016-12-15 18:30:56'),('heng',23,'2016-12-15 18:31:10'),('heng',23,'2016-12-15 18:42:12'),('heng',23,'2016-12-15 18:46:00'),('heng',23,'2016-12-15 18:47:34'),('heng',23,'2016-12-15 18:47:59'),('heng',23,'2016-12-15 18:48:09'),('heng',23,'2016-12-15 18:59:03'),('heng',23,'2016-12-15 21:06:30'),('heng',23,'2016-12-15 23:15:41'),('heng',24,'2016-12-15 21:06:33'),('heng',24,'2016-12-15 23:15:38'),('heng',24,'2016-12-15 23:27:07'),('heng',24,'2016-12-15 23:27:12'),('heng',25,'2016-12-15 21:06:37'),('heng',25,'2016-12-15 21:06:46'),('heng',25,'2016-12-15 23:15:29'),('heng',25,'2016-12-15 23:15:36'),('heng',27,'2016-12-15 17:33:14'),('heng',27,'2016-12-15 17:34:06'),('heng',27,'2016-12-15 17:35:58'),('heng',27,'2016-12-15 17:36:30'),('heng',27,'2016-12-15 17:38:18'),('heng',27,'2016-12-15 17:39:00'),('heng',27,'2016-12-15 17:49:38'),('heng',27,'2016-12-15 18:19:07'),('heng',27,'2016-12-15 18:19:11'),('heng',31,'2016-12-15 23:00:30');
/*!40000 ALTER TABLE `user_recent_recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_recent_search`
--

DROP TABLE IF EXISTS `user_recent_search`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_recent_search` (
  `uname` varchar(20) NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `searchTime` datetime NOT NULL,
  PRIMARY KEY (`uname`,`keywords`,`searchTime`),
  CONSTRAINT `user_recent_search_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `User` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_recent_search`
--

LOCK TABLES `user_recent_search` WRITE;
/*!40000 ALTER TABLE `user_recent_search` DISABLE KEYS */;
INSERT INTO `user_recent_search` VALUES ('heng','a','2016-12-14 22:34:52'),('heng','s','2016-12-15 23:27:38'),('heng','s','2016-12-15 23:27:42');
/*!40000 ALTER TABLE `user_recent_search` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_recent_tags`
--

DROP TABLE IF EXISTS `user_recent_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_recent_tags` (
  `uname` varchar(20) NOT NULL,
  `tid` int(10) NOT NULL,
  `searchTime` datetime NOT NULL,
  PRIMARY KEY (`uname`,`tid`,`searchTime`),
  KEY `tid` (`tid`),
  CONSTRAINT `user_recent_tags_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `User` (`uname`),
  CONSTRAINT `user_recent_tags_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `tags` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_recent_tags`
--

LOCK TABLES `user_recent_tags` WRITE;
/*!40000 ALTER TABLE `user_recent_tags` DISABLE KEYS */;
INSERT INTO `user_recent_tags` VALUES ('heng',1,'2016-12-14 20:06:19'),('heng',1,'2016-12-14 20:06:58'),('heng',2,'2016-12-14 20:07:09');
/*!40000 ALTER TABLE `user_recent_tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-15 23:36:51
