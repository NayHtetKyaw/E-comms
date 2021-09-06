-- -------------------------------------------------------------
-- TablePlus 4.1.2(382)
--
-- https://tableplus.com/
--
-- Database: Ecomm
-- Generation Time: 2021-09-06 07:25:56.1270
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `full_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `Customers` (
  `idCustomer` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL,
  `billing_address` varchar(45) DEFAULT NULL,
  `country` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  PRIMARY KEY (`idCustomer`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `customer` int NOT NULL,
  `product_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `quentity` int NOT NULL,
  `payment` int NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_idx` (`customer`),
  KEY `payment_idx` (`payment`),
  CONSTRAINT `customer` FOREIGN KEY (`customer`) REFERENCES `Customers` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `payment` FOREIGN KEY (`payment`) REFERENCES `Payments` (`idPayment`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `Payments` (
  `idPayment` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `cardNo` varchar(20) NOT NULL,
  `Customer_Name` varchar(45) NOT NULL,
  `method` varchar(45) NOT NULL,
  PRIMARY KEY (`idPayment`),
  KEY `idCustomer_idx` (`customer_id`),
  CONSTRAINT `idCustomer` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `Products` (
  `idProduct` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `image` blob,
  `category` varchar(50) NOT NULL,
  `stock` varchar(45) NOT NULL,
  PRIMARY KEY (`idProduct`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `admin` (`id`, `username`, `full_name`, `password`, `email`, `phone`) VALUES
(10, 'anascence', 'nay htet kyaw', '0d8b1ed24d65e738d49c6acd61378677', 'nayhtetkyaw86@gmail.com', '+959778116588'),
(11, 'lexi', 'lexi kay kaing', '5878236d40a1f4093c07b4506b2d7a2c', 'lexi@gmail.com', '+959452832325');

INSERT INTO `Customers` (`idCustomer`, `username`, `email`, `password`, `full_name`, `address`, `billing_address`, `country`, `phone`) VALUES
(6, 'Lia Lia', 'julia@gmail.com', 'e5cc25ff87966e935ace60a9621648d0', 'Julia', 'Souel, Hanan street, No.34B', 'Souel, Hanan street, No.34B', 'korea', '+7823258293245'),
(7, 'Yuna', 'Yuna@gmail.com', 'yunaitzy', 'ITZY Yuna ', 'Souel, Marne street, No.2A', 'Souel, Marne street, No.2A', 'korea', '+78340238579342'),
(8, 'nancy', 'nancy@gmail.com', '36d6907e8d425176e638e77badc1dc71', 'Nancy Drew Bieber', 'New York, street 23, no.23', 'New York, street 23, no.23', 'United States', '+14933239923'),
(10, 'Yuan', 'yuan@gmail.com', '900bc885d7553375aec470198a9514f3', 'yuan yuan', 'Yangon, Bouk Htaw, No, 78', '', 'Myanmar', '097834327353'),
(11, 'Lenny', 'lenny@gmail.com', 'd6e4b0172bb812a912daa9edf88f2830', 'Sad Lenny', 'Yangon,Thingangyune, No, 734', '', 'Myanmar', '09456482583853'),
(12, 'Well', 'well@gmail.com', 'f9323f5b51fc23e30c10623bd38de6ff', 'Well Sure', 'Yangon', 'Yangon', 'Myanmar', '0998463749374');

INSERT INTO `orders` (`order_id`, `customer`, `product_id`, `amount`, `quentity`, `payment`) VALUES
(6, 10, 77, 99.00, 3, 5),
(7, 10, 88, 177.04, 2, 5),
(11, 10, 83, 341.00, 1, 6),
(12, 10, 83, 341.00, 1, 6);

INSERT INTO `Payments` (`idPayment`, `customer_id`, `cardNo`, `Customer_Name`, `method`) VALUES
(2, 10, '73957384975353', 'Yuan', 'VISA'),
(5, 10, '73957384975353', 'Yuan', 'VISA'),
(6, 10, '6934897309430535', 'Yuan', 'VISA CARD');

INSERT INTO `Products` (`idProduct`, `name`, `price`, `description`, `image`, `category`, `stock`) VALUES
(77, 'Tea Table ', '33', 'smooth and strong', '328694-tea-table.jpeg', 'Table', '89'),
(81, 'Chair M3', '18', 'smooth and strong', '612656-index.jpeg', 'chair', '14'),
(82, 'Sofa-NC32', '180.32', 'Soft And Comfy', '668254-cabell-70-square-arms-sofa-bed-70-sofa-l-c7f112b3ea5c384c.jpg', 'Sofa', '90'),
(83, 'Sofa-M82', '341', 'Soft and Comfy', '745875-low-price-high-quality-sectional-sofa-leather-modern-italian-leather-sofa.jpg.webp', 'Sofa', '34'),
(84, 'Chair-OF52', '85', 'Soft, Comfy and Strong', '852838-mid-back-executive-office-chair-with-arms-fl3836g-u.jpg', 'Office Chair', '65'),
(86, 'Bed LH-001', '532.35', 'Strong wooden bed with long head', '889432-bed.jpeg', 'Bed', '52'),
(87, 'Desk-T23', '102.96', 'Wide and strong ', '508053-tabledesk.jpeg', 'Desk', '87'),
(88, 'Lamp-S16', '88.52', 'Brightness settings included and strong stand', '767114-lamp.jpeg', 'Night Lamp', '106'),
(89, 'Table-ST102', '23.43', 'Strong and Fixable ', '831154-tablestand.jpeg', 'Table Stand', '132'),
(90, 'Table-ST12', '43', '2 feet and 10 inch, Very fixable and Strong', '908201-table-st12.jpeg', 'Stand Table', '201'),
(91, 'Bookshelf -1', '71.23', 'Durable and Strong, many spaces', '92573-book-st.jpeg', 'Shelf', '102'),
(92, 'Table Set ', '153.92', '4 chairs with a wide table', '170191-table-set.jpeg', 'Table Set', '49');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;