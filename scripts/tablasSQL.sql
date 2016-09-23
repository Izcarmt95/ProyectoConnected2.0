-- -----------------------------------------------------
-- Table `Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Person` (
  `idPerson` INT NOT NULL,
  `firstName` VARCHAR(50) NOT NULL,
  `lastName` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `birthdate` DATE,
  `profession` VARCHAR(50) NOT NULL,
  `description` VARCHAR(100) NOT NULL,
  `gender` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`idPerson`),
  UNIQUE INDEX `idPerson_UNIQUE` (`idPerson` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)
  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Post` (
  `idPost` INT NOT NULL,
  `idPerson`  INT NOT NULL,
  `idMedia`  INT NOT NULL,
  `text` VARCHAR(100) NOT NULL,
  `date` DATE,
  PRIMARY KEY (`idPost`),
  UNIQUE INDEX `idPost_UNIQUE` (`idPost` ASC),
  CONSTRAINT `PostxPerson`
    FOREIGN KEY (`idPerson`)
    REFERENCES `Person` (`idPerson`)
    ON DELETE NO ACTION
	ON UPDATE NO ACTION
  )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Chat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Chat` (
  `idChat`  INT NOT NULL,
  `idPerson1`  INT NOT NULL,
  `idPerson2`  INT NOT NULL,
  PRIMARY KEY (`idChat`),
  UNIQUE INDEX `idChat_UNIQUE` (`idChat` ASC),
  CONSTRAINT `ChatxPerson1`
    FOREIGN KEY (`idPerson1`)
    REFERENCES `Person` (`idPerson`)
    ON DELETE NO ACTION
	ON UPDATE NO ACTION,
  CONSTRAINT `ChatxPerson2`
    FOREIGN KEY (`idPerson2`)
    REFERENCES `Person` (`idPerson`)
    ON DELETE NO ACTION
	ON UPDATE NO ACTION
  )
ENGINE = InnoDB;


