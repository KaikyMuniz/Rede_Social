-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Dez-2023 às 22:17
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
-- Banco de dados: `pandim_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

DROP TABLE IF EXISTS `postagens`;
CREATE TABLE IF NOT EXISTS `postagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `autor` varchar(30) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `imagem_postagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id`, `autor`, `titulo`, `descricao`, `imagem_postagem`) VALUES
(7, 'Kaiky_10', 'Se prepare para o enem 2023', 'aaaaaaaaaaaaaaaaaaaaaaa num aguento mais', 'imagem postagem 3 (teste).jpg'),
(8, 'Helena', 'AAAAA ELE TÁ NO BRASILLL', 'FINALMENTEEEEEEEEEEEEEEE', 'imagem postagem 2 (teste).jpg'),
(6, 'Kaiky_10', 'Como seis tão povo?', 'Pleno domingão, e seis tão fazendo?', 'bom dia.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_de_usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `descricao` text NOT NULL,
  `imagem_perfil` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `seguidores` int NOT NULL,
  `seguindo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_de_usuario`, `data_de_nascimento`, `sexo`, `descricao`, `imagem_perfil`, `email`, `senha`, `seguidores`, `seguindo`) VALUES
(3, 'Helena', '2006-04-22', 'F', 'Oii, me chamo Helena e tenho 17 anos :-)', 'helena.jpg', 'Helena@gmail.com', '$2y$10$l4gttFSSrPBAa9Km.b2GlOmt5sf3Q1a6lbBdgujaJBZU2vOoVrm7a', 0, 0),
(2, 'Kaiky_10', '2006-03-03', 'M', 'Olá, me chamo Kaiky! Tenho 17 anos e estou por aqui agora no Pandim!', 'perfil.jpg', 'kaikymss@gmail.com', '$2y$10$JRP9/tIYzggV2voavNWr9Ow8GT3VezF76C/NDjyeSbbf6L9Xu67v.', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
