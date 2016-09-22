<?php
include("../connection/connection.php");/*incluye el archivo donde esta la coneccion */
session_start();
$email = $_SESSION['email']; 
$emailFromBo = $_POST['btnFollow'];

$db = dbConnect();
$db2 = dbConnect();
$db3 = dbConnect();
$db4 = dbConnect();
$db5 = dbConnect();
$db6 = dbConnect();


$data =  $db->query('select from Person where email = "'.$email.'"');
$id =  $data[0]->recordID;

$data2 =  $db2->query('select from Person where email = "'.$emailFromBo.'"');
$id2 =  $data2[0]->recordID;

$firstName = $db4->selectGremlin("g.v('".$id."').firstName",'*:-1');
$lastName = $db5->selectGremlin("g.v('".$id."').lastName",'*:-1');
$fullName = $firstName.' '.$lastName;
$fullName = str_replace('"','',$fullName);

$updatedCount = $db6->query("select createNotification('".$fullName."',".$id2.");");


try{
	$updatedCount = $db3->query("select createFollow(".$id.",".$id2.");");
	$mensaje = 'Follow';
    print ("<script>alert('$mensaje')</script>");
    print("<script>window.location.replace('../../pages/examples/people.php');</script>"); 
 
	}
	catch( Exception $e){
		$mensaje = 'Error trying create edge';
            print ("<script>alert('$mensaje')</script>");
            print("<script>window.location.replace('../../pages/examples/people.php');</script>"); 
	}
?>