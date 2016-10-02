CREATE DEFINER=`root`@`localhost` PROCEDURE `getIdPersonPost`()
BEGIN
	select idPerson from Post;
END