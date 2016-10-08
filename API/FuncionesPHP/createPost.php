<?php

// Required databases connections
require ('/var/www/html/ProyectoConnected2.0/API//Connection/connectionMySQL.php');

require 'vendor/autoload.php';

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

function createPostImage($sourcePath,$targetPath,$post){
	$imgManager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$images = new MongoDB\GridFS\Bucket($imgManager, "test");
	$vidManager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$videos = new MongoDB\GridFS\Bucket($vidManager, "test");

	$fileName = $targetPath;

	$rstream = fopen($sourcePath, "r");
	$mysqli = dbConnectMySQL();
	$id = $mysqli->query("select MAX(idMedia) as id from Post");
	$temp =  $id->fetch_array();
	$id = $temp['id'];
	$idMedia = $id + 1;

	$images -> uploadFromStream($fileName, $rstream, array("_id" => $idMedia));
	fclose($rstream);
	$result = "/var/www/html/ProyectoConnected2.0/API/Result/result".$idMedia.".txt";
	$wstream = fopen($result, "w+");

	$images -> downloadToStream($idMedia, $wstream);

	$handle = fopen($result, "rb");
	$contents = fread($handle, filesize($result));
	$string = chunk_split(base64_encode($contents), 64, "\n");
	fclose($handle);

	//Insert MySQL
	$mysqli = dbConnectMySQL();
	@session_start();
	$idPerson = $_SESSION['idPerson'];
	$time = time();
	$date = date("Y-m-d H:i:s", $time);
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