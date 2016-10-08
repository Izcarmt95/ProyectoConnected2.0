<?php
	include("../../../API/FuncionesPHP/functionChat.php");
	$idPersonChat = $_POST['btnChat'];
	@session_start();
	$_SESSION['idPersonChat'] = $idPersonChat;
	$_SESSION['idChat'] = getIdChat($idPersonChat, $_SESSION['idPerson']);
	$idChat = $_SESSION['idChat'];

   // print ("<script>alert('$mensaje')</script>");
    print("<script>window.location.replace('../../pages/mailbox/mailbox.php');</script>"); 
?>