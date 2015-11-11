-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 27.254.36.33    Database: piano_school
-- ------------------------------------------------------
-- Server version	5.5.40-MariaDB-log

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
INSERT INTO `migrations` VALUES ('2015_08_03_165831_entrust_setup_tables',1);
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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
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
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (18,5),(19,5),(19,6),(19,7),(20,5),(21,5),(22,5),(23,5),(23,6),(24,5),(25,5),(26,5),(27,5),(27,6),(27,7),(28,5),(29,5),(30,5),(30,6),(31,5),(32,5),(33,5),(34,5);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (18,'create-teacher','Create new Teachers','Allow a user to create a new teacher','2015-08-25 08:57:34','2015-08-25 08:57:34'),(19,'view-teacher','View Teachers','Allow a user to view existing teachers','2015-08-25 08:57:34','2015-08-25 08:57:34'),(20,'edit-teacher','Edit Teachers','Allow a user to edit existing teachers','2015-08-25 08:57:34','2015-08-25 08:57:34'),(21,'delete-teacher','Delete Teachers','Allow a user to delete existing teachers','2015-08-25 08:57:34','2015-08-25 08:57:34'),(22,'create-student',NULL,NULL,'2015-08-25 08:57:34','2015-08-25 08:57:34'),(23,'view-student',NULL,NULL,'2015-08-25 08:57:34','2015-08-25 08:57:34'),(24,'edit-student',NULL,NULL,'2015-08-25 08:57:34','2015-08-25 08:57:34'),(25,'delete-student',NULL,NULL,'2015-08-25 08:57:34','2015-08-25 08:57:34'),(26,'create-schedule',NULL,NULL,'2015-08-25 08:57:34','2015-08-25 08:57:34'),(27,'view-schedule',NULL,NULL,'2015-08-25 08:57:34','2015-08-25 08:57:34'),(28,'edit-schedule',NULL,NULL,'2015-08-25 08:57:34','2015-08-25 08:57:34'),(29,'delete-schedule',NULL,NULL,'2015-08-25 08:57:34','2015-08-25 08:57:34'),(30,'confirm-taught-class',NULL,NULL,'2015-08-25 08:57:34','2015-08-25 08:57:34'),(31,'create-payment',NULL,NULL,'2015-08-25 08:57:35','2015-08-25 08:57:35'),(32,'view-payment',NULL,NULL,'2015-08-25 08:57:35','2015-08-25 08:57:35'),(33,'adjust-payment',NULL,NULL,'2015-08-25 08:57:35','2015-08-25 08:57:35'),(34,'view-calendar',NULL,NULL,'2015-08-25 08:57:35','2015-08-25 08:57:35');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (41,6),(42,6),(45,7),(48,6),(51,7),(52,5),(60,7),(61,6),(62,6),(63,6),(64,6),(65,6),(68,6),(69,6),(70,6),(71,6),(72,6),(73,6),(74,6),(75,6),(76,6),(78,6),(79,7),(82,6),(84,6),(86,7),(89,7),(91,7),(94,7),(95,7),(97,7),(99,7),(103,7),(104,7),(105,7),(106,7),(108,7),(109,7),(110,7),(111,7),(112,7),(113,7),(114,7),(115,7),(116,7),(117,7),(118,7),(120,7),(121,7),(122,7),(123,7),(124,7),(125,7),(126,7),(127,7),(128,7),(130,7),(131,7),(132,7),(133,7),(134,7);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (5,'admin','Administrator','System administrator: Admin is allowed to manage everything in the system.','2015-08-25 08:57:34','2015-08-25 08:57:34'),(6,'teacher','Teacher','Teacher is allowed to view one\'s own class, schedule, and confirm that a class has been tought.','2015-08-25 08:57:34','2015-08-25 08:57:34'),(7,'student','Student','Student is allowed to view one\'s own class, schedule, and payment history','2015-08-25 08:57:34','2015-08-25 08:57:34');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL,
  `student_phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remaining_time` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (3,NULL,'0983345678','0987998000',0,NULL),(5,NULL,'0943344478','0876543456',1800,NULL),(6,NULL,'0983356678','0987998000',2580,'2015-09-07 09:44:10'),(8,NULL,'0876787765','0811234451',0,NULL),(9,NULL,'0983345678','0876543456',0,NULL),(14,NULL,'0983356678','0987998000',0,NULL),(15,NULL,'0984398740','0986654321',0,'2015-09-11 04:54:58'),(16,NULL,'0849803719','0847329802',0,NULL),(17,NULL,'0981234567','0876543213',0,NULL),(18,NULL,'0985436789','0987563687',0,NULL),(19,NULL,'0983457682','0987453672',1200,NULL),(20,NULL,'0987654321','0907685432',0,NULL),(21,NULL,'0866666666','0855555555',0,NULL),(22,NULL,'0945563322','0984354444',1800,NULL),(23,NULL,'0901234567','0987654321',0,NULL),(24,NULL,'0923334542','0983341145',600,NULL),(25,NULL,'0825567898','0963579764',0,NULL),(26,NULL,'0812345678','0812345678',0,NULL),(27,NULL,'0812345678','0812345678',0,NULL),(28,NULL,'0812345678','0812345678',0,NULL),(29,NULL,'0812345678','0832445332',0,NULL),(30,NULL,'0834424523','0932247654',0,NULL),(31,NULL,'0832341521','0982348431',0,NULL),(32,NULL,'0834153623','0983415236',0,NULL),(33,NULL,'0893456236','0893462362',0,NULL),(34,NULL,'0893452647','0983451564',0,NULL),(35,NULL,'0893453256','0835234613',0,NULL),(36,NULL,'0833452159','0983425125',0,NULL),(37,NULL,'0892234215','0983411455',0,NULL),(38,NULL,'0933621563','0983415462',0,NULL),(39,NULL,'0893415642','0983416215',0,NULL),(40,NULL,'0823432121','0845437400',0,NULL),(41,NULL,'0998980000','0879908778',0,NULL),(42,NULL,'0876678765','0987765674',0,NULL),(43,NULL,'0987767657','9876656789',0,NULL),(44,NULL,'0812566234','0814335647',1200,NULL),(45,NULL,'0935362346','0934256673',0,NULL),(46,NULL,'0893123562','0983156427',0,NULL),(47,NULL,'0983421536','0983423562',0,NULL),(48,NULL,'0833532662','0982346234',0,NULL),(49,NULL,'0893412356','0983456123',0,NULL),(50,NULL,'0912677837','0993213569',1200,NULL),(51,NULL,'0989343516','0983423681',0,NULL),(52,NULL,'0983516315','0912245123',1200,NULL),(53,NULL,'0983213656','0983421255',0,NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students_payments`
--

DROP TABLE IF EXISTS `students_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topup_time` int(11) NOT NULL,
  `students_id` int(10) unsigned NOT NULL,
  `teachers_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `adjustment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_payments_students1_idx` (`students_id`),
  KEY `fk_student_payments_teachers1_idx` (`teachers_id`),
  KEY `adjustment` (`adjustment`),
  CONSTRAINT `fk_payments_adjustment` FOREIGN KEY (`adjustment`) REFERENCES `students_payments` (`id`),
  CONSTRAINT `fk_student_payments_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_payments_teachers1` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students_payments`
--

LOCK TABLES `students_payments` WRITE;
/*!40000 ALTER TABLE `students_payments` DISABLE KEYS */;
INSERT INTO `students_payments` VALUES (10,1200,5,20,'2015-09-01 04:39:59','2015-09-01 05:39:51',NULL),(11,600,6,21,'2015-09-01 04:39:37','2015-09-01 05:39:28',NULL),(13,900,6,21,'2015-09-01 05:52:00','2015-09-01 05:52:00',NULL),(14,1200,19,28,'2015-09-14 06:11:35','2015-09-14 06:11:35',NULL),(15,600,24,20,'2015-09-15 10:02:15','2015-09-15 10:02:15',NULL),(16,1200,44,26,'2015-09-15 11:25:02','2015-09-15 11:25:02',NULL),(17,1200,50,34,'2015-09-15 11:25:19','2015-09-15 11:25:19',NULL),(18,1200,52,29,'2015-09-15 11:26:01','2015-09-15 11:26:01',NULL),(19,1800,22,22,'2015-09-15 12:04:28','2015-09-15 12:04:28',NULL);
/*!40000 ALTER TABLE `students_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students_teachers`
--

DROP TABLE IF EXISTS `students_teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `students_id` int(10) unsigned NOT NULL,
  `teachers_id` int(10) unsigned NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Finished','Reserved','Canceled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Reserved',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `fk_students_has_teachers_teachers1_idx` (`teachers_id`),
  KEY `fk_students_has_teachers_students1_idx` (`students_id`),
  CONSTRAINT `fk_students_has_teachers_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_has_teachers_teachers1` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students_teachers`
--

LOCK TABLES `students_teachers` WRITE;
/*!40000 ALTER TABLE `students_teachers` DISABLE KEYS */;
INSERT INTO `students_teachers` VALUES (33,5,20,'2015-09-04 13:00:00','2015-09-04 15:00:00','Building 2','Reserved','2015-09-10 06:17:50','2015-09-01 11:32:15','0000-00-00 00:00:00'),(34,6,21,'2015-09-05 17:00:00','2015-09-05 19:00:00','Building 2','Reserved','2015-09-10 06:17:54','2015-09-01 11:30:37','0000-00-00 00:00:00'),(35,5,20,'2015-09-04 12:00:00','2015-09-04 13:30:00','Building 1','Reserved','2015-09-14 08:59:40','2015-09-14 09:59:39','0000-00-00 00:00:00'),(36,5,20,'2015-09-07 13:30:00','2015-09-07 16:00:00','Building 3','Reserved','2015-09-10 06:18:02','2015-09-03 05:13:01','0000-00-00 00:00:00'),(37,6,21,'2015-09-09 10:00:00','2015-09-09 13:00:00','Building 3','Reserved','2015-09-10 06:18:06','2015-09-03 04:32:01','0000-00-00 00:00:00'),(39,8,20,'2015-09-10 16:00:00','2015-09-10 18:30:00','Room 322','Canceled','2015-09-11 08:23:13','2015-09-11 09:23:11','0000-00-00 00:00:00'),(41,5,20,'2015-09-14 00:00:00','2015-09-14 19:00:00','Building 1','Reserved','2015-09-11 11:10:02','2015-09-11 11:10:02','0000-00-00 00:00:00'),(42,5,20,'2015-09-11 21:00:00','2015-09-11 22:00:00','Building 1','Finished','2015-09-12 07:33:55','2015-09-12 08:33:26','0000-00-00 00:00:00'),(43,5,20,'2015-09-12 00:00:00','2015-09-12 00:00:00','','Reserved','2015-09-12 08:36:06','2015-09-12 08:36:06','0000-00-00 00:00:00'),(44,25,41,'2015-09-15 11:00:00','2015-09-15 13:00:00','Building 1','Finished','2015-09-15 09:53:01','2015-09-15 10:52:27','0000-00-00 00:00:00'),(45,16,29,'2015-09-14 00:00:00','2015-09-14 13:00:00','Building 3','Reserved','2015-09-14 06:02:15','2015-09-14 06:02:15','0000-00-00 00:00:00'),(46,31,23,'2015-09-14 14:00:00','2015-09-14 16:00:00','Building 3','Finished','2015-09-14 07:08:03','2015-09-14 08:08:03','0000-00-00 00:00:00'),(47,22,26,'2015-09-14 14:30:00','2015-09-14 16:30:00','Building 2','Finished','2015-09-14 07:21:55','2015-09-14 08:21:54','0000-00-00 00:00:00'),(48,51,21,'2015-09-14 17:00:00','2015-09-14 20:00:00','Building 3','Finished','2015-10-16 03:45:34','2015-10-16 04:45:23','0000-00-00 00:00:00'),(49,43,31,'2015-09-14 16:00:00','2015-09-14 18:00:00','Building 2','Finished','2015-09-16 05:28:07','2015-09-16 06:27:32','0000-00-00 00:00:00'),(50,9,20,'2015-09-14 16:00:00','2015-09-14 19:00:00','Building 2','Canceled','2015-09-16 05:28:25','2015-09-16 06:27:50','0000-00-00 00:00:00'),(51,18,20,'2015-09-14 18:00:00','2015-09-14 19:00:00','Building 1','Reserved','2015-09-14 09:48:56','2015-09-14 09:48:56','0000-00-00 00:00:00'),(52,22,20,'2015-09-14 16:00:00','2015-09-14 18:00:00','Building 3','Finished','2015-09-14 08:57:28','2015-09-14 09:57:27','0000-00-00 00:00:00'),(53,8,20,'2015-09-16 00:00:00','2015-09-16 00:00:00','Building1','Reserved','2015-09-14 10:04:40','2015-09-14 10:04:40','0000-00-00 00:00:00'),(54,19,20,'2015-09-17 00:00:00','2015-09-17 18:00:00','Building1','Reserved','2015-09-14 10:10:09','2015-09-14 10:10:09','0000-00-00 00:00:00'),(55,5,20,'2015-09-17 00:00:00','2015-09-17 18:00:00','Building1','Reserved','2015-09-14 10:11:26','2015-09-14 10:11:26','0000-00-00 00:00:00'),(56,24,20,'2015-09-15 10:00:00','2015-09-15 12:00:00','Building 1','Finished','2015-09-15 09:48:26','2015-09-15 10:47:52','0000-00-00 00:00:00'),(57,9,20,'2015-09-19 12:15:00','2015-09-19 14:15:00','room 1','Reserved','2015-09-16 06:19:07','2015-09-16 06:19:07','0000-00-00 00:00:00'),(64,24,21,'2015-03-09 16:30:00','2015-03-09 16:30:00','Building 2','Reserved','2015-10-19 10:34:39','2015-10-19 10:34:39','0000-00-00 00:00:00'),(65,19,21,'2015-10-09 17:15:00','2015-10-09 20:15:00','Building 2','Reserved','2015-10-19 11:24:50','2015-10-19 11:24:50','0000-00-00 00:00:00'),(66,37,20,'1970-01-01 17:15:00','1970-01-01 17:15:00','Building 1','Reserved','2015-10-19 11:28:33','2015-10-19 11:28:33','0000-00-00 00:00:00'),(67,30,20,'2015-10-21 12:15:00','2015-10-21 13:15:00','Building 1','Reserved','2015-10-19 10:58:58','2015-10-19 11:35:11','0000-00-00 00:00:00'),(68,22,20,'2015-10-21 12:00:00','2015-10-21 13:00:00','Building 2','Reserved','2015-10-19 10:59:40','2015-10-19 11:37:40','0000-00-00 00:00:00'),(69,14,23,'2015-10-20 08:00:00','2015-10-20 11:00:00','Building 1','Reserved','2015-10-20 11:34:05','2015-10-20 12:33:49','0000-00-00 00:00:00'),(70,26,29,'2015-10-19 15:00:00','2015-10-19 16:00:00','Building 2','Reserved','2015-10-19 17:38:54','2015-10-19 17:38:54','0000-00-00 00:00:00'),(71,9,20,'2015-10-19 00:00:00','2015-10-19 01:45:00','Building 2','Reserved','2015-10-19 17:55:42','2015-10-19 17:55:42','0000-00-00 00:00:00'),(72,5,21,'2015-11-19 00:00:00','2015-11-19 01:30:00','Building 2','Reserved','2015-10-19 18:42:21','2015-10-19 18:42:21','0000-00-00 00:00:00'),(73,5,21,'2015-10-20 00:00:00','2015-10-20 01:30:00','Building 2','Reserved','2015-10-19 18:43:08','2015-10-19 18:43:08','0000-00-00 00:00:00'),(74,22,20,'2015-10-22 00:00:00','2015-10-22 03:30:00','Building 2','Reserved','2015-10-19 18:45:01','2015-10-19 18:45:01','0000-00-00 00:00:00'),(78,16,23,'2015-10-20 09:00:00','2015-10-20 11:00:00','Building 3','Reserved','2015-10-20 11:36:25','2015-10-20 12:36:08','0000-00-00 00:00:00'),(86,40,20,'2015-10-21 15:00:00','2015-10-21 16:00:00','Building 3','Reserved','2015-10-20 10:04:43','2015-10-20 11:04:27','0000-00-00 00:00:00'),(87,45,20,'2015-09-09 06:00:00','2015-09-09 08:00:00','Building 2','Reserved','2015-10-19 19:31:54','2015-10-19 19:31:54','0000-00-00 00:00:00'),(88,49,20,'2015-09-09 08:00:00','2015-09-09 09:00:00','Building 3','Reserved','2015-10-19 19:34:42','2015-10-19 19:34:42','0000-00-00 00:00:00'),(89,8,20,'2015-09-09 03:00:00','2015-09-09 04:00:00','Building 1','Reserved','2015-10-19 19:40:30','2015-10-19 19:40:30','0000-00-00 00:00:00'),(90,17,20,'2015-09-09 08:00:00','2015-09-09 09:00:00','Building 1','Reserved','2015-10-19 19:43:52','2015-10-19 19:43:52','0000-00-00 00:00:00'),(91,19,20,'2015-09-11 11:00:00','2015-09-11 12:00:00','Building 1','Reserved','2015-10-19 19:44:58','2015-10-19 19:44:58','0000-00-00 00:00:00'),(93,51,20,'2015-09-12 10:00:00','2015-09-12 12:00:00','Building 2','Reserved','2015-10-19 19:48:30','2015-10-19 19:48:30','0000-00-00 00:00:00'),(94,8,20,'2015-09-02 10:00:00','2015-09-02 11:00:00','Building 1','Reserved','2015-10-26 08:37:06','2015-10-26 09:37:05','0000-00-00 00:00:00'),(95,18,20,'2015-09-03 12:00:00','2015-09-03 13:00:00','Building 1','Reserved','2015-10-20 03:57:25','2015-10-20 03:57:25','0000-00-00 00:00:00'),(96,9,20,'2015-09-05 00:00:00','2015-09-05 13:00:00','Building 1','Reserved','2015-10-20 05:13:14','2015-10-20 05:13:14','0000-00-00 00:00:00'),(97,5,20,'2015-09-06 12:00:00','2015-09-06 13:00:00','Building 1','Reserved','2015-10-20 05:14:18','2015-10-20 05:14:18','0000-00-00 00:00:00'),(98,53,20,'2015-09-08 13:00:00','2015-09-08 15:00:00','Building 1','Reserved','2015-10-20 05:15:03','2015-10-20 05:15:03','0000-00-00 00:00:00'),(99,19,22,'2015-09-02 00:00:00','2015-09-02 16:00:00','Building 1','Reserved','2015-10-20 09:06:06','2015-10-20 09:06:06','0000-00-00 00:00:00'),(100,8,22,'2015-09-03 15:00:00','2015-09-03 16:00:00','Building 2','Reserved','2015-10-20 09:07:11','2015-10-20 09:07:11','0000-00-00 00:00:00'),(101,9,22,'2015-09-03 10:00:00','2015-09-03 11:00:00','Building 2','Reserved','2015-10-20 09:08:24','2015-10-20 09:08:24','0000-00-00 00:00:00'),(102,20,22,'2015-09-04 00:00:00','2015-09-04 17:00:00','Building 1','Reserved','2015-10-20 09:13:54','2015-10-20 09:13:54','0000-00-00 00:00:00'),(103,5,23,'2015-09-02 15:00:00','2015-09-02 18:00:00','Building 1','Reserved','2015-10-20 09:15:34','2015-10-20 09:15:34','0000-00-00 00:00:00'),(104,14,20,'2015-09-20 11:00:00','2015-09-20 12:00:00','Building 2','Reserved','2015-10-20 13:58:26','2015-10-20 13:58:26','0000-00-00 00:00:00'),(105,40,20,'2015-10-21 00:00:00','2015-10-21 00:00:00','cc','Reserved','2015-10-21 08:46:19','2015-10-21 08:46:19','0000-00-00 00:00:00'),(106,9,20,'2015-10-21 08:00:00','2015-10-21 10:00:00','d','Reserved','2015-10-21 08:47:10','2015-10-21 08:47:10','0000-00-00 00:00:00'),(107,24,20,'2015-10-27 10:00:00','2015-10-27 12:00:00','Building 3','Reserved','2015-10-27 12:00:30','2015-10-27 13:00:31','0000-00-00 00:00:00'),(108,5,20,'2015-10-27 10:00:00','2015-10-27 12:00:00','Building 2','Reserved','2015-10-27 12:03:29','2015-10-27 13:03:30','0000-00-00 00:00:00'),(109,9,20,'2015-10-26 00:00:00','2015-10-26 00:00:00','Building 1','Reserved','2015-10-26 11:24:22','2015-10-26 11:24:22','0000-00-00 00:00:00'),(110,5,20,'2015-10-26 00:00:00','2015-10-26 00:00:00','d','Reserved','2015-10-26 11:29:13','2015-10-26 11:29:13','0000-00-00 00:00:00'),(111,5,20,'2015-09-21 10:00:00','2015-09-21 12:00:00','Building 3','Reserved','2015-10-27 05:18:42','2015-10-27 05:18:42','0000-00-00 00:00:00'),(113,19,20,'2015-09-27 08:00:00','2015-09-27 10:00:00','Building 2','Reserved','2015-10-27 05:42:35','2015-10-27 05:42:35','0000-00-00 00:00:00'),(114,5,20,'2015-09-27 00:00:00','2015-09-27 00:00:00','Building 1','Reserved','2015-10-27 06:18:54','2015-10-27 06:18:54','0000-00-00 00:00:00'),(115,8,20,'2015-10-27 10:00:00','2015-10-27 12:00:00','Building 2','Finished','2015-10-27 11:40:44','2015-10-27 12:40:41','0000-00-00 00:00:00'),(116,16,20,'2015-10-27 10:30:00','2015-10-27 12:30:00','e','Reserved','2015-10-27 06:38:36','2015-10-27 06:38:36','0000-00-00 00:00:00'),(118,17,20,'2015-10-28 13:00:00','2015-10-28 15:00:00','Building 2','Reserved','2015-10-27 09:47:00','2015-10-27 09:47:00','0000-00-00 00:00:00'),(119,30,20,'2015-10-28 14:00:00','2015-10-28 16:00:00','Building 1','Reserved','2015-10-27 09:48:39','2015-10-27 09:48:39','0000-00-00 00:00:00'),(121,25,20,'2015-10-27 15:00:00','2015-10-27 17:00:00','Building 2','Reserved','2015-10-27 12:09:25','2015-10-27 12:09:25','0000-00-00 00:00:00'),(122,18,21,'2015-10-05 10:00:00','2015-10-05 12:00:00','Building 1','Reserved','2015-10-28 04:54:51','2015-10-28 04:54:51','0000-00-00 00:00:00'),(123,20,21,'2015-10-06 12:00:00','2015-10-06 13:00:00','','Reserved','2015-10-28 04:55:41','2015-10-28 04:55:41','0000-00-00 00:00:00'),(124,27,21,'2015-10-07 13:00:00','2015-10-07 15:00:00','Building 2','Reserved','2015-10-28 04:57:40','2015-10-28 04:57:40','0000-00-00 00:00:00'),(127,9,20,'2015-10-30 10:00:00','2015-10-30 12:00:00','Building 1','Reserved','2015-10-30 12:19:05','2015-10-30 12:19:05','0000-00-00 00:00:00'),(128,16,20,'2015-11-02 12:00:00','2015-11-02 13:00:00','Building 1','Reserved','2015-11-02 05:39:36','2015-11-02 05:39:36','0000-00-00 00:00:00'),(129,8,20,'2015-11-03 10:00:00','2015-11-03 12:00:00','Building 3','Reserved','2015-11-02 05:14:13','2015-11-02 06:14:05','0000-00-00 00:00:00'),(148,24,20,'2015-11-04 15:00:00','2015-11-04 16:00:00','Building 2','Reserved','2015-11-04 08:34:51','2015-11-04 08:34:51','0000-00-00 00:00:00'),(149,49,20,'2015-11-04 10:00:00','2015-11-04 12:00:00','Building 1','Reserved','2015-11-04 08:36:26','2015-11-04 08:36:26','0000-00-00 00:00:00'),(150,14,20,'2015-11-04 08:30:00','2015-11-04 09:00:00','Building 1','Reserved','2015-11-04 08:37:44','2015-11-04 08:37:44','0000-00-00 00:00:00'),(151,8,20,'2015-11-04 00:00:00','2015-11-04 00:00:00','Building 2','Reserved','2015-11-04 08:57:15','2015-11-04 08:57:15','0000-00-00 00:00:00'),(152,8,20,'2015-11-04 00:00:00','2015-11-04 00:00:00','Building 2','Reserved','2015-11-04 08:57:46','2015-11-04 08:57:46','0000-00-00 00:00:00'),(153,16,20,'2015-11-04 19:00:00','2015-11-04 20:00:00','Building 1','Reserved','2015-11-04 09:33:56','2015-11-04 09:33:56','0000-00-00 00:00:00'),(155,20,20,'2015-11-04 17:00:00','2015-11-04 18:00:00','Building 2','Reserved','2015-11-04 10:14:44','2015-11-04 10:14:44','0000-00-00 00:00:00'),(156,5,20,'2015-11-09 08:00:00','2015-11-09 10:00:00','B1','Reserved','2015-11-09 10:45:34','2015-11-09 10:45:34','0000-00-00 00:00:00'),(157,5,20,'2015-11-10 13:00:00','2015-11-10 15:00:00','B1','Reserved','2015-11-09 10:53:56','2015-11-09 10:53:56','0000-00-00 00:00:00'),(158,5,20,'2015-11-11 08:00:00','2015-11-11 10:00:00','B3','Reserved','2015-11-11 05:56:59','2015-11-11 05:56:59','0000-00-00 00:00:00'),(159,5,25,'2015-11-13 11:00:00','2015-11-13 12:00:00','B3','Reserved','2015-11-11 05:57:38','2015-11-11 05:57:38','0000-00-00 00:00:00'),(160,5,20,'2015-11-24 08:00:00','2015-11-24 10:00:00','B3','Reserved','2015-11-11 05:59:09','2015-11-11 05:59:09','0000-00-00 00:00:00'),(161,20,20,'2015-11-11 13:00:00','2015-11-11 15:00:00','B3','Reserved','2015-11-11 06:05:38','2015-11-11 06:05:38','0000-00-00 00:00:00'),(162,22,20,'2015-11-11 13:00:00','2015-11-11 09:00:00','B3','Reserved','2015-11-11 06:06:09','2015-11-11 06:06:09','0000-00-00 00:00:00'),(163,19,20,'2015-11-14 08:00:00','2015-11-14 10:00:00','Building 1','Reserved','2015-11-11 09:20:44','2015-11-11 09:20:44','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `students_teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `experience` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degrees` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `institute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (20,'ครูชำนาญการพิเศษ','ปริญาเอก','จุฬาลงกรณ์มหาวิทยาลัย','0852948273',NULL),(21,'เจ้าของโรงเรียน','ปริญาโท','จุฬาลงกรณ์มหาวิทยาลัย','0918473924',NULL),(22,'เป็นเจ้าของบริษัท','ปริญาเอก','Howard University ','0967164234',NULL),(23,'สอนมา 5 ปี','ปริญาเอก','จุฬาลงกรณ์มหาวิทยาลัย','0841123456',NULL),(24,'ครูชำนาญการพิเศษ','ปริญาเอก','มหาวิทยาลัยกรุงเทพ','0921426490',NULL),(25,'ครูชำนาญการพิเศษ','ปริญาเอก','มหาวิทยาลัยกรุงเทพ','0982213456',NULL),(26,'ครูชำนาญการ','ปริญาโท','มหาวิทยาลัยมหิดล','0893246578',NULL),(27,'ครูชำนาญการพิเศษ','ปริญาเอก','มหาวิทยาลัยมหิดล','0832234567',NULL),(28,'ครูชำนาญการพิเศษ','ปริญญาตรี','มหาวิทยาลัยกรุงเทพ','0894545362',NULL),(29,'สอนมา 5 ปี','ปริญญาตรี','จุฬาลงกรณ์มหาวิทยาลัย','0981232345',NULL),(30,'ครูชำนาญการพิเศษ','ปริญญาเอก','Howard University ','0981221456',NULL),(31,'สอนมา 5 ปี','ปริญญาตรี','มหาวิทยาลัยมหิดล','0982324759',NULL),(32,'ครูชำนาญการพิเศษ','ปริญญาตรี','จุฬาลงกรณ์มหาวิทยาลัย','0987643245',NULL),(33,'ครูชำนาญการพิเศษ','ปริญญาเอก','จุฬาลงกรณ์มหาวิทยาลัย','0894567843',NULL),(34,'สอนมา 5 ปี','ปริญญาตรี','จุฬาลงกรณ์มหาวิทยาลัย','0986754358',NULL),(35,'เจ้าของโรงเรียน','ปริญญาเอก','Howard University ','',NULL),(36,'แชมป์เดอะสตาร์ 3','ปริญาตรี','คณะเศรษฐศาสตร์ มหาวิทยาลัยเกษตรศาสตร์','0887776666',NULL),(37,'ครูชำนาญการพิเศษ','ปริญญาตรี','มหาวิทยาลัยมหิดล','0864567890',NULL),(38,'แชมป์เดอะสตาร์ 6','ปริญาตรี','คณะเศรษฐศาสตร์ มหาวิทยาลัยเกษตรศาสตร์','',NULL),(39,'สอนมา 3 ปี','ปริญญาตรี','มหาวิทยาลัยมหิดล','0907865432',NULL),(40,'นักร้อง','ปริญาตรี','คณะเศรษฐศาสตร์ มหาวิทยาลัยเกษตรศาสตร์','',NULL),(41,'สอนมา 3 ปี','ปริญญาโท','มหาวิทยาลัยมหิดล','0981237693',NULL),(42,'นักร้อง','ปริญาตรี','คณะเศรษฐศาสตร์ มหาวิทยาลัยเกษตรศาสตร์','',NULL),(43,'ครูชำนาญการพิเศษ','ปริญาเอก','Howard University ','0934234567','2015-11-10 07:54:48');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `date_of_birth` date NOT NULL,
  `teachers_id` int(10) unsigned DEFAULT NULL,
  `students_id` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `picture` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_teachers_idx` (`teachers_id`),
  KEY `fk_users_students1_idx` (`students_id`),
  CONSTRAINT `fk_users_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_teachers` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (41,'ชาคริต ','แย้มนาม','ชาคริต','teacher3@gmail.com','$2y$10$7N5A13G4lkCEp0bxZtcISOONYP93A3SjVh1ZZ804i3qG9pYQp1bfa','3fyn1xemBXJ7LMG7azb9MtVyMEjmYuOegMJ90EKTtSir3WJ60fe25ggSwTh5','2015-08-17 05:48:08','2015-11-11 11:05:37',0,'2015-11-10',20,NULL,NULL,'20.jpeg'),(42,'โฟกัส ','จีระกุล','โฟกัส','teacher4@gmail.com','$2y$10$ZZYiYkFWV1Bs1lR14Uym2.NMN6Srha4QKIfc9xf2L2oAtzShuFSu2',NULL,'2015-08-17 05:50:22','2015-11-10 07:58:50',0,'2015-11-10',21,NULL,NULL,'21.jpeg'),(45,'ทักษอร ','ภักดิ์สุขเจริญ','แอฟ','student3@gmail.com','$2y$10$CY28igiscPdW0.tNNpLqVOQlYdYgIerhJK741jjtCNmfXp/ehR9FC','MA6BIZAyATotekSbD1vgQxSaqLHmSTdutnIWPzjvS0eI7AX5G0XAD7qwixRo','2015-08-17 05:55:05','2015-11-11 06:31:46',0,'0000-00-00',NULL,5,NULL,'5.jpeg'),(46,'ธัญญาเรศ ','รามณรงค์','ธัญญ่า','student4@gmail.com','$2y$10$FIT.B.hZyUD1JiBaJfuy5.SPtjCFynt/JgfYYUaG6bKjLU8ghWbSq',NULL,'2015-08-17 05:57:33','2015-09-07 09:44:10',0,'1993-12-11',NULL,6,'2015-09-07 09:44:10','6.jpeg'),(48,'เอกภพ','รามณรงค์','อั้ม','teacher@gmail.com','$2y$10$9hucX6uNFs2KSCddLYqNE.srSPGi4xKfx.TwoeCqd.xBmbuf4Askq',NULL,'2015-08-19 05:41:43','2015-11-10 12:23:22',0,'1997-09-04',22,NULL,NULL,'22.jpeg'),(51,'รัตติกร','ขุนโสม','ปอไหม','pormai@gmail.com','$2y$10$KJo3rc9Kwxm6A8W4EYIaguMnNJV/CIqg3NLW0s5Umm8XWHnuAO5G.',NULL,'2015-08-21 09:24:37','2015-09-09 11:15:25',0,'1993-09-27',NULL,8,NULL,'8.jpeg'),(52,'โทนี่','สตาร์ค','','admin1@gmail.com','$2y$10$arriDFpToq/rhm2AUMne8u27qnM83S1xhuaP9ZMnfGD4fQa4d67ce','jmjW7EQZRcFtMiTkRlrw6W37EOMX0BbhtAhvvwkUgmNe1e6jlo7hsS57i7xw','2015-08-21 09:54:01','2015-11-11 11:00:26',0,'0000-00-00',NULL,NULL,NULL,'29.jpg'),(53,'กันต์','ชุมนานนท์','กันต์','teacher5@gmail.com','$2y$10$XfYnPpWrNyXHsW2qQATN8eh.O1hyC3GBemZeB35gEe2lvfp1KtEza','BUkaJqZdL5NvlY7w4ElZVtPlN5Cd32WmvIuLu8xnQOQegwuOyuaNT2O27zdI','2015-08-24 11:47:35','2015-09-08 08:07:19',0,'1993-06-30',23,NULL,NULL,'53.jpeg'),(54,'สุนทรี','วิริยะ','ทรี','student10@gmail.com','$2y$10$OWbE6UmZ2eTwrYdnm5cRLedV3c74ywtenQ83vNr6SHRA10PFSK3Py',NULL,'2015-08-24 12:04:37','2015-09-09 11:17:20',0,'1993-06-30',NULL,9,NULL,'9.jpeg'),(60,'สุนทรี','รามณรงค์','อั้น','student14@gmail.com','$2y$10$BH95.4Atbeeb4JMsWZJ.uefwHB/Vdmhi0yF6sd3IxlQJuaLOqJXJC',NULL,'2015-08-24 12:21:30','2015-09-10 06:31:52',0,'2536-11-11',NULL,14,NULL,'60.jpeg'),(61,'วิริฒิพา','ภักดีประสงค์','วุ้นเส้น','teacher10@gmail.com','$2y$10$dwjMnWhyFkJW2IhUfnyJfOf7XeKPtxedhpBcDepuklaS89IEF1Voa','zSmBhXYw9D8d4ibwRVAornzDMPQDvRg5oY4O7XWIvXjBhp1yfHnwKmT0d7By','2015-09-08 06:04:28','2015-11-11 08:50:29',0,'1993-06-30',24,NULL,NULL,'61.jpeg'),(62,'ปองศักดิ์',' รัตนพงษ์','อ็อฟ','teacher11@gmail.com','$2y$10$esHP8ulA4jdM4wwWDSO1Oe.Xosh3XBHeCatTEG4ehWvNaZgPttvoO','DByVF274bZZLwO4PZbzqZpuY7AizkmFENxoCtnF3MJfjZbM7tLnivAQIRhSF','2015-09-09 04:48:25','2015-09-09 08:08:20',0,'2534-10-12',25,NULL,NULL,'25.jpeg'),(63,'ภูภูมิ ','พงศ์ภาณุ','เคน','teacher12@gmail.com','$2y$10$JehzF2nJZ7r1AY9ul0etd.b19NzwnEIAZKUteyqXz/m0FFFreIzk2',NULL,'2015-09-09 04:52:32','2015-09-09 07:56:47',0,'2530-10-09',26,NULL,NULL,'63.jpeg'),(64,'ดาวิกา ','โฮร์เน่','ใหม่','teacher13@gmail.com','$2y$10$WsMivf32FrLWuM9HIR9ohOk0cfZKOWRiVGg4ahCudidDnlz0MI0B.',NULL,'2015-09-09 04:56:09','2015-09-09 04:56:10',0,'2533-08-08',27,NULL,NULL,'64.jpeg'),(65,'อังศุมาลิน ','สิรภัทรศักดิ์เมธา','แพตตี้','teacher14@gmail.com','$2y$10$q2oLN54Fv1Dl5MgtfY.5QuTk0M4rW0p6oLJ8HdNaWMqzMu9TQVJee',NULL,'2015-09-09 06:13:41','2015-09-09 12:11:58',0,'1997-09-17',28,NULL,NULL,'65.jpeg'),(68,'มาริโอ้','เมาเร่อ','มาริโอ้','teacher15@gmail.com','$2y$10$33JF0Qao.WhpZ9c7FNTrJOqpenMwBFMjw5osyD7OkvqEmEvSlt14i',NULL,'2015-09-09 06:24:59','2015-09-09 06:24:59',0,'2534-07-05',29,NULL,NULL,'68.jpeg'),(69,'กฤต','เจนพานิชการ','กฤต','teacher16@gmail.com','$2y$10$/1E2GAa/jSFhOHFilaz8VuXElIfeq8YEwsoIGQizFP7UqGQWyZTCW',NULL,'2015-09-09 06:33:18','2015-09-09 06:34:56',0,'2530-09-02',30,NULL,NULL,'30.jpeg'),(70,'ธนวรรธน์','วรรธนะภูติ','โป๊ป','teacher17@gmail.com','$2y$10$2mnIe5GrHJt3A/WklBdqxeXqm4GcTcYXELlwnk3ftRPS9djiAyKui',NULL,'2015-09-09 10:34:40','2015-09-09 10:34:40',0,'2526-12-11',31,NULL,NULL,'70.jpeg'),(71,'น้ำทิพย์','จงรัชตะวิบูลย์','บี','teacher18@gmail.com','$2y$10$A66FnM42xB2V5adntswrne8fQ6JowytnIbdqjyyljjqNp9anebu0m',NULL,'2015-09-09 10:42:18','2015-09-09 10:42:20',0,'2536-11-11',32,NULL,NULL,'71.jpeg'),(72,'เกริกพล','มัสยวาณิช','ฟลุค','teacher19@gmail.com','$2y$10$Ckx8v1Q.Snv2bNHPli7NGO3ttsigunQ7dXia15JGsTgty1pVxZ1.a',NULL,'2015-09-09 11:02:40','2015-09-09 11:02:41',0,'2534-11-11',33,NULL,NULL,'72.jpeg'),(73,'ศุกลวัฒน์','คณารศ','เวียร์','teacher20@gmail.com','$2y$10$2c2pgb0hRPHCWQvY1xYHuu9DvSVT.C4QImCrW36vX8y0ic02sawNe',NULL,'2015-09-09 11:06:17','2015-09-09 11:06:18',0,'2531-11-11',34,NULL,NULL,'73.jpeg'),(74,'คีรติ','มหาพฤกษ์พงศ์','ยิปซี','teacher21@gmail.com','$2y$10$1Kr1HHeFzt7Tc1TyXyQP5.0n/tVMEFfFRCWtI6KvBLYozJLQnis02',NULL,'2015-09-09 11:10:11','2015-09-09 11:50:57',0,'0000-00-00',35,NULL,NULL,'74.jpeg'),(75,'สุกฤษฎิ์','วิเศษแก้ว','บี้','teacher30@gmail.com','$2y$10$FMyq4gAo/hDIZTxGnsmls.s9bM/BY94fq0LtaVsvEaals1oHbnZ5e',NULL,'2015-09-09 11:12:31','2015-09-09 11:12:32',0,'0000-00-00',36,NULL,NULL,'75.jpeg'),(76,'หลุยส์ ','สก๊อต','หลุยส์ ','teacher22@gmail.com','$2y$10$.CZiYDE7PFhEOtIzAb3b9uPFueDk2m0pIhubIN2fALJmUbnFCKB6i',NULL,'2015-09-09 11:12:48','2015-09-09 11:12:49',0,'2526-11-11',37,NULL,NULL,'76.jpeg'),(77,'ลักษณา','สุทธิการ','แนน','student5@gmail.com','$2y$10$WZmc7OaC3cCFboKi2mAiZ.HjIzdfL6YFdRyPAFfTOB88ixlsERty6',NULL,'2015-09-09 11:23:55','2015-09-11 04:54:58',0,'2536-11-11',NULL,15,'2015-09-11 04:54:58','77.jpeg'),(78,'นภัทร',' อินทร์ใจเอื้อ','กัน ','teacher31@gmail.com','$2y$10$PjcyCgNtE6rifQjyVNc9wu1Cb/6XOvRC5b8PQUjT/QdNXRQimJYZW',NULL,'2015-09-09 11:29:41','2015-09-09 11:47:46',0,'0000-00-00',38,NULL,NULL,'78.jpeg'),(79,'พชร','จิราธิวัฒน์','พีช','student6@gmail.com','$2y$10$2Ix.ZWD4ptXhkxFFrH3wgu4E2.N7nLIvPcEi2SZf3D.k2.3DIaEem',NULL,'2015-09-09 11:33:33','2015-09-09 11:33:36',0,'2536-10-01',NULL,16,NULL,'79.jpeg'),(80,'ปกรณ์','ฉัตรบริรักษ์','บอย','teacher23@gmail.com','$2y$10$PvzsFdf//5o27QzHoxX31u255xcZNEB2y.cMYNsO1S./YuYoJIUJG',NULL,'2015-09-09 11:38:02','2015-09-10 06:07:22',0,'2534-10-11',39,NULL,NULL,'80.jpeg'),(82,'อาทิวราห์','คงมาลัย','ตูน','teacher32@gmail.com','$2y$10$PQR/dbbEbyLg284D3ck1UufzQaJbH1CLxPv6Zp.X9MaVdBxNNwzt6',NULL,'2015-09-09 11:40:44','2015-09-09 12:13:25',0,'1997-09-04',40,NULL,NULL,'82.jpeg'),(84,'รัฐภูมิ','โตคงทรัพย์','ฟิล์ม','teacher24@gmail.com','$2y$10$LV/CT5Z6AIT3ykT3Di8QluxXH0z4bOn/zh4rG4aeXlVhwgRm0MErS',NULL,'2015-09-09 11:42:46','2015-09-09 11:42:46',0,'2536-11-11',41,NULL,NULL,'84.jpeg'),(86,'ศนันธฉัตร','ธนพัฒน์พิศาล','ฝน','student7@gmail.com','$2y$10$lEZMTa4fq4fgfAjWUyEcvucaXugTeIrjHGIWYBLxFpguJWJ9u0kdO',NULL,'2015-09-09 11:47:04','2015-09-09 11:47:04',0,'2530-08-02',NULL,17,NULL,'86.jpeg'),(89,'จรินทร์พร ','จุนเกียรติ','เต้ย','student8@gmail.com','$2y$10$wcUmqMVBCyuCvmNfWv5I8.3hI.NbOUSyO7qCBNWpkPtAtyt2da6dy',NULL,'2015-09-09 12:00:05','2015-09-09 12:00:05',0,'2536-01-01',NULL,18,NULL,'89.jpeg'),(90,'พงศกร','ลิ่มสกุล','แอร์','teacher33@gmail.com','$2y$10$suw6Wrijhg3e3Z9V5s8HG.aRuPaFRJz2uEFvBs2ithT98mUrzJ67K',NULL,'2015-09-09 12:01:29','2015-09-10 06:02:22',0,'1998-09-17',42,NULL,NULL,'90.jpeg'),(91,'ณเดชน์','คูกิมิยะ','แบรี่','student9@gmail.com','$2y$10$UcXtYk5yu5kx1du.WWyDWOq/WX1TZWQ/V94vYEP574tE/FbzeLlLW',NULL,'2015-09-09 12:04:50','2015-09-09 12:04:51',0,'2536-11-11',NULL,19,NULL,'91.jpeg'),(94,'โชติกา ','วงศ์วิลาศ','เนย','student11@gmail.com','$2y$10$6kB2FjF.3GloKsRoFK6Q1uU4WjNluaDwbdnMfH0igtsJOP61inllS',NULL,'2015-09-09 12:12:22','2015-09-09 12:12:25',0,'2536-11-11',NULL,20,NULL,'94.jpeg'),(95,'อธิศ','อมรเวช','จ๊ะ','student40@gmail.com','$2y$10$WET2RbwCUBx0y03u0flp0.m71eYRb3fVtEDl7w4ITHIyvzWR34uhO',NULL,'2015-09-09 12:43:53','2015-09-09 12:43:54',0,'1996-09-05',NULL,21,NULL,''),(97,'สรวิชญ์','สุบุญ','ก้อง','student12@gmail.com','$2y$10$BASxgCH0JXzccwo3ExGiCesJR9z5iiBBGKo5tLMU7zMhUe70UjJLa',NULL,'2015-09-09 15:33:54','2015-09-09 15:33:54',0,'2536-11-11',NULL,22,NULL,'97.jpeg'),(98,'กัลยปริญญ์ ','เชิญทอง','กัล','student30@gmail.com','$2y$10$CPOVHkMnP6Mbbzs7CrubruUfMvxK/Stq8ae6u4fejykKFNmvzCIsm',NULL,'2015-09-09 15:33:44','2015-09-09 15:33:44',0,'2536-11-11',NULL,NULL,NULL,''),(99,'ปริญ','สุภารัตน์','หมาก','student13@gmail.com','$2y$10$6NeVRRZs60iEKMsPC1Wr3euVrmHPICt2s4WRAQOBuyGvO873HpXPm',NULL,'2015-09-09 15:38:42','2015-09-09 15:38:42',0,'2536-11-11',NULL,24,NULL,'99.jpeg'),(103,'อนันดา','เอเวอร์ริ่งแฮม','จ่อย','student15@gmail.com','$2y$10$Q/pNo2DAJ0/DGogFyd5MlOSlGS2WL9sziOfKxd1uT0DZnh6eflXb2',NULL,'2015-09-09 15:46:24','2015-09-09 15:46:24',0,'2536-08-11',NULL,25,NULL,'103.jpeg'),(104,'ปริญญ์','เชิญทอง','กัล','student16@gmail.com','$2y$10$SXklBawDClJRCS1I5CjgQesqvpKGKn3Y./bjgYVVeoPJmXoUqqyWO',NULL,'2015-09-10 01:12:57','2015-09-10 01:12:57',0,'1979-08-13',NULL,26,NULL,'104.jpeg'),(105,'วุฒิธร','มิลินทจินดา',' วู้ดดี้','student17@gmail.com','$2y$10$Ny1DP4ykHiqLROkPNLEHWuVccbze8df2nBmk7vfMZDNOzrxF4zhwK',NULL,'2015-09-10 01:15:36','2015-09-10 01:15:36',0,'1989-06-12',NULL,27,NULL,'105.jpeg'),(106,'ซาร่า','มาลากุล ','ซาร่า','student18@gmail.com','$2y$10$lsC6t/6nJQ.M65BF6d0EBO8/igEvvvusO97csB2XiIuwL5R.3r57O',NULL,'2015-09-10 01:17:42','2015-09-10 01:17:42',0,'1933-06-30',NULL,28,NULL,'106.jpeg'),(108,'บริบูรณ์','จันทร์เรือง','ตั๊ก','student19@gmail.com','$2y$10$MlF4El47r3I4rsp./aJ7wuJwooc.nHvdLknlgTXYz0lNwMWY7y7eO',NULL,'2015-09-10 01:21:06','2015-09-10 01:21:06',0,'1964-08-14',NULL,29,NULL,'108.jpeg'),(109,'ชนิดาภา','พงศ์ศิลป์พิพัฒน์','เบสท์','student20@gmail.com','$2y$10$82b6HJwZIFaFUvAZ/MJtr.c.Vwt0nl2RjA1iK6Z/XYD2BqZBuAbCy',NULL,'2015-09-10 01:23:42','2015-09-10 01:23:43',0,'2015-09-01',NULL,30,NULL,'109.jpeg'),(110,'มณีพงศ์','จงจิตร','เอ','student21@gmail.com','$2y$10$43xRTgAqjGQS5Je0XIwvP.TyzU8wi2bjd.Sxw3g0hKYd6W7S8tiLe',NULL,'2015-09-10 01:25:26','2015-09-10 01:25:26',0,'1973-08-09',NULL,31,NULL,'110.jpeg'),(111,'ณัฐวุฒิ','สกิดใจ','ป๋อ','student22@gmail.com','$2y$10$kb8rJP3gJ7xcZTWossHLA.jkwieBTEHzLZmX5cT7x0ZJHsEc88P5G',NULL,'2015-09-10 01:27:40','2015-09-10 01:27:41',0,'1979-09-15',NULL,32,NULL,'111.jpeg'),(112,'เอสเธอร์ ','สุปรีย์ลีลา','เอสเธอร์','student23@gmail.com','$2y$10$RJk76np3lbpwlDmKFsKYCO4donNBgsrL/9U76908dyNEduxU4LjLG',NULL,'2015-09-10 01:29:33','2015-09-10 01:29:33',0,'1953-05-29',NULL,33,NULL,'112.jpeg'),(113,' ธีรเทพ','วิโนทัย','ลีซอ','student24@gmail.com','$2y$10$luiw2kZRS8OC7Ik2rDw/OOgFPKsaWHxIYQRcCluKJFDuk2/0FT8.C',NULL,'2015-09-10 01:31:39','2015-09-10 01:31:39',0,'1935-04-20',NULL,34,NULL,'113.jpeg'),(114,'ธีรชัย','วิมลชัยฤกษ์','โทนี่ ','student25@gmail.com','$2y$10$AKDxc/n3zqPHoNGcv1rJzO3IX/hGkRBrQmLKyQXQ7oKYVwbws2ogC',NULL,'2015-09-10 01:33:29','2015-09-10 01:33:29',0,'1953-02-11',NULL,35,NULL,'114.jpeg'),(115,'สุดารัตน์ ','บุตรพรม','ตุ๊กกี้','student26@gmail.com','$2y$10$yF.5xL4ewdbU6COpcLN7o.OZoosDC8eBZrz7qDmWUePKR3WQzjRny',NULL,'2015-09-10 01:35:32','2015-09-10 01:35:32',0,'1997-01-11',NULL,36,NULL,'115.jpeg'),(116,'พริมา','พันธุ์เจริญ','พริม','student27@gmail.com','$2y$10$GAefnY.XLX2QDQuei.rBue8WmIXOTp8ba9qAhsNsE3QnLbebt2lbC',NULL,'2015-09-10 01:37:21','2015-09-10 01:37:21',0,'1967-01-11',NULL,37,NULL,'116.jpeg'),(117,'อิสราภรณ์','จันทรโสภาคย์','แอนนา','student28@gmail.com','$2y$10$i9r1puLgZoPPK2B0LhjJZ.Rp432VpdFuF6rGuoJpifb7vhp9HdOUK',NULL,'2015-09-10 01:39:42','2015-09-10 01:39:42',0,'1983-04-23',NULL,38,NULL,'117.jpeg'),(118,'จิตตาภา','แจ่มปฐม','จ๊ะ','student29@gmail.com','$2y$10$h04YpTHvn3XMcafEvyUtaOB4lNKmtFtX/pm3ZlyDZnAq172igTbo6',NULL,'2015-09-10 01:41:35','2015-09-10 01:41:35',0,'1998-02-18',NULL,39,NULL,'118.jpeg'),(120,'กมลเนตร','เรืองศรี','อาย','student31@gmail.com','$2y$10$FbqaVsiNFDWP5qRfOgXwWOFTUCgkI5cZ4fMePt8etSsbPmjHAaMyS',NULL,'2015-09-10 01:46:55','2015-09-10 01:46:55',0,'1922-09-20',NULL,40,NULL,'120.jpeg'),(121,'จรณ ','โสรัตน์','ท็อป','student32@gmail.com','$2y$10$eWA6dRYbyaS6AwaFr/w7b.dhb73fa7qmk3OFKAzcAnFyFzHUE2pXq',NULL,'2015-09-10 01:50:07','2015-09-10 01:50:07',0,'1963-09-05',NULL,41,NULL,'121.jpeg'),(122,'สุธีวัน','ทวีสิน','ใบเตย','student33@gmail.com','$2y$10$IvFt8Uqy3IBZs5MUrjqk8.942b3ghZu3O20kSDeCKzXPZO2QesQo.',NULL,'2015-09-10 01:54:32','2015-09-10 01:54:32',0,'1980-02-14',NULL,42,NULL,'122.jpeg'),(123,' ธนิน ','มนูญศิลป์','บอม','student34@gmail.com','$2y$10$sThbaObFHXrSFVwwMgxVkuRemBANK0YJc2wEZWPmjRZqqW6xYXQtm',NULL,'2015-09-10 01:57:00','2015-09-10 01:57:00',0,'1988-02-10',NULL,43,NULL,'123.jpeg'),(124,'ธนภพ ','ลีรัตนขจร','ต่อ','student35@gmail.com','$2y$10$KCjADgpFEJ2zOpKKx5huau8bYGWmK8PphNto5p4dDsZf8ydd81s6a',NULL,'2015-09-10 02:00:52','2015-09-10 02:00:52',0,'1964-07-17',NULL,44,NULL,'124.jpeg'),(125,'สุทัตตา','อุดมศิลป์','ปันปัน','student36@gmail.com','$2y$10$V0YAhWl5KHpR.m/.EU9dLuowRsH5Vf9VK7Jz8BDN5fssVNkAITSPC',NULL,'2015-09-10 02:03:42','2015-09-10 02:03:42',0,'1968-02-06',NULL,45,NULL,'125.jpeg'),(126,'จุฑาวุฒิ ','ภัทรกำพล','มาร์ช','student37@gmail.com','$2y$10$mp.CNBFCjSkrgHeC7qV4JOmSA8z3zBEIABHzUvnC.QKVhx0xFhKgO',NULL,'2015-09-10 02:09:49','2015-09-10 02:09:49',0,'1991-02-01',NULL,46,NULL,'126.jpeg'),(127,'เสฎฐวุฒิ ','อนุสิทธิ์','ตั้ว','student38@gmail.com','$2y$10$ycTES7crwwaU7QXRlYVaVeRSXBratq1PzXZGoipKQN9nBis8AMusq',NULL,'2015-09-10 02:12:10','2015-09-10 02:12:10',0,'1984-01-18',NULL,47,NULL,'127.jpeg'),(128,'ณฐพร',' เตมีรักษ์','แต้ว','student39@gmail.com','$2y$10$5dDVX7qpmQietzYXBouBNuj8D9//UX3K0FK1Ms9HGaTkgv57GMBi6',NULL,'2015-09-10 02:14:24','2015-09-10 02:14:24',0,'1996-02-09',NULL,48,NULL,'128.jpeg'),(130,'จักรินทร์','ศิลป์ชัยกิจ','โบกี้','student41@gmail.com','$2y$10$ZNWT6bIqTmNz3EFF0vPDxOwJJWUi5gRUk6bdrAw7VQMZgUwt4bjfy',NULL,'2015-09-10 02:31:47','2015-09-10 02:31:48',0,'1996-09-04',NULL,49,NULL,'130.jpeg'),(131,'ศรัณยู',' วินัยพานิช','ไอซ์','student42@gmail.com','$2y$10$LHsSd/uKf5AHDeMgjXgXCetuuZ4zVQRz80c1l3U.X1D4N.hdvlveS',NULL,'2015-09-10 02:36:36','2015-09-10 02:36:36',0,'1958-05-09',NULL,50,NULL,'131.jpeg'),(132,' ทิฆัมพร ','ฤทธิ์ธาอภินันท์','เชียร์','student43@gmail.com','$2y$10$QgKMHubYUAfFhu.jiMw.medcYVXBFV21EzNER8MdksGuQwynqLckO',NULL,'2015-09-10 02:39:54','2015-09-10 02:39:54',0,'1997-05-09',NULL,51,NULL,'132.jpeg'),(133,'มนัสนันท์ ','พันเลิศวงศ์สกุล','โดนัท','student44@gmail.com','$2y$10$ZCm3LvZ8/l05hJFxUbSguek0cKBW8GhwQ2smf7Xx8eW8R2xmvYp6O',NULL,'2015-09-10 02:44:11','2015-09-10 02:44:11',0,'1975-02-06',NULL,52,NULL,'133.jpeg'),(134,'บงกช ','คงมาลัย','ตั๊ก','student46@gmail.com','$2y$10$G1pVY8gwhnR3C8m9UW13uuxMcYF.Qo/cpZmHvN01MibYKpJAGWhZi',NULL,'2015-09-10 02:50:07','2015-09-10 02:50:07',0,'1921-06-16',NULL,53,NULL,'134.jpeg'),(135,'สัน','ดีงาม','สันนี่','teacher322@gmail.com','$2y$10$tAFpnRVIdtmRlQB.amNjSOv1d4tVnAD.XjQQ95.UeRvqQ5J.ZkDQK',NULL,'2015-11-10 06:34:43','2015-11-10 07:54:48',0,'2015-11-10',43,NULL,'2015-11-10 07:54:48','');
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

-- Dump completed on 2015-11-11 17:08:22
