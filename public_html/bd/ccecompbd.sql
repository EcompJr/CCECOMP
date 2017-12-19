-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 05:36 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `ID` int(20) NOT NULL,
  `Nome` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Login` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Senha` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`ID`, `Nome`, `Login`, `Senha`) VALUES
(6, 'Matheus Giovanni Pires', '2dec3ddc4daabeea8c2880db3f8840a0', '276573ca1783cd6720d7b43c26fae47e'),
(7, 'ROOT', 'a35942f9f047daf8f85622051e3ec0f4', '276573ca1783cd6720d7b43c26fae47e');

-- --------------------------------------------------------

--
-- Table structure for table `aluno_tcc`
--

CREATE TABLE `aluno_tcc` (
  `ID` int(255) NOT NULL,
  `Aluno` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Nome_TCC` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Nome_Orientador` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Caminho_Arquivo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Caminho_Imagem` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Palavras_Chaves` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ccecomp_estagios`
--

CREATE TABLE `ccecomp_estagios` (
  `ID` int(255) NOT NULL,
  `Titulo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Imagem` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Link_Page` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ccecomp_noticias`
--

CREATE TABLE `ccecomp_noticias` (
  `ID` int(255) NOT NULL,
  `Titulo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Imagem` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Link_Page` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ccecomp_paginas_criadas`
--

CREATE TABLE `ccecomp_paginas_criadas` (
  `ID` int(30) NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `Tipo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Link` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ccecomp_resolucoes`
--

CREATE TABLE `ccecomp_resolucoes` (
  `ID` int(255) NOT NULL,
  `Tipo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Numero` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Descricao` varchar(500) CHARACTER SET utf8 NOT NULL,
  `Arquivo` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipos_resolucoes`
--

CREATE TABLE `tipos_resolucoes` (
  `ID` int(255) NOT NULL,
  `Nome` varchar(1000) NOT NULL
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
-- AUTO_INCREMENT for table `ccecomp_paginas_criadas`
--
ALTER TABLE `ccecomp_paginas_criadas`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ccecomp_resolucoes`
--
ALTER TABLE `ccecomp_resolucoes`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipos_resolucoes`
--
ALTER TABLE `tipos_resolucoes`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
