-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2018 at 05:58 PM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cate_id` int(3) NOT NULL AUTO_INCREMENT,
  `cate_title` varchar(255) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_title`) VALUES
(1, 'JAVA'),
(2, 'RUBY'),
(3, 'R'),
(4, 'PHP'),
(5, 'ANDROID'),
(6, 'JAVASCRIPT'),
(7, 'PERL'),
(8, 'CSS'),
(11, 'HTML');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL,
  `post_creator` varchar(255) NOT NULL,
  `comment_hour` varchar(255) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`, `post_creator`, `comment_hour`) VALUES
(1, 8, 'saad', 'mohmed@yahoo.com', 'hahahah this is very old', 'Approved', '2018-11-15', 'antman', '09:01:11pm'),
(2, 8, 'kareem', 'kareem@yahoo.com', 'sa', 'Approved', '2018-11-15', 'antman', '09:01:38pm');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `like_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `author`, `like_date`, `status`) VALUES
(47, 7, 'antman', '2018-11-15', 'liked'),
(46, 7, 'saadfs', '2018-11-15', 'liked'),
(44, 43, 'saadfs', '2018-11-12', 'liked'),
(42, 29, 'saadfs', '2018-11-11', 'liked'),
(48, 8, 'saadfs', '2018-11-15', 'liked'),
(49, 8, 'antman', '2018-11-15', 'liked');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_autor` varchar(255) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `post_image` text,
  `post_content` text,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_comment_count` varchar(255) DEFAULT NULL,
  `post_status` varchar(255) DEFAULT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `num_of_likes` varchar(255) DEFAULT '',
  `like_status` varchar(255) DEFAULT '',
  `post_hour` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_category_id`, `post_title`, `post_autor`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `admin_name`, `num_of_likes`, `like_status`, `post_hour`) VALUES
(8, 4, 'new', 'antman', '2018-11-15', 'images/back.jpg', 'new cool stuff is here man', '', NULL, 'published', 'antman', '2', '', '08:58:40pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `passwordu` varchar(255) DEFAULT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_image` text,
  `user_role` varchar(255) DEFAULT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystring22',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `passwordu`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(16, 'antman', '$2y$12$W2X2FEcWIpZJDUdEYe4XRuJoYA5G.tMYo5diSZad306xavYVc4FFO', '', '', 'antman@gmail.com', '', 'admin', '$2y$10$iusesomecrazystring22'),
(28, 'saadfs', '$2y$12$m30ZAKilNnLx/vzUQ6ORTet8vHVcDqQjPkSqPks87pAfu5GVNCvgi', 'saad', 'mohmed', 'saadfs@gmail.com', '', 'superuser', '$2y$10$iusesomecrazystring22'),
(29, 'superman', '$2y$12$jscNUP3mPzDi72FjiDyC7eEWPQqOMLsRDpk38uRa7ATKSseLznZyC', 'superman', 'saad', 'superman@gmail.com', NULL, 'subscriber', '$2y$10$iusesomecrazystring22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

DROP TABLE IF EXISTS `users_online`;
CREATE TABLE IF NOT EXISTS `users_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=398 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(371, '6srq537m104ele414557f0fq61', 1534885657),
(372, '6srq537m104ele414557f0fq61', 1534885661),
(373, 'dhoso4c7f6roo1qb790ulcoma5', 1534943750),
(374, 'dhoso4c7f6roo1qb790ulcoma5', 1534943753),
(375, 'dhoso4c7f6roo1qb790ulcoma5', 1534943754),
(376, 'dhoso4c7f6roo1qb790ulcoma5', 1534943755),
(377, 'dhoso4c7f6roo1qb790ulcoma5', 1534943756),
(378, 'dhoso4c7f6roo1qb790ulcoma5', 1534943758),
(379, 'dhoso4c7f6roo1qb790ulcoma5', 1534943758),
(380, 'dhoso4c7f6roo1qb790ulcoma5', 1534943760),
(381, 'dhoso4c7f6roo1qb790ulcoma5', 1534943760),
(382, 'dhoso4c7f6roo1qb790ulcoma5', 1534943762),
(383, 'dhoso4c7f6roo1qb790ulcoma5', 1534943762),
(384, 'dhoso4c7f6roo1qb790ulcoma5', 1534943763),
(385, 'dhoso4c7f6roo1qb790ulcoma5', 1534943763),
(386, 'dhoso4c7f6roo1qb790ulcoma5', 1534944303),
(387, 'dhoso4c7f6roo1qb790ulcoma5', 1534944460),
(388, 'dhoso4c7f6roo1qb790ulcoma5', 1534944526),
(389, 'dhoso4c7f6roo1qb790ulcoma5', 1534944526),
(390, 'dhoso4c7f6roo1qb790ulcoma5', 1534944633),
(391, 'dhoso4c7f6roo1qb790ulcoma5', 1534944645),
(392, 'dhoso4c7f6roo1qb790ulcoma5', 1534944648),
(393, 'dhoso4c7f6roo1qb790ulcoma5', 1534944648),
(394, 'dhoso4c7f6roo1qb790ulcoma5', 1534944650),
(395, 'dhoso4c7f6roo1qb790ulcoma5', 1534944650),
(396, 'dhoso4c7f6roo1qb790ulcoma5', 1534944652),
(397, 'dhoso4c7f6roo1qb790ulcoma5', 1534944995);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
