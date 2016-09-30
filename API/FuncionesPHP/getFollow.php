<?php
require_once ('/var/www/html/ProyectoConnected2.0/API//Connection/ConnectionNeo4j.php');

// Gets followers
function getFollowerDB(){
	$idPerson = $_SESSION['idPerson'];
	try{

		$client = dbConnectNeo4j();
		$query =  "MATCH (n {id:'".$idPerson."'}) MATCH (P)-[:follows]-> (n) RETURN collect(P.id) as ids;" ;
		$result = $client->run($query);

		$record = $result->records();
		echo count($record[0]->value('ids'));
	}
	catch(Exeption $e){
		echo "Error in the query";
	}
}

//
function getFollowingsDB(){
	$idPerson = $_SESSION['idPerson'];
	try{
		$client = dbConnectNeo4j();
		$query =  "MATCH (n {id: '".$idPerson."'})-[:follows]->(following) RETURN  collect(following.id) as ids" ;
		$result = $client->run($query);

		$record = $result->records();
		echo count($record[0]->value('ids'));
	}
	catch(Exeption $e){
		echo "Error in the query";
	}
}

?>
