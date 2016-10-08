USE `likes`;
DROP PROCEDURE IF EXISTS `getLikeCount`;

DELIMITER $$
USE `likes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getLikeCount`(pIdPost int(11))
BEGIN
	select count(idLike) from likes.like
	where idPost = pIdPost;
END$$

DELIMITER ;