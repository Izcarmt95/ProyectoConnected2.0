<?php

 include("../../php/connection/connection.php");
function showNotification($notification){
	echo '<td><input type="checkbox"></td>';
    echo '<td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>';
    echo '<td class="mailbox-subject"><b>'.$notification.'</b><td></td>';
    echo '<td class="mailbox-attachment"></td>';
}

function getNotification(){
	session_start();
    // Creamos la sesión /
    $fullName = $_SESSION['fullName'];
    $idSession = $_SESSION['idPerson'];
	$db = dbConnect();
	$Description = $db->selectGremlin("g.v('".$idSession."').outE('EdgeNotification').inV.description",'*:-1');

	if (!is_array($Description)){$Description = [$Description];}
	try{
		if(!empty($Description)){
			foreach ($Description as $key => $value) {
                $data2 = str_replace('"','',$value);
                showNotification($data2);
			}
		}
	}
	catch(Exception $e){
		
	}
}
?>