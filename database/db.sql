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
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boxes`
--

LOCK TABLES `boxes` WRITE;
/*!40000 ALTER TABLE `boxes` DISABLE KEYS */;
INSERT INTO `boxes` VALUES (46,'40 x 24',40,'2015-06-16 07:06:42','2015-06-16 07:06:42',NULL,100.00,200.00,200.00),(47,'30 x 24',30,'2015-06-16 07:35:14','2015-06-16 08:14:10',65,0.00,0.01,0.00),(48,'30 x 24',30,'2015-06-16 07:35:31','2015-06-16 07:35:31',66,0.00,0.00,0.00),(49,'24 x 24',24,'2015-06-16 07:36:03','2015-06-16 10:34:18',67,100.00,120.00,125.00),(50,'24 x 24',30,'2015-06-16 07:36:17','2015-06-16 08:14:19',68,0.01,0.00,0.00),(51,'24 x 24',30,'2015-06-16 07:36:43','2015-06-16 07:36:43',69,0.00,0.00,0.00),(52,'8 x 10',30,'2015-06-16 07:37:02','2015-06-16 07:37:02',70,0.00,0.00,0.00),(53,'15 x 10',15,'2015-06-16 07:38:01','2015-06-16 07:38:01',71,0.00,0.00,0.00),(54,'10 x 30',10,'2015-06-16 07:52:20','2015-06-16 10:35:03',67,1200.00,900.00,300.00),(55,'',0,'2015-06-18 15:54:29','2015-06-18 15:54:29',72,0.00,0.00,0.00),(56,'12 x 20',12,'2015-06-18 16:24:06','2015-06-18 16:24:06',82,0.00,0.00,0.00),(57,'12 x 20',12,'2015-06-18 16:24:33','2015-06-18 16:24:33',83,0.00,0.00,0.00),(58,'10 x 24',10,'2015-06-18 16:25:02','2015-06-18 16:25:02',84,0.00,0.00,0.00),(59,'10 x 30',10,'2015-06-18 16:25:26','2015-06-18 16:25:26',85,0.00,0.00,0.00),(60,'10 x 20',10,'2015-06-18 16:25:41','2015-06-18 16:25:41',86,0.00,0.00,0.00),(61,'10 x 30',10,'2015-06-18 16:26:26','2015-06-18 16:26:26',87,0.00,0.00,0.00),(62,'20 x 30',20,'2015-06-18 16:26:26','2015-06-18 16:26:26',87,0.00,0.00,0.00),(63,'20 x 24',20,'2015-06-18 16:29:21','2015-06-18 16:29:21',88,0.00,0.00,0.00),(64,'20 x 24',20,'2015-06-18 16:29:40','2015-06-18 16:29:40',89,0.00,0.00,0.00),(65,'20 x 24',20,'2015-06-18 16:29:56','2015-06-18 16:29:56',90,0.00,0.00,0.00),(66,'20 x 24',20,'2015-06-18 16:30:05','2015-06-18 16:30:05',91,0.00,0.00,0.00),(67,'10 x 30',10,'2015-06-18 16:30:23','2015-06-18 16:30:23',92,0.00,0.00,0.00),(68,'10 x 30',10,'2015-06-18 16:30:44','2015-06-18 16:30:44',93,0.00,0.00,0.00),(69,'10 x 30',10,'2015-06-18 16:35:45','2015-06-18 16:35:45',94,0.00,0.00,0.00),(70,'10 x 30',10,'2015-06-18 16:38:30','2015-06-18 16:38:30',95,0.00,0.00,0.00),(71,'20 x 45',20,'2015-06-18 16:39:01','2015-06-18 16:39:01',96,0.00,0.00,0.00),(72,'20 x 30',20,'2015-06-18 16:39:38','2015-06-18 16:39:38',97,0.00,0.00,0.00),(73,'20 x 50',20,'2015-06-18 16:40:04','2015-06-18 16:40:04',98,0.00,0.00,0.00),(74,'20 x 50',20,'2015-06-18 16:40:08','2015-06-18 16:40:08',99,0.00,0.00,0.00),(75,'20 x 50',20,'2015-06-18 16:40:21','2015-06-18 16:40:21',100,0.00,0.00,0.00),(76,'20 x 50',20,'2015-06-18 16:40:25','2015-06-18 16:40:25',101,0.00,0.00,0.00),(77,'20 x 20',20,'2015-06-18 16:40:50','2015-06-18 16:40:50',102,0.00,0.00,0.00),(78,'20 x 20',20,'2015-06-18 16:41:02','2015-06-18 16:41:02',103,0.00,0.00,0.00),(79,'40 x 24',40,'2015-06-18 16:43:36','2015-06-18 16:43:36',104,0.00,0.00,0.00),(80,'40 x 24',40,'2015-06-18 16:43:46','2015-06-18 16:43:46',105,0.00,0.00,0.00),(81,'40 x 12',40,'2015-06-18 16:43:58','2015-06-18 16:43:58',106,0.00,0.00,0.00),(82,'40 x 24',40,'2015-06-18 16:44:11','2015-06-18 16:44:11',107,0.00,0.00,0.00),(83,'12 x 550',12,'2015-06-18 16:44:36','2015-06-18 16:44:36',108,0.00,0.00,0.00),(84,'50 x 20',50,'2015-06-18 16:44:57','2015-06-18 16:44:57',109,0.00,0.00,0.00),(85,'40 x 24',40,'2015-06-18 16:45:14','2015-06-18 16:45:14',110,0.00,0.00,0.00),(86,'24 x 30',24,'2015-06-18 16:45:35','2015-06-18 16:45:35',111,0.00,0.00,0.00),(87,'40 x 12',40,'2015-06-18 16:45:48','2015-06-18 16:46:01',112,0.00,0.00,0.00),(88,'40 x 24',40,'2015-06-18 16:46:58','2015-06-18 16:46:58',113,0.00,0.00,0.00),(89,'30 x 24',30,'2015-06-18 16:47:22','2015-06-18 16:47:22',114,0.00,0.00,0.00),(90,'50 x 20',50,'2015-06-18 16:47:38','2015-06-19 00:46:04',115,0.00,0.00,0.00),(91,'40 x 24',40,'2015-06-18 16:47:54','2015-06-19 00:46:40',116,0.00,0.00,0.00),(92,'40 x 24',40,'2015-06-18 16:48:05','2015-06-19 00:47:57',117,0.00,0.00,0.00),(93,'40 x 24',40,'2015-06-18 16:48:21','2015-06-18 16:50:18',118,0.00,0.00,0.00),(94,'40 x 24',40,'2015-06-18 16:48:29','2015-06-18 16:49:56',119,0.00,0.00,0.00),(95,'40 x 24',40,'2015-06-18 16:48:38','2015-06-18 16:49:46',120,0.00,0.00,0.00),(96,'40 x 24',40,'2015-06-18 16:48:54','2015-06-18 16:49:36',121,0.00,0.00,0.00),(97,'40 x 12',40,'2015-06-18 16:49:19','2015-06-18 16:49:19',122,0.00,0.00,0.00),(98,'40 x 24',40,'2015-06-19 00:51:26','2015-06-19 00:51:26',123,0.00,0.00,0.00),(99,'40 x 24',40,'2015-06-19 00:51:40','2015-06-19 00:51:40',124,0.00,0.00,0.00),(100,'40 x 24',40,'2015-06-19 00:52:06','2015-06-19 00:52:06',125,0.00,0.00,0.00),(101,'40 x 24',40,'2015-06-19 00:52:16','2015-06-19 00:52:16',126,0.00,0.00,0.00),(102,'40 x 24',40,'2015-06-19 00:52:29','2015-06-19 00:52:29',127,0.00,0.00,0.00),(103,'40 x 24',40,'2015-06-19 00:53:00','2015-06-19 00:53:00',128,0.00,0.00,0.00),(104,'40 x 60',40,'2015-06-19 00:53:29','2015-06-19 00:53:29',129,0.00,0.00,0.00),(105,'30 x 100',30,'2015-06-19 00:53:52','2015-06-19 00:53:52',130,0.00,0.00,0.00),(106,'15 x 200',15,'2015-06-19 00:54:26','2015-06-19 00:54:26',131,0.00,0.00,0.00),(107,'40 x 24',40,'2015-06-19 00:54:51','2015-06-19 00:54:51',132,0.00,0.00,0.00),(108,'40 x 24',40,'2015-06-19 00:55:07','2015-06-19 00:55:07',133,0.00,0.00,0.00),(109,'24 x 20',24,'2015-06-19 00:55:50','2015-06-19 00:55:50',134,0.00,0.00,0.00),(110,'40 x 24',40,'2015-06-19 00:56:14','2015-06-19 00:56:14',135,0.00,0.00,0.00),(111,'40 x 24',40,'2015-06-19 00:56:29','2015-06-19 00:56:29',136,0.00,0.00,0.00);
/*!40000 ALTER TABLE `boxes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_stocks`
--

LOCK TABLES `in_stocks` WRITE;
/*!40000 ALTER TABLE `in_stocks` DISABLE KEYS */;
INSERT INTO `in_stocks` VALUES (1,'2015-06-16 13:01:04','2015-06-16 13:01:04',5,67,49,1,100.00,'2015-06-16'),(2,'2015-06-16 13:01:36','2015-06-16 13:01:36',5,69,51,90,0.00,'2015-06-04'),(3,'2015-06-16 13:02:15','2015-06-16 13:02:15',5,69,51,89,0.00,'2015-06-25'),(4,'2015-06-16 14:59:10','2015-06-16 14:59:10',5,65,47,10,0.00,'2015-06-01'),(5,'2015-06-16 15:01:02','2015-06-16 15:01:02',5,65,47,2,0.00,'2015-06-12'),(6,'2015-06-18 13:01:45','2015-06-18 13:01:45',5,71,53,10,0.00,'2015-06-02');
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
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_06_09_173758_create_suppliers_table',1),('2015_06_09_174025_create_products_table',1),('2015_06_09_174653_add_foreign_key',1),('2015_06_09_175222_create_table_employees',1),('2015_06_09_181419_create_designations_table',1),('2015_06_10_142914_add_designation_id_on_employees',1),('2015_06_10_174508_create_product_categories_table',2),('2015_06_10_175343_add_product_category_id',3),('2015_06_11_002216_create_boxes_table',4),('2015_06_11_002703_add_product_id_on_boxes',5),('2015_06_13_233551_create_stock_ins_table',6),('2015_06_14_150040_drop_columns_prices',7),('2015_06_14_173143_add_prices_to_box',8),('2015_06_14_203818_create_in_stocks_table',9),('2015_06_15_122127_create_delivered_products_table',9),('2015_06_16_135156_update_boxes_table',10),('2015_06_18_235137_add_unique_index_to_product',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (65,'Jelly Cup','2015-06-16 07:35:14','2015-06-16 07:35:14',5,2),(66,'Mixed Pudding','2015-06-16 07:35:31','2015-06-16 07:35:31',5,2),(67,'Coco Jelly','2015-06-16 07:36:03','2015-06-16 07:36:03',5,2),(68,'Jelly Stick','2015-06-16 07:36:17','2015-06-16 07:36:17',5,2),(69,'Pudding Stick','2015-06-16 07:36:43','2015-06-16 07:36:43',5,2),(70,'Cola Ice Candy (Small)','2015-06-16 07:37:02','2015-06-16 07:37:02',5,2),(71,'Cola Ice Candy (Big)','2015-06-16 07:38:01','2015-06-16 07:38:01',5,2),(72,'aaa','2015-06-18 15:54:28','2015-06-18 15:54:28',1,3),(82,'Iced Gem','2015-06-18 16:24:06','2015-06-18 16:24:06',6,3),(83,'Choco Iced Gem','2015-06-18 16:24:33','2015-06-18 16:24:33',6,3),(84,'Star Iced Gem','2015-06-18 16:25:02','2015-06-18 16:25:02',6,3),(85,'Butter Sticks','2015-06-18 16:25:26','2015-06-18 16:25:26',6,3),(86,'Paborito','2015-06-18 16:25:41','2015-06-18 16:25:41',6,3),(87,'Cocoa Puff','2015-06-18 16:26:26','2015-06-18 16:26:26',6,3),(88,'Butter Coconut','2015-06-18 16:29:21','2015-06-18 16:36:47',6,3),(89,'Wafer Banana','2015-06-18 16:29:40','2015-06-18 16:37:44',6,3),(90,'Wafer Macapuno','2015-06-18 16:29:56','2015-06-18 16:37:26',6,3),(91,'Wafer Chocolate','2015-06-18 16:30:05','2015-06-18 16:36:59',6,3),(92,'Wafer Vanilla','2015-06-18 16:30:23','2015-06-18 16:36:33',6,3),(93,'Twinee Choco Milk','2015-06-18 16:30:43','2015-06-18 16:36:18',6,3),(94,'Twinne Butter Milk','2015-06-18 16:35:45','2015-06-18 16:35:45',6,3),(95,'Miniboy','2015-06-18 16:38:30','2015-06-18 16:38:30',6,3),(96,'Cracker Marie','2015-06-18 16:39:01','2015-06-18 16:39:01',6,3),(97,'Gold Label Chocolate Coated','2015-06-18 16:39:38','2015-06-18 16:39:38',6,3),(98,'Candy Langka','2015-06-18 16:40:04','2015-06-18 16:40:04',6,3),(99,'Candy Ube','2015-06-18 16:40:08','2015-06-18 16:40:08',6,3),(100,'Candy Macapuno','2015-06-18 16:40:21','2015-06-18 16:40:21',6,3),(101,'Candy Banana','2015-06-18 16:40:25','2015-06-18 16:40:25',6,3),(102,'Nutti Milk Chocolate','2015-06-18 16:40:50','2015-06-18 16:40:50',6,3),(103,'Nutti Milk Polvoron','2015-06-18 16:41:02','2015-06-18 16:41:02',6,3),(104,'25 K-Star','2015-06-18 16:43:36','2015-06-18 16:43:36',2,2),(105,'ABC DOT','2015-06-18 16:43:46','2015-06-18 16:43:46',2,2),(106,'Acrobat Duck','2015-06-18 16:43:58','2015-06-18 16:43:58',2,2),(107,'Airplane Candy','2015-06-18 16:44:10','2015-06-18 16:44:10',2,2),(108,'Apple Candy Jar','2015-06-18 16:44:36','2015-06-18 16:44:36',2,2),(109,'Aroma Heart Pent.','2015-06-18 16:44:57','2015-06-18 16:44:57',2,2),(110,'Arrow Gun','2015-06-18 16:45:14','2015-06-18 16:45:14',2,2),(111,'Balancing Eagle','2015-06-18 16:45:35','2015-06-18 16:45:35',2,2),(112,'Big Pana','2015-06-18 16:45:48','2015-06-18 16:45:48',2,2),(113,'Candy Crunch','2015-06-18 16:46:57','2015-06-18 16:46:57',2,3),(114,'Candy Jelly','2015-06-18 16:47:22','2015-06-18 16:47:22',2,3),(115,'Car\'s Sharpener','2015-06-18 16:47:38','2015-06-18 16:47:38',2,3),(116,'Choco Butteryfly','2015-06-18 16:47:53','2015-06-18 16:47:53',2,3),(117,'Choco Dots','2015-06-18 16:48:05','2015-06-18 16:48:05',2,3),(118,'Choco Peanut','2015-06-18 16:48:21','2015-06-18 16:48:21',2,3),(119,'Disney Watch','2015-06-18 16:48:29','2015-06-18 16:48:29',2,3),(120,'Dulce','2015-06-18 16:48:38','2015-06-18 16:48:38',2,3),(121,'Elisi','2015-06-18 16:48:54','2015-06-18 16:48:54',2,3),(122,'Fishing Game','2015-06-18 16:49:19','2015-06-18 16:49:19',2,3),(123,'Flying Saucer','2015-06-19 00:51:26','2015-06-19 00:51:26',6,3),(124,'Freaky Animals','2015-06-19 00:51:40','2015-06-19 00:51:40',6,3),(125,'Fruit Bottle','2015-06-19 00:52:06','2015-06-19 00:52:06',6,3),(126,'Fruit Candy','2015-06-19 00:52:16','2015-06-19 00:52:16',6,3),(127,'Fruit Gummy','2015-06-19 00:52:29','2015-06-19 00:52:29',6,3),(128,'Fruit Beans','2015-06-19 00:53:00','2015-06-19 00:53:00',6,3),(129,'Gold Coin Beetle','2015-06-19 00:53:29','2015-06-19 00:53:29',6,3),(130,'Gold Coin Dodo','2015-06-19 00:53:51','2015-06-19 00:53:51',6,3),(131,'Gold Coin Gas Tank','2015-06-19 00:54:26','2015-06-19 00:54:26',6,3),(132,'Glow in the Dark Dino','2015-06-19 00:54:51','2015-06-19 00:54:51',6,3),(133,'Heart Chocolate','2015-06-19 00:55:07','2015-06-19 00:55:07',6,3),(134,'Heart Choco','2015-06-19 00:55:50','2015-06-19 00:55:50',6,3),(135,'Ice Cream Candy','2015-06-19 00:56:14','2015-06-19 00:56:14',6,3),(136,'Jolly Fruit Pop','2015-06-19 00:56:29','2015-06-19 00:56:29',6,3);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Adong','09061774642','Pili, Camarines Sur','2015-06-10 12:40:14','2015-06-10 12:40:14'),(2,'Luckystar Product','','','2015-06-10 14:35:23','2015-06-10 14:35:23'),(3,'Rodisco Products','','','2015-06-11 06:24:39','2015-06-13 06:18:03'),(5,'Lai Hong Marketing','','','2015-06-11 07:14:54','2015-06-13 06:14:59'),(6,'Khong Guan Biscuits','','','2015-06-13 06:14:27','2015-06-13 06:14:27'),(7,'Heaven','','','2015-06-13 06:19:12','2015-06-13 06:19:12');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Adrian Matos','matos.adrianpaul@gmail.com','$2y$10$R4cUbxtfoz18F7cRW86S3uU0dSGIxmqi7d2rPuncvlwngRF1ZKNnG','K86iiHpwyh8OKHPHXKC7y662TNXw4DITTbeBOYoCR3JhtjRUHcPh08Aib0tx','2015-06-13 06:55:09','2015-06-13 06:55:15');
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

-- Dump completed on 2015-06-19  9:11:18
