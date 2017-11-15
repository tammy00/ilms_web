-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Nov-2017 às 16:35
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

--
-- Extraindo dados da tabela `descricao`
--

INSERT INTO `descricao` (`id_descricao`, `natureza_problema`, `relator`, `descricao_problema`, `problema_detalhado`, `palavras_chaves`, `id_infoc`, `id_polo`) VALUES
(1, 'Infraestrutura', 'Coordenador do polo', 'A disciplina Fruticultura estava sendo ministrada para três polos: Manaquiri, Santa Izabel e Tefé, no período de 14/10/2014 a 23/11/2014.\nO polo de Santa Izabel atendeu 14 alunos do curso de Licenciatura em Ciência Agrárias neste período letivo.\nEm 15/10/2014, a cidade de Santa Izabel, por causa de uma forte chuva ficou sem energia durante 10 horas. O apagão danificou o equipamento (switch) e a antena de recepção do sinal de internet via satélite. A sede do polo ficou sem internet durante 7 dias até que o equipamento fosse substituído.', 'A ausência de conexão com a internet durante 7 dias prejudicaria diretamente os alunos da disciplina, pois comprometeria o andamento e as avaliações da Unidade I da disciplina.\nAs atividades de avaliação desta unidade tinham como prazo final dia 20/10/2014.', 'Problema internet.', NULL, 1),
(2, 'Infraestrutura', 'Coordenador do polo', 'A dependência da disciplina Fundamentos de Anatomia estava sendo ministrada para dois polos: Santa Izabel do Rio Negro e Boa Vista/RR, no período de 09/03/2014 a 26/03/2014.\nO polo de Boa Vista atendeu 89 alunos do curso de Licenciatura em Educação Física no período letivo e regular de 2013/2, sendo que 53 alunos ficaram de Dependência.\nNo início do mês de março de 2014, a sede do polo de Boa Vista sofreu com certa lentidão na velocidade internet, o que gerou reclamações por parte dos alunos, que se queixavam de dificuldades para fazer o download dos vídeos postados na sala de aula virtual.', 'A baixa velocidade de internet impedia que os alunos da Dependência conseguissem fazer o download dos vídeos postados como conteúdo das disciplinas.  Os vídeos eram essenciais para a aprendizagem do conteúdo.', 'Problema internet, download vídeos', NULL, 2),
(3, 'Pedagógica', 'Coordenador do curso', 'A disciplina Informática Aplicada foi ministrada para três polos, no estado do Acre: Acrelândia (60 alunos), Brasiléia (53), Tarauacá (60), no período de 28/10/2013 a 06/12/2013.\nOs polos atenderam um total de 173 alunos do curso de Bacharelado em Administração Pública, no período letivo e regular de 2013/2.\nAntes do início do disciplina, o coordenador de curso, juntamente com os coordenadores dos polos, identificaram que esta disciplina tinha um grande taxa de reprovação e abandono, pois os estudantes tinha dificuldade em trabalhar com o ambiente virtual de aprendizagem (Moodle) e com computadores em geral. ', 'Dificuldades em utilizar computadores, internet e o AVA Moodle impediam que a maioria dos alunos tivessem um bom rendimento na disciplina Informática Aplicada.', 'Dificuldades com Moodle, deficiência em Informática Básica', NULL, 3),
(4, 'Pedagógica', 'Coordenador do curso', 'O curso de Licenciatura em Ciência Agrárias oferecia disciplina para os polos de Manaquiri (70 alunos), Santa Izabel do Rio Negro (61), Tefé (59), pelo UAB II, como 2ª turma do curso. Na primeira oferta do curso (UAB I) os tutores e professores detectaram que os alunos tinham muitas dificuldades em produzir textos e não possuíam noções básicas de matemática. Esta deficiência acabou dificultando o aprendizado e, consequentemente, levando a um maior número de reprovações e abandono do curso.\nAntes do início da 2ª oferta do curso (UAB II), o coordenador decidiu que medidas preventivas deveriam ser tomadas a fim de se evitar o mesmo problema de aprendizado.', 'Grande dificuldades dos alunos em interpretação e produção de texto, e ausência de noções de matemática elementar, por parte dos alunos, comprometia o desempenho acadêmico dos mesmos.', 'Deficiência em Português, deficiência em Matemática básica', NULL, 6),
(5, 'Infraestrutura', 'Coordenador do polo', 'As disciplinas Contabilidade Geral, Macroeconomia e Ciência Política estava sendo ministrada para três polos: Tarauacá, Brasileia e Acrelândia (AC), no período de 28/04/2014 a 06/06/2014.\nO polo de Brasileia atendeu 14 alunos do curso Licenciatura em Administração Pública neste período letivo.\nEm 28/04/2014, a cidade de Brasileia, sofreu um inundação, devido ao transbordamento do rio. O polo ficou com cerca de 1m de água. Equipamentos e móveis foram destruídos.', 'A inundação ocorrida na cidade de Brasileia comprometeu as atividades no polo. ', 'Inundação', NULL, 4),
(6, 'Pedagógica', 'Coordenador do curso', 'Os cursos de Licenciatura em Ciências Agrárias, Licenciatura em Artes Visuais, Bacharelado em Administração é oferecido nos seguintes polos: Maués, Lábrea, Manacapuru e Coari, no primeiro semestre de 2009.\nProblemas na licitação da escolha da gráfica, que imprimiria os cadernos das disciplinas dos módulos de 2009/01, impediram a impressão e o envio dos mesmos aos polos.\nOs cursos tiveram que ser suspensos por 4 meses até que o impasse tivesse uma solução.', 'Atraso na impressão dos cadernos das disciplinas do módulo.', 'Impressão de cadernos', NULL, 8),
(7, 'Infraestrutura', 'Coordenador de polo', 'Em 20/02/2010, o gerador de energia sofreu uma avaria, o que acarretou uma falta de energia elétrica em todo a cidade de Lábrea. \nO acesso à internet foi interrompido e as atividades dos cursos do Bacharelado em Administração Pública e Licenciatura em Ciências Agrárias tiveram que ser suspensas por 5 dias.', 'Polo sem energia elétrica e sem internet por 5 dias.', 'Falta de energia elétrica, problema internet', NULL, 9),
(8, 'Infraestrutura', 'Coordenador de curso', 'O curso de Licenciatura em Educação Física era oferecido para os 17 polos atendidos pelo CED. Como era a primeira oferta do curso, a equipe ainda não tinha experiência e nem conhecimento das peculiaridades dos polos. Atrasos no envido de material didático e de logística da equipe de apoio (tutores e coordenadores) acabaram por prejudicar o andamento das atividades das primeiras disciplinas do primeiro módulo.', 'Dificuldades de logística e inexperiência da equipe de apoio acabaram por prejudicar o andamento das atividades das primeiras disciplinas do primeiro módulo.', 'Problemas de logística, inexperiência da equipe', NULL, 6),
(9, 'Pedagógica', 'Coordenador de curso', 'O cursos oferecidos pela Universidade Aberta do Brasil (UAB) passaram por um recadastramento no Sistema da UAB (SISUAB), para maior controle por parte do MEC em relação à quantidade de alunos por polo e por cursos.\nA coordenação do curso não atualizou os dados corretamente e algumas bolsas foram cortadas, ocasionando desligamento de alguns tutores.', 'Quantidade de bolsa para tutores e professores foi reduzida devido a informações erradas no sistema SISUAB.', 'Corte de bolsa', NULL, 22),
(10, 'Acadêmica', 'Coordenador do polo', 'A dependência da disciplina Fundamentos de Anatomia estava sendo ministrada para dois polos: Santa Izabel do Rio Negro e Boa Vista/RR, no período de 09/03/2014 a 26/03/2014.\nO polo de Boa Vista atendeu 89 alunos do curso de Licenciatura em Educação Física no período letivo e regular de 2013/2, sendo que 53 alunos ficaram de Dependência.\nNo início do mês de março de 2014, a sede do polo de Boa Vista sofreu com certa lentidão na velocidade internet, o que gerou reclamações por parte dos alunos, que se queixavam de dificuldades para fazer o download dos vídeos postados na sala de aula virtual.', 'A baixa velocidade de internet impedia que os alunos da Dependência conseguissem fazer o download dos vídeos postados como conteúdo das disciplinas.  Os vídeos eram essenciais para a aprendizagem do conteúdo.', 'Problema internet, download vídeos', NULL, 2);

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

--
-- Extraindo dados da tabela `info_caso`
--

INSERT INTO `info_caso` (`id_infoc`, `date_created`, `tipo_caso`, `quantidade_alunos`, `polo`, `id_descricao`, `id_relator`) VALUES
(2, '2017-05-22', 'Tipo Caso', 40, 'Boa Vista', 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisas`
--

CREATE TABLE `pesquisas` (
  `id_pesquisa` int(11) NOT NULL,
  `id_solucao` int(10) DEFAULT NULL,
  `id_titulo_problema` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_polo` int(10) DEFAULT NULL,
  `relator` varchar(250) DEFAULT NULL,
  `natureza_problema` text,
  `descricao_problema` text,
  `problema_detalhado` text,
  `palavras_chaves` varchar(400) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `similaridade` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pesquisas`
--

INSERT INTO `pesquisas` (`id_pesquisa`, `id_solucao`, `id_titulo_problema`, `id_usuario`, `id_polo`, `relator`, `natureza_problema`, `descricao_problema`, `problema_detalhado`, `palavras_chaves`, `status`, `similaridade`) VALUES
(1, 10, 0, 1, 2, 'Coordenador do polo', 'Acadêmica', 'A dependência da disciplina Fundamentos de Anatomia estava sendo ministrada para dois polos: Santa Izabel do Rio Negro e Boa Vista/RR, no período de 09/03/2014 a 26/03/2014. O polo de Boa Vista atendeu 89 alunos do curso de Licenciatura em Educação Física no período letivo e regular de 2013/2, sendo que 53 alunos ficaram de Dependência. No início do mês de março de 2014, a sede do polo de Boa Vista sofreu com certa lentidão na velocidade internet, o que gerou reclamações por parte dos alunos, que se queixavam de dificuldades para fazer o download dos vídeos postados na sala de aula virtual.', 'A baixa velocidade de internet impedia que os alunos da Dependência conseguissem fazer o download dos vídeos postados como conteúdo das disciplinas.Os vídeos eram essenciais para a aprendizagem do conteúdo.', 'Problema internet, download vídeos', 0, 0.889752),
(2, 9, 0, 1, 22, 'Coordenador do curso', 'Pedagógica', 'O cursos oferecidos pela Universidade Aberta do Brasil (UAB) passaram por um recadastramento no Sistema da UAB (SISUAB), para maior controle por parte do MEC em relação à quantidade de alunos por polo e por cursos. A coordenação do curso não atualizou os dados corretamente e algumas bolsas foram cortadas, ocasionando desligamento de alguns tutores.', 'Quantidade de bolsa para tutores e professores foi reduzida devido a informações erradas no sistema SISUAB.', 'Corte de bolsa', 0, 0.916264),
(3, 8, 0, 1, 6, 'Coordenador do curso', 'Infraestrutura', 'O curso de Licenciatura em Educação Física era oferecido para os 17 polos atendidos pelo CED. Como era a primeira oferta do curso, a equipe ainda não tinha experiência e nem conhecimento das peculiaridades dos polos. Atrasos no envido de material didático e de logística da equipe de apoio (tutores e coordenadores) acabaram por prejudicar o andamento das atividades das primeiras disciplinas do primeiro módulo.', 'Dificuldades de logística e inexperiência da equipe de apoio acabaram por prejudicar o andamento das atividades das primeiras disciplinas do primeiro módulo.', 'Problemas de logística, inexperiência da equipe', 0, 0.946154),
(4, 7, 0, 1, 9, 'Coordenador do polo', 'Infraestrutura', 'Em 20/02/2010, o gerador de energia sofreu uma avaria, o que acarretou uma falta de energia elétrica em todo a cidade de Lábrea. \r\nO acesso à internet foi interrompido e as atividades dos cursos do Bacharelado em Administração Pública e Licenciatura em Ciências Agrárias tiveram que ser suspensas por 5 dias.', 'Polo sem energia elétrica e sem internet por 5 dias.', 'Falta de energia elétrica, problema internet', 0, 0.918949),
(5, 6, 0, 1, 8, 'Coordenador do curso', 'Pedagógica', 'Os cursos de Licenciatura em Ciências Agrárias, Licenciatura em Artes Visuais, Bacharelado em Administração é oferecido nos seguintes polos: Maués, Lábrea, Manacapuru e Coari, no primeiro semestre de 2009.\r\nProblemas na licitação da escolha da gráfica, que imprimiria os cadernos das disciplinas dos módulos de 2009/01, impediram a impressão e o envio dos mesmos aos polos.\r\nOs cursos tiveram que ser suspensos por 4 meses até que o impasse tivesse uma solução.', 'Atraso na impressão dos cadernos das disciplinas do módulo.', 'Impressão de cadernos', 0, 0.957283),
(6, 5, 0, 1, 4, 'Coordenador do polo', 'Infraestrutura', 'As disciplinas Contabilidade Geral, Macroeconomia e Ciência Política estava sendo ministrada para três polos: Tarauacá, Brasileia e Acrelândia (AC), no período de 28/04/2014 a 06/06/2014.\nO polo de Brasileia atendeu 14 alunos do curso Licenciatura em Administração Pública neste período letivo.\nEm 28/04/2014, a cidade de Brasileia, sofreu um inundação, devido ao transbordamento do rio. O polo ficou com cerca de 1m de água. Equipamentos e móveis foram destruídos.', 'A inundação ocorrida na cidade de Brasileia comprometeu as atividades no polo. ', 'Inundação', 0, 0.953879),
(7, 4, 0, 1, 6, 'Coordenador do curso', 'Pedagógica', 'O curso de Licenciatura em Ciência Agrárias oferecia disciplina para os polos de Manaquiri (70 alunos), Santa Izabel do Rio Negro (61), Tefé (59), pelo UAB II, como 2ª turma do curso. Na primeira oferta do curso (UAB I) os tutores e professores detectaram que os alunos tinham muitas dificuldades em produzir textos e não possuíam noções básicas de matemática. Esta deficiência acabou dificultando o aprendizado e, consequentemente, levando a um maior número de reprovações e abandono do curso.\r\nAntes do início da 2ª oferta do curso (UAB II), o coordenador decidiu que medidas preventivas deveriam ser tomadas a fim de se evitar o mesmo problema de aprendizado.', 'Grande dificuldades dos alunos em interpretação e produção de texto, e ausência de noções de matemática elementar, por parte dos alunos, comprometia o desempenho acadêmico dos mesmos.', 'Deficiência em Português, deficiência em Matemática básica', 0, 0.980479),
(8, 3, 0, 1, 3, 'Coordenador do curso', 'Pedagógica', 'A disciplina Informática Aplicada foi ministrada para três polos, no estado do Acre: Acrelândia (60 alunos), Brasiléia (53), Tarauacá (60), no período de 28/10/2013 a 06/12/2013.\r\nOs polos atenderam um total de 173 alunos do curso de Bacharelado em Administração Pública, no período letivo e regular de 2013/2.\r\nAntes do início do disciplina, o coordenador de curso, juntamente com os coordenadores dos polos, identificaram que esta disciplina tinha um grande taxa de reprovação e abandono, pois os estudantes tinha dificuldade em trabalhar com o ambiente virtual de aprendizagem (Moodle) e com computadores em geral. ', 'Dificuldades em utilizar computadores, internet e o AVA Moodle impediam que a maioria dos alunos tivessem um bom rendimento na disciplina Informática Aplicada.', 'Dificuldades em utilizar computadores, internet e o AVA Moodle impediam que a maioria dos alunos tivessem um bom rendimento na disciplina Informática Aplicada.', 0, 0.820022),
(9, 2, 0, 1, 2, 'Coordenador do polo', 'Infraestrutura', 'A dependência da disciplina Fundamentos de Anatomia estava sendo ministrada para dois polos: Santa Izabel do Rio Negro e Boa Vista/RR, no período de 09/03/2014 a 26/03/2014.\r\nO polo de Boa Vista atendeu 89 alunos do curso de Licenciatura em Educação Física no período letivo e regular de 2013/2, sendo que 53 alunos ficaram de Dependência.\r\nNo início do mês de março de 2014, a sede do polo de Boa Vista sofreu com certa lentidão na velocidade internet, o que gerou reclamações por parte dos alunos, que se queixavam de dificuldades para fazer o download dos vídeos postados na sala de aula virtual.', 'A baixa velocidade de internet impedia que os alunos da Dependência conseguissem fazer o download dos vídeos postados como conteúdo das disciplinas.  Os vídeos eram essenciais para a aprendizagem do conteúdo.', 'Problema internet, download vídeos', 0, 0.956338),
(10, 1, 0, 1, 1, 'Coordenador do polo', 'Infraestrutura', 'A disciplina Fruticultura estava sendo ministrada para três polos: Manaquiri, Santa Izabel e Tefé, no período de 14/10/2014 a 23/11/2014.\r\nO polo de Santa Izabel atendeu 14 alunos do curso de Licenciatura em Ciência Agrárias neste período letivo.\r\nEm 15/10/2014, a cidade de Santa Izabel, por causa de uma forte chuva ficou sem energia durante 10 horas. O apagão danificou o equipamento (switch) e a antena de recepção do sinal de internet via satélite. A sede do polo ficou sem internet durante 7 dias até que o equipamento fosse substituído.', 'A ausência de conexão com a internet durante 7 dias prejudicaria diretamente os alunos da disciplina, pois comprometeria o andamento e as avaliações da Unidade I da disciplina.\r\nAs atividades de avaliação desta unidade tinham como prazo final dia 20/10/2014.', 'Problema internet.', 0, 0.891664),
(11, 5, 0, 1, 4, 'Coordenador do polo', 'Infraestrutura', 'As disciplinas Contabilidade Geral, Macroeconomia e Ciência Política estava sendo ministrada para três polos: Tarauacá, Brasileia e Acrelândia (AC), no período de 28/04/2014 a 06/06/2014.\r\nO polo de Brasileia atendeu 14 alunos do curso Licenciatura em Administração Pública neste período letivo.\r\nEm 28/04/2014, a cidade de Brasileia, sofreu um inundação, devido ao transbordamento do rio. O polo ficou com cerca de 1m de água. Equipamentos e móveis foram destruídos.', 'A inundação ocorrida na cidade de Brasileia comprometeu as atividades no polo. ', 'Inundação', 0, 0.953879),
(12, 5, 0, 1, 4, 'Coordenador do polo', 'Infraestrutura', 'As disciplinas Contabilidade Geral, Macroeconomia e Ciência Política estava sendo ministrada para três polos: Tarauacá, Brasileia e Acrelândia (AC), no período de 28/04/2014 a 06/06/2014.\nO polo de Brasileia atendeu 14 alunos do curso Licenciatura em Administração Pública neste período letivo.\nEm 28/04/2014, a cidade de Brasileia, sofreu um inundação, devido ao transbordamento do rio. O polo ficou com cerca de 1m de água. Equipamentos e móveis foram destruídos.', 'A inundação ocorrida na cidade de Brasileia comprometeu as atividades no polo. ', 'Inundação', 0, 0.953879),
(13, 5, 0, 1, 4, 'Coordenador do polo', 'Infraestrutura', 'As disciplinas Contabilidade Geral, Macroeconomia e Ciência Política estava sendo ministrada para três polos: Tarauacá, Brasileia e Acrelândia (AC), no período de 28/04/2014 a 06/06/2014.\r\nO polo de Brasileia atendeu 14 alunos do curso Licenciatura em Administração Pública neste período letivo.\r\nEm 28/04/2014, a cidade de Brasileia, sofreu um inundação, devido ao transbordamento do rio. O polo ficou com cerca de 1m de água. Equipamentos e móveis foram destruídos.', 'A inundação ocorrida na cidade de Brasileia comprometeu as atividades no polo. ', 'Inundação', 0, 0.953879),
(14, 5, 0, 1, 4, 'Coordenador do polo', 'Infraestrutura', 'A inundação ocorrida na cidade de Brasileia comprometeu as atividades no polo. ', 'As disciplinas Contabilidade Geral, Macroeconomia e Ciência Política estava sendo ministrada para três polos: Tarauacá, Brasileia e Acrelândia (AC), no período de 28/04/2014 a 06/06/2014.\r\nO polo de Brasileia atendeu 14 alunos do curso Licenciatura em Administração Pública neste período letivo.\r\nEm 28/04/2014, a cidade de Brasileia, sofreu um inundação, devido ao transbordamento do rio. O polo ficou com cerca de 1m de água. Equipamentos e móveis foram destruídos.', 'Inundação', 0, 0.706159),
(15, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `id_descricao` int(10) UNSIGNED DEFAULT '0',
  `id_turma` int(10) UNSIGNED DEFAULT '0',
  `id_curso` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `polo`
--

INSERT INTO `polo` (`id_polo`, `nome`, `coordenador`, `tipo_conexao`, `infra_laboratorio`, `infra_fisica`, `infra_cidade`, `acesso`, `outras_caracteristicas`, `id_descricao`, `id_turma`, `id_curso`) VALUES
(1, 'Santa Izabel do Rio Negro', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(2, 'Boa Vista', 'Coordenador', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(3, 'Acrelândia', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(4, 'Brasiléia', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(5, 'Tarauacá', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(6, 'Manaquiri', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(7, 'Tefé', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(8, 'Maués', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(9, 'Lábrea', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(10, 'Manacapuru', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(11, 'Coari', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(12, 'Borba', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(13, 'Parintins', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(14, 'Guajará', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(15, 'Autazes', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(16, 'São Gabriel da Cachoeira', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(17, 'Humaitá', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(18, 'Benjamin Constant', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(19, 'Barcelos', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(20, 'Eirunepé', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(21, 'Itacoatiara', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(22, 'Bonfim', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(23, 'Caroebe', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL),
(24, 'Iracema', 'x', 'x', 'x', 'x', 'x', 'x', NULL, NULL, NULL, NULL);

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

--
-- Extraindo dados da tabela `relator`
--

INSERT INTO `relator` (`id_relator`, `perfil`, `id_infoc`) VALUES
(1, 'Coordenador do polo', NULL),
(2, 'Coordenador do curso', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta_esp`
--

CREATE TABLE `resposta_esp` (
  `id` int(111) NOT NULL,
  `id_tipo_problema` int(111) NOT NULL,
  `id_titulo_problema` int(111) NOT NULL,
  `descricao_problema` varchar(300) CHARACTER SET latin1 NOT NULL,
  `descricao_solucao` varchar(300) CHARACTER SET latin1 NOT NULL,
  `data_ocorrencia` date NOT NULL,
  `data_insercao` date NOT NULL,
  `nome_especialista` varchar(200) CHARACTER SET latin1 NOT NULL,
  `funcao_especialista` varchar(100) CHARACTER SET latin1 NOT NULL,
  `relator` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `resposta_esp`
--

INSERT INTO `resposta_esp` (`id`, `id_tipo_problema`, `id_titulo_problema`, `descricao_problema`, `descricao_solucao`, `data_ocorrencia`, `data_insercao`, `nome_especialista`, `funcao_especialista`, `relator`) VALUES
(1, 1, 3, 'Só um exemplo', '', '2017-11-16', '2017-11-16', 'Tammy', '', 'Estudante');

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

--
-- Extraindo dados da tabela `solucao`
--

INSERT INTO `solucao` (`id_solucao`, `solucao`, `palavras_chaves`, `acao_implementada`, `solucao_implementada`, `efetividade_acao_implementada`, `custos`, `impacto_pedagogico`, `atores_envolvidos`, `id_infoc`) VALUES
(1, 'Conteúdo deveria ser repassado diretamente aos alunos através de cópia de arquivos e as atividades avaliativas deveriam ser coletadas pelo tutor presencial de forma off-line.', 'Conteúdo off-line, atividades off-line', '- Contato do coordenador de polo com o coordenador de curso, para relato do problema e tomada de decisões.\r\n- Repasse dos arquivos com o conteúdo da Unidade I para os alunos.\r\n- Coleta das atividades avaliativas de forma off-line (arquivos e mensagens de fórum).', 'Sim', 'Sim', 'Não houve', 'Não houve', 'Coordenador do curso, coordenador de polo, tutor presencial', NULL),
(2, 'O coordenador de curso se deslocou até o polo levando os vídeos em formato de DVD, para serem exibidos para os alunos.', 'Vídeos DVD, visita ao polo', '- Contato do coordenador de polo com o coordenador de curso, para relato do problema e tomada de decisões.\r\n- Providência para viagem do coordenador de curso ao polo.\r\n- Cópia dos vídeos em mídia DVD.', 'Sim', 'Sim', 'Passagem aérea, diárias, mídia DVD', 'Não houve', 'Coordenador do curso, coordenador de polo', NULL),
(3, 'Oferecer treinamento em informática básica e noções gerais de uso do AVA Moodle.', 'Oficina de Informática Básica, mutirão', '- Organização de um mutirão de professores e tutores à distância para ministrarem uma oficina de Informática Básica nos três polos\r\n- Providência para viagem dos professores e tutores à distância aos polos.\r\n- Elaboração e impressão de uma apostila de Informática Básica.', 'Sim', 'Sim', 'Passagem aérea, diárias, impressão de apostila.', 'Não houve', 'Coordenador de polo, professor, tutor presencial', NULL),
(4, 'Elaboração e ministração de um curso de nivelamento a ser oferecido em todos os polos do curso, a fim de sanar estas deficiências antes do início do período letivo regular.', 'Curso de nivelamento à distância', '- Relato e análise do problema em reunião com a coordenação pedagógica do CED.\r\n- Elaboração de conteúdo e montagem da sala de aula virtual para o curso de nivelamento.\r\n- Ministração do curso de nivelamento antes do início do período letivo regular.', 'Sim', 'Sim', 'Não houve', 'O início do período letivo regular teve que ser adiado em 1 semana.', 'Coordenador de curso, Professor, tutor à distância, tutor presencial', NULL),
(5, 'Todas as atividades tiveram que ser suspensas por 1 mês, em todos os polos, por causa da paralisação do polo de Brasileia e para não prejudicar os alunos do mesmo.', 'Suspensão do curso', '- Contato do coordenador de polo com o coordenador de curso, para relato do problema e tomada de decisões.\n- Envio de mensagens a todos os polos para suspensão de atividades.\n- Reposição de equipamentos com urgência.', 'Sim', 'Sim', 'Reposição de equipamentos', 'Adiamento de atividades e mudanças no calendário acadêmico do curso.', 'Professor, Coordenador do curso, coordenador de polo, tutor presencial', NULL),
(6, 'Solução	Distribuição da mídia dos cadernos em CD para os polos afetados.', 'CD', '- Contato do coordenador de polo com o coordenador de curso, para relato do problema e tomada de decisões.\r\n- Suspensão dos cursos por 4 meses até a diretoria conseguir permissão e liberação de recursos para distribuir as cópias dos cadernos em CD.\r\n- Cópia dos cadernos em mídia CD.\r\n- Distribuição dos CD nos polos afetados.', 'Sim', 'Sim', 'Mídia CD', 'Suspensão das atividades dos curso por 4 meses.', 'Diretor, Coordenador pedagógico, Coordenador do curso, coordenador de polo, professores, tutores', NULL),
(7, 'Adiamento das atividades e ajustes no cronograma das disciplinas.', 'Adiamento atividades, ajustes no cronograma', '- Contato do coordenador de polo com o coordenador de curso, para relato do problema e tomada de decisões.\r\n- Reunião com coordenador pedagógico com os professores das disciplinas e com o coordenador dos cursos, a fim de reorganizarem o calendário das disciplinas.\r\n- Adiamentos das atividades com prazo a vencer no período de suspensão de atividades.', 'Sim', 'Sim', 'Nenhum', 'Não houve', 'Coordenador de polo, professor, tutor à distância, tutor presencial', NULL),
(8, 'Adaptação da equipe e contato com tutores locais para troca de experiência.', 'Adaptação da equipe, contato com locais', '- Reuniões com coordenação pedagógica e de curso. \r\n- Adaptações de prazos para envio de entrega do material didático.\r\n- Adaptação no calendário acadêmico, para recuperar aos atrasos. \r\n- Viagem do coordenador de curso e coordenador adjunto para alguns polos a fim de conhecer melhor a realidade dos polos. \r\n- Contato e reuniões com tutores presenciais para troca de experiências.', 'Sim', 'Sim', 'Não houve', 'Não houve', 'Diretor, coordenador adjunto, coordenador de curso, professor, tutor à distância, tutor presencial', NULL),
(9, 'Correção das informações no SISUAB.', 'Atualização de informações', '- Atualização das informações sobre o curso no SISUAB. \r\n- Contato e reuniões com tutores presenciais e à distância para explicação da situação.', 'Sim', 'Sim', 'Não houve', 'Não houve', 'Diretor, coordenador de curso, coordenador de tutor.', NULL),
(10, 'O coordenador de curso se deslocou até o polo levando os vídeos em formato de DVD, para serem exibidos para os alunos.', 'Vídeos DVD, visita ao polo', '- Contato do coordenador de polo com o coordenador de curso, para relato do problema e tomada de decisões.\r\n- Providência para viagem do coordenador de curso ao polo.\r\n- Cópia dos vídeos em mídia DVD.', 'Sim', 'Sim', 'Passagem aérea, diárias, mídia DVD', 'Não houve', 'Coordenador do curso, coordenador de polo', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_problema`
--

CREATE TABLE `tipo_problema` (
  `id` int(111) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_problema`
--

INSERT INTO `tipo_problema` (`id`, `tipo`) VALUES
(1, 'Pedagógico'),
(2, 'Acadêmico'),
(3, 'Infraestrutura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulo_problema`
--

CREATE TABLE `titulo_problema` (
  `id` int(111) NOT NULL,
  `titulo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `titulo_problema`
--

INSERT INTO `titulo_problema` (`id`, `titulo`) VALUES
(1, 'Energia Elétrica'),
(2, 'Internet'),
(3, 'Aprendizado'),
(4, 'Relacionamento'),
(5, 'Reprovação'),
(6, 'Abandono'),
(7, 'Faltas'),
(8, 'Saúde'),
(9, 'Notas'),
(10, 'Professor'),
(11, 'Tutoria'),
(12, 'Coordenação'),
(13, 'Atividades'),
(14, 'Conteúdo');

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
  ADD UNIQUE KEY `nome` (`nome`),
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
  ADD UNIQUE KEY `perfil` (`perfil`),
  ADD KEY `fk_relator_infoc_idx` (`id_infoc`);

--
-- Indexes for table `resposta_esp`
--
ALTER TABLE `resposta_esp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipoProblema_esp` (`id_tipo_problema`),
  ADD KEY `fk_tituloProblema_esp` (`id_titulo_problema`);

--
-- Indexes for table `solucao`
--
ALTER TABLE `solucao`
  ADD PRIMARY KEY (`id_solucao`),
  ADD KEY `fk_solucao_infoc_idx` (`id_infoc`);

--
-- Indexes for table `tipo_problema`
--
ALTER TABLE `tipo_problema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titulo_problema`
--
ALTER TABLE `titulo_problema`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_descricao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info_caso`
--
ALTER TABLE `info_caso`
  MODIFY `id_infoc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pesquisas`
--
ALTER TABLE `pesquisas`
  MODIFY `id_pesquisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `polo`
--
ALTER TABLE `polo`
  MODIFY `id_polo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relator`
--
ALTER TABLE `relator`
  MODIFY `id_relator` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `resposta_esp`
--
ALTER TABLE `resposta_esp`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `solucao`
--
ALTER TABLE `solucao`
  MODIFY `id_solucao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tipo_problema`
--
ALTER TABLE `tipo_problema`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `titulo_problema`
--
ALTER TABLE `titulo_problema`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
-- Limitadores para a tabela `resposta_esp`
--
ALTER TABLE `resposta_esp`
  ADD CONSTRAINT `fk_tipoProblema_esp` FOREIGN KEY (`id_tipo_problema`) REFERENCES `tipo_problema` (`id`),
  ADD CONSTRAINT `fk_tituloProblema_esp` FOREIGN KEY (`id_titulo_problema`) REFERENCES `titulo_problema` (`id`);

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
