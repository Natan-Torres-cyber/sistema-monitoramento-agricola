-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jun-2026 às 14:07
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
-- Estrutura da tabela `aplicacao`
--

CREATE TABLE `aplicacao` (
  `id` int(11) NOT NULL,
  `data_aplicacao` date NOT NULL,
  `quantidade_utilizada` decimal(10,2) NOT NULL,
  `observacao` text DEFAULT NULL,
  `insumo_id` int(11) NOT NULL,
  `lote_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `insumo`
--

CREATE TABLE `insumo` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `unidade_medida` varchar(20) NOT NULL,
  `quantidade_estoque` decimal(10,2) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE `lote` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cultura` varchar(50) NOT NULL,
  `area_hectares` decimal(10,2) NOT NULL,
  `localizacao` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `perfil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aplicacao`
--
ALTER TABLE `aplicacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aplicacao_insumo` (`insumo_id`),
  ADD KEY `fk_aplicacao_lote` (`lote_id`),
  ADD KEY `fk_aplicacao_usuario` (`usuario_id`);

--
-- Índices para tabela `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aplicacao`
--
ALTER TABLE `aplicacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `insumo`
--
ALTER TABLE `insumo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lote`
--
ALTER TABLE `lote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Usuário inicial para o primeiro acesso
-- login: admin@agromonitor.com | senha: admin123
-- (troque a senha depois de logar, em VIEW/usuario/)
--
INSERT INTO `usuario` (`nome`, `email`, `senha`, `perfil`) VALUES
('Administrador', 'admin@agromonitor.com', '$2y$10$wiXoF.lPjiB5CfDoVAvivuED/JrelSXBPhlcIAEq92icNHuNq12e6', 'admin');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aplicacao`
--
ALTER TABLE `aplicacao`
  ADD CONSTRAINT `fk_aplicacao_insumo` FOREIGN KEY (`insumo_id`) REFERENCES `insumo` (`id`),
  ADD CONSTRAINT `fk_aplicacao_lote` FOREIGN KEY (`lote_id`) REFERENCES `lote` (`id`),
  ADD CONSTRAINT `fk_aplicacao_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
