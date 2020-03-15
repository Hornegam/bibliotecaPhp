-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Mar-2020 às 21:52
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

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

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestar`
--
ALTER TABLE `emprestar`
  ADD PRIMARY KEY (`codEmpr`),
  ADD KEY `prontuarioUser` (`prontuarioUser`),
  ADD KEY `codLivro` (`codLivro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestar`
--
ALTER TABLE `emprestar`
  MODIFY `codEmpr` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `emprestar`
--
ALTER TABLE `emprestar`
  ADD CONSTRAINT `emprestar_ibfk_1` FOREIGN KEY (`prontuarioUser`) REFERENCES `usuario` (`prontuario`),
  ADD CONSTRAINT `emprestar_ibfk_2` FOREIGN KEY (`codLivro`) REFERENCES `livro` (`codLivro`),
  ADD CONSTRAINT `emprestar_ibfk_3` FOREIGN KEY (`codEmpr`) REFERENCES `status` (`codEmprStatus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
