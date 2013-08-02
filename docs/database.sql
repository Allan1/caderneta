SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `database_name` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `database_name` ;

-- -----------------------------------------------------
-- Table `database_name`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_name`.`users` ;

CREATE  TABLE IF NOT EXISTS `database_name`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `database_name`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `database_name`;
INSERT INTO `database_name`.`users` (`id`, `name`, `username`, `password`, `created`, `modified`) VALUES (1, 'Admin', 'admin', '70f5d1dc3e07b6f61e9522c8b2f434d312d26666', '1970-01-01 00:00:00', NULL);

COMMIT;
