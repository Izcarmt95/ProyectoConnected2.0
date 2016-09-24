
CREATE TABLE `Person` (
  `idPerson` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `profession` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `idAvatar` int(11) NOT NULL,
  `idCountry` int(11) NOT NULL,
  PRIMARY KEY (`idPerson`),
  UNIQUE KEY `idPerson_UNIQUE` (`idPerson`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_Person_Country_idx` (`idCountry`),
  CONSTRAINT `fk_Person_Country` FOREIGN KEY (`idCountry`) REFERENCES `Country` (`idCountry`) ON DELETE NO ACTION ON UPDATE NO ACTION
) 