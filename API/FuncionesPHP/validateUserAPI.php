<?php
require_once('/var/www/html/ProyectoConnected2.0/API//Connection/connectionMySQL.php');
function validateUserPass($pEmail,$pPassword)
{	
	
	$mysqli = dbConnectMySQL();
	if(!$mysqli->query("select email from Person where email = '".$pEmail."' ")){
		echo "Unrealized query";
 	}
 	else{
 		$password = $mysqli->query("select password from Person where email = '".$pEmail."' ");
 		$name = $mysqli->query("select firstName from Person where email = '".$pEmail."' ");
 		$lastname = $mysqli->query("select lastName from Person where email = '".$pEmail."' ");
 		$idPerson =  $mysqli->query("select idPerson from Person where email = '".$pEmail."' ");

 		if($password != ''){
 			$nPass= '';
 			$nName = '';
 			$nLastname = '';
 			$nIdPerson = '';
 			while ($row =  $password->fetch_assoc()){
				$nPass = $row['password'] ;
 			}
 			
 			while ($row =  $name->fetch_assoc()){
				$nName = $row['firstName'] ;
 			}
 			
 			while ($row =  $lastname->fetch_assoc()){
				$nLastname = $row['lastName'] ;
 			}

 			while ($row =  $idPerson->fetch_assoc()){
				$nIdPerson = $row['idPerson'] ;
 			}
 			
 			if($pPassword != $nPass){
 				echo "Invalid password";
 			}
 			
 			else{
 				session_start();
 				$_SESSION['fullName'] = $nName .' '.$nLastname;
 				$_SESSION['idPerson'] = $nIdPerson;
 				echo json_encode($password);



 			}
 		}
 		else{
 			echo "Dont know what i doing";
 		}
 	}
}

?>
