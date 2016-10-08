<?php

// Required databases connections
require ('/var/www/html/ProyectoConnected2.0/API//Connection/Neo4j/ConnectionNeo4j.php');

require ('/var/www/html/ProyectoConnected2.0/API//Connection/Mongo/ConnectionMongo.php');

require ('/var/www/html/ProyectoConnected2.0/API//Connection/connectionMySQL.php');

//Register a Person into MySQL database and Neo4j database
function registerPersonDB($name,$lastname,$birthdate,$gender, $country,$profession,$description,$email, $password )
{	
	$mysqli = dbConnectMySQL();

   	$date= date ("Y-m-d H:i:s", strtotime($birthdate));
   	$idAvatar = 'null';
   	$mysqli->query("SET NAMES 'utf8'");

   	// MySQL insertion
   	$query = "call registerPerson('".$name."', '".$lastname."', '".$email."', '".$password."','".$date."', '".$profession."','".$description."','".$gender."', ".$idAvatar.", ".$country.")";
   	$result = $mysqli->query($query);


   	// Query ready
	if($result){
		$idPerson =  $mysqli->query("select idPerson from Person where email = '".$email."' ");
		$nIdPerson = '';
 		while ($row =  $idPerson->fetch_assoc()){
			$nIdPerson = $row['idPerson'] ;
 		}

 		try{
 			// Neo4j Insertion
			$client = dbConnectNeo4j();
			$client->run("CREATE (n:Person) SET n += {infos}", ['infos' => ['id' => $nIdPerson]]);
		
			//response to the json
			echo json_encode($result);
 		}
 		catch(Exception $e){
 			// Delete register fom MySQL database
 			$mysqli->query("delete from Person where idPerson = '".$nIdPerson."' ");
 			
 			echo "Check the Neo4j connection";
 		}
 		
 	}

 	else{

 		echo 'Failed Register, email already exist';
 	}
 	
}



// Gets all coutry from MySQL database
function getCountryDB(){

	$mysqli = dbConnectMySQL();

	$result = $mysqli ->query('call getCountry()');

	try {
		// Print the select into html
		while ($row = $result->fetch_array()) {
	           	echo "<option value = '".$row['0']."'>".$row['1']."</option>";
	     };
    }
    catch(PDOException $e){
	    echo "<option value = '".""."'>"."ERROR_PHP_PRINCIPAL"."</option>";
	            
	}

}












?>