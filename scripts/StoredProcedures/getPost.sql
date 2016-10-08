CREATE DEFINER=`root`@`localhost` PROCEDURE `getPost`(pIdPerson int(11), pIdPost int(11))
BEGIN
	select * from Post where idPerson = pIdPerson and idPost =pIdPost;
END