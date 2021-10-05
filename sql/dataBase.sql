-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Out-2021 às 03:50
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetofinal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_Admin` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_Admin`, `nome`, `senha`) VALUES
(1, 'Admin', '1234'),
(3, 'Nathalia', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentocliente`
--

CREATE TABLE `atendimentocliente` (
  `id_Atendimento` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `assunto` varchar(45) NOT NULL,
  `mensagem` varchar(200) NOT NULL,
  `dataMensagem` date NOT NULL DEFAULT current_timestamp(),
  `id_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atendimentocliente`
--

INSERT INTO `atendimentocliente` (`id_Atendimento`, `nome`, `email`, `assunto`, `mensagem`, `dataMensagem`, `id_Cliente`) VALUES
(1, 'Jessica', '', 'Reclamação', 'Reclamar do Atendente', '2021-10-04', 32),
(3, 'EuCliente', 'cristina@gmail.com', 'TESTE', 'TESTESTESTESTESTES', '2021-10-04', 33),
(4, 'EuCliente', 'cristina@gmail.com', 'TESTE', 'TESTESTESTESTESTES', '2021-10-04', 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentofreelancer`
--

CREATE TABLE `atendimentofreelancer` (
  `idAtenFreelancer` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `assunto` varchar(45) NOT NULL,
  `mensagem` varchar(200) NOT NULL,
  `dataMensagem` date NOT NULL DEFAULT current_timestamp(),
  `idFreelancer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_Categoria` int(11) NOT NULL,
  `nomeCategoria` varchar(45) NOT NULL,
  `dataCadastro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_Categoria`, `nomeCategoria`, `dataCadastro`) VALUES
(9, 'Eventos', '2021-09-11 16:18:24'),
(10, 'Reparos & Reformas	', '2021-09-11 16:21:40'),
(11, 'Saúde', '2021-09-11 16:21:50'),
(12, 'Serviços Domésticos	', '2021-09-11 16:21:55'),
(13, 'Tecnologia & Design', '2021-09-11 16:22:03'),
(14, 'Assistência Técnicas', '2021-09-11 16:23:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_Cliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) NOT NULL,
  `emailCliente` varchar(45) NOT NULL,
  `senhaCliente` varchar(45) NOT NULL,
  `telefoneCliente` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_Cliente`, `nomeCliente`, `emailCliente`, `senhaCliente`, `telefoneCliente`) VALUES
(32, 'Jessica', 'jessica.amaralcosta@gmail.com', '123', '3246464'),
(33, 'EuCliente', 'cliente@gmail.com', '123465', '2196788787'),
(34, 'EuCliente2', 'cliente2@gmail.com', '', '2196788787'),
(35, 'EuCliente3', 'cliente3@gmail.com', '123', '219769787'),
(38, 'Nath', '123@gmail.com', '3979f7f001b2962787ccc75f394b7689', '21976969784'),
(39, 'Julia', 'julia@gmail.com', '797134c3e42371bb4979a462eb2f042a', '(21) 97696-9784'),
(40, 'Juliana', 'ju@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '(21) 96969-6969'),
(41, 'Nath', 'n@gmail.com', '123', '(21) 97696-9784'),
(42, 'Nathalia', 'nat@gmail.com', '123', '(21) 97696-9784'),
(43, 'Nath', 'eu@gmail.com', '123', '(21) 97696-9784'),
(44, 'Nath', 'ncacrj@gmail.com', '123', '(21) 97696-9784'),
(45, 'Nath', 'e@e.c', '1234', '(21) 97696-9784');

-- --------------------------------------------------------

--
-- Estrutura da tabela `freelancer`
--

CREATE TABLE `freelancer` (
  `id_Freelancer` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `freelancer`
--

INSERT INTO `freelancer` (`id_Freelancer`, `nome`, `email`, `senha`, `telefone`, `idCategoria`) VALUES
(2, 'Nathalia', 'ncacrj@gmail.com', '123456', '976969784', 9),
(3, 'Cristina', 'cristina@gmail.com', '12345', '34651066', 11),
(25, 'EUnathLI', 'nat@gmail.com', '12345', '(34) 65105-151', 9),
(26, 'Nath', 'ncarj@gmail.com', '123', '(21) 97696-9784', 12),
(27, 'Nathalia', 'eu@gmail.com', '123', '(21) 97696-9784', 13),
(28, 'Nath', 'oi@gmail.com', '123', '(21) 97696-9784', 11),
(29, 'Nath', 'Admin@gmail', '1234', '(21) 97696-9784', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_Pagamento` int(11) NOT NULL,
  `formaPg` varchar(45) NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `dataPg` date NOT NULL,
  `idFreelancer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_Pedido` int(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(15) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `mensagem` varchar(300) NOT NULL,
  `id_Categoria` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_Admin`);

--
-- Índices para tabela `atendimentocliente`
--
ALTER TABLE `atendimentocliente`
  ADD PRIMARY KEY (`id_Atendimento`),
  ADD KEY `fk_ClientAtendimento` (`id_Cliente`);

--
-- Índices para tabela `atendimentofreelancer`
--
ALTER TABLE `atendimentofreelancer`
  ADD PRIMARY KEY (`idAtenFreelancer`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_Categoria`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_Cliente`);

--
-- Índices para tabela `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`id_Freelancer`),
  ADD KEY `fk_CatgFreelancer` (`idCategoria`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_Pagamento`),
  ADD KEY `fk_FreelaPagamento` (`idFreelancer`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_Pedido`),
  ADD KEY `fk_CatgPedido` (`id_Categoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `atendimentocliente`
--
ALTER TABLE `atendimentocliente`
  MODIFY `id_Atendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `atendimentofreelancer`
--
ALTER TABLE `atendimentofreelancer`
  MODIFY `idAtenFreelancer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `id_Freelancer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_Pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atendimentocliente`
--
ALTER TABLE `atendimentocliente`
  ADD CONSTRAINT `fk_ClientAtendimento` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`id_Cliente`);

--
-- Limitadores para a tabela `freelancer`
--
ALTER TABLE `freelancer`
  ADD CONSTRAINT `fk_CatgFreelancer` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id_Categoria`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_FreelaPagamento` FOREIGN KEY (`idFreelancer`) REFERENCES `freelancer` (`id_Freelancer`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_CatgPedido` FOREIGN KEY (`id_Categoria`) REFERENCES `categoria` (`id_Categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;