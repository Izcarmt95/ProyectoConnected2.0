USE `Connected`;
DROP procedure IF EXISTS `getIdPerson`;

DELIMITER $$
USE `Connected`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getIdPerson`()
BEGIN
	select idPerson from Person;
END$$

DELIMITER ;