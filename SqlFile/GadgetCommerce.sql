-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2019 at 01:48 PM
-- Server version: 10.1.41-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GadgetCommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category`(
  `Id` int(11) AUTO_INCREMENT NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Slug` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Admin`(
    `Id` int(11) AUTO_INCREMENT NOT NULL,
    `Username` varchar(50) NOT NULL,
    `Password` varchar(255) NOT NULL,
    `UserRole` int(11),
    `Email` varchar(255) NOT NULL,
    `FirstName` varchar(255) NOT NULL,
    `LastName` varchar(255) NOT NULL,
    `LastLogin` varchar(255) ,
    `LastLoginIpAddress` varchar(255) ,
    PRIMARY KEY(Id)
);
---Table Structure for table Product

CREATE TABLE `Product`(
  `Id` int(11) AUTO_INCREMENT NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductSlug` varchar(255) NOT NULL,
  `ProductSku` varchar(255),
  `ProductPrice` int(50),
  `ProductImage` varchar(255),
  PRIMARY KEY(Id)
);

---Table Structure for table Customer ---
CREATE TABLE `Customer`(
  `Id` int(11) AUTO_INCREMENT NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `LastLogin` varchar(255),
  `LastLoginIpAddress` varchar(255),
  PRIMARY KEY(Id)
);

---Table Structure for table cart ---
CREATE TABLE `Cart`(
  `CartId` int(11) AUTO_INCREMENT NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  PRIMARY KEY(CartId)
);


---Table Structure for table Orders ---
CREATE TABLE `Orders`(
  `Id` int(11) AUTO_INCREMENT NOT NULL,
  `ProductId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `PayemntMethod` varchar(255) NOT NULL,
  `ShippingAddress` varchar(255) NOT NULL,
  `BillingAddress` varchar(255) NOT NULL,
  `OrderStatus` varchar(255) NOT NULL,
  PRIMARY KEY(Id)
);
