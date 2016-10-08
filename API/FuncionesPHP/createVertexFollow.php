<?php
require_once ('/var/www/html/ProyectoConnected2.0/API//Connection/Neo4j/ConnectionNeo4j.php');

// Gets followers

function createVertex($idFollowing){
	try{
		@session_start();
		$idPerson = $_SESSION['idPerson'];
		$client = dbConnectNeo4j();
		$query = "MATCH (person1:Person {id:'".$idPerson."'}), (person2:Person {id: '".$idFollowing."'}) CREATE (person1)-[r:follows]->(person2) RETURN r";
  		$result = $client->run($query);
	}
	catch(Exeption $e){
		echo "Error in the query";
	}
}

?>
