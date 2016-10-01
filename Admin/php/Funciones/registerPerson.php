<?php
	include("../../../API/FuncionesPHP/registerPerson.php");

	$tag = $_POST['tag'];

	if($tag == 'register'){

		registerPersonDB($_POST['name'],$_POST['lastname'],$_POST['birthdate'],$_POST['gender'],$_POST['country'],$_POST['profession'],$_POST['description'],$_POST['email'], $_POST['password'] );
		return 1;
		
	}

	
?>
