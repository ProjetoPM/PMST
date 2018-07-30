-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 04-Abr-2018 às 23:02
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u431494456_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` int(11) NOT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `activity` text NOT NULL,
  `module` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `fk_user_id`, `activity`, `module`, `created_at`) VALUES
(1, 1, 'add new user victor@carecas.com.br', 'User Management', '2018-04-04 05:14:54'),
(2, 1, 'update user victor@carecas.com.br`s details (victor@carecas.com.br to victor@carecas.com.br, User 1 to User One,user to user)', 'User Management', '2017-01-12 06:21:55'),
(3, 1, 'add new user girardongustavo@yahoo.com', 'User Management', '2018-04-04 19:14:30'),
(4, 1, 'add new user bladeotglobal@gmail.com', 'User Management', '2018-04-04 19:15:18'),
(5, 1, 'add new user victorsc_rs@hotmail.com', 'User Management', '2018-04-04 19:19:39'),
(6, 1, 'add new user rodrigo.blizzard@hotmail.com', 'User Management', '2018-04-04 19:27:29'),
(7, 1, 'add new user bladeotglobal@gmail.com', 'User Management', '2018-04-04 19:52:52'),
(8, NULL, 'add new user bladeotglobal@gmail.com', 'User Management', '2018-04-04 22:29:17'),
(9, NULL, 'add new user bladeotglobal@gmail.com', 'User Management', '2018-04-04 22:33:20'),
(10, 18, 'change its own password', 'Change Password', '2018-04-04 22:47:18'),
(11, 19, 'change its own password', 'Change Password', '2018-04-04 22:52:35'),
(12, 20, 'change its own password', 'Change Password', '2018-04-04 23:00:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `objectives` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_has_user`
--

CREATE TABLE `project_has_user` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `access_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `institution` varchar(255) DEFAULT NULL,
  `lattes_address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `role`, `status`, `institution`, `lattes_address`, `created_at`, `updated_at`) VALUES
(12, 'victorsc.rs@gmail.com', '2bf2301afbd353c77490a08cbaee8cd0', 'Victor Costa', 'user', 0, 'UNIPAMPA', 'google.com', '2018-04-04 22:11:29', '0000-00-00 00:00:00'),
(19, 'ggirardon@gmail.com', 'd084d33f9edc8f88568314c1f8b42823', 'Gustavo Girardon', 'user', 1, 'Unipampa', 'teste', '2018-04-04 22:51:59', '2018-04-04 22:52:35'),
(20, 'rodrigo.blizzard92@gmail.com', '51ef8f85e7be00232ebcde36c829a8af', 'Rodrigo Machado', 'user', 1, 'Unipampa', '', '2018-04-04 22:58:28', '2018-04-04 23:00:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_BKP`
--

CREATE TABLE `user_BKP` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_BKP`
--

INSERT INTO `user_BKP` (`user_id`, `email`, `password`, `name`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ggirardon@gmail.com', '698dc19d489c4e4db73e28a713eab07b', 'Admin', 'admin', 1, '2017-01-12 12:07:57', '2017-01-12 14:07:59'),
(2, 'teste@gmail.com', '698dc19d489c4e4db73e28a713eab07b', 'User One', 'user', 1, '2017-01-12 04:14:51', '2017-01-12 06:23:26'),
(7, 'bladeotglobal@gmail.com', '762b58e190161e03785ec516ccd4aee5', 'testaaaa', 'user', 0, '2018-04-04 19:15:18', '0000-00-00 00:00:00'),
(8, 'victorsc_rs@hotmail.com', '698dc19d489c4e4db73e28a713eab07b', 'Victor', 'admin', 1, '2018-04-04 19:19:39', '2018-04-04 19:20:44'),
(9, 'rodrigo.blizzard@hotmail.com', '698dc19d489c4e4db73e28a713eab07b', 'Rodrigo', 'admin', 1, '2018-04-04 19:27:29', '2018-04-04 19:27:39'),
(10, 'bladeotglobal@gmail.com', '083b04ad27fc0bb6ad818bec2fe96bb6', 'Careca', 'admin', 0, '2018-04-04 19:52:50', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD UNIQUE KEY `log_id` (`log_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `created_by_idx` (`created_by`);

--
-- Indexes for table `project_has_user`
--
ALTER TABLE `project_has_user`
  ADD PRIMARY KEY (`project_id`,`user_id`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_BKP`
--
ALTER TABLE `user_BKP`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_BKP`
--
ALTER TABLE `user_BKP`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `project_has_user`
--
ALTER TABLE `project_has_user`
  ADD CONSTRAINT `project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
