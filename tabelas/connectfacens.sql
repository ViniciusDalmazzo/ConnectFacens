-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 179.188.16.151
-- Generation Time: 05-Set-2017 às 09:20
-- Versão do servidor: 5.6.35-81.0-log
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connectfacens`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `senha`) VALUES
(1, 'vine', 'viny_ownz@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'admin', 'admin@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Guilherme', 'guilherme@live.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'marco', 'markinho9_7@hotmail.com', '3528b6beedcfe700e00c1bb4e623ffcf'),
(12, 'tdeaque', 'thainnadeaque@hotmail.com', '7fa81ff5e6a88a34ca2392240268c68f'),
(13, 'Ryu', 'biora_11@hotmail.com', '7912027c3b352e88c759a36a541529d3'),
(14, 'lfroostxx', 'guilherme@live.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(15, 'gabi', 'gabi@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(16, 'brunao', 'bruno@email.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(17, 'juniorramos', 'jrramos112@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
