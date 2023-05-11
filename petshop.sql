-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Maio-2023 às 14:11
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`idAgendamento`, `id_cliente`, `id_animal`, `id_horario`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 2, 3),
(4, 1, 4, 4),
(5, 1, 2, 5),
(6, 1, 4, 6),
(9, 4, 11, 12),
(10, 4, 12, 8),
(11, 3, 8, 14),
(12, 3, 8, 11),
(13, 5, 9, 7),
(14, 1, 3, 16);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro_cliente`
--

INSERT INTO `cadastro_cliente` (`idCadastro`, `id_cliente`, `data_cad`, `email`, `celular`, `senha`) VALUES
(1, 1, '2023-04-28 00:00:00', 'robJ@gmail.com', '11987654321', '202cb962ac59075b964b07152d234b70'),
(2, 2, '2023-05-05 13:58:37', 'silva_robson@gmail.com', '11987654321', '202cb962ac59075b964b07152d234b70'),
(3, 3, '2023-05-06 18:26:19', 'mare.araujo@gmail.com', '11987645321', '202cb962ac59075b964b07152d234b70'),
(4, 4, '2023-05-08 09:18:10', 'cmj@gmail.com', '11930284521', '202cb962ac59075b964b07152d234b70'),
(5, 5, '2023-05-08 09:20:18', 'ant@outlook.com', '11940283741', '202cb962ac59075b964b07152d234b70'),
(6, 6, '2023-05-08 14:47:32', 'jr@gmail.com', '11987654321', '202cb962ac59075b964b07152d234b70'),
(7, 7, '2023-05-08 15:40:44', 'jose-moreira89@fingrs.com.br', '91998661539', '202cb962ac59075b964b07152d234b70'),
(8, 8, '2023-05-08 15:41:32', 'catarina-assis92@tintasvalecores.com.br', '89996821839', '202cb962ac59075b964b07152d234b70'),
(9, 9, '2023-05-08 15:42:27', 'sebastiao-carvalho93@bcconsult.com.br', '86987497882', '202cb962ac59075b964b07152d234b70'),
(10, 10, '2023-05-08 15:43:36', 'catarinamarianefreitas@iclud.com', '86987497882', '202cb962ac59075b964b07152d234b70'),
(11, 11, '2023-05-08 15:44:18', 'otaviolorenzobernardes@realweb.com.br', '31981501745', '202cb962ac59075b964b07152d234b70'),
(12, 12, '2023-05-08 16:10:12', 'victor-figueiredo78@ogn.com.br', '98997834420', '202cb962ac59075b964b07152d234b70'),
(13, 13, '2023-05-08 16:11:04', 'bernardo.renato.goncalves@a-qualitybrasil.com.br', '98985826925', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_pet`
--

CREATE TABLE `cadastro_pet` (
  `idPet` int(10) NOT NULL,
  `id_cliente` int(10) DEFAULT NULL,
  `nome_pet` varchar(50) DEFAULT NULL,
  `raca` varchar(20) DEFAULT NULL,
  `sexo_pet` varchar(50) DEFAULT NULL,
  `cor_pet` varchar(20) DEFAULT NULL,
  `data_nasc_pet` date DEFAULT NULL,
  `peso_pet` float(4,2) DEFAULT NULL,
  `data_cad_pet` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro_pet`
--

INSERT INTO `cadastro_pet` (`idPet`, `id_cliente`, `nome_pet`, `raca`, `sexo_pet`, `cor_pet`, `data_nasc_pet`, `peso_pet`, `data_cad_pet`) VALUES
(1, 1, 'Trapalhão', 'Cachorro', 'Macho', 'Marrom', '2020-04-01', 10.00, '2023-04-28 16:11:52'),
(2, 1, 'Marquinhos', 'Cachorro', 'Fêmea', 'Marrom', '2020-04-01', 10.00, '2023-04-29 16:11:52'),
(3, 1, 'Bolha', 'Cachorro', 'Macho', 'Preto', '2021-04-01', 12.00, '2023-04-29 17:11:52'),
(4, 1, 'Bolinha', 'Cachorro', 'Fêmea', 'Preto', '2021-04-01', 12.00, '2023-04-29 17:11:52'),
(5, 1, 'Pimpão', 'Gato', 'Macho', 'Laranja', '2022-02-01', 4.00, '2023-05-06 19:34:36'),
(6, 2, 'Maia', 'Cachorro', 'Fêmea', 'Branco', '2023-03-07', 12.00, '2023-05-08 01:44:43'),
(7, 2, 'Jade', 'Gato', 'Macho', 'Marrom', '2023-05-08', 1.00, '2023-05-08 01:45:31'),
(8, 3, 'Pipoca', 'Gato', 'Fêmea', 'Branco', '2019-05-09', 4.00, '2023-05-08 09:14:12'),
(9, 5, 'Koiso', 'Pássaro', 'Macho', 'Preto', '2022-06-14', 5.00, '2023-05-08 09:21:55'),
(10, 5, 'Lopi', 'Cachorro', 'Macho', 'Marrom', '2019-02-28', 20.00, '2023-05-08 09:24:03'),
(11, 4, 'Mia', 'Gato', 'Fêmea', 'Laranja', '2022-01-12', 5.00, '2023-05-08 09:25:45'),
(12, 4, 'Auau', 'Pássaro', 'Fêmea', 'Verde', '2022-08-17', 4.00, '2023-05-08 09:26:48');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `id_endereco`, `nome`, `sobrenome`, `cpf`, `rg`, `data_nasc`) VALUES
(1, 1, 'Roberto', 'Justos', '51976765072', '178912864', '2023-04-26'),
(2, 2, 'Robson', 'Silva', '19615500089', '267181024', '2000-03-05'),
(3, 3, 'Marcos', 'Renato de Araújo', '50072096004', '345860111', '2023-05-03'),
(4, 4, 'Carla', 'Maria de Jesus', '29255250086', '256269610', '1996-11-06'),
(5, 5, 'Antonieta', 'Barros Batista', '69048713005', '136462169', '2001-06-06'),
(6, 6, 'Joana', 'Rodrigues', '55750058018', '259326951', '2023-05-01'),
(7, 7, 'José', 'Manuel Leonardo Moreira', '00575448245', '163478764', '2000-08-20'),
(8, 8, 'Catarina', 'Vanessa Assis', '15257584549', '116246054', '2010-09-20'),
(9, 9, 'Sebastião', 'Henrique Carvalho', '28732962592', '380915194', '1990-09-10'),
(10, 10, 'Catarina', 'Mariane Freitas', '86928252553', '298310429', '1990-09-10'),
(11, 11, 'Otávio', 'Lorenzo Bernardes', '16336530051', '195170271', '2012-09-20'),
(12, 12, 'Victor', 'Geraldo Raimundo Figueiredo', '53752861142', '412267846', '1998-09-20'),
(13, 13, 'Bernardo', 'Renato Manoel Gonçalves', '78060647610', '116064626', '1997-01-20');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `estado`, `municipio`, `bairro`, `logradouro`, `numero`, `cep`) VALUES
(1, 'SP', 'São Paulo', 'Jardim Dom Bosco', 'Rua Bento Branco de Andrade Filho', 124, '04757000'),
(2, 'SP', 'São Paulo', 'Jardim Dom Bosco', 'Rua Bento Branco de Andrade Filho', 123, '04757000'),
(3, 'SP', 'Diadema', 'Canhema', 'Rua Guatemala', 52, '09941140'),
(4, 'SP', 'São Paulo', 'Parque Lagoa Rica', 'Estrada da Lagoa Rica', 13, '04893140'),
(5, 'SP', 'São Paulo', 'Jardim das Fontes', 'Rua Mabel Normando', 23, '04894450'),
(6, 'SP', 'São Paulo', 'Jardim dos Álamos', 'Rua José Vila Busquets', 123, '04883090'),
(7, 'PA', 'Belém', 'São Clemente', 'Passagem São Jorge', 123, '66643165'),
(8, 'PI', 'Picos', 'Catavento', 'Rua Nair Barros Dantas', 45, '64607225'),
(9, 'PI', 'Teresina', 'Mocambinho', 'Rua Cantor Hélio da Graça', 42, '64010813'),
(10, 'AM', 'Manaus', 'Petrópolis', 'Beco Senador Fábio Lucena', 41, '69067234'),
(11, 'MG', 'Betim', 'Nova Baden', 'Rua Javaneza', 423, '32676162'),
(12, 'MA', 'Imperatriz', 'Bacuri', 'Rua Beta', 4542, '65916100'),
(13, 'MA', 'São Luís', 'Calhau', 'Rua Quarenta', 674, '65071570');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `idEstoque` int(10) NOT NULL,
  `id_produto` int(10) DEFAULT NULL,
  `unidades` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`idFuncionario`, `cpf_funcionario`, `nome_funcionario`, `senha_funcionario`, `cargo`) VALUES
(2, '45215720061', 'Adalberto Pereira', '202cb962ac59075b964b07152d234b70', 'Tosador'),
(3, '27481500070', 'Mika Muramasa', '202cb962ac59075b964b07152d234b70', 'Veterinário'),
(5, '57132702033', 'Camilo Malandro', '202cb962ac59075b964b07152d234b70', 'Administrador'),
(6, '77484551040', 'Amando Batista', '202cb962ac59075b964b07152d234b70', 'Secretária'),
(7, '66959460000', 'Karla Jucelina', '202cb962ac59075b964b07152d234b70', 'Veterinário'),
(8, '61753182000', 'Carlos Marinho', '202cb962ac59075b964b07152d234b70', 'Tosador');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `horarios_disponiveis`
--

INSERT INTO `horarios_disponiveis` (`idHorario`, `id_funcionario`, `data`, `horario`, `reservado`, `servico`) VALUES
(1, 2, '2023-05-19', '16:39:17', 1, 'Tosa'),
(2, 2, '2023-05-01', '16:39:17', 1, 'Tosa'),
(3, 2, '2023-05-05', '19:39:17', 1, 'Tosa'),
(4, 2, '2023-05-31', '16:39:17', 1, 'Tosa'),
(5, 2, '2023-05-06', '19:39:17', 1, 'Tosa'),
(6, 2, '2023-05-06', '13:39:17', 1, 'Tosa'),
(7, 3, '2023-05-19', '00:00:00', 1, 'Cirurgia'),
(8, 3, '2023-05-20', '09:10:00', 1, 'Consulta'),
(9, 7, '2023-05-17', '12:55:00', 0, 'Especialidade'),
(10, 7, '2023-05-18', '10:30:00', 0, 'Cirurgia'),
(11, 7, '2023-05-30', '18:00:00', 1, 'Consulta'),
(12, 2, '2023-05-20', '10:05:00', 1, 'Banho'),
(13, 2, '2023-05-15', '08:25:00', 0, 'Tosa'),
(14, 2, '2023-05-31', '00:10:00', 1, 'Hotel'),
(15, 2, '2023-05-30', '18:00:00', 0, 'Banho'),
(16, 2, '2023-05-11', '18:00:00', 1, 'Hotel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_cliente`
--

CREATE TABLE `imagem_cliente` (
  `idImgCli` int(10) NOT NULL,
  `id_cadastro` int(10) DEFAULT NULL,
  `dir_img_cliente` varchar(250) DEFAULT NULL,
  `criado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imagem_cliente`
--

INSERT INTO `imagem_cliente` (`idImgCli`, `id_cadastro`, `dir_img_cliente`, `criado`) VALUES
(1, 3, 'images/imgCliente/6456c5fb20c78.png', '2023-05-06 18:26:19'),
(2, 4, 'images/imgCliente/6458e8826f4c4.png', '2023-05-08 09:18:10'),
(3, 5, 'images/imgCliente/6458e9027a3a2.jpg', '2023-05-08 09:20:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_func`
--

CREATE TABLE `imagem_func` (
  `idImgFunc` int(10) NOT NULL,
  `id_funcionario` int(10) DEFAULT NULL,
  `dir_img_funcionario` varchar(250) DEFAULT NULL,
  `criado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_pet`
--

CREATE TABLE `imagem_pet` (
  `idImgPet` int(10) NOT NULL,
  `id_pet` int(10) DEFAULT NULL,
  `dir_img_pet` varchar(250) DEFAULT NULL,
  `criado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imagem_pet`
--

INSERT INTO `imagem_pet` (`idImgPet`, `id_pet`, `dir_img_pet`, `criado`) VALUES
(1, 5, 'images/imgPet/6456d5fc0cd3f.jpg', '2023-05-06 19:34:36'),
(2, 6, 'images/imgPet/64587e3b5b038.jpg', '2023-05-08 01:44:43'),
(3, 7, 'images/imgPet/64587e6bf1045.jpg', '2023-05-08 01:45:31'),
(4, 8, 'images/imgPet/6458e794dcf8c.jpg', '2023-05-08 09:14:12'),
(5, 9, 'images/imgPet/6458e96321a64.jpg', '2023-05-08 09:21:55'),
(6, 10, 'images/imgPet/6458e9e3a2cf4.jpg', '2023-05-08 09:24:03'),
(7, 11, 'images/imgPet/6458ea4905426.jpg', '2023-05-08 09:25:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_produto`
--

CREATE TABLE `imagem_produto` (
  `idImgProd` int(10) NOT NULL,
  `id_produto` int(10) DEFAULT NULL,
  `dir_img_produto` varchar(250) DEFAULT NULL,
  `criado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_compra`
--

CREATE TABLE `itens_compra` (
  `idItem` int(10) NOT NULL,
  `id_pedido` int(10) DEFAULT NULL,
  `id_produto` int(10) DEFAULT NULL,
  `quantidade` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `idAgendamento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  MODIFY `idCadastro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `cadastro_pet`
--
ALTER TABLE `cadastro_pet`
  MODIFY `idPet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cartao`
--
ALTER TABLE `cartao`
  MODIFY `idCartao` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `idEstoque` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idFuncionario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `horarios_disponiveis`
--
ALTER TABLE `horarios_disponiveis`
  MODIFY `idHorario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `imagem_cliente`
--
ALTER TABLE `imagem_cliente`
  MODIFY `idImgCli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `imagem_func`
--
ALTER TABLE `imagem_func`
  MODIFY `idImgFunc` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem_pet`
--
ALTER TABLE `imagem_pet`
  MODIFY `idImgPet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
