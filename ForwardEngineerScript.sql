-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ELIDEK_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ELIDEK_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ELIDEK_db` ;
USE `ELIDEK_db` ;

-- -----------------------------------------------------
-- Table `ELIDEK_db`.`Researcher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ELIDEK_db`.`Researcher` (
  `Researcher_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `date_of_birth` DATE NOT NULL,
  `sex` SET('Male', 'Female', 'other') NOT NULL,
  `Organization_id` INT NOT NULL,
  `work_date` DATE NOT NULL,
  PRIMARY KEY (`Researcher_id`),
  INDEX `fk_Researcher_Organization_idx` (`Organization_id` ASC) VISIBLE,
  CONSTRAINT `fk_Researcher_Organization`
    FOREIGN KEY (`Organization_id`)
    REFERENCES `ELIDEK_db`.`Organization` (`Organization_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ELIDEK_db`.`Organization`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ELIDEK_db`.`Organization` (
  `Organization_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `sort_name` VARCHAR(10) NOT NULL,
  `TK` INT(5) NOT NULL,
  `street` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `Type` SET('FIRM', 'UNIVERSITY', 'RESEARCH CENTER') NOT NULL,
  `Budget` INT NOT NULL check (Budget > 0),
  PRIMARY KEY (`Organization_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  UNIQUE INDEX `sort_name_UNIQUE` (`sort_name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ELIDEK_db`.`Researcher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ELIDEK_db`.`Researcher` (
  `Researcher_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `date_of_birth` DATE NOT NULL,
  `sex` SET('Male', 'Female', 'other') NOT NULL,
  `Organization_id` INT NOT NULL,
  `work_date` DATE NOT NULL,
  PRIMARY KEY (`Researcher_id`),
  INDEX `fk_Researcher_Organization_idx` (`Organization_id` ASC) VISIBLE,
  CONSTRAINT `fk_Researcher_Organization`
    FOREIGN KEY (`Organization_id`)
    REFERENCES `ELIDEK_db`.`Organization` (`Organization_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ELIDEK_db`.`OrganizationPhones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ELIDEK_db`.`OrganizationPhones` (
  `phone` VARCHAR(11) NOT NULL,
  `Organization_id` INT NOT NULL,
  INDEX `fk_OrganizationPhones_Organization1_idx` (`Organization_id` ASC) VISIBLE,
  CONSTRAINT `fk_OrganizationPhones_Organization1`
    FOREIGN KEY (`Organization_id`)
    REFERENCES `ELIDEK_db`.`Organization` (`Organization_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ELIDEK_db`.`Program`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ELIDEK_db`.`Program` (
  `Program_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `sector` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Program_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ELIDEK_db`.`Executive`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ELIDEK_db`.`Executive` (
  `Executive_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Executive_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ELIDEK_db`.`Projects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ELIDEK_db`.`Projects` (
  `Project_id` INT NOT NULL AUTO_INCREMENT,
  `Budget` INT NOT NULL check (Budget > 0),
  `Title` VARCHAR(75) NOT NULL,
  `Summary` TEXT NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  `duration` INT GENERATED ALWAYS AS (TIMESTAMPDIFF(YEAR,start_date,end_date)) STORED,
  `grade` INT NULL,
  `grade_date` DATE NULL,
  `Organization_id` INT NOT NULL,
  `Program_id` INT NOT NULL,
  `Executive_id` INT NOT NULL,
  `Responsible_id` INT NOT NULL,
  `Evaluator_id` INT NULL,
  PRIMARY KEY (`Project_id`),
  INDEX `fk_Projects_Organization1_idx` (`Organization_id` ASC) VISIBLE,
  INDEX `fk_Projects_Program1_idx` (`Program_id` ASC) VISIBLE,
  INDEX `fk_Projects_Executive1_idx` (`Executive_id` ASC) VISIBLE,
  INDEX `fk_Projects_Researcher1_idx` (`Responsible_id` ASC) VISIBLE,
  INDEX `fk_Projects_Researcher2_idx` (`Evaluator_id` ASC) VISIBLE,
  CONSTRAINT `fk_Projects_Organization1`
    FOREIGN KEY (`Organization_id`)
    REFERENCES `ELIDEK_db`.`Organization` (`Organization_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Projects_Program1`
    FOREIGN KEY (`Program_id`)
    REFERENCES `ELIDEK_db`.`Program` (`Program_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Projects_Executive1`
    FOREIGN KEY (`Executive_id`)
    REFERENCES `ELIDEK_db`.`Executive` (`Executive_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Projects_Responsible`
    FOREIGN KEY (`Responsible_id`)
    REFERENCES `ELIDEK_db`.`Researcher` (`Researcher_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Projects_Evaluator`
    FOREIGN KEY (`Evaluator_id`)
    REFERENCES `ELIDEK_db`.`Researcher` (`Researcher_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ELIDEK_db`.`Deliverable`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ELIDEK_db`.`Deliverable` (
  `Deliverable_id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `Title` VARCHAR(70) NOT NULL,
  `Summary` TEXT NOT NULL,
  `Project_id` INT NOT NULL,
  UNIQUE INDEX `Title_UNIQUE` (`Title` ASC) VISIBLE,
  PRIMARY KEY (`Deliverable_id`),
  INDEX `fk_Deliverable_Projects1_idx` (`Project_id` ASC) VISIBLE,
  CONSTRAINT `fk_Deliverable_Projects1`
    FOREIGN KEY (`Project_id`)
    REFERENCES `ELIDEK_db`.`Projects` (`Project_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ELIDEK_db`.`Field`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ELIDEK_db`.`Field` (
  `Field_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Field_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ELIDEK_db`.`Projects_has_Field`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ELIDEK_db`.`Projects_has_Field` (
  `Project_id` INT NOT NULL,
  `Field_id` INT NOT NULL,
  PRIMARY KEY (`Project_id`, `Field_id`),
  INDEX `fk_Projects_has_Field_Field1_idx` (`Field_id` ASC) VISIBLE,
  INDEX `fk_Projects_has_Field_Projects1_idx` (`Project_id` ASC) VISIBLE,
  CONSTRAINT `fk_Projects_has_Field_Projects1`
    FOREIGN KEY (`Project_id`)
    REFERENCES `ELIDEK_db`.`Projects` (`Project_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Projects_has_Field_Field1`
    FOREIGN KEY (`Field_id`)
    REFERENCES `ELIDEK_db`.`Field` (`Field_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ELIDEK_db`.`Researcher_works_on_Projects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ELIDEK_db`.`Researcher_works_on_Projects` (
  `Researcher_id` INT NOT NULL,
  `Project_id` INT NOT NULL,
  PRIMARY KEY (`Researcher_id`, `Project_id`),
  INDEX `fk_Researcher_has_Projects_Projects1_idx` (`Project_id` ASC) VISIBLE,
  INDEX `fk_Researcher_has_Projects_Researcher1_idx` (`Researcher_id` ASC) VISIBLE,
  CONSTRAINT `fk_Researcher_has_Projects_Researcher1`
    FOREIGN KEY (`Researcher_id`)
    REFERENCES `ELIDEK_db`.`Researcher` (`Researcher_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Researcher_has_Projects_Projects1`
    FOREIGN KEY (`Project_id`)
    REFERENCES `ELIDEK_db`.`Projects` (`Project_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
