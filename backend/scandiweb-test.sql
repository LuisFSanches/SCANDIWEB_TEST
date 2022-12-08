CREATE DATABASE IF NOT EXISTS scandiweb-test;

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(250) NOT NULL,
  `price` FLOAT(10,2) NOT NULL,
  `sku` VARCHAR(100) UNIQUE NOT NULL,
  `type` VARCHAR(100) NOT NULL,
  `size` INTEGER(10),
  `weight` FLOAT(10,2),
  `height` FLOAT(10,2),
  `width` FLOAT(10,2),
  `length` FLOAT(10,2),
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)