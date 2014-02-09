-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
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

-- --------------------------------------------------------

--
-- Estrutura para visualizar `visao_students`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `visao_students` AS select `schoolclasses`.`discipline_code` AS `discipline_code`,`schoolclasses`.`semester` AS `semester`,`schoolclasses`.`code` AS `code`,`users`.`name` AS `name`,`students`.`enrolment` AS `enrolment`,`schoolclasses_students`.`attendance` AS `attendance` from (((`schoolclasses_students` join `students`) join `schoolclasses`) join `users`) where ((`users`.`id` = `students`.`user_id`) and (`students`.`user_id` = `users`.`id`) and (`students`.`enrolment` = `schoolclasses_students`.`student_enrolment`) and (`schoolclasses`.`id` = `schoolclasses_students`.`schoolclasse_id`));

--
-- VIEW  `visao_students`
-- Dados: Nenhum
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
