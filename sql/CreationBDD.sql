-- MySQL Script generated by MySQL Workbench
-- Sun Jul 24 15:37:42 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema BD_donkeyCar
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema BD_donkeyCar
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BD_donkeyCar` DEFAULT CHARACTER SET utf8 ;
USE `BD_donkeyCar` ;

-- -----------------------------------------------------
-- Table `BD_donkeyCar`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_donkeyCar`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `nameUser` VARCHAR(45) NOT NULL,
  `passwordUser` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_donkeyCar`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_donkeyCar`.`client` (
  `idclient` INT NOT NULL AUTO_INCREMENT,
  `lastnameClient` VARCHAR(45) NOT NULL,
  `firstnameClient` VARCHAR(45) NOT NULL,
  `adressClient` VARCHAR(200) NOT NULL,
  `cityClient` VARCHAR(45) NOT NULL,
  `zipcodeClient` VARCHAR(45) NOT NULL,
  `phoneClient` INT NOT NULL,
  `mailClient` VARCHAR(45) NOT NULL,
  `user_iduser` INT NOT NULL,
  PRIMARY KEY (`idclient`),
  INDEX `fk_client_user1_idx` (`user_iduser` ASC) VISIBLE,
  CONSTRAINT `fk_client_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `BD_donkeyCar`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_donkeyCar`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_donkeyCar`.`type` (
  `idtype` INT NOT NULL AUTO_INCREMENT,
  `nameType` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtype`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_donkeyCar`.`vehicle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_donkeyCar`.`vehicle` (
  `idvehicle` INT NOT NULL AUTO_INCREMENT,
  `brandVehicle` VARCHAR(45) NOT NULL,
  `modelsVehicle` VARCHAR(45) NOT NULL,
  `energyVehicle` VARCHAR(45) NOT NULL,
  `yearVehicle` DATE NOT NULL,
  `nbseatsVehicle` INT NOT NULL,
  `gearboxVehicle` VARCHAR(45) NOT NULL,
  `imgVehicle` VARCHAR(300) NOT NULL,
  `prixLocVehicle` INT NOT NULL,
  `type_idtype` INT NOT NULL,
  PRIMARY KEY (`idvehicle`),
  INDEX `fk_vehicle_type1_idx` (`type_idtype` ASC) VISIBLE,
  CONSTRAINT `fk_vehicle_type1`
    FOREIGN KEY (`type_idtype`)
    REFERENCES `BD_donkeyCar`.`type` (`idtype`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BD_donkeyCar`.`reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BD_donkeyCar`.`reservation` (
  `idreservation` INT NOT NULL AUTO_INCREMENT,
  `dateReservationDebut` DATE NOT NULL,
  `dateReservationFin` DATE NOT NULL,
  `insuranceReservation` VARCHAR(45) NULL,
  `adddriverReservation` VARCHAR(45) NULL,
  `babyseatReservation` VARCHAR(45) NULL,
  `gpsReservation` VARCHAR(45) NULL,
  `vehicle_idvehicle` INT NOT NULL,
  `client_idclient` INT NOT NULL,
  PRIMARY KEY (`idreservation`),
  INDEX `fk_reservation_vehicle1_idx` (`vehicle_idvehicle` ASC) VISIBLE,
  INDEX `fk_reservation_client1_idx` (`client_idclient` ASC) VISIBLE,
  CONSTRAINT `fk_reservation_vehicle1`
    FOREIGN KEY (`vehicle_idvehicle`)
    REFERENCES `BD_donkeyCar`.`vehicle` (`idvehicle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservation_client1`
    FOREIGN KEY (`client_idclient`)
    REFERENCES `BD_donkeyCar`.`client` (`idclient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
