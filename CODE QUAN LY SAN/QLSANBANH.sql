CREATE DATABASE  IF NOT EXISTS `qlsanbanh` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `qlsanbanh`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: qlsanbanh
-- ------------------------------------------------------
-- Server version	5.6.14

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
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_customer` (
  `id` char(10) NOT NULL,
  `tenkhachhang` varchar(45) DEFAULT NULL,
  `gioitinh` varchar(45) DEFAULT NULL,
  `diachi` varchar(45) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `sodt` char(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `diemthuong` varchar(45) DEFAULT NULL,
  `updatedDate` timestamp NULL DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_customer`
--

LOCK TABLES `tbl_customer` WRITE;
/*!40000 ALTER TABLE `tbl_customer` DISABLE KEYS */;
INSERT INTO `tbl_customer` VALUES ('1','Nguyễn Văn Thuận','Nam','Quảng Bình','1993-02-20','356868468','vanthuanhipk17tpm@gmail.com','1824',NULL,'2019-01-04 17:00:00'),('2','Lê Văn Thanh Mỹ','Nam','Quảng Nam','1994-01-01','356545215','sdsdsdsd@sdsd.com','1836',NULL,'2019-01-13 17:00:00');
/*!40000 ALTER TABLE `tbl_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_dichvu`
--

DROP TABLE IF EXISTS `tbl_dichvu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_dichvu` (
  `iddichvu` char(10) NOT NULL,
  `tendichvu` varchar(30) DEFAULT NULL,
  `dongia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`iddichvu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dichvu`
--

LOCK TABLES `tbl_dichvu` WRITE;
/*!40000 ALTER TABLE `tbl_dichvu` DISABLE KEYS */;
INSERT INTO `tbl_dichvu` VALUES ('1','Nước',6000,500,'2019-01-10 09:23:45','2019-01-04 17:00:00'),('2','Thach bich ngọt',6000,500,'2019-01-05 02:42:06','2019-01-04 17:00:00'),('3','Coca',9000,500,'2019-01-10 09:23:45','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_dichvu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_hoadon`
--

DROP TABLE IF EXISTS `tbl_hoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_hoadon` (
  `idhoadon` char(10) NOT NULL,
  `idsan` char(10) DEFAULT NULL,
  `iduser` char(10) DEFAULT NULL,
  `timeStart` time DEFAULT NULL,
  `timeEnd` time DEFAULT NULL,
  `ngaydat` date DEFAULT NULL,
  `tongthanhtoan` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `updatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdDate` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idhoadon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_hoadon`
--

LOCK TABLES `tbl_hoadon` WRITE;
/*!40000 ALTER TABLE `tbl_hoadon` DISABLE KEYS */;
INSERT INTO `tbl_hoadon` VALUES ('2035880756','1','1','14:00:00','15:00:00','2019-01-22',262000,2,'2019-01-22 06:42:51','2019-01-22 00:41:38'),('3041253420','3','2','16:30:00','17:30:00','2019-01-23',262000,2,'2019-01-23 09:34:10','2019-01-23 03:33:44'),('3787209613','1','1','17:03:00','18:03:00','2019-01-16',250000,2,'2019-01-21 02:42:40','2019-01-16 03:03:44'),('3964789804','11','1','15:54:00','16:54:00','2019-01-16',500000,2,'2019-01-18 02:45:41','0000-00-00 00:00:00'),('4051021006','2','1','15:58:00','16:59:00','2019-01-17',254167,2,'2019-01-18 02:43:03','0000-00-00 00:00:00'),('4133870947','2','1','16:30:00','17:30:00','2019-01-18',250000,2,'2019-01-18 01:46:12','2019-01-17 03:09:36'),('5317654448','11','1','15:54:00','16:54:00','2019-01-16',500000,0,'2019-01-16 09:04:17','0000-00-00 00:00:00'),('6509348356','11','2','06:30:00','07:30:00','2019-01-19',584000,2,'2019-01-18 03:20:20','2019-01-17 21:19:50'),('7068827764','1','1','15:52:00','16:52:00','2019-01-16',250000,2,'2019-07-01 04:18:24','0000-00-00 00:00:00'),('8170998405','6','1','18:30:00','19:30:00','2019-07-01',306000,0,'2019-07-01 04:19:16','2019-06-30 23:19:16'),('8825549122','4','1','20:05:00','21:05:00','2019-01-16',312000,2,'2019-01-18 03:13:19','2019-01-16 03:05:41');
/*!40000 ALTER TABLE `tbl_hoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_hoadondichvu`
--

DROP TABLE IF EXISTS `tbl_hoadondichvu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_hoadondichvu` (
  `iddichvu` char(10) NOT NULL,
  `idhoadon` char(10) NOT NULL,
  `dongia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `thanhtien` int(11) DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `fgkey_iddv_idx` (`iddichvu`),
  KEY `fgkey_hoadon_idx` (`idhoadon`),
  CONSTRAINT `fgkey_hoadon` FOREIGN KEY (`idhoadon`) REFERENCES `tbl_hoadon` (`idhoadon`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fgkey_iddv` FOREIGN KEY (`iddichvu`) REFERENCES `tbl_dichvu` (`iddichvu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_hoadondichvu`
--

LOCK TABLES `tbl_hoadondichvu` WRITE;
/*!40000 ALTER TABLE `tbl_hoadondichvu` DISABLE KEYS */;
INSERT INTO `tbl_hoadondichvu` VALUES ('2','8825549122',6000,1,6000,'2019-01-16 09:05:41','2019-01-16 03:05:41'),('1','8825549122',6000,1,6000,'2019-01-16 09:05:42','2019-01-16 03:05:41'),('2','6509348356',6000,5,30000,'2019-01-18 03:19:50','2019-01-17 21:19:50'),('1','6509348356',6000,9,54000,'2019-01-18 03:19:50','2019-01-17 21:19:50'),('2','2035880756',6000,1,6000,'2019-01-22 06:41:38','2019-01-22 00:41:38'),('1','2035880756',6000,1,6000,'2019-01-22 06:41:39','2019-01-22 00:41:38'),('1','3041253420',6000,1,6000,'2019-01-23 09:33:44','2019-01-23 03:33:44'),('2','3041253420',6000,1,6000,'2019-01-23 09:33:44','2019-01-23 03:33:44'),('1','8170998405',6000,1,6000,'2019-07-01 04:19:16','2019-06-30 23:19:16');
/*!40000 ALTER TABLE `tbl_hoadondichvu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_loaisan`
--

DROP TABLE IF EXISTS `tbl_loaisan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_loaisan` (
  `idloaisan` char(10) NOT NULL,
  `loaisan` char(10) DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idloaisan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_loaisan`
--

LOCK TABLES `tbl_loaisan` WRITE;
/*!40000 ALTER TABLE `tbl_loaisan` DISABLE KEYS */;
INSERT INTO `tbl_loaisan` VALUES ('1','Sân 5','2019-01-04 07:08:54','2019-01-01 17:00:00'),('2','Sân 7','2019-01-04 07:08:54','2019-01-01 17:00:00'),('3','Sân 11','2019-01-04 07:08:54','2019-01-01 17:00:00');
/*!40000 ALTER TABLE `tbl_loaisan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_role`
--

DROP TABLE IF EXISTS `tbl_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_role` (
  `idrole` char(10) NOT NULL,
  `rolename` varchar(45) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT NULL,
  `updatedDate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_role`
--

LOCK TABLES `tbl_role` WRITE;
/*!40000 ALTER TABLE `tbl_role` DISABLE KEYS */;
INSERT INTO `tbl_role` VALUES ('1','admin',NULL,NULL),('2','Nhân viên',NULL,NULL),('3','Khách hàng',NULL,NULL);
/*!40000 ALTER TABLE `tbl_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_san`
--

DROP TABLE IF EXISTS `tbl_san`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_san` (
  `idsan` char(10) NOT NULL,
  `tensan` char(10) DEFAULT NULL,
  `loaisan` char(10) DEFAULT NULL,
  `dongia` int(11) DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idsan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_san`
--

LOCK TABLES `tbl_san` WRITE;
/*!40000 ALTER TABLE `tbl_san` DISABLE KEYS */;
INSERT INTO `tbl_san` VALUES ('1','1-A','1',250000,'2019-01-04 08:33:03','2019-01-01 17:00:00'),('10','3-C','3',500000,'2019-01-04 08:33:03','2019-01-01 17:00:00'),('11','3-D','3',500000,'2019-01-04 08:33:03','2019-01-01 17:00:00'),('12','1-D','1',250000,'2019-01-04 08:33:03','2019-01-04 08:33:03'),('2','1-B','1',250000,'2019-01-04 08:33:03','2019-01-01 17:00:00'),('3','1-C','1',250000,'2019-01-04 08:33:03','2019-01-01 17:00:00'),('4','2-A','2',300000,'2019-01-04 08:33:03','2019-01-01 17:00:00'),('5','2-B','2',300000,'2019-01-04 08:33:03','2019-01-01 17:00:00'),('6','2-C','2',300000,'2019-01-04 08:33:03','2019-01-01 17:00:00'),('7','2-D','2',300000,'2019-01-04 08:33:03','2019-01-01 17:00:00'),('8','3-A','3',500000,'2019-01-04 08:33:03','2019-01-01 17:00:00'),('9','3-B','3',500000,'2019-01-04 08:33:03','2019-01-01 17:00:00');
/*!40000 ALTER TABLE `tbl_san` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_taikhoan`
--

DROP TABLE IF EXISTS `tbl_taikhoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_taikhoan` (
  `id_taikhoan` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `idkh` char(10) DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL,
  `idrole` char(10) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT NULL,
  `updatedDate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_taikhoan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_taikhoan`
--

LOCK TABLES `tbl_taikhoan` WRITE;
/*!40000 ALTER TABLE `tbl_taikhoan` DISABLE KEYS */;
INSERT INTO `tbl_taikhoan` VALUES (1,'thuannguyen93','12345678','1',1,'1',NULL,'2019-01-04 17:00:00'),(2,'mysan94','00000000','2',1,'3',NULL,'2019-01-13 17:00:00');
/*!40000 ALTER TABLE `tbl_taikhoan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-01 11:22:37
