
CREATE TABLE `Chat` (
  `idChat` int(11) NOT NULL AUTO_INCREMENT,
  `idPerson1` int(11) NOT NULL,
  `idPerson2` int(11) NOT NULL,
  PRIMARY KEY (`idChat`,`idPerson1`,`idPerson2`),
  UNIQUE KEY `idChat_UNIQUE` (`idChat`),
  KEY `fk_Chat_Person1_idx` (`idPerson1`),
  KEY `fk_Chat_Person2_idx` (`idPerson2`),
  CONSTRAINT `fk_Chat_Person1` FOREIGN KEY (`idPerson1`) REFERENCES `Person` (`idPerson`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Chat_Person2` FOREIGN KEY (`idPerson2`) REFERENCES `Person` (`idPerson`) ON DELETE NO ACTION ON UPDATE NO ACTION
) 
