<?php
	include("../FuncionesPHP/registerPerson.php");
	function registerPerson($nombre,$lastname,$birthdate, $gender, $country,$profession,$description,$email, $password){
		registerPersonMySQL($nombre,$lastname, $birthdate,$gender,  1 ,$profession, $description,$email, $password);
	}

?>