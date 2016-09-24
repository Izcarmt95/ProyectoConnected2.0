<?php

function dbConnect (){
 	$conn =	null;
 	$host = 'localhost';
 	$db = 	'Connected';
 	$user = 'root';
 	$pwd = 	'root';
 	mysql_connect($host, $user, $pwd) or die ("no se pudo conectar");
 	mysql_select_db($db);
 	return $conn;
 }

 ?>
