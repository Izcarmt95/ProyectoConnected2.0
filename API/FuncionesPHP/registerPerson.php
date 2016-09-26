<?php
require('../Connection/connectionMySQ.php');

function registerPersonMySQL()
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


function getCountryMySQL(){
	$mysqli = dbConnectMySQL();

	$result = $mysqli ->query('call getCountry()');

	try {

		while ($row = $result->fetch_array()) {
	           	echo "<option value = '".$row['0']."'>".$row['1']."</option>";
	     };
    }
    catch(PDOException $e){
	    echo "<option value = '".""."'>"."ERROR_PHP_PRINCIPAL"."</option>";
	            
	}

}












?>