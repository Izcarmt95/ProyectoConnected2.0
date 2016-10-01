<?php
	include("../../../API/FuncionesPHP/createVertexFollow.php");
	$idFollowing = $_POST['btnFollow'];
	createVertex($idFollowing);
	//$mensaje = 'Follow';
   // print ("<script>alert('$mensaje')</script>");
    print("<script>window.location.replace('../../pages/examples/people.php');</script>"); 
?>