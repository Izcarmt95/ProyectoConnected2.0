<?php
	include("../../../API/Principal/principal.php");

	$tag = $_POST['tag'];

	if($tag == 'register'){
		registerPerson($_POST['name'],$_POST['lastname'],$_POST['birthdate'],$_POST['gender'],  1 ,$_POST['profession'],$_POST['description'],$_POST['email'], $_POST['password'] );
			
	}

	
?>
