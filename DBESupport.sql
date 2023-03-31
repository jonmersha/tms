-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2014 at 10:21 PM
-- Server version: 5.5.34-MariaDB
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DBESupport`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `caseid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `actionperformed` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`caseid`,`userid`,`actionperformed`,`date`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`caseid`, `userid`, `actionperformed`, `date`) VALUES
(1, 2, 'create', '2014-04-25 08:30:48'),
(1, 3, 'Resolve', '2014-04-27 07:26:21'),
(1, 4, 'Assign', '2014-04-25 10:42:52'),
(1, 4, 'edite', '2014-04-25 10:42:20'),
(1, 4, 'edite', '2014-04-27 09:25:52'),
(1, 4, 'edite', '2014-04-27 10:23:14'),
(2, 2, 'create', '2014-04-25 10:36:21'),
(3, 2, 'create', '2014-04-25 10:39:12'),
(3, 4, 'Close', '2014-04-25 11:03:29'),
(3, 4, 'Close', '2014-04-27 07:27:05'),
(3, 4, 'Close', '2014-04-27 07:28:52'),
(3, 4, 'Close', '2014-04-27 07:32:44'),
(3, 4, 'Close', '2014-04-27 07:36:45'),
(3, 4, 'Close', '2014-04-27 08:06:36'),
(3, 4, 'Close', '2014-04-27 10:41:17'),
(3, 4, 'Close', '2014-04-27 10:44:07'),
(3, 4, 'Close', '2014-04-28 05:10:13'),
(4, 2, 'create', '2014-04-25 10:50:43'),
(4, 3, 'edite', '2014-04-25 10:54:03'),
(4, 3, 'Resolve', '2014-04-25 10:55:36'),
(4, 4, 'Assign', '2014-04-25 10:51:48'),
(5, 2, 'create', '2014-04-25 10:58:41'),
(5, 3, 'edite', '2014-05-07 05:51:45'),
(5, 3, 'Resolve', '2014-05-07 05:51:45'),
(5, 4, 'Assign', '2014-04-27 11:18:37'),
(5, 4, 'edite', '2014-04-27 10:58:30'),
(6, 2, 'create', '2014-04-25 11:01:14'),
(6, 3, 'Resolve', '2014-04-25 11:02:51'),
(6, 4, 'Assign', '2014-04-25 11:01:44'),
(6, 4, 'edite', '2014-04-27 09:24:44'),
(7, 2, 'create', '2014-04-27 11:22:20'),
(7, 3, 'edite', '2014-05-07 02:30:49'),
(7, 3, 'edite', '2014-05-07 05:37:29'),
(7, 3, 'edite', '2014-05-07 05:37:56'),
(7, 3, 'Resolve', '2014-05-07 05:38:19'),
(7, 4, 'Assign', '2014-04-28 05:52:13'),
(8, 2, 'create', '2014-04-27 11:29:04'),
(8, 3, 'Resolve', '2014-04-28 06:55:18'),
(8, 4, 'Assign', '2014-04-28 06:01:17'),
(9, 2, 'create', '2014-04-28 05:05:10'),
(9, 3, 'Resolve', '2014-04-28 05:09:16'),
(9, 4, 'Assign', '2014-04-28 05:05:53'),
(10, 2, 'create', '2014-04-28 06:19:52'),
(10, 3, 'Resolve', '2014-04-28 06:46:31'),
(10, 4, 'Assign', '2014-04-28 06:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `app_prmision`
--

CREATE TABLE IF NOT EXISTS `app_prmision` (
  `pr_name` varchar(20) NOT NULL,
  `Description` varchar(300) NOT NULL,
  PRIMARY KEY (`pr_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_prmision`
--

INSERT INTO `app_prmision` (`pr_name`, `Description`) VALUES
('Admin', 'Administration'),
('Creator', 'Case Creator'),
('guest', 'guestusers'),
('Leader', 'Team leder'),
('Manager', 'ITS MAnager'),
('users', 'System users');

-- --------------------------------------------------------

--
-- Table structure for table `AssignedCase`
--

CREATE TABLE IF NOT EXISTS `AssignedCase` (
  `CaseId` int(11) NOT NULL,
  `userId` int(11) NOT NULL DEFAULT '0',
  `Assignmenttime` date NOT NULL,
  `Assigner` int(11) NOT NULL,
  `CaseStatus` int(11) NOT NULL,
  PRIMARY KEY (`CaseId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AssignedCase`
--

INSERT INTO `AssignedCase` (`CaseId`, `userId`, `Assignmenttime`, `Assigner`, `CaseStatus`) VALUES
(1, 3, '2014-04-25', 4, 2),
(4, 3, '2014-04-25', 4, 2),
(5, 3, '2014-04-27', 4, 1),
(6, 3, '2014-04-25', 4, 2),
(7, 3, '2014-04-28', 4, 1),
(8, 3, '2014-04-28', 4, 1),
(9, 3, '2014-04-28', 4, 2),
(10, 3, '2014-04-28', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `caseedite`
--

CREATE TABLE IF NOT EXISTS `caseedite` (
  `caseid` int(11) NOT NULL,
  `Editor` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `editedtime` datetime NOT NULL,
  PRIMARY KEY (`caseid`,`Editor`,`editedtime`),
  KEY `Editor` (`Editor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caseedite`
--

INSERT INTO `caseedite` (`caseid`, `Editor`, `description`, `editedtime`) VALUES
(1, 4, 'there is two more computers', '2014-04-25 10:42:20'),
(1, 4, '', '2014-04-27 09:25:52'),
(1, 4, 'mess', '2014-04-27 10:23:14'),
(4, 3, 'the computers are not joined domain so the server donot assign ip the non memeber computers(the computers that not in domain)', '2014-04-25 10:54:03'),
(5, 3, '', '2014-05-07 05:51:45'),
(5, 4, 'lalombelalombe', '2014-04-27 10:58:30'),
(6, 4, '', '2014-04-27 09:24:43'),
(7, 3, 'client pc in not joined to server', '2014-05-07 02:30:49'),
(7, 3, 'test edit', '2014-05-07 05:37:29'),
(7, 3, 'ter', '2014-05-07 05:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `caselist`
--

CREATE TABLE IF NOT EXISTS `caselist` (
  `caseid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `status` varchar(50) NOT NULL,
  `requester` varchar(200) NOT NULL,
  `workunit` varchar(50) NOT NULL,
  `ext` int(11) NOT NULL,
  `Priority` varchar(50) DEFAULT NULL,
  `Catagory` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`caseid`,`workunit`),
  KEY `workunit` (`workunit`),
  KEY `caselist_ibfk_25` (`Priority`),
  KEY `caselist_ibfk_37` (`Catagory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caselist`
--

INSERT INTO `caselist` (`caseid`, `title`, `details`, `status`, `requester`, `workunit`, `ext`, `Priority`, `Catagory`) VALUES
(1, 'New computer configuration', '                    internal audit need one new computers instalation and joining to the system', 'Closed', 'ayal chane', 'iternal Audit', 373, '1-must be resolved', 'network'),
(2, 'password reset', '                    3 employes needs password reset', 'Not Assined', 'alem abebe', 'iternal Audit', 465, '1-must be resolved', 'corebanking'),
(3, 'Antivirus Problem', '                    the antiviruse needs update', 'Not Assined', 'argaw ashine', 'Finance And Account mangment', 274, '1-must be resolved', 'Security'),
(4, 'ipconflic', '                    the server unable assign ip to All workstation computer', 'Closed', 'alem hailu', 'Finance And Account mangment', 345, '1-must be resolved', 'network'),
(5, 'network', '                    blabla', 'Resolved', 'alem ragasa', 'Finance And Account mangment', 324, '1-must be resolved', 'network'),
(6, 'networksdont', '                    lili', 'Closed', 'yesew neger', 'iternal Audit', 213, '1-must be resolved', 'network'),
(7, 'printer problem', '                    unable to print on shared printer', 'Resolved', 'aleneh bulcha', 'Finance And Account mangment', 0, '1-must be resolved', 'network'),
(8, 'unble to print', '                    unable to print on networked printer', 'Resolved', 'solomon taye', 'iternal Audit', 253, '1-must be resolved', 'network'),
(9, 'test', '                    testing confirmation', 'Closed', 'yisma nigus', 'iternal Audit', 567, '1-must be resolved', 'network'),
(10, 'test', '                    test Description', 'Resolved', 'jemile hakarso', 'iternal Audit', 213, '1-must be resolved', 'network');

-- --------------------------------------------------------

--
-- Table structure for table `CasePriority`
--

CREATE TABLE IF NOT EXISTS `CasePriority` (
  `id` int(11) NOT NULL,
  `PrDescription` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `PrDescription` (`PrDescription`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CasePriority`
--

INSERT INTO `CasePriority` (`id`, `PrDescription`) VALUES
(2, '1-must be resolved'),
(1, '2-Must be resolve'),
(3, '3-must resolve');

-- --------------------------------------------------------

--
-- Table structure for table `closeReport`
--

CREATE TABLE IF NOT EXISTS `closeReport` (
  `caseid` int(11) NOT NULL,
  `confirmer` int(11) NOT NULL,
  `resolvedby` int(11) NOT NULL,
  `DescriptionOnconformation` varchar(1000) NOT NULL,
  `dateOfconformation` date NOT NULL,
  PRIMARY KEY (`caseid`,`confirmer`,`resolvedby`),
  KEY `confirmer` (`confirmer`),
  KEY `resolvedby` (`resolvedby`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closeReport`
--

INSERT INTO `closeReport` (`caseid`, `confirmer`, `resolvedby`, `DescriptionOnconformation`, `dateOfconformation`) VALUES
(1, 4, 3, '', '2014-04-27'),
(4, 4, 3, 'yes done', '2014-04-27'),
(6, 4, 3, '', '2014-04-27'),
(9, 4, 3, 'test confirmation', '2014-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `m_name` varchar(200) NOT NULL,
  `Deparment` int(11) NOT NULL,
  `extention` int(11) NOT NULL,
  `internalmail` varchar(100) NOT NULL,
  `tel_mob` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Deparment`),
  KEY `Deparment` (`Deparment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ResolvedReport`
--

CREATE TABLE IF NOT EXISTS `ResolvedReport` (
  `Caseid` int(11) NOT NULL,
  `Description on resolve` varchar(1000) NOT NULL,
  `Repertedto` int(11) NOT NULL,
  `Conformationstatus` int(11) NOT NULL,
  `resolvetime` int(11) NOT NULL,
  PRIMARY KEY (`Caseid`,`Repertedto`),
  KEY `Repertedto` (`Repertedto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ResolvedReport`
--

INSERT INTO `ResolvedReport` (`Caseid`, `Description on resolve`, `Repertedto`, `Conformationstatus`, `resolvetime`) VALUES
(1, 'configures as requered', 4, 1, 2014),
(4, 'All computers joined computers and the configuration set to dynaminc host configuration to get ip automatically from DHCp Server', 4, 1, 2014),
(5, '', 4, 0, 2014),
(6, 'cable replaced', 4, 1, 2014),
(7, 'resolve test', 4, 0, 2014),
(8, 'resolved by joining the users computer to domain', 4, 0, 2014),
(9, 'test resolved', 4, 1, 2014),
(10, 'test resolve', 4, 0, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `usercatagory`
--

CREATE TABLE IF NOT EXISTS `usercatagory` (
  `catid` int(11) NOT NULL,
  `catname` varchar(20) NOT NULL,
  PRIMARY KEY (`catid`),
  UNIQUE KEY `catname` (`catname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercatagory`
--

INSERT INTO `usercatagory` (`catid`, `catname`) VALUES
(3, 'corebanking'),
(1, 'network'),
(2, 'Security');

-- --------------------------------------------------------

--
-- Table structure for table `usercatagoryjunk`
--

CREATE TABLE IF NOT EXISTS `usercatagoryjunk` (
  `userdid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`userdid`,`catid`),
  KEY `catid` (`catid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `m_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `Team` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `ext` int(11) NOT NULL,
  `ernalmail` varchar(200) NOT NULL,
  `privatemail` varchar(200) NOT NULL,
  `tele_mob` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `confirmed` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `f_name`, `m_name`, `l_name`, `Team`, `Type`, `ext`, `ernalmail`, `privatemail`, `tele_mob`, `pass`, `confirmed`) VALUES
(1, 'admin', 'samson', 'girma', 'user1', 'Admin', 'Admin', 1, '1', '1', '1', '202cb962ac59075b964b07152d234b70', 1),
(2, 'creator', 'Selamawit', 'biru', 'user1', 'creator', 'Creator', 1, '1', '1', '1', '202cb962ac59075b964b07152d234b70', 1),
(3, 'user', 'Tedy', 'afro', 'user1', 'network', 'user', 1, '1', '1', '1', '202cb962ac59075b964b07152d234b70', 1),
(4, 'leader', 'abera', 'solomon', 'user1', 'network', 'Leader', 1, '1', '1', '1', '202cb962ac59075b964b07152d234b70', 1),
(5, 'YohannesM', 'Yohannes', 'Mitike', 'Mersha', 'network', 'user', 237, 'YohannesM@dbe.com', 'jonmersha@gmail.com', '913153125', '202cb962ac59075b964b07152d234b70', 1),
(12, 'asmare', 'biru', 'asmare', 'as', 'network', 'user', 23, '12', '13', '12', '202cb962ac59075b964b07152d234b70', 0),
(314, 'jon', 'Yohannes', 'Abera', 'mihrete', '', 'user', 324, 'wer', 'wer', '123', '202cb962ac59075b964b07152d234b70', 1),
(342, 'alem', 'hawa', 'sultan', 'figesa', 'Network', 'user', 123, 'wq', 'as', '1212', '202cb962ac59075b964b07152d234b70', 1),
(1209, 'asale', 'azalech', 'Dema', 'kukuyu', 'network', 'user', 321, 'maliint', 'mailp', '0913153125', '202cb962ac59075b964b07152d234b70', 1),
(1682, 'jon', 'Yohannes', 'Mitike', 'mersh', 'Network', 'user', 371, 'yohannesm', 'jonmersha@gmail.com', '0913153125', '123', 1),
(3453, 'mesay', 'measy', 'wendime', 'abera', '', 'user', 123, 'jon', 'jon', '123', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertprjunck`
--

CREATE TABLE IF NOT EXISTS `usertprjunck` (
  `userid` int(11) NOT NULL,
  `prid` int(11) NOT NULL,
  PRIMARY KEY (`userid`,`prid`),
  KEY `prid` (`prid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertprjunck`
--

INSERT INTO `usertprjunck` (`userid`, `prid`) VALUES
(1, 2),
(2, 3),
(3, 4),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `workunit`
--

CREATE TABLE IF NOT EXISTS `workunit` (
  `cod` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `location` varchar(40) NOT NULL,
  `ext` int(11) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workunit`
--

INSERT INTO `workunit` (`cod`, `name`, `location`, `ext`) VALUES
(1, 'iternal Audit', 'head office', 432),
(2, 'Finance And Account mangment', '', 234),
(45, 'IBD', 'HEad', 890);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `actions_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `caselist` (`caseid`),
  ADD CONSTRAINT `actions_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `AssignedCase`
--
ALTER TABLE `AssignedCase`
  ADD CONSTRAINT `AssignedCase_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `AssignedCase_ibfk_3` FOREIGN KEY (`CaseId`) REFERENCES `caselist` (`caseid`);

--
-- Constraints for table `caseedite`
--
ALTER TABLE `caseedite`
  ADD CONSTRAINT `caseedite_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `caselist` (`caseid`),
  ADD CONSTRAINT `caseedite_ibfk_2` FOREIGN KEY (`Editor`) REFERENCES `users` (`userid`);

--
-- Constraints for table `closeReport`
--
ALTER TABLE `closeReport`
  ADD CONSTRAINT `closeReport_ibfk_1` FOREIGN KEY (`caseid`) REFERENCES `caselist` (`caseid`),
  ADD CONSTRAINT `closeReport_ibfk_2` FOREIGN KEY (`confirmer`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `closeReport_ibfk_3` FOREIGN KEY (`resolvedby`) REFERENCES `users` (`userid`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Deparment`) REFERENCES `workunit` (`cod`);

--
-- Constraints for table `ResolvedReport`
--
ALTER TABLE `ResolvedReport`
  ADD CONSTRAINT `ResolvedReport_ibfk_1` FOREIGN KEY (`Caseid`) REFERENCES `caselist` (`caseid`),
  ADD CONSTRAINT `ResolvedReport_ibfk_3` FOREIGN KEY (`Repertedto`) REFERENCES `users` (`userid`);

--
-- Constraints for table `usercatagoryjunk`
--
ALTER TABLE `usercatagoryjunk`
  ADD CONSTRAINT `usercatagoryjunk_ibfk_1` FOREIGN KEY (`userdid`) REFERENCES `users` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
