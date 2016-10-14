<?php
require_once('/var/www/html/ProyectoConnected2.0/API//Connection/connectionMySQL.php');

function getIdChat($pIdPerson1, $pIdPerson2)
{
	$mysqli = dbConnectMySQL();
	$mysqli2 = dbConnectMySQL();
	$idChatResult = $mysqli ->query("call getIdChat(".$pIdPerson1.",".$pIdPerson2.");");

	if ($idChatResult ->num_rows == 0){
		$result = $mysqli2 ->query("call createChat(".$pIdPerson1.",".$pIdPerson2.");");
		$idChatResult = $mysqli2 ->query("call getIdChat(".$pIdPerson1.",".$pIdPerson2.");");

	}


	while ($row =  $idChatResult ->fetch_array()) {
		$idChat = $row['idChat'];
	}

	

	return $idChat;


}

function insertMessage($idChat, $idPerson, $message)
{
		$cluster   = Cassandra::cluster()->build();                 // connects to localhost by default
		$session   = $cluster->connect();        // create session, optionally scoped to a keyspace



		/*$session->execute(new Cassandra\SimpleStatement(" CREATE KEYSPACE Connected WITH replication = {'class': 'SimpleStrategy','replication_factor' : 1}"));*/

		    

		/*$session->execute(new Cassandra\SimpleStatement(" CREATE TABLE Connected.Message ( idChat int, idPerson int, message text,date timestamp,PRIMARY KEY (idChat, date, idPerson));"));*/

		/*$session->execute(new Cassandra\SimpleStatement(" drop TABLE Connected.Message ;"));*/
		$session->execute(new Cassandra\SimpleStatement(" INSERT INTO Connected.Message ( idChat, date, message, idPerson) 
															VALUES (".$idChat.",dateof(now()),'".$message."',".$idPerson." );"));
		return "marcelo me la chupa !!";

}

function getMessage($idChat)
{
	$cluster   = Cassandra::cluster()->build();                 // connects to localhost by default
	$session   = $cluster->connect();        // create session, optionally scoped to a keyspace



		/*$session->execute(new Cassandra\SimpleStatement(" CREATE KEYSPACE Connected WITH replication = {'class': 'SimpleStrategy','replication_factor' : 1}"));*/

		    

		/*$session->execute(new Cassandra\SimpleStatement(" CREATE TABLE Connected.Message ( idChat int, idPerson int, message text,date timestamp,PRIMARY KEY (idChat, date, idPerson));"));*/

	/*$session->execute(new Cassandra\SimpleStatement(" drop TABLE Connected.Message ;"));*/
	$messages = $session->execute(new Cassandra\SimpleStatement(" SELECT * FROM Connected.Message where idChat = ".$idChat.""));

	$chat = [];

	foreach ($messages as $row) {

	   
	    	$chatAux = [];

	    	$date = $row['date'];
           	$chatAux['date']= $date;

           	$message = $row['message'];
           	$chatAux['message'] = $message;

           	$idPerson = $row['idperson'];
           	$chatAux['idperson'] = $idPerson;

           	array_push($chat, $chatAux);
	}

	return $chat;
	



}



















?>
