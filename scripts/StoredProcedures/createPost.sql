DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `createPost`(pIdPerson int(11), 
														pIdMedia int(11), 
														pText varchar(100), 
														pDate date)
BEGIN
	if pIdMedia = -1 THEN SET pIdMedia = null; END IF;
	insert into Post(idPost, idPerson, idMedia, text, date)
	values(null, pIdPerson, pIdMedia, pText, pDate);
END