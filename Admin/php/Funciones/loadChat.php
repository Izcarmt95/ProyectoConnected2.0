<?php
	include("../../../API/FuncionesPHP/functionChat.php");
	include("../../../API/FuncionesPHP/getPeople.php");

	@session_start();
	$idChat = $_SESSION['idChat'];
	$idPerson = $_SESSION['idPerson'];
	$fullName = $_SESSION['fullName'];
	if (is_null($idChat)){
		$result = ' <li class="left clearfix"><span class="chat-img pull-left"> '.
					 '     <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" /> '.
					 '     </span> '.
					 '         <div class="chat-body clearfix"> '.
					 '             <div class="header"> '.
					 '                 <strong class="primary-font">'.$fullName.'</strong> <small class="pull-right text-muted"> '.
					 '                     <span class="glyphicon glyphicon-time"></span></small> '.
					 '             </div> '.
					 '             <p> '.
					 '                 Por favor seleccione un Chat, para que empieces a hablar con mas personas en el mundo '.
					 '             </p> '.
					 '         </div> '.
					 '     </li> '.
					 '  '.
					 '      ';
		echo json_encode($result);


	}
	else{


		$idPersonChat =$_SESSION['idPersonChat'];
		$fullName2 = getPerson($idPersonChat);
		$chat = getMessage($idChat);




		foreach ($chat as $row) {

           	$message = $row['message'];
           	$idPerson1 = $row['idperson'];
     		$result .= message($idPerson1, $fullName, $fullName2, $message);
     		
		}
		echo json_encode($result);


	
		

	}



function message($idPerson,$person1, $person2, $message)
{
	@session_start();
	$idPerson1 = $_SESSION['idPerson'];

	if ($idPerson1 != $idPerson){
		$result = ' <li class="left clearfix"><span class="chat-img pull-left"> '.
					 '     <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" /> '.
					 '     </span> '.
					 '         <div class="chat-body clearfix"> '.
					 '             <div class="header"> '.
					 '                 <strong class="primary-font">'.$person2.'</strong> <small class="pull-right text-muted"> '.
					 '                     <span class="glyphicon glyphicon-time"></span>CONNECTED2.0</small> '.
					 '             </div> '.
					 '             <p> '. $message.
					 '             </p> '.
					 '         </div> '.
					 '     </li> '.
					 '  '.
					 '      ';

	}
	else {
	 $result = ' <li class="left clearfix"><span class="chat-img pull-left"> '.
					 '        <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />  '.
					 '     </span> '.
					 '         <div class="chat-body clearfix"> '.
					 '             <div class="header"> '.
					 '                 <strong class="primary-font">'.$person1.'</strong> <small class="pull-right text-muted"> '.
					 '                     <span class="glyphicon glyphicon-time"></span>CONNECTED2.0</small> '.
					 '             </div> '.
					 '             <p> '. $message.
					 '             </p> '.
					 '         </div> '.
					 '     </li> '.
					 '  '.
					 '      ';
	}

	return $result;
}




?>