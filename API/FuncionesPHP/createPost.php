<?php

// Required databases connections
require ('/var/www/html/ProyectoConnected2.0/API//Connection/connectionMySQL.php');

//Register a Person into MySQL database and Neo4j database
function createPostText($post)
{	
	@session_start();
	$idPerson = $_SESSION['idPerson'];
	$idMedia = -1;
	$time = time();
	$date = date("Y-m-d H:i:s", $time);
	$mysqli = dbConnectMySQL();
	$query = "call createPost(".$idPerson.",".$idMedia.",'".$post."','".$date."')";
	$result = $mysqli->query($query);

	if($result){
		echo json_encode($result);

	}
	else{
		echo "Error insert post";
	}
	
}

?>