-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Ago-2017 às 05:18
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `migracao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

CREATE TABLE `cores` (
  `titulo` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_antigos`
--

CREATE TABLE `dados_antigos` (
  `codigo` varchar(100) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `tamanho` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados_antigos`
--

INSERT INTO `dados_antigos` (`codigo`, `titulo`, `cor`, `tamanho`) VALUES
('100', 'Sapato Verão 2014', 'Branco', '33'),
('100', 'Sapato Verão 2014', 'Branco', '34'),
('100', 'Sapato Verão 2014', 'Branco', '35'),
('100', 'Sapato Verão 2014', 'Azul', '33'),
('100', 'Sapato Verão 2014', 'Azul', '34'),
('100', 'Sapato Verão 2014', 'Azul', '35'),
('120', 'Tênis Nike', 'Preto', '36'),
('120', 'Tênis Nike', 'Preto', '37'),
('120', 'Tênis Nike', 'Preto', '38'),
('120', 'Tênis Nike', 'Vermelho', '36'),
('120', 'Tênis Nike', 'Vermelho', '37'),
('120', 'Tênis Nike', 'Vermelho', '38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `titulo` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_cores`
--

CREATE TABLE `produtos_cores` (
  `id` int(11) NOT NULL,
  `id_cor` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_tamanhos`
--

CREATE TABLE `produtos_tamanhos` (
  `id` int(11) NOT NULL,
  `id_produto_cor` int(11) NOT NULL,
  `id_tamanho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhos`
--

CREATE TABLE `tamanhos` (
  `titulo` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo_UNIQUE` (`titulo`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo_UNIQUE` (`titulo`);

--
-- Indexes for table `produtos_cores`
--
ALTER TABLE `produtos_cores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_cores_cores1_idx` (`id_cor`),
  ADD KEY `fk_produtos_cores_produtos1_idx` (`id_produto`);

--
-- Indexes for table `produtos_tamanhos`
--
ALTER TABLE `produtos_tamanhos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto_cor` (`id_produto_cor`),
  ADD KEY `id_tamanho` (`id_tamanho`);

--
-- Indexes for table `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo_UNIQUE` (`titulo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cores`
--
ALTER TABLE `cores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;
--
-- AUTO_INCREMENT for table `produtos_cores`
--
ALTER TABLE `produtos_cores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT for table `produtos_tamanhos`
--
ALTER TABLE `produtos_tamanhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;
--
-- AUTO_INCREMENT for table `tamanhos`
--
ALTER TABLE `tamanhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produtos_cores`
--
ALTER TABLE `produtos_cores`
  ADD CONSTRAINT `fk_produtos_cores_cores1` FOREIGN KEY (`id_cor`) REFERENCES `cores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produtos_cores_produtos1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos_tamanhos`
--
ALTER TABLE `produtos_tamanhos`
  ADD CONSTRAINT `produtos_tamanhos_ibfk_1` FOREIGN KEY (`id_produto_cor`) REFERENCES `produtos_cores` (`id`),
  ADD CONSTRAINT `produtos_tamanhos_ibfk_2` FOREIGN KEY (`id_tamanho`) REFERENCES `tamanhos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
