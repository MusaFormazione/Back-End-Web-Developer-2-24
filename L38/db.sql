-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              8.0.30 - MySQL Community Server - GPL
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database ecommerce-2-24
CREATE DATABASE IF NOT EXISTS `ecommerce-2-24` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ecommerce-2-24`;

-- Dump della struttura di tabella ecommerce-2-24.ordini
CREATE TABLE IF NOT EXISTS `ordini` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ordini_utenti` (`userId`),
  CONSTRAINT `FK_ordini_utenti` FOREIGN KEY (`userId`) REFERENCES `utenti` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce-2-24.ordini: ~2 rows (circa)
INSERT INTO `ordini` (`id`, `userId`, `data`) VALUES
	(1, 4, '2025-05-07'),
	(2, 2, '2025-04-30');

-- Dump della struttura di tabella ecommerce-2-24.ordini_prodotti
CREATE TABLE IF NOT EXISTS `ordini_prodotti` (
  `order_id` int NOT NULL,
  `prodotto_id` int NOT NULL,
  `quantita` int NOT NULL,
  KEY `FK_ordini_prodotti_ordini` (`order_id`),
  KEY `FK_ordini_prodotti_prodotti` (`prodotto_id`),
  CONSTRAINT `FK_ordini_prodotti_ordini` FOREIGN KEY (`order_id`) REFERENCES `ordini` (`id`),
  CONSTRAINT `FK_ordini_prodotti_prodotti` FOREIGN KEY (`prodotto_id`) REFERENCES `prodotti` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce-2-24.ordini_prodotti: ~3 rows (circa)
INSERT INTO `ordini_prodotti` (`order_id`, `prodotto_id`, `quantita`) VALUES
	(1, 3, 2),
	(1, 1, 1),
	(1, 2, 5),
	(2, 2, 1);

-- Dump della struttura di tabella ecommerce-2-24.prodotti
CREATE TABLE IF NOT EXISTS `prodotti` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prezzo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce-2-24.prodotti: ~2 rows (circa)
INSERT INTO `prodotti` (`id`, `nome`, `prezzo`) VALUES
	(1, 'Smartphone', 499.00),
	(2, 'TV', 800.00),
	(3, 'Aspirapolvere', 600.00);

-- Dump della struttura di tabella ecommerce-2-24.ruoli
CREATE TABLE IF NOT EXISTS `ruoli` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce-2-24.ruoli: ~4 rows (circa)
INSERT INTO `ruoli` (`id`, `nome`) VALUES
	(1, 'admin'),
	(2, 'customer'),
	(3, 'superadmin'),
	(4, 'affiliate');

-- Dump della struttura di tabella ecommerce-2-24.utenti
CREATE TABLE IF NOT EXISTS `utenti` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cognome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ruoloId` int NOT NULL DEFAULT '4',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `FK__ruoli` (`ruoloId`),
  CONSTRAINT `FK__ruoli` FOREIGN KEY (`ruoloId`) REFERENCES `ruoli` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce-2-24.utenti: ~4 rows (circa)
INSERT INTO `utenti` (`id`, `nome`, `cognome`, `email`, `ruoloId`) VALUES
	(1, 'Mario', 'Rossi', 'mario@rossi.it', 3),
	(2, 'Giovanna', 'Verdi', 'giovanna@verdi.it', 1),
	(3, 'Valter', 'Bianchi', 'valter@bianchi.it', 2),
	(4, 'Giacomo', 'Verdi', 'giacomo@verdi.it', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
