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

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplines`
--

CREATE TABLE IF NOT EXISTS `disciplines` (
  `code` varchar(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `course_load` int(11) NOT NULL,
  `minimal_attendance` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `educationplans`
--

CREATE TABLE IF NOT EXISTS `educationplans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objetives` text NOT NULL,
  `disciplines_code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_educationplans_disciplines1` (`disciplines_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evaluations`
--

CREATE TABLE IF NOT EXISTS `evaluations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `weight` int(11) NOT NULL,
  `schoolclasse_id` int(11) NOT NULL,
  `evaluationtype_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_evaluations_classes1` (`schoolclasse_id`),
  KEY `fk_evaluations_evaluationtypes1` (`evaluationtype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evaluationtypes`
--

CREATE TABLE IF NOT EXISTS `evaluationtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` float NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `schoolclasses_student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_grades_evaluations1` (`evaluation_id`),
  KEY `fk_grades_classes_students1` (`schoolclasses_student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professors`
--

CREATE TABLE IF NOT EXISTS `professors` (
  `siape` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`siape`),
  UNIQUE KEY `siape_UNIQUE` (`siape`),
  KEY `fk_professors_persons1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professors_schoolclasses`
--

CREATE TABLE IF NOT EXISTS `professors_schoolclasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_siape` int(11) NOT NULL,
  `schoolclasse_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_professors_has_classes_classes1` (`schoolclasse_id`),
  KEY `fk_professors_has_classes_professors1` (`professor_siape`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `schoolclasses`
--

CREATE TABLE IF NOT EXISTS `schoolclasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `discipline_code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_classes_disciplines1` (`discipline_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `schoolclasses_students`
--

CREATE TABLE IF NOT EXISTS `schoolclasses_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolclasse_id` int(11) NOT NULL,
  `student_enrolment` int(11) NOT NULL,
  `attendance` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_classes_has_students_students1` (`student_enrolment`),
  KEY `fk_classes_has_students_classes1` (`schoolclasse_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `enrolment` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`enrolment`),
  UNIQUE KEY `enrolment_UNIQUE` (`enrolment`),
  KEY `fk_students_persons1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `educationplans`
--
ALTER TABLE `educationplans`
  ADD CONSTRAINT `fk_educationplans_disciplines1` FOREIGN KEY (`disciplines_code`) REFERENCES `disciplines` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `fk_evaluations_classes1` FOREIGN KEY (`schoolclasse_id`) REFERENCES `schoolclasses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluations_evaluationtypes1` FOREIGN KEY (`evaluationtype_id`) REFERENCES `evaluationtypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `fk_grades_evaluations1` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grades_classes_students1` FOREIGN KEY (`schoolclasses_student_id`) REFERENCES `schoolclasses_students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professors`
--
ALTER TABLE `professors`
  ADD CONSTRAINT `fk_professors_persons1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professors_schoolclasses`
--
ALTER TABLE `professors_schoolclasses`
  ADD CONSTRAINT `fk_professors_has_classes_professors1` FOREIGN KEY (`professor_siape`) REFERENCES `professors` (`siape`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professors_has_classes_classes1` FOREIGN KEY (`schoolclasse_id`) REFERENCES `schoolclasses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `schoolclasses`
--
ALTER TABLE `schoolclasses`
  ADD CONSTRAINT `fk_classes_disciplines1` FOREIGN KEY (`discipline_code`) REFERENCES `disciplines` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `schoolclasses_students`
--
ALTER TABLE `schoolclasses_students`
  ADD CONSTRAINT `fk_classes_has_students_classes1` FOREIGN KEY (`schoolclasse_id`) REFERENCES `schoolclasses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_classes_has_students_students1` FOREIGN KEY (`student_enrolment`) REFERENCES `students` (`enrolment`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_persons1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;