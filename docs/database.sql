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


-- -----------------------------------------------------
-- Placeholder table for view `caderneta_eletronica`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caderneta_eletronica`.`view1` (`discipline_code` INT, `semester` INT, `code` INT, `name` INT, `enrolment` INT, `attendance` INT, `minimal_attendance` INT);

-- -----------------------------------------------------
-- Placeholder table for view `caderneta_eletronica`.`view2`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `caderneta_eletronica`.`view2` (`discipline_code` INT, `semester` INT, `code` INT, `weight` INT, `grade` INT, `enrolment` INT, `name` INT);

-- -----------------------------------------------------
-- View `caderneta_eletronica`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `caderneta_eletronica`.`view1`;
USE `caderneta_eletronica`;
CREATE  OR REPLACE VIEW `caderneta_eletronica`.`view1` AS
select 
	`schoolclasses`.`discipline_code` AS `discipline_code`,
	`schoolclasses`.`semester` AS `semester`,
	`schoolclasses`.`code` AS `code`,
	`users`.`name` AS `name`,
	`students`.`enrolment` AS `enrolment`,
	`schoolclasses_students`.`attendance` AS `attendance`,
	`disciplines`.`minimal_attendance` AS `minimal_attendance`
from 
	(					
		`schoolclasses_students` join 
		`students` ON (`students`.`enrolment` = `schoolclasses_students`.`student_enrolment`) join 
		`schoolclasses` ON (`schoolclasses`.`id` = `schoolclasses_students`.`schoolclasse_id`) join 
		`users` ON (`students`.`user_id` = `users`.`id`) join
		`disciplines` ON (`schoolclasses`.`discipline_code` = `disciplines`.`code`)
	) 
where (
	`schoolclasses_students`.`attendance` < `disciplines`.`minimal_attendance`
);

-- -----------------------------------------------------
-- View `caderneta_eletronica`.`view2`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `caderneta_eletronica`.`view2`;
USE `caderneta_eletronica`;
CREATE  OR REPLACE VIEW `caderneta_eletronica`.`view2` AS
select 	
	`schoolclasses`.`discipline_code` AS `discipline_code`,
	`schoolclasses`.`semester` AS `semester`,
	`schoolclasses`.`code` AS `code`,
	`evaluations`.`weight` AS `weight`,
	`grades`.`value` AS `grade`,
	`students`.`enrolment` AS `enrolment`,
	`users`.`name` AS `name`
from 					
		`schoolclasses_students` join 
		`grades` ON (`grades`.`schoolclasses_student_id` = `schoolclasses_students`.`id`) join
		`students` ON (`students`.`enrolment` = `schoolclasses_students`.`student_enrolment`) join 
		`schoolclasses` ON (`schoolclasses`.`id` = `schoolclasses_students`.`schoolclasse_id`) join 
		`users` ON (`students`.`user_id` = `users`.`id`) join
		`evaluations` ON (`schoolclasses`.`id` = `evaluations`.`schoolclasse_id`)
where 	
	`users`.`name` = "Allan"
group by
	`grades`.`id`
;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
