-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.9 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5169
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table atm.account
DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_no` int(11) DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_no` (`account_no`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table atm.account: 1 rows
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`id`, `account_no`, `pin`, `name`) VALUES
	(2, 1000, '$2y$10$EqRO81jZvGXGhfa3Fq.mkOCoBKlRmEszUCvpk7ZBORavYMXVxFaNW', 'paul'),
	(3, 1234, '$2y$10$wgzJHB7mrkC9.ZaHAYmYJukfNxPM3il9vPMzyMevTZQbI4.tLIP9i', 'paul');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping structure for table atm.transaction
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_no` int(11) DEFAULT NULL,
  `transaction_type` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table atm.transaction: 12 rows
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` (`id`, `account_no`, `transaction_type`, `amount`, `date`) VALUES
	(13, 1000, 1, 1000.00, '2017-05-03 18:42:44'),
	(2, 1000, 1, 1000.00, '2017-05-03 17:27:05'),
	(3, 1000, 2, 10000.00, '2017-05-03 17:32:50'),
	(4, 1000, 1, 1000.00, '2017-05-03 17:42:54'),
	(5, 1000, 2, 1000.00, '2017-05-03 17:42:54'),
	(6, 1000, 1, 1000.00, '2017-05-03 18:07:36'),
	(7, 1000, 1, 2000.00, '2017-05-03 18:34:18'),
	(8, 1000, 2, 2000.00, '2017-05-03 18:34:27'),
	(9, 1000, 1, 1000.00, '2017-05-03 18:35:24'),
	(10, 1000, 2, 1000.00, '2017-05-03 18:35:24'),
	(11, 1000, 1, 2000.00, '2017-05-03 18:38:57'),
	(12, 1000, 2, 2000.00, '2017-05-03 18:38:57'),
	(14, 1234, 2, 0.00, '2017-05-03 18:57:03'),
	(15, 1234, 2, 0.00, '2017-05-03 19:21:57');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
