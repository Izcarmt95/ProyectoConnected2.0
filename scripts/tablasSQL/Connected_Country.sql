

CREATE TABLE `Country` (
  `idCountry` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idCountry`),
  UNIQUE KEY `idCountry_UNIQUE` (`idCountry`),
  UNIQUE KEY `description_UNIQUE` (`description`)
)