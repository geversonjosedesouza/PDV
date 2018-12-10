-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 03-Dez-2018 às 21:59
-- Versão do servidor: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myboutique`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `clie_pk_id` int(11) NOT NULL,
  `clie_nome` varchar(255) NOT NULL,
  `clie_cpf` varchar(255) NOT NULL,
  `clie_endereco` varchar(255) NOT NULL,
  `clie_telefone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`clie_pk_id`, `clie_nome`, `clie_cpf`, `clie_endereco`, `clie_telefone`) VALUES
(1, 'geverson', '606776238', 'rua paula lopes', '85996958892'),
(4, 'teste2', '2', 'rua 2', '2'),
(5, 'teste3', '3', 'rua 3', '3'),
(6, 'teste4', '4', 'rua 4', '4'),
(7, 'teste5', '5', 'rua 5', '5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `cont_pk_id` int(11) NOT NULL,
  `cont_nome` varchar(255) NOT NULL,
  `cont_email` varchar(255) NOT NULL,
  `cont_telefone` varchar(255) NOT NULL,
  `cont_descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`cont_pk_id`, `cont_nome`, `cont_email`, `cont_telefone`, `cont_descricao`) VALUES
(1, 'dasasdsad', 'asd@geasd', '111111111111111111111111111', 'dsa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `prod_pk_id` int(11) NOT NULL,
  `prod_nome` varchar(255) DEFAULT NULL,
  `prod_quantidade` int(255) DEFAULT NULL,
  `prod_imagem` varchar(255) DEFAULT NULL,
  `prod_valor` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`prod_pk_id`, `prod_nome`, `prod_quantidade`, `prod_imagem`, `prod_valor`) VALUES
(2, 'computador', 10, 'README.TXT', 21),
(3, 'teste', 20, 'asdasdasda', 555);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usua_pk_id` int(11) NOT NULL,
  `usua_nome` varchar(255) DEFAULT NULL,
  `usua_senha` varchar(255) DEFAULT NULL,
  `usua_status` varchar(9) DEFAULT NULL,
  `usua_tipo` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usua_pk_id`, `usua_nome`, `usua_senha`, `usua_status`, `usua_tipo`) VALUES
(1, 'root@root', 'admin', 'ATIVO', 'FUNCIONARIO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `vend_pk_id` int(11) NOT NULL,
  `vend_fk_cliente` int(11) NOT NULL,
  `vend_fk_produto` int(11) NOT NULL,
  `vend_quantidade` int(11) NOT NULL,
  `vend_valor` double NOT NULL,
  `vend_subtotal` double NOT NULL,
  `vend_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`clie_pk_id`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`cont_pk_id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`prod_pk_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usua_pk_id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`vend_pk_id`),
  ADD KEY `vend_fk_cliente` (`vend_fk_cliente`),
  ADD KEY `vend_fk_produto` (`vend_fk_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `clie_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `cont_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `prod_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usua_pk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `vend_pk_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `vend_fk_cliente` FOREIGN KEY (`vend_fk_cliente`) REFERENCES `cliente` (`clie_pk_id`),
  ADD CONSTRAINT `vend_fk_produto` FOREIGN KEY (`vend_fk_produto`) REFERENCES `produto` (`prod_pk_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
