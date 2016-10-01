USE `likes`;
DROP PROCEDURE IF EXISTS `getLikers`;

DELIMITER $$
USE `likes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getLikers`(pIdPost int(11))
BEGIN
	select idPerson from likes.like
	where idPost = pIdPost;
END$$

DELIMITER ;