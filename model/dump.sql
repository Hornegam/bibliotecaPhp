-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Mar-2020 às 00:29
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendar`
--

CREATE TABLE `agendar` (
  `prontuarioUserAge` int(11) DEFAULT NULL,
  `codLivroAge` int(11) DEFAULT NULL,
  `publAge` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentar`
--

CREATE TABLE `comentar` (
  `prontuarioUser` int(11) DEFAULT NULL,
  `codLivroCom` int(11) DEFAULT NULL,
  `comentario` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `publCom` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestar`
--

CREATE TABLE `emprestar` (
  `prontuarioUser` int(11) NOT NULL,
  `codLivro` int(11) NOT NULL,
  `codEmpr` int(11) NOT NULL,
  `dataRet` date DEFAULT NULL,
  `dataDev` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `codLivro` int(11) NOT NULL,
  `titulo` varchar(1024) CHARACTER SET utf8 NOT NULL,
  `autor` varchar(100) CHARACTER SET utf8 NOT NULL,
  `publicacao` date NOT NULL,
  `genero` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `codEmprStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugerir`
--

CREATE TABLE `sugerir` (
  `prontuarioUser` int(11) DEFAULT NULL,
  `titulo` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `autor` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `publ` date DEFAULT NULL,
  `genero` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `prontuario` int(11) NOT NULL,
  `cpf` varchar(11) CHARACTER SET utf8 NOT NULL,
  `rg` varchar(9) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(1024) CHARACTER SET utf8 NOT NULL,
  `emissor` varchar(3) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`prontuario`, `cpf`, `rg`, `nome`, `senha`, `emissor`) VALUES
(6, '12345688912', '12345677', 'Beltrano', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'SP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendar`
--
ALTER TABLE `agendar`
  ADD KEY `prontuarioUserAge` (`prontuarioUserAge`),
  ADD KEY `codLivroAge` (`codLivroAge`);

--
-- Indexes for table `comentar`
--
ALTER TABLE `comentar`
  ADD KEY `prontuarioUser` (`prontuarioUser`),
  ADD KEY `codLivroCom` (`codLivroCom`);

--
-- Indexes for table `emprestar`
--
ALTER TABLE `emprestar`
  ADD PRIMARY KEY (`codEmpr`),
  ADD KEY `prontuarioUser` (`prontuarioUser`),
  ADD KEY `codLivro` (`codLivro`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`codLivro`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD KEY `codEmprStatus` (`codEmprStatus`);

--
-- Indexes for table `sugerir`
--
ALTER TABLE `sugerir`
  ADD KEY `prontuarioUser` (`prontuarioUser`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`prontuario`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emprestar`
--
ALTER TABLE `emprestar`
  MODIFY `codEmpr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `codLivro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `prontuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendar`
--
ALTER TABLE `agendar`
  ADD CONSTRAINT `agendar_ibfk_1` FOREIGN KEY (`prontuarioUserAge`) REFERENCES `usuario` (`prontuario`),
  ADD CONSTRAINT `agendar_ibfk_2` FOREIGN KEY (`codLivroAge`) REFERENCES `livro` (`codLivro`);

--
-- Limitadores para a tabela `comentar`
--
ALTER TABLE `comentar`
  ADD CONSTRAINT `comentar_ibfk_1` FOREIGN KEY (`prontuarioUser`) REFERENCES `usuario` (`prontuario`),
  ADD CONSTRAINT `comentar_ibfk_2` FOREIGN KEY (`codLivroCom`) REFERENCES `livro` (`codLivro`);

--
-- Limitadores para a tabela `emprestar`
--
ALTER TABLE `emprestar`
  ADD CONSTRAINT `emprestar_ibfk_1` FOREIGN KEY (`prontuarioUser`) REFERENCES `usuario` (`prontuario`),
  ADD CONSTRAINT `emprestar_ibfk_2` FOREIGN KEY (`codLivro`) REFERENCES `livro` (`codLivro`);

--
-- Limitadores para a tabela `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`codEmprStatus`) REFERENCES `emprestar` (`codEmpr`);

--
-- Limitadores para a tabela `sugerir`
--
ALTER TABLE `sugerir`
  ADD CONSTRAINT `sugerir_ibfk_1` FOREIGN KEY (`prontuarioUser`) REFERENCES `usuario` (`prontuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;