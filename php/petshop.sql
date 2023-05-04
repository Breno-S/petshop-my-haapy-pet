-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Abr-2023 às 22:03
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `idAgendamento` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `id_animal` int(10) DEFAULT NULL,
  `id_horario` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_cliente`
--

CREATE TABLE `cadastro_cliente` (
  `idCadastro` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `data_cad` datetime DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `celular` char(11) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cadastro_cliente`
--

INSERT INTO `cadastro_cliente` (`idCadastro`, `id_cliente`, `data_cad`, `email`, `celular`, `senha`) VALUES
(1, 1, '2023-04-28 00:00:00', 'sjhfk@gmail.com', '11987654321', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_pet`
--

CREATE TABLE `cadastro_pet` (
  `idPet` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `nome_pet` varchar(50) DEFAULT NULL,
  `raca` varchar(20) DEFAULT NULL,
  `cor_pet` varchar(20) DEFAULT NULL,
  `data_nasc_pet` date DEFAULT NULL,
  `peso_pet` float(4,2) DEFAULT NULL,
  `data_cad_pet` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cadastro_pet`
--

INSERT INTO `cadastro_pet` (`idPet`, `id_cliente`, `nome_pet`, `raca`, `cor_pet`, `data_nasc_pet`, `peso_pet`, `data_cad_pet`) VALUES
(1, 1, 'Trapalhão', 'Cachorro', 'Marrom', '2020-04-01', 10.00, '2023-04-28 16:11:52'),
(2, 1, 'Marquinhos', 'Cachorro', 'Marrom', '2020-04-01', 10.00, '2023-04-29 16:11:52'),
(3, 1, 'Bolha', 'Cachorro', 'Preto', '2021-04-01', 12.00, '2023-04-29 17:11:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

CREATE TABLE `cartao` (
  `idCartao` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `nome_cartao` varchar(100) DEFAULT NULL,
  `numero_cartao` int(12) DEFAULT NULL,
  `data_validade` date DEFAULT NULL,
  `bandeira` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(10) NOT NULL,
  `id_endereco` int(10) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `cpf` char(11) DEFAULT NULL,
  `rg` char(9) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `id_endereco`, `nome`, `sobrenome`, `cpf`, `rg`, `data_nasc`) VALUES
(1, 1, 'shfsh', '', '51976765072', '178912864', '2023-04-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(10) NOT NULL,
  `estado` char(2) DEFAULT NULL,
  `municipio` varchar(30) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` int(5) DEFAULT NULL,
  `cep` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `estado`, `municipio`, `bairro`, `logradouro`, `numero`, `cep`) VALUES
(1, 'SP', 'São Paulo', 'Jardim Dom Bosco', '123', 0, '04757000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `idEstoque` int(10) NOT NULL,
  `id_produto` int(10) DEFAULT NULL,
  `unidades` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `idFuncionario` int(10) NOT NULL,
  `cpf_funcionario` char(11) DEFAULT NULL,
  `nome_funcionario` varchar(100) DEFAULT NULL,
  `senha_funcionario` varchar(250) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`idFuncionario`, `cpf_funcionario`, `nome_funcionario`, `senha_funcionario`, `cargo`) VALUES
(2, '45215720061', 'Adalberto Pereira', 'sljrtg;sl', 'Tosador'),
(3, '27481500070', 'Mika Muramasa', 'dhgja.ing;a\\~id', 'Veterinário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios_disponiveis`
--

CREATE TABLE `horarios_disponiveis` (
  `idHorario` int(10) NOT NULL,
  `id_funcionario` int(10) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `reservado` tinyint(1) DEFAULT NULL,
  `servico` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `horarios_disponiveis`
--

INSERT INTO `horarios_disponiveis` (`idHorario`, `id_funcionario`, `data`, `horario`, `reservado`, `servico`) VALUES
(1, 2, '2023-05-19', '16:39:17', 0, 'Tosa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_cliente`
--

CREATE TABLE `imagem_cliente` (
  `idImgCli` int(10) NOT NULL,
  `id_cadastro` int(10) DEFAULT NULL,
  `dir_img_cliente` varchar(250) DEFAULT NULL,
  `criado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_func`
--

CREATE TABLE `imagem_func` (
  `idImgFunc` int(10) NOT NULL,
  `id_funcionario` int(10) DEFAULT NULL,
  `dir_img_funcionario` varchar(250) DEFAULT NULL,
  `criado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_pet`
--

CREATE TABLE `imagem_pet` (
  `idImgPet` int(10) NOT NULL,
  `id_pet` int(10) DEFAULT NULL,
  `dir_img_pet` varchar(250) DEFAULT NULL,
  `criado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_produto`
--

CREATE TABLE `imagem_produto` (
  `idImgProd` int(10) NOT NULL,
  `id_produto` int(10) DEFAULT NULL,
  `dir_img_produto` varchar(250) DEFAULT NULL,
  `criado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_compra`
--

CREATE TABLE `itens_compra` (
  `idItem` int(10) NOT NULL,
  `id_pedido` int(10) DEFAULT NULL,
  `id_produto` int(10) DEFAULT NULL,
  `quantidade` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `idPagamento` int(10) NOT NULL,
  `id_pedido` int(10) DEFAULT NULL,
  `id_cartao` int(10) DEFAULT NULL,
  `data_pag` datetime DEFAULT NULL,
  `valor_pag` float(5,2) DEFAULT NULL,
  `tipo_pag` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `data_pedido` datetime DEFAULT NULL,
  `status_pedido` varchar(20) DEFAULT NULL,
  `valor_pedido` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int(10) NOT NULL,
  `nome_produto` varchar(100) DEFAULT NULL,
  `preco_produto` float(5,2) DEFAULT NULL,
  `marca_produto` varchar(20) DEFAULT NULL,
  `tipo_produto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`idAgendamento`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_animal` (`id_animal`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Índices para tabela `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  ADD PRIMARY KEY (`idCadastro`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `cadastro_pet`
--
ALTER TABLE `cadastro_pet`
  ADD PRIMARY KEY (`idPet`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `cartao`
--
ALTER TABLE `cartao`
  ADD PRIMARY KEY (`idCartao`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `id_endereco` (`id_endereco`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`idEstoque`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Índices para tabela `horarios_disponiveis`
--
ALTER TABLE `horarios_disponiveis`
  ADD PRIMARY KEY (`idHorario`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Índices para tabela `imagem_cliente`
--
ALTER TABLE `imagem_cliente`
  ADD PRIMARY KEY (`idImgCli`),
  ADD KEY `id_cadastro` (`id_cadastro`);

--
-- Índices para tabela `imagem_func`
--
ALTER TABLE `imagem_func`
  ADD PRIMARY KEY (`idImgFunc`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Índices para tabela `imagem_pet`
--
ALTER TABLE `imagem_pet`
  ADD PRIMARY KEY (`idImgPet`),
  ADD KEY `id_pet` (`id_pet`);

--
-- Índices para tabela `imagem_produto`
--
ALTER TABLE `imagem_produto`
  ADD PRIMARY KEY (`idImgProd`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `itens_compra`
--
ALTER TABLE `itens_compra`
  ADD PRIMARY KEY (`idItem`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`idPagamento`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_cartao` (`id_cartao`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `idAgendamento` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  MODIFY `idCadastro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cadastro_pet`
--
ALTER TABLE `cadastro_pet`
  MODIFY `idPet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cartao`
--
ALTER TABLE `cartao`
  MODIFY `idCartao` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `idEstoque` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idFuncionario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `horarios_disponiveis`
--
ALTER TABLE `horarios_disponiveis`
  MODIFY `idHorario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `imagem_cliente`
--
ALTER TABLE `imagem_cliente`
  MODIFY `idImgCli` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem_func`
--
ALTER TABLE `imagem_func`
  MODIFY `idImgFunc` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem_pet`
--
ALTER TABLE `imagem_pet`
  MODIFY `idImgPet` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem_produto`
--
ALTER TABLE `imagem_produto`
  MODIFY `idImgProd` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itens_compra`
--
ALTER TABLE `itens_compra`
  MODIFY `idItem` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `idPagamento` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `agendamento_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `agendamento_ibfk_2` FOREIGN KEY (`id_animal`) REFERENCES `cadastro_pet` (`idPet`),
  ADD CONSTRAINT `agendamento_ibfk_3` FOREIGN KEY (`id_horario`) REFERENCES `horarios_disponiveis` (`idHorario`);

--
-- Limitadores para a tabela `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  ADD CONSTRAINT `cadastro_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idCliente`);

--
-- Limitadores para a tabela `cadastro_pet`
--
ALTER TABLE `cadastro_pet`
  ADD CONSTRAINT `cadastro_pet_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idCliente`);

--
-- Limitadores para a tabela `cartao`
--
ALTER TABLE `cartao`
  ADD CONSTRAINT `cartao_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idCliente`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`idEndereco`);

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`idProduto`);

--
-- Limitadores para a tabela `horarios_disponiveis`
--
ALTER TABLE `horarios_disponiveis`
  ADD CONSTRAINT `horarios_disponiveis_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`idFuncionario`);

--
-- Limitadores para a tabela `imagem_cliente`
--
ALTER TABLE `imagem_cliente`
  ADD CONSTRAINT `imagem_cliente_ibfk_1` FOREIGN KEY (`id_cadastro`) REFERENCES `cadastro_cliente` (`idCadastro`);

--
-- Limitadores para a tabela `imagem_func`
--
ALTER TABLE `imagem_func`
  ADD CONSTRAINT `imagem_func_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`idFuncionario`);

--
-- Limitadores para a tabela `imagem_pet`
--
ALTER TABLE `imagem_pet`
  ADD CONSTRAINT `imagem_pet_ibfk_1` FOREIGN KEY (`id_pet`) REFERENCES `cadastro_pet` (`idPet`);

--
-- Limitadores para a tabela `imagem_produto`
--
ALTER TABLE `imagem_produto`
  ADD CONSTRAINT `imagem_produto_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`idProduto`);

--
-- Limitadores para a tabela `itens_compra`
--
ALTER TABLE `itens_compra`
  ADD CONSTRAINT `itens_compra_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`idPedido`),
  ADD CONSTRAINT `itens_compra_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`idProduto`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`idPedido`),
  ADD CONSTRAINT `pagamento_ibfk_2` FOREIGN KEY (`id_cartao`) REFERENCES `cartao` (`idCartao`);

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
