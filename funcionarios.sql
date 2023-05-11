-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/05/2023 às 21:40
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `petshop`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `idFuncionario` int(10) NOT NULL,
  `cpf_funcionario` char(11) DEFAULT NULL,
  `nome_funcionario` varchar(100) DEFAULT NULL,
  `senha_funcionario` varchar(250) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`idFuncionario`, `cpf_funcionario`, `nome_funcionario`, `senha_funcionario`, `cargo`) VALUES
(2, '45215720061', 'Adalberto Pereira', '202cb962ac59075b964b07152d234b70', 'Tosador'),
(3, '27481500070', 'Mika Muramasa', '202cb962ac59075b964b07152d234b70', 'Veterinário'),
(5, '57132702033', 'Camilo Malandro', '202cb962ac59075b964b07152d234b70', 'Administrador'),
(6, '77484551040', 'Amando Batista', '202cb962ac59075b964b07152d234b70', 'Secretária'),
(7, '66959460000', 'Karla Jucelina', '202cb962ac59075b964b07152d234b70', 'Veterinário'),
(8, '61753182000', 'Carlos Marinho', '202cb962ac59075b964b07152d234b70', 'Tosador');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idFuncionario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
