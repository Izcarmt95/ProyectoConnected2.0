CREATE PROCEDURE `getPost` (pIdPerson int(11))
BEGIN
	select * from Post where idPerson = pIdPerson;
END
