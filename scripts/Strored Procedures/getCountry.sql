USE `Connected`;
DROP procedure IF EXISTS `getCountry`;

DELIMITER $$
USE `Connected`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCountry`()
BEGIN
	select * from Country; 
END$$

DELIMITER ;

