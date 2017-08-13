-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 06-Ago-2017 às 11:53
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Base de Dados: `esquema2`
--
CREATE DATABASE IF NOT EXISTS `esquema2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `esquema2`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingresso`
--

CREATE TABLE IF NOT EXISTS `ingresso` (
  `codigoIngresso` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(30) NOT NULL,
  `codigoEvent` int(11) NOT NULL,
  `dataCompra` date DEFAULT NULL,
  PRIMARY KEY (`codigoIngresso`),
  KEY `cpf` (`cpf`),
  KEY `codigoEvent` (`codigoEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


--
-- Estrutura da tabela `tipoevento`
--

CREATE TABLE IF NOT EXISTS `tipoevento` (
  `codigoTipoEvento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codigoTipoEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------


--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `codigoEvent` int(11) NOT NULL AUTO_INCREMENT,
  `Enome` varchar(30) NOT NULL,
  `Edescricao` varchar(30) DEFAULT NULL,
  `dataEvento` date NOT NULL,
  `codigoAmbiente` int(11) NOT NULL,
  `codigoTipoEvento` int(11) NOT NULL,
  PRIMARY KEY (`codigoEvent`),
  KEY `codigoTipoEvento` (`codigoTipoEvento`),
  KEY `codigoAmbiente` (`codigoAmbiente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


--
-- Estrutura da tabela `ambiente`
--

CREATE TABLE IF NOT EXISTS `ambiente` (
  `codigoAmbiente` int(11) NOT NULL AUTO_INCREMENT, 
  `ambiente` enum('coberto','descoberto','parcialmenteCoberto') NOT NULL,
  `capacidade` int(11) NOT NULL,
  `numeroAssentosCoberto` int(11) DEFAULT NULL,
  `numeroAssentosDescoberto` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigoAmbiente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; 

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `cpf` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `nomeAcompanhante` varchar(30) DEFAULT NULL,
  `datanascimento` date NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `adminusuarios`
--

CREATE TABLE IF NOT EXISTS `adminusuarios` (
  `cpf` varchar(20) NOT NULL,
  `Login` varchar(70) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `nome` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Extraindo dados da tabela `adminusuarios`
--

INSERT INTO `adminusuarios` (`cpf`, `Login`, `senha`, `email`, `nome`) VALUES
('1234567', 'erico', 'e10adc3949ba59abbe56e057f20f883e', 'erico@erico.com', 'erico andre'),
('123456789', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin', 'admin');

-- --------------------------------------------------------

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`codigoAmbiente`) REFERENCES `ambiente` (`codigoAmbiente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`codigoTipoEvento`) REFERENCES `tipoevento` (`codigoTipoEvento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ingresso`
--
ALTER TABLE `ingresso`
  ADD CONSTRAINT `ingresso_ibfk_2` FOREIGN KEY (`codigoEvent`) REFERENCES `evento` (`codigoEvent`)  ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingresso_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `pessoa` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;