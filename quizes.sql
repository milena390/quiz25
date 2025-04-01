CREATE DATABASE  IF NOT EXISTS `db_quiz` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_quiz`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: db_quiz
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `tbl_perguntas`
--

DROP TABLE IF EXISTS `tbl_perguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_perguntas` (
  `id_pergunta` smallint unsigned NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pergunta`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_perguntas`
--

LOCK TABLES `tbl_perguntas` WRITE;
/*!40000 ALTER TABLE `tbl_perguntas` DISABLE KEYS */;
INSERT INTO `tbl_perguntas` VALUES (1,'Qual é o nome do protagonista de Solo Leveling?'),(2,'Qual era o ranking inicial de Sung Jin-Woo antes de se tornar mais forte?'),(3,'Qual o nome do sistema que ajuda Sung Jin-Woo a subir de nível?'),(4,'Quem é a irmã mais nova de Sung Jin-Woo?'),(5,'Qual era a profissão do pai de Sung Jin-Woo antes de desaparecer?'),(6,'Qual é a cor dos portais mais perigosos no mundo de Solo Leveling?'),(7,'Qual foi a primeira guilda que Yoo Jin-Ho tentou se juntar?'),(8,'O que é uma Dungeon Break?'),(9,'Quem é Cha Hae-In?'),(10,'O que Sung Jin-Woo encontra no Templo de Cártia?'),(11,'Qual é o apelido de Sung Jin-Woo depois que ele se torna poderoso?'),(12,'Como Sung Jin-Woo ajuda sua mãe?'),(13,'Qual é a arma principal usada por Igris, a sombra leal de Sung Jin-Woo?'),(14,'Qual palavra é usada por Sung Jin-Woo para extrair as sombras dos monstros?'),(15,'Por que Sung Jin-Woo decide criar sua própria guilda?');
/*!40000 ALTER TABLE `tbl_perguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ranking`
--

DROP TABLE IF EXISTS `tbl_ranking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ranking` (
  `usuario_id` int unsigned NOT NULL AUTO_INCREMENT,
  `total` int NOT NULL DEFAULT '0',
  `nome_usuario` varchar(100) NOT NULL,
  `tbl_usuario_usuario_id` int unsigned NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `id_UNIQUE` (`usuario_id`),
  UNIQUE KEY `total_UNIQUE` (`total`),
  UNIQUE KEY `nome_UNIQUE` (`nome_usuario`),
  KEY `fk_tbl_ranking_tbl_usuario_idx` (`tbl_usuario_usuario_id`),
  CONSTRAINT `fk_tbl_ranking_tbl_usuario` FOREIGN KEY (`tbl_usuario_usuario_id`) REFERENCES `tbl_usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ranking`
--

LOCK TABLES `tbl_ranking` WRITE;
/*!40000 ALTER TABLE `tbl_ranking` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ranking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_resposta_certa`
--

DROP TABLE IF EXISTS `tbl_resposta_certa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_resposta_certa` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `resposta_certa` varchar(255) NOT NULL,
  `tbl_perguntas_id_pergunta` smallint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_resposta_certa_tbl_perguntas1_idx` (`tbl_perguntas_id_pergunta`),
  CONSTRAINT `fk_tbl_resposta_certa_tbl_perguntas1` FOREIGN KEY (`tbl_perguntas_id_pergunta`) REFERENCES `tbl_perguntas` (`id_pergunta`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_resposta_certa`
--

LOCK TABLES `tbl_resposta_certa` WRITE;
/*!40000 ALTER TABLE `tbl_resposta_certa` DISABLE KEYS */;
INSERT INTO `tbl_resposta_certa` VALUES (1,'Sung Jin-Woo',1),(2,'Rank-E',2),(3,'Sistema de jogadores',3),(4,'Jin-Ah',4),(5,'Bombeiro',5),(6,'Vermelho',6),(7,'White Tiger',7),(8,'Quando monstros escapam de uma Dungeon',8),(9,'Uma caçadora rank-s',9),(10,'O sistema',10),(11,'O jogador',11),(12,'Ele encontra a cura para a sua doença',12),(13,'Espada longo',13),(14,'Erga-se',14),(15,'Para explorar Dungeons sozinho',15);
/*!40000 ALTER TABLE `tbl_resposta_certa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_resposta_errada`
--

DROP TABLE IF EXISTS `tbl_resposta_errada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_resposta_errada` (
  `id_errada` smallint unsigned NOT NULL AUTO_INCREMENT,
  `resposta_errada` varchar(255) NOT NULL,
  `tbl_perguntas_id_pergunta` smallint unsigned NOT NULL,
  PRIMARY KEY (`id_errada`),
  KEY `fk_tbl_resposta_errada_tbl_perguntas1_idx` (`tbl_perguntas_id_pergunta`),
  CONSTRAINT `fk_tbl_resposta_errada_tbl_perguntas1` FOREIGN KEY (`tbl_perguntas_id_pergunta`) REFERENCES `tbl_perguntas` (`id_pergunta`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_resposta_errada`
--

LOCK TABLES `tbl_resposta_errada` WRITE;
/*!40000 ALTER TABLE `tbl_resposta_errada` DISABLE KEYS */;
INSERT INTO `tbl_resposta_errada` VALUES (1,'Cha Hae-in',1),(2,'Yoo Jin-Ho',1),(3,'Baek Yoon-Ho',1),(4,'Rank-C',2),(5,' Rank-B',2),(6,'Rank-F',2),(7,'Sistema de Monarcas',3),(8,'Sistema de Caçadores',3),(9,'Sistema Sombrio',3),(10,'Ji-Hye',4),(11,'Sun-Hee',4),(12,'Min-Ji',4),(13,'Cientista',5),(14,'Operário',5),(15,'Engenheiro',5),(16,'Azul',6),(17,'Branco',6),(18,'Preto',6),(19,'Hunters',7),(20,'Ahjin',7),(21,'Blue Dragon',7),(22,'Quando os caçadores desistem de uma Dungeon',8),(23,'Quando uma Dungeon desaparece',8),(24,'Quando uma Dungeon é fechada permanentemente',8),(25,'Líder de uma guilda rival',9),(26,'Uma amiga de infância de Sung Jin Woo',9),(27,'Uma invocação das sombras',9),(28,'Uma chave mágica',10),(29,'O rei das sombras',10),(30,'Uma Dungeon oculta',10),(31,'Caçador solitário',11),(32,'Monarca imortal',11),(33,'Assassino das sombras',11),(34,'Ele paga um hospital de luxo',12),(35,'Ele a proteje dos monstros',12),(36,'Ele usa seus poderes para regenerá-la',12),(37,'Machado longo',13),(38,'Arco mágico',13),(39,'Lança das sombria',13),(40,'Levante-se',14),(41,'Venha',14),(42,'Sombra',14),(43,'Para proteger sua família',15),(44,'Para se tornar rico',15),(45,'Para evitar trabalhar com guildas corruptas',15);
/*!40000 ALTER TABLE `tbl_resposta_errada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuario` (
  `usuario_id` int unsigned NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `id_UNIQUE` (`usuario_id`),
  UNIQUE KEY `senha_UNIQUE` (`senha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_resposta`
--

DROP TABLE IF EXISTS `temp_resposta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temp_resposta` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `total_certas` tinyint unsigned NOT NULL,
  `tbl_usuario_usuario_id` int unsigned NOT NULL,
  `finalizado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_temp_resposta_tbl_usuario1_idx` (`tbl_usuario_usuario_id`),
  CONSTRAINT `fk_temp_resposta_tbl_usuario1` FOREIGN KEY (`tbl_usuario_usuario_id`) REFERENCES `tbl_usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_resposta`
--

LOCK TABLES `temp_resposta` WRITE;
/*!40000 ALTER TABLE `temp_resposta` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_resposta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_quiz'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-31 10:54:37
