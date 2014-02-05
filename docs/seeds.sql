-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 05-Fev-2014 às 16:03
-- Versão do servidor: 5.6.12
-- versão do PHP: 5.5.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `caderneta_eletronica`
--
CREATE DATABASE IF NOT EXISTS `caderneta_eletronica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `caderneta_eletronica`;

--
-- Extraindo dados da tabela `disciplines`
--

INSERT INTO `disciplines` (`code`, `name`, `course_load`, `minimal_attendance`) VALUES
('MATA40', 'Estrutura de Dados', 68, 20),
('MATA60', 'Banco de Dados', 68, 20),
('MATA63', 'Engenharia de Software 2', 68, 20);

--
-- Extraindo dados da tabela `evaluations`
--

INSERT INTO `evaluations` (`id`, `number`, `date`, `weight`, `schoolclasse_id`, `evaluationtype_id`) VALUES
(1, 1, '2014-02-05 12:53:00', 4, 3, 1),
(2, 2, '2014-02-05 12:53:00', 6, 3, 1);

--
-- Extraindo dados da tabela `evaluationtypes`
--

INSERT INTO `evaluationtypes` (`id`, `name`) VALUES
(1, 'prova'),
(2, 'teste'),
(3, 'trabalho'),
(4, 'seminário');

--
-- Extraindo dados da tabela `grades`
--

INSERT INTO `grades` (`id`, `value`, `evaluation_id`, `schoolclasses_student_id`) VALUES
(1, 5, 1, 1),
(2, 7, 2, 1),
(3, 8, 1, 2),
(4, 5, 2, 2),
(5, 7, 1, 3),
(6, 5, 2, 3);

--
-- Extraindo dados da tabela `professors`
--

INSERT INTO `professors` (`siape`, `user_id`) VALUES
(1, 5),
(234234, 6),
(34343, 7);

--
-- Extraindo dados da tabela `professors_schoolclasses`
--

INSERT INTO `professors_schoolclasses` (`id`, `professor_siape`, `schoolclasse_id`) VALUES
(2, 1, 1),
(5, 34343, 3),
(7, 234234, 2);

--
-- Extraindo dados da tabela `schoolclasses`
--

INSERT INTO `schoolclasses` (`id`, `code`, `semester`, `discipline_code`) VALUES
(1, '1', '20132', 'MATA60'),
(2, '1', '20132', 'MATA63'),
(3, '1', '20132', 'MATA40');

--
-- Extraindo dados da tabela `schoolclasses_students`
--

INSERT INTO `schoolclasses_students` (`id`, `schoolclasse_id`, `student_enrolment`, `attendance`) VALUES
(1, 3, 211100666, 3),
(2, 3, 200000001, 2),
(3, 3, 200000000, 5);

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
(5, 'Vaninha', 'vaninha@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '5', 0),
(6, 'Rita Suzana', 'rita@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '12123', 0),
(7, 'Flavio Assis', 'flavio@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '23434332', 0);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;