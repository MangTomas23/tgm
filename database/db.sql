CREATE DATABASE  IF NOT EXISTS `tgm` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tgm`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: tgm
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `bad_order_items`
--

DROP TABLE IF EXISTS `bad_order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bad_order_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bad_order_id` int(10) unsigned NOT NULL,
  `box_id` int(10) unsigned DEFAULT NULL,
  `no_of_box` int(11) NOT NULL,
  `no_of_packs` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bad_order_items_bad_order_id_foreign` (`bad_order_id`),
  KEY `bad_order_items_box_id_foreign` (`box_id`),
  KEY `bad_order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `bad_order_items_bad_order_id_foreign` FOREIGN KEY (`bad_order_id`) REFERENCES `bad_orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bad_order_items_box_id_foreign` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `bad_order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bad_order_items`
--

LOCK TABLES `bad_order_items` WRITE;
/*!40000 ALTER TABLE `bad_order_items` DISABLE KEYS */;
INSERT INTO `bad_order_items` VALUES (1,'2015-07-12 02:58:10','2015-07-12 02:58:10',3,49,0,2,8.33,67),(2,'2015-07-12 02:58:10','2015-07-12 02:58:10',3,54,0,2,240.00,67),(3,'2015-07-12 03:27:57','2015-07-12 03:27:57',4,79,0,5,0.00,104);
/*!40000 ALTER TABLE `bad_order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bad_orders`
--

DROP TABLE IF EXISTS `bad_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bad_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `truck_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `received_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salesman` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bad_orders_salesman_foreign` (`salesman`),
  CONSTRAINT `bad_orders_salesman_foreign` FOREIGN KEY (`salesman`) REFERENCES `employees` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bad_orders`
--

LOCK TABLES `bad_orders` WRITE;
/*!40000 ALTER TABLE `bad_orders` DISABLE KEYS */;
INSERT INTO `bad_orders` VALUES (3,'2015-07-12 02:58:09','2015-07-12 02:58:09','9','2015-07-12','rec',1),(4,'2015-07-12 03:27:57','2015-07-12 03:27:57','89','2015-07-12','rec',1);
/*!40000 ALTER TABLE `bad_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boxes`
--

DROP TABLE IF EXISTS `boxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boxes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_packs` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `product_id` int(10) unsigned DEFAULT NULL,
  `purchase_price` decimal(11,2) unsigned NOT NULL,
  `selling_price_1` decimal(11,2) unsigned NOT NULL,
  `selling_price_2` decimal(11,2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `boxes_product_id_foreign` (`product_id`),
  CONSTRAINT `boxes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boxes`
--

LOCK TABLES `boxes` WRITE;
/*!40000 ALTER TABLE `boxes` DISABLE KEYS */;
INSERT INTO `boxes` VALUES (47,'30 x 24',30,'2015-06-16 07:35:14','2015-06-21 10:19:58',65,600.00,620.00,630.00),(48,'30 x 24',30,'2015-06-16 07:35:31','2015-06-16 07:35:31',66,0.00,0.00,0.00),(49,'24 x 24',24,'2015-06-16 07:36:03','2015-06-16 10:34:18',67,100.00,120.00,125.00),(50,'24 x 24',30,'2015-06-16 07:36:17','2015-06-16 08:14:19',68,0.01,0.00,0.00),(51,'24 x 24',30,'2015-06-16 07:36:43','2015-06-16 07:36:43',69,0.00,0.00,0.00),(52,'8 x 10',30,'2015-06-16 07:37:02','2015-06-16 07:37:02',70,0.00,0.00,0.00),(53,'15 x 10',15,'2015-06-16 07:38:01','2015-06-16 07:38:01',71,0.00,0.00,0.00),(54,'10 x 30',10,'2015-06-16 07:52:20','2015-06-16 10:35:03',67,1200.00,900.00,300.00),(56,'12 x 20',12,'2015-06-18 16:24:06','2015-06-27 06:32:58',82,0.00,1020.00,0.00),(57,'12 x 20',12,'2015-06-18 16:24:33','2015-06-27 06:32:58',83,0.00,1020.00,0.00),(58,'10 x 24',10,'2015-06-18 16:25:02','2015-06-27 06:32:58',84,0.00,1038.00,0.00),(59,'10 x 30',10,'2015-06-18 16:25:26','2015-06-27 06:32:58',85,0.00,1215.00,0.00),(60,'10 x 20',10,'2015-06-18 16:25:41','2015-06-27 06:33:38',86,0.00,900.00,0.00),(61,'10 x 30',10,'2015-06-18 16:26:26','2015-06-27 06:35:16',87,0.00,1260.00,0.00),(62,'20 x 30',20,'2015-06-18 16:26:26','2015-06-27 06:35:16',87,0.00,512.00,0.00),(63,'20 x 30',20,'2015-06-18 16:29:21','2015-06-27 06:35:15',88,0.00,0.00,0.00),(64,'20 x 24',20,'2015-06-18 16:29:40','2015-06-27 06:35:59',89,0.00,426.00,0.00),(65,'20 x 24',20,'2015-06-18 16:29:56','2015-06-27 06:35:59',90,0.00,426.00,0.00),(66,'20 x 24',20,'2015-06-18 16:30:05','2015-06-27 06:35:59',91,0.00,426.00,0.00),(67,'10 x 30',10,'2015-06-18 16:30:23','2015-06-27 06:35:59',92,0.00,426.00,0.00),(68,'10 x 30',10,'2015-06-18 16:30:44','2015-06-27 06:35:35',93,0.00,1200.00,0.00),(69,'10 x 30',10,'2015-06-18 16:35:45','2015-06-27 06:35:35',94,0.00,1200.00,0.00),(70,'10 x 30',10,'2015-06-18 16:38:30','2015-06-27 06:36:39',95,0.00,1260.00,0.00),(71,'20 x 45',20,'2015-06-18 16:39:01','2015-06-27 06:36:53',96,0.00,768.00,0.00),(72,'20 x 30',20,'2015-06-18 16:39:38','2015-06-18 16:39:38',97,0.00,0.00,0.00),(73,'20 x 50',20,'2015-06-18 16:40:04','2015-06-18 16:40:04',98,0.00,0.00,0.00),(74,'20 x 50',20,'2015-06-18 16:40:08','2015-06-18 16:40:08',99,0.00,0.00,0.00),(75,'20 x 50',20,'2015-06-18 16:40:21','2015-06-18 16:40:21',100,0.00,0.00,0.00),(76,'20 x 50',20,'2015-06-18 16:40:25','2015-06-18 16:40:25',101,0.00,0.00,0.00),(77,'20 x 20',20,'2015-06-18 16:40:50','2015-06-27 06:38:54',102,0.00,390.00,0.00),(78,'20 x 20',20,'2015-06-18 16:41:02','2015-06-27 06:38:54',103,0.00,370.00,0.00),(79,'40 x 24',40,'2015-06-18 16:43:36','2015-06-27 06:50:27',104,0.00,0.00,0.00),(80,'40 x 24',40,'2015-06-18 16:43:46','2015-06-23 05:50:16',105,740.00,740.00,740.00),(81,'40 x 12',40,'2015-06-18 16:43:58','2015-06-18 16:43:58',106,0.00,0.00,0.00),(82,'40 x 24',40,'2015-06-18 16:44:11','2015-06-18 16:44:11',107,0.00,0.00,0.00),(83,'12 x 550',12,'2015-06-18 16:44:36','2015-06-18 16:44:36',108,0.00,0.00,0.00),(84,'50 x 20',50,'2015-06-18 16:44:57','2015-06-27 06:50:27',109,0.00,0.00,0.00),(85,'40 x 24',40,'2015-06-18 16:45:14','2015-06-23 05:50:42',110,740.00,740.00,740.00),(86,'24 x 30',24,'2015-06-18 16:45:35','2015-06-18 16:45:35',111,0.00,0.00,0.00),(87,'40 x 12',40,'2015-06-18 16:45:48','2015-06-27 06:50:27',112,0.00,1323.00,0.00),(88,'40 x 24',40,'2015-06-18 16:46:58','2015-06-23 05:54:06',113,740.00,740.00,740.00),(89,'30 x 24',30,'2015-06-18 16:47:22','2015-06-27 06:54:33',114,0.00,552.00,552.00),(90,'50 x 20',50,'2015-06-18 16:47:38','2015-06-27 06:54:33',115,0.00,2700.00,0.00),(91,'40 x 24',40,'2015-06-18 16:47:54','2015-06-19 00:46:40',116,0.00,0.00,0.00),(92,'40 x 24',40,'2015-06-18 16:48:05','2015-06-23 05:54:06',117,740.00,740.00,740.00),(93,'40 x 24',40,'2015-06-18 16:48:21','2015-06-23 05:54:06',118,740.00,740.00,740.00),(94,'40 x 24',40,'2015-06-18 16:48:29','2015-06-23 05:54:06',119,740.00,740.00,740.00),(95,'40 x 24',40,'2015-06-18 16:48:38','2015-06-23 05:54:06',120,740.00,740.00,740.00),(96,'40 x 24',40,'2015-06-18 16:48:54','2015-06-23 05:54:06',121,740.00,740.00,740.00),(97,'40 x 12',40,'2015-06-18 16:49:19','2015-06-27 06:56:27',122,0.00,1412.00,0.00),(98,'40 x 24',40,'2015-06-19 00:51:26','2015-06-23 05:54:06',123,740.00,740.00,740.00),(99,'40 x 24',40,'2015-06-19 00:51:40','2015-06-19 00:51:40',124,0.00,0.00,0.00),(100,'40 x 24',40,'2015-06-19 00:52:06','2015-06-23 05:54:06',125,740.00,740.00,740.00),(101,'40 x 24',40,'2015-06-19 00:52:16','2015-06-23 05:56:56',126,740.00,740.00,740.00),(102,'40 x 24',40,'2015-06-19 00:52:29','2015-06-19 00:52:29',127,0.00,0.00,0.00),(103,'40 x 24',40,'2015-06-19 00:53:00','2015-06-23 05:56:56',128,740.00,740.00,740.00),(104,'40 x 60',40,'2015-06-19 00:53:29','2015-06-27 06:59:44',129,0.00,1600.00,0.00),(105,'30 x 100',30,'2015-06-19 00:53:52','2015-06-27 06:59:44',130,0.00,2160.00,0.00),(106,'15 x 200',15,'2015-06-19 00:54:26','2015-06-27 06:59:44',131,0.00,1800.00,0.00),(107,'40 x 24',40,'2015-06-19 00:54:51','2015-06-27 06:59:44',132,0.00,740.00,0.00),(108,'40 x 24',40,'2015-06-19 00:55:07','2015-06-19 00:55:07',133,0.00,0.00,0.00),(109,'24 x 20',24,'2015-06-19 00:55:50','2015-06-27 07:19:35',134,0.00,1512.00,0.00),(110,'40 x 24',40,'2015-06-19 00:56:14','2015-06-23 05:56:56',135,740.00,740.00,740.00),(111,'40 x 24',40,'2015-06-19 00:56:29','2015-06-23 05:56:57',136,740.00,740.00,740.00),(116,'10 x 20',10,'2015-06-27 06:36:30','2015-06-27 06:36:30',143,0.00,1000.00,0.00),(117,'20 x 30',30,'2015-06-27 06:37:34','2015-06-27 06:37:34',144,0.00,512.00,0.00),(118,'20 x 50',20,'2015-06-27 06:38:18','2015-06-27 06:38:18',145,0.00,866.00,0.00),(119,'3.0 ',20,'2015-06-27 06:39:35','2015-06-27 06:39:35',146,0.00,280.00,0.00),(120,'1.5 x 6',20,'2015-06-27 06:40:04','2015-06-27 06:40:04',147,0.00,1355.00,0.00),(121,'1.0  x 12',20,'2015-06-27 06:40:32','2015-06-27 06:40:32',148,0.00,1440.00,0.00),(122,'2.8 ',20,'2015-06-27 06:40:59','2015-06-27 06:40:59',149,0.00,250.00,0.00),(123,'2.8 ',20,'2015-06-27 06:41:14','2015-06-27 06:41:14',150,0.00,250.00,0.00),(124,'1.6',20,'2015-06-27 06:41:32','2015-06-27 06:41:32',151,0.00,190.00,0.00),(125,'2.6',20,'2015-06-27 06:41:44','2015-06-27 06:41:44',152,0.00,255.00,0.00),(126,'75 x 8',75,'2015-06-27 06:42:11','2015-06-27 06:42:11',153,0.00,570.00,0.00),(127,'75 x 8',75,'2015-06-27 06:42:28','2015-06-27 06:42:28',154,0.00,570.00,0.00),(128,'10 x 30',10,'2015-06-27 06:43:06','2015-06-27 06:43:06',155,0.00,866.00,0.00),(129,'210 x 24',10,'2015-06-27 06:44:15','2015-06-27 06:44:15',156,0.00,604.00,0.00),(130,'200 x 24',10,'2015-06-27 06:44:40','2015-06-27 06:44:40',157,0.00,630.00,0.00),(131,'200 x 24',10,'2015-06-27 06:44:56','2015-06-27 06:44:56',158,0.00,630.00,0.00),(132,'200 x 24',10,'2015-06-27 06:45:07','2015-06-27 06:45:07',159,0.00,630.00,0.00),(133,'200 x 24',10,'2015-06-27 06:45:29','2015-06-27 06:45:29',161,0.00,630.00,0.00),(134,'200 x 24',10,'2015-06-27 06:45:41','2015-06-27 06:45:41',162,0.00,630.00,0.00),(135,'200 x 24',10,'2015-06-27 06:46:03','2015-06-27 06:46:03',163,0.00,655.00,0.00),(136,'200 x 24',10,'2015-06-27 06:46:16','2015-06-27 06:46:16',164,0.00,655.00,0.00),(137,'200 x 30',10,'2015-06-27 06:46:41','2015-06-27 06:46:41',165,0.00,723.00,0.00),(138,'500 x 10',10,'2015-06-27 06:47:03','2015-06-27 06:47:03',166,0.00,653.00,0.00),(139,'500 x 10',10,'2015-06-27 06:47:24','2015-06-27 06:47:24',167,0.00,653.00,0.00),(140,'500 x 10',10,'2015-06-27 06:47:42','2015-06-27 06:47:42',168,0.00,553.00,0.00),(141,'20 x 30',20,'2015-06-27 06:50:13','2015-06-27 06:50:13',169,0.00,1680.00,0.00),(142,'12 x 150',12,'2015-06-27 06:50:53','2015-06-27 06:50:53',170,0.00,1134.00,0.00),(143,'20 x 30',20,'2015-06-27 06:51:08','2015-06-27 06:51:08',171,0.00,1620.00,0.00),(144,'40 x 24',40,'2015-06-27 06:51:24','2015-06-27 06:51:24',172,0.00,740.00,0.00),(145,'40 x 24',40,'2015-06-27 06:51:57','2015-06-27 06:51:57',173,0.00,740.00,0.00),(146,'24 x 30',24,'2015-06-27 06:53:00','2015-06-27 06:53:00',174,0.00,1872.00,0.00),(147,'20 x 30',20,'2015-06-27 06:53:41','2015-06-27 06:53:41',175,0.00,1680.00,0.00),(148,'40 x 24',40,'2015-06-27 06:54:21','2015-06-27 06:54:21',176,0.00,740.00,0.00),(149,'40 x 24',40,'2015-06-27 06:55:01','2015-06-27 06:55:01',177,0.00,740.00,0.00),(150,'20 x 30',20,'2015-06-27 06:55:22','2015-06-27 06:55:22',178,0.00,560.00,0.00),(151,'40 x 24',40,'2015-06-27 06:56:08','2015-06-27 06:56:08',179,0.00,740.00,0.00),(152,'15 x 180',15,'2015-06-27 06:56:53','2015-06-27 06:56:53',180,0.00,1600.00,0.00),(153,'20 x 30',20,'2015-06-27 06:57:13','2015-06-27 06:57:13',181,0.00,1620.00,0.00),(154,'40 x 24',40,'2015-06-27 06:57:28','2015-06-27 06:57:28',182,0.00,740.00,0.00),(155,'40 x 24',40,'2015-06-27 06:57:40','2015-06-27 06:57:40',183,0.00,740.00,0.00),(156,'40 x 24',40,'2015-06-27 06:58:11','2015-06-27 06:58:11',184,0.00,740.00,0.00),(157,'40 x 50',40,'2015-06-27 06:58:27','2015-06-27 06:58:27',185,0.00,1029.00,0.00),(158,'40 x 24',40,'2015-06-27 06:58:37','2015-06-27 06:58:37',186,0.00,740.00,0.00),(159,'24 x 24',24,'2015-06-27 06:58:57','2015-06-27 06:58:57',187,0.00,1563.00,0.00),(160,'40 x 12',40,'2015-06-27 07:00:09','2015-06-27 07:00:09',188,0.00,1008.00,0.00),(161,'40 x 24',40,'2015-06-27 07:00:22','2015-06-27 07:00:22',189,0.00,740.00,0.00),(162,'24 x 30',24,'2015-06-27 07:00:58','2015-06-27 07:00:58',190,0.00,2160.00,0.00),(163,'40 x 24',40,'2015-06-27 07:01:28','2015-06-27 07:01:28',191,0.00,740.00,0.00),(164,'40 x 24',40,'2015-06-27 07:01:37','2015-06-27 07:01:37',192,0.00,740.00,0.00),(165,'20 x 30',20,'2015-06-27 07:01:54','2015-06-27 07:01:54',193,0.00,1620.00,0.00),(166,'40 x 24',40,'2015-06-27 07:02:06','2015-06-27 07:02:06',194,0.00,740.00,0.00),(167,'40 x 24',40,'2015-06-27 07:02:24','2015-06-27 07:02:24',195,0.00,740.00,0.00),(168,'40 x 24',40,'2015-06-27 07:02:35','2015-06-27 07:02:35',196,0.00,740.00,0.00),(169,'40 x 24',40,'2015-06-27 07:02:46','2015-06-27 07:02:46',197,0.00,740.00,0.00),(170,'40 x 24',40,'2015-06-27 07:02:55','2015-06-27 07:02:55',198,0.00,740.00,0.00),(171,'40 x 24',40,'2015-06-27 07:03:10','2015-06-27 07:03:10',199,0.00,740.00,0.00),(172,'40 x 12',40,'2015-06-27 07:03:40','2015-06-27 07:03:40',200,0.00,1260.00,0.00),(173,'40 x 24',40,'2015-06-27 07:03:54','2015-06-27 07:03:54',201,0.00,740.00,0.00),(174,'40 x 24',40,'2015-06-27 07:04:02','2015-06-27 07:04:02',202,0.00,740.00,0.00),(175,'40 x 12',40,'2015-06-27 07:04:20','2015-06-27 07:04:20',203,0.00,1109.00,0.00),(176,'40 x 12',40,'2015-06-27 07:04:34','2015-06-27 07:04:34',204,0.00,1134.00,0.00),(177,'40 x 24',40,'2015-06-27 07:04:44','2015-06-27 07:04:44',205,0.00,740.00,0.00),(178,'40 x 24',40,'2015-06-27 07:04:59','2015-06-27 07:04:59',206,0.00,740.00,0.00),(179,'40 x 24',40,'2015-06-27 07:05:09','2015-06-27 07:05:09',207,0.00,740.00,0.00),(180,'40 x 24',40,'2015-06-27 07:05:18','2015-06-27 07:05:18',208,0.00,740.00,0.00),(181,'40 x 24',40,'2015-06-27 07:05:23','2015-06-27 07:05:23',209,0.00,740.00,0.00),(182,'40 x 24',40,'2015-06-27 07:05:33','2015-06-27 07:05:33',210,0.00,740.00,0.00),(183,'40 x 24',40,'2015-06-27 07:05:43','2015-06-27 07:05:43',211,0.00,740.00,0.00),(184,'40 x 24',40,'2015-06-27 07:05:50','2015-06-27 07:05:50',212,0.00,740.00,0.00),(185,'40 x 50',40,'2015-06-27 07:06:14','2015-06-27 07:06:14',213,0.00,1008.00,0.00),(186,'40 x 24',40,'2015-06-27 07:06:27','2015-06-27 07:06:27',214,0.00,740.00,0.00),(187,'40 x 24',40,'2015-06-27 07:06:40','2015-06-27 07:06:40',215,0.00,740.00,0.00),(188,'40 x 24',40,'2015-06-27 07:06:47','2015-06-27 07:06:47',216,0.00,740.00,0.00),(189,'40 x 50',40,'2015-06-27 07:07:13','2015-06-27 07:07:13',217,0.00,630.00,0.00),(190,'40 x 24',40,'2015-06-27 07:07:25','2015-06-27 07:07:25',218,0.00,740.00,0.00),(191,'40 x 12',40,'2015-06-27 07:07:37','2015-06-27 07:07:37',219,0.00,1160.00,0.00),(192,'40 x 12',40,'2015-06-27 07:07:53','2015-06-27 07:07:53',220,0.00,1109.00,0.00),(193,'40 x 24',40,'2015-06-27 07:08:04','2015-06-27 07:08:04',221,0.00,740.00,0.00),(194,'40 x 24',40,'2015-06-27 07:08:10','2015-06-27 07:08:10',222,0.00,740.00,0.00),(195,'24 x 24',24,'2015-06-27 07:08:24','2015-06-27 07:08:24',223,0.00,1210.00,0.00),(196,'40 x 24',40,'2015-06-27 07:08:44','2015-06-27 07:08:44',224,0.00,740.00,0.00),(197,'24 x 30',24,'2015-06-27 07:08:58','2015-06-27 07:08:58',225,0.00,1944.00,0.00),(198,'24 x 80',24,'2015-06-27 07:09:15','2015-06-27 07:09:15',226,0.00,1560.00,0.00),(199,'40 x 24',40,'2015-06-27 07:09:30','2015-06-27 07:09:30',227,0.00,740.00,0.00),(200,'30 x 24',40,'2015-06-27 07:09:43','2015-06-27 07:09:43',228,0.00,740.00,0.00),(201,'40 x 24',40,'2015-06-27 07:09:59','2015-06-27 07:09:59',229,0.00,740.00,0.00),(202,'40 x 12',40,'2015-06-27 07:10:34','2015-06-27 07:10:34',230,0.00,390.00,0.00),(203,'40 x 24',40,'2015-06-27 07:10:48','2015-06-27 07:10:48',231,0.00,740.00,0.00),(204,'30 x 20',30,'2015-06-27 07:11:05','2015-06-27 07:11:05',232,0.00,1800.00,0.00),(205,'40 x 12',40,'2015-06-27 07:11:23','2015-06-27 07:11:23',233,0.00,1109.00,0.00),(206,'40 x 24',40,'2015-06-27 07:11:37','2015-06-27 07:11:37',234,0.00,740.00,0.00),(207,'40 x 24',40,'2015-06-27 07:11:46','2015-06-27 07:11:46',235,0.00,740.00,0.00),(208,'40 x 24',40,'2015-06-27 07:11:52','2015-06-27 07:11:52',236,0.00,740.00,0.00),(209,'40 x 108',40,'2015-06-27 07:12:07','2015-06-27 07:12:07',237,0.00,2480.00,0.00),(210,'50 x 50',50,'2015-06-27 07:12:21','2015-06-27 07:12:21',238,0.00,1260.00,0.00),(211,'30 x 160',30,'2015-06-27 07:12:32','2015-06-27 07:12:32',239,0.00,2700.00,0.00),(212,'40 x 26',40,'2015-06-27 07:12:47','2015-06-27 07:12:47',240,0.00,740.00,0.00),(213,'40 x 160',40,'2015-06-27 07:12:59','2015-06-27 07:12:59',241,0.00,4100.00,0.00),(214,'12 x 150',12,'2015-06-27 07:13:21','2015-06-27 07:13:21',242,0.00,1386.00,0.00),(215,'16 x 30',16,'2015-06-27 07:13:35','2015-06-27 07:13:35',243,0.00,1512.00,0.00),(216,'50 x 12',50,'2015-06-27 07:19:26','2015-06-27 07:19:53',244,0.00,425.00,0.00),(217,'50 x 12',50,'2015-06-27 07:20:10','2015-06-27 07:20:10',245,0.00,425.00,0.00),(218,'50 x 12',50,'2015-06-27 07:20:15','2015-06-27 07:20:15',246,0.00,425.00,0.00),(219,'50 x 12',50,'2015-06-27 07:20:22','2015-06-27 07:20:22',247,0.00,425.00,0.00),(220,'50 x 12',50,'2015-06-27 07:20:39','2015-06-27 07:20:39',248,0.00,425.00,0.00),(221,'50 x 12',50,'2015-06-27 07:20:53','2015-06-27 07:20:53',249,0.00,425.00,0.00),(222,'50 x 12',50,'2015-06-27 07:20:58','2015-06-27 07:20:58',250,0.00,425.00,0.00),(223,'50 x 12',50,'2015-06-27 07:21:04','2015-06-27 07:21:04',251,0.00,425.00,0.00),(224,'50 x 12',50,'2015-06-27 07:21:10','2015-06-27 07:21:10',252,0.00,425.00,0.00),(225,'50 x 12',50,'2015-06-27 07:21:19','2015-06-27 07:21:19',253,0.00,425.00,0.00),(226,'50 x 12',50,'2015-06-27 07:21:24','2015-06-27 07:21:24',254,0.00,425.00,0.00),(227,'50 x 12',50,'2015-06-27 07:21:32','2015-06-27 07:21:32',255,0.00,425.00,0.00),(228,'50 x 12',50,'2015-06-27 07:21:41','2015-06-27 07:21:41',256,0.00,425.00,0.00),(229,'50 x 12',50,'2015-06-27 07:21:54','2015-06-27 07:21:54',257,0.00,425.00,0.00),(230,'50 x 12',50,'2015-06-27 07:22:03','2015-06-27 07:22:03',258,0.00,425.00,0.00),(231,'50 x 12',50,'2015-06-27 07:22:10','2015-06-27 07:22:10',259,0.00,425.00,0.00),(232,'50 x 12',50,'2015-06-27 07:22:17','2015-06-27 07:22:17',260,0.00,425.00,0.00),(233,'50 x 12',50,'2015-06-27 07:22:22','2015-06-27 07:22:22',261,0.00,425.00,0.00),(234,'50 x 12',50,'2015-06-27 07:22:29','2015-06-27 07:22:29',262,0.00,425.00,0.00),(235,'50 x 12',50,'2015-06-27 07:22:44','2015-06-27 07:22:44',263,0.00,425.00,0.00),(236,'50 x 12',50,'2015-06-27 07:22:58','2015-06-27 07:22:58',264,0.00,425.00,0.00),(237,'50 x 12',50,'2015-06-27 07:23:08','2015-06-27 07:23:08',265,0.00,425.00,0.00),(238,'50 x 12',50,'2015-06-27 07:23:24','2015-06-27 07:23:24',266,0.00,425.00,0.00),(239,'50 x 12',50,'2015-06-27 07:23:35','2015-06-27 07:23:35',267,0.00,425.00,0.00),(240,'50 x 12',50,'2015-06-27 07:23:53','2015-06-27 07:23:53',268,0.00,425.00,0.00),(241,'50 x 12',50,'2015-06-27 07:24:18','2015-06-27 07:24:18',269,0.00,425.00,0.00);
/*!40000 ALTER TABLE `boxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'2015-06-27 05:16:53','2015-06-27 05:16:53','Matz','Naga City'),(3,'2015-07-04 14:14:22','2015-07-04 15:49:16','Customer 2','Address 1');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivered_products`
--

DROP TABLE IF EXISTS `delivered_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivered_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivered_products`
--

LOCK TABLES `delivered_products` WRITE;
/*!40000 ALTER TABLE `delivered_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivered_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designations`
--

LOCK TABLES `designations` WRITE;
/*!40000 ALTER TABLE `designations` DISABLE KEYS */;
INSERT INTO `designations` VALUES (1,'Driver','2015-06-10 15:30:37','2015-06-10 16:10:07'),(3,'Sales Lady','2015-06-13 07:16:37','2015-06-13 07:16:37');
/*!40000 ALTER TABLE `designations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `designation_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employees_designation_id_foreign` (`designation_id`),
  CONSTRAINT `employees_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Adrian Paul','Matos','09061774642','39-1 Concepcion Grande, Naga City','2015-06-11 07:13:40','2015-06-11 07:13:40',1),(2,'Anne Lorraine','Ruslin','09061773600','San Felipe, Naga City','2015-06-13 07:17:12','2015-06-13 07:17:12',3);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `in_stocks`
--

DROP TABLE IF EXISTS `in_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `supplier_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `box_id` int(10) unsigned DEFAULT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `in_stocks_supplier_id_foreign` (`supplier_id`),
  KEY `in_stocks_product_id_foreign` (`product_id`),
  KEY `in_stocks_box_id_foreign` (`box_id`),
  CONSTRAINT `in_stocks_box_id_foreign` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `in_stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  CONSTRAINT `in_stocks_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_stocks`
--

LOCK TABLES `in_stocks` WRITE;
/*!40000 ALTER TABLE `in_stocks` DISABLE KEYS */;
INSERT INTO `in_stocks` VALUES (1,'2015-06-27 05:16:32','2015-06-27 05:16:32',5,67,49,10,1000.00,'2015-06-27'),(2,'2015-06-27 05:16:32','2015-06-27 05:16:32',5,65,47,5,3000.00,'2015-06-27');
/*!40000 ALTER TABLE `in_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_06_09_173758_create_suppliers_table',1),('2015_06_09_174025_create_products_table',1),('2015_06_09_174653_add_foreign_key',1),('2015_06_09_175222_create_table_employees',1),('2015_06_09_181419_create_designations_table',1),('2015_06_10_142914_add_designation_id_on_employees',1),('2015_06_10_174508_create_product_categories_table',2),('2015_06_10_175343_add_product_category_id',3),('2015_06_11_002216_create_boxes_table',4),('2015_06_11_002703_add_product_id_on_boxes',5),('2015_06_13_233551_create_stock_ins_table',6),('2015_06_14_150040_drop_columns_prices',7),('2015_06_14_173143_add_prices_to_box',8),('2015_06_14_203818_create_in_stocks_table',9),('2015_06_15_122127_create_delivered_products_table',9),('2015_06_16_135156_update_boxes_table',10),('2015_06_18_235137_add_unique_index_to_product',11),('2015_06_23_193652_create_customers_table',12),('2015_06_24_115314_create_table_orders',13),('2015_06_24_235235_create_order_items_table',14),('2015_06_29_094045_create_returns_table',15),('2015_06_29_110222_create_return_items_table',15),('2015_07_10_142032_create_bad_orders_table',16),('2015_07_12_002517_create_bad_order_items_table',17);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `order_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `box_id` int(10) unsigned DEFAULT NULL,
  `no_of_box` int(10) unsigned NOT NULL,
  `no_of_packs` int(10) unsigned NOT NULL,
  `amount` decimal(11,2) unsigned NOT NULL,
  `selling_price` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_box_id_foreign` (`box_id`),
  CONSTRAINT `order_items_box_id_foreign` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,'2015-06-27 05:19:32','2015-06-27 05:19:32',1,65,47,3,0,1860.00,1),(2,'2015-06-27 05:19:32','2015-06-27 05:19:32',1,67,49,9,0,1080.00,1),(3,'2015-06-27 06:20:47','2015-06-27 06:20:47',2,65,47,1,0,620.00,1),(4,'2015-06-27 06:20:48','2015-06-27 06:20:48',2,67,49,1,0,120.00,1),(5,'2015-07-02 04:19:12','2015-07-02 04:19:12',3,65,47,0,2,41.34,1),(6,'2015-07-03 01:51:10','2015-07-03 01:51:10',5,65,47,0,3,62.01,1);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date` date NOT NULL,
  `salesman_id` int(10) unsigned DEFAULT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_salesman_id_foreign` (`salesman_id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orders_salesman_id_foreign` FOREIGN KEY (`salesman_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'2015-06-27 05:19:32','2015-06-27 05:19:32','2015-06-27',1,1,'Extract'),(2,'2015-06-27 06:20:47','2015-06-27 06:20:47','2015-06-27',1,1,'Extract'),(3,'2015-07-02 04:19:11','2015-07-02 04:19:11','2015-07-02',1,1,'Extract'),(5,'2015-07-03 01:51:09','2015-07-03 01:51:09','2015-07-03',1,1,'Extract');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('specter1649@gmail.com','674c4556d93640ec5448973f1137844bf5ff4f302a6d85ad0ddec268515894a0','2015-06-26 06:40:16');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (2,'Candy','2015-06-10 12:38:54','2015-06-10 12:38:54'),(3,'Biscuit','2015-06-10 12:39:07','2015-06-10 12:39:07'),(4,'Chocolate','2015-06-10 13:16:51','2015-06-10 13:48:23');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `supplier_id` int(10) unsigned DEFAULT NULL,
  `product_category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  KEY `products_supplier_id_foreign` (`supplier_id`),
  KEY `products_product_category_id_foreign` (`product_category_id`),
  CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (65,'Jelly Cup','2015-06-16 07:35:14','2015-06-16 07:35:14',5,2),(66,'Mixed Pudding','2015-06-16 07:35:31','2015-06-16 07:35:31',5,2),(67,'Coco Jelly','2015-06-16 07:36:03','2015-06-16 07:36:03',5,2),(68,'Jelly Stick','2015-06-16 07:36:17','2015-06-16 07:36:17',5,2),(69,'Pudding Stick','2015-06-16 07:36:43','2015-06-16 07:36:43',5,2),(70,'Cola Ice Candy (Small)','2015-06-16 07:37:02','2015-06-16 07:37:02',5,2),(71,'Cola Ice Candy (Big)','2015-06-16 07:38:01','2015-06-16 07:38:01',5,2),(82,'Iced Gem','2015-06-18 16:24:06','2015-06-18 16:24:06',6,3),(83,'Choco Iced Gem','2015-06-18 16:24:33','2015-06-18 16:24:33',6,3),(84,'Star Iced Gem','2015-06-18 16:25:02','2015-06-18 16:25:02',6,3),(85,'Butter Sticks','2015-06-18 16:25:26','2015-06-18 16:25:26',6,3),(86,'Paborito','2015-06-18 16:25:41','2015-06-18 16:25:41',6,3),(87,'Cocoa Puff','2015-06-18 16:26:26','2015-06-18 16:26:26',6,3),(88,'Butter Coconut','2015-06-18 16:29:21','2015-06-18 16:36:47',6,3),(89,'Wafer Banana','2015-06-18 16:29:40','2015-06-18 16:37:44',6,3),(90,'Wafer Macapuno','2015-06-18 16:29:56','2015-06-18 16:37:26',6,3),(91,'Wafer Chocolate','2015-06-18 16:30:05','2015-06-18 16:36:59',6,3),(92,'Wafer Vanilla','2015-06-18 16:30:23','2015-06-18 16:36:33',6,3),(93,'Twinee Choco Milk','2015-06-18 16:30:43','2015-06-18 16:36:18',6,3),(94,'Twinne Butter Milk','2015-06-18 16:35:45','2015-06-18 16:35:45',6,3),(95,'Miniboy','2015-06-18 16:38:30','2015-06-18 16:38:30',6,3),(96,'Cracker Marie','2015-06-18 16:39:01','2015-06-18 16:39:01',6,3),(97,'Gold Label Chocolate Coated','2015-06-18 16:39:38','2015-06-18 16:39:38',6,3),(98,'Candy Langka','2015-06-18 16:40:04','2015-06-18 16:40:04',6,3),(99,'Candy Ube','2015-06-18 16:40:08','2015-06-18 16:40:08',6,3),(100,'Candy Macapuno','2015-06-18 16:40:21','2015-06-18 16:40:21',6,3),(101,'Candy Banana','2015-06-18 16:40:25','2015-06-18 16:40:25',6,3),(102,'Nutti Milk Chocolate','2015-06-18 16:40:50','2015-06-18 16:40:50',6,3),(103,'Nutti Milk Polvoron','2015-06-18 16:41:02','2015-06-18 16:41:02',6,3),(104,'25 K-Star','2015-06-18 16:43:36','2015-06-18 16:43:36',2,2),(105,'ABC DOT','2015-06-18 16:43:46','2015-06-18 16:43:46',2,2),(106,'Acrobat Duck','2015-06-18 16:43:58','2015-06-18 16:43:58',2,2),(107,'Airplane Candy','2015-06-18 16:44:10','2015-06-18 16:44:10',2,2),(108,'Apple Candy Jar','2015-06-18 16:44:36','2015-06-18 16:44:36',2,2),(109,'Aroma Heart Pent.','2015-06-18 16:44:57','2015-06-18 16:44:57',2,2),(110,'Arrow Gun','2015-06-18 16:45:14','2015-06-18 16:45:14',2,2),(111,'Balancing Eagle','2015-06-18 16:45:35','2015-06-18 16:45:35',2,2),(112,'Big Pana','2015-06-18 16:45:48','2015-06-18 16:45:48',2,2),(113,'Candy Crunch','2015-06-18 16:46:57','2015-06-18 16:46:57',2,3),(114,'Candy Jelly','2015-06-18 16:47:22','2015-06-18 16:47:22',2,3),(115,'Car\'s Sharpener','2015-06-18 16:47:38','2015-06-18 16:47:38',2,3),(116,'Choco Butteryfly','2015-06-18 16:47:53','2015-06-18 16:47:53',2,3),(117,'Choco Dots','2015-06-18 16:48:05','2015-06-18 16:48:05',2,3),(118,'Choco Peanut','2015-06-18 16:48:21','2015-06-18 16:48:21',2,3),(119,'Disney Watch','2015-06-18 16:48:29','2015-06-18 16:48:29',2,3),(120,'Dulce','2015-06-18 16:48:38','2015-06-18 16:48:38',2,3),(121,'Elisi','2015-06-18 16:48:54','2015-06-18 16:48:54',2,3),(122,'Fishing Game','2015-06-18 16:49:19','2015-06-18 16:49:19',2,3),(123,'Flying Saucer','2015-06-19 00:51:26','2015-06-19 00:51:26',6,3),(124,'Freaky Animals','2015-06-19 00:51:40','2015-06-19 00:51:40',6,3),(125,'Fruit Bottle','2015-06-19 00:52:06','2015-06-19 00:52:06',6,3),(126,'Fruit Candy','2015-06-19 00:52:16','2015-06-19 00:52:16',6,3),(127,'Fruit Gummy','2015-06-19 00:52:29','2015-06-19 00:52:29',6,3),(128,'Fruit Beans','2015-06-19 00:53:00','2015-06-19 00:53:00',6,3),(129,'Gold Coin Beetle','2015-06-19 00:53:29','2015-06-19 00:53:29',6,3),(130,'Gold Coin Dodo','2015-06-19 00:53:51','2015-06-19 00:53:51',6,3),(131,'Gold Coin Gas Tank','2015-06-19 00:54:26','2015-06-19 00:54:26',6,3),(132,'Glow in the Dark Dino','2015-06-19 00:54:51','2015-06-19 00:54:51',6,3),(133,'Heart Chocolate','2015-06-19 00:55:07','2015-06-19 00:55:07',6,3),(134,'Heart Choco','2015-06-19 00:55:50','2015-06-19 00:55:50',6,3),(135,'Ice Cream Candy','2015-06-19 00:56:14','2015-06-19 00:56:14',6,3),(136,'Jolly Fruit Pop','2015-06-19 00:56:29','2015-06-19 00:56:29',6,3),(138,'Adong Sample','2015-06-22 01:55:47','2015-06-22 01:55:47',1,3),(143,'Choco Stick Coated','2015-06-27 06:36:30','2015-06-27 06:36:30',6,3),(144,'Choco Label ','2015-06-27 06:37:34','2015-06-27 06:37:34',6,3),(145,'Ritz Candy','2015-06-27 06:38:18','2015-06-27 06:38:18',6,3),(146,'Four Season','2015-06-27 06:39:35','2015-06-27 06:39:35',6,3),(147,'Fiesta Assorted','2015-06-27 06:40:04','2015-06-27 06:40:04',6,3),(148,'Jimbolito','2015-06-27 06:40:31','2015-06-27 06:40:31',6,3),(149,'Jimbo Pail','2015-06-27 06:40:59','2015-06-27 06:40:59',6,3),(150,'Picnic Assorted','2015-06-27 06:41:14','2015-06-27 06:41:14',6,3),(151,'Picnic Kit','2015-06-27 06:41:32','2015-06-27 06:41:32',6,3),(152,'Happy Treat','2015-06-27 06:41:44','2015-06-27 06:41:44',6,3),(153,'Nutti Milk Chocolate Jar','2015-06-27 06:42:11','2015-06-27 06:42:11',6,3),(154,'Nutti Polvoron Jar','2015-06-27 06:42:28','2015-06-27 06:42:28',6,3),(155,'Dansk Shortcake','2015-06-27 06:43:06','2015-06-27 06:43:06',6,3),(156,'Square Puff','2015-06-27 06:44:15','2015-06-27 06:44:15',6,3),(157,'Butter Stick ','2015-06-27 06:44:40','2015-06-27 06:44:40',6,3),(158,'Custard Shell','2015-06-27 06:44:56','2015-06-27 06:44:56',6,3),(159,'Custard Mix Shell','2015-06-27 06:45:07','2015-06-27 06:45:07',6,3),(161,'Dansk Shortcake 2','2015-06-27 06:45:28','2015-06-27 06:45:28',6,3),(162,'Miniboy k','2015-06-27 06:45:41','2015-06-27 06:45:41',6,3),(163,'Iced Gem (Kilo)','2015-06-27 06:46:03','2015-06-27 06:46:03',6,3),(164,'Choco Iced Gem (Kilo)','2015-06-27 06:46:16','2015-06-27 06:46:16',6,3),(165,'Waffer Banana (Kilo)','2015-06-27 06:46:41','2015-06-27 06:46:41',6,3),(166,'Finger Stick','2015-06-27 06:47:03','2015-06-27 06:47:03',6,3),(167,'Choco Stick (Kilo)','2015-06-27 06:47:24','2015-06-27 06:47:24',6,3),(168,'Finger Stick Plain (Kilo)','2015-06-27 06:47:42','2015-06-27 06:47:42',6,3),(169,'Bead Candy','2015-06-27 06:50:13','2015-06-27 06:50:13',2,2),(170,'Bubble Gum Grenade','2015-06-27 06:50:53','2015-06-27 06:50:53',2,2),(171,'Bullet Gum','2015-06-27 06:51:08','2015-06-27 06:51:08',2,2),(172,'Butterfly Candy','2015-06-27 06:51:24','2015-06-27 06:51:24',2,2),(173,'Candy Dots','2015-06-27 06:51:57','2015-06-27 06:51:57',2,2),(174,'Candy Knife','2015-06-27 06:53:00','2015-06-27 06:53:00',2,2),(175,'Chilli Pepper','2015-06-27 06:53:41','2015-06-27 06:53:41',2,2),(176,'Choco Butterfly','2015-06-27 06:54:21','2015-06-27 06:54:21',2,2),(177,'Choco Sesami Candy','2015-06-27 06:55:01','2015-06-27 06:55:01',2,2),(178,'Crazy Cola and Sprite','2015-06-27 06:55:22','2015-06-27 06:55:22',2,2),(179,'Dragon Flute','2015-06-27 06:56:08','2015-06-27 06:56:08',2,2),(180,'Football Chocolate','2015-06-27 06:56:53','2015-06-27 06:56:53',2,2),(181,'Fries Jelly Candy','2015-06-27 06:57:13','2015-06-27 06:57:13',2,2),(182,'Frozen Marsmallow','2015-06-27 06:57:28','2015-06-27 06:57:28',2,2),(183,'Frozen Sour Powder','2015-06-27 06:57:40','2015-06-27 06:57:40',2,2),(184,'Fruit Jelly','2015-06-27 06:58:11','2015-06-27 06:58:11',2,2),(185,'Fruit Yogart Stick','2015-06-27 06:58:27','2015-06-27 06:58:27',2,2),(186,'Fruity Beans','2015-06-27 06:58:37','2015-06-27 06:58:37',2,2),(187,'Funny Can','2015-06-27 06:58:57','2015-06-27 06:58:57',2,2),(188,'Hand Clap Toy','2015-06-27 07:00:09','2015-06-27 07:00:09',2,2),(189,'Hair Clip','2015-06-27 07:00:22','2015-06-27 07:00:22',2,2),(190,'Heart Choco Lolipop','2015-06-27 07:00:58','2015-06-27 07:00:58',2,2),(191,'Jelly Nails','2015-06-27 07:01:28','2015-06-27 07:01:28',2,2),(192,'Jumping Frog','2015-06-27 07:01:37','2015-06-27 07:01:37',2,2),(193,'Kiss','2015-06-27 07:01:54','2015-06-27 07:01:54',2,2),(194,'Lipstick Candy','2015-06-27 07:02:06','2015-06-27 07:02:06',2,2),(195,'Lucky Fruit Balls Strawberry','2015-06-27 07:02:23','2015-06-27 07:02:23',2,2),(196,'Lucky Fruit Balls Lemon','2015-06-27 07:02:35','2015-06-27 07:02:35',2,2),(197,'Lucky Fruit Balls Orange','2015-06-27 07:02:46','2015-06-27 07:02:46',2,2),(198,'Lucky Fruit Balls Pineapple','2015-06-27 07:02:55','2015-06-27 07:02:55',2,2),(199,'Long Cigarette Stick','2015-06-27 07:03:10','2015-06-27 07:03:10',2,2),(200,'Loud Trumphet','2015-06-27 07:03:40','2015-06-27 07:03:40',2,2),(201,'Magic Choco Balls','2015-06-27 07:03:54','2015-06-27 07:03:54',2,2),(202,'Magnetic Letters','2015-06-27 07:04:02','2015-06-27 07:04:02',2,2),(203,'Maze Ruler','2015-06-27 07:04:20','2015-06-27 07:04:20',2,2),(204,'Maze Watch','2015-06-27 07:04:34','2015-06-27 07:04:34',2,2),(205,'Milk Candy','2015-06-27 07:04:44','2015-06-27 07:04:44',2,2),(206,'Money Candy Box','2015-06-27 07:04:59','2015-06-27 07:04:59',2,2),(207,'Mix Mallow','2015-06-27 07:05:09','2015-06-27 07:05:09',2,2),(208,'Neon Trumphet','2015-06-27 07:05:18','2015-06-27 07:05:18',2,2),(209,'Nips Candy','2015-06-27 07:05:23','2015-06-27 07:05:23',2,2),(210,'Pencil Candy','2015-06-27 07:05:33','2015-06-27 07:05:33',2,2),(211,'Plastic Kitchen Utensil','2015-06-27 07:05:42','2015-06-27 07:05:42',2,2),(212,'Popping Candy','2015-06-27 07:05:50','2015-06-27 07:05:50',2,2),(213,'Popotix (Fruit Stick)','2015-06-27 07:06:14','2015-06-27 07:06:14',2,2),(214,'Polo Whistle','2015-06-27 07:06:27','2015-06-27 07:06:27',2,2),(215,'Pump-It Balloon','2015-06-27 07:06:40','2015-06-27 07:06:40',2,2),(216,'Rainbow Candy','2015-06-27 07:06:47','2015-06-27 07:06:47',2,2),(217,'Rainbow Fruit Candy','2015-06-27 07:07:13','2015-06-27 07:07:13',2,2),(218,'Rose Candy','2015-06-27 07:07:25','2015-06-27 07:07:25',2,2),(219,'Spinner Gun','2015-06-27 07:07:37','2015-06-27 07:07:37',2,2),(220,'Speed Blade','2015-06-27 07:07:53','2015-06-27 07:07:53',2,2),(221,'Star Tools','2015-06-27 07:08:04','2015-06-27 07:08:04',2,2),(222,'Star Ring','2015-06-27 07:08:10','2015-06-27 07:08:10',2,2),(223,'Soda Can Candy','2015-06-27 07:08:24','2015-06-27 07:08:24',2,2),(224,'Sour Candy','2015-06-27 07:08:44','2015-06-27 07:08:44',2,2),(225,'Tiger Head Choco','2015-06-27 07:08:58','2015-06-27 07:08:58',2,2),(226,'Tumbler Coins','2015-06-27 07:09:15','2015-06-27 07:09:15',2,2),(227,'V Cola Candy','2015-06-27 07:09:30','2015-06-27 07:09:30',2,2),(228,'Water Melon Gum','2015-06-27 07:09:43','2015-06-27 07:09:43',2,2),(229,'Wheel and Knot','2015-06-27 07:09:59','2015-06-27 07:09:59',2,2),(230,'Wheel and Knot \'12','2015-06-27 07:10:34','2015-06-27 07:10:34',2,2),(231,'Whistle Balloon','2015-06-27 07:10:48','2015-06-27 07:10:48',2,2),(232,'Whistle Bat Glass','2015-06-27 07:11:05','2015-06-27 07:11:05',2,2),(233,'Whistle Blade','2015-06-27 07:11:23','2015-06-27 07:11:23',2,2),(234,'Whistle Candy','2015-06-27 07:11:37','2015-06-27 07:11:37',2,2),(235,'Whistle Trumpo','2015-06-27 07:11:46','2015-06-27 07:11:46',2,2),(236,'Whistle Stick','2015-06-27 07:11:52','2015-06-27 07:11:52',2,2),(237,'Colorful Balloons','2015-06-27 07:12:07','2015-06-27 07:12:07',2,2),(238,'Lotto Balloons','2015-06-27 07:12:21','2015-06-27 07:12:21',2,2),(239,'Party Balloons','2015-06-27 07:12:32','2015-06-27 07:12:32',2,2),(240,'Pearl Balloon','2015-06-27 07:12:47','2015-06-27 07:12:47',2,2),(241,'Super Balloon','2015-06-27 07:12:59','2015-06-27 07:12:59',2,2),(242,'Milk Choco Egg + Biscuit','2015-06-27 07:13:21','2015-06-27 07:13:21',2,2),(243,'Milk Choco Character','2015-06-27 07:13:35','2015-06-27 07:13:35',2,2),(244,'Chockie','2015-06-27 07:19:26','2015-06-27 07:19:26',3,3),(245,'Tobleron','2015-06-27 07:20:10','2015-06-27 07:20:10',3,3),(246,'Flower','2015-06-27 07:20:15','2015-06-27 07:20:15',3,3),(247,'Power Long','2015-06-27 07:20:22','2015-06-27 07:20:22',3,3),(248,'Balisuso','2015-06-27 07:20:39','2015-06-27 07:20:39',3,3),(249,'NLEX','2015-06-27 07:20:53','2015-06-27 07:20:53',3,3),(250,'Tira Tira','2015-06-27 07:20:58','2015-06-27 07:20:58',3,3),(251,'Pizza','2015-06-27 07:21:04','2015-06-27 07:21:04',3,3),(252,'Choco Joy','2015-06-27 07:21:10','2015-06-27 07:21:10',3,3),(253,'Donut','2015-06-27 07:21:19','2015-06-27 07:21:19',3,3),(254,'Cloud 9','2015-06-27 07:21:24','2015-06-27 07:21:24',3,3),(255,'Chewy','2015-06-27 07:21:32','2015-06-27 07:21:32',3,3),(256,'Mega','2015-06-27 07:21:41','2015-06-27 07:21:41',3,3),(257,'Winner (Rodisco)','2015-06-27 07:21:54','2015-06-27 07:21:54',3,3),(258,'Lapresa','2015-06-27 07:22:03','2015-06-27 07:22:03',3,3),(259,'Calculator','2015-06-27 07:22:10','2015-06-27 07:22:10',3,3),(260,'Choco Mani','2015-06-27 07:22:17','2015-06-27 07:22:17',3,3),(261,'Choco Ball','2015-06-27 07:22:21','2015-06-27 07:22:21',3,3),(262,'Choco Pop','2015-06-27 07:22:29','2015-06-27 07:22:29',3,3),(263,'Peanut Brittle (Rodisco)','2015-06-27 07:22:44','2015-06-27 07:22:44',3,3),(264,'Chocolate Bar (Rodisco)','2015-06-27 07:22:58','2015-06-27 07:22:58',3,3),(265,'Choco Mani Toppings','2015-06-27 07:23:08','2015-06-27 07:23:08',3,3),(266,'Sampaloc Tamis (Rodisco)','2015-06-27 07:23:24','2015-06-27 07:23:24',3,3),(267,'Flower Cup','2015-06-27 07:23:35','2015-06-27 07:23:35',3,3),(268,'Princess Bar','2015-06-27 07:23:53','2015-06-27 07:23:53',3,3),(269,'Chewey Choco ','2015-06-27 07:24:18','2015-06-27 07:24:18',3,3);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `return_items`
--

DROP TABLE IF EXISTS `return_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `return_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ret_id` int(10) unsigned DEFAULT NULL,
  `box_id` int(10) unsigned DEFAULT NULL,
  `no_of_box` int(10) unsigned NOT NULL,
  `no_of_packs` int(10) unsigned NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `return_items_ret_id_foreign` (`ret_id`),
  KEY `return_items_box_id_foreign` (`box_id`),
  CONSTRAINT `return_items_box_id_foreign` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `return_items_ret_id_foreign` FOREIGN KEY (`ret_id`) REFERENCES `returns` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `return_items`
--

LOCK TABLES `return_items` WRITE;
/*!40000 ALTER TABLE `return_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `return_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `returns`
--

DROP TABLE IF EXISTS `returns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `returns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customer_id` int(10) unsigned DEFAULT NULL,
  `date` date NOT NULL,
  `reference_no` int(11) DEFAULT NULL,
  `salesman` int(10) unsigned DEFAULT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `received_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checked_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `returns_customer_id_foreign` (`customer_id`),
  KEY `returns_salesman_foreign` (`salesman`),
  CONSTRAINT `returns_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `returns_salesman_foreign` FOREIGN KEY (`salesman`) REFERENCES `employees` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `returns`
--

LOCK TABLES `returns` WRITE;
/*!40000 ALTER TABLE `returns` DISABLE KEYS */;
INSERT INTO `returns` VALUES (1,'2015-07-05 05:21:18','2015-07-05 05:21:18',3,'2015-07-05',0,1,'1','1','1'),(2,'2015-07-13 13:05:07','2015-07-13 13:05:07',3,'2015-07-13',9,1,'area','rec','che');
/*!40000 ALTER TABLE `returns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'MacMac','09061774642','Bustos, Bulacan','2015-06-10 12:40:14','2015-06-27 07:15:49'),(2,'Luckystar Product','','Malabon City','2015-06-10 14:35:23','2015-06-27 07:16:09'),(3,'Rodisco Products','','Pandi, Bulacan','2015-06-11 06:24:39','2015-06-27 07:16:22'),(5,'Lai Hong Marketing','','Malabon City','2015-06-11 07:14:54','2015-06-27 07:16:38'),(6,'Khong Guan Biscuits','','Binan, Laguna','2015-06-13 06:14:27','2015-06-27 07:16:53'),(8,'Hershel','','','2015-06-27 07:15:03','2015-06-27 07:15:03'),(9,'Kaypees','','Bustos, Bulacan','2015-06-27 07:15:20','2015-06-27 07:17:47');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Adrian Matos','matos.adrianpaul@gmail.com','$2y$10$R4cUbxtfoz18F7cRW86S3uU0dSGIxmqi7d2rPuncvlwngRF1ZKNnG','K86iiHpwyh8OKHPHXKC7y662TNXw4DITTbeBOYoCR3JhtjRUHcPh08Aib0tx','2015-06-13 06:55:09','2015-06-13 06:55:15'),(2,'Adrian Matos','specter1649@gmail.com','$2y$10$AX99RIGCoR3wvIfDZSziN./0T4czGm/DH5d707gPVAbkfimPomXPO','V1um5SC1Z54dsc1ar0z51jaEzdeTrwHOYCN0TXeZDHJ8TlWqoq2W65oCz92N','2015-06-26 05:54:39','2015-06-26 05:54:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-13 21:19:08
