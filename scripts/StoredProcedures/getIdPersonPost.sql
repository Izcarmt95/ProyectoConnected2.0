CREATE DEFINER=`root`@`localhost` PROCEDURE `getIdPersonPost`()
BEGIN
	select idPerson, idPost from Post;
END