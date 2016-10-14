<?php
require_once ('/var/www/html/ProyectoConnected2.0/API//Connection/Neo4j/ConnectionNeo4j.php');

require_once('/var/www/html/ProyectoConnected2.0/API//Connection/connectionMySQL.php');

//get people for follow
function getPeopleDB()
{	
	$idPerson = $_SESSION["idPerson"];
	$mysqli = dbConnectMySQL();
	$mysqli2= dbConnectMySQL();
	$idFollowing = getFollowingsDB();
	
	$person = []; // array of person's properties
	$idPersons = $mysqli->query("call getIdPerson()");

	while ($row = $idPersons->fetch_array()) {
		//NO FOLLOW  and not be the same id of session
	    if(!in_array($row['0'] ,$idFollowing) and $row['0'] != $idPerson){
	    	$mysqli2= dbConnectMySQL();
	    	$personFromDB = $mysqli2->query("call getPerson(".$row['0'].")");
	    	$personAux = [];

	    	//set properties into array
        	while ($row2 =  $personFromDB->fetch_array()){
            	$nIdPerson = $row2['idPerson'];
            	array_push($personAux,$nIdPerson);

            	$nFirstName = $row2['firstName'];
            	array_push($personAux,$nFirstName);

            	$nLastName = $row2['lastName'];
            	array_push($personAux,$nLastName);

            	$nProfession = $row2['profession'];
            	array_push($personAux,$nProfession);

            	$nCountry = $row2['idCountry'];
            	$nCountry = getCountryById($nCountry);
            	array_push($personAux,$nCountry);

            	$nIdAvatar = $row2['idAvatar'];
            	array_push($personAux,$nIdAvatar);

            	//Followers
            	$followers = getFollowersUser($nIdPerson);
            	array_push($personAux,$followers);

            	//Followings
            	$followings = getFollowingsUser($nIdPerson);
            	array_push($personAux,$followings);

        	}
        	array_push($person, $personAux);
	    }
	}
	return $person;

}

function getFollowersUser($pIdPerson){
	try{

		$client = dbConnectNeo4j();
		$query =  "MATCH (n {id:'".$pIdPerson."'}) MATCH (P)-[:follows]-> (n) RETURN collect(P.id) as ids" ;
		$result = $client->run($query);

		$record = $result->records();
		return  count($record[0]->value('ids'));
	}
	catch(Exeption $e){
		echo "Error in the query";
	}
}


function getFollowingsUser($pIdPerson){
	try{
		$client = dbConnectNeo4j();
		$query =  "MATCH (n {id: '".$pIdPerson."'})-[:follows]->(following) RETURN  collect(following.id) as ids" ;
		$result = $client->run($query);

		$record = $result->records();
		return count($record[0]->value('ids'));
	}
	catch(Exeption $e){
		echo "Error in the query";
	}
}

//Gets the followings of id Session
function getFollowingsDB(){
	$idPerson = $_SESSION["idPerson"];
	try{
		$client = dbConnectNeo4j();
		$query =  "MATCH (n {id: '".$idPerson."'})-[:follows]->(following) RETURN  collect(following.id) as ids" ;
		$result = $client->run($query);

		$record = $result->records();
		return $record[0]->value('ids');
	}
	catch(Exeption $e){
		echo "Error in the query";
	}
}


//Gets a country by especific ID
function getCountryById($pIdCountry){
	$mysqli = dbConnectMySQL();
	$descriptionCountry = $mysqli->query("call getCountryById(".$pIdCountry.")");
	$nDescriptionCountry = '';

	while ($row =  $descriptionCountry->fetch_array()) {
		$nDescriptionCountry = $row['description'];
	}
	return $nDescriptionCountry;

}

function getAllPeopleDB()
{
	$idPerson = $_SESSION["idPerson"];
	$mysqli = dbConnectMySQL();

	$person = []; // array of person's properties
	$idPersons = $mysqli->query("call getIdPerson()");


	while ($row = $idPersons->fetch_array()) {
		//NO FOLLOW  and not be the same id of session
	    if($row['0'] != $idPerson){
	    	$mysqli2= dbConnectMySQL();
	    	$personFromDB = $mysqli2->query("call getPerson(".$row['0'].")");
	    	$personAux = [];

	    	//set properties into array
        	while ($row2 =  $personFromDB->fetch_array()){
            	$nIdPerson = $row2['idPerson'];
            	array_push($personAux,$nIdPerson);

            	$nFirstName = $row2['firstName'];
            	array_push($personAux,$nFirstName);

            	$nLastName = $row2['lastName'];
            	array_push($personAux,$nLastName);

            	$nProfession = $row2['profession'];
            	array_push($personAux,$nProfession);

            	$nCountry = $row2['idCountry'];
            	$nCountry = getCountryById($nCountry);
            	array_push($personAux,$nCountry);

            	$nIdAvatar = $row2['idAvatar'];
            	array_push($personAux,$nIdAvatar);

            	//Followers
            	$followers = getFollowersUser($nIdPerson);
            	array_push($personAux,$followers);

            	//Followings
            	$followings = getFollowingsUser($nIdPerson);
            	array_push($personAux,$followings);

        	}
        	array_push($person, $personAux);
	    }
	}
	return $person;
}

function getPerson($idPerson)
	{
		$mysqli = dbConnectMySQL();
		$person = $mysqli ->query('call getPerson('.$idPerson.')');
		while ($row =  $person->fetch_array()){
			$firstName = $row['firstName'];
			$lastName = $row['lastName'];

		}

		$fullName = $firstName." ".$lastName;
		return $fullName;

	}


?>
