-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Nov-2023 às 02:11
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `corujao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `textoComentario` mediumtext NOT NULL,
  `dateComentario` datetime NOT NULL,
  `Usuário_idUsu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inputsoutputs`
--

CREATE TABLE `inputsoutputs` (
  `idInOut` int(10) UNSIGNED NOT NULL,
  `inputs` varchar(45) NOT NULL,
  `tipoInput` varchar(45) NOT NULL,
  `outputs` varchar(45) NOT NULL,
  `tipoOutpus` varchar(45) NOT NULL,
  `Pergunta_idPerg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `idPerg` int(11) NOT NULL,
  `textoPerg` mediumtext NOT NULL,
  `dificulPerg` varchar(15) NOT NULL,
  `linguagemPerg` varchar(20) NOT NULL,
  `repondidaPerg` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `idRespostas` int(11) NOT NULL,
  `textoResposta` longtext NOT NULL,
  `Pergunta_idPerg` int(11) NOT NULL,
  `Usuario_idUsu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

CREATE TABLE `times` (
  `idTime` int(11) NOT NULL,
  `NomeTime` varchar(45) NOT NULL,
  `LiderTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `NomeUsu` varchar(100) NOT NULL,
  `SenhaUsu` varchar(45) NOT NULL,
  `EmailUsu` varchar(150) NOT NULL,
  `Times_idTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_has_pergunta`
--

CREATE TABLE `usuario_has_pergunta` (
  `Usuário_idUsu` int(11) NOT NULL,
  `Pergunta_idPerg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD UNIQUE KEY `idComentario_UNIQUE` (`idComentario`),
  ADD KEY `fk_Comentario_Usuário1_idx` (`Usuário_idUsu`);

--
-- Índices para tabela `inputsoutputs`
--
ALTER TABLE `inputsoutputs`
  ADD PRIMARY KEY (`idInOut`),
  ADD KEY `fk_inputsOutputs_Pergunta1_idx` (`Pergunta_idPerg`);

--
-- Índices para tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`idPerg`);

--
-- Índices para tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`idRespostas`),
  ADD KEY `fk_Respostas_Pergunta1_idx` (`Pergunta_idPerg`),
  ADD KEY `fk_Respostas_Usuario1_idx` (`Usuario_idUsu`);

--
-- Índices para tabela `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`idTime`),
  ADD UNIQUE KEY `idTime_UNIQUE` (`idTime`),
  ADD UNIQUE KEY `NomeTime_UNIQUE` (`NomeTime`),
  ADD UNIQUE KEY `LiderTime_UNIQUE` (`LiderTime`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`),
  ADD UNIQUE KEY `idUsuário_UNIQUE` (`idUsu`),
  ADD UNIQUE KEY `NomeUsu_UNIQUE` (`NomeUsu`),
  ADD UNIQUE KEY `EmailUsu_UNIQUE` (`EmailUsu`),
  ADD KEY `fk_Usuário_Times1_idx` (`Times_idTime`);

--
-- Índices para tabela `usuario_has_pergunta`
--
ALTER TABLE `usuario_has_pergunta`
  ADD PRIMARY KEY (`Usuário_idUsu`,`Pergunta_idPerg`),
  ADD KEY `fk_Usuário_has_Pergunta_Pergunta1_idx` (`Pergunta_idPerg`),
  ADD KEY `fk_Usuário_has_Pergunta_Usuário1_idx` (`Usuário_idUsu`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `inputsoutputs`
--
ALTER TABLE `inputsoutputs`
  MODIFY `idInOut` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `idPerg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `idRespostas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `times`
--
ALTER TABLE `times`
  MODIFY `idTime` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_Comentario_Usuário1` FOREIGN KEY (`Usuário_idUsu`) REFERENCES `usuario` (`idUsu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inputsoutputs`
--
ALTER TABLE `inputsoutputs`
  ADD CONSTRAINT `fk_inputsOutputs_Pergunta1` FOREIGN KEY (`Pergunta_idPerg`) REFERENCES `pergunta` (`idPerg`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `fk_Respostas_Pergunta1` FOREIGN KEY (`Pergunta_idPerg`) REFERENCES `pergunta` (`idPerg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Respostas_Usuario1` FOREIGN KEY (`Usuario_idUsu`) REFERENCES `usuario` (`idUsu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuário_Times1` FOREIGN KEY (`Times_idTime`) REFERENCES `times` (`idTime`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario_has_pergunta`
--
ALTER TABLE `usuario_has_pergunta`
  ADD CONSTRAINT `fk_Usuário_has_Pergunta_Pergunta1` FOREIGN KEY (`Pergunta_idPerg`) REFERENCES `pergunta` (`idPerg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuário_has_Pergunta_Usuário1` FOREIGN KEY (`Usuário_idUsu`) REFERENCES `usuario` (`idUsu`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
