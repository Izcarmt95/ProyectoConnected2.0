
CREATE TABLE `Post` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `idPerson` int(11) NOT NULL,
  `idMedia` int(11) DEFAULT NULL,
  `text` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idPost`,`idPerson`),
  UNIQUE KEY `idPost_UNIQUE` (`idPost`),
  KEY `fk_Post_1_idx` (`idPerson`),
  CONSTRAINT `fk_PostxPerson` FOREIGN KEY (`idPerson`) REFERENCES `Person` (`idPerson`) ON DELETE NO ACTION ON UPDATE NO ACTION
)