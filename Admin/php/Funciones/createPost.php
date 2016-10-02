<?php
	include("../../../API/FuncionesPHP/createPost.php");
	$post = $_POST['post'];
	$media = $_POST['media'];
	if($media != ""){
		@session_start();
		$idPerson = $_SESSION['idPerson'];
		$mensaje = $media;
		return 1;
	}
	else{
		createPostText($post);
		return -1;

	}
	
?>

