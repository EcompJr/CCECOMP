-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Mar-2018 às 22:32
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
(6, 'Matheus Giovanni Pires', '165a6a37f518d2bd5d5736a9b78744c5', '9a47fca26e5cda761ef7f4f8aae11b0a'),
(7, 'ROOT', 'ef84d6e2cf7188fd993bb1fe2acf22c0', '9a47fca26e5cda761ef7f4f8aae11b0a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_tcc`
--

CREATE TABLE `aluno_tcc` (
  `ID` int(255) NOT NULL,
  `Aluno` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Nome_TCC` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Nome_Orientador` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Caminho_Arquivo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Palavras_Chaves` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_tcc`
--

INSERT INTO `aluno_tcc` (`ID`, `Aluno`, `Nome_TCC`, `Nome_Orientador`, `Caminho_Arquivo`, `Palavras_Chaves`) VALUES
(1, 'Anderson Cerqueira Guedes', 'SoluÃ§Ãµes Computacionais para Prover CodificaÃ§Ã£o', 'Ana ClÃ¡udia Fiorin Pianesso', '../data/SoluÃ§Ãµes Computacionais para Prover CodificaÃ§Ã£o.pdf', 'SoluÃ§Ãµes,ComputaÃ§Ã£o'),
(2, 'Bruno Gonzaga de Mattos Vogel', 'Ambiente de Teste de RobÃ³tico para ColÃ´nia de RobÃ´', 'Anfranserai Morais Dias', '../data/Ambiente de Teste de RobÃ³tico para ColÃ´nia de RobÃ´.pdf', 'RobÃ³tica,Teste,Ambiente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ccecomp_estagios`
--

CREATE TABLE `ccecomp_estagios` (
  `ID` int(255) NOT NULL,
  `Titulo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Date` date NOT NULL,
  `Imagem` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Link_Page` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ccecomp_files`
--

CREATE TABLE `ccecomp_files` (
  `ID` int(255) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ccecomp_files`
--

INSERT INTO `ccecomp_files` (`ID`, `Nome`, `Link`) VALUES
(12, 'HorÃ¡rio Final  - ECOMP 2018.1', '../data/Arquivo12.pdf'),
(13, 'Rover 5 Introduction', '../data/Arquivo13.pdf'),
(14, 'tuplaDNS', '../data/Arquivo14.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ccecomp_noticias`
--

CREATE TABLE `ccecomp_noticias` (
  `ID` int(255) NOT NULL,
  `Titulo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Date` date NOT NULL,
  `Imagem` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Link_Page` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ccecomp_noticias`
--

INSERT INTO `ccecomp_noticias` (`ID`, `Titulo`, `Date`, `Imagem`, `Link_Page`) VALUES
(3, 'Engenheiro de ComputaÃ§Ã£o', '2018-03-01', '', '../public_html/Engenheiro de ComputaÃ§Ã£o.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ccecomp_paginas_criadas`
--

CREATE TABLE `ccecomp_paginas_criadas` (
  `ID` int(30) NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `Tipo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Link` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ccecomp_resolucoes`
--

CREATE TABLE `ccecomp_resolucoes` (
  `ID` int(255) NOT NULL,
  `Tipo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Numero` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Ano` int(10) NOT NULL,
  `Descricao` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Arquivo` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ccecomp_resolucoes`
--

INSERT INTO `ccecomp_resolucoes` (`ID`, `Tipo`, `Numero`, `Ano`, `Descricao`, `Arquivo`) VALUES
(1, 'Consu', '123123', 2018, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce condimentum, metus id sollicitudin dictum, justo felis gravida erat, et gravida nisl leo a ex. Cras nec scelerisque lectus. Aenean tempus orci id nunc pellentesque, vel dapibus purus faucibus.', '../data/resolucoes123123.pdf'),
(2, 'Consu', '123', 2020, 'Curabitur malesuada egestas ipsum et posuere. Pellentesque elementum feugiat mauris eget scelerisque. Praesent enim risus, pretium et sagittis aliquam, convallis ut nisl. Vivamus urna felis, feugiat sed rhoncus eu, accumsan vitae nisl. Cras dictum venenat', '../data/resolucoes123.PDF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_resolucoes`
--

CREATE TABLE `tipos_resolucoes` (
  `ID` int(255) NOT NULL,
  `Nome` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos_resolucoes`
--

INSERT INTO `tipos_resolucoes` (`ID`, `Nome`) VALUES
(1, 'Consu');

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
-- Indexes for table `ccecomp_files`
--
ALTER TABLE `ccecomp_files`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ccecomp_noticias`
--
ALTER TABLE `ccecomp_noticias`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `ccecomp_paginas_criadas`
--
ALTER TABLE `ccecomp_paginas_criadas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ccecomp_resolucoes`
--
ALTER TABLE `ccecomp_resolucoes`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `tipos_resolucoes`
--
ALTER TABLE `tipos_resolucoes`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `aluno_tcc`
--
ALTER TABLE `aluno_tcc`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ccecomp_estagios`
--
ALTER TABLE `ccecomp_estagios`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ccecomp_files`
--
ALTER TABLE `ccecomp_files`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ccecomp_noticias`
--
ALTER TABLE `ccecomp_noticias`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ccecomp_paginas_criadas`
--
ALTER TABLE `ccecomp_paginas_criadas`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ccecomp_resolucoes`
--
ALTER TABLE `ccecomp_resolucoes`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipos_resolucoes`
--
ALTER TABLE `tipos_resolucoes`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
