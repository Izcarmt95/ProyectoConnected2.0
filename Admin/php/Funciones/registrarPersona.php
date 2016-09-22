<?php
	include("../connection/connection.php");/*incluye el archivo donde esta la coneccion esta se puede modificar en el archivo*/
 
	$nombre =  $_POST["name"];
	$lastName = $_POST["lastname"];
	$birthDate = $_POST["datepicker"];
	$gender = $_POST["gender"];
	$country = $_POST["country"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$passwordconfirm = $_POST["passwordconfirm"];
	if($passwordconfirm != $password){
		$mensaje = 'Las contraseñas no coinciden';
                print ("<script>alert('$mensaje')</script>");
                print("<script>window.location.replace('../../pages/examples/register.html');</script>"); 

	}
	
	$db = dbConnect();
	/*
   	echo $birthDate;
   	$ymd = DateTime::createFromFormat('m/d/Y', $birthDate);
   	$d = $ymd->format('Y-m-d');

   	echo $d;
	*/
	date_default_timezone_set('America/Costa_Rica');

   	$date = date_create($birthDate);

	$date = date_format($date,"Y-m-d");
   	/*$time = strtotime($birthDate);

	$newformat = date('Y-m-d',$time);

	echo $newformat;
*/
	
	try{
		$updatedCount = $db->query('select createPerson("'.$nombre.'","'.$lastName.'","'. $email.'","'.$password.'","'.$date.'","'.$gender.'","'.$country.'");');
		$mensaje = 'registered user';
    	print ("<script>alert('$mensaje')</script>");
    	print("<script>window.location.replace('../../pages/examples/login.html');</script>"); 
 
	}
	catch( Exception $e){
		$mensaje = 'Unregistered user';
            print ("<script>alert('$mensaje')</script>");
            print("<script>window.location.replace('../../pages/examples/register.html');</script>"); 
	}
	
?>