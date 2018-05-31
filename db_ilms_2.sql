-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Mar-2017 às 01:53
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ilms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aplicativo`
--

CREATE TABLE `aplicativo` (
  `id_aplicativo` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `observacoes` text,
  `id_turma` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(10) UNSIGNED NOT NULL,
  `nome` varchar(250) NOT NULL DEFAULT '',
  `tipo_curso` varchar(250) NOT NULL DEFAULT '',
  `duracao` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `departamento` varchar(250) NOT NULL DEFAULT '',
  `coordenador` varchar(250) NOT NULL DEFAULT '',
  `outras_caracteristicas` text,
  `observacoes` text,
  `id_polo` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_turma` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_disciplina` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricao`
--

CREATE TABLE `descricao` (
  `id_descricao` int(10) UNSIGNED NOT NULL,
  `natureza_problema` text,
  `relator` varchar(250) NOT NULL DEFAULT '',
  `descricao_problema` text,
  `problema_detalhado` text,
  `palavras_chaves` varchar(400) NOT NULL DEFAULT '',
  `id_infoc` int(10) UNSIGNED DEFAULT NULL,
  `id_polo` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(10) UNSIGNED NOT NULL,
  `nome` varchar(250) NOT NULL DEFAULT '',
  `departamento` varchar(250) NOT NULL DEFAULT '',
  `observacoes` text,
  `outras_caracteristicas` text,
  `id_curso` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_professor` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `info_caso`
--

CREATE TABLE `info_caso` (
  `id_infoc` int(10) UNSIGNED NOT NULL,
  `date_created` varchar(50) NOT NULL DEFAULT '',
  `tipo_caso` varchar(250) NOT NULL DEFAULT '',
  `quantidade_alunos` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `polo` varchar(250) NOT NULL DEFAULT '',
  `id_descricao` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_relator` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisas`
--

CREATE TABLE `pesquisas` (
  `id_pesquisa` int(11) NOT NULL,
  `id_solucao` int(10) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_polo` int(10) DEFAULT NULL,
  `relator` varchar(250) DEFAULT NULL,
  `natureza_problema` text,
  `descricao_problema` text,
  `problema_detalhado` text,
  `palavras_chaves` varchar(400) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `polo`
--

CREATE TABLE `polo` (
  `id_polo` int(10) UNSIGNED NOT NULL,
  `nome` varchar(250) NOT NULL DEFAULT '',
  `coordenador` varchar(250) NOT NULL DEFAULT '',
  `tipo_conexao` varchar(250) NOT NULL DEFAULT '',
  `infra_laboratorio` varchar(250) NOT NULL DEFAULT '',
  `infra_fisica` varchar(250) NOT NULL DEFAULT '',
  `infra_cidade` varchar(250) NOT NULL DEFAULT '',
  `acesso` varchar(250) NOT NULL DEFAULT '',
  `outras_caracteristicas` text,
  `id_descricao` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_turma` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_curso` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(10) UNSIGNED NOT NULL,
  `nome` varchar(250) NOT NULL DEFAULT '',
  `tipo_bolsa` varchar(250) NOT NULL DEFAULT '',
  `dapartamento` varchar(250) NOT NULL DEFAULT '',
  `outras_caracteristicas` text,
  `observacoes` text,
  `id_disciplina` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relator`
--

CREATE TABLE `relator` (
  `id_relator` int(10) UNSIGNED NOT NULL,
  `perfil` varchar(250) NOT NULL DEFAULT '',
  `id_infoc` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solucao`
--

CREATE TABLE `solucao` (
  `id_solucao` int(10) UNSIGNED NOT NULL,
  `solucao` text,
  `palavras_chaves` varchar(250) NOT NULL DEFAULT '',
  `acao_implementada` text,
  `solucao_implementada` text,
  `efetividade_acao_implementada` text,
  `custos` varchar(50) NOT NULL DEFAULT '',
  `impacto_pedagogico` text,
  `atores_envolvidos` varchar(250) NOT NULL DEFAULT '',
  `id_infoc` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(10) UNSIGNED NOT NULL,
  `sigla` varchar(50) NOT NULL DEFAULT '',
  `qtde_alunos` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `outras_caracteristicas` text,
  `observacoes` text,
  `aplicativo_movel` varchar(50) NOT NULL DEFAULT '',
  `id_polo` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_curso` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_tutor` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_aplicativo` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tutor`
--

CREATE TABLE `tutor` (
  `id_tutor` int(10) UNSIGNED NOT NULL,
  `nome` varchar(250) NOT NULL DEFAULT '',
  `tipo_tutoria` varchar(100) NOT NULL DEFAULT '',
  `tipo_bolsa` varchar(100) NOT NULL DEFAULT '',
  `outras_caracteristicas` text,
  `observacoes` text,
  `id_turma` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplicativo`
--
ALTER TABLE `aplicativo`
  ADD PRIMARY KEY (`id_aplicativo`),
  ADD KEY `fk_aplicativo_turma_idx` (`id_turma`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `fk_curso_turma_idx` (`id_turma`),
  ADD KEY `fk_curso_disciplina_idx` (`id_disciplina`),
  ADD KEY `fk_curso_polo_idx` (`id_polo`);

--
-- Indexes for table `descricao`
--
ALTER TABLE `descricao`
  ADD PRIMARY KEY (`id_descricao`),
  ADD KEY `fk_descricao_infocaso_idx` (`id_infoc`),
  ADD KEY `fk_descricao_polo_idx` (`id_polo`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `fk_disciplina_curso_idx` (`id_curso`),
  ADD KEY `fk_disciplina_professor_idx` (`id_professor`);

--
-- Indexes for table `info_caso`
--
ALTER TABLE `info_caso`
  ADD PRIMARY KEY (`id_infoc`),
  ADD KEY `fk_infoc_descricao_idx` (`id_descricao`),
  ADD KEY `fk_relator_idx` (`id_relator`);

--
-- Indexes for table `pesquisas`
--
ALTER TABLE `pesquisas`
  ADD PRIMARY KEY (`id_pesquisa`);

--
-- Indexes for table `polo`
--
ALTER TABLE `polo`
  ADD PRIMARY KEY (`id_polo`),
  ADD KEY `fk_polo_descricao_idx` (`id_descricao`),
  ADD KEY `fk_polo_turma_idx` (`id_turma`),
  ADD KEY `fk_polo_curso_idx` (`id_curso`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `fk_professor_disciplina_idx` (`id_disciplina`);

--
-- Indexes for table `relator`
--
ALTER TABLE `relator`
  ADD PRIMARY KEY (`id_relator`),
  ADD KEY `fk_relator_infoc_idx` (`id_infoc`);

--
-- Indexes for table `solucao`
--
ALTER TABLE `solucao`
  ADD PRIMARY KEY (`id_solucao`),
  ADD KEY `fk_solucao_infoc_idx` (`id_infoc`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `fk_turma_polo_idx` (`id_polo`),
  ADD KEY `fk_turma_curso_idx` (`id_curso`),
  ADD KEY `fk_turma_tutor_idx` (`id_tutor`),
  ADD KEY `fk_turma_aplicativo_idx` (`id_aplicativo`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`),
  ADD KEY `fk_tutor_turma_idx` (`id_turma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplicativo`
--
ALTER TABLE `aplicativo`
  MODIFY `id_aplicativo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `descricao`
--
ALTER TABLE `descricao`
  MODIFY `id_descricao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info_caso`
--
ALTER TABLE `info_caso`
  MODIFY `id_infoc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pesquisas`
--
ALTER TABLE `pesquisas`
  MODIFY `id_pesquisa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `polo`
--
ALTER TABLE `polo`
  MODIFY `id_polo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relator`
--
ALTER TABLE `relator`
  MODIFY `id_relator` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `solucao`
--
ALTER TABLE `solucao`
  MODIFY `id_solucao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id_tutor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aplicativo`
--
ALTER TABLE `aplicativo`
  ADD CONSTRAINT `fk_aplicativo_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_disciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_curso_polo` FOREIGN KEY (`id_polo`) REFERENCES `polo` (`id_polo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_curso_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `descricao`
--
ALTER TABLE `descricao`
  ADD CONSTRAINT `fk_descricao_infocaso` FOREIGN KEY (`id_infoc`) REFERENCES `info_caso` (`id_infoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_descricao_polo` FOREIGN KEY (`id_polo`) REFERENCES `polo` (`id_polo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_disciplina_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_disciplina_professor` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `info_caso`
--
ALTER TABLE `info_caso`
  ADD CONSTRAINT `fk_infoc_descricao` FOREIGN KEY (`id_descricao`) REFERENCES `descricao` (`id_descricao`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_relator` FOREIGN KEY (`id_relator`) REFERENCES `relator` (`id_relator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `polo`
--
ALTER TABLE `polo`
  ADD CONSTRAINT `fk_polo_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_polo_descricao` FOREIGN KEY (`id_descricao`) REFERENCES `descricao` (`id_descricao`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_polo_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_disciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `relator`
--
ALTER TABLE `relator`
  ADD CONSTRAINT `fk_relator_infoc` FOREIGN KEY (`id_infoc`) REFERENCES `info_caso` (`id_infoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `solucao`
--
ALTER TABLE `solucao`
  ADD CONSTRAINT `fk_solucao_infoc` FOREIGN KEY (`id_infoc`) REFERENCES `info_caso` (`id_infoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_turma_aplicativo` FOREIGN KEY (`id_aplicativo`) REFERENCES `aplicativo` (`id_aplicativo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_turma_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_turma_polo` FOREIGN KEY (`id_polo`) REFERENCES `polo` (`id_polo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_turma_tutor` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id_tutor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `fk_tutor_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
