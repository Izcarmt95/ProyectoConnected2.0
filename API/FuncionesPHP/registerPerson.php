<?php
require_once('/var/www/html/ProyectoConnected2.0/API//Connection/connectionMySQL.php');

function registerPersonMySQL($name,$lastname,$birthdate,$gender, $country,$profession,$description,$email, $password )
{	
	$mysqli = dbConnectMySQL();

   	$date= date ("Y-m-d H:i:s", strtotime($birthdate));
   	$idAvatar = 'null';
   	$mysqli->query("SET NAMES 'utf8'");
   	$query = "call registerPerson('".$name."', '".$lastname."', '".$email."', '".$password."','".$date."', '".$profession."','".$description."','".$gender."', ".$idAvatar.", ".$country.")";
   	$result = $mysqli->query($query);

	if($result){
		echo json_encode($result);

		
 	}

 	else{

 		echo 'Failed Register';
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