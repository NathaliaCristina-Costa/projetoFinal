-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Out-2021 às 19:38
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
(3, 'Nathalia', '123'),
(5, 'Fernanda', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentocliente`
--

CREATE TABLE `atendimentocliente` (
  `id_Atendimento` int(11) NOT NULL,
  `assunto` varchar(45) NOT NULL,
  `mensagem` varchar(300) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `dataMensagem` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atendimentocliente`
--

INSERT INTO `atendimentocliente` (`id_Atendimento`, `assunto`, `mensagem`, `idCliente`, `dataMensagem`) VALUES
(1, 'SS', 'SS', 44, '2021-10-07'),
(4, 'Cancelar Assinatura', 'aaaaaaaaaaaaa', 44, '2021-10-07'),
(5, 'ATENDENTE RUI,', 'vjvkjv', 44, '2021-10-07'),
(6, 'ATENDENTE RUI,', 'SEGsegsegsegsegsegsegseg', 44, '2021-10-07'),
(9, 'qwffd', 'sss', 44, '2021-10-08'),
(10, 'Cancelar Assinaturasq', 'fwqefwegtfqwrgqerg', 44, '2021-10-08'),
(11, 'Cancelar Assinatura', 'fdffd', 44, '2021-10-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentofreelancer`
--

CREATE TABLE `atendimentofreelancer` (
  `idAtenFreelancer` int(11) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `mensagem` varchar(300) NOT NULL,
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
(14, 'Assistência Técnicas', '2021-09-11 16:23:06'),
(56, 'ss', '2021-10-11 22:40:36'),
(57, 'qwqwwq', '2021-10-11 22:40:41');

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
(39, 'Julia', 'julia@gmail.com', '797134c3e42371bb4979a462eb2f042a', '(21) 97696-9784'),
(40, 'Juliana', 'ju@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '(21) 96969-6969'),
(42, 'Nathalia', 'nat@gmail.com', '123', '(21) 97696-9784'),
(43, 'Nath', 'eu@gmail.com', '123', '(21) 97696-9784'),
(44, 'Nathyy', 'ncacrj@gmail.com', '123', '(21) 97696-9784'),
(45, 'Nath', 'e@e.c', '1234', '(21) 97696-9784'),
(46, 'Juliana ', 'teste@cliente.com', '123', '(21) 975504510'),
(47, 'Alexandre Gomes do Amaral', 'alexandre@gmail.com', '123', '(21) 99349-666'),
(48, 'Dulcineia Gomes', 'dulce@gmail.com', '123', '(21) 99323-0815');

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
  `cpf` varchar(15) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `freelancer`
--

INSERT INTO `freelancer` (`id_Freelancer`, `nome`, `email`, `senha`, `telefone`, `cpf`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `idCategoria`) VALUES
(2, 'Nathalia', 'ncacrj@gmail.com', '123456', '976969784', '', '', '', '', '', '', 9),
(3, 'Cristina', 'cristina@gmail.com', '12345', '34651066', '', '', '', '', '', '', 11),
(25, 'EUnathLI', 'nat@gmail.com', '12345', '(34) 65105-151', '', '', '', '', 'Rio de Janeiro', 'RJ', 9),
(26, 'Nath', 'ncarj@gmail.com', '123', '(21) 97696-9784', '', '', '', '', '', '', 12),
(27, 'Nathalia', 'eu@gmail.com', '123', '(21) 97696-9784', '', '', '', '', '', '', 13),
(28, 'Nath', 'oi@gmail.com', '123', '(21) 97696-9784', '', '', '', '', '', '', 11),
(29, 'Nath', 'Admin@gmail', '1234', '(21) 97696-9784', '', '', '', '', '', '', 10),
(30, 'Nathalia Cristina Amaral Costa', 'nathalia@gmail.com', '123', '(21) 97696-9784', '151.394.127-56', '21810-006', 'Avenida de Santa Cruz', 'Padre Miguel', 'Rio de Janeiro', 'RJ', 13),
(31, 'Nath', 'costa@costa', '123', '(21) 97969-7848', '151.394.127-56', '21810-006', 'Avenida de Santa Cruz', 'Padre Miguel', 'Rio de Janeiro', 'RJ', 12),
(32, 'Freelancer1', 'nathalia@gmail.com', '1234', '(21) 99323-0815', '111.111.111-11', '21810-006', 'Avenida de Santa Cruz', 'Padre Miguel', 'Rio de Janeiro', 'RJ', 12),
(33, 'Thamires Machado', 'thamires.machado@hotmail.com', '123', '(21) 96969-6969', '123.456.789-10', '21870-080', 'Rua Istambul', 'Bangu', 'Rio de Janeiro', 'RJ', 10),
(34, 'Alexandre Gomes do Amaral', 'ale@gmail.com', '123', '(21) 99349-6797', '823.764.767-04', '25810-070', 'Rua do Contorno', 'Santa Teresinha', 'Três Rios', 'RJ', 14),
(35, 'Ronaldo Ferreira', 'ronaldo@gmail.com', '123', '(21) 97696-9784', '151.645.178-42', '21810-000', 'Rua Oliveira Ribeiro', 'Padre Miguel', 'Rio de Janeiro', 'RJ', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_Pagamento` int(11) NOT NULL,
  `formaPg` varchar(45) NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `dataPg` date NOT NULL,
  `idFreela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_Pedido` int(11) NOT NULL,
  `cepPedido` varchar(10) NOT NULL,
  `ruaPedido` varchar(50) NOT NULL,
  `bairroPedido` varchar(50) NOT NULL,
  `cidadePedido` varchar(15) NOT NULL,
  `estadoPedido` varchar(5) NOT NULL,
  `telefonePedido` varchar(15) NOT NULL,
  `mensagemPedido` varchar(300) NOT NULL,
  `statusPedido` varchar(15) NOT NULL,
  `idCat` int(45) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idFreelancer` int(11) DEFAULT NULL,
  `dataPedido` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_Pedido`, `cepPedido`, `ruaPedido`, `bairroPedido`, `cidadePedido`, `estadoPedido`, `telefonePedido`, `mensagemPedido`, `statusPedido`, `idCat`, `idCliente`, `idFreelancer`, `dataPedido`) VALUES
(28, '81480-330', 'Rua Matheus Luiz Dalagassa', 'Tatuquara', 'Curitiba', 'PR', '(41) 92135-4567', 'SITE COM DESIGN RESPONSIVEL EM LINGUAGEM PHP', 'Aceito', 13, 47, 27, '2021-10-19'),
(29, '20520-202', 'Rua José Higino', 'Tijuca', 'Rio de Janeiro', 'RJ', '(21) 99865-5872', 'CUIDADOR DE IDOSOS', '', 11, 46, NULL, '2021-10-19'),
(30, '21810-006', 'Avenida de Santa Cruz', 'Padre Miguel', 'Rio de Janeiro', 'RJ', '(21) 97696-9784', 'APLICATIVO MOBILE', 'Aceito', 13, 46, 35, '2021-10-19'),
(31, '21810-006', 'Avenida de Santa Cruz', 'Padre Miguel', 'Rio de Janeiro', 'RJ', '(21) 99323-0815', 'FAZER UM SITE', 'Aceito', 13, 48, 27, '2021-10-19'),
(33, '21810-000', 'Rua Oliveira Ribeiro', 'Padre Miguel', 'Rio de Janeiro', 'RJ', '(21) 97696-9784', 'SITE E-COMMERCE RESPONSIVO', '', 13, 48, NULL, '2021-10-20');

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
  ADD KEY `fk_ClienAtendimento` (`idCliente`);

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
  ADD KEY `fk_FreelaPagamento` (`idFreela`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_Pedido`),
  ADD KEY `fk_CatgPedido` (`idCat`),
  ADD KEY `fk_ClientePedido` (`idCliente`),
  ADD KEY `fk_FreelaPedido` (`idFreelancer`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `atendimentocliente`
--
ALTER TABLE `atendimentocliente`
  MODIFY `id_Atendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `atendimentofreelancer`
--
ALTER TABLE `atendimentofreelancer`
  MODIFY `idAtenFreelancer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `id_Freelancer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_Pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atendimentocliente`
--
ALTER TABLE `atendimentocliente`
  ADD CONSTRAINT `fk_ClienAtendimento` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id_Cliente`);

--
-- Limitadores para a tabela `freelancer`
--
ALTER TABLE `freelancer`
  ADD CONSTRAINT `fk_CatgFreelancer` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id_Categoria`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_FreelaPagamento` FOREIGN KEY (`idFreela`) REFERENCES `freelancer` (`id_Freelancer`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_CatgPedido` FOREIGN KEY (`idCat`) REFERENCES `categoria` (`id_Categoria`),
  ADD CONSTRAINT `fk_ClientePedido` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id_Cliente`),
  ADD CONSTRAINT `fk_FreelaPedido` FOREIGN KEY (`idFreelancer`) REFERENCES `freelancer` (`id_Freelancer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
