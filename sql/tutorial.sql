-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 03:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `CompanyId` int(11) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `CompanyEmail` varchar(255) NOT NULL,
  `CompanyMobile` varchar(15) NOT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`CompanyId`, `CompanyName`, `CompanyEmail`, `CompanyMobile`, `Password`) VALUES
(1, 'N induuust', 'ka@gmail.com', '0254908121', '$2y$10$LADjfI33YWFoJEoRC7wI8eGqCRb/4fYxM2s9S28V1FYXU0EyAEikK'),
(8, 'Asus', 'asus@gmail.com', '0112856545', '$2y$10$9j/ClKfQDlgj6DXP5SucPuqqz4I/sFyCzqUhJZvOXgSe4mEZKT2jW');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Age` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Mobile`, `Age`, `Password`) VALUES
(1, 'nimasha', 'n', '123', 20, '$2y$10$cS/8hXWNNN7zbXm5I5qdiuskUZEtepv7AtfH6l7EJ11sZDzDYau2G'),
(6, 'zen', 'z@gmail.com', '0321654987', 25, '$2y$10$yDfQr1RdMEEq4vZ9TrbEQedotsHF.uUjqIwXdwBv2vBhUGNRIl7MK'),
(7, 'test', 'test@gmail.com', '0701126568', 23, '$2y$10$Mp6so3Ed9joN95FFt7qno.mZEDgt.1Zug806JnWk58Sr9XiTp4Vcm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`CompanyId`),
  ADD UNIQUE KEY `CompanyEmail` (`CompanyEmail`),
  ADD UNIQUE KEY `CompanyMobile` (`CompanyMobile`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Mobile` (`Mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `CompanyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Create a user table
CREATE TABLE Reg_User (
  user_id VARCHAR(50) NOT NULL,
  first_name VARCHAR(100) NOT NULL,
  middle_name VARCHAR(100),
  last_name VARCHAR(100) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Password VARCHAR(50) NOT NULL,
  AddressLine1 VARCHAR(50) NOT NULL,
  AddressLine2 VARCHAR(50),
  City VARCHAR(50) NOT NULL,
  PostalCode INT NOT NULL,
  CONSTRAINT PK_User PRIMARY KEY (user_id),
  --CONSTRAINT CHK_Reg_User_PostalCode CHECK (PostalCode LIKE '[0-9][0-9][0-9][0-9][0-9]')
);

CREATE TABLE User_contact_no (
  user_id VARCHAR(50) NOT NULL,
  contact_num VARCHAR(15) NOT NULL,
  CONSTRAINT PK_User_contact_no PRIMARY KEY (user_id, contact_num),
  CONSTRAINT FK_User_contact_no_User FOREIGN KEY (user_id) REFERENCES Reg_User (user_id),
  CONSTRAINT CHK_User_contact_no_contact_num CHECK (contact_num LIKE '[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]')
);

-- Create a feedback table
CREATE TABLE Feedback (
  feedback_id VARCHAR(50) NOT NULL,
  user_id VARCHAR(50) NOT NULL,
  sent_date DATETIME NOT NULL,
  content VARCHAR(250),
  fd_timestamp DATETIME NOT NULL,
  fd_subject VARCHAR(100) NOT NULL,
  CONSTRAINT PK_Feedback PRIMARY KEY (feedback_id),
  CONSTRAINT FK_Feedback_User FOREIGN KEY (user_id) REFERENCES Reg_User(user_id)
);

-- Create a company table
CREATE TABLE Company (
  company_id VARCHAR(50) NOT NULL,
  company_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  company_password VARCHAR(100) NOT NULL,
  address_line1 VARCHAR(100) NOT NULL,
  address_line2 VARCHAR(100),
  city VARCHAR(100) NOT NULL,
  post_code INT NOT NULL,
  CONSTRAINT PK_Company PRIMARY KEY (company_id)
);

-- Create a company contact num table
CREATE TABLE Company_contact_num (
  company_id VARCHAR(50) NOT NULL,
  contact_num INT NOT NULL,
  CONSTRAINT PK_Company_contact_num PRIMARY KEY (company_id, contact_num),
  CONSTRAINT FK_Company_contact_num_Company FOREIGN KEY (company_id) REFERENCES Company(company_id)
);

-- Insert data into Reg_User table
INSERT INTO Reg_User (user_id, first_name, middle_name, last_name, Email, Password, AddressLine1, AddressLine2, City, PostalCode)
VALUES
('U001','Salinda','Kumara','Wijesinghe','salindawije@gmail.com','password1', '123 Main St', 'Apt 4B','Colombo', 10650),
('U002','Mailinda','Piyumal','Rathnayke','malirathnayke@gmail.com','password2', '456 Park Ave', NULL,'Galle', 80000),
('U003','Mohamed','Irfan','Ibrahim','mohamed@gmail.com','password3','789 Center Rd', NULL, 'Kandy', 20000),
('U004','Samantha','Kumara', 'Perera', 'samantha@gmail.com', 'password4','987 First Ln', 'Unit 7','Negombo', 11500),
('U005','Rajesh',NULL, 'Kumar', 'rajesh@gmail.com','password5','321 Second St', NULL, 'Jaffna', 40000),
('U006','Nadeesha','Sathsarani','Silva','nadeesha@gmail.com','password6', '654 Third Ave', NULL, 'Matara', 81000),
('U007','Kamal',NULL, 'Fernando', 'kamal@gmail.com','password7',  '876 Fourth Rd', 'Suite 12','Trincomalee', 31000),
('U008','Ayesha','Rukshali', 'Weerasinghe', 'ayesha@gmail.com', 'password8','543 Fifth Ln', NULL,'Anuradhapura', 50000),
('U009','Sanjeewa','Priyantha','Perera','sanjeewa@gmail.com','password9', '234 Sixth St', NULL,'Gampaha', 11000),
('U010','Priyantha',NULL,'Rajapakse','priyantha@gmail.com','password10', '765 Seventh Ave','Floor 3', 'Kurunegala', 60000);

-- Insert data into User_contact_no table
INSERT INTO User_contact_no(user_id, contact_num)
 VALUES
  ('U001','0781234567'),
  ('U001','0761234567'),
  ('U002','0781123456'),
  ('U003','0761123456'),
  ('U003','0721234567'),
  ('U004','0701234567'),
  ('U005','0721123456'),
  ('U006','0701123456'),
  ('U007','0710000001'),
  ('U008','0720000001'),
  ('U009','0780000001'),
  ('U010','0770000001');

-- Insert data into Feedback table
INSERT INTO Feedback(feedback_id,user_id,sent_date,content,fd_timestamp,fd_subject)
VALUES
('F001','U001','2022-01-01','This is a feedback from U001','2023-01-01 10:00:00','This is a subject from U001'),
('F002','U001','2022-01-05','This is second feedback from U001','2023-01-05 10:00:00','This is second subject from U001'),
('F003','U002','2022-02-05','This is a feedback from U002','2023-02-05 10:00:00','This is a subject from U002'),
('F004','U003','2022-01-06','This is a feedback from U003','2023-01-06 10:00:00','This is a subject from U003'),
('F005','U004','2022-01-07','This is a feedback from U004','2023-01-07 10:00:00','This is a subject from U004'),
('F006','U005','2022-01-08','This is a feedback from U005','2023-01-08 10:00:00','This is a subject from U005'),
('F012','U010','2022-01-15','This is second feedback from U010','2023-01-15 12:00:00','This is second subject from U010');

-- Insert data into Company table
INSERT INTO Company (company_id, company_name, email, company_password, address_line1, address_line2, city, post_code)
VALUES
  ('C001', 'Tech Co', 'techco@gmail.com', 'password1', '123 Main St', 'Floor 2', 'Colombo', 10650),
  ('C002','FoodieHub', 'foodiehub@gmail.com', 'password2', '456 Park Ave', NULL, 'Galle', 80000),
  ('C003','Medi Pro', 'medipro@gmail.com', 'password3', '789 Center Rd', NULL, 'Kandy', 20000),
  ('C004','Green Tech', 'greentech@gmail.com', 'password4', '987 First Ln', 'Suite 5', 'Negombo', 11500),
  ('C005','Health Plus', 'HealthPlus@gmail.com', 'password5', '321 Second St', NULL, 'Kalutara', 12000),
  ('C006','CyberGuard', 'CyberGuard@gmail.com', 'password6', '654 Third Ave', NULL, 'Gampaha', 11000),
  ('C007','Fashion Fix', 'FashionFix@gmail.com', 'password7', '876 Fourth Rd', 'Unit 10', 'Beruwala', 12070),
  ('C008','Quantum Tech', 'quantumTech@gmail.com', 'password8', '543 Fifth Ln', NULL, 'Matara', 81000),
  ('C009','Pixel Works', 'pixelWorks@gmail.com', 'password9', '234 Sixth St', NULL, 'Hikkaduwa', 80240),
  ('C010','Aqua Tech', 'aquaTech@gmail.com', 'password10', '765 Seventh Ave', 'Floor 3', 'Galle', 80000);

-- Insert data into Company_contact_num table
INSERT INTO Company_contact_num (company_id, contact_num)
VALUES
  ('C001', '0771234567'),
  ('C002', '0772345678'),
  ('C003', '0773456789'),
  ('C004', '0774567890'),
  ('C005', '0714567890'),
  ('C005', '0715678901'),
  ('C006', '0776789012'),
  ('C007', '0717890123'),
  ('C008', '0778901234'),
  ('C008', '0718901234'),
  ('C009', '0719012345'),
  ('C010', '0710123456');

  --
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `first_name`, `last_name`, `address`, `sex`, `dob`, `education`, `cv`) VALUES
(2, 'uvindu', 'seneviratne', ' 281 polghahahena ragama', ' male', '2022-03-09', 'undergrad', ''),
(5, 'mk', 'mk', ' mk', ' male', '2023-10-12', 'mk', ''),
(6, 'mk', 'mk', ' mk', ' male', '2023-10-19', 'mk', ''),
(7, 'mk', 'mk', ' mk', ' male', '2023-10-11', 'mk', ''),
(8, 'mk', 'mk', ' mk', ' male', '2023-10-05', 'mk', ''),
(9, 'mk', 'mk', ' mk', ' male', '2023-10-12', 'mk', ''),
(10, 'mk', 'mk', ' mk', ' male', '2023-10-13', 'mk', ''),
(11, 'mk', 'mk', ' mk', ' male', '2023-10-04', 'mk', ''),
(12, 'mk', 'mk', ' mk', ' male', '2023-10-11', 'mk', ''),
(13, 'mk', 'mk', ' mk', ' male', '2023-10-12', 'mk', ''),
(14, 'mk', 'mk', ' mk', ' male', '2023-10-11', 'mk', ''),
(15, 'mk', 'mk', ' mk', ' male', '2023-10-11', 'mk', ''),
(16, 'mk', 'mk', ' mk', ' male', '2023-10-11', 'mk', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--
-- Table structure for table `jobdescription`
--

CREATE TABLE `jobdescription` (
  `jobID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `jobType` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contactNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobdescription`
--

INSERT INTO `jobdescription` (`jobID`, `name`, `jobType`, `salary`, `address`, `contactNo`) VALUES
(51, 'ABC Company', 'Information Technology', 100000, 'software engineer', 2023),
(53, 'AMD Hospitals', 'Healthcare', 80000, 'Radiographer', 2023),
(54, 'SIPSA Education', 'Education And Training', 50000, 'Teachers', 2021),
(55, 'VIU Company', 'Marketing and Advertising', 60000, 'Digital Marketers', 2023),
(56, 'XYZ Company', 'Creative Arts', 50000, 'Writers', 2023);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobdescription`
--
ALTER TABLE `jobdescription`
  ADD PRIMARY KEY (`jobID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobdescription`
--
ALTER TABLE `jobdescription`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- --------------------------------------------------------

--
-- Table structure for table jobdescription
--

CREATE TABLE jobdescription (
  jobID int(11) NOT NULL,
  name varchar(50) NOT NULL,
  jobType varchar(50) NOT NULL,
  salary int(11) NOT NULL,
  address varchar(150) NOT NULL,
  contactNo int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table jobdescription
--

INSERT INTO jobdescription (jobID, name, jobType, salary, address, contactNo) VALUES
(3, 'lakmal', 'de', 255, 'sdcsdc', 254524),
(4, 'lakmal', 'de', 255, 'sdcsdc', 254524),
(5, 'sdfsd', 'dsfsd', 25, 'sdfsd', 257),
(6, 'sdfsd', 'dsfsd', 25, 'sdfsd', 257),
(7, 'aaaaaaaa', 'sssssssssss', 25, 'aaaaaaaaaa', 25),
(8, 'poornima lakmal', 'gng', 525, 'Thalpathwewa', 715729485),
(19, 'fgngn', 'gfnf', 25, 'fgn', 25),
(20, 'nfgn', 'fgn', 52, 'fgnfg', 25),
(21, 'fvsd', 'dsvs', 25, 'vsdv', 25),
(22, 'fvsd', 'dsvs', 25, 'vsdv', 25),
(23, 'vdsfv', 'dsvd', 25, 'dvd', 25),
(24, 'vdsfv', 'dsvd', 25, 'dvd', 25),
(25, 'vdsfv', 'dsvd', 25, 'dvd', 25),
(26, 'ghjh', 'ghnhg', 25, 'hgn', 52525),
(27, 'hmhg', 'hg gh', 52, ' gh', 25),
(28, 'hrtgwg', 'wefwe', 2852,'fwe',2525);
