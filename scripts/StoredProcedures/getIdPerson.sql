CREATE DEFINER=`root`@`localhost` PROCEDURE `getIdPerson`()
BEGIN
	select idPerson from Person;
END