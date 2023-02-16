-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Feb 16, 2023 at 06:20 AM
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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`AdminID`, `AssignedArea`, `nic`) VALUES
(1, 'Super Admin', '981022017V');

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
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `GuideID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Rate` decimal(7,2) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `Area` varchar(45) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `acc_status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guides`
--

INSERT INTO `guides` (`GuideID`, `Name`, `Rate`, `NIC`, `Area`, `bio`, `phone_number`, `acc_status`) VALUES
(4, 'Lasindu', '4000.00', '990871604V', 'Kaluthra', 'hi', 764138580, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `guide_bookings`
--

CREATE TABLE `guide_bookings` (
  `TravelerID` int(10) NOT NULL,
  `Guides_GuideID` int(10) NOT NULL,
  `BookingID` int(11) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ReservedDate` date NOT NULL,
  `StartingTime` time NOT NULL,
  `Duration` decimal(3,1) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `PaymentStatus` varchar(15) NOT NULL,
  `PaymentMethod` varchar(45) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Yet To Pay'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guide_bookings`
--

INSERT INTO `guide_bookings` (`TravelerID`, `Guides_GuideID`, `BookingID`, `DateAdded`, `ReservedDate`, `StartingTime`, `Duration`, `Location`, `payment`, `PaymentStatus`, `PaymentMethod`, `status`) VALUES
(5, 4, 1, '2023-02-03 17:58:13', '2023-02-04', '08:00:00', '2.0', 'Anuradhapura', '20000.00', 'NOT COMPLETED', 'Cash', 'Yet To Confirm');

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
  `RequestID` int(15) NOT NULL,
  `OfferID` int(15) NOT NULL,
  `HourlyRate` decimal(10,0) NOT NULL,
  `AdditionalDetails` varchar(200) DEFAULT NULL,
  `PaymentMethod` varchar(30) NOT NULL,
  `post_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guide_offers`
--

INSERT INTO `guide_offers` (`GuideID`, `RequestID`, `OfferID`, `HourlyRate`, `AdditionalDetails`, `PaymentMethod`, `post_at`) VALUES
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
  `TravelerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guide_request`
--

INSERT INTO `guide_request` (`RequestsID`, `language`, `Location`, `Date`, `Time`, `Description`, `post_at`, `TravelerID`) VALUES
(1, 'English', 'Anuradhapura', '2022-12-25', '09:00:00', 'Need a Travel from Aruradhapura', '2022-12-23 08:06:07', 5),
(6, 'English', 'Galle', '2023-02-22', '09:00:00', 'Need a guide from galle', '2023-02-10 07:01:26', 5);

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
-- Table structure for table `hotel_bookings`
--

CREATE TABLE `hotel_bookings` (
  `booking_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `TravelerID` int(11) NOT NULL,
  `payment` decimal(12,2) NOT NULL,
  `paymentmethod` varchar(20) NOT NULL,
  `payment_status` varchar(50) NOT NULL DEFAULT 'NOT Paid',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payement_data` date DEFAULT NULL,
  `booking_start_date` date NOT NULL,
  `booking_end_date` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Yet To Pay'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel_bookings`
--

INSERT INTO `hotel_bookings` (`booking_id`, `hotel_id`, `TravelerID`, `payment`, `paymentmethod`, `payment_status`, `date_added`, `payement_data`, `booking_start_date`, `booking_end_date`, `status`) VALUES
(1, 2, 5, '20000.00', 'On Location', 'NOT COMPLE', '2023-02-03 14:45:16', '2023-02-03', '2023-02-10', '2023-02-14', 'Yet To Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MessageID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `reply` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MessageID`, `Name`, `Email`, `Message`, `reply`) VALUES
(1, 'Sachin Umayangana', 'sachinumayangana@gma', 'Need to join as Guide on your platform ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reserved_rooms`
--

CREATE TABLE `reserved_rooms` (
  `reservation_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
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
-- Table structure for table `taxi_drivers`
--

CREATE TABLE `taxi_drivers` (
  `TaxiDriverID` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `LicenseNo` int(11) NOT NULL,
  `OwnerID` int(10) NOT NULL,
  `contact_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxi_drivers`
--

INSERT INTO `taxi_drivers` (`TaxiDriverID`, `Age`, `Name`, `LicenseNo`, `OwnerID`, `contact_number`) VALUES
(0, 33, 'Saman', 443345556, 3, 773214563);

-- --------------------------------------------------------

--
-- Table structure for table `taxi_offers`
--

CREATE TABLE `taxi_offers` (
  `OwnerID` int(10) NOT NULL,
  `request_id` int(15) NOT NULL,
  `OfferID` int(15) NOT NULL,
  `VehicleID` int(10) NOT NULL,
  `PaymentMethod` varchar(45) NOT NULL,
  `PricePerKm` decimal(5,2) NOT NULL,
  `additional_details` varchar(255) NOT NULL,
  `post_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxi_offers`
--

INSERT INTO `taxi_offers` (`OwnerID`, `request_id`, `OfferID`, `VehicleID`, `PaymentMethod`, `PricePerKm`, `additional_details`, `post_at`) VALUES
(3, 2, 1, 1, 'Cash', '99.00', 'fdsfdfsfd', '2023-02-09 16:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `taxi_request`
--

CREATE TABLE `taxi_request` (
  `RequestID` int(15) NOT NULL,
  `vehicle_type` varchar(10) NOT NULL,
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
  `post_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `passengers` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxi_request`
--

INSERT INTO `taxi_request` (`RequestID`, `vehicle_type`, `Date`, `StartingTime`, `Description`, `TravelerID`, `PickupLocation`, `Destination`, `p_latitude`, `p_longitude`, `d_latitude`, `d_longitude`, `post_at`, `passengers`) VALUES
(2, 'Need a Car', '2022-12-24', '10:43:00', 'Need a Car for 4 Passengers', 5, 'Colombo', 'Anuradhapura', 0, 0, 0, 0, '2022-12-23 04:13:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `taxi_reservation`
--

CREATE TABLE `taxi_reservation` (
  `TravelerID` int(10) NOT NULL,
  `Vehicles_VehicleID` int(5) NOT NULL,
  `ReservationID` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `PaymentStatus` varchar(20) NOT NULL,
  `PaymentMethod` varchar(45) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `pickup_location` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Yet To Pay'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxi_reservation`
--

INSERT INTO `taxi_reservation` (`TravelerID`, `Vehicles_VehicleID`, `ReservationID`, `Price`, `PaymentStatus`, `PaymentMethod`, `DateAdded`, `booking_date`, `booking_time`, `pickup_location`, `destination`, `status`) VALUES
(5, 1, 1, '2000.00', 'NOT COMPLETED', 'Cash', '2023-02-03 19:16:17', '2023-02-05', '02:00:00', 'Colombo', 'Anuradhapura', 'Yet To Confirm');

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
  `acc_status` varchar(15) NOT NULL DEFAULT 'Active',
  `pw_reset_otp` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Email`, `Password`, `Name`, `ContactNo`, `UserType`, `otp`, `verification_status`, `acc_status`, `pw_reset_otp`) VALUES
(1, 'tripifyadmin@gmail.com', '$2y$10$8hq4OyHMmGUGUsEZfMiObOUkiY76cvTcbMY7RT7S/UeighvSM0nNO', 'Saneru', NULL, 'Admin', 169482, 1, 'Active', 851429),
(2, 'kaveeshagw@gmail.com', '$2y$10$taCLb89NmSB42Vd/ysOaauI0WEC3eD7w1.VNFAfd5C0MEjOK/4JLu', 'Kavessha', NULL, 'Hotel', 656436, 1, 'Active', 576780),
(3, 'kkarththi15@gmail.com', '$2y$10$i3fuw1ZXXOFiW.CkI3Zr.OOs5TqMNDO3wicSAvMnZ1ceYeK.4f2Ve', 'Karththikeyan', NULL, 'Taxi', 188455, 1, 'Active', NULL),
(4, 'lasinduwathsan@gmail.com', '$2y$10$zWFvmepuwnMrI/gyElfcT.3n8rsdMZJMkBaJ2l7gvl1YzwOopMXDS', 'Lasindu', NULL, 'Guide', 186741, 1, 'Active', NULL),
(5, 'sachinumayangana@gmail.com', '$2y$10$eYa9wB.rdAgFvE3zBXBtFeIMrwg9pUKp/UBkY3yU6BSEmXH.2A.pW', 'Sachin', NULL, 'Traveler', 359875, 1, 'Active', 239686);

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
,`passengers` int(2)
,`vehicle_type` varchar(10)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_guide_offers`  AS  select `guide_offers`.`GuideID` AS `guide_id`,`guide_offers`.`RequestID` AS `request_id`,`guide_offers`.`OfferID` AS `offer_id`,`guide_offers`.`HourlyRate` AS `hourlyrate`,`guide_offers`.`AdditionalDetails` AS `additionaldetails`,`guide_offers`.`PaymentMethod` AS `paymentmethod`,`guide_offers`.`post_at` AS `offer_at`,`guides`.`Name` AS `guidename`,`guides`.`phone_number` AS `guide_number` from (`guide_offers` join `guides` on(`guide_offers`.`GuideID` = `guides`.`GuideID`)) order by `guide_offers`.`post_at` ;

-- --------------------------------------------------------

--
-- Structure for view `v_guide_request`
--
DROP TABLE IF EXISTS `v_guide_request`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_guide_request`  AS  select `guide_request`.`RequestsID` AS `request_id`,`guide_request`.`language` AS `p_language`,`guide_request`.`Location` AS `p_location`,`guide_request`.`Date` AS `date`,`guide_request`.`Time` AS `time`,`guide_request`.`Description` AS `description`,`guide_request`.`post_at` AS `post_at`,`users`.`UserID` AS `traveler_id`,`users`.`Name` AS `name`,`users`.`ContactNo` AS `contact_no` from (`guide_request` join `users` on(`guide_request`.`TravelerID` = `users`.`UserID`)) order by `guide_request`.`post_at` ;

-- --------------------------------------------------------

--
-- Structure for view `v_taxi_request`
--
DROP TABLE IF EXISTS `v_taxi_request`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_taxi_request`  AS  select `taxi_request`.`RequestID` AS `request_id`,`taxi_request`.`passengers` AS `passengers`,`taxi_request`.`vehicle_type` AS `vehicle_type`,`taxi_request`.`Description` AS `additional_details`,`taxi_request`.`Date` AS `date`,`taxi_request`.`StartingTime` AS `time`,`taxi_request`.`PickupLocation` AS `pickup_location`,`taxi_request`.`Destination` AS `destination`,`taxi_request`.`p_latitude` AS `p_latitude`,`taxi_request`.`p_longitude` AS `p_longitude`,`taxi_request`.`d_latitude` AS `d_latitude`,`taxi_request`.`d_longitude` AS `d_longitude`,`taxi_request`.`post_at` AS `post_at`,`users`.`UserID` AS `traveler_id`,`users`.`Name` AS `name`,`users`.`ContactNo` AS `contact_no` from (`taxi_request` join `users` on(`taxi_request`.`RequestID` = `users`.`UserID`)) order by `taxi_request`.`post_at` ;

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
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`GuideID`),
  ADD KEY `GuideID` (`GuideID`);

--
-- Indexes for table `guide_bookings`
--
ALTER TABLE `guide_bookings`
  ADD PRIMARY KEY (`BookingID`) USING BTREE,
  ADD KEY `fk_Traveler_has_Guides_Guides1_idx` (`Guides_GuideID`),
  ADD KEY `fk_Traveler_has_Guides_Traveler1_idx` (`TravelerID`);

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
  ADD KEY `RequestsID` (`RequestID`);

--
-- Indexes for table `guide_request`
--
ALTER TABLE `guide_request`
  ADD PRIMARY KEY (`RequestsID`,`TravelerID`),
  ADD KEY `fk_Guide Requests_Traveler1_idx` (`TravelerID`);

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
-- Indexes for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `hotel_fk` (`hotel_id`),
  ADD KEY `traveler_fk` (`TravelerID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MessageID`) USING BTREE;

--
-- Indexes for table `reserved_rooms`
--
ALTER TABLE `reserved_rooms`
  ADD PRIMARY KEY (`reservation_id`,`room_id`) USING BTREE,
  ADD KEY `room_fk` (`room_id`);

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
-- Indexes for table `taxiowner`
--
ALTER TABLE `taxiowner`
  ADD PRIMARY KEY (`OwnerID`),
  ADD KEY `OwnerID` (`OwnerID`);

--
-- Indexes for table `taxi review`
--
ALTER TABLE `taxi review`
  ADD PRIMARY KEY (`TravelerID`,`ReservationID`),
  ADD KEY `fk_Traveler_has_Taxi Reservation_Traveler1_idx` (`TravelerID`);

--
-- Indexes for table `taxi_drivers`
--
ALTER TABLE `taxi_drivers`
  ADD PRIMARY KEY (`TaxiDriverID`,`OwnerID`),
  ADD KEY `fk_Taxi Drivers_TaxiOwner1_idx` (`OwnerID`);

--
-- Indexes for table `taxi_offers`
--
ALTER TABLE `taxi_offers`
  ADD PRIMARY KEY (`OfferID`) USING BTREE,
  ADD KEY `fk_TaxiOwner_has_Taxi Request_Taxi Request1_idx` (`request_id`),
  ADD KEY `fk_TaxiOwner_has_Taxi Request_TaxiOwner_idx` (`OwnerID`),
  ADD KEY `vehicle_Fk` (`VehicleID`);

--
-- Indexes for table `taxi_request`
--
ALTER TABLE `taxi_request`
  ADD PRIMARY KEY (`RequestID`,`TravelerID`),
  ADD KEY `fk_Taxi Request_Traveler1_idx` (`TravelerID`);

--
-- Indexes for table `taxi_reservation`
--
ALTER TABLE `taxi_reservation`
  ADD PRIMARY KEY (`ReservationID`) USING BTREE,
  ADD KEY `fk_Traveler_has_Vehicles_Vehicles1_idx` (`Vehicles_VehicleID`),
  ADD KEY `fk_Traveler_has_Vehicles_Traveler1_idx` (`TravelerID`);

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
-- AUTO_INCREMENT for table `guide_bookings`
--
ALTER TABLE `guide_bookings`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guide_offers`
--
ALTER TABLE `guide_offers`
  MODIFY `OfferID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guide_request`
--
ALTER TABLE `guide_request`
  MODIFY `RequestsID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taxi_offers`
--
ALTER TABLE `taxi_offers`
  MODIFY `OfferID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taxi_request`
--
ALTER TABLE `taxi_request`
  MODIFY `RequestID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `taxi_reservation`
--
ALTER TABLE `taxi_reservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `guides`
--
ALTER TABLE `guides`
  ADD CONSTRAINT `GuideID` FOREIGN KEY (`GuideID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `guide_bookings`
--
ALTER TABLE `guide_bookings`
  ADD CONSTRAINT `fk_Traveler_has_Guides_Guides1_idx` FOREIGN KEY (`Guides_GuideID`) REFERENCES `guides` (`GuideID`),
  ADD CONSTRAINT `fk_Traveler_has_Guides_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`);

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
  ADD CONSTRAINT `guide_offers_ibfk_1` FOREIGN KEY (`RequestID`) REFERENCES `guide_request` (`RequestsID`);

--
-- Constraints for table `guide_request`
--
ALTER TABLE `guide_request`
  ADD CONSTRAINT `fk_Guide Requests_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`) ON UPDATE CASCADE;

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
-- Constraints for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD CONSTRAINT `hotel_fk` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`HotelID`),
  ADD CONSTRAINT `traveler_fk` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`);

--
-- Constraints for table `reserved_rooms`
--
ALTER TABLE `reserved_rooms`
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`reservation_id`) REFERENCES `hotel_bookings` (`booking_id`),
  ADD CONSTRAINT `room_fk` FOREIGN KEY (`room_id`) REFERENCES `room` (`RoomID`);

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
-- Constraints for table `taxiowner`
--
ALTER TABLE `taxiowner`
  ADD CONSTRAINT `OwnerID` FOREIGN KEY (`OwnerID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `taxi review`
--
ALTER TABLE `taxi review`
  ADD CONSTRAINT `fk_Traveler_has_Taxi Reservation_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`);

--
-- Constraints for table `taxi_drivers`
--
ALTER TABLE `taxi_drivers`
  ADD CONSTRAINT `fk_Taxi Drivers_TaxiOwner1_idx` FOREIGN KEY (`OwnerID`) REFERENCES `taxiowner` (`OwnerID`);

--
-- Constraints for table `taxi_offers`
--
ALTER TABLE `taxi_offers`
  ADD CONSTRAINT `fk_TaxiOwner_has_Taxi Request_TaxiOwner_idx` FOREIGN KEY (`OwnerID`) REFERENCES `taxiowner` (`OwnerID`),
  ADD CONSTRAINT `requestId_FK` FOREIGN KEY (`request_id`) REFERENCES `taxi_request` (`RequestID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicle_Fk` FOREIGN KEY (`VehicleID`) REFERENCES `vehicles` (`VehicleID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taxi_request`
--
ALTER TABLE `taxi_request`
  ADD CONSTRAINT `fk_Taxi Request_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taxi_reservation`
--
ALTER TABLE `taxi_reservation`
  ADD CONSTRAINT `fk_Traveler_has_Vehicles_Traveler1_idx` FOREIGN KEY (`TravelerID`) REFERENCES `traveler` (`TravelerID`),
  ADD CONSTRAINT `fk_vehicle` FOREIGN KEY (`Vehicles_VehicleID`) REFERENCES `vehicles` (`VehicleID`);

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
