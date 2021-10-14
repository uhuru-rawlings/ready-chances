-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2021 at 10:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joblister`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `message`) VALUES
(1, '', 'text\r\n'),
(2, 'uhururawlings40@gmail.com', 'this another sample message');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `useremails` varchar(100) NOT NULL,
  `contact` int(100) NOT NULL,
  `messagecontent` varchar(1000) NOT NULL,
  `timeposted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newslatter`
--

CREATE TABLE `newslatter` (
  `id` int(11) NOT NULL,
  `emails` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newslatter`
--

INSERT INTO `newslatter` (`id`, `emails`) VALUES
(1, 'uhururawlings40@gmail.com'),
(2, '123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `postedby` varchar(100) NOT NULL,
  `posteddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postedjobs`
--

CREATE TABLE `postedjobs` (
  `id` int(11) NOT NULL,
  `company` varchar(200) NOT NULL,
  `positions` varchar(100) NOT NULL,
  `requirements` varchar(1000) NOT NULL,
  `descriptions` varchar(1000) NOT NULL,
  `jobid` varchar(100) NOT NULL,
  `urllinks` varchar(1000) NOT NULL,
  `postedtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postedjobs`
--

INSERT INTO `postedjobs` (`id`, `company`, `positions`, `requirements`, `descriptions`, `jobid`, `urllinks`, `postedtime`) VALUES
(1, 'joblister', 'test-position', '1). Requirement1', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, ad!', 'JOB4680334', 'https://www.google.com', '2021-10-12 11:02:23'),
(2, 'joblister', 'test-position', '1). Requirement1', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, ad!', 'JOB829581', 'https://www.google.com', '2021-10-12 11:02:28'),
(3, 'joblister', 'test-position', '1). Requirement1', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, ad!', 'JOB8895836', 'https://www.google.com', '2021-10-12 11:02:31'),
(4, 'safaricom', 'CEO', 'Phd holder, Phd holder, Phd holder, Phd holder, Phd holder, Phd holder, Phd holder, Phd holder, ', 'must be of good conduct , 4 years experience', 'JOB2395990', 'https://www.google.com', '2021-10-12 11:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `sponsorship`
--

CREATE TABLE `sponsorship` (
  `id` int(11) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `posteddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `urllinks` varchar(100) NOT NULL,
  `nameofprograme` varchar(1000) NOT NULL,
  `descriptions` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsorship`
--

INSERT INTO `sponsorship` (`id`, `companyname`, `posteddate`, `urllinks`, `nameofprograme`, `descriptions`) VALUES
(1, 'joblister', '2021-10-13 05:51:50', 'https://www.google.com', 'student support', 'otherdescriptionotherdescriptionotherdescriptionotherdescriptionotherdescriptionotherdescriptionotherdescriptionotherdescription');

-- --------------------------------------------------------

--
-- Table structure for table `userreg`
--

CREATE TABLE `userreg` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `sname` text NOT NULL,
  `uemails` varchar(100) NOT NULL,
  `passwords` varchar(265) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userreg`
--

INSERT INTO `userreg` (`id`, `fname`, `sname`, `uemails`, `passwords`) VALUES
(1, 'rawlings', 'uhuru', 'uhururawlings40@gmail.com', '$2y$10$stxYrYCHJ0oavidvQESITe78Pn.fncQaY4Q4t50b3OqunK66Nlwmi'),
(2, 'uhuru', 'rawlings', 'rawlings.huru@student.moringaschool.com', '$2y$10$qrcGa01fWpvCRDkFA0lW8urUz0bpQ069PwjUrhDwpzEYueMfch.Yi'),
(3, 'Anne', 'Akoth', 'anneakoth@gmail.com', '$2y$10$tpQvR1MXRB.AXK/qcu5vk.GwL89KR/Zwfa2xYU31VYJ2AuR5T9wTi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `userphoto` varchar(200) NOT NULL,
  `genders` text NOT NULL,
  `Nationalid` int(100) NOT NULL,
  `Nationality` varchar(100) NOT NULL,
  `organisation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `fullname`, `userphoto`, `genders`, `Nationalid`, `Nationality`, `organisation`) VALUES
(2, 'ID9326565', 'uhuru otieno rawlings', 'IMG9860658478.jpg', 'Male', 36455589, 'Kenyan', 'joblister'),
(3, 'ID2253390', 'linus cheruiyot', 'IMG1324697469.png', 'Male', 1234567, 'Kenyan', 'joblister');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslatter`
--
ALTER TABLE `newslatter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postedjobs`
--
ALTER TABLE `postedjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsorship`
--
ALTER TABLE `sponsorship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userreg`
--
ALTER TABLE `userreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newslatter`
--
ALTER TABLE `newslatter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postedjobs`
--
ALTER TABLE `postedjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sponsorship`
--
ALTER TABLE `sponsorship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userreg`
--
ALTER TABLE `userreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
