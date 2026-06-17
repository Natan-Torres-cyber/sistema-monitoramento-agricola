-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jun-2026 às 23:38
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `curricularizacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas_agricolas`
--

CREATE TABLE `areas_agricolas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `localizacao` varchar(150) NOT NULL,
  `tamanho_hectares` decimal(10,2) NOT NULL,
  `safra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `culturas`
--

CREATE TABLE `culturas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo_monitoramento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `safras`
--

CREATE TABLE `safras` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `ano_agricola` varchar(20) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `cultura_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `talhoes`
--

CREATE TABLE `talhoes` (
  `id` int(11) NOT NULL,
  `identificacao` varchar(100) NOT NULL,
  `area_hectares` decimal(10,2) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `areas_agricolas`
--
ALTER TABLE `areas_agricolas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_area_safra` (`safra_id`);

--
-- Índices para tabela `culturas`
--
ALTER TABLE `culturas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `safras`
--
ALTER TABLE `safras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_safras_culturas` (`cultura_id`);

--
-- Índices para tabela `talhoes`
--
ALTER TABLE `talhoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_talhoes_areas` (`area_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `areas_agricolas`
--
ALTER TABLE `areas_agricolas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `culturas`
--
ALTER TABLE `culturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `safras`
--
ALTER TABLE `safras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `talhoes`
--
ALTER TABLE `talhoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `areas_agricolas`
--
ALTER TABLE `areas_agricolas`
  ADD CONSTRAINT `fk_area_safra` FOREIGN KEY (`safra_id`) REFERENCES `safras` (`id`);

--
-- Limitadores para a tabela `safras`
--
ALTER TABLE `safras`
  ADD CONSTRAINT `fk_safras_culturas` FOREIGN KEY (`cultura_id`) REFERENCES `culturas` (`id`);

--
-- Limitadores para a tabela `talhoes`
--
ALTER TABLE `talhoes`
  ADD CONSTRAINT `fk_talhao_area` FOREIGN KEY (`area_id`) REFERENCES `areas_agricolas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
