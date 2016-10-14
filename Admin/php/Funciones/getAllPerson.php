<?php
      include("../../../API/FuncionesPHP/getPeople.php");
 /*
    Function for creation of code requiered in people.php
 */

function userProfile($userName,$profession,$country,$followers, $following, $idPerson){
    echo  '<form method="post" action="../../php/Funciones/idChat.php">';
    
    echo     '<div class="box box-widget widget-user md">';
    echo       '<div class="widget-user-header bg-aqua-active">';
    echo          '<h3 class="widget-user-username">'.$userName.'</h3>';
    echo          '<h5 class="widget-user-desc">'.$profession.'</h5>';
    echo       '</div>';
    echo     '<button id="btnChat" name="btnChat" value="'.$idPerson.'" class="btn btn-primary   btn-block btn-flat">Chat</button>';
    echo     '</div>';

    echo     '</form>';
};


function getAllPeople(){
    //Gets array of persons //poss 7 is the idAvatar
    $person = getAllPeopleDB();
    $counter = 0;
    foreach ($person as $row) {
        userProfile($row[1].' '.$row[2],$row[3],$row[4], $row[6],$row[7],$row[0]);
    
    }

}
    
?>