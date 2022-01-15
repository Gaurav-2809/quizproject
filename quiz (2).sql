-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 07:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `addclass`
--

CREATE TABLE `addclass` (
  `id` int(11) NOT NULL,
  `class` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `uid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `addclass`
--

INSERT INTO `addclass` (`id`, `class`, `uid`) VALUES
(1, '20BCS19-A', 1),
(3, '20ITB2-A', 2),
(6, '21BCS19-A', 5),
(7, 'IIT-19A', 6);

-- --------------------------------------------------------

--
-- Table structure for table `addquestion`
--

CREATE TABLE `addquestion` (
  `questionid` int(250) NOT NULL,
  `test` int(250) NOT NULL,
  `question` varchar(250) NOT NULL,
  `option1` varchar(250) NOT NULL,
  `option2` varchar(250) NOT NULL,
  `option3` varchar(250) NOT NULL,
  `option4` varchar(250) NOT NULL,
  `correct` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addquestion`
--

INSERT INTO `addquestion` (`questionid`, `test`, `question`, `option1`, `option2`, `option3`, `option4`, `correct`) VALUES
(1, 1, '1) For a binary search algorithm to work, it is necessary that the array (list) must be\r\n\r\n', 'sorted', 'unsorted', 'in a heap', 'popped out of stack\r\n', 'A'),
(2, 1, '2) Which of the following option leads to the portability and security of Java?\r\n\r\n', 'Bytecode is executed by JVM\n', 'The applet makes the Java code secure and portable', 'Use of exception handling\n', 'Dynamic binding between objects\n', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `addstudent`
--

CREATE TABLE `addstudent` (
  `stdid` int(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `class` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addstudent`
--

INSERT INTO `addstudent` (`stdid`, `fname`, `lname`, `email`, `class`, `password`) VALUES
(1, 'Gaurav', 'Gupta', 'smartguptagaurav01@gmail.com', '3', '$2y$10$Y0hIOJo9oNOcJ2DvquJ4zOwfPqnb92/fEouAW3wI7lnv4E82dBFCS'),
(2, 'Faizan', 'Anwar', 'faizan0102@gmail.com', '3', '$2y$10$yAdhOube.WcgWTuvtDjVzeMhUQaeZcSwKHvF9RGjfdoMkLVes884u');

-- --------------------------------------------------------

--
-- Table structure for table `addteacher`
--

CREATE TABLE `addteacher` (
  `tid` int(100) NOT NULL,
  `tname` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `class` varchar(200) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `addteacher`
--

INSERT INTO `addteacher` (`tid`, `tname`, `email`, `password`, `class`) VALUES
(3, 'PARUL BOHRA', 'parulbohra345@gmail.com', '$2y$10$XO6XYn5nlaZCcl7oiMMISO9cgDeqsYDwEfY5O/aUCOMjn6SAew2gy', '3'),
(5, 'LOVELY GUPTA', 'lovely123@gmail.com', '$2y$10$jvGMNHHZCNEzL1Ulzjc6jOZRxLyxAF2zzCmJL677JP8pxjHZiVpQy', '1'),
(6, 'PALAK GUPTA', 'palak01@gmail.com', '$2y$10$FlW19TskbMgAEQEgPQ3H6.gAhuXC.vu4f9Isfrq8.dQqPw9lySxFK', '5');

-- --------------------------------------------------------

--
-- Table structure for table `addtest`
--

CREATE TABLE `addtest` (
  `testid` int(250) NOT NULL,
  `class` int(250) NOT NULL,
  `test` varchar(250) NOT NULL,
  `tdate` date NOT NULL,
  `thour` int(250) NOT NULL,
  `tques` int(250) NOT NULL,
  `tmarks` int(250) NOT NULL,
  `teach` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addtest`
--

INSERT INTO `addtest` (`testid`, `class`, `test`, `tdate`, `thour`, `tques`, `tmarks`, `teach`) VALUES
(1, 3, 'DS01', '2021-12-24', 1, 20, 80, 4),
(2, 3, 'JAVA01', '2021-12-22', 2, 10, 40, 4);

-- --------------------------------------------------------

--
-- Table structure for table `adduniversity`
--

CREATE TABLE `adduniversity` (
  `uid` int(11) NOT NULL,
  `uname` varchar(200) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `adduniversity`
--

INSERT INTO `adduniversity` (`uid`, `uname`) VALUES
(1, 'Chandigarh University'),
(2, 'Chitkara University'),
(4, 'IIT-BOMBAY');

-- --------------------------------------------------------

--
-- Table structure for table `quizdata`
--

CREATE TABLE `quizdata` (
  `uid` int(100) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `role` varchar(200) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `quizdata`
--

INSERT INTO `quizdata` (`uid`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$LkiVkIKFpKVAwUT4/AQCs.4Zrj6IipfEyUr/Jjc0KRaMxvCcEfhaO', 'admin'),
(2, 'gaurav', 'gaurav@gmail.com', '$2y$10$LkiVkIKFpKVAwUT4/AQCs.4Zrj6IipfEyUr/Jjc0KRaMxvCcEfhaO', 'student'),
(3, 'gecko', 'gecko@gmail.com', '$2y$10$mQ.s3P56aUGtMLm7Zla6cuz.yagrtkhIayCLr0a7QVzaXKodBuUMy', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(250) NOT NULL,
  `studentid` varchar(250) NOT NULL,
  `testid` varchar(250) NOT NULL,
  `marks` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `studentid`, `testid`, `marks`) VALUES
(1, '1', '1', '20'),
(2, '2', '1', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addclass`
--
ALTER TABLE `addclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addquestion`
--
ALTER TABLE `addquestion`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `addstudent`
--
ALTER TABLE `addstudent`
  ADD PRIMARY KEY (`stdid`);

--
-- Indexes for table `addteacher`
--
ALTER TABLE `addteacher`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `addtest`
--
ALTER TABLE `addtest`
  ADD PRIMARY KEY (`testid`);

--
-- Indexes for table `adduniversity`
--
ALTER TABLE `adduniversity`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `quizdata`
--
ALTER TABLE `quizdata`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addclass`
--
ALTER TABLE `addclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `addquestion`
--
ALTER TABLE `addquestion`
  MODIFY `questionid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `addstudent`
--
ALTER TABLE `addstudent`
  MODIFY `stdid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `addteacher`
--
ALTER TABLE `addteacher`
  MODIFY `tid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `addtest`
--
ALTER TABLE `addtest`
  MODIFY `testid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adduniversity`
--
ALTER TABLE `adduniversity`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quizdata`
--
ALTER TABLE `quizdata`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
