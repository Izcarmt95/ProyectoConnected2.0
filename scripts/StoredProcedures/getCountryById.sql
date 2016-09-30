CREATE DEFINER=`root`@`localhost` PROCEDURE `getCountryByID`(pIdCountry int(11))
BEGIN
	select description from Country where idCountry = pIdCountry;
END