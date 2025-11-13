-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Nov-2025 às 22:34
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

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
-- Estrutura da tabela `inserecomentario`
--

CREATE TABLE `inserecomentario` (
  `id_comentario` int(10) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `inserecomentario`
--

INSERT INTO `inserecomentario` (`id_comentario`, `comentario`) VALUES
(1, 'Sallllve '),
(2, 'Sallllve '),
(3, 'jwbvsbv');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
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
-- Extraindo dados da tabela `usuario`
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
-- Índices para tabela `inserecomentario`
--
ALTER TABLE `inserecomentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `inserecomentario`
--
ALTER TABLE `inserecomentario`
  MODIFY `id_comentario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
