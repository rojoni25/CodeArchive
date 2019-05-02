-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 07:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codearchivebetadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `commenttbl`
--

CREATE TABLE `commenttbl` (
  `Sl` int(11) NOT NULL,
  `CommentId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `PostId` int(11) NOT NULL,
  `SubCommentId` int(11) DEFAULT NULL,
  `ProblemId` int(11) DEFAULT NULL,
  `SolveId` int(11) DEFAULT NULL,
  `Comment` longtext NOT NULL,
  `CommentDate` varchar(30) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poststbl`
--

CREATE TABLE `poststbl` (
  `PostId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `ShortDescription` text NOT NULL,
  `Description` text NOT NULL,
  `Language` varchar(20) NOT NULL,
  `File` varchar(300) NOT NULL,
  `Code` longtext NOT NULL,
  `PostDate` varchar(30) NOT NULL,
  `DbPostDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poststbl`
--

INSERT INTO `poststbl` (`PostId`, `UserId`, `Title`, `ShortDescription`, `Description`, `Language`, `File`, `Code`, `PostDate`, `DbPostDate`) VALUES
(232022524, 1079679807, '5retyseryset', 'esstyhrthfh', 'dfgshdjduuthjuydfhdf', 'c', 'Uploads/rojoni25//1034125171.c', '#include <stdio.h>\r\nvoid main()\r\n{\r\n    float x,y,z;\r\n    printf(\"Enter first number\");\r\n    scanf(\"%f\",&x);\r\n    printf(\"Enter second number\");\r\n    scanf(\"%f\",&y);\r\n     printf(\"Enter third number\");\r\n    scanf(\"%f\",&z);\r\n    if (x>y & x>z)\r\n        printf(\"%1f is greater than %1f and %1f\",x,y,z);\r\n    else if (y>x & y>=z)\r\n        printf(\"%1f is greater than %1f and %1f\",y,x,z);\r\n    else if (z>x & z>y)\r\n        printf(\"%1f is greater than %1f and %1f\",z,x,y);\r\n    else\r\n        printf(\"%1f = %1f = %1f\",x,y,z);\r\n}\r\n\r\n', 'Fri Feb 22, 2019 03:14:32 PM ', '2019-02-22 15:14:32'),
(359935929, 1079679807, 'Addition of two numbers in C', 'A C program to add 2 numbers', 'A C program to add 2 numbers', 'c', 'Uploads/rojoni25//151135823.c', '#include <stdio.h>\r\nint main()\r\n{\r\n    int x=7,y=3,z=x+y;\r\n    printf(\"%d\",z);\r\n    return 0;\r\n}\r\n', 'Sat Mar 16, 2019 04:33:58 PM ', '2019-03-16 16:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `problemtbl`
--

CREATE TABLE `problemtbl` (
  `ProblemId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `Description` text NOT NULL,
  `Language` varchar(20) NOT NULL,
  `AttachmentCode` longtext,
  `AttachmentFile` varchar(300) DEFAULT NULL,
  `AttachmentSS` varchar(300) DEFAULT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ActiveStatus` int(11) DEFAULT NULL,
  `Level` int(11) DEFAULT NULL,
  `Role` varchar(20) NOT NULL,
  `Institution` varchar(100) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `FileFolder` varchar(100) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `JoinDate` varchar(30) NOT NULL,
  `DbJoinDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ProfilePicture` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `FirstName`, `LastName`, `Email`, `ActiveStatus`, `Level`, `Role`, `Institution`, `Position`, `FileFolder`, `Password`, `JoinDate`, `DbJoinDate`, `ProfilePicture`) VALUES
(1079679807, 'rojoni25', 'Mofakhkherul', 'Islam', 'rojoni25@gmail.com', NULL, NULL, 'Developer', NULL, NULL, 'Uploads/rojoni25/', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Fri Feb 22, 2019 02:05:33 PM ', '2019-02-22 14:05:33', ''),
(1468975985, 'shrocky25', 'Solaiman', 'Hossain', 'shrocky25@gmail.com', NULL, NULL, 'Learner', NULL, NULL, 'Uploads/shrocky25/', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Sun Mar 17, 2019 07:44:19 PM ', '2019-03-17 19:44:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commenttbl`
--
ALTER TABLE `commenttbl`
  ADD PRIMARY KEY (`CommentId`),
  ADD UNIQUE KEY `Sl` (`Sl`);

--
-- Indexes for table `poststbl`
--
ALTER TABLE `poststbl`
  ADD PRIMARY KEY (`PostId`);

--
-- Indexes for table `problemtbl`
--
ALTER TABLE `problemtbl`
  ADD PRIMARY KEY (`ProblemId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commenttbl`
--
ALTER TABLE `commenttbl`
  MODIFY `Sl` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
