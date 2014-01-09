-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 09/01/2014 às 02:59:58
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `caderneta_eletronica`
--

--
-- Extraindo dados da tabela `disciplines`
--

INSERT INTO `disciplines` (`code`, `name`, `course_load`, `minimal_attendance`) VALUES
('MATA40', 'Estrutura de Dados', 68, 20),
('MATA60', 'Banco de Dados', 68, 20),
('MATA63', 'Engenharia de Software 2', 68, 20);

--
-- Extraindo dados da tabela `evaluationtypes`
--

INSERT INTO `evaluationtypes` (`id`, `name`) VALUES
(1, 'Prova'),
(2, 'Teste'),
(3, 'Trabalho'),
(4, 'Projeto'),
(5, 'SeminÃ¡rio');

--
-- Extraindo dados da tabela `professors`
--

INSERT INTO `professors` (`siape`, `user_id`) VALUES
(1, 5);

--
-- Extraindo dados da tabela `professors_schoolclasses`
--

INSERT INTO `professors_schoolclasses` (`id`, `professor_siape`, `schoolclasse_id`) VALUES
(1, 1, 1),
(3, 1, 8);

--
-- Extraindo dados da tabela `schoolclasses`
--

INSERT INTO `schoolclasses` (`id`, `code`, `semester`, `discipline_code`) VALUES
(1, '1', '20132', 'MATA60'),
(2, '1', '20132', 'MATA63'),
(3, '1', '20132', 'MATA40'),
(8, '1', '20131', 'MATA60');

--
-- Extraindo dados da tabela `schoolclasses_students`
--

INSERT INTO `schoolclasses_students` (`id`, `schoolclasse_id`, `student_enrolment`, `attendance`) VALUES
(1, 1, 211100666, 1),
(2, 1, 200000000, 0),
(3, 1, 200000001, 0),
(8, 8, 211100666, 0),
(9, 8, 200000000, 0),
(10, 8, 200000001, 0);

--
-- Extraindo dados da tabela `students`
--

INSERT INTO `students` (`enrolment`, `user_id`) VALUES
(211100666, 1),
(200000000, 2),
(200000001, 3);

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `cpf`, `admin`) VALUES
(1, 'Allan', 'allanoliveira.main@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '1', 0),
(2, 'Elvis', 'elvis@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '2', 0),
(3, 'Fernando', 'nando@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '3', 0),
(4, 'Admin', 'admin@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '4', 1),
(5, 'Vaninha', 'vaninha@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '5', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
