CREATE DATABASE `slimapp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `slimapp`;

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO customer
VALUES
(NULL, 'john', 'doe', '44', 'test', 'city', 'idc'),
(NULL, 'jane', 'doe', '44', 'test', 'city', 'idc'),
(NULL, 'bob', 'doe', '44', 'test', 'city', 'idc');

