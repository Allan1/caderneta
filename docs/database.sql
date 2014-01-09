SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `caderneta_eletronica` ;
CREATE SCHEMA IF NOT EXISTS `caderneta_eletronica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `caderneta_eletronica` ;

-- -----------------------------------------------------
-- Table `caderneta_eletronica`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caderneta_eletronica`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `cpf` VARCHAR(11) NOT NULL ,
  `admin` TINYINT(1) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caderneta_eletronica`.`professors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caderneta_eletronica`.`professors` (
  `siape` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`siape`) ,
  INDEX `fk_professors_persons1` (`user_id` ASC) ,
  UNIQUE INDEX `siape_UNIQUE` (`siape` ASC) ,
  CONSTRAINT `fk_professors_persons1`
    FOREIGN KEY (`user_id` )
    REFERENCES `caderneta_eletronica`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caderneta_eletronica`.`disciplines`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caderneta_eletronica`.`disciplines` (
  `code` VARCHAR(10) NOT NULL ,
  `name` VARCHAR(200) NOT NULL ,
  `course_load` INT NOT NULL ,
  `minimal_attendance` INT NOT NULL ,
  PRIMARY KEY (`code`) ,
  UNIQUE INDEX `code_UNIQUE` (`code` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caderneta_eletronica`.`educationplans`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caderneta_eletronica`.`educationplans` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `objetives` TEXT NOT NULL ,
  `disciplines_code` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_educationplans_disciplines1` (`disciplines_code` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  CONSTRAINT `fk_educationplans_disciplines1`
    FOREIGN KEY (`disciplines_code` )
    REFERENCES `caderneta_eletronica`.`disciplines` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caderneta_eletronica`.`students`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caderneta_eletronica`.`students` (
  `enrolment` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`enrolment`) ,
  INDEX `fk_students_persons1` (`user_id` ASC) ,
  UNIQUE INDEX `enrolment_UNIQUE` (`enrolment` ASC) ,
  CONSTRAINT `fk_students_persons1`
    FOREIGN KEY (`user_id` )
    REFERENCES `caderneta_eletronica`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caderneta_eletronica`.`schoolclasses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caderneta_eletronica`.`schoolclasses` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `code` VARCHAR(10) NOT NULL ,
  `semester` VARCHAR(5) NOT NULL ,
  `discipline_code` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_classes_disciplines1` (`discipline_code` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  CONSTRAINT `fk_classes_disciplines1`
    FOREIGN KEY (`discipline_code` )
    REFERENCES `caderneta_eletronica`.`disciplines` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caderneta_eletronica`.`schoolclasses_students`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caderneta_eletronica`.`schoolclasses_students` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `schoolclasse_id` INT NOT NULL ,
  `student_enrolment` INT NOT NULL ,
  `attendance` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_classes_has_students_students1` (`student_enrolment` ASC) ,
  INDEX `fk_classes_has_students_classes1` (`schoolclasse_id` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  CONSTRAINT `fk_classes_has_students_classes1`
    FOREIGN KEY (`schoolclasse_id` )
    REFERENCES `caderneta_eletronica`.`schoolclasses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_classes_has_students_students1`
    FOREIGN KEY (`student_enrolment` )
    REFERENCES `caderneta_eletronica`.`students` (`enrolment` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caderneta_eletronica`.`professors_schoolclasses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caderneta_eletronica`.`professors_schoolclasses` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `professor_siape` INT NOT NULL ,
  `schoolclasse_id` INT NOT NULL ,
  INDEX `fk_professors_has_classes_classes1` (`schoolclasse_id` ASC) ,
  INDEX `fk_professors_has_classes_professors1` (`professor_siape` ASC) ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  CONSTRAINT `fk_professors_has_classes_professors1`
    FOREIGN KEY (`professor_siape` )
    REFERENCES `caderneta_eletronica`.`professors` (`siape` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professors_has_classes_classes1`
    FOREIGN KEY (`schoolclasse_id` )
    REFERENCES `caderneta_eletronica`.`schoolclasses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caderneta_eletronica`.`evaluationtypes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caderneta_eletronica`.`evaluationtypes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caderneta_eletronica`.`evaluations`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caderneta_eletronica`.`evaluations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `number` INT NOT NULL ,
  `date` DATETIME NOT NULL ,
  `weight` INT NOT NULL ,
  `schoolclasse_id` INT NOT NULL ,
  `evaluationtype_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_evaluations_classes1` (`schoolclasse_id` ASC) ,
  INDEX `fk_evaluations_evaluationtypes1` (`evaluationtype_id` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  CONSTRAINT `fk_evaluations_classes1`
    FOREIGN KEY (`schoolclasse_id` )
    REFERENCES `caderneta_eletronica`.`schoolclasses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluations_evaluationtypes1`
    FOREIGN KEY (`evaluationtype_id` )
    REFERENCES `caderneta_eletronica`.`evaluationtypes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `caderneta_eletronica`.`grades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `caderneta_eletronica`.`grades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `value` FLOAT NOT NULL ,
  `evaluation_id` INT NOT NULL ,
  `schoolclasses_student_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_grades_evaluations1` (`evaluation_id` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_grades_classes_students1` (`schoolclasses_student_id` ASC) ,
  CONSTRAINT `fk_grades_evaluations1`
    FOREIGN KEY (`evaluation_id` )
    REFERENCES `caderneta_eletronica`.`evaluations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grades_classes_students1`
    FOREIGN KEY (`schoolclasses_student_id` )
    REFERENCES `caderneta_eletronica`.`schoolclasses_students` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `caderneta_eletronica`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `caderneta_eletronica`;
INSERT INTO `caderneta_eletronica`.`users` (`id`, `name`, `email`, `password`, `cpf`, `admin`) VALUES (1, 'Allan', 'allanoliveira.main@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '1', 0);
INSERT INTO `caderneta_eletronica`.`users` (`id`, `name`, `email`, `password`, `cpf`, `admin`) VALUES (2, 'Elvis', 'elvis@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '2', 0);
INSERT INTO `caderneta_eletronica`.`users` (`id`, `name`, `email`, `password`, `cpf`, `admin`) VALUES (3, 'Fernando', 'nando@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '3', 0);
INSERT INTO `caderneta_eletronica`.`users` (`id`, `name`, `email`, `password`, `cpf`, `admin`) VALUES (4, 'Admin', 'admin@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '4', 1);
INSERT INTO `caderneta_eletronica`.`users` (`id`, `name`, `email`, `password`, `cpf`, `admin`) VALUES (5, 'Vaninha', 'vaninha@gmail.com', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '5', 0);

COMMIT;

-- -----------------------------------------------------
-- Data for table `caderneta_eletronica`.`professors`
-- -----------------------------------------------------
START TRANSACTION;
USE `caderneta_eletronica`;
INSERT INTO `caderneta_eletronica`.`professors` (`siape`, `user_id`) VALUES (1, 5);

COMMIT;

-- -----------------------------------------------------
-- Data for table `caderneta_eletronica`.`disciplines`
-- -----------------------------------------------------
START TRANSACTION;
USE `caderneta_eletronica`;
INSERT INTO `caderneta_eletronica`.`disciplines` (`code`, `name`, `course_load`, `minimal_attendance`) VALUES ('MATA60', 'Banco de Dados', 68, 20);
INSERT INTO `caderneta_eletronica`.`disciplines` (`code`, `name`, `course_load`, `minimal_attendance`) VALUES ('MATA63', 'Engenharia de Software 2', 68, 20);
INSERT INTO `caderneta_eletronica`.`disciplines` (`code`, `name`, `course_load`, `minimal_attendance`) VALUES ('MATA40', 'Estrutura de Dados', 68, 20);

COMMIT;

-- -----------------------------------------------------
-- Data for table `caderneta_eletronica`.`students`
-- -----------------------------------------------------
START TRANSACTION;
USE `caderneta_eletronica`;
INSERT INTO `caderneta_eletronica`.`students` (`enrolment`, `user_id`) VALUES (211100666, 1);
INSERT INTO `caderneta_eletronica`.`students` (`enrolment`, `user_id`) VALUES (200000000, 2);
INSERT INTO `caderneta_eletronica`.`students` (`enrolment`, `user_id`) VALUES (200000001, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `caderneta_eletronica`.`schoolclasses`
-- -----------------------------------------------------
START TRANSACTION;
USE `caderneta_eletronica`;
INSERT INTO `caderneta_eletronica`.`schoolclasses` (`id`, `code`, `semester`, `discipline_code`) VALUES (1, '1', '20132', 'MATA60');
INSERT INTO `caderneta_eletronica`.`schoolclasses` (`id`, `code`, `semester`, `discipline_code`) VALUES (2, '1', '20132', 'MATA63');
INSERT INTO `caderneta_eletronica`.`schoolclasses` (`id`, `code`, `semester`, `discipline_code`) VALUES (3, '1', '20132', 'MATA40');

COMMIT;
