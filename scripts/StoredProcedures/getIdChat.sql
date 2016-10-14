CREATE DEFINER=`root`@`localhost` PROCEDURE `getIdChat`(pIdPerson1 int(11) , pIdPerson2 int(11))
BEGIN
select idChat 
from Chat
where (idPerson1 = pIdPerson1 and idPerson2 = pIdPerson2) or (idPerson1 = pIdPerson2 and idPerson2 = pIdPerson1) ;
END