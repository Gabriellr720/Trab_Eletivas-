-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/11/2025 às 21:21
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trab_eletivas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `enviarreceita`
--

CREATE TABLE `enviarreceita` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(40) NOT NULL,
  `receita_nome` varchar(255) NOT NULL,
  `dificuldade` enum('Fácil','Médio','Difícil') NOT NULL,
  `rendimento_porcoes` int(11) NOT NULL,
  `ingredientes` text NOT NULL,
  `modo_preparo` text NOT NULL,
  `foto_caminho` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `enviarreceita`
--

INSERT INTO `enviarreceita` (`id`, `nome_usuario`, `receita_nome`, `dificuldade`, `rendimento_porcoes`, `ingredientes`, `modo_preparo`, `foto_caminho`) VALUES
(10, 'fulano2', 'bolo de murango2', 'Fácil', 2, 'dsdsd', 'dsdsds', '../uploads/bolo.jpg'),
(11, 'dsds', 'receitateste3', 'Difícil', 2, 'gfgfg', 'fgfgf', '../uploads/bolo2.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingredientes_inspiracao`
--

CREATE TABLE `ingredientes_inspiracao` (
  `id` int(11) NOT NULL,
  `ingrediente1` varchar(255) DEFAULT NULL,
  `ingrediente2` varchar(255) DEFAULT NULL,
  `ingrediente3` varchar(255) DEFAULT NULL,
  `ingrediente4` varchar(255) DEFAULT NULL,
  `ingrediente5` varchar(255) DEFAULT NULL,
  `ingrediente6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ingredientes_inspiracao`
--

INSERT INTO `ingredientes_inspiracao` (`id`, `ingrediente1`, `ingrediente2`, `ingrediente3`, `ingrediente4`, `ingrediente5`, `ingrediente6`) VALUES
(17, 'frango', 'arroz', 'feijão', 'macarrao', 'ovo', 'leite'),
(18, 'arroz', 'ads', 'fatec', '', '', ''),
(19, '', '', '', 'ingrediente 4', 'ingrediente 5', 'ingrediente 6');

-- --------------------------------------------------------

--
-- Estrutura para tabela `inserecomentario`
--

CREATE TABLE `inserecomentario` (
  `id_comentario` int(10) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `inserecomentario`
--

INSERT INTO `inserecomentario` (`id_comentario`, `comentario`) VALUES
(1, 'Sallllve '),
(2, 'Sallllve '),
(3, 'jwbvsbv');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `cpf` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nome` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sobrenome` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `dataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`cpf`, `nome`, `sobrenome`, `telefone`, `email`, `senha`, `dataNasc`) VALUES
('091487314', 'wnjbvwbvou', 'wnvwp vo', '51651884', 'fwebg wbg', 'wkjg bg', '2008-02-10'),
('1234567', 'julio', 'cleber', '1899999999', 'cleber@gmail.com ', '123456', '2004-08-05'),
('321654', 'rojer', 'opejtjjt', '878545165', 'sgwghethrj', 'w484g 4e', '2025-11-04'),
('87/54651', 'sagwg', 'tjrthjaehj', '467561614', 'ghaeheh', '4541987987', '2025-10-30');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `enviarreceita`
--
ALTER TABLE `enviarreceita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`nome_usuario`);

--
-- Índices de tabela `ingredientes_inspiracao`
--
ALTER TABLE `ingredientes_inspiracao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `inserecomentario`
--
ALTER TABLE `inserecomentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `enviarreceita`
--
ALTER TABLE `enviarreceita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `ingredientes_inspiracao`
--
ALTER TABLE `ingredientes_inspiracao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `inserecomentario`
--
ALTER TABLE `inserecomentario`
  MODIFY `id_comentario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
