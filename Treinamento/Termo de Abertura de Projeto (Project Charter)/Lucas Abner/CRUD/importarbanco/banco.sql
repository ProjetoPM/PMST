-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jul-2018 às 04:04
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `scope` varchar(255) DEFAULT NULL,
  `objective` varchar(255) DEFAULT NULL,
  `sucess` varchar(255) DEFAULT NULL,
  `requirements` varchar(255) DEFAULT NULL,
  `assumptions` varchar(255) DEFAULT NULL,
  `risks` varchar(255) DEFAULT NULL,
  `milestone` varchar(255) DEFAULT NULL,
  `budge` varchar(255) DEFAULT NULL,
  `stakeholder` varchar(255) DEFAULT NULL,
  `aprovalReq` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `project`
--

INSERT INTO `project` (`project_id`, `title`, `description`, `status`, `scope`, `objective`, `sucess`, `requirements`, `assumptions`, `risks`, `milestone`, `budge`, `stakeholder`, `aprovalReq`, `start_date`, `end_date`) VALUES
(25, 'Teste', 'executar plis ', 0, 'projeto', 'pesquisa', 'trampa', 'tomar cafe', 'nao sei', 'muitos', 'rapido', 'free', 'Abner', 'work work work', 'hoje', 'onte de ontem'),
(26, 'Teste2', 'executar denovo', 1, 's', 'u', 'r', 'p', 'r', 'i', 's', 'very', 'fulano', 'paz', 'e', 'cabou ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stakelholder`
--

CREATE TABLE `stakelholder` (
  `stakelholder_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `roles_responsabilies` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `stakelholder`
--

INSERT INTO `stakelholder` (`stakelholder_id`, `name`, `roles_responsabilies`, `status`) VALUES
(7, 'Abner', 'Project manager', 0),
(8, 'fulano', 'Finance Manager', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `stakelholder`
--
ALTER TABLE `stakelholder`
  ADD PRIMARY KEY (`stakelholder_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `stakelholder`
--
ALTER TABLE `stakelholder`
  MODIFY `stakelholder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
