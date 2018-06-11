-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 11/02/2012 às 00h45min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE IF NOT EXISTS `atividades` (
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `valorHora` int(22) NOT NULL,
  `atividadeID` int(22) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`atividadeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`titulo`, `descricao`, `valorHora`, `atividadeID`) VALUES
('Karate', 'Aulas de karate', 25, 1),
('Jiu-Jitsu', 'Luta de cháo com o objetivo de finalizar o adversário', 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `dianum` int(1) NOT NULL,
  `diastr` varchar(100) NOT NULL,
  `horarioInicio` int(22) NOT NULL,
  `horarioTermino` int(22) NOT NULL,
  `profID` int(22) NOT NULL,
  `atividadeID` int(22) NOT NULL,
  `horarioID` int(22) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`horarioID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`dianum`, `diastr`, `horarioInicio`, `horarioTermino`, `profID`, `atividadeID`, `horarioID`) VALUES
(2, 'Segunda-feira', 22, 23, 1, 1, 3),
(4, 'Quarta-feira', 10, 11, 2, 2, 4),
(1, 'Domingo', 22, 23, 2, 0, 5),
(4, 'Quarta-feira', 11, 12, 1, 0, 6),
(1, 'Domingo', 7, 8, 1, 0, 7),
(6, 'Sexta-feira', 22, 23, 2, 0, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `ano` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `noticia` text NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `noticiaID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`noticiaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`ano`, `mes`, `dia`, `titulo`, `noticia`, `categoria`, `noticiaID`) VALUES
(2012, 1, 1, 'Netg', 'Bem vindo ao sistema de notícias, escreva aqui sua notícia e escolha a categoria. Obrigado por escolher netg.', 'brasil', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `profID` int(25) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`profID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`nome`, `endereco`, `cidade`, `email`, `telefone`, `profID`) VALUES
('Francisco Matelli', 'Rua Francisco Valio, 1284', 'Itapetininga', 'francisco@f5sites.com', '015 3357-2824', 1),
('José Carlos Floriano', 'Rua Padre Brunetti, 511', 'Itapetininga', 'floriano@karate.com.br', '15 5547-8455', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
