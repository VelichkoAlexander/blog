-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.46-0ubuntu0.14.04.2 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for blog
CREATE DATABASE IF NOT EXISTS `blog` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `blog`;


-- Dumping structure for table blog.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) COLLATE utf8_bin NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_bin NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.ci_sessions: ~0 rows (approximately)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- Dumping structure for table blog.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(64) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.comments: ~11 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `post_id`, `author`, `text`, `created_date`) VALUES
	(1, 1, 'Alex', 'first comment', '2016-07-07 00:19:47'),
	(2, 1, 'Alex2', 'first comment', '2016-07-08 00:19:47'),
	(3, 1, 'Alex3', 'first comment', '2016-07-09 00:19:47'),
	(4, 0, 'alex', 'test comment', '2016-08-03 09:05:01'),
	(5, 0, 'alex', 'test comment', '2016-08-03 09:07:31'),
	(6, 0, 'alex', 'test comment', '2016-08-03 09:07:40'),
	(7, 0, 'alex', 'test comment', '2016-08-03 09:08:19'),
	(8, 0, 'alex', 'test comment', '2016-08-03 09:08:25'),
	(9, 0, 'alex', 'test comment', '2016-08-03 09:10:45'),
	(44, 3, 'qeqwe', 'qweqwe', '2016-08-03 09:51:44'),
	(45, 3, 'жопа ', 'ога\r\n', '2016-08-03 09:54:40');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table blog.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.login_attempts: ~3 rows (approximately)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` (`id`, `ip_address`, `time`) VALUES
	(1, '192.168.33.1', '2016-07-20 14:25:00'),
	(2, '192.168.33.1', '2016-07-20 14:25:04'),
	(3, '192.168.33.1', '2016-07-20 14:29:54');
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;


-- Dumping structure for table blog.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `data` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table blog.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `short_text` text COLLATE utf8_bin,
  `text` text COLLATE utf8_bin,
  `is_deleted` tinyint(4) DEFAULT '0',
  `is_visible` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uri` (`uri`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.posts: ~9 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `uri`, `title`, `short_text`, `text`, `is_deleted`, `is_visible`) VALUES
	(1, 'first-post', 'first-post', 'normal text', '<h1><em><strong>1234</strong></em></h1>', 0, 1),
	(3, 'first-post1', 'first-post1', 'text text', '<p>Hello worldHe123213lo worldHello worldHello worldHello worldHello worldHello world232423423423</p>', 0, 1),
	(5, 'first-post2', 'first-post2', '123123123', '<p>Hello worldHello worldHello worldHello worldHello worldHello worldHello world</p>', 0, 1),
	(6, 'first-post3', 'first-post3', 'Hello world', '<p>Hello worldHello worldHello worldHello worldHello worldHello worldHello world</p>', 0, 1),
	(7, 'first-post4', 'first-post4', 'Hello world', 'Hello worldHello worldHello worldHello worldHello worldHello worldHello world', 0, 1),
	(8, 'first-post5', 'first-post5', 'Hello world', 'Hello worldHello worldHello worldHello worldHello worldHello worldHello world', 0, 1),
	(72, 'test_post_tags', 'test_post_tags', 'test_post_tags', '<p>ываываываыва111</p>', 0, 1),
	(73, 'privet11231231', 'Privet11231231', '123123123123', '<p>ewrwer</p>', 0, 1),
	(74, 'testttt1', 'testttt1', '123123213', '<p>fsdfdsfsf</p>', 0, 1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table blog.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `parent_id`, `name`) VALUES
	(1, 0, 'User'),
	(2, 0, 'Admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table blog.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uri` (`uri`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.tags: ~15 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `uri`, `title`) VALUES
	(1, 'tag', 'tag'),
	(2, 'test-tag', 'test-tag'),
	(3, 'pop', 'pop'),
	(4, 'testtag', 'testtag'),
	(30, 'asfasdfsdf', 'asfasdfsdf'),
	(31, 'adsfasdfasdfasdfsfsdf', 'adsfasdfasdfasdfsfsdf'),
	(32, 'ываываыавыавыаываываыва', 'ываываыавыавыаываываыва'),
	(33, 'tast-pop', 'tast-pop'),
	(34, 'pos', 'pos'),
	(35, 'ывавыавыа', 'ывавыавыа'),
	(36, '34343', '34343'),
	(37, '34343434343434', '34343434343434'),
	(38, 'tratrtra', 'tratrtra'),
	(39, 'trash', 'trash'),
	(40, 'pops', 'pops');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


-- Dumping structure for table blog.tags_posts_rel
CREATE TABLE IF NOT EXISTS `tags_posts_rel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.tags_posts_rel: ~7 rows (approximately)
/*!40000 ALTER TABLE `tags_posts_rel` DISABLE KEYS */;
INSERT INTO `tags_posts_rel` (`id`, `tag_id`, `post_id`) VALUES
	(2, 1, 3),
	(4, 2, 3),
	(7, 3, 6),
	(8, 2, 6),
	(9, 1, 6),
	(161, 39, 72),
	(163, 0, 0);
/*!40000 ALTER TABLE `tags_posts_rel` ENABLE KEYS */;


-- Dumping structure for table blog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `username` varchar(25) COLLATE utf8_bin NOT NULL,
  `password` varchar(34) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `newpass` varchar(34) COLLATE utf8_bin DEFAULT NULL,
  `newpass_key` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `newpass_time` datetime DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `email`, `banned`, `ban_reason`, `newpass`, `newpass_key`, `newpass_time`, `last_ip`, `last_login`, `created`, `modified`) VALUES
	(1, 2, 'admin', '$1$StkqdyBb$VFnSNkUbS6MGNsW0rDQbc0', 'admin@localhost.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '2008-11-30 04:56:38', '2008-11-30 04:56:32', '2016-07-20 14:54:46'),
	(2, 1, 'user', '$1$bO..IR4.$CxjJBjKJ5QW2/BaYKDS7f.', 'user@localhost.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '2008-12-01 14:04:14', '2008-12-01 14:01:53', '2008-12-01 14:04:14'),
	(12, 2, 'admin3', '$1$cOETgqU8$QkB37tCTBIsB2cmSwUEDc0', 'asd@asd.asd', 0, NULL, NULL, NULL, NULL, '192.168.33.1', '2016-08-03 06:27:57', '2016-07-20 15:21:20', '2016-08-03 06:27:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table blog.user_autologin
CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.user_autologin: ~1 rows (approximately)
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
	('9d00526be41ed30b2560776cbb9f0724', 12, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '192.168.33.1', '2016-07-25 03:43:40');
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;


-- Dumping structure for table blog.user_profile
CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.user_profile: ~11 rows (approximately)
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` (`id`, `user_id`, `country`, `website`) VALUES
	(1, 1, NULL, NULL),
	(2, 3, NULL, NULL),
	(3, 4, NULL, NULL),
	(4, 5, NULL, NULL),
	(5, 6, NULL, NULL),
	(6, 7, NULL, NULL),
	(7, 8, NULL, NULL),
	(8, 9, NULL, NULL),
	(9, 10, NULL, NULL),
	(10, 11, NULL, NULL),
	(11, 12, NULL, NULL);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;


-- Dumping structure for table blog.user_temp
CREATE TABLE IF NOT EXISTS `user_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(34) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activation_key` varchar(50) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table blog.user_temp: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_temp` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
