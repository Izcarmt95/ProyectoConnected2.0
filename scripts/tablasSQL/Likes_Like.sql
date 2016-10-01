CREATE TABLE `Like` (
	`idLike` int(11) NOT NULL AUTO_INCREMENT,
	`idPost` int(11) NOT NULL,
	`idPerson` int(11) NOT NULL,
	PRIMARY KEY (`idLike`, `idPost`, `idPerson`),
	UNIQUE KEY `idLike_UNIQUE` (`idLike`)
)