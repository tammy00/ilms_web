-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Ago-2018 às 04:53
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `id_turma` int(10) UNSIGNED DEFAULT '0',
  `id_disciplina` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `tipo_curso`, `duracao`, `departamento`, `coordenador`, `outras_caracteristicas`, `observacoes`, `id_polo`, `id_turma`, `id_disciplina`) VALUES
(1, 'Artes Visuais', 'Presencial', 120, 'Faculdade de Artes', 'João da Silva', NULL, NULL, 15, NULL, NULL),
(2, 'Administração', 'Presencial', 120, 'Faculdade de Administração', 'João da Silva', NULL, NULL, 14, NULL, NULL),
(3, 'Ciências Agrárias', 'Presencial', 120, 'Faculdade de Ciências Agrárias', 'João da Silva', NULL, NULL, 12, NULL, NULL),
(4, 'Biologia', 'Presencial', 120, 'Faculdade de Biologia', 'João da Silva', NULL, NULL, 10, NULL, NULL),
(5, 'Educação Física', 'Presencial', 120, 'Faculdade de Educação Física', 'João da Silva', NULL, NULL, 1, 0, 0);

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
(1, 'Infraestrutura', 'Coordenador Polo', 'A ausência de conexão com a internet durante 7 dias prejudicaria diretamente os alunos da disciplina, pois comprometeria o andamento e as avaliações da Unidade I da disciplina.\r\nAs atividades de avaliação desta unidade tinham como prazo final dia 20/10/2014.', 'A disciplina Fruticultura estava sendo ministrada para três polos: Manaquiri, Santa Izabel e Tefé, no período de 14/10/2014 a 23/11/2014.\r\nO polo de Santa Izabel atendeu 14 alunos do curso de Licenciatura em Ciência Agrárias neste período letivo.\r\nEm 15/10/2014, a cidade de Santa Izabel, por causa de uma forte chuva ficou sem energia durante 10 horas. O apagão danificou o equipamento (switch) e a antena de recepção do sinal de internet via satélite. A sede do polo ficou sem internet durante 7 dias até que o equipamento fosse substituído.', 'Problema internet.', NULL, 1),
(2, 'Infraestrutura', 'Coordenador Polo', 'A baixa velocidade de internet impedia que os alunos da Dependência conseguissem fazer o download dos vídeos postados como conteúdo das disciplinas.  Os vídeos eram essenciais para a aprendizagem do conteúdo.', 'A dependência da disciplina Fundamentos de Anatomia estava sendo ministrada para dois polos: Santa Izabel do Rio Negro e Boa Vista/RR, no período de 09/03/2014 a 26/03/2014.\r\nO polo de Boa Vista atendeu 89 alunos do curso de Licenciatura em Educação Física no período letivo e regular de 2013/2, sendo que 53 alunos ficaram de Dependência.\r\nNo início do mês de março de 2014, a sede do polo de Boa Vista sofreu com certa lentidão na velocidade internet, o que gerou reclamações por parte dos alunos, que se queixavam de dificuldades para fazer o download dos vídeos postados na sala de aula virtual.', 'Problema internet, download vídeos', NULL, 2),
(3, 'Pedagógica', 'Coordenador Curso', 'Dificuldades em utilizar computadores, internet e o AVA Moodle impediam que a maioria dos alunos tivessem um bom rendimento na disciplina Informática Aplicada.', 'A disciplina Informática Aplicada foi ministrada para três polos, no estado do Acre: Acrelândia (60 alunos), Brasiléia (53), Tarauacá (60), no período de 28/10/2013 a 06/12/2013.\r\nOs polos atenderam um total de 173 alunos do curso de Bacharelado em Administração Pública, no período letivo e regular de 2013/2.\r\nAntes do início do disciplina, o coordenador de curso, juntamente com os coordenadores dos polos, identificaram que esta disciplina tinha um grande taxa de reprovação e abandono, pois os estudantes tinha dificuldade em trabalhar com o ambiente virtual de aprendizagem (Moodle) e com computadores em geral. ', 'Dificuldades com Moodle, deficiência em Informática Básica', NULL, 3),
(4, 'Pedagógica', 'Coordenador Curso', 'Grande dificuldades dos alunos em interpretação e produção de texto, e ausência de noções de matemática elementar, por parte dos alunos, comprometia o desempenho acadêmico dos mesmos.', 'O curso de Licenciatura em Ciência Agrárias oferecia disciplina para os polos de Manaquiri (70 alunos), Santa Izabel do Rio Negro (61), Tefé (59), pelo UAB II, como 2ª turma do curso. Na primeira oferta do curso (UAB I) os tutores e professores detectaram que os alunos tinham muitas dificuldades em produzir textos e não possuíam noções básicas de matemática. Esta deficiência acabou dificultando o aprendizado e, consequentemente, levando a um maior número de reprovações e abandono do curso.\r\nAntes do início da 2ª oferta do curso (UAB II), o coordenador decidiu que medidas preventivas deveriam ser tomadas a fim de se evitar o mesmo problema de aprendizado.', 'Deficiência em Português, deficiência em Matemática básica', NULL, 6),
(5, 'Infraestrutura', 'Coordenador Polo', 'A inundação ocorrida na cidade de Brasileia comprometeu as atividades no polo. ', 'As disciplinas Contabilidade Geral, Macroeconomia e Ciência Política estava sendo ministrada para três polos: Tarauacá, Brasileia e Acrelândia (AC), no período de 28/04/2014 a 06/06/2014.\r\nO polo de Brasileia atendeu 14 alunos do curso Licenciatura em Administração Pública neste período letivo.\r\nEm 28/04/2014, a cidade de Brasileia, sofreu um inundação, devido ao transbordamento do rio. O polo ficou com cerca de 1m de água. Equipamentos e móveis foram destruídos.', 'Inundação', NULL, 4),
(6, 'Pedagógica', 'Coordenador Curso', 'Atraso na impressão dos cadernos das disciplinas do módulo.', 'Os cursos de Licenciatura em Ciências Agrárias, Licenciatura em Artes Visuais, Bacharelado em Administração é oferecido nos seguintes polos: Maués, Lábrea, Manacapuru e Coari, no primeiro semestre de 2009.\r\nProblemas na licitação da escolha da gráfica, que imprimiria os cadernos das disciplinas dos módulos de 2009/01, impediram a impressão e o envio dos mesmos aos polos.\r\nOs cursos tiveram que ser suspensos por 4 meses até que o impasse tivesse uma solução.', 'Impressão de cadernos', NULL, 8),
(7, 'Infraestrutura', 'Coordenador Polo', 'Polo sem energia elétrica e sem internet por 5 dias.', 'Em 20/02/2010, o gerador de energia sofreu uma avaria, o que acarretou uma falta de energia elétrica em todo a cidade de Lábrea. \r\nO acesso à internet foi interrompido e as atividades dos cursos do Bacharelado em Administração Pública e Licenciatura em Ciências Agrárias tiveram que ser suspensas por 5 dias.', 'Falta de energia elétrica, problema internet', NULL, 9),
(8, 'Infraestrutura', 'Coordenador Curso', 'Dificuldades de logística e inexperiência da equipe de apoio acabaram por prejudicar o andamento das atividades das primeiras disciplinas do primeiro módulo.', 'O curso de Licenciatura em Educação Física era oferecido para os 17 polos atendidos pelo CED. Como era a primeira oferta do curso, a equipe ainda não tinha experiência e nem conhecimento das peculiaridades dos polos. Atrasos no envido de material didático e de logística da equipe de apoio (tutores e coordenadores) acabaram por prejudicar o andamento das atividades das primeiras disciplinas do primeiro módulo.', 'Problemas de logística, inexperiência da equipe', NULL, 6),
(9, 'Pedagógica', 'Coordenador Curso', 'Quantidade de bolsa para tutores e professores foi reduzida devido a informações erradas no sistema SISUAB.', 'O cursos oferecidos pela Universidade Aberta do Brasil (UAB) passaram por um recadastramento no Sistema da UAB (SISUAB), para maior controle por parte do MEC em relação à quantidade de alunos por polo e por cursos.\r\nA coordenação do curso não atualizou os dados corretamente e algumas bolsas foram cortadas, ocasionando desligamento de alguns tutores.', 'Corte de bolsa', NULL, 22),
(10, 'Acadêmica', 'Coordenador Polo', 'A baixa velocidade de internet impedia que os alunos da Dependência conseguissem fazer o download dos vídeos postados como conteúdo das disciplinas.  Os vídeos eram essenciais para a aprendizagem do conteúdo.', 'A dependência da disciplina Fundamentos de Anatomia estava sendo ministrada para dois polos: Santa Izabel do Rio Negro e Boa Vista/RR, no período de 09/03/2014 a 26/03/2014.\r\nO polo de Boa Vista atendeu 89 alunos do curso de Licenciatura em Educação Física no período letivo e regular de 2013/2, sendo que 53 alunos ficaram de Dependência.\r\nNo início do mês de março de 2014, a sede do polo de Boa Vista sofreu com certa lentidão na velocidade internet, o que gerou reclamações por parte dos alunos, que se queixavam de dificuldades para fazer o download dos vídeos postados na sala de aula virtual.', 'Problema internet, download vídeos', NULL, 2),
(11, 'Pedagógica', 'Coordenador Curso', 'Baixa interação nos fóruns de atividades.', 'Os tutores perceberam que os fóruns de atividades estavam com baixíssima interação e os alunos não procuravam conversar entre si, não tiravam dúvidas e não compartilhavam experiências.\r\nIsso vinha prejudicando o bom desempenho da disciplina como um todo, pois comprometia a comunicação na sala virtual.\r\n', 'Fóruns de discussão.', NULL, 1),
(12, 'Pedagógica', 'Coordenador Curso', 'Os alunos estavam acostumados a fazer prova com consulta e recorriam frequentemente à cola. Tinham a conivência dos tutores presenciais.', 'Foram identificados casos de cola nas provas finais das disciplinas.\r\nO coordenador de curso decidiu aplicar pessoalmente as provas, de forma rígida e tomou providências para que não houvesse fraudes.\r\n', 'Fraude em provas, cola.', NULL, 13),
(13, 'Pedagógica', 'Coordenador Curso', 'Plágio em TCC.', 'Aluna finalista entregou documento de TCC com problemas de plágio. Foi avisada para refazer o trabalho, mas a aluna não o entregou. Um ano depois, a aluna entregou um novo e correto documento de TCC.', 'Plágio, TCC.', NULL, 11),
(14, 'Acadêmica', 'Coordenador Curso', 'Foram identificados casos de cola nas provas finais das disciplinas.\r\nO coordenador de curso decidiu aplicar pessoalmente as provas, de forma rígida e tomou providências para que não houvesse fraudes.\r\n', 'Alunos indígenas bolsistas e residentes em Santa Izabel do Rio Negro, frequentavam com bastante dificuldades as aulas e o laboratório do curso em São Gabriel da Cachoeira. A prefeitura não deu mais apoio de transporte ao grupo e por isso eles não podiam mais ir para a aula.', 'Evasão de alunos.', NULL, 16),
(15, 'Infraestrutura', 'Coordenador Graduação', 'Atraso na emissão de passagens e diárias.', 'A UAB não estava liberando recursos para passagens e diárias, devido a problemas burocráticos. Esta tarefa ficou a cargo do setor reitoria da UFAM. Vários problemas ocorreram como: liberação somente de um trecho, atraso nas diárias, demora na bilhetagem das passagens e outros transtornos para os professores.   ', 'Falta de recursos financeiros.', NULL, 2),
(16, 'Acadêmica', 'Coordenador Curso', 'Logística para deslocamento aos polos.', 'A coordenadora de curso precisou visitar todos os polos para resolver problemas administrativos e acadêmicos do curso. A UFAM deixou para comprar a passagem 1 dia antes e não conseguiu vaga para o dia desejado. Isso causou transtornos como remarcação de voos, de reservas de hospedagem e de aulas presenciais nos polos.', 'Deslocamento de professor.', NULL, 14),
(17, 'Acadêmica', 'Coordenador Curso', 'Alunos prestes a ser reprovados pela não entrega do TCC.', 'Alunos não entregaram o TCC no final do curso e não quiseram entregar no prazo estabelecido.', 'TCC, reprovação.', NULL, 5),
(18, 'Acadêmica', 'Coordenador Curso', 'Fraude nos relatórios de levantamento da disciplina.', 'Alunos da disciplina de Estágio fraudaram o relatório de levantamento da disciplina. Uma aluna fez e entregou o relatório do colega, como se fosse o mesmo.', 'Fraude, relatório de levantamento.', NULL, 9),
(19, 'Pedagógica', 'Coordenador Curso', 'Ausência de alunos na aula presencial da disciplina Introdução Disciplinar.', 'Alunos preocupados com a prova final do período, não compareciam à aula presencial da disciplina Introdução Disciplinar. ', 'Ausência de alunos.', NULL, 2),
(20, 'Pedagógica', 'Coordenador Graduação', 'Nota muito baixa em uma atividade.', 'Uma professora deu notas muito baixas para uma atividade de opinião sobre o curso, os alunos se sentiram injustiçados e exigiram esclarecimentos e nova correção.', 'Nota baixa.', NULL, 2),
(21, 'Acadêmica', 'Coordenador Curso', 'Extravio de documentação e requerimentos.', 'Os alunos frequentemente enviavam por e-mail ou entregavam ao tutor presencial formulários, requerimentos e documentos solicitando ou comprovando alguma questão. Esses documentos não eram devidamente arquivados e às vezes se extraviavam.', 'Extravio.', NULL, 2),
(22, 'Acadêmica', 'Coordenador Curso', 'Alunos prestes a ser reprovados pela não entrega do TCC.', 'Alunos não entregaram o TCC no final do curso e não quiseram entregar no prazo estabelecido.', 'TCC, reprovação.', NULL, 2),
(23, 'Acadêmica', 'Professor', 'Plágio em trabalhos.', 'Alunos frequentemente estavam entregando trabalho com plágio, com trechos copiados da internet.', 'Fraude em trabalhos.', NULL, 6),
(24, 'Pedagógica', 'Professor', 'Plágio em trabalho final de curso', 'Aluna finalista entregou o trabalho final de curso com plágio, foi alertada, fez a dependência da disciplina e entregou novamente com plágio.', 'Plágio em TCC', NULL, 2),
(25, 'Pedagógica', 'Coordenador Curso', 'Plágio cruzado entre polos.', 'Recorrência de plágio cruzado entre os polos em atividades escritas.', 'Critérios de correção para trabalhos com plágio.', NULL, 2),
(26, 'Infraestrutura', 'Coordenador Curso', 'Solicitação de adiamento de atividades devido a problemas de energia.', 'Alunos solicitaram adiamento de atividade alegando problemas de energia elétrica, durante dois dias seguidos, na sede do polo. ', 'Adiamento, energia.', NULL, 10),
(27, 'Acadêmica', 'Coordenador Curso', 'Evasão de alunos devido a grande oferta de outros cursos.', 'Detecção de evasão do curso por causa de aumento na oferta de outros cursos no polo.', 'Reunião com alunos.', NULL, 7),
(28, 'Acadêmica', 'Professor', 'Chantagem infundada de alunos. Alegação de serem prejudicados por causa de deficiência na infraestrutura do polo. Exigiam tratamento diferenciado.', 'Alunos frequentemente alegavam que, por serem de um polo com infraestrutura inferior aos demais, deveriam ser beneficiados com maior prazo para entrega de atividades e com outros critérios de avaliação.', 'Chantagem.', NULL, 7),
(29, 'Pedagógica', 'Coordenador Curso', 'Devido ao uso não organizado de material didático, o aluno se prejudicava e comprometia o desempenho nas atividades avaliativas.', 'Alunos não conseguiam fazer uso do material didático disponível na sala virtual. Acabavam por ignorar o material, prejudicando assim seu rendimento acadêmico.', 'Material didático.', NULL, 2),
(30, 'Pedagógica', 'Coordenador Curso', 'Alunos do início do curso reclamaram de muita dificuldade em realizar atividades do AVA dentro do prazo solicitado.', 'Alunos calouros relataram dificuldades em lidar com prazos em EaD.', 'Prazos, EaD.', NULL, 5);

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
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id_imagem` int(11) NOT NULL,
  `curso` varchar(250) NOT NULL,
  `disciplina` varchar(250) NOT NULL,
  `periodo` int(1) NOT NULL,
  `palavra_chave` varchar(400) NOT NULL,
  `descricao` text NOT NULL,
  `ano` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, '2017-05-22', 'Tipo Caso', 40, 'Boa Vista', 10, 1),
(3, '2018-07-18', 'Novo', 120, 'Santa Izabel da Cachoeira', 11, 3),
(4, '2018-07-18', 'Novo', 60, 'Parintins', 12, 2),
(5, '2018-07-18', 'Novo', 1, 'Coari', 13, 2),
(6, '2018-07-18', 'Novo', 12, 'São Gabriel da Cachoeira', 14, 2),
(7, '2018-07-18', 'Novo', 250, 'Boa Vista', 15, 3),
(8, '2018-07-22', 'Novo', 167, 'Guajará', 16, 2),
(9, '2018-07-22', 'Novo', 6, 'Tarauacá', 17, 2),
(10, '2018-07-22', 'Novo', 2, 'Lábrea', 18, 2),
(11, '2018-07-22', 'Novo', 80, 'Boa Vista', 19, 2),
(12, '2018-07-22', 'Novo', 40, 'Boa Vista', 20, 3),
(13, '2018-08-05', 'Novo', 40, 'Boa Vista', 21, 2),
(14, '2018-08-05', 'Novo', 40, 'Boa Vista', 22, 2),
(15, '2018-08-05', 'Novo', 60, 'Tarauacá', 23, 8),
(16, '2018-08-05', 'Novo', 1, 'Boa Vista', 24, 8),
(17, '2018-08-05', 'Novo', 40, 'Boa Vista', 25, 2),
(18, '2018-08-05', 'Novo', 15, 'Manacapuru', 26, 2),
(19, '2018-08-05', 'Novo', 15, 'Tefé', 27, 2),
(20, '2018-08-05', 'Novo', 18, 'Tefé', 28, 8),
(21, '2018-08-05', 'Novo', 40, 'Boa Vista', 29, 2),
(22, '2018-08-05', 'Novo', 60, 'Tarauacá', 30, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisas`
--

CREATE TABLE `pesquisas` (
  `id_pesquisa` int(11) NOT NULL,
  `id_solucao` int(10) DEFAULT NULL,
  `id_resposta` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_polo` int(10) DEFAULT NULL,
  `relator` varchar(250) DEFAULT NULL,
  `natureza_problema` text,
  `descricao_problema` text,
  `problema_detalhado` text,
  `palavras_chaves` varchar(400) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `similaridade` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Coordenador Polo', NULL),
(2, 'Coordenador Curso', NULL),
(3, 'Coordenador Graduação', NULL),
(4, 'Coordenador Tutor', NULL),
(5, 'Tutor Presencial', NULL),
(6, 'Tutor Distância', NULL),
(7, 'Mediador', NULL),
(8, 'Professor', NULL),
(9, 'Suporte', NULL),
(10, 'Administrador', NULL);

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
  `data_ocorrencia` date DEFAULT NULL,
  `data_insercao` date DEFAULT NULL,
  `nome_especialista` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `funcao_especialista` int(11) DEFAULT NULL,
  `relator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `resposta_esp`
--

INSERT INTO `resposta_esp` (`id`, `id_tipo_problema`, `id_titulo_problema`, `descricao_problema`, `descricao_solucao`, `data_ocorrencia`, `data_insercao`, `nome_especialista`, `funcao_especialista`, `relator`) VALUES
(1, 1, 3, 'Alunos apresentam dificuldades para assimilar o conteúdo da disciplina Informática no Ensino da Física.', 'Devem ser dadas aulas presenciais extras, ministradas pelo tutor.', '2015-10-10', '2018-07-22', 'Ketlen Teles', 3, 3),
(2, 1, 13, 'Alunos apresentam dificuldades na atividade Forum de Discussão. ', 'Tutor deve postar uma mensagem no AVA, orientando os procedimentos da atividade.', '2016-04-03', '2018-05-01', 'Airton Gaio', 5, 8),
(3, 2, 11, 'Um polo ficou sem a assistência do tutor presencial.', 'O Coordenador de polo deve assumir as funções do tutor presencial, ficando responsável pelos alunos.', '2013-07-08', '2018-05-16', 'Afrânio Neves', 2, 2),
(4, 2, 9, 'As notas lançadas no AVA de forma errada, fora do padrão.', 'O Coordenador de tutor deve lançar novamente as notas no AVA.', '2012-08-13', '2018-05-16', 'Gisele Souza', 9, 9),
(5, 2, 7, 'Um grupo de alunos ausentes na aula presencial do período.', 'Os tutores presenciais devem remarcar uma nova data para a aula de reposição, porém as atividades avaliativas não devem valer a mesma nota.', '2010-04-24', '2018-06-19', 'Francisco Bentes', 4, 4),
(6, 3, 2, 'O link de internet interrompido no Polo.', 'O prazo de entrega das atividades deve ser estendido somente para este Polo.', '2016-10-11', '2018-06-19', 'Francisco Bentes', 4, 4),
(7, 3, 1, 'Por motivos climáticos, o polo ficou sem energia elétrica durante o período.', 'O prazo de entrega das atividades deve ser estendido somente para este Polo.', '2012-08-12', '2018-06-20', 'Luzinaldo Moura', 4, 4),
(8, 3, 15, 'Manutenção de urgência no polo.', 'O prazo de entrega das atividades deve ser estendido somente para este Polo.', '2013-07-08', '2018-06-20', 'Luzinaldo Moura', 4, 4),
(9, 1, 5, 'Uma turma da disciplina Matemática Básica apresenta grande reprovação ao final do período. ', 'Aulas de reciclagem na disciplina, antes do início da Reoferta do curso.', '2012-01-18', '2018-06-18', 'João Victor', 10, 9),
(10, 2, 8, 'Aluno com problema de saúde, com licença médica.', 'O tutor presencial deverá repassar o conteúdo e o prazo das atividades devem ser revistos para esse aluno.', '2014-05-22', '2018-06-18', 'Aliuandra', 1, 9),
(11, 1, 3, 'Dificuldades em utilizar o AVA.', 'O tutor presencial deverá repassar treinamento no AVA.', '2015-03-11', '2018-06-20', 'João Victor', 1, 9),
(12, 3, 15, 'Alagamento na cidade impede acesso ao Polo.', 'O prazo de entrega das atividades deve ser estendido somente para este Polo.', '2015-08-07', '2018-06-20', 'João Victor', 1, 9),
(13, 1, 4, 'Baixa interação nos fóruns de atividades.', 'Intervenção para aumentar a interação nos fóruns de discussão.', '2009-10-03', '2018-06-20', 'Ketlen Teles', 1, 3),
(14, 1, 4, 'Os alunos estavam acostumados a fazer prova com consulta e recorriam frequentemente à cola. Tinham a conivência dos tutores presenciais.', 'Foi criado um formulário de norma de aplicação de prova, com regras para alunos e responsáveis pela aplicação das avaliações.', '2018-05-03', '2018-06-20', 'Ketlen Teles', 8, 2),
(15, 1, 9, 'Plágio em TCC.', 'A situação da aluna foi deixada em aberto e posteriormente foi permitido à mesma submeter um novo trabalho para conclusão do curso.', '2009-02-25', '2018-06-20', 'Ketlen Teles', 8, 2),
(16, 2, 6, 'Alunos evadidos do curso, por problemas de logística.', 'Foi criado um mini-polo em Santa Izabel do Rio Negro, e os professores que iam para São Gabriel da Cachoeira também se deslocavam para esse outro município, exclusivamente para atender esses alunos.', '2010-06-28', '2018-06-20', 'Ketlen Teles', 8, 2),
(17, 3, 15, 'Atraso na emissão de passagens e diárias.', 'Correção das informações no SISUAB.', '2018-04-10', '2018-06-20', 'Ketlen Teles', 8, 3),
(18, 2, 16, 'Logística para deslocamento aos polos.', 'As passagens tiveram que ser compradas em regime de urgência para que o planejamento não ficasse totalmente comprometido.', '2018-04-23', '2018-07-22', 'Ketlen Teles', 8, 2),
(19, 2, 5, 'Alunos prestes a ser reprovados pela não entrega do TCC.', 'Foi dada mais uma chance para que os alunos entregassem o TCC juntamente com a próxima turma.', '2015-11-10', '2018-07-22', 'Ketlen Teles', 8, 2),
(20, 2, 13, 'Fraude nos relatórios de levantamento da disciplina.', 'Foi exigido um vídeo do aluno relatando o levantamento da escola do estágio de forma oral, além do relatório escrito.', '2014-03-30', '2018-07-22', 'Ketlen Teles', 8, 2),
(21, 1, 6, 'Ausência de alunos na aula presencial da disciplina Introdução Disciplinar.', 'Atividade avaliativa para o dia da aula presencial da disciplina Introdução Disciplinar.', '2018-05-25', '2018-07-22', 'Ketlen Teles', 8, 2),
(22, 1, 9, 'Nota muito baixa em uma atividade.', 'Estabelecimento de critérios objetivos de correção de cada atividade.', '2018-06-16', '2018-07-22', 'Ketlen Teles', 8, 3),
(23, 1, 17, 'Extravio de documentação e requerimentos.', 'Foi criada na sala virtual principal do curso, um Fórum de Envio e Recebimento de Documentos, para que os alunos enviassem de forma digital os requerimentos e os documentos comprobatórios de sua solicitação.', '2018-07-14', '2018-08-05', 'Ketlen Teles', 8, 2),
(24, 2, 5, 'Alunos prestes a ser reprovados pela não entrega do TCC.', 'Foi dada mais uma chance para que os alunos entregassem o TCC juntamente com a próxima turma.', '2015-11-10', '2018-08-05', 'Ketlen Teles', 8, 2),
(25, 2, 18, 'Plágio em trabalhos.', 'Foi feito um vídeo explicativo sobre o assunto, enviado para todos os polos. ', '2014-05-03', '2018-08-05', 'Ketlen Teles', 8, 8),
(26, 1, 18, 'Plágio em trabalho final de curso', 'Foi dada uma nova chance para a aluna, mas a mesma continuou entregando o trabalho com plágio. ', '2016-12-04', '2018-08-05', 'Ketlen Teles', 8, 8),
(27, 1, 18, 'Plágio cruzado entre polos.', 'Estabelecimento de critérios para correção quando houver plágio: o primeiro trabalho a ser postado será o válido, os outros que o plagiaram serão considerados invalidados.', '2018-07-16', '2018-08-05', 'Ketlen Teles', 8, 2),
(28, 3, 1, 'Solicitação de adiamento de atividades devido a problemas de energia.', 'Foi solicitado ao coordenador de polo e tutores presenciais um relatório sobre o problema. Ao constatar-se a veracidade do mesmo, foi feito o adiamento das atividades.', '2018-07-13', '2018-08-05', 'Ketlen Teles', 8, 2),
(29, 2, 6, 'Evasão de alunos devido a grande oferta de outros cursos.', 'Coordenador do curso foi até o polo para se reunir com alunos e alertar sobre os benefícios de concluir o curso.', '2017-07-11', '2018-08-05', 'Ketlen Teles', 8, 2),
(30, 2, 15, 'Chantagem infundada de alunos. Alegação de serem prejudicados por causa de deficiência na infraestrutura do polo. Exigiam tratamento diferenciado.', 'Foi realizada uma reunião com alunos, coordenador de polo, coordenador de curso e tutores presenciais para informar que a exigência era infundada pois as condições de infraestrutura eram iguais a todos os polos.', '2014-05-03', '2018-08-05', 'Ketlen Teles', 8, 8),
(31, 1, 14, 'Devido ao uso não organizado de material didático, o aluno se prejudicava e comprometia o desempenho nas atividades avaliativas.', 'Foi elaborado pelo coordenador de tutor e pelo coordenador de curso um guia de utilização de material didático do curso. Cada tutor presencial teve que montar um cronograma com sugestões de datas para utilização de cada recurso didático, organização de leitura dos textos e estudos gerais.', '2016-12-04', '2018-08-05', 'Ketlen Teles', 8, 2),
(32, 1, 13, 'Alunos do início do curso reclamaram de muita dificuldade em realizar atividades do AVA dentro do prazo solicitado.', 'O coordenador de curso foi em todos os polos realizar palestras de orientação de organização dos estudos. As sugestões foram em relação a administração do tempo, adiantamento de tarefas, montagem de cronograma individual e foco no cumprimento de prazos.', '2018-05-08', '2018-08-05', 'Ketlen Teles', 8, 2);

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
(10, 'O coordenador de curso se deslocou até o polo levando os vídeos em formato de DVD, para serem exibidos para os alunos.', 'Vídeos DVD, visita ao polo', '- Contato do coordenador de polo com o coordenador de curso, para relato do problema e tomada de decisões.\r\n- Providência para viagem do coordenador de curso ao polo.\r\n- Cópia dos vídeos em mídia DVD.', 'Sim', 'Sim', 'Passagem aérea, diárias, mídia DVD', 'Não houve', 'Coordenador do curso, coordenador de polo', NULL),
(11, 'Comprometimento da comunicação entre alunos, professores e mediadores.', 'Intervenção.', '- Coordenador de curso realizou uma reunião online com os tutores presenciais e à distância, para expor o problema e discutir soluções.\r\n- Tutores à distância se comprometeram a estimular a interação nos fóruns através de mensagens e questionamentos diretos aos alunos.\r\n- Tutores presenciais incentivaram diretamente o aluno a participar dos fóruns, explicando a importância da interação.\r\n', 'Sim', 'Sim', 'Nenhum', 'Melhoria na comunicação na sala virtual.', 'Coordenador do curso, coordenador de tutores, tutor presencial, tutor à distância.', NULL),
(12, 'Foi criado um formulário de norma de aplicação de prova, com regras para alunos e responsáveis pela aplicação das avaliações.', 'Norma de aplicação de prova.', '- Foi realizada uma reunião com alunos, tutores e coordenador de curso, para discutirem o problema.\r\n- As regras de procedimento em provas e avaliações foram estabelecidas formalmente.\r\n- Uma nova prova foi aplicada em substituição à anterior.\r\n- Foi criado um formulário de norma de aplicação de prova, com regras para alunos e responsáveis pela aplicação das avaliações.\r\n', 'Sim', 'Sim', 'Nenhum', 'Os alunos passaram a se preparar melhor para as provas finais.', 'Coordenador do curso, coordenador de polo, professores, tutores.', NULL),
(13, 'A situação da aluna foi deixada em aberto e posteriormente foi permitido à mesma submeter um novo trabalho para conclusão do curso.', 'Situação em aberto.', '- Após a constatação do plágio, a aluna foi informada que o trabalho não seria aceito.\r\n- Foi dada uma chance no mesmo período para a aluna refazer e entregar um novo trabalho.\r\n- A aluna não quis essa opção e a situação da mesma ficou em aberto.\r\n- Após um ano, a aluna entregou um novo TCC, defendeu e terminou o curso.\r\n', 'Sim', 'Sim', 'Nenhum', 'Não houve.', 'Coordenador de curso, professor.', NULL),
(14, 'Foi criado um mini-polo em Santa Izabel do Rio Negro, e os professores que iam para São Gabriel da Cachoeira também se deslocavam para esse outro município, exclusivamente para atender esses alunos.', 'Mini-polo, adaptação de calendário, adaptação de conteúdo.', '- Professores se propuseram a ir ao município para atender o grupo.\r\n- Adaptação no conteúdo e avaliação para o grupo, devido às dificuldades do grupo com o Português, pois se tratavam de indígenas.\r\n- Viagens frequentes do tutor de São Gabriel da Cachoeira à para atender o grupo.\r\n', 'Sim', 'Sim', 'Nenhum', 'Não houve', 'Diretor, coordenador adjunto, coordenador de curso, professor, tutor à distância, tutor presencial.', NULL),
(15, 'Correção das informações no SISUAB.', 'Repasse dos recursos para a Unisol.', '- Ligações diárias para o setor responsável e acompanhamento da emissão de passagens e diárias.\r\n- Acordo com professores para aceitarem receber posteriormente as diárias.\r\n- Repasse dos recursos para a Unisol.\r\n', 'Sim', 'Sim', 'Nenhum', 'Não houve', 'Diretor, coordenador de graduação, coordenador de curso, professores.', NULL),
(16, 'As passagens tiveram que ser compradas em regime de urgência para que o planejamento não ficasse totalmente comprometido.', 'Compra de passagens, urgência.', '- O Coordenador de curso e o diretor interviram para agilizar o processo de compra de passagens.\r\n- As passagens foram compradas em regime de urgência.\r\n', 'Sim', 'Sim', 'Financeiros, devido a remarcação dos voos.', 'Atraso no calendário de atividades do curso.', 'Coordenador de graduação, diretor, coordenador do curso.', NULL),
(17, 'Foi dada mais uma chance para que os alunos entregassem o TCC juntamente com a próxima turma.', 'Entrega em data posterior.', '- Reunião com Coordenador de graduação e coordenador de curso para decidir a questão.\r\n- Acerto com alunos para que os mesmos se comprometessem a entregar o TCC no próximo período. \r\n- Rematrícula dos alunos na próxima turma do curso.\r\n\r\n', 'Sim', 'Sim', 'Nenhum', 'Não houve', 'Coordenador do curso, tutores.', NULL),
(18, 'Foi exigido um vídeo do aluno relatando o levantamento da escola do estágio de forma oral, além do relatório escrito.', 'Vídeo.', '- Foi decidido que, para se evitar fraudes, seria exigido um vídeo do aluno relatando as atividades das disciplinas Estágio Curricular I, II e III, além do relatório final.', 'Sim', 'Sim', 'Nenhum', 'Acréscimo de mais uma atividade para avaliação e correção.', 'Coordenador de curso, professor.', NULL),
(19, 'Atividade avaliativa para o dia da aula presencial da disciplina Introdução Disciplinar.', 'Atividade avaliativa.', '- Foi estabelecida uma atividade avaliativa para o dia da aula presencial da disciplina Introdução Disciplinar.\r\n- A atividade devia ser entregue via AVA.\r\n- Para os alunos que faltavam a aula presencial, a avaliação teve a pontuação reduzida.\r\n', 'Sim', 'Sim', 'Nenhum', 'Mais uma atividade para correção.', 'Coordenador de curso, professor, tutor presencial.', NULL),
(20, 'Estabelecimento de critérios objetivos de correção de cada atividade.', 'Critérios de correção.', '- O Coordenador de curso, juntamente com os professores resolveram estabelecer critérios objetivos de correção para as atividades avaliativas.\r\n- Os alunos foram informados desses critérios e os itens de avaliação foram devidamente explicados para que não houvesse dúvidas.\r\n', 'Sim', 'Sim', 'Nenhum', 'Estabelecimento de critérios em todas as atividades das disciplinas.', 'Coordenador de curso, professores.', NULL),
(21, 'Foi criada na sala virtual principal do curso, um Fórum de Envio e Recebimento de Documentos, para que os alunos enviassem de forma digital os requerimentos e os documentos comprobatórios de sua solicitação.', 'Fórum de envio e recebimento de documentos.', '- O Coordenador de curso criou um fórum exclusivamente para envio e recebimento de documentos.\r\n- Foi disponibilizado nesse fórum um formulário específico para que o aluno pudesse escrever a sua solicitação com mais detalhes.\r\n', 'Sim', 'Sim', 'Nenhum.', 'Mais agilidade no recebimento e análise de solicitações formais.', 'Coordenador de curso, coordenador de tutores, tutor presencial, tutor à distância.', NULL),
(22, 'Foi dada mais uma chance para que os alunos entregassem o TCC juntamente com a próxima turma.', 'Entrega em data posterior, rematrícula.', '- Reunião com Coordenador de graduação e coordenador de curso para decidir a questão.\r\n- Acerto com alunos para que os mesmos se comprometessem a entregar o TCC no próximo período. \r\n- Rematrícula dos alunos na próxima turma do curso.\r\n', 'Sim', 'Sim', 'Nenhum.', 'Não houve.', 'Coordenador do curso, tutor presencial e tutor à distância.', NULL),
(23, 'Foi feito um vídeo explicativo sobre o assunto, enviado para todos os polos. ', 'Vídeo.', '-  Foi feito um vídeo explicativo sobre o assunto e enviado para todos os polos. \r\n- Nos primeiros períodos do curso foi considerada uma certa tolerância nos trabalhos. \r\n- Os alunos foram avisados de que a partir do 3º período a correção seria mais rigorosa em relação a plágios.\r\n', 'Sim', 'Sim', 'Nenhum.', 'Não houve.', 'Coordenador de curso, professor, tutor presencial.', NULL),
(24, 'Foi dada uma nova chance para a aluna, mas a mesma continuou entregando o trabalho com plágio. ', 'Reprovação.', '- Foi dada uma nova chance para a aluna entregar um trabalho válido, mas ela entregou novamente um com plágio.\r\n- A aluna foi reprovada.\r\n', 'Sim', 'Sim', 'Nenhum.', 'Não houve.', 'Coordenador de graduação, coordenador de curso.', NULL),
(25, 'Estabelecimento de critérios para correção quando houver plágio: o primeiro trabalho a ser postado será o válido, os outros que o plagiaram serão considerados invalidados.', 'Critérios de correção para trabalhos com plágio.', '- O Coordenador de curso, juntamente com os professores resolveram determinar critérios para trabalhos plagiados.\r\n- O primeiro trabalho a ser postado será o válido, os outros que o plagiaram serão considerados invalidados.\r\n- Divulgação das leis de plágio.\r\n- Em alguns casos, se houver reclamação por parte dos alunos envolvidos, será checado com o tutor presencial o histórico e o desempenho desses alunos, para se tentar chegar a uma solução justa.\r\n', 'Sim', 'Sim', 'Nenhum.', 'Estabelecimento de critérios para correção para trabalhos com plágio entre si.', 'Coordenador de curso, professores, tutor presencial.', NULL),
(26, 'Foi solicitado ao coordenador de polo e tutores presenciais um relatório sobre o problema. Ao constatar-se a veracidade do mesmo, foi feito o adiamento das atividades.', 'Adiamento, relatório.', '- O Coordenador de curso solicitou um relatório sobre o caso ao coordenador de polo e tutores presenciais.\r\n- Constatado o problema, optou-se pelo adiamento das atividades pelo mesmo período em que houve a ausência de energia elétrica.\r\n', 'Sim', 'Sim', 'Nenhum.', 'Atraso no recebimento das atividades somente para o polo.', 'Coordenador de curso, coordenador de tutores, tutor presencial.', NULL),
(27, 'Coordenador do curso foi até o polo para se reunir com alunos e alertar sobre os benefícios de concluir o curso.', 'Reunião com alunos.', '- Reunião do coordenador de curso com alunos para falar sobre a importância de concluir o curso.\r\n- Depoimentos de professores e egressos sobre a profissão e as possibilidades do curso.\r\n', 'Sim', 'Sim', 'Financeiros.', 'Não houve.', 'Coordenador do curso, coordenador de polo, tutor presencial.', NULL),
(28, 'Foi realizada uma reunião com alunos, coordenador de polo, coordenador de curso e tutores presenciais para informar que a exigência era infundada pois as condições de infraestrutura eram iguais a todos os polos.', 'Reunião para esclarecimentos.', '-  Foi realizada uma reunião com alunos, coordenador de polo, coordenador de curso e tutores presenciais para informar que a exigência era infundada pois as condições de infraestrutura eram iguais a todos os polos.\r\n- Foram mostradas a realidade dos outros polos e foi feita a comparação com o polo em questão. \r\n- Professores e tutores presencias e à distância foram alertados para não fazerem nenhuma diferenciação de tratamento e avaliação com os alunos deste polo.\r\n', 'Sim', 'Sim', 'Nenhum.', 'Não houve.', 'Coordenador de curso, coordenador de polo, professor, tutor presencial, tutor à distância', NULL),
(29, 'Foi elaborado pelo coordenador de tutor e pelo coordenador de curso um guia de utilização de material didático do curso. Cada tutor presencial teve que montar um cronograma com sugestões de datas para utilização de cada recurso didático, organização de leitura dos textos e estudos gerais.', 'Material didático.', '- Criação de um Guia de utilização de material didático.\r\n- Cada tutor presencial elaborou um cronograma com sugestões de datas para utilização de cada recurso didático, organização de leitura dos textos e estudos gerais.\r\n', 'Sim', 'Sim', 'Nenhum.', 'Organização de estudos.', 'Coordenador de curso, coordenador de tutor, tutor presencial.', NULL),
(30, 'O coordenador de curso foi em todos os polos realizar palestras de orientação de organização dos estudos. As sugestões foram em relação a administração do tempo, adiantamento de tarefas, montagem de cronograma individual e foco no cumprimento de prazos.', 'Palestra de orientação, cronograma individual.', '- Viagem do coordenador de curso a todos os polos para realizar palestras de orientação de organização dos estudos. \r\n- Sugestões: administração do tempo, adiantamento de tarefas, montagem de cronograma individual e foco no cumprimento de prazos.\r\n- Orientação a tutores presenciais para acompanhamento individual do cumprimento dos prazos.\r\n', 'Sim', 'Sim', 'Nenhum.', 'Melhoria no cumprimento de prazos das atividades no AVA.', 'Coordenador de curso, Coordenador de polo, tutor presencial.', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_problema`
--

CREATE TABLE `tipo_problema` (
  `id` int(111) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(14, 'Conteúdo'),
(15, 'Infraestrutura'),
(16, 'Logística'),
(17, 'Extravio'),
(18, 'Plágio');

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
  `id_curso` int(10) UNSIGNED DEFAULT '0',
  `id_tutor` int(10) UNSIGNED DEFAULT '0',
  `id_aplicativo` int(10) UNSIGNED DEFAULT '0'
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(200) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL DEFAULT '',
  `perfil` varchar(200) NOT NULL DEFAULT '',
  `senha` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `perfil`, `senha`) VALUES
(1, 'Usuário Especialista', 'ketlen.teles@gmail.com ', 'Especialista', '0192023a7bbd73250516f069df18b500'),
(2, 'Usuário Mediador', 'tammyhikari@gmail.com', 'Mediador/a', '0192023a7bbd73250516f069df18b500');

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
  ADD KEY `fk_disciplina_professor_idx` (`id_professor`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id_imagem`);

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
  ADD KEY `fk_turma_aplicativo_idx` (`id_aplicativo`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`),
  ADD KEY `fk_tutor_turma_idx` (`id_turma`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_curso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `descricao`
--
ALTER TABLE `descricao`
  MODIFY `id_descricao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_caso`
--
ALTER TABLE `info_caso`
  MODIFY `id_infoc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pesquisas`
--
ALTER TABLE `pesquisas`
  MODIFY `id_pesquisa` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_relator` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resposta_esp`
--
ALTER TABLE `resposta_esp`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `solucao`
--
ALTER TABLE `solucao`
  MODIFY `id_solucao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tipo_problema`
--
ALTER TABLE `tipo_problema`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `titulo_problema`
--
ALTER TABLE `titulo_problema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  ADD CONSTRAINT `fk_curso_polo` FOREIGN KEY (`id_polo`) REFERENCES `polo` (`id_polo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_turma_polo` FOREIGN KEY (`id_polo`) REFERENCES `polo` (`id_polo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `fk_tutor_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
