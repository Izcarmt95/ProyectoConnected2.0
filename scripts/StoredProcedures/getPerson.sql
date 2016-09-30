CREATE DEFINER=`root`@`localhost` PROCEDURE `getPerson`(pIdPerson int(11))
BEGIN
	select * from Person where idPerson = pIdPerson;
END