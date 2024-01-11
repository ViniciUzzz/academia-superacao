-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2023 às 09:17
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assessments`
--

CREATE TABLE `assessments` (
  `id` tinyint(4) NOT NULL,
  `user` tinyint(4) NOT NULL,
  `height` varchar(3) NOT NULL,
  `current_weight` varchar(7) NOT NULL,
  `waist_circumf` varchar(6) NOT NULL,
  `hip_circumf` varchar(6) NOT NULL,
  `left_arm_circumf` varchar(6) NOT NULL,
  `right_arm_circumf` varchar(6) NOT NULL,
  `left_thigh_circumf` varchar(6) NOT NULL,
  `right_thigh_circumf` varchar(6) NOT NULL,
  `body_fat` varchar(5) NOT NULL,
  `lean_mass` varchar(7) NOT NULL,
  `fat_mass` varchar(7) NOT NULL,
  `objective` varchar(20) NOT NULL,
  `assessment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `assessments`
--

INSERT INTO `assessments` (`id`, `user`, `height`, `current_weight`, `waist_circumf`, `hip_circumf`, `left_arm_circumf`, `right_arm_circumf`, `left_thigh_circumf`, `right_thigh_circumf`, `body_fat`, `lean_mass`, `fat_mass`, `objective`, `assessment_date`) VALUES
(1, 1, '170', '80', '95', '30', '29', '55', '54', '90', '15', '59.5', '10.5', 'Ganho de Massa', '2023-11-29 16:48:21'),
(3, 4, '171', '80', '95', '30', '29', '55', '54', '90', '23', '59.5', '10.5', 'Ganho de Massa', '2023-11-29 16:55:21'),
(10, 2, '180', '80.520', '80', '70', '30.40', '30.00', '30.30', '30.30', '15.5', '150.000', '12.30', 'Ganho de Massa', '2023-12-01 18:57:32'),
(9, 2, '173', '80.520', '50', '50', '30.40', '30.00', '30.30', '30.30', '15.5', '150.000', '12.30', 'Perda de Peso', '2023-12-01 17:32:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `username` varchar(30) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `birth_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `cpf`, `username`, `full_name`, `email`, `phone`, `admin`, `activated`, `password`, `entry_date`, `birth_date`) VALUES
(1, '036.093.650-13', 'admin', 'João Pedro', 'teddddste@tesllt.com', '(51) 9 9245-3289', 1, 1, '202cb962ac59075b964b07152d234b70', '2023-11-24 12:14:40', '2023-11-08'),
(2, '962.101.760-20', 'joehenrique7', 'Joel Henrique Rother', 'joehenrique7@gmail.com', '(51) 9 7400-2185', 0, 1, '4297f44b13955235245b2497399d7a93', '2023-11-27 11:53:09', '1981-01-07'),
(4, '036.093.660-10', 'vitor', 'Vitor Kruel', 'vkruel.programador@gmail.com', '(51) 9 8345-7549', 0, 1, '202cb962ac59075b964b07152d234b70', '2023-11-28 18:41:48', '2001-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
