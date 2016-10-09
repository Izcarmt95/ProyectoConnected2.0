<?php
// Require MySql database connection
require_once('/var/www/html/ProyectoConnected2.0/API//Connection/connectionMySQL.php');

// validate a user's emaiil and her password
function validateUserPass($pEmail,$pPassword)
{	
	if($pEmail == "" or $pPassword == ""){
		echo "required email or password";
	}
	else{


	$mysqli = dbConnectMySQL();

	//Query ready
	if(!$mysqli->query("select email from Person where email = '".$pEmail."' ")){
		echo "Unrealized query";
		}
		else{

			//Gets user's information
			$password =  $mysqli->query("select password from Person where email = '".$pEmail."' ");
			$name =      $mysqli->query("select firstName from Person where email = '".$pEmail."' ");
			$lastname =  $mysqli->query("select lastName from Person where email = '".$pEmail."' ");
			$idPerson =  $mysqli->query("select idPerson from Person where email = '".$pEmail."' ");
			$country =   $mysqli->query("select idCountry from Person where email = '".$pEmail."' ");
			$description = $mysqli->query("select description from Person where email = '".$pEmail."' ");
			$profession  = $mysqli->query("select profession from Person where email = '".$pEmail."' ");
			$birthdate   = $mysqli->query("select birthdate from Person where email = '".$pEmail."' ");

			if($password != ''){
				$nPass= '';
				$nName = '';
				$nLastname = '';
				$nIdPerson = '';
				$nIdCountry = '';
				$nDescription = '';
				$nProfession = '';
				$countrys = '';
				$nBirthdate = '';

				//Get the string from the query->result
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

				while ($row =  $country->fetch_assoc()){
				$nIdCountry = $row['idCountry'] ;
				}

				while ($row =  $description->fetch_assoc()){
				$nDescription = $row['description'] ;
				}

				while ($row =  $profession->fetch_assoc()){
				$nProfession = $row['profession'] ;
				}

				while ($row =  $birthdate->fetch_assoc()){
				$nBirthdate = $row['birthdate'] ;
				}
				
				$country = $mysqli->query("select description from Country where idCountry = '".$nIdCountry."' "); 
				while ($row =  $country->fetch_assoc()){
				$countrys = $row['description'] ;
				}

				//Match password 
				if($pPassword != $nPass){
					echo "Invalid password";
				}
				
				else{
					// Sessiion information
					@session_destroy();
					@session_start();
					$_SESSION['fullName'] = $nName .' '.$nLastname;
					$_SESSION['idPerson'] = $nIdPerson;
					$_SESSION['description'] = $nDescription;
					$_SESSION['profession'] = $nProfession;
					$_SESSION['country'] = $countrys;
					$_SESSION['birthdate'] = $nBirthdate;
					$_SESSION['idChat'] = null;
					// respose 
					echo json_encode($password);



				}
			}
			else{
				echo "Dont know what i doing";
			}
		}
 	}
}

?>
