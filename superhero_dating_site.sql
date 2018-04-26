-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 05:11 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superhero_dating_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(4) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `commented_to` varchar(60) DEFAULT NULL,
  `commented_from` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `commented_to`, `commented_from`) VALUES
(1, 'HOT HOT HOT!!!', 'stormy@gsnail.net', 'flash99@yahoooooo.com'),
(9, 'You are superb!', 'flash99@yahoooooo.com', 'stormy@gsnail.net'),
(10, 'I guess you were in Chernobyl :D', 'superduperhero@mymail.com', 'flash99@yahoooooo.com'),
(11, 'My nigga', 'superman@inbozio.com', 'flash99@yahoooooo.com'),
(12, 'test', 'superman@inbozio.com', 'flash99@yahoooooo.com');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(4) NOT NULL,
  `liked_to` varchar(60) NOT NULL,
  `liked_from` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `liked_to`, `liked_from`) VALUES
(1, 'flash99@yahoooooo.com', 'stormy@gsnail.net'),
(5, 'stormy@gsnail.net', 'flash99@yahoooooo.com'),
(2, 'superman@inbozio.com', 'flash99@yahoooooo.com');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(4) NOT NULL,
  `message` varchar(999) NOT NULL,
  `message_to` varchar(60) NOT NULL,
  `message_from` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `message_to`, `message_from`) VALUES
(1, 'Hey! :)) How are you?', 'flash99@yahoooooo.com', 'stormy@gsnail.net'),
(2, 'Test message', 'stormy@gsnail.net', 'flash99@yahoooooo.com'),
(3, 'yoooo', 'stormy@gsnail.net', 'flash99@yahoooooo.com'),
(4, 'asdasasd', 'stormy@gsnail.net', 'flash99@yahoooooo.com');

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE `sex` (
  `sex` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`sex`) VALUES
('female'),
('male');

-- --------------------------------------------------------

--
-- Table structure for table `superheroes`
--

CREATE TABLE `superheroes` (
  `email` varchar(60) NOT NULL,
  `superhero_name` varchar(60) NOT NULL,
  `age` int(3) NOT NULL,
  `superpowers` varchar(256) NOT NULL,
  `location` varchar(30) NOT NULL,
  `image` varchar(256) NOT NULL,
  `sex` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superheroes`
--

INSERT INTO `superheroes` (`email`, `superhero_name`, `age`, `superpowers`, `location`, `image`, `sex`) VALUES
('flash99@yahoooooo.com', 'Flash', 29, 'Amazing quickness', 'DK', 'https://vignette.wikia.nocookie.net/dcmovies/images/a/ae/The_Flash_DCEU.jpg/revision/latest?cb=20161104022424', 'male'),
('stormy@gsnail.net', 'Storm', 35, 'I can ruin the weather', 'Denmark', 'https://s-media-cache-ak0.pinimg.com/originals/de/38/9b/de389b25bda57d95c247c70da574aa3d.jpg', 'female'),
('superduperhero@mymail.com', 'Hulk', 45, 'Breaking things (including people)', 'Ukraine', 'https://vignette.wikia.nocookie.net/marveldatabase/images/1/1e/Robert_Bruce_Banner_%28Earth-199999%29_from_Thor_Ragnarok_0001.jpg/revision/latest?cb=20171024015728', 'male'),
('superman@inbozio.com', 'Superman', 32, 'Flying, saving peoples lives', 'US', 'https://www.thesun.co.uk/wp-content/uploads/2017/05/nintchdbpict000322938486-e1494495477534.jpg?strip=all&w=655', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commented_to` (`commented_to`),
  ADD KEY `fk_commented_from` (`commented_from`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `likes` (`liked_to`,`liked_from`),
  ADD KEY `liked_from` (`liked_from`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_to` (`message_to`),
  ADD KEY `message_from` (`message_from`);

--
-- Indexes for table `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`sex`);

--
-- Indexes for table `superheroes`
--
ALTER TABLE `superheroes`
  ADD PRIMARY KEY (`email`),
  ADD KEY `gender` (`sex`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_commented_from` FOREIGN KEY (`commented_from`) REFERENCES `superheroes` (`email`),
  ADD CONSTRAINT `fk_commented_to` FOREIGN KEY (`commented_to`) REFERENCES `superheroes` (`email`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`liked_to`) REFERENCES `superheroes` (`email`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`liked_from`) REFERENCES `superheroes` (`email`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`message_to`) REFERENCES `superheroes` (`email`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`message_from`) REFERENCES `superheroes` (`email`);

--
-- Constraints for table `superheroes`
--
ALTER TABLE `superheroes`
  ADD CONSTRAINT `gender` FOREIGN KEY (`sex`) REFERENCES `sex` (`sex`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
