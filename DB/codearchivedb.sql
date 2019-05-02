-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 02:26 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codearchivedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posttable`
--

CREATE TABLE `posttable` (
  `ID` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `CodeName` varchar(200) NOT NULL,
  `DescriptiveName` varchar(500) NOT NULL,
  `Description` mediumtext NOT NULL,
  `language` varchar(10) NOT NULL,
  `Code` longtext,
  `File` varchar(200) DEFAULT NULL,
  `Date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posttable`
--

INSERT INTO `posttable` (`ID`, `User`, `CodeName`, `DescriptiveName`, `Description`, `language`, `Code`, `File`, `Date`) VALUES
(1, 'rojoni25', '2digit alter', '2digit alter', 'asdfas', 'c', '#include <stdio.h>\r\n#include <math.h>\r\nvoid main()\r\n{\r\n    int x,y,z,a,p;\r\n        printf(\"Inter two digit number:\");\r\n        scanf(\"%d\",&x);\r\ny=x/10;\r\nz=x%10;\r\n\r\nprintf(\"%d%d\",z,y);\r\n}\r\n\r\n', 'Uploads/rojoni25//661627622.c', 'Fri Apr 06, 2018 12:05:47 AM '),
(2, 'rojoni25', 'Lowercase To Uppercase using assembly language', 'Convert Lowercase letters To Uppercase using assembly language', 'Convert Lowercase letters To Uppercase using assembly language', 'asm', '.MODEL SMALL\r\n.STACK 100H\r\n.DATA\r\nMSG1 DB \'Input-1: $\' \r\nMSG2 DB 0DH,0AH,\'Input-2: $\' \r\nMSG3 DB 0DH,0AH,\'RESULT:$\' \r\n.CODE\r\nMAIN PROC\r\nMOV AX,@DATA\r\nMOV DS,AX\r\nLEA DX,MSG1\r\nMOV AH,9\r\nINT 21H\r\n\r\nMOV AH,1\r\nINT 21H\r\nMOV BL,AL \r\nAND BL,0DFH\r\n\r\n\r\nLEA DX,MSG3\r\nMOV AH,9\r\nINT 21H\r\nMOV AH,2\r\nMOV DL,BL\r\nINT 21H\r\n\r\nMOV AH,4CH\r\nINT 21H\r\n\r\n\r\nMAIN ENDP\r\nEND MAIN', 'Uploads/rojoni25//2036001483.asm', 'Fri Apr 06, 2018 12:13:10 AM '),
(3, 'rojoni25', 'Bank Interest', 'A java program to calculate Bank Interest', 'A java program to calculate Bank Interest', 'java', '/*\r\n * To change this license header, choose License Headers in Project Properties.\r\n * To change this template file, choose Tools | Templates\r\n * and open the template in the editor.\r\n */\r\n\r\npackage bank_interest;\r\n\r\nimport java.util.Scanner;\r\n\r\nclass BangladeshBank\r\n{\r\n   static String ClientName;\r\n   static double Balance ;\r\n    \r\n    \r\n    void showRateofInterest(String name,double amount)\r\n    {\r\n        \r\n        ClientName=name;\r\n        Balance=amount;\r\n        double interest=0.10, cal;\r\n        System.out.println(ClientName);\r\n        System.out.println(Balance);\r\n        \r\n       cal=Balance*interest;\r\n       cal=Balance+cal;\r\n       System.out.println(\"Amount including interest in Bangladesh Bank = \"+ cal);\r\n    }\r\n}\r\n class IslamicBank extends BangladeshBank\r\n {\r\n        @Override\r\n        void showRateofInterest(String name,double amount)\r\n        {\r\n             ClientName=name;\r\n             Balance=amount;\r\n            double interest=0.15, cal;\r\n        \r\n       cal=Balance*interest;\r\n       cal=Balance+cal;\r\n       super.showRateofInterest(name,amount);\r\n       System.out.println(\"Amount including interest in Islamic Bank = \"+ cal);\r\n       \r\n        }\r\n                \r\n }\r\n \r\n class DuchBanglaBank extends BangladeshBank\r\n {\r\n     @Override\r\n        void showRateofInterest(String name,double amount)\r\n        {\r\n             ClientName=name;\r\n             Balance=amount;\r\n            double interest=0.20, cal;\r\n        \r\n       cal=Balance*interest;\r\n       cal=Balance+cal;\r\n       super.showRateofInterest(name,amount);\r\n       System.out.println(\"Amount including interest in Duch Bangla Bank = \"+ cal);\r\n       \r\n        }\r\n }\r\n\r\npublic class Bank_Interest {\r\n\r\n    /**\r\n     * @param args the command line arguments\r\n     */\r\n    public static void main(String[] args) {\r\n       String Name;\r\n       double amount;      \r\n        IslamicBank ob1=new IslamicBank();        \r\n        DuchBanglaBank ob2=new DuchBanglaBank();\r\n        Scanner scn=new Scanner(System.in);\r\n        Name=scn.nextLine();\r\n        amount=scn.nextDouble();\r\n        ob1.showRateofInterest(Name,amount);\r\n        ob2.showRateofInterest(Name,amount);\r\n    }\r\n    \r\n}\r\n', 'Uploads/rojoni25//1363156446.java', 'Sat Apr 07, 2018 08:12:53 PM ');

-- --------------------------------------------------------

--
-- Table structure for table `problemtable`
--

CREATE TABLE `problemtable` (
  `ID` int(11) NOT NULL,
  `ProblemId` int(11) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Title` varchar(400) NOT NULL,
  `Description` longtext NOT NULL,
  `Language` varchar(10) NOT NULL,
  `Code` longtext,
  `File` varchar(100) DEFAULT NULL,
  `Date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problemtable`
--

INSERT INTO `problemtable` (`ID`, `ProblemId`, `Email`, `Title`, `Description`, `Language`, `Code`, `File`, `Date`) VALUES
(1, 1932967299, 'rojoni25@gmail.com', 'Need a C program to calculate the factorial of N', 'Need a C program to calculate the factorial of N', 'c', NULL, NULL, 'Sat Apr 14, 2018 03:29:41 AM ');

-- --------------------------------------------------------

--
-- Table structure for table `registrationtable`
--

CREATE TABLE `registrationtable` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DisplayName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Filepath` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrationtable`
--

INSERT INTO `registrationtable` (`ID`, `FirstName`, `LastName`, `DisplayName`, `Email`, `Filepath`, `Password`) VALUES
(4, 'Abul', 'Hasanat', 'Khokon1', 'abulkhokon@gmail.com', 'Uploads/Khokon1/', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'Sakhawat', 'Hossin', 'boyhood', 'boyhoodbulbul@gmail.com', 'Uploads/boyhood/', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(1, 'Mofakhkherul', 'Islam', 'rojoni25', 'rojoni25@gmail.com', 'Uploads/rojoni25/', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'Solaiman', 'Hossain', 'rocky25', 'shrocky25@gmail.com', 'Uploads/rocky25/', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `rojoni25`
--

CREATE TABLE `rojoni25` (
  `ArticleName` varchar(50) NOT NULL,
  `ArticleTitle` varchar(300) NOT NULL,
  `TimeDate` varchar(20) NOT NULL,
  `Article` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posttable`
--
ALTER TABLE `posttable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `problemtable`
--
ALTER TABLE `problemtable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registrationtable`
--
ALTER TABLE `registrationtable`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `DisplayName` (`DisplayName`),
  ADD KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indexes for table `rojoni25`
--
ALTER TABLE `rojoni25`
  ADD PRIMARY KEY (`ArticleName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posttable`
--
ALTER TABLE `posttable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `problemtable`
--
ALTER TABLE `problemtable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrationtable`
--
ALTER TABLE `registrationtable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
