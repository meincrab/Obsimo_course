-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Kurssiryhmä`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Kurssiryhmä` (
  `idKurssiryhmä` INT NOT NULL,
  `Nimi` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idKurssiryhmä`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Käyttäjä`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Käyttäjä` (
  `idKäyttäjä` INT NOT NULL,
  `Etunimi` VARCHAR(45) NOT NULL,
  `Sukunimi` VARCHAR(45) NOT NULL,
  `Salasana` VARCHAR(45) NOT NULL,
  `Opettaja/Oppilas` TINYINT NOT NULL,
  `Kurssiryhmä_idKurssiryhmä` INT NOT NULL,
  PRIMARY KEY (`idKäyttäjä`),
  INDEX `fk_Käyttäjä_Kurssiryhmä1_idx` (`Kurssiryhmä_idKurssiryhmä` ASC),
  CONSTRAINT `fk_Käyttäjä_Kurssiryhmä1`
    FOREIGN KEY (`Kurssiryhmä_idKurssiryhmä`)
    REFERENCES `mydb`.`Kurssiryhmä` (`idKurssiryhmä`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Opintojakso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Opintojakso` (
  `idOpintojakso` INT NOT NULL,
  `Nimi` VARCHAR(45) NOT NULL,
  `Kuvaus` VARCHAR(255) NOT NULL,
  `Opintopisteet` INT(11) NOT NULL,
  PRIMARY KEY (`idOpintojakso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Yritys`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Yritys` (
  `idYritys` INT NOT NULL,
  `Nimi` VARCHAR(45) NOT NULL,
  `Palaute` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idYritys`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Suositus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Suositus` (
  `idSuositus` INT NOT NULL,
  `Yritys_idYritys` INT NOT NULL,
  `Opintojakso_idOpintojakso` INT NOT NULL,
  PRIMARY KEY (`idSuositus`, `Yritys_idYritys`, `Opintojakso_idOpintojakso`),
  INDEX `fk_Suositus_Yritys_idx` (`Yritys_idYritys` ASC),
  INDEX `fk_Suositus_Opintojakso1_idx` (`Opintojakso_idOpintojakso` ASC),
  CONSTRAINT `fk_Suositus_Yritys`
    FOREIGN KEY (`Yritys_idYritys`)
    REFERENCES `mydb`.`Yritys` (`idYritys`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Suositus_Opintojakso1`
    FOREIGN KEY (`Opintojakso_idOpintojakso`)
    REFERENCES `mydb`.`Opintojakso` (`idOpintojakso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ValitutJaksot`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ValitutJaksot` (
  `Opintojakso_idOpintojakso` INT NOT NULL,
  `Käyttäjä_idKäyttäjä` INT NOT NULL,
  `Opintojakso_idOpintojakso1` INT NOT NULL,
  PRIMARY KEY (`Opintojakso_idOpintojakso`),
  INDEX `fk_ValitutJaksot_Käyttäjä1_idx` (`Käyttäjä_idKäyttäjä` ASC),
  INDEX `fk_ValitutJaksot_Opintojakso1_idx` (`Opintojakso_idOpintojakso1` ASC),
  CONSTRAINT `fk_ValitutJaksot_Käyttäjä1`
    FOREIGN KEY (`Käyttäjä_idKäyttäjä`)
    REFERENCES `mydb`.`Käyttäjä` (`idKäyttäjä`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ValitutJaksot_Opintojakso1`
    FOREIGN KEY (`Opintojakso_idOpintojakso1`)
    REFERENCES `mydb`.`Opintojakso` (`idOpintojakso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Suositus_has_Kurssiryhmä`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Suositus_has_Kurssiryhmä` (
  `Suositus_idSuositus` INT NOT NULL,
  `Suositus_Yritys_idYritys` INT NOT NULL,
  `Suositus_Opintojakso_idOpintojakso` INT NOT NULL,
  `Kurssiryhmä_idKurssiryhmä` INT NOT NULL,
  PRIMARY KEY (`Suositus_idSuositus`, `Suositus_Yritys_idYritys`, `Suositus_Opintojakso_idOpintojakso`, `Kurssiryhmä_idKurssiryhmä`),
  INDEX `fk_Suositus_has_Kurssiryhmä_Kurssiryhmä1_idx` (`Kurssiryhmä_idKurssiryhmä` ASC),
  INDEX `fk_Suositus_has_Kurssiryhmä_Suositus1_idx` (`Suositus_idSuositus` ASC, `Suositus_Yritys_idYritys` ASC, `Suositus_Opintojakso_idOpintojakso` ASC),
  CONSTRAINT `fk_Suositus_has_Kurssiryhmä_Suositus1`
    FOREIGN KEY (`Suositus_idSuositus` , `Suositus_Yritys_idYritys` , `Suositus_Opintojakso_idOpintojakso`)
    REFERENCES `mydb`.`Suositus` (`idSuositus` , `Yritys_idYritys` , `Opintojakso_idOpintojakso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Suositus_has_Kurssiryhmä_Kurssiryhmä1`
    FOREIGN KEY (`Kurssiryhmä_idKurssiryhmä`)
    REFERENCES `mydb`.`Kurssiryhmä` (`idKurssiryhmä`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
