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

-- Dumping database structure for alexan29_ci



-- Dumping structure for table alexan29_ci.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) COLLATE utf8_bin NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_bin NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table alexan29_ci.ci_sessions: ~0 rows (approximately)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- Dumping structure for table alexan29_ci.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table alexan29_ci.login_attempts: ~3 rows (approximately)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` (`id`, `ip_address`, `time`) VALUES
	(1, '192.168.33.1', '2016-07-20 14:25:00'),
	(2, '192.168.33.1', '2016-07-20 14:25:04'),
	(3, '192.168.33.1', '2016-07-20 14:29:54');
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;


-- Dumping structure for table alexan29_ci.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `data` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table alexan29_ci.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table alexan29_ci.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `short_text` text COLLATE utf8_bin,
  `text` text COLLATE utf8_bin,
  `is_deleted` tinytext COLLATE utf8_bin,
  `is_visible` tinytext COLLATE utf8_bin,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uri` (`uri`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table alexan29_ci.posts: ~7 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `uri`, `title`, `short_text`, `text`, `is_deleted`, `is_visible`) VALUES
	(1, 'first-post', 'first-post', 'test tegs html', '<h1><em><strong>1234</strong></em></h1>', '0', '1'),
	(3, 'first-post1', 'first-post1', 'Hello world', 'Hello worldHello worldHello worldHello worldHello worldHello worldHello world', '0', '1'),
	(5, 'first-post2', 'first-post2', 'Hello world', 'Hello worldHello worldHello worldHello worldHello worldHello worldHello world', '0', '1'),
	(6, 'first-post3', 'first-post3', 'Hello world', 'Hello worldHello worldHello worldHello worldHello worldHello worldHello world', '0', '1'),
	(7, 'first-post4', 'first-post4', 'Hello world', 'Hello worldHello worldHello worldHello worldHello worldHello worldHello world', '0', '1'),
	(8, 'first-post5', 'first-post5', 'Hello world', 'Hello worldHello worldHello worldHello worldHello worldHello worldHello world', '0', '1'),
	(46, 'lololololo', 'lololololo', 'sdfsdfsdf', '', '0', '1');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table alexan29_ci.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table alexan29_ci.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `parent_id`, `name`) VALUES
	(1, 0, 'User'),
	(2, 0, 'Admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table alexan29_ci.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uri` (`uri`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table alexan29_ci.tags: ~2 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `uri`, `title`) VALUES
	(1, 'tag', 'tag'),
	(2, 'test-tag', 'test-tag');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


-- Dumping structure for table alexan29_ci.tags_posts_rel
CREATE TABLE IF NOT EXISTS `tags_posts_rel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table alexan29_ci.tags_posts_rel: ~4 rows (approximately)
/*!40000 ALTER TABLE `tags_posts_rel` DISABLE KEYS */;
INSERT INTO `tags_posts_rel` (`id`, `tag_id`, `post_id`) VALUES
	(1, 1, 1),
	(2, 1, 3),
	(3, 2, 1),
	(4, 2, 3);
/*!40000 ALTER TABLE `tags_posts_rel` ENABLE KEYS */;


-- Dumping structure for table alexan29_ci.users
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

-- Dumping data for table alexan29_ci.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `email`, `banned`, `ban_reason`, `newpass`, `newpass_key`, `newpass_time`, `last_ip`, `last_login`, `created`, `modified`) VALUES
	(1, 2, 'admin', '$1$StkqdyBb$VFnSNkUbS6MGNsW0rDQbc0', 'admin@localhost.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '2008-11-30 04:56:38', '2008-11-30 04:56:32', '2016-07-20 14:54:46'),
	(2, 1, 'user', '$1$bO..IR4.$CxjJBjKJ5QW2/BaYKDS7f.', 'user@localhost.com', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '2008-12-01 14:04:14', '2008-12-01 14:01:53', '2008-12-01 14:04:14'),
	(12, 2, 'admin3', '$1$cOETgqU8$QkB37tCTBIsB2cmSwUEDc0', 'asd@asd.asd', 0, NULL, NULL, NULL, NULL, '192.168.33.1', '2016-07-22 14:42:23', '2016-07-20 15:21:20', '2016-07-22 14:42:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table alexan29_ci.user_autologin
CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table alexan29_ci.user_autologin: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
	('21bf30a83712916c2573aac0b6da7515', 12, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', '192.168.33.1', '2016-07-20 20:02:48');
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;


-- Dumping structure for table alexan29_ci.user_profile
CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table alexan29_ci.user_profile: ~11 rows (approximately)
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


-- Dumping structure for table alexan29_ci.user_temp
CREATE TABLE IF NOT EXISTS `user_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(34) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activation_key` varchar(50) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table alexan29_ci.user_temp: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_temp` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
