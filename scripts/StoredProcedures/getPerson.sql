USE `Connected`;
DROP procedure IF EXISTS `getPerson`;

DELIMITER $$
USE `Connected`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPerson`(pIdPerson int(11))
BEGIN
	select * from Person where idPerson = pIdPerson;
END$$

DELIMITER ;insertCountry