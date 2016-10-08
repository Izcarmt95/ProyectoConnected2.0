<?php
require_once ('/var/www/html/ProyectoConnected2.0/API//Connection/Neo4j/ConnectionNeo4j.php');

require_once('/var/www/html/ProyectoConnected2.0/API//Connection/connectionMySQL.php');

require 'vendor/autoload.php';
//get people for follow
function getPostDB()
{	
	$idPerson = $_SESSION["idPerson"];
	$mysqli = dbConnectMySQL();
	$idFollowing = getFollowingsDB();
	
	$post = []; // array of post  properties
	$idPersonPost = $mysqli->query("call getIdPersonPost()");

	while ($row = $idPersonPost->fetch_array()) {
	    if(in_array($row['0'] , $idFollowing) or $row['0'] == $idPerson){
	    	$mysqli2= dbConnectMySQL();
	    	$postFromDB = $mysqli2->query("call getPost(".$row['0'].",".$row['1'].")");
	    	$postAux = [];

	    	//set properties into array
        	while ($row2 =  $postFromDB->fetch_array()){
            	$postAux['idPost'] = $row2['idPost'];
            	$postAux['text'] = $row2['text'];
            	$postAux['date'] = $row2['date']; 
            	$idPersonPostU = $row2['idPerson'];

            	$idMedia = intval($row2['idMedia']);
            	$postAux['media'] = getStringMedia($idMedia);

            	//Gets Person name and lastname
            	$mysqli3 = dbConnectMySQL();
            	$personFromDB = $mysqli3->query("call getPerson(".$idPersonPostU.")");
            	while ($row3 =  $personFromDB->fetch_array()){
            		$namePerson = $row3['firstName'];
            		$lastname = $row3 ['lastName'];
            		$postAux["fullName"] = $namePerson.' '.$lastname;
            	}


        	}
        	//print_r($postAux);
        	array_push($post, $postAux);
	    }

	}
	usort($post, 'ordenar');
	//mostrar_array($post);
	return $post;
}

function ordenar( $a, $b ) {
    return  strtotime($b['date']) - strtotime($a['date']);
}
 
function mostrar_array($datos) {
	foreach($datos as $dato) 
		echo "{$dato['idPost']} -&gt; {$dato['date']}<br/>";
}
 
//Gets the followings of id Session
function getFollowingsDB(){
	$idPerson = $_SESSION['idPerson'];
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

function getStringMedia($idMedia){
	if($idMedia !=''){
		//Mongo connection
		$imgManager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$images = new MongoDB\GridFS\Bucket($imgManager, "test");
		$vidManager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$videos = new MongoDB\GridFS\Bucket($vidManager, "test");


		$result = "/var/www/html/ProyectoConnected2.0/API/Result/result".$idMedia.".txt";
		$wstream = fopen($result, "w+");

		$videos -> downloadToStream($idMedia, $wstream);

		$handle = fopen($result, "rb");
		$contents = fread($handle, filesize($result));
		$string = chunk_split(base64_encode($contents), 64, "\n");


		fclose($handle);
		return $string;	
	}
	else 
	{
		return $idMedia ;
	}
}
?>
   