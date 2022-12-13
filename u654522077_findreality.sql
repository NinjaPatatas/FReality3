-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 01:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findreality`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Category` text NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Category`, `picture`) VALUES
(1, 'Single-Family Homes', 'cat-1.jpg'),
(2, 'Semi-Detached Homes', 'cat-2.jpg'),
(3, 'Multi-Family Homes', 'cat-3.jpg'),
(4, 'Tinyhomes', 'cat-4.jpg'),
(5, 'Apartments', 'cat-5.jpg'),
(6, 'Condominiums', 'cat-6.jpg'),
(7, 'Co-ops', 'cat-7.jpg'),
(8, 'TinyHomes', 'cat-8.jpg'),
(9, 'Manufacture Homes', 'cat-9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dreamlist`
--

CREATE TABLE `dreamlist` (
  `ID` int(11) NOT NULL,
  `userID` text NOT NULL,
  `HouseID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dreamlist`
--

INSERT INTO `dreamlist` (`ID`, `userID`, `HouseID`) VALUES
(6, '6', '2');

-- --------------------------------------------------------

--
-- Table structure for table `houseinfo`
--

CREATE TABLE `houseinfo` (
  `ID` int(10) NOT NULL,
  `HouseName` text DEFAULT NULL,
  `Rating` text DEFAULT NULL,
  `PreviousPrice` double DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `ProductDetail` text DEFAULT NULL,
  `ProductDescription` text DEFAULT NULL,
  `Preview1` text DEFAULT NULL,
  `Preview2` text DEFAULT NULL,
  `Preview3` text DEFAULT NULL,
  `Preview4` text DEFAULT NULL,
  `Preview5` text DEFAULT NULL,
  `Style` text NOT NULL,
  `Category` text NOT NULL,
  `Status` text NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houseinfo`
--

INSERT INTO `houseinfo` (`ID`, `HouseName`, `Rating`, `PreviousPrice`, `Price`, `ProductDetail`, `ProductDescription`, `Preview1`, `Preview2`, `Preview3`, `Preview4`, `Preview5`, `Style`, `Category`, `Status`) VALUES
(1, 'Modern House Design', '4.5', 500000, 320000, 'Location: Ayala Westgrove Heights, Carmen, Silang, Cavite, Calabarzon, 4118, Philippines. Property Size: 392 sq meters. 3 Bathrooms 2 Garages.', 'Residential House. New exclusive listing for sale in Ayala Westgrove Heights. An unfurnished 3 bedroom, 3 bathroom house and lot with Maids room and Powder Room. It is a 2-storey high ceiling house with a lanai on the side and front of the house perfect for family gatherings and a multi-purpose lanai on the second floor. Master bedroom is on the ground floor with a walk-in closet, its own bathroom, and a library that can also be converted to a mini office. Property is also near the main gate', 'h1p1.jpg', 'h1p2.jpg', 'h1p3.jpg', 'h1p4.jpg', 'h1p5.jpg', 'Contemporary Style', 'Manufacture Homes', 'Available'),
(2, 'Bungalow House', '5', 100000, 75000, 'Location: 1 Ormoc St., Philam Homes, Quezon City, Lot area: 429 sqm. Floor area: 400 sqm. ', '3 bedrooms, Drivers quarters, Maids quarters, 2 toilet and bath', 'h2p1.jpg', 'h2p2.jpg', 'h2p3.jpg', 'h2p4.jpg', 'h2p5.jpg', 'Ranch Style', 'Single-Family Homes', 'Available'),
(3, 'House Mansion', '4', 40000, 20000, 'Location: Moonwalk, Paranaque,  Lot area: 890 sqm. Floor area: 650 sqm. ', 'Newly Renovated House For Rent in Multinational. 7 Bedrooms, 2 Maids Bedrooms, 9 Toilet and Bath PPR Powered with Multi Point Water Heaters and new designer Tiles. Living, Dining, Kitchen and Spacious Lawn. 10-12 Car Garage. All Bedrooms, Living Room and Dining Room with Inverter Aircons saving 50-60percent Electricity. With Lap Pool at the Back Lawn.', 'h3p1.jpg', 'h3p2.jpg', 'h3p3.jpg', 'h3p4.jpg', 'h3p5.jpg', 'Victorian Style', 'Multi-Family Homes', 'Available'),
(4, 'House with Attic', '5', 600000, 60000, 'Location: PHASE 1 BLOCK 2 LOT 5 BANYAN ST LOMA, BINAN, Lot area: 275 sqm. Floor area: 249 sqm. ', 'Address: 9 Banyan St. (Phase 1) Verdana Homes Mamplasan, Brgy. Loma, Binan, Laguna (Nice location: Across the playground/clubhouse and near 2 gates with underground electric utility) , Inclusions: Fully Furnished (Sofa set, 8-Seater Dining Table, Gas Stove, Samsung smart oven, Sharp 4-Door Ref, 1 king-sized bed, 1 pullout twin bed, 1 queen-sized day bed, Washing Machine, 2 Outdoor bench w/ storage) 3BRs + 2T&Bs + Powder Room + Maids Room w/ T&B + Attic Room + 2-Car Garage  \nNote: Lessor prohibits smoking and dogs.', 'h4p1.jpg', 'h4p2.jpg', 'h4p3.jpg', 'h4p4.jpg', 'h4p5.jpg', 'Modern Farmhouse', 'Tinyhomes', 'Available'),
(5, 'Village House', '4.5', 30000, 3000, 'Location: MCKINLEY HILL, TAGUIG, Lot area: 338 sqm. Floor area: 192 sqm. ', 'FOR LEASE: Mckinley Hill Village, Brand new architect built house Semi furnished 3BR Each BR with own TandB and walk in closet Den with powder room Kitchen and dirty kitchen\nTwo terraces and 1 balcony Maids room with TandB Drivers room with TandB 2-3 car garage', 'h5p1.jpg', 'h5p2.jpg', 'h5p3.jpg', 'h5p4.jpg', 'h5p5.jpg', 'Tudor Style', 'Semi-Detached Homes', 'Available'),
(6, 'Rest House', '5', 150000, 100000, 'Location: PASINAY ROAD, IBIS, BAGAC, Lot area: 714 sqm. Floor area: 3369 sqm. ', 'Located at Pasinay Rd. MONTEMAR VILLAGE, near Montemar Beach Club, in Brgy. Ibis, Bagac, Bataan. 2 Adjacent Titles each w/ House and Lot --With L shaped Pool  (kiddie  up to 5 feet) Main House is 2-Storey with Attic. Ground floor with living dining, kitchen, guest room. Shower room and toilet. 2nd floor has 2 big rooms each with toilet and bath. 4 BR, 4 Toilet and 1 powder room, with big Hall, dining, Kitchen, Balcony and garage area', 'h6p1.jpg', 'h6p2.jpg', 'h6p3.jpg', 'h6p4.jpg', 'h6p5.jpg', 'Cape Cod Style', 'Apartments', 'Rented'),
(7, 'Greenhills Village House', '5', 300000, 200000, 'Location: WACK-WACK GREENHILLS, MANDALUYONG, Lot area: 349 sqm. Floor area: 600 sqm. ', '4 Bedrooms + Guest Room on Ground Floor, 5.5 Bathrooms, Small Lap Pool and Garden, Semi furnished with AC and Induction Stove Top with Exhaust', 'h7p1.jpg', 'h7p2.jpg', 'h7p3.jpg', 'h7p4.jpg', 'h7p5.jpg', 'Colonial Style', 'Condominiums', 'Rented'),
(8, 'Village House Muntinlupa', '4', 300000, 200000, 'Location: AYALA ALABANG, MUNTINLUPA Lot area: 293 sqm. Floor area: 885 sqm. ', 'CORNER PROPERTY with Swimming Pool and Garden 4 bedroom 3 Toilet and bath 1 Powder room 1 Maids room (w/ toilet and bath)', 'h8p1.jpg', 'h8p2.jpg', 'h8p3.jpg', 'h8p4.jpg', 'h8p5.jpg', 'Mediterranean Style', 'Co-Ops', 'Rented'),
(9, 'Bedroom House Pool', '4', 230000, 23000, 'Location: AYALA ALABANG, MUNTINLUPA Lot area: 400 sqm. Floor area: 664 sqm. ', '4 Bedrooms 4 Toilet and Bath With swimming pool Garden Maids Quarters Parking for 2 cars or 3 small cars Semi-furnished', 'h9p1.jpg', 'h9p2.jpg', 'h9p3.jpg', 'h9p4.jpg', 'h9p5.jpg', 'Contemporary Style', 'Townhomes', 'Available'),
(10, 'Swimming Pool and Garden', '5', 3000000, 2000000, 'Location: BEL-AIR, MAKATI Lot area: 500 sqm. Floor area: 510 sqm. ', '4 Spacious Bedroom with TandB Fully-equipped kitchen and Dirty Kitchen Maids room Big balcony Maids room with own TandB 5 to 6 car garage', 'h10p1.jpg', 'h10p2.jpg', 'h10p3.jpg', 'h10p4.jpg', 'h10p5.jpg', 'Modern Farmhouse', 'Manufacture Homes', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `HouseID` int(11) NOT NULL,
  `Review` text NOT NULL,
  `ReviewerName` text NOT NULL,
  `Rating` text NOT NULL,
  `Date` text NOT NULL,
  `Email` text NOT NULL,
  `Picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `HouseID`, `Review`, `ReviewerName`, `Rating`, `Date`, `Email`, `Picture`) VALUES
(1, 5, 'asdasdadad', 'aaaa', '1', '12/12/22', 'johngemsonl@gmail.com', ''),
(2, 5, 'sadasd', '343', '2.5', '12/12/22', 'johngemsonl@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `ID` int(11) NOT NULL,
  `Style` text NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`ID`, `Style`, `picture`) VALUES
(1, 'Ranch Style', 'product-1.jpg'),
(2, 'Cape Cod Style', 'product-2.jpg'),
(3, 'Colonial Style', 'product-3.jpg'),
(4, 'Victorian Style', 'product-4.jpg'),
(5, 'Tudor Style', 'product-5.jpg'),
(6, 'Mediterranean Style', 'product-6.jpg'),
(7, 'Contemporary Style', 'product-7.jpg'),
(8, 'Modern Farmhouse', 'product-8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `ID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `houseid` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Email` text NOT NULL,
  `MobileNum` text NOT NULL,
  `RepFname` text NOT NULL,
  `RepLname` text NOT NULL,
  `RepMail` text NOT NULL,
  `RepMobile` text NOT NULL,
  `RepRelation` text NOT NULL,
  `AdmissionDate` text NOT NULL,
  `Deposit` int(11) NOT NULL,
  `Payment` int(11) NOT NULL,
  `NextPayment` text NOT NULL,
  `Status` text NOT NULL,
  `PaymentType` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`ID`, `userid`, `houseid`, `FirstName`, `LastName`, `Email`, `MobileNum`, `RepFname`, `RepLname`, `RepMail`, `RepMobile`, `RepRelation`, `AdmissionDate`, `Deposit`, `Payment`, `NextPayment`, `Status`, `PaymentType`) VALUES
(3, 6, 8, 'Ninja', 'Patatas', 'aaa', '12321321', 'a', 'a', 'a@aa', 'a', 'aa', '12/12/22', 100000, 270000, '01/12/23', '', 'BankTransfer'),
(4, 6, 7, 'Ninja', 'Patatas', 'aaa', '12321321', '', '', '', '', '', '12/12/22', 100000, 270000, '01/12/23', '', 'Paypal'),
(5, 6, 6, 'Ninja', 'Patatas', 'aaa', '12321321', '', '', '', '', '', '12/12/22', 50000, 135000, '01/12/23', '', 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `translist`
--

CREATE TABLE `translist` (
  `ID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `houseid` int(11) NOT NULL,
  `Payment` int(11) NOT NULL,
  `PaymentDate` text NOT NULL,
  `NextPayment` text NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `translist`
--

INSERT INTO `translist` (`ID`, `userid`, `houseid`, `Payment`, `PaymentDate`, `NextPayment`, `Status`) VALUES
(1, 6, 7, 135000, '12/12/22', '01/12/23', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `password` text NOT NULL,
  `role` text NOT NULL,
  `Email` text NOT NULL,
  `LastName` text NOT NULL,
  `FirstName` text NOT NULL,
  `MobileNumber` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`password`, `role`, `Email`, `LastName`, `FirstName`, `MobileNumber`, `ID`, `username`) VALUES
('a', 'a', 'a', 'a', 'a', 'a', 1, 'a'),
('admin', 'user', 'johngemsonl@gmail.com', 'Laude', 'John', '09471841364', 5, 'admin'),
('123', 'user', 'aaa', 'Patatas', 'Ninja', '12321321', 6, 'NinjaPatatas'),
('m', 'user', 'm@m', 'm', 'm', 'm123', 7, 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dreamlist`
--
ALTER TABLE `dreamlist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `houseinfo`
--
ALTER TABLE `houseinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `translist`
--
ALTER TABLE `translist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userid` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dreamlist`
--
ALTER TABLE `dreamlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `translist`
--
ALTER TABLE `translist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
