-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: personas_bbdd
-- ------------------------------------------------------
-- Server version	5.7.35-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL,
  `estado_civil` varchar(45) NOT NULL,
  `hijos` varchar(45) NOT NULL,
  `intereses` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (3,'Juan Perez','juan@example.com',1134567890,'SOLTERO','1','Musica'),(4,'Maria Lopez','maria@example.com',1176543210,'SOLTERO','0','Libros Musica '),(5,'Carlos RodrÃ­guez','carlos@example.com',1151234567,'CASADO','1','Otros'),(6,'Laura GÃ³mez','laura@example.com',1190123456,'CASADO','0','Musica Deportes '),(7,'Mario MartÃ­nez','pablo@example.com',1112223333,'SOLTERO','1','Libros Musica '),(9,'Lucas Gonzales','Lucasgonza2213@gmail.com',1143445568,'OTRO','1','Otros'),(10,'Matias AcuÃ±a','Matiacu255@gmail.com',1132678999,'SOLTERO','1','Deportes'),(11,'Fabricio AcuÃ±a','fabricioacu2020@gmail.com',1156778899,'CASADO','1','Libros Musica '),(12,'Angel Medina','Angelmedi2013@gmail.com',1143214311,'OTRO','0','Deportes'),(13,'Luis Gomez','luisgome2021@gmail.com',1145678906,'CASADO','0','Deportes'),(14,'Luis Gonzales','luisgonza2020@gmail.com',1145338877,'OTRO','0','Deportes'),(15,'Juan Patan','patajuan@gmail.com',1145667788,'SOLTERO','1','Musica'),(16,'Ezequiel Camacho','darkezek@gmail.com',1145435566,'SOLTERO','0','Otros'),(17,'Pedro tabares','pedrotaba2021@gmail.com',1145446677,'CASADO','1','Libros Deportes '),(18,'joel ibanez','jibanez@galilei.edu.ar',1121843456,'SOLTERO','0','Libros'),(19,'lucas ibanez','lucasiban2012@gmail.com',1134789076,'CASADO','0','Otros'),(20,'victoria villaruel','vickivilla2023@gmail.com',1156448899,'CASADO','1','Libros Otros '),(21,'Javier milei','javimilei@gmail.com',1154667788,'SOLTERO','0','Libros');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-12 19:14:16
