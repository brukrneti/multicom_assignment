-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2017 at 10:28 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voice_code`
--

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offerID` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `customer` varchar(45) DEFAULT NULL,
  `contact_name` varchar(45) DEFAULT NULL,
  `total` decimal(11,2) DEFAULT NULL,
  `dateSent` date DEFAULT NULL,
  `createdBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offers_has_products`
--

CREATE TABLE `offers_has_products` (
  `offerID` int(11) NOT NULL,
  `productID` int(10) NOT NULL,
  `discount_percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(10) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `dateAdded` date DEFAULT NULL,
  `status` varchar(10) DEFAULT 'created'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `code`, `description`, `price`, `dateAdded`, `status`) VALUES
(1, 'Product nam e', 'jsk2ssad21221aasd2cas21ds12das21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis scelerisque tellus a nibh pretium, ac scelerisque dui imperdiet.', '4523.12', '2017-02-06', 'created'),
(2, 'Product name 2', 'qr3oonrq3rnoonrq3q3rnonor31r31nw', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis scelerisque tellus a nibh pretium, ac scelerisque dui imperdiet.', '3123.12', '2017-02-06', 'created'),
(3, 'Product name 3', 'k5jf948s91221aasd2cas21ds1a2ds21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis scelerisque tellus a nibh pretium, ac scelerisque dui imperdiet.', '7222.18', '2017-02-06', 'created'),
(4, 'Product name 4', 'k4jdk3leprnoonrq3q3rnonor31r31nw', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis scelerisque tellus a nibh pretium, ac scelerisque dui imperdiet.', '5821.00', '2017-02-06', 'created'),
(5, 'Product name 5', 'k5jf948s91221aasd2cas21ds1a2ds21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis scelerisque tellus a nibh pretium, ac scelerisque dui imperdiet.', '5393.18', '2017-02-07', 'created'),
(6, 'Product name 6', '9kzghhtfeddoonrq3q3rnonor31r31nw', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis scelerisque tellus a nibh pretium, ac scelerisque dui imperdiet.', '5921.12', '2017-02-07', 'created');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `registrationDate` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT 'registered',
  `failedLogins` int(11) DEFAULT '0',
  `userType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `surname`, `username`, `password`, `email`, `registrationDate`, `status`, `failedLogins`, `userType`) VALUES
(1, 'John', 'Doe', 'johndoe', 'johndoepassword', 'johndoe@gmail.com', '2017-02-06 03:33:48', 'registered', 0, 1),
(2, 'Jane', 'Doe', 'janedoe', 'janedoepassword', 'janedoe@gmail.com', '2017-02-06 03:33:48', 'registered', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `typeID` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`typeID`, `name`) VALUES
(1, 'agent'),
(2, 'salesman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offerID`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD KEY `fk_offers_users1_idx` (`createdBy`);

--
-- Indexes for table `offers_has_products`
--
ALTER TABLE `offers_has_products`
  ADD PRIMARY KEY (`offerID`,`productID`),
  ADD KEY `fk_offers_has_products_products1_idx` (`productID`),
  ADD KEY `fk_offers_has_products_offers1_idx` (`offerID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_users_userTypes_idx` (`userType`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`typeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `fk_offers_users1` FOREIGN KEY (`createdBy`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `offers_has_products`
--
ALTER TABLE `offers_has_products`
  ADD CONSTRAINT `offers_has_products_ibfk_1` FOREIGN KEY (`offerID`) REFERENCES `offers` (`offerID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_has_products_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_userTypes` FOREIGN KEY (`userType`) REFERENCES `usertypes` (`typeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
