-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: app-msg-nvoip
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

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

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `dataHora` datetime NOT NULL,
  `acao` varchar(100) NOT NULL,
  `dados` varchar(160) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (3,8,'2007-06-20 01:54:54','Seleção','Cliente foi selecionado'),(4,6,'2007-06-20 01:55:00','Seleção','Cliente foi selecionado'),(5,10,'2007-06-20 01:58:35','criação','criação de novo usuário'),(8,6,'2007-06-20 12:06:07','Seleção','Cliente foi selecionado'),(9,12,'2007-06-20 12:07:38','criação','criação de novo usuário'),(10,12,'2007-06-20 12:08:21','Seleção','Cliente foi selecionado'),(11,12,'2007-06-20 12:08:42','Alteração','Alteração de usuário'),(12,12,'2007-06-20 12:09:02','Exclusão','Exclusão de cadastro de cliente'),(13,12,'2007-06-20 12:09:06','Exclusão','Exclusão de cadastro de cliente'),(14,6,'2007-06-20 13:56:41','Seleção','Cliente foi selecionado'),(15,6,'2007-06-20 13:57:00','Alteração','Alteração de usuário'),(16,6,'2007-06-20 17:42:07','Seleção','Cliente foi selecionado'),(17,6,'2007-06-20 17:42:13','Alteração','Alteração de usuário'),(18,8,'2007-06-20 17:42:18','Seleção','Cliente foi selecionado'),(19,8,'2007-06-20 17:42:24','Alteração','Alteração de usuário'),(20,10,'2007-06-20 17:42:31','Seleção','Cliente foi selecionado'),(21,10,'2007-06-20 17:42:39','Alteração','Alteração de usuário'),(22,5,'2007-06-20 17:42:44','Seleção','Cliente foi selecionado'),(23,5,'2007-06-20 17:42:49','Alteração','Alteração de usuário'),(24,10,'2007-06-20 17:54:57','Envio de SMS','teste envio mensagem com persistencia de log'),(25,10,'2007-06-20 17:58:41','Envio de SMS','teste envio mensagem com persistencia de log e verificacao de retorno'),(26,5,'2007-06-20 18:00:43','Envio de SMS','Esse e um teste do Jonas para seu numero de telefone'),(27,13,'2007-06-20 18:36:35','criação','criação de novo usuário'),(28,13,'2007-06-20 18:37:10','Envio de SMS','Por favor atenda na hora que tocar'),(29,14,'2007-06-20 18:44:37','criação','criação de novo usuário'),(30,14,'2007-06-20 18:48:05','Envio de SMS','teste envio mensagem com persistencia de log e verificacao de retorno'),(31,14,'2007-06-20 18:52:18','Envio de SMS','teste envio mensagem com persistencia de log e verificacao de retorno'),(32,14,'2007-06-20 18:54:40','Envio de SMS','teste de envio de msg'),(33,14,'2007-06-20 18:55:05','Envio de SMS','teste envio mensagem'),(34,14,'2007-06-20 18:58:51','Envio de Voice SMS','Ola isso e um teste'),(35,10,'2007-06-20 20:00:01','Envio de SMS','Nvoip mensagem de teste sistema'),(36,10,'2007-06-20 20:00:55','Envio de SMS','Nvoip mensagem de teste sistema'),(37,10,'2007-06-20 20:01:42','Envio de Voice SMS','Ola isso e um teste'),(38,14,'2007-06-20 21:08:50','Envio de SMS','Boa noite, este e um teste do sistema.'),(39,6,'2007-06-20 21:16:09','Seleção','Cliente foi selecionado'),(40,6,'2007-06-20 22:35:02','Exclusão','Exclusão de cadastro de cliente'),(41,8,'2007-06-20 22:37:53','Exclusão','Exclusão de cadastro de cliente'),(42,13,'2007-06-20 22:39:51','Exclusão','Exclusão de cadastro de cliente'),(43,14,'2007-06-20 22:43:15','Exclusão','Exclusão de cadastro de cliente'),(44,5,'2007-06-20 22:43:19','Exclusão','Exclusão de cadastro de cliente'),(45,5,'2007-06-20 22:43:24','Exclusão','Exclusão de cadastro de cliente'),(46,10,'2007-06-20 22:45:14','Envio de SMS','Envio de mensagem.');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'app-msg-nvoip'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-07 19:47:22
