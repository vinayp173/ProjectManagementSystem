-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2016 at 01:19 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` int(10) NOT NULL,
  `post` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`emp_id`, `name`, `number`, `post`) VALUES
(1, 'Vinay', 3232, 'Manager'),
(2, 'vijay', 4334, 'Leader'),
(3, 'raju', 3443, 'employee'),
(4, 'ram', 43345, 'developer');

-- --------------------------------------------------------

--
-- Table structure for table `employee_list`
--

CREATE TABLE `employee_list` (
  `emp_list` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_list`
--

INSERT INTO `employee_list` (`emp_list`, `emp_id`) VALUES
(1, 12345),
(1, 12346),
(2, 12346),
(2, 12347),
(10, 12348),
(9, 12348);

-- --------------------------------------------------------

--
-- Table structure for table `emptask`
--

CREATE TABLE `emptask` (
  `task_id` int(11) NOT NULL,
  `emp_list` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `task` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `priority` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `perComplete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emptask`
--

INSERT INTO `emptask` (`task_id`, `emp_list`, `emp_id`, `task`, `status`, `priority`, `startDate`, `endDate`, `perComplete`) VALUES
(1, 1, 12345, 'create new module to send messages', 0, 0, '0000-00-00', '0000-00-00', 0),
(2, 1, 12345, 'integrate device id', 0, 0, '0000-00-00', '0000-00-00', 0),
(3, 1, 12346, 'integrate db mirroring', 0, 0, '0000-00-00', '0000-00-00', 0),
(4, 2, 12346, 'add device admin privillege', 1, 0, '0000-00-00', '0000-00-00', 0),
(5, 2, 12347, 'update UI', 0, 0, '0000-00-00', '0000-00-00', 0),
(6, 8, 12345, 'hello', 0, 0, '0000-00-00', '0000-00-00', 0),
(7, 18, 12345, 'final try task ', 0, 0, '0000-00-00', '0000-00-00', 0),
(8, 18, 12346, 'with date', 0, 0, '2016-10-26', '2016-10-30', 0),
(10, 13, 12345, 'checking integration', 0, 0, '2016-10-25', '2016-10-30', 0),
(11, 10, 12348, 'new developer new task', 0, 0, '2016-10-19', '2016-10-26', 0),
(12, 10, 12348, 'new developer new task2', 0, 0, '2016-10-20', '2016-10-28', 0),
(13, 10, 12348, 'new developer new task3', 0, 0, '2016-10-07', '2016-10-12', 0),
(14, 10, 12348, 'new developer new task3', 0, 0, '2016-10-07', '2016-10-12', 0),
(15, 10, 12348, 'new developer new task4', 0, 0, '2016-10-07', '2016-10-21', 0),
(16, 9, 12348, 'new developer new task', 0, 0, '2016-10-19', '2016-11-04', 0),
(17, 9, 12348, 'new developer new task2', 0, 0, '2016-10-27', '2016-10-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projectall`
--

CREATE TABLE `projectall` (
  `pid` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `managerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectall`
--

INSERT INTO `projectall` (`pid`, `project_name`, `managerID`) VALUES
(1, 'android', 10),
(2, 'Web designing', 11),
(3, 'big data', 12),
(4, 'clod computing', 10),
(5, 'working project ', 11),
(6, 'new with manager ID', 10);

-- --------------------------------------------------------

--
-- Table structure for table `project_instance`
--

CREATE TABLE `project_instance` (
  `pid` int(11) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `emp_list` int(11) NOT NULL,
  `leaderID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_instance`
--

INSERT INTO `project_instance` (`pid`, `module_name`, `emp_list`, `leaderID`) VALUES
(1, 'design UI', 1, 1235),
(1, 'backend Development', 2, 1235),
(1, 'processing', 3, 1235),
(2, 'XML design', 4, 1235),
(2, 'setup cloud services', 5, 1234),
(2, 'add offline features ', 6, 1234),
(1, 'progress', 7, 1235),
(3, 'setting cloud api', 8, 1234),
(1, 'money', 9, 1234),
(1, 'moon', 10, 1234),
(4, 'add cloud data', 11, 1234),
(1, 'lollipop', 12, 1235),
(2, 'check the bug', 13, 1234),
(3, 'chjeck the bug 2', 14, 1235),
(4, 'new module', 15, 1234),
(3, 'new try', 16, 1235),
(2, 'final try', 17, 1235),
(2, 'final try2', 18, 1234),
(3, 'final static ', 19, 1235),
(5, 'working 1', 20, 1235);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `post` varchar(10) NOT NULL,
  `number` int(10) NOT NULL,
  `language` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Username`, `password`, `email`, `post`, `number`, `language`) VALUES
(1, 'admin', 'b4af804009cb036a4ccdc33431ef9ac9', '', 'admin', 0, ''),
(10, ' Vinay       ', 'b4af804009cb036a4ccdc33431ef9ac9', 'vinayp173@gmail.com    ', '   manager', 766406289, 'java,c,perl,C#       '),
(11, 'Akash', 'b4af804009cb036a4ccdc33431ef9ac9', '', 'manager', 0, 'java,c'),
(12, 'Sachin', 'b4af804009cb036a4ccdc33431ef9ac9', 'sbj276@gmail.com', 'manager', 0, 'java,c'),
(1234, 'ramu', 'b4af804009cb036a4ccdc33431ef9ac9', 'avsdev847@gmail.com', 'TLeader', 123212723, 'c,java,c#'),
(1235, 'damu', 'b4af804009cb036a4ccdc33431ef9ac9', 'avsdev847@gmail.com', 'TLeader', 23212371, 'c,java,c#'),
(12345, 'developer', 'b4af804009cb036a4ccdc33431ef9ac9', 'vinayp173@gmail.com    ', 'developer', 0, 'java,c'),
(12346, 'dev1', 'b4af804009cb036a4ccdc33431ef9ac9', 'avsdev847@gmail.com', 'developer', 43764356, 'java'),
(12347, 'dev2', 'b4af804009cb036a4ccdc33431ef9ac9', 'avsdev847@gmail.com', 'developer', 43764356, 'java'),
(12348, 'new devloper', 'b4af804009cb036a4ccdc33431ef9ac9', '', 'Developer', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emptask`
--
ALTER TABLE `emptask`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `projectall`
--
ALTER TABLE `projectall`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `project_instance`
--
ALTER TABLE `project_instance`
  ADD PRIMARY KEY (`emp_list`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
