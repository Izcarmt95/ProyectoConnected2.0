USE `Connected`;
DROP procedure IF EXISTS `getCountryByID`;

DELIMITER $$
USE `Connected`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCountryByID`(IN pIdCountry int(11))
BEGIN
	select description from Country
	where idCountry = pIdCountry; 
END$$

DELIMITER ;