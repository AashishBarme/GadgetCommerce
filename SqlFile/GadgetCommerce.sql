
-- Database: `GadgetCommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE IF NOT EXISTS `Category`(
  `Id` int(11) AUTO_INCREMENT NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Slug` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (Id)
);

CREATE TABLE IF NOT EXISTS `Admin`(
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
-- Table Structure for table Product

CREATE TABLE IF NOT EXISTS `Product`(
  `Id` int(11) AUTO_INCREMENT NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductSlug` varchar(255) NOT NULL,
  `ProductSku` varchar(255),
  `ProductPrice` int(50),
  `ProductImage` varchar(255),
  PRIMARY KEY(Id)
);

-- Table Structure for table Customer ---
CREATE TABLE IF NOT EXISTS `Customer`(
  `Id` int(11) AUTO_INCREMENT NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `LastLogin` varchar(255),
  `LastLoginIpAddress` varchar(255),
  PRIMARY KEY(Id)
);

-- Table Structure for table cart ---
CREATE TABLE IF NOT EXISTS `Cart`(
  `CartId` int(11) AUTO_INCREMENT NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  PRIMARY KEY(CartId)
);


-- Table Structure for table Orders ---
CREATE TABLE IF NOT EXISTS `Orders`(
  `Id` int(11) AUTO_INCREMENT NOT NULL,
  `ProductId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `PayemntMethod` varchar(255) NOT NULL,
  `ShippingAddress` varchar(255) NOT NULL,
  `BillingAddress` varchar(255) NOT NULL,
  `OrderStatus` varchar(255) NOT NULL,
  PRIMARY KEY(Id)
);
