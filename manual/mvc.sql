-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2016 at 03:53 PM
-- Server version: 5.7.15-0ubuntu0.16.04.1
-- PHP Version: 7.0.10-2+deb.sury.org~xenial+1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stage`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'to-string',
  `code` varchar(30) DEFAULT NULL,
  `folder` varchar(20) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `distributor` tinyint(1) NOT NULL DEFAULT '1',
  `oldid` int(3) DEFAULT NULL COMMENT 'ignore'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `company`
--

TRUNCATE TABLE `company`;
-- --------------------------------------------------------

--
-- Table structure for table `company_htm`
--

DROP TABLE IF EXISTS `company_htm`;
CREATE TABLE `company_htm` (
  `id` int(9) NOT NULL,
  `company_id` int(9) NOT NULL,
  `htm_id` int(9) NOT NULL,
  `htm_type_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `company_htm`
--

TRUNCATE TABLE `company_htm`;
-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

DROP TABLE IF EXISTS `company_info`;
CREATE TABLE `company_info` (
  `company_id` int(6) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `nif` varchar(10) DEFAULT NULL,
  `tlf` varchar(15) DEFAULT NULL,
  `tlm` varchar(15) DEFAULT NULL,
  `web` varchar(100) DEFAULT NULL,
  `mail` varchar(120) DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `company_info`
--

TRUNCATE TABLE `company_info`;
-- --------------------------------------------------------

--
-- Table structure for table `company_user`
--

DROP TABLE IF EXISTS `company_user`;
CREATE TABLE `company_user` (
  `id` int(9) NOT NULL,
  `company_id` int(9) NOT NULL,
  `user_id` int(6) NOT NULL,
  `user_functions_id` int(6) NOT NULL,
  `code` varchar(50) DEFAULT NULL COMMENT 'to-string',
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `company_user`
--

TRUNCATE TABLE `company_user`;
-- --------------------------------------------------------

--
-- Table structure for table `htm`
--

DROP TABLE IF EXISTS `htm`;
CREATE TABLE `htm` (
  `id` int(9) NOT NULL,
  `htm_app_id` int(3) NOT NULL,
  `stat` set('private','backend','public') NOT NULL DEFAULT 'private',
  `ord` int(3) NOT NULL DEFAULT '1',
  `controller` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `htm`
--

TRUNCATE TABLE `htm`;
--
-- Dumping data for table `htm`
--

INSERT INTO `htm` (`id`, `htm_app_id`, `stat`, `ord`, `controller`) VALUES
(1, 1, 'public', 1, NULL),
(2, 2, 'backend', 1, NULL),
(3, 5, 'backend', 1, NULL),
(4, 5, 'backend', 5, NULL),
(5, 5, 'backend', 9, NULL),
(6, 5, 'backend', 1, NULL),
(7, 3, 'public', 1, NULL),
(8, 3, 'public', 1, NULL),
(9, 5, 'private', 1, NULL),
(10, 3, 'private', 1, ''),
(13, 5, 'backend', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `htm_app`
--

DROP TABLE IF EXISTS `htm_app`;
CREATE TABLE `htm_app` (
  `id` int(3) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `htm_app`
--

TRUNCATE TABLE `htm_app`;
--
-- Dumping data for table `htm_app`
--

INSERT INTO `htm_app` (`id`, `slug`, `name`) VALUES
(1, 'home', 'Home'),
(2, 'backend', 'Backend'),
(3, 'user', 'Utilizador'),
(5, 'configs', 'Configs'),
(6, 'admin', 'Admin'),
(8, 'task', 'Tarefas'),
(9, 'core', 'Core');

-- --------------------------------------------------------

--
-- Table structure for table `htm_has_media`
--

DROP TABLE IF EXISTS `htm_has_media`;
CREATE TABLE `htm_has_media` (
  `htm_media_id` int(9) NOT NULL,
  `htm_id` int(9) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `ord` int(3) NOT NULL DEFAULT '1',
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `htm_has_media`
--

TRUNCATE TABLE `htm_has_media`;
-- --------------------------------------------------------

--
-- Table structure for table `htm_has_vars`
--

DROP TABLE IF EXISTS `htm_has_vars`;
CREATE TABLE `htm_has_vars` (
  `htm_vars_id` int(6) NOT NULL,
  `htm_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `htm_has_vars`
--

TRUNCATE TABLE `htm_has_vars`;
-- --------------------------------------------------------

--
-- Table structure for table `htm_log`
--

DROP TABLE IF EXISTS `htm_log`;
CREATE TABLE `htm_log` (
  `id` int(6) NOT NULL,
  `htm_id` int(9) NOT NULL,
  `user_id` int(6) NOT NULL,
  `event` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `htm_log`
--

TRUNCATE TABLE `htm_log`;
-- --------------------------------------------------------

--
-- Table structure for table `htm_media`
--

DROP TABLE IF EXISTS `htm_media`;
CREATE TABLE `htm_media` (
  `id` int(9) NOT NULL,
  `genre` set('img','file','embed','pdf') NOT NULL DEFAULT 'img',
  `url` varchar(150) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `htm_media`
--

TRUNCATE TABLE `htm_media`;
-- --------------------------------------------------------

--
-- Table structure for table `htm_page`
--

DROP TABLE IF EXISTS `htm_page`;
CREATE TABLE `htm_page` (
  `id` int(9) NOT NULL,
  `htm_id` int(9) NOT NULL,
  `langs_tld` varchar(2) NOT NULL DEFAULT 'pt',
  `title` varchar(100) NOT NULL DEFAULT 'Home' COMMENT 'to-string',
  `slug` varchar(100) NOT NULL DEFAULT 'index',
  `menu` varchar(100) DEFAULT NULL,
  `heading` varchar(100) DEFAULT NULL,
  `summary` text,
  `publication_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `htm_page`
--

TRUNCATE TABLE `htm_page`;
--
-- Dumping data for table `htm_page`
--

INSERT INTO `htm_page` (`id`, `htm_id`, `langs_tld`, `title`, `slug`, `menu`, `heading`, `summary`, `publication_date`, `updated_at`) VALUES
(1, 1, 'pt', 'Home', 'index', 'Home', 'Liga dos Campeões das Vendas', NULL, '2016-08-29 11:51:33', '2015-01-16 22:51:52'),
(2, 2, 'pt', 'Dashboard', 'index', 'Backend', 'Painel de Controle', NULL, '2016-08-29 11:51:33', '2015-01-26 11:59:20'),
(3, 3, 'pt', 'Módulos', 'apps', 'Módulos', 'Módulos / Apps', NULL, '2016-08-29 11:51:33', '2015-02-03 13:51:17'),
(4, 4, 'pt', 'Paginas', 'pages', 'Paginas', 'Paginas', NULL, '2016-08-29 11:51:33', '2015-01-19 18:05:11'),
(5, 5, 'pt', 'Utilizadores', 'users', 'Utilizadores', 'Utilizadores', NULL, '2016-08-29 11:51:33', '2015-01-26 14:51:58'),
(6, 6, 'pt', 'Grupos Utilizadores', 'usergroups', 'Grupos', 'Gestão de grupos de utilizadores', NULL, '2016-08-29 11:51:33', '2015-02-25 10:37:18'),
(7, 7, 'pt', 'Perfil', 'profile', 'Perfil', 'Perfil do Utilizador', NULL, '2016-08-29 11:51:33', '2015-02-18 14:23:05'),
(8, 8, 'pt', 'Login', 'login', 'Login', 'Login', NULL, '2016-08-29 11:51:33', '2015-02-18 13:59:36'),
(9, 9, 'pt', 'Modulos - Grupos', 'appgroup', 'Appgroup', 'Modulos - Grupos', NULL, '2016-08-29 11:51:33', '2015-02-23 19:16:19'),
(10, 10, 'pt', 'User', 'user', 'User', 'User', '', '0000-00-00 00:00:00', '2016-09-08 14:17:38'),
(11, 13, 'pt', 'Tags', 'tags', 'Tags', 'Tags', NULL, '2016-08-29 11:51:33', '2016-09-08 14:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `htm_txt`
--

DROP TABLE IF EXISTS `htm_txt`;
CREATE TABLE `htm_txt` (
  `id` int(9) NOT NULL,
  `htm_page_id` int(9) NOT NULL,
  `type` set('desc','lead','txt','obs','footer') DEFAULT NULL,
  `txt` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `htm_txt`
--

TRUNCATE TABLE `htm_txt`;
-- --------------------------------------------------------

--
-- Table structure for table `htm_vars`
--

DROP TABLE IF EXISTS `htm_vars`;
CREATE TABLE `htm_vars` (
  `id` int(6) NOT NULL,
  `var` varchar(100) DEFAULT 'tag',
  `value` varchar(100) DEFAULT NULL,
  `status` enum('public','private') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `htm_vars`
--

TRUNCATE TABLE `htm_vars`;
-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

DROP TABLE IF EXISTS `langs`;
CREATE TABLE `langs` (
  `tld` varchar(2) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `locale` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `langs`
--

TRUNCATE TABLE `langs`;
--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`tld`, `name`, `locale`) VALUES
('en', NULL, 'en_EN'),
('es', NULL, 'es_ES'),
('fr', NULL, 'fr_FR'),
('pt', NULL, 'pt_PT');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE `support` (
  `id` int(9) NOT NULL,
  `user_id` int(6) NOT NULL,
  `source` set('phone','mail','web') DEFAULT 'mail',
  `status` set('open','assigned','closed') DEFAULT 'open',
  `type` set('query','issue','suggestion') DEFAULT 'query'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `support`
--

TRUNCATE TABLE `support`;
-- --------------------------------------------------------

--
-- Table structure for table `support_log`
--

DROP TABLE IF EXISTS `support_log`;
CREATE TABLE `support_log` (
  `id` int(9) NOT NULL,
  `support_id` int(9) NOT NULL,
  `user_id` int(6) NOT NULL,
  `event` set('creation','assign','reply','task','closed') NOT NULL DEFAULT 'creation',
  `notes` text COMMENT 'to-string',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `support_log`
--

TRUNCATE TABLE `support_log`;
-- --------------------------------------------------------

--
-- Table structure for table `user_base`
--

DROP TABLE IF EXISTS `user_base`;
CREATE TABLE `user_base` (
  `id` int(6) NOT NULL,
  `user_group_id` int(3) NOT NULL DEFAULT '21',
  `name` varchar(100) NOT NULL COMMENT 'to-string',
  `mail` varchar(100) DEFAULT NULL,
  `username` varchar(30) NOT NULL COMMENT 'no-join',
  `password` varchar(32) DEFAULT NULL COMMENT 'no-join',
  `status` set('active','blocked','disabled','virtual') DEFAULT 'active',
  `confirmed` tinyint(1) DEFAULT '0',
  `salt` varchar(128) DEFAULT NULL COMMENT 'no-join',
  `userkey` varchar(128) DEFAULT NULL COMMENT 'no-join'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `user_base`
--

TRUNCATE TABLE `user_base`;
--
-- Dumping data for table `user_base`
--

INSERT INTO `user_base` (`id`, `user_group_id`, `name`, `mail`, `username`, `password`, `status`, `confirmed`, `salt`, `userkey`) VALUES
(1, 1, 'Luís Pinto', 'lpinto@buslisboa.agency', 'lpinto@buslisboa.agency', '1500lisboa', 'active', 0, '495a4368dadb1d94bc7c82075b0f7c5d', '248a9e71621bfd945e366b76038fe144dbf224e2'),
(2, 22, 'Anonymous', '', 'anonymous', 'zwq4hfqxpffh948ca', 'active', 0, '', ''),
(3, 16, 'Virtual User', '', 'virtual-user@mail.com', '1234', 'active', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_functions`
--

DROP TABLE IF EXISTS `user_functions`;
CREATE TABLE `user_functions` (
  `id` int(6) NOT NULL,
  `function` varchar(100) NOT NULL COMMENT 'to-string',
  `description` varchar(100) DEFAULT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `user_functions`
--

TRUNCATE TABLE `user_functions`;
--
-- Dumping data for table `user_functions`
--

INSERT INTO `user_functions` (`id`, `function`, `description`, `public`) VALUES
(1, 'admin', 'Administrador', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `id` int(3) NOT NULL,
  `name` varchar(100) DEFAULT NULL COMMENT 'to-string',
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `user_group`
--

TRUNCATE TABLE `user_group`;
--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `description`) VALUES
(1, 'dev', 'Developer'),
(2, 'admin', 'Administrator'),
(5, 'owner', 'Owner'),
(15, 'team-leader', 'Team Leader'),
(16, 'seller', 'Seller'),
(19, 'info', 'Info & Tech Support'),
(21, 'user', 'User'),
(22, 'visitor', 'Visitor'),
(31, 'virtual', 'Virtual');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_has_htm_app`
--

DROP TABLE IF EXISTS `user_group_has_htm_app`;
CREATE TABLE `user_group_has_htm_app` (
  `user_group_id` int(3) NOT NULL,
  `htm_app_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `user_group_has_htm_app`
--

TRUNCATE TABLE `user_group_has_htm_app`;
--
-- Dumping data for table `user_group_has_htm_app`
--

INSERT INTO `user_group_has_htm_app` (`user_group_id`, `htm_app_id`) VALUES
(1, 1),
(2, 1),
(5, 1),
(15, 1),
(16, 1),
(22, 1),
(1, 2),
(2, 2),
(5, 2),
(6, 2),
(1, 3),
(2, 3),
(5, 3),
(15, 3),
(16, 3),
(19, 3),
(21, 3),
(22, 3),
(31, 3),
(1, 5),
(1, 6),
(2, 6),
(5, 6),
(1, 7),
(1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `user_id` int(6) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `tlf` varchar(15) DEFAULT NULL,
  `tlm` varchar(15) DEFAULT NULL,
  `nif` varchar(10) DEFAULT NULL,
  `bic` varchar(15) DEFAULT NULL,
  `born` date DEFAULT NULL,
  `civil` set('S','N','NA') DEFAULT 'NA',
  `genre` set('M','F') DEFAULT 'M',
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `user_info`
--

TRUNCATE TABLE `user_info`;
-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `event` set('created','login','confirmation','updated','shopping','banned','approval') NOT NULL DEFAULT 'login',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `user_log`
--

TRUNCATE TABLE `user_log`;
--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `user_id`, `event`, `updated_at`) VALUES
(1, 1, 'login', '2016-05-03 14:02:14'),
(2, 1, 'login', '2016-05-03 15:23:33'),
(3, 1, 'login', '2016-05-03 16:21:49'),
(4, 1, 'login', '2016-05-04 09:59:51'),
(5, 1, 'login', '2016-05-04 15:33:36'),
(6, 1, 'login', '2016-05-12 16:44:34'),
(7, 1, 'login', '2016-06-01 11:33:39'),
(8, 1, 'login', '2016-06-01 14:24:13'),
(9, 1, 'login', '2016-06-01 22:52:33'),
(10, 1, 'login', '2016-06-02 09:36:35'),
(11, 1, 'login', '2016-06-02 15:37:08'),
(12, 1, 'login', '2016-06-02 21:36:59'),
(13, 1, 'login', '2016-06-03 10:48:14'),
(14, 1, 'login', '2016-06-20 11:30:28'),
(15, 1, 'login', '2016-06-30 16:09:58'),
(16, 1, 'login', '2016-07-06 11:08:11'),
(17, 1, 'login', '2016-07-14 10:15:14'),
(18, 1, 'login', '2016-09-06 11:29:05'),
(19, 1, 'login', '2016-09-08 14:12:34'),
(20, 1, 'login', '2016-09-08 15:49:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_htm`
--
ALTER TABLE `company_htm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_company_htm_company_idx` (`company_id`),
  ADD KEY `fk_company_htm_htm_idx` (`htm_id`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `fk_company_info_company_idx` (`company_id`);

--
-- Indexes for table `company_user`
--
ALTER TABLE `company_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_company_user_company_idx` (`company_id`),
  ADD KEY `fk_company_user_user_idx` (`user_id`),
  ADD KEY `fk_company_user_user_functions_idx` (`user_functions_id`);

--
-- Indexes for table `htm`
--
ALTER TABLE `htm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_htm_app` (`htm_app_id`);

--
-- Indexes for table `htm_app`
--
ALTER TABLE `htm_app`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `htm_has_media`
--
ALTER TABLE `htm_has_media`
  ADD PRIMARY KEY (`htm_media_id`,`htm_id`),
  ADD KEY `fk_htm_media_id` (`htm_media_id`),
  ADD KEY `fk_htm_media_htm` (`htm_id`);

--
-- Indexes for table `htm_has_vars`
--
ALTER TABLE `htm_has_vars`
  ADD PRIMARY KEY (`htm_vars_id`,`htm_id`),
  ADD KEY `fk_htm_has_vars_vars_id` (`htm_vars_id`) USING BTREE,
  ADD KEY `fk_htm_has_vars_htm_id` (`htm_id`) USING BTREE;

--
-- Indexes for table `htm_log`
--
ALTER TABLE `htm_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_htm_log_htm_idx` (`htm_id`),
  ADD KEY `fk_htm_log_user_idx` (`user_id`);

--
-- Indexes for table `htm_media`
--
ALTER TABLE `htm_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `htm_page`
--
ALTER TABLE `htm_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_htm_page_htm` (`htm_id`),
  ADD KEY `fk_htm_page_langs` (`langs_tld`);

--
-- Indexes for table `htm_txt`
--
ALTER TABLE `htm_txt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_htm_txt_htm_page` (`htm_page_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `htm_vars`
--
ALTER TABLE `htm_vars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`tld`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_support_user_idx` (`user_id`);

--
-- Indexes for table `support_log`
--
ALTER TABLE `support_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_support_log_support_idx` (`support_id`),
  ADD KEY `fk_support_log_user_idx` (`user_id`);

--
-- Indexes for table `user_base`
--
ALTER TABLE `user_base`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `user_group_id` (`user_group_id`);

--
-- Indexes for table `user_functions`
--
ALTER TABLE `user_functions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `function` (`function`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group_has_htm_app`
--
ALTER TABLE `user_group_has_htm_app`
  ADD PRIMARY KEY (`user_group_id`,`htm_app_id`),
  ADD KEY `fk_user_group_has_htm_app_htm_app_idx` (`htm_app_id`),
  ADD KEY `fk_user_group_has_htm_app_user_group_idx` (`user_group_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company_htm`
--
ALTER TABLE `company_htm`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company_user`
--
ALTER TABLE `company_user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `htm`
--
ALTER TABLE `htm`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `htm_app`
--
ALTER TABLE `htm_app`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `htm_log`
--
ALTER TABLE `htm_log`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `htm_media`
--
ALTER TABLE `htm_media`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `htm_page`
--
ALTER TABLE `htm_page`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `htm_txt`
--
ALTER TABLE `htm_txt`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `htm_vars`
--
ALTER TABLE `htm_vars`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `support_log`
--
ALTER TABLE `support_log`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_base`
--
ALTER TABLE `user_base`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_functions`
--
ALTER TABLE `user_functions`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_htm`
--
ALTER TABLE `company_htm`
  ADD CONSTRAINT `fk_company_htm_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_company_htm_htm` FOREIGN KEY (`htm_id`) REFERENCES `htm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `company_info`
--
ALTER TABLE `company_info`
  ADD CONSTRAINT `fk_company_info_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `company_user`
--
ALTER TABLE `company_user`
  ADD CONSTRAINT `fk_company_user_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_company_user_user` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_company_user_user_functions` FOREIGN KEY (`user_functions_id`) REFERENCES `user_functions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `htm`
--
ALTER TABLE `htm`
  ADD CONSTRAINT `fk_htm_app` FOREIGN KEY (`htm_app_id`) REFERENCES `htm_app` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `htm_has_media`
--
ALTER TABLE `htm_has_media`
  ADD CONSTRAINT `fk_htm_media_htm` FOREIGN KEY (`htm_id`) REFERENCES `htm` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_htm_media_id` FOREIGN KEY (`htm_media_id`) REFERENCES `htm_media` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `htm_has_vars`
--
ALTER TABLE `htm_has_vars`
  ADD CONSTRAINT `fk_htm_has_vars_htm` FOREIGN KEY (`htm_id`) REFERENCES `htm` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_htm_has_vars_tags` FOREIGN KEY (`htm_vars_id`) REFERENCES `htm_vars` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `htm_log`
--
ALTER TABLE `htm_log`
  ADD CONSTRAINT `fk_htm_log_htm` FOREIGN KEY (`htm_id`) REFERENCES `htm` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_htm_log_user` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `htm_page`
--
ALTER TABLE `htm_page`
  ADD CONSTRAINT `fk_htm_page_htm` FOREIGN KEY (`htm_id`) REFERENCES `htm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_htm_page_langs` FOREIGN KEY (`langs_tld`) REFERENCES `langs` (`tld`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `htm_txt`
--
ALTER TABLE `htm_txt`
  ADD CONSTRAINT `fk_htm_txt_htm_page` FOREIGN KEY (`htm_page_id`) REFERENCES `htm_page` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_base`
--
ALTER TABLE `user_base`
  ADD CONSTRAINT `fk_user_group_user` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_group_has_htm_app`
--
ALTER TABLE `user_group_has_htm_app`
  ADD CONSTRAINT `fk_user_group_app` FOREIGN KEY (`htm_app_id`) REFERENCES `htm_app` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_group_group` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `fk_user_info_id` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `fk_user_log_user` FOREIGN KEY (`user_id`) REFERENCES `user_base` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
