<?php
      include("../../../API/FuncionesPHP/getPeople.php");
 /**
    Function for creation of code requiered in people.php
 */

function userProfile($userName,$profession,$country,$followers, $following, $idPerson){
   echo '<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>';
    echo  '<script src="../../bootstrap/js/follow.js"></script>';
    echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';
	echo '<section class="content">';
    echo  '<form onsubmit="return false">';
    echo   '<div class="row">';
    echo    '<div class="col-md-4">';
    echo     '<div class="box box-widget widget-user">';
    echo       '<div class="widget-user-header bg-aqua-active">';
    echo          '<h3 class="widget-user-username">'.$userName.'</h3>';
    echo          '<h5 class="widget-user-desc">'.$profession.'</h5>';
    echo        '</div>';
    echo        '<div class="widget-user-image">';
    echo          '<img class="img-circle" src="../../dist/img/user1-128x128.jpg" alt="User Avatar">';
    echo        '</div>';
    echo        '<div class="box-footer">';
    echo          '<div class="row">';
    echo            '<div class="col-sm-4 border-right">';
    echo              '<div class="description-block">';
    echo                '<h5 class="description-header">'.$country.'</h5>';
    echo                '<span class="description-text">Country</span>';
    echo              '</div>';
    echo            '</div>';
    echo            '<div class="col-sm-4 border-right">';
    echo              '<div class="description-block">';
    echo                '<h5 class="description-header">'.$followers.'</h5>';
    echo                '<span class="description-text">FOLLOWERS</span>';
    echo              '</div>';
    echo            '</div>';
    echo            '<div class="col-sm-4">';
    echo              '<div class="description-block">';
    echo                '<h5 class="description-header">'.$following.'</h5>';
    echo                '<span class="description-text">FOLLOWINGS</span>';
    echo              '</div>';
    echo           '</div>';

    echo         '</div>';
    echo            '<div class="row">';
    echo            '<div class="col-xs-12">';
    
    echo     '<button id="btnFollow" name="btnFollow" onclick="followPerson()" value="'.$idPerson.'" class="btn btn-primary   btn-block btn-flat">Follow</button>';
    echo           '</form>';
    echo          '<!-- /.row -->';
    echo        '</div>';
    echo      '</div>';
    echo      '<!-- /.widget-user -->';
    echo    '</div>';
    echo    '</div>'; //row
    echo '</section>';
};


function getPeople(){
    //Gets array of persons //poss 7 is the idAvatar
    $person = getPeopleDB();
    $counter = 0;
    foreach ($person as $row) {
        userProfile($row[1].' '.$row[2],$row[3],$row[4], $row[6],$row[7],$row[0]);
    
    }

}
    
?>