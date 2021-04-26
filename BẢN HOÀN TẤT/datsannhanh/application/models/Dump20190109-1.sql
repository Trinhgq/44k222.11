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
  `sodt` int(11) DEFAULT NULL,
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
INSERT INTO `tbl_customer` VALUES ('1','Nguyễn Văn Thuận','Nam','Quảng Bình','1993-02-20',356868468,'vanthuanhipk17tpm@gmail.com','0',NULL,'2019-01-04 17:00:00');
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
INSERT INTO `tbl_dichvu` VALUES ('1','Nước',20000,500,'2019-01-05 02:42:06','2019-01-04 17:00:00'),('2','Thach bich ngọt',6000,500,'2019-01-05 02:42:06','2019-01-04 17:00:00');
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
  `idchitiethoadon` char(10) NOT NULL,
  `timeStart` time DEFAULT NULL,
  `timeEnd` time DEFAULT NULL,
  `tongthanhtoan` int(11) DEFAULT NULL,
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
/*!40000 ALTER TABLE `tbl_hoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_hoadonchitiet`
--

DROP TABLE IF EXISTS `tbl_hoadonchitiet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_hoadonchitiet` (
  `iddichvu` char(10) NOT NULL,
  `idsan` char(10) NOT NULL,
  `idhoadon` char(10) NOT NULL,
  `dongia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `fgkey_iddv_idx` (`iddichvu`),
  KEY `fgkey_idsan_idx` (`idsan`),
  KEY `fgkey_hoadon_idx` (`idhoadon`),
  CONSTRAINT `fgkey_hoadon` FOREIGN KEY (`idhoadon`) REFERENCES `tbl_hoadon` (`idhoadon`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fgkey_iddv` FOREIGN KEY (`iddichvu`) REFERENCES `tbl_dichvu` (`iddichvu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fgkey_idsan` FOREIGN KEY (`idsan`) REFERENCES `tbl_san` (`idsan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_hoadonchitiet`
--

LOCK TABLES `tbl_hoadonchitiet` WRITE;
/*!40000 ALTER TABLE `tbl_hoadonchitiet` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_hoadonchitiet` ENABLE KEYS */;
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
INSERT INTO `tbl_taikhoan` VALUES (1,'thuannguyen93','12345678','1',1,NULL,'2019-01-04 17:00:00');
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

-- Dump completed on 2019-01-09 16:08:04
