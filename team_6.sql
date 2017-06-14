-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 04:47 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team_6`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_applicant` (IN `appl_id` INT(50))  BEGIN
declare pass varchar(50);
declare grt int(50);
declare ssn2 int(50);
SELECT  password into pass FROM applicant_signup where user_name in(SELECT user_name FROM applicant where applicant_id=appl_id);

insert into employee(first_name,last_name,zip_code,type,address_line_1,address_line_2,contact,dob,password)select first_name,last_name,zip_code,position,addressline_1,addressline_2,contact,date_of_birth,pass from applicant where applicant_id =appl_id;

select max(emp_id)into grt from employee ;
select ssn into ssn2 from Applicant_ssn where applicant_id=appl_id;

insert into Employee_ssn(emp_id,ssn)values(grt,ssn2);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_status` (IN `appl_id` INT(50), OUT `status` INT(10))  BEGIN
declare emp int(20);
declare ssn1 int(50);
set status =3;
set emp=0;

select ssn into ssn1 from applicant_ssn where applicant_id=appl_id;

select emp_id into emp from employee_ssn where ssn=ssn1;
if emp=0
then set status=2;
ELSE
set status=1;
end if;


END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `reservation` (`cap` INT(100), `book_date` DATE, `time1` TIME) RETURNS INT(10) BEGIN
    
    DECLARE table_num int(10);
    DECLARE guest_id int(11);
 
  SELECT table_no into table_num  FROM restaurant_table Where capacity=cap and table_no NOT IN(Select table_no from reservation B where date_booked=book_date and time=time1) LIMIT 1;
  
  SELECT MAX(guest_id) into guest_id FROM guest;
  INSERT INTO reservation(guest_id,table_no,date_booked,time1)
		VALUES (guest_id,table_numt,book_date,time1);
 
 RETURN (table_num);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `rest_reservation` (`cap` INT(100), `book_date` DATE, `time1` TIME) RETURNS INT(11) BEGIN
   
   DECLARE table_num int(10);
   DECLARE guest_id int(11);
   
   

 SELECT table_no into table_num  FROM restaurant_table Where capacity=cap and table_no NOT IN(Select table_no from reservation B where date_booked=book_date and time=time1) LIMIT 1;
 
 IF table_num <>0
 THEN
 
 SELECT MAX(guest_id) into guest_id FROM guest;
 INSERT INTO reservation(guest_id,table_no,date_booked,time)
VALUES (guest_id,table_num,book_date,time1);

ELSE
SET table_num=0;

end IF;
RETURN (table_num);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `res_reservation` (`cap` INT(100), `book_date` DATE, `time1` TIME) RETURNS INT(11) BEGIN
    
    DECLARE table_num int(10);
    DECLARE guest_id int(11);
 
  SELECT table_no into table_num  FROM restaurant_table Where capacity=cap and table_no NOT IN(Select table_no from reservation B where date_booked=book_date and time=time1) LIMIT 1;
  
  SELECT MAX(guest_id) into guest_id FROM guest;
  INSERT INTO reservation(guest_id,table_no,date_booked,time)
		VALUES (guest_id,table_num,book_date,time1);
 
 RETURN (table_num);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicant_id` int(50) NOT NULL,
  `first_name` char(50) NOT NULL,
  `last_name` char(50) NOT NULL,
  `addressline_1` varchar(100) NOT NULL,
  `addressline_2` varchar(100) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `qualification` varchar(1000) NOT NULL,
  `date_of_application` date NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `first_name`, `last_name`, `addressline_1`, `addressline_2`, `zip_code`, `contact`, `position`, `qualification`, `date_of_application`, `email_id`, `user_name`, `date_of_birth`) VALUES
(17, 'disha', 'shetty', 'abc', '', 28262, '12345678', 'Manager', 'MBA', '2016-11-01', 'abc@gmail.com', 'disha', '1992-07-29'),
(22, 'aman', 'varms', '9523 A', 'UTD', 28262, '9803192256', 'Full Time', 'MBA', '2016-11-21', 'aman@uncc.edu', 'aman', '1992-07-28'),
(23, 'sohail', 'abbas', '9523 H, university terrace drive, university terrace drive', 'university terrace drive', 28262, '9803192256', 'Full Time', 'mba', '2016-11-28', 'SOHAIL@uncc.edu', 'sohail', '1992-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_signup`
--

CREATE TABLE `applicant_signup` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_signup`
--

INSERT INTO `applicant_signup` (`user_name`, `password`) VALUES
('abc', '123'),
('abcd', '1234'),
('aman', '124'),
('disha', '1234'),
('karunakar', '9999'),
('ramu', '1234'),
('sohail', 'sohail1234'),
('sohail1', '123'),
('stiwari', '1234'),
('vivek', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_ssn`
--

CREATE TABLE `applicant_ssn` (
  `applicant_id` int(50) NOT NULL,
  `ssn` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_ssn`
--

INSERT INTO `applicant_ssn` (`applicant_id`, `ssn`) VALUES
(17, 7),
(22, 987651234),
(23, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `state_id`) VALUES
(1, 'charlotte', 1),
(2, 'Columbia', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `first_name` char(50) NOT NULL,
  `last_name` char(50) NOT NULL,
  `dob` date NOT NULL,
  `salary` int(11) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address_line_1` varchar(100) NOT NULL,
  `address_line_2` varchar(100) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `date_of_joining` date NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `password`, `first_name`, `last_name`, `dob`, `salary`, `contact`, `address_line_1`, `address_line_2`, `zip_code`, `date_of_joining`, `type`) VALUES
(1234595, '1234', 'disha', 'shetty', '1992-07-29', 0, '12345678', 'abc', '', 28262, '0000-00-00', 'Manager'),
(1234597, '124', 'aman', 'varms', '1992-07-28', 0, '9803192256', '9523 A', 'UTD', 28262, '0000-00-00', 'Full Time'),
(1234598, 'sohail1234', 'sohail', 'abbas', '1992-11-01', 0, '9803192256', '9523 H, university terrace drive, university terrace drive', 'university terrace drive', 28262, '0000-00-00', 'Full Time');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `before_employee_insert` BEFORE INSERT ON `employee` FOR EACH ROW BEGIN
   UPDATE vacancy 
   SET  num_of_vac=num_of_vac-1
    where  title= new.type;
       
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_ssn`
--

CREATE TABLE `employee_ssn` (
  `emp_id` int(20) NOT NULL,
  `ssn` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_ssn`
--

INSERT INTO `employee_ssn` (`emp_id`, `ssn`) VALUES
(1234595, 124),
(1234597, 987651234),
(1234598, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`type`) VALUES
('Full Time'),
('Manager'),
('Part time');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `full_name` varchar(25) NOT NULL,
  `meal_type` varchar(25) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `number_of_people` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `full_name`, `meal_type`, `phone_number`, `number_of_people`) VALUES
(1, 'disha', 'Dinner', '982056787', 2),
(2, 'raju', 'Breakfast', '1234566', 1),
(3, 'pratik', 'Breakfast', '99898976', 2),
(4, 'pratik', 'Breakfast', '99898976', 2),
(5, 'pratik', 'Breakfast', '99898976', 2),
(6, 'pratik', 'Breakfast', '99898976', 2),
(7, 'viresh', 'Breakfast', '9820568087', 6),
(8, 'viresh', 'Breakfast', '9820568087', 1),
(9, 'viresh', 'Breakfast', '9820568087', 1),
(10, 'viresh', 'Breakfast', '9820568087', 1),
(11, 'viresh', 'Breakfast', '9820568087', 2),
(12, 'viresh', 'Breakfast', '9820568087', 2),
(13, 'viresh', 'Breakfast', '9820568087', 2),
(14, 'rishi', 'Breakfast', '982056897', 1),
(15, 'rish', 'Breakfast', '982056896', 2),
(16, 'rish', 'Breakfast', '982056896', 2),
(17, 'rish', 'Breakfast', '982056896', 2),
(18, 'rish', 'Breakfast', '982056896', 2),
(19, 'rish', 'Breakfast', '982056896', 2),
(20, 'nn', 'Breakfast', '878543', 2),
(21, 'bb', 'Breakfast', '87553232', 2),
(22, 'bb', 'Breakfast', '87553232', 2),
(23, 'bb', 'Breakfast', '87553232', 2),
(24, 'tanvi', 'Breakfast', '9820568087', 2),
(25, 'tt', 'Breakfast', '9870347575', 2),
(26, 'rr', 'Breakfast', '2222222222', 2),
(27, 'abc', 'Breakfast', '98023975', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `dish_name` varchar(20) NOT NULL,
  `price` int(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`dish_name`, `price`, `description`) VALUES
('fries', 2, 'fried potato sticks'),
('matar', 8, 'green peas dish'),
('pizza', 8, 'Flat bread topped with tomato sauce and cheese'),
('sambar', 2, 'vegetable soup'),
('tacos', 5, 'Mexican dish composed of corn folded around a filling');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `table_no` int(10) NOT NULL,
  `date_booked` date NOT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `table_no`, `date_booked`, `guest_id`, `type`, `time`) VALUES
(1, 3, '2016-01-03', 1, '1', '11:00:00'),
(2, 4, '2016-01-03', 1, '1', '11:00:00'),
(3, 3, '2016-01-03', 1, '1', '12:00:00'),
(4, 4, '2016-01-03', 1, '1', '12:00:00'),
(5, 3, '2016-01-25', 1, '1', '12:00:00'),
(6, 4, '2016-01-25', 1, '1', '12:00:00'),
(7, 3, '2016-11-30', 1, '1', '15:00:00'),
(8, 3, '2016-11-16', NULL, '', '10:00:00'),
(9, 4, '2016-11-16', NULL, '', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_table`
--

CREATE TABLE `restaurant_table` (
  `table_no` int(10) NOT NULL,
  `capacity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_table`
--

INSERT INTO `restaurant_table` (`table_no`, `capacity`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'North Carolina'),
(2, 'South Carolina');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `num_of_vac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `title`, `num_of_vac`) VALUES
(1, 'Manager', 0),
(2, 'Full Time', 2),
(3, 'Part Time', 4);

-- --------------------------------------------------------

--
-- Table structure for table `zipcode`
--

CREATE TABLE `zipcode` (
  `zipcode` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zipcode`
--

INSERT INTO `zipcode` (`zipcode`, `city_id`) VALUES
(28262, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `zip_code` (`zip_code`),
  ADD KEY `applicant_ibfk_3` (`position`);

--
-- Indexes for table `applicant_signup`
--
ALTER TABLE `applicant_signup`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `applicant_ssn`
--
ALTER TABLE `applicant_ssn`
  ADD PRIMARY KEY (`applicant_id`,`ssn`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `zip_code` (`zip_code`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `employee_ssn`
--
ALTER TABLE `employee_ssn`
  ADD PRIMARY KEY (`emp_id`,`ssn`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`dish_name`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `table_no` (`table_no`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  ADD PRIMARY KEY (`table_no`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zipcode`
--
ALTER TABLE `zipcode`
  ADD PRIMARY KEY (`zipcode`),
  ADD KEY `city_id` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `applicant_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234599;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `applicant_signup` (`user_name`),
  ADD CONSTRAINT `applicant_ibfk_2` FOREIGN KEY (`zip_code`) REFERENCES `zipcode` (`zipcode`),
  ADD CONSTRAINT `applicant_ibfk_3` FOREIGN KEY (`position`) REFERENCES `employee_type` (`type`);

--
-- Constraints for table `applicant_ssn`
--
ALTER TABLE `applicant_ssn`
  ADD CONSTRAINT `applicant_ssn_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`zip_code`) REFERENCES `zipcode` (`zipcode`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`type`) REFERENCES `employee_type` (`type`);

--
-- Constraints for table `employee_ssn`
--
ALTER TABLE `employee_ssn`
  ADD CONSTRAINT `employee_ssn_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`table_no`) REFERENCES `restaurant_table` (`table_no`);

--
-- Constraints for table `zipcode`
--
ALTER TABLE `zipcode`
  ADD CONSTRAINT `zipcode_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
