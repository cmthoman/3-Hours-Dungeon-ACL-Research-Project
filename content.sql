-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: data.3hoursdungeon.com
-- Generation Time: Oct 05, 2012 at 07:23 PM
-- Server version: 5.1.53
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beta_3hd_content`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `acos`
--


-- --------------------------------------------------------

--
-- Table structure for table `action_nodes`
--

CREATE TABLE IF NOT EXISTS `action_nodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller_node_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `action_nodes`
--


-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `aros`
--


-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `aros_acos`
--


-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `body` varchar(50000) NOT NULL,
  `tags` varchar(500) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `articles`
--


-- --------------------------------------------------------

--
-- Table structure for table `article_comments`
--

CREATE TABLE IF NOT EXISTS `article_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `article_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `controller_nodes`
--

CREATE TABLE IF NOT EXISTS `controller_nodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `parent_node` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `controller_nodes`
--


-- --------------------------------------------------------

--
-- Table structure for table `f_categories`
--

CREATE TABLE IF NOT EXISTS `f_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `order` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `f_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `f_forums`
--

CREATE TABLE IF NOT EXISTS `f_forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_category_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` varchar(115) NOT NULL,
  `order` tinyint(2) NOT NULL,
  `f_post_count` int(11) NOT NULL DEFAULT '0',
  `f_topic_count` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `f_forums`
--


-- --------------------------------------------------------

--
-- Table structure for table `f_polls`
--

CREATE TABLE IF NOT EXISTS `f_polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_topic_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `votes` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `f_polls`
--


-- --------------------------------------------------------

--
-- Table structure for table `f_poll_values`
--

CREATE TABLE IF NOT EXISTS `f_poll_values` (
  `id` int(11) NOT NULL,
  `f_polls_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `votes` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_poll_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `f_posts`
--

CREATE TABLE IF NOT EXISTS `f_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_forum_id` int(11) NOT NULL,
  `f_topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` varchar(7500) NOT NULL,
  `title` varchar(60) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `f_posts`
--


-- --------------------------------------------------------

--
-- Table structure for table `f_topics`
--

CREATE TABLE IF NOT EXISTS `f_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  `last_poster` varchar(30) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `replies` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `status_lock` varchar(5) NOT NULL DEFAULT 'false',
  `status_sticky` varchar(5) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `f_topics`
--


-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `log_staffs`
--

CREATE TABLE IF NOT EXISTS `log_staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `log_staffs`
--

INSERT INTO `log_staffs` (`id`, `user_id`, `controller`, `action`, `created`) VALUES
(1, 1, 'Action', 'Add Action :: Name[Widgets]', '2012-10-04 17:22:27'),
(2, 1, 'Actions', 'Delete Action :: ID [49] Name [Widgets]', '2012-10-04 17:22:57'),
(3, 1, 'Actions', 'Delete Action :: ID [50] Name [Widgets]', '2012-10-04 17:24:05'),
(4, 1, 'Action', 'Add Action :: Name[Widgets]', '2012-10-04 17:24:12'),
(5, 1, 'Action', 'Add Action :: Name[Widget]', '2012-10-04 17:28:43'),
(6, 1, 'Actions', 'Edit Action :: ID [52] Name [Monkey]', '2012-10-04 17:32:36'),
(7, 1, 'Actions', 'Delete Action :: ID [52] Name [Monkey]', '2012-10-04 17:34:09'),
(8, 1, 'Actions', 'Edit Action :: ID [51] Name [MONKEY]', '2012-10-04 17:34:19'),
(9, 1, 'Actions', 'Delete Action :: ID [51] Name [MONKEY]', '2012-10-04 17:36:54'),
(10, 1, 'Action', 'Add Action :: Name[Widget]', '2012-10-04 17:37:07'),
(11, 1, 'Actions', 'Edit Action :: ID [53] Name [Monkey]', '2012-10-04 17:37:19'),
(12, 1, 'Actions', 'Delete Action :: ID [53] Name [Monkey]', '2012-10-04 17:39:24'),
(13, 1, 'Action', 'Add Action :: Name[Widget]', '2012-10-04 17:39:39'),
(14, 1, 'Actions', 'Edit Action :: ID [54] Name [Widgets]', '2012-10-04 17:39:52'),
(15, 1, 'Actions', 'Edit Action :: ID [54] Name [Widget]', '2012-10-04 17:42:21'),
(16, 1, 'Actions', 'Edit Action :: ID [54] Name [Widgets]', '2012-10-04 17:44:53'),
(17, 1, 'Actions', 'Edit Action :: ID [54] Name [Widgets]', '2012-10-04 17:45:14'),
(18, 1, 'Actions', 'Edit Action :: ID [54] Name [Widgets]', '2012-10-04 17:45:21'),
(19, 1, 'Actions', 'Edit Action :: ID [54] Name [Widgets]', '2012-10-04 17:47:05'),
(20, 1, 'Actions', 'Edit Action :: ID [54] Name [Widgets]', '2012-10-04 17:47:08'),
(21, 1, 'Actions', 'Edit Action :: ID [54] Name [Widgets]', '2012-10-04 17:47:55'),
(22, 1, 'Actions', 'Edit Action :: ID [54] Name [Widgets]', '2012-10-04 17:48:56'),
(23, 1, 'Actions', 'Delete Action :: ID [54] Name [Widgets]', '2012-10-04 17:49:52'),
(24, 1, 'Action', 'Add Action :: Name[Widget]', '2012-10-04 17:51:55'),
(25, 1, 'Actions', 'Edit Action :: ID [55] Name [Man]', '2012-10-04 17:52:07'),
(26, 1, 'Action', 'Add Action :: Name[Widget]', '2012-10-04 19:50:06'),
(27, 1, 'Actions', 'Edit Action :: ID [56] Name [Widgetssss]', '2012-10-04 19:50:16'),
(28, 1, 'Action', 'Add Action :: Name[Monkey]', '2012-10-04 19:50:58'),
(29, 1, 'Actions', 'Edit Action :: ID [56] Name [Widget]', '2012-10-04 19:51:08'),
(30, 1, 'Actions', 'Delete Action :: ID [57] Name []', '2012-10-04 19:52:01'),
(31, 1, 'Actions', 'Delete Action :: ID [56] Name [Widget]', '2012-10-04 19:52:59'),
(32, 1, 'Action', 'Add Action :: Name[Hiyo]', '2012-10-04 19:57:42'),
(33, 1, 'Actions', 'Edit Action :: ID [49] Name [Winning]', '2012-10-04 19:58:26'),
(34, 1, 'Actions', 'Delete Action :: ID [49] Name [Winning]', '2012-10-04 20:02:41'),
(35, 1, 'Action', 'Add Action :: Name[Cool]', '2012-10-04 22:12:45'),
(36, 1, 'Actions', 'Edit Action :: ID [50] Name [Coolss]', '2012-10-04 22:14:31'),
(37, 1, 'Actions', 'Delete Action :: ID [50] Name [Coolss]', '2012-10-04 22:14:45'),
(38, 1, 'Groups', 'Add Group :: Name[Guilds]', '2012-10-04 22:15:34'),
(39, 1, 'Subgroups', 'Add Subgroup :: Name[THD]', '2012-10-04 22:15:40'),
(40, 1, 'Subgroups', 'Add Subgroup :: Name[Block The Ghostly]', '2012-10-04 22:16:15'),
(41, 1, 'Subgroups', 'Edit Group :: ID [1] Name [Guilds]', '2012-10-04 22:16:45'),
(42, 1, 'Groups', 'Delete Group :: ID [4] Name [Guilds]', '2012-10-04 22:22:26'),
(43, 1, 'Action', 'Add Action :: Name[widget]', '2012-10-04 23:32:38'),
(44, 1, 'Groups', 'Add Group :: Name[Guild]', '2012-10-04 23:33:04'),
(45, 1, 'Subgroups', 'Add Subgroup :: Name[Three Hours Dungeon]', '2012-10-04 23:33:12'),
(46, 1, 'Subgroups', 'Add Subgroup :: Name[Block The Ghostly]', '2012-10-04 23:33:27'),
(47, 1, 'Actions', 'Edit Action :: ID [49] Name [widget]', '2012-10-04 23:40:54'),
(48, 1, 'Actions', 'Edit Action :: ID [49] Name [Widget]', '2012-10-04 23:41:03'),
(49, 1, 'Actions', 'Edit Action :: ID [49] Name [widget]', '2012-10-04 23:42:00'),
(50, 1, 'Actions', 'Edit Action :: ID [49] Name [WIDGET]', '2012-10-04 23:42:06'),
(51, 1, 'Groups', 'Delete Group :: ID [4] Name [Guild]', '2012-10-04 23:49:03'),
(52, 1, 'Groups', 'Add Group :: Name[Guilds]', '2012-10-04 23:51:32'),
(53, 1, 'Subgroups', 'Add Subgroup :: Name[THD]', '2012-10-04 23:51:36'),
(54, 1, 'Groups', 'Delete Group :: ID [5] Name [Guilds]', '2012-10-04 23:52:22'),
(55, 1, 'Actions', 'Delete Action :: ID [49] Name [Widget]', '2012-10-04 23:53:55'),
(56, 1, 'Actions', 'Delete Action :: ID [1] Name [Create]', '2012-10-04 23:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `log_users`
--

CREATE TABLE IF NOT EXISTS `log_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `log_users`
--

INSERT INTO `log_users` (`id`, `user_id`, `controller`, `action`, `created`) VALUES
(1, 1, 'Users', 'Log Out :: Success', '2012-10-04 16:35:52'),
(2, 1, 'Users', 'Log In :: Success', '2012-10-04 16:35:58'),
(3, 1, 'Users', 'Log In :: Success', '2012-10-04 17:01:10'),
(4, 1, 'Users', 'Log Out :: Success', '2012-10-04 19:54:41'),
(5, 1, 'Users', 'Log In :: Success', '2012-10-04 19:54:47'),
(6, 1, 'Users', 'Log Out :: Success', '2012-10-04 23:32:13'),
(7, 1, 'Users', 'Log In :: Success', '2012-10-04 23:32:16'),
(8, 1, 'Users', 'Log In :: Success', '2012-10-05 17:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `subgroups`
--

CREATE TABLE IF NOT EXISTS `subgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subgroups`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subgroup_id` int(11) NOT NULL DEFAULT '6',
  `display_name` varchar(19) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_profiles`
--

