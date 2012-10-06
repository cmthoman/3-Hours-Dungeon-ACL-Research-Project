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
-- Database: `beta_3hd_shared`
--

-- --------------------------------------------------------

--
-- Table structure for table `banned_names`
--

CREATE TABLE IF NOT EXISTS `banned_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `banned_names`
--


-- --------------------------------------------------------

--
-- Table structure for table `cake_sessions`
--

CREATE TABLE IF NOT EXISTS `cake_sessions` (
  `id` varchar(255) NOT NULL,
  `data` text,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cake_sessions`
--

INSERT INTO `cake_sessions` (`id`, `data`, `expires`) VALUES
('LrL84-ZalXwafLr935kCG3', 'Config|a:3:{s:9:"userAgent";s:32:"ef3f0173f5b061a45819e61a3762ce35";s:4:"time";i:1349346157;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:13:{s:2:"id";s:1:"1";s:8:"username";s:5:"Chris";s:5:"email";s:17:"epimyth@gmail.com";s:6:"active";s:4:"true";s:4:"hash";s:40:"da1ac8aa2beb3ccb51031b4e4e37dfbac6f3d9eb";s:6:"avatar";N;s:10:"last_login";N;s:7:"created";s:19:"2012-10-03 00:08:12";s:8:"modified";s:19:"2012-10-03 00:08:41";s:21:"suspension_expiration";s:10:"0000-00-00";s:18:"premium_expiration";s:10:"0000-00-00";s:20:"community_commitment";s:1:"0";s:11:"UserProfile";a:6:{s:2:"id";s:1:"1";s:7:"user_id";s:1:"1";s:11:"subgroup_id";s:1:"6";s:12:"display_name";s:0:"";s:7:"created";s:19:"2012-10-03 00:08:52";s:8:"modified";s:19:"2012-10-03 00:08:52";}}}User|a:1:{s:7:"profile";a:1:{s:11:"subgroup_id";s:1:"6";}}_Token|a:5:{s:3:"key";s:40:"8026f99cfeb7c64c046dec49de4cd01b94920900";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:0:{}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:16:{s:40:"47edc8a39be7cc7b10e9ff2f35960a3405e96f39";i:1349324798;s:40:"20d4c26b7cc1a283fd0e0b1a9737c945e37fc203";i:1349324799;s:40:"225500edb81f62062af208c1e5add933c67201d4";i:1349324801;s:40:"43eb262be0a3405bac499716df5b01fe7d2bfa69";i:1349324803;s:40:"341223644936d268187b517508c75b3418938b3f";i:1349325943;s:40:"332becb865839503d6ed8d846228a702419cf727";i:1349326013;s:40:"26a39159598275b98b32aea03c5a122db5583f87";i:1349326065;s:40:"4212c99e125c29c45425d97dd8c8c7c84c7424b4";i:1349326111;s:40:"062a2d5e95515cf85d17381d6717761f85675455";i:1349326112;s:40:"1b0c8ec12dd66ffbadabbb57d8be7cbb7b423369";i:1349326459;s:40:"77e4404c07636e7d4550f57c912be4a2be25078e";i:1349326563;s:40:"c2d8f49b1a6505b31669c0a739a940555d437b82";i:1349326942;s:40:"11c2ffaf03f6084dc7629c27683507348ffcc8c3";i:1349326954;s:40:"430a92a254718c3327d466d378e64a5bfd85b1e5";i:1349326956;s:40:"d128bc1e5efd54e1d845f91a17b6d6591ca4ec82";i:1349327172;s:40:"8026f99cfeb7c64c046dec49de4cd01b94920900";i:1349327179;}}', 1349331758),
('68YPrWc0AEwAiNM6gtsDK0', 'Config|a:3:{s:9:"userAgent";s:32:"7153ad4172bdbbf77988616ef116ccd4";s:4:"time";i:1349265911;s:9:"countdown";i:10;}_Token|a:5:{s:3:"key";s:40:"6de1b781e51912d98c2d8ab0a63003626a6abb30";s:18:"allowedControllers";a:0:{}s:14:"allowedActions";a:0:{}s:14:"unlockedFields";a:0:{}s:10:"csrfTokens";a:5:{s:40:"75fecf478c50db224cb6d1d95208d1ebd8d99c33";i:1349258576;s:40:"6c625d8232b2e3d5d4aa49f67d9ecda8fc7fae29";i:1349258578;s:40:"f26abee4b36cf73b141a4567f2df30a578a3897b";i:1349258607;s:40:"706912cdedee07e8b364fc9c268315a11d8fcf1c";i:1349258627;s:40:"6de1b781e51912d98c2d8ab0a63003626a6abb30";i:1349258711;}}', 1349251511),
('JYxbLt-WInbUGXY7Ki3E,0', 'Config|a:3:{s:9:"userAgent";s:32:"7153ad4172bdbbf77988616ef116ccd4";s:4:"time";i:1349351531;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:13:{s:2:"id";s:1:"1";s:8:"username";s:5:"Chris";s:5:"email";s:17:"epimyth@gmail.com";s:6:"active";s:4:"true";s:4:"hash";s:40:"da1ac8aa2beb3ccb51031b4e4e37dfbac6f3d9eb";s:6:"avatar";N;s:10:"last_login";N;s:7:"created";s:19:"2012-10-03 00:08:12";s:8:"modified";s:19:"2012-10-03 00:08:41";s:21:"suspension_expiration";s:10:"0000-00-00";s:18:"premium_expiration";s:10:"0000-00-00";s:20:"community_commitment";s:1:"0";s:11:"UserProfile";a:0:{}}}User|a:1:{s:7:"profile";a:1:{s:11:"subgroup_id";s:1:"6";}}', 1349337132),
('QwjSGV,oBHquQXo1qHv-61', 'Config|a:3:{s:9:"userAgent";s:32:"ef3f0173f5b061a45819e61a3762ce35";s:4:"time";i:1349349831;s:9:"countdown";i:10;}', 1349335432),
('5VyCEpejRLCXBShPysNAj3', 'Config|a:3:{s:9:"userAgent";s:32:"ef3f0173f5b061a45819e61a3762ce35";s:4:"time";i:1349351044;s:9:"countdown";i:10;}', 1349336644),
('6Nf,AfAGS2kNspyREcNSJ0', 'Config|a:3:{s:9:"userAgent";s:32:"7153ad4172bdbbf77988616ef116ccd4";s:4:"time";i:1349356278;s:9:"countdown";i:10;}', 1349341878),
('XpbVuLDKvQwJjRq9uAbkY2', 'Config|a:3:{s:9:"userAgent";s:32:"7153ad4172bdbbf77988616ef116ccd4";s:4:"time";i:1349435273;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:13:{s:2:"id";s:1:"1";s:8:"username";s:5:"Chris";s:5:"email";s:17:"epimyth@gmail.com";s:6:"active";s:4:"true";s:4:"hash";s:40:"da1ac8aa2beb3ccb51031b4e4e37dfbac6f3d9eb";s:6:"avatar";N;s:10:"last_login";N;s:7:"created";s:19:"2012-10-03 00:08:12";s:8:"modified";s:19:"2012-10-03 00:08:41";s:21:"suspension_expiration";s:10:"0000-00-00";s:18:"premium_expiration";s:10:"0000-00-00";s:20:"community_commitment";s:1:"0";s:11:"UserProfile";a:0:{}}}User|a:1:{s:7:"profile";a:1:{s:11:"subgroup_id";s:1:"6";}}', 1349420873),
('mIId9NAipeHpUDwgMMln90', 'Config|a:3:{s:9:"userAgent";s:32:"ef3f0173f5b061a45819e61a3762ce35";s:4:"time";i:1349420428;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:13:{s:2:"id";s:1:"1";s:8:"username";s:5:"Chris";s:5:"email";s:17:"epimyth@gmail.com";s:6:"active";s:4:"true";s:4:"hash";s:40:"da1ac8aa2beb3ccb51031b4e4e37dfbac6f3d9eb";s:6:"avatar";N;s:10:"last_login";N;s:7:"created";s:19:"2012-10-03 00:08:12";s:8:"modified";s:19:"2012-10-03 00:08:41";s:21:"suspension_expiration";s:10:"0000-00-00";s:18:"premium_expiration";s:10:"0000-00-00";s:20:"community_commitment";s:1:"0";s:11:"UserProfile";a:6:{s:2:"id";s:1:"1";s:7:"user_id";s:1:"1";s:11:"subgroup_id";s:1:"6";s:12:"display_name";s:0:"";s:7:"created";s:19:"2012-10-04 16:35:58";s:8:"modified";s:19:"2012-10-04 16:35:58";}}}User|a:1:{s:7:"profile";a:1:{s:11:"subgroup_id";s:1:"6";}}', 1349406029),
('6DE7Eo4qRHMX5wzmCDYes3', 'Config|a:3:{s:9:"userAgent";s:32:"ef3f0173f5b061a45819e61a3762ce35";s:4:"time";i:1349433280;s:9:"countdown";i:10;}', 1349418880),
('yIg2dDHin4U1Gd5rxJ0W,0', 'Config|a:3:{s:9:"userAgent";s:32:"7153ad4172bdbbf77988616ef116ccd4";s:4:"time";i:1349498038;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:13:{s:2:"id";s:1:"1";s:8:"username";s:5:"Chris";s:5:"email";s:17:"epimyth@gmail.com";s:6:"active";s:4:"true";s:4:"hash";s:40:"da1ac8aa2beb3ccb51031b4e4e37dfbac6f3d9eb";s:6:"avatar";N;s:10:"last_login";N;s:7:"created";s:19:"2012-10-03 00:08:12";s:8:"modified";s:19:"2012-10-03 00:08:41";s:21:"suspension_expiration";s:10:"0000-00-00";s:18:"premium_expiration";s:10:"0000-00-00";s:20:"community_commitment";s:1:"0";s:11:"UserProfile";a:6:{s:2:"id";s:1:"1";s:7:"user_id";s:1:"1";s:11:"subgroup_id";s:1:"6";s:12:"display_name";s:0:"";s:7:"created";s:19:"2012-10-04 23:32:16";s:8:"modified";s:19:"2012-10-04 23:32:16";}}}User|a:1:{s:7:"profile";a:1:{s:11:"subgroup_id";s:1:"6";}}', 1349483639),
('-EHg07q4lmPMXRy5FAtNA3', 'Config|a:3:{s:9:"userAgent";s:32:"ef3f0173f5b061a45819e61a3762ce35";s:4:"time";i:1349504385;s:9:"countdown";i:10;}', 1349489986);

-- --------------------------------------------------------

--
-- Table structure for table `privmsgs`
--

CREATE TABLE IF NOT EXISTS `privmsgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `privmsgs`
--


-- --------------------------------------------------------

--
-- Table structure for table `privmsg_texts`
--

CREATE TABLE IF NOT EXISTS `privmsg_texts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privmsg_id` int(11) NOT NULL,
  `topic` varchar(60) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `privmsg_texts`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `active` varchar(5) NOT NULL DEFAULT 'false',
  `hash` varchar(40) NOT NULL COMMENT 'username+email hash used to verify email account',
  `avatar` varchar(150) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `suspension_expiration` date NOT NULL,
  `premium_expiration` date NOT NULL,
  `community_commitment` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

