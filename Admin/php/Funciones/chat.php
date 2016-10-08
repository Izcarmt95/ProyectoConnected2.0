<?php
	include("../../../API/FuncionesPHP/functionChat.php");
	
	@session_start();
	$idChat = $_SESSION['idChat'];
	$idPerson = $_SESSION['idPerson'];


	$message = $_POST['message'];
	insertMessage($idChat, $idPerson, $message);


	echo json_encode("");
?>