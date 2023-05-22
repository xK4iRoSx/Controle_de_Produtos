-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Maio-2023 às 13:06
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controle_de_produtos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessorios`
--

DROP TABLE IF EXISTS `acessorios`;
CREATE TABLE IF NOT EXISTS `acessorios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ordem` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cabo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fonte` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `acessorios`
--

INSERT INTO `acessorios` (`id`, `ordem`, `cabo`, `fonte`) VALUES
(10, '4162524162', 'on', 'on'),
(9, '4163529874', 'on', 'on'),
(7, '4162415263', 'on', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordemservico`
--

DROP TABLE IF EXISTS `ordemservico`;
CREATE TABLE IF NOT EXISTS `ordemservico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `setor` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ordem` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `hora` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `autentica` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ordemservico`
--

INSERT INTO `ordemservico` (`id`, `usuario`, `setor`, `status`, `ordem`, `data`, `hora`, `autentica`) VALUES
(34, 'Ianca', 'Recepção', 'Entrada', '4162524162', '13/05/2023', '10:45:16', 'Verificado'),
(33, 'Igor', 'Dev_motoboy', 'Produto Entregue', '4163529874', '13/05/2023', '08:35:46', 'Verificado'),
(32, 'Igor', 'Dev_motoboy', 'Entrada', '4163529874', '13/05/2023', '08:35:33', 'Verificado'),
(31, 'Bruna', 'Lab_mx', 'Saida', '4163529874', '13/05/2023', '08:35:09', 'Verificado'),
(30, 'Bruna', 'Lab_mx', 'Entrada', '4163529874', '13/05/2023', '08:34:54', 'Verificado'),
(29, 'Ianca', 'Recepção', 'Saida', '4163529874', '13/05/2023', '08:34:33', 'Verificado'),
(27, 'Igor', 'Dev_motoboy', 'Produto Entregue', '4162415263', '13/05/2023', '08:32:01', 'Verificado'),
(28, 'Ianca', 'Recepção', 'Entrada', '4163529874', '13/05/2023', '08:34:01', 'Verificado'),
(26, 'Igor', 'Dev_motoboy', 'Entrada', '4162415263', '13/05/2023', '08:31:40', 'Verificado'),
(25, 'Bruna', 'Lab_mx', 'Saida', '4162415263', '13/05/2023', '08:31:18', 'Verificado'),
(24, 'Bruna', 'Lab_mx', 'Entrada', '4162415263', '13/05/2023', '08:31:02', 'Verificado'),
(23, 'Ianca', 'Recepção', 'Saida', '4162415263', '13/05/2023', '08:30:35', 'Verificado'),
(22, 'Ianca', 'Recepção', 'Entrada', '4162415263', '13/05/2023', '08:29:53', 'Verificado'),
(35, 'Igor', 'Dev_motoboy', 'Produto Entregue', '4162524162', '15/05/2023', '10:04:38', 'Verificado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ordem` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `imagem` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `service`
--

INSERT INTO `service` (`id`, `ordem`, `imagem`) VALUES
(10, '4162524162', ''),
(9, '4163529874', ''),
(8, '4162415263', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `setor` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `setor`) VALUES
(4, 'Ianca', 'Ianca', '1234', 'Recepção'),
(3, 'Bruna', 'Bruna', '1234', 'Lab_mx'),
(5, 'Bruna', 'Bruna02', '1234', 'Lab_DTV'),
(6, 'Matheus', 'Matheus', '1234', 'Colect'),
(7, 'Igor', 'Igor', '1234', 'Dev_motoboy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
