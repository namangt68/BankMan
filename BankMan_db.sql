-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2014 at 05:30 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `BankMan`
--

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMERS`
--

CREATE TABLE IF NOT EXISTS `CUSTOMERS` (
  `Acc_no` int(30) NOT NULL,
  `First_name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `Contact_No` bigint(12) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Created_on` date NOT NULL,
  `Amount` int(11) NOT NULL,
  `ATM_NO` bigint(20) NOT NULL,
  `PIN` int(11) NOT NULL,
  `Emp_id` varchar(30) NOT NULL,
  PRIMARY KEY (`Acc_no`),
  UNIQUE KEY `ATM_NO` (`ATM_NO`),
  KEY `Emp_id` (`Emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CUSTOMERS`
--

INSERT INTO `CUSTOMERS` (`Acc_no`, `First_name`, `Last_name`, `DOB`, `Contact_No`, `Address`, `Created_on`, `Amount`, `ATM_NO`, `PIN`, `Emp_id`) VALUES
(1233108100, 'Hrithik', 'Roshan', '2000-01-02', 9112542365, 'Mumbai', '2014-11-03', 9953800, 4591536044433712, 8272, 'alex_banker'),
(1237912995, 'Deepika', 'Padukone', '2003-03-03', 9421352012, 'Bengaluru', '2014-11-03', 4003900, 4591720349994488, 5125, 'alex_banker'),
(1238069768, 'Kareena', 'Kapoor', '2001-02-03', 7525992132, 'Pataudi', '2014-11-03', 45001000, 4591706200773827, 8457, 'alex_banker'),
(1238153062, 'Ranbeer', 'Kapoor', '2002-02-03', 9421356821, 'Punjab', '2014-11-03', 8001000, 4591996880438644, 1730, 'alex_banker'),
(1239799042, 'Akshay', 'Kumar', '2002-04-01', 9431568452, 'Ludhiana', '2014-11-03', 2147483647, 4591869573610369, 3843, 'alex_banker');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `Emp_id` varchar(30) NOT NULL,
  `Password` varchar(40) NOT NULL,
  PRIMARY KEY (`Emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`Emp_id`, `Password`) VALUES
('alex_banker', '32250170a0dca92d53ec9624f336ca24'),
('ATM_banker', '1ccd6af4a2ca8d765ba5be68caa7c2dd');

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE IF NOT EXISTS `Transaction` (
  `Trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Acc_no1` int(11) DEFAULT NULL,
  `Acc_no2` int(11) DEFAULT NULL,
  `Remark` varchar(30) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Emp_id` varchar(30) NOT NULL,
  PRIMARY KEY (`Trans_id`),
  KEY `Acc_no1` (`Acc_no1`),
  KEY `Emp_id` (`Emp_id`),
  KEY `Acc_no2` (`Acc_no2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `Transaction`
--

INSERT INTO `Transaction` (`Trans_id`, `Date`, `Acc_no1`, `Acc_no2`, `Remark`, `Amount`, `Emp_id`) VALUES
(5, '2014-11-03', 1237912995, 1237912995, 'CREDIT_CHEQUE', 1000, 'alex_banker'),
(11, '2014-11-03', NULL, 1237912995, 'CREDIT_CASH', 1000, 'alex_banker'),
(13, '2014-11-03', NULL, 1237912995, 'CREDIT_CASH', 1000, 'alex_banker'),
(14, '2014-11-03', 1237912995, NULL, 'DEBIT', 1000, 'alex_banker'),
(15, '2014-11-03', NULL, 1237912995, 'CREDIT_CASH', 5000, 'alex_banker'),
(16, '2014-11-03', 1233108100, NULL, 'ATM_DEBIT', 1000, 'ATM_banker'),
(19, '2014-11-03', 1233108100, 1238153062, 'TRANSFER', 1000, 'alex_banker'),
(20, '2014-11-03', 1233108100, NULL, 'ATM_DEBIT', 1000, 'ATM_banker'),
(26, '2014-11-03', 1233108100, 1239799042, 'TRANSFER', 100, 'ATM_banker'),
(27, '2014-11-03', 1233108100, 1239799042, 'TRANSFER', 10000, 'ATM_banker'),
(28, '2014-11-03', 1233108100, 1239799042, 'TRANSFER', 10000, 'ATM_banker'),
(29, '2014-11-03', 1233108100, 1239799042, 'TRANSFER', 10000, 'ATM_banker'),
(30, '2014-11-03', 1233108100, 1239799042, 'TRANSFER', 10000, 'ATM_banker'),
(36, '2014-11-03', 1233108100, 1239799042, 'TRANSFER', 100, 'ATM_banker'),
(37, '2014-11-03', 1233108100, NULL, 'DEBIT', 1000, 'alex_banker'),
(38, '2014-11-03', 1233108100, NULL, 'ATM_DEBIT', 1000, 'ATM_banker'),
(39, '2014-11-03', 1233108100, 1238069768, 'TRANSFER', 1000, 'ATM_banker');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CUSTOMERS`
--
ALTER TABLE `CUSTOMERS`
  ADD CONSTRAINT `CUSTOMERS_ibfk_1` FOREIGN KEY (`Emp_id`) REFERENCES `Employee` (`Emp_id`);

--
-- Constraints for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD CONSTRAINT `Transaction_ibfk_1` FOREIGN KEY (`Acc_no1`) REFERENCES `CUSTOMERS` (`Acc_no`),
  ADD CONSTRAINT `Transaction_ibfk_2` FOREIGN KEY (`Emp_id`) REFERENCES `Employee` (`Emp_id`),
  ADD CONSTRAINT `Transaction_ibfk_3` FOREIGN KEY (`Acc_no2`) REFERENCES `CUSTOMERS` (`Acc_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
