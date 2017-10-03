-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Out-2017 às 20:24
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccecompbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `ID` int(20) NOT NULL,
  `Nome` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Login` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Senha` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`ID`, `Nome`, `Login`, `Senha`) VALUES
(1, 'Matheus Giovanni Pires', 'mgpires@gmail.com', 'ccecomp2017');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_tcc`
--

CREATE TABLE `aluno_tcc` (
  `ID` int(255) NOT NULL,
  `Aluno` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Nome_TCC` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Data_Publicacao` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Caminho_Arquivo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Caminho_Imagem` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ccecomp_estagios`
--

CREATE TABLE `ccecomp_estagios` (
  `ID` int(255) NOT NULL,
  `Titulo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Texto` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Imagem` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ccecomp_noticias`
--

CREATE TABLE `ccecomp_noticias` (
  `ID` int(255) NOT NULL,
  `Titulo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Texto` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Imagem` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Link_Page` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ccecomp_resolucoes`
--

CREATE TABLE `ccecomp_resolucoes` (
  `ID` int(255) NOT NULL,
  `Tipo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Numero` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Descricao` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Arquivo` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `aluno_tcc`
--
ALTER TABLE `aluno_tcc`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `ccecomp_estagios`
--
ALTER TABLE `ccecomp_estagios`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `ccecomp_noticias`
--
ALTER TABLE `ccecomp_noticias`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `ccecomp_resolucoes`
--
ALTER TABLE `ccecomp_resolucoes`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aluno_tcc`
--
ALTER TABLE `aluno_tcc`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ccecomp_estagios`
--
ALTER TABLE `ccecomp_estagios`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ccecomp_noticias`
--
ALTER TABLE `ccecomp_noticias`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ccecomp_resolucoes`
--
ALTER TABLE `ccecomp_resolucoes`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
