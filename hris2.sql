-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 06:34 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hris2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_account`
--

CREATE TABLE IF NOT EXISTS `tbl_admin_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin_account`
--

INSERT INTO `tbl_admin_account` (`id`, `username`, `password`, `name`, `contact`, `address`, `email`, `image`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 123, 'Val', 'admin@gmail.com', 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'not-paid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `employee_id`, `time_in`, `time_out`, `date`, `status`) VALUES
(1, 2, '12:42:03', NULL, '2017-10-08', 'not-paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_benefits`
--

CREATE TABLE IF NOT EXISTS `tbl_benefits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL,
  `sss` float NOT NULL,
  `philhealth` float NOT NULL,
  `pagibig` float NOT NULL,
  `tax` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_benefits`
--

INSERT INTO `tbl_benefits` (`id`, `position`, `sss`, `philhealth`, `pagibig`, `tax`) VALUES
(1, 'Pet Groomer', 490, 225, 100, 0),
(2, 'Cashier', 490, 225, 100, 0),
(3, 'Pet Care', 490, 225, 100, 0),
(4, 'Assistant Manager', 581, 262, 100, 0),
(5, 'Manager', 581, 262, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bonus`
--

CREATE TABLE IF NOT EXISTS `tbl_bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `notes` text NOT NULL,
  `date` date NOT NULL,
  `isPaid` varchar(10) NOT NULL DEFAULT 'not-paid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_bonus`
--

INSERT INTO `tbl_bonus` (`id`, `employee_id`, `amount`, `notes`, `date`, `isPaid`) VALUES
(2, 2, 500, 'Load Allowance', '2017-10-02', 'not-paid'),
(3, 2, 350, 'Clothes', '2017-10-02', 'not-paid'),
(4, 2, 350, 'Transpo', '2017-10-02', 'not-paid'),
(5, 2, 300, 'Medical Allowance', '2017-10-02', 'not-paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_details`
--

CREATE TABLE IF NOT EXISTS `tbl_employee_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `college_level` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `secondary` varchar(50) NOT NULL,
  `primary_level` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT 'no-image.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_employee_details`
--

INSERT INTO `tbl_employee_details` (`id`, `name`, `position`, `nickname`, `birthday`, `gender`, `age`, `civil_status`, `religion`, `height`, `weight`, `nationality`, `language`, `address`, `contact`, `email`, `blood_type`, `college_level`, `course`, `level`, `secondary`, `primary_level`, `image`) VALUES
(2, 'Mercado,Brian Alonzo', 'Manager', 'Briann', '2001-01-01', 'male', 8, 'single', 'Catholic', '5''7', '60', 'Filipinoo', 'Tagalog, Englishh', 'Valenzuela', 123, 'sample@gmail.comm', 'A+', 'PLVV', 'HRDMM', '4', 'MNHS', 'MNES', 'no-image.png'),
(3, ' Reyes, Jasmine Cruz', 'Assistant Manager', 'Jas', '2000-01-01', 'female', 17, 'single', 'Catholic', '5''7', '60', 'Filipino', 'Tagalog, English', 'Valenzuela', 2147483647, 'sample@gmail.com', 'A', 'PLV', 'HRDM', '4', 'MNHS', 'MES', 'no-image.png'),
(4, 'Dela Cruz,Katelyn Joy Tuazon', 'Cashier', 'Kate', '2000-01-01', 'female', 17, 'single', 'Catholic', '5''7', '60', 'Filipino', 'Tagalog, English', 'Valenzuela', 2147483647, 'sample@gmail.com', 'A', 'PLV', 'HRDM', '4', 'MNHS', 'MES', 'no-image.png'),
(5, 'Salvador, Jayson Reyes', 'Pet Groomer', 'Jayson', '2000-01-01', 'male', 17, 'single', 'Catholic', '5''7', '60', 'Filipino', 'Tagalog, English', 'Valenzuela', 2147483647, 'sample@gmail.com', 'A', 'PLV', 'HRDM', '4', 'MNHS', 'MES', 'no-image.png'),
(6, 'Santos, Mark Kevin Joaquin', 'Pet Groomer', 'Mark', '2000-01-01', 'male', 17, 'single', 'Catholic', '5''7', '60', 'Filipino', 'Tagalog, English', 'Valenzuela', 2147483647, 'sample@gmail.com', 'A', 'PLV', 'HRDM', '4', 'MNHS', 'MES', 'no-image.png'),
(7, 'Camus, Joanna Bautista', 'Pet Care', 'Joan', '2000-01-01', 'female', 17, 'single', 'Catholic', '5''7', '60', 'Filipino', 'Tagalog, English', 'Valenzuela', 2147483647, 'sample@gmail.com', 'A', 'PLV', 'HRDM', '4', 'MNHS', 'MES', 'no-image.png'),
(8, 'Co, Justin De Guzman', 'Pet Care', 'Justin', '2000-01-01', 'male', 17, 'single', 'Catholic', '5''7', '60', 'Filipino', 'Tagalog, English', 'Valenzuela', 2147483647, 'sample@gmail.com', 'A', 'PLV', 'HRDM', '4', 'MNHS', 'MES', 'no-image.png'),
(9, 'Llagas, Jerome Acebedo', 'Pet Care', 'Jerome', '2000-01-01', 'male', 17, 'single', 'Catholic', '5''7', '60', 'Filipino', 'Tagalog, English', 'Valenzuela', 2147483647, 'sample@gmail.com', 'A', 'PLV', 'HRDM', '4', 'MNHS', 'MES', 'no-image.png'),
(10, 'Cantor, Marcio', 'Pet Care', 'Marcio', '2000-01-01', 'male', 17, 'single', 'Catholic', '5''7', '60', 'Filipino', 'Tagalog, English', 'Valenzuela', 2147483647, 'sample@gmail.com', 'A', 'PLV', 'HRDM', '4', 'MNHS', 'MES', 'no-image.png'),
(11, 'Sabado, Markee', 'Pet Care', 'Markee', '2000-01-01', 'male', 17, 'single', 'Catholic', '5''7', '60', 'Filipino', 'Tagalog, English', 'Valenzuela', 2147483647, 'sample@gmail.com', 'A', 'PLV', 'HRDM', '4', 'MNHS', 'MES', 'no-image.png'),
(12, 'Gutierrez, Marlou', 'Pet Care', 'Marlou', '2000-01-01', 'male', 17, 'single', 'Catholic', '5''7', '60', 'Filipino', 'Tagalog, English', 'Valenzuela', 2147483647, 'sample@gmail.com', 'A', 'PLV', 'HRDM', '4', 'MNHS', 'MES', 'no-image.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_rate`
--

CREATE TABLE IF NOT EXISTS `tbl_employee_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL,
  `rate` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_employee_rate`
--

INSERT INTO `tbl_employee_rate` (`id`, `position`, `rate`) VALUES
(1, 'Pet Care', 512),
(2, 'Cashier', 512),
(3, 'Manager', 810),
(4, 'Veterenarian', 0),
(5, 'Pet Groomer', 512),
(6, 'Assistant Manager', 710);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holidays`
--

CREATE TABLE IF NOT EXISTS `tbl_holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_holidays`
--

INSERT INTO `tbl_holidays` (`id`, `date`, `name`, `type`) VALUES
(3, '2017-01-01', 'New Year''s Day', 'regular'),
(4, '2017-03-29', 'Maundy Thursday', 'regular'),
(5, '2017-03-30', 'Good Friday', 'regular'),
(6, '2017-04-09', 'Araw ng Kagitingan', 'regular'),
(7, '2017-05-01', 'Labor Day', 'regular'),
(8, '2017-06-12', 'Independence Day', 'regular'),
(9, '2017-08-27', 'National Heroes Day', 'regular'),
(10, '2017-11-30', 'Bonifacio Day', 'regular'),
(11, '2017-12-25', 'Christmas Day', 'regular'),
(12, '2017-12-30', 'Rizal Day', 'regular'),
(13, '2017-02-16', 'Chinese New Year', 'special'),
(14, '2017-02-25', 'EDSA People Power Revolution Anniversary', 'special'),
(15, '2017-03-31', 'Black Saturday', 'special'),
(16, '2017-08-21', 'Ninoy Aquino Day', 'special'),
(17, '2017-11-01', 'All Saint''s Day', 'special'),
(18, '2017-12-31', 'Last Day of the year', 'special'),
(19, '2017-11-02', 'All Soul''s Day', 'special'),
(20, '2017-12-24', 'Christmas Eve', 'special');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE IF NOT EXISTS `tbl_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `note` text NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`id`, `date`, `note`, `employee_id`) VALUES
(1, '2017-10-08', 'sick', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE IF NOT EXISTS `tbl_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `total_salary` float NOT NULL,
  `total_bonus` float NOT NULL,
  `total_deduction` float NOT NULL,
  `date` date NOT NULL,
  `salary` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
