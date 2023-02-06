-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Jan 24, 2023 at 06:05 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tripifydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(10) NOT NULL,
  `AssignedArea` varchar(45) NOT NULL,
  `nic` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `bedID` int(11) NOT NULL,
  `bedscol` varchar(45) DEFAULT NULL,
  `RoomID` int(10) NOT NULL,
  `HotelID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `ComplaintID` int(11) NOT NULL,
  `BookingID` varchar(45) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Status` varchar(45) NOT NULL,
  `TravelerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guide ads`
--

CREATE TABLE `guide ads` (
  `AdID` varchar(15) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Location` varchar(25) NOT NULL,
  `GuideID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guide bookings`
--

CREATE TABLE `guide bookings` (
  `Traveler_TravelerID` int(10) NOT NULL,
  `Guides_GuideID` int(10) NOT NULL,
  `BookingID` varchar(15) NOT NULL,
  `DateAdded` date NOT NULL,
  `ReservedDate` date NOT NULL,
  `StartingTime` time NOT NULL,
  `FinishingTime` time NOT NULL,
  `PaymentStatus` varchar(15) NOT NULL,
  `PaymentMethod` varchar(45) NOT NULL,
  `Price` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `GuideID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Rate` decimal(7,2) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `Area` varchar(45) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `phone_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guides`
--

INSERT INTO `guides` (`GuideID`, `Name`, `Rate`, `NIC`, `Area`, `bio`, `phone_number`) VALUES
(4, 'Lasindu', '4000.00', '990871604V', 'Kaluthra', 'hi', 764138580);

-- --------------------------------------------------------

--
-- Table structure for table `guide_languages`
--

CREATE TABLE `guide_languages` (
  `guide_id` int(3) NOT NULL,
  `language` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guide_languages`
--

INSERT INTO `guide_languages` (`guide_id`, `language`) VALUES
(4, 'english'),
(4, 'sinhala');

-- --------------------------------------------------------

--
-- Table structure for table `guide_offers`
--

CREATE TABLE `guide_offers` (
  `GuideID` int(10) NOT NULL,
  `RequestsID` int(15) NOT NULL,
  `OfferID` int(15) NOT NULL,
  `HourlyRate` decimal(10,0) NOT NULL,
  `AdditionalDetails` varchar(200) DEFAULT NULL,
  `PaymentMethod` varchar(30) NOT NULL,
  `post_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guide_offers`
--

INSERT INTO `guide_offers` (`GuideID`, `RequestsID`, `OfferID`, `HourlyRate`, `AdditionalDetails`, `PaymentMethod`, `post_at`) VALUES
(4, 1, 1, '4000', 'I can Show Attractive Places around Anuradhapura', 'card', '2022-12-23 09:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `guide_request`
--

CREATE TABLE `guide_request` (
  `RequestsID` int(15) NOT NULL,
  `language` varchar(45) NOT NULL,
  `Location` varchar(25) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `post_at` datetime NOT NULL DEFAULT current_timestamp(),
  `TravelerID` int(10) NOT NULL,
  `caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guide_request`
--

INSERT INTO `guide_request` (`RequestsID`, `language`, `Location`, `Date`, `Time`, `Description`, `post_at`, `TravelerID`, `caption`) VALUES
(1, 'English', 'Anuradhapura', '2022-12-24', '09:00:00', 'Need a Travel from Aruradhapura', '2022-12-23 08:06:07', 1, 'Need a Guide');

-- --------------------------------------------------------

--
-- Table structure for table `hotelreservation`
--

CREATE TABLE `hotelreservation` (
  `HotelID` int(10) NOT NULL,
  `TravelerID` int(10) NOT NULL,
  `PaidDate` date NOT NULL,
  `Price` decimal(2,0) NOT NULL,
  `PaymentMethod` varchar(25) NOT NULL,
  `PaymentStatus` varchar(15) NOT NULL,
  `DateAdded` date NOT NULL,
  `ReservationID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotel review`
--

CREATE TABLE `hotel review` (
  `TravelerID` int(10) NOT NULL,
  `HotelID` int(10) NOT NULL,
  `Rating` decimal(1,0) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `HotelID` int(10) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `no_of_rooms` int(3) NOT NULL,
  `contact_number` int(20) NOT NULL,
  `reg_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`HotelID`, `Name`, `Address`, `no_of_rooms`, `contact_number`, `reg_number`) VALUES
(2, 'Kaveesha Hotel', 'No:84,Mathugama Road,Agalawatta.', 0, 784887168, 'R1234');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MessageID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `TravelerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` varchar(15) NOT NULL,
  `Guides_GuideID` int(10) NOT NULL,
  `Traveler_TravelerID` int(10) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Rating` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` int(10) NOT NULL,
  `NoofBeds` int(11) NOT NULL,
  `RoomType` varchar(20) NOT NULL,
  `NoofGuests` varchar(45) NOT NULL,
  `RoomSize` int(4) NOT NULL,
  `PricePerNight` decimal(8,2) NOT NULL,
  `HotelID` int(10) NOT NULL,
  `no_of_rooms` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `NoofBeds`, `RoomType`, `NoofGuests`, `RoomSize`, `PricePerNight`, `HotelID`, `no_of_rooms`) VALUES
(1, 2, 'Queen Suite', '5', 160, '10000.00', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `taxi ads`
--

CREATE TABLE `taxi ads` (
  `AdID` varchar(15) NOT NULL,
  `VehicleID` varchar(15) NOT NULL,
  `PricePerKm` decimal(2,0) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `AvailableArea` varchar(45) NOT NULL,
  `TaxiOwner_OwnerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taxi drivers`
--

CREATE TABLE `taxi drivers` (
  `TaxiDriverID` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `LicenseNo` int(11) NOT NULL,
  `OwnerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taxi offers`
--

CREATE TABLE `taxi offers` (
  `OwnerID` int(10) NOT NULL,
  `RequestID` int(15) NOT NULL,
  `OfferID` int(15) NOT NULL,
  `VehicleType` varchar(45) NOT NULL,
  `PaymentMethod` varchar(45) NOT NULL,
  `PricePerKm` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taxiowner`
--

CREATE TABLE `taxiowner` (
  `OwnerID` int(10) NOT NULL,
  `NoOfVehicles` int(11) NOT NULL,
  `owner_name` varchar(60) NOT NULL,
  `nic_no` varchar(10) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `contact_number` int(15) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxiowner`
--

INSERT INTO `taxiowner` (`OwnerID`, `NoOfVehicles`, `owner_name`, `nic_no`, `company_name`, `contact_number`, `address`) VALUES
(3, 1, 'Karthikken', '2000178020', 'Karthi Taxi', 784887168, 'No:84,Mathugama Road,Agalawatta.');

-- --------------------------------------------------------

--
-- Table structure for table `taxi reservation`
--

CREATE TABLE `taxi reservation` (
  `Traveler_TravelerID` int(10) NOT NULL,
  `Vehicles_VehicleID` int(5) NOT NULL,
  `ReservationID` varchar(15) NOT NULL,
  `Price` decimal(2,0) NOT NULL,
  `PaymentStatus` varchar(20) NOT NULL,
  `PaymentMethod` varchar(45) NOT NULL,
  `DateAdded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taxi review`
--

CREATE TABLE `taxi review` (
  `TravelerID` int(10) NOT NULL,
  `ReservationID` varchar(15) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Review` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taxi_request`
--

CREATE TABLE `taxi_request` (
  `RequestID` int(15) NOT NULL,
  `Caption` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `StartingTime` time NOT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `TravelerID` int(10) NOT NULL,
  `PickupLocation` varchar(100) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `p_latitude` double DEFAULT NULL,
  `p_longitude` double DEFAULT NULL,
  `d_latitude` double DEFAULT NULL,
  `d_longitude` double DEFAULT NULL,
  `post_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxi_request`
--

INSERT INTO `taxi_request` (`RequestID`, `Caption`, `Date`, `StartingTime`, `Description`, `TravelerID`, `PickupLocation`, `Destination`, `p_latitude`, `p_longitude`, `d_latitude`, `d_longitude`, `post_at`) VALUES
(1, 'Need a Car to Travel to Kandy', '2022-12-25', '09:07:00', 'Need a Car for 4 Passengers', 1, 'Colombo', 'Kandy', 6.897993430326549, 79.94233222656251, 7.2904725916969335, 80.61799140625001, '2022-12-23 02:37:37'),
(2, 'Need a Car to Travel to Kandy', '2022-12-24', '10:43:00', 'Need a Car for 4 Passengers', 5, 'Colombo', 'Kandy', 6.79436751250663, 79.96979804687501, 7.274126028918479, 80.64545722656251, '2022-12-23 04:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `tour bookings`
--

CREATE TABLE `tour bookings` (
  `TourPlanID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tour plans`
--

CREATE TABLE `tour plans` (
  `TourPlanID` varchar(15) NOT NULL,
  `TravelerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `traveler`
--

CREATE TABLE `traveler` (
  `TravelerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traveler`
--

INSERT INTO `traveler` (`TravelerID`) VALUES
(1),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `ContactNo` int(11) DEFAULT NULL,
  `UserType` varchar(30) NOT NULL DEFAULT 'Traveler',
  `otp` int(7) DEFAULT NULL,
  `verification_status` int(2) NOT NULL DEFAULT 0,
  `pw_reset_otp` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Email`, `Password`, `Name`, `ContactNo`, `UserType`, `otp`, `verification_status`, `pw_reset_otp`) VALUES
(1, 'realcricket456@gmail.com', '$2y$10$7JF8/LASwMkTAOrBXhTGluAvI6UUgjtvBExESO4Ic98U13lgnBHQS', 'Saneru', NULL, 'Traveler', 169482, 1, NULL),
(2, 'kaveeshagw@gmail.com', '$2y$10$Vu/sO6LpyFdVK7IfcHJP8uOAgzX.zLgSQjkN4UCVxw/jJpJWW9Z7y', 'Kavessha', NULL, 'Hotel', 656436, 1, 233116),
(3, 'kkarththi15@gmail.com', '$2y$10$i3fuw1ZXXOFiW.CkI3Zr.OOs5TqMNDO3wicSAvMnZ1ceYeK.4f2Ve', 'Karththikeyan', NULL, 'Taxi', 188455, 1, NULL),
(4, 'lasinduwathsan@gmail.com', '$2y$10$zWFvmepuwnMrI/gyElfcT.3n8rsdMZJMkBaJ2l7gvl1YzwOopMXDS', 'Lasindu', NULL, 'Guide', 186741, 1, NULL),
(5, 'sachinumayangana@gmail.com', '$2y$10$lc/5UIQq7QTd6hKsf8BBYebFJf.WLWDS4QICBIbEtw/glfQvkZM/i', 'Sachin', NULL, 'Traveler', 359875, 1, 371499);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `VehicleID` int(5) NOT NULL,
  `Model` varchar(45) NOT NULL,
  `VehicleType` varchar(45) NOT NULL,
  `YearOfProduction` int(11) NOT NULL,
  `OwnerID` int(10) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `no_of_seats` int(2) NOT NULL,
  `price_per_km` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`VehicleID`, `Model`, `VehicleType`, `YearOfProduction`, `OwnerID`, `driver_name`, `vehicle_number`, `area`, `no_of_seats`, `price_per_km`) VALUES
(1, 'bmw', 'Car', 2005, 3, 'Sunil Perera', 'WP-2323', 'colombo', 6, 1000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_guide_offers`
-- (See below for the actual view)
--
CREATE TABLE `v_guide_offers` (
`guide_id` int(10)
,`request_id` int(15)
,`offer_id` int(15)
,`hourlyrate` decimal(10,0)
,`additionaldetails` varchar(200)
,`paymentmethod` varchar(30)
,`offer_at` datetime
,`guidename` varchar(50)
,`guide_number` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_guide_request`
-- (See below for the actual view)
--
CREATE TABLE `v_guide_request` (
`request_id` int(15)
,`p_language` varchar(45)
,`p_location` varchar(25)
,`date` date
,`time` time
,`description` varchar(200)
,`post_at` datetime
,`caption` varchar(255)
,`traveler_id` int(10)
,`name` varchar(45)
,`contact_no` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_taxi_request`
-- (See below for the actual view)
--
CREATE TABLE `v_taxi_request` (
`request_id` int(15)
,`caption` varchar(100)
,`additional_details` varchar(250)
,`date` date
,`time` time
,`pickup_location` varchar(100)
,`destination` varchar(100)
,`p_latitude` double
,`p_longitude` double
,`d_latitude` double
,`d_longitude` double
,`post_at` timestamp
,`traveler_id` int(10)
,`name` varchar(45)
,`contact_no` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_guide_offers`
--
DROP TABLE IF EXISTS `v_guide_offers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_guide_offers`  AS  select `guide_offers`.`GuideID` AS `guide_id`,`guide_offers`.`RequestsID` AS `request_id`,`guide_offers`.`OfferID` AS `offer_id`,`guide_offers`.`HourlyRate` AS `hourlyrate`,`guide_offers`.`AdditionalDetails` AS `additionaldetails`,`guide_offers`.`PaymentMethod` AS `paymentmethod`,`guide_offers`.`post_at` AS `offer_at`,`guides`.`Name` AS `guidename`,`guides`.`phone_number` AS `guide_number` from (`guide_offers` join `guides` on(`guide_offers`.`GuideID` = `guides`.`GuideID`)) order by `guide_offers`.`post_at` ;

-- --------------------------------------------------------

--
-- Structure for view `v_guide_request`
--
DROP TABLE IF EXISTS `v_guide_request`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_guide_request`  AS  select `guide_request`.`RequestsID` AS `request_id`,`guide_request`.`language` AS `p_language`,`guide_request`.`Location` AS `p_location`,`guide_request`.`Date` AS `date`,`guide_request`.`Time` AS `time`,`guide_request`.`Description` AS `description`,`guide_request`.`post_at` AS `post_at`,`guide_request`.`caption` AS `caption`,`users`.`UserID` AS `traveler_id`,`users`.`Name` AS `name`,`users`.`ContactNo` AS `contact_no` from (`guide_request` join `users` on(`guide_request`.`TravelerID` = `users`.`UserID`)) order by `guide_request`.`post_at` ;

-- --------------------------------------------------------

--
-- Structure for view `v_taxi_request`
--
DROP TABLE IF EXISTS `v_taxi_request`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_taxi_request`  AS  select `taxi_request`.`RequestID` AS `request_id`,`taxi_request`.`Caption` AS `caption`,`taxi_request`.`Description` AS `additional_details`,`taxi_request`.`Date` AS `date`,`taxi_request`.`StartingTime` AS `time`,`taxi_request`.`PickupLocation` AS `pickup_location`,`taxi_request`.`Destination` AS `destination`,`taxi_request`.`p_latitude` AS `p_latitude`,`taxi_request`.`p_longitude` AS `p_longitude`,`taxi_request`.`d_latitude` AS `d_latitude`,`taxi_request`.`d_longitude` AS `d_longitude`,`taxi_request`.`post_at` AS `post_at`,`users`.`UserID` AS `traveler_id`,`users`.`Name` AS `name`,`users`.`ContactNo` AS `contact_no` from (`taxi_request` join `users` on(`taxi_request`.`TravelerID` = `users`.`UserID`)) order by `taxi_request`.`post_at` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`bedID`,`RoomID`,`HotelID`),
  ADD KEY `room` (`HotelID`,`RoomID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`ComplaintID`,`TravelerID`),
  ADD KEY `fk_Complaint_Traveler1_idx` (`TravelerID`);

--
-- Indexes for table `guide ads`
--
ALTER TABLE `guide ads`
  ADD PRIMARY KEY (`AdID`,`GuideID`),
  ADD KEY `fk_Guide Ads_Guides1_idx` (`GuideID`);

--
-- Indexes for table `guide bookings`
--
ALTER TABLE `guide bookings`
  ADD PRIMARY KEY (`Traveler_TravelerID`,`Guides_GuideID`,`BookingID`),
  ADD KEY `fk_Traveler_has_Guides_Guides1_idx` (`Guides_GuideID`),
  ADD KEY `fk_Traveler_has_Guides_Traveler1_idx` (`Traveler_TravelerID`);

--
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`GuideID`),
  ADD KEY `GuideID` (`GuideID`);

--
-- Indexes for table `guide_languages`
--
ALTER TABLE `guide_languages`
  ADD PRIMARY KEY (`guide_id`,`language`);

--
-- Indexes for table `guide_offers`
--
ALTER TABLE `guide_offers`
  ADD PRIMARY KEY (`OfferID`) USING BTREE,
  ADD KEY `fk_Guides_has_Guide Requests_Guides1_idx` (`GuideID`),
  ADD KEY `RequestsID` (`RequestsID`);

--
-- Indexes for table `guide_request`
--
ALTER TABLE `guide_request`
  ADD PRIMARY KEY (`RequestsID`,`TravelerID`),
  ADD KEY `fk_Guide Requests_Traveler1_idx` (`TravelerID`);

--
-- Indexes for table `hotelreservation`
--
ALTER TABLE `hotelreservation`
  ADD PRIMARY KEY (`HotelID`,`TravelerID`,`ReservationID`),
  ADD KEY `fk_Hotels_has_Traveler_Traveler1_idx` (`TravelerID`),
  ADD KEY `fk_Hotels_has_Traveler_Hotels1_idx` (`HotelID`);

--
-- Indexes for table `hotel review`
--
ALTER TABLE `hotel review`
  ADD PRIMARY KEY (`TravelerID`,`HotelID`),
  ADD KEY `fk_Traveler_has_Hotels_Hotels1_idx` (`HotelID`),
  ADD KEY `fk_Traveler_has_Hotels_Traveler1_idx` (`TravelerID`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`HotelID`),
  ADD KEY `HotelID` (`HotelID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MessageID`,`TravelerID`),
  ADD KEY `fk_Message_Traveler1_idx` (`TravelerID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Guides_GuideID`,`Traveler_TravelerID`,`ReviewID`) USING BTREE,
  ADD KEY `fk_Guides_has_Traveler_Traveler1_idx` (`Traveler_TravelerID`),
  ADD KEY `fk_Guides_has_Traveler_Guides1_idx` (`Guides_GuideID`) USING BTREE;

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`,`HotelID`) USING BTREE,
  ADD KEY `fk_Room_Hotels1_idx` (`HotelID`);

--
-- Indexes for table `taxi ads`
--
ALTER TABLE `taxi ads`
  ADD PRIMARY KEY (`AdID`,`TaxiOwner_OwnerID`),
  ADD KEY `fk_Taxi Ads_TaxiOwner1_idx` (`TaxiOwner_OwnerID`);

--
-- Indexes for table `taxi drivers`
--
ALTER TABLE `taxi drivers`
  ADD PRIMARY KEY (`TaxiDriverID`,`OwnerID`),
  ADD KEY `fk_Taxi Drivers_TaxiOwner1_idx` (`OwnerID`);

--
-- Indexes for table `taxi offers`
--
ALTER TABLE `taxi offers`
  ADD PRIMARY KEY (`OwnerID`,`RequestID`,`OfferID`),
  ADD KEY `fk_TaxiOwner_has_Taxi Request_Taxi Request1_idx` (`RequestID`),
  ADD KEY `fk_TaxiOwner_has_Taxi Request_TaxiOwner_idx` (`OwnerID`);

--
-- Indexes for table `taxiowner`
--
ALTER TABLE `taxiowner`
  ADD PRIMARY KEY (`OwnerID`),
  ADD KEY `OwnerID` (`OwnerID`);

--
-- Indexes for table `taxi reservation`
--
ALTER TABLE `taxi reservation`
  ADD PRIMARY KEY (`Traveler_TravelerID`,`Vehicles_VehicleID`,`ReservationID`),
  ADD KEY `fk_Traveler_has_Vehicles_Vehicles1_idx` (`Vehicles_VehicleID`),
  ADD KEY `fk_Traveler_has_Vehicles_Traveler1_idx` (`Traveler_TravelerID`);

--
-- Indexes for table `taxi review`
--
ALTER TABLE `taxi review`
  ADD PRIMARY KEY (`TravelerID`,`ReservationID`),
  ADD KEY `fk_Traveler_has_Taxi Reservation_Traveler1_idx` (`TravelerID`);

--
-- Indexes for table `taxi_request`
--
ALTER TABLE `taxi_request`
  ADD PRIMARY KEY (`RequestID`,`TravelerID`),
  ADD KEY `fk_Taxi Request_Traveler1_idx` (`TravelerID`);

--
-- Indexes for table `tour bookings`
--
ALTER TABLE `tour bookings`
  ADD PRIMARY KEY (`TourPlanID`);

--
-- Indexes for table `tour plans`
--
ALTER TABLE `tour plans`
  ADD PRIMARY KEY (`TourPlanID`,`TravelerID`),
  ADD KEY `fk_Tour Plans_Traveler1_idx` (`TravelerID`);

--
-- Indexes for table `traveler`
--
ALTER TABLE `traveler`
  ADD PRIMARY KEY (`TravelerID`),
  ADD KEY `TravelerID` (`TravelerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`VehicleID`,`OwnerID`),
  ADD KEY `fk_Vehicles_TaxiOwner1_idx` (`OwnerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guide_offers`
--
ALTER TABLE `guide_offers`
  MODIFY `OfferID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guide_request`
--
ALTER TABLE `guide_request`
  MODIFY `RequestsID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taxi_request`
--
ALTER TABLE `taxi_request`
  MODIFY `RequestID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `VehicleID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `AdminID` FOREIGN KEY (`AdminID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `room` FOREIGN KEY (`HotelID`) REFERENCES `room` (`HotelID`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `fk_Complaint_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`);

--
-- Constraints for table `guide ads`
--
ALTER TABLE `guide ads`
  ADD CONSTRAINT `fk_Guide Ads_Guides1_idx` FOREIGN KEY (`GuideID`) REFERENCES `guides` (`GuideID`);

--
-- Constraints for table `guide bookings`
--
ALTER TABLE `guide bookings`
  ADD CONSTRAINT `fk_Traveler_has_Guides_Guides1_idx` FOREIGN KEY (`Guides_GuideID`) REFERENCES `guides` (`GuideID`),
  ADD CONSTRAINT `fk_Traveler_has_Guides_Traveler1_idx` FOREIGN KEY (`Traveler_TravelerID`) REFERENCES `traveler` (`TravelerID`);

--
-- Constraints for table `guides`
--
ALTER TABLE `guides`
  ADD CONSTRAINT `GuideID` FOREIGN KEY (`GuideID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `guide_languages`
--
ALTER TABLE `guide_languages`
  ADD CONSTRAINT `guidefk` FOREIGN KEY (`guide_id`) REFERENCES `guides` (`GuideID`);

--
-- Constraints for table `guide_offers`
--
ALTER TABLE `guide_offers`
  ADD CONSTRAINT `fk_Guides_has_Guide Requests_Guides1_idx` FOREIGN KEY (`GuideID`) REFERENCES `guides` (`GuideID`),
  ADD CONSTRAINT `guide_offers_ibfk_1` FOREIGN KEY (`RequestsID`) REFERENCES `guide_request` (`RequestsID`);

--
-- Constraints for table `guide_request`
--
ALTER TABLE `guide_request`
  ADD CONSTRAINT `fk_Guide Requests_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`);

--
-- Constraints for table `hotelreservation`
--
ALTER TABLE `hotelreservation`
  ADD CONSTRAINT `fk_Hotels_has_Traveler_Hotels1_idx` FOREIGN KEY (`HotelID`) REFERENCES `hotels` (`HotelID`),
  ADD CONSTRAINT `fk_Hotels_has_Traveler_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`);

--
-- Constraints for table `hotel review`
--
ALTER TABLE `hotel review`
  ADD CONSTRAINT `fk_Traveler_has_Hotels_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`),
  ADD CONSTRAINT `k_Traveler_has_Hotels_Hotels1_idx` FOREIGN KEY (`HotelID`) REFERENCES `hotels` (`HotelID`);

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `HotelID` FOREIGN KEY (`HotelID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_Message_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_Guides_has_Traveler_Guides1_idx` FOREIGN KEY (`Guides_GuideID`) REFERENCES `guides` (`GuideID`),
  ADD CONSTRAINT `fk_Guides_has_Traveler_Traveler1_idx` FOREIGN KEY (`Traveler_TravelerID`) REFERENCES `traveler` (`TravelerID`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_Room_Hotels1_idx` FOREIGN KEY (`HotelID`) REFERENCES `hotels` (`HotelID`);

--
-- Constraints for table `taxi ads`
--
ALTER TABLE `taxi ads`
  ADD CONSTRAINT `fk_Taxi Ads_TaxiOwner1_idx` FOREIGN KEY (`TaxiOwner_OwnerID`) REFERENCES `taxiowner` (`OwnerID`);

--
-- Constraints for table `taxi drivers`
--
ALTER TABLE `taxi drivers`
  ADD CONSTRAINT `fk_Taxi Drivers_TaxiOwner1_idx` FOREIGN KEY (`OwnerID`) REFERENCES `taxiowner` (`OwnerID`);

--
-- Constraints for table `taxi offers`
--
ALTER TABLE `taxi offers`
  ADD CONSTRAINT `fk_TaxiOwner_has_Taxi Request_TaxiOwner_idx` FOREIGN KEY (`OwnerID`) REFERENCES `taxiowner` (`OwnerID`),
  ADD CONSTRAINT `requestId_FK` FOREIGN KEY (`RequestID`) REFERENCES `taxi_request` (`RequestID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taxiowner`
--
ALTER TABLE `taxiowner`
  ADD CONSTRAINT `OwnerID` FOREIGN KEY (`OwnerID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `taxi reservation`
--
ALTER TABLE `taxi reservation`
  ADD CONSTRAINT `fk_Traveler_has_Vehicles_Traveler1_idx` FOREIGN KEY (`Traveler_TravelerID`) REFERENCES `traveler` (`TravelerID`);

--
-- Constraints for table `taxi review`
--
ALTER TABLE `taxi review`
  ADD CONSTRAINT `fk_Traveler_has_Taxi Reservation_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`);

--
-- Constraints for table `taxi_request`
--
ALTER TABLE `taxi_request`
  ADD CONSTRAINT `fk_Taxi Request_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tour bookings`
--
ALTER TABLE `tour bookings`
  ADD CONSTRAINT `fk_Tour Bookings_Tour Plans1` FOREIGN KEY (`TourPlanID`) REFERENCES `tour plans` (`TourPlanID`);

--
-- Constraints for table `tour plans`
--
ALTER TABLE `tour plans`
  ADD CONSTRAINT `fk_Tour Plans_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`);

--
-- Constraints for table `traveler`
--
ALTER TABLE `traveler`
  ADD CONSTRAINT `TravelerID` FOREIGN KEY (`TravelerID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `fk_Vehicles_TaxiOwner1_idx` FOREIGN KEY (`OwnerID`) REFERENCES `taxiowner` (`OwnerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
