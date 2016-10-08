DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `searchForPerson`(IN pFilter varchar(50))
BEGIN
	select * from Person
	where firstName like `%pFilter%` or lastName like `%pFilter%`; 
END