-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2018 at 11:56 PM
-- Server version: 10.2.12-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id4956888_geverson`
--

-- --------------------------------------------------------

--
-- Table structure for table `contato`
--

CREATE TABLE `contato` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contato`
--

INSERT INTO `contato` (`codigo`, `nome`, `email`, `telefone`, `descricao`) VALUES
(4, 'das', 'das', 'dsa', 'sda'),
(5, 'GEVERSON JOSE DE SOUZA', 'geversonjosedesouza@gmail.com', '85987713985', 'teste'),
(6, 'asd', 'sda', 'dsa', 'dsa'),
(7, '1', 'root@root.com', '123', 'sad'),
(8, '123', 'root@root.com', '123', '12'),
(9, 'asd', 'root@root.com', '1', 'sa'),
(10, '1', 'a@a.com', '1', '1'),
(12, 'GEVERSON JOSE DE SOUZA', 'geversonjosedesouza@gmail.com', '111', '11'),
(13, 'TEste externo', 'teste@teste', '8888888', '888888888'),
(14, 'teste2', 'e@e', '1111111111', '11111111'),
(15, 'teste3', 't3@t2', '1111111', '1111111');

-- --------------------------------------------------------

--
-- Table structure for table `contatos`
--

CREATE TABLE `contatos` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contatos`
--

INSERT INTO `contatos` (`codigo`, `nome`, `email`, `telefone`, `descricao`) VALUES
(1, 'geverdon', 'geverdon@geverdon', 'geverdon geverdon geverdon', NULL),
(2, 'geverdon', 'geverdon@geverdon', 'geverdongeverdongeverdon', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`codigo`, `user`, `pass`, `status`) VALUES
(1, '1@1', '1', 'ATIVO'),
(2, 'teste2', 'teste2', 'ATIVO'),
(3, 'tesrw3', 'teste3', 'INATIVO'),
(5, 'teste4', 'teste4', 'INATIVO'),
(7, 'a@a', 'a', 'INATIVO'),
(12, 'root@root.com', 'admin', 'INATIVO'),
(13, 'root@r', 'admin', 'INATIVO'),
(15, 'asdsadsad@ads', 'asd', 'INATIVO'),
(16, '2@2', '1', 'INATIVO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
