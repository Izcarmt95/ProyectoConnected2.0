<?php
include("../Connection/connectionMySQL.php");

function registerPersonMySQL($name, $lastname, $birthdate , $gender, 
								$country, $profession, $description, $email, $password)
{	
	$mysqli = dbConnectMySQL();

   	$date= date ("Y-m-d H:i:s", strtotime($birthdate));
   	$idAvatar = 'null';
   	$mysqli->query("SET NAMES 'utf8'");
	if(!$mysqli->query("call registerPerson('".$name."', '".$lastname."', '".$email."', '".$password."','".$date."' , '".$profession."','".$description."','".$gender."', ".$idAvatar.", ".$country.")")){
		echo "Failed to register";
 	}
 	else{
 		echo "Registered";

 	}
 	
}

?>