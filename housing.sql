-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2019 at 02:48 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `housing`
--

DROP TABLE IF EXISTS `housing`;
CREATE TABLE IF NOT EXISTS `housing` (
  `id_housing` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(45) NOT NULL,
  `pc` int(5) NOT NULL,
  `area` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` varchar(45) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_housing`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `housing`
--

INSERT INTO `housing` (`id_housing`, `title`, `address`, `city`, `pc`, `area`, `price`, `photo`, `type`, `description`) VALUES
(1, 'test_house', '2840 S Juneau St', 'Seattle', 1856, 200, 170000, 'bungalow.jpg', 'Bungalow', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac porta leo. Nunc sit amet imperdiet ante, vitae mollis dolor. Maecenas facilisis ligula ligula, nec pulvinar lacus aliquet in. Nam rutrum consectetur felis, a mattis erat accumsan ut. Sed tristique iaculis nulla. Vivamus ultrices enim tempus enim mattis convallis. Donec in suscipit elit, eu venenatis nunc.\r\n\r\n\r\n'),
(2, 'Home', '20 Rue Evrard Ketten', 'Luxembourg', 1856, 80, 320555, 'flat.jpg', 'Flat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac porta leo. Nunc sit amet imperdiet ante, vitae mollis dolor. Maecenas facilisis ligula ligula, nec pulvinar lacus aliquet in. Nam rutrum consectetur felis, a mattis erat accumsan ut. Sed tristique iaculis nulla. Vivamus ultrices enim tempus enim mattis convallis. Donec in suscipit elit, eu venenatis nunc.\r\n'),
(3, 'New Home', '16 Rue du Luxembourg', 'Grevenmacher', 1856, 150, 500555, 'flat.jpg', 'Semi-Detached', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac porta leo. Nunc sit amet imperdiet ante, vitae mollis dolor. Maecenas facilisis ligula ligula, nec pulvinar lacus aliquet in. Nam rutrum consectetur felis, a mattis erat accumsan ut. Sed tristique iaculis nulla. Vivamus ultrices enim tempus enim mattis convallis. Donec in suscipit elit, eu venenatis nunc.\r\n\r\n');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
