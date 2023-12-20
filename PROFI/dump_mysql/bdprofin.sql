-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/12/2023 às 01:18
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
-- Banco de dados: `bdprofin`
--
CREATE DATABASE IF NOT EXISTS `bdprofin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdprofin`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtarefa`
--

CREATE TABLE IF NOT EXISTS `tbtarefa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarefa` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `fk_idusu` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idusu` (`fk_idusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adm` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbuser`
--

INSERT INTO `tbuser` (`id`, `username`, `sexo`, `password`, `adm`) VALUES
(1, 'Adm', 'Adm', '$2y$10$JOx2KVGFd7/OqxJ.N6.0OuGSJsJxDt79xys7EYvjDT4KEabf9h0Za', 1);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbtarefa`
--
ALTER TABLE `tbtarefa`
  ADD CONSTRAINT `tbtarefa_ibfk_1` FOREIGN KEY (`fk_idusu`) REFERENCES `tbuser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;